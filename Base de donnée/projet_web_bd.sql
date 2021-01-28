-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour projet_web_bd
CREATE DATABASE IF NOT EXISTS `projet_web_bd` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `projet_web_bd`;

-- Listage de la structure de la table projet_web_bd. images
CREATE TABLE IF NOT EXISTS `images` (
  `image` varchar(100) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `id_msg` int(11) NOT NULL,
  PRIMARY KEY (`id_msg`,`image`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Listage des données de la table projet_web_bd.images : 3 rows
DELETE FROM `images`;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` (`image`, `id_msg`) VALUES
	('metroid.jpg', 33),
	('super-smash-bros-ultimate-1.jpg', 39),
	('super-smash-bros-ultimate-1.jpg', 40);
/*!40000 ALTER TABLE `images` ENABLE KEYS */;

-- Listage de la structure de la table projet_web_bd. message
CREATE TABLE IF NOT EXISTS `message` (
  `id_msg` int(11) NOT NULL AUTO_INCREMENT,
  `texte` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `nb_love` int(11) NOT NULL DEFAULT '0',
  `nb_cute` int(11) NOT NULL DEFAULT '0',
  `nb_trop_style` int(11) NOT NULL DEFAULT '0',
  `nb_swag` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_msg`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

-- Listage des données de la table projet_web_bd.message : 10 rows
DELETE FROM `message`;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` (`id_msg`, `texte`, `nb_love`, `nb_cute`, `nb_trop_style`, `nb_swag`) VALUES
	(1, 'coucou', 0, 1, 0, 0),
	(2, 'slt', 0, 0, 0, 0),
	(3, 'bg', 0, 0, 0, 0),
	(4, 'un message qui je l\'espere fait 50 caracteres xDDD', 0, 0, 0, 1),
	(5, 'new msg', 0, 0, 0, 0),
	(39, 'ssbu', 0, 0, 0, 0),
	(38, 'thomas\r\n', 0, 0, 0, 0),
	(33, 'metroid', 1, 0, 0, 0),
	(24, 'new msg 3', 0, 0, 0, 0),
	(40, 'ssbu 2', 0, 0, 0, 0);
/*!40000 ALTER TABLE `message` ENABLE KEYS */;

-- Listage de la structure de la table projet_web_bd. reaction
CREATE TABLE IF NOT EXISTS `reaction` (
  `mail` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `id_msg` int(11) NOT NULL,
  `emoji` enum('love','cute','trop_style','swag') CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_msg`,`mail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Listage des données de la table projet_web_bd.reaction : 0 rows
DELETE FROM `reaction`;
/*!40000 ALTER TABLE `reaction` DISABLE KEYS */;
/*!40000 ALTER TABLE `reaction` ENABLE KEYS */;

-- Listage de la structure de la table projet_web_bd. tag
CREATE TABLE IF NOT EXISTS `tag` (
  `texte_tag` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `id_msg` int(11) NOT NULL,
  PRIMARY KEY (`id_msg`,`texte_tag`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Listage des données de la table projet_web_bd.tag : 6 rows
DELETE FROM `tag`;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
INSERT INTO `tag` (`texte_tag`, `id_msg`) VALUES
	('love', 1),
	('rien', 1),
	('swag', 1),
	('love', 2),
	('rien', 3),
	('photo', 33);
/*!40000 ALTER TABLE `tag` ENABLE KEYS */;

-- Listage de la structure de la table projet_web_bd. utilisateur
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `mail` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `pseudo` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `mdp` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `role` enum('admin','membre') CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 'membre',
  PRIMARY KEY (`mail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Listage des données de la table projet_web_bd.utilisateur : 2 rows
DELETE FROM `utilisateur`;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` (`mail`, `pseudo`, `mdp`, `role`) VALUES
	('vanestarre@gmail.com', 'Vanestarre', '4c85f8fb6c689a638213e7bb8ce56ffc', 'admin'),
	('kekedu04@fr', 'thomas', '4c3b6c7517e9f780744f6582f2d36fb6', 'membre');
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
