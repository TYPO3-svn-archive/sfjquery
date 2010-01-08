#
# Table structure for table 'tx_sfjquery_scripts'
#
CREATE TABLE tx_sfjquery_scripts (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	name tinytext,
	domscript text,
	domscriptfile tinytext,
	outscript text,
	outscriptfile tinytext,
	content text,
	htmlfile tinytext,
	ts text,
	tsfile tinytext,
	cssuifile tinytext,
	css text,
	
	PRIMARY KEY (uid),
	KEY parent (pid)
);