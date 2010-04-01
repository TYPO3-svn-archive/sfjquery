<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

t3lib_extMgm::addPItoST43($_EXTKEY, 'pi1/class.tx_sfjquery_pi1.php', '_pi1', 'list_type', 1);

//$extConf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['sfjquery']);
//$TYPO3_CONF_VARS['EXTCONF']['sfjquery']['otherJS'][] = 'EXT:'.$_EXTKEY.'/hooks/class.tx_sfjquery_otherjs.php:tx_sfjquery_otherjs->addJavaScript';

t3lib_extMgm::addUserTSConfig('
	options.saveDocNew.tx_sfjquery_scripts=1
');
?>