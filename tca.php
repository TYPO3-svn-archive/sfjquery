<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_sfjquery_scripts'] = array (
	'ctrl' => $TCA['tx_sfjquery_scripts']['ctrl'],
	'interface' => array (
		'showRecordFieldList' => 'hidden,name,domscript,domscriptfile,outscript,outscriptfile,content,htmlfile,ts,tsfile,cssuifile,css'
	),
	'feInterface' => $TCA['tx_sfjquery_scripts']['feInterface'],
	'columns' => array (
		'hidden' => array (		
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array (
				'type'    => 'check',
				'default' => '0'
			)
		),
		'name' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:sfjquery/locallang_db.xml:tx_sfjquery_scripts.name',		
			'config' => array (
				'type' => 'input',	
				'size' => '30',
			)
		),
		'domscript' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:sfjquery/locallang_db.xml:tx_sfjquery_scripts.domscript',		
			'config' => array (
				'type' => 'text',
				'wrap' => 'OFF',
				'cols' => '30',	
				'rows' => '5',
			)
		),
		'domscriptfile' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:sfjquery/locallang_db.xml:tx_sfjquery_scripts.domscriptfile',		
			'config' => array (
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => '',	
				'disallowed' => 'php,php3',	
				'max_size' => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'],	
				'uploadfolder' => 'uploads/tx_sfjquery',
				'size' => 1,	
				'minitems' => 0,
				'maxitems' => 1,
			)
		),
		'outscript' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:sfjquery/locallang_db.xml:tx_sfjquery_scripts.outscript',		
			'config' => array (
				'type' => 'text',
				'wrap' => 'OFF',
				'cols' => '30',	
				'rows' => '5',
			)
		),
		'outscriptfile' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:sfjquery/locallang_db.xml:tx_sfjquery_scripts.outscriptfile',		
			'config' => array (
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => '',	
				'disallowed' => 'php,php3',	
				'max_size' => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'],	
				'uploadfolder' => 'uploads/tx_sfjquery',
				'size' => 1,	
				'minitems' => 0,
				'maxitems' => 1,
			)
		),
		'content' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:sfjquery/locallang_db.xml:tx_sfjquery_scripts.content',		
			'config' => array (
				'type' => 'text',
				'wrap' => 'OFF',
				'cols' => '30',	
				'rows' => '5',
			)
		),
		'htmlfile' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:sfjquery/locallang_db.xml:tx_sfjquery_scripts.htmlfile',		
			'config' => array (
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => '',	
				'disallowed' => 'php,php3',	
				'max_size' => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'],	
				'uploadfolder' => 'uploads/tx_sfjquery',
				'size' => 1,	
				'minitems' => 0,
				'maxitems' => 1,
			)
		),
		'ts' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:sfjquery/locallang_db.xml:tx_sfjquery_scripts.ts',		
			'config' => array (
				'type' => 'text',
				'wrap' => 'OFF',
				'cols' => '30',	
				'rows' => '5',
			)
		),
		'tsfile' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:sfjquery/locallang_db.xml:tx_sfjquery_scripts.tsfile',		
			'config' => array (
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => '',	
				'disallowed' => 'php,php3',	
				'max_size' => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'],	
				'uploadfolder' => 'uploads/tx_sfjquery',
				'size' => 1,	
				'minitems' => 0,
				'maxitems' => 1,
			)
		),
		'cssuifile' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:sfjquery/locallang_db.xml:tx_sfjquery_scripts.cssuifile',		
			'config' => array (
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => '',	
				'disallowed' => 'php,php3',	
				'max_size' => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'],	
				'uploadfolder' => 'uploads/tx_sfjquery',
				'size' => 1,	
				'minitems' => 0,
				'maxitems' => 1,
			)
		),
		'css' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:sfjquery/locallang_db.xml:tx_sfjquery_scripts.css',		
			'config' => array (
				'type' => 'text',
				'wrap' => 'OFF',
				'cols' => '30',	
				'rows' => '5',
			)
		),
	),
	'types' => array (
		'0' => array('showitem' => 'hidden;;1;;1-1-1, name, domscript, domscriptfile, outscript, outscriptfile, content, htmlfile, ts, tsfile, cssuifile, css')
	),
	'palettes' => array (
		'1' => array('showitem' => '')
	)
);
?>