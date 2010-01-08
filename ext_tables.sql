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
	domscriptfile text,
	outscript text,
	outscriptfile text,
	content text,
	htmlfile text,
	ts text,
	tsfile text,
	cssuifile text,
	css text,
	
	PRIMARY KEY (uid),
	KEY parent (pid)
);




#
# Table structure for table 'tt_content_tx_sfjquery_script_mm'
# 
#
CREATE TABLE tt_content_tx_sfjquery_script_mm (
  uid_local int(11) DEFAULT '0' NOT NULL,
  uid_foreign int(11) DEFAULT '0' NOT NULL,
  tablenames varchar(30) DEFAULT '' NOT NULL,
  sorting int(11) DEFAULT '0' NOT NULL,
  KEY uid_local (uid_local),
  KEY uid_foreign (uid_foreign)
);



#
# Table structure for table 'tt_content'
#
CREATE TABLE tt_content (
	
);