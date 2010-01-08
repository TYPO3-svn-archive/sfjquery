<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

t3lib_div::loadTCA('tt_content');
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$_EXTKEY.'_pi1']='layout,select_key';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY . '_pi1'] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($_EXTKEY . '_pi1', 'FILE:EXT:' . $_EXTKEY . '/pi1/flexform_ds.xml');


t3lib_extMgm::addPlugin(array(
	'LLL:EXT:sfjquery/locallang_db.xml:tt_content.list_type_pi1',
	$_EXTKEY . '_pi1',
	t3lib_extMgm::extRelPath($_EXTKEY) . 'ext_icon.gif'
),'list_type');


if (TYPO3_MODE == 'BE') {
	$TBE_MODULES_EXT['xMOD_db_new_content_el']['addElClasses']['tx_sfjquery_pi1_wizicon'] = t3lib_extMgm::extPath($_EXTKEY).'pi1/class.tx_sfjquery_pi1_wizicon.php';
}

$TCA['tx_sfjquery_scripts'] = array (
	'ctrl' => array (
		'title'     => 'LLL:EXT:sfjquery/locallang_db.xml:tx_sfjquery_scripts',		
		'label'     => 'name',	
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'default_sortby' => 'ORDER BY name',	
		'delete' => 'deleted',	
		'enablecolumns' => array (		
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'icon_tx_sfjquery_scripts.gif',
	),
);

$tempColumns = array (
	'tx_sfjquery_script' => array (		
		'exclude' => 0,		
		'label' => 'LLL:EXT:sfjquery/locallang_db.xml:tt_content.tx_sfjquery_script',		
		'config' => array (
			'type' => 'select',	
			'items' => array (
				array('',0),
			),
			'foreign_table' => 'tx_sfjquery_scripts',	
			'foreign_table_where' => 'ORDER BY tx_sfjquery_scripts.uid',	
			'size' => 1,	
			'minitems' => 0,
			'maxitems' => 1,	
			"MM" => "tt_content_tx_sfjquery_script_mm",
		)
	),
);


t3lib_div::loadTCA('tt_content');
t3lib_extMgm::addTCAcolumns('tt_content',$tempColumns,1);
t3lib_extMgm::addToAllTCAtypes('tt_content','tx_sfjquery_script;;;;1-1-1');
?>