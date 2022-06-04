-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 04, 2022 at 03:06 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pals`
--

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Test user', 'a@b.com', 'where', 'This is m messge'),
(3, 'Test user', 'a@c.com', 'Property', 'asdasfas'),
(4, 'Test', 'a@b.com', 'Address', 'Hi I can\'t locate your address on google maps'),
(5, 'Test1', 'test@c.com', 'House Cleaning', 'I want to clean my house. What are the services you offer?'),
(6, 'where?', 'h2@C.C', 'what does it do?', 'where does it reach?');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `date` date DEFAULT current_timestamp(),
  `message` varchar(255) NOT NULL,
  `message_by` varchar(255) NOT NULL,
  `message_id` int(255) NOT NULL,
  `message_to` varchar(255) DEFAULT NULL,
  `time` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`date`, `message`, `message_by`, `message_id`, `message_to`, `time`) VALUES
('2022-05-04', 'HI just sent a quote', 'test1', 19, 'new', '15:33:30'),
('2022-05-04', 'hi i declined the quote thanks', 'new', 20, 'test1', '15:36:02'),
('2022-05-04', 'HI just sent a quote', 'test1', 21, 'new', '15:36:09');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notif_id` int(255) NOT NULL,
  `notif_title` varchar(255) NOT NULL,
  `notif_msg` varchar(255) NOT NULL,
  `notif_date` date NOT NULL DEFAULT current_timestamp(),
  `user_id` int(255) NOT NULL,
  `quote_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notif_id`, `notif_title`, `notif_msg`, `notif_date`, `user_id`, `quote_id`) VALUES
(6, 'Quote Approved', 'Your requested quote has been approved. Please proceed for payment.', '2022-05-09', 18, 4),
(7, 'Quote Discarded', 'Your requested quote has been approved. Please proceed for payment.', '2022-05-09', 18, 4),
(8, 'Quote Discarded', 'Your requested has been discarded.', '2022-05-09', 3, 2),
(9, 'Payment Processed', 'Your payment for the requested quote has been successfully processed.', '2022-05-10', 16, 5),
(10, 'la heram', 'ae babu k xa ani khabar', '2022-05-11', 0, 0),
(11, 'Covid19 Safety', 'just a test notification', '2022-05-11', 0, 0),
(12, 'Quote Approved', 'Your requested quote has been approved. Please proceed for payment.', '2022-05-11', 16, 3),
(13, 'Payment Processed', 'Your payment for the requested quote has been successfully processed.', '2022-05-11', 16, 3),
(14, 'Quote Approved', 'Your requested quote has been approved. Please proceed for payment.', '2022-05-26', 18, 6),
(15, 'Quote Approved', 'Your requested quote has been approved. Please proceed for payment.', '2022-05-26', 16, 8),
(16, 'Payment Processed', 'Your payment for the requested quote has been successfully processed.', '2022-05-26', 16, 8),
(17, 'Payment Processed', 'Your payment for the requested quote has been successfully processed.', '2022-05-26', 16, 0),
(18, 'Payment Processed', 'Your payment for the requested quote has been successfully processed.', '2022-05-26', 16, 0),
(19, 'Payment Processed', 'Your payment for the requested quote has been successfully processed.', '2022-05-26', 16, 0),
(20, 'Payment Processed', 'Your payment for the requested quote has been successfully processed.', '2022-05-26', 16, 0),
(21, 'Payment Processed', 'Your payment for the requested quote has been successfully processed.', '2022-05-26', 16, 0),
(22, 'Quote Approved', 'Your requested quote has been approved. Please proceed for payment.', '2022-05-26', 16, 7);

-- --------------------------------------------------------

--
-- Table structure for table `paymentdetails`
--

