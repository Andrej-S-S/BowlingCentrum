DROP DATABASE IF EXISTS `Bowlingcentrum`;
CREATE DATABASE `Bowlingcentrum`;
USE `Bowlingcentrum`;
 
DROP TABLE IF EXISTS `Score`;
CREATE TABLE `Score`(
    `Id`            		INT             NOT NULL        AUTO_INCREMENT PRIMARY KEY
    ,`Naam`            		VARCHAR(100)    NOT NULL
    ,`Score`            	INT             NOT NULL
	,`IsActief`         	BIT          	NOT NULL        DEFAULT 1
    ,`DatumAangemaakt`		TIMESTAMP 		NOT NULL		DEFAULT CURRENT_TIMESTAMP
    ,`DatumGewijzigd` 		TIMESTAMP 		NOT NULL		DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	,`Opmerking`     		Varchar(500)    NULL
)ENGINE=INNODB;

DROP TABLE IF EXISTS `Persoon`;
CREATE TABLE `Persoon` (
    `Id`                 	INT             NOT NULL    	AUTO_INCREMENT PRIMARY KEY
	,`Voornaam`            	VARCHAR(100)    NOT NULL
    ,`TussenVoegsel`        VARCHAR(50)     NULL
    ,`Achternaam`        	VARCHAR(100)    NOT NULL
    ,`IsVolwassen`        	TINYINT         NULL
    ,`IsActief`         	BIT          	NOT NULL        DEFAULT 1
    ,`DatumAangemaakt`		TIMESTAMP 		NOT NULL		DEFAULT CURRENT_TIMESTAMP
    ,`DatumGewijzigd` 		TIMESTAMP 		NOT NULL		DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	,`Opmerking`     		Varchar(500)    NULL
)ENGINE=INNODB;

DROP TABLE IF EXISTS `ScorePerPerson`;
CREATE TABLE `ScorePerPerson`(
    `Id`                 	INT             NOT NULL        AUTO_INCREMENT PRIMARY KEY
    ,`PersoonId`            INT             NOT NULL        UNIQUE KEY
    ,`ScoreId`           	INT             NOT NULL        
    ,`ReserveringId`        INT             NOT NULL        UNIQUE KEY
    ,`IsActief`         	BIT          	NOT NULL        DEFAULT 1
    ,`DatumAangemaakt`		TIMESTAMP 		NOT NULL		DEFAULT CURRENT_TIMESTAMP
    ,`DatumGewijzigd` 		TIMESTAMP 		NOT NULL		DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	,`Opmerking`     		Varchar(500)    NULL
    ,CONSTRAINT ScorePerPersoonScore FOREIGN KEY (`ScoreId`) REFERENCES `Score`(`Id`)
    ,CONSTRAINT ScorePerPersoonPersoon FOREIGN KEY (`PersoonId`) REFERENCES `Persoon`(`Id`)
)ENGINE=INNODB;

DROP TABLE IF EXISTS `Contact`;
CREATE TABLE `Contact`(
    `Id`                 	INT             	NOT NULL        AUTO_INCREMENT PRIMARY KEY
    ,`PersoonId`			INT					NOT NULL
    ,`Mobiel`            	VARCHAR(15)        	NOT NULL
    ,`Email`                VARCHAR(100)    	NOT NULL
    ,`IsActief`         	BIT          	NOT NULL        DEFAULT 1
    ,`DatumAangemaakt`		TIMESTAMP 		NOT NULL		DEFAULT CURRENT_TIMESTAMP
    ,`DatumGewijzigd` 		TIMESTAMP 		NOT NULL		DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	,`Opmerking`     		Varchar(500)    NULL
    ,CONSTRAINT ContactPersoon FOREIGN KEY (`PersoonId`) REFERENCES `Persoon`(`Id`)
)ENGINE=INNODB;

