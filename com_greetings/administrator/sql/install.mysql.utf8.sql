CREATE TABLE IF NOT EXISTS `#__greetings` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`state` TINYINT(1)  NULL  DEFAULT 1,
`ordering` INT(11)  NULL  DEFAULT 0,
`title` VARCHAR(50)  NULL  DEFAULT "",
`message` TEXT NULL ,
PRIMARY KEY (`id`)
,KEY `idx_state` (`state`)
) DEFAULT COLLATE=utf8mb4_unicode_ci;

