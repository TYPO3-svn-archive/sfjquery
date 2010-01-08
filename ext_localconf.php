<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

t3lib_extMgm::addPItoST43($_EXTKEY, 'pi1/class.tx_sfjquery_pi1.php', '_pi1', 'list_type', 1);

$TYPO3_CONF_VARS['FE']['eID_include']['sfjquery-contact'] = 'EXT:sfjquery/ajax/contact.php';

$extConf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['sfjquery']);
if($extConf['addPluginAjaxupload']) {
	$TYPO3_CONF_VARS['EXTCONF']['sfjquery']['otherJS'][] = 'EXT:'.$_EXTKEY.'/hooks/class.tx_sfjquery_otherjs.php:tx_sfjquery_otherjs->additionalJS';
}

t3lib_extMgm::addUserTSConfig('
	options.saveDocNew.tx_sfjquery_scripts=1
');
?>