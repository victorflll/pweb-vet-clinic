CREATE DATABASE vetsystem;
USE vetsystem;

CREATE TABLE `user`(
	`iduser` INT AUTO_INCREMENT,
	`name` VARCHAR(200) NOT NULL,
    `email` VARCHAR(200) NOT NULL,
    `password` VARCHAR(32) NOT NULL,
    `cpf` VARCHAR(14) NOT NULL,
    `street` VARCHAR(200) NOT NULL,
    `houseNumber` INT NULL,
    `neighborhood` VARCHAR(200) NOT NULL, 
    `city` VARCHAR(200) NOT NULL, 
    `state` VARCHAR(200) NOT NULL, 
    CONSTRAINT PRIMARY KEY(`iduser`, `cpf`)
);
    
CREATE TABLE `vet`(
	`idvet` INT AUTO_INCREMENT,
	`name` VARCHAR(200) NOT NULL,
    `password` VARCHAR(32) NOT NULL,
    `cpf` VARCHAR(14) NOT NULL,
    `street` VARCHAR(200) NOT NULL,
    `houseNumber` INT NULL,
    `neighborhood` VARCHAR(200) NOT NULL, 
    `city` VARCHAR(200) NOT NULL, 
    `state` VARCHAR(200) NOT NULL, 
    `crmv` VARCHAR(200) NOT NULL,
    `wage` DOUBLE NOT NULL,
    `workload` INT NOT NULL,
    CONSTRAINT PRIMARY KEY(`idvet`, `cpf`)
);
CREATE TABLE `animal`(
	`idanimal` INT AUTO_INCREMENT,
    `iduser` INT,
    `idvet` INT,
	`name` VARCHAR(200) NOT NULL,
    `age` INT NULL,
    `hasDecifiency` bool NOT NULL,
    `deficiency` VARCHAR(200) NULL,
    `type` VARCHAR(200) NOT NULL, 
    `breed` VARCHAR(200) NULL, 
    `gender` VARCHAR(200) NOT NULL, 
    `size` VARCHAR(200),
    `fur` VARCHAR(200),
    `furColor` VARCHAR(200),
	`additionalFeatures` VARCHAR(1000) NULL,
    CONSTRAINT PRIMARY KEY(`idanimal`, `iduser`, `idvet`),
    CONSTRAINT fk_iduser FOREIGN KEY (`iduser`) REFERENCES `user`(`iduser`),
    CONSTRAINT fk_idvet FOREIGN KEY (`idvet`) REFERENCES `vet`(`idvet`)
);