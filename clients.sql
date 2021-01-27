-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 27 jan. 2021 à 16:53
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `clients`
--

-- --------------------------------------------------------

--
-- Structure de la table `acteurs`
--

DROP TABLE IF EXISTS `acteurs`;
CREATE TABLE IF NOT EXISTS `acteurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `logo_acteur` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date_creation` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `acteurs`
--

INSERT INTO `acteurs` (`id`, `titre`, `contenu`, `logo_acteur`, `date_creation`) VALUES
(1, 'Formation&co', 'Formation&co est une association française présente sur tout le territoire.\r\nNous proposons à des personnes issues de tout milieu de devenir entrepreneur grâce à un crédit et un accompagnement professionnel et personnalisé.\r\nNotre proposition : \r\n    • un financement jusqu’à 30 000€ ;\r\n    • un suivi personnalisé et gratuit ;\r\n    • une lutte acharnée contre les freins sociétaux et les stéréotypes.\r\n\r\nLe financement est possible, peu importe le métier : coiffeur, banquier, éleveur de chèvres… . Nous collaborons avec des personnes talentueuses et motivées.\r\nVous n’avez pas de diplômes ? Ce n’est pas un problème pour nous ! Nos financements s’adressent à tous.', 'formation_co.png', '2021-01-14 16:28:41'),
(2, 'Protectpeople', 'Protectpeople finance la solidarité nationale.\r\nNous appliquons le principe édifié par la Sécurité sociale française en 1945 : permettre à chacun de bénéficier d’une protection sociale.\r\n\r\nChez Protectpeople, chacun cotise selon ses moyens et reçoit selon ses besoins.\r\nProectecpeople est ouvert à tous, sans considération d’âge ou d’état de santé.\r\nNous garantissons un accès aux soins et une retraite.\r\nChaque année, nous collectons et répartissons 300 milliards d’euros.\r\nNotre mission est double :\r\n    • sociale : nous garantissons la fiabilité des données sociales ;\r\n    • économique : nous apportons une contribution aux activités économiques.', 'protectpeople.png', '2021-01-14 18:31:11'),
(3, 'Dsa France', 'Dsa France accélère la croissance du territoire et s’engage avec les collectivités territoriales.\r\nNous accompagnons les entreprises dans les étapes clés de leur évolution.\r\nNotre philosophie : s’adapter à chaque entreprise.\r\nNous les accompagnons pour voir plus grand et plus loin et proposons des solutions de financement adaptées à chaque étape de la vie des entreprises', 'Dsa_france.png', '2021-01-14 08:47:47'),
(4, 'CDE', 'La CDE (Chambre Des Entrepreneurs) accompagne les entreprises dans leurs démarches de formation. \r\nSon président est élu pour 3 ans par ses pairs, chefs d’entreprises et présidents des CDE.', 'CDE.png', '2021-01-14 08:49:17');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_billet` int NOT NULL,
  `id_user` int NOT NULL,
  `pseudo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `commentaire` text NOT NULL,
  `date_commentaire` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `id_billet`, `id_user`, `pseudo`, `commentaire`, `date_commentaire`) VALUES
(1, 1, 0, 'Marcus', 'Super!!', '2010-03-25 16:49:53'),
(2, 2, 0, 'soskito', 'je fais un test d\'insertion de commentaire!', '2021-01-16 16:55:17'),
(30, 3, 0, 'Soski', 'Bonjour! je laisse un commentaire pour dire que DSA france c\'est vraiment génial!', '2021-01-18 18:09:35'),
(31, 4, 0, 'Guillaume', 'La chambre des entrepreneurs m\'a vraiment beaucoup aidé! ', '2021-01-18 18:10:15'),
(32, 2, 0, 'Marcos', 'Le test est concluant ? ', '2021-01-18 18:12:23'),
(46, 3, 0, 'Guillaume', 'cool! ', '2021-01-19 11:39:14'),
(74, 2, 65, 'soski', 'Bonjour', '2021-01-23 17:26:19'),
(73, 2, 63, 'soskito', 'oui! merci! ', '2021-01-23 09:40:24');

-- --------------------------------------------------------

--
-- Structure de la table `dislikes`
--

DROP TABLE IF EXISTS `dislikes`;
CREATE TABLE IF NOT EXISTS `dislikes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_article` int NOT NULL,
  `id_membre` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `dislikes`
--

INSERT INTO `dislikes` (`id`, `id_article`, `id_membre`) VALUES
(20, 4, 0),
(24, 2, 3),
(16, 4, 4),
(27, 2, 65),
(28, 3, 65);

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_article` int NOT NULL,
  `id_membre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`id`, `id_article`, `id_membre`) VALUES
(73, 2, '63'),
(72, 2, '61'),
(70, 4, '3'),
(63, 2, '4');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_pseudo` varchar(50) NOT NULL,
  `user_prenom` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_nom` varchar(50) NOT NULL,
  `user_email` text NOT NULL,
  `user_password` text NOT NULL,
  `question` varchar(50) NOT NULL,
  `reponse` varchar(50) NOT NULL,
  `registerdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_pseudo`, `user_prenom`, `user_nom`, `user_email`, `user_password`, `question`, `reponse`, `registerdate`) VALUES
(67, 'soskito', 'Martine', 'Aubry', 'guillaume.dussaut@gmail.com', '$2y$10$pFYp/8mpMGIcvhlELClbhOlfGzQVpzRxhoqrHA.N/fwfyMDQceugm', 'choix1', 'chouchou', '2021-01-25 09:14:09');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
