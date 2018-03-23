-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 23, 2018 at 01:29 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.25-0ubuntu0.16.04.1

-- -----------------------------------------------------
-- schema teamscreen
-- -----------------------------------------------------
drop database if exists `teamscreen` ;

-- -----------------------------------------------------
-- schema teamscreen
-- -----------------------------------------------------
create database if not exists `teamscreen` default character set utf8 ;
use `teamscreen` ;


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teamscreen`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `destination` varchar(45) DEFAULT NULL,
  `drink_preference` enum('coffee','tea','water') DEFAULT NULL,
  `working_days` set('monday','tuesday','wednesday','thursday','friday') DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `name`, `username`, `destination`, `drink_preference`, `working_days`, `team_id`) VALUES
(25, 'Petri', 'petri', 'Dam, 1012KB Amsterdam', 'tea', 'monday,tuesday,wednesday,thursday', 1),
(26, 'Agung the Man', 'agung.udijana', 'Spijkweg 30, 8256 RJ Biddinghuizen', 'coffee', 'monday,tuesday,wednesday,thursday', 2),
(27, 'Carina', 'Carina', 'Berlijnplein 100, 3541 CM Utrecht', 'coffee', 'monday,tuesday,wednesday,thursday', 1),
(28, 'Emiel', 'emiel.nijhuis', 'Boulevard ZeeZijde 7, 2225 AB Katwijk aan Zee', 'coffee', 'monday,tuesday,wednesday,thursday', 2),
(29, 'Paul', 'paul.sinterniklaas', 'Plein 2, 2511 CR Den Haag', 'coffee', 'monday,tuesday,wednesday,thursday', 1),
(30, 'Dominic', 'dominic', 'Domplein 21, 3512 JC Utrecht', 'coffee', 'monday,tuesday,wednesday,thursday', 2),
(31, 'Vincent', 'vincent.huijts%40hva.nl', 'Veemarktstraat 44, 5038 CV Tilburg', 'tea', 'monday,tuesday,wednesday,thursday', 1);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `label` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `label`) VALUES
(1, 'team 3'),
(2, 'team 2a');

-- --------------------------------------------------------

--
-- Table structure for table `time_off`
--

CREATE TABLE `time_off` (
  `id` int(11) NOT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_member_team_idx` (`team_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_off`
--
ALTER TABLE `time_off`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_time_off_member_idx` (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `time_off`
--
ALTER TABLE `time_off`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `fk_member_team` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `time_off`
--
ALTER TABLE `time_off`
  ADD CONSTRAINT `fk_time_off_member` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
