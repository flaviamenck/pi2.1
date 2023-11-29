-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema meu_banco
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `meu_banco` ;

-- -----------------------------------------------------
-- Schema meu_banco
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `meu_banco` DEFAULT CHARACTER SET utf8mb4 ;
USE `meu_banco` ;

-- -----------------------------------------------------
-- Table `meu_banco`.`empresa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `meu_banco`.`empresa` ;

CREATE TABLE IF NOT EXISTS `meu_banco`.`empresa` (
  `empresa_id` INT(11) NOT NULL AUTO_INCREMENT,
  `razao_social` VARCHAR(255) NOT NULL,
  `nome_fantasia` VARCHAR(255) NOT NULL,
  `CNPJ` VARCHAR(255) NOT NULL,
  `IE` VARCHAR(255) NOT NULL,
  `CEP` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `n_funcionarios` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`empresa_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `meu_banco`.`usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `meu_banco`.`usuarios` ;

CREATE TABLE IF NOT EXISTS `meu_banco`.`usuarios` (
  `id_usuario` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `senha` VARCHAR(255) NOT NULL,
  `CPF` VARCHAR(255) NOT NULL,
  `data_nascimento` DATE NOT NULL,
  `CEP` VARCHAR(255) NOT NULL,
  `genero` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_usuario`))
ENGINE = InnoDB
AUTO_INCREMENT = 26
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `meu_banco`.`vagas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `meu_banco`.`vagas` ;

CREATE TABLE IF NOT EXISTS `meu_banco`.`vagas` (
  `id_vagas` INT NOT NULL AUTO_INCREMENT,
  `funcao` VARCHAR(45) NULL,
  `salario` VARCHAR(45) NULL,
  `carga_horaria` VARCHAR(45) NULL,
  `descricao` VARCHAR(45) NULL,
  `local` VARCHAR(45) NULL,
  `tipo_vaga` VARCHAR(45) NULL,
  `contratacao` VARCHAR(45) NULL,
  `empresa_empresa_id` INT(11) NOT NULL,
  PRIMARY KEY (`id_vagas`),
  INDEX `fk_vagas_empresa_idx` (`empresa_empresa_id` ASC) ,
  CONSTRAINT `fk_vagas_empresa`
    FOREIGN KEY (`empresa_empresa_id`)
    REFERENCES `meu_banco`.`empresa` (`empresa_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `meu_banco`.`enderecos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `meu_banco`.`enderecos` ;

CREATE TABLE IF NOT EXISTS `meu_banco`.`enderecos` (
  `id_enderecos` INT NOT NULL AUTO_INCREMENT,
  `numero` INT NULL,
  `cidade` VARCHAR(45) NULL,
  `estado` VARCHAR(45) NULL,
  `pais` VARCHAR(45) NULL,
  `CEP` VARCHAR(45) NULL,
  `rua` VARCHAR(45) NULL,
  `bairro` VARCHAR(45) NULL,
  PRIMARY KEY (`id_enderecos`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `meu_banco`.`telefones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `meu_banco`.`telefones` ;

