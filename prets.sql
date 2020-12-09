-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 25 Mars 2020 à 20:33
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `prets`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE IF NOT EXISTS `administrateur` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fonction` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `nom`, `prenom`, `email`, `password`, `fonction`) VALUES
(1, 'Touzouti', 'Kahina', 'kahinatouzouti604@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `matricule` varchar(20) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `numpermis` int(20) NOT NULL,
  `structure` varchar(50) NOT NULL,
  `type` varchar(32) NOT NULL,
  `fonction` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `clients`
--

INSERT INTO `clients` (`id`, `matricule`, `prenom`, `email`, `password`, `numpermis`, `structure`, `type`, `fonction`) VALUES
(1, '', 'Hamzaoui', 'salah@gmail.com', '123456', 741258963, 'technique', 'cadre', 'chef');

-- --------------------------------------------------------

--
-- Structure de la table `pret`
--

CREATE TABLE IF NOT EXISTS `pret` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `montant` varchar(50) NOT NULL,
  `mensualite` varchar(32) NOT NULL,
  `typemp` varchar(32) NOT NULL,
  `annee` year(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `pret`
--

INSERT INTO `pret` (`id`, `montant`, `mensualite`, `typemp`, `annee`) VALUES
(1, '100.000.00', '9.000', 'cadre supérieure', 2019),
(2, '90.000.00', '8.000', 'cadre ', 2019);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
