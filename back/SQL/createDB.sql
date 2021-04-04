-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : Dim 04 avr. 2021 à 10:47
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
-- Structure de la table `abonnement`
--

CREATE TABLE `abonnement` (
  `cours` int(11) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `titre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `conversation`
--

CREATE TABLE `conversation` (
  `id` int(11) NOT NULL,
  `titre` varchar(50) COLLATE utf8_bin NOT NULL,
  `categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `id` int(11) NOT NULL,
  `nom` varchar(200) COLLATE utf8_bin NOT NULL,
  `difficulte` enum('Débutant','Intermédiaire','Avancé','Expert') COLLATE utf8_bin NOT NULL,
  `auteur` int(11) DEFAULT NULL,
  `categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `evaluation`
--

CREATE TABLE `evaluation` (
  `id` int(11) NOT NULL,
  `cours` int(11) NOT NULL,
  `question` int(11) NOT NULL,
  `reponse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `fichiersevaluation`
--

CREATE TABLE `fichiersevaluation` (
  `id` int(11) NOT NULL,
  `evaluation` int(11) NOT NULL,
  `dir` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `conversation` int(11) NOT NULL,
  `contenu` varchar(1000) COLLATE utf8_bin NOT NULL,
  `auteur` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `resultat`
--

CREATE TABLE `resultat` (
  `passage` date NOT NULL,
  `evaluation` int(11) NOT NULL,
  `utilisateur` int(11) NOT NULL,
  `note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(20) COLLATE utf8_bin NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `user_password` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `abonnement`
--
ALTER TABLE `abonnement`
  ADD PRIMARY KEY (`cours`,`user`),
  ADD KEY `fk_utilisateur_abonnement` (`user`);

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categorie_conversation` (`categorie`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categorie_cours` (`categorie`),
  ADD KEY `fk_auteur_cours` (`auteur`);

--
-- Index pour la table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`id`,`reponse`),
  ADD UNIQUE KEY `question` (`question`),
  ADD KEY `fk_cours_evaluation` (`cours`),
  ADD KEY `fk_reponses_evaluation` (`reponse`);

--
-- Index pour la table `fichiersevaluation`
--
ALTER TABLE `fichiersevaluation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_evaluation_fichierseval` (`evaluation`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_auteur_message` (`conversation`);

--
-- Index pour la table `resultat`
--
ALTER TABLE `resultat`
  ADD PRIMARY KEY (`passage`,`evaluation`,`utilisateur`),
  ADD KEY `fk_evaluation_resultat` (`evaluation`),
  ADD KEY `fk_utilisateur_resultat` (`utilisateur`);

--
-- Index pour la table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fichiersevaluation`
--
ALTER TABLE `fichiersevaluation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `abonnement`
--
ALTER TABLE `abonnement`
  ADD CONSTRAINT `fk_cours_abonnement` FOREIGN KEY (`cours`) REFERENCES `cours` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_utilisateur_abonnement` FOREIGN KEY (`user`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_user_admin` FOREIGN KEY (`user`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `conversation`
--
ALTER TABLE `conversation`
  ADD CONSTRAINT `fk_categorie_conversation` FOREIGN KEY (`categorie`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `fk_auteur_cours` FOREIGN KEY (`auteur`) REFERENCES `utilisateurs` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_categorie_cours` FOREIGN KEY (`categorie`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `evaluation`
--
ALTER TABLE `evaluation`
  ADD CONSTRAINT `fk_cours_evaluation` FOREIGN KEY (`cours`) REFERENCES `cours` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_question_evaluation` FOREIGN KEY (`question`) REFERENCES `fichiersevaluation` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_reponses_evaluation` FOREIGN KEY (`reponse`) REFERENCES `fichiersevaluation` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `fichiersevaluation`
--
ALTER TABLE `fichiersevaluation`
  ADD CONSTRAINT `fk_evaluation_fichierseval` FOREIGN KEY (`evaluation`) REFERENCES `evaluation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_auteur_message` FOREIGN KEY (`conversation`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_conversation_message` FOREIGN KEY (`conversation`) REFERENCES `conversation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `resultat`
--
ALTER TABLE `resultat`
  ADD CONSTRAINT `fk_evaluation_resultat` FOREIGN KEY (`evaluation`) REFERENCES `evaluation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_utilisateur_resultat` FOREIGN KEY (`utilisateur`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
