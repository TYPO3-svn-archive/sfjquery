<?php

########################################################################
# Extension Manager/Repository config file for ext "sfjquery".
#
# Auto generated 02-07-2010 22:38
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'SF jQuery',
	'description' => 'This is an interface between jQuery and TYPO3. Make use of TS and HTML for templating. You can realize accordions, tabs, sliders, prograssbars and datepicker. So programm what ever you want.',
	'category' => 'plugin',
	'author' => 'Stefan Froemken',
	'author_email' => 'firma@sfroemken.de',
	'shy' => '',
	'dependencies' => '',
	'conflicts' => '',
	'priority' => '',
	'module' => '',
	'state' => 'stable',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'author_company' => '',
	'version' => '1.3.6-dev',
	'constraints' => array(
		'depends' => array(
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:98:{s:9:"ChangeLog";s:4:"89bc";s:10:"README.txt";s:4:"9fa9";s:12:"ext_icon.gif";s:4:"5088";s:17:"ext_localconf.php";s:4:"fdfb";s:14:"ext_tables.php";s:4:"a057";s:14:"ext_tables.sql";s:4:"99c6";s:25:"ext_tables_static+adt.sql";s:4:"e46c";s:28:"icon_tx_sfjquery_scripts.png";s:4:"13ad";s:13:"locallang.xml";s:4:"11ea";s:16:"locallang_db.xml";s:4:"e035";s:7:"tca.php";s:4:"30ba";s:14:"doc/manual.sxw";s:4:"b937";s:19:"doc/wizard_form.dat";s:4:"84fc";s:20:"doc/wizard_form.html";s:4:"0f4d";s:36:"hooks/class.tx_sfjquery_othercss.php";s:4:"02fe";s:35:"hooks/class.tx_sfjquery_otherjs.php";s:4:"450b";s:14:"pi1/ce_wiz.gif";s:4:"02b6";s:29:"pi1/class.tx_sfjquery_pi1.php";s:4:"d456";s:37:"pi1/class.tx_sfjquery_pi1_wizicon.php";s:4:"a2c7";s:13:"pi1/clear.gif";s:4:"cc11";s:19:"pi1/flexform_ds.xml";s:4:"69c7";s:17:"pi1/locallang.xml";s:4:"07bd";s:17:"res/ajaxupload.js";s:4:"a205";s:23:"res/jquery-1.4.2.min.js";s:4:"1009";s:31:"res/jquery-ui-1.8.custom.min.js";s:4:"6e75";s:28:"res/jquery.aslideshow.min.js";s:4:"9087";s:31:"res/jquery.effects.blind.min.js";s:4:"bc96";s:32:"res/jquery.effects.bounce.min.js";s:4:"b2d0";s:30:"res/jquery.effects.clip.min.js";s:4:"0d2e";s:30:"res/jquery.effects.core.min.js";s:4:"6c59";s:30:"res/jquery.effects.drop.min.js";s:4:"3721";s:33:"res/jquery.effects.explode.min.js";s:4:"f2a5";s:30:"res/jquery.effects.fade.min.js";s:4:"6b7e";s:30:"res/jquery.effects.fold.min.js";s:4:"7146";s:35:"res/jquery.effects.highlight.min.js";s:4:"aa1a";s:33:"res/jquery.effects.pulsate.min.js";s:4:"0d23";s:31:"res/jquery.effects.scale.min.js";s:4:"1088";s:31:"res/jquery.effects.shake.min.js";s:4:"c4b7";s:31:"res/jquery.effects.slide.min.js";s:4:"e5ae";s:34:"res/jquery.effects.transfer.min.js";s:4:"dfb6";s:30:"res/jquery.ui.accordion.min.js";s:4:"88a1";s:33:"res/jquery.ui.autocomplete.min.js";s:4:"d9de";s:27:"res/jquery.ui.button.min.js";s:4:"9644";s:25:"res/jquery.ui.core.min.js";s:4:"59d3";s:31:"res/jquery.ui.datepicker.min.js";s:4:"f6bf";s:27:"res/jquery.ui.dialog.min.js";s:4:"64c5";s:30:"res/jquery.ui.draggable.min.js";s:4:"2c77";s:30:"res/jquery.ui.droppable.min.js";s:4:"c34a";s:26:"res/jquery.ui.mouse.min.js";s:4:"9c29";s:29:"res/jquery.ui.position.min.js";s:4:"44c7";s:32:"res/jquery.ui.progressbar.min.js";s:4:"120b";s:30:"res/jquery.ui.resizable.min.js";s:4:"68c8";s:31:"res/jquery.ui.selectable.min.js";s:4:"6d22";s:27:"res/jquery.ui.slider.min.js";s:4:"253f";s:29:"res/jquery.ui.sortable.min.js";s:4:"cb4f";s:25:"res/jquery.ui.tabs.min.js";s:4:"8b7e";s:27:"res/jquery.ui.widget.min.js";s:4:"bcef";s:21:"res/pi1_template.html";s:4:"6e09";s:17:"res/reflection.js";s:4:"1f60";s:38:"res/dark-hive/jquery-ui-1.8.custom.css";s:4:"cf84";s:52:"res/dark-hive/images/ui-bg_flat_30_cccccc_40x100.png";s:4:"5603";s:52:"res/dark-hive/images/ui-bg_flat_50_5c5c5c_40x100.png";s:4:"5a2b";s:52:"res/dark-hive/images/ui-bg_glass_40_ffc73d_1x400.png";s:4:"1c6d";s:61:"res/dark-hive/images/ui-bg_highlight-hard_20_0972a5_1x100.png";s:4:"3efe";s:61:"res/dark-hive/images/ui-bg_highlight-soft_33_003147_1x100.png";s:4:"9f6c";s:61:"res/dark-hive/images/ui-bg_highlight-soft_35_222222_1x100.png";s:4:"ba03";s:61:"res/dark-hive/images/ui-bg_highlight-soft_44_444444_1x100.png";s:4:"493a";s:61:"res/dark-hive/images/ui-bg_highlight-soft_80_eeeeee_1x100.png";s:4:"c101";s:51:"res/dark-hive/images/ui-bg_loop_25_000000_21x21.png";s:4:"44a9";s:48:"res/dark-hive/images/ui-icons_222222_256x240.png";s:4:"ebe6";s:48:"res/dark-hive/images/ui-icons_4b8e0b_256x240.png";s:4:"942d";s:48:"res/dark-hive/images/ui-icons_a83300_256x240.png";s:4:"7c9d";s:48:"res/dark-hive/images/ui-icons_cccccc_256x240.png";s:4:"3f3a";s:48:"res/dark-hive/images/ui-icons_ffffff_256x240.png";s:4:"342b";s:39:"res/jquery.aslideshow/shadow/styles.css";s:4:"ed0b";s:51:"res/jquery.aslideshow/shadow/images/ajax-loader.gif";s:4:"5fa2";s:47:"res/jquery.aslideshow/shadow/images/buttons.png";s:4:"9144";s:44:"res/jquery.aslideshow/shadow/images/play.png";s:4:"7118";s:39:"res/jquery.aslideshow/simple/styles.css";s:4:"a293";s:51:"res/jquery.aslideshow/simple/images/ajax-loader.gif";s:4:"5fa2";s:48:"res/jquery.aslideshow/simple/images/big-play.png";s:4:"668c";s:47:"res/jquery.aslideshow/simple/images/buttons.png";s:4:"0717";s:36:"res/le-frog/jquery-ui-1.8.custom.css";s:4:"70b7";s:59:"res/le-frog/images/ui-bg_diagonals-small_0_aaaaaa_40x40.png";s:4:"1fa4";s:60:"res/le-frog/images/ui-bg_diagonals-thick_15_444444_40x40.png";s:4:"e287";s:60:"res/le-frog/images/ui-bg_diagonals-thick_95_ffdc2e_40x40.png";s:4:"af60";s:50:"res/le-frog/images/ui-bg_glass_55_fbf5d0_1x400.png";s:4:"9871";s:59:"res/le-frog/images/ui-bg_highlight-hard_30_285c00_1x100.png";s:4:"5bf4";s:59:"res/le-frog/images/ui-bg_highlight-soft_33_3a8104_1x100.png";s:4:"3767";s:59:"res/le-frog/images/ui-bg_highlight-soft_50_4eb305_1x100.png";s:4:"b971";s:59:"res/le-frog/images/ui-bg_highlight-soft_60_4ca20b_1x100.png";s:4:"f4e7";s:55:"res/le-frog/images/ui-bg_inset-soft_10_285c00_1x100.png";s:4:"98d7";s:46:"res/le-frog/images/ui-icons_4eb305_256x240.png";s:4:"6d18";s:46:"res/le-frog/images/ui-icons_72b42d_256x240.png";s:4:"00a9";s:46:"res/le-frog/images/ui-icons_cd0a0a_256x240.png";s:4:"3e45";s:46:"res/le-frog/images/ui-icons_ffffff_256x240.png";s:4:"342b";s:29:"static/sfjquery/constants.txt";s:4:"a163";s:25:"static/sfjquery/setup.txt";s:4:"b720";}',
	'suggests' => array(
	),
);

?>