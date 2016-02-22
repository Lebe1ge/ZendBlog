-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 22 Février 2016 à 15:45
-- Version du serveur :  10.1.9-MariaDB
-- Version de PHP :  5.6.15

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
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`category_id`, `name`, `slug`, `state`) VALUES
(1, 'News', 'news', 1),
(2, 'Music', 'music', 1),
(3, 'Events', 'events', 1);

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `state` int(11) DEFAULT NULL,
  `date_create` datetime NOT NULL,
  `post_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`comment_id`, `content`, `state`, `date_create`, `post_id`, `author`) VALUES
(1, 'Super ! continuez comme ca!', 1, '2016-02-16 15:34:12', '1', 'julien.decoen@gmail.com'),
(3, 'Super ! continuez comme ca!', 1, '2016-02-16 15:35:25', '3', 'social@bdeesgi.fr'),
(4, 'Super ! continuez comme ca!', 1, '2016-02-16 15:35:25', '4', 'social@bdeesgi.fr'),
(5, 'Super ! continuez comme ca!', 1, '2016-02-16 15:35:25', '9', 'social@bdeesgi.fr'),
(6, 'Super ! continuez comme ca!', 1, '2016-02-16 15:35:25', '10', 'social@bdeesgi.fr'),
(7, 'Super ! continuez comme ca!', 1, '2016-02-16 15:34:12', '11', 'julien.decoen@gmail.com'),
(8, 'Super ! continuez comme ca!', 1, '2016-02-16 15:34:12', '12', 'julien.decoen@gmail.com'),
(9, 'Super ! continuez comme ca!', 1, '2016-02-16 15:35:25', '13', 'social@bdeesgi.fr'),
(10, 'Super ! continuez comme ca!', 1, '2016-02-16 15:35:25', '14', 'social@bdeesgi.fr'),
(11, 'Super ! continuez comme ca!', 1, '2016-02-16 15:34:12', '15', 'julien.decoen@gmail.com'),
(12, 'Super ! continuez comme ca!', 1, '2016-02-16 15:35:25', '17', 'social@bdeesgi.fr'),
(13, 'Super ! continuez comme ca!', 1, '2016-02-16 15:34:12', '18', 'julien.decoen@gmail.com'),
(15, 'Jolie site !', 1, '2016-02-21 00:30:49', '1', 'julien.decoen@gmail.com'),
(16, 'Super', 1, '2016-02-21 00:33:32', '1', 'julien.decoen@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `state` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `author` int(11) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `path_picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `post`
--

