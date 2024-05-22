-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2021 at 03:25 AM
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
-- Database: `packagedelivery`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `Account_ID` int(11) NOT NULL,
  `Username` varchar(256) NOT NULL,
  `Password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`Account_ID`, `Username`, `Password`) VALUES
(1, 'admin1', '$2y$10$V6m5KJ03ukoVynXGY7w21eUGWmsA35huwUDH60uTRxY6MtJcCJIRG'),
(2, 'admin2', '$2y$10$ZrwEomS.bmFE14NwrveZOOsgVwGRu4vG4hcZXl7pLmEVufq9daYIC'),
(3, 'admin3', '$2y$10$lnw40ha3lKigKR7BjVoHj.nOIX9N2uejWuLR0Asy1SDv5pPHjZqOW'),
(4, 'admin7', '$2y$10$IOmZm4CHMphO9vGROFfKnutlMAqyUcN5vmdgOE66pn8gLUCHppkJC'),
(5, 'costumer1', '$2y$10$/ovSGijECiCJXAIvk4th7.tD5GuBpOIZuFI4BC.uX//m1IagQGDcm'),
(6, 'drake', '$2y$10$9mRL2t0pcxAOYtWhICeQNeE7JHtWefBv8.0IfEoM1SV0nL.u3rS1.'),
(7, 'ewe', '$2y$10$jjJywiJ0bLQWK495pH.Li.XLuw6V0LF7/T2At6jbwSt9lc6BvEwDi'),
(8, 'GianCarlo', '$2y$10$/.tkO96eRirqUvH2k86cweXnlrY8aCWEXMfpJsZT6F4R3XpvOge8.'),
(9, 'Hector', '$2y$10$.SY4794Zb0N34lhQjzPKEuxp4QDsacb73/hQW2Jj4tPNZj2lkzSAW'),
(10, 'HydeSen', '$2y$10$PGzX9ERs8reeprnfhq9oLerdek1DaDhpz134RNcKWrT.a9M4CJarq'),
(11, 'josh', '$2y$10$dscs41.cBEqA5z1ULdk3ZOe5LqknwdpzKlgVstMAEW758g8Hwijie'),
(12, 'michael', '$2y$10$5HwqDDgCqKJ0AFz4ra/aR.uVSDqWzW.3I7axsooxJjo8ShlPnxP0K'),
(13, 'rider1', '$2y$10$HMUlpQnOCkW2zBCApShw8eqxbimJXRpmSdGzL6Xls.3orsipoQT0u'),
(14, 'rider2', '$2y$10$K5c5TVjnggaO4chpU/G1VebuuEUSWA4QqhFxBpYnV9wi94965HBkm'),
(15, 'rider3', '$2y$10$yysjgPjkvaoVDZZOZp5sFO0bGrqFJFMfWQuLjw8/cHdcF5yYEaNw.'),
(16, 'schill', '$2y$10$qMpLZlgmReF/ono0ccgcxutylKy/61YRlkjJQ1BDtpyOT0nVQhDXC'),
(17, 'sdfsdf', '$2y$10$9Soxo1nPllYsrTqdqxom5eAGCnOe4YID70.3s6cxVO8e13SberR0C'),
(18, 'staff1', '$2y$10$6J8bsYmacxkCGpg0ZV13h.ok/Wnr2Fsw0Tc3Iq/ARa150E6TiqMTC'),
(19, 'SuperAdmin', '$2y$10$jyzbPQXyy.HHvZe8JTPLu.IMkYLz7RJbPq8nGppIKQWYZfN82VySy'),
(20, 'Username', '$2y$10$mQftSykziZeY3pLYQEIuxu6JZivnDMncOSEXD1JBxbAsI8EEscrIC');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `Branch_Name` varchar(256) NOT NULL,
  `Branch_Address` varchar(256) NOT NULL,
  `Branch_ContactNum` varchar(14) NOT NULL,
  `Branch_Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`Branch_Name`, `Branch_Address`, `Branch_ContactNum`, `Branch_Email`) VALUES
