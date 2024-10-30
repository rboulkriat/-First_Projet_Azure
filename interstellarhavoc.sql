-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 27 jan. 2024 à 14:54
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `interstellarhavoc`
--

-- --------------------------------------------------------

--
-- Structure de la table `amis`
--

CREATE TABLE `amis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idJoueur1` int(11) NOT NULL,
  `idJoueur2` int(11) NOT NULL,
  `statutAmi` enum('Rejete','Accepte','Attente','') NOT NULL DEFAULT 'Attente',
  `dateAmi` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `amis`
--

INSERT INTO `amis` (`id`, `idJoueur1`, `idJoueur2`, `statutAmi`, `dateAmi`) VALUES
(14, 18, 33, 'Accepte', '2024-01-27 12:54:26'),
(15, 18, 22, 'Accepte', '2024-01-27 13:02:15');

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

CREATE TABLE `connexion` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `login` varchar(255) NOT NULL,
  `motDePasse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `connexion`
--

INSERT INTO `connexion` (`id`, `login`, `motDePasse`) VALUES
(1, 'LORD DOMINIK', '$2y$10$vkg0CDtxWxVAK7Ubu7OwUOtRK82sP31BTdQ2rhRV5F3rH7HfjwACC'),
(3, 'MEHDI ', '$2y$10$jtGuICZi5d6EnwLGcQKoj.Qu5gpk00x0aVrgVGWz48MC9VUA3uh5a'),
(4, 'Dominique La femme du Lord ', '$2y$10$ZWkb89wUo8pYUt.YjOTjuuKfB3Cit47CaDsa8ANDXfef04NbpOj3a');

-- --------------------------------------------------------

--
-- Structure de la table `ennemi`
--

CREATE TABLE `ennemi` (
  `id_ennemi` int(11) NOT NULL,
  `nom_ennemi` varchar(50) NOT NULL,
  `vie` int(11) DEFAULT NULL,
  `degat` int(11) NOT NULL,
  `portee` int(11) NOT NULL,
  `contourner_mur` tinyint(1) NOT NULL,
  `recompense` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ennemi`
--

INSERT INTO `ennemi` (`id_ennemi`, `nom_ennemi`, `vie`, `degat`, `portee`, `contourner_mur`, `recompense`) VALUES
(0, 'Scavenger', 100, 10, 40, 1, 100),
(1, 'Behemoth', 150, 20, 50, 0, 200),
(2, 'Balliste', 60, 5, 30, 1, 50);

-- --------------------------------------------------------

--
-- Structure de la table `ennemi_partie`
--

