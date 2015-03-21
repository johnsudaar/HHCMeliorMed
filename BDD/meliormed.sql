-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 21 Mars 2015 à 21:11
-- Version du serveur: 5.5.41-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `meliormed`
--

-- --------------------------------------------------------

--
-- Structure de la table `chatmessage`
--

CREATE TABLE IF NOT EXISTS `chatmessage` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sender` int(10) NOT NULL,
  `dest` int(10) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=259 ;

--
-- Contenu de la table `chatmessage`
--

INSERT INTO `chatmessage` (`id`, `sender`, `dest`, `message`) VALUES
(162, 3, 2, 'hnjekd'),
(163, 3, 2, 'hjdk;'),
(164, 3, 2, 't con'),
(165, 3, 2, 'je t''ai jamais aimée'),
(166, 3, 2, 'tu es moche'),
(167, 3, 2, 'on dirait un mec'),
(168, 3, 2, 'tu pues'),
(169, 2, 3, 'Je sais'),
(170, 2, 3, 'Moi non plus je ne me suis jamais aimé'),
(171, 2, 3, 'Am plusse jeuh noeud cait pah aicrire'),
(172, 3, 2, 'rfef'),
(173, 3, 2, 'ahuh'),
(174, 3, 2, 'ahuh'),
(175, 3, 2, 'ahuh'),
(176, 3, 2, 'ahuh'),
(177, 3, 2, 'ahuh'),
(178, 3, 2, 'szkjk'),
(179, 3, 2, 'efhemùe'),
(180, 3, 2, 'feikfl$ef'),
(181, 3, 2, 'h''fjoeùfjefk$'),
(182, 3, 2, 'hjkmù'),
(183, 3, 2, 'hjk'),
(184, 2, 3, 'A = LU'),
(185, 2, 3, 'Trouver la décomposition de sholesky'),
(186, 3, 2, 'koberski'),
(187, 2, 3, 'OH TOI JE VAIS TE DEFONCER'),
(188, 3, 2, 'eh'),
(189, 3, 2, 'c''était comment alors ?'),
(190, 2, 3, 'Tellement bien t''as pas idée ;)'),
(191, 3, 2, 'et le truc ?'),
(192, 2, 3, 'De ?'),
(193, 2, 3, 'Nan mais tu sais pauline on a un truc que tu n''auras jamais ...'),
(194, 2, 3, 'gfgf'),
(195, 2, 3, 'qsd'),
(196, 2, 3, 's'),
(197, 2, 3, 's'),
(198, 2, 3, 's'),
(199, 2, 3, 's'),
(200, 2, 3, 'sf'),
(201, 2, 3, 'e'),
(202, 2, 3, 'r'),
(203, 2, 3, 'fjs'),
(204, 2, 3, 'zjr'),
(205, 2, 3, 'qsdfjklazer'),
(206, 2, 3, 'zefjkle'),
(207, 2, 3, 'ezrjiozer'),
(208, 2, 3, 'zrzer'),
(209, 2, 3, 'eraz'),
(210, 2, 3, 'azeohaze'),
(211, 2, 3, 'azeiaze'),
(212, 2, 3, 'azeaz'),
(213, 2, 3, 'azeejpotgujoẑe'),
(214, 2, 3, 'jpozfjio'),
(215, 2, 3, 'zepfji'),
(216, 2, 3, 'kpfj'),
(217, 2, 3, 'kazefz'),
(218, 2, 3, 'z'),
(219, 2, 3, 'z'),
(220, 2, 3, 'kfpo'),
(221, 2, 3, 'jspfoj'),
(222, 2, 3, 'jfzposj'),
(223, 2, 3, 'az'),
(224, 2, 3, 'az'),
(225, 2, 3, 'az'),
(226, 3, 2, 'lol'),
(227, 2, 3, 'data'),
(228, 2, 3, 'd'),
(229, 3, 2, 'll'),
(230, 2, 3, 'qdml'),
(231, 3, 2, 'hgh'),
(232, 3, 2, 'ghghghg'),
(233, 3, 2, 'g'),
(234, 3, 2, 'ggdg'),
(235, 3, 2, 'dg'),
(236, 3, 2, 'dg'),
(237, 3, 2, 'd'),
(238, 3, 2, 'gd'),
(239, 3, 2, 'fdg'),
(240, 3, 2, 'fd'),
(241, 3, 2, 'g'),
(242, 3, 2, 'dfg'),
(243, 3, 2, 'dfgfd'),
(244, 3, 2, 'h'),
(245, 3, 2, 'h'),
(246, 3, 2, 'g'),
(247, 3, 2, 'jh'),
(248, 3, 2, 'g'),
(249, 3, 2, 'jh'),
(250, 3, 2, 'k'),
(251, 3, 2, 'jh'),
(252, 3, 2, 'kl'),
(253, 3, 2, 'jl'),
(254, 3, 2, 'kj'),
(255, 3, 2, 'l'),
(256, 3, 2, 'hlghjgh'),
(257, 3, 2, 'pd'),
(258, 3, 2, 't con');

-- --------------------------------------------------------

--
-- Structure de la table `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `id` int(10) unsigned NOT NULL DEFAULT '0',
  `url` text NOT NULL,
  `type` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `fileReply`
