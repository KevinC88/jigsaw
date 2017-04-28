-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2017 at 07:59 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test-login`
--

-- --------------------------------------------------------

--
-- Table structure for table `auditusers`
--

CREATE TABLE `auditusers` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `salt` char(16) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userType` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auditusers`
--

INSERT INTO `auditusers` (`id`, `username`, `password`, `salt`, `email`, `userType`) VALUES
(2, 'auditTest', 'ce7ede621729fde215615b7eee5c7939b1602f3a98452c6997bbda12a91ef3f0', '10c8781a62f6df6f', 'audit@audit.com', ''),
(3, 'test1', '07358dd5b825e74c86096eab70e49f166b4f9d7f8a2142e9debc0d9b2791beb7', '595bacc12b4f799', 'test1@test1.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `medusers`
--

CREATE TABLE `medusers` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `salt` char(16) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `medusers`
--

INSERT INTO `medusers` (`id`, `username`, `password`, `salt`, `email`) VALUES
(3, 'testMed', '62fad456a123ea20f6dde347844dbe1edd75e5d277ca84f22428cc143b0d5dd8', '12101979ae12ef2', 'testMed@med.com'),
(4, 'test1', '70c37c48157a881c153746ca70d0d2ad98a7a48043584ceaca69c2abbafa0740', '5e63f9e22443d512', 'test1@test1.com');

-- --------------------------------------------------------

--
-- Table structure for table `patientrecord`
--

CREATE TABLE `patientrecord` (
  `id` int(15) NOT NULL,
  `patientsNumber` int(15) NOT NULL,
  `patientsFirstName` varchar(15) NOT NULL,
  `patientsLastName` varchar(15) NOT NULL,
  `supervisingPsych` varchar(20) NOT NULL,
  `clinicName` varchar(20) NOT NULL,
  `addressLine1` varchar(20) NOT NULL,
  `addressLine2` varchar(20) NOT NULL,
  `cityInput` varchar(15) NOT NULL,
  `countyInput` varchar(10) NOT NULL,
  `contactInput` int(15) NOT NULL,
  `mStatus` varchar(10) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `ageGroup` varchar(7) NOT NULL,
  `InitialD` varchar(30) NOT NULL,
  `Record` varchar(20) NOT NULL,
  `Added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Haemoglobin` double NOT NULL,
  `Platelets` double NOT NULL,
  `WhiteCells` double NOT NULL,
  `HCT` double NOT NULL,
  `MCV` double NOT NULL,
  `MCH` double NOT NULL,
  `Neuts` double NOT NULL,
  `Lymphs` double NOT NULL,
  `Eosins` double NOT NULL,
  `Basos` double NOT NULL,
  `Mono` double NOT NULL,
  `Sodium` double NOT NULL,
  `Potassium` double NOT NULL,
  `Urea` double NOT NULL,
  `Creatinine` double NOT NULL,
  `ALT` double NOT NULL,
  `ALP` double NOT NULL,
  `GGT` double NOT NULL,
  `Bilirubin` double NOT NULL,
  `Albumin` double NOT NULL,
  `Cholesterol` double NOT NULL,
  `Tryglyceride` double NOT NULL,
  `HDL` double NOT NULL,
  `LDL` double NOT NULL,
  `CHRatio` int(5) NOT NULL,
  `T3` double NOT NULL,
  `T4` double NOT NULL,
  `TSH` double NOT NULL,
  `glucose` double NOT NULL,
  `Lithium` double NOT NULL,
  `Clozapine` double NOT NULL,
  `SodiumV` double NOT NULL,
  `prescribingPsych` varchar(15) NOT NULL,
  `dosageDate` date NOT NULL,
  `drugSelect` varchar(25) NOT NULL,
  `dosage` int(8) NOT NULL,
  `frequency` varchar(15) NOT NULL,
  `Status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patientrecord`
--

INSERT INTO `patientrecord` (`id`, `patientsNumber`, `patientsFirstName`, `patientsLastName`, `supervisingPsych`, `clinicName`, `addressLine1`, `addressLine2`, `cityInput`, `countyInput`, `contactInput`, `mStatus`, `gender`, `ageGroup`, `InitialD`, `Record`, `Added`, `Haemoglobin`, `Platelets`, `WhiteCells`, `HCT`, `MCV`, `MCH`, `Neuts`, `Lymphs`, `Eosins`, `Basos`, `Mono`, `Sodium`, `Potassium`, `Urea`, `Creatinine`, `ALT`, `ALP`, `GGT`, `Bilirubin`, `Albumin`, `Cholesterol`, `Tryglyceride`, `HDL`, `LDL`, `CHRatio`, `T3`, `T4`, `TSH`, `glucose`, `Lithium`, `Clozapine`, `SodiumV`, `prescribingPsych`, `dosageDate`, `drugSelect`, `dosage`, `frequency`, `Status`) VALUES
(15, 6494, 'Rachel', 'Keane', 'DR. Gupta', 'Blackrock', '12 willsbrook terrac', 'n/a', 'Dublin 2', 'Dublin', 546494564, '', '', '', '', 'Registration', '2017-03-24 18:41:27', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00', '', 0, '', ''),
(16, 6494, 'Rachel', 'Keane', '', '', '', '', '', '', 0, '', '', '', '', 'Thyroid', '2017-03-24 18:42:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7, 2, 11, 0, 0, 0, 0, '', '0000-00-00', '', 0, '', ''),
(17, 6494, 'Rachel', 'Keane', '', '', '', '', '', '', 0, '', '', '', '', 'Thyroid', '2017-03-24 22:13:36', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 4, 6, 0, 0, 0, 0, '', '0000-00-00', '', 0, '', ''),
(18, 6494, 'Rachel', 'Keane', '', '', '', '', '', '', 0, '', '', '', '', 'Thyroid', '2017-03-24 22:17:27', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 2, 9, 0, 0, 0, 0, '', '0000-00-00', '', 0, '', ''),
(19, 6494, 'Rachel', 'Keane', '', '', '', '', '', '', 0, '', '', '', '', 'Dosage', '2017-03-25 08:24:31', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'fhfghgfhgfg', '2016-01-13', 'Clozapine', 1005, 'daily', ''),
(20, 6494, 'Rachel', 'Keane', '', '', '', '', '', '', 0, '', '', '', '', 'Dosage', '2017-03-25 13:53:17', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Dr. Singh', '2016-06-04', 'Clozapine', 1001, 'daily', ''),
(21, 6494, 'Rachel', 'Keane', '', '', '', '', '', '', 0, '', '', '', '', 'Dosage', '2017-03-31 19:20:36', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Dr. Kevin', '2016-01-12', 'Olanzapine', 20, 'daily', ''),
(22, 6494, 'Rachel', 'Keane', '', '', '', '', '', '', 0, '', '', '', '', 'Dosage', '2017-04-02 08:45:34', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Dr. Kevin', '2016-01-01', 'Amisulpride', 1300, 'daily', 'ok'),
(23, 6494, 'Rachel', 'Keane', '', '', '', '', '', '', 0, '', '', '', '', 'Dosage', '2017-04-02 08:46:54', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Dr. K', '2016-01-01', 'Amisulpride', 1605, 'daily', 'NO'),
(24, 6494, 'Rachel', 'Keane', '', '', '', '', '', '', 0, '', '', '', '', 'Dosage', '2017-04-02 08:48:06', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Dr.K', '2016-01-01', 'Amisulpride', 1100, 'daily', 'NO'),
(25, 6494, 'Rachel', 'Keane', '', '', '', '', '', '', 0, '', '', '', '', 'Dosage', '2017-04-02 08:49:16', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Dr.J', '2016-01-01', 'Amisulpride', 1100, 'daily', 'OK'),
(26, 6494, 'Rachel', 'Keane', '', '', '', '', '', '', 0, '', '', '', '', 'Thyroid', '2017-04-02 16:18:59', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 7, 3, 0, 0, 0, 0, '', '0000-00-00', '', 0, '', ''),
(27, 78654, 'John', 'Doe', 'Dr. Paul Lambert', 'Stepaside Clinic', '17 Wishful Lane', 'Rathmines', 'Dublin 18', 'Dublin', 887415694, '', '', '', '', 'Registrati', '2017-04-02 17:53:08', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00', '', 0, '', ''),
(28, 46448, 'Trisha', 'Wills', 'Dr. Clare Wellington', 'Mater private', '9 ten penny hall', 'Lucan', 'Lucan', 'Dublin', 887547121, '', 'female', '26-35', '', 'Registrati', '2017-04-02 17:57:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00', '', 0, '', ''),
(29, 4847864, 'Kevin', 'Tomey', 'Dr. Gupta Singh', 'Blackrock Clinic', '10 two hat avenue', 'the falls', 'Rathmines', 'Dublin', 2147483647, 'separated_', 'male', 'over 65', 'F24-Induced dilusional disorde', 'Registrati', '2017-04-02 18:04:30', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00', '', 0, '', ''),
(30, 46448, 'Trisha', 'Wills', '', '', '', '', '', '', 0, '', '', '', '', 'Dosage', '2017-04-03 19:13:32', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'fgdfgh', '2016-01-01', 'Amisulpride', 8000, 'daily', 'NO'),
(31, 46448, 'Trisha', 'Wills', '', '', '', '', '', '', 0, '', '', '', '', 'FBC', '2017-04-03 19:44:35', 1, 23, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00', '', 0, '', ''),
(32, 4847864, '', '', '', '', '', '', '', '', 0, '', '', '', '', 'Renal', '2017-04-03 20:04:19', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 2, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00', '', 0, '', ''),
(33, 4847864, 'Kevin', 'Tomey', '', '', '', '', '', '', 0, '', '', '', '', 'Renal', '2017-04-03 20:07:45', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00', '', 0, '', ''),
(34, 46448, 'Trisha', 'Wills', '', '', '', '', '', '', 0, '', '', '', '', 'Dosage', '2017-04-04 17:05:13', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'fgdrfg', '2016-01-13', 'Amisulpride', 100000, 'daily', 'NO'),
(35, 4847864, 'Kevin', 'Tomey', '', '', '', '', '', '', 0, '', '', '', '', 'Dosage', '2017-04-06 12:26:56', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Dr. Moloney', '2017-04-01', 'Clozapine', 8541, 'daily', 'ok'),
(36, 6494, 'Rachel', 'Keane', '', '', '', '', '', '', 0, '', '', '', '', 'Dosage', '2017-04-06 12:28:23', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Dr. Molloy', '2017-01-01', 'Amisulpride', 10000, 'daily', 'NO'),
(37, 4847864, 'Kevin', 'Tomey', '', '', '', '', '', '', 0, '', '', '', '', 'Dosage', '2017-04-06 16:39:20', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Dr. K', '2016-01-01', 'Amisulpride', 8000, 'daily', 'NO'),
(38, 4847864, 'Kevin', 'Tomey', '', '', '', '', '', '', 0, '', '', '', '', 'Dosage', '2017-04-15 11:31:38', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Dr. G', '2016-01-01', 'Sulpiride', 18000, 'daily', 'ok'),
(39, 4847864, 'Kevin', 'Tomey', '', '', '', '', '', '', 0, '', '', '', '', 'Dosage', '2017-04-15 11:32:20', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'ft', '2016-01-01', 'Paliperidone', 18000, 'daily', 'ok'),
(40, 46448, 'Trisha', 'Wills', '', '', '', '', '', '', 0, '', '', '', '', 'Dosage', '2017-04-15 11:33:57', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'd', '2016-01-01', 'Amisulpride', 8000, 'twiceDaily', 'NO'),
(41, 78654, 'John', 'Doe', '', '', '', '', '', '', 0, '', '', '', '', 'FBC', '2017-04-17 11:49:42', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00', '', 0, '', ''),
(42, 4847864, 'Kevin', 'Tomey', '', '', '', '', '', '', 0, '', '', '', '', 'FBC', '2017-04-17 11:53:27', 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00', '', 0, '', ''),
(43, 6494, 'Rachel', 'Keane', '', '', '', '', '', '', 0, '', '', '', '', 'FBC', '2017-04-23 17:34:34', 4.5, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00', '', 0, '', ''),
(44, 78654, 'John', 'Doe', '', '', '', '', '', '', 0, '', '', '', '', 'Dosage', '2017-04-23 18:43:39', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'graham', '2017-04-11', 'Clozapine', 18000, 'Twice Daily', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `salt` char(16) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userType` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `salt`, `email`, `userType`) VALUES
(1, 'test1', '2a396c9e9cdeb9e144df6abd255a149ab885bdf0349aeb1ef8ac64bd0ac5b809', '6afb63ed64bada93', 'test1@test1.com', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auditusers`
--
ALTER TABLE `auditusers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `medusers`
--
ALTER TABLE `medusers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `patientrecord`
--
ALTER TABLE `patientrecord`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auditusers`
--
ALTER TABLE `auditusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `medusers`
--
ALTER TABLE `medusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `patientrecord`
--
ALTER TABLE `patientrecord`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
