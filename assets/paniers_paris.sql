-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : Dim 06 sep. 2020 à 12:14
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `paniers_paris`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(11) NOT NULL,
  `id_membre` int(11) DEFAULT NULL,
  `id_panier` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `id_membre`, `id_panier`, `quantite`, `prix`) VALUES
(4, NULL, 1, 2, 58),
(5, NULL, 2, 1, 58),
(6, NULL, 1, 2, 32),
(7, NULL, 1, 2, 32),
(8, NULL, 2, 3, 78);

-- --------------------------------------------------------

--
-- Structure de la table `detail_paniers`
--

CREATE TABLE `detail_paniers` (
  `id_detail_paniers` int(4) NOT NULL,
  `id_panier` int(11) NOT NULL,
  `nom_panier` varchar(50) NOT NULL,
  `id_produit` int(3) NOT NULL,
  `nom_produit` varchar(50) NOT NULL,
  `quantite_produit_kg` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `detail_paniers`
--

INSERT INTO `detail_paniers` (`id_detail_paniers`, `id_panier`, `nom_panier`, `id_produit`, `nom_produit`, `quantite_produit_kg`) VALUES
(1, 1, 'Panier Léger', 1, 'Pommes de terre Allouette Cal 38/60', 1),
(2, 1, 'Panier Léger', 2, 'Carotte Cat. II', 0.5),
(4, 1, 'Panier Léger', 3, 'Courgette Cat. II', 0.5),
(5, 1, 'Panier Léger', 6, 'Banane Cat. II', 1),
(6, 1, 'Panier Léger', 5, 'Tomate ancienne Cat. II', 0.5),
(7, 2, 'Panier Duo', 1, 'Pommes de terre Allouette Cal 38/60', 2),
(8, 2, 'Panier Duo', 2, 'Carotte Cat. II', 1),
(9, 2, 'Panier Duo', 3, 'Courgette Cat. II', 1),
(11, 2, 'Panier Duo', 5, 'Tomate ancienne Cat. II', 2),
(12, 2, 'Panier Duo', 6, 'Banane Cat. II', 1),
(13, 3, 'Panier Big', 1, 'Pommes de terre Allouette Cal 38/60', 2),
(14, 3, 'Panier Big', 2, 'Carotte Cat. II', 1.5),
(15, 3, 'Panier Big', 3, 'Courgette Cat. II', 1.5),
(16, 3, 'Panier Big', 4, 'Brocoli Cat. NC', 1),
(17, 3, 'Panier Big', 5, 'Tomate ancienne Cat. II', 1.5),
(18, 3, 'Panier Big', 6, 'Banane Cat. II', 1);

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id_membre` int(5) NOT NULL,
  `pseudo` varchar(30) NOT NULL,
  `prenom2` varchar(40) NOT NULL,
  `nom2` varchar(40) NOT NULL,
  `tel2` varchar(20) NOT NULL,
  `start2` varchar(10) NOT NULL,
  `adresse2` text NOT NULL,
  `ville2` varchar(30) NOT NULL,
  `cp2` int(5) NOT NULL,
  `email2` varchar(40) NOT NULL,
  `mdp` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `paniers`
--

CREATE TABLE `paniers` (
  `id_panier` int(4) NOT NULL,
  `nom_panier` varchar(50) NOT NULL,
  `description_panier` text NOT NULL,
  `prix_panier` int(2) NOT NULL,
  `Composition` varchar(250) NOT NULL,
  `poids_panier` float NOT NULL,
  `stock` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `paniers`
--

INSERT INTO `paniers` (`id_panier`, `nom_panier`, `description_panier`, `prix_panier`, `Composition`, `poids_panier`, `stock`) VALUES
(1, 'Panier Léger', '3 à 3.4 kg de fruits et légumes.\r\nIdéal pour les parisiens préssés.\r\nConvient pour une personne pour une semaine.', 16, 'Pommes de terre Allouette Cal 38/60 | Carotte Cat. II | Courgette Cat. II | Banane Cat. II | Tomate ancienne Cat. II\r\n', 3.4, 150),
(2, 'Panier Duo', '7 à 7.4 kg de fruits et légumes.\r\nIdéal pour cuisiner en amoureux.\r\nConvient pour deux personnes pour une semaine.', 26, 'Pommes de terre Allouette Cal 38/60 | Carotte Cat. II | Courgette Cat. II | Tomate ancienne Cat. II | Banane Cat. II', 7, 150),
(3, 'Panier Big', '8.5 à 9 kg de fruits et légumes.\r\nVotre famille vous remerciera.\r\nConvient pour quatre personnes pour une semaine.', 31, 'Pommes de terre Allouette Cal 38/60 | Carotte Cat. II | Courgette Cat. II |  Brocoli Cat. NC | Tomate ancienne Cat. II | 	\r\nBanane Cat. II', 8.5, 150);

-- --------------------------------------------------------

--
-- Structure de la table `producteurs`
--

CREATE TABLE `producteurs` (
  `id_producteur` int(11) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL DEFAULT 'fruits et légumes',
  `ville` varchar(50) NOT NULL,
  `departement` int(2) NOT NULL DEFAULT 95,
  `description_producteur` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `producteurs`
--

INSERT INTO `producteurs` (`id_producteur`, `prenom`, `nom`, `type`, `ville`, `departement`, `description_producteur`) VALUES
(1, 'Claude', 'Thimo', 'fruits et légumes', 'Auvers-sur-Oise', 95, 'Situé au nord de Paris à Auvers-sur-Oise, nous sommes une entreprise familiale : depuis sa création par mes parents en 1994, j\'ai toujours été présent, et lorsque j\'ai eu terminé mes études de commerce, cela était une évidence pour moi de les rejoindre! Depuis 12 ans, je suis devenu associé de la production. Nous cultivons avec fierté toutes sortes de fruits et légumes selon les saisons. Un objectif m’anime au quotidien : créer un lien plus intime avec le consommateur et faire goûter la nature...\r\n« Fier d’être producteur !»'),
(2, 'Bernard ', 'Grath', 'fruits et légumes', 'Magny-en-Vexin', 95, 'Producteur de fruits et légumes depuis plus de 30 ans à Magny-en-Vexin. D\'abord arboriculteurs de père en fils, nous avons développé notre activité grâce au maraîchage. Résolument tourné vers l’avenir,c’est avec plaisir que je consacre du temps à cultiver mes produits dans le respect de la nature, sur un sol vivant, à la main et sans aucun produit. C’est l’intervention humaine et le savoir-faire allié à l’amour de la terre qui feront la différence .\r\n« Il faut être passionné pour faire ce métier et cela représente beaucoup de choses pour moi.»');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id_produit` int(11) NOT NULL,
  `id_producteur` int(4) NOT NULL,
  `nom_produit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id_produit`, `id_producteur`, `nom_produit`) VALUES
