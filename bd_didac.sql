DROP DATABASE IF EXISTS `Ticketing`;
CREATE DATABASE IF NOT EXISTS `Ticketing`;
USE `Ticketing`;

DROP TABLE IF EXISTS `incidencies`;
CREATE TABLE `incidencies` (
`id` INT NOT NULL AUTO_INCREMENT,
`descripcio` VARCHAR(300),
`tipus` VARCHAR(25),
`usuari` VARCHAR(25),
`estat` VARCHAR(25),
`data` DATE,
PRIMARY KEY (`id`)
)ENGINE=innodb;

DROP TABLE IF EXISTS `usuaris`;
CREATE TABLE `usuaris` (
`id` INT NOT NULL AUTO_INCREMENT,
`usuari` VARCHAR(30),
`contrasenya` VARCHAR(30),
`rol` VARCHAR(20),
PRIMARY KEY (`id`)
)ENGINE=innodb;

INSERT INTO usuaris (`usuari`,`contrasenya`,`rol`) VALUES
('Didac','1234','Admin'),
('Sergi','1234','Cliente');

INSERT INTO incidencies (`tipus`,`descripcio`,`estat`,`usuari`,`data`) VALUES
('Software','roto','Abierta','Didac',NOW()),
('Hardware','averia','Cerrada','Sergi',NOW());


