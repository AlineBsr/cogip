-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 06 déc. 2021 à 23:37
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cogip_app`
--
CREATE DATABASE IF NOT EXISTS `cogip_app` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cogip_app`;

-- --------------------------------------------------------

--
-- Structure de la table `administration`
--

DROP TABLE IF EXISTS `administration`;
CREATE TABLE IF NOT EXISTS `administration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `isMod` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `country` varchar(40) NOT NULL,
  `vat` varchar(20) NOT NULL,
  `phone` int(11) NOT NULL,
  `company_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `company_type_id` (`company_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `company`
--

INSERT INTO `company` (`id`, `name`, `address`, `country`, `vat`, `phone`, `company_type_id`) VALUES
(1, 'Raviga', 'Avenue Churchill, 72', 'Etats-Unis', 'US456 654 322', 555, 1),
(2, 'Dunder Mifflin', 'Cockadoodle Street, 891', 'Etats-Unis', 'US678 765 765', 555981981, 2),
(3, 'Jouets Jean-Michel', 'Boulevard Ghislain, 974', 'France', 'FR677 544 000', 685697458, 2),
(4, 'Pierre Cailloux', 'Champs Villefranche, 18', 'France', 'FR678 908 654', 666666666, 1),
(5, 'Pied Pipper', 'Rue du Port, 257', 'France', 'FR 766 545 009', 5550987, 2),
(6, 'Mutiny', 'Pestering Palace, Alley B', 'Pays de Galles', 'GB938562714', 555444333, 2),
(7, 'Hooli', 'La Roche du Dragon, 47', 'Madagascar', 'MGA4891083', 5554213, 1);

-- --------------------------------------------------------

--
-- Structure de la table `company_type`
--

DROP TABLE IF EXISTS `company_type`;
CREATE TABLE IF NOT EXISTS `company_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `company_type`
--

INSERT INTO `company_type` (`id`, `type`) VALUES
(1, 'Fournisseur'),
(2, 'Client');

-- --------------------------------------------------------

--
-- Structure de la table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_number` varchar(25) NOT NULL,
  `invoice_date` date NOT NULL,
  `about` text NOT NULL,
  `company_id` int(11) NOT NULL,
  `people_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_id`),
  KEY `people_id` (`people_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `invoice`
--

INSERT INTO `invoice` (`id`, `invoice_number`, `invoice_date`, `about`, `company_id`, `people_id`) VALUES
(1, 'F20180404-004', '2018-04-04', 'Jouets Jean-Michel', 3, 3),
(2, 'F20170524-002', '2017-02-04', 'Pierre Cailloux', 4, 6),
(3, 'F20170403-654', '2017-04-03', 'Raviga', 1, 1),
(4, 'F20170404-001', '2017-04-04', 'Pied Pipper', 5, 7),
(5, 'F20170404-003', '2017-04-04', 'Dunder Mifflin', 2, 2),
(6, 'F20180403-654', '2018-04-03', 'Raviga', 1, 1),
(7, 'F20180407-001', '2018-04-07', 'Pied Pipper', 5, 7),
(8, 'F20180408-002', '2018-04-08', 'Pierre Cailloux', 4, 6),
(9, 'F20180414-008', '2018-04-14', 'Dunder Mifflin', 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `people`
--

DROP TABLE IF EXISTS `people`;
CREATE TABLE IF NOT EXISTS `people` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `phone` int(25) NOT NULL,
  `email` varchar(60) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `people`
--

INSERT INTO `people` (`id`, `firstname`, `lastname`, `phone`, `email`, `company_name`, `company_id`) VALUES
(1, 'Peter', 'Gregory', 5554567, 'peter.gregory@raviga.com', 'Raviga', 1),
(2, 'Dwight', 'Schrute', 5559859, 'dwight.schrute@ddmfl.com', 'Dunder Mifflin', 2),
(3, 'Meredith', 'Palmer', 685697458, 'meredith.palmer@jouetsjm.fr', 'Jouets Jean-Michel', 3),
(4, 'Cameron', 'Howe', 5557896, 'cam.howe@mutiny.net', 'Mutiny', 6),
(5, 'Gavin', 'Belson', 5554213, 'gavin@hooli.com', 'Hooli', 7),
(6, 'Marlène', 'Sasoeur', 678922481, 'marlene.sasoeur@pcaill.fr', 'Pierre Cailloux', 4),
(7, 'Bertram', 'Gilfoyle', 5550987, 'gilfoyle@piedpipper.com', 'Pied Pipper', 5);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`company_type_id`) REFERENCES `company_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `people`
--
ALTER TABLE `people`
  ADD CONSTRAINT `people_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
