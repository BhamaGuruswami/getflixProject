CREATE TABLE `register`.`users` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(128) NOT NULL , `email` VARCHAR(256) NOT NULL , `password` VARCHAR(128) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;


CREATE TABLE `register`.`comment` ( `cid` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(128) NOT NULL , `date` DATETIME NOT NULL , `message` TEXT NOT NULL , PRIMARY KEY (`cid`)) ENGINE = InnoDB;