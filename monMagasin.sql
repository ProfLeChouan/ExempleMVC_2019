-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 28 Mars 2018 à 16:40
-- Version du serveur :  10.1.19-MariaDB
-- Version de PHP :  5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `monMagasin`
--
CREATE DATABASE IF NOT EXISTS `monMagasin` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `monMagasin`;

-- --------------------------------------------------------

--
-- Structure de la table `inventaire`
--

CREATE TABLE `inventaire` (
  `noArticle` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `cheminImage` varchar(50) NOT NULL,
  `prixUnitaire` decimal(10,2) NOT NULL,
  `quantiteEnStock` int(11) NOT NULL,
  `quantiteDansPanier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `inventaire`
--

INSERT INTO `inventaire` (`noArticle`, `description`, `cheminImage`, `prixUnitaire`, `quantiteEnStock`, `quantiteDansPanier`) VALUES
(1, 'Empire Burlesque - Bob Dylan - 1985', '/home/gills/', '10.90', 10, 0),
(2, 'Hide your heart - Bonnie Tyler - 1988', '/home/gills/', '9.90', 10, 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `inventaire`
--
ALTER TABLE `inventaire`
  ADD PRIMARY KEY (`noArticle`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
