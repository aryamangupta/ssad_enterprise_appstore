USE appstore;
CREATE TABLE IF NOT EXISTS `tbl_appstatus` 
(
   `id` INTEGER NOT NULL AUTO_INCREMENT,
   `app_id` INTEGER NOT NULL,
   `reviewer_id` INTEGER NOT NULL,
   `createdate` DATE NOT NULL,
   `lastmodified` DATE,
   `activity` VARCHAR(300) NOT NULL,
   `version` VARCHAR(10) NOT NULL,
   `approvestatus` VARCHAR(10) NOT NULL,
   `size` VARCHAR(128) NOT NULL,
   `code` VARCHAR(128) NOT NULL,
   `comment` VARCHAR(500) NOT NULL,
    PRIMARY KEY ( `id` ),
    FOREIGN KEY( `approvestatus` )
	REFERENCES `tbl_approval_ref` ( `key` ) ON DELETE CASCADE ON UPDATE CASCADE,

   FOREIGN KEY(`app_id`)
	REFERENCES `tbl_application` ( `app_id` ) ON DELETE CASCADE ON UPDATE CASCADE,
   FOREIGN KEY (`reviewer_id` ) 
	REFERENCES `tbl_user` ( `user_id` ) ON DELETE CASCADE ON UPDATE CASCADE
   
)ENGINE = InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `tbl_apprating` (
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `app_id` INTEGER NOT NULL,
    `user_id` INTEGER NOT NULL,
    `rating` INTEGER NOT NULL,
    `date` DATE NOT NULL,
     PRIMARY KEY ( `id` ),
     FOREIGN KEY(`app_id`)
	REFERENCES `tbl_application` ( `app_id` ) ON DELETE CASCADE ON UPDATE CASCADE,
    CHECK ( `rating` < 5 )
)ENGINE = InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `tbl_appreview` ( 
   `id` INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
   `app_id` INTEGER NOT NULL,
   `user_id` INTEGER NOT NULL,
   `review` VARCHAR(128) NOT NULL,
   `date` DATE NOT NULL,
    FOREIGN KEY ( `app_id` )
	REFERENCES `tbl_application` ( `app_id` ) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY ( `user_id` )
	REFERENCES `tbl_user` ( `user_id` ) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE = InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `tbl_category`(
    `key` VARCHAR(10) NOT NULL,
    `category` VARCHAR(128) NOT NULL,
     PRIMARY KEY ( `key` )
)ENGINE = InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `tbl_checklist` (
   `id` INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
   `categorykey` VARCHAR(10) NOT NULL,
   `field` VARCHAR(200) NOT NULL,
   CONSTRAINT FK_9 FOREIGN KEY ( `categorykey` )
	REFERENCES `tbl_category` (`key`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE = InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `tbl_cat_rev` ( 
   `id` INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
   `cat_key` VARCHAR(10) NOT NULL,
   `rev_id` INTEGER NOT NULL,
   CONSTRAINT FK_10 FOREIGN KEY ( `cat_key` ) 
	REFERENCES `tbl_category` (`key` )	 ON DELETE CASCADE ON UPDATE CASCADE,
   CONSTRAINT FK_11 FOREIGN KEY ( `rev_id` )	
	REFERENCES `tbl_user` ( `user_id` ) ON DELETE CASCADE ON UPDATE CASCADE
 )ENGINE = InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `tbl_screenshot` (
   `id` INTEGER NOT NULL AUTO_INCREMENT,
   `app_id` INTEGER NOT NULL,
   `screenshot` VARCHAR(128) NOT NULL,
    PRIMARY KEY ( `id` ), 
    FOREIGN KEY( `app_id` )
	REFERENCES `tbl_application` ( `app_id` ) ON DELETE CASCADE  ON UPDATE CASCADE
)ENGINE = InnoDB DEFAULT CHARSET=utf8;