DROP TABLE IF EXISTS `Openingstijden`;
CREATE TABLE `OpeningsTijden` (
    `Id` 					INT 			NOT NULL 		AUTO_INCREMENT PRIMARY KEY
    ,`dag` 					DATE 			NOT NULL
    ,`Openingstijd` 		DATETIME 		NOT NULL
    ,`Sluitingstijd` 		DATETIME 		NOT NULL
    ,`IsActief`         	BIT          	NOT NULL        DEFAULT 1
    ,`DatumAangemaakt`		TIMESTAMP 		NOT NULL		DEFAULT CURRENT_TIMESTAMP
    ,`DatumGewijzigd` 		TIMESTAMP 		NOT NULL		DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	,`Opmerking`     		Varchar(500)    NULL
)ENGINE=INNODB;

DROP TABLE IF EXISTS `PakketOpties`;
CREATE TABLE `PakketOpties` (
    `Id` 					INT NOT NULL PRIMARY KEY
    ,`Pakket` 				ENUM('SnackPakket Basis', 'SnackPakket Luxe', 'Kinderpartij', 'Vrijgezellen feest') NOT NULL
    ,`IsActief`         	BIT          	NOT NULL        DEFAULT 1
    ,`DatumAangemaakt`		TIMESTAMP 		NOT NULL		DEFAULT CURRENT_TIMESTAMP
    ,`DatumGewijzigd` 		TIMESTAMP 		NOT NULL		DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	,`Opmerking`     		Varchar(500)    NULL
)ENGINE=INNODB;

DROP TABLE IF EXISTS `Tarief`;
CREATE TABLE `Tarief` (
    `id`             		INT             NOT NULL        AUTO_INCREMENT PRIMARY KEY
    ,`Tarief`     			INT             NOT NULL
    ,`IsActief`         	BIT          	NOT NULL        DEFAULT 1
    ,`DatumAangemaakt`		TIMESTAMP 		NOT NULL		DEFAULT CURRENT_TIMESTAMP
    ,`DatumGewijzigd` 		TIMESTAMP 		NOT NULL		DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	,`Opmerking`     		Varchar(500)    NULL
)ENGINE=INNODB;

DROP TABLE IF EXISTS `Banen`;
CREATE TABLE `Banen` (
    `Id` 					INT 			NOT NULL  		AUTO_INCREMENT PRIMARY KEY
    ,`baan` 				INT 			NOT NULL
    ,`Kindmogelijkheid` 	VARCHAR(50) 	NOT NULL
    ,`IsActief`         	BIT          	NOT NULL        DEFAULT 1
    ,`DatumAangemaakt`		TIMESTAMP 		NOT NULL		DEFAULT CURRENT_TIMESTAMP
    ,`DatumGewijzigd` 		TIMESTAMP 		NOT NULL		DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	,`Opmerking`     		Varchar(500)    NULL
)ENGINE=INNODB;

DROP TABLE IF EXISTS `User`;
CREATE TABLE `User` (
    `Id` 					INT 			NOT NULL 		AUTO_INCREMENT PRIMARY KEY
    ,`PersoonId` 			INT 			NOT NULL
    ,`Gebruikersnaam` 		VARCHAR(50) 	NOT NULL
    ,`Password` 			VARCHAR(255) 	NOT NULL
    ,`IsActief`         	BIT          	NOT NULL        DEFAULT 1
    ,`DatumAangemaakt`		TIMESTAMP 		NOT NULL		DEFAULT CURRENT_TIMESTAMP
    ,`DatumGewijzigd` 		TIMESTAMP 		NOT NULL		DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	,`Opmerking`     		Varchar(500)    NULL
    ,CONSTRAINT UserPersoon FOREIGN KEY (`PersoonId`) REFERENCES `Persoon`(`id`)
)ENGINE=INNODB;

DROP TABLE IF EXISTS `RolePerUser`;
CREATE TABLE `RolePerUser` (
    `Id` 					INT	 			NOT NULL 		AUTO_INCREMENT PRIMARY KEY
    ,`RoleId` 				INT 			NOT NULL
    ,`UserId` 				INT				NOT NULL
    ,`IsActief`         	BIT          	NOT NULL        DEFAULT 1
    ,`DatumAangemaakt`		TIMESTAMP 		NOT NULL		DEFAULT CURRENT_TIMESTAMP
    ,`DatumGewijzigd` 		TIMESTAMP 		NOT NULL		DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	,`Opmerking`     		Varchar(500)    NULL
    ,CONSTRAINT RolePerUserUser FOREIGN KEY (`UserId`) REFERENCES `User`(`id`)
    ,CONSTRAINT RolePerUserRole FOREIGN KEY (`RoleId`) REFERENCES `Persoon`(`id`)
)ENGINE=INNODB;

