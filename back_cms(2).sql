-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : dim. 05 déc. 2021 à 18:45
-- Version du serveur : 10.6.4-MariaDB-1:10.6.4+maria~focal
-- Version de PHP : 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `back_cms`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `post_id`, `user_id`, `content`) VALUES
(1, 1, 1, 'Mais j\'adoooooore :D'),
(2, 10, 17, 'fezf'),
(3, 10, 17, 'fezf'),
(4, 10, 17, 'Oui'),
(5, 11, 17, 'dza'),
(6, 11, 17, 'dza'),
(7, 11, 17, 'dza'),
(8, 11, 17, 'dza'),
(9, 11, 17, 'dza'),
(10, 11, 17, 'dza'),
(11, 11, 17, 'dza'),
(12, 11, 17, 'dza'),
(13, 11, 17, 'dza'),
(14, 11, 17, 'fezef'),
(15, 11, 17, 'fezef'),
(16, 11, 17, 'fezef'),
(17, 11, 17, 'fezef'),
(18, 11, 17, 'fezef'),
(19, 11, 17, 'fezef'),
(20, 11, 17, 'fezef'),
(21, 11, 17, 'fezef'),
(22, 13, 17, 'fezf');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text DEFAULT NULL,
  `title` varchar(128) NOT NULL,
  `commentlist` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`commentlist`)),
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `user_id`, `content`, `title`, `commentlist`, `date`) VALUES
(1, 1, 'Ce contenu est génial', 'Oh mais ce titre :o', '[1]', '0000-00-00'),
(2, 10, 'oui', 'oui', '[]', '2021-12-05'),
(3, 10, 'check', 'check', '[]', '2021-12-05'),
(4, 17, 'hreherh', 'rhreh', '[]', '2021-12-05'),
(5, 17, 'hreherh', 'rhreh', '[]', '2021-12-05'),
(6, 17, 'dsqsd', 'dfdsq', '[]', '2021-12-05'),
(7, 17, 'dsqsd', 'dfdsq', '[]', '2021-12-05'),
(8, 17, 'azd', 'dza', '[]', '2021-12-05'),
(9, 17, 'fef', 'fef', '[]', '2021-12-05'),
(10, 17, 'yé', 'Test', '[]', '2021-12-05'),
(11, 17, 'dzadz', 'dzazd', '[19,20,21]', '2021-12-05'),
(12, 17, 'fezf', 'fezf', '[]', '2021-12-05'),
(13, 17, 'gre', 'gre', '[22]', '2021-12-05');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `statut` tinyint(1) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `name`, `statut`, `password`) VALUES
(1, 'Alex', 1, '$2a$12$pT1JScNW8KyzRXe2uoWFne/XWS/wikOmvc9XguwDRqbz10oo6ght2'),
(2, 'Alex', 1, 'alex'),
(3, 'bite', 1, 'bite'),
(4, 'lol', 1, 'lol'),
(5, 'lol', 1, 'lol'),
(6, 'lol', 1, 'lol'),
(7, 'lol', 1, 'lol'),
(8, 'lol', 1, 'lol'),
(9, 'lol', 1, 'lol'),
(10, 'wesh', 1, 'wesh'),
(11, 'wesh', 1, 'weshs'),
(12, 'wesh', 1, 'wesh'),
(13, 'oui', 1, 'oui'),
(14, 'non', 1, 'non'),
(15, '1', 1, '1'),
(16, '2', 1, '2'),
(17, '3', 1, '3');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
