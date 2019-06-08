-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 06, 2019 at 10:19 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marco_polo`
--

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `intro_img` varchar(255) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `name`, `role`, `intro_img`, `year`) VALUES
(1, 'plant hero', 'UX/UI Designer', 'assets/images/Plant_Hero/PlantHero-Intro.jpg', 2018),
(2, 'revol snax', 'UX/UI Designer', 'assets/images/Revol_Snax/RevolSnax-Intro.jpg', 2019),
(3, 'Théa D.Santos', 'UX/UI Designer', 'assets/images/Thea/plop.jpg', 2019),
(4, 'sarah\'s house', 'UX/UI Designer', 'assets/images/Sarah/Photo.jpg', 2019);

-- --------------------------------------------------------

--
-- Table structure for table `project_content`
--

CREATE TABLE `project_content` (
  `id` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `content` text NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_content`
--

INSERT INTO `project_content` (`id`, `id_project`, `content`, `name`) VALUES
(1, 1, '/data/sarah.json', 'sarah\'s house'),
(2, 2, '/data/revol_snax.json', 'revol snax'),
(3, 3, '/data/plant_hero.json', 'plant hero'),
(4, 4, '/data/thea.json', 'Théa D.Santos');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_content`
--
ALTER TABLE `project_content`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `project_content`
--
ALTER TABLE `project_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