CREATE TABLE `ennemi_partie` (
  `id_ennemi_partie` int(11) NOT NULL,
  `id_ennemi` int(11) NOT NULL,
  `idPartie` int(11) NOT NULL,
  `Vie_partie` int(11) NOT NULL,
  `position_X` double NOT NULL,
  `position_Y` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ennemi_partie`
--

INSERT INTO `ennemi_partie` (`id_ennemi_partie`, `id_ennemi`, `idPartie`, `Vie_partie`, `position_X`, `position_Y`) VALUES
(9, 1, 1, 50, 100, 200),
(10, 2, 1, 30, 150, 180),
(11, 2, 2, 0, 150, 180),
(12, 0, 2, 0, 150, 180),
(13, 2, 2, 0, 150, 180),
(14, 2, 2, 10, 150, 180),
(15, 1, 3, 0, 150, 180),
(16, 0, 3, 20, 80, 220),
(17, 1, 4, 40, 120, 80),
(18, 2, 4, 50, 80, 120),
(19, 0, 5, 40, 80, 120),
(20, 1, 4, 0, 80, 140),
(21, 1, 5, 0, 49, 78),
(22, 1, 4, 0, 49, 78),
(23, 2, 5, 0, 49, 78),
(25, 0, 4, 0, 49, 78),
(26, 0, 5, 0, 49, 78),
(27, 1, 4, 0, 49, 78),
(28, 0, 5, 0, 49, 78),
(29, 0, 5, 0, 49, 78),
(30, 0, 4, 0, 49, 78),
(31, 0, 4, 0, 49, 78),
(32, 2, 6, 0, 49, 78),
(33, 1, 8, 0, 49, 78),
(34, 1, 8, 0, 49, 78),
(35, 0, 8, 100, 49, 78),
(36, 1, 10, 0, 49, 78),
(37, 0, 10, 0, 49, 78),
(38, 1, 11, 0, 49, 78);

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

CREATE TABLE `joueur` (
  `id_joueur` int(11) NOT NULL,
  `Nom_joueur` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `mot_de_passe` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `abonnement` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `joueur`
--

INSERT INTO `joueur` (`id_joueur`, `Nom_joueur`, `logo`, `mot_de_passe`, `email`, `abonnement`) VALUES
(13, 'Yoann_91', NULL, '$2y$10$DEjzLijaZSYQiWt0KpzEC.g.2NjpPirtJA0msBu4jUmBr.J480rVa', NULL, 0),
(18, 'test', 'modules/mod_parametre/logos/Capture d\'écran 2023-0', '$2y$10$Qmttxg6prHYxamLIgPyQJeVsOv.qT3n88Zk1cqGuGBeqotPKRx6H6', 'test@test.com', 1),
(22, 'rabab', NULL, '$2y$10$Jajn6HDZOZWvS5EzVB8vgu7KunsOVChBbG/E435Y8.7AXof/lxT6u', 'rabab@rabab.com', 1),
(28, 'toto', NULL, '$2y$10$zAbvWW3sFN.CdLNRTzx2Ieg.29avzYsI.0xRn7xx3y6wqmbYUYr62', 'toto@toto.com', 0),
(33, 'tata', NULL, '$2y$10$5N8A39.6mH5oJ0XlG1bPWuwoR2AStbGcaolNW6hVJB92cMoBL/LJW', 'tata@tata.com', 0);

-- --------------------------------------------------------

--
-- Structure de la table `messages_joueurs`
--

CREATE TABLE `messages_joueurs` (
  `email` varchar(50) NOT NULL,
  `message` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `messages_joueurs`
--

INSERT INTO `messages_joueurs` (`email`, `message`) VALUES
('test@test.com', 'll'),
('test@test.com', 'test88'),
('test@test.com', 'rabbaab'),
('test@test.com', 'tetsststst'),
('test@test.com', 'dhh'),
('Rababboulkriat@outlook.fr', 'hhdcn'),
('Rababboulkriat@outlook.fr', 'dbsdbb');

-- --------------------------------------------------------

--
-- Structure de la table `partie`
--

CREATE TABLE `partie` (
  `idPartie` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `score` int(11) DEFAULT NULL,
  `temps` time NOT NULL,
  `id_joueur` int(11) NOT NULL,
  `id_terrain` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `partie`
--

INSERT INTO `partie` (`idPartie`, `date`, `heure`, `score`, `temps`, `id_joueur`, `id_terrain`) VALUES
(1, '2023-12-23', '15:00:00', 100, '01:30:00', 18, 1),
(2, '2023-12-24', '16:00:00', 50, '01:30:00', 18, 1),
(3, '2023-12-24', '15:00:00', 120, '01:30:00', 18, 1),
(4, '2024-01-01', '13:13:05', 77, '00:13:05', 13, 1),
(5, '2023-11-11', '18:13:15', 59, '00:43:05', 13, 1),
(6, '2024-01-01', '13:13:05', 77, '00:13:05', 22, 1),
(8, '2024-01-01', '13:13:05', 57, '00:13:05', 22, 1),
(9, '2024-01-01', '13:13:05', 89, '00:13:05', 22, 1),
(10, '2024-01-01', '13:13:05', 89, '00:13:05', 28, 1),
(11, '2024-01-01', '13:13:05', 75, '00:13:05', 28, 1);

-- --------------------------------------------------------

--
-- Structure de la table `regles`
--

CREATE TABLE `regles` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(512) NOT NULL,
  `categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `regles`
--

INSERT INTO `regles` (`ID`, `description`, `categorie`) VALUES
(1, '\"Les ennemis ne peuvent se déplacer que sur le chemin qui leur a été tracé.\"', 1),
(2, '\"Les Tours peuvent être placées uniquement sur une étoile.\"', 1),
(3, '\"La Boutique ne fait pas de crédit, mais les objets qui s\'y trouvent rapportent plus d\'argent s\'ils sont utilisés avec parcimonie.\"', 2),
(4, '\"Les objets vendus en boutique ne sont utilisables que sur le chemin tracé.\"', 2),
(5, '\"La partie est terminée uniquement lorsque la base est annihilée.\"', 3),
(6, '\"La base se fait détruire par les ennemis trop proches. À compter du cinquième ennemi, la partie se termine.\"', 3);

-- --------------------------------------------------------

--
-- Structure de la table `terrain`
--

CREATE TABLE `terrain` (
  `id_terrain` int(11) NOT NULL,
  `dimension` int(11) NOT NULL,
  `niveau` int(11) NOT NULL,
  `nombre_Tours_Disponibles` int(11) NOT NULL,
  `position_Initiale_X` double NOT NULL,
  `position_Initiale_Y` double NOT NULL,
  `position_Arrivee_X` double NOT NULL,
  `position_Arrivee_Y` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `terrain`
--

INSERT INTO `terrain` (`id_terrain`, `dimension`, `niveau`, `nombre_Tours_Disponibles`, `position_Initiale_X`, `position_Initiale_Y`, `position_Arrivee_X`, `position_Arrivee_Y`) VALUES
(1, 16, 1, 9, 0, 1, 12, 60);

-- --------------------------------------------------------

--
-- Structure de la table `tour`
--

CREATE TABLE `tour` (
  `id_tour` int(11) NOT NULL,
  `nom_tour` varchar(50) NOT NULL,
  `vie` int(11) DEFAULT NULL,
  `degat` int(11) NOT NULL,
  `portee` int(11) NOT NULL,
  `taux_de_tir` int(11) DEFAULT NULL,
  `temps_de_recharge` int(11) DEFAULT NULL,
  `prix` int(11) NOT NULL,
  `niveau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tour`
--

INSERT INTO `tour` (`id_tour`, `nom_tour`, `vie`, `degat`, `portee`, `taux_de_tir`, `temps_de_recharge`, `prix`, `niveau`) VALUES
(1, 'EdisonCoil_N1', 250, 18, 100, 6, 6, 250, 1),
(2, 'NikolaCoil_N1', 150, 8, 80, 2, 2, 150, 1),
(3, 'OppenheimerCoil_N1', 350, 38, 150, 10, 10, 350, 1),
(4, 'EdisonCoil_N2', 250, 21, 110, 4, 6, 350, 2),
(5, 'NikolaCoil_N2', 150, 11, 90, 0, 2, 250, 2),
(6, 'OppenheimerCoil_N2', 350, 41, 160, 8, 10, 450, 2),
(7, 'EdisonCoil_N3', 250, 18, 100, 3, 6, 450, 3),
(8, 'NikolaCoil_N3', 150, 8, 80, 1, 2, 350, 3),
(9, 'OppenheimerCoil_N3', 350, 44, 165, 7, 10, 550, 3);

-- --------------------------------------------------------

--
-- Structure de la table `tour_partie`
--

CREATE TABLE `tour_partie` (
  `id_tour` int(11) NOT NULL,
  `idPartie` int(11) NOT NULL,
  `Vie_partie` int(11) NOT NULL,
  `position_X` double NOT NULL,
  `position_Y` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tour_partie`
--

INSERT INTO `tour_partie` (`id_tour`, `idPartie`, `Vie_partie`, `position_X`, `position_Y`) VALUES
(1, 1, 100, 150, 200),
(1, 6, 40, 49, 120),
(2, 1, 80, 200, 180),
(3, 2, 250, 80, 220),
(6, 8, 78, 49, 120),
(7, 8, 40, 49, 120);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `amis`
--
ALTER TABLE `amis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `idJoueur1` (`idJoueur1`,`idJoueur2`) USING BTREE,
  ADD KEY `fk_amis_idJoueur2` (`idJoueur2`);

--
-- Index pour la table `connexion`
--
ALTER TABLE `connexion`
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `ennemi`
--
ALTER TABLE `ennemi`
  ADD PRIMARY KEY (`id_ennemi`);

--
-- Index pour la table `ennemi_partie`
--
ALTER TABLE `ennemi_partie`
  ADD PRIMARY KEY (`id_ennemi_partie`),
  ADD KEY `ennemi_partie_ennemi_FK` (`id_ennemi`),
  ADD KEY `ennemi_partie_Partie0_FK` (`idPartie`);

--
-- Index pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD PRIMARY KEY (`id_joueur`);

--
-- Index pour la table `partie`
--
ALTER TABLE `partie`
  ADD PRIMARY KEY (`idPartie`),
  ADD KEY `Partie_Joueur_FK` (`id_joueur`),
  ADD KEY `Partie_terrain0_FK` (`id_terrain`);

--
-- Index pour la table `regles`
--
ALTER TABLE `regles`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Index pour la table `terrain`
--
ALTER TABLE `terrain`
  ADD PRIMARY KEY (`id_terrain`);

--
-- Index pour la table `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`id_tour`);

--
-- Index pour la table `tour_partie`
--
ALTER TABLE `tour_partie`
  ADD PRIMARY KEY (`id_tour`,`idPartie`),
  ADD KEY `tour_partie_Partie0_FK` (`idPartie`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `amis`
--
ALTER TABLE `amis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `connexion`
--
ALTER TABLE `connexion`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `ennemi_partie`
--
ALTER TABLE `ennemi_partie`
  MODIFY `id_ennemi_partie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `joueur`
--
ALTER TABLE `joueur`
  MODIFY `id_joueur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `partie`
--
ALTER TABLE `partie`
  MODIFY `idPartie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `regles`
--
ALTER TABLE `regles`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ennemi_partie`
--
ALTER TABLE `ennemi_partie`
  ADD CONSTRAINT `ennemi_partie_Partie0_FK` FOREIGN KEY (`idPartie`) REFERENCES `partie` (`idPartie`),
  ADD CONSTRAINT `ennemi_partie_ennemi_FK` FOREIGN KEY (`id_ennemi`) REFERENCES `ennemi` (`id_ennemi`);

--
-- Contraintes pour la table `partie`
--
ALTER TABLE `partie`
  ADD CONSTRAINT `Partie_Joueur_FK` FOREIGN KEY (`id_joueur`) REFERENCES `joueur` (`id_joueur`),
  ADD CONSTRAINT `Partie_terrain0_FK` FOREIGN KEY (`id_terrain`) REFERENCES `terrain` (`id_terrain`);

--
-- Contraintes pour la table `tour_partie`
--
ALTER TABLE `tour_partie`
  ADD CONSTRAINT `tour_partie_Partie0_FK` FOREIGN KEY (`idPartie`) REFERENCES `partie` (`idPartie`),
  ADD CONSTRAINT `tour_partie_tour_FK` FOREIGN KEY (`id_tour`) REFERENCES `tour` (`id_tour`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
