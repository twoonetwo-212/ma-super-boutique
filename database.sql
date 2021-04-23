-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema demo_poo
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema demo_poo
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `demo_poo` DEFAULT CHARACTER SET latin1 ;
USE `demo_poo` ;

-- -----------------------------------------------------
-- Table `demo_poo`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `demo_poo`.`users` (
  `id` INT(2) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NULL DEFAULT NULL,
  `pass` VARCHAR(255) NULL DEFAULT NULL,
  `roles` JSON NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `demo_poo`.`annonces`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `demo_poo`.`annonces` (
  `id` INT(2) NOT NULL AUTO_INCREMENT,
  `titre` VARCHAR(30) NULL DEFAULT NULL,
  `description` TEXT NULL DEFAULT NULL,
  `created_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `actif` INT(1) NULL DEFAULT '0',
  `users_id` INT(2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `users_id` (`users_id` ASC),
  CONSTRAINT `annonces_ibfk_1`
    FOREIGN KEY (`users_id`)
    REFERENCES `demo_poo`.`users` (`id`),
  CONSTRAINT `annonces_ibfk_2`
    FOREIGN KEY (`users_id`)
    REFERENCES `demo_poo`.`users` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `demo_poo`.`articles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `demo_poo`.`articles` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `article_name` VARCHAR(45) NOT NULL,
  `article_price` INT NOT NULL,
  `article_description` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `demo_poo`.`users_has_articles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `demo_poo`.`users_has_articles` (
  `users_id` INT(2) NOT NULL,
  `articles_id` INT NOT NULL,
  PRIMARY KEY (`users_id`, `articles_id`),
  INDEX `fk_users_has_articles_articles1_idx` (`articles_id` ASC),
  INDEX `fk_users_has_articles_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_users_has_articles_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `demo_poo`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_articles_articles1`
    FOREIGN KEY (`articles_id`)
    REFERENCES `demo_poo`.`articles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
