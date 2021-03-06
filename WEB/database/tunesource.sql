-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2021 at 10:55 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tunesource`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`username`, `password`) VALUES
('a', '123'),
('e', '1');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(11) NOT NULL,
  `customerName` varchar(50) DEFAULT NULL,
  `customerEmail` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `genreID` int(11) NOT NULL,
  `genreName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genreID`, `genreName`) VALUES
(1, 'pop'),
(2, 'rock');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `orderName` varchar(50) DEFAULT NULL,
  `oderPrice` int(11) DEFAULT NULL,
  `customerID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `song`
--

CREATE TABLE `song` (
  `songID` int(11) NOT NULL,
  `songName` varchar(50) DEFAULT NULL,
  `songIMG` varchar(50) DEFAULT NULL,
  `songAudio` varchar(50) DEFAULT NULL,
  `song_price` int(11) NOT NULL,
  `genreID` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `song`
--

INSERT INTO `song` (`songID`, `songName`, `songIMG`, `songAudio`, `song_price`, `genreID`) VALUES
(1, 'test', 'startend.jpg', 'EDEN - drugs.mp3', 50, 1),
(2, 'Hai chữ đã từng', 'haichudatung.jpg', 'HaiChuDaTung-NhuViet.mp3', 50, 0),
(3, 'EDEN - rock + roll', 'rockroll.jpg', 'rock + roll.mp3', 100, 0),
(4, 'EDEN - drugs', 'drugs.jpg', 'EDEN - drugs.mp3', 100, 0),
(5, 'Mike Krol - La La La', 'lalala.jpg', 'Mike Krol - La La La.mp3', 80, 0),
(6, 'Mike Krol - Less Than Together', 'lessthantogether.jpg', 'Mike Krol - Less Than Together.mp3', 80, 0),
(7, 'Eric Prydz - Call On Me', 'callonme.jpg', 'Ｅｒｉｃ Ｐｒｙｄｚ － Ｃａｌｌ Ｏｎ Ｍｅ （Ｖａｐｏｒｗａｖｅ）.mp3', 50, 0),
(8, 'Gigi D\'Agostino - L\'Amour Toujours ', 'Ｇｉｇｉ　Ｄ＇Ａｇｏｓｔｉｎｏ　－　Ｌ＇Ａｍｏｕｒ　Ｔｏｕｊｏｕｒｓ.jpg', 'Ｇｉｇｉ Ｄ＇Ａｇｏｓｔｉｎｏ － Ｌ＇Ａｍｏｕｒ Ｔｏｕｊｏｕｒｓ （Ｖａｐｏｒｗａｖｅ）.mp3', 60, 0),
(9, 'Kavinsky - Nightcall', 'nightcall.jpg', 'Kavinsky - Nightcall.mp3', 80, 0),
(10, 'Sabaton - Panzerkampf', 'panzerkampf.jpg', 'Panzerkampf.mp3', 75, 0),
(11, 'EDEN - start//end', 'startend.jpg', 'EDEN - StartEnd.mp3', 100, 0),
(12, 'Ed Sheeran - Shape Of You', 'shapeofyou.jpg', 'Ed Sheeran - Shape Of You.mp3', 70, 0),
(13, 'qwer', 'panzerkampf.jpg', '', 100, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `songorders`
--

CREATE TABLE `songorders` (
  `songID` int(11) DEFAULT NULL,
  `orderID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genreID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `customerID` (`customerID`);

--
-- Indexes for table `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`songID`),
  ADD KEY `genreID` (`genreID`);

--
-- Indexes for table `songorders`
--
ALTER TABLE `songorders`
  ADD KEY `songID` (`songID`),
  ADD KEY `orderID` (`orderID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`username`) REFERENCES `account` (`username`);

--
-- Constraints for table `genre`
--
ALTER TABLE `genre`
  ADD CONSTRAINT `genre_ibfk_1` FOREIGN KEY (`songID`) REFERENCES `song` (`songID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`);

--
-- Constraints for table `songorders`
--
ALTER TABLE `songorders`
  ADD CONSTRAINT `songorders_ibfk_1` FOREIGN KEY (`songID`) REFERENCES `song` (`songID`),
  ADD CONSTRAINT `songorders_ibfk_2` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
