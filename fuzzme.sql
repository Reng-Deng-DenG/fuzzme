CREATE USER 'fuzzme'@'localhost' IDENTIFIED WITH mysql_native_password BY 'xxx';
CREATE DATABASE fuzzme;
use fuzzme;
GRANT ALL ON fuzzme.* TO 'fuzzme'@'localhost';


CREATE TABLE `challenges`
(
        `id` INT NOT NULL AUTO_INCREMENT,
        `name` VARCHAR(60) NOT NULL,
        `type` VARCHAR(60) NOT NULL,
	`url` VARCHAR(120) NOT NULL,
        `difficulty` VARCHAR(60) NOT NULL,
	`description` VARCHAR(360) NOT NULL,
        `points` INT NOT NULL,

        PRIMARY KEY (`id`)
)

CHARACTER SET utf8;



CREATE TABLE `labs`
(
        `id` INT NOT NULL AUTO_INCREMENT,
        `name` INT NOT NULL,
        `flawType` VARCHAR(120) NOT NULL,

        PRIMARY KEY (`id`)
)

CHARACTER SET utf8;


CREATE TABLE `users`
(
	`id` INT NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(60) NOT NULL,
	`password` VARCHAR(60) NOT NULL,
	`email` VARCHAR(60) NOT NULL,
	`ip` VARCHAR(60) NOT NULL,
	`referer` VARCHAR(255),
	`userAgent`VARCHAR(255) NOT NULL,
	`points` INT NOT NULL,
	`rank` INT NOT NULL,

	PRIMARY KEY(`id`)
)

CHARACTER SET utf8;

CREATE TABLE `logs`
(	
	`id` INT NOT NULL AUTO_INCREMENT,
	`email` VARCHAR(60) NOT NULL,
	`ip` VARCHAR(60) NOT NULL,
	
	PRIMARY KEY(`id`);
)

CHARACTER SET utf8;



INSERT INTO `users` (username, password, email, ip, referer, userAgent, points, rank) VALUES ('admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin','127.0.0.1','http://127.0.0.0','Mozilla X64', 0, '1');


