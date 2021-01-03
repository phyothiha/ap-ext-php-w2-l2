CREATE DATABASE `php`;

USE `php`;

CREATE TABLE `todo`(
    `id` INT(11) PRIMARY KEY AUTO_INCREMENT,
    `title` TEXT,
    `description` TEXT,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=INNODB;

EXPLAIN `todo`;

INSERT INTO `todo` (`title`, `description`) 
VALUES (?, ?);

SELECT * FROM `todo` ORDER BY `id` DESC;
SELECT * FROM `todo` WHERE `id` = ?;

UPDATE `todo`
SET
    `title` = ?,
    `description` = ?,
WHERE
    `id` = ?;

DELETE FROM `todo` WHERE `id` = ?;