('Branch0', 'Main Branch', '09123456789', 'contact_ph@bluefalcon.co'),
('Branch1', 'Muntinlupa City', '0923483122', 'contact_MN@bluefalcon.co'),
('Branch10', 'Muntinlupa Ulit', '09212856789', 'contact_MU@bluefalcon.co'),
('Branch11', 'Sabuanan, Ilocos sur', '0923483122', 'contact_SB1@bluefalcon.co'),
('Branch2', 'Sabuanan, Ilocos sur', '0923483122', 'contact_SB2@bluefalcon.co'),
('Branch3', 'Vigan City', '09205678011', 'contact_VC@bluefalcon.co'),
('Branch4', 'Laoag City', '09205673431', 'contact_LC@bluefalcon.co');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `Manager_ID` int(11) NOT NULL,
  `Manager_LastName` varchar(256) NOT NULL,
  `Manager_FirstName` varchar(256) NOT NULL,
  `Manager_MiddleInitial` varchar(2) NOT NULL,
  `Manager_Address` varchar(256) NOT NULL,
  `Manager_ContactNum` varchar(255) NOT NULL,
  `Manager_Email` varchar(256) NOT NULL,
  `Branch_Name` varchar(256) NOT NULL,
  `Username` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`Manager_ID`, `Manager_LastName`, `Manager_FirstName`, `Manager_MiddleInitial`, `Manager_Address`, `Manager_ContactNum`, `Manager_Email`, `Branch_Name`, `Username`) VALUES
(1, 'Gamata', 'Mark', 'R', 'Sabuanan, Ilocos sur', '923483122', 'ctiancarlramos@gmail.com', 'Branch4', 'admin1'),
(2, 'Carlo', 'Gian', 'R.', 'Sabuanan', '2147483647', 'gian2gmail.com', 'Branch3', 'admin2'),
(3, 'deed', 'Achilles', 'R', 'Vical Santa Lucia', '2147483647', 'ftyrt@gmail.com', 'Branch4', 'admin3'),
(4, 'Admin', 'Super', 'B', 'Sabuanan', '2147483647', 'support.bluefalcon@gmail.com', 'Branch0', 'SuperAdmin'),
(5, 'admin7', 'sarga', 'f', 'sdfasdfasdfas', '2147483647', 'asdfgsad@gmail.com', 'Branch4', 'admin7');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `Package_ID` int(11) NOT NULL,
  `Package_Fragility` varchar(255) NOT NULL,
  `Package_size` varchar(255) NOT NULL,
  `Package_Deal` varchar(255) NOT NULL,
  `Additional_Instructions` varchar(255) NOT NULL,
  `Branch_Name` varchar(255) DEFAULT NULL,
  `Payment_Method` varchar(255) NOT NULL,
  `Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`Package_ID`, `Package_Fragility`, `Package_size`, `Package_Deal`, `Additional_Instructions`, `Branch_Name`, `Payment_Method`, `Amount`) VALUES
(65, 'Yes', 'Small', 'Express', '1234', 'Tarlac', 'Cash on Delivery', 200),
(66, 'No', 'Extra Large', 'Regular', '321312', 'Pampanga', 'Cash on Delivery', 165),
(67, 'No', 'Small', 'Regular', '', 'Baguio', 'Cash on Delivery', 120),
(68, 'Yes', 'Large', 'Express', 'mama mo', 'Branch4', 'Dogecoin', 235),
(69, 'No', 'Small', 'Regular', 'yes', 'Branch0', 'Cash on Delivery', 120),
(70, 'Yes', 'Small', 'Regular', '', 'Branch3', 'Cash on Delivery', 150),
(71, 'No', 'Small', 'Regular', '', 'Branch3', 'Cash on Delivery', 120),
(72, 'No', 'Small', 'Regular', '', 'Branch3', 'Cash on Delivery', 120),
(73, 'No', 'Small', 'Regular', '', 'Branch3', 'Cash on Delivery', 120),
(74, 'No', 'Small', 'Regular', '', 'Branch3', 'Cash on Delivery', 120),
(75, 'No', 'Small', 'Regular', '', 'Branch3', 'Cash on Delivery', 120),
(76, 'Yes', 'Small', 'Regular', '', 'Branch3', 'Cash on Delivery', 150),
(77, 'Yes', 'Small', 'Regular', '', 'Branch3', 'E-bank', 150),
(78, 'Yes', 'Small', 'Regular', '', 'Branch3', 'E-bank', 150),
(79, 'No', 'Large', 'Regular', '', 'Branch3', 'Cash on Delivery', 155),
(80, 'No', 'Small', 'Regular', '', 'Branch3', 'Cash on Delivery', 120),
(81, 'No', 'Small', 'Regular', '', 'Branch3', 'Cash on Delivery', 120),
(82, 'No', 'Large', 'Regular', '', 'Branch3', 'Cash on Delivery', 155),
(83, 'No', 'Small', 'Express', '', 'Branch0', 'Cash on Delivery', 170),
(84, 'No', 'Large', 'Regular', '', 'Branch3', 'Cash on Delivery', 155),
(85, 'Yes', 'Small', 'Regular', '', 'Branch3', 'Cash on Delivery', 150);

-- --------------------------------------------------------

--
-- Table structure for table `receives`
--

CREATE TABLE `receives` (
  `Package_ID` int(11) NOT NULL,
  `Recipient_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receives`
--

INSERT INTO `receives` (`Package_ID`, `Recipient_ID`) VALUES
(65, 60),
(66, 61),
(67, 62),
(68, 63),
(69, 64),
(70, 65),
(71, 66),
(72, 67),
(73, 68),
(74, 69),
(75, 70),
(76, 71),
(77, 72),
(78, 73),
(79, 74),
(80, 75),
(81, 76),
(82, 77),
(83, 78),
(84, 79),
(85, 80);

-- --------------------------------------------------------

--
-- Table structure for table `recipient`
--

CREATE TABLE `recipient` (
  `Recipient_ID` int(11) NOT NULL,
  `Recipient_LastName` varchar(20) NOT NULL,
  `Recipient_FirstName` varchar(20) NOT NULL,
  `Recipient_MiddleInitial` char(2) DEFAULT NULL,
  `Recipient_Address` varchar(256) NOT NULL,
  `Recipient_ContactNum` varchar(255) NOT NULL,
  `Recipient_Email` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipient`
