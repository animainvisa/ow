CREATE DATABASE `ow` DEFAULT CHARACTER SET `latin1`;

CREATE TABLE `ecalendar`
(
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`mntime` INT NOT NULL,
	`lang` VARCHAR(5) NOT NULL,
	`title` VARCHAR(100) NOT NULL,
	`message` TEXT NOT NULL,

	PRIMARY KEY (`id`)
) ENGINE = MYISAM;

CREATE TABLE `unavailability` 
(
	`mntime` INT NOT NULL,

	UNIQUE (`mntime`)
) ENGINE = MYISAM;

CREATE TABLE `news`
(
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`lang` VARCHAR(5) NOT NULL,
	`title` VARCHAR(100) NOT NULL,
	`message` TEXT NOT NULL,
	`image` VARCHAR(100) NOT NULL,

	PRIMARY KEY (`id`)
) ENGINE = MYISAM;

/**/

CREATE TABLE `guestbook`
(
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(100) NOT NULL,
	`email` VARCHAR(100) NOT NULL,
	`comment` TEXT NOT NULL,
	`time` INT NOT NULL,

	PRIMARY KEY (`id`)
) ENGINE = MYISAM;

CREATE TABLE `newsletter`
(
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(100) NOT NULL,
	`address` VARCHAR(100) NOT NULL,
	`postcode` VARCHAR(15) NOT NULL,
	`city` VARCHAR(50) NOT NULL,
	`telephone` VARCHAR(25) NOT NULL,
	`email` VARCHAR(100) NOT NULL,
	`birthday` VARCHAR(50) NOT NULL,
	`nationality` VARCHAR(50) NOT NULL,
	`bi` VARCHAR(25) NOT NULL,
	`issuer` VARCHAR(50) NOT NULL,
	`issuedate` VARCHAR(50) NOT NULL,
	`certlevel`	VARCHAR(150) NOT NULL,

	PRIMARY KEY (`id`)
) ENGINE = MYISAM;

CREATE TABLE `members`
(
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(100) NOT NULL,
	`address` VARCHAR(100) NOT NULL,
	`postcode` VARCHAR(15) NOT NULL,
	`city` VARCHAR(50) NOT NULL,
	`telephone` VARCHAR(25) NOT NULL,
	`email` VARCHAR(100) NOT NULL,
	`birthday` VARCHAR(50) NOT NULL,
	`nationality` VARCHAR(50) NOT NULL,
	`bi` VARCHAR(25) NOT NULL,
	`issuer` VARCHAR(50) NOT NULL,
	`issuedate` VARCHAR(50) NOT NULL,
	`certlevel`	VARCHAR(150) NOT NULL,

	PRIMARY KEY (`id`)
) ENGINE = MYISAM;

CREATE TABLE `formation`
(
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(100) NOT NULL,
	`address` VARCHAR(100) NOT NULL,
	`postcode` VARCHAR(15) NOT NULL,
	`city` VARCHAR(50) NOT NULL,
	`telephone` VARCHAR(25) NOT NULL,
	`email` VARCHAR(100) NOT NULL,
	`birthday` VARCHAR(50) NOT NULL,
	`nationality` VARCHAR(50) NOT NULL,
	`bi` VARCHAR(25) NOT NULL,
	`issuer` VARCHAR(50) NOT NULL,
	`issuedate` VARCHAR(50) NOT NULL,
	`certlevel`	VARCHAR(150) NOT NULL,
	`sos` VARCHAR(100) NOT NULL,
	`bloodtype` VARCHAR(100) NOT NULL,
	`availfrom` VARCHAR(25) NOT NULL,
	`availto` VARCHAR(25) NOT NULL,
	`timeperiod` VARCHAR(25) NOT NULL,
	`course` VARCHAR(50) NOT NULL,
	`speciality` VARCHAR(50) NOT NULL,
	`weight` VARCHAR(50) NOT NULL,
	`height` VARCHAR(50) NOT NULL,
	`footsize` VARCHAR(50) NOT NULL,
	`equipment` TEXT NOT NULL,
	`jacket` VARCHAR(5) NOT NULL,
	`farmerjohn` VARCHAR(5) NOT NULL,
	`divesuit` VARCHAR(5) NOT NULL,
	`bcd` VARCHAR(5) NOT NULL,
	`insurance` VARCHAR(5) NOT NULL,

	PRIMARY KEY (`id`)
) ENGINE = MYISAM;

CREATE TABLE `reservations`
(
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(100) NOT NULL,
	`address` VARCHAR(100) NOT NULL,
	`postcode` VARCHAR(15) NOT NULL,
	`city` VARCHAR(50) NOT NULL,
	`telephone` VARCHAR(25) NOT NULL,
	`email` VARCHAR(100) NOT NULL,
	`birthday` VARCHAR(50) NOT NULL,
	`nationality` VARCHAR(50) NOT NULL,
	`bi` VARCHAR(25) NOT NULL,
	`issuer` VARCHAR(50) NOT NULL,
	`issuedate` VARCHAR(50) NOT NULL,
	`certlevel`	VARCHAR(150) NOT NULL,
	`sos` VARCHAR(100) NOT NULL,
	`bloodtype` VARCHAR(100) NOT NULL,
	`date` TEXT NOT NULL,
	`timeperiod` TEXT NOT NULL,
	`numdives` TEXT NOT NULL,
	`weight` VARCHAR(50) NOT NULL,
	`height` VARCHAR(50) NOT NULL,
	`footsize` VARCHAR(50) NOT NULL,
	`equipment` TEXT NOT NULL,
	`jacket` VARCHAR(5) NOT NULL,
	`farmerjohn` VARCHAR(5) NOT NULL,
	`divesuit` VARCHAR(5) NOT NULL,
	`bcd` VARCHAR(5) NOT NULL,
	`insurance` VARCHAR(5) NOT NULL,

	PRIMARY KEY (`id`)
) ENGINE = MYISAM;

