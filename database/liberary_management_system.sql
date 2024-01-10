-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2022 at 07:15 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `liberary_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_book`
--

CREATE TABLE `add_book` (
  `bookname` varchar(20) NOT NULL,
  `detail` varchar(30) NOT NULL,
  `author` varchar(30) NOT NULL,
  `isbn` varchar(15) NOT NULL,
  `category` varchar(30) NOT NULL,
  `price` varchar(15) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_book`
--

INSERT INTO `add_book` (`bookname`, `detail`, `author`, `isbn`, `category`, `price`, `quantity`) VALUES
('IT in the Future', '4th edithion', 'Jhoseph', '5473839535', 'Software', '$ 67', 10),
('Java', '1st Edition', 'Dietel', '5347845904', 'Civil', '$ 57', 10);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `firstname` varchar(15) NOT NULL,
  `lastname` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`firstname`, `lastname`, `email`, `username`, `password`) VALUES
('Dawit', 'Mandefro', 'dev@gmail.com', 'admin', '123'),
('dessie', 'fikir', 'dessie@gmail.com', 'dessie', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `issue_book`
--

CREATE TABLE `issue_book` (
  `studentname` varchar(20) NOT NULL,
  `idnumber` varchar(15) NOT NULL,
  `bookname` varchar(20) NOT NULL,
  `issuedate` varchar(15) NOT NULL,
  `expirydate` varchar(15) NOT NULL,
  `fine` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issue_book`
--

INSERT INTO `issue_book` (`studentname`, `idnumber`, `bookname`, `issuedate`, `expirydate`, `fine`) VALUES
('dev@gmail.com', '568/11', 'Java', '15-02-2022', '25-02-2022', 0),
('dev@gmail.com', '612/11', 'IT in the Future', '15-02-2022', '25-02-2022', 0),
('dev@gmail.com', '675/11', 'Java', '15-02-2022', '25-02-2022', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `firstname` varchar(15) NOT NULL,
  `lastname` varchar(15) NOT NULL,
  `idnumber` varchar(15) NOT NULL,
  `department` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`firstname`, `lastname`, `idnumber`, `department`, `email`, `username`, `password`) VALUES
('Abebe', 'fikir', '612/11', 'Computer Science', 'abe@gmail.com', 'abe', '123'),
('John', 'Alex', '345', 'Software', 'jo@gmail.com', 'admin', '1234'),
('John', 'Alex', '675/11', 'Civil', 'dev@gmail.com', 'deva', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_book`
--
ALTER TABLE `add_book`
  ADD PRIMARY KEY (`bookname`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `issue_book`
--
ALTER TABLE `issue_book`
  ADD PRIMARY KEY (`idnumber`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`username`),
  ADD KEY `username` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
