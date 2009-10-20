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
 * @subpackage	tx_sfjquery
 */
class tx_sfjquery_pi1 extends tslib_pibase {
	var $prefixId      = 'tx_sfjquery_pi1';		// Same as class name
	var $scriptRelPath = 'pi1/class.tx_sfjquery_pi1.php';	// Path to this script relative to the extension dir.
	var $extKey        = 'sfjquery';	// The extension key.
	var $pi_checkCHash = true;

	var $jqueryPath    = '';
	var $jqueryUIPath  = '';
	var $jqueryFile    = 'jquery-1.3.2.min.js';
	var $jqueryUIFile  = 'jquery-ui-1.7.2.custom.min.js';
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

		//Get Extension Configuration
		$this->extConf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['sfjquery']);

		//Set jQueryPath or get it from extconf
		if(trim($this->extConf['alternateJQueryFile']) != '') {
		  $this->jqueryPath = trim($this->extConf['alternateJQueryFile']);
		} else {
			$this->jqueryPath = t3lib_extMgm::siteRelPath($this->extKey).
				'res/'.$this->jqueryFile;
		}
		if(trim($this->extConf['alternateJQueryUIFile']) != '') {
		  $this->jqueryUIPath = trim($this->extConf['alternateJQueryUIFile']);
		} else {
			$this->jqueryUIPath = t3lib_extMgm::siteRelPath($this->extKey).
				'res/'.$this->jqueryUIFile;
		}

		// include jQuery-Scripts onto page
		$this->template['jquery'] = $this->cObj->getSubpart(
			$this->template['total'], '###JQUERY###');

		$markerArray['###JQUERY_PATH###'] = $this->jqueryPath;

		if($this->extConf['enableMoreJQuery'] == 1) {
			$markerArray['###JQUERY_UI_PATH###'] = $this->jqueryUIPath;
		} else {
			$subpartArray['###JQUERY_UI###'] = '';
		}

		//Hook
		//include other/additional JavaScript files
		if(isset($GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['otherJS'])) {
			$subpartOthers = $this->cObj->getSubpart(
				$this->template['jquery'],
				'###JQUERY_OTHERS###'
			);
			foreach($GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['otherJS'] as $userFunc) {
				$params = array();
				$otherJSpath = t3lib_div::callUserFunction($userFunc, $params, $this);
				if(is_file($otherJSpath)) {
					$subpartArray['###JQUERY_OTHERS###'] .= $this->cObj->substituteMarkerArray(
						$subpartOthers, array(
							'###JQUERY_OTHERS_PATH###' =>	htmlspecialchars($otherJSpath)
						)
					);
				} else {
					$subpartArray['###JQUERY_OTHERS###'] .= '';
				}
			}
		} else {
			$subpartArray['###JQUERY_OTHERS###'] = '';
		}

		//Ensure that header part is added only once to the page
		$key = $this->prefixId.'_'.md5($this->template['jquery']);
		if(!isset($GLOBALS['TSFE']->additionalHeaderData[$key])) {
			$GLOBALS['TSFE']->additionalHeaderData[$key] =
				$this->cObj->substituteMarkerArrayCached(
					$this->template['jquery'], $markerArray, $subpartArray
				);
		}

		//Concat variables, if plugin was inserted more than once.
		$GLOBALS['TSFE']->register['sfStyleSheet'] .= $this->conf['style']."\n";
		$GLOBALS['TSFE']->register['sfDomScript'] .= $this->conf['domscript']."\n";
		$GLOBALS['TSFE']->register['sfOutScript'] .= $this->conf['outscript']."\n";

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
		} else {
			$GLOBALS['TSFE']->additionalHeaderData['cssFile'] = '';
		}

		//Templating Headerparts
		$this->template['header'] = $this->cObj->getSubpart(
			$this->template['total'], '###HEADER###');

		if(trim($this->conf['style']) != '') {
			$markerArray['###CSS###'] = trim($this->conf['style']);
		} else {
			$subpartArray['###CSS_PART###'] = '';
		}
		if(trim($this->conf['domscript']) != '') {
			$markerArray['###DOMSCRIPT###'] = trim($this->conf['domscript']);
		} else {
			$markerArray['###DOMSCRIPT###'] = '';
		}
		if(trim($this->conf['outscript']) != '') {
			$markerArray['###OUTSCRIPT###'] = trim($this->conf['outscript']);
		} else {
			$markerArray['###OUTSCRIPT###'] = '';
		}
		if($this->extConf['activateCompatibilityMode'] == 1) {
			$markerArray['###COMPATIBILIYMODE###'] = 'jQuery.noConflict();'.CHR(10);
			$markerArray['###COMPAT_FIRST###'] = 'jQuery';
			$markerArray['###COMPAT_LAST###'] = '$';
		} else {
			$markerArray['###COMPATIBILIYMODE###'] = '';
			$markerArray['###COMPAT_FIRST###'] = '$';
			$markerArray['###COMPAT_LAST###'] = '';
		}
		if(trim($this->conf['style']) != '' && trim($this->conf['domscript']) != '' && trim($this->conf['outscript']) != '') {
		  $subpartArray['###HEADER###'] = '';
		}

		$GLOBALS['TSFE']->additionalHeaderData['header'] .=
			$this->cObj->substituteMarkerArrayCached(
				$this->template['header'], $markerArray, $subpartArray
		);

		//explode array and remove empty entries
		$images_arr = t3lib_div::trimExplode(',', $this->conf['images'], 1);

		//How many images are defined?
		$this->count = count($images_arr);
		$links_row_arr = t3lib_div::trimExplode(CHR(10), $this->conf['links'], 0);

		//Generate HTML-Code for each image and link.
		foreach($images_arr AS $key => $value) {
			if($value) {
				$loop = $key == 0 ? 1 : 0;
				$image = '<div class="myTween myTween'.$this->conf['pluginCounter'].
					'" title="loop'.$loop.'">
					<img src="'.$this->conf['directory'].$value.'" height="'.
					$this->conf['height'].'" width="'.$this->conf['width'].'">
					</div>
				';

				//Generate a link if configured
				$links_arr = t3lib_div::trimExplode('|', $links_row_arr[$key], 0);
				$link['parameter'] = $links_arr[0];
				$link['additionalParams'] = $links_arr[1];
				$content_img .= $this->cObj->typoLink($image, $link);
			}

			//Errorhandling if file can't be found
			if(!is_file($this->conf['directory'].$value)) {
				$content_img = 'Check TS (directory.), because file can\'t be found<br />';
				$content_img .= 'File: '.$this->conf['directory'].$value;
			}
		}

		//Templating HTML-Area
		$content = $this->cObj->substituteMarkerArray(
			$this->conf['content'], array(
				'###IMG###' => $content_img,
			)
		);

		//If TS-field is field, then use html as Template
		if(! $this->conf['ts-empty']) {
			$content = $this->cObj->cObjGet($this->conf['ts']);
		}

		return $this->pi_wrapInBaseClass($content);
	}

	/**
	 * Initializes plugin configuration.
	 *
	 * @return	nothing
	 */
	protected function init() {
		//Plugin-Counter
		$GLOBALS['TSFE']->register['sfjquery']++;
		$this->conf['pluginCounter'] = $GLOBALS['TSFE']->register['sfjquery'];

		$this->pi_initPIflexForm();
		// Get values
		$this->conf['domscript'] = $this->fetchConfigurationValue('domscript');
		$this->conf['outscript'] = $this->fetchConfigurationValue('outscript');
		$this->conf['content'] = $this->fetchConfigurationValue(
			'content', 'html'
		);
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
		$this->conf['ts'] = $this->fetchConfigurationValue(
				'ts', 'ts'
		);
		//Add HTML if there is some ts-code
		$this->conf['ts-empty'] = true;
		if($this->conf['ts'] != '') {
			$this->conf['ts-empty'] = false;
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

		$this->conf['cssFile'] = $this->fetchConfigurationValue(
			'cssFile', 'css'
		);
		$this->conf['style'] = $this->fetchConfigurationValue(
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
	protected function fetchConfigurationValue($param, $sheet = 'sDEF') {
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