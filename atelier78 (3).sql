-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 06 oct. 2022 à 19:16
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `atelier78`
--

-- --------------------------------------------------------

--
-- Structure de la table `galerie`
--

DROP TABLE IF EXISTS `galerie`;
CREATE TABLE IF NOT EXISTS `galerie` (
  `image_id` int NOT NULL AUTO_INCREMENT,
  `image` blob,
  PRIMARY KEY (`image_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `galerie`
--

INSERT INTO `galerie` (`image_id`, `image`) VALUES
(1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `imgproduits`
--

DROP TABLE IF EXISTS `imgproduits`;
CREATE TABLE IF NOT EXISTS `imgproduits` (
  `imgID` int NOT NULL AUTO_INCREMENT,
  `nomIMG` varchar(255) NOT NULL,
  `id` int DEFAULT NULL,
  PRIMARY KEY (`imgID`),
  KEY `idproduits` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `imgproduits`
--

INSERT INTO `imgproduits` (`imgID`, `nomIMG`, `id`) VALUES
(17, 'p_hv9303_55223_1_1.jpg', 73),
(60, 'produit4000', 107),
(30, 'p_cc5063_223_1_1.jpg', 81),
(53, 'p_hv9305_221_1_1.jpg', 100),
(56, 'p_ca6424_12_1_1 (1).jpg', 103),
(54, 'p_hv9309_221_1_1.jpg', 101),
(50, 'p_hv9307_02_1_1.jpg', 98),
(49, 'p_hv9304_55223_1_1.jpg', 97),
(48, 'p_hv9302_221_1_1.jpg', 96);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nomproduit` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `descproduit` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `categorie` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `prix` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=120 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nomproduit`, `descproduit`, `categorie`, `prix`) VALUES
(73, 'HAUTE VISIBILITÉ ANTARES', 'Soft shell bi-couleur haute visibilité. \n1.- Bandes réfléchissantes en torse et manches. \n2.- Col montant, fermeture éclair centrale. 3.- Poignets ajustables avec velcro. \n4.- Ceinture avec gomme élastique et curseur pour ajustement. \n5.- Trois poches extérieures. Antares est une veste parfaite soft shell de haute visibilité. \nUn design bicolore avec bandes réfléchissantes en torse et manches. Pensée pour te protéger du froid avec col montant.', 'Haute-visibilité', 35),
(81, 'HAUTE VISIBILITÉ SIRIO', 'Gilet de sécurité fluorescent, haute visibilité. Bandes réfléchissantes.\r\nSirio c\'est un design qui apporte une grande visibilité à ceux qui travaillent dans la nuit. Un gilet avec lequel tu ne passeras pas inaperçu et te garantis une sécurité maximum.', 'Haute-visibilité', 4.99),
(97, 'HAUTE VISIBILITÉ EPSYLON', 'Parka haute visibilité combinée en deux couleurs. 1.- Bandes réfléchissantes sur le corps et les manches. 2.- Capuche enroulable avec liseré fluo et ajustable avec embouts. 3.- Poche en torse avec fermeture éclair. 4.- Deux poches frontales légèrement inclinées d\'accès facil. 5.- Bas avec élastique. 6.- Poignets ajustables par élastique et velcro. 7.- Plaquette centrale avec velcro et fermeture éclair fluo avec curseur. 8.- Poches intérieures sur le torse et fermeture intérieure de facil accès pour le marquage. 9.-Manches amovibles. Epsylon est une parka pour ceux qui travaillent de nuit et ils ont besoin de se protéger du froid. Avec des bandes réfléchissantes sur le corps et les manches et une capuche optionnel. En plus sa poche intérieure est parfaite pour garder tes choses.', 'Haute-visibilité', 40),
(96, 'HAUTE VISIBILITÉ POLARIS', 'Polo technique manches courtes haute visibilité. Patte de boutonnage 3 boutons. Col et poignets en côte 1x1. Deux bandes réfléchissantes horizontales sur la poitrine et les manches. Tissu anti-accrochage. Un polo technique parfait pour ceux qui ont besoin d\'une haute visibilité. Polaris est un polo manches courtes avec bandes réfléchissantes sur corps et une sur manches.', 'Haute-visibilité', 18),
(98, 'HAUTE VISIBILITÉ DAILY HV', 'Pantalon de visibilité nocturne en tissu résistant. 1.- Ceinture ajustable avec élastique dans le dos. 2.- Deux poches avant. 3.- Poche fonctionnelle arrière avec rabat et fermeture velcro. 4.- Deux poches latérales avec rabat et fermeture velcro. 5.- Entrejambes double renfort. 6.- Double tissu aux genoux. 7.- Deux bandes réfléchissantes horizontales. Faites votre métier en toute sécurité avec le pantalon DAILY HV de Roly. Avec double tissu sur les genoux, double siège renforcé et deux bandes réfléchissantes horizontales parfaites pour vous donner plus de visibilité', 'Haute-visibilité', 25),
(101, 'HAUTE VISIBILITÉ ALFA', 'Pantalon haute visibilité jaune fluorescent. 1.- Ceinture ajustable avec élastique dans le dos. 2.- Deux poches avant. 3.- Poche fonctionnelle avec rabat et fermeture velcro. 4.- Deux poches latérales à soufflet et rabat avec velcro. 5.- Deux bandes réfléchissantes horizontales. Avec ALFA de Roly, vous pouvez faire votre travail avec la plus grande sécurité possible. Avec ceinture élastique à l\'arrière, poches extérieures avec ou sans Velcro et deux bandes réfléchissantes horizontales.', 'Haute-visibilité', 25),
(100, 'HAUTE VISIBILITÉ ALTAIR ', 'Veste style polaire haute visibilité. 1. Fermeture à glissière avant avec protège-menton. 2. Deux bandes réfléchissantes horizontales sur le torse et les manches. 3. Deux poches avant zippées ton sur ton et une poche poitrine. 4. Poignets élastiques et ajusteurs à l\'intérieur de l\'ourlet. ALTAIR est une veste polaire haute visibilité avec deux bandes réfléchissantes, des poignets élastiques et des ajusteurs à l\'intérieur de l\'ourlet qui feront que le froid ne soit pas un problème lorsque vous travaillez.', 'Haute-visibilité', 25),
(103, 'T-SHIRT ATOMIC 150 ', 'T-shirt manches courtes, col rond double épaisseur, bande de propreté encolure et épaules, Coupe tubulaire Un T-shirt basique irremplaçable dans chaque armoire. Ne peut pas manquer sur ton look chaque semaine.', 'T-SHIRT', 15);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nomutilisateur` varchar(50) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `rang` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nomutilisateur` (`nomutilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nomutilisateur`, `mdp`, `rang`) VALUES
(1, 'ameni', 'ameni', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
