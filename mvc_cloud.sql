-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 22 Mars 2015 à 21:02
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `mvc_cloud`
--
CREATE DATABASE IF NOT EXISTS `mvc_cloud` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `mvc_cloud`;

-- --------------------------------------------------------

--
-- Structure de la table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `name` text NOT NULL,
  `partage` int(11) NOT NULL,
  `file` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Contenu de la table `files`
--

INSERT INTO `files` (`id`, `id_user`, `name`, `partage`, `file`) VALUES
(16, 10, 'text', 0, '550df8d2e5a4f.txt'),
(17, 10, 'rar files', 0, '550df8ef50ba7.rar'),
(24, 10, 'tulipes', 0, '550ed8cd5c9bc.jpg'),
(25, 10, '&lt;h1&gt;loool&lt;/h1&gt;', 0, '550eda425f21b.jpg'),
(26, 10, 'lol', 0, '550edd76aa8d2.jpg'),
(28, 10, 'lol', 0, '550f0e583413e.jpg'),
(29, 12, 'beach', 0, '550f11be9281d.JPG'),
(30, 12, 'lol', 0, '550f12968374c.jpg'),
(31, 12, 'lool', 0, '550f1f090125c.txt'),
(32, 12, 'loooooooool mmm', 0, '550f1f19eeeef.txt');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_03_17_115824_CreateUser', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  `remember_token` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `lastname`, `name`, `email`, `birthdate`, `password`, `updated_at`, `created_at`, `remember_token`) VALUES
(10, 'mike77270', 'maicmelan', 'anton_m', 'mike77270@hotmail.fr', '1995-02-02', '$2y$10$AXLlLXA4H2FimSdBG45dseyYpQdn64Pt3YJRGcRNCE6KtXSMBZsry', '2015-03-22', '2015-03-18', 0),
(11, 'anton_m', 'maicmelan', 'anton', 'mike45@hotmail.fr', '1995-07-24', '$2y$10$YR.SjtoCTfGZvALC3rs.9e5TY9Cju/NADUveGuh1/C0b7uz9tlOjC', '2015-03-21', '2015-03-21', 0),
(12, 'maicmelan', 'mike', 'lool', 'mike44@hotmail.fr', '1995-08-08', '$2y$10$zWIvykRJ/MtRsEaAwkTXwu133aEmT5.SsSZHiYZkMJmNxTzCAq3qi', '2015-03-22', '2015-03-22', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
