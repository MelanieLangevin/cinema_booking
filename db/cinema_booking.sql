-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1:3306
-- Généré le :  Mar 10 Novembre 2015 à 04:42
-- Version du serveur :  5.5.44
-- Version de PHP :  5.4.43

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cinema_booking`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `description`) VALUES
(1, 'dramatique', 'traite de situations généralement non-épiques dans un contexte sérieux.'),
(2, 'science-fiction', 'situations et des événements appartenant à un avenir plus ou moins proche et à un univers imaginé en exploitant ou en extrapolant les données contemporaines et les développements envisageables des sciences et des techniques'),
(3, 'catastrophe', 'genre cinématographique à suspense, dont l''intrigue met en scène une catastrophe naturelle ou technologique et les conséquences qui en découlent. '),
(4, 'action', 'succession de scènes spectaculaires construites autour d''un conflit résolu de manière violente, généralement par la mort des ennemis du héros'),
(5, 'romantique', 'une histoire d''amour ou d''aventure amoureuse, mettant en avant la passion, les émotions et l''engagement affectif des personnages principaux'),
(6, 'horreur', 'l''objectif est de créer un sentiment de peur, de répulsion ou d''angoisse chez le spectateur.'),
(7, 'suspence', 'utilise le suspense ou la tension pour provoquer le spectateur une excitation ou une appréhension et le tenir en haleine jusqu''au dénouement de l''intrigue'),
(8, 'comédie', 'a pour objectif de faire rire le spectateur');

-- --------------------------------------------------------

--
-- Structure de la table `cinemas`
--

CREATE TABLE `cinemas` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `society` varchar(50) NOT NULL,
  `adress` varchar(100) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cinemas`
--

INSERT INTO `cinemas` (`id`, `name`, `society`, `adress`, `phone`, `user_id`) VALUES
(1, 'Pont-Viau 16', 'Guzzo', '1055 Boul. Laurentides Laval Qc H7G 2W2', '450 967-4455', 7),
(2, 'Terrebone 14', 'Guzzo', '1071 Chemin du Côteau Terrebonne Qc J6W 5Y8', '450 471-6644', 7),
(3, 'Colossus Laval', 'Cineplex', '2800 Cosmodome Street, Centropolis, laval Qc, H7T 2X1', '450 978 0212', 6),
(4, 'Odeon Quartier Latin', 'Cineplex', '350 Rue Émery, Montréal, QC H2X 1J1', '514 849-2244', 6);

-- --------------------------------------------------------

--
-- Structure de la table `cinemas_showings`
--

