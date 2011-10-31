--
-- Tabellenstruktur für Tabelle `tx_sfjquery_scripts`
--

CREATE TABLE `tx_sfjquery_scripts` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0',
  `tstamp` int(11) NOT NULL DEFAULT '0',
  `crdate` int(11) NOT NULL DEFAULT '0',
  `cruser_id` int(11) NOT NULL DEFAULT '0',
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  `hidden` tinyint(4) NOT NULL DEFAULT '0',
  `name` tinytext,
  `domscript` text,
  `domscriptfile` tinytext,
  `outscript` text,
  `outscriptfile` tinytext,
  `content` text,
  `htmlfile` tinytext,
  `ts` text,
  `tsfile` tinytext,
  `cssuifile` tinytext,
  `css` text,
  PRIMARY KEY (`uid`),
  KEY `parent` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Daten für Tabelle `tx_sfjquery_scripts`
--

INSERT INTO `tx_sfjquery_scripts` (`uid`, `pid`, `name`, `domscript`, `domscriptfile`, `outscript`, `outscriptfile`, `content`, `htmlfile`, `ts`, `tsfile`, `cssuifile`, `css`) VALUES (1, 0, 'Example: Alert', 'alert(''Hello world'');', '', '', '', '', '', '', '', '', '');
INSERT INTO `tx_sfjquery_scripts` (`uid`, `pid`, `name`, `domscript`, `domscriptfile`, `outscript`, `outscriptfile`, `content`, `htmlfile`, `ts`, `tsfile`, `cssuifile`, `css`) VALUES (2, 0, 'Example: FunctionCall', 'coolFunction(''Hello world'');', '', 'function coolFunction(text) {\r\n	alert(text);\r\n}', '', '', '', '', '', '', '');
INSERT INTO `tx_sfjquery_scripts` (`uid`, `pid`, `name`, `domscript`, `domscriptfile`, `outscript`, `outscriptfile`, `content`, `htmlfile`, `ts`, `tsfile`, `cssuifile`, `css`) VALUES (3, 0, 'Example: Dragable', '$("#draggable").draggable();\r\n$("#draggable").removeClass(''ui-widget-content'');\r\n$("#droppable").droppable({\r\n	drop: function(event, ui) {\r\n		$(this).addClass(''ui-state-highlight'').find(''p'').html(''Müll ist drin...!'');\r\n		alert(''Knurps...knurps...hmmm...ist das lecker...'');\r\n	}\r\n});\r\n\r\n$(''body'').removeClass(''ui-widget-content'');', '', '', '', '<div id="draggable" class="ui-widget-content">\r\n	<p>Ich bin ein zerknülltes Stück Papier. Komm...wirf mich in den Müll</p>\r\n</div>\r\n\r\n<div id="droppable" class="ui-widget-header">\r\n	<p>Ich bin der gefräßige Mülleimer. Ich lebe von zerknülltem Papier.</p>\r\n</div>\r\n', '', '', '', 'typo3conf/ext/sfjquery/res/dark-hive/jquery-ui-1.8.16.custom.css', '#draggable {\r\n	background-color: #32AE2C;\r\n	float: left;\r\n	height: 120px;\r\n	padding: 0.5em;\r\n	width: 120px;\r\n}\r\n\r\n#droppable {\r\n	float: right;\r\n	height: 250px;\r\n	padding: 0.5em;\r\n	width: 200px;\r\n}');
INSERT INTO `tx_sfjquery_scripts` (`uid`, `pid`, `name`, `domscript`, `domscriptfile`, `outscript`, `outscriptfile`, `content`, `htmlfile`, `ts`, `tsfile`, `cssuifile`, `css`) VALUES (4, 0, 'Example: Dropable', '$("#draggable").draggable();\r\n$("#droppable").droppable({\r\n	drop: function(event, ui) {\r\n		$(this).addClass(''ui-state-highlight'').find(''p'').html(''Dropped!'');\r\n	}\r\n});', '', '', '', '<div id="draggable" class="ui-widget-content">\r\n	<p>Drag me to my target</p>\r\n</div>\r\n\r\n<div id="droppable" class="ui-widget-header">\r\n	<p>Drop here</p>\r\n</div>\r\n', '', '', '', 'typo3conf/ext/sfjquery/res/dark-hive/jquery-ui-1.8.16.custom.css', '#draggable { width: 100px; height: 100px; padding: 0.5em; float: left; margin: 10px 10px 10px 0; }\r\n	#droppable { width: 150px; height: 150px; padding: 0.5em; float: left; margin: 10px; }\r\n	');
INSERT INTO `tx_sfjquery_scripts` (`uid`, `pid`, `name`, `domscript`, `domscriptfile`, `outscript`, `outscriptfile`, `content`, `htmlfile`, `ts`, `tsfile`, `cssuifile`, `css`) VALUES (5, 0, 'Example: Resizeable', '$("#resizable").resizable();\r\n', '', '', '', '<div id="resizable" class="ui-widget-content">\r\n	<h3 class="ui-widget-header">Resizable</h3>\r\n</div>\r\n', '', '', '', 'typo3conf/ext/sfjquery/res/dark-hive/jquery-ui-1.8.16.custom.css', '#resizable { width: 150px; height: 150px; padding: 0.5em; }\r\n	#resizable h3 { text-align: center; margin: 0; }\r\n	');
INSERT INTO `tx_sfjquery_scripts` (`uid`, `pid`, `name`, `domscript`, `domscriptfile`, `outscript`, `outscriptfile`, `content`, `htmlfile`, `ts`, `tsfile`, `cssuifile`, `css`) VALUES (6, 0, 'Example: Selectable', '$("#selectable").selectable();\r\n', '', '', '', '<ol id="selectable">\r\n	<li class="ui-widget-content">Item 1</li>\r\n	<li class="ui-widget-content">Item 2</li>\r\n	<li class="ui-widget-content">Item 3</li>\r\n	<li class="ui-widget-content">Item 4</li>\r\n	<li class="ui-widget-content">Item 5</li>\r\n	<li class="ui-widget-content">Item 6</li>\r\n	<li class="ui-widget-content">Item 7</li>\r\n</ol>\r\n', '', '', '', 'typo3conf/ext/sfjquery/res/dark-hive/jquery-ui-1.8.16.custom.css', '#feedback { font-size: 1.4em; }\r\n#selectable .ui-selecting { background: #FECA40; }\r\n#selectable .ui-selected { background: #F39814; color: white; }\r\n#selectable { list-style-type: none; margin: 0; padding: 0; width: 60%; }\r\n#selectable li { margin: 3px; padding: 0.4em; font-size: 1.4em; height: 18px; }\r\n	');
INSERT INTO `tx_sfjquery_scripts` (`uid`, `pid`, `name`, `domscript`, `domscriptfile`, `outscript`, `outscriptfile`, `content`, `htmlfile`, `ts`, `tsfile`, `cssuifile`, `css`) VALUES (7, 0, 'Example: Sortable', '$("#sortable").sortable();\r\n$("#sortable").disableSelection();\r\n', '', '', '', '<ul id="sortable">\r\n	<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 1</li>\r\n	<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 2</li>\r\n	<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 3</li>\r\n	<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 4</li>\r\n	<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 5</li>\r\n	<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 6</li>\r\n	<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 7</li>\r\n</ul>', '', '', '', 'typo3conf/ext/sfjquery/res/dark-hive/jquery-ui-1.8.16.custom.css', '#sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }\r\n#sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }\r\n#sortable li span { position: absolute; margin-left: -1.3em; }');
INSERT INTO `tx_sfjquery_scripts` (`uid`, `pid`, `name`, `domscript`, `domscriptfile`, `outscript`, `outscriptfile`, `content`, `htmlfile`, `ts`, `tsfile`, `cssuifile`, `css`) VALUES (8, 0, 'Example: Accordion', '$("#accordion").accordion({\r\n	autoHeight: false,\r\n	navigation: true\r\n});\r\n$(''body'').removeClass(''ui-widget-content'');', '', '', '', '<div id="accordion">\r\n	<h3><a href="#">Ich bin die Überschrift für Tab 1</a></h3>\r\n	<div>\r\n		<p>Dieser Tab wird als erstes angezeigt. Er beinhaltet nur Text und nichts anderes\r\n		als reinen Text.</p>\r\n	</div>\r\n	<h3><a href="#">Weiter geht''s mit der 2</a></h3>\r\n	<div>\r\n		<p>In diesem Tab seht Ihr, dass nicht nur Text, sondern auch sämtliche\r\n		Block-Tags wie Überschriften möglich sind.</p>\r\n		<h3>Überschrift innerhalb Tab 2</h3>\r\n		<h4>Überschrift innerhalb Tab 2</h4>\r\n		<h5>Überschrift innerhalb Tab 2</h5>\r\n		<address>Stefan Frömken</address>\r\n	</div>\r\n	<h3><a href="#">Templatemaschine in Tab 3</a></h3>\r\n	<div>\r\n		<p>Natürlich kann auch hier der Content mit TypoScript verknüpft werden.\r\n		So wurde dieses Bild zum Beispiel mit Hilfe des Gifbuilders erstellt:</p>\r\n		###BILD###\r\n	</div>\r\n	<h3><a href="#">Der Quellcode zu Tab 3</a></h3>\r\n	<div>\r\n		<p>TypoScript</p>\r\n		<pre>\r\n10 = TEMPLATE\r\n10.template < temp.template\r\n10.marks.BILD = IMAGE\r\n10.marks.BILD {\r\n	file = GIFBUILDER\r\n	file {\r\n		XY = [10.w]+20 ,100\r\n		backColor = #8E999F\r\n		10 = TEXT\r\n		10 {\r\n			angle = 45\r\n			fontColor = #333333\r\n			fontSize = 24px\r\n			offset = 25,95\r\n			shadow.color = #EE6B11\r\n			shadow.offset = 5,0\r\n			text = Tolles Bild\r\n		}\r\n	}\r\n}\r\n		</pre>\r\n	</div>\r\n</div>\r\n', '', '10 = TEMPLATE\r\n10.template < temp.template\r\n10.marks.BILD = IMAGE\r\n10.marks.BILD {\r\n	file = GIFBUILDER\r\n	file {\r\n		XY = [10.w]+20 ,100\r\n		backColor = #8E999F\r\n		10 = TEXT\r\n		10 {\r\n			angle = 45\r\n			fontColor = #333333\r\n			fontSize = 24px\r\n			offset = 25,95\r\n			shadow.color = #EE6B11\r\n			shadow.offset = 5,0\r\n			text = Tolles Bild\r\n		}\r\n	}\r\n}', '', 'typo3conf/ext/sfjquery/res/dark-hive/jquery-ui-1.8.16.custom.css', 'div.tx-sfjquery-pi1 div#accordion h3 a {\r\n	padding-left: 30px;\r\n}');
INSERT INTO `tx_sfjquery_scripts` (`uid`, `pid`, `name`, `domscript`, `domscriptfile`, `outscript`, `outscriptfile`, `content`, `htmlfile`, `ts`, `tsfile`, `cssuifile`, `css`) VALUES (9, 0, 'Example: Datepicker', '$("#datepicker").datepicker();\r\n', '', '', '', '<p>Date: <input id="datepicker" type="text"></p>\r\n', '', '', '', 'typo3conf/ext/sfjquery/res/dark-hive/jquery-ui-1.8.16.custom.css', '');
INSERT INTO `tx_sfjquery_scripts` (`uid`, `pid`, `name`, `domscript`, `domscriptfile`, `outscript`, `outscriptfile`, `content`, `htmlfile`, `ts`, `tsfile`, `cssuifile`, `css`) VALUES (10, 0, 'Example: Dialog', '$(function() {\r\n	$("#dialog").dialog();\r\n});\r\n', '', '', '', '<div id="dialog" title="Basic dialog">\r\n	<p>This is the default dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the ''x'' icon.</p>\r\n</div>\r\n', '', '', '', 'typo3conf/ext/sfjquery/res/dark-hive/jquery-ui-1.8.16.custom.css', '');
INSERT INTO `tx_sfjquery_scripts` (`uid`, `pid`, `name`, `domscript`, `domscriptfile`, `outscript`, `outscriptfile`, `content`, `htmlfile`, `ts`, `tsfile`, `cssuifile`, `css`) VALUES (11, 0, 'Example: Progressbar', '$("#progressbar").progressbar({\r\n	value: 37\r\n});\r\n', '', '', '', '<div id="progressbar"></div>\r\n', '', '', '', 'typo3conf/ext/sfjquery/res/dark-hive/jquery-ui-1.8.16.custom.css', '');
INSERT INTO `tx_sfjquery_scripts` (`uid`, `pid`, `name`, `domscript`, `domscriptfile`, `outscript`, `outscriptfile`, `content`, `htmlfile`, `ts`, `tsfile`, `cssuifile`, `css`) VALUES (12, 0, 'Example: Slider', '$("#red, #green, #blue").slider({\r\n	orientation: ''horizontal'',\r\n	range: "min",\r\n	max: 255,\r\n	value: 127,\r\n	slide: refreshSwatch,\r\n	change: refreshSwatch\r\n});\r\n$("#red").slider("value", 255);\r\n$("#green").slider("value", 140);\r\n$("#blue").slider("value", 60);', '', 'function hexFromRGB (r, g, b) {\r\n	var hex = [\r\n		r.toString(16),\r\n		g.toString(16),\r\n		b.toString(16)\r\n	];\r\n	$.each(hex, function (nr, val) {\r\n		if (val.length == 1) {\r\n			hex[nr] = ''0'' + val;\r\n		}\r\n	});\r\n	return hex.join('''').toUpperCase();\r\n}\r\n\r\nfunction refreshSwatch() {\r\n	var red = $("#red").slider("value")\r\n		,green = $("#green").slider("value")\r\n		,blue = $("#blue").slider("value")\r\n		,hex = hexFromRGB(red, green, blue);\r\n	$("#swatch").css("background-color", "#" + hex);\r\n}', '', '<div id="red"></div>\r\n<div id="green"></div>\r\n<div id="blue"></div>\r\n<div id="swatch" class="ui-widget-content ui-corner-all"></div>\r\n', '', '', '', 'typo3conf/ext/sfjquery/res/dark-hive/jquery-ui-1.8.16.custom.css', '#red, #green, #blue {\r\n	float: left;\r\n	clear: left;\r\n	width: 300px;\r\n	margin: 15px;\r\n}\r\n#swatch {\r\n	width: 120px;\r\n	height: 100px;\r\n	margin-top: 18px;\r\n	margin-left: 350px;\r\n	background-image: none;\r\n}\r\n#red .ui-slider-range { background: #ef2929; }\r\n#red .ui-slider-handle { border-color: #ef2929; }\r\n#green .ui-slider-range { background: #8ae234; }\r\n#green .ui-slider-handle { border-color: #8ae234; }\r\n#blue .ui-slider-range { background: #729fcf; }\r\n#blue .ui-slider-handle { border-color: #729fcf; }');
INSERT INTO `tx_sfjquery_scripts` (`uid`, `pid`, `name`, `domscript`, `domscriptfile`, `outscript`, `outscriptfile`, `content`, `htmlfile`, `ts`, `tsfile`, `cssuifile`, `css`) VALUES (13, 0, 'Example: Tabs', '$("#tabs").tabs().find(".ui-tabs-nav").sortable({axis:''x''});\r\n$(''#sortable'').sortable({\r\n	placeholder: ''ui-state-highlight''\r\n});\r\n$(''body'').removeClass(''ui-widget-content'');', '', '', '', '<div id="tabs">\r\n	<ul>\r\n		<li><a href="#tabs-1">Tab 3</a></li>\r\n		<li><a href="#tabs-2">Tab 2</a></li>\r\n		<li><a href="#tabs-3">Tab 1</a></li>\r\n	</ul>\r\n	<div id="tabs-1">\r\n		<p>Wie Ihr bestimmt schon festgestellt habt, sind die Tabs in der\r\n		falschen Reihenfolge. Wenn Du magst kannst Du die Tabs mit\r\n		Hilfe von Drag&Drop neu anordnen.</p>\r\n	</div>\r\n	<div id="tabs-2">\r\n		<p>Ich bin nur ein Platzhalter für den 2ten Tab.</p>\r\n	</div>\r\n	<div id="tabs-3">\r\n		<p>Obwohl die Tabs schon sortierbar sind, so sind Elemente innerhalb\r\n		diesen Tabs auch noch sortierbar. Probiert''s mal aus.\r\n		<ul id="sortable">\r\n			<li>Apfel</li>\r\n			<li>Birne</li>\r\n			<li>Möhre</li>\r\n			<li>Kiwi</li>\r\n		</ul>\r\n	</div>\r\n</div>', '', '', '', 'typo3conf/ext/sfjquery/res/dark-hive/jquery-ui-1.8.16.custom.css', 'div.tx-sfjquery-pi1 div#tabs a {\r\n	padding-left: 11px;\r\n}\r\n\r\ndiv.tx-sfjquery-pi1 div#tabs a:focus {\r\n	outline: 0;\r\n}\r\n\r\ndiv.tx-sfjquery-pi1 div#tabs ul#sortable li {\r\n	background-color: #32AE2C;\r\n	height: 20px;\r\n	margin-bottom: 3px;\r\n	padding: 5px;\r\n	width: 150px;\r\n}');