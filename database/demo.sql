CREATE DATABASE `doan` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

use doan;

CREATE TABLE IF NOT EXISTS `account` (
	`id` INT PRIMARY KEY AUTO_INCREMENT,
	`name` VARCHAR(100) NOT NULL,
	`email` VARCHAR(100) NOT NULL UNIQUE,
	`phone` VARCHAR(100) NOT NULL UNIQUE,
	`password` VARCHAR(100) NOT NULL,
	`address` VARCHAR(200) NULL
) ENGINE = InnoDB;

INSERT INTO account(name,email,phone,password,address) VALUES
('Trương trung kiên','trungkien@gmail.com','0976503054','123456','hello')


CREATE TABLE IF NOT EXISTS `course` (
	`idkh` INT PRIMARY KEY AUTO_INCREMENT,
	`name` VARCHAR(100) NOT NULL,
	`levelkh` VARCHAR(100) NOT NULL UNIQUE,
	`content` VARCHAR NOT NULL UNIQUE,
	`image` VARCHAR(100) NOT NULL,
	
) ENGINE = InnoDB;