INSERT INTO `post` (`post_id`, `title`, `content`, `state`, `category_id`, `author`, `date_create`, `path_picture`, `tags`) VALUES
(1, 'Release : Michael Calfan – Nobody Does It Better [Spinnin]', 'Entre Treasured Soul, Breaking The Doors et Mercy, Michael Calfan aura été l’un des acteurs majeurs de la scène électronique sur l’année 2015. Et il ne compte pas baisser le rythme pour l’année 2016. Spinnin Records et son poulain viennent de dévoiler leu', 0, 1, 1, '2016-02-21 16:58:42', '/img/pic04.jpg', '1-3-5'),
(3, 'Preview : Kryder & Maxum – Aint No Way', 'C’est un son bien particulier que nous vous présentons aujourd’hui. Premiered le 18 Décembre 2015 lors d’un live des géants Axwell /\\ Ingrosso à la fameuse Where’s The Party de Lisbonne, on était alors sans aucune information sur cette track aux sonorités bien énigmatiques. L’attente fut de courte durée (pour une fois avec Axwell…) puisqu’aujourd’hui le suédois a posté une vidéo sur son instagram, montrant une vue de Rio De Janeiro avec cette track en bande sonore ainsi que son titre en légende.', 1, 2, 1, '2016-02-18 14:22:39', '/img/pic02.jpg', '1-2'),
(4, 'Tomorrowland met en vente les tickets monde pour son édition 2016', 'L’heure fatidique est enfin arrivée ! Après plusieurs mois d’attente, le Tomorrowland met ENFIN en vente les places monde pour son édition 2016. Mais la tache ne sera pas simple. Uniquement 90 000 places pour plusieurs millions de demandeurs à travers 180 pays. Il ne faudra donc pas tarder : premier arrivé et premier servi. Pour participer à la vente, il suffit de cliquer sur le lien qui vous a été envoyé lors de la pré-inscription. On vous souhaite bonne chance pour cette vente et on vous retrouve sur place en juillet !', 1, 3, 1, '2016-02-14 00:00:00', '/img/pic03.jpg', '3-5'),
(9, 'Skrillex & Diplo, grands vainqueurs de la catégorie électro des Grammy Awards 2016', 'Les Grammy Awards représentent le graal du graal pour tout musicien, producteur, chanteur ou artiste relatif à la musique. En cette année 2016, il n’y avait que 2 catégories relatives à la musique électronique. Et on peut dire que Skrillex & Diplo ont simplement détruit le game.\r\n\r\nEn effet, les deux superstars ont gagné ces deux catégories à savoir le meilleur titre de l’année avec ‘Where Are U Know’ en collab avec Justin Bieber et le meilleur album de l’année avec ‘Skrillex and Diplo Present Jack Ü’. Un succès qui vient récompenser une année 2015 absolument incroyable pour eux et leur staff. On tient vraiment à féliciter les deux artistes pour cette performance totalement folle.', 1, 1, 2, '2016-02-16 00:00:00', '/img/pic01.jpg', '2-4'),
(10, 'Jakko & Matthew White & Lonczinski – No One Else', 'Cela faisait un moment qu’on n’avait pas eu un coup de coeur pareil pour une bonne veille track progressive. Le titre qu’on vous fait découvrir est signé du nouveau jeune prodige du style à savoir le brésilien Jakko. La preview démarre d’emblée sur un break et un vocal tout simplement superbe, on a la chair de poule dès les premières secondes jusqu’à l’arrivée du drop. Ce dernier n’est pas en reste puisque c’est tout simplement un missile de puissance mélodique et d’émotion à l’état pur. Même si le style est moins en vogue ces derniers temps on est ravi de découvrir encore ce genre de pépites. Une superbe track.', 1, 2, 2, '2016-02-17 15:54:17', '/img/pic02.jpg', '1-4'),
(11, 'Pep & Rash – Love The One You’re With [Spinnin Records]', 'Si nous devions décrire le mix de la good vibes et de l’originalité, le duo néerlandais Pep & Rash se verrait décorer d’une bonne récompense. Spinnin nous dévoile aujourd’hui ‘Love The One You’re With’, une petite bombe deep / future qui d’après nous, n’aura franchement pas de difficulté à faire parler d’elle.\r\n\r\nProfitons de ce break très sympa et frais pour faire un peu de musicologie. Ce vocal, sonnant 70’s à plein nez, est issu de la reprise disco des Isley Brothers du même nom, reprise elle même de la première version produite par Stephen Stills. Admettons que le mélange de ce vocal et de la guitare, elle aussi disco à souhait, forme un ensemble très très groovy. Puis vint le drop qui, une fois de plus porté par la patte de Pep & Rash, ne déroge pas au style dont ils nous imprègnent habituellement. En bref, une bonne prod originale et agréable à se mettre sous la dent.\r\n\r\nSortie prévue le 7 mars sur Spinnin Records', 1, 3, 2, '2016-02-16 16:59:32', '/img/pic03.jpg', '3-5'),
(12, 'Daddy’s Groove ft. Cimo Frankel – Back To 94 [Spinnin]', 'Voici un titre qui pourrait aisément devenir le tube de l’hiver ! Il est signé des Daddy’s Groove et franchement c’est vraiment bon. Il y avait longtemps que les trois italiens ne nous avaient pas proposé un son aussi qualitatif. Ils nous délivrent une vibe entrainante et une mélodie entetante pour un titre qui aurait toute sa place en radio. Certains reprocheront le côté très commercial du titre, mais on apprécierait volontiers écouter ce genre de musique commerciale plus souvent. On a même l’impression qu’ils se sont fortement inspirés des sonorités pop/rock de Avicii. Très bon titre en tout cas.\r\n\r\nDisponible le 2 mars sur Spinnin', 1, 1, 2, '2016-02-16 16:59:55', '/img/pic01.jpg', '2-4'),
(13, 'Hatzler – SkyT (Victor Ruiz Remix) [Stil Vor Talent]', 'Victor Ruiz est de retour ! Pour ceux qui ne le connaissent pas, nous vous l’avions présenté il y a quelques temps dans notre article sur la scène Techno-Progressive Brésilienne, dont il est l’un des meilleurs ambassadeurs. Il revient aujourd’hui chez l’immense label allemand Stil Vor Talent.\r\n\r\nEt le moins que l’on puisse dire, c’est que son arrivée sur le label est tout simplement MONSTRUEUSE ! Il nous a pondu une track Techno d’une lourdeur absolument extraordinaire, très rythmée et à la mélodie folle. Le magnifique Build-up fait très bien monter la pression, avec ses synthés extraordinaires, pour nous emmener sur un Drop assassin et évolutif, où l’on peut retrouver ces fameux synthés, qui détruira n’importe quel dancefloor du monde entier. On s’éloigne un petit peu de ce son brésilien typique (même si l’on en retrouve quelques codes) pour revenir vers une Techno plus « Européenne », mais alors quelle réussite.\r\n\r\nVictor Ruiz est parti pour envahir l’Europe. Son arrivée sur l’un des meilleurs labels berlinois n’en fait plus aucun doute. Victor Ruiz est la prochaine grande star de la Techno mondiale.\r\n\r\nBem feito, e obrigado Victor', 1, 2, 1, '2016-02-16 17:00:22', '/img/pic02.jpg', '1-2-3-4'),
(14, 'Mark With a K – See Me Now (Da Tweekaz Remix)', 'Jusqu’ici, ils tiennent leur promesse, et leur rythme d’une track par mois. Et pour ce mois de février, c’est un remix d’une track qui a fait la réputation de Mark With a K, puisqu’il s’agit de « See Me Now ». Notre avis concernant ce remix est un peu en demi teinte, le remix est bon, très rythmé, la bassline est accentuée, ce qui donne une touche particulière au morceau. Mais le soucis, c’est que l’on a la désagréable impression de voir un copié/collé sur les tracks de Da Tweekaz. Nous adorons ce duo, mais nous trouvons cela un peu dommage de les voir comme cela. Ils ont clairement du mal à se renouveler, à proposer quelque chose de nouveau et de frais. On espère en tout cas que pour la track du mois de mars, il y aura une prise de risque de leur part, on les y encourage fortement.Disponible le 1er mars.', 1, 3, 2, '2016-02-17 14:42:47', '/img/pic03.jpg', '3-5'),
(15, 'Nicky Romero & Nile Rodgers – Future Funk [Protocol]', 'Nicky Romero est (enfin) de retour ! Et lorsque le hollandais fait parler de lui, surtout lorsqu’il nous propose une track en featuring avec le légendaire guitariste new-yorkais Nile Rodgers, l’enthousiasme à son égard est d’autant plus plaisante.  Dès le début de la preview, le talent de Nile prime. Nous avons le droit à une sacrée ligne de gratte du début à la fin du break et sur un groove absolument terrible. Au même titre que le drop qui arbore une sacrée partie guitare et une bassline apportant elle aussi son grain de groove. Seul bémol, et malheureusement de taille, le vocal aurait mérité meilleur traitement. Selon nous, sur les parties les plus lyriques, le chant ne colle pas à une telle prod. Chose étonnante, à la vue de la qualité des vocaux de Nicky Romero jusqu’à présent. En bref, une bonne prod, à 3000kms de son style progressif habituel, plus adaptée aux radios mais tout de même de qualité.', 1, 1, 2, '2016-02-17 15:58:53', '/img/pic01.jpg', '2-4'),
(17, 'Matisse & Sadko présentent le 1er épisode de leur nouveau podcast', 'Après avoir annoncé qu’ils lançaient leur propre label intitulé MonoMark Music, les Matisse & Sadko ont officiellement dévoilé leur nouveau prodcast intitulé MonoMark Radio.  Et on peut dire que pour ce premier numéro, ils n’ont pas déconné : exceptionnel 1er podcast ! On y découvre plusieurs ID du duo russe et notamment leur très attendu ID w/ Heroes qui se fait attendre depuis de nombreux mois. On est simplement amoureux de ce titre. On y découvre également l’un de leurs prochains titres, à savoir ‘Kimono’, dans un style Bass/Future House.', 1, 2, 2, '2016-02-17 16:00:25', '/img/pic02.jpg', '1-2'),
(18, 'CamelPhat – Trip [Toolroom]', 'Après une année 2015 remarquable avec de nombreux excellents titres, les CamelPhat sont décidément innarêtables. Axtone, Ultra, Spinnin ou encore Jeudi Records, les british ont déjà une grande expérience derrière eux et font cette fois-ci une apparition sur Toolroom le temps d’une release. Et quelle release ! C’est une nouvelle bombe qui est en vue pour le duo anglais puisque cette track intitulée ‘Trip’ est un pur missile de Tech House groovy. On a été bluffé par la puissance et par la qualité de ce titre Cette production de Mike Di Scala et Dave Whelan possède une rythmique si soutenue qu’on est prêt à danser des heures dessus. Gros boulot des CamelPhat !', 1, 3, 1, '2016-02-18 16:22:57', '/img/pic03.jpg', '1');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `roleId` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

