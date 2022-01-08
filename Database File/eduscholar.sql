-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2021 at 11:37 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eduscholar`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `adate` date NOT NULL,
  `4NM19CS501` varchar(7) NOT NULL,
  `4NM19CS502` varchar(7) NOT NULL,
  `4NM19CS503` varchar(7) NOT NULL,
  `4NM19CS504` varchar(7) NOT NULL,
  `4NM19CS505` varchar(7) NOT NULL,
  `4NM19CS506` varchar(7) NOT NULL,
  `4NM19CS507` varchar(7) NOT NULL,
  `4NM19CS508` varchar(7) NOT NULL,
  `4NM19CS509` varchar(7) NOT NULL,
  `4NM19CS510` varchar(7) NOT NULL,
  `4NM19CS511` varchar(7) NOT NULL,
  `4NM19CS512` varchar(7) NOT NULL,
  `4NM19CS513` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `adate`, `4NM19CS501`, `4NM19CS502`, `4NM19CS503`, `4NM19CS504`, `4NM19CS505`, `4NM19CS506`, `4NM19CS507`, `4NM19CS508`, `4NM19CS509`, `4NM19CS510`, `4NM19CS511`, `4NM19CS512`, `4NM19CS513`) VALUES
(22, '2021-11-03', 'AB', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P'),
(37, '2021-11-04', 'P', 'P', 'P', 'P', 'P', 'P', 'AB', 'P', 'P', 'P', 'P', 'P', 'P'),
(39, '2021-11-05', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P'),
(40, '2021-12-15', 'P', 'AB', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `attendance2`
--

CREATE TABLE `attendance2` (
  `id` int(11) NOT NULL,
  `adate` date NOT NULL,
  `4NM19CS501` varchar(7) NOT NULL,
  `4NM19CS502` varchar(7) NOT NULL,
  `4NM19CS503` varchar(7) NOT NULL,
  `4NM19CS504` varchar(7) NOT NULL,
  `4NM19CS505` varchar(7) NOT NULL,
  `4NM19CS506` varchar(7) NOT NULL,
  `4NM19CS507` varchar(7) NOT NULL,
  `4NM19CS508` varchar(7) NOT NULL,
  `4NM19CS509` varchar(7) NOT NULL,
  `4NM19CS510` varchar(7) NOT NULL,
  `4NM19CS511` varchar(7) NOT NULL,
  `4NM19CS512` varchar(7) NOT NULL,
  `4NM19CS513` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance2`
--

INSERT INTO `attendance2` (`id`, `adate`, `4NM19CS501`, `4NM19CS502`, `4NM19CS503`, `4NM19CS504`, `4NM19CS505`, `4NM19CS506`, `4NM19CS507`, `4NM19CS508`, `4NM19CS509`, `4NM19CS510`, `4NM19CS511`, `4NM19CS512`, `4NM19CS513`) VALUES
(1, '2021-12-20', 'P', 'P', 'P', 'P', 'P', 'P', 'AB', 'P', 'P', 'P', 'P', 'P', 'P'),
(2, '2021-12-21', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'AB', 'P', 'P', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `username` varchar(30) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`username`, `fname`, `password`) VALUES
('faculty1', 'Suresh', 'faculty1'),
('faculty2', 'Mahesh', 'faculty2');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `usn` varchar(10) NOT NULL,
  `cie` int(100) NOT NULL,
  `see` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`usn`, `cie`, `see`) VALUES
('4NM19CS501', 90, 60),
('4NM19CS502', 80, 90),
('4NM19CS503', 62, 85),
('4NM19CS504', 74, 64),
('4NM19CS505', 94, 90),
('4NM19CS506', 66, 78),
('4NM19CS507', 84, 62),
('4NM19CS508', 62, 95),
('4NM19CS509', 74, 78),
('4NM19CS510', 33, 45),
('4NM19CS511', 50, 88),
('4NM19CS512', 80, 42),
('4NM19CS513', 70, 65);

-- --------------------------------------------------------

--
-- Table structure for table `marks2`
--

CREATE TABLE `marks2` (
  `usn` varchar(10) NOT NULL,
  `cie` int(11) NOT NULL,
  `see` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marks2`
--

INSERT INTO `marks2` (`usn`, `cie`, `see`) VALUES
('4NM19CS501', 90, 60),
('4NM19CS502', 80, 90),
('4NM19CS503', 62, 85),
('4NM19CS504', 74, 64),
('4NM19CS505', 94, 90),
('4NM19CS506', 66, 78),
('4NM19CS507', 84, 62),
('4NM19CS508', 62, 95),
('4NM19CS509', 74, 78),
('4NM19CS510', 33, 45),
('4NM19CS511', 50, 88),
('4NM19CS512', 80, 42),
('4NM19CS513', 70, 65);

-- --------------------------------------------------------

--
-- Table structure for table `studentlogin`
--

CREATE TABLE `studentlogin` (
  `usn` varchar(10) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentlogin`
--

INSERT INTO `studentlogin` (`usn`, `sname`, `email`, `password`) VALUES
('4NM19CS501', 'Abc', 'abc@gmail.com', '7ac66c0f148de9519b8bd264312c4d64'),
('4NM19CS502', 'Def', 'def@gmail.com', '4ed9407630eb1000c0f6b63842defa7d'),
('4NM19CS503', 'Ghi', 'ghi@gmail.com', '826bbc5d0522f5f20a1da4b60fa8c871'),
('4NM19CS504', 'Jkl', 'jkl@gmail.com', '699a474e923b8da5d7aefbfc54a8a2bd'),
('4NM19CS505', 'Mno', 'mno@gmail.com', 'd1cf6a6090003989122c4483ed135d55'),
('4NM19CS506', 'Pqr', 'pqr@gmail.com', 'f734fd4ff1214de59bab601aa34030d2'),
('4NM19CS507', 'Stu', 'stu@gmail.com', 'bdd5af62d46f0222f61908a1cff92f16'),
('4NM19CS508', 'Vw', 'vw@gmail.com', '7336a2c49b0045fa1340bf899f785e70'),
('4NM19CS509', 'Xyz', 'xyz@gmail.com', 'd16fb36f0911f878998c136191af705e'),
('4NM19CS510', 'Axx', 'axx@gmail.com', 'b1115f66b3714049d8753d41ef45daad'),
('4NM19CS511', 'Amar', 'amar@gmail.com', '36341cbb9c5a51ba81e855523de49dfd'),
('4NM19CS512', 'Ajay', 'ajay@gmail.com', '29e457082db729fa1059d4294ede3909'),
('4NM19CS513', 'Deep', 'deep@gmail.com', '6627415e807ee33c7302917216e7da68');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance2`
--
ALTER TABLE `attendance2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`usn`);

--
-- Indexes for table `marks2`
--
ALTER TABLE `marks2`
  ADD PRIMARY KEY (`usn`);

--
-- Indexes for table `studentlogin`
--
ALTER TABLE `studentlogin`
  ADD PRIMARY KEY (`usn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `attendance2`
--
ALTER TABLE `attendance2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `marks_ibfk_1` FOREIGN KEY (`usn`) REFERENCES `studentlogin` (`usn`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
