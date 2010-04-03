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
	//jQuery UI Effects
	public function effectBounce() {
		$path = $this->effectCore().',';
		return $path.t3lib_extMgm::siteRelPath('sfjquery').'res/jquery.effects.bounce.min.js';
	}
	public function effectClip() {
		$path = $this->effectCore().',';
		return $path.t3lib_extMgm::siteRelPath('sfjquery').'res/jquery.effects.clip.min.js';
	}
	public function effectCore() {
		return $path.t3lib_extMgm::siteRelPath('sfjquery').'res/jquery.effects.core.min.js';
	}
	public function effectDrop() {
		$path = $this->effectCore().',';
		return $path.t3lib_extMgm::siteRelPath('sfjquery').'res/jquery.effects.drop.min.js';
	}
	public function effectExplode() {
		$path = $this->effectCore().',';
		return $path.t3lib_extMgm::siteRelPath('sfjquery').'res/jquery.effects.explode.min.js';
	}
	public function effectFold() {
		$path = $this->effectCore().',';
		return $path.t3lib_extMgm::siteRelPath('sfjquery').'res/jquery.effects.fold.min.js';
	}
	public function effectHighlight() {
		$path = $this->effectCore().',';
		return $path.t3lib_extMgm::siteRelPath('sfjquery').'res/jquery.effects.highlight.min.js';
	}
	public function effectPulsate() {
		$path = $this->effectCore().',';
		return $path.t3lib_extMgm::siteRelPath('sfjquery').'res/jquery.effects.pulsate.min.js';
	}
	public function effectScale() {
		$path = $this->effectCore().',';
		return $path.t3lib_extMgm::siteRelPath('sfjquery').'res/jquery.effects.scale.min.js';
	}
	public function effectShake() {
		$path = $this->effectCore().',';
		return $path.t3lib_extMgm::siteRelPath('sfjquery').'res/jquery.effects.shake.min.js';
	}
	public function effectSlide() {
		$path = $this->effectCore().',';
		return $path.t3lib_extMgm::siteRelPath('sfjquery').'res/jquery.effects.slide.min.js';
	}
	public function effectTransfer() {
		$path = $this->effectCore().',';
		return $path.t3lib_extMgm::siteRelPath('sfjquery').'res/jquery.effects.transfer.min.js';
	}
	public function effectBlind() {
		$path = $this->effectCore().',';
		return $path.t3lib_extMgm::siteRelPath('sfjquery').'res/jquery.effects.blind.min.js';
	}
	
	//jQuery UI Plugins (internal)
	public function pluginCore() {
		return t3lib_extMgm::siteRelPath('sfjquery').'res/jquery.ui.core.min.js';
	}
	public function pluginWidget() {
		return t3lib_extMgm::siteRelPath('sfjquery').'res/jquery.ui.widget.min.js';
	}
	public function pluginMouse() {
		return t3lib_extMgm::siteRelPath('sfjquery').'res/jquery.ui.mouse.min.js';
	}
	public function pluginPosition() {
		return t3lib_extMgm::siteRelPath('sfjquery').'res/jquery.ui.position.min.js';
	}
	public function pluginDraggable() {
		$path = $this->pluginCore().',';
		$path .= $this->pluginWidget().',';
		$path .= $this->pluginMouse().',';
		return $path.t3lib_extMgm::siteRelPath('sfjquery').'res/jquery.ui.draggable.min.js';
	}
	public function pluginDroppable() {
		$path = $this->pluginCore().',';
		$path .= $this->pluginWidget().',';
		$path .= $this->pluginMouse().',';
		$path .= $this->pluginDraggable().',';
		return $path.t3lib_extMgm::siteRelPath('sfjquery').'res/jquery.ui.droppable.min.js';
	}
	public function pluginResizable() {
		$path = $this->pluginCore().',';
		$path .= $this->pluginWidget().',';
		$path .= $this->pluginMouse().',';
		return $path.t3lib_extMgm::siteRelPath('sfjquery').'res/jquery.ui.resizable.min.js';
	}
	public function pluginSelectable() {
		$path = $this->pluginCore().',';
		$path .= $this->pluginWidget().',';
		$path .= $this->pluginMouse().',';
		return $path.t3lib_extMgm::siteRelPath('sfjquery').'res/jquery.ui.selectable.min.js';
	}
	public function pluginSortable() {
		$path = $this->pluginCore().',';
		$path .= $this->pluginWidget().',';
		$path .= $this->pluginMouse().',';
		return $path.t3lib_extMgm::siteRelPath('sfjquery').'res/jquery.ui.sortable.min.js';
	}
	public function pluginAccordion() {
		$path = $this->pluginCore().',';
		$path .= $this->pluginWidget().',';
		return $path.t3lib_extMgm::siteRelPath('sfjquery').'res/jquery.ui.accordion.min.js';
	}
	public function pluginAutocomplete() {
		$path = $this->pluginCore().',';
		$path .= $this->pluginWidget().',';
		$path .= $this->pluginPosition().',';
		return $path.t3lib_extMgm::siteRelPath('sfjquery').'res/jquery.ui.autocomplete.min.js';
	}
	public function pluginButton() {
		$path = $this->pluginCore().',';
		$path .= $this->pluginWidget().',';
		return $path.t3lib_extMgm::siteRelPath('sfjquery').'res/jquery.ui.button.min.js';
	}
	public function pluginDialog() {
		$path = $this->pluginCore().',';
		$path .= $this->pluginWidget().',';
		$path .= $this->pluginPosition().',';
		return $path.t3lib_extMgm::siteRelPath('sfjquery').'res/jquery.ui.dialog.min.js';
	}
	public function pluginSlider() {
		$path = $this->pluginCore().',';
		$path .= $this->pluginWidget().',';
		$path .= $this->pluginMouse().',';
		return $path.t3lib_extMgm::siteRelPath('sfjquery').'res/jquery.ui.slider.min.js';
	}
	public function pluginTabs() {
		$path = $this->pluginCore().',';
		$path .= $this->pluginWidget().',';
		return $path.t3lib_extMgm::siteRelPath('sfjquery').'res/jquery.ui.tabs.min.js';
	}
	public function pluginDatepicker() {
		$path = $this->pluginCore().',';
		return $path.t3lib_extMgm::siteRelPath('sfjquery').'res/jquery.ui.datepicker.min.js';
	}
	public function pluginProgressbar() {
		$path = $this->pluginCore().',';
		$path .= $this->pluginWidget().',';
		return $path.t3lib_extMgm::siteRelPath('sfjquery').'res/jquery.ui.progressbar.min.js';
	}

	//Additional Plugin Ajax Upload
	public function ajaxUpload() {
		return t3lib_extMgm::siteRelPath('sfjquery').'res/ajaxupload.js';
	}
	//Additional Plugin Image Reflection
	public function reflection() {
		return t3lib_extMgm::siteRelPath('sfjquery').'res/reflection.js';
	}
	//Additional Plugin Slideshow
	public function slideshow() {
		return t3lib_extMgm::siteRelPath('sfjquery').'res/jquery.aslideshow.min.js';
	}
}
