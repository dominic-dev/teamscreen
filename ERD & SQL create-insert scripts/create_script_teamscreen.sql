-- ---------------------------------------
-- CREATE SCRIPT FOR TEAMSCREEN APPLICATION DATABASE
-- ------------------------------------------

-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema TeamScreen
-- -----------------------------------------------------
DROP DATABASE IF EXISTS `TeamScreen` ;

-- -----------------------------------------------------
-- Schema TeamScreen
-- -----------------------------------------------------
CREATE DATABASE IF NOT EXISTS `TeamScreen` DEFAULT CHARACTER SET utf8 ;
USE `TeamScreen` ;

-- -----------------------------------------------------
-- Table `TeamScreen`.`Team`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TeamScreen`.`Team` ;

CREATE TABLE IF NOT EXISTS `TeamScreen`.`Team` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `label` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TeamScreen`.`Member`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TeamScreen`.`Member` ;

CREATE TABLE IF NOT EXISTS `TeamScreen`.`Member` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `username` VARCHAR(45) NULL,
  `destination` VARCHAR(45) NULL,
  `drink_preference` ENUM('koffie', 'thee', 'water') NULL,
  `working_days` SET('maandag', 'dinsdag', 'woensdag', 'donderdag', 'vrijdag') NULL,
  `team_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_member_team_idx` (`team_id` ASC),
  CONSTRAINT `fk_member_team`
    FOREIGN KEY (`team_id`)
    REFERENCES `TeamScreen`.`Team` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TeamScreen`.`TimeOff`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TeamScreen`.`Time_Off` ;

CREATE TABLE IF NOT EXISTS `TeamScreen`.`Time_Off` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `start_time` DATETIME NULL,
  `end_time` DATETIME NULL,
  `member_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_time_off_member_idx` (`member_id` ASC),
  CONSTRAINT `fk_time_off_member`
    FOREIGN KEY (`member_id`)
    REFERENCES `TeamScreen`.`Member` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;