CREATE TABLE `cinemas_showings` (
  `id` int(11) NOT NULL,
  `cinema_id` int(11) NOT NULL,
  `showing_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `cinemas_showings`
--

INSERT INTO `cinemas_showings` (`id`, `cinema_id`, `showing_id`) VALUES
(2, 2, 1),
(3, 2, 1),
(6, 3, 3),
(7, 1, 1),
(8, 1, 2),
(9, 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `titre` varchar(30) NOT NULL,
  `annee` int(11) NOT NULL,
  `studio` varchar(75) NOT NULL,
  `resume` varchar(150) NOT NULL,
  `poster` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `rating_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `movies`
--

INSERT INTO `movies` (`id`, `titre`, `annee`, `studio`, `resume`, `poster`, `category_id`, `rating_id`) VALUES
(1, 'V for Vendetta', 2006, '', 'Film americano-germano-britannique. Adaptation du comic qui porte le même nom', 'uploads/18479867.jpg', 2, 4),
(2, 'Shutter Island', 2010, '', 'Thriller psychologico-dramatique américain. adaptation du roman portant le même nom', 'uploads/telechargement.jpg', 7, 3),
(3, 'Time Out', 2011, '', 'Film science-fiction américain. Monde où le temps remplace l''argent', '', 2, 2),
(4, 'Le Parrain', 1972, '', 'film américain, Adaptation du livre au même nom. L''histoire se centre sur l''ascension de Michael Corleone (Al Pacino)', 'uploads/Godfather_all_logo_01_lg.jpg', 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `Acronyme` varchar(3) NOT NULL,
  `Description` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ratings`
--

INSERT INTO `ratings` (`id`, `name`, `Acronyme`, `Description`) VALUES
(1, 'Audience générale', 'G', 'Aucune limite d''âge'),
(2, 'Direction parentale', 'PG', 'Supervision parentale suggérée'),
(3, '14 accompagnement', '13+', 'Prudence des parents fortement conseillée'),
(4, '18 accompagnement', 'R', 'Suggère que l''accès soit limité aux personnes âgées de 17 ans et plus ou accompagnées d''un adulte'),
(5, 'Mature', '18+', 'Réservé aux personnes de 18 ans et plus');

-- --------------------------------------------------------

--
-- Structure de la table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `time` time NOT NULL,
  `holiday` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `schedules`
--

INSERT INTO `schedules` (`id`, `time`, `holiday`) VALUES
(1, '19:20:00', 0),
(2, '13:00:00', 1),
(3, '15:00:00', 1),
(4, '21:30:00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `schedules_showings`
--

CREATE TABLE `schedules_showings` (
  `id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `showing_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `schedules_showings`
--

INSERT INTO `schedules_showings` (`id`, `schedule_id`, `showing_id`) VALUES
(2, 1, 2),
(3, 2, 3),
(4, 3, 2),
(6, 1, 5),
(7, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `showings`
--

CREATE TABLE `showings` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `showings`
--

INSERT INTO `showings` (`id`, `date`, `prix`, `movie_id`) VALUES
(1, '2015-11-06', '7', 2),
(2, '2015-11-05', '8', 1),
(3, '2015-09-29', '2', 3),
(5, '2015-11-07', '5', 1);

-- --------------------------------------------------------

--
-- Structure de la table `studios`
--

CREATE TABLE `studios` (
  `id` int(11) NOT NULL,
  `name` varchar(75) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `studios`
--

INSERT INTO `studios` (`id`, `name`) VALUES
(1, 'Warner Bros Studios'),
(2, '20th Century Fox Studios'),
(3, 'Walt Disney Studios'),
(4, 'Universal Studios'),
(5, 'Sony Pictures Studios'),
(6, 'Marvel Studios'),
(7, 'Dreamworks Studios'),
(8, 'MGM Studios'),
(9, 'New Line Cinema'),
(10, 'Paramount Studios'),
(11, 'Columbia Pictures'),
(12, 'Pixar'),
(13, 'Legendary Pictures'),
(14, 'Lions Gate Entertainment'),
(15, 'The Weinstein Company');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `isConfirmed` tinyint(4) NOT NULL,
  `role` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `isConfirmed`, `role`, `created`, `modified`) VALUES
(1, 'admin', '$2a$10$xttqw3uy3m87Wpm8Hcw5JOYd438lwx0A2gH89lHSRrln5uo1mDGae', '', 1, 'admin', '2015-08-27 21:41:16', '2015-08-27 21:41:16'),
(6, 'percy', '61f7cf7b994187e769cd59b43f7fb6ba616a26a5', 'percy@percy.ca', 0, 'gerant', '2015-09-24 21:14:24', '2015-09-25 20:15:30'),
(7, 'Arthur', '61f7cf7b994187e769cd59b43f7fb6ba616a26a5', 'arthur@arthur.tr', 0, 'admin', '2015-09-25 20:14:56', '2015-09-25 20:14:56');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cinemas`
--
ALTER TABLE `cinemas`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cinemas_showings`
--
ALTER TABLE `cinemas_showings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `schedules_showings`
--
ALTER TABLE `schedules_showings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `showings`
--
ALTER TABLE `showings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `studios`
--
ALTER TABLE `studios`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `cinemas`
--
ALTER TABLE `cinemas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `cinemas_showings`
--
ALTER TABLE `cinemas_showings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `schedules_showings`
--
ALTER TABLE `schedules_showings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `showings`
--
ALTER TABLE `showings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `studios`
--
ALTER TABLE `studios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
