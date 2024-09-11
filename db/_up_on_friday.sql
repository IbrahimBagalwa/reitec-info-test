-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 21 jan. 2021 à 14:07
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
(18, 'ibrahim-bagalwa', 'bagalwa@gmail.con', 'salutation', 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', 6363373, 19000, 0, 2020, 0, 0, '0000-00-00 00:00:00', 0),
(19, 'test', 'claudavy@gmail.com', 'information', 'm informer sur la fornma', 6363373, 19000, 0, 2020, 0, 0, '0000-00-00 00:00:00', 1),
(20, 'test', 'claudavy@gmail.com', 'information', 'm informer sur la fornma', 6363373, 19000, 0, 2020, 0, 0, '0000-00-00 00:00:00', 0);

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
(7, '<h2 id=\"one\">Chap One</h2>\r\n        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\n        Nam eu sem tempor, varius quam at, luctus dui. Mauris magna\r\n        metus, dapibus nec turpis vel, semper malesuada ante.\r\n        Vestibulum id metus ac nisl bibendum scelerisque non non\r\n        purus. Suspendisse varius nibh non aliquet sagittis. In\r\n        tincidunt orci sit amet elementum vestibulum. Vivamus\r\n        fermentum in arcu in aliquam. Quisque aliquam porta odio</p>\r\n        <!-- ----------------------------------------------------- -->\r\n        <h2 id=\"two\">Chap two</h2>\r\n        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\n        Nam eu sem tempor, varius quam at, luctus dui. Mauris magna\r\n        metus, dapibus nec turpis vel, semper malesuada ante.\r\n        Vestibulum id metus ac nisl bibendum scelerisque non non\r\n        purus. Suspendisse varius nibh non aliquet sagittis. In\r\n        tincidunt orci sit amet elementum vestibulum. Vivamus\r\n        fermentum in arcu in aliquam. Quisque aliquam porta odio</p>\r\n        <!-- ------------------------------------------------------ -->\r\n        <h2 id=\"three\">Chap three</h2>\r\n        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\n        Nam eu sem tempor, varius quam at, luctus dui. Mauris magna\r\n        metus, dapibus nec turpis vel, semper malesuada ante.\r\n        Vestibulum id metus ac nisl bibendum scelerisque non non\r\n        purus. Suspendisse varius nibh non aliquet sagittis. In\r\n        tincidunt orci sit amet elementum vestibulum. Vivamus\r\n        fermentum in arcu in aliquam. Quisque aliquam porta odio</p>', 'astext', '1', '0', '0', '04/01/2021, 12:00:42', '1'),
(8, '_dav.me_189341609758478.doc', 'aspdf', '1', '0', '0', '04/01/2021, 12:07:58', '1'),
(9, '<h2 id=\"one\">Chap One</h2>\r\n        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\n        Nam eu sem tempor, varius quam at, luctus dui. Mauris magna\r\n        metus, dapibus nec turpis vel, semper malesuada ante.\r\n        Vestibulum id metus ac nisl bibendum scelerisque non non\r\n        purus. Suspendisse varius nibh non aliquet sagittis. In\r\n        tincidunt orci sit amet elementum vestibulum. Vivamus\r\n        fermentum in arcu in aliquam. Quisque aliquam porta odio</p>\r\n        <!-- ----------------------------------------------------- -->\r\n        <h2 id=\"two\">Chap two</h2>\r\n        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\n        Nam eu sem tempor, varius quam at, luctus dui. Mauris magna\r\n        metus, dapibus nec turpis vel, semper malesuada ante.\r\n        Vestibulum id metus ac nisl bibendum scelerisque non non\r\n        purus. Suspendisse varius nibh non aliquet sagittis. In\r\n        tincidunt orci sit amet elementum vestibulum. Vivamus\r\n        fermentum in arcu in aliquam. Quisque aliquam porta odio</p>\r\n        <!-- ------------------------------------------------------ -->\r\n        <h2 id=\"three\">Chap three</h2>\r\n        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\n        Nam eu sem tempor, varius quam at, luctus dui. Mauris magna\r\n        metus, dapibus nec turpis vel, semper malesuada ante.\r\n        Vestibulum id metus ac nisl bibendum scelerisque non non\r\n        purus. Suspendisse varius nibh non aliquet sagittis. In\r\n        tincidunt orci sit amet elementum vestibulum. Vivamus\r\n        fermentum in arcu in aliquam. Quisque aliquam porta odio</p>', 'astext', '1', '0', '0', '04/01/2021, 12:16:36', '1'),
(10, '<h2 id=\"one\">Chap One</h2>\r\n        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\n        Nam eu sem tempor, varius quam at, luctus dui. Mauris magna\r\n        metus, dapibus nec turpis vel, semper malesuada ante.\r\n        Vestibulum id metus ac nisl bibendum scelerisque non non\r\n        purus. Suspendisse varius nibh non aliquet sagittis. In\r\n        tincidunt orci sit amet elementum vestibulum. Vivamus\r\n        fermentum in arcu in aliquam. Quisque aliquam porta odio</p>\r\n        <!-- ----------------------------------------------------- -->\r\n        <h2 id=\"two\">Chap two</h2>\r\n        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\n        Nam eu sem tempor, varius quam at, luctus dui. Mauris magna\r\n        metus, dapibus nec turpis vel, semper malesuada ante.\r\n        Vestibulum id metus ac nisl bibendum scelerisque non non\r\n        purus. Suspendisse varius nibh non aliquet sagittis. In\r\n        tincidunt orci sit amet elementum vestibulum. Vivamus\r\n        fermentum in arcu in aliquam. Quisque aliquam porta odio</p>\r\n        <!-- ------------------------------------------------------ -->\r\n        <h2 id=\"three\">Chap three</h2>\r\n        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\n        Nam eu sem tempor, varius quam at, luctus dui. Mauris magna\r\n        metus, dapibus nec turpis vel, semper malesuada ante.\r\n        Vestibulum id metus ac nisl bibendum scelerisque non non\r\n        purus. Suspendisse varius nibh non aliquet sagittis. In\r\n        tincidunt orci sit amet elementum vestibulum. Vivamus\r\n        fermentum in arcu in aliquam. Quisque aliquam porta odio</p>', 'astext', '1', '0', '0', '04/01/2021, 12:18:10', '1'),
(11, '<h2 id=\"one\">Chap One</h2>\r\n        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\n        Nam eu sem tempor, varius quam at, luctus dui. Mauris magna\r\n        metus, dapibus nec turpis vel, semper malesuada ante.\r\n        Vestibulum id metus ac nisl bibendum scelerisque non non\r\n        purus. Suspendisse varius nibh non aliquet sagittis. In\r\n        tincidunt orci sit amet elementum vestibulum. Vivamus\r\n        fermentum in arcu in aliquam. Quisque aliquam porta odio</p>\r\n        <!-- ----------------------------------------------------- -->\r\n        <h2 id=\"two\">Chap two</h2>\r\n        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\n        Nam eu sem tempor, varius quam at, luctus dui. Mauris magna\r\n        metus, dapibus nec turpis vel, semper malesuada ante.\r\n        Vestibulum id metus ac nisl bibendum scelerisque non non\r\n        purus. Suspendisse varius nibh non aliquet sagittis. In\r\n        tincidunt orci sit amet elementum vestibulum. Vivamus\r\n        fermentum in arcu in aliquam. Quisque aliquam porta odio</p>\r\n        <!-- ------------------------------------------------------ -->\r\n        <h2 id=\"three\">Chap three</h2>\r\n        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\n        Nam eu sem tempor, varius quam at, luctus dui. Mauris magna\r\n        metus, dapibus nec turpis vel, semper malesuada ante.\r\n        Vestibulum id metus ac nisl bibendum scelerisque non non\r\n        purus. Suspendisse varius nibh non aliquet sagittis. In\r\n        tincidunt orci sit amet elementum vestibulum. Vivamus\r\n        fermentum in arcu in aliquam. Quisque aliquam porta odio</p>', 'astext', '1', '0', '0', '04/01/2021, 12:20:35', '1'),
(12, '<p><b>heddjge</b></p><p><b>knfjfnnfnfnfnfnfnf</b></p><p><b>deddddddddddddddddd</b></p><p><b>ddddd</b></p>', 'astext', '1', '0', '0', '07/01/2021, 12:09:17', '1'),
(13, '_dav.me_61271610205633.pdf', 'aspdf', '1', '0', '0', '09/01/2021, 16:20:33', '1'),
(14, '_dav.me_143671610205708.pdf', 'aspdf', '1', '0', '0', '09/01/2021, 16:21:49', '1'),
(15, '_dav.me_186951610205840.pdf', 'aspdf', '1', '0', '0', '09/01/2021, 16:24:00', '1'),
(16, '_dav.me_121821610207046.pdf', 'aspdf', '1', '0', '0', '09/01/2021, 16:44:06', '1'),
(17, '_dav.me_78971610207223.pdf', 'aspdf', '1', '0', '0', '09/01/2021, 16:47:03', '1'),
(18, '_dav.me_97751610210218.pdf', 'aspdf', '1', '0', '0', '09/01/2021, 17:36:58', '1'),
(19, '_dav.me_35781610210421.pdf', 'aspdf', '1', '0', '0', '09/01/2021, 17:40:21', '1'),
(20, '_dav.me_24851610210468.pdf', 'aspdf', '1', '0', '0', '09/01/2021, 17:41:08', '1'),
(21, '_dav.me_19961610468199.pdf', 'aspdf', '0', '0', '0', '12/01/2021, 17:16:39', '1'),
(22, '_dav.me_41701610468242.pdf', 'aspdf', '0', '0', '0', '12/01/2021, 17:17:22', '1'),
(23, '_dav.me_148461610468283.pdf', 'aspdf', '0', '0', '0', '12/01/2021, 17:18:03', '1'),
(24, '_dav.me_137451610468563.pdf', 'aspdf', '0', '0', '0', '12/01/2021, 17:22:44', '1'),
(25, '_dav.me_164881610468673.pdf', 'aspdf', '0', '0', '0', '12/01/2021, 17:24:33', '1'),
(26, '_dav.me_159021611063792.pdf', 'aspdf', '1', '0', '0', '19/01/2021, 14:43:12', '1'),
(27, '_dav.me_21401611063830.pdf', 'aspdf', '1', '0', '0', '19/01/2021, 14:43:51', '1'),
(28, '_dav.me_145551611063881.pdf', 'aspdf', '1', '0', '0', '19/01/2021, 14:44:41', '1'),
(29, '_dav.me_130251611144752.pdf', 'aspdf', '23', '0', '0', '20/01/2021, 13:12:32', '1'),
(30, '_dav.me_159581611145318.pdf', 'aspdf', '23', '0', '0', '20/01/2021, 13:21:58', '1'),
(31, '_dav.me_81111611146764.pdf', 'aspdf', '23', '0', '0', '20/01/2021, 13:46:04', '1'),
(32, '_dav.me_66191611156713.pdf', 'aspdf', '23', '0', '0', '20/01/2021, 16:31:53', '1');

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
(2, 'le monde du 21 siã¸cle ', 90, '600', 0, 'nous sommes une platforme charger de former les personnes dans diffã©rents domaines du leadership oeuvrant dans la ville de goma en rã©publique dã©mocratique du congo', 5, 2, 2, 6, '', '0', '0', '04/01/2021, 11:11:26', '0'),
(3, 'la technologie au cå“ur du monde', 90, '600', 1, 'nous sommes une platforme charger de former les personnes dans diffã©rents domaines du leadership oeuvrant dans la ville de goma en rã©publique dã©mocratique du congo', 0, 3, 2, 2, '0', '0', '0', '04/01/2021, 11:18:43', '1'),
(4, 'le monde d\'aujourd\'hui', 90, '600', 1, 'nous sommes une platforme charger de former les personnes dans diffã©rents domaines du leadership oeuvrant dans la ville de goma en rã©publique dã©mocratique du congo', 0, 4, 2, 2, '0', '0', '0', '04/01/2021, 11:20:42', '1'),
(12, 'logistic', 5, '120', 0, 'gestion de stock', 24, 12, 1, 1, '1', '0', '0', '07/01/2021, 12:09:17', '1');

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

INSERT INTO `tbl_etudiant` (`id`, `nom`, `postnom`, `prenom`, `genre`, `email`, `pwd`, `telephone`, `accesslevel`, `createby`, `modifiedby`, `deletedby`, `createdon`, `datastatus`) VALUES
(1, 'ibrahim', 'Bagalwa', 'Bagalwa', 'masculin', 'bagalwa@gmail.com', '9a6220cfc36021e3687463b678776d5d', '+234987654321', 1122, '4a2f59f3132ea94f32b4e33572f02ac3', '0', '0', '19/01/2021, 15:50:56', '1'),
(2, 'david', 'maene', 'maene', 'masculin', 'davidmened@gmail.com', '9a6220cfc36021e3687463b678776d5d', '+243970284772', 1122, '4a2f59f3132ea94f32b4e33572f02ac3', '0', '0', '19/01/2021, 15:51:26', '1'),
(100, 'david', 'maene', 'maene', 'masculin', 'davidmaned@gmail.com', '9a6220cfc36021e3687463b678776d5d', '+243970284772', 1122, '4a2f59f3132ea94f32b4e33572f02ac3', '0', '0', '20/01/2021, 17:34:29', '1');

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
  `onlineOrOffline` varchar(60) NOT NULL,
  `adresseSuplyer` text NOT NULL,
  `nameCenter` varchar(60) NOT NULL,
  `placeCenter` varchar(60) NOT NULL,
  `typeSuply` varchar(60) NOT NULL,
  `createby` varchar(60) NOT NULL,
  `modifiedby` varchar(60) NOT NULL,
  `deletedby` varchar(60) NOT NULL,
  `createdon` varchar(60) NOT NULL,
  `datastatus` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_etudier`
--

INSERT INTO `tbl_etudier` (`id`, `idEtudiant`, `idCours`, `shaCours`, `remaningTime`, `status`, `onlineOrOffline`, `adresseSuplyer`, `nameCenter`, `placeCenter`, `typeSuply`, `createby`, `modifiedby`, `deletedby`, `createdon`, `datastatus`) VALUES
(1, 2, 1, 'X2Rhdi5tZTpyZWl0ZWMtMS0y', 10, 1, 'online', 'Q. Murara Av. Uvira ', '', '', 'individuel', '2', '0', '0', '20/01/2021, 06:59:32', '1'),
(4, 2, 3, 'X2Rhdi5tZTpyZWl0ZWMtMy0y', 42, 0, 'online', 'Q Office 2 AV. virunga ', '', '', 'individuel', '2', '0', '0', '20/01/2021, 12:00:28', '1'),
(6, 1, 1, 'X2Rhdi5tZTpyZWl0ZWMtMS0x', 10, 0, 'online', 'himbi', '', '', 'individuel', '1', '0', '0', '20/01/2021, 12:37:33', '1'),
(8, 1, 8, 'X2Rhdi5tZTpyZWl0ZWMtOC0x', 0, 1, 'online', 'himbi', '', '', 'individuel', '1', '0', '0', '20/01/2021, 12:45:55', '1'),
(18, 1, 7, 'X2Rhdi5tZTpyZWl0ZWMtNy0x', 0, 0, 'online', 'himbi', '', '', 'individuel', '1', '0', '0', '20/01/2021, 16:10:29', '0'),
(19, 100, 5, 'X2Rhdi5tZTpyZWl0ZWMtNS0xMDA=', 42, 1, 'online', 'Q. Murara Av. Uvira Office 2', '', '', 'individuel', '100', '0', '0', '20/01/2021, 17:34:29', '1'),
(20, 2, 2, 'X2Rhdi5tZTpyZWl0ZWMtNy0y', 1, 0, 'offline', 'Q. Murara Av. Uvira Office 2', 'reitec', 'Bunia', 'organisation', '2', '0', '0', '20/01/2021, 22:16:12', '1'),
(21, 100, 2, 'X2Rhdi5tZTpyZWl0ZWMtMi0xMDA=', 10, 0, 'online', 'cdcdcdcd', '', '', 'individuel', '100', '0', '0', '21/01/2021, 09:48:35', '1'),
(22, 1, 2, 'X2Rhdi5tZTpyZWl0ZWMtMi0x', 10, 0, 'offline', 'himbi', 'reitec', 'Goma', 'organisation', '1', '0', '0', '21/01/2021, 13:12:41', '1');

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
(4, 'soweb', 'gra', 'logo.png', '243993392929', 'sowebgra@gmail.com', 'feminin', 13000, '', '9a6220cfc36021e3687463b678776d5d', '1', '0', '0', '31/12/2020, 18:07:08', '1'),
(23, 'david', 'maene', 'logo.png', '+234987654321', 'davidmaned@gmail.com', 'masculin', 19000, '', '9a6220cfc36021e3687463b678776d5d', '4', '0', '0', '19/01/2021, 16:12:41', '1'),
(24, 'ibrahim', 'bagalwa', 'logo.png', '+234987654321', 'bagalwa@gmail.com', 'masculin', 19000, '', '9a6220cfc36021e3687463b678776d5d', '4', '0', '0', '19/01/2021, 16:14:14', '1');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_formation`
--

CREATE TABLE `tbl_formation` (
  `id` int(11) NOT NULL,
  `idcateg` int(11) NOT NULL,
  `idsubcateg` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `datestart` varchar(60) NOT NULL,
  `dateend` varchar(60) NOT NULL,
  `idfacilitateur` int(11) NOT NULL,
  `couts` varchar(60) NOT NULL,
  `isactivate` int(11) NOT NULL,
  `idcontent` int(11) NOT NULL,
  `synthese` text NOT NULL,
  `isattributed` int(11) NOT NULL,
  `createby` varchar(60) NOT NULL,
  `modifiedby` varchar(60) NOT NULL,
  `deletedby` varchar(60) NOT NULL,
  `createdon` varchar(60) NOT NULL,
  `datastatus` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_formation`
--

INSERT INTO `tbl_formation` (`id`, `idcateg`, `idsubcateg`, `title`, `datestart`, `dateend`, `idfacilitateur`, `couts`, `isactivate`, `idcontent`, `synthese`, `isattributed`, `createby`, `modifiedby`, `deletedby`, `createdon`, `datastatus`) VALUES
(2, 4, 15, 'Leader dans le monde', '2021-01-28', '2021-02-07', 0, '25', 1, 22, 'cette fiche doit &ecirc;tre compl&eacute;t&eacute;e et nous le renvoyer &agrave; titre d&rsquo;information sur la qualit&eacute; des s&eacute;minaristes &agrave;  former\r\nle monde du leadership demande autant d\'effort', 0, '0', '0', '0', '12/01/2021, 17:17:22', '1'),
(3, 4, 15, 'Academy me', '2021-01-31', '2021-03-14', 0, '25', 1, 23, 'cette fiche doit &ecirc;tre compl&eacute;t&eacute;e et nous le renvoyer &agrave; titre d&rsquo;information sur la qualit&eacute; des s&eacute;minaristes &agrave;  former\r\nle monde du leadership demande autant d\'effort', 0, '0', '0', '0', '12/01/2021, 17:18:03', '0'),
(5, 1, 1, 'gestion de carburant', '2021-01-31', '2021-03-14', 0, '25', 1, 25, 'cette fiche doit &ecirc;tre compl&eacute;t&eacute;e et nous le renvoyer &agrave; titre d&rsquo;information sur la qualit&eacute; des s&eacute;minaristes &agrave;  former\r\nle monde du leadership demande autant d\'effort', 0, '0', '0', '0', '12/01/2021, 17:24:33', '1'),
(7, 2, 2, 'excell m', '2021-01-18', '2021-01-20', 4, '600', 1, 27, 'sgsvssvxsxvsxvsxvsxgsxsgsgsssssssssssssssssxsxsxvsxvsxvsxvsx', 1, '1', '0', '0', '19/01/2021, 14:43:50', '0');

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
(3, 'ibrahim@gmail.com', '0', '0', '0', '05/01/2021, 14:58:11', '1'),
(18, 'davi@gmail.com', '0', '0', '0', '06/01/2021, 14:05:58', '1'),
(19, 'erereref@hjh.yu', '0', '0', '0', '06/01/2021, 15:23:48', '1'),
(22, 'davi@gmail.comd', '0', '0', '0', '09/01/2021, 12:05:19', '1');

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
(2, 'Excell avanc&eacute;', 2, '', '', '', '', '1'),
(3, 'Securit&eacute;', 1, '', '', '', '', '1'),
(4, 'Excell', 2, '', '', '', '', '1'),
(5, 'Le ressources humaines', 1, '', '', '', '', '1'),
(6, 'Windows', 2, '', '', '', '', '1'),
(7, 'Gestion de projet', 1, '', '', '', '', '1'),
(8, 'Office', 2, '', '', '', '', '1'),
(9, 'Suivi &eagrave;valuation des projets', 1, '', '', '', '', '1'),
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
-- Index pour la table `tbl_formation`
--
ALTER TABLE `tbl_formation`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `tbl_content`
--
ALTER TABLE `tbl_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `tbl_cours`
--
ALTER TABLE `tbl_cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `tbl_etudiant`
--
ALTER TABLE `tbl_etudiant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT pour la table `tbl_etudier`
--
ALTER TABLE `tbl_etudier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `tbl_facilitateur`
--
ALTER TABLE `tbl_facilitateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `tbl_formation`
--
ALTER TABLE `tbl_formation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `tbl_newsletter`
--
ALTER TABLE `tbl_newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
