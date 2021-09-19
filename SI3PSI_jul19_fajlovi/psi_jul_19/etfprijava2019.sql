-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 08, 2019 at 11:07 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

--
-- Database: `etfprijava2019`
--
DROP DATABASE IF EXISTS `etfprijava2019`;
CREATE DATABASE IF NOT EXISTS `etfprijava2019` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `etfprijava2019`;

-- --------------------------------------------------------

--
-- Table structure for table `drzipredmet`
--

DROP TABLE IF EXISTS `drzipredmet`;
CREATE TABLE IF NOT EXISTS `drzipredmet` (
  `idNastavnik` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `idPredmet` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `idGodina` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idNastavnik`,`idPredmet`,`idGodina`),
  KEY `idPredmet` (`idPredmet`),
  KEY `idGodina` (`idGodina`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `katedra`
--

DROP TABLE IF EXISTS `katedra`;
CREATE TABLE IF NOT EXISTS `katedra` (
  `idKatedre` int(11) NOT NULL,
  `nazivKatedre` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idKatedre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
CREATE TABLE IF NOT EXISTS `korisnik` (
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `ime` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `labvezba`
--

DROP TABLE IF EXISTS `labvezba`;
CREATE TABLE IF NOT EXISTS `labvezba` (
  `idLab` int(11) NOT NULL,
  `redniBroj` int(11) NOT NULL,
  `termin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nastavnik`
--

DROP TABLE IF EXISTS `nastavnik`;
CREATE TABLE IF NOT EXISTS `nastavnik` (
  `idNastavnik` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `idKatedra` int(11) NOT NULL,
  `zvanje` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idNastavnik`),
  KEY `idKatedra` (`idKatedra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `odsek`
--

DROP TABLE IF EXISTS `odsek`;
CREATE TABLE IF NOT EXISTS `odsek` (
  `naziv` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `pripadaKatedri` int(11) NOT NULL,
  PRIMARY KEY (`naziv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prakticna`
--

DROP TABLE IF EXISTS `prakticna`;
CREATE TABLE IF NOT EXISTS `prakticna` (
  `idP` int(11) NOT NULL AUTO_INCREMENT,
  `otvorenaPrijava` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-otvoreno, 0-zatovreno',
  PRIMARY KEY (`idP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `predmet`
--

DROP TABLE IF EXISTS `predmet`;
CREATE TABLE IF NOT EXISTS `predmet` (
  `sifraPredmet` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `naziv` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `brojKredita` int(11) NOT NULL,
  `semestar` double NOT NULL,
  PRIMARY KEY (`sifraPredmet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prijava`
--

DROP TABLE IF EXISTS `prijava`;
CREATE TABLE IF NOT EXISTS `prijava` (
  `idPrijava` int(11) NOT NULL,
  `trenutak` datetime NOT NULL,
  `idStudent` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `idTim` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idPrijava`),
  KEY `idStudent` (`idStudent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projekat`
--

DROP TABLE IF EXISTS `projekat`;
CREATE TABLE IF NOT EXISTS `projekat` (
  `idProjekat` int(11) NOT NULL,
  `naziv` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `tip` varchar(1) COLLATE utf8_unicode_ci NOT NULL COMMENT 'I-individualno, T-timski',
  `datum_od` date NOT NULL,
  `datum_do` timestamp NOT NULL,
  PRIMARY KEY (`idProjekat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skolska`
--

DROP TABLE IF EXISTS `skolska`;
CREATE TABLE IF NOT EXISTS `skolska` (
  `godina` varchar(9) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Format: GGGG/GGGG',
  `je_tekuca` tinyint(4) NOT NULL,
  PRIMARY KEY (`godina`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `idStudent` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `broj_indeksa` bigint(20) NOT NULL COMMENT 'Format: GGGGBBBB',
  `godina_studija` int(11) NOT NULL,
  KEY `idStudent` (`idStudent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `drzipredmet`
--
ALTER TABLE `drzipredmet`
  ADD CONSTRAINT `drzipredmet_ibfk_1` FOREIGN KEY (`idNastavnik`) REFERENCES `nastavnik` (`idNastavnik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `drzipredmet_ibfk_2` FOREIGN KEY (`idPredmet`) REFERENCES `predmet` (`sifraPredmet`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `drzipredmet_ibfk_3` FOREIGN KEY (`idGodina`) REFERENCES `skolska` (`godina`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nastavnik`
--
ALTER TABLE `nastavnik`
  ADD CONSTRAINT `nastavnik_ibfk_1` FOREIGN KEY (`idNastavnik`) REFERENCES `korisnik` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nastavnik_ibfk_2` FOREIGN KEY (`idKatedra`) REFERENCES `katedra` (`idKatedre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prijava`
--
ALTER TABLE `prijava`
  ADD CONSTRAINT `prijava_ibfk_1` FOREIGN KEY (`idStudent`) REFERENCES `nastavnik` (`idNastavnik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`idStudent`) REFERENCES `korisnik` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;