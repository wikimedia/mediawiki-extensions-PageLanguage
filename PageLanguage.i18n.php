<?php
/**
 * Internationalisation file for PageLanguage extension.
 *
 * @file
 * @ingroup Extensions
 */

$messages = array();

/** English */
$messages['en'] = array(
	'pagelanguage-desc' => "Define page language per page",
	'pagelanguage-invalid' => "'''Warning:''' Ignoring invalid language code \"$1\" for page language.",
	'pagelanguage-duplicate' => "'''Warning:''' Page language \"$2\" overrides earlier page language \"$1\".",
);

/** Message documentation (Message documentation) */
$messages['qqq'] = array(
	'pagelanguage-desc' => '{{desc|name=Page Language|url=http://www.mediawiki.org/wiki/Extension:PageLanguage}}',
	'pagelanguage-invalid' => 'Error message when an invalid language is used. $1 for the language code used.',
	'pagelanguage-duplicate' => 'Error message when a different language is set overriding a previous one.

Parameters:
* $1: the language code set previously
* $2: the language code being set now',
);
