-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 23 déc. 2021 à 08:52
-- Version du serveur :  10.5.12-MariaDB
-- Version de PHP : 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `id18092446_cogip_app`
--

-- --------------------------------------------------------

--
-- Structure de la table `administration`
--

CREATE TABLE `administration` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `isMod` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `administration`
--

INSERT INTO `administration` (`id`, `login`, `password`, `isAdmin`, `isMod`) VALUES
(1, 'Admin', 'Admin', 1, 1),
(2, 'Aline', 'aline', 0, 1),
(3, 'test', 'test', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `country` varchar(40) NOT NULL,
  `vat` varchar(20) NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `company`
--

INSERT INTO `company` (`id`, `name`, `address`, `country`, `vat`, `phone`) VALUES
(3, 'Dunder Mifflin', '1337 street', 'USA', 'US678765765', 0),
(2, 'Raviga', '42 street', 'USA', 'US456654342', 42424242),
(4, 'Jouets Jean-Michel', '42 barbie', 'FR', 'FR677544000', 6424242),
(5, 'Bob Vance Refrig', '01 Street', 'USA', 'US678765765', 1555555);

-- --------------------------------------------------------

--
-- Structure de la table `company_type`
--

CREATE TABLE `company_type` (
  `id` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `company_type`
--

INSERT INTO `company_type` (`id`, `type`, `name`) VALUES
(3, 'Client', 'Dunder Mifflin'),
(2, 'Fournisseur', 'Raviga'),
(4, 'Client', 'Jouets Jean-Michel'),
(5, 'Fournisseur', 'Belgalol'),
(6, 'Fournisseur', 'Proxidmr'),
(7, 'Fournisseur', 'ElectricPower'),
(8, 'Client', 'Bob Vance Refrig.'),
(10, 'Client', 'Bob Vance Refrig');

-- --------------------------------------------------------

--
-- Structure de la table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `invoice_number` varchar(25) NOT NULL,
  `invoice_date` date NOT NULL,
  `company_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `invoice`
--

INSERT INTO `invoice` (`id`, `invoice_number`, `invoice_date`, `company_name`) VALUES
(1, 'F20180404-004', '2018-04-04', 'Jouets Jean-Michel'),
(2, 'F20170524-002', '2017-02-04', 'Pierre Cailloux'),
(3, 'F20170403-654', '2017-04-03', 'Raviga'),
(4, 'F20170404-001', '2017-04-04', 'Pied Pipper'),
(5, 'F20170404-003', '2017-04-04', 'Dunder Mifflin'),
(6, 'F20180403-654', '2018-04-03', 'Raviga'),
(7, 'F20180407-001', '2018-04-07', 'Pied Pipper'),
(8, 'F20180408-002', '2018-04-08', 'Pierre Cailloux'),
(9, 'F20180414-008', '2018-04-14', 'Dunder Mifflin'),
(10, 'F20190403-654', '2019-04-03', 'Raviga');

-- --------------------------------------------------------

--
-- Structure de la table `people`
--

CREATE TABLE `people` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `company_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `people`
--

INSERT INTO `people` (`id`, `firstname`, `lastname`, `phone`, `email`, `company_name`) VALUES
(1, 'Peter', 'Gregory', 5554567, 'peter.gregory@raviga.com', 'Raviga'),
(2, 'Dwight', 'Schrute', 5559859, 'dwight.schrute@ddmfl.com', 'Dunder Mifflin'),
(3, 'Meredith', 'Palmer', 685697458, 'meredith.palmer@jouetsjm.fr', 'Jouets Jean-Michel'),
(4, 'Cameron', 'Howe', 5557896, 'cam.howe@mutiny.net', 'Mutiny'),
(5, 'Gavin', 'Belson', 5554213, 'gavin@hooli.com', 'Hooli'),
(6, 'Marlene', 'Sasoeur', 678922481, 'marlene.sasoeur@pcaill.fr', 'Pierre Cailloux'),
(7, 'Bertram', 'Gilfoyle', 5550987, 'gilfoyle@piedpipper.com', 'Pied Pipper');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administration`
--
ALTER TABLE `administration`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `company_type`
--
ALTER TABLE `company_type`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administration`
--
ALTER TABLE `administration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `company_type`
--
ALTER TABLE `company_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `people`
--
ALTER TABLE `people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
