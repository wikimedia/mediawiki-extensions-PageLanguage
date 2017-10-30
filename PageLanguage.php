<?php

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'Not a valid entry point' );
}

$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'Page Language',
	'author' => array( 'Liangent' ),
	'url' => 'https://www.mediawiki.org/wiki/Extension:PageLanguage',
	'descriptionmsg' => 'pagelanguage-desc',
);

$dir = __DIR__;

$wgAutoloadClasses['PageLanguage'] = "$dir/PageLanguage.body.php";

$wgMessagesDirs['PageLanguage'] = __DIR__ . '/i18n';
$wgExtensionMessagesFiles['PageLanguageMagic'] =  "$dir/PageLanguage.magic.php";

$wgHooks['PageContentLanguage'][] = 'PageLanguage::onPageContentLanguage';
$wgHooks['ParserFirstCallInit'][] = 'PageLanguage::onParserFirstCallInit';
