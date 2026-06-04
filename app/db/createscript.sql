-- Step: 01
-- ************************************************************
-- Doel : Maak een nieuwe database aan met de naam MVC_Basics_2509AB
-- ************************************************************
-- Versie      Datum        Auteur              Omschrijving
-- ******      *****        ******              ************
-- 01          10-02-2026   Ahmet Ihsan Hizal     Smartphones
-- ************************************************************

-- Verwijder database MVC_Basics_2509AB
DROP DATABASE IF EXISTS `MVC_Basics_2509AB`;

-- Maak een nieuwe database aan MVC_Basics_2509AB
CREATE DATABASE `MVC_Basics_2509AB`;

-- Gebruik database MVC_Basics_2509AB
USE `MVC_Basics_2509AB`;

-- Step: 02
-- ************************************************************
-- Doel : Maak een nieuwe tabel aan met de naam Smartphones
-- ************************************************************
-- Versie      Datum        Auteur              Omschrijving
-- ******      *****        ******              ************
-- 01          10-02-2026  Ahmet Ihsan Hizal     Tabel Smartphones
-- ************************************************************

-- Onderstaande velden toevoegen aan de tabel Smartphones
-- Merk, Model, Prijs, Geheugen, Besturingssysteem,
-- Schermgrootte, Releasedatum, MegaPixels
-- ************************************************************

CREATE TABLE Smartphones
(
    Id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
    Merk VARCHAR(50) NOT NULL,
    Model VARCHAR(50) NOT NULL,
    Prijs DECIMAL(6,2) NOT NULL,
    Geheugen DECIMAL(4,0) NOT NULL,
    Besturingssysteem VARCHAR(25) NOT NULL,
    Schermgrootte DECIMAL(3,2) NOT NULL,
    Releasedatum DATE NOT NULL,
    MegaPixels DECIMAL(3,0) NOT NULL,
    IsActief BIT NOT NULL DEFAULT 1,
    Opmerking VARCHAR(255) NULL DEFAULT NULL,
    DatumAangemaakt DATETIME(6) NOT NULL DEFAULT NOW(6),
    DatumGewijzigd DATETIME(6) NOT NULL DEFAULT NOW(6),
    CONSTRAINT PK_Smartphones_Id PRIMARY KEY (Id)
) ENGINE=InnoDB;

-- Step: 03
-- ************************************************************
-- Doel : Vul de tabel Smartphones met gegevens
-- ************************************************************

INSERT INTO Smartphones
(
    Merk,
    Model,
    Prijs,
    Geheugen,
    Besturingssysteem,
    Schermgrootte,
    Releasedatum,
    MegaPixels
)
VALUES
('Apple', 'iPhone 16 Pro', 1256.56, 64, 'iOS 18', 6.7, '2025-01-19', 50),
('Samsung', 'Galaxy S25 Ultra', 1539, 128, 'Android 15', 6.1, '2025-02-01', 200),
('Google', 'Pixel 9 Pro', 890, 1024, 'Android 15', 6.3, '2024-12-20', 100),

-- Extra records
('Xiaomi', 'Mi 14', 699.99, 256, 'Android 14', 6.5, '2024-09-10', 108),
('OnePlus', '12 Pro', 849.50, 256, 'Android 14', 6.7, '2024-11-05', 64),
('Sony', 'Xperia 1 VI', 1199.00, 512, 'Android 14', 6.8, '2024-10-15', 48),
('Nokia', 'XR30', 599.00, 128, 'Android 14', 6.4, '2024-08-01', 50),
('Huawei', 'P70 Pro', 1099.00, 512, 'HarmonyOS 4', 6.6, '2024-12-01', 54);

-- Step: 04
-- ************************************************************************************************
-- Doel : Maak een nieuwe tabel aan met de naam Sneakers
-- ************************************************************************************************
-- Versie      Datum        Auteur              Omschrijving
-- ******      *****        ******              ************
-- 01          10-02-2026  Ahmet Ihsan Hizal     Tabel Sneakers
-- ************************************************************************************************

-- Onderstaande velden toevoegen aan de tabel Sneakers
-- Type (Hardloop, Basketbal, Casual), Prijs, Materiaal (Leer, Mesh, Synthetisch), Gewicht, Releasedatum
-- ************************************************************************************************

