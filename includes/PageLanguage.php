<?php

use MediaWiki\Content\Hook\PageContentLanguageHook;
use MediaWiki\Hook\ParserFirstCallInitHook;
use MediaWiki\Languages\LanguageFactory;
use MediaWiki\Languages\LanguageNameUtils;
use MediaWiki\Parser\MagicWordArray;
use Wikimedia\Rdbms\IConnectionProvider;

class PageLanguage implements
	PageContentLanguageHook,
	ParserFirstCallInitHook
{

	/** @var array<string,Language> */
	private static $cache = [];

	/** @var IConnectionProvider */
	private $dbProvider;

	/** @var LanguageFactory */
	private $languageFactory;

	/** @var LanguageNameUtils */
	private $languageNameUtils;

	/**
	 * @param IConnectionProvider $dbProvider
	 * @param LanguageFactory $languageFactory
	 * @param LanguageNameUtils $languageNameUtils
	 */
	public function __construct(
		IConnectionProvider $dbProvider,
		LanguageFactory $languageFactory,
		LanguageNameUtils $languageNameUtils
	) {
		$this->dbProvider = $dbProvider;
		$this->languageFactory = $languageFactory;
		$this->languageNameUtils = $languageNameUtils;
	}

	/**
	 * @param Title $title
	 * @param Language|StubUserLang|string &$pageLang
	 * @param Language $userLang User language
	 * @return bool|void True or no return value to continue or false to abort
	 */
	public function onPageContentLanguage( $title, &$pageLang, $userLang ) {
		if ( isset( self::$cache[$title->getPrefixedDBKey()] ) ) {
			$pageLang = self::$cache[$title->getPrefixedDBKey()];
		} elseif ( $title->getArticleID() > 0 ) {
			$dbr = $this->dbProvider->getReplicaDatabase();
			$langCode = $dbr->selectField(
				'page_props', 'pp_value', [
					'pp_page' => $title->getArticleID(),
					'pp_propname' => 'pagelanguage',
				], __METHOD__
			);

			if ( $langCode !== false && $this->languageNameUtils->isValidCode( $langCode ) ) {
				$pageLang = $this->languageFactory->getLanguage( $langCode );
			}
		}
	}

	/**
	 * Register the pagelanguage hook with the Parser.
	 *
	 * @param Parser $parser
	 * @return bool|void True or no return value to continue or false to abort
	 */
	public function onParserFirstCallInit( $parser ) {
		$parser->setFunctionHook( 'pagelanguage', [ $this, 'funcPageLanguage' ], Parser::SFH_NO_HASH );
	}

	/**
	 * @param Parser $parser
	 * @param string $langCode First argument language code
	 * @param string $uarg Second argument other parameter
	 * @return string
	 */
	public function funcPageLanguage( Parser $parser, $langCode, $uarg = '' ) {
		static $magicWords = null;
		if ( $magicWords === null ) {
			$magicWords = new MagicWordArray( [ 'pagelanguage_noerror', 'pagelanguage_noreplace' ] );
		}
		$arg = $magicWords->matchStartToEnd( $uarg );

		$langCode = trim( $langCode );
		if ( strlen( $langCode ) === 0 ) {
			return '';
		}

		if ( !$this->languageNameUtils->isValidCode( $langCode ) ) {
			return '<span class="error">' .
				wfMessage( 'pagelanguage-invalid' )->inContentLanguage()
					->params( wfEscapeWikiText( $langCode ) )->text() .
				'</span>';
		}
		$lang = $this->languageFactory->getLanguage( $langCode );

		$parserOutput = $parser->getOutput();
		$old = $parserOutput->getPageProperty( 'pagelanguage' );
		if ( $old === null || $arg !== 'pagelanguage_noreplace' ) {
			$parserOutput->setPageProperty( 'pagelanguage', $lang->getCode() );
			self::$cache[$parser->getTitle()->getPrefixedDBKey()] = $lang;
		}

		if ( $old === null || $old === $lang->getCode() || $arg ) {
			return '';
		}
		return '<span class="error">' .
			wfMessage( 'pagelanguage-duplicate' )->inContentLanguage()->params(
				wfEscapeWikiText( $old ), wfEscapeWikiText( $lang->getCode() ) )->text() .
			'</span>';
	}
}
