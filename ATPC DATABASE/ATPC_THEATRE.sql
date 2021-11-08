-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2021 at 12:20 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atpc`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `bankpromo`
-- (See below for the actual view)
--
CREATE TABLE `bankpromo` (
`BankPromotion` varchar(20)
,`Cnt` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `ScreeningID` int(50) NOT NULL,
  `RegisterID` int(50) NOT NULL,
  `PromotionMovieID` int(50) DEFAULT NULL,
  `ReserveStatus` tinyint(1) NOT NULL,
  `BookingID` int(50) NOT NULL,
  `BookingClientID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`ScreeningID`, `RegisterID`, `PromotionMovieID`, `ReserveStatus`, `BookingID`, `BookingClientID`) VALUES
(1, 1, 2, 1, 2, 329),
(2, 1, 3, 1, 3, 330),
(3, 1, 2, 1, 4, 335),
(4, 1, 3, 1, 5, 336),
(5, 1, 3, 1, 6, 338),
(6, 1, 3, 1, 7, 339),
(7, 1, 2, 1, 8, 343),
(9, 1, 3, 1, 9, 346),
(1, 1, 3, 1, 10, 347),
(2, 1, 3, 1, 11, 348),
(4, 1, 2, 1, 12, 349),
(7, 1, 3, 1, 13, 350),
(9, 1, 2, 1, 14, 351),
(5, 1, 3, 1, 15, 352),
(3, 1, 3, 1, 16, 353),
(6, 1, 3, 1, 17, 354),
(1, 1, 3, 0, 18, 255),
(2, 1, 2, 1, 19, 356),
(4, 1, 2, 1, 20, 358),
(7, 1, 3, 1, 21, 359),
(9, 1, 3, 1, 22, 360),
(5, 1, 3, 1, 23, 361),
(3, 1, 2, 1, 24, 362),
(1, 1, 2, 1, 25, 363),
(2, 1, 3, 1, 26, 364),
(4, 1, 3, 1, 27, 365),
(12, 4, 3, 1, 28, 365);

-- --------------------------------------------------------

--
-- Table structure for table `bookingclient`
--

