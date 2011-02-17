<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2009 Stefan Froemken <firma@sfroemken.de>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/
/**
 * [CLASS/FUNCTION INDEX of SCRIPT]
 *
 * Hint: use extdeveval to insert/update function index above.
 */

require_once(PATH_tslib.'class.tslib_pibase.php');


/**
 * Plugin 'SF jQuery' for the 'sfjquery' extension.
 *
 * @author	Stefan Froemken <firma@sfroemken.de>
 * @package	TYPO3
 * @subpackage	tx_sfjquery_pi1
 */
class tx_sfjquery_pi1 extends tslib_pibase {
	var $prefixId      = 'tx_sfjquery_pi1';		// Same as class name
	var $scriptRelPath = 'pi1/class.tx_sfjquery_pi1.php';	// Path to this script relative to the extension dir.
	var $extKey        = 'sfjquery';	// The extension key.
	var $pi_checkCHash = true;

	var $jqueryPath    = '';
	var $jqueryUIPath  = '';
	var $jqueryFile    = 'jquery-1.4.4.min.js';
	var $jqueryUIFile  = 'jquery-ui-1.8.9.custom.min.js';
	var $templateHead  = '/res/pi1_template.html';


	/**
	 * The main method of the PlugIn
	 *
	 * @param	string		$content: The PlugIn content
	 * @param	array		$conf: The PlugIn configuration
	 * @return	The content that is displayed on the website
	 */
	function main($content, $conf) {
		$this->conf = $conf;
		$this->pi_setPiVarDefaults();
		$this->pi_loadLL();

		//Init this plugin
		$this->init();

		// include jQuery-Scripts onto page
		$this->template['jquery'] = $this->cObj->getSubpart(
			$this->template['total'], '###JQUERY###'
		);

		$markerArray['###JQUERY_PATH###'] = $this->jqueryPath;

		if($this->conf['enableMoreJquery'] == 1) {
			$markerArray['###JQUERY_UI_PATH###'] = $this->jqueryUIPath;
		} else {
			$subpartArray['###JQUERY_UI###'] = '';
		}

		//Hook
		//include other/additional JavaScript files
		if(isset($GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['otherJS'])) {
			//Get template for including other js-files
			$subpartOthers = $this->cObj->getSubpart(
				$this->template['jquery'],
				'###JQUERY_OTHERS###'
			);
			foreach($GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['otherJS'] as $userFunc) {
				$params = array();
				$otherJSpath .= t3lib_div::callUserFunction($userFunc, $params, $this).',';
			}
			$otherJSpath = t3lib_div::uniqueList($otherJSpath);
			$otherJSpath_arr = t3lib_div::trimExplode(',', $otherJSpath);
			foreach($otherJSpath_arr as $value) {
				if(is_file($value)) {
					$subpartArray['###JQUERY_OTHERS###'] .= $this->cObj->substituteMarkerArray(
						$subpartOthers, array(
							'###JQUERY_OTHERS_PATH###' =>	htmlspecialchars($value)
						)
					);
				} else {
					$subpartArray['###JQUERY_OTHERS###'] .= '';
				}
			}
		} else {
			$subpartArray['###JQUERY_OTHERS###'] = '';
		}

		//Hook
		//include other/additional CSS files
		if(isset($GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['otherCSS'])) {
			//Get template for including other css-files
			$subpartOtherCSS = $this->cObj->getSubpart(
				$this->template['jquery'],
				'###JQUERY_OTHER_CSS###'
			);
			foreach($GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['otherCSS'] as $userFunc) {
				$params = array();
				$otherCSSpath .= t3lib_div::callUserFunction($userFunc, $params, $this).',';
			}
			$otherCSSpath = t3lib_div::uniqueList($otherCSSpath);
			$otherCSSpath_arr = t3lib_div::trimExplode(',', $otherCSSpath);
			foreach($otherCSSpath_arr as $value) {
				if(is_file($value)) {
					$subpartArray['###JQUERY_OTHER_CSS###'] .= $this->cObj->substituteMarkerArray(
						$subpartOtherCSS, array(
							'###JQUERY_OTHER_CSS_PATH###' =>	htmlspecialchars($value)
						)
					);
				} else {
					$subpartArray['###JQUERY_OTHER_CSS###'] .= '';
				}
			}
		} else {
			$subpartArray['###JQUERY_OTHER_CSS###'] = '';
		}

		//Ensure that header part is added only once to the page
		//and check if sfjquery should be used only as template engine
		$key = $this->prefixId.'_'.md5($this->template['jquery']);
		if(!isset($GLOBALS['TSFE']->additionalHeaderData[$key]) && !$this->conf['useAsTemplateMachine']) {
			$GLOBALS['TSFE']->additionalHeaderData[$key] =
				$this->cObj->substituteMarkerArrayCached(
					$this->template['jquery'], $markerArray, $subpartArray
				);
		}

		//Concat variables, if plugin was inserted more than once.
		$GLOBALS['TSFE']->register['sfStyleSheet'] .= $this->conf['style']."\n";
		$GLOBALS['TSFE']->register['sfDomScript'] .= $this->conf['domscript']."\n";
		if(is_file($this->conf['domFile'])) $GLOBALS['TSFE']->register['sfDomScript'] .= file_get_contents($this->conf['domFile'])."\n";
		$GLOBALS['TSFE']->register['sfOutScript'] .= $this->conf['outscript']."\n";
		if(is_file($this->conf['outFile'])) $GLOBALS['TSFE']->register['sfDomScript'] .= file_get_contents($this->conf['outFile'])."\n";

		//Templating CSS-File
		if(trim($this->conf['cssFile']) != '') {
			$this->template['cssFile'] = $this->cObj->getSubpart(
				$this->template['total'], '###CSS_FILE###');
			$GLOBALS['TSFE']->additionalHeaderData['cssFile'] =
				$this->cObj->substituteMarker(
					$this->template['cssFile'],
					'###CSS_PATH###',
					trim($this->conf['cssFile'])
			);
		}

		(trim($GLOBALS['TSFE']->register['sfStyleSheet']) != '')? $styleSheet = "<style type='text/css'>\n".$GLOBALS['TSFE']->register['sfStyleSheet']."\n</style>\n" : $styleSheet='';
		(trim($GLOBALS['TSFE']->register['sfDomScript']) != '')? $domReady = $GLOBALS['TSFE']->register['sfDomScript']."\n" : $domReady = '';
		(trim($GLOBALS['TSFE']->register['sfOutScript']) != '')? $outScript = $GLOBALS['TSFE']->register['sfOutScript']."\n" : $outScript = '';

		//Check compatibility mode
		if($this->conf['activateCompatibilityMode'] == 1) {
			$compatibility = 'jQuery(document).ready(function($) {'.CHR(10);
		} else {
			$compatibility = '$(document).ready(function() {'.CHR(10);
		}

		//Insert user scripts
		$headerData =	$styleSheet;
		if(!$this->conf['useAsTemplateMachine']) {
			$headerData .= '<script type="text/javascript">'.CHR(10).
			$compatibility.$domReady.'});'.CHR(10).
			$outScript.'</script>';
		}
		$GLOBALS['TSFE']->additionalHeaderData[100] = $headerData;

		$imgObj = t3lib_div::makeInstance('tx_sfjquery_images', $this->conf);
        $content_img = $imgObj->generateImagesContent();

		//Templating HTML-Area
		$content = $this->cObj->substituteMarkerArray(
			$this->conf['content'], array(
				'###IMG###' => $content_img,
			)
		);

		//If TS-field is filled, then generate HTML-content
		if(trim($this->conf['ts']) != '') {
			//If there is content in HTML...include it to TS
			if(trim($this->conf['content']) != '') {
				$this->conf['ts'] = '
					temp.template = TEXT'.CHR(10).'
					temp.template.value ('.CHR(10).
					$this->conf['content'].CHR(10).')'.CHR(10).
					$this->conf['ts'];
			}
			//Generate TS from Text
			$parseObj = t3lib_div::makeInstance('t3lib_TSparser');
			$parseObj->parse($this->conf['ts']);
			$this->conf['ts'] = $parseObj->setup;

			$content = $this->cObj->cObjGet($this->conf['ts']);
		}

		if(trim($content) != '') return $this->pi_wrapInBaseClass($content);
	}

	/**
	 * Initializes plugin configuration.
	 *
	 * @return	nothing
	 */
	protected function init() {
		if($this->conf['addEffectBlind']) {
			$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['otherJS'][] = t3lib_extMgm::siteRelPath($this->extKey).'hooks/class.tx_sfjquery_otherjs.php:tx_sfjquery_otherjs->effectBlind';
		}
		if($this->conf['addEffectBounce']) {
			$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['otherJS'][] = t3lib_extMgm::siteRelPath($this->extKey).'hooks/class.tx_sfjquery_otherjs.php:tx_sfjquery_otherjs->effectBounce';
		}
		if($this->conf['addEffectClip']) {
			$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['otherJS'][] = t3lib_extMgm::siteRelPath($this->extKey).'hooks/class.tx_sfjquery_otherjs.php:tx_sfjquery_otherjs->effectClip';
		}
		if($this->conf['addEffectCore']) {
			$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['otherJS'][] = t3lib_extMgm::siteRelPath($this->extKey).'hooks/class.tx_sfjquery_otherjs.php:tx_sfjquery_otherjs->effectCore';
		}
		if($this->conf['addEffectDrop']) {
			$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['otherJS'][] = t3lib_extMgm::siteRelPath($this->extKey).'hooks/class.tx_sfjquery_otherjs.php:tx_sfjquery_otherjs->effectDrop';
		}
		if($this->conf['addEffectExplode']) {
			$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['otherJS'][] = t3lib_extMgm::siteRelPath($this->extKey).'hooks/class.tx_sfjquery_otherjs.php:tx_sfjquery_otherjs->effectExplode';
		}
		if($this->conf['addEffectFold']) {
			$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['otherJS'][] = t3lib_extMgm::siteRelPath($this->extKey).'hooks/class.tx_sfjquery_otherjs.php:tx_sfjquery_otherjs->effectFold';
		}
		if($this->conf['addEffectHighlight']) {
			$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['otherJS'][] = t3lib_extMgm::siteRelPath($this->extKey).'hooks/class.tx_sfjquery_otherjs.php:tx_sfjquery_otherjs->effectHighlight';
		}
		if($this->conf['addEffectPulsate']) {
			$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['otherJS'][] = t3lib_extMgm::siteRelPath($this->extKey).'hooks/class.tx_sfjquery_otherjs.php:tx_sfjquery_otherjs->effectPulsate';
		}
		if($this->conf['addEffectScale']) {
			$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['otherJS'][] = t3lib_extMgm::siteRelPath($this->extKey).'hooks/class.tx_sfjquery_otherjs.php:tx_sfjquery_otherjs->effectScale';
		}
		if($this->conf['addEffectShake']) {
			$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['otherJS'][] = t3lib_extMgm::siteRelPath($this->extKey).'hooks/class.tx_sfjquery_otherjs.php:tx_sfjquery_otherjs->effectShake';
		}
		if($this->conf['addEffectSlide']) {
			$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['otherJS'][] = t3lib_extMgm::siteRelPath($this->extKey).'hooks/class.tx_sfjquery_otherjs.php:tx_sfjquery_otherjs->effectSlide';
		}
		if($this->conf['addEffectTransfer']) {
			$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['otherJS'][] = t3lib_extMgm::siteRelPath($this->extKey).'hooks/class.tx_sfjquery_otherjs.php:tx_sfjquery_otherjs->effectTransfer';
		}

		if($this->conf['addPluginCore']) {
			$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['otherJS'][] = t3lib_extMgm::siteRelPath($this->extKey).'hooks/class.tx_sfjquery_otherjs.php:tx_sfjquery_otherjs->pluginCore';
		}
		if($this->conf['addPluginWidget']) {
			$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['otherJS'][] = t3lib_extMgm::siteRelPath($this->extKey).'hooks/class.tx_sfjquery_otherjs.php:tx_sfjquery_otherjs->pluginWidget';
		}
		if($this->conf['addPluginMouse']) {
			$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['otherJS'][] = t3lib_extMgm::siteRelPath($this->extKey).'hooks/class.tx_sfjquery_otherjs.php:tx_sfjquery_otherjs->pluginMouse';
		}
		if($this->conf['addPluginPosition']) {
			$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['otherJS'][] = t3lib_extMgm::siteRelPath($this->extKey).'hooks/class.tx_sfjquery_otherjs.php:tx_sfjquery_otherjs->pluginPosition';
		}
		if($this->conf['addPluginDraggable']) {
			$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['otherJS'][] = t3lib_extMgm::siteRelPath($this->extKey).'hooks/class.tx_sfjquery_otherjs.php:tx_sfjquery_otherjs->pluginDraggable';
		}
		if($this->conf['addPluginDroppable']) {
			$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['otherJS'][] = t3lib_extMgm::siteRelPath($this->extKey).'hooks/class.tx_sfjquery_otherjs.php:tx_sfjquery_otherjs->pluginDroppable';
		}
		if($this->conf['addPluginResizable']) {
			$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['otherJS'][] = t3lib_extMgm::siteRelPath($this->extKey).'hooks/class.tx_sfjquery_otherjs.php:tx_sfjquery_otherjs->pluginResizable';
		}
		if($this->conf['addPluginSelectable']) {
			$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['otherJS'][] = t3lib_extMgm::siteRelPath($this->extKey).'hooks/class.tx_sfjquery_otherjs.php:tx_sfjquery_otherjs->pluginSelectable';
		}
		if($this->conf['addPluginSortable']) {
			$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['otherJS'][] = t3lib_extMgm::siteRelPath($this->extKey).'hooks/class.tx_sfjquery_otherjs.php:tx_sfjquery_otherjs->pluginSortable';
		}
		if($this->conf['addPluginAccordion']) {
			$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['otherJS'][] = t3lib_extMgm::siteRelPath($this->extKey).'hooks/class.tx_sfjquery_otherjs.php:tx_sfjquery_otherjs->pluginAccordion';
		}
		if($this->conf['addPluginAutocomplete']) {
			$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['otherJS'][] = t3lib_extMgm::siteRelPath($this->extKey).'hooks/class.tx_sfjquery_otherjs.php:tx_sfjquery_otherjs->pluginAutocomplete';
		}
		if($this->conf['addPluginButton']) {
			$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['otherJS'][] = t3lib_extMgm::siteRelPath($this->extKey).'hooks/class.tx_sfjquery_otherjs.php:tx_sfjquery_otherjs->pluginButton';
		}
		if($this->conf['addPluginDialog']) {
			$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['otherJS'][] = t3lib_extMgm::siteRelPath($this->extKey).'hooks/class.tx_sfjquery_otherjs.php:tx_sfjquery_otherjs->pluginDialog';
		}
		if($this->conf['addPluginSlider']) {
			$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['otherJS'][] = t3lib_extMgm::siteRelPath($this->extKey).'hooks/class.tx_sfjquery_otherjs.php:tx_sfjquery_otherjs->pluginSlider';
		}
		if($this->conf['addPluginTabs']) {
			$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['otherJS'][] = t3lib_extMgm::siteRelPath($this->extKey).'hooks/class.tx_sfjquery_otherjs.php:tx_sfjquery_otherjs->pluginTabs';
		}
		if($this->conf['addPluginDatepicker']) {
			$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['otherJS'][] = t3lib_extMgm::siteRelPath($this->extKey).'hooks/class.tx_sfjquery_otherjs.php:tx_sfjquery_otherjs->pluginDatepicker';
		}
		if($this->conf['addPluginProgressbar']) {
			$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['otherJS'][] = t3lib_extMgm::siteRelPath($this->extKey).'hooks/class.tx_sfjquery_otherjs.php:tx_sfjquery_otherjs->pluginProgressbar';
		}

		if($this->conf['addPluginAjaxupload']) {
			$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['otherJS'][] = t3lib_extMgm::siteRelPath($this->extKey).'hooks/class.tx_sfjquery_otherjs.php:tx_sfjquery_otherjs->ajaxUpload';
		}
		if($this->conf['addPluginReflection']) {
			$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['otherJS'][] = t3lib_extMgm::siteRelPath($this->extKey).'hooks/class.tx_sfjquery_otherjs.php:tx_sfjquery_otherjs->reflection';
		}
		if($this->conf['addPluginSlideshow']) {
			$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['otherCSS'][] = t3lib_extMgm::siteRelPath($this->extKey).'hooks/class.tx_sfjquery_othercss.php:tx_sfjquery_othercss->slideshow';
			$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['otherJS'][] = t3lib_extMgm::siteRelPath($this->extKey).'hooks/class.tx_sfjquery_otherjs.php:tx_sfjquery_otherjs->slideshow';
		}

		//Set jQueryPath or get it from conf
		if(trim($this->conf['alternateJqueryFile']) != '') {
		  $this->jqueryPath = trim($this->conf['alternateJqueryFile']);
		} else {
			$this->jqueryPath = t3lib_extMgm::siteRelPath($this->extKey).
				'res/'.$this->jqueryFile;
		}
		if(trim($this->conf['alternateJqueryUiFile']) != '') {
		  $this->jqueryUIPath = trim($this->conf['alternateJqueryUiFile']);
		} else {
			$this->jqueryUIPath = t3lib_extMgm::siteRelPath($this->extKey).
				'res/'.$this->jqueryUIFile;
		}

		//Plugin-Counter
		$GLOBALS['TSFE']->register['sfjquery']++;
		$this->pluginCounter = $GLOBALS['TSFE']->register['sfjquery'];

		//Initialize Flexform
		$this->pi_initPIflexForm();

		//Get additional data from database
		//This data will be plased bevor all other content
		$this->conf['scriptname'] = $this->fetchConfigurationValue('scriptname');

		//If there was a selection made, than search for this selection
		if($this->conf['scriptname'] != '') {
			$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery(
				'*',
				'tx_sfjquery_scripts',
				'uid='.$this->conf['scriptname'],
				'', '', ''
			);
			$row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res);

			$this->domscript = $row['domscript'].CHR(10);
			if(is_file($row['domfile'])) $this->domscript .= file_get_contents($row['domscriptfile'])."\n";
			$this->outscript = $row['outscript'].CHR(10);
			if(is_file($row['outfile'])) $this->outscript .= file_get_contents($row['outscriptfile'])."\n";
			$this->content = $row['content'].CHR(10);
			if(is_file($row['htmlfile'])) $this->content .= file_get_contents($row['htmlfile'])."\n";
			$this->ts = $row['ts'].CHR(10);
			if(is_file($row['tsfile'])) $this->ts .= file_get_contents($row['tsfile'])."\n";
			$this->style = $row['css'].CHR(10);
			if(is_file($row['cssuifile'])) $this->conf['cssFile'] = $row['cssuifile'];
		}

		// Get Flexform values
		$this->conf['domscript'] = $this->domscript.$this->fetchConfigurationValue('domscript');
		$this->conf['domFile'] = $this->fetchConfigurationValue('domFile');
		$this->conf['outscript'] = $this->outscript.$this->fetchConfigurationValue('outscript');
		$this->conf['outFile'] = $this->fetchConfigurationValue('outFile');
		$this->conf['content'] = $this->content.$this->fetchConfigurationValue(
			'content', 'html'
		);
		$this->conf['htmlFile'] = $this->fetchConfigurationValue(
			'htmlFile', 'html'
		);
		if(is_file($this->conf['htmlFile'])) $this->conf['content'] .= "\n".file_get_contents($this->conf['htmlFile'])."\n";

		$this->conf['directory'] = $this->fetchConfigurationValue(
			'directory', 'images'
		);
		$this->conf['height'] = $this->cObj->stdWrap(
			$this->fetchConfigurationValue(
				'height', 'images'
			),
			$this->conf['height.']
		);
		$this->conf['width'] = $this->cObj->stdWrap(
			$this->fetchConfigurationValue(
				'width', 'images'
			),
			$this->conf['width.']
		);
		$this->conf['images'] = $this->cObj->stdWrap(
			$this->fetchConfigurationValue(
				'images', 'images'
			),
			$this->conf['images.']
		);
		$this->conf['links'] = $this->cObj->stdWrap(
			$this->fetchConfigurationValue(
				'links', 'images'
			),
			$this->conf['links.']
		);
		//Get TypoScript
		$this->conf['ts'] = $this->ts.CHR(10).$this->fetchConfigurationValue(
				'ts', 'ts'
		);
		$this->conf['tsFile'] = $this->fetchConfigurationValue(
			'tsFile', 'ts'
		);
		if(is_file($this->conf['tsFile'])) $this->conf['ts'] .= "\n".file_get_contents($this->conf['tsFile'])."\n";

		$this->conf['cssFile'] = $this->fetchConfigurationValue(
			'cssFile', 'css'
		);
		$this->conf['style'] .= $this->style.$this->fetchConfigurationValue(
			'style', 'css'
		);

		//Set defaults
		if(!$this->conf['height']) $this->conf['height'] = 300;
		if(!$this->conf['width']) $this->conf['width'] = 400;

		$this->template['total'] = $this->cObj->fileResource(
			'EXT:'.$this->extKey.$this->templateHead
		);
	}

	/**
	 * Fetches configuration value given its name.
	 * Merges flexform and TS configuration values.
	 *
	 * @param		string	$param	Configuration value name
	 * @return	string	Parameter value
	 */
	function fetchConfigurationValue($param, $sheet = 'sDEF') {
		$value = trim($this->pi_getFFvalue(
			$this->cObj->data['pi_flexform'], $param, $sheet)
		);
		return $value ? $value : $this->conf[$param];
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/sfjquery/pi1/class.tx_sfjquery_pi1.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/sfjquery/pi1/class.tx_sfjquery_pi1.php']);
}
?>