CREATE TABLE Sneakers
(
    Id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
    Merk VARCHAR(50) NOT NULL,
    Model VARCHAR(50) NOT NULL,
    Type VARCHAR(25) NOT NULL,
    IsActief BIT NOT NULL DEFAULT 1,
    Opmerking VARCHAR(255) NULL DEFAULT NULL,
    DatumAangemaakt DATETIME(6) NOT NULL DEFAULT NOW(6),
    DatumGewijzigd DATETIME(6) NOT NULL DEFAULT NOW(6),
    CONSTRAINT PK_Smartphones_Id PRIMARY KEY (Id)
) ENGINE=InnoDB;

-- Step: 05
-- ************************************************************
-- Doel : Vul de tabel Sneakers met gegevens
-- ************************************************************
-- Versie      Datum        Auteur              Omschrijving
-- ******      *****        ******              ************
-- 01          10-02-2026  Ahmet Ihsan Hizal     Vulling Sneakers
-- ************************************************************

INSERT INTO Sneakers
(
    Merk,
    Model,
    Type
)
VALUES
('Nike', 'Air Jordan 1', 'Hardloop'),
('Adidas', 'Yeezy Boost 350', 'Basketbal'),
('New Balance', 'Pixel 9 Pro', 'Casual'),
('Trico', 'New Age', 'Casual'),
('Overlord', 'Tristar 6', 'Hardloop');

-- Voeg nog minimaal 3 extra records toe

-- Step: 06
-- ************************************************************************************************
-- Doel : Maak een nieuwe tabel aan met de naam Horloges
-- ************************************************************************************************
-- Versie      Datum        Auteur              Omschrijving
-- ******      *****        ******              ************
-- 01          11-02-2026   Ahmet Ihsan Hizal    Tabel Horloges
-- ************************************************************************************************

-- Onderstaande velden toevoegen aan de tabel Horloges
-- Materiaal (Goud, Diamant, RVS), Gewicht, Releasedatum, Waterdichtheid(m), Type (Analoog, Digitaal), Uniek kenmerk
-- ************************************************************************************************

CREATE TABLE Horloges
(
    Id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
    Merk VARCHAR(50) NOT NULL,
    Model VARCHAR(50) NOT NULL,
    Prijs DECIMAL(6,0) NOT NULL,
    Materiaal VARCHAR(25) NOT NULL,
    Gewicht DECIMAL(4,0) NOT NULL,
    Releasedatum DATE NOT NULL,
    Waterdichtheid INT NOT NULL,
    Type VARCHAR(25) NOT NULL,
    UniekKenmerk VARCHAR(255) NOT NULL,
    IsActief BIT NOT NULL DEFAULT 1,
    Opmerking VARCHAR(255) NULL DEFAULT NULL,
    DatumAangemaakt DATETIME(6) NOT NULL DEFAULT NOW(6),
    DatumGewijzigd DATETIME(6) NOT NULL DEFAULT NOW(6),
    CONSTRAINT PK_Horloges_Id PRIMARY KEY (Id)
) ENGINE=InnoDB;


-- Step: 07
-- ************************************************************
-- Doel : Vul de tabel Horloges met gegevens
-- ************************************************************
-- Versie      Datum        Auteur              Omschrijving
-- ******      *****        ******              ************
-- 01          11-02-2026   Ahmet Ihsan Hizal     Vulling Horloges
-- ************************************************************

INSERT INTO Horloges
(
    Merk,
    Model,
    Prijs,
    Materiaal,
    Gewicht,
    Releasedatum,
    Waterdichtheid,
    Type,
    UniekKenmerk
)
VALUES
('Rolex', 'Daytona 126500LN', 19800, 'Goud', 140, '2024-01-01', 100, 'Analoog', 'Chronograaf'),
('Omega', 'Speedmaster Moonwatch Professional', 8500, 'RVS', 120, '2023-10-10', 50, 'Analoog', 'Moonwatch'),
('Vacheron Constantin', 'Overseas Perpetual Calendar Ultra-Thin', 98000, 'Goud', 110, '2024-03-15', 30, 'Analoog', 'Perpetual Calendar'),
('Jaeger-LeCoultre', 'Reverso Tribute Duoface', 17000, 'RVS', 130, '2023-08-20', 30, 'Analoog', 'Draaibare kast');