DROP TABLE IF EXISTS `Role`;
CREATE TABLE `Role` (
    `Id` 					INT 			NOT NULL		AUTO_INCREMENT PRIMARY KEY
	,`Role` 				ENUM('Gebruiker', 'Admin') 		NOT NULL
    ,`IsActief`         	BIT          	NOT NULL        DEFAULT 1
    ,`DatumAangemaakt`		TIMESTAMP 		NOT NULL		DEFAULT CURRENT_TIMESTAMP
    ,`DatumGewijzigd` 		TIMESTAMP 		NOT NULL		DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	,`Opmerking`     		Varchar(500)    NULL
)ENGINE=INNODB;

DROP TABLE IF EXISTS `Reservering`;
CREATE TABLE `Reservering` (
    `Id` 					INT		 		NOT NULL 		AUTO_INCREMENT PRIMARY KEY
    ,`PersoonId` 			INT 			NOT NULL
    ,`TariefId` 			INT 			NOT NULL
    ,`BaanId` 				INT 			NOT NULL
    ,`OpeningsTijdenId` 	INT 			NOT NULL
    ,`ReserveringsNummer` 	INT 			NOT NULL 
    ,`AantalUren` 			INT 			NOT NULL
    ,`BeginTijd` 			TIME 			NOT NULL
	,`EindTijd` 			TIME 			NOT NULL
    ,`Volwassenen` 			INT 			NULL
    ,`Kinderen` 			INT 			NULL
    ,`Datum` 				DATE 			NOT NULL
    ,`IsActief`         	BIT          	NOT NULL        DEFAULT 1
    ,`DatumAangemaakt`		TIMESTAMP 		NOT NULL		DEFAULT CURRENT_TIMESTAMP
    ,`DatumGewijzigd` 		TIMESTAMP 		NOT NULL		DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	,`Opmerking`     		Varchar(500)    NULL
    ,CONSTRAINT	ReserveringPersoon FOREIGN KEY (`PersoonId`) REFERENCES `Persoon`(`Id`)
    ,CONSTRAINT	ResereringTarief FOREIGN KEY (`TariefId`) REFERENCES `Tarief`(`Id`)
    ,CONSTRAINT	ReserveringBanen FOREIGN KEY (`BaanId`) REFERENCES `Banen`(`Id`)
    ,CONSTRAINT	ReserveringOpeningsTijden FOREIGN KEY (`OpeningsTijdenId`) REFERENCES `OpeningsTijden`(`Id`)
)ENGINE=INNODB;

DROP TABLE IF EXISTS `PakketOptiePerReservering`;
CREATE TABLE `PakketOptiePerReservering` (
    `Id` 					INT 			NOT NULL 		AUTO_INCREMENT PRIMARY KEY
    ,`PakketOptiesId` 		INT 			NOT NULL
    ,`ReserveringId` 		INT 			NOT NULL
    ,`IsActief`         	BIT          	NOT NULL        DEFAULT 1
    ,`DatumAangemaakt`		TIMESTAMP 		NOT NULL		DEFAULT CURRENT_TIMESTAMP
    ,`DatumGewijzigd` 		TIMESTAMP 		NOT NULL		DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	,`Opmerking`     		Varchar(500)    NULL
    ,CONSTRAINT PakketOptiePerReserveringPakketOpties FOREIGN KEY (`PakketOptiesId`) REFERENCES `PakketOpties`(`Id`) 
	,CONSTRAINT	PakketOptiePerReserveringReserving FOREIGN KEY (`ReserveringId`) REFERENCES `Reservering`(`Id`)
)ENGINE=INNODB;