(1, 1, 'Pommes de terre Allouette Cal 38/60'),
(2, 1, 'Carotte Cat. II'),
(3, 1, 'Courgette Cat. II'),
(4, 1, 'Brocoli Cat. NC'),
(5, 2, 'Tomate ancienne Cat. II'),
(6, 2, 'Banane Cat. II');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `id_membre` (`id_membre`),
  ADD KEY `id_panier` (`id_panier`);

--
-- Index pour la table `detail_paniers`
--
ALTER TABLE `detail_paniers`
  ADD PRIMARY KEY (`id_detail_paniers`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id_membre`);

--
-- Index pour la table `paniers`
--
ALTER TABLE `paniers`
  ADD PRIMARY KEY (`id_panier`);

--
-- Index pour la table `producteurs`
--
ALTER TABLE `producteurs`
  ADD PRIMARY KEY (`id_producteur`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id_produit`),
  ADD KEY `id_producteur` (`id_producteur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `detail_paniers`
--
ALTER TABLE `detail_paniers`
  MODIFY `id_detail_paniers` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id_membre` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `paniers`
--
ALTER TABLE `paniers`
  MODIFY `id_panier` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `producteurs`
--
ALTER TABLE `producteurs`
  MODIFY `id_producteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id_membre`),
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`id_panier`) REFERENCES `paniers` (`id_panier`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
