-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 06 jan. 2021 à 12:08
-- Version du serveur :  10.4.6-MariaDB
-- Version de PHP :  7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `_db_reitec_info`
--

-- --------------------------------------------------------

--
-- Structure de la table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `category` varchar(200) NOT NULL,
  `createby` varchar(60) NOT NULL,
  `modifiedby` varchar(60) NOT NULL,
  `deletedby` varchar(60) NOT NULL,
  `createdon` varchar(60) NOT NULL,
  `datastatus` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_categ_cours`
--

CREATE TABLE `tbl_categ_cours` (
  `id` int(11) NOT NULL,
  `category` varchar(60) NOT NULL,
  `createby` varchar(60) NOT NULL,
  `modifiedby` varchar(60) NOT NULL,
  `deletedby` varchar(60) NOT NULL,
  `createdon` varchar(60) NOT NULL,
  `datastatus` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_categ_cours`
--

INSERT INTO `tbl_categ_cours` (`id`, `category`, `createby`, `modifiedby`, `deletedby`, `createdon`, `datastatus`) VALUES
(1, 'Le domaine Humanitaire', '', '', '', '', '1'),
(2, 'Informatique et bureautique:', '', '', '', '', '1'),
(3, 'Gestion des données', '', '', '', '', '1'),
(4, 'Atelier', '', '', '', '', '1'),
(5, 'Programme de gestion des donn&eacute;es', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `id` int(11) NOT NULL,
  `idPartage` int(11) NOT NULL,
  `idReaction` int(11) NOT NULL,
  `message` text NOT NULL,
  `createby` varchar(60) NOT NULL,
  `modifiedby` varchar(60) NOT NULL,
  `deletedby` varchar(60) NOT NULL,
  `createdon` varchar(60) NOT NULL,
  `datastatus` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sujet` text NOT NULL,
  `message` text NOT NULL,
  `accesslevol` int(11) NOT NULL,
  `destTo` int(11) NOT NULL,
  `spending` int(11) NOT NULL,
  `createby` int(11) NOT NULL DEFAULT 1,
  `modifiedby` int(11) NOT NULL DEFAULT 1,
  `deletedby` int(11) NOT NULL DEFAULT 1,
  `createdon` timestamp NOT NULL DEFAULT current_timestamp(),
  `datastatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `nom`, `email`, `sujet`, `message`, `accesslevol`, `destTo`, `spending`, `createby`, `modifiedby`, `deletedby`, `createdon`, `datastatus`) VALUES
