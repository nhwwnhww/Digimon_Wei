-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2023 at 05:10 AM
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
-- Database: `digimon`
--

-- --------------------------------------------------------

--
-- Table structure for table `competion`
--

CREATE TABLE `competion` (
  `Competion_id` int(50) NOT NULL,
  `Win_participate_id` int(50) NOT NULL,
  `Lose_participate_id` int(50) NOT NULL,
  `Date` int(50) NOT NULL,
  `Competion_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `digimon`
--

CREATE TABLE `digimon` (
  `Digimon_id` int(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `HP` int(10) NOT NULL,
  `Attack` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `digimon`
--

INSERT INTO `digimon` (`Digimon_id`, `Name`, `Type`, `HP`, `Attack`) VALUES
(1, 'Kuramon', 'Free', 590, 79),
(2, 'Pabumon', 'Free', 950, 76),
(3, 'Punimon', 'Free', 870, 97),
(4, 'Botamon', 'Free', 690, 77),
(5, 'Poyomon', 'Free', 540, 54),
(6, 'Koromon', 'Free', 940, 109),
(7, 'Tanemon', 'Free', 1030, 85),
(8, 'Tsunomon', 'Free', 930, 107),
(9, 'Tsumemon', 'Free', 930, 108),
(10, 'Tokomon', 'Free', 640, 76),
(11, 'Nyaromon', 'Free', 540, 54),
(12, 'Pagumon', 'Free', 550, 60),
(13, 'Yokomon', 'Free', 1040, 82),
(14, 'Bukamon', 'Free', 830, 54),
(15, 'Motimon', 'Free', 1030, 82),
(16, 'Wanyamon', 'Free', 830, 79),
(17, 'Agumon', 'Vaccine', 1030, 131),
(18, 'Agumon (Blk)', 'Virus', 1020, 124),
(19, 'Armadillomon', 'Free', 1160, 67),
(20, 'Impmon', 'Virus', 530, 83),
(21, 'Elecmon', 'Data', 930, 82),
(22, 'Otamamon', 'Virus', 930, 52),
(23, 'Gaomon', 'Data', 1030, 118),
(24, 'Gazimon', 'Virus', 970, 123),
(25, 'Gabumon', 'Data', 980, 94),
(26, 'Gabumon (Blk)', 'Virus', 950, 99),
(27, 'Guilmon', 'Virus', 1050, 133),
(28, 'Kudamon', 'Vaccine', 590, 53),
(29, 'Keramon', 'Free', 1030, 123),
(30, 'Gotsumon', 'Data', 790, 93),
(31, 'Goblimon', 'Virus', 1050, 115),
(32, 'Gomamon', 'Vaccine', 1160, 93),
(33, 'Syakomon', 'Virus', 870, 53),
(34, 'Solarmon', 'Vaccine', 1030, 69),
(35, 'Terriermon', 'Vaccine', 690, 84),
(36, 'Tentomon', 'Vaccine', 750, 86),
(37, 'ToyAgumon', 'Vaccine', 1110, 72),
(38, 'Dorumon', 'Data', 1020, 128),
(39, 'Hagurumon', 'Virus', 1090, 66),
(40, 'Patamon', 'Data', 880, 79),
(41, 'Hackmon', 'Data', 1030, 118),
(42, 'Palmon', 'Data', 1140, 103),
(43, 'DemiDevimon', 'Virus', 650, 89),
(44, 'Biyomon', 'Vaccine', 830, 85),
(45, 'Falcomon', 'Vaccine', 740, 94),
(46, 'Veemon', 'Free', 1040, 130),
(47, 'Salamon', 'Vaccine', 540, 59),
(48, 'Betamon', 'Virus', 870, 61),
(49, 'Hawkmon', 'Free', 690, 99),
(50, 'Lalamon', 'Data', 1100, 87),
(51, 'Lucemon', 'Vaccine', 1230, 59),
(52, 'Renamon', 'Data', 930, 89),
(53, 'Lopmon', 'Data', 790, 103),
(54, 'Wormmon', 'Free', 760, 92),
(55, 'IceDevimon', 'Virus', 990, 140),
(56, 'Aquilamon', 'Free', 840, 109),
(57, 'Ankylomon', 'Free', 1330, 89),
(58, 'Ikkakumon', 'Vaccine', 1330, 118),
(59, 'Wizardmon', 'Data', 690, 74),
(60, 'Woodmon', 'Virus', 1480, 109),
(61, 'ExVeemon', 'Free', 1030, 104),
(62, 'Angemon', 'Vaccine', 940, 128),
(63, 'Ogremon', 'Virus', 1230, 155),
(64, 'Guardromon', 'Virus', 990, 108),
(65, 'GaoGamon', 'Data', 740, 109),
(66, 'Kabuterimon', 'Vaccine', 890, 108),
(67, 'ShellNumemon', 'Virus', 1280, 79),
(68, 'Gargomon', 'Vaccine', 1030, 109),
(69, 'Garurumon', 'Vaccine', 890, 99),
(70, 'Garurumon (Blk)', 'Virus', 890, 109),
(71, 'Kyubimon', 'Data', 740, 59),
(72, 'Growlmon', 'Virus', 1180, 143),
(73, 'Kurisarimon', 'Free', 1280, 153),
(74, 'Greymon', 'Vaccine', 1230, 148),
(75, 'Greymon (Blue)', 'Virus', 1280, 153),
(76, 'Clockmon', 'Data', 1030, 64),
(77, 'Kuwagamon', 'Virus', 1180, 153),
(78, 'Gekomon', 'Virus', 1130, 68),
(79, 'Geremon', 'Virus', 1380, 104),
(80, 'GoldNumemon', 'Virus', 1130, 59),
(81, 'Cyclonemon', 'Virus', 940, 131),
(82, 'Sunflowmon', 'Data', 1180, 64),
(83, 'Seadramon', 'Data', 1080, 64),
(84, 'GeoGreymon', 'Vaccine', 1330, 143),
(85, 'Sukamon', 'Virus', 1430, 89),
(86, 'Starmon', 'Data', 1080, 104),
(87, 'Stingmon', 'Free', 1130, 143),
(88, 'Socerimon', 'Vaccine', 1030, 64),
(89, 'Tankmon', 'Data', 940, 113),
(90, 'Tyrannomon', 'Data', 1230, 148),
(91, 'Gatomon', 'Vaccine', 640, 69),
(92, 'Devimon', 'Virus', 990, 133),
(93, 'Togemon', 'Data', 1330, 108),
(94, 'Dorugamon', 'Data', 1180, 138),
(95, 'Nanimon', 'Virus', 1070, 108),
(96, 'Numemon', 'Virus', 1380, 84),
(97, 'Birdramon', 'Vaccine', 940, 94),
(98, 'Bakemon', 'Virus', 590, 64),
(99, 'Veedramon', 'Vaccine', 1180, 138),
(100, 'PlatinumSukamon', 'Virus', 1380, 79),
(101, 'BlackGatomon', 'Virus', 690, 84),
(102, 'Vegiemon', 'Virus', 1380, 113),
(103, 'Peckmon', 'Vaccine', 790, 104),
(104, 'Meramon', 'Data', 1130, 138),
(105, 'Frigimon', 'Vaccine', 1380, 103),
(106, 'Leomon', 'Vaccine', 1180, 143),
(107, 'Reppamon', 'Vaccine', 790, 94),
(108, 'Waspmon', 'Virus', 1180, 133),
(109, 'MegaKabuterimon', 'Vaccine', 1430, 94),
(110, 'Antylamon', 'Data', 940, 124),
(111, 'Andromon', 'Vaccine', 1040, 133),
(112, 'Meteormon', 'Data', 1090, 123),
(113, 'Infermon', 'Free', 1330, 198),
(114, 'Myotismon', 'Virus', 1290, 148),
(115, 'AeroVeedramon', 'Vaccine', 1430, 163),
(116, 'Etemon', 'Virus', 1130, 104),
(117, 'Angewomon', 'Vaccine', 890, 69),
(118, 'Okuwamon', 'Virus', 1330, 158),
(119, 'Garudamon', 'Vaccine', 1040, 124),
(120, 'Gigadramon', 'Virus', 1240, 137),
(121, 'CannonBeemon', 'Virus', 990, 129),
(122, 'GrapLeomon', 'Vaccine', 1580, 163),
(123, 'Cyberdramon', 'Vaccine', 1480, 173),
(124, 'Shakkoumon', 'Free', 1530, 84),
(125, 'Cherrymon', 'Virus', 1630, 113),
(126, 'Silphymon', 'Free', 1040, 119),
(127, 'SuperStarmon', 'Data', 1180, 122),
(128, 'SkullGreymon', 'Virus', 1230, 203),
(129, 'Zudomon', 'Vaccine', 1630, 150),
(130, 'Taomon', 'Data', 990, 69),
(131, 'Chirinmon', 'Vaccine', 940, 124),
(132, 'Digitamamon', 'Data', 1380, 128),
(133, 'SkullMeramon', 'Data', 1530, 183),
(134, 'ShogunGekomon', 'Virus', 1980, 113),
(135, 'DoruGreymon', 'Data', 1480, 161),
(136, 'Knightmon', 'Data', 1140, 135),
(137, 'Datamon', 'Virus', 1180, 74),
(138, 'Paildramon', 'Free', 1280, 139),
(139, 'Panjyamon', 'Vaccine', 1280, 124),
(140, 'Pumpkinmon', 'Data', 1480, 123),
(141, 'Piximon', 'Data', 990, 104),
(142, 'BlackKingNumemon', 'Virus', 1580, 89),
(143, 'BlueMeramon', 'Virus', 1140, 148),
(144, 'Vademon', 'Virus', 1130, 64),
(145, 'Whamon', 'Vaccine', 1680, 123),
(146, 'MagnaAngemon', 'Vaccine', 1180, 98),
(147, 'MachGaogamon', 'Data', 1480, 158),
(148, 'Mamemon', 'Data', 1480, 111),
(149, 'MegaSeadramon', 'Data', 1330, 86),
(150, 'Megadramon', 'Virus', 1430, 158),
(151, 'WarGrowlmon', 'Virus', 1430, 178),
(152, 'MetalGreymon', 'Vaccine', 1530, 168),
(153, 'MetalGreymon (Blue)', 'Virus', 1670, 173),
(154, 'MetalTyrannomon', 'Virus', 1090, 130),
(155, 'MetalMamemon', 'Data', 1040, 123),
(156, 'Monzaemon', 'Vaccine', 1580, 128),
(157, 'Crowmon', 'Vaccine', 890, 119),
(158, 'RizeGreymon', 'Vaccine', 1530, 178),
(159, 'Lilamon', 'Data', 1280, 69),
(160, 'Rapidmon', 'Vaccine', 1180, 114),
(161, 'Lillymon', 'Data', 890, 74),
(162, 'Lucemon FM', 'Virus', 1390, 163),
(163, 'LadyDevimon', 'Virus', 890, 99),
(164, 'WereGarurumon', 'Vaccine', 1430, 178),
(165, 'WereGarurumon (Blk)', 'Virus', 1480, 183),
(166, 'Wisemon', 'Virus', 790, 69),
(167, 'Alphamon', 'Vaccine', 1390, 158),
(168, 'UlforceVeedramon', 'Vaccine', 1680, 188),
(169, 'Ebemon', 'Virus', 1230, 74),
(170, 'Imperialdramon DM', 'Free', 1730, 139),
(171, 'Imperialdramon FM', 'Free', 1780, 198),
(172, 'Vikemon', 'Free', 1780, 158),
(173, 'VenomMyotismon', 'Virus', 1540, 193),
(174, 'WarGreymon', 'Vaccine', 1630, 193),
(175, 'Examon', 'Data', 1630, 174),
(176, 'Ophanimon', 'Vaccine', 840, 104),
(177, 'Gaiomon', 'Virus', 1630, 203),
(178, 'ChaosGallantmon', 'Virus', 1340, 178),
(179, 'Gankoomon', 'Data', 2080, 188),
(180, 'Kuzuhamon', 'Data', 1380, 84),
(181, 'GranKuwagamon', 'Virus', 1530, 178),
(182, 'GroundLocomon', 'Data', 1140, 144),
(183, 'Craniamon', 'Vaccine', 1630, 124),
(184, 'Kerpymon (Good)', 'Vaccine', 1290, 94),
(185, 'SaberLeomon', 'Data', 1680, 228),
(186, 'Sakuyamon', 'Data', 990, 94),
(187, 'Jesmon', 'Data', 1480, 198),
(188, 'ShineGreymon', 'Vaccine', 1880, 203),
(189, 'Justimon', 'Vaccine', 1530, 193),
(190, 'Kentaurosmon', 'Vaccine', 1140, 139),
(191, 'Seraphimon', 'Vaccine', 1480, 94),
(192, 'MegaGargomon', 'Vaccine', 1430, 149),
(193, 'TigerVespamon', 'Virus', 1630, 193),
(194, 'Titamon', 'Virus', 1930, 183),
(195, 'Dianamon', 'Data', 790, 89),
(196, 'Diaboromon', 'Free', 1680, 243),
(197, 'Creepymon', 'Virus', 1440, 183),
(198, 'Gallantmon', 'Virus', 1480, 149),
(199, 'Dynasmon', 'Data', 1680, 213),
(200, 'Leopardmon', 'Data', 990, 124),
(201, 'Leopardmon LM', 'Data', 1290, 159),
(202, 'HiAndromon', 'Vaccine', 1190, 153),
(203, 'Barbamon', 'Virus', 1330, 84),
(204, 'BanchoLeomon', 'Vaccine', 1630, 193),
(205, 'Piedmon', 'Virus', 890, 129),
(206, 'Puppetmon', 'Virus', 1140, 163),
(207, 'PlatinumNumemon', 'Virus', 1830, 94),
(208, 'BlackWarGreymon', 'Virus', 1730, 183),
(209, 'PrinceMamemon', 'Data', 1630, 104),
(210, 'Plesiomon', 'Data', 1680, 74),
(211, 'HerculesKabuterimon', 'Vaccine', 1680, 114),
(212, 'Beelzemon', 'Virus', 1680, 228),
(213, 'Belphemon SM', 'Virus', 1730, 89),
(214, 'Hououmon', 'Vaccine', 1390, 84),
(215, 'Magnadramon', 'Vaccine', 1880, 89),
(216, 'Boltmon', 'Data', 1580, 198),
(217, 'Mastemon', 'Vaccine', 1340, 173),
(218, 'MarineAngemon', 'Vaccine', 1190, 64),
(219, 'Minervamon', 'Virus', 1580, 208),
(220, 'MirageGaogamon', 'Data', 1480, 183),
(221, 'Machinedramon', 'Virus', 1240, 173),
(222, 'MetalEtemon', 'Virus', 1630, 134),
(223, 'MetalGarurumon', 'Data', 1140, 154),
(224, 'MetalGarurumon (Blk)', 'Virus', 1190, 163),
(225, 'MetalSeadramon', 'Data', 1430, 99),
(226, 'RustTyranomon', 'Virus', 1680, 218),
(227, 'Leviamon', 'Virus', 1730, 168),
(228, 'Lilithmon', 'Virus', 940, 99),
(229, 'Ravemon', 'Vaccine', 1040, 139),
(230, 'Crusadermon', 'Virus', 1240, 144),
(231, 'Rosemon', 'Data', 1330, 144),
(232, 'Lotosmon', 'Data', 940, 74),
(233, 'Imperialdramon PM', 'Vaccine', 1530, 154),
(234, 'Omnimon', 'Vaccine', 1680, 208),
(235, 'Omnimon Zwart', 'Vaccine', 1490, 153),
(236, 'Belphemon RM', 'Virus', 1780, 247),
(237, 'Lucemon SM', 'Virus', 1490, 89),
(238, 'Flamedramon', 'Free', 1130, 119),
(239, 'Magnamon', 'Free', 1240, 168),
(240, 'Rapidmon (Armor)', 'Vaccine', 1140, 158),
(241, 'Kerpymon (Blk)', 'Virus', 1290, 94),
(242, 'Beelzemon BM', 'Virus', 1680, 238),
(243, 'Darkdramon', 'Virus', 1580, 188),
(244, 'Chaosmon', 'Vaccine', 1080, 318),
(245, 'Valkyrimon', 'Free', 1330, 148),
(246, 'ShineGreymon BM', 'Vaccine', 1980, 228),
(247, 'MirageGaogamon BM', 'Data', 1440, 178),
(248, 'Ravemon BM', 'Vaccine', 1040, 149),
(249, 'Rosemon BM', 'Data', 1480, 149),
(250, '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `participate`
--

CREATE TABLE `participate` (
  `Participate_id` int(50) NOT NULL,
  `User_id` int(50) NOT NULL,
  `Digimon_id` int(50) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `tournament_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tamers`
--

CREATE TABLE `tamers` (
  `User_id` int(50) NOT NULL,
  `First_name` varchar(50) NOT NULL,
  `Last_name` varchar(50) NOT NULL,
  `Data` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Phone` int(20) NOT NULL,
  `Rank` varchar(20) NOT NULL,
  `Is_admin` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tamers`
--

INSERT INTO `tamers` (`User_id`, `First_name`, `Last_name`, `Data`, `Email`, `Password`, `Phone`, `Rank`, `Is_admin`) VALUES
(1, 'Wei', 'Weng', '2004-02-20', 'nhwenhww@gmail.com', '123', 1234, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tamers_owns`
--

CREATE TABLE `tamers_owns` (
  `User_id` int(50) NOT NULL,
  `Digimon_id` int(50) NOT NULL,
  `Data` varchar(50) NOT NULL,
  `Level` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tamers_owns`
--

INSERT INTO `tamers_owns` (`User_id`, `Digimon_id`, `Data`, `Level`) VALUES
(1, 25, '2023/03/21', 1),
(1, 132, '2023/03/21', 1),
(1, 232, '2023/03/21', 1),
(1, 230, '2023/03/21', 1),
(1, 127, '2023/03/21', 1),
(1, 247, '2023/03/21', 1),
(1, 183, '2023/03/21', 1),
(1, 196, '2023/03/21', 1),
(1, 131, '2023/03/21', 2),
(1, 136, '2023/03/21', 1),
(1, 40, '2023/03/21', 1),
(1, 229, '2023/03/21', 1),
(1, 134, '2023/03/21', 1),
(1, 1, '2023/03/21', 2),
(1, 99, '2023/03/21', 2),
(1, 133, '2023/03/21', 1),
(1, 113, '2023/03/21', 1),
(1, 50, '2023/03/21', 1),
(1, 109, '2023/03/21', 1),
(1, 64, '2023/03/21', 1),
(1, 188, '2023/03/21', 1),
(1, 9, '2023/03/21', 1),
(1, 89, '2023/03/21', 1),
(1, 3, '2023/03/21', 1),
(1, 101, '2023/03/21', 1),
(1, 17, '2023/03/21', 1),
(1, 33, '2023/03/21', 1),
(1, 226, '2023/03/21', 1),
(1, 24, '2023/03/21', 1),
(1, 18, '2023/03/21', 1),
(1, 199, '2023/03/21', 1),
(1, 159, '2023/03/21', 1),
(1, 205, '2023/03/21', 1),
(1, 207, '2023/03/21', 2),
(1, 171, '2023/03/21', 1),
(1, 4, '2023/03/21', 1),
(1, 246, '2023/03/21', 1),
(1, 10, '2023/03/21', 1),
(1, 121, '2023/03/21', 1),
(1, 6, '2023/03/21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tournament`
--

CREATE TABLE `tournament` (
  `Tournament_id` int(50) NOT NULL,
  `Final_Competition_id` int(50) NOT NULL,
  `Tournament_name` varchar(50) NOT NULL,
  `Max_participate` int(5) NOT NULL,
  `Date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tournament_round`
--

CREATE TABLE `tournament_round` (
  `round_id` int(50) NOT NULL,
  `tournament_id` int(50) NOT NULL,
  `round_number` int(50) NOT NULL,
  `competion_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `competion`
--
ALTER TABLE `competion`
  ADD PRIMARY KEY (`Competion_id`),
  ADD KEY `Lose_participate_id` (`Lose_participate_id`),
  ADD KEY `Win_participate_id` (`Win_participate_id`);

--
-- Indexes for table `digimon`
--
ALTER TABLE `digimon`
  ADD PRIMARY KEY (`Digimon_id`);

--
-- Indexes for table `participate`
--
ALTER TABLE `participate`
  ADD PRIMARY KEY (`Participate_id`),
  ADD KEY `User_id` (`User_id`),
  ADD KEY `Digimon_id` (`Digimon_id`),
  ADD KEY `tournament_id` (`tournament_id`);

--
-- Indexes for table `tamers`
--
ALTER TABLE `tamers`
  ADD PRIMARY KEY (`User_id`);

--
-- Indexes for table `tamers_owns`
--
ALTER TABLE `tamers_owns`
  ADD KEY `User_id` (`User_id`),
  ADD KEY `Digimon_id` (`Digimon_id`);

--
-- Indexes for table `tournament`
--
ALTER TABLE `tournament`
  ADD PRIMARY KEY (`Tournament_id`),
  ADD KEY `Final_Competition_id` (`Final_Competition_id`);

--
-- Indexes for table `tournament_round`
--
ALTER TABLE `tournament_round`
  ADD KEY `competion_id` (`competion_id`),
  ADD KEY `tournament_id` (`tournament_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `competion`
--
ALTER TABLE `competion`
  MODIFY `Competion_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `digimon`
--
ALTER TABLE `digimon`
  MODIFY `Digimon_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `participate`
--
ALTER TABLE `participate`
  MODIFY `Participate_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tamers`
--
ALTER TABLE `tamers`
  MODIFY `User_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tournament`
--
ALTER TABLE `tournament`
  MODIFY `Tournament_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `competion`
--
ALTER TABLE `competion`
  ADD CONSTRAINT `competion_ibfk_1` FOREIGN KEY (`Lose_participate_id`) REFERENCES `participate` (`Participate_id`),
  ADD CONSTRAINT `competion_ibfk_2` FOREIGN KEY (`Win_participate_id`) REFERENCES `participate` (`Participate_id`);

--
-- Constraints for table `participate`
--
ALTER TABLE `participate`
  ADD CONSTRAINT `participate_ibfk_2` FOREIGN KEY (`User_id`) REFERENCES `tamers` (`User_id`),
  ADD CONSTRAINT `participate_ibfk_3` FOREIGN KEY (`Digimon_id`) REFERENCES `digimon` (`Digimon_id`),
  ADD CONSTRAINT `participate_ibfk_4` FOREIGN KEY (`tournament_id`) REFERENCES `tournament` (`Tournament_id`);

--
-- Constraints for table `tamers_owns`
--
ALTER TABLE `tamers_owns`
  ADD CONSTRAINT `Digimon_id` FOREIGN KEY (`Digimon_id`) REFERENCES `digimon` (`Digimon_id`),
  ADD CONSTRAINT `User_id` FOREIGN KEY (`User_id`) REFERENCES `tamers` (`User_id`);

--
-- Constraints for table `tournament`
--
ALTER TABLE `tournament`
  ADD CONSTRAINT `tournament_ibfk_1` FOREIGN KEY (`Final_Competition_id`) REFERENCES `competion` (`Competion_id`);

--
-- Constraints for table `tournament_round`
--
ALTER TABLE `tournament_round`
  ADD CONSTRAINT `tournament_round_ibfk_1` FOREIGN KEY (`competion_id`) REFERENCES `competion` (`Competion_id`),
  ADD CONSTRAINT `tournament_round_ibfk_2` FOREIGN KEY (`tournament_id`) REFERENCES `tournament` (`Tournament_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