CREATE TABLE `paymentdetails` (
  `paymentID` int(11) NOT NULL,
  `card_name` varchar(255) NOT NULL,
  `card_num` int(255) NOT NULL,
  `cvv` int(9) NOT NULL,
  `exp_month` int(9) NOT NULL,
  `exp_year` int(9) NOT NULL,
  `quote_id` int(9) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paymentdetails`
--

INSERT INTO `paymentdetails` (`paymentID`, `card_name`, `card_num`, `cvv`, `exp_month`, `exp_year`, `quote_id`, `user_id`) VALUES
(1, 'Surag', 2147483647, 222, 12, 2022, 4, 18),
(2, 'ok', 2147483647, 202, 11, 2022, 5, 16),
(3, 'Test Card', 2147483647, 222, 11, 2022, 3, 16);

-- --------------------------------------------------------

--
-- Table structure for table `pricing`
--

CREATE TABLE `pricing` (
  `pricing_id` int(255) NOT NULL,
  `cleaning_type` varchar(255) NOT NULL,
  `price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pricing`
--

INSERT INTO `pricing` (`pricing_id`, `cleaning_type`, `price`) VALUES
(1, 'Office Cleaning', 150),
(2, 'Commercial Cleaning', 200),
(3, 'House Cleaning', 120),
(4, 'Vacant Cleaning', 180),
(5, 'Apartment Cleaning', 130);

-- --------------------------------------------------------

--
-- Table structure for table `quote_request`
--

CREATE TABLE `quote_request` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `area` decimal(10,0) NOT NULL,
  `allergies` varchar(255) NOT NULL,
  `frequency` varchar(100) NOT NULL,
  `service` varchar(100) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '',
  `reqd` date NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quote_request`
--

INSERT INTO `quote_request` (`id`, `user_id`, `name`, `email`, `phone`, `area`, `allergies`, `frequency`, `service`, `status`, `reqd`) VALUES
(1, 1, 'Ryan Malik', 'ryan@gmail.com', '0405030233', '123', '', 'Weekly', '1', 'Approved', '2022-04-04'),
(2, 3, 'Nelson', 'nelson@gmail.com', '0234235093', '50', '', 'Fortnightly', '3', 'Declined', '2022-05-09'),
(3, 16, 'Test User', 'test@test.com', '1', '24', '', 'Weekly', '3', 'Approved', '2022-04-04'),
(4, 18, 'test1', 'test1@test1.com', '1234567890', '20', '', 'Weekly', '1', 'Approved', '2022-03-06'),
(5, 16, 'test', 'test@test.com', '1', '24', '', 'Weekly', '1', 'Approved', '2022-05-09'),
(6, 18, 'test1', 'test1@test1.com', '1234567890', '12', 'Dust, Chemicals (Ammonia, Sulphur Dioxide)', 'Weekly', '1', 'Approved', '2022-05-11'),
(7, 16, 'test', 'test@test.com', '014124122', '23', 'NO', 'once', '1', 'Approved', '2022-05-26'),
(8, 16, 'test', 'test@test.com', '014124122', '23', 'NO', 'once', '1', 'Approved', '2022-05-26');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `type` varchar(10) NOT NULL,
  `registeredDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `address`, `password`, `type`, `registeredDate`) VALUES
(1, 'abc', 'ryan@gmail.com', '0405030233', '24 Calais Street, Hurstville, NSW', '$2y$10$ikZM3n3AcGCFPWa/PUXmL.fiC3uBv/p96wxxNtfIgbmnUpIgMsk76', 'admin', '2022-01-02'),
(14, 'Helen', 'helen@gmail.com', '0458200482', '123 address', '$2y$10$40hDumxafbb/FZCg/L6UKexleDSsTFb9IucfotrCszw2rCzcQe4hi', 'customer', '2022-01-10'),
(5, 'abcde', 'nima@gmail.com', '1234124124', '123 skdjfslndkll', '$2y$10$cZlpfx988GydpjTDdFRiAeuiVoxhnLf1So4fiPRUIR6z/hXmF.TdK', 'admin', '2022-05-03'),
(9, 'Admin', 'admin@palsandpartners.com', '023 456 1102', '232 Railway Parade, Kogarah, NSW 2217', '$2y$10$fMyOqkjR0OXSCxXkBF1giuGETjj4wZcBE.PRvsYop602aZ5esQBjC', 'admin', '2022-05-08'),
(20, 'manager', 'manager@manager.com', '123', 'manager', '$2y$10$lO56SXHa/cI4G0aWtRM37exgwBNOK8nJSeSWzKC2I63HYZOvVVl3S', 'manager', '2022-04-03'),
(16, 'test', 'test@test.com', '014124122', 'test', '$2y$10$ftv8v9DNSaVc1wRWG3RHP.onR7k3G1LwiTRD35NYGUE15SwV9Wao6', 'customer', '2022-03-14'),
(17, 'abcd', 'account@a.com', '1', 'account', '$2y$10$cuWq4P2Md3Um4E3NdRSHOuqhV77ICTABjBAKVboIYBzjvpkoP8ANu', 'customer', '2022-04-02'),
(18, 'test1', 'test1@test1.com', '1234567890', 'test1', '$2y$10$n.Zgdj7IwyUQ15Drj2/nEe8.wWKxtba/g5KoCtcKoMsVfaa0Iskfa', 'customer', '2022-05-16'),
(15, 'admin', 'admin@gmail.com', '123', 'admin', '$2y$10$a.h1.T5O6Nf4mh6pbgTqU.8ZdIua1Lx2JvBXNju/v9b3M99oPlZBi', 'admin', '2022-03-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notif_id`);

--
-- Indexes for table `paymentdetails`
--
ALTER TABLE `paymentdetails`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `pricing`
--
ALTER TABLE `pricing`
  ADD PRIMARY KEY (`pricing_id`);

--
-- Indexes for table `quote_request`
--
ALTER TABLE `quote_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notif_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `paymentdetails`
--
ALTER TABLE `paymentdetails`
  MODIFY `paymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pricing`
--
ALTER TABLE `pricing`
  MODIFY `pricing_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `quote_request`
--
ALTER TABLE `quote_request`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
