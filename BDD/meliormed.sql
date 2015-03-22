-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 22 Mars 2015 à 12:37
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `notif`
--

INSERT INTO `notif` (`id`, `dest`, `reply_id`, `request_id`) VALUES
(5, 5, 0, 1),
(6, 6, 0, 1),
(7, 7, 0, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `request`
--

INSERT INTO `request` (`id`, `idUser`, `titre`, `message`, `type`) VALUES
(4, 7, 'Strange invasive tumor ', 'Liv, 45 years old, has a very invasise pancreas tumor. A surgical operation could be very complicated. Have you already done it ?', 'req'),
(6, 8, 'Troubles neuros', 'Josiane, 80ans, présente des troubles neurologiques qui n''ont pas d''explication biologique. Je vous envoie tous les examens réalisés. \r\nMerci de votre aide', 'req'),
(7, 6, 'Malformation cardiaque', 'Carl, 24 ans, malade depuis son enfance présente une malformation cardiaque rare. L''intervention comporte des risques importants.\r\nQu''en pensez-vous ?', 'req'),
(8, 8, 'Tumeur cutanée', 'Joseph, 60 ans, récidive d''une tumeur cutanée. La seule solution pour nous, c''est l''amputation.\r\nAvez-vous une autre solution ?', 'req');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `tag`
--

INSERT INTO `tag` (`id`, `libelle`) VALUES
(7, 'Neurosurgery'),
(8, 'Pediatrics'),
(9, 'Obstetrics');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `fonction`, `pays`, `etablissement`, `ville`, `adresse`, `photo`, `connect`) VALUES
(4, 'HOUSE', 'Michael', 'Dr', 'USA', '', '', '', 'profiles/1.png', 0),
(5, 'TCHAN', 'Peggy', 'Dr', 'China', '', '', '', 'profiles/2.png', 0),
(6, 'AL-CHOUIRI', 'Ahmad', 'Dr', 'UAE', '', '', '', 'profiles/3.png', 1),
(7, 'GUSTAVESSON', 'Per', 'Dr', 'Sweden', '', '', '', 'profiles/4.png', 1),
(8, 'JOHNSON', 'Bruce', 'Dr', 'USA', '', '', '', 'profiles/5.png', 1);

-- --------------------------------------------------------

--
-- Structure de la table `userTag`
--

CREATE TABLE IF NOT EXISTS `userTag` (
  `idUser` int(11) NOT NULL,
  `idTag` int(11) NOT NULL,
  PRIMARY KEY (`idUser`,`idTag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;