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

/** Danish (dansk)
 * @author Christian List
 */
$messages['da'] = array(
	'pagelanguage-desc' => 'Angive indstillinger for sprog per side',
	'pagelanguage-invalid' => "'''Advarsel:''' ignorerer ugyldig sprogkode \"\$1\" for sproget på siden.",
	'pagelanguage-duplicate' => '\'\'\'Advarsel:\'\'\' sproget "$2" tilsidesætter det tidligere sprog på siden "$1".',
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

/** Galician (galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'pagelanguage-desc' => 'Define a lingua da páxina en cada páxina',
	'pagelanguage-invalid' => "'''Atención:''' Ignórase o código de lingua \"\$1\" non válido para a lingua da páxina.",
	'pagelanguage-duplicate' => '\'\'\'Atención:\'\'\' A lingua "$2" da páxina sobrescribe a anterior lingua "$1" da páxina.',
);

/** Japanese (日本語)
 * @author Shirayuki
 */
$messages['ja'] = array(
	'pagelanguage-desc' => 'ページごとにページ言語を定義する',
	'pagelanguage-invalid' => "'''警告:''' ページの言語として無効な言語コード「$1」を無視しています。",
	'pagelanguage-duplicate' => "'''警告:''' ページ言語「$2」が、それ以前に定義されたページ言語「$1」よりも優先されます。",
);

/** Korean (한국어)
 * @author Hym411
 */
$messages['ko'] = array(
	'pagelanguage-desc' => '페이지별로 페이지 언어 정의',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'pagelanguage-desc' => 'Sprooch vun der Säit pro Säit definéieren',
	'pagelanguage-invalid' => "'''Opgepasst:''' Den net valabele Sproochcode ''$1'' fir Sprooch vun der Säit gëtt ignoréiert.",
	'pagelanguage-duplicate' => "'''Opgepass:''' D'Sprooch vun der Säit ''$2'' iwwerschreift déi vireg Sprooch vun der Säit ''$1''.",
);

/** Macedonian (македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'pagelanguage-desc' => 'Задавање на јазик за секоја страница посебно',
	'pagelanguage-invalid' => "'''Предупредување:''' Го занемарувам невважечкиот јазичен код „$1“ за јазикот на страницата.",
	'pagelanguage-duplicate' => "'''Предупредување:''' Јазикот „$2“ ќе го замени претходниот јазик на страницата („$1“).",
);

/** Polish (polski)
 * @author Woytecr
 */
$messages['pl'] = array(
	'pagelanguage-desc' => 'Określa język dla każdej strony',
	'pagelanguage-invalid' => "'''Ostrzeżenie:''' Zignorowano nieprawidłowy kod języka \"\$1\" dla języka strony.",
	'pagelanguage-duplicate' => '\'\'\'Ostrzeżenie:\'\'\' Język strony "$2" zastępuje wcześniejszy język "$1".',
);

/** Russian (русский)
 * @author Okras
 */
$messages['ru'] = array(
	'pagelanguage-desc' => 'Определяет язык страницы на страницу',
	'pagelanguage-invalid' => "'''Предупреждение:''' недопустимый код языка «$1» для языка страницы игнорируется.",
	'pagelanguage-duplicate' => "'''Предупреждение:''' язык страницы «$2» переопределяет ранее заданный язык страницы «$1».",
);

/** Swedish (svenska)
 * @author WikiPhoenix
 */
$messages['sv'] = array(
	'pagelanguage-duplicate' => '\'\'\'Varning:\'\'\' Sidspråket "$2" åsidosätter det tidigare sidspråket "$1".',
);

/** Ukrainian (українська)
 * @author Andriykopanytsia
 */
$messages['uk'] = array(
	'pagelanguage-desc' => 'Визначати мову сторінки на сторінку',
	'pagelanguage-invalid' => '"Попередження:" ігнорування неприпустимого мовного коду " $1" для мови сторінки.',
	'pagelanguage-duplicate' => '"Попередження:" мова сторінки "$2" переписала мову сторінки "$1".',
);

/** Yiddish (ייִדיש)
 * @author פוילישער
 */
$messages['yi'] = array(
	'pagelanguage-desc' => 'דעפֿינירן בלאט שפראך פאר בלאט',
	'pagelanguage-invalid' => "'''ווארענונג:''' איגנארירן אומגילטיקן שפראך־קאד \"\$1\" פאר בלאטשפראך.",
	'pagelanguage-duplicate' => '\'\'\'ווארענונג:\'\'\' בלאטשפראך "$2" שרײַבט איבער פריערדיקע בלאטשפראך "$1".',
);

/** Simplified Chinese (中文（简体）‎)
 * @author Qiyue2001
 */
$messages['zh-hans'] = array(
	'pagelanguage-desc' => '定义每页的网页语言',
	'pagelanguage-invalid' => "'' 警告: '' 将忽略使用无效的语言代码“$1”定义网页语言。",
	'pagelanguage-duplicate' => "'' 警告: '' 页面语言“$2”将覆盖之前的页面语言“$1”。",
);
