-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 16 Février 2016 à 17:10
-- Version du serveur :  5.6.21
-- Version de PHP :  5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `zendblog`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`category_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`category_id`, `name`, `slug`, `state`) VALUES
(1, 'House', 'house', 1),
(2, 'Progressive House', 'progressive-house', 1),
(3, 'Deep House', 'deep-house', 1),
(4, 'News', 'news', 1),
(5, 'Events', 'events', 1),
(6, 'Music', 'music', 1),
(21, 'Trap', 'trap', 1),
(30, 'HardStyle', 'hardstyle', 1);

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
`comment_id` int(11) NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `state` int(11) DEFAULT NULL,
  `date_create` datetime NOT NULL,
  `post_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`comment_id`, `content`, `state`, `date_create`, `post_id`, `author`) VALUES
(1, 'ghrtzhtrs', 1, '2016-02-16 15:34:12', '1', 'julien.decoen@gmail.com'),
(3, 'Super ! continuez comme ca!', 1, '2016-02-16 15:35:25', '4', 'social@bdeesgi.fr');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
`post_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `state` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `author` int(11) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `path_picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `post`
--

INSERT INTO `post` (`post_id`, `title`, `content`, `state`, `category_id`, `author`, `date_create`, `path_picture`) VALUES
(1, 'Release : Michael Calfan – Nobody Does It Better [Spinnin]', 'Entre Treasured Soul, Breaking The Doors et Mercy, Michael Calfan aura été l’un des acteurs majeurs de la scène électronique sur l’année 2015. Et il ne compte pas baisser le rythme pour l’année 2016. Spinnin Records et son poulain viennent de dévoiler leu', 1, 1, 1, '2016-02-03 00:00:00', NULL),
(3, 'Preview : Kryder & Maxum – Aint No Way', '<div class="w-blog-post-content">				<p style="text-align: center;"><img class="alignnone wp-image-28363" src="http://www.guettapen.fr/wp-content/uploads/2016/01/avatars-000192619694-ycmwu4-t500x500.jpg" alt="avatars-000192619694-ycmwu4-t500x500" ></p>', 1, 3, 1, '2016-02-03 00:00:00', NULL),
(4, 'Tomorrowland met en vente les tickets monde pour son édition 2016', 'L’heure fatidique est enfin arrivée ! Après plusieurs mois d’attente, le Tomorrowland met ENFIN en vente les places monde pour son édition 2016. Mais la tache ne sera pas simple. Uniquement 90 000 places pour plusieurs millions de demandeurs à travers 180 pays. Il ne faudra donc pas tarder : premier arrivé et premier servi. Pour participer à la vente, il suffit de cliquer sur le lien qui vous a été envoyé lors de la pré-inscription. On vous souhaite bonne chance pour cette vente et on vous retrouve sur place en juillet !', 1, 4, 1, '2016-02-14 00:00:00', NULL),
(9, 'Skrillex & Diplo, grands vainqueurs de la catégorie électro des Grammy Awards 2016', 'Les Grammy Awards représentent le graal du graal pour tout musicien, producteur, chanteur ou artiste relatif à la musique. En cette année 2016, il n’y avait que 2 catégories relatives à la musique électronique. Et on peut dire que Skrillex & Diplo ont simplement détruit le game.\r\n\r\nEn effet, les deux superstars ont gagné ces deux catégories à savoir le meilleur titre de l’année avec ‘Where Are U Know’ en collab avec Justin Bieber et le meilleur album de l’année avec ‘Skrillex and Diplo Present Jack Ü’. Un succès qui vient récompenser une année 2015 absolument incroyable pour eux et leur staff. On tient vraiment à féliciter les deux artistes pour cette performance totalement folle.', 1, 1, 2, '2016-02-16 00:00:00', NULL),
(10, 'Jakko & Matthew White & Lonczinski – No One Else', 'Cela faisait un moment qu’on n’avait pas eu un coup de coeur pareil pour une bonne veille track progressive. Le titre qu’on vous fait découvrir est signé du nouveau jeune prodige du style à savoir le brésilien Jakko. La preview démarre d’emblée sur un break et un vocal tout simplement superbe, on a la chair de poule dès les premières secondes jusqu’à l’arrivée du drop. Ce dernier n’est pas en reste puisque c’est tout simplement un missile de puissance mélodique et d’émotion à l’état pur. Même si le style est moins en vogue ces derniers temps on est ravi de découvrir encore ce genre de pépites. Une superbe track.', 1, 3, 2, '2016-02-16 16:51:07', NULL),
(11, 'Pep & Rash – Love The One You’re With [Spinnin Records]', 'Si nous devions décrire le mix de la good vibes et de l’originalité, le duo néerlandais Pep & Rash se verrait décorer d’une bonne récompense. Spinnin nous dévoile aujourd’hui ‘Love The One You’re With’, une petite bombe deep / future qui d’après nous, n’aura franchement pas de difficulté à faire parler d’elle.\r\n\r\nProfitons de ce break très sympa et frais pour faire un peu de musicologie. Ce vocal, sonnant 70’s à plein nez, est issu de la reprise disco des Isley Brothers du même nom, reprise elle même de la première version produite par Stephen Stills. Admettons que le mélange de ce vocal et de la guitare, elle aussi disco à souhait, forme un ensemble très très groovy. Puis vint le drop qui, une fois de plus porté par la patte de Pep & Rash, ne déroge pas au style dont ils nous imprègnent habituellement. En bref, une bonne prod originale et agréable à se mettre sous la dent.\r\n\r\nSortie prévue le 7 mars sur Spinnin Records', 1, 2, 2, '2016-02-16 16:59:32', NULL),
(12, 'Daddy’s Groove ft. Cimo Frankel – Back To 94 [Spinnin]', 'Voici un titre qui pourrait aisément devenir le tube de l’hiver ! Il est signé des Daddy’s Groove et franchement c’est vraiment bon. Il y avait longtemps que les trois italiens ne nous avaient pas proposé un son aussi qualitatif. Ils nous délivrent une vibe entrainante et une mélodie entetante pour un titre qui aurait toute sa place en radio. Certains reprocheront le côté très commercial du titre, mais on apprécierait volontiers écouter ce genre de musique commerciale plus souvent. On a même l’impression qu’ils se sont fortement inspirés des sonorités pop/rock de Avicii. Très bon titre en tout cas.\r\n\r\nDisponible le 2 mars sur Spinnin', 1, 2, 2, '2016-02-16 16:59:55', NULL),
(13, 'Hatzler – SkyT (Victor Ruiz Remix) [Stil Vor Talent]', 'Victor Ruiz est de retour ! Pour ceux qui ne le connaissent pas, nous vous l’avions présenté il y a quelques temps dans notre article sur la scène Techno-Progressive Brésilienne, dont il est l’un des meilleurs ambassadeurs. Il revient aujourd’hui chez l’immense label allemand Stil Vor Talent.\r\n\r\nEt le moins que l’on puisse dire, c’est que son arrivée sur le label est tout simplement MONSTRUEUSE ! Il nous a pondu une track Techno d’une lourdeur absolument extraordinaire, très rythmée et à la mélodie folle. Le magnifique Build-up fait très bien monter la pression, avec ses synthés extraordinaires, pour nous emmener sur un Drop assassin et évolutif, où l’on peut retrouver ces fameux synthés, qui détruira n’importe quel dancefloor du monde entier. On s’éloigne un petit peu de ce son brésilien typique (même si l’on en retrouve quelques codes) pour revenir vers une Techno plus « Européenne », mais alors quelle réussite.\r\n\r\nVictor Ruiz est parti pour envahir l’Europe. Son arrivée sur l’un des meilleurs labels berlinois n’en fait plus aucun doute. Victor Ruiz est la prochaine grande star de la Techno mondiale.\r\n\r\nBem feito, e obrigado Victor', 1, 2, 1, '2016-02-16 17:00:22', NULL),
(14, 'Mark With a K – See Me Now (Da Tweekaz Remix)', 'Jusqu’ici, ils tiennent leur promesse, et leur rythme d’une track par mois. Et pour ce mois de février, c’est un remix d’une track qui a fait la réputation de Mark With a K, puisqu’il s’agit de « See Me Now ». Notre avis concernant ce remix est un peu en demi teinte, le remix est bon, très rythmé, la bassline est accentuée, ce qui donne une touche particulière au morceau. Mais le soucis, c’est que l’on a la désagréable impression de voir un copié/collé sur les tracks de Da Tweekaz. Nous adorons ce duo, mais nous trouvons cela un peu dommage de les voir comme cela. Ils ont clairement du mal à se renouveler, à proposer quelque chose de nouveau et de frais. On espère en tout cas que pour la track du mois de mars, il y aura une prise de risque de leur part, on les y encourage fortement.\r\n\r\nDisponible le 1er mars.', 1, 2, 2, '2016-02-16 17:00:46', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
`id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `roleId` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `role`
--

INSERT INTO `role` (`id`, `parent_id`, `roleId`) VALUES
(1, NULL, 'guest'),
(2, 1, 'user'),
(3, 2, 'moderator'),
(4, 3, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
`tag_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `displayName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `displayName`, `password`) VALUES
(1, 'admin', 'admin@admin.com', 'Admin', '$2y$14$PScxr/eNq9CLsjWiTogYXeTpoYa3jrO7S3wXyQPm5.AOQA8KQQYdW'),
(2, 'juicy', 'julien.decoen@gmail.com', 'Juicy', '$2y$14$BARN.iMpYBpLAUHiWMGZauMUXpYgtS3fHk3AbW4uRAvzhFPIs7NnK');

-- --------------------------------------------------------

--
-- Structure de la table `user_role_linker`
--

CREATE TABLE IF NOT EXISTS `user_role_linker` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `user_role_linker`
--

INSERT INTO `user_role_linker` (`user_id`, `role_id`) VALUES
(1, 4),
(2, 4);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`category_id`), ADD UNIQUE KEY `UNIQ_64C19C1989D9B62` (`slug`), ADD UNIQUE KEY `UNIQ_64C19C15E237E06` (`name`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
 ADD PRIMARY KEY (`comment_id`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
 ADD PRIMARY KEY (`post_id`), ADD UNIQUE KEY `UNIQ_5A8A6C8D2B36786B` (`title`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UNIQ_57698A6AB8C2FD88` (`roleId`), ADD KEY `IDX_57698A6A727ACA70` (`parent_id`);

--
-- Index pour la table `tag`
--
ALTER TABLE `tag`
 ADD PRIMARY KEY (`tag_id`), ADD UNIQUE KEY `UNIQ_389B7835E237E06` (`name`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UNIQ_1483A5E9E7927C74` (`email`), ADD UNIQUE KEY `UNIQ_1483A5E9F85E0677` (`username`);

--
-- Index pour la table `user_role_linker`
--
ALTER TABLE `user_role_linker`
 ADD PRIMARY KEY (`user_id`,`role_id`), ADD KEY `IDX_61117899A76ED395` (`user_id`), ADD KEY `IDX_61117899D60322AC` (`role_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `tag`
--
ALTER TABLE `tag`
MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `role`
--
ALTER TABLE `role`
ADD CONSTRAINT `FK_57698A6A727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `role` (`id`);

--
-- Contraintes pour la table `user_role_linker`
--
ALTER TABLE `user_role_linker`
ADD CONSTRAINT `FK_61117899A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
ADD CONSTRAINT `FK_61117899D60322AC` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
