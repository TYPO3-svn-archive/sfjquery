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
require_once(PATH_tslib.'class.tslib_content.php');


/**
 * Imageobject for the 'sfjquery' extension.
 *
 * @author	Stefan Froemken <firma@sfroemken.de>
 * @package	TYPO3
 * @subpackage	tx_sfjquery_pi1
 */
class tx_sfjquery_images extends tslib_cObj {
    var $conf = '';
    var $count = 0;
    var $linksArr = array();
    
    function __construct($conf) {
        $this->conf = $conf;
        $this->count = count($this->getImages());
        $this->linksArr = $this->getLinks();
    }
    
    protected function getLinks() {
        // Do not delete empty rows. Empty rows meens: Image has no link.
        return t3lib_div::trimExplode(CHR(10), $this->conf['links'], 0);
    }

    protected function getImages() {
        // Delete empty rows. We can't display an image if there is no
        return t3lib_div::trimExplode(',', $this->conf['images'], 1);
    }
    
    public function generateImagesContent() {
        foreach($this->getImages() as $key => $value) {
			if(is_file($this->conf['directory'].$value)) {
				$linkParts = t3lib_div::trimExplode('|', $this->linksArr[$key], 0);

				$imgConf['file'] = $this->conf['directory'].$value;
				$imgConf['file.']['height'] = $this->conf['height'];
				$imgConf['file.']['width'] = $this->conf['width'];
				$imgConf['stdWrap.']['typolink.']['parameter'] = $linkParts[0];
				$imgConf['stdWrap.']['typolink.']['additionalParams'] = $linkParts[1];
				
				$imagesContent .= $markerArray['###IMG' . ($key + 1) . '###'] = $this->IMAGE($imgConf);
			}
		}
		
		$markerArray['###IMG###'] = $imagesContent;
		
		return $markerArray;
    }
}
?>