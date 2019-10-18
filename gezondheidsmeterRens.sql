-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2019 at 09:56 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gezondheidsmeter`
--

-- --------------------------------------------------------

--
-- Table structure for table `arbeid`
--

CREATE TABLE `arbeid` (
  `arbeid_ID` int(11) NOT NULL,
  `gebruiker_ID` int(11) NOT NULL,
  `werkplek` int(20) NOT NULL,
  `werkdruk` int(20) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `arbeid`
--

INSERT INTO `arbeid` (`arbeid_ID`, `gebruiker_ID`, `werkplek`, `werkdruk`, `datum`) VALUES
(1, 4, 7, 6, '2019-10-14'),
(2, 5, 9, 9, '2019-10-19'),
(3, 4, 8, 8, '2019-10-17'),
(4, 4, 9, 9, '2019-10-18'),
(5, 4, 0, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `drinken`
--

CREATE TABLE `drinken` (
  `drinken_ID` int(11) NOT NULL,
  `naam` varchar(30) NOT NULL,
  `kcal` int(11) NOT NULL,
  `suiker` double(4,2) NOT NULL,
  `schijf_ID` int(11) NOT NULL,
  `alcohol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drinken`
--

INSERT INTO `drinken` (`drinken_ID`, `naam`, `kcal`, `suiker`, `schijf_ID`, `alcohol`) VALUES
(1, 'pizza', 188, 99.99, 1, '8'),
(2, 'cola', 600, 99.99, 0, '10'),
(3, 'cola', 500, 5.00, 0, '5'),
(4, 'cake', 444, 4.00, 0, '4'),
(5, 'cola', 0, 0.00, 0, '0'),
(9, 'fanta', 300, 5.00, 0, '3');

-- --------------------------------------------------------

--
-- Table structure for table `drugs`
--

CREATE TABLE `drugs` (
  `drugs_ID` int(11) NOT NULL,
  `naam` varchar(100) NOT NULL,
  `soort` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drugs`
--

