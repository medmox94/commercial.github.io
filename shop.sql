-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 07 mai 2024 à 16:18
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `shop`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_clt` int(11) NOT NULL,
  `nom_clt` varchar(255) NOT NULL,
  `prenom_clt` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `telephone` decimal(8,0) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_clt`, `nom_clt`, `prenom_clt`, `adresse`, `telephone`, `email`) VALUES
(1, 'lzr', 'mohamed', 'mekens', 99999999, 'facile@gmail.com'),
(2, 'mohamed', 'lazaar', 'mekens', 99999999, ''),
(3, 'mohamed', 'lazaar', 'mekens', 99999999, ''),
(4, 'mohamed', 'lazaar', 'mekens', 99999999, ''),
(5, 'mohamed', 'lazaar', 'mekens', 99999999, ''),
(6, 'mohamed', 'lazaar', 'mekens', 99999999, ''),
(7, 'mohamed', 'lazaar', 'mekens', 99999999, ''),
(8, 'mohamed', 'lazaar', 'mekens', 99999999, ''),
(9, 'mohamed', 'lazaar', 'mekens', 99999999, ''),
(10, 'mohamed', 'lazaar', 'mekens', 99999999, ''),
(11, 'mohamed', 'lazaar', 'mekens', 99999999, ''),
(12, 'mohamed', 'lazaar', 'mekens', 99999999, ''),
(13, 'mohamed', 'lazaar', 'mekens', 99999999, ''),
(14, 'mohamed', 'lazaar', 'mekens', 99999999, ''),
(15, 'mohamed', 'lazaar', 'mekens', 99999999, ''),
(16, 'mohamed', 'lazaar', 'mekens', 99999999, 'theegale400@gmail.com'),
(17, 'med', 'lzr', 'fes', 2298839, 'into@gmail.com'),
(18, 'mohamed', 'lazaar', 'mekens', 99999999, 'theegale400@gmail.com'),
(19, 'mohamed', 'lazaar', 'mekens', 99999999, 'theegale400@gmail.com'),
(20, 'mohamed', 'lazaar', 'mekens', 99999999, 'theegale400@gmail.com'),
(21, 'mohamed', 'lazaar', 'mekens', 99999999, 'theegale400@gmail.com'),
(22, 'mohamed', 'lazaar', 'mekens', 99999999, 'theegale400@gmail.com'),
(23, 'mohamed', 'lazaar', 'mekens', 99999999, 'theegale400@gmail.com'),
(25, 'si', 'mohamed', 'mekenes', 99999999, ''),
(27, 'lzr', 'mohamed', 'facile@gmail.com', 99999999, ''),
(28, 'lzr', 'mohamed', 'facile@gmail.com', 99999999, 'dsjfjfds@ll.ml'),
(29, 'lzr', 'mohamed', 'facile@gmail.com', 99999999, 'dsjfjfds@ll.ml'),
(30, 'lzr', 'mohamed', 'facile@gmail.com', 99999999, 'dsjfjfds@ll.ml'),
(31, 'lzr', 'mohamed', 'facile@gmail.com', 99999999, 'dsjfjfds@ll.ml'),
(32, 'lzr', 'mohamed', 'facile@gmail.com', 99999999, 'dsjfjfds@ll.ml'),
(33, 'fact', 'mohamed', 'facile@gmail.com', 99999999, 'dsjfjfds@ll.ml'),
(34, 'simmmmmo', 'mohamed', 'facile@gmail.com', 99999999, 'simo@mlsm.kfj'),
(35, 'ahmed', 'lazar', 'basatine', 99999999, ''),
(36, 'ahmed', 'lazar', 'basatine', 99999999, ''),
(37, 'ahmed', 'lazar', 'basatine', 99999999, 'dsjfjfds@ll.ml'),
(38, 'ahmed', 'lazar', 'basatine', 99999999, 'dsjfjfds@ll.ml'),
(39, 'ahmed', 'lazar', 'basatine', 99999999, 'dsjfjfds@ll.ml'),
(40, 'ahmed', 'lazar', 'basatine', 99999999, 'dsjfjfds@ll.ml'),
(41, 'ahmed', 'lazar', 'basatine', 99999999, 'dsjfjfds@ll.ml'),
(42, 'simoooooo', 'lazar', 'basatine', 99999999, ''),
(43, 'simoooooo', 'lazar', 'basatine', 99999999, 'moha@llll.si'),
(44, 'hamid', 'lazar', 'basatine', 99999999, 'moha@llll.si'),
(45, 'hamid', 'lazar', 'basatine', 99999999, 'moha@llll.si'),
(46, 'si', 'moha', 'feees', 99999999, 'into@gmail.com'),
(47, 'si', 'moha', 'feees', 99999999, 'into@gmail.com'),
(48, 'si', 'moha', 'feees', 99999999, 'into@gmail.com'),
(49, 'si', 'moha', 'feees', 99999999, 'into@gmail.com'),
(50, 'si', 'moha', 'feees', 99999999, 'into@gmail.com'),
(51, 'siiiiiif', 'moha', 'feees', 99999999, 'into@gmail.com'),
(52, 'souf', 'moha', 'feees', 99999999, 'into@gmail.com'),
(53, 'souf', 'moha', 'feees', 99999999, 'into@gmail.com'),
(54, 'souf', 'moha', 'feees', 99999999, 'into@gmail.com'),
(55, 'mermouch', 'moha', 'feees', 99999999, 'into@gmail.com'),
(56, 'mermouch', 'moha', 'feees', 99999999, 'into@gmail.com'),
(57, 'moha', 'med', 'taza', 80989890, 'taza@taza.si'),
(58, 'hassan', 'zd', 'rabat', 99999999, 'hassan@zd.rbt'),
(59, 'hassan', 'zd', 'rabat', 99999999, 'hassan@zd.rbt'),
(60, 'hassan', 'zd', 'rabat', 99999999, 'hassan@zd.rbt'),
(61, 'hassan', 'zd', 'rabat', 99999999, 'hassan@zd.rbt'),
(62, 'hassan', 'zd', 'rabat', 99999999, 'hassan@zd.rbt'),
(63, 'mohamed', 'lr', 'ifrane', 99999999, 'med@lr;simo'),
(64, 'hassan', 'zd', 'rabat', 99999999, 'medmox94@gmail.com'),
(65, 'lzr', 'mohamed', 'facile@gmail.com', 99999999, 'medmox94@gmail.com'),
(66, 'lazar', 'mohamed', 'oujda', 99999999, 'medmox94@gmail.com'),
(67, 'lazar', 'mohamed', 'oujda', 99999999, 'medmox94@gmail.com'),
(68, 'lazar', 'med', 'medmox94@gmail.com', 99999999, 'medmox94@gmail.com'),
(69, 'lazar', 'med', 'medmox94@gmail.com', 99999999, 'medmox94@gmail.com'),
(70, 'lazar', 'med', 'tanger', 99999999, 'medmox94@gmail.com'),
(71, 'lzr', 'mohamed', 'facile@gmail.com', 99999999, 'medmox94@gmail.com'),
(72, 'lazar', 'med', 'medmox94@gmail.com', 99999999, 'theegale400@gmail.com'),
(73, 'lazar', 'med', 'medmox94@gmail.com', 99999999, 'theegale400@gmail.com'),
(74, 'lazar', 'med', 'medmox94@gmail.com', 99999999, 'theegale400@gmail.com'),
(75, 'lazar', 'med', 'medmox94@gmail.com', 99999999, 'theegale400@gmail.com'),
(76, 'lazar', 'med', 'medmox94@gmail.com', 99999999, 'theegale400@gmail.com'),
(77, 'hafidi', 'hassan', 'sale', 99999999, 'theegale400@gmail.com'),
(78, 'hafidi', 'hassan', 'sale', 99999999, 'theegale400@gmail.com'),
(79, 'hafidi', 'hassan', 'sale', 99999999, 'theegale400@gmail.com'),
(80, 'hafidi', 'hassan', 'sale', 99999999, 'theegale400@gmail.com'),
(81, 'hafidi', 'hassan', 'sale', 99999999, 'theegale400@gmail.com'),
(82, 'hafidi', 'hassan', 'sale', 99999999, 'theegale400@gmail.com'),
(83, 'hafidi', 'hassan', 'sale', 99999999, 'theegale400@gmail.com'),
(84, 'hafidi', 'hassan', 'sale', 99999999, 'theegale400@gmail.com'),
(85, 'hafidi', 'hassan', 'sale', 99999999, 'theegale400@gmail.com'),
(86, 'hafidi', 'hassan', 'sale', 99999999, 'theegale400@gmail.com'),
(87, 'hafidi', 'hassan', 'sale', 99999999, 'theegale400@gmail.com'),
(88, 'hafidi', 'hassan', 'sale', 99999999, 'theegale400@gmail.com'),
(89, 'hafidi', 'hassan', 'sale', 99999999, 'theegale400@gmail.com'),
(90, 'hafidi', 'hassan', 'sale', 99999999, 'theegale400@gmail.com'),
(91, 'hafidi', 'hassan', 'sale', 99999999, 'theegale400@gmail.com'),
(92, 'hafidi', 'hassan', 'sale', 99999999, 'theegale400@gmail.com'),
(93, 'hafidi', 'hassan', 'sale', 99999999, 'theegale400@gmail.com'),
(94, 'hafidi', 'hassan', 'sale', 99999999, 'theegale400@gmail.com'),
(95, 'hafidi', 'hassan', 'sale', 99999999, 'theegale400@gmail.com'),
(96, 'hafidi', 'hassan', 'sale', 99999999, 'theegale400@gmail.com'),
(97, 'mohamed', 'lazar', 'simo@gamil.com', 63633783, 'medmox94@gmail.com'),
(98, 'hafidi', 'hassan', 'sale', 99999999, 'theegale400@gmail.com'),
(99, 'lzr', 'mohamed', 'facile@gmail.com', 99999999, 'medmox94@gmail.com'),
(100, 'lzr', 'mohamed', 'facile@gmail.com', 99999999, 'medmox94@gmail.com'),
(101, 'lzr', 'mohamed', 'facile@gmail.com', 99999999, 'medmox94@gmail.com'),
(102, 'lzr', 'mohamed', 'taza', 99999999, 'simo@jdf.kdmls'),
(103, 'ahmed', 'ben ahamed', 'smara', 99999999, 'mohamed@gmail.com'),
(104, 'ahmed', 'ben ahamed', 'smara', 99999999, 'mohamed@gmail.com'),
(105, 'mohamed', 'lazar', 'simo@gamil.com', 63633783, ''),
(106, 'mohamed', 'lazar', 'simo@gamil.com', 7987070, ''),
(107, 'lzr', 'mohamed', 'facile@gmail.com', 99999999, 'hassan@zd.rbt'),
(108, 'lzr', 'mohamed', 'facile@gmail.com', 99999999, 'hassan@zd.rbt'),
(109, 'lzr', 'mohamed', 'facile@gmail.com', 99999999, 'hassan@zd.rbt'),
(110, 'lzr', 'mohamed', 'facile@gmail.com', 99999999, 'hassan@zd.rbt');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_prd` int(11) NOT NULL,
  `id_clt` int(11) NOT NULL,
  `id_fact` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `date_cmd` date NOT NULL,
  `reduction` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_prd`, `id_clt`, `id_fact`, `quantite`, `date_cmd`, `reduction`) VALUES
