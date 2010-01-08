<?php

########################################################################
# Extension Manager/Repository config file for ext "sfjquery".
#
# Auto generated 08-01-2010 14:54
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'SF jQuery',
	'description' => 'Program your own jQuery-Scripts',
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
	'version' => '0.0.0',
	'constraints' => array(
		'depends' => array(
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:57:{s:9:"ChangeLog";s:4:"942f";s:10:"README.txt";s:4:"9fa9";s:21:"ext_conf_template.txt";s:4:"cb20";s:12:"ext_icon.gif";s:4:"5088";s:17:"ext_localconf.php";s:4:"1db4";s:14:"ext_tables.php";s:4:"1155";s:14:"ext_tables.sql";s:4:"99c6";s:28:"icon_tx_sfjquery_scripts.png";s:4:"13ad";s:13:"locallang.xml";s:4:"61b2";s:16:"locallang_db.xml";s:4:"e035";s:7:"tca.php";s:4:"30ba";s:16:"ajax/contact.php";s:4:"5875";s:14:"doc/manual.sxw";s:4:"bdbc";s:19:"doc/wizard_form.dat";s:4:"ce5f";s:20:"doc/wizard_form.html";s:4:"1031";s:35:"hooks/class.tx_sfjquery_otherjs.php";s:4:"6cb8";s:14:"pi1/ce_wiz.gif";s:4:"02b6";s:29:"pi1/class.tx_sfjquery_pi1.php";s:4:"40ad";s:37:"pi1/class.tx_sfjquery_pi1_wizicon.php";s:4:"a2c7";s:13:"pi1/clear.gif";s:4:"cc11";s:19:"pi1/flexform_ds.xml";s:4:"69c7";s:17:"pi1/locallang.xml";s:4:"07bd";s:17:"res/ajaxupload.js";s:4:"a205";s:23:"res/jquery-1.3.2.min.js";s:4:"7d91";s:33:"res/jquery-ui-1.7.2.custom.min.js";s:4:"8854";s:21:"res/pi1_template.html";s:4:"56d9";s:40:"res/dark-hive/jquery-ui-1.7.2.custom.css";s:4:"522c";s:52:"res/dark-hive/images/ui-bg_flat_30_cccccc_40x100.png";s:4:"5603";s:52:"res/dark-hive/images/ui-bg_flat_50_5c5c5c_40x100.png";s:4:"5a2b";s:52:"res/dark-hive/images/ui-bg_glass_40_ffc73d_1x400.png";s:4:"1c6d";s:61:"res/dark-hive/images/ui-bg_highlight-hard_20_0972a5_1x100.png";s:4:"ccb9";s:61:"res/dark-hive/images/ui-bg_highlight-soft_33_003147_1x100.png";s:4:"9f6c";s:61:"res/dark-hive/images/ui-bg_highlight-soft_35_222222_1x100.png";s:4:"ba03";s:61:"res/dark-hive/images/ui-bg_highlight-soft_44_444444_1x100.png";s:4:"493a";s:61:"res/dark-hive/images/ui-bg_highlight-soft_80_eeeeee_1x100.png";s:4:"c101";s:51:"res/dark-hive/images/ui-bg_loop_25_000000_21x21.png";s:4:"44a9";s:48:"res/dark-hive/images/ui-icons_222222_256x240.png";s:4:"9129";s:48:"res/dark-hive/images/ui-icons_4b8e0b_256x240.png";s:4:"12cc";s:48:"res/dark-hive/images/ui-icons_a83300_256x240.png";s:4:"0c45";s:48:"res/dark-hive/images/ui-icons_cccccc_256x240.png";s:4:"22b8";s:48:"res/dark-hive/images/ui-icons_ffffff_256x240.png";s:4:"2cc8";s:38:"res/le-frog/jquery-ui-1.7.2.custom.css";s:4:"a1b4";s:59:"res/le-frog/images/ui-bg_diagonals-small_0_aaaaaa_40x40.png";s:4:"1fa4";s:60:"res/le-frog/images/ui-bg_diagonals-thick_15_444444_40x40.png";s:4:"e287";s:60:"res/le-frog/images/ui-bg_diagonals-thick_95_ffdc2e_40x40.png";s:4:"905c";s:50:"res/le-frog/images/ui-bg_glass_55_fbf5d0_1x400.png";s:4:"9871";s:59:"res/le-frog/images/ui-bg_highlight-hard_30_285c00_1x100.png";s:4:"5bf4";s:59:"res/le-frog/images/ui-bg_highlight-soft_33_3a8104_1x100.png";s:4:"b7a0";s:59:"res/le-frog/images/ui-bg_highlight-soft_50_4eb305_1x100.png";s:4:"b971";s:59:"res/le-frog/images/ui-bg_highlight-soft_60_4ca20b_1x100.png";s:4:"f4e7";s:55:"res/le-frog/images/ui-bg_inset-soft_10_285c00_1x100.png";s:4:"98d7";s:46:"res/le-frog/images/ui-icons_4eb305_256x240.png";s:4:"c1d5";s:46:"res/le-frog/images/ui-icons_72b42d_256x240.png";s:4:"da22";s:46:"res/le-frog/images/ui-icons_cd0a0a_256x240.png";s:4:"5d88";s:46:"res/le-frog/images/ui-icons_ffffff_256x240.png";s:4:"2cc8";s:29:"static/sfjquery/constants.txt";s:4:"8224";s:25:"static/sfjquery/setup.txt";s:4:"d41d";}',
);

?>