INSERT INTO `drugs` (`drugs_ID`, `naam`, `soort`) VALUES
(1, 'testdrugs1', 'softdrugs'),
(2, 'softdrugs', '5'),
(3, 'harddrugs', '2'),
(4, 'harddrugs', '0'),
(5, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `eten`
--

CREATE TABLE `eten` (
  `eten_ID` int(11) NOT NULL,
  `naam` varchar(30) NOT NULL,
  `kcal` int(11) NOT NULL,
  `sugar` double(4,2) NOT NULL,
  `schijf_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eten`
--

INSERT INTO `eten` (`eten_ID`, `naam`, `kcal`, `sugar`, `schijf_ID`) VALUES
(3, 'zibbi', 13, 0.01, 0),
(4, 'pizza', 800, 3.00, 0),
(5, 'pizza', 500, 4.00, 0),
(6, 'cola', 555, 5.00, 0),
(7, '', 0, 0.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gebruiker`
--

CREATE TABLE `gebruiker` (
  `gebruiker_ID` int(11) NOT NULL,
  `gebruikersnaam` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL,
  `gewicht` double(3,2) NOT NULL,
  `lengte` double(3,2) NOT NULL,
  `geboortedatum` date NOT NULL,
  `geslacht` varchar(5) NOT NULL,
  `geactiveerd` tinyint(1) NOT NULL,
  `activeer_id` varchar(13) NOT NULL,
  `ww_vergeet_id` varchar(13) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gebruiker`
--

INSERT INTO `gebruiker` (`gebruiker_ID`, `gebruikersnaam`, `email`, `wachtwoord`, `gewicht`, `lengte`, `geboortedatum`, `geslacht`, `geactiveerd`, `activeer_id`, `ww_vergeet_id`, `is_admin`) VALUES
(1, 'userew', '', 'user', 9.90, 9.99, '2004-06-09', 'dunno', 0, '', '', 1),
(2, 'miquel', 'miquelalessandro@gmail.com', '$2y$10$oDKaVNdwV4OjiOKM.SyPC.kOailffgTBkHWQ/UX0rUSdWUFVUk61e', 9.99, 9.99, '2001-04-24', 'male', 1, '0', '', 0),
(3, 'user', 'u@u', '$2y$10$WzIaEfM6.MZwS9/colA4b.gGS1YbT2gvlliAeqfLwsIIzB1./cBYW', 1.00, 1.00, '2019-10-01', 'femal', 0, '5d9716af4f2e8', '', 0),
(4, 'test', 'test@mail.com', '$2y$10$99RHDbaaPE93pKBlpmSq7uH./SJeG93jE/StCVG8N1./0cFbrbad2', 9.99, 9.99, '2019-10-20', 'femal', 0, '5da59e3867aa0', '', 0),
(5, 'rens', 'rens@mail.com', '$2y$10$gi5FnzCV8kJopqJl1SbPU.pR2sdMf3Xlded9Pb5vBMjNF71fpoD5S', 9.99, 9.99, '2019-10-18', 'male', 1, '5da6c0585939a', '', 0),
(6, 'pietje', 'lol@mail.com', '$2y$10$0MtubUZFhCrXSCmp/mgmaO7iiFGlGAXN8Dn2eAz3or2FBoWoo3PRO', 9.99, 9.99, '2019-10-12', 'femal', 0, '5da6c0773f10f', '', 0),
(7, 'test', 'test@mail', '$2y$10$SreEeYpdzQApCvV6jcDe6OP0dpIlxx67NiWhuuuJZMW34/roxh8pC', 9.99, 9.99, '2019-10-12', 'femal', 0, '5da6c1f542c47', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `koppel_user_drinks`
--

CREATE TABLE `koppel_user_drinks` (
  `gebruiker_ID` int(11) NOT NULL,
  `drinks_ID` int(11) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `koppel_user_drinks`
--

INSERT INTO `koppel_user_drinks` (`gebruiker_ID`, `drinks_ID`, `datum`) VALUES
(1, 5, '0000-00-00'),
(1, 6, '0000-00-00'),
(1, 7, '0000-00-00'),
(1, 8, '0000-00-00'),
(2, 1, '2019-10-16'),
(4, 2, '0000-00-00'),
(4, 3, '0000-00-00'),
(4, 4, '0000-00-00'),
(4, 5, '0000-00-00'),
(7, 9, '2019-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `koppel_user_drugs`
--

CREATE TABLE `koppel_user_drugs` (
  `gebruiker_ID` int(11) NOT NULL,
  `drug_ID` int(11) NOT NULL,
  `hoeveelheid` int(11) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `koppel_user_drugs`
--

INSERT INTO `koppel_user_drugs` (`gebruiker_ID`, `drug_ID`, `hoeveelheid`, `datum`) VALUES
(1, 1, 7, '2019-10-18'),
(2, 1, 6, '2019-10-15'),
(3, 1, 2, '2019-10-13'),
(4, 1, 4, '2019-10-16'),
(5, 1, 9, '2019-10-17'),
(6, 1, 8, '2019-10-14'),
(7, 1, 5, '2019-10-20');

-- --------------------------------------------------------

--
-- Table structure for table `koppel_user_eten`
--

CREATE TABLE `koppel_user_eten` (
  `gebruiker_ID` int(11) NOT NULL,
  `eten_ID` int(11) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `koppel_user_eten`
--

INSERT INTO `koppel_user_eten` (`gebruiker_ID`, `eten_ID`, `datum`) VALUES
(1, 3, '2019-10-16'),
(4, 4, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `koppel_user_sport`
--

CREATE TABLE `koppel_user_sport` (
  `gebruiker_ID` int(11) NOT NULL,
  `sport_ID` int(11) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `koppel_user_sport`
--

INSERT INTO `koppel_user_sport` (`gebruiker_ID`, `sport_ID`, `datum`) VALUES
(4, 1, '2019-10-16');

-- --------------------------------------------------------

--
-- Table structure for table `melding`
--

CREATE TABLE `melding` (
  `melding_ID` int(11) NOT NULL,
  `melding` varchar(50) NOT NULL,
  `datum` date NOT NULL,
  `gebruiker_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `melding`
--

INSERT INTO `melding` (`melding_ID`, `melding`, `datum`, `gebruiker_ID`) VALUES
(1, 'Er is voor vandaag nog geen data ingevuld.', '2019-10-17', 4),
(2, 'Er is voor vandaag nog geen data ingevuld.', '2019-10-18', 5);

-- --------------------------------------------------------

--
-- Table structure for table `schijf`
--

CREATE TABLE `schijf` (
  `schijf_ID` int(11) NOT NULL,
  `naam` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `slaap`
--

CREATE TABLE `slaap` (
  `slaap_ID` int(11) NOT NULL,
  `gebruiker_ID` int(11) NOT NULL,
  `uren` int(20) NOT NULL,
  `beoordeling` varchar(50) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slaap`
--

INSERT INTO `slaap` (`slaap_ID`, `gebruiker_ID`, `uren`, `beoordeling`, `datum`) VALUES
(1, 1, 3, '3', '2019-10-16'),
(2, 4, 8, '8', '2019-10-14'),
(3, 4, 8, '9', '2019-10-17'),
(4, 4, 5, '5', '2019-10-18'),
(5, 4, 0, '0', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `sport`
--

CREATE TABLE `sport` (
  `sport_ID` int(11) NOT NULL,
  `naam` varchar(30) NOT NULL,
  `verbranding` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sport`
--

INSERT INTO `sport` (`sport_ID`, `naam`, `verbranding`) VALUES
(1, 'voetbal', '700'),
(2, 'voetbal', '400'),
(3, 'tennis', '505'),
(4, '', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arbeid`
--
ALTER TABLE `arbeid`
  ADD PRIMARY KEY (`arbeid_ID`);

--
-- Indexes for table `drinken`
--
ALTER TABLE `drinken`
  ADD PRIMARY KEY (`drinken_ID`);

--
-- Indexes for table `drugs`
--
ALTER TABLE `drugs`
  ADD PRIMARY KEY (`drugs_ID`);

--
-- Indexes for table `eten`
--
ALTER TABLE `eten`
  ADD PRIMARY KEY (`eten_ID`);

--
-- Indexes for table `gebruiker`
--
ALTER TABLE `gebruiker`
  ADD PRIMARY KEY (`gebruiker_ID`);

--
-- Indexes for table `koppel_user_drinks`
--
ALTER TABLE `koppel_user_drinks`
  ADD KEY `user_ID_user_ID` (`gebruiker_ID`),
  ADD KEY `drinks_ID` (`drinks_ID`);

--
-- Indexes for table `koppel_user_drugs`
--
ALTER TABLE `koppel_user_drugs`
  ADD PRIMARY KEY (`gebruiker_ID`),
  ADD UNIQUE KEY `gebruiker_ID` (`gebruiker_ID`),
  ADD KEY `drugs_ID_drugs_ID` (`drug_ID`),
  ADD KEY `drugs_user_ID_user_ID` (`gebruiker_ID`);

--
-- Indexes for table `koppel_user_eten`
--
ALTER TABLE `koppel_user_eten`
  ADD PRIMARY KEY (`gebruiker_ID`),
  ADD KEY `eten_user_ID_user_ID` (`gebruiker_ID`),
  ADD KEY `eten_eten_ID_food_ID` (`eten_ID`);

--
-- Indexes for table `koppel_user_sport`
--
ALTER TABLE `koppel_user_sport`
  ADD PRIMARY KEY (`gebruiker_ID`);

--
-- Indexes for table `melding`
--
ALTER TABLE `melding`
  ADD PRIMARY KEY (`melding_ID`);

--
-- Indexes for table `schijf`
--
ALTER TABLE `schijf`
  ADD PRIMARY KEY (`schijf_ID`);

--
-- Indexes for table `slaap`
--
ALTER TABLE `slaap`
  ADD PRIMARY KEY (`slaap_ID`);

--
-- Indexes for table `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`sport_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arbeid`
--
ALTER TABLE `arbeid`
  MODIFY `arbeid_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `drinken`
--
ALTER TABLE `drinken`
  MODIFY `drinken_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `drugs`
--
ALTER TABLE `drugs`
  MODIFY `drugs_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `eten`
--
ALTER TABLE `eten`
  MODIFY `eten_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `gebruiker`
--
ALTER TABLE `gebruiker`
  MODIFY `gebruiker_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `melding`
--
ALTER TABLE `melding`
  MODIFY `melding_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `schijf`
--
ALTER TABLE `schijf`
  MODIFY `schijf_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `slaap`
--
ALTER TABLE `slaap`
  MODIFY `slaap_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sport`
--
ALTER TABLE `sport`
  MODIFY `sport_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `koppel_user_drinks`
--
ALTER TABLE `koppel_user_drinks`
  ADD CONSTRAINT `user_ID_user_ID` FOREIGN KEY (`gebruiker_ID`) REFERENCES `gebruiker` (`gebruiker_ID`);

--
-- Constraints for table `koppel_user_drugs`
--
ALTER TABLE `koppel_user_drugs`
  ADD CONSTRAINT `drugs_ID_drugs_ID` FOREIGN KEY (`drug_ID`) REFERENCES `drugs` (`drugs_ID`),
  ADD CONSTRAINT `drugs_user_ID_user_ID` FOREIGN KEY (`gebruiker_ID`) REFERENCES `gebruiker` (`gebruiker_ID`);

--
-- Constraints for table `koppel_user_eten`
--
ALTER TABLE `koppel_user_eten`
  ADD CONSTRAINT `eten_eten_ID_food_ID` FOREIGN KEY (`eten_ID`) REFERENCES `eten` (`eten_ID`),
  ADD CONSTRAINT `eten_user_ID_user_ID` FOREIGN KEY (`gebruiker_ID`) REFERENCES `gebruiker` (`gebruiker_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;