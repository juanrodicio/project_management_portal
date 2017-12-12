-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 12-12-2017 a las 08:22:29
-- Versión del servidor: 5.7.19
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `project_management_portal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `Project_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Project_Name` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `Project_Description` text COLLATE utf8_spanish_ci,
  `Project_StartDate` date NOT NULL,
  `Project_FinishDate` date NOT NULL,
  `Project_Budget` int(11) DEFAULT NULL,
  `Project_Manager` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Project_ID`),
  KEY `Project_Manager` (`Project_Manager`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_group`
--

DROP TABLE IF EXISTS `project_group`;
CREATE TABLE IF NOT EXISTS `project_group` (
  `Group_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Group_Name` tinytext COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Group_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_members`
--

DROP TABLE IF EXISTS `project_members`;
CREATE TABLE IF NOT EXISTS `project_members` (
  `Project_ID` int(11) NOT NULL,
  `User_Name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Project_ID`,`User_Name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_task`
--

DROP TABLE IF EXISTS `project_task`;
CREATE TABLE IF NOT EXISTS `project_task` (
  `Task_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Task_Name` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `Task_Description` text COLLATE utf8_spanish_ci NOT NULL,
  `Task_StartDate` date NOT NULL,
  `Task_FinishDate` date NOT NULL,
  `Task_Project` int(11) NOT NULL,
  PRIMARY KEY (`Task_ID`),
  KEY `Task_Project` (`Task_Project`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `User_Name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `User_Password` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `User_Type` enum('Stakeholder','Project Manager','Pig') COLLATE utf8_spanish_ci DEFAULT NULL,
  `User_Group` int(11) NOT NULL,
  PRIMARY KEY (`User_Name`),
  KEY `User_Group` (`User_Group`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_tasks`
--

DROP TABLE IF EXISTS `user_tasks`;
CREATE TABLE IF NOT EXISTS `user_tasks` (
  `Task_ID` int(11) NOT NULL,
  `User_Name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Task_ID`,`User_Name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
