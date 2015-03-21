-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 21 Mars 2015 à 22:53
-- Version du serveur: 5.5.41-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `melio`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `chatmessage`
--

INSERT INTO `chatmessage` (`id`, `sender`, `dest`, `message`) VALUES
(1, 1, 2, 'Salut'),
(2, 2, 1, 'Salut'),
(3, 1, 2, 'Ca va ?'),
(4, 1, 2, 'kdmq'),
(5, 1, 2, 'Bonjour');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `notif`
--

INSERT INTO `notif` (`id`, `dest`, `reply_id`, `request_id`) VALUES
(1, 1, 0, 1),
(2, 2, 0, 1),
(3, 2, 0, 4),
(4, 3, 0, 4);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

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
  `connect` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `fonction`, `pays`, `etablissement`, `ville`, `adresse`, `photo`, `connect`) VALUES
(1, 'HURTER', 'Jonathan', 'Dev', 'France', 'ENSIIE', 'Illkirch', '9 rue des bananes', 'profiles/1.jpeg', 0),
(2, 'KOBERSI', 'Pauline', 'Dev', 'France', 'ENSIIE', 'Illkirch', '9 rue des bananes', 'profiles/2.jpeg', 0),
(3, 'MARTIN', 'Anthony', 'Dev', 'France', 'CNAM', 'Strasbourg', '10 rue des patates', 'profiles/3.jpeg', 0);

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