(18, 58, 15, 1, '2024-05-03', 0),
(21, 58, 15, 8, '2024-05-03', 0),
(18, 59, 16, 1, '2024-05-03', 0),
(21, 59, 16, 8, '2024-05-03', 0),
(18, 60, 17, 1, '2024-05-03', 0),
(21, 60, 17, 8, '2024-05-03', 0),
(18, 61, 18, 1, '2024-05-03', 0),
(21, 61, 18, 8, '2024-05-03', 0),
(18, 62, 19, 1, '2024-05-03', 0),
(21, 62, 19, 8, '2024-05-03', 0),
(6, 63, 20, 1, '2024-05-06', 0),
(7, 63, 20, 1, '2024-05-06', 0),
(8, 63, 20, 3, '2024-05-06', 0),
(6, 64, 21, 1, '2024-05-06', 0),
(7, 64, 21, 1, '2024-05-06', 0),
(8, 64, 21, 3, '2024-05-06', 0),
(6, 65, 22, 1, '2024-05-06', 0),
(7, 65, 22, 1, '2024-05-06', 0),
(8, 65, 22, 3, '2024-05-06', 0),
(6, 66, 23, 1, '2024-05-06', 0),
(7, 66, 23, 1, '2024-05-06', 0),
(8, 66, 23, 3, '2024-05-06', 0),
(6, 67, 24, 1, '2024-05-06', 0),
(7, 67, 24, 1, '2024-05-06', 0),
(8, 67, 24, 3, '2024-05-06', 0),
(6, 69, 25, 1, '2024-05-06', 0),
(7, 69, 25, 1, '2024-05-06', 0),
(8, 69, 25, 3, '2024-05-06', 0),
(7, 70, 26, 1, '2024-05-06', 0),
(3, 70, 26, 1, '2024-05-06', 0),
(7, 71, 27, 1, '2024-05-06', 0),
(3, 71, 27, 1, '2024-05-06', 0),
(7, 72, 28, 1, '2024-05-06', 0),
(3, 72, 28, 1, '2024-05-06', 0),
(7, 73, 29, 1, '2024-05-06', 0),
(3, 73, 29, 1, '2024-05-06', 0),
(7, 74, 30, 1, '2024-05-06', 0),
(3, 74, 30, 1, '2024-05-06', 0),
(7, 75, 31, 1, '2024-05-06', 0),
(3, 75, 31, 1, '2024-05-06', 0),
(7, 76, 32, 1, '2024-05-06', 0),
(3, 76, 32, 1, '2024-05-06', 0),
(7, 77, 33, 1, '2024-05-06', 0),
(3, 77, 33, 1, '2024-05-06', 0),
(7, 78, 34, 1, '2024-05-06', 0),
(3, 78, 34, 1, '2024-05-06', 0),
(7, 79, 35, 1, '2024-05-06', 0),
(3, 79, 35, 1, '2024-05-06', 0),
(7, 80, 36, 1, '2024-05-06', 0),
(3, 80, 36, 1, '2024-05-06', 0),
(7, 81, 37, 1, '2024-05-06', 0),
(3, 81, 37, 1, '2024-05-06', 0),
(7, 82, 38, 1, '2024-05-06', 0),
(3, 82, 38, 1, '2024-05-06', 0),
(7, 83, 39, 1, '2024-05-06', 0),
(3, 83, 39, 1, '2024-05-06', 0),
(7, 84, 40, 1, '2024-05-06', 0),
(3, 84, 40, 1, '2024-05-06', 0),
(7, 85, 41, 1, '2024-05-06', 0),
(3, 85, 41, 1, '2024-05-06', 0),
(7, 86, 42, 1, '2024-05-06', 0),
(3, 86, 42, 1, '2024-05-06', 0),
(7, 87, 43, 1, '2024-05-06', 0),
(3, 87, 43, 1, '2024-05-06', 0),
(7, 88, 44, 1, '2024-05-06', 0),
(3, 88, 44, 1, '2024-05-06', 0),
(7, 89, 45, 1, '2024-05-06', 0),
(3, 89, 45, 1, '2024-05-06', 0),
(7, 90, 46, 1, '2024-05-06', 0),
(3, 90, 46, 1, '2024-05-06', 0),
(7, 91, 47, 1, '2024-05-06', 0),
(3, 91, 47, 1, '2024-05-06', 0),
(7, 92, 48, 1, '2024-05-06', 0),
(3, 92, 48, 1, '2024-05-06', 0),
(7, 93, 49, 1, '2024-05-06', 0),
(3, 93, 49, 1, '2024-05-06', 0),
(7, 94, 50, 1, '2024-05-06', 0),
(3, 94, 50, 1, '2024-05-06', 0),
(7, 95, 51, 1, '2024-05-06', 0),
(3, 95, 51, 1, '2024-05-06', 0),
(7, 96, 52, 1, '2024-05-06', 0),
(3, 96, 52, 1, '2024-05-06', 0),
(3, 97, 53, 5, '2024-05-06', 0),
(4, 97, 53, 1, '2024-05-06', 0),
(6, 97, 53, 1, '2024-05-06', 0),
(9, 97, 53, 1, '2024-05-06', 0),
(18, 98, 54, 1, '2024-05-07', 0),
(24, 98, 54, 1, '2024-05-07', 0),
(18, 99, 55, 1, '2024-05-07', 0),
(24, 99, 55, 1, '2024-05-07', 0),
(18, 100, 56, 1, '2024-05-07', 0),
(24, 100, 56, 1, '2024-05-07', 0),
(18, 101, 57, 1, '2024-05-07', 0),
(24, 101, 57, 1, '2024-05-07', 0),
(18, 102, 58, 1, '2024-05-07', 0),
(24, 102, 58, 1, '2024-05-07', 0),
(18, 103, 59, 1, '2024-05-07', 0),
(24, 103, 59, 3, '2024-05-07', 0),
(18, 104, 60, 1, '2024-05-07', 0),
(24, 104, 60, 3, '2024-05-07', 0),
(18, 105, 61, 1, '2024-05-07', 0),
(24, 105, 61, 3, '2024-05-07', 0),
(18, 106, 62, 1, '2024-05-07', 0),
(24, 106, 62, 3, '2024-05-07', 0),
(21, 107, 63, 1, '2024-05-07', 0),
(24, 107, 63, 1, '2024-05-07', 0),
(21, 108, 64, 1, '2024-05-07', 0),
(24, 108, 64, 1, '2024-05-07', 0),
(21, 109, 65, 1, '2024-05-07', 0),
(24, 109, 65, 1, '2024-05-07', 0),
(24, 110, 66, 1, '2024-05-07', 0),
(7, 110, 66, 1, '2024-05-07', 0);

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `id_fact` int(11) NOT NULL,
  `id_clt` int(11) NOT NULL,
  `date_fact` date NOT NULL,
  `etat` varchar(255) NOT NULL,
  `montant_tota` decimal(8,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `facture`
--

INSERT INTO `facture` (`id_fact`, `id_clt`, `date_fact`, `etat`, `montant_tota`) VALUES
(10, 53, '2024-05-03', 'en cours', 1603),
(11, 54, '2024-05-03', 'en cours', 1603),
(12, 55, '2024-05-03', 'en cours', 1603),
(13, 56, '2024-05-03', 'en cours', 1603),
(14, 57, '2024-05-03', 'en cours', 2135),
(15, 58, '2024-05-03', 'en cours', 2135),
(16, 59, '2024-05-03', 'en cours', 2135),
(17, 60, '2024-05-03', 'en cours', 2135),
(18, 61, '2024-05-03', 'en cours', 2135),
(19, 62, '2024-05-03', 'en cours', 2135),
(20, 63, '2024-05-06', 'en cours', 44),
(21, 64, '2024-05-06', 'en cours', 44),
(22, 65, '2024-05-06', 'en cours', 44),
(23, 66, '2024-05-06', 'en cours', 44),
(24, 67, '2024-05-06', 'en cours', 44),
(25, 69, '2024-05-06', 'en cours', 44),
(26, 70, '2024-05-06', 'en cours', 7),
(27, 71, '2024-05-06', 'en cours', 7),
(28, 72, '2024-05-06', 'en cours', 7),
(29, 73, '2024-05-06', 'en cours', 7),
(30, 74, '2024-05-06', 'en cours', 7),
(31, 75, '2024-05-06', 'en cours', 7),
(32, 76, '2024-05-06', 'en cours', 7),
(33, 77, '2024-05-06', 'en cours', 7),
(34, 78, '2024-05-06', 'en cours', 7),
(35, 79, '2024-05-06', 'en cours', 7),
(36, 80, '2024-05-06', 'en cours', 7),
(37, 81, '2024-05-06', 'en cours', 7),
(38, 82, '2024-05-06', 'en cours', 7),
(39, 83, '2024-05-06', 'en cours', 7),
(40, 84, '2024-05-06', 'en cours', 7),
(41, 85, '2024-05-06', 'en cours', 7),
(42, 86, '2024-05-06', 'en cours', 7),
(43, 87, '2024-05-06', 'en cours', 7),
(44, 88, '2024-05-06', 'en cours', 7),
(45, 89, '2024-05-06', 'en cours', 7),
(46, 90, '2024-05-06', 'en cours', 7),
(47, 91, '2024-05-06', 'en cours', 7),
(48, 92, '2024-05-06', 'en cours', 7),
(49, 93, '2024-05-06', 'en cours', 7),
(50, 94, '2024-05-06', 'en cours', 7),
(51, 95, '2024-05-06', 'en cours', 7),
(52, 96, '2024-05-06', 'en cours', 7),
(53, 97, '2024-05-06', 'en cours', 33),
(54, 98, '2024-05-07', 'en cours', 22),
(55, 99, '2024-05-07', 'en cours', 22),
(56, 100, '2024-05-07', 'en cours', 11),
(57, 101, '2024-05-07', 'en cours', 11),
(58, 102, '2024-05-07', 'en cours', 11),
(59, 103, '2024-05-07', 'en cours', 52),
(60, 104, '2024-05-07', 'en cours', 52),
(61, 105, '2024-05-07', 'en cours', 52),
(62, 106, '2024-05-07', 'en cours', 52),
(63, 107, '2024-05-07', 'en cours', 281),
(64, 108, '2024-05-07', 'en cours', 281),
(65, 109, '2024-05-07', 'en cours', 281),
(66, 110, '2024-05-07', 'en cours', 19);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_prd` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `poids` decimal(10,0) NOT NULL,
  `code_generique` int(11) NOT NULL,
  `qtt_stocke` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_prd`, `image`, `nom`, `prix`, `description`, `poids`, `code_generique`, `qtt_stocke`) VALUES
