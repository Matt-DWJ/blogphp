-- MySQL Script generated by MySQL Workbench
-- Fri Nov  1 16:10:22 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering
-- Version MySQL 5.7
-- Warning : replace name `blog` with dbname

SET @OLD_UNIQUE_CHECKS = @@UNIQUE_CHECKS, UNIQUE_CHECKS = 0;
SET @OLD_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS = 0;
SET @OLD_SQL_MODE = @@SQL_MODE, SQL_MODE =
        'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema blog
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema blog
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `blog` DEFAULT CHARACTER SET utf8;
USE `blog`;

-- -----------------------------------------------------
-- Table `blog`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blog`.`user`
(
    `id`         INT          NOT NULL,
    `username`   VARCHAR(16)  NOT NULL,
    `email`      VARCHAR(255) NOT NULL,
    `password`   VARCHAR(255) NOT NULL,
    `created_at` DATETIME     NOT NULL,
    `role`       INT          NOT NULL,
    `status`     TINYINT(1)   NOT NULL,
    `token`      VARCHAR(255) NULL,
    UNIQUE INDEX `login_UNIQUE` (`username` ASC),
    UNIQUE INDEX `usercol_UNIQUE` (`id` ASC),
    PRIMARY KEY (`id`),
    UNIQUE INDEX `email_UNIQUE` (`email` ASC)
);


-- -----------------------------------------------------
-- Table `blog`.`article`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blog`.`article`
(
    `id`               INT          NOT NULL AUTO_INCREMENT,
    `created_at`       DATETIME     NOT NULL,
    `content`          TEXT         NOT NULL,
    `title`            VARCHAR(60)  NOT NULL,
    `picture_url`      VARCHAR(255) NULL,
    `publish`          TINYINT(1)   NOT NULL,
    `user_id`          INT          NOT NULL,
    `alternative_text` VARCHAR(255) NULL,
    `excerpt`          VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`, `user_id`),
    INDEX `fk_article_user_idx` (`user_id` ASC),
    CONSTRAINT `fk_article_user`
        FOREIGN KEY (`user_id`)
            REFERENCES `blog`.`user` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION
)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blog`.`comment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blog`.`comment`
(
    `id`         INT          NOT NULL,
    `created_at` DATE         NOT NULL,
    `content`    VARCHAR(255) NOT NULL,
    `status`     TINYINT(1)   NOT NULL,
    `article_id` INT          NOT NULL,
    `user_id`    INT          NOT NULL,
    PRIMARY KEY (`id`, `article_id`, `user_id`),
    UNIQUE INDEX `ID_UNIQUE` (`id` ASC),
    INDEX `fk_comment_article1_idx` (`article_id` ASC, `user_id` ASC),
    CONSTRAINT `fk_comment_article1`
        FOREIGN KEY (`article_id`, `user_id`)
            REFERENCES `blog`.`article` (`id`, `user_id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION
)
    ENGINE = InnoDB;


SET SQL_MODE = @OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS = @OLD_UNIQUE_CHECKS;
