-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 26, 2023 at 05:53 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pestana`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookers`
--

CREATE TABLE `bookers` (
  `ID` int(11) NOT NULL,
  `First_Name` varchar(100) NOT NULL,
  `Family_Name` varchar(155) NOT NULL,
  `Birthday` date NOT NULL,
  `BookerID` int(11) NOT NULL,
  `ReservationID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookers`
--

INSERT INTO `bookers` (`ID`, `First_Name`, `Family_Name`, `Birthday`, `BookerID`, `ReservationID`) VALUES
(8, 'El Mahdi', 'Saissi Hassani', '2022-01-01', 1, 10),
(9, 'Mohammed', 'Bourra', '2004-06-20', 1, 11),
(10, 'Mohamed', 'Mousta', '2002-12-14', 1, 11),
(11, 'El Mehdi', 'Bahij', '2000-12-04', 1, 12),
(12, 'Younes ', 'Elbezzi', '2001-02-17', 1, 12),
(13, 'Jalal', 'Lagdimi', '2002-02-03', 1, 12),
(14, 'El Mahdi', 'Saissi Hassani', '2022-01-01', 1, 13),
(15, 'El Mahdi', 'Saissi Hassani', '2022-01-01', 1, 14),
(16, 'El Mahdi', 'Saissi Hassani', '2022-01-01', 1, 15),
(17, 'Some', 'One', '2000-01-01', 1, 16),
(18, 'Another', 'One', '1990-01-01', 1, 16),
(19, 'El Mahdi', 'Saissi Hassani', '2022-01-01', 1, 17),
(20, 'El Mahdi', 'Saissi Hassani', '2022-01-01', 1, 18),
(21, 'Mohammed', 'Moustarhfir', '2002-02-02', 2, 19);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `ID` int(11) NOT NULL,
  `Room_Name` varchar(20) NOT NULL,
  `Room_Type` varchar(100) DEFAULT NULL,
  `Bookers_Number` int(11) NOT NULL,
  `Reservation_for` varchar(255) DEFAULT NULL,
  `Check_In` date DEFAULT NULL,
  `Check_Out` date DEFAULT NULL,
  `UserID` int(11) NOT NULL,
  `RoomID` int(11) NOT NULL,
  `Price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`ID`, `Room_Name`, `Room_Type`, `Bookers_Number`, `Reservation_for`, `Check_In`, `Check_Out`, `UserID`, `RoomID`, `Price`) VALUES
(10, 'Single', '', 1, 'El Mahdi Saissi Hassani', '2023-02-25', '2023-02-26', 1, 1, 142.5),
(11, 'Double', '', 2, 'El Mahdi Saissi Hassani', '2023-03-02', '2023-03-03', 1, 2, 247),
(12, 'Suite', 'Standard Suite', 3, 'El Mahdi Saissi Hassani', '2023-03-03', '2023-03-05', 1, 3, 475),
(13, 'Suite', 'Junior Suite', 1, 'El Mahdi Saissi Hassani', '2023-01-20', '2023-01-22', 1, 4, 460.6),
(14, 'Suite', 'Honeymoon Suite', 1, 'El Mahdi Saissi Hassani', '2023-02-21', '2023-02-25', 1, 7, 564),
(15, 'Double', '', 1, 'El Mahdi Saissi Hassani', '0000-00-00', '0000-00-00', 1, 2, 244.4),
(16, 'Double', '', 2, 'El Mahdi Saissi Hassani', '0000-00-00', '0000-00-00', 1, 2, 236.6),
(17, 'Double', '', 1, 'El Mahdi Saissi Hassani', '2023-02-25', '2023-02-26', 1, 2, 236.6),
(18, 'Suite', 'Penthouse Suite', 1, 'El Mahdi Saissi Hassani', '0000-00-00', '0000-00-00', 1, 6, 546),
(19, 'Single', '', 1, 'Mohammed Moustarhfir', '2023-03-01', '2023-03-04', 2, 1, 150);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `ID` int(11) NOT NULL,
  `Room_Name` varchar(20) NOT NULL,
  `Room_Type` varchar(100) DEFAULT NULL,
  `Room_Capacity` int(11) DEFAULT NULL,
  `Thumbnail` varchar(255) DEFAULT NULL,
  `Price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`ID`, `Room_Name`, `Room_Type`, `Room_Capacity`, `Thumbnail`, `Price`) VALUES
(1, 'Single', '', 1, 'single1.jpg', 150),
(2, 'Double', '', 2, 'double1.jpg', 260),
(3, 'Suite', 'Standard Suite', 6, 'suite1.jpg', 500),
(4, 'Suite', 'Junior Suite', 6, 'suite2.jpg', 490),
(5, 'Suite', 'Presidential Suite', 6, 'suite3.jpg', 590),
(6, 'Suite', 'Penthouse Suite', 6, 'suite4.jpg', 600),
(7, 'Suite', 'Honeymoon Suite', 6, 'suite5.jpg', 600),
(8, 'Suite', 'Bridal Suite', 6, 'suite6.jpg', 650),
(9, 'Quad', 'Family Quad', 4, 'HTB1k85pXsvrK1Rjy0Feq6ATmVXaJ.jpg', 440),
(12, 'Quad', 'Friendly Quad', 4, 'family-bedroom.jpg', 450),
(13, 'Hamza', 'Ghayarha', 4, 'royal.jpg', 5555.5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `First_Name` varchar(100) NOT NULL,
  `Family_Name` varchar(155) NOT NULL,
  `Phone_Number` varchar(10) NOT NULL,
  `Birthday` date NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Admin` int(11) DEFAULT 0,
  `Discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `First_Name`, `Family_Name`, `Phone_Number`, `Birthday`, `Username`, `Email`, `Password`, `Admin`, `Discount`) VALUES
(1, 'El Mahdi', 'Saissi Hassani', '0453234323', '2022-01-01', 'mahdi', 'mahdi@gmail.com', '$2y$10$uNjF3cgDr9r5LX5M4slCxuqQtSmnrm.yWYhS8caW8rMypMrzqCpWq', 1, 6),
(2, 'Mohammed', 'Moustarhfir', '0606666600', '2002-02-02', 'mousta', 'mousta@gmail.com', '$2y$10$IeF.wSPBvHQ3kFuOU0HleeIUrXe0LCmOaqWtDpvqXz6LWUyEd2PCK', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookers`
--
ALTER TABLE `bookers`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `InviteID` (`BookerID`),
  ADD KEY `ReservationID` (`ReservationID`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `RoomID` (`RoomID`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookers`
--
ALTER TABLE `bookers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookers`
--
ALTER TABLE `bookers`
  ADD CONSTRAINT `bookers_ibfk_1` FOREIGN KEY (`BookerID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `bookers_ibfk_2` FOREIGN KEY (`ReservationID`) REFERENCES `reservations` (`ID`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`RoomID`) REFERENCES `rooms` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
