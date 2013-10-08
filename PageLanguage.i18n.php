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

/** Message documentation (Message documentation)
 * @author Shirayuki
 */
$messages['qqq'] = array(
	'pagelanguage-desc' => '{{desc|name=Page Language|url=http://www.mediawiki.org/wiki/Extension:PageLanguage}}',
	'pagelanguage-invalid' => 'Error message when an invalid language is used. Parameters:
* $1 - the language code which is used',
	'pagelanguage-duplicate' => 'Error message when a different language is set overriding a previous one.

Parameters:
* $1 - the language code set previously
* $2 - the language code being set now',
);

/** German (Deutsch)
 * @author Metalhead64
 */
$messages['de'] = array(
	'pagelanguage-desc' => 'Ermöglicht die Definierung der Seitensprache pro Seite',
	'pagelanguage-invalid' => "'''Warnung:''' Der ungültige Sprachcode „$1“ für die Seitensprache wird ignoriert.",
	'pagelanguage-duplicate' => "'''Warnung:''' Die Seitensprache „$2“ überschreibt die frühere Seitensprache „$1“.",
);

/** French (français)
 * @author Gomoko
 */
$messages['fr'] = array(
	'pagelanguage-desc' => 'Définir la langue de la page par page',
	'pagelanguage-invalid' => "'''Attention :''' Code de langue « $1 » non valide pour la langue de la page.",
	'pagelanguage-duplicate' => "'''Attention :''' La langue de la page « $2 » écrase la précédente langue de la page « $1 ».",
);

/** Japanese (日本語)
 * @author Shirayuki
 */
$messages['ja'] = array(
	'pagelanguage-desc' => 'ページごとにページ言語を定義する',
	'pagelanguage-invalid' => "'''警告:''' ページの言語として無効な言語コード「$1」を無視しています。",
	'pagelanguage-duplicate' => "'''警告:''' ページ言語「$2」が、それ以前に定義されたページ言語「$1」よりも優先されます。",
);

/** Swedish (svenska)
 * @author WikiPhoenix
 */
$messages['sv'] = array(
	'pagelanguage-duplicate' => '\'\'\'Varning:\'\'\' Sidspråket "$2" åsidosätter det tidigare sidspråket "$1".',
);

/** Yiddish (ייִדיש)
 * @author פוילישער
 */
$messages['yi'] = array(
	'pagelanguage-desc' => 'דעפֿינירן בלאט שפראך פאר בלאט',
	'pagelanguage-invalid' => "'''ווארענונג:''' איגנארירן אומגילטיקן שפראך־קאד \"\$1\" פאר בלאטשפראך.",
	'pagelanguage-duplicate' => '\'\'\'ווארענונג:\'\'\' בלאטשפראך "$2" שרײַבט איבער פריערדיקע בלאטשפראך "$1".',
);
