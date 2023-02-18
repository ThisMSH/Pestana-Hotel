-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2023 at 12:44 AM
-- Server version: 8.0.31
-- PHP Version: 8.1.12

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
  `ID` int NOT NULL,
  `First_Name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `Family_Name` varchar(155) COLLATE utf8mb4_general_ci NOT NULL,
  `Birthday` date NOT NULL,
  `InviteID` int NOT NULL,
  `ReservationID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `ID` int NOT NULL,
  `Room_Name` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `Room_Type` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Bookers_Number` int NOT NULL,
  `Reservation_for` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Check_In` date DEFAULT NULL,
  `Check_Out` date DEFAULT NULL,
  `UserID` int NOT NULL,
  `RoomID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`ID`, `Room_Name`, `Room_Type`, `Bookers_Number`, `Reservation_for`, `Check_In`, `Check_Out`, `UserID`, `RoomID`) VALUES
(1, 'Double', '', 2, 'El Mahdi Saissi Hassani', '2023-02-20', '2023-02-25', 1, 2),
(2, 'Double', '', 2, 'El Mahdi Saissi Hassani', '2023-03-02', '2023-03-05', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `ID` int NOT NULL,
  `Room_Name` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `Room_Type` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Room_Capacity` int DEFAULT NULL,
  `Thumbnail` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`ID`, `Room_Name`, `Room_Type`, `Room_Capacity`, `Thumbnail`, `Price`) VALUES
(1, 'Single', '', 1, '', 150),
(2, 'Double', '', 2, '', 260),
(3, 'Suite', 'Standard Suite', 6, '', 500),
(4, 'Suite', 'Junior Suite', 6, '', 490),
(5, 'Suite', 'Presidential Suite', 6, '', 590),
(6, 'Suite', 'Penthouse Suite', 6, '', 600),
(7, 'Suite', 'Honeymoon Suite', 6, '', 600),
(8, 'Suite', 'Bridal Suite', 6, '', 650);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int NOT NULL,
  `First_Name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `Family_Name` varchar(155) COLLATE utf8mb4_general_ci NOT NULL,
  `Phone_Number` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `Birthday` date NOT NULL,
  `Username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Admin` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `First_Name`, `Family_Name`, `Phone_Number`, `Birthday`, `Username`, `Email`, `Password`, `Admin`) VALUES
(1, 'El Mahdi', 'Saissi Hassani', '0453234323', '2022-01-01', 'mahdi', 'mahdi@gmail.com', '$2y$10$uNjF3cgDr9r5LX5M4slCxuqQtSmnrm.yWYhS8caW8rMypMrzqCpWq', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookers`
--
ALTER TABLE `bookers`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `InviteID` (`InviteID`),
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
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookers`
--
ALTER TABLE `bookers`
  ADD CONSTRAINT `bookers_ibfk_1` FOREIGN KEY (`InviteID`) REFERENCES `users` (`ID`),
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
