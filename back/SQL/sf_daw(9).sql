-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 21 avr. 2021 à 15:56
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
CREATE DATABASE IF NOT EXISTS `sf_daw` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `sf_daw`;

-- --------------------------------------------------------

--
-- Structure de la table `abonnements`
--

DROP TABLE IF EXISTS `abonnements`;
CREATE TABLE `abonnements` (
  `cours` int(11) NOT NULL,
  `utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `abonnements`
--

INSERT INTO `abonnements` (`cours`, `utilisateur`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`utilisateur`) VALUES
(1);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `titre` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `titre`) VALUES
(1, 'Catégorie de test 1'),
(2, 'Catégorie de test 2'),
(3, 'Catégorie de test 3'),
(4, 'Catégorie de test 4');

-- --------------------------------------------------------

--
-- Structure de la table `conversations`
--

DROP TABLE IF EXISTS `conversations`;
CREATE TABLE `conversations` (
  `id` int(11) NOT NULL,
  `categorie` int(11) NOT NULL,
  `titre` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `conversations`
--

INSERT INTO `conversations` (`id`, `categorie`, `titre`) VALUES
(1, 1, 'Conversation de test 1');

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE `cours` (
  `id` int(11) NOT NULL,
  `nom` varchar(200) COLLATE utf8_bin NOT NULL,
  `difficulte` enum('Débutant','Intermédiaire','Avancé','Expert') COLLATE utf8_bin NOT NULL,
  `filedir` varchar(200) COLLATE utf8_bin NOT NULL,
  `auteur` int(11) DEFAULT NULL,
  `categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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

-- --------------------------------------------------------

--
-- Structure de la table `evaluations`
--

DROP TABLE IF EXISTS `evaluations`;
CREATE TABLE `evaluations` (
  `id` int(11) NOT NULL,
  `maxResultat` int(11) NOT NULL,
  `questionsFile` varchar(200) COLLATE utf8_bin NOT NULL,
  `reponsesFile` varchar(200) COLLATE utf8_bin NOT NULL,
  `cours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `evaluations`
--

INSERT INTO `evaluations` (`id`, `maxResultat`, `questionsFile`, `reponsesFile`, `cours`) VALUES
(1, 1, 'data/evaluation/questions/questions.xml', 'data/evaluation/reponses/reponses.xml', 1);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `conversation` int(11) NOT NULL,
  `auteur` int(11) NOT NULL,
  `contenu` varchar(1000) COLLATE utf8_bin NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `conversation`, `auteur`, `contenu`, `date`) VALUES
(1, 1, 2, 'Message de test 1', '2021-04-13 14:36:27');

-- --------------------------------------------------------

--
-- Structure de la table `resultats`
--

DROP TABLE IF EXISTS `resultats`;
CREATE TABLE `resultats` (
  `passage` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `evaluation` int(11) NOT NULL,
  `utilisateur` int(11) NOT NULL,
  `note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `resultats`
--

INSERT INTO `resultats` (`passage`, `evaluation`, `utilisateur`, `note`) VALUES
('2021-04-13 14:06:11', 1, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `passwordhash` varchar(200) COLLATE utf8_bin NOT NULL,
  `usericon` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `passwordhash`, `usericon`) VALUES
(1, 'IAN', 'TRUE', 'ian.true@gmail.com', '$2y$10$cqNoHhFrofUXefWy8s8GZOmrQYU/CSOOOrFOEPclZkZlgeAU6LuQO', 'DEFAULT.png'),
(2, 'SANCHEZ', 'PEDRO', 'aaa@gmail.com', '$2y$10$vD8eF/kR0NUOdUSjjoe61eVpCeW5ZKRGnccOP.10EAlFTswnNoIEW', 'DEFAULT.png'),
(3, 'bbb', 'bbb', 'bbb@gmail.com', '$2y$10$536hjtPffYbVh/xDzf4Vse0AYl6hux57992pxt2O55ndakHiEMdmu', 'DEFAULT.png'),
(8, 'TROU', 'YANN', 'adad@gmail.com', '$2y$10$zo7A.BpPwfg7BWUcYCTJjenWdDBo8fXIGpZ57uEGaX5T8aRiJPY5e', '871dca156ca08bbcdfac2dd49bcc520df0fa0452107a33341c5b9e24f4f9fcee.jpg'),
(9, 'TROUa', 'YANNa', 'adada@gmail.com', '$2y$10$JiBDeARsYE92.i4IU0yUoelYWkHZv.5QQozpwAZ8.WklJ.NuePdKq', 'DEFAULT.png'),
(11, 'LLLAAA', 'LLLAAA', 'LLLAAA@aaa.com', '$2y$10$DTQQRcaX/jU61kKKyspmguUhdWmqopD7jHEl/lLxRhJenVR/9OQP2', 'abff6c2940b99ed3ec89aad7bcfd262f05adce2991d7d4a20db86dda74703776.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `abonnements`
--
ALTER TABLE `abonnements`
  ADD KEY `fk_cours_abonnements` (`cours`),
  ADD KEY `fk_utilisateur_abonnement` (`utilisateur`);

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`utilisateur`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categorie_conversation` (`categorie`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_auteur_cours` (`auteur`),
  ADD KEY `fk_categorie_cours` (`categorie`);

--
-- Index pour la table `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cours_evaluation` (`cours`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_conversation_message` (`conversation`),
  ADD KEY `fk_auteur_message` (`auteur`);

--
-- Index pour la table `resultats`
--
ALTER TABLE `resultats`
  ADD PRIMARY KEY (`passage`,`evaluation`,`utilisateur`),
  ADD KEY `fk_utilisateur_resultat` (`utilisateur`),
  ADD KEY `fk_evaluation_resultat` (`evaluation`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `abonnements`
--
ALTER TABLE `abonnements`
  ADD CONSTRAINT `fk_cours_abonnements` FOREIGN KEY (`cours`) REFERENCES `cours` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_utilisateur_abonnement` FOREIGN KEY (`utilisateur`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `fk_utilisateur_admins` FOREIGN KEY (`utilisateur`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `conversations`
--
ALTER TABLE `conversations`
  ADD CONSTRAINT `fk_categorie_conversation` FOREIGN KEY (`categorie`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `fk_auteur_cours` FOREIGN KEY (`auteur`) REFERENCES `admins` (`utilisateur`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_categorie_cours` FOREIGN KEY (`categorie`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `evaluations`
--
ALTER TABLE `evaluations`
  ADD CONSTRAINT `fk_cours_evaluation` FOREIGN KEY (`cours`) REFERENCES `cours` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `fk_auteur_message` FOREIGN KEY (`auteur`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_conversation_message` FOREIGN KEY (`conversation`) REFERENCES `conversations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `resultats`
--
ALTER TABLE `resultats`
  ADD CONSTRAINT `fk_evaluation_resultat` FOREIGN KEY (`evaluation`) REFERENCES `evaluations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_utilisateur_resultat` FOREIGN KEY (`utilisateur`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
