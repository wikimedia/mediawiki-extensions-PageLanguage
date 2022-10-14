<?php

use MediaWiki\Content\Hook\PageContentLanguageHook;
use MediaWiki\Hook\ParserFirstCallInitHook;
use MediaWiki\Languages\LanguageFactory;
use MediaWiki\Languages\LanguageNameUtils;
use MediaWiki\MediaWikiServices;

class PageLanguage implements
	PageContentLanguageHook,
	ParserFirstCallInitHook
{

	private static $cache = [];

	/** @var LanguageFactory */
	private $languageFactory;

	/** @var LanguageNameUtils */
	private $languageNameUtils;

	/**
	 * @param LanguageFactory $languageFactory
	 * @param LanguageNameUtils $languageNameUtils
	 */
	public function __construct(
		LanguageFactory $languageFactory,
		LanguageNameUtils $languageNameUtils
	) {
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
			$dbr = wfGetDB( DB_REPLICA );
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
		$parser->setFunctionHook( 'pagelanguage', 'PageLanguage::funcPageLanguage', Parser::SFH_NO_HASH );
	}

	public static function funcPageLanguage( Parser $parser, $langCode, $uarg = '' ) {
		static $magicWords = null;
		if ( $magicWords === null ) {
			$magicWords = new MagicWordArray( [ 'pagelanguage_noerror', 'pagelanguage_noreplace' ] );
		}
		$arg = $magicWords->matchStartToEnd( $uarg );

		$langCode = trim( $langCode );
		if ( strlen( $langCode ) === 0 ) {
			return '';
		}

		$services = MediaWikiServices::getInstance();
		if ( $services->getLanguageNameUtils()->isValidCode( $langCode ) ) {
			$lang = $services->getLanguageFactory()->getLanguage( $langCode );
		} else {
			return '<span class="error">' .
				wfMessage( 'pagelanguage-invalid' )->inContentLanguage()
					->params( wfEscapeWikiText( $langCode ) )->text() .
				'</span>';
		}

		$parserOutput = $parser->getOutput();
		if ( method_exists( $parserOutput, 'getPageProperty' ) ) {
			// MW 1.38
			$old = $parserOutput->getPageProperty( 'pagelanguage' );
		} else {
			$old = $parserOutput->getProperty( 'pagelanguage' );
			if ( $old === false ) {
				$old = null;
			}
		}
		if ( $old === null || $arg !== 'pagelanguage_noreplace' ) {
			if ( method_exists( $parserOutput, 'setPageProperty' ) ) {
				// MW 1.38
				$parserOutput->setPageProperty( 'pagelanguage', $lang->getCode() );
			} else {
				$parserOutput->setProperty( 'pagelanguage', $lang->getCode() );
			}
			self::$cache[$parser->getTitle()->getPrefixedDBKey()] = $lang;
		}

		if ( $old === null || $old === $lang->getCode() || $arg ) {
			return '';
		} else {
			return '<span class="error">' .
				wfMessage( 'pagelanguage-duplicate' )->inContentLanguage()->params(
					wfEscapeWikiText( $old ), wfEscapeWikiText( $lang->getCode() ) )->text() .
				'</span>';
		}
	}
}
