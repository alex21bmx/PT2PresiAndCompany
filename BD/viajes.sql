-- MySQL Script generated by MySQL Workbench
-- Wed Dec  9 11:31:43 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(30) NOT NULL,
  `contraseña` VARCHAR(50) NOT NULL,
  `tipo_usuario` ENUM('admin', 'usuario') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`experiencias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`experiencias` (
  `id_experiencia` INT NOT NULL AUTO_INCREMENT,
  `fecha_de_publicacion` TIMESTAMP NOT NULL,
  `texto` LONGTEXT NOT NULL,
  `imagen` VARCHAR(100) NOT NULL,
  `coordenadas` POINT NOT NULL,
  `categoria` SET('aventures', 'muntanyisme', 'familiar', 'històric', 'romàntic') NOT NULL,
  `valoraciones_positivas` INT NOT NULL DEFAULT 0,
  `valoraciones_negativas` INT NOT NULL DEFAULT 0,
  `estado` ENUM('esbozo', 'publicada', 'eliminada') NOT NULL,
  `id_usuario` INT NOT NULL,
  PRIMARY KEY (`id_experiencia`),
  INDEX `fk_experiencias_usuarios1_idx` (`id_usuario` ASC),
  CONSTRAINT `fk_experiencias_usuarios1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `mydb`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
