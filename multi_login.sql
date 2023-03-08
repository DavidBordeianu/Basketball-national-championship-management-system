-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2023 at 08:20 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multi_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `antrenor`
--

CREATE TABLE `antrenor` (
  `idantrenor` int(100) NOT NULL,
  `nume` char(50) NOT NULL,
  `prenume` char(50) NOT NULL,
  `dataangajarii` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `antrenor`
--

INSERT INTO `antrenor` (`idantrenor`, `nume`, `prenume`, `dataangajarii`) VALUES
(87643, 'Ilie', 'Bogdan', '2015-06-17'),
(112333, 'Anton', 'Gheorghe Adrian', '2018-04-20'),
(964005, 'Iliescu', 'Grigore', '2017-12-20'),
(8765436, 'Voicu', 'Anton', '2022-01-04');

-- --------------------------------------------------------

--
-- Table structure for table `divizie`
--

CREATE TABLE `divizie` (
  `iddivizie` int(50) NOT NULL,
  `denumire` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `divizie`
--

INSERT INTO `divizie` (`iddivizie`, `denumire`) VALUES
(111100, 'Divizia 1'),
(222000, 'Divizia 2'),
(333000, 'Divizia 3'),
(444000, 'Divizia 4');

-- --------------------------------------------------------

--
-- Table structure for table `echipa`
--

CREATE TABLE `echipa` (
  `idechipa` int(100) NOT NULL,
  `iddivizie` int(50) NOT NULL,
  `idantrenor` int(100) NOT NULL,
  `nume` char(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `echipa`
--

INSERT INTO `echipa` (`idechipa`, `iddivizie`, `idantrenor`, `nume`) VALUES
(666789, 444000, 112333, 'CSM Baschet Petrolul Ploiesti'),
(1723763, 111100, 87643, 'CS Dinamo Bucuresti'),
(1723764, 222000, 8765436, 'U BT Cluj-Napoca');

-- --------------------------------------------------------

--
-- Table structure for table `jucatori`
--

CREATE TABLE `jucatori` (
  `id` int(10) NOT NULL,
  `idechipa` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_type` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nume` char(100) NOT NULL,
  `prenume` char(100) NOT NULL,
  `pozitie` varchar(100) NOT NULL,
  `dataangajarii` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jucatori`
--

INSERT INTO `jucatori` (`id`, `idechipa`, `username`, `email`, `user_type`, `password`, `nume`, `prenume`, `pozitie`, `dataangajarii`) VALUES
(8, 666789, 'MariusBenone', 'mariusica123@yahoo.com', 'user', '827ccb0eea8a706c4c34a16891f84e7b', 'Marius', 'Benone', 'Fundaș', '2022-10-03'),
(9, 666789, 'popescu56@', 'popo11@gmail.com', 'user', '229c46ddb75cac1f2ca511b6c99e97c2', 'Popescu', 'Paul', 'Portar', '2022-02-10'),
(10, 666789, 'marinel_26', 'marius@gmail.com', 'user', '1e6cbfcee26c6cc83f5439b64fe98aaf', 'Iacob', 'Marin', 'Atacant', '2019-10-19'),
(11, 666789, '26sebi26', 'sebastian2000@yahoo.com', 'user', '79766d73ac908036c2250391583e2620', 'Toader', 'Sebastian', 'Fundaș', '2022-11-04'),
(16, 1723763, 'robo123', 'robotics@gmail.com', 'user', '06eee41a5f38a9a271bb09d116fee74a', 'Marius', 'Ionescu', 'Portar', '2022-09-15'),
(17, 1723763, 'impact46', 'genshinimpact44@yahoo.com', 'user', 'd34faf50b544ebae5eef28a1893ff8b4', 'Popescu', 'Victor', 'Fundaș', '2022-11-10'),
(18, 1723763, 'vladdd1', 'vladmol@yahoo.com', 'user', '53f8790e3369773255cda148d32dd79c', 'Moldoveanu', 'Vlad', 'Atacant', '2017-06-05'),
(19, 1723763, 'rari_r', 'raresm49@gmail.com', 'user', '8e389bb4e40140c593520e3ad7533ab5', 'Mandache', 'Rareș Marian', 'Fundaș', '2018-02-05'),
(20, 1723764, 'Stefan204', 'stefan_baschet@yahoo.com', 'user', 'fcea920f7412b5da7be0cf42b8c93759', 'Moise', 'Stefan', 'Portar', '2021-03-10'),
(21, 1723764, '12ion12', 'ionut_andrei@yahoo.com', 'user', '7a97dd360393b5bdeba4b2fdea58bd71', 'Andreiescu', 'Ion Andrei', 'Portar', '2020-08-21'),
(22, 1723764, 'davidbordi', 'bordeianu_david@yahoo.com', 'user', '145901d37efe2bc4cc8adbca0d311dfb', 'Bordeianu', 'David', 'Atacant', '2020-10-27'),
(23, 1723764, '_horia_', 'horiaa994@gmail.com', 'user', '96344c890520660509cd8cf28c08da07', 'Istrate', 'Horia', 'Fundaș', '2022-05-11'),
(26, 0, 'admin', 'admin@yahoo.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'ADMIN', 'ADMIN', 'ADMIN', '2000-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `locatie`
--

CREATE TABLE `locatie` (
  `idlocatie` int(50) NOT NULL,
  `denumire` varchar(50) NOT NULL,
  `oras` char(30) NOT NULL,
  `strada` char(50) NOT NULL,
  `numarstrada` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locatie`
--

INSERT INTO `locatie` (`idlocatie`, `denumire`, `oras`, `strada`, `numarstrada`) VALUES
(5484193, 'Stadionul Municipal „Nicolae Dobrin”', 'Pitesti', 'Aleea Stadionului', '10'),
(9041583, 'Mihai Viteazul Bucuresti', 'Bucuresti', 'Bulevardul Pache Protopopescu', '62'),
(9041590, 'Stadionul National Unirea', 'Bucuresti', 'Radu Boiangiu', '16'),
(9041591, 'ACS Dan Dacian', 'Bucuresti', 'Bulevardul Carol I', '12'),
(9041592, 'Poli Arena', 'Bucuresti', 'Splaiul Independenței', '313'),
(9041593, 'Arena Romsilva Știința', 'Bucuresti', 'Petricani', '9A');

-- --------------------------------------------------------

--
-- Table structure for table `meci`
--

CREATE TABLE `meci` (
  `idmeci` int(50) NOT NULL,
  `idlocatie` int(50) NOT NULL,
  `idgazda` int(50) NOT NULL,
  `ideoaspete` int(50) NOT NULL,
  `data` date NOT NULL,
  `ora` time(4) NOT NULL,
  `pct_gazda` int(20) NOT NULL,
  `pct_oaspete` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meci`
--

INSERT INTO `meci` (`idmeci`, `idlocatie`, `idgazda`, `ideoaspete`, `data`, `ora`, `pct_gazda`, `pct_oaspete`) VALUES
(32623, 5484193, 1723763, 666789, '2022-08-17', '22:00:00.0000', 16, 14),
(69695, 9041583, 666789, 1723763, '2022-12-14', '20:00:00.0000', 10, 10),
(69696, 9041592, 1723764, 666789, '2022-12-07', '18:00:00.0000', 30, 25),
(69697, 9041590, 1723763, 1723764, '2022-09-07', '20:00:00.0000', 7, 20);

-- --------------------------------------------------------

--
-- Table structure for table `puncte`
--

CREATE TABLE `puncte` (
  `idpuncte` int(50) NOT NULL,
  `idjucator` int(100) NOT NULL,
  `idmeci` int(50) NOT NULL,
  `numarpuncte` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `puncte`
--

INSERT INTO `puncte` (`idpuncte`, `idjucator`, `idmeci`, `numarpuncte`) VALUES
(15664, 10, 69695, 3),
(123334, 8, 69695, 2),
(123335, 9, 69695, 5),
(123336, 11, 69695, 0),
(123337, 16, 69695, 3),
(123338, 17, 69695, 3),
(123339, 18, 69695, 3),
(123340, 19, 69695, 1),
(123341, 16, 32623, 8),
(123342, 17, 32623, 3),
(123343, 18, 32623, 5),
(123344, 19, 32623, 0),
(123345, 8, 32623, 4),
(123346, 9, 32623, 3),
(123347, 10, 32623, 6),
(123348, 11, 32623, 1),
(123349, 20, 69696, 10),
(123350, 21, 69696, 15),
(123351, 22, 69696, 3),
(123352, 23, 69696, 2),
(123353, 8, 69696, 16),
(123354, 9, 69696, 9),
(123355, 10, 69696, 0),
(123356, 11, 69696, 0),
(123357, 16, 69697, 4),
(123358, 17, 69697, 3),
(123359, 18, 69697, 0),
(123360, 19, 69697, 0),
(123361, 20, 69697, 8),
(123362, 21, 69697, 8),
(123363, 22, 69697, 3),
(123364, 23, 69697, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antrenor`
--
ALTER TABLE `antrenor`
  ADD PRIMARY KEY (`idantrenor`);

--
-- Indexes for table `divizie`
--
ALTER TABLE `divizie`
  ADD PRIMARY KEY (`iddivizie`);

--
-- Indexes for table `echipa`
--
ALTER TABLE `echipa`
  ADD PRIMARY KEY (`idechipa`),
  ADD KEY `iddivizie` (`iddivizie`,`idantrenor`);

--
-- Indexes for table `jucatori`
--
ALTER TABLE `jucatori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idechipa` (`idechipa`);

--
-- Indexes for table `locatie`
--
ALTER TABLE `locatie`
  ADD PRIMARY KEY (`idlocatie`);

--
-- Indexes for table `meci`
--
ALTER TABLE `meci`
  ADD PRIMARY KEY (`idmeci`),
  ADD KEY `idlocatie` (`idlocatie`);

--
-- Indexes for table `puncte`
--
ALTER TABLE `puncte`
  ADD PRIMARY KEY (`idpuncte`),
  ADD KEY `idjucator` (`idjucator`,`idmeci`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antrenor`
--
ALTER TABLE `antrenor`
  MODIFY `idantrenor` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8765437;

--
-- AUTO_INCREMENT for table `jucatori`
--
ALTER TABLE `jucatori`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `locatie`
--
ALTER TABLE `locatie`
  MODIFY `idlocatie` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9041597;

--
-- AUTO_INCREMENT for table `meci`
--
ALTER TABLE `meci`
  MODIFY `idmeci` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69698;

--
-- AUTO_INCREMENT for table `puncte`
--
ALTER TABLE `puncte`
  MODIFY `idpuncte` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123365;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