CREATE TABLE `bookingclient` (
  `BookingClientID` int(50) NOT NULL,
  `MovieTitle` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `BranchName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DateDay` date NOT NULL,
  `TimeHour` time NOT NULL,
  `PaymentMethod` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `CreditCardNoORWalletID` int(20) DEFAULT NULL,
  `Price` int(50) NOT NULL,
  `AmountSeat` int(50) NOT NULL,
  `DiscountMovie` int(50) DEFAULT NULL,
  `TotalDue` int(50) AS ((Price * AmountSeat) - DiscountMovie) VIRTUAL,
  `Total` int(50) AS (Price * AmountSeat) VIRTUAL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bookingclient`
--

INSERT INTO `bookingclient` (`BookingClientID`, `MovieTitle`, `BranchName`, `DateDay`, `TimeHour`, `PaymentMethod`, `CreditCardNoORWalletID`, `Price`, `AmountSeat`, `DiscountMovie`) VALUES
(229, 'Iron', 'KMUTT', '2021-06-05', '10:30:00', 'Wallet', 825031599, 280, 3, 0),
(230, 'Sherlock', 'KMUTT', '2021-06-06', '10:30:00', 'Credit Card', 584015592, 240, 2, 20),
(231, 'Iron', 'KMUTT', '2021-06-07', '10:30:00', 'Credit Card', 456465722, 340, 4, 40),
(232, 'Sherlock', 'KMUTT', '2021-06-05', '00:00:00', 'Wallet', 835155562, 300, 1, 15),
(234, 'Sherlock', 'KMUTT', '2021-06-05', '10:30:00', 'Wallet', 843251211, 300, 1, 15),
(235, 'Harry', 'KMUTT', '2021-06-04', '00:00:00', 'Credit Card', 463457632, 400, 2, 40),
(236, 'Harry', 'KMUTT', '2021-06-02', '21:00:00', 'Wallet', 835235115, 400, 2, 40),
(237, 'Sherlock', 'KMUTT', '2021-06-06', '00:00:00', 'Credit Card', 346376326, 380, 3, 0),
(239, 'Iron', 'KMUTT', '2021-06-05', '10:30:00', 'Credit Card', 456354742, 340, 1, 0),
(240, 'Sherlock', 'KMUTT', '2021-06-04', '10:30:00', 'Wallet', 820620426, 480, 2, 15),
(241, 'Harry', 'KMUTT', '2021-06-07', '21:00:00', 'Credit Card', 543756865, 440, 3, 40),
(242, 'Harry', 'KMUTT', '2021-06-06', '21:00:00', 'Wallet', 835263662, 200, 3, 40),
(243, 'Iron', 'KMUTT', '2021-06-02', '10:30:00', 'Wallet', 835462105, 280, 2, 20),
(244, 'Sherlock', 'KMUTT', '2021-06-06', '10:30:00', 'Credit Card', 439693023, 340, 1, 0),
(245, 'Iron', 'KMUTT', '2021-06-02', '10:30:00', 'Wallet', 2147483647, 440, 3, 20),
(247, 'Avengers', 'KMITL', '2021-06-07', '14:00:00', 'Wallet', 834514552, 240, 4, 20),
(249, 'Harry', 'KMUTT', '2021-06-02', '21:00:00', 'Wallet', 823595119, 300, 3, 0),
(251, 'Avengers', 'KMITL', '2021-06-06', '14:00:00', 'Wallet', 832824958, 380, 3, 40),
(252, 'Iron', 'KMUTT', '2021-06-07', '10:30:00', 'Wallet', 859458112, 240, 3, 15),
(253, 'Harry', 'KMUTT', '2021-06-04', '21:00:00', 'Credit Card', 968234963, 380, 1, 40),
(254, 'เเปลรักฉันด้วยใจเธอ', 'CPE', '2021-06-05', '13:00:00', 'Credit Card', 845912998, 400, 2, 0),
(255, 'เเปลรักฉันด้วยใจเธอ', 'KMITL', '2021-06-06', '22:00:00', 'Wallet', 852559592, 240, 3, 20),
(256, 'Avengers', 'KMITL', '2021-06-02', '14:00:00', 'Wallet', 843539245, 280, 3, 40),
(257, 'Iron', 'KMUTT', '2021-06-04', '10:30:00', 'Wallet', 2147483647, 300, 2, 0),
(258, 'Harry', 'KMUTT', '2021-06-06', '21:00:00', 'Credit Card', 435943502, 400, 1, 20),
(259, 'Harry', 'KMUTT', '2021-06-07', '21:00:00', 'Wallet', 843595929, 340, 2, 40),
(260, 'เเปลรักฉันด้วยใจเธอ', 'CPE', '2021-06-05', '13:00:00', 'Credit Card', 439583952, 380, 3, 40),
(261, 'เเปลรักฉันด้วยใจเธอ', 'KMITL', '2021-06-02', '22:00:00', 'Wallet', 834509458, 440, 1, 40),
(262, 'เเปลรักฉันด้วยใจเธอ', 'KMITL', '2021-06-05', '22:00:00', 'Wallet', 845825458, 200, 2, 20),
(263, 'Harry', 'KMUTT', '2021-06-04', '21:00:00', 'Credit Card', 2147483647, 440, 3, 40),
(264, 'Iron', 'KMUTT', '2021-06-06', '10:30:00', 'Wallet', 845934385, 280, 1, 0),
(265, 'Iron', 'KMUTT', '2021-06-02', '10:30:00', 'Credit Card', 485389630, 240, 1, 15),
(266, 'เเปลรักฉันด้วยใจเธอ', 'KMITL', '2021-06-06', '22:00:00', 'Credit Card', 94528969, 400, 2, 40),
(267, 'เเปลรักฉันด้วยใจเธอ', 'KMITL', '2021-06-05', '22:00:00', 'Wallet', 845235492, 300, 3, 40),
(268, 'Avengers', 'LX', '2021-06-07', '19:00:00', 'Wallet', 83452589, 340, 4, 0),
(270, 'Iron', 'KMUTT', '2021-06-05', '10:30:00', 'Credit Card', 856399569, 300, 4, 40),
(271, 'Harry', 'KMUTT', '2021-06-07', '21:00:00', 'Wallet', 846493496, 380, 2, 40),
(272, 'เเปลรักฉันด้วยใจเธอ', 'CPE', '2021-06-05', '13:00:00', 'Wallet', 835324500, 380, 2, 0),
(273, 'เเปลรักฉันด้วยใจเธอ', 'CPE', '2021-06-02', '21:00:00', 'Credit Card', 845996352, 400, 4, 20),
(274, 'Avengers', 'LX', '2021-06-02', '19:00:00', 'Wallet', 835345920, 200, 3, 0),
(275, 'Avengers', 'KMITL', '2021-06-06', '14:00:00', 'Wallet', 834534589, 440, 2, 40),
(276, 'Sherlock', 'KMUTT', '2021-06-05', '10:30:00', 'Wallet', 843595892, 280, 2, 15),
(277, 'ก้านกล้วย', 'CU', '2021-06-04', '10:30:00', 'Wallet', 838293582, 280, 4, 20),
(278, 'Harry', 'KMUTT', '2021-06-02', '21:00:00', 'Wallet', 835945949, 400, 2, 40),
(279, 'เเปลรักฉันด้วยใจเธอ', 'CPE', '2021-06-06', '13:00:00', 'Wallet', 834583596, 280, 2, 40),
(280, 'เเปลรักฉันด้วยใจเธอ', 'CPE', '2021-06-07', '21:00:00', 'Wallet', 835849358, 380, 2, 40),
(281, 'Avengers', 'KMITL', '2021-06-05', '14:00:00', 'Credit Card', 454069604, 300, 3, 40),
(282, 'ก้านกล้วย', 'CU', '2021-06-02', '10:30:00', 'Wallet', 834584394, 380, 3, 40),
(283, 'Harry', 'KMUTT', '2021-06-07', '21:00:00', 'Credit Card', 564356635, 400, 3, 40),
(284, 'เเปลรักฉันด้วยใจเธอ', 'KMITL', '2021-06-06', '22:00:00', 'Wallet', 834953684, 380, 2, 40),
(285, 'Avengers', 'LX', '2021-06-04', '19:00:00', 'Wallet', 834692092, 400, 3, 20),
(286, 'Sherlock', 'KMUTT', '2021-06-05', '10:30:00', 'Credit Card', 436546432, 400, 2, 15),
(287, 'ก้านกล้วย', 'CU', '2021-06-04', '10:30:00', 'Credit Card', 586488390, 480, 3, 0),
(288, 'เเปลรักฉันด้วยใจเธอ', 'CPE', '2021-06-04', '13:00:00', 'Wallet', 834593585, 380, 2, 40),
(289, 'เเปลรักฉันด้วยใจเธอ', 'KMITL', '2021-06-02', '22:00:00', 'Credit Card', 548436700, 240, 1, 0),
(290, 'Sherlock', 'KMUTT', '2021-06-06', '10:30:00', 'Wallet', 835349520, 480, 3, 0),
(291, 'Iron', 'KMUTT', '2021-06-07', '10:30:00', 'Credit Card', 849684396, 280, 3, 15),
(292, 'เเปลรักฉันด้วยใจเธอ', 'CPE', '2021-06-02', '13:00:00', 'Wallet', 846573694, 400, 2, 40),
(293, 'เเปลรักฉันด้วยใจเธอ', 'CPE', '2021-06-05', '21:00:00', 'Wallet', 845732483, 240, 2, 15),
(294, 'Iron', 'KMUTT', '2021-06-04', '10:30:00', 'Credit Card', 485963405, 400, 3, 40),
(295, 'Harry', 'KMUTT', '2021-06-02', '21:00:00', 'Wallet', 847384532, 340, 3, 20),
(296, 'เเปลรักฉันด้วยใจเธอ', 'CPE', '2021-06-07', '13:00:00', 'Wallet', 843573269, 300, 2, 20),
(297, 'เเปลรักฉันด้วยใจเธอ', 'KMITL', '2021-06-02', '22:00:00', 'Wallet', 834673936, 300, 2, 15),
(298, 'เเปลรักฉันด้วยใจเธอ', 'CPE', '2021-06-06', '21:00:00', 'Wallet', 834853493, 440, 2, 20),
(299, 'Avengers', 'KMITL', '2021-06-07', '14:00:00', 'Credit Card', 456843639, 340, 5, 20),
(300, 'เเปลรักฉันด้วยใจเธอ', 'KMITL', '2021-06-05', '22:00:00', 'Wallet', 834537457, 380, 2, 40),
(301, 'Harry', 'KMUTT', '2021-06-04', '21:00:00', 'Credit Card', 789709675, 400, 3, 40),
(302, 'เเปลรักฉันด้วยใจเธอ', 'KMITL', '2021-06-04', '22:00:00', 'Wallet', 834535793, 440, 2, 15),
(303, 'Avengers', 'KMITL', '2021-06-02', '14:00:00', 'Wallet', 832489453, 480, 4, 20),
(304, 'ก้านกล้วย', 'CU', '2021-06-06', '10:30:00', 'Wallet', 832427589, 240, 4, 15),
(305, 'Iron', 'KMUTT', '2021-06-07', '10:30:00', 'Credit Card', 546474673, 400, 3, 0),
(306, 'เเปลรักฉันด้วยใจเธอ', 'CPE', '2021-06-05', '13:00:00', 'Wallet', 843583290, 240, 2, 40),
(307, 'เเปลรักฉันด้วยใจเธอ', 'CPE', '2021-06-04', '21:00:00', 'Wallet', 2147483647, 400, 4, 40),
(308, 'Avengers', 'LX', '2021-06-04', '19:00:00', 'Wallet', 2147483647, 340, 4, 20),
(309, 'Sherlock', 'KMUTT', '2021-06-02', '10:30:00', 'Credit Card', 854968349, 340, 3, 15),
(310, 'Harry', 'KMUTT', '2021-06-06', '21:00:00', 'Wallet', 834570392, 340, 2, 40),
(311, 'เเปลรักฉันด้วยใจเธอ', 'KMITL', '2021-06-07', '22:00:00', 'Wallet', 843582507, 480, 4, 0),
(312, 'Avengers', 'KMITL', '2021-06-02', '14:00:00', 'Credit Card', 464364345, 300, 3, 20),
(313, 'ก้านกล้วย', 'CU', '2021-06-06', '10:30:00', 'Wallet', 843833925, 400, 4, 15),
(314, 'Iron', 'KMUTT', '2021-06-05', '10:30:00', 'Credit Card', 346543643, 380, 3, 40),
(315, 'เเปลรักฉันด้วยใจเธอ', 'CPE', '2021-06-04', '13:00:00', 'Wallet', 843835835, 440, 2, 40),
(316, 'เเปลรักฉันด้วยใจเธอ', 'CPE', '2021-06-05', '21:00:00', 'Wallet', 2147483647, 240, 4, 15),
(317, 'Avengers', 'LX', '2021-06-04', '19:00:00', 'Wallet', 843832590, 440, 6, 0),
(318, 'Sherlock', 'KMUTT', '2021-06-02', '10:30:00', 'Credit Card', 674564753, 240, 3, 40),
(319, 'Harry', 'KMUTT', '2021-06-06', '21:00:00', 'Credit Card', 780899008, 480, 5, 40),
(320, 'เเปลรักฉันด้วยใจเธอ', 'KMITL', '2021-06-05', '22:00:00', 'Wallet', 83845932, 280, 2, 20),
(321, 'Avengers', 'KMITL', '2021-06-04', '14:00:00', 'Credit Card', 845692438, 400, 3, 15),
(322, 'ก้านกล้วย', 'CU', '2021-06-02', '10:30:00', 'Wallet', 834834022, 340, 2, 40),
(323, 'Iron', 'KMUTT', '2021-06-07', '10:30:00', 'Wallet', 832842032, 400, 4, 40),
(324, 'เเปลรักฉันด้วยใจเธอ', 'CPE', '2021-06-06', '13:00:00', 'Credit Card', 475367803, 300, 3, 0),
(325, 'เเปลรักฉันด้วยใจเธอ', 'CPE', '2021-06-02', '13:00:00', 'Credit Card', 936439682, 400, 3, 20),
(326, 'เเปลรักฉันด้วยใจเธอ', 'KMITL', '2021-06-05', '22:00:00', 'Wallet', 85839453, 380, 2, 15),
(327, 'เเปลรักฉันด้วยใจเธอ', 'CPE', '2021-06-04', '21:00:00', 'Wallet', 832485930, 380, 2, 0),
(328, 'Sherlock', 'KMUTT', '2021-06-02', '10:30:00', 'Wallet', 834853450, 240, 4, 0),
(329, 'Iron', 'KMUTT', '2021-06-02', '10:30:00', 'Cash', 0, 280, 2, 15),
(330, 'Iron', 'KMUTT', '2021-06-06', '10:30:00', 'Cash', 0, 340, 2, 20),
(331, 'Harry', 'KMUTT', '2021-06-07', '21:00:00', 'Cash', 0, 440, 4, 0),
(335, 'Avengers', 'LX', '2021-06-16', '19:00:00', 'Cash', 0, 240, 2, 15),
(336, 'Sherlock', 'KMUTT', '2021-06-17', '10:30:00', 'Cash', 0, 340, 4, 20),
(338, 'Iron', 'KMUTT', '2021-06-02', '10:30:00', 'Cash', 0, 380, 3, 15),
(339, 'Harry', 'KMUTT', '2021-06-11', '21:00:00', 'Cash', 0, 400, 3, 15),
(343, 'Sherlock', 'KMUTT', '2021-06-06', '10:30:00', 'Cash', 0, 280, 3, 15),
(346, 'Iron', 'KMUTT', '2021-06-11', '10:30:00', 'Cash', 0, 440, 2, 20),
(347, 'เเปลรักฉันด้วยใจเธอ', 'CPE', '2021-06-11', '13:00:00', 'Cash', 0, 440, 3, 20),
(348, 'เเปลรักฉันด้วยใจเธอ', 'CPE', '2021-06-23', '13:00:00', 'Cash', 0, 280, 3, 20),
(349, 'เเปลรักฉันด้วยใจเธอ', 'KMITL', '2021-06-25', '22:00:00', 'Cash', 0, 440, 4, 15),
(350, 'เเปลรักฉันด้วยใจเธอ', 'CPE', '2021-06-29', '21:00:00', 'Cash', 0, 300, 4, 20),
(351, 'เเปลรักฉันด้วยใจเธอ', 'CPE', '2021-06-06', '21:00:00', 'Cash', 0, 480, 3, 15),
(352, 'เเปลรักฉันด้วยใจเธอ', 'CPE', '2021-06-13', '21:00:00', 'Cash', 0, 200, 3, 20),
(353, 'Avengers', 'LX', '2021-06-09', '19:00:00', 'Cash', 0, 200, 4, 20),
(354, 'Sherlock', 'KMUTT', '2021-06-14', '10:30:00', 'Cash', 0, 340, 3, 20),
(355, 'Harry', 'KMUTT', '2021-06-11', '21:00:00', 'Cash', 0, 300, 1, 20),
(356, 'Harry', 'KMUTT', '2021-06-25', '21:00:00', 'Cash', 0, 400, 1, 15),
(358, 'Harry', 'KMUTT', '2021-06-15', '21:00:00', 'Cash', 0, 240, 1, 15),
(359, 'เเปลรักฉันด้วยใจเธอ', 'KMUTNB', '2021-06-19', '15:00:00', 'Cash', 0, 300, 1, 20),
(360, 'เเปลรักฉันด้วยใจเธอ', 'KMUTNB', '2021-06-21', '15:00:00', 'Cash', 0, 400, 1, 20),
(361, 'เเปลรักฉันด้วยใจเธอ', 'KMUTNB', '2021-06-29', '15:00:00', 'Cash', 0, 240, 1, 20),
(362, 'เเปลรักฉันด้วยใจเธอ', 'KMUTNB', '2021-06-06', '15:00:00', 'Cash', 0, 440, 1, 15),
(363, 'เเปลรักฉันด้วยใจเธอ', 'KMUTNB', '2021-06-07', '15:00:00', 'Cash', 0, 280, 1, 15),
(364, 'เเปลรักฉันด้วยใจเธอ', 'KMUTNB', '2021-06-19', '15:00:00', 'Cash', 0, 300, 1, 20),
(365, 'เเปลรักฉันด้วยใจเธอ', 'KMUTNB', '2021-06-23', '15:00:00', 'Cash', 0, 440, 1, 20),
(366, 'Harry', 'KMUTT', '2021-06-16', '20:00:00', 'Wallet', 857388478, 480, 5, 40),
(367, 'เเปลรักฉันด้วยใจเธอ', 'KMUTNB', '2021-06-02', '21:00:00', 'Wallet', 835473895, 200, 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `bookingrun`
--

CREATE TABLE `bookingrun` (
  `BookingClientID` int(50) NOT NULL,
  `BookingRunID` int(50) NOT NULL,
  `ScreeningID` int(50) NOT NULL,
  `SeatNo` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bookingrun`
--

INSERT INTO `bookingrun` (`BookingClientID`, `BookingRunID`, `ScreeningID`, `SeatNo`) VALUES
(229, 135, 1, 'E1'),
(229, 136, 1, 'G1'),
(229, 137, 1, 'H1'),
(230, 138, 3, 'E1'),
(230, 139, 3, 'F1'),
(231, 140, 1, 'A1'),
(231, 141, 1, 'B1'),
(231, 142, 1, 'C1'),
(231, 143, 1, 'F1'),
(232, 144, 3, 'A1'),
(234, 146, 3, 'B1'),
(235, 147, 2, 'C1'),
(235, 148, 2, 'D1'),
(236, 149, 2, 'A1'),
(236, 150, 2, 'B1'),
(237, 151, 3, 'H1'),
(237, 152, 3, 'I1'),
(237, 153, 3, 'J1'),
(239, 154, 1, 'D1'),
(240, 155, 3, 'D1'),
(240, 156, 3, 'G1'),
(241, 157, 2, 'E1'),
(241, 158, 2, 'F1'),
(241, 159, 2, 'G1'),
(242, 160, 2, 'H1'),
(242, 161, 2, 'I1'),
(242, 162, 2, 'J1'),
(243, 163, 1, 'I1'),
(243, 164, 1, 'J1'),
(244, 165, 3, 'C1'),
(245, 166, 1, 'C1'),
(245, 167, 1, 'D1'),
(245, 168, 1, 'E1'),
(247, 171, 8, 'C1'),
(247, 172, 8, 'D1'),
(247, 173, 8, 'E1'),
(247, 174, 8, 'F1'),
(249, 178, 2, 'H1'),
(249, 179, 2, 'I1'),
(249, 180, 2, 'J1'),
(251, 183, 8, 'B1'),
(251, 184, 8, 'G1'),
(251, 185, 8, 'H1'),
(252, 186, 1, 'B1'),
(252, 187, 1, 'F1'),
(252, 188, 1, 'G1'),
(253, 189, 2, 'B1'),
(254, 190, 4, 'H1'),
(254, 191, 4, 'I1'),
(255, 192, 7, 'F1'),
(255, 193, 7, 'G1'),
(255, 194, 7, 'H1'),
(256, 195, 8, 'A1'),
(256, 196, 8, 'I1'),
(256, 197, 8, 'J1'),
(257, 198, 1, 'A1'),
(257, 199, 1, 'H1'),
(258, 200, 2, 'A1'),
(259, 201, 2, 'D1'),
(259, 202, 2, 'E1'),
(260, 203, 4, 'A1'),
(260, 204, 4, 'B1'),
(260, 205, 4, 'J1'),
(261, 206, 7, 'J1'),
(262, 207, 7, 'E1'),
(262, 208, 7, 'I1'),
(263, 209, 2, 'C1'),
(263, 210, 2, 'F1'),
(263, 211, 2, 'G1'),
(264, 212, 1, 'J1'),
(265, 213, 1, 'I1'),
(266, 214, 7, 'A1'),
(266, 215, 7, 'B1'),
(267, 216, 7, 'G1'),
(267, 217, 7, 'H1'),
(267, 218, 7, 'I1'),
(268, 219, 5, 'A1'),
(268, 220, 5, 'B1'),
(268, 221, 5, 'C1'),
(268, 222, 5, 'D1'),
(270, 226, 1, 'C1'),
(270, 227, 1, 'D1'),
(270, 228, 1, 'E1'),
(270, 229, 1, 'F1'),
(271, 230, 2, 'E1'),
(271, 231, 2, 'F1'),
(272, 232, 4, 'C1'),
(272, 233, 4, 'D1'),
(273, 234, 9, 'A1'),
(273, 235, 9, 'B1'),
(273, 236, 9, 'C1'),
(273, 237, 9, 'D1'),
(274, 238, 5, 'H1'),
(274, 239, 5, 'I1'),
(274, 240, 5, 'J1'),
(275, 241, 8, 'C1'),
(275, 242, 8, 'D1'),
(276, 243, 3, 'D1'),
(276, 244, 3, 'E1'),
(277, 245, 6, 'G1'),
(277, 246, 6, 'H1'),
(277, 247, 6, 'I1'),
(277, 248, 6, 'J1'),
(278, 249, 2, 'A1'),
(278, 250, 2, 'B1'),
(279, 251, 4, 'E1'),
(279, 252, 4, 'F1'),
(280, 253, 9, 'G1'),
(280, 254, 9, 'H1'),
(281, 255, 8, 'F1'),
(281, 256, 8, 'G1'),
(281, 257, 8, 'H1'),
(282, 258, 6, 'B1'),
(282, 259, 6, 'C1'),
(282, 260, 6, 'D1'),
(283, 261, 2, 'C1'),
(283, 262, 2, 'D1'),
(283, 263, 2, 'G1'),
(284, 264, 7, 'C1'),
(284, 265, 7, 'D1'),
(285, 266, 5, 'E1'),
(285, 267, 5, 'F1'),
(285, 268, 5, 'G1'),
(286, 269, 3, 'F1'),
(286, 270, 3, 'J1'),
(287, 271, 6, 'A1'),
(287, 272, 6, 'E1'),
(287, 273, 6, 'F1'),
(288, 274, 4, 'G1'),
(288, 275, 4, 'H1'),
(289, 276, 7, 'J1'),
(290, 277, 3, 'A1'),
(290, 278, 3, 'B1'),
(290, 279, 3, 'C1'),
(291, 280, 1, 'B1'),
(291, 281, 1, 'G1'),
(291, 282, 1, 'H1'),
(292, 283, 4, 'A1'),
(292, 284, 4, 'B1'),
(293, 285, 9, 'E1'),
(293, 286, 9, 'F1'),
(294, 287, 1, 'A1'),
(294, 288, 1, 'I1'),
(294, 289, 1, 'J1'),
(295, 290, 2, 'H1'),
(295, 291, 2, 'I1'),
(295, 292, 2, 'J1'),
(296, 293, 4, 'I1'),
(296, 294, 4, 'J1'),
(297, 295, 7, 'E1'),
(297, 296, 7, 'F1'),
(298, 297, 9, 'I1'),
(298, 298, 9, 'J1'),
(299, 299, 8, 'A1'),
(299, 300, 8, 'B1'),
(299, 301, 8, 'E1'),
(299, 302, 8, 'I1'),
(299, 303, 8, 'J1'),
(300, 304, 7, 'A1'),
(300, 305, 7, 'B1'),
(301, 306, 2, 'C1'),
(301, 307, 2, 'D1'),
(301, 308, 2, 'E1'),
(302, 309, 7, 'F1'),
(302, 310, 7, 'G1'),
(303, 311, 8, 'F1'),
(303, 312, 8, 'G1'),
(303, 313, 8, 'H1'),
(303, 314, 8, 'I1'),
(304, 315, 6, 'C1'),
(304, 316, 6, 'D1'),
(304, 317, 6, 'E1'),
(304, 318, 6, 'F1'),
(305, 319, 1, 'C1'),
(305, 320, 1, 'D1'),
(305, 321, 1, 'E1'),
(306, 322, 4, 'A1'),
(306, 323, 4, 'B1'),
(307, 324, 9, 'G1'),
(307, 325, 9, 'H1'),
(307, 326, 9, 'I1'),
(307, 327, 9, 'J1'),
(308, 328, 5, 'A1'),
(308, 329, 5, 'B1'),
(308, 330, 5, 'C1'),
(308, 331, 5, 'D1'),
(309, 332, 3, 'C1'),
(309, 333, 3, 'D1'),
(309, 334, 3, 'E1'),
(310, 335, 2, 'F1'),
(310, 336, 2, 'G1'),
(311, 337, 7, 'E1'),
(311, 338, 7, 'H1'),
(311, 339, 7, 'I1'),
(311, 340, 7, 'J1'),
(312, 341, 8, 'B1'),
(312, 342, 8, 'C1'),
(312, 343, 8, 'D1'),
(313, 344, 6, 'A1'),
(313, 345, 6, 'B1'),
(313, 346, 6, 'G1'),
(313, 347, 6, 'H1'),
(314, 348, 1, 'A1'),
(314, 349, 1, 'B1'),
(314, 350, 1, 'F1'),
(315, 351, 4, 'C1'),
(315, 352, 4, 'D1'),
(316, 353, 9, 'A1'),
(316, 354, 9, 'B1'),
(316, 355, 9, 'C1'),
(316, 356, 9, 'D1'),
(317, 357, 5, 'E1'),
(317, 358, 5, 'F1'),
(317, 359, 5, 'G1'),
(317, 360, 5, 'H1'),
(317, 361, 5, 'I1'),
(317, 362, 5, 'J1'),
(318, 363, 3, 'F1'),
(318, 364, 3, 'G1'),
(318, 365, 3, 'H1'),
(319, 366, 2, 'A1'),
(319, 367, 2, 'B1'),
(319, 368, 2, 'H1'),
(319, 369, 2, 'I1'),
(319, 370, 2, 'J1'),
(320, 371, 7, 'C1'),
(320, 372, 7, 'D1'),
(321, 373, 8, 'A1'),
(321, 374, 8, 'E1'),
(321, 375, 8, 'J1'),
(322, 376, 6, 'I1'),
(322, 377, 6, 'J1'),
(323, 378, 1, 'G1'),
(323, 379, 1, 'H1'),
(323, 380, 1, 'I1'),
(323, 381, 1, 'J1'),
(324, 382, 4, 'E1'),
(324, 383, 4, 'F1'),
(324, 384, 4, 'G1'),
(325, 385, 4, 'H1'),
(325, 386, 4, 'I1'),
(325, 387, 4, 'J1'),
(326, 388, 7, 'A1'),
(326, 389, 7, 'B1'),
(327, 390, 9, 'E1'),
(327, 391, 9, 'F1'),
(328, 392, 3, 'A1'),
(328, 393, 3, 'B1'),
(328, 394, 3, 'I1'),
(328, 395, 3, 'J1'),
(329, 396, 1, 'A1'),
(329, 397, 1, 'C1'),
(330, 398, 1, 'C1'),
(330, 399, 1, 'D1'),
(331, 400, 2, 'E1'),
(331, 401, 2, 'F1'),
(331, 402, 2, 'G1'),
(331, 403, 2, 'H1'),
(335, 413, 5, 'B1'),
(335, 414, 5, 'C1'),
(336, 415, 3, 'G1'),
(336, 416, 3, 'H1'),
(336, 417, 3, 'I1'),
(336, 418, 3, 'J1'),
(338, 424, 1, 'F1'),
(338, 425, 1, 'G1'),
(338, 426, 1, 'H1'),
(339, 427, 2, 'D1'),
(339, 428, 2, 'I1'),
(339, 429, 2, 'J1'),
(343, 438, 3, 'D1'),
(343, 439, 3, 'E1'),
(343, 440, 3, 'F1'),
(346, 449, 1, 'A1'),
(346, 450, 1, 'B1'),
(347, 451, 4, 'H1'),
(347, 452, 4, 'I1'),
(347, 453, 4, 'J1'),
(348, 454, 4, 'C1'),
(348, 455, 4, 'D1'),
(348, 456, 4, 'G1'),
(349, 457, 7, 'A1'),
(349, 458, 7, 'B1'),
(349, 459, 7, 'I1'),
(349, 460, 7, 'J1'),
(350, 461, 9, 'A1'),
(350, 462, 9, 'B1'),
(350, 463, 9, 'C1'),
(350, 464, 9, 'D1'),
(351, 465, 9, 'H1'),
(351, 466, 9, 'I1'),
(351, 467, 9, 'J1'),
(352, 468, 9, 'E1'),
(352, 469, 9, 'F1'),
(352, 470, 9, 'G1'),
(353, 471, 5, 'A1'),
(353, 472, 5, 'D1'),
(353, 473, 5, 'E1'),
(353, 474, 5, 'F1'),
(354, 475, 3, 'A1'),
(354, 476, 3, 'B1'),
(354, 477, 3, 'C1'),
(355, 478, 2, 'C1'),
(356, 479, 2, 'A1'),
(358, 481, 2, 'B1'),
(359, 482, 10, 'E1'),
(360, 483, 10, 'G1'),
(361, 484, 10, 'A1'),
(362, 485, 10, 'F1'),
(363, 486, 10, 'D1'),
(364, 487, 10, 'C1'),
(365, 488, 10, 'B1'),
(366, 489, 13, 'A1'),
(366, 490, 13, 'B1'),
(366, 491, 13, 'C1'),
(366, 492, 13, 'D1'),
(366, 493, 13, 'E1'),
(367, 494, 22, 'J1');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `BranchID` int(50) NOT NULL,
  `BranchName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Region` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ManagerOfBranch` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Location` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `TheatreInEachBranch` int(10) NOT NULL,
  `Staff` int(10) NOT NULL,
  `Phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`BranchID`, `BranchName`, `Region`, `ManagerOfBranch`, `Location`, `TheatreInEachBranch`, `Staff`, `Phone`) VALUES
(1, 'KMUTT', 'central', 'atcp', 'Thungkru, bangmod, Bangkok', 10, 60, '060000001'),
(2, 'KMITL', 'south', 'atcp2', 'Charongkrung, Lardkrabang, Bangkok', 10, 80, '060000002'),
(3, 'KMUTNB', 'north', 'atcp3', 'Pracharad, Bangsue, Bangkok', 10, 50, '060000003'),
(4, 'CPE', 'east and north', 'atpc4', 'Bangmod Building', 10, 40, '060000003'),
(5, 'LX', 'central', 'atpc5', 'bangyai, bankok', 10, 70, '060000005'),
(6, 'CU', 'north', 'atpc6', 'Nimman, Chaingmai', 10, 30, '060000006'),
(7, 'ICU', 'north', 'atpc7', 'bangprakok, bangkok', 10, 40, '060000008'),
(8, 'CPEE', 'east', 'atcp8', 'bangmod 45, bangkok', 10, 60, '0848673574');

-- --------------------------------------------------------

--
-- Stand-in structure for view `branchhavemaxtheatre`
-- (See below for the actual view)
--
CREATE TABLE `branchhavemaxtheatre` (
`BranchID` int(50)
,`BranchName` varchar(50)
,`cnt` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `branchmoney`
-- (See below for the actual view)
--
CREATE TABLE `branchmoney` (
`BranchName` varchar(50)
,`Sum` decimal(65,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `branchstaff`
-- (See below for the actual view)
--
CREATE TABLE `branchstaff` (
`Region` varchar(20)
,`Sum` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `maxpaymentmethod`
-- (See below for the actual view)
--
CREATE TABLE `maxpaymentmethod` (
`PaymentMethod` varchar(20)
,`cnt` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `maxtimehour`
-- (See below for the actual view)
--
CREATE TABLE `maxtimehour` (
`TimeHour` time
,`cnt` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `membercard`
--

CREATE TABLE `membercard` (
  `MemberCardID` int(50) NOT NULL,
  `MemberName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MemberSurname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MemberEmail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DateOfBirth` date NOT NULL,
  `DateOfIssue` date NOT NULL,
  `DateOfExpire` date NOT NULL,
  `MemberLevel` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `membercard`
--

INSERT INTO `membercard` (`MemberCardID`, `MemberName`, `MemberSurname`, `MemberEmail`, `DateOfBirth`, `DateOfIssue`, `DateOfExpire`, `MemberLevel`) VALUES
(26, 'Somsri', 'Zuza', 'somsrizuza@hotmail.com', '2002-03-03', '2021-06-04', '2022-06-04', 'normal'),
(27, 'Jaehyun', 'Lee', 'jaehyunlee@gmail.com', '1995-02-14', '2021-06-04', '2022-06-04', 'premium'),
(28, 'Anchira', 'Sodsai', 'anchira.s@hotmail.com', '2000-03-05', '2021-06-04', '2022-06-04', 'pattinum'),
(29, 'Manee', 'Meena', 'maneemeena@gmail.com', '1998-03-13', '2021-06-04', '2022-06-04', 'normal'),
(30, 'Boonmak', 'Sarkkrabue', 'boonmakmak@hotmail.com', '2010-04-05', '2021-06-04', '2022-06-04', 'normal'),
(31, 'Boonlontub', 'Coktak', 'boonlontub@gmail.com', '2005-05-07', '2021-06-04', '2022-06-04', 'premium'),
(32, 'Jaidee', 'Meetung', 'jaijai@hotmail.com', '2002-06-20', '2021-06-04', '2022-06-04', 'premium'),
(33, 'Somjai', 'Wangtongkum', 'somjaigege@gmail.com', '2002-03-01', '2021-06-04', '2022-06-04', 'pattinum'),
(34, 'Sudsuay', 'Wangpetch', 'sudsuayisgade@gmail.com', '2011-06-22', '2021-06-04', '2022-06-04', 'normal'),
(35, 'Kaoniaow', 'Mooping', 'kaoniaowmooping@hotmail.com', '1997-07-27', '2021-06-04', '2022-06-04', 'premium'),
(36, 'Jujube', 'Ja', 'jj@gmail.com', '2000-07-20', '2021-06-04', '2022-06-04', 'normal'),
(37, 'Subson', 'Onlaman', 'subsonsudsud@hotmail.com', '2010-10-13', '2021-06-04', '2022-06-04', 'normal'),
(38, 'Kaojao', 'Mamuang', 'jaomuang@gmail.com', '2006-08-17', '2021-06-04', '2022-06-04', 'normal'),
(39, 'Manut', 'Mana', 'mama@gmail.com', '1999-09-01', '2021-06-06', '2022-06-06', 'normal'),
(40, 'Tungtong', 'Tungtung', 'tungtong@gmail.com', '2006-07-12', '2021-06-08', '2022-06-08', 'pattinum'),
(41, 'Namsai', 'Laiyen', 'namyen@hotmail.com', '1997-08-14', '2021-06-11', '2022-06-11', 'premium'),
(42, 'Pama', 'Lodfai', 'pamalodfai@gmail.com', '2013-10-18', '2021-06-15', '2022-06-15', 'normal'),
(43, 'Moo', 'Satae', 'moosatae@gmail.com', '2009-06-13', '2021-06-18', '2022-06-18', 'normal'),
(44, 'Lookmoo', 'Goolok', 'moogoolok@hotmail.com', '2006-12-22', '2021-06-20', '2022-06-20', 'premium'),
(45, 'Mickey', 'Mouse', 'mickymouse@hotmail.com', '2002-11-28', '2021-06-23', '2022-06-23', 'pattinum'),
(46, 'Popcorn', 'Cola', 'popla@gmail.com', '2015-02-04', '2021-06-26', '2022-06-26', 'pattinum'),
(47, 'Sapare', 'Lahair', 'saparelahair@hotmail.com', '2011-04-15', '2021-06-27', '2022-06-27', 'normal'),
(48, 'Yukyik', 'Criston', 'yukcriston@gmail.com', '2001-06-19', '2021-06-29', '2022-06-29', 'premium'),
(49, 'Kaomai', 'Paman', 'pamank@hotmail.com', '1999-11-05', '2021-06-05', '2022-06-05', 'pattinum'),
(50, 'atcp', 'atcp', 'atcp@gmail.com', '2008-06-13', '2021-06-05', '2022-06-05', 'pattinum');

-- --------------------------------------------------------

--
-- Stand-in structure for view `membercardcount`
-- (See below for the actual view)
--
CREATE TABLE `membercardcount` (
`TotalMemberCard` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `minmemberlevel`
-- (See below for the actual view)
--
CREATE TABLE `minmemberlevel` (
`MemberLevel` varchar(50)
,`Cnt` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `moviehavemaxscreening`
-- (See below for the actual view)
--
CREATE TABLE `moviehavemaxscreening` (
`MovieID` int(50)
,`MovieTitle` varchar(50)
,`cnt` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `movieinfo`
--

CREATE TABLE `movieinfo` (
  `MovieID` int(50) NOT NULL,
  `MovieTitle` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Genre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Picture` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Rate` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Detail` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Cast` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MovieLong` time NOT NULL,
  `MovieIn` date NOT NULL,
  `MovieOut` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `movieinfo`
--

INSERT INTO `movieinfo` (`MovieID`, `MovieTitle`, `Genre`, `Picture`, `Rate`, `Detail`, `Cast`, `MovieLong`, `MovieIn`, `MovieOut`) VALUES
(1, 'Iron Man', 'Adventure, Sci-Fi', 'pic/ironman.jpg', '16+', 'ฮีโร่กอบกู้โลก ', 'Robert Downey, Jr., Scarlett Johansson', '01:47:12', '2021-06-02', '2021-08-31'),
(2, 'Harry Potter', 'Fantasy, Drama', 'pic/harry.jpg', '16+', 'โรงเรียนเวทมนตร์ ศาสตร์มืด', 'Daniel Radcliffe, Emma Watson', '02:07:15', '2021-06-02', '2021-08-31'),
(3, 'เเหยมยโสธร', 'Comedy', 'pic/Yamyasothon.jpg', '16+', 'ความรักกลางทุ่งนา', 'Mum Jokmok, Janet Khiew', '01:43:26', '2021-06-02', '2021-08-31'),
(4, 'เเปลรักฉันด้วยใจเธอ', 'Romantic, Drama', 'pic/pp.jpg', '16+', 'ความรักวัยรุ่น', 'Billkin, PP', '01:44:00', '2021-06-04', '2021-08-31'),
(5, 'Avengers', 'Sci-Fi, Action', 'pic/avengers.jpg', '16+', 'ฮีโร่กอบกู้โลก', 'Kris Wu, Gade', '02:06:00', '2021-06-04', '2021-08-31'),
(6, 'Sherlock Homme', 'Sci-Fi,  Mystery', 'pic/sherlock.jpg', '18+', 'สืบสวนสอบสวน', 'Shawn Mendes, Benedict', '02:15:00', '2021-06-04', '2021-08-31'),
(7, 'หอเเต๋วเเตก', 'Comedy', 'pic/ho.jpg', '16+', 'ตลกขบขัน', ' จาตุรงค์ มกจ๊ก, โก๊ะตี๋ อารามบอย', '00:00:00', '0000-00-00', '0000-00-00'),
(10, 'ก้านกล้วย', 'Animation', 'pic/elephant.jpg', 'normal', 'นักสู้หัวใจช้าง', 'ก้านกล้วย, ชบาเเก้ว', '01:36:00', '2021-06-04', '2021-08-31'),
(13, 'บ้านผีปอบ', 'Horror', 'pic/pee.jpg', 'above 18', 'สยองขวัญ ขนหัวลุก', 'ณัฐนี สิทธิสมาน,  กรองแก้ว กาฬสินธุ์', '01:52:00', '2021-06-04', '2021-08-31'),
(14, 'โกยเถอะโยม', 'Horror', 'pic/white.jpg', 'above 16', 'ตลกขบขัน', 'โก๊ะตี๋ อารามบอย, ค่อม ชวนชื่น', '01:46:00', '2021-06-06', '2021-08-31'),
(15, 'เเนนโน๊ะ', 'Sci-Fi,  Mystery', 'pic/nan.jpg', 'above 18', 'สยองขวัญ ขนหัวลุก', 'คิตตี้ ชิชา', '10:30:00', '2021-06-10', '2021-08-31');

-- --------------------------------------------------------

--
-- Stand-in structure for view `moviemaxmoney`
-- (See below for the actual view)
--
CREATE TABLE `moviemaxmoney` (
`MovieTitle` varchar(50)
,`Sum` decimal(65,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `moviemaxseat`
-- (See below for the actual view)
--
CREATE TABLE `moviemaxseat` (
`MovieTitle` varchar(50)
,`Sum` decimal(65,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `moviemoney`
-- (See below for the actual view)
--
CREATE TABLE `moviemoney` (
`MovieTitle` varchar(50)
,`Sum` decimal(65,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `promotionmovie`
--

CREATE TABLE `promotionmovie` (
  `PromotionMovieID` int(50) NOT NULL,
  `BankPromotion` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SpecialDay` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SpecialCode` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `promotionmovie`
--

INSERT INTO `promotionmovie` (`PromotionMovieID`, `BankPromotion`, `SpecialDay`, `SpecialCode`) VALUES
(1, NULL, NULL, NULL),
(2, 'Krungthai', NULL, NULL),
(3, 'SCB', NULL, NULL),
(21, NULL, 'songkran44', NULL),
(25, NULL, NULL, 'nsb356'),
(26, NULL, 'newyear2022', NULL),
(27, NULL, NULL, 'hsw345'),
(29, NULL, 'valentines14', NULL),
(30, NULL, NULL, 'sag243'),
(32, NULL, NULL, 'vxn353'),
(34, NULL, 'halloween31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `RegisterName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `RegisterSurname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `RegisterEmail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `MemberCardID` int(50) DEFAULT NULL,
  `RegisterID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`RegisterName`, `RegisterSurname`, `RegisterEmail`, `Password`, `Phone`, `MemberCardID`, `RegisterID`) VALUES
('Sompong', 'Susu', 'Sompongsu@gmail.com', 'sususompong555', '0859603506', NULL, 1),
('Mioew', 'za', 'mioewa@gmail.com', 'mioewza88', '0835839504', NULL, 2),
('Kaomai', 'Paman', 'pamank@gmail.com', 'pamank2000', '0835894049', NULL, 4),
('Moo', 'Satae', 'moosatae@gmail.com', 'moosaaaatae44', '0842853839', NULL, 6),
('Popcorn', 'Cola', 'popla@gmail.com', 'poppoplala2001', '0835839445', 46, 8),
('Sapare', 'Lahair', 'saparelahair@hotmail.com', 'sapare234', '0847395939', 47, 10),
('Mickey', 'Mouse', 'mickymouse@hotmail.com', 'mickyyyyy4738', '0835734852', 45, 11),
('Lookmoo', 'Goolok', 'moogoolok@hotmail.com', 'moogoolok3685', '0847539393', 44, 12),
('Namsai', 'Laiyen', 'namyen@hotmail.com', 'namyenmakmak3458', '0834534859', 41, 14),
('pama', 'Lodfai', 'pamalodfai@gmail.com', 'pamapama89234', '0835934589', 42, 21),
('Yukyik', 'Criston', 'yukcriston@gmail.com', 'yuk4396958', '0834853495', 48, 22),
('Sainam', 'Wongwai', 'saisai@gmail.com', 'saija2890849', '0843845304', NULL, 23);

-- --------------------------------------------------------

--
-- Table structure for table `screening`
--

CREATE TABLE `screening` (
  `ScreeningID` int(50) NOT NULL,
  `TheatreID` int(50) NOT NULL,
  `MovieID` int(50) NOT NULL,
  `DateDay` date NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL,
  `SubTitle` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `screening`
--

INSERT INTO `screening` (`ScreeningID`, `TheatreID`, `MovieID`, `DateDay`, `StartTime`, `EndTime`, `SubTitle`) VALUES
(1, 1, 1, '2021-06-02', '10:30:00', '12:30:00', 'TH'),
(2, 2, 2, '2021-06-02', '21:00:00', '17:00:00', 'TH'),
(3, 3, 6, '2021-06-05', '10:30:00', '12:30:00', 'TH'),
(4, 7, 4, '2021-06-06', '13:00:00', '15:00:00', 'ENG'),
(5, 9, 5, '2021-06-04', '19:00:00', '21:30:00', 'TH'),
(6, 11, 10, '2021-06-04', '10:30:00', '12:30:00', 'ENG'),
(7, 4, 4, '2021-06-07', '22:00:00', '00:00:00', 'TH'),
(8, 5, 5, '2021-06-05', '14:00:00', '16:30:00', 'TH'),
(9, 8, 4, '2021-06-06', '21:00:00', '23:00:00', 'ENG'),
(10, 12, 4, '2021-06-10', '15:00:00', '17:00:00', 'ENG'),
(11, 10, 4, '2021-06-13', '21:00:00', '23:00:00', 'TH'),
(12, 6, 2, '2021-06-15', '10:30:00', '13:00:00', 'TH'),
(13, 13, 2, '2021-06-17', '20:00:00', '22:30:00', 'TH'),
(14, 14, 4, '2021-06-19', '15:00:00', '17:00:00', 'ENG'),
(15, 15, 4, '2021-06-20', '20:00:00', '22:00:00', 'ENG'),
(16, 16, 4, '2021-06-09', '19:00:00', '21:00:00', 'ENG'),
(17, 17, 4, '2021-06-11', '12:30:00', '14:30:00', 'ENG'),
(18, 18, 4, '2021-06-12', '16:00:00', '18:00:00', 'TH'),
(19, 19, 4, '2021-06-16', '13:00:00', '15:00:00', 'ENG'),
(20, 20, 4, '2021-06-20', '19:00:00', '21:00:00', 'ENG'),
(21, 21, 4, '2021-06-21', '20:00:00', '22:00:00', 'TH'),
(22, 22, 4, '2021-06-23', '21:00:00', '23:00:00', 'TH'),
(23, 23, 4, '2021-06-25', '14:00:00', '16:00:00', 'ENG'),
(24, 24, 4, '2021-06-14', '19:00:00', '21:00:00', 'ENG'),
(25, 25, 4, '2021-06-26', '21:00:00', '23:00:00', 'ENG'),
(26, 26, 4, '2021-06-28', '10:30:00', '12:30:00', 'TH'),
(27, 27, 4, '2021-06-29', '14:00:00', '16:00:00', 'ENG'),
(28, 28, 1, '2021-06-19', '21:00:00', '23:00:00', 'ENG'),
(29, 29, 6, '2021-06-25', '21:00:00', '23:00:00', 'TH');

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `SeatNo` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`SeatNo`) VALUES
('A1'),
('B1'),
('C1'),
('D1'),
('E1'),
('F1'),
('G1'),
('H1'),
('I1'),
('J1');

-- --------------------------------------------------------

--
-- Table structure for table `seatrun`
--

CREATE TABLE `seatrun` (
  `SeatRunID` int(50) NOT NULL,
  `ScreeningID` int(50) NOT NULL,
  `SeatNo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `seatrun`
--

INSERT INTO `seatrun` (`SeatRunID`, `ScreeningID`, `SeatNo`) VALUES
(512, 1, 'A1'),
(513, 1, 'B1'),
(514, 1, 'C1'),
(515, 1, 'D1'),
(516, 1, 'E1'),
(517, 1, 'F1'),
(518, 1, 'G1'),
(519, 1, 'H1'),
(520, 1, 'I1'),
(521, 1, 'J1'),
(522, 2, 'A1'),
(523, 2, 'B1'),
(524, 2, 'C1'),
(525, 2, 'D1'),
(526, 2, 'E1'),
(527, 2, 'F1'),
(528, 2, 'G1'),
(529, 2, 'H1'),
(530, 2, 'I1'),
(531, 2, 'J1'),
(532, 28, 'A1'),
(533, 28, 'B1'),
(534, 28, 'C1'),
(535, 28, 'D1'),
(536, 28, 'E1'),
(537, 28, 'F1'),
(538, 28, 'G1'),
(539, 28, 'H1'),
(540, 28, 'I1'),
(541, 28, 'J1'),
(552, 12, 'A1'),
(553, 12, 'B1'),
(554, 12, 'C1'),
(555, 12, 'D1'),
(556, 12, 'E1'),
(557, 12, 'F1'),
(558, 12, 'G1'),
(559, 12, 'H1'),
(560, 12, 'I1'),
(561, 12, 'J1'),
(567, 13, 'F1'),
(568, 13, 'G1'),
(569, 13, 'H1'),
(570, 13, 'I1'),
(571, 13, 'J1'),
(572, 4, 'A1'),
(573, 4, 'B1'),
(574, 4, 'C1'),
(575, 4, 'D1'),
(576, 4, 'E1'),
(577, 4, 'F1'),
(578, 4, 'G1'),
(579, 4, 'H1'),
(580, 4, 'I1'),
(581, 4, 'J1'),
(582, 7, 'A1'),
(583, 7, 'B1'),
(584, 7, 'C1'),
(585, 7, 'D1'),
(586, 7, 'E1'),
(587, 7, 'F1'),
(588, 7, 'G1'),
(589, 7, 'H1'),
(590, 7, 'I1'),
(591, 7, 'J1'),
(592, 9, 'A1'),
(593, 9, 'B1'),
(594, 9, 'C1'),
(595, 9, 'D1'),
(596, 9, 'E1'),
(597, 9, 'F1'),
(598, 9, 'G1'),
(599, 9, 'H1'),
(600, 9, 'I1'),
(601, 9, 'J1'),
(612, 10, 'A1'),
(613, 10, 'B1'),
(614, 10, 'C1'),
(615, 10, 'D1'),
(616, 10, 'E1'),
(617, 10, 'F1'),
(618, 10, 'G1'),
(619, 10, 'H1'),
(620, 10, 'I1'),
(621, 10, 'J1'),
(622, 11, 'A1'),
(623, 11, 'B1'),
(624, 11, 'C1'),
(625, 11, 'D1'),
(626, 11, 'E1'),
(627, 11, 'F1'),
(628, 11, 'G1'),
(629, 11, 'H1'),
(630, 11, 'I1'),
(631, 11, 'J1'),
(642, 14, 'A1'),
(643, 14, 'B1'),
(644, 14, 'C1'),
(645, 14, 'D1'),
(646, 14, 'E1'),
(647, 14, 'F1'),
(648, 14, 'G1'),
(649, 14, 'H1'),
(650, 14, 'I1'),
(651, 14, 'J1'),
(652, 15, 'A1'),
(653, 15, 'B1'),
(654, 15, 'C1'),
(655, 15, 'D1'),
(656, 15, 'E1'),
(657, 15, 'F1'),
(658, 15, 'G1'),
(659, 15, 'H1'),
(660, 15, 'I1'),
(661, 15, 'J1'),
(662, 16, 'A1'),
(663, 16, 'B1'),
(664, 16, 'C1'),
(665, 16, 'D1'),
(666, 16, 'E1'),
(667, 16, 'F1'),
(668, 16, 'G1'),
(669, 16, 'H1'),
(670, 16, 'I1'),
(671, 16, 'J1'),
(672, 17, 'A1'),
(673, 17, 'B1'),
(674, 17, 'C1'),
(675, 17, 'D1'),
(676, 17, 'E1'),
(677, 17, 'F1'),
(678, 17, 'G1'),
(679, 17, 'H1'),
(680, 17, 'I1'),
(681, 17, 'J1'),
(682, 18, 'A1'),
(683, 18, 'B1'),
(684, 18, 'C1'),
(685, 18, 'D1'),
(686, 18, 'E1'),
(687, 18, 'F1'),
(688, 18, 'G1'),
(689, 18, 'H1'),
(690, 18, 'I1'),
(691, 18, 'J1'),
(692, 19, 'A1'),
(693, 19, 'B1'),
(694, 19, 'C1'),
(695, 19, 'D1'),
(696, 19, 'E1'),
(697, 19, 'F1'),
(698, 19, 'G1'),
(699, 19, 'H1'),
(700, 19, 'I1'),
(701, 19, 'J1'),
(702, 20, 'A1'),
(703, 20, 'B1'),
(704, 20, 'C1'),
(705, 20, 'D1'),
(706, 20, 'E1'),
(707, 20, 'F1'),
(708, 20, 'G1'),
(709, 20, 'H1'),
(710, 20, 'I1'),
(711, 20, 'J1'),
(712, 21, 'A1'),
(713, 21, 'B1'),
(714, 21, 'C1'),
(715, 21, 'D1'),
(716, 21, 'E1'),
(717, 21, 'F1'),
(718, 21, 'G1'),
(719, 21, 'H1'),
(720, 21, 'I1'),
(721, 21, 'J1'),
(722, 22, 'A1'),
(723, 22, 'B1'),
(724, 22, 'C1'),
(725, 22, 'D1'),
(726, 22, 'E1'),
(727, 22, 'F1'),
(728, 22, 'G1'),
(729, 22, 'H1'),
(730, 22, 'I1'),
(732, 23, 'A1'),
(733, 23, 'B1'),
(734, 23, 'C1'),
(735, 23, 'D1'),
(736, 23, 'E1'),
(737, 23, 'F1'),
(738, 23, 'G1'),
(739, 23, 'H1'),
(740, 23, 'I1'),
(741, 23, 'J1'),
(742, 25, 'A1'),
(743, 25, 'B1'),
(744, 25, 'C1'),
(745, 25, 'D1'),
(746, 25, 'E1'),
(747, 25, 'F1'),
(748, 25, 'G1'),
(749, 25, 'H1'),
(750, 25, 'I1'),
(751, 25, 'J1'),
(752, 26, 'A1'),
(753, 26, 'B1'),
(754, 26, 'C1'),
(755, 26, 'D1'),
(756, 26, 'E1'),
(757, 26, 'F1'),
(758, 26, 'G1'),
(759, 26, 'H1'),
(760, 26, 'I1'),
(761, 26, 'J1'),
(762, 27, 'A1'),
(763, 27, 'B1'),
(764, 27, 'C1'),
(765, 27, 'D1'),
(766, 27, 'E1'),
(767, 27, 'F1'),
(768, 27, 'G1'),
(769, 27, 'H1'),
(770, 27, 'I1'),
(771, 27, 'J1'),
(772, 5, 'A1'),
(773, 5, 'B1'),
(774, 5, 'C1'),
(775, 5, 'D1'),
(776, 5, 'E1'),
(777, 5, 'F1'),
(778, 5, 'G1'),
(779, 5, 'H1'),
(780, 5, 'I1'),
(781, 5, 'J1'),
(782, 8, 'A1'),
(783, 8, 'B1'),
(784, 8, 'C1'),
(785, 8, 'D1'),
(786, 8, 'E1'),
(787, 8, 'F1'),
(788, 8, 'G1'),
(789, 8, 'H1'),
(790, 8, 'I1'),
(791, 8, 'J1'),
(792, 3, 'A1'),
(793, 3, 'B1'),
(794, 3, 'C1'),
(795, 3, 'D1'),
(796, 3, 'E1'),
(797, 3, 'F1'),
(798, 3, 'G1'),
(799, 3, 'H1'),
(800, 3, 'I1'),
(801, 3, 'J1'),
(812, 6, 'A1'),
(813, 6, 'B1'),
(814, 6, 'C1'),
(815, 6, 'D1'),
(816, 6, 'E1'),
(817, 6, 'F1'),
(818, 6, 'G1'),
(819, 6, 'H1'),
(820, 6, 'I1'),
(821, 6, 'J1'),
(822, 24, 'A1'),
(823, 24, 'B1'),
(824, 24, 'C1'),
(825, 24, 'D1'),
(826, 24, 'E1'),
(827, 24, 'F1'),
(828, 24, 'G1'),
(829, 24, 'H1'),
(830, 24, 'I1'),
(831, 24, 'J1'),
(832, 15, 'A1'),
(833, 15, 'B1'),
(834, 15, 'C1'),
(835, 15, 'D1'),
(836, 15, 'E1'),
(837, 15, 'F1'),
(838, 15, 'G1'),
(839, 15, 'H1'),
(840, 15, 'I1'),
(841, 15, 'J1');

-- --------------------------------------------------------

--
-- Table structure for table `theatre`
--

CREATE TABLE `theatre` (
  `TheatreID` int(50) NOT NULL,
  `TheatreName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SeatInEachTheatre` int(10) NOT NULL,
  `SystemType` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `BranchID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `theatre`
--

INSERT INTO `theatre` (`TheatreID`, `TheatreName`, `SeatInEachTheatre`, `SystemType`, `BranchID`) VALUES
(1, 'Theatre1', 100, '2D', 1),
(2, 'Theatre2', 100, '3D', 1),
(3, 'Theatre3', 100, '4D', 1),
(4, 'Theatre4', 100, '3D', 2),
(5, 'Theatre5', 100, '4D', 2),
(6, 'Theatre6', 100, '2D', 3),
(7, 'Theatre7', 100, '4D', 4),
(8, 'Theatre8', 100, '3D', 4),
(9, 'Theatre9', 100, '2D', 5),
(10, 'Theatre10', 100, '4D', 5),
(11, 'Theatre11', 100, '2D', 6),
(12, 'Theatre12', 100, '2D', 3),
(13, 'Theatre4', 100, '2D', 1),
(14, 'Theatre5', 100, '2D', 1),
(15, 'Theatre6', 100, '2D', 1),
(16, 'Theatre1', 100, '2D', 2),
(17, 'Theatre2', 100, '2D', 2),
(18, 'Theatre3', 100, '2D', 2),
(19, 'Theatre6', 100, '2D', 2),
(20, 'Theatre1', 100, '2D', 3),
(21, 'Theatre2', 100, '2D', 3),
(22, 'Theatre3', 100, '2D', 3),
(23, 'Theatre4', 100, '2D', 3),
(24, 'Theatre1', 100, '2D', 4),
(25, 'Theatre2', 100, '2D', 4),
(26, 'Theatre3', 100, '2D', 4),
(27, 'Theatre4', 100, '2D', 4),
(28, 'Theatre13', 100, '2D', 4),
(29, 'Theatre16', 100, '2D', 6);

-- --------------------------------------------------------

--
-- Structure for view `bankpromo`
--
DROP TABLE IF EXISTS `bankpromo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bankpromo`  AS  select `p`.`BankPromotion` AS `BankPromotion`,count(`p`.`BankPromotion`) AS `Cnt` from (`promotionmovie` `p` join `booking` `b`) where (`p`.`PromotionMovieID` = `b`.`PromotionMovieID`) group by `p`.`BankPromotion` order by count(`p`.`BankPromotion`) desc ;

-- --------------------------------------------------------

--
-- Structure for view `branchhavemaxtheatre`
--
DROP TABLE IF EXISTS `branchhavemaxtheatre`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `branchhavemaxtheatre`  AS  select `t`.`BranchID` AS `BranchID`,`b`.`BranchName` AS `BranchName`,count(0) AS `cnt` from (`theatre` `t` join `branch` `b`) where (`t`.`BranchID` = `b`.`BranchID`) group by `t`.`BranchID`,`b`.`BranchName` order by count(0) desc ;

-- --------------------------------------------------------

--
-- Structure for view `branchmoney`
--
DROP TABLE IF EXISTS `branchmoney`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `branchmoney`  AS  select `bookingclient`.`BranchName` AS `BranchName`,sum(`bookingclient`.`TotalDue`) AS `Sum` from `bookingclient` group by `bookingclient`.`BranchName` order by sum(`bookingclient`.`TotalDue`) desc ;

-- --------------------------------------------------------

--
-- Structure for view `branchstaff`
--
DROP TABLE IF EXISTS `branchstaff`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `branchstaff`  AS  select `branch`.`Region` AS `Region`,sum(`branch`.`Staff`) AS `Sum` from `branch` group by `branch`.`Region` order by sum(`branch`.`Staff`) desc ;

-- --------------------------------------------------------

--
-- Structure for view `maxpaymentmethod`
--
DROP TABLE IF EXISTS `maxpaymentmethod`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `maxpaymentmethod`  AS  select `bookingclient`.`PaymentMethod` AS `PaymentMethod`,count(`bookingclient`.`PaymentMethod`) AS `cnt` from `bookingclient` group by `bookingclient`.`PaymentMethod` order by count(`bookingclient`.`PaymentMethod`) desc ;

-- --------------------------------------------------------

--
-- Structure for view `maxtimehour`
--
DROP TABLE IF EXISTS `maxtimehour`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `maxtimehour`  AS  select `bookingclient`.`TimeHour` AS `TimeHour`,count(`bookingclient`.`TimeHour`) AS `cnt` from `bookingclient` group by `bookingclient`.`TimeHour` order by count(`bookingclient`.`AmountSeat`) desc ;

-- --------------------------------------------------------

--
-- Structure for view `membercardcount`
--
DROP TABLE IF EXISTS `membercardcount`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `membercardcount`  AS  select count(`membercard`.`MemberCardID`) AS `TotalMemberCard` from `membercard` ;

-- --------------------------------------------------------

--
-- Structure for view `minmemberlevel`
--
DROP TABLE IF EXISTS `minmemberlevel`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `minmemberlevel`  AS  select `membercard`.`MemberLevel` AS `MemberLevel`,count(`membercard`.`MemberLevel`) AS `Cnt` from `membercard` group by `membercard`.`MemberLevel` order by count(`membercard`.`MemberLevel`) ;

-- --------------------------------------------------------

--
-- Structure for view `moviehavemaxscreening`
--
DROP TABLE IF EXISTS `moviehavemaxscreening`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `moviehavemaxscreening`  AS  select `s`.`MovieID` AS `MovieID`,`m`.`MovieTitle` AS `MovieTitle`,count(0) AS `cnt` from (`screening` `s` join `movieinfo` `m`) where (`s`.`MovieID` = `m`.`MovieID`) group by `s`.`MovieID`,`m`.`MovieTitle` order by count(0) desc limit 1 ;

-- --------------------------------------------------------

--
-- Structure for view `moviemaxmoney`
--
DROP TABLE IF EXISTS `moviemaxmoney`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `moviemaxmoney`  AS  select `bookingclient`.`MovieTitle` AS `MovieTitle`,sum(`bookingclient`.`TotalDue`) AS `Sum` from `bookingclient` group by `bookingclient`.`MovieTitle` order by sum(`bookingclient`.`TotalDue`) desc ;

-- --------------------------------------------------------

--
-- Structure for view `moviemaxseat`
--
DROP TABLE IF EXISTS `moviemaxseat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `moviemaxseat`  AS  select `bookingclient`.`MovieTitle` AS `MovieTitle`,sum(`bookingclient`.`AmountSeat`) AS `Sum` from `bookingclient` group by `bookingclient`.`MovieTitle` order by sum(`bookingclient`.`AmountSeat`) desc limit 1 ;

-- --------------------------------------------------------

--
-- Structure for view `moviemoney`
--
DROP TABLE IF EXISTS `moviemoney`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `moviemoney`  AS  select `bookingclient`.`MovieTitle` AS `MovieTitle`,sum(`bookingclient`.`DiscountMovie`) AS `Sum` from `bookingclient` group by `bookingclient`.`MovieTitle` order by sum(`bookingclient`.`DiscountMovie`) desc ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`BookingID`),
  ADD KEY `r` (`RegisterID`),
  ADD KEY `bkc` (`BookingClientID`),
  ADD KEY `sssccc` (`ScreeningID`),
  ADD KEY `pro` (`PromotionMovieID`);

--
-- Indexes for table `bookingclient`
--
ALTER TABLE `bookingclient`
  ADD PRIMARY KEY (`BookingClientID`);

--
-- Indexes for table `bookingrun`
--
ALTER TABLE `bookingrun`
  ADD PRIMARY KEY (`BookingRunID`),
  ADD KEY `m` (`BookingClientID`),
  ADD KEY `o` (`ScreeningID`),
  ADD KEY `n` (`SeatNo`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`BranchID`);

--
-- Indexes for table `membercard`
--
ALTER TABLE `membercard`
  ADD PRIMARY KEY (`MemberCardID`);

--
-- Indexes for table `movieinfo`
--
ALTER TABLE `movieinfo`
  ADD PRIMARY KEY (`MovieID`);

--
-- Indexes for table `promotionmovie`
--
ALTER TABLE `promotionmovie`
  ADD PRIMARY KEY (`PromotionMovieID`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`RegisterID`),
  ADD KEY `fk_MemberCardID` (`MemberCardID`);

--
-- Indexes for table `screening`
--
ALTER TABLE `screening`
  ADD PRIMARY KEY (`ScreeningID`),
  ADD KEY `mi` (`MovieID`),
  ADD KEY `tr` (`TheatreID`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`SeatNo`);

--
-- Indexes for table `seatrun`
--
ALTER TABLE `seatrun`
  ADD PRIMARY KEY (`SeatRunID`),
  ADD KEY `S` (`SeatNo`),
  ADD KEY `ssc` (`ScreeningID`);

--
-- Indexes for table `theatre`
--
ALTER TABLE `theatre`
  ADD PRIMARY KEY (`TheatreID`),
  ADD KEY `b` (`BranchID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `BookingID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `bookingclient`
--
ALTER TABLE `bookingclient`
  MODIFY `BookingClientID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=368;

--
-- AUTO_INCREMENT for table `bookingrun`
--
ALTER TABLE `bookingrun`
  MODIFY `BookingRunID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=495;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `BranchID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `membercard`
--
ALTER TABLE `membercard`
  MODIFY `MemberCardID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `movieinfo`
--
ALTER TABLE `movieinfo`
  MODIFY `MovieID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `promotionmovie`
--
ALTER TABLE `promotionmovie`
  MODIFY `PromotionMovieID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `RegisterID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `screening`
--
ALTER TABLE `screening`
  MODIFY `ScreeningID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `seatrun`
--
ALTER TABLE `seatrun`
  MODIFY `SeatRunID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=842;

--
-- AUTO_INCREMENT for table `theatre`
--
ALTER TABLE `theatre`
  MODIFY `TheatreID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `bkc` FOREIGN KEY (`BookingClientID`) REFERENCES `bookingclient` (`BookingClientID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pro` FOREIGN KEY (`PromotionMovieID`) REFERENCES `promotionmovie` (`PromotionMovieID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `r` FOREIGN KEY (`RegisterID`) REFERENCES `register` (`RegisterID`),
  ADD CONSTRAINT `sssccc` FOREIGN KEY (`ScreeningID`) REFERENCES `screening` (`ScreeningID`);

--
-- Constraints for table `bookingrun`
--
ALTER TABLE `bookingrun`
  ADD CONSTRAINT `m` FOREIGN KEY (`BookingClientID`) REFERENCES `bookingclient` (`BookingClientID`) ON DELETE CASCADE,
  ADD CONSTRAINT `n` FOREIGN KEY (`SeatNo`) REFERENCES `seat` (`SeatNo`),
  ADD CONSTRAINT `o` FOREIGN KEY (`ScreeningID`) REFERENCES `screening` (`ScreeningID`);

--
-- Constraints for table `register`
--
ALTER TABLE `register`
  ADD CONSTRAINT `fk_MemberCardID` FOREIGN KEY (`MemberCardID`) REFERENCES `membercard` (`MemberCardID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `screening`
--
ALTER TABLE `screening`
  ADD CONSTRAINT `mi` FOREIGN KEY (`MovieID`) REFERENCES `movieinfo` (`MovieID`),
  ADD CONSTRAINT `tr` FOREIGN KEY (`TheatreID`) REFERENCES `theatre` (`TheatreID`) ON UPDATE CASCADE;

--
-- Constraints for table `seatrun`
--
ALTER TABLE `seatrun`
  ADD CONSTRAINT `S` FOREIGN KEY (`SeatNo`) REFERENCES `seat` (`SeatNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ssc` FOREIGN KEY (`ScreeningID`) REFERENCES `screening` (`ScreeningID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `theatre`
--
ALTER TABLE `theatre`
  ADD CONSTRAINT `b` FOREIGN KEY (`BranchID`) REFERENCES `branch` (`BranchID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
