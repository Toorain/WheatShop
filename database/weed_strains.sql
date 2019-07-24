-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 20, 2019 at 09:25 AM
-- Server version: 10.3.13-MariaDB-2
-- PHP Version: 7.2.19-0ubuntu0.19.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weed_strains`
--

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

CREATE TABLE `Category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Category`
--

INSERT INTO `Category` (`id`, `name`, `description`) VALUES
(1, 'Sativa', 'Cannabis sativa is an annual herbaceous flowering plant indigenous to eastern Asia but now of cosmopolitan distribution due to widespread cultivation. It has been cultivated throughout recorded history, used as a source of industrial fiber, seed oil, food, recreation, religious and spiritual moods and medicine. Each part of the plant is harvested differently, depending on the purpose of its use. The species was first classified by Carl Linnaeus in 1753. The word \"sativa\" means things that are cultivated.'),
(2, 'Indica', 'Cannabis indica is an annual plant in the Cannabaceae family.It is a putative species of the genus Cannabis. Whether it and Cannabis sativa are truly separate species is a matter of debate. The Cannabis indica plant is cultivated for many purposes; for example, the plant fibers can be converted into cloth. Cannabis indica produces large amounts of tetrahydrocannabinol (THC). The higher concentrations of THC provide euphoric and intoxicating effects making it popular for use both as a recreational and medicinal drug. '),
(3, 'Hybrid', 'Cannabis ruderalis is a low-THC species of Cannabis which is native to Central and Eastern Europe and Russia. Many scholars accept Cannabis ruderalis as its own species due to its unique traits and phenotypes which distinguish it from Cannabis indica and Cannabis sativa; however, it is widely debated as to whether or not ruderalis is a sub-species of Cannabis sativa.');

-- --------------------------------------------------------

--
-- Table structure for table `Strain`
--

CREATE TABLE `Strain` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `strain_name` varchar(50) NOT NULL,
  `potency` int(11) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `ref` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `Strain`
--

INSERT INTO `Strain` (`id`, `name`, `strain_name`, `potency`, `description`, `price`, `img`, `ref`) VALUES
(1, 'Santa Sativa', 'Sativa', 40, 'Santa Sativa is a ...', 10, 'santa-sativa-feminisee.jpg', 'WSSNTSTV'),
(2, 'Sour Diesel', 'Sativa', 50, 'Sour Diesel has an ...', 12, 'sour-diesel.jpg', 'WSSRDSL'),
(3, 'Jack Herer', 'Sativa', 20, 'Jack Herer is ...', 10, 'jack-herer.jpg', 'WSJCKHRH'),
(6, 'Lemon Haze', 'Sativa', 50, 'Lemon Haze has a lemon taste', 12, 'lemon-haze.jpg', 'WSLMNHZ'),
(7, 'Aurora Indica', 'Indica', 32, 'Aurora indica makes you see lights', 15, 'aurora-indica.jpg', 'WSARRNDC'),
(8, 'Blue Cheese', 'Hybrid', 45, 'Blue Cheese has ...', 9, 'blue-cheese-hybrid.jpg', 'WSBLCHS'),
(9, 'White Widow', 'Indica', 34, 'White widow is ...', 8, 'white-widow.jpeg', 'WSWHTWDW'),
(10, 'Chemdog', 'Hybrid', 34, 'Chemdog is a ....', 11, 'chemdog.jpeg', 'WSCHMDG'),
(11, 'Northern Lights', 'Indica', 45, 'Northern Light has some ...', 12, 'northern-lights.jpg', 'WSNRTHRNLGHTS'),
(12, 'OG Kush', 'Hybrid', 34, 'OG Kush as a ...', 14, 'OGKush.jpeg', 'WSOGKSH'),
(13, 'Purple Kush', 'Indica', 45, 'Purple Kush...', 14, 'purple-kush.jpg', 'WSPRPLKSH');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Strain`
--
ALTER TABLE `Strain`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Category`
--
ALTER TABLE `Category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Strain`
--
ALTER TABLE `Strain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
