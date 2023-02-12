-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 11 fév. 2023 à 23:03
-- Version du serveur : 8.0.23
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `vehicule`
--

-- --------------------------------------------------------

--
-- Structure de la table `modele`
--

CREATE TABLE `modele` (
  `ID` int NOT NULL,
  `modele` varchar(15) DEFAULT NULL,
  `marque` varchar(15) DEFAULT NULL,
  `puissance` varchar(15) DEFAULT NULL,
  `carburant` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `modele`
--

INSERT INTO `modele` (`ID`, `modele`, `marque`, `puissance`, `carburant`) VALUES
(1, '108', 'peugeot', '4cv', 'Essence'),
(2, '508', 'peugeot', '7cv', 'Essence'),
(3, '308', 'peugeot', '4cv', 'Essence'),
(4, 'Megan Coupe', 'renault', '5cv', 'Diesel'),
(7, 'A200', 'Marque', 'V40', 'Essence');

-- --------------------------------------------------------

--
-- Structure de la table `proprietaire`
--

CREATE TABLE `proprietaire` (
  `ID` int NOT NULL,
  `nom` varchar(15) DEFAULT NULL,
  `prenom` varchar(15) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `code_postal` int DEFAULT NULL,
  `ville` varchar(15) DEFAULT NULL,
  `tel` int DEFAULT NULL,
  `id_voiture` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `proprietaire`
--

INSERT INTO `proprietaire` (`ID`, `nom`, `prenom`, `adresse`, `code_postal`, `ville`, `tel`, `id_voiture`) VALUES
(1, 'Prop1', 'Prop1', 'Ville , ville center', 80000, 'Ville', 600224567, 3),
(9, 'Prop2', 'Prop2', 'Ville , ville center', 80000, 'Ville', 600224567, 1),
(11, 'Prop3', 'Prop3', 'Ville , ville center', 80000, 'Ville', 600224567, 5);

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

CREATE TABLE `voiture` (
  `ID` int NOT NULL,
  `immatriculation` varchar(20) DEFAULT NULL,
  `couleur` varchar(15) DEFAULT NULL,
  `kilometrage` int DEFAULT NULL,
  `id_modele` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO `voiture` (`ID`, `immatriculation`, `couleur`, `kilometrage`, `id_modele`) VALUES
(1, 'A2030', 'Noir', 1000, 4),
(2, 'A203T', 'Blanc', 500, 3),
(3, 'H0001', 'Bleu', 3000, 2),
(5, 'A003T', 'Blanc', 50000, 7);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `modele`
--
ALTER TABLE `modele`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `proprietaire`
--
ALTER TABLE `proprietaire`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_voiture` (`id_voiture`);

--
-- Index pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_modele` (`id_modele`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `modele`
--
ALTER TABLE `modele`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `proprietaire`
--
ALTER TABLE `proprietaire`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `voiture`
--
ALTER TABLE `voiture`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `proprietaire`
--
ALTER TABLE `proprietaire`
  ADD CONSTRAINT `proprietaire_ibfk_1` FOREIGN KEY (`id_voiture`) REFERENCES `voiture` (`ID`);

--
-- Contraintes pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD CONSTRAINT `voiture_ibfk_1` FOREIGN KEY (`id_modele`) REFERENCES `modele` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
