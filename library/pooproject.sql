-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 22. Sep 2015 um 18:42
-- Server-Version: 5.6.25
-- PHP-Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `oopcrudproject`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `categories`
--

CREATE TABLE IF NOT EXISTS `pregrados` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `categories`
--

INSERT INTO `pregrados` (`id`, `name`, `created`) VALUES
(1, 'Administracion de empresas', '2019-07-29 22:35:01'),
(2, 'Biologia', '2019-07-29 22:35:02'),
(3, 'Contaduria publica', '2019-07-29 22:35:03'),
(4, 'Economia', '2019-07-29 22:35:04');
(5, 'Enfermeria', '2019-07-29 22:35:04');
(6, 'Ingenieria agroindustrial', '2019-07-29 22:35:04');
(7, 'Ingenieria de sistemas', '2019-07-29 22:35:04');
(8, 'Ingenieria electronica', '2019-07-29 22:35:04');
(9, 'Licenciatura en educacion infantil', '2019-07-29 22:35:04');
(10, 'Licenciatura en educacion fisica y deporte', '2019-07-29 22:35:04');
(11, 'Licenciatura en matematicas', '2019-07-29 22:35:04');
(12, 'Medicina veterinaria y zootecnia', '2019-07-29 22:35:04');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE IF NOT EXISTS `estudiantes` (
  `id` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(30) CHARACTER SET utf8 NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `fecha` varchar(100) NOT NULL,
  `pregrado_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `estudiantes`
--

INSERT INTO `estudiantes` (`id`, `firstname`, `lastname`, `email`, `telefono`, `direccion`, `fecha`, `pregrado_id`, `created`) VALUES
(1, 'Juan Diego', 'Ramirez', 'jd.ramirez@gmx.de', '12386733', Cr 26B N° 6A - 87, '2010-09-10 06:43:55', 2, '2019-07-29 22:43:55');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `pregrados`
--
ALTER TABLE `pregrados`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `pregrados`
--
ALTER TABLE `pregrados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT für Tabelle `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
