-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 23-03-2012 a las 21:57:44
-- Versión del servidor: 5.5.20
-- Versión de PHP: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ungs-player-lite`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listas`
--

CREATE TABLE IF NOT EXISTS `listas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(150) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `listas`
--

INSERT INTO `listas` (`id`, `name`, `description`, `status`, `modified`, `created`) VALUES
(1, '', '', 1, '2012-03-23 21:52:14', '2012-03-23 21:52:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listas_songs`
--

CREATE TABLE IF NOT EXISTS `listas_songs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lista_id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL,
  `played` tinyint(1) NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `songs`
--

CREATE TABLE IF NOT EXISTS `songs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=80 ;

--
-- Volcado de datos para la tabla `songs`
--

INSERT INTO `songs` (`id`, `name`, `status`, `modified`, `created`) VALUES
(1, 'Audioslave\\Audioslave\\1-Cochise.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(2, 'Audioslave\\Audioslave\\10-Hypnotize.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(3, 'Audioslave\\Audioslave\\11-Bring Em Back Alive.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(4, 'Audioslave\\Audioslave\\12-Light My Way.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(5, 'Audioslave\\Audioslave\\13-Getaway Car.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(6, 'Audioslave\\Audioslave\\14-The Last Remaining Light.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(7, 'Audioslave\\Audioslave\\2-Show Me How to Live.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(8, 'Audioslave\\Audioslave\\3-Gasoline.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(9, 'Audioslave\\Audioslave\\4-What You Are.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(10, 'Audioslave\\Audioslave\\5-Like a Stone.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(11, 'Audioslave\\Audioslave\\6-Set It Off.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(12, 'Audioslave\\Audioslave\\7-Shadow on the Sun.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(13, 'Audioslave\\Audioslave\\8-I Am the Highway.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(14, 'Audioslave\\Audioslave\\9-Exploder.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(15, 'Foo Fighters\\Nothing left to lose\\1-STACKED ACTORS.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(16, 'Foo Fighters\\Nothing left to lose\\10-AIN''T IT THE LIFE.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(17, 'Foo Fighters\\Nothing left to lose\\11-M.I.A..mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(18, 'Foo Fighters\\Nothing left to lose\\2-BREAKOUT.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(19, 'Foo Fighters\\Nothing left to lose\\3-LEARN TO FLY.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(20, 'Foo Fighters\\Nothing left to lose\\4-GIMME STITCHES.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(21, 'Foo Fighters\\Nothing left to lose\\5-GENERATOR.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(22, 'Foo Fighters\\Nothing left to lose\\6-AURORA.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(23, 'Foo Fighters\\Nothing left to lose\\7-LIVE-IN SKIN.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(24, 'Foo Fighters\\Nothing left to lose\\8-NEXT YEAR.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(25, 'Foo Fighters\\Nothing left to lose\\9-HEAD WIRES.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(26, 'Foo Fighters\\One by one\\1-ALL MY LIFE.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(27, 'Foo Fighters\\One by one\\10-BURN AWAY.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(28, 'Foo Fighters\\One by one\\11-COME BACK.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(29, 'Foo Fighters\\One by one\\12-WALKING A LINE.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(30, 'Foo Fighters\\One by one\\13-SISTER EUROPE.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(31, 'Foo Fighters\\One by one\\14-DANNY SAYS.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(32, 'Foo Fighters\\One by one\\15-LIFE OF ILLUSION.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(33, 'Foo Fighters\\One by one\\16-FOR ALL THE COWS (LIFE IN AMSTERDAM).mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(34, 'Foo Fighters\\One by one\\17-MONKEY WRENCH (LIFE IN MELBOURNE).mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(35, 'Foo Fighters\\One by one\\2-LOW.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(36, 'Foo Fighters\\One by one\\3-HAVE IT ALL.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(37, 'Foo Fighters\\One by one\\4-TIMES LIKE THIS.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(38, 'Foo Fighters\\One by one\\5-DISENCHANTED LULLABY.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(39, 'Foo Fighters\\One by one\\6-TIRED OF YOU.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(40, 'Foo Fighters\\One by one\\7-HALO.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(41, 'Foo Fighters\\One by one\\8-LONELY AS YOU.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(42, 'Foo Fighters\\One by one\\9-OVERDRIVE.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(43, 'Iron Maiden\\Powerslave\\1-Aces High.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(44, 'Iron Maiden\\Powerslave\\2-2 Minutes To Midnight.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(45, 'Iron Maiden\\Powerslave\\3-Losfer Words (Big ''Orra).mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(46, 'Iron Maiden\\Powerslave\\4-Flash Of The Blade.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(47, 'Iron Maiden\\Powerslave\\5-The Duellists.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(48, 'Iron Maiden\\Powerslave\\6-Back In The Village.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(49, 'Iron Maiden\\Powerslave\\7-Powerslave.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(50, 'Iron Maiden\\Powerslave\\8-Rime Of The Ancient Mariner.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(51, 'Metallica\\Load\\1-Ain''t my bitch.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(52, 'Metallica\\Load\\10-Wasting my hate.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(53, 'Metallica\\Load\\11-Mama said.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(54, 'Metallica\\Load\\12-Thorn within.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(55, 'Metallica\\Load\\13-Ronnie.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(56, 'Metallica\\Load\\14-The outlaw torn.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(57, 'Metallica\\Load\\2-2x4.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(58, 'Metallica\\Load\\3-The house jack built.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(59, 'Metallica\\Load\\4-Until it sleeps.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(60, 'Metallica\\Load\\5-King nothing.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(61, 'Metallica\\Load\\6-Hero of the day.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(62, 'Metallica\\Load\\7-Bleeding me.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(63, 'Metallica\\Load\\8-Cure.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(64, 'Metallica\\Load\\9-Poor twisted me.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(65, 'Metallica\\Reload\\1-Fuel.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(66, 'Metallica\\Reload\\10-Prince charming.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(67, 'Metallica\\Reload\\11-Low man''s lyric.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(68, 'Metallica\\Reload\\12-Attitude.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(69, 'Metallica\\Reload\\13-Fixxxer.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(70, 'Metallica\\Reload\\2-The memory remains.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(71, 'Metallica\\Reload\\3-Devil''s dance.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(72, 'Metallica\\Reload\\4-The unforgiven II.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(73, 'Metallica\\Reload\\5-Better than you.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(74, 'Metallica\\Reload\\6-Slither.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(75, 'Metallica\\Reload\\7-Carpe diem baby.mp3', 1, '2012-03-23 21:17:14', '2012-03-23 21:17:14'),
(78, 'Metallica\\Reload\\8-Bad sed.mp3', 1, '2012-03-23 21:17:58', '2012-03-23 21:17:58'),
(79, 'Metallica\\Reload\\9-Where the wild things are.mp3', 1, '2012-03-23 21:17:58', '2012-03-23 21:17:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(50) NOT NULL,
  `password` char(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `rol` varchar(20) NOT NULL DEFAULT 'user',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `photo`, `rol`, `status`, `modified`, `created`) VALUES
(1, 'jesus', 'ced59ea5d4a351d926a82d9cbc9124be32109c0a', 'matiastkd_14@hotmail.com', '', 'admin', 1, '2012-03-23 13:29:19', '2012-03-23 15:33:21');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