--

CREATE TABLE IF NOT EXISTS `fileReply` (
  `idFile` int(11) NOT NULL,
  `idReply` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `fileRequest`
--

CREATE TABLE IF NOT EXISTS `fileRequest` (
  `idFile` int(11) NOT NULL,
  `idRequest` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `notif`
--

CREATE TABLE IF NOT EXISTS `notif` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dest` int(10) NOT NULL,
  `reply_id` int(10) NOT NULL,
  `request_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `notif`
--

INSERT INTO `notif` (`id`, `dest`, `reply_id`, `request_id`) VALUES
(1, 1, 0, 1),
(2, 2, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `reply`
--

CREATE TABLE IF NOT EXISTS `reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `request` int(11) NOT NULL,
  `resolu` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `reply`
--

INSERT INTO `reply` (`id`, `message`, `request`, `resolu`, `idUser`) VALUES
(1, 'Ok thx', 1, 0, 2),
(2, '2riz1', 1, 1, 3),
(3, 'Lol g pa lu', 2, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `request`
--

CREATE TABLE IF NOT EXISTS `request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `titre` text NOT NULL,
  `message` text NOT NULL,
  `type` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `request`
--

INSERT INTO `request` (`id`, `idUser`, `titre`, `message`, `type`) VALUES
(1, 1, 'Test', 'Je suis la pour le test', 'pub'),
(2, 2, 'Test2', 'Je suis aussi la pour le test', 'ann'),
(3, 3, 'Test3', 'Ah toi aussi ? Moi aussi !', 'requ');

-- --------------------------------------------------------

--
-- Structure de la table `requestTag`
--

CREATE TABLE IF NOT EXISTS `requestTag` (
  `idRequest` int(11) NOT NULL,
  `idTag` int(11) NOT NULL,
  PRIMARY KEY (`idRequest`,`idTag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `libelle` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `tag`
--

INSERT INTO `tag` (`id`, `libelle`) VALUES
(1, 'Clandestin'),
(2, 'Cardiologie'),
(3, 'Métrologie'),
(4, 'Soleillogie'),
(5, 'Boudoulogie'),
(6, 'Mongolie');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `fonction` text NOT NULL,
  `pays` text NOT NULL,
  `etablissement` text NOT NULL,
  `ville` text NOT NULL,
  `adresse` text NOT NULL,
  `photo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `fonction`, `pays`, `etablissement`, `ville`, `adresse`, `photo`) VALUES
(1, 'HURTER', 'Jonathan', 'Dev', 'France', 'ENSIIE', 'Illkirch', '9 rue des bananes', 'profiles/1.jpeg'),
(2, 'KOBERSI', 'Pauline', 'Dev', 'France', 'ENSIIE', 'Illkirch', '9 rue des bananes', 'profiles/2.jpeg'),
(3, 'MARTIN', 'Anthony', 'Cadre', 'France', 'France', 'France', 'France', 'France');

-- --------------------------------------------------------

--
-- Structure de la table `userTag`
--

CREATE TABLE IF NOT EXISTS `userTag` (
  `idUser` int(11) NOT NULL,
  `idTag` int(11) NOT NULL,
  PRIMARY KEY (`idUser`,`idTag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `userTag`
--

INSERT INTO `userTag` (`idUser`, `idTag`) VALUES
(1, 1),
(1, 2),
(2, 3),
(2, 4),
(3, 4),
(3, 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;