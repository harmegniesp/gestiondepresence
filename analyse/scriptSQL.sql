-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema GestionDePresence
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `GestionDePresence` ;

-- -----------------------------------------------------
-- Schema GestionDePresence
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `GestionDePresence` DEFAULT CHARACTER SET utf8 ;
USE `GestionDePresence` ;

-- -----------------------------------------------------
-- Table `GestionDePresence`.`School`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `GestionDePresence`.`School` ;

CREATE TABLE IF NOT EXISTS `GestionDePresence`.`School` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `codeSchool` VARCHAR(50) NOT NULL,
  `phone` VARCHAR(50) NOT NULL,
  `address` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `GestionDePresence`.`Course`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `GestionDePresence`.`Course` ;

CREATE TABLE IF NOT EXISTS `GestionDePresence`.`Course` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `codeCourse` VARCHAR(45) NOT NULL,
  `codeUt` VARCHAR(45) NOT NULL,
  `startDate` DATE NOT NULL,
  `endDate` DATE NOT NULL,
  `lessonNumber` INT NOT NULL,
  `nbPeriods` INT NOT NULL,
  `pathDocument` VARCHAR(100) NOT NULL,
  `timeslot` VARCHAR(45) NOT NULL,
  `School_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Course_School_idx` (`School_id` ASC),
  CONSTRAINT `fk_Course_School`
    FOREIGN KEY (`School_id`)
    REFERENCES `GestionDePresence`.`School` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `GestionDePresence`.`Document`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `GestionDePresence`.`Document` ;

CREATE TABLE IF NOT EXISTS `GestionDePresence`.`Document` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `nameCreate` VARCHAR(50) NOT NULL,
  `pathDocument` VARCHAR(100) NOT NULL,
  `format` VARCHAR(50) NOT NULL,
  `size` INT NOT NULL,
  `comment` MEDIUMTEXT NULL,
  `uploadedDate` DATETIME NOT NULL,
  `Course_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Document_Course1_idx` (`Course_id` ASC),
  CONSTRAINT `fk_Document_Course1`
    FOREIGN KEY (`Course_id`)
    REFERENCES `GestionDePresence`.`Course` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = '	';


-- -----------------------------------------------------
-- Table `GestionDePresence`.`Address`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `GestionDePresence`.`Address` ;

CREATE TABLE IF NOT EXISTS `GestionDePresence`.`Address` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `street` VARCHAR(100) NOT NULL,
  `zipCode` VARCHAR(10) NOT NULL,
  `city` VARCHAR(100) NOT NULL,
  `country` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `GestionDePresence`.`Student`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `GestionDePresence`.`Student` ;

CREATE TABLE IF NOT EXISTS `GestionDePresence`.`Student` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `lastname` VARCHAR(45) NOT NULL,
  `firstname` VARCHAR(45) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  `phone` VARCHAR(45) NOT NULL,
  `birthday` DATE NOT NULL,
  `Address_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Student_Address1_idx` (`Address_id` ASC),
  CONSTRAINT `fk_Student_Address1`
    FOREIGN KEY (`Address_id`)
    REFERENCES `GestionDePresence`.`Address` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `GestionDePresence`.`Lesson`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `GestionDePresence`.`Lesson` ;

CREATE TABLE IF NOT EXISTS `GestionDePresence`.`Lesson` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `date` DATE NOT NULL,
  `dateChanged` DATE NOT NULL,
  `classroom` VARCHAR(45) NULL,
  `nbPeriods` INT NOT NULL,
  `absenceTeacher` TINYINT(1) NOT NULL,
  `Course_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Lesson_Course1_idx` (`Course_id` ASC),
  CONSTRAINT `fk_Lesson_Course1`
    FOREIGN KEY (`Course_id`)
    REFERENCES `GestionDePresence`.`Course` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `GestionDePresence`.`Student_Lesson`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `GestionDePresence`.`Student_Lesson` ;

CREATE TABLE IF NOT EXISTS `GestionDePresence`.`Student_Lesson` (
  `Lesson_id` INT NOT NULL,
  `Student_id` INT NOT NULL,
  `hasArrivedLate` TINYINT(1) NOT NULL,
  `hasAttend` TINYINT(1) NOT NULL,
  `hasLeftEarlier` TINYINT(1) NOT NULL,
  `certificate` TINYINT(1) NOT NULL,
  `scanCertificate` VARCHAR(100) NULL,
  `motive` TINYINT(1) NOT NULL,
  `comment` MEDIUMTEXT NULL,
  `testSession` INT NOT NULL,
  PRIMARY KEY (`Lesson_id`, `Student_id`),
  INDEX `fk_Lesson_has_Student_Student1_idx` (`Student_id` ASC),
  INDEX `fk_Lesson_has_Student_Lesson1_idx` (`Lesson_id` ASC),
  CONSTRAINT `fk_Lesson_has_Student_Lesson1`
    FOREIGN KEY (`Lesson_id`)
    REFERENCES `GestionDePresence`.`Lesson` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Lesson_has_Student_Student1`
    FOREIGN KEY (`Student_id`)
    REFERENCES `GestionDePresence`.`Student` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `GestionDePresence`.`Student_Course`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `GestionDePresence`.`Student_Course` ;

CREATE TABLE IF NOT EXISTS `GestionDePresence`.`Student_Course` (
  `Student_id` INT NOT NULL,
  `Course_id` INT NOT NULL,
  `hasPassed` TINYINT(1) NOT NULL,
  `grade` VARCHAR(50) NOT NULL,
  `rating` FLOAT NOT NULL,
  `comment` MEDIUMTEXT NULL,
  PRIMARY KEY (`Student_id`, `Course_id`),
  INDEX `fk_Student_has_Course_Course1_idx` (`Course_id` ASC),
  INDEX `fk_Student_has_Course_Student1_idx` (`Student_id` ASC),
  CONSTRAINT `fk_Student_has_Course_Student1`
    FOREIGN KEY (`Student_id`)
    REFERENCES `GestionDePresence`.`Student` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Student_has_Course_Course1`
    FOREIGN KEY (`Course_id`)
    REFERENCES `GestionDePresence`.`Course` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
