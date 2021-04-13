-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 13 avr. 2021 à 17:20
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sf_daw`
--

--
-- Déchargement des données de la table `abonnements`
--

INSERT INTO `abonnements` (`cours`, `utilisateur`) VALUES
(1, 2);

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`utilisateur`) VALUES
(1);

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `titre`) VALUES
(1, 'Catégorie de test 1'),
(2, 'Catégorie de test 2'),
(3, 'Catégorie de test 3'),
(4, 'Catégorie de test 4');

--
-- Déchargement des données de la table `conversations`
--

INSERT INTO `conversations` (`id`, `categorie`, `titre`) VALUES
(1, 1, 'Conversation de test 1');

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id`, `nom`, `difficulte`, `filedir`, `auteur`, `categorie`) VALUES
(1, 'Cours de test 1', 'Débutant', 'data/cours/1/index.html', 1, 1),
(2, 'Cours de test 2', 'Débutant', 'data/cours/2/index.html', 1, 2),
(3, 'Cours de test 3', 'Débutant', 'data/cours/3/index.html', 1, 3),
(4, 'Cours de test 4', 'Débutant', 'data/cours/4/index.html', 1, 4),
(5, 'Cours de test 5', 'Débutant', 'data/cours/5/index.html', 1, 1),
(6, 'cours de test 6', 'Débutant', 'data/cours/6/index.html', 1, 2);

--
-- Déchargement des données de la table `evaluations`
--

INSERT INTO `evaluations` (`id`, `maxResultat`, `questionsFile`, `reponsesFile`, `cours`) VALUES
(1, 1, 'data/evaluation/questions/questions.xml', 'data/evaluation/reponses/reponses.xml', 1);

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `conversation`, `auteur`, `contenu`, `date`) VALUES
(1, 1, 2, 'Message de test 1', '2021-04-13 14:36:27');

--
-- Déchargement des données de la table `resultats`
--

INSERT INTO `resultats` (`passage`, `evaluation`, `utilisateur`, `note`) VALUES
('2021-04-13 14:06:11', 1, 2, 1);

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `passwordhash`, `usericon`) VALUES
(1, 'IAN', 'TRUE', 'ian.true@gmail.com', '$2y$10$cqNoHhFrofUXefWy8s8GZOmrQYU/CSOOOrFOEPclZkZlgeAU6LuQO', 'data/userIcons/DEFAULT.png'),
(2, 'SANCHEZ', 'PEDRO', 'aaa@gmail.com', '$2y$10$vD8eF/kR0NUOdUSjjoe61eVpCeW5ZKRGnccOP.10EAlFTswnNoIEW', 'data/userIcons/DEFAULT.png'),
(3, 'bbb', 'bbb', 'bbb@gmail.com', '$2y$10$536hjtPffYbVh/xDzf4Vse0AYl6hux57992pxt2O55ndakHiEMdmu', './../data/userIcons/DEFAULT.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
