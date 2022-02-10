-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2022 at 11:05 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `books`
--

-- --------------------------------------------------------

--
-- Table structure for table `knjiga`
--

CREATE TABLE `knjiga` (
  `ISBN` bigint(20) NOT NULL,
  `naziv` varchar(50) NOT NULL,
  `kategorija` varchar(50) NOT NULL,
  `godina_izdavanja` int(11) NOT NULL,
  `broj_stranica` int(11) NOT NULL,
  `id_pisca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `knjiga`
--

INSERT INTO `knjiga` (`ISBN`, `naziv`, `kategorija`, `godina_izdavanja`, `broj_stranica`, `id_pisca`) VALUES
(446310786, 'To Kill a Mockingbird', 'novel', 1960, 384, 4),
(1503280780, 'Moby Dick', 'fiction', 1851, 672, 2),
(2147483647, 'Pride and Prejudice', 'classic romance', 1813, 480, 1),
(7543321726, 'The Catcher in the Rye', 'novel', 1951, 240, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pisac`
--

CREATE TABLE `pisac` (
  `id` int(11) NOT NULL,
  `ime` varchar(50) NOT NULL,
  `prezime` varchar(50) NOT NULL,
  `godina_rodenja` int(11) NOT NULL,
  `drzava` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pisac`
--

INSERT INTO `pisac` (`id`, `ime`, `prezime`, `godina_rodenja`, `drzava`) VALUES
(1, 'Jane', 'Austen', 1775, 'England'),
(2, 'Herman', 'Melville', 1819, 'USA'),
(3, 'J.D.', 'Salinger', 1919, 'USA'),
(4, 'Harper', 'Lee', 1926, 'USA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `knjiga`
--
ALTER TABLE `knjiga`
  ADD PRIMARY KEY (`ISBN`),
  ADD KEY `id_pisca` (`id_pisca`);

--
-- Indexes for table `pisac`
--
ALTER TABLE `pisac`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pisac`
--
ALTER TABLE `pisac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