(3, 'produit.png', 'chme3', 3, '          kdoso  ', 2, 3, -1),
(4, '', 'zit l3od', 10, '        bonne qualite    ', 10, 7272, -8),
(6, '', 'atay', 4, '            bonne qualite', 200, 29930, 12),
(7, '', 'sukar', 4, '     bonne prix  ', 200, 29930, 81),
(8, '6630b9879877a', 'farine1', 12, '            bonn prix', 700, 76868, 3),
(9, '6630b98c70ac6', 'farine1', 4, '            bn prix', 700, 76868, 5),
(10, '6630b9913354d', 'farine1', 4, '            bn prix', 700, 76868, 6),
(14, '', 'farine3', 7, '         mmmmmmmmmmmmmmmmmmmmm   ', 700, 76868, 6),
(15, '', 'farine3', 7, '         mmmmmmmmmmmmmmmmmmmmm   ', 700, 76868, 3),
(16, '', 'farine3', 7, '         mmmmmmmmmmmmmmmmmmmmm   ', 700, 76868, 0),
(17, '', 'farine4', 7, '         mmmmmmmmmmmmmmmmmmmmm   ', 700, 76868, -3),
(18, 'produit.png', 'farine5', 7, '         mmmmmmmmmmmmmmmmmmmmm   ', 700, 76868, 0),
(21, '6630c79cdf580.jpg', 'farine6', 266, '         hiuhuih   ', 700, 76868, -19),
(24, '6639e725c6da9.jpg', 'sanida ', 15, '         kosimar   ', 300, 7364, -1),
(25, '663a36e75f966.jpg', 'zit argan', 10, '            jjjjj', 20, 78899, 23);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_clt`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD KEY `FK_COMMANDE_COMMANDE_FACTURE` (`id_fact`),
  ADD KEY `FK_COMMANDE_COMMANDE2_PRODUIT` (`id_prd`),
  ADD KEY `FK_COMMANDE_COMMANDE3_CLIENT` (`id_clt`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`id_fact`),
  ADD KEY `id_clt` (`id_clt`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_prd`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_clt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `id_fact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_prd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_COMMANDE_COMMANDE2_PRODUIT` FOREIGN KEY (`id_prd`) REFERENCES `produit` (`id_prd`),
  ADD CONSTRAINT `FK_COMMANDE_COMMANDE3_CLIENT` FOREIGN KEY (`id_clt`) REFERENCES `client` (`id_clt`);

--
-- Contraintes pour la table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `id_clt` FOREIGN KEY (`id_clt`) REFERENCES `client` (`id_clt`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
