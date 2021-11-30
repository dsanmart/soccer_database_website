-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 29, 2021 at 06:11 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soccer`
--

-- --------------------------------------------------------

--
-- Table structure for table `amateur/professional`
--

CREATE TABLE `amateur/professional` (
  `player_id` int(11) NOT NULL,
  `Salary` int(11) NOT NULL,
  `Start date` date NOT NULL,
  `end date` int(11) NOT NULL,
  `amateur/professional` tinyint(1) NOT NULL,
  `hobbies` varchar(50) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `Institute` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `event_type`
--

CREATE TABLE `event_type` (
  `Event_id` int(3) NOT NULL,
  `player_id` int(3) NOT NULL,
  `match_id` int(3) NOT NULL,
  `Minute` int(2) NOT NULL,
  `Attempt` tinyint(1) NOT NULL,
  `Attempt_on_target` tinyint(1) NOT NULL,
  `Failed_pass` tinyint(1) NOT NULL,
  `Tackle` tinyint(1) NOT NULL,
  `Yellow_card` tinyint(1) NOT NULL,
  `Red_card` tinyint(1) NOT NULL,
  `Foul` tinyint(1) NOT NULL,
  `Missed_Penalty` tinyint(1) NOT NULL,
  `Goal` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_type`
--

INSERT INTO `event_type` (`Event_id`, `player_id`, `match_id`, `Minute`, `Attempt`, `Attempt_on_target`, `Failed_pass`, `Tackle`, `Yellow_card`, `Red_card`, `Foul`, `Missed_Penalty`, `Goal`) VALUES
(8, 24, 2, 3, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(9, 24, 2, 15, 1, 1, 0, 0, 0, 0, 0, 0, 1),
(10, 21, 2, 19, 1, 1, 0, 0, 0, 0, 0, 0, 1),
(11, 24, 2, 27, 1, 1, 0, 0, 0, 0, 0, 0, 1),
(12, 21, 2, 70, 1, 1, 0, 0, 0, 0, 0, 0, 1),
(13, 24, 2, 62, 1, 1, 0, 0, 0, 0, 0, 0, 1),
(14, 19, 2, 40, 1, 1, 0, 0, 0, 0, 0, 0, 1),
(15, 18, 2, 44, 1, 1, 0, 0, 0, 0, 0, 0, 1),
(16, 20, 2, 75, 1, 1, 0, 0, 0, 0, 0, 0, 1),
(17, 20, 2, 86, 1, 1, 0, 0, 0, 0, 0, 0, 1),
(18, 18, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 1),
(19, 18, 1, 43, 1, 1, 0, 0, 0, 0, 0, 0, 1),
(20, 24, 1, 90, 0, 0, 0, 0, 1, 0, 0, 0, 0),
(21, 57, 2, 19, 0, 0, 0, 1, 1, 0, 1, 0, 0),
(22, 57, 2, 65, 0, 0, 0, 1, 1, 1, 1, 0, 0),
(23, 65, 2, 87, 0, 0, 0, 1, 0, 1, 1, 0, 0),
(24, 59, 2, 35, 0, 0, 0, 1, 1, 0, 1, 0, 0),
(25, 63, 2, 72, 0, 0, 0, 1, 1, 0, 1, 0, 0),
(36, 12, 3, 12, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(37, 80, 3, 16, 0, 1, 0, 0, 1, 0, 0, 0, 0),
(38, 73, 3, 29, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(39, 24, 3, 35, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(40, 24, 3, 44, 0, 0, 0, 0, 1, 0, 0, 0, 0),
(41, 13, 3, 47, 0, 0, 0, 0, 1, 0, 0, 0, 0),
(42, 20, 3, 51, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(43, 72, 3, 54, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(44, 75, 3, 66, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(45, 15, 3, 69, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(46, 17, 3, 71, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(47, 24, 3, 80, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(48, 84, 3, 87, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(49, 19, 3, 90, 0, 0, 0, 0, 1, 0, 0, 0, 0),
(51, 68, 6, 15, 1, 1, 0, 0, 0, 0, 0, 0, 1),
(52, 57, 6, 19, 0, 0, 0, 1, 0, 1, 1, 0, 0),
(53, 88, 6, 27, 0, 0, 0, 1, 1, 0, 1, 0, 0),
(54, 68, 6, 40, 1, 1, 0, 0, 0, 0, 0, 0, 1),
(55, 64, 6, 27, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(56, 68, 6, 89, 1, 1, 0, 0, 0, 0, 0, 0, 1),
(57, 63, 6, 22, 1, 1, 0, 0, 0, 0, 0, 0, 1),
(58, 64, 7, 68, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(59, 64, 7, 90, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(60, 57, 7, 60, 0, 0, 0, 1, 0, 1, 1, 0, 0),
(61, 60, 7, 44, 0, 0, 0, 1, 1, 0, 1, 0, 0),
(62, 60, 7, 85, 0, 0, 0, 1, 1, 1, 1, 0, 0),
(63, 19, 7, 90, 1, 1, 0, 0, 0, 0, 0, 0, 1),
(64, 29, 8, 25, 0, 0, 0, 1, 1, 0, 1, 0, 0),
(65, 34, 8, 40, 1, 1, 0, 0, 0, 0, 0, 0, 1),
(66, 29, 8, 48, 0, 0, 0, 1, 1, 1, 1, 0, 0),
(67, 24, 8, 60, 1, 1, 0, 0, 0, 0, 0, 0, 1),
(68, 25, 8, 78, 0, 0, 0, 1, 0, 1, 1, 0, 0),
(69, 19, 8, 85, 1, 1, 0, 0, 0, 0, 0, 0, 1),
(70, 36, 8, 7, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(71, 24, 8, 18, 1, 1, 0, 0, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `match`
--

CREATE TABLE `match` (
  `Match_id` int(3) NOT NULL,
  `Season_id` int(3) NOT NULL,
  `Date` date NOT NULL,
  `Place` varchar(50) NOT NULL,
  `Local_team` int(11) NOT NULL,
  `Away_team` int(11) NOT NULL,
  `Winner_team` int(11) NOT NULL,
  `Extra_time` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `match`
--

INSERT INTO `match` (`Match_id`, `Season_id`, `Date`, `Place`, `Local_team`, `Away_team`, `Winner_team`, `Extra_time`) VALUES
(1, 1, '2021-09-01', 'Santiago Bernabeu', 2, 1, 1, 0),
(2, 1, '2021-09-08', 'Wanda Metropolitano', 1, 2, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `Match_id` int(3) NOT NULL,
  `Season_id` int(3) NOT NULL,
  `Date` date NOT NULL,
  `Place` varchar(50) NOT NULL,
  `Local_team` int(11) NOT NULL,
  `Away_team` int(11) NOT NULL,
  `Winner_team` int(11) NOT NULL,
  `Extra_time` tinyint(1) NOT NULL,
  `Draw` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`Match_id`, `Season_id`, `Date`, `Place`, `Local_team`, `Away_team`, `Winner_team`, `Extra_time`, `Draw`) VALUES
(1, 1, '2021-09-01', 'Santiago Bernabeu', 1, 2, 1, 0, 0),
(2, 1, '2021-09-08', 'Wanda Metropolitano', 2, 1, 2, 0, 0),
(3, 1, '2021-10-01', 'Wanda Metropolitano', 1, 3, 1, 1, 0),
(4, 1, '2021-10-08', 'Camp Nou', 3, 1, 1, 1, 0),
(5, 1, '2021-11-01', 'Camp Nou', 3, 2, 3, 1, 0),
(6, 1, '2021-11-08', 'Santiago bernabeu', 2, 3, 0, 1, 1),
(7, 1, '2021-12-01', 'Santiago Bernabeu', 2, 7, 1, 0, 0),
(8, 1, '2021-11-08', 'Wanda Metropolitano', 1, 4, 2, 0, 0),
(9, 1, '2021-11-01', 'Reale Arena', 5, 1, 1, 1, 0),
(10, 1, '2021-10-11', 'Wanda Metropolitano', 1, 6, 1, 0, 0),
(11, 1, '2021-09-13', 'Estadio de Vallecas', 8, 1, 1, 0, 0),
(12, 1, '2021-09-21', 'Wanda Metropolitano', 1, 9, 1, 0, 0),
(13, 1, '2021-10-31', 'Wanda Metropolitano', 1, 10, 1, 0, 0),
(14, 1, '2021-12-01', 'Levante UD', 11, 1, 1, 0, 0),
(15, 1, '2021-09-12', 'Wanda Metropolitano', 1, 12, 1, 0, 0),
(16, 1, '2021-09-21', 'Coliseum Alfonso Perez', 12, 1, 1, 0, 0),
(17, 1, '2021-08-25', 'Wanda Metropolitano', 1, 8, 1, 0, 0),
(18, 1, '2021-09-21', 'Ramon Sanchez-Pizjuan', 4, 1, 1, 0, 0),
(19, 1, '2021-09-21', 'Old Trafford', 6, 1, 1, 0, 0),
(20, 1, '2021-09-21', 'Wanda Metropolitano', 1, 5, 1, 0, 0),
(21, 1, '2021-09-21', 'Balaidos', 10, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `player_career_teams`
--

CREATE TABLE `player_career_teams` (
  `player_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `Start_date` int(4) NOT NULL,
  `end_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `player_career_teams`
--

INSERT INTO `player_career_teams` (`player_id`, `team_id`, `Start_date`, `end_date`) VALUES
(98, 4, 2017, 2023),
(42, 5, 2018, 2022),
(40, 5, 2019, 2023),
(48, 5, 2017, 2022),
(97, 4, 2017, 2021),
(53, 5, 2020, 2023),
(41, 5, 2017, 2021),
(20, 1, 2019, 2023),
(68, 3, 2020, 2026);

-- --------------------------------------------------------

--
-- Table structure for table `player_pers_info`
--

CREATE TABLE `player_pers_info` (
  `player_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Weight` int(11) NOT NULL,
  `Height` int(11) NOT NULL,
  `Date of birth` date NOT NULL,
  `N national matches` int(11) NOT NULL,
  `N international matches` int(11) NOT NULL,
  `Amateur/Professional` tinyint(1) NOT NULL,
  `playerpng` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `player_pers_info`
--

INSERT INTO `player_pers_info` (`player_id`, `team_id`, `Name`, `Weight`, `Height`, `Date of birth`, `N national matches`, `N international matches`, `Amateur/Professional`, `playerpng`) VALUES
(11, 1, 'Jan Oblak', 87, 2, '1993-01-07', 241, 30, 0, 'janoblak_pic.jpeg'),
(12, 1, 'Kieran Trippier', 71, 2, '1990-09-19', 321, 45, 0, 'kierantrippier_pic.jpeg'),
(13, 1, 'Mario Hermoso', 81, 2, '1989-04-02', 149, 21, 0, 'mariohermoso_pic.jpeg'),
(14, 1, 'Stefan Savic', 75, 2, '1995-02-03', 324, 12, 0, 'stefansavic_pic.jpeg'),
(15, 1, 'JoseMaria Gimenez', 80, 2, '1992-04-08', 376, 21, 0, 'josemariagimenez_pic.jpeg'),
(16, 1, 'Jorge Koke', 72, 2, '1989-02-09', 437, 32, 0, 'jorgekoke_pic.jpeg'),
(17, 1, 'Marcos Llorente', 72, 2, '1993-07-03', 228, 33, 0, 'marcosllorente_pic.jpeg'),
(18, 1, 'Yannick Carrasco', 73, 2, '1991-12-01', 324, 12, 0, 'yannickcarrasco_pic.jpeg'),
(19, 1, 'Luis Suarez', 107, 2, '1987-02-01', 456, 32, 0, 'luissuarez_pic.jpeg'),
(20, 1, 'Angel Correa', 68, 2, '1994-02-16', 249, 12, 0, 'correa_pic.jpeg'),
(21, 1, 'Antoine Griezmann', 73, 2, '1991-02-19', 398, 35, 0, 'antoinegriezmann_pic.jpeg'),
(22, 1, 'Rodrigo DePaul', 76, 2, '1992-12-24', 325, 32, 0, 'rodrigodepaul_pic.jpeg'),
(23, 1, 'Thomas Lemar', 71, 2, '1994-11-21', 213, 20, 0, 'thomaslemar_pic.jpeg'),
(24, 1, 'Joao Felix', 72, 2, '2001-11-23', 123, 7, 0, 'joaofelix_pic.jpeg'),
(25, 4, 'Marco Dmitrovic', 81, 194, '1992-01-24', 132, 79, 0, 'marcodmitrovic_pic.jpeg'),
(26, 4, 'Jesus Navas', 64, 172, '1985-11-21', 426, 47, 0, 'jesusnavas_pic.jpeg'),
(27, 4, 'Marcos Acuna', 72, 172, '1991-10-28', 42, 85, 0, 'marcosacuna_pic.jpeg'),
(28, 4, 'Diego Carlos', 79, 184, '1993-03-15', 190, 15, 0, 'diegocarlos_pic.jpeg'),
(29, 4, 'Jules Kounde', 70, 178, '1998-11-12', 73, 7, 0, 'juleskounde_pic.jpeg'),
(30, 4, 'Fernando Rege', 74, 183, '1987-07-25', 412, 234, 0, 'fernandoreges_pic.jpeg'),
(31, 4, 'Ever Banega', 71, 174, '1998-06-29', 315, 28, 0, 'everbanega_pic.jpeg'),
(32, 4, 'Joan Jordan', 78, 184, '1994-07-06', 165, 35, 0, 'joanjordan_pic.jpeg'),
(33, 4, 'Oliver Torres', 70, 174, '1994-11-10', 111, 21, 0, 'olivertorres_pic.jpeg'),
(34, 4, 'Lucas Ocampos', 82, 187, '1994-07-11', 77, 26, 0, 'lucasocampos_pic.jpeg'),
(35, 4, 'Munir El Haddadi', 69, 175, '1995-09-01', 165, 28, 0, 'munirelhaddadi_pic.jpeg'),
(36, 4, 'Yassine Bounou', 81, 192, '1991-04-05', 112, 56, 0, 'yassinebounou_pic.jpeg'),
(37, 4, 'Nemanja Gudelj', 73, 187, '1991-11-16', 58, 27, 0, 'nemanjagudelj_pic.jpeg'),
(38, 4, 'Nolito', 73, 175, '1968-10-15', 225, 38, 0, 'nolito_pic.jpeg'),
(39, 4, 'Sergio Escudero', 65, 176, '1989-09-02', 176, 26, 0, 'sergioescudero_pic.jpeg'),
(40, 5, 'Alejandro Remiro', 89, 2, '1989-04-02', 149, 20, 0, 'alejandroremiro_pic.jpeg'),
(41, 5, 'Andoni Gorosabel', 72, 2, '1991-12-01', 249, 45, 0, 'andonigorosabel_pic.jpeg'),
(42, 5, 'Ahinez Muñoz', 81, 2, '1993-07-03', 241, 21, 0, 'ahinezmunoz_pic.jpeg'),
(43, 5, 'Robin Le Normand', 72, 2, '1992-12-24', 437, 7, 0, 'robinlenormand_pic.jpeg'),
(44, 5, 'Aritz Elustondo', 72, 2, '1987-02-01', 241, 21, 0, 'aritzelustondo_pic.jpeg'),
(45, 5, 'Mikel Merino', 71, 2, '1995-02-03', 325, 12, 0, 'mikelmerino_pic.jpeg'),
(46, 5, 'Martin Zubimendi', 87, 2, '1991-02-19', 149, 30, 0, 'martinzubimendi_pic.jpeg'),
(47, 5, 'David Silva', 75, 2, '1989-02-09', 437, 32, 0, 'davidsilva_pic.jpeg'),
(48, 5, 'Alexander Isak', 81, 2, '1987-02-01', 241, 20, 0, 'alexanderisak_pic.jpeg'),
(49, 5, 'Mikel Oyarzabal', 75, 2, '1994-02-16', 123, 7, 0, 'mikeloyarzabal_pic.jpeg'),
(52, 5, 'Christian Portu', 87, 2, '1987-02-01', 241, 21, 0, 'christianportu_pic.jpeg'),
(53, 5, 'Ander Berrenetxea', 72, 2, '1992-12-24', 321, 9, 0, 'ander_pic.jpeg'),
(54, 5, 'Jon Bautista', 87, 2, '1987-02-01', 241, 21, 0, 'jonbautista_pic.jpeg'),
(55, 5, 'Ignacio Monreal', 75, 2, '1994-02-16', 325, 45, 0, 'ignaciomonreal_pic.jpeg'),
(56, 2, 'Courtois', 93, 197, '1992-05-11', 98, 32, 1, 'courtois_pic.jpeg'),
(57, 2, 'Mendy', 87, 197, '1995-05-11', 78, 2, 1, 'mendy_pic.jpeg'),
(58, 2, 'Jesus Vallejo', 88, 192, '1999-09-11', 45, 1, 1, 'jesusvallejo_pic.jpeg'),
(59, 2, 'David Alaba', 84, 189, '1996-05-03', 96, 3, 1, 'davidalaba_pic.jpeg'),
(60, 2, 'Carvajal', 88, 179, '1993-12-24', 145, 23, 1, 'carvajal_pic.jpeg'),
(61, 2, 'Casemiro', 92, 188, '1996-01-22', 15, 3, 1, 'casemiro_pic.jpeg'),
(62, 2, 'Luka Modric', 79, 178, '1989-06-07', 280, 53, 1, 'lukamodric_pic.jpeg'),
(63, 2, 'Toni Kroos', 82, 183, '1991-09-27', 210, 44, 1, 'tonikroos_pic.jpeg'),
(64, 2, 'Eden Hazard', 80, 183, '1990-10-07', 234, 87, 1, 'edenhazard_pic.jpeg'),
(65, 2, 'Vinizious', 78, 183, '2000-03-29', 54, 6, 1, 'vinidios_pic.jpeg'),
(66, 2, 'Karim Benzema', 91, 185, '1986-08-19', 124, 46, 1, 'karimbenzema_pic.jpeg'),
(67, 3, 'Sergio Aguero', 87, 185, '1995-12-26', 64, 27, 1, 'sergioaguero_pic.jpeg'),
(68, 3, 'Ansu Fati', 66, 178, '2002-10-31', 80, 30, 1, 'fati_pic.jpeg'),
(69, 3, 'Ter Stegen', 85, 187, '1992-04-30', 54, 12, 1, 'terstegen_pic.jpeg'),
(70, 3, 'Neto', 87, 190, '1989-07-19', 68, 12, 1, 'neto_pic.jpeg'),
(71, 3, 'Iñaki Peña', 78, 184, '1999-08-22', 50, 30, 1, 'inakiakapea_pic.jpeg'),
(72, 3, 'Lazar Carevic', 85, 193, '2001-01-05', 39, 4, 1, 'lazarcarevic_pic.jpeg'),
(73, 3, 'Arnau Tenas', 85, 185, '2000-05-16', 12, 6, 1, 'arnautenas_pic.jpeg'),
(74, 3, 'Dest', 62, 188, '1987-07-03', 77, 21, 1, 'dest_pic.jpeg'),
(75, 3, 'Pique', 85, 193, '1999-03-31', 44, 32, 1, 'pique_pic.jpeg'),
(76, 3, 'Lenglet', 79, 194, '1995-07-08', 90, 88, 1, 'lenglet_pic.jpeg'),
(77, 3, 'Jordi Alba', 68, 163, '1989-10-07', 60, 25, 1, 'jordialba_pic.jpeg'),
(78, 3, 'Migueza', 68, 186, '1993-12-01', 34, 16, 1, 'migueza_pic.jpeg'),
(79, 3, 'Umtiti', 75, 190, '2001-05-17', 55, 27, 1, 'umtiti_pic.jpeg'),
(80, 3, 'Eric', 76, 187, '2003-02-18', 21, 21, 1, 'ericdier_pic.jpeg'),
(81, 3, 'Balde', 69, 185, '1988-09-20', 47, 34, 1, 'balde_pic.jpeg'),
(82, 3, 'Sergio', 76, 189, '1992-04-28', 67, 64, 1, 'sergiobusquets_pic.jpeg'),
(83, 3, 'Coutinho', 68, 190, '2002-11-06', 43, 32, 1, 'coutinho_pic.jpeg'),
(84, 3, 'Pedri', 60, 170, '1997-03-12', 56, 23, 1, 'pedri_pic.jpeg'),
(85, 6, 'David de Gea', 79, 180, '1990-11-10', 70, 60, 1, 'daviddegea_pic.jpeg'),
(86, 6, 'Lee Grant', 74, 182, '2002-08-27', 85, 46, 1, 'leegrant_pic.jpeg'),
(87, 6, 'Tom Heaton', 80, 179, '1994-07-11', 44, 32, 1, 'tomheaton_pic.jpeg'),
(88, 6, 'Dean Henderson', 79, 183, '1993-03-26', 123, 65, 1, 'deanhenderson_pic.jpeg'),
(89, 6, 'Matej Kovar', 81, 180, '1999-05-12', 40, 34, 1, 'matejkovar_pic.jpeg'),
(90, 6, 'Victor Lindelöf', 77, 175, '1994-12-20', 67, 65, 1, 'victorlindelof_pic.jpeg'),
(91, 6, 'Eric Bailly', 83, 188, '1997-09-02', 55, 40, 1, 'ericbailly_pic.jpeg'),
(92, 6, 'Phil Jones', 79, 183, '1993-11-10', 53, 32, 1, 'philjones_pic.jpeg'),
(93, 6, 'Harry Maguire', 75, 180, '2003-07-06', 75, 41, 0, 'harrymaguire_pic.jpeg'),
(94, 6, 'Raphaël Varane', 78, 181, '2001-10-19', 63, 54, 0, 'raphaelvarane_pic.jpeg'),
(95, 6, 'Diogo Dalot', 76, 179, '1997-01-13', 90, 56, 1, 'diogodalot_pic.jpeg'),
(96, 6, 'Luke Shaw', 83, 178, '1986-04-26', 74, 59, 1, 'lukeshaw_pic.jpeg'),
(97, 4, 'Alex Telles', 79, 190, '1998-03-24', 56, 45, 1, 'alextelles_pic.jpeg'),
(98, 4, 'Aaron Wan-Bissaka', 81, 183, '2000-06-13', 84, 74, 1, 'aaronwan-bissaka_pic.jpeg'),
(99, 6, 'Teden Mengi', 77, 177, '2004-05-08', 47, 23, 1, 'tedenmengi_pic.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `player_pos`
--

CREATE TABLE `player_pos` (
  `player_id` int(11) NOT NULL,
  `position` varchar(3) NOT NULL,
  `Start date` date NOT NULL,
  `end date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `player_pos`
--

INSERT INTO `player_pos` (`player_id`, `position`, `Start date`, `end date`) VALUES
(11, 'GK', '2014-07-01', '2022-04-12'),
(20, 'FW', '2015-07-12', '2022-04-12'),
(21, 'FW', '2014-07-05', '2022-10-09'),
(24, 'FW', '2019-07-12', '2022-10-21'),
(16, 'MF', '2010-07-05', '2022-04-12'),
(15, 'DF', '2013-02-04', '2022-10-21'),
(12, 'DF', '2017-07-05', '2022-04-12'),
(19, 'FW', '2020-07-12', '2022-10-21'),
(17, 'MF', '2018-07-05', '2022-04-12'),
(13, 'DF', '2018-07-12', '2022-10-21'),
(22, 'MF', '2021-07-05', '2022-04-12'),
(14, 'DF', '2015-07-12', '2022-10-21'),
(23, 'MF', '2018-07-12', '2022-04-12'),
(18, 'FW', '2013-02-04', '2022-10-21'),
(25, 'GK', '2018-07-15', '2022-09-11'),
(26, 'DM', '2015-10-13', '2021-03-16'),
(27, 'LB', '2016-08-16', '2023-12-12'),
(28, 'CB', '2017-10-23', '2022-08-05'),
(29, 'RB', '2018-09-11', '2023-11-05'),
(30, 'DM', '2018-04-13', '2021-11-25'),
(31, 'RM', '2018-10-08', '2023-06-14'),
(32, 'RB', '2016-09-12', '2021-06-30'),
(33, 'ST', '2016-03-12', '2022-08-22'),
(34, 'RM', '2019-09-30', '2023-01-12'),
(35, 'CM', '2017-11-30', '2024-12-03'),
(36, 'GK', '2014-02-19', '2022-09-27'),
(37, 'LM', '2018-03-17', '2022-09-22'),
(38, 'RB', '2014-11-08', '2021-12-22'),
(39, 'LF', '2017-09-12', '2022-05-12');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `team_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `stadium` varchar(30) NOT NULL,
  `logo` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  `stadiumpng` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`team_id`, `name`, `stadium`, `logo`, `location`, `stadiumpng`) VALUES
(1, 'Atletico de Madrid', 'Wanda Metropolitano', 'atletilogo.png', 'Madrid, Spain', 'atletistadium.jpeg'),
(2, 'Real Madrid', 'Santiago Bernabeu', 'QueMalHueleLogo.png', 'Madrid, Spain', 'realmadridstadium.jpeg'),
(3, 'Barcelona FC', 'Camp Nou', 'barsalogo.png', 'Barcelona, Spain', 'barcelonastadium.jpeg'),
(4, 'Sevilla FC', 'Ramon Sanchez-Pizjuan', 'sevillalogo.png', 'Sevilla, Spain', 'sevillastadium.jpeg'),
(5, 'Real Sociedad', 'Reale Arena', 'realsociedadlogo.png', 'San Sebastian, Spain', 'realsociedadstadium.jpeg'),
(6, 'Manchester United', 'Old Trafford', 'manchesterlogo.png', 'Manchester, UK', 'manchesterutd.jpeg'),
(7, 'Real Betis Balompie', 'Benito Villamarín', 'betislogo.png', 'Sevilla, Spain', 'betisstadium.jpeg'),
(8, 'Rayo Vallecano de Madrid', 'Estadio de Vallecas', 'vallecanologo.png', 'Madrid, Spain', 'vallecanostadium.jpeg'),
(9, 'Villareal', 'Estadio de la Cerámica ', 'villareallogo.png', 'Castellon, Spain', 'villarealstadium.jpeg'),
(10, 'Celta de Vigo', 'Balaidos', 'celtavigologo.png', 'Vigo, Spain', 'celtastadium.jpeg'),
(11, 'Levante', 'Levante UD', 'levantelogo.png', 'Valencia, Spain', 'levantestadium.jpeg'),
(12, 'Getafe', 'Coliseum Alfonso Perez', 'getafelogo.png', 'Getafe, Spain', 'getafestadium.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amateur/professional`
--
ALTER TABLE `amateur/professional`
  ADD KEY `player_id` (`player_id`);

--
-- Indexes for table `event_type`
--
ALTER TABLE `event_type`
  ADD PRIMARY KEY (`Event_id`);

--
-- Indexes for table `match`
--
ALTER TABLE `match`
  ADD PRIMARY KEY (`Match_id`);

--
-- Indexes for table `player_career_teams`
--
ALTER TABLE `player_career_teams`
  ADD KEY `player_id` (`player_id`);

--
-- Indexes for table `player_pers_info`
--
ALTER TABLE `player_pers_info`
  ADD PRIMARY KEY (`player_id`);

--
-- Indexes for table `player_pos`
--
ALTER TABLE `player_pos`
  ADD KEY `player_id` (`player_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event_type`
--
ALTER TABLE `event_type`
  MODIFY `Event_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `match`
--
ALTER TABLE `match`
  MODIFY `Match_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `player_pers_info`
--
ALTER TABLE `player_pers_info`
  MODIFY `player_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `amateur/professional`
--
ALTER TABLE `amateur/professional`
  ADD CONSTRAINT `amateur/professional_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `player_pers_info` (`player_id`);

--
-- Constraints for table `player_career_teams`
--
ALTER TABLE `player_career_teams`
  ADD CONSTRAINT `player_career_teams_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `player_pers_info` (`player_id`) ON UPDATE CASCADE;

--
-- Constraints for table `player_pos`
--
ALTER TABLE `player_pos`
  ADD CONSTRAINT `player_pos_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `player_pers_info` (`player_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
