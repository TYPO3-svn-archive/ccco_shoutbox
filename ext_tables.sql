CREATE TABLE tx_cccoshoutbox_domain_model_shout (
	 uid  INT( 11 ) NOT NULL AUTO_INCREMENT ,
	 pid  INT( 11 ) NOT NULL ,
	 
	 name  VARCHAR( 200 ) NOT NULL ,
	 shout  TINYTEXT NOT NULL ,
	 date  INT( 11 ) NOT NULL ,
	 
	PRIMARY KEY ( `uid` )
) ENGINE = MYISAM ;
###