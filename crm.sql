-- ---
-- Globals
-- ---

-- SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
-- SET FOREIGN_KEY_CHECKS=0;

-- ---
-- Table 'tasks'
-- 
-- ---

DROP TABLE IF EXISTS `tasks`;
		
CREATE TABLE `tasks` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `author_id` INTEGER NULL DEFAULT NULL,
  `executor_id` INTEGER NULL DEFAULT NULL,
  `project_id` INTEGER NULL DEFAULT NULL,
  `status_id` INTEGER NULL DEFAULT NULL,
  `title` VARCHAR(255) NULL DEFAULT NULL,
  `description` MEDIUMTEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'users'
-- List of users
-- ---

DROP TABLE IF EXISTS `users`;
		
CREATE TABLE `users` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `email` CHAR(60) NULL DEFAULT NULL,
  `name` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) COMMENT 'List of users';

-- ---
-- Table 'projects'
-- List of projects
-- ---

DROP TABLE IF EXISTS `projects`;
		
CREATE TABLE `projects` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `user_id` INTEGER NULL DEFAULT NULL,
  `title` VARCHAR(255) NULL DEFAULT NULL,
  `description` MEDIUMTEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) COMMENT 'List of projects';

-- ---
-- Table 'task_statuses'
-- 
-- ---

DROP TABLE IF EXISTS `task_statuses`;
		
CREATE TABLE `task_statuses` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `title` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'workday'
-- 
-- ---

DROP TABLE IF EXISTS `workday`;
		
CREATE TABLE `workday` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `user_id` INTEGER NULL DEFAULT NULL,
  `date` DATE NULL DEFAULT NULL,
  `start` TIME NULL DEFAULT NULL,
  `end` TIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Foreign Keys 
-- ---

ALTER TABLE `tasks` ADD FOREIGN KEY (author_id) REFERENCES `users` (`id`);
ALTER TABLE `tasks` ADD FOREIGN KEY (executor_id) REFERENCES `users` (`id`);
ALTER TABLE `tasks` ADD FOREIGN KEY (project_id) REFERENCES `projects` (`id`);
ALTER TABLE `tasks` ADD FOREIGN KEY (status_id) REFERENCES `task_statuses` (`id`);
ALTER TABLE `projects` ADD FOREIGN KEY (user_id) REFERENCES `users` (`id`);
ALTER TABLE `workday` ADD FOREIGN KEY (user_id) REFERENCES `users` (`id`);

-- ---
-- Table Properties
-- ---

-- ALTER TABLE `tasks` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `users` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `projects` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `task_statuses` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `workday` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ---
-- Test Data
-- ---

-- INSERT INTO `tasks` (`id`,`author_id`,`executor_id`,`project_id`,`status_id`,`title`,`description`) VALUES
-- ('','','','','','','');
-- INSERT INTO `users` (`id`,`email`,`name`) VALUES
-- ('','','');
-- INSERT INTO `projects` (`id`,`user_id`,`title`,`description`) VALUES
-- ('','','','');
-- INSERT INTO `task_statuses` (`id`,`title`) VALUES
-- ('','');
-- INSERT INTO `workday` (`id`,`user_id`,`date`,`start`,`end`) VALUES
-- ('','','','','');