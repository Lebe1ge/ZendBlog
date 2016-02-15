-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Lun 08 Février 2016 à 19:29
-- Version du serveur :  5.5.42
-- Version de PHP :  5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `zendBlog`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `nom` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`category_id`, `nom`, `slug`, `state`) VALUES
(1, 'House', 'house', 1),
(2, 'Progressive House', 'progressive-house', 1),
(3, 'Deep House', 'deep-house', 1),
(4, 'News', 'news', 1),
(5, 'Events', 'events', 1),
(6, 'Music', 'music', 1),
(7, 'Test', 'test', 1),
(8, 'Test2', 'test2', 1),
(10, 'Test3', 'test3', 1),
(11, 'Test4', 'test4', 1),
(12, 'test5', 'test5', 1),
(13, 'test6', 'test6', 1);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` int(11) NOT NULL,
  `category` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `post`
--

INSERT INTO `post` (`post_id`, `title`, `content`, `author`, `state`, `category`) VALUES
(1, 'Release : Michael Calfan – Nobody Does It Better [Spinnin]', 'Entre Treasured Soul, Breaking The Doors et Mercy, Michael Calfan aura été l’un des acteurs majeurs de la scène électronique sur l’année 2015. Et il ne compte pas baisser le rythme pour l’année 2016. Spinnin Records et son poulain viennent de dévoiler leu', 'Fabian Dori', 1, 'House'),
(2, 'Release : Robbie Rivera & Bob Sinclar – Move Right [Spinnin]', 'Lorsque Robbie Rivera et Bob Sinclar s’associent et nous proposent une track signée chez le géant Spinnin, forcément, on s’attend à ce qu’elle fasse du bruit. Inutile de vous préciser que le pari est (pratiquement) réussi ! ‘Move Right’ signe un retour à ', 'Taylor', 1, 'Progressive House'),
(3, 'Preview : Kryder & Maxum – Aint No Way', '<div class="w-blog-post-content">\n				<p style="text-align: center;"><img class="alignnone wp-image-28363" src="http://www.guettapen.fr/wp-content/uploads/2016/01/avatars-000192619694-ycmwu4-t500x500.jpg" alt="avatars-000192619694-ycmwu4-t500x500" ></p>\n', 'Ruben', 1, 'Deep House'),
(4, 'Tomorrowland met en vente les tickets monde pour son édition 2016', 'L’heure fatidique est enfin arrivée ! Après plusieurs mois d’attente, le Tomorrowland met ENFIN en vente les places monde pour son édition 2016. Mais la tache ne sera pas simple. Uniquement 90 000 places pour plusieurs millions de demandeurs à travers 180 pays. Il ne faudra donc pas tarder : premier arrivé et premier servi. Pour participer à la vente, il suffit de cliquer sur le lien qui vous a été envoyé lors de la pré-inscription. On vous souhaite bonne chance pour cette vente et on vous retrouve sur place en juillet !', 'Fabien', 1, 'News'),
(5, 'Test article', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Auteur Test', 1, '1');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `display_name` varchar(50) DEFAULT NULL,
  `password` varchar(128) NOT NULL,
  `state` smallint(6) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `display_name`, `password`, `state`) VALUES
(1, 'Juicy', 'julien.decoen@gmail.com', 'Julien Decoen', 'azerty', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `UNIQ_64C19C1989D9B62` (`slug`),
  ADD UNIQUE KEY `UNIQ_64C19C16C6E55B5` (`nom`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `UNIQ_5A8A6C8D2B36786B` (`title`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
