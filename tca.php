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
				'type' => 'input',	
				'size' => '30',	
				'wizards' => array(
					'_PADDING' => 2,
					'link' => array(
						'type' => 'popup',
						'title' => 'Link',
						'icon' => 'link_popup.gif',
						'script' => 'browse_links.php?mode=wizard',
						'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1'
					),
				),
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
				'type' => 'input',	
				'size' => '30',	
				'wizards' => array(
					'_PADDING' => 2,
					'link' => array(
						'type' => 'popup',
						'title' => 'Link',
						'icon' => 'link_popup.gif',
						'script' => 'browse_links.php?mode=wizard',
						'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1'
					),
				),
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
				'type' => 'input',	
				'size' => '30',	
				'wizards' => array(
					'_PADDING' => 2,
					'link' => array(
						'type' => 'popup',
						'title' => 'Link',
						'icon' => 'link_popup.gif',
						'script' => 'browse_links.php?mode=wizard',
						'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1'
					),
				),
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
				'type' => 'input',	
				'size' => '30',	
				'wizards' => array(
					'_PADDING' => 2,
					'link' => array(
						'type' => 'popup',
						'title' => 'Link',
						'icon' => 'link_popup.gif',
						'script' => 'browse_links.php?mode=wizard',
						'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1'
					),
				),
			)
		),
		'cssuifile' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:sfjquery/locallang_db.xml:tx_sfjquery_scripts.cssuifile',		
			'config' => array (
				'type' => 'input',	
				'size' => '30',	
				'wizards' => array(
					'_PADDING' => 2,
					'link' => array(
						'type' => 'popup',
						'title' => 'Link',
						'icon' => 'link_popup.gif',
						'script' => 'browse_links.php?mode=wizard',
						'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1'
					),
				),
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
		'0' => array('showitem' => '--div--;name,hidden;;1;;1-1-1, name, --div--;JavaScript, domscript;;;enable-tab;, domscriptfile, outscript;;;enable-tab;, outscriptfile, --div--;HTML, content;;;enable-tab;, htmlfile, --div--;TypoScript, ts;;;enable-tab;, tsfile, --div--;CSS, cssuifile, css;;;enable-tab;')
	),
	'palettes' => array (
		'1' => array('showitem' => '')
	)
);
?>