CREATE TABLE `tag` (
  `tag_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` int(11) NOT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `tag`
--

INSERT INTO `tag` (`tag_id`, `name`, `state`, `slug`) VALUES
(1, 'Top', 1, 'top'),
(2, 'Flop', 1, 'flop'),
(3, 'Hot', 1, 'hot'),
(4, 'WTF', 1, 'wtf'),
(5, 'Choc', 1, 'choc');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `displayName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

CREATE TABLE `user_role_linker` (
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
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `UNIQ_64C19C1989D9B62` (`slug`),
  ADD UNIQUE KEY `UNIQ_64C19C15E237E06` (`name`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `UNIQ_5A8A6C8D2B36786B` (`title`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_57698A6AB8C2FD88` (`roleId`),
  ADD KEY `IDX_57698A6A727ACA70` (`parent_id`);

--
-- Index pour la table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`tag_id`),
  ADD UNIQUE KEY `UNIQ_389B783989D9B62` (`slug`),
  ADD UNIQUE KEY `UNIQ_389B7835E237E06` (`name`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1483A5E9E7927C74` (`email`),
  ADD UNIQUE KEY `UNIQ_1483A5E9F85E0677` (`username`);

--
-- Index pour la table `user_role_linker`
--
ALTER TABLE `user_role_linker`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `IDX_61117899A76ED395` (`user_id`),
  ADD KEY `IDX_61117899D60322AC` (`role_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `tag`
--
ALTER TABLE `tag`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
