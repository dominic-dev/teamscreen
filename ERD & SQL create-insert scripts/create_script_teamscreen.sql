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
DROP SCHEMA IF EXISTS `TeamScreen` ;

-- -----------------------------------------------------
-- Schema TeamScreen
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `TeamScreen` DEFAULT CHARACTER SET utf8 ;
USE `TeamScreen` ;

-- -----------------------------------------------------
-- Table `TeamScreen`.`Team`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TeamScreen`.`Team` ;

CREATE TABLE IF NOT EXISTS `TeamScreen`.`Team` (
  `idTeam` INT NOT NULL AUTO_INCREMENT,
  `label` VARCHAR(45) NULL,
  PRIMARY KEY (`idTeam`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TeamScreen`.`Member`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TeamScreen`.`Member` ;

CREATE TABLE IF NOT EXISTS `TeamScreen`.`Member` (
  `idTeamMember` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `username` VARCHAR(45) NULL,
  `destination` VARCHAR(45) NULL,
  `drink_preference` ENUM('koffie', 'thee', 'water') NULL,
  `workdays` SET('maandag', 'dinsdag', 'woensdag', 'donderdag', 'vrijdag') NULL,
  `Team_idTeam` INT NULL,
  PRIMARY KEY (`idTeamMember`),
  INDEX `fk_TeamMember_Team_idx` (`Team_idTeam` ASC),
  CONSTRAINT `fk_TeamMember_Team`
    FOREIGN KEY (`Team_idTeam`)
    REFERENCES `TeamScreen`.`Team` (`idTeam`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TeamScreen`.`TimeOff`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TeamScreen`.`TimeOff` ;

CREATE TABLE IF NOT EXISTS `TeamScreen`.`TimeOff` (
  `idFreeTime` INT NOT NULL AUTO_INCREMENT,
  `start_time` DATETIME NULL,
  `end_time` DATETIME NULL,
  `Member_idMember` INT NOT NULL,
  PRIMARY KEY (`idFreeTime`),
  INDEX `fk_TimeOff_TeamMember_idx` (`Member_idMember` ASC),
  CONSTRAINT `fk_TimeOff_TeamMember`
    FOREIGN KEY (`Member_idMember`)
    REFERENCES `TeamScreen`.`Member` (`idTeamMember`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;