CREATE TABLE IF NOT EXISTS `meu_banco`.`telefones` (
  `id_telefones` INT NOT NULL AUTO_INCREMENT,
  `telefone` INT NULL,
  PRIMARY KEY (`id_telefones`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `meu_banco`.`curriculos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `meu_banco`.`curriculos` ;

CREATE TABLE IF NOT EXISTS `meu_banco`.`curriculos` (
  `id_curriculos` INT NOT NULL AUTO_INCREMENT,
  `arquivo_pdf` LONGBLOB NULL,
  `vagas_id_vagas` INT NOT NULL,
  `usuarios_id_usuario` INT(11) NOT NULL,
  PRIMARY KEY (`id_curriculos`),
  INDEX `fk_curriculos_vagas1_idx` (`vagas_id_vagas` ASC) ,
  INDEX `fk_curriculos_usuarios1_idx` (`usuarios_id_usuario` ASC) ,
  CONSTRAINT `fk_curriculos_vagas1`
    FOREIGN KEY (`vagas_id_vagas`)
    REFERENCES `meu_banco`.`vagas` (`id_vagas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_curriculos_usuarios1`
    FOREIGN KEY (`usuarios_id_usuario`)
    REFERENCES `meu_banco`.`usuarios` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `meu_banco`.`usuarios_tem_vagas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `meu_banco`.`usuarios_tem_vagas` ;

CREATE TABLE IF NOT EXISTS `meu_banco`.`usuarios_tem_vagas` (
  `usuarios_id_usuario` INT(11) NOT NULL,
  `vagas_id_vagas` INT NOT NULL,
  PRIMARY KEY (`usuarios_id_usuario`, `vagas_id_vagas`),
  INDEX `fk_usuarios_has_vagas_vagas1_idx` (`vagas_id_vagas` ASC) ,
  INDEX `fk_usuarios_has_vagas_usuarios1_idx` (`usuarios_id_usuario` ASC) ,
  CONSTRAINT `fk_usuarios_has_vagas_usuarios1`
    FOREIGN KEY (`usuarios_id_usuario`)
    REFERENCES `meu_banco`.`usuarios` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_has_vagas_vagas1`
    FOREIGN KEY (`vagas_id_vagas`)
    REFERENCES `meu_banco`.`vagas` (`id_vagas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `meu_banco`.`enderecos_tem_empresa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `meu_banco`.`enderecos_tem_empresa` ;

CREATE TABLE IF NOT EXISTS `meu_banco`.`enderecos_tem_empresa` (
  `enderecos_id_enderecos` INT NOT NULL,
  `empresa_empresa_id` INT(11) NOT NULL,
  PRIMARY KEY (`enderecos_id_enderecos`, `empresa_empresa_id`),
  INDEX `fk_enderecos_has_empresa_empresa1_idx` (`empresa_empresa_id` ASC) ,
  INDEX `fk_enderecos_has_empresa_enderecos1_idx` (`enderecos_id_enderecos` ASC) ,
  CONSTRAINT `fk_enderecos_has_empresa_enderecos1`
    FOREIGN KEY (`enderecos_id_enderecos`)
    REFERENCES `meu_banco`.`enderecos` (`id_enderecos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_enderecos_has_empresa_empresa1`
    FOREIGN KEY (`empresa_empresa_id`)
    REFERENCES `meu_banco`.`empresa` (`empresa_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `meu_banco`.`usuarios_tem_enderecos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `meu_banco`.`usuarios_tem_enderecos` ;

CREATE TABLE IF NOT EXISTS `meu_banco`.`usuarios_tem_enderecos` (
  `usuarios_id_usuario` INT(11) NOT NULL,
  `enderecos_id_enderecos` INT NOT NULL,
  PRIMARY KEY (`usuarios_id_usuario`, `enderecos_id_enderecos`),
  INDEX `fk_usuarios_has_enderecos_enderecos1_idx` (`enderecos_id_enderecos` ASC) ,
  INDEX `fk_usuarios_has_enderecos_usuarios1_idx` (`usuarios_id_usuario` ASC) ,
  CONSTRAINT `fk_usuarios_has_enderecos_usuarios1`
    FOREIGN KEY (`usuarios_id_usuario`)
    REFERENCES `meu_banco`.`usuarios` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_has_enderecos_enderecos1`
    FOREIGN KEY (`enderecos_id_enderecos`)
    REFERENCES `meu_banco`.`enderecos` (`id_enderecos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `meu_banco`.`empresa_tem_telefones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `meu_banco`.`empresa_tem_telefones` ;

CREATE TABLE IF NOT EXISTS `meu_banco`.`empresa_tem_telefones` (
  `empresa_empresa_id` INT(11) NOT NULL,
  `telefones_id_telefones` INT NOT NULL,
  PRIMARY KEY (`empresa_empresa_id`, `telefones_id_telefones`),
  INDEX `fk_empresa_has_telefones_telefones1_idx` (`telefones_id_telefones` ASC) ,
  INDEX `fk_empresa_has_telefones_empresa1_idx` (`empresa_empresa_id` ASC) ,
  CONSTRAINT `fk_empresa_has_telefones_empresa1`
    FOREIGN KEY (`empresa_empresa_id`)
    REFERENCES `meu_banco`.`empresa` (`empresa_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_has_telefones_telefones1`
    FOREIGN KEY (`telefones_id_telefones`)
    REFERENCES `meu_banco`.`telefones` (`id_telefones`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `meu_banco`.`usuarios_tem_telefones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `meu_banco`.`usuarios_tem_telefones` ;

CREATE TABLE IF NOT EXISTS `meu_banco`.`usuarios_tem_telefones` (
  `usuarios_id_usuario` INT(11) NOT NULL,
  `telefones_id_telefones` INT NOT NULL,
  PRIMARY KEY (`usuarios_id_usuario`, `telefones_id_telefones`),
  INDEX `fk_usuarios_has_telefones_telefones1_idx` (`telefones_id_telefones` ASC) ,
  INDEX `fk_usuarios_has_telefones_usuarios1_idx` (`usuarios_id_usuario` ASC) ,
  CONSTRAINT `fk_usuarios_has_telefones_usuarios1`
    FOREIGN KEY (`usuarios_id_usuario`)
    REFERENCES `meu_banco`.`usuarios` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_has_telefones_telefones1`
    FOREIGN KEY (`telefones_id_telefones`)
    REFERENCES `meu_banco`.`telefones` (`id_telefones`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