(2, 'david-maene', 'davidmened@gmail.com', 'yyyyyyuuuu', 'hnnnhnh', 6363373, 0, 0, 2020, 0, 0, '0000-00-00 00:00:00', 1),
(6, 'abra-mba', 'davidmened@gmail.com', 'sujet', 'testing message', 6363373, 19000, 0, 2020, 0, 0, '0000-00-00 00:00:00', 1),
(7, 'abra-mba', 'info@reitec-info.org', 'sujet', '                    ', 6363373, 6, 1111, 0, 0, 0, '0000-00-00 00:00:00', 1),
(8, 'abra-mba', 'info@reitec-info.org', 'sujet', '                    ', 6363373, 6, 1111, 0, 0, 0, '0000-00-00 00:00:00', 1),
(9, 'abra-mba', 'info@reitec-info.org', 'sujet', '                    ', 6363373, 6, 1111, 0, 0, 0, '0000-00-00 00:00:00', 1),
(10, 'abra-mba', 'info@reitec-info.org', 'sujet', '                    ', 6363373, 6, 1111, 0, 0, 0, '0000-00-00 00:00:00', 1),
(11, 'abra-mba', 'info@reitec-info.org', 'sujet', '                    ', 6363373, 6, 1111, 0, 0, 0, '0000-00-00 00:00:00', 1),
(12, 'abra-mba', 'info@reitec-info.org', 'sujet', '                    ', 6363373, 6, 1111, 0, 0, 0, '0000-00-00 00:00:00', 1),
(13, 'abra-mba', 'info@reitec-info.org', 'sujet', '                    ', 6363373, 6, 1111, 0, 0, 0, '0000-00-00 00:00:00', 1),
(14, 'abra-mba', 'info@reitec-info.org', 'sujet', '                    ', 6363373, 6, 0, 0, 0, 0, '0000-00-00 00:00:00', 1),
(15, 'abra-mba', 'davidmened@gmail.com', 'commentetudier', 'testing message -------------p,pxsinxsoixnsxsx', 6363373, 19000, 0, 2020, 0, 0, '0000-00-00 00:00:00', 1),
(16, 'abra-mba', 'davidmened@gmail.com', 'commentetudier', 'testing message -------------p,pxsinxsoixnsxsx', 6363373, 19000, 0, 2020, 0, 0, '0000-00-00 00:00:00', 1),
(17, 'ibrahimbagalwa', 'bagalwa@gmail.con', 'salutation', 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', 6363373, 19000, 0, 2020, 0, 0, '0000-00-00 00:00:00', 0),
(18, 'ibrahim-bagalwa', 'bagalwa@gmail.con', 'salutation', 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', 6363373, 19000, 0, 2020, 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_content`
--

CREATE TABLE `tbl_content` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `categ` varchar(100) NOT NULL,
  `createby` varchar(60) NOT NULL,
  `modifiedby` varchar(60) NOT NULL,
  `deletedby` varchar(60) NOT NULL,
  `createdon` varchar(60) NOT NULL,
  `datastatus` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_content`
--

INSERT INTO `tbl_content` (`id`, `content`, `categ`, `createby`, `modifiedby`, `deletedby`, `createdon`, `datastatus`) VALUES
(1, '_dav.me_190901609694047.pdf', 'aspdf', '1', '0', '0', '03/01/2021, 18:14:08', '1'),
(2, '_dav.me_103291609755086.pdf', 'aspdf', '', '0', '0', '04/01/2021, 11:11:26', '1'),
(3, '_dav.me_82081609755523.pdf', 'aspdf', '0', '0', '0', '04/01/2021, 11:18:43', '1'),
(4, '_dav.me_73761609755642.pdf', 'aspdf', '0', '0', '0', '04/01/2021, 11:20:42', '1'),
(5, '<b>iddiqjqcuqchcchic</b>', 'astext', '1', '0', '0', '04/01/2021, 11:53:20', '1'),
(6, '<p>yedyeduenchdcjndcDC \'hriehfef</p><p>we[f</p><p>efiefe fhehefhe feehoe fhef</p>', 'astext', '1', '0', '0', '04/01/2021, 11:55:55', '1'),
(7, '', 'astext', '1', '0', '0', '04/01/2021, 12:00:42', '1'),
(8, '_dav.me_189341609758478.doc', 'aspdf', '1', '0', '0', '04/01/2021, 12:07:58', '1'),
(9, '', 'astext', '1', '0', '0', '04/01/2021, 12:16:36', '1'),
(10, '', 'astext', '1', '0', '0', '04/01/2021, 12:18:10', '1'),
(11, '', 'astext', '1', '0', '0', '04/01/2021, 12:20:35', '1');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_cours`
--

CREATE TABLE `tbl_cours` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `delai` int(11) NOT NULL,
  `prix` varchar(60) NOT NULL,
  `isattributed` int(11) NOT NULL,
  `description` text NOT NULL,
  `idFacilitateur` int(11) NOT NULL,
  `idContent` int(11) NOT NULL,
  `idCateg` int(11) NOT NULL,
  `idSubcateg` int(11) NOT NULL,
  `createby` varchar(60) NOT NULL,
  `modifiedby` varchar(60) NOT NULL,
  `deletedby` varchar(60) NOT NULL,
  `createdon` varchar(60) NOT NULL,
  `datastatus` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_cours`
--

INSERT INTO `tbl_cours` (`id`, `title`, `delai`, `prix`, `isattributed`, `description`, `idFacilitateur`, `idContent`, `idCateg`, `idSubcateg`, `createby`, `modifiedby`, `deletedby`, `createdon`, `datastatus`) VALUES
(1, 'le monde du 21 siã¸cle et la techno', 90, '600', 1, 'nothing to say now', 0, 1, 2, 6, '1', '0', '0', '03/01/2021, 18:14:07', '1'),
(2, 'le monde du 21 siã¸cle ', 90, '600', 0, 'nous sommes une platforme charger de former les personnes dans diffã©rents domaines du leadership oeuvrant dans la ville de goma en rã©publique dã©mocratique du congo', 5, 2, 2, 6, '', '0', '0', '04/01/2021, 11:11:26', '1'),
(3, 'la technologie au cå“ur du monde', 90, '600', 1, 'nous sommes une platforme charger de former les personnes dans diffã©rents domaines du leadership oeuvrant dans la ville de goma en rã©publique dã©mocratique du congo', 0, 3, 2, 2, '0', '0', '0', '04/01/2021, 11:18:43', '1'),
(4, 'le monde d\'aujourd\'hui', 90, '600', 1, 'nous sommes une platforme charger de former les personnes dans diffã©rents domaines du leadership oeuvrant dans la ville de goma en rã©publique dã©mocratique du congo', 0, 4, 2, 2, '0', '0', '0', '04/01/2021, 11:20:42', '1'),
(5, 'Planification et gestion des projets', 6464, '8383', 1, '', 0, 5, 1, 7, '1', '0', '0', '04/01/2021, 11:53:20', '1'),
(6, ';ws;nsxnsxsisx', 7888, '7887', 1, '', 0, 6, 1, 5, '1', '0', '0', '04/01/2021, 11:55:55', '1'),
(7, ';ws;nsxnsxsisx', 7888, '7887', 1, '', 0, 7, 1, 5, '1', '0', '0', '04/01/2021, 12:00:42', '1'),
(8, 'testing pdf', 5665, '6767676', 1, 'ysssxsxsxysxysxysxusxusx', 0, 8, 3, 12, '1', '0', '0', '04/01/2021, 12:07:58', '1'),
(9, 'testing pdf', 5665, '6767676', 1, '', 0, 9, 2, 4, '1', '0', '0', '04/01/2021, 12:16:36', '1'),
(10, 'testing pdf', 5665, '6767676', 0, 'hshshshshshsusuauajajakkz', 1, 10, 2, 4, '1', '0', '0', '04/01/2021, 12:18:10', '1'),
(11, 'testing pdf', 5665, '6767676', 1, 'hshshshshshsusuauajajakkz', 0, 11, 2, 4, '1', '0', '0', '04/01/2021, 12:20:35', '1');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_etudiant`
--

CREATE TABLE `tbl_etudiant` (
  `id` int(11) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `postnom` varchar(60) NOT NULL,
  `prenom` varchar(60) NOT NULL,
  `genre` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(60) NOT NULL,
  `telephone` varchar(60) NOT NULL,
  `nn` int(11) NOT NULL,
  `accesslevel` int(11) NOT NULL,
  `createby` varchar(60) NOT NULL,
  `modifiedby` varchar(60) NOT NULL,
  `deletedby` varchar(60) NOT NULL,
  `createdon` varchar(60) NOT NULL,
  `datastatus` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_etudiant`
--

INSERT INTO `tbl_etudiant` (`id`, `nom`, `postnom`, `prenom`, `genre`, `email`, `pwd`, `telephone`, `nn`, `accesslevel`, `createby`, `modifiedby`, `deletedby`, `createdon`, `datastatus`) VALUES
(9, 'darone', 'david', 'maene', 'masculin', 'darone.d@gmail.com', '9a6220cfc36021e3687463b678776d5d', '+243970284772', 0, 1122, '4a2f59f3132ea94f32b4e33572f02ac3', '0', '0', '29/12/2020, 08:24:15', '1'),
(10, 'ibrahim', 'Bagalwa', 'ibrah', 'masculin', 'bagalwa@gmail.con', '0a9cdf2dc7896371559d81403c548733', '+243987654321', 1234564, 1122, '4a2f59f3132ea94f32b4e33572f02ac3', '0', '0', '29/12/2020, 10:57:03', '1'),
(11, 'Francine', 'Obu', 'Francine', 'feminin', 'francinemapio@gmail.com', 'aa5e16090b846d64736633c01b099bea', '+243814556907', 0, 1122, '4a2f59f3132ea94f32b4e33572f02ac3', '0', '0', '05/01/2021, 09:32:09', '1');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_etudier`
--

CREATE TABLE `tbl_etudier` (
  `id` int(11) NOT NULL,
  `idEtudiant` int(11) NOT NULL,
  `idCours` int(11) NOT NULL,
  `shaCours` varchar(64) NOT NULL,
  `remaningTime` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `createby` varchar(60) NOT NULL,
  `modifiedby` varchar(60) NOT NULL,
  `deletedby` varchar(60) NOT NULL,
  `createdon` varchar(60) NOT NULL,
  `datastatus` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_etudier`
--

INSERT INTO `tbl_etudier` (`id`, `idEtudiant`, `idCours`, `shaCours`, `remaningTime`, `status`, `createby`, `modifiedby`, `deletedby`, `createdon`, `datastatus`) VALUES
(1, 9, 10, 'X2Rhdi5tZTpyZWl0ZWMtMTAtOQ==', 5665, 0, '9', '0', '0', '04/01/2021, 21:53:34', '1'),
(68, 9, 4, 'X2Rhdi5tZTpyZWl0ZWMtNC05', 90, 0, '9', '0', '0', '05/01/2021, 09:43:49', '1'),
(78, 9, 2, 'X2Rhdi5tZTpyZWl0ZWMtMi05', 90, 0, '9', '0', '0', '05/01/2021, 10:11:49', '1'),
(79, 9, 5, 'X2Rhdi5tZTpyZWl0ZWMtNS05', 6464, 1, '9', '0', '0', '05/01/2021, 10:12:30', '1'),
(111, 9, 3, 'X2Rhdi5tZTpyZWl0ZWMtMy05', 90, 0, '9', '0', '0', '05/01/2021, 13:23:37', '1'),
(116, 9, 7, 'X2Rhdi5tZTpyZWl0ZWMtNy05', 7888, 1, '9', '0', '0', '05/01/2021, 13:30:33', '1'),
(119, 10, 10, 'X2Rhdi5tZTpyZWl0ZWMtMTAtMTA=', 5665, 1, '10', '0', '0', '05/01/2021, 13:35:10', '1'),
(127, 9, 1, 'X2Rhdi5tZTpyZWl0ZWMtMS05', 90, 0, '9', '0', '0', '05/01/2021, 13:53:35', '1');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_facilitateur`
--

CREATE TABLE `tbl_facilitateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `photo` text NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(60) NOT NULL,
  `accesslevel` int(11) NOT NULL,
  `nn` varchar(60) NOT NULL,
  `pwd` varchar(60) NOT NULL,
  `createby` varchar(60) NOT NULL,
  `modifiedby` varchar(60) NOT NULL,
  `deletedby` varchar(60) NOT NULL,
  `createdon` varchar(60) NOT NULL,
  `datastatus` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_facilitateur`
--

INSERT INTO `tbl_facilitateur` (`id`, `nom`, `prenom`, `photo`, `telephone`, `email`, `gender`, `accesslevel`, `nn`, `pwd`, `createby`, `modifiedby`, `deletedby`, `createdon`, `datastatus`) VALUES
(1, 'david', 'maene', 'logo.png', '+243993392929', 'davidmened@gmail.com', 'masculin', 19000, '', '9a6220cfc36021e3687463b678776d5d', '1', '0', '0', '31/12/2020, 18:04:32', '1'),
(2, 'abra', 'mba', 'logo.png', '+243993392929', 'saabra@gmail.com', 'masculin', 13000, '', '9a6220cfc36021e3687463b678776d5d', '1', '0', '0', '31/12/2020, 18:07:08', '1'),
(4, 'soweb', 'gra', 'logo.png', '243993392929', 'sowebgra@gmail.com', 'feminin', 13000, '', '9a6220cfc36021e3687463b678776d5d', '1', '0', '0', '31/12/2020, 18:07:08', '1'),
(6, 'hdhdhdh', 'lslslslsls', 'logo.png', '+838383838383', 'hshshshs@gmail.com', 'masculin', 13000, '', '9a6220cfc36021e3687463b678776d5d', '1', '0', '0', '05/01/2021, 14:53:32', '1');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_newsletter`
--

CREATE TABLE `tbl_newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `createby` varchar(60) NOT NULL,
  `modifiedby` varchar(60) NOT NULL,
  `deletedby` varchar(60) NOT NULL,
  `createdon` varchar(60) NOT NULL,
  `datastatus` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_newsletter`
--

INSERT INTO `tbl_newsletter` (`id`, `email`, `createby`, `modifiedby`, `deletedby`, `createdon`, `datastatus`) VALUES
(1, 'davidmened@gmail.com', '0', '0', '0', '05/01/2021, 14:38:03', '1'),
(3, 'ibrahim@gmail.com', '0', '0', '0', '05/01/2021, 14:58:11', '1');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_partage`
--

CREATE TABLE `tbl_partage` (
  `id` int(11) NOT NULL,
  `idInitiateur` int(11) NOT NULL,
  `question` text NOT NULL,
  `createby` varchar(60) NOT NULL,
  `modifiedby` varchar(60) NOT NULL,
  `deletedby` varchar(60) NOT NULL,
  `createdon` varchar(60) NOT NULL,
  `datastatus` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_subcateg_cours`
--

CREATE TABLE `tbl_subcateg_cours` (
  `id` int(11) NOT NULL,
  `subcateg` varchar(60) NOT NULL,
  `idcategcours` int(11) NOT NULL,
  `createby` varchar(60) NOT NULL,
  `modifiedby` varchar(60) NOT NULL,
  `deletedby` varchar(60) NOT NULL,
  `createdon` varchar(60) NOT NULL,
  `datastatus` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_subcateg_cours`
--

INSERT INTO `tbl_subcateg_cours` (`id`, `subcateg`, `idcategcours`, `createby`, `modifiedby`, `deletedby`, `createdon`, `datastatus`) VALUES
(1, 'Logistique', 1, '', '', '', '', '1'),
(2, 'Excell avancé', 2, '', '', '', '', '1'),
(3, 'Securité', 1, '', '', '', '', '1'),
(4, 'Excell', 2, '', '', '', '', '1'),
(5, 'Le ressources humaines', 1, '', '', '', '', '1'),
(6, 'Windows', 2, '', '', '', '', '1'),
(7, 'Gestion de projet', 1, '', '', '', '', '1'),
(8, 'Office', 2, '', '', '', '', '1'),
(9, 'Suivi évaluation des projets', 1, '', '', '', '', '1'),
(10, ' Gestion d\'un site humanitaire', 1, '', '', '', '', '1'),
(11, 'SPSS', 3, '', '', '', '', '1'),
(12, 'ODKA', 3, '', '', '', '', '1'),
(13, 'KOBO Collector', 3, '', '', '', '', '1'),
(14, 'Team building', 4, '', '', '', '', '1'),
(15, 'Leadership', 4, '', '', '', '', '1');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_subcomment`
--

CREATE TABLE `tbl_subcomment` (
  `id` int(11) NOT NULL,
  `idComment` int(11) NOT NULL,
  `idReaction` int(11) NOT NULL,
  `message` text NOT NULL,
  `createby` varchar(60) NOT NULL,
  `modifiedby` varchar(60) NOT NULL,
  `deletedby` varchar(60) NOT NULL,
  `createdon` varchar(60) NOT NULL,
  `datastatus` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_categ_cours`
--
ALTER TABLE `tbl_categ_cours`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_content`
--
ALTER TABLE `tbl_content`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_cours`
--
ALTER TABLE `tbl_cours`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_etudiant`
--
ALTER TABLE `tbl_etudiant`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `tbl_etudier`
--
ALTER TABLE `tbl_etudier`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `shaCours` (`shaCours`);

--
-- Index pour la table `tbl_facilitateur`
--
ALTER TABLE `tbl_facilitateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `tbl_newsletter`
--
ALTER TABLE `tbl_newsletter`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `tbl_partage`
--
ALTER TABLE `tbl_partage`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_subcateg_cours`
--
ALTER TABLE `tbl_subcateg_cours`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_subcomment`
--
ALTER TABLE `tbl_subcomment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_categ_cours`
--
ALTER TABLE `tbl_categ_cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `tbl_content`
--
ALTER TABLE `tbl_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `tbl_cours`
--
ALTER TABLE `tbl_cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `tbl_etudiant`
--
ALTER TABLE `tbl_etudiant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `tbl_etudier`
--
ALTER TABLE `tbl_etudier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT pour la table `tbl_facilitateur`
--
ALTER TABLE `tbl_facilitateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `tbl_newsletter`
--
ALTER TABLE `tbl_newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `tbl_partage`
--
ALTER TABLE `tbl_partage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_subcateg_cours`
--
ALTER TABLE `tbl_subcateg_cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `tbl_subcomment`
--
ALTER TABLE `tbl_subcomment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
