-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2019 at 08:47 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `challengeprogram`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(30) CHARACTER SET utf8 NOT NULL,
  `article` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `author` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `article`, `author`) VALUES
(1, 'اهلين', 'السلام عليكم ورحمنه الله وبركاته ', 1),
(2, 'الوزن ', 'غالبا ما يكون الوزن المثالي دليلاً على صحّة الجسم وسلامته من الكثير من الأمراض والمشاكل الصحّية؛ الأمر الذي\r\n        يدفع المصابين بالسمنة لإنقاص وزنهم، وأولئك المصابين بالنحافة المفرطة لزيادته بحيث يصل الحدّ الطبيعي. والوزن\r\n        المثالي مرتبطٌ بشكلٍ أساسيّ في الطول؛ فالوزن المناسب لأحد الأشخاص قد لا يكون مناسباً لآخر.\r\n      ', 1),
(3, 'المشي ', 'يجب ان تمشي على الاقل نص ساعة في اليوم ', 2);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctorID` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `years-of-experience` int(11) NOT NULL,
  `Specialty-of-doctor` varchar(500) CHARACTER SET utf8 NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctorID`, `name`, `gender`, `email`, `years-of-experience`, `Specialty-of-doctor`, `password`) VALUES
(1, 'abdulaziz muhammed ', 'male', 'abdulaziz@gmail.com', 20, 'nerves doctor', '1234'),
(2, 'عبدالرحمن صالح', 'male', 'abdo@gmail.com', 2, 'مخ و اعصاب', '987654321');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patientID` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(200) NOT NULL,
  `age` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `healthStatus` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `previousDiseases` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `previousMedicines` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `requestToJoin` tinyint(1) NOT NULL,
  `answerToRequest` tinyint(1) NOT NULL,
  `startProgram` tinyint(1) NOT NULL,
  `treatID` int(10) UNSIGNED DEFAULT NULL,
  `year` int(10) UNSIGNED NOT NULL,
  `month` int(10) UNSIGNED NOT NULL,
  `day` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patientID`, `name`, `email`, `age`, `height`, `weight`, `gender`, `password`, `healthStatus`, `previousDiseases`, `previousMedicines`, `requestToJoin`, `answerToRequest`, `startProgram`, `treatID`, `year`, `month`, `day`) VALUES
(1, 'nawaf mesari', 'nawaf@gmail.com', 22, 186, 82, 'male', '1234', 'good', 'لا يوجد', 'لا يوجد', 1, 1, 1, 1, 2019, 4, 13),
(2, 'علي احمد', 'Ali@gmail.com', 50, 186, 90, 'male', '12345678', 'good', 'no', 'no', 1, 1, 0, 1, 2019, 4, 17),
(3, 'سلطان تركي', 'sultan@gmail.com', 23, 186, 34, 'male', '12345678', 'مصاب بالسكري والضغط', ' لايوجد', 'ادوية السكرية المعروفة', 1, 0, 0, 2, 0, 0, 0),
(4, 'خالد', 'k@gmail.com', 22, 180, 70, 'male', '12345678', 'good', 'no', 'no', 1, 2, 0, 2, 0, 0, 0),
(5, 'سارةمحمد', 's@gmail.com', 25, 160, 55, 'female', '12345678', 'جيده الحمدلله  ', 'لا يوجد    ', 'لا يوجد   ', 1, 0, 0, 1, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctorID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patientID`),
  ADD KEY `treat-id` (`treatID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctorID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patientID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`author`) REFERENCES `doctor` (`doctorID`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`treatID`) REFERENCES `doctor` (`doctorID`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
