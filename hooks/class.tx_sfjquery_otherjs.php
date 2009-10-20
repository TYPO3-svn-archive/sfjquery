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


/**
 * Plugin 'SF jQuery' for the 'sfjquery' extension.
 *
 * @author	Stefan Froemken <firma@sfroemken.de>
 * @package	TYPO3
 * @subpackage	tx_sfjquery
 */
class tx_sfjquery_otherjs {
	public function additionalJS() {
		return t3lib_extMgm::siteRelPath('sfjquery').'res/ajaxupload.js';

		//Following returns also works
		//return t3lib_extMgm::siteRelPath($_EXTKEY).'res/ajaxupload.js';
		//return 'EXT:'.$EXT_KEY.'/res/ajaxupload.js';
	}
}