--

INSERT INTO `recipient` (`Recipient_ID`, `Recipient_LastName`, `Recipient_FirstName`, `Recipient_MiddleInitial`, `Recipient_Address`, `Recipient_ContactNum`, `Recipient_Email`) VALUES
(60, 'Dela Cruz', 'Juan', 'F', 'Manila', '911', 'polo@yes'),
(61, 'Porsche', 'Yes', 'G', 'Yo', '123131', 'ghfhfghf@dfgdfg'),
(62, 'Mama', 'Mo', 'B', 'here', '432432', '312312231'),
(63, 'Dela Torre', 'Timothy ', 'J', 'Paranque', '911', 'tj@email.com'),
(64, 'Dela Torre', 'Timothy ', 'J', 'Paranque', '911', 'tj@email.com'),
(65, 'siya', 'oo', 'S', 'dito', '4324312', 'sdjajdhs@gmail.com'),
(66, 'yes', 'sdffds', 'f', 'dsgfdg 1213213', '543534543', 'fdgdg@email.com'),
(67, 'asdsda', 'dsadsa', 'fd', 'dsfsdf', '342534543', '4324324@email.com'),
(68, 'mama', 'rwerew', 'rw', 'erwwr', '453534', 'sdja432jdhs@gmail.com'),
(69, 'rewrwe', 'werrwe', 'er', 'ertrwe', '63', 't42342342j@email.com'),
(70, 'asddasdas', 'dsadas', 'd', 'dadsasdf', '3213143', '312312312tj@email.com'),
(71, 'mama', 'Timothy ', 'J', 'test', '911', 'rwewertj@email.com'),
(72, 'Dela Torre', 'Timothy', 'J', 'Paranque', '0967534552', 'tj1@email.com'),
(73, 'Dela Torre', 'Timothy', 'J', 'Paranque', '0967534552', 'tj1@email.com'),
(74, 'Dela Torre', 'Timothy ', 'f', 'test', '0967534552', 'tj2@email.com'),
(75, 'mama', 'Timothy', 'f', 'diyan', '0967534552', 'tj231@email.com'),
(76, 'mama', 'Timothy', 'f', 'Paranque', '0967534552', '453tj@email.com'),
(77, 'Dela Torre', 'eqwqwe', 'e', '5345', '123', 'tj2332231@email.com'),
(78, 'mama', 'mo', 'g', 'test', '0967534552', 'mamao1@email.com'),
(79, 'Dela Torre', 'Timothy ', 'J', 'Paranque', '911', '321312321j@email.com'),
(80, 'Fernandez', 'Aileen Julienne', 'C', 'dito', '342423423', 'tj1312321@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `rider`
--

CREATE TABLE `rider` (
  `Rider_ID` int(11) NOT NULL,
  `Rider_LastName` varchar(256) NOT NULL,
  `Rider_FirstName` varchar(256) NOT NULL,
  `Rider_MiddleInitial` varchar(2) NOT NULL,
  `Rider_Address` varchar(256) NOT NULL,
  `Rider_ContactNum` varchar(255) NOT NULL,
  `Rider_Email` varchar(256) NOT NULL,
  `Branch_Name` varchar(256) NOT NULL,
  `Username` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rider`
--

INSERT INTO `rider` (`Rider_ID`, `Rider_LastName`, `Rider_FirstName`, `Rider_MiddleInitial`, `Rider_Address`, `Rider_ContactNum`, `Rider_Email`, `Branch_Name`, `Username`) VALUES
(1, 'Sen', 'Hyde', 'T', 'Santa Cruz', '2147483647', 'dfasf@gmail.com', 'Branch4', 'HydeSen'),
(2, 'Cable', 'John', 'A', 'Santa Cruz', '2147483647', 'srfgeawv @gmail.com', 'Branch4', 'rider1'),
(3, 'john', 'carlo', 'v', 'dito', '0911111111', 'djkfhsdjkf@gdfkojgid.com', 'Branch3', 'rider2'),
(4, 'Polo', 'Marco', 'D', 'Paranacue', '09475895095', 'marcopolo@gmail.com', 'Branch3', 'rider3');

-- --------------------------------------------------------

--
-- Table structure for table `sender`
--

CREATE TABLE `sender` (
  `Sender_ID` int(11) NOT NULL,
  `Sender_LastName` varchar(256) NOT NULL,
  `Sender_FirstName` varchar(256) NOT NULL,
  `Sender_MiddleInitial` varchar(2) NOT NULL,
  `Sender_Address` varchar(256) NOT NULL,
  `Sender_ContactNum` varchar(255) NOT NULL,
  `Sender_Email` varchar(256) NOT NULL,
  `Username` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sender`
--

INSERT INTO `sender` (`Sender_ID`, `Sender_LastName`, `Sender_FirstName`, `Sender_MiddleInitial`, `Sender_Address`, `Sender_ContactNum`, `Sender_Email`, `Username`) VALUES
(1, 'Carlo', 'Gian', 'R', 'Sabuanan', '2147483647', 'mrgamata@gmail.com', 'GianCarlo'),
(2, 'Thomas', 'Lapus', 'C', 'Santa', '2147483647', 'sr4et5ewv@gmail.com', 'costumer1'),
(3, 'ertyertyer', 'gertertert', 'g', 'sgdfgdfg', '923483122', 'wefrwer', 'ewe'),
(4, 'wrwerw', 'wrwerw', 'fs', 'erwerwe', '3423423', 'rwerwer@gmail.com', 'sdfsdf'),
(44, 'Nisay', 'Deiondre Judd', 'C', '160 MacArthur Highway Mabini, Moncada, Tarlac', '09396136611', 'nisayjosh@gmail.com', 'schill'),
(45, 'Sus', 'Lesley', 'G', 'Candon', '2147483647', 'fgvwe4t@gmail.com', 'staff1'),
(46, 'john', 'carlo', 'v', 'dito', '0911111111', 'djkfhsdjkf@gdfkojgid.com', 'rider2'),
(47, 'Gamata', 'Mark', 'R', 'Sabuanan, Ilocos sur', '923483122', 'ctiancarlramos@gmail.com', 'admin1'),
(48, 'Nisay', 'Drake', 'V', '160 MacArthur Highway Mabini, Moncada, Tarlac', '09396136611', 'drakenisay@gmail.com', 'drake'),
(49, 'Carlo', 'Gian', 'R.', 'Sabuanan', '2147483647', 'gian2gmail.com', 'admin2'),
(50, 'Nisay', 'Josh', 'B', '160 MacArthur Highway Mabini, Moncada, Tarlac', '09396136611', 'joshnisay@gmail.com', 'josh');

-- --------------------------------------------------------

--
-- Table structure for table `sends`
--

CREATE TABLE `sends` (
  `Package_ID` int(11) NOT NULL,
  `Sender_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sends`
--

INSERT INTO `sends` (`Package_ID`, `Sender_ID`) VALUES
(67, 1),
(65, 44),
(66, 44),
(68, 44),
(69, 44),
(70, 44),
(71, 44),
(72, 44),
(73, 44),
(74, 44),
(75, 44),
(76, 44),
(79, 44),
(82, 44),
(84, 44),
(85, 44),
(80, 47),
(81, 47),
(83, 47);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `Staff_ID` int(11) NOT NULL,
  `Staff_LastName` varchar(256) NOT NULL,
  `Staff_FirstName` varchar(256) NOT NULL,
  `Staff_MiddleInitial` varchar(2) NOT NULL,
  `Staff_Address` varchar(256) NOT NULL,
  `Staff_ContactNum` varchar(255) NOT NULL,
  `Staff_Email` varchar(256) NOT NULL,
  `Branch_Name` varchar(256) NOT NULL,
  `Username` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Staff_ID`, `Staff_LastName`, `Staff_FirstName`, `Staff_MiddleInitial`, `Staff_Address`, `Staff_ContactNum`, `Staff_Email`, `Branch_Name`, `Username`) VALUES
(1, 'Sen', 'Hector', 'A', 'Santa', '2147483647', 'wrawet@gmail.com', 'Branch3', 'Hector'),
(2, 'Sus', 'Lesley', 'B', 'Candon', '2147483647', 'fgvwe4t@gmail.com', 'Branch3', 'staff1'),
(3, 'Tejada', 'Michael Angelo', 'F', 'Manila', '8392748923', 'mftejada@up.edu.ph', 'Branch3', 'michael');

-- --------------------------------------------------------

--
-- Table structure for table `tracker`
--

CREATE TABLE `tracker` (
  `Tracking_Number` int(11) NOT NULL,
  `Package_ID` int(11) NOT NULL,
  `Rider_ID` int(11) NOT NULL,
  `Sender_ID` int(11) NOT NULL,
  `Recipient_ID` int(11) NOT NULL,
  `ETA` varchar(20) NOT NULL,
  `Tracker_Date` date NOT NULL DEFAULT current_timestamp(),
  `Tracker_Status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tracker`
--

INSERT INTO `tracker` (`Tracking_Number`, `Package_ID`, `Rider_ID`, `Sender_ID`, `Recipient_ID`, `ETA`, `Tracker_Date`, `Tracker_Status`) VALUES
(26, 65, 0, 44, 60, '1-2 days', '2021-12-12', 'Sorting'),
(27, 66, 0, 44, 61, '4-8 days', '2021-12-12', 'Shipped Out'),
(28, 67, 0, 1, 62, '4-8 days', '2021-12-12', 'Delivered'),
(29, 68, 0, 44, 63, '1-2 days', '2021-12-13', 'Order Created'),
(31, 69, 0, 44, 64, '4-8 days', '2021-12-13', 'Order Created'),
(32, 70, 3, 44, 65, '4-8 days', '2021-12-13', 'Delivered'),
(33, 71, 4, 44, 66, '4-8 days', '2021-12-13', 'Order Created'),
(34, 72, 4, 44, 67, '4-8 days', '2021-12-13', 'Order Created'),
(35, 73, 4, 44, 68, '4-8 days', '2021-12-13', 'Order Created'),
(36, 74, 4, 44, 69, '4-8 days', '2021-12-13', 'Order Created'),
(37, 75, 3, 44, 70, '4-8 days', '2021-12-13', 'Out for Delivery'),
(38, 76, 3, 44, 71, '4-8 days', '2021-12-13', 'Order Created'),
(39, 79, 3, 44, 74, '4-8 days', '2021-12-14', 'Order Created'),
(40, 80, 3, 47, 75, '4-8 days', '2021-12-14', 'Delivered'),
(41, 81, 3, 47, 76, '4-8 days', '2021-12-14', 'Order Created'),
(42, 82, 3, 44, 77, '4-8 days', '2021-12-14', 'Order Created'),
(43, 83, 0, 47, 78, '1-2 days', '2021-12-14', 'Order Created'),
(44, 84, 0, 44, 79, '4-8 days', '2021-12-14', 'Order Created'),
(45, 85, 0, 44, 80, '4-8 days', '2021-12-14', 'Order Created');

-- --------------------------------------------------------

--
-- Table structure for table `tracks`
--

CREATE TABLE `tracks` (
  `Tracking_Number` int(11) NOT NULL,
  `Package_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tracks`
--

INSERT INTO `tracks` (`Tracking_Number`, `Package_ID`) VALUES
(26, 65),
(27, 66),
(28, 67),
(29, 68),
(31, 69),
(32, 70),
(33, 71),
(34, 72),
(35, 73),
(36, 74),
(37, 75),
(38, 76),
(39, 79),
(40, 80),
(41, 81),
(42, 82),
(43, 83),
(44, 84),
(45, 85);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`Username`),
  ADD UNIQUE KEY `Account_ID` (`Account_ID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`Branch_Name`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`Manager_ID`),
  ADD UNIQUE KEY `Manager_ID` (`Manager_ID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD KEY `manager_ibfk_2` (`Branch_Name`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`Package_ID`);

--
-- Indexes for table `receives`
--
ALTER TABLE `receives`
  ADD PRIMARY KEY (`Package_ID`),
  ADD KEY `Recipient_ID` (`Recipient_ID`);

--
-- Indexes for table `recipient`
--
ALTER TABLE `recipient`
  ADD PRIMARY KEY (`Recipient_ID`),
  ADD UNIQUE KEY `Recipient_ID` (`Recipient_ID`);

--
-- Indexes for table `rider`
--
ALTER TABLE `rider`
  ADD PRIMARY KEY (`Rider_ID`),
  ADD UNIQUE KEY `Rider_ID` (`Rider_ID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD KEY `Branch_Name` (`Branch_Name`);

--
-- Indexes for table `sender`
--
ALTER TABLE `sender`
  ADD PRIMARY KEY (`Sender_ID`),
  ADD UNIQUE KEY `Sender_ID` (`Sender_ID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `sends`
--
ALTER TABLE `sends`
  ADD PRIMARY KEY (`Package_ID`),
  ADD UNIQUE KEY `Package_ID` (`Package_ID`),
  ADD KEY `Sender_ID` (`Sender_ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`Staff_ID`),
  ADD UNIQUE KEY `Staff_ID` (`Staff_ID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD KEY `Branch_Name` (`Branch_Name`);

--
-- Indexes for table `tracker`
--
ALTER TABLE `tracker`
  ADD PRIMARY KEY (`Tracking_Number`),
  ADD UNIQUE KEY `Tracking_Number` (`Tracking_Number`),
  ADD UNIQUE KEY `Package_ID` (`Package_ID`);

--
-- Indexes for table `tracks`
--
ALTER TABLE `tracks`
  ADD PRIMARY KEY (`Tracking_Number`),
  ADD KEY `Package_ID` (`Package_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `Account_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `Manager_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `Package_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `recipient`
--
ALTER TABLE `recipient`
  MODIFY `Recipient_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `rider`
--
ALTER TABLE `rider`
  MODIFY `Rider_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sender`
--
ALTER TABLE `sender`
  MODIFY `Sender_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `Staff_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tracker`
--
ALTER TABLE `tracker`
  MODIFY `Tracking_Number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `account` (`Username`),
  ADD CONSTRAINT `manager_ibfk_2` FOREIGN KEY (`Branch_Name`) REFERENCES `branch` (`Branch_Name`);

--
-- Constraints for table `receives`
--
ALTER TABLE `receives`
  ADD CONSTRAINT `receives_ibfk_1` FOREIGN KEY (`Package_ID`) REFERENCES `package` (`Package_ID`),
  ADD CONSTRAINT `receives_ibfk_2` FOREIGN KEY (`Recipient_ID`) REFERENCES `recipient` (`Recipient_ID`);

--
-- Constraints for table `rider`
--
ALTER TABLE `rider`
  ADD CONSTRAINT `rider_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `account` (`Username`),
  ADD CONSTRAINT `rider_ibfk_2` FOREIGN KEY (`Branch_Name`) REFERENCES `branch` (`Branch_Name`);

--
-- Constraints for table `sender`
--
ALTER TABLE `sender`
  ADD CONSTRAINT `sender_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `account` (`Username`);

--
-- Constraints for table `sends`
--
ALTER TABLE `sends`
  ADD CONSTRAINT `sends_ibfk_1` FOREIGN KEY (`Package_ID`) REFERENCES `package` (`Package_ID`),
  ADD CONSTRAINT `sends_ibfk_2` FOREIGN KEY (`Sender_ID`) REFERENCES `sender` (`Sender_ID`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `account` (`Username`),
  ADD CONSTRAINT `staff_ibfk_2` FOREIGN KEY (`Branch_Name`) REFERENCES `branch` (`Branch_Name`);

--
-- Constraints for table `tracks`
--
ALTER TABLE `tracks`
  ADD CONSTRAINT `tracks_ibfk_2` FOREIGN KEY (`Package_ID`) REFERENCES `package` (`Package_ID`),
  ADD CONSTRAINT `tracks_ibfk_3` FOREIGN KEY (`Tracking_Number`) REFERENCES `tracker` (`Tracking_Number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
