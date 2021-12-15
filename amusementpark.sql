-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 13, 2021 at 11:22 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amusementpark`
--

-- --------------------------------------------------------

--
-- Table structure for table `concessions`
--

CREATE TABLE `concessions` (
  `location` int(11) NOT NULL,
  `concessionName` varchar(100) NOT NULL,
  `concessionID` int(11) NOT NULL,
  `operationCost` float NOT NULL DEFAULT 0,
  `employeeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `concessions`
--

INSERT INTO `concessions` (`location`, `concessionName`, `concessionID`, `operationCost`, `employeeID`) VALUES
(8, 'All About Burgers', 1, 1980, 1),
(8, 'Pretty Fry for an Amusement Park Guy', 2, 1250, 6),
(4, 'Freaky Frankfurters', 3, 870, 33),
(6, 'over the moon shakes', 4, 1750, 37),
(9, 'mom\'s spaghetti', 5, 1900, 25),
(2, 'davy jones\'s', 6, 1500, 12),
(10, 'cabin fever', 7, 980, 19),
(7, 'rock candy emporium', 8, 700, 18),
(1, 'rainforest cafe', 9, 1100, 9),
(9, 'the picnic gable', 10, 1200, 36),
(4, 'pork \'n screams', 11, 1100, 38),
(3, 'whole lotta lava', 12, 540, 11),
(8, 'city sizzlin\'', 13, 1870, 35),
(9, 'glizzy grillin\'', 14, 840, 10),
(10, 'I scream ice cream', 15, 520, 4),
(5, 'mustards last stand', 16, 1040, 5),
(2, 'the gravy boat', 17, 1750, 13),
(1, 'the great entree', 18, 2090, 26);

--
-- Triggers `concessions`
--
DELIMITER $$
CREATE TRIGGER `updateEmp_deletedConcession` AFTER DELETE ON `concessions` FOR EACH ROW UPDATE employees e SET is_assigned=0 WHERE e.employeeID = OLD.employeeID
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateEmp_updatedConcession` AFTER UPDATE ON `concessions` FOR EACH ROW UPDATE employees e SET is_assigned=0 WHERE e.employeeID = OLD.employeeID
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employeeID` int(11) NOT NULL,
  `salary` float NOT NULL DEFAULT 0,
  `employeeName` varchar(100) DEFAULT NULL,
  `is_assigned` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employeeID`, `salary`, `employeeName`, `is_assigned`) VALUES
(1, 9, 'John Smith\r', 1),
(2, 7, 'James Robert\r', 1),
(3, 11, 'Mary Bright\r', 0),
(4, 9, 'Joseph Thomas\r', 1),
(5, 9, 'Karen Richard\r', 1),
(6, 8, 'Daniel Matthews\r', 1),
(7, 7, 'Phineas Flynn\r', 1),
(8, 11, 'Ferb Fletcher\r', 1),
(9, 8, 'Heinz Doofenshmirtz\r', 1),
(10, 8, 'Vanessa Doofenshmirtz\r', 1),
(11, 8, 'Candance Flynn\r', 1),
(12, 9, 'Major Monogram\r', 1),
(13, 8, 'Dipper Pines\r', 1),
(14, 7, 'Mabel Pines\r', 1),
(15, 10, 'Carly Shay\r', 1),
(16, 11, 'Spencer Shay\r', 1),
(17, 10, 'Sam Puckett\r', 1),
(18, 8, 'Freddie Benson\r', 1),
(19, 9, 'Harry Potter\r', 1),
(20, 11, 'Hermione Granger\r', 1),
(21, 7, 'Ron Weasley\r', 1),
(22, 11, 'Fred Weasley\r', 1),
(23, 10, 'George Weasley\r', 0),
(24, 9, 'Percy Weasley\r', 1),
(25, 8, 'Ginny Weasley\r', 1),
(26, 8, 'Luna Lovegood\r', 1),
(27, 10, 'Neville Longbottom\r', 1),
(28, 11, 'Dolores Umbridge\r', 1),
(29, 11, 'Albus Dombledore\r', 1),
(30, 10, 'Lily Potter\r', 1),
(31, 9, 'James Potter\r', 1),
(32, 9, 'Sirius Black\r', 1),
(33, 8, 'Peter Pettigrew\r', 1),
(34, 7, 'Remus Lupin\r', 1),
(35, 9, 'Draco Malfoy\r', 1),
(36, 9, 'Rubeus Hagrid\r', 1),
(37, 8, 'Severus Snape\r', 1),
(38, 8, 'Minerva McGonagall', 1),
(40, 9, 'Karl Jacobs', 1);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `locationID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`locationID`, `name`) VALUES
(1, 'main gate\r'),
(2, 'water world\r'),
(3, 'volcano\r'),
(4, 'ghost town\r'),
(5, 'dry dry desert\r'),
(6, 'space\r'),
(7, 'cave country\r'),
(8, 'metropolis center\r'),
(9, 'the backyard\r'),
(10, 'frostlands');

-- --------------------------------------------------------

--
-- Table structure for table `productamountsold`
--

CREATE TABLE `productamountsold` (
  `concessionID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `numSold` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productamountsold`
--

INSERT INTO `productamountsold` (`concessionID`, `productID`, `numSold`) VALUES
(1, 1, 7),
(1, 2,15),
(1, 5, 45),
(1, 7, 11),
(1, 8, 13),
(1, 9, 9),
(1, 10, 32),
(1, 13, 74),
(1, 29, 33),
(1, 30, 12),
(1, 35, 45),
(2, 6, 78),
(2, 7, 12),
(2, 8, 15),
(2, 9, 17),
(2, 10, 18),
(2, 11, 20),
(2, 12, 35),
(2, 14, 54),
(2, 15, 21),
(2, 16, 87),
(2, 22, 35),
(2, 35, 67),
(3, 1, 78),
(3, 5, 32),
(3, 7, 12),
(3, 8, 16),
(3, 9, 22),
(3, 10, 56),
(3, 13, 34),
(3, 16, 13),
(3, 31, 2),
(3, 32, 78),
(3, 35, 95),
(4, 7, 111),
(4, 8, 5),
(4, 9, 23),
(4, 11, 67),
(4, 15, 13),
(4, 17, 56),
(4, 18, 90),
(4, 19, 23),
(4, 20, 45),
(4, 21, 12),
(4, 33, 15),
(4, 34, 17),
(4, 35, 22),
(4, 36, 25),
(5, 3, 26),
(5, 4, 32),
(5, 7, 35),
(5, 8, 64),
(5, 9, 55),
(5, 10, 12),
(5, 16, 1),
(5, 26, 35),
(5, 27, 76),
(5, 28, 23),
(5, 35, 15),
(6, 1, 26),
(6, 2, 12),
(6, 3, 15),
(6, 4, 17),
(6, 5, 22),
(6, 6, 23),
(6, 7, 27),
(6, 8, 30),
(6, 9, 22),
(6, 10, 15),
(6, 13, 17),
(6, 14, 20),
(6, 16, 22),
(6, 22, 25),
(6, 29, 30),
(6, 30, 32),
(6, 35, 35),
(7, 6, 76),
(7, 11, 21),
(7, 12, 7),
(7, 15, 25),
(7, 17, 30),
(7, 18, 45),
(7, 19, 78),
(7, 20, 13),
(7, 21, 15),
(7, 23, 78),
(7, 24, 35),
(7, 25, 24),
(7, 33, 12),
(7, 34, 15),
(7, 36, 17),
(8, 6, 78),
(8, 11, 24),
(8, 12, 25),
(8, 15, 26),
(8, 17, 27),
(8, 18, 30),
(8, 19, 45),
(8, 20, 12),
(8, 21, 7),
(8, 23, 25),
(8, 24, 37),
(8, 25, 15),
(8, 33, 26),
(8, 34, 27),
(8, 36, 87),
(9, 1, 34),
(9, 2, 36),
(9, 3, 38),
(9, 4, 20),
(9, 7, 15),
(9, 8, 17),
(9, 9, 26),
(9, 10, 37),
(9, 13, 27),
(9, 26, 39),
(9, 27, 46),
(9, 28, 57),
(9, 29, 55),
(9, 30, 24),
(9, 35, 31),
(10, 1, 27),
(10, 2, 39),
(10, 5, 45),
(10, 6, 67),
(10, 7, 74),
(10, 8, 35),
(10, 9, 41),
(10, 10, 38),
(10, 11, 12),
(10, 12, 15),
(10, 13, 8),
(10, 14, 12),
(10, 15, 16),
(10, 22, 17),
(10, 29, 43),
(10, 30, 111),
(10, 31, 122),
(10, 32, 46),
(10, 35, 16),
(11, 1, 17),
(11, 5, 36),
(11, 7, 21),
(11, 8, 146),
(11, 9, 56),
(11, 10, 7),
(11, 11, 12),
(11, 12, 17),
(11, 13, 25),
(11, 14, 16),
(11, 15, 27),
(11, 16, 35),
(11, 22, 60),
(11, 31, 4),
(11, 32, 25),
(11, 35, 37),
(12, 11, 42),
(12, 12, 41),
(12, 15, 43),
(12, 17, 65),
(12, 18, 98),
(12, 19, 21),
(12, 20, 67),
(12, 21, 78),
(12, 33, 45),
(12, 34, 31),
(12, 36, 27),
(13, 1, 39),
(13, 2, 48),
(13, 5, 69),
(13, 7, 41),
(13, 8, 23),
(13, 9, 34),
(13, 10, 65),
(13, 13, 75),
(13, 22, 12),
(13, 29, 26),
(13, 30, 49),
(13, 31, 31),
(13, 32, 59),
(13, 35, 26),
(14, 1, 12),
(14, 2, 16),
(14, 5, 27),
(14, 7, 59),
(14, 8, 123),
(14, 9, 43),
(14, 10, 39),
(14, 13, 12),
(14, 22, 45),
(14, 29, 76),
(14, 30, 29),
(14, 31, 37),
(14, 32, 45),
(14, 35, 98),
(15, 11, 38),
(15, 12, 48),
(15, 15, 59),
(15, 17, 60),
(15, 18, 75),
(15, 19, 21),
(15, 20, 16),
(15, 21, 7),
(15, 33, 18),
(15, 34, 48),
(15, 36, 487),
(16, 1, 12),
(16, 2, 43),
(16, 5, 21),
(16, 7, 67),
(16, 8, 165),
(16, 9, 16),
(16, 10, 65),
(16, 13, 43),
(16, 22, 28),
(16, 29, 83),
(16, 30, 15),
(16, 31, 20),
(16, 32, 5),
(16, 35, 59),
(17, 3, 24),
(17, 4, 29),
(17, 6, 61),
(17, 7, 91),
(17, 8, 345),
(17, 10, 17),
(17, 16, 35),
(17, 26, 28),
(17, 27, 51),
(17, 28, 94),
(17, 35, 58),
(18, 1, 7),
(18, 2, 27),
(18, 3, 321),
(18, 4, 28),
(18, 5, 67),
(18, 6, 38),
(18, 7, 56),
(18, 8, 12),
(18, 9, 59),
(18, 10, 49),
(18, 11, 36),
(18, 12, 27),
(18, 13, 49),
(18, 14, 60),
(18, 15, 5),
(18, 16, 12),
(18, 35, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `price` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `productName`, `price`) VALUES
(1, 'hot dog', 4),
(2, 'hamburger', 6),
(3, 'cheese pizza', 3),
(4, 'pepperoni pizza', 3.5),
(5, 'corndog', 4.5),
(6, 'popcorn', 5),
(7, 'large soft drink', 5),
(8, 'medium soft drink', 4.5),
(9, 'small soft drink', 3),
(10, 'chicken fingers', 4),
(11, 'funnel cake', 7),
(12, 'cotton candy', 6),
(13, 'french fries', 3.5),
(14, 'soft pretzel', 4.5),
(15, 'churro', 4),
(16, 'nachos', 6),
(17, 'small milkshake', 4),
(18, '1 scoop ice cream', 3),
(19, '2 scoop ice cream', 4.5),
(20, '3 scoop ice cream', 6),
(21, 'dippin dots', 3.5),
(22, 'turkey leg', 6),
(23, 'small rock candy', 3.5),
(24, 'medium rock candy', 4.5),
(25, 'large rock candy', 5),
(26, 'spaghetti', 5),
(27, 'spaghetti with sauce', 5.5),
(28, 'spaghetti with meatballs', 6),
(29, 'cheeseburger', 6.5),
(30, 'chicken sandwich', 8),
(31, 'bratwurst', 6),
(32, 'frankfurter', 6.5),
(33, 'medium milkshake', 5.5),
(34, 'large milkshake', 6),
(35, 'water', 7),
(36, 'float', 9);

-- --------------------------------------------------------

--
-- Table structure for table `profits`
--

CREATE TABLE `profits` (
  `date` date NOT NULL,
  `earnings` float NOT NULL DEFAULT 0,
  `totalTicketsSold` int(11) NOT NULL DEFAULT 0,
  `totalProductsSold` int(11) NOT NULL DEFAULT 0,
  `totalOperationCost` float NOT NULL DEFAULT 0,
  `netProfit` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profits`
--

INSERT INTO `profits` (`date`, `earnings`, `totalTicketsSold`, `totalProductsSold`, `totalOperationCost`, `netProfit`) VALUES
('2021-08-21', 29777, 1882, 3927, 25818.5, 3958.44),
('2021-08-22', 47423, 790, 1217, 25818.5, 21604.5),
('2021-08-23', 42816.6, 2186, 5833, 25818.5, 16998.1),
('2021-08-24', 35667.4, 1062, 2649, 25818.5, 9848.84),
('2021-08-25', 111639, 1093, 4916, 25818.5, 85820.3),
('2021-08-26', 85303.5, 4031, 2306, 25818.5, 59484.9),
('2021-08-27', 1336.55, 3269, 148, 25818.5, -24482),
('2021-08-28', 80605.2, 28, 2067, 25818.5, 54786.7),
('2021-08-29', 103797, 3859, 3685, 25818.5, 77978.5),
('2021-08-30', 139819, 3530, 6976, 25818.5, 114000),
('2021-08-31', 76672.5, 4677, 3890, 25818.5, 50853.9),
('2021-09-01', 80573.3, 2349, 5855, 25818.5, 54754.8),
('2021-09-02', 62076.9, 1276, 1639, 25818.5, 36258.4),
('2021-09-03', 23795.1, 2762, 1428, 25818.5, -2023.44),
('2021-09-04', 54780.7, 511, 3437, 25818.5, 28962.2),
('2021-09-05', 72638.7, 1989, 788, 25818.5, 46820.2),
('2021-09-06', 88726.4, 3426, 3863, 25818.5, 62907.8),
('2021-09-07', 56373, 2695, 4111, 25818.5, 30554.5),
('2021-09-08', 80090.9, 1423, 1702, 25818.5, 54272.4),
('2021-09-09', 32077.8, 3546, 5592, 25818.5, 6259.24),
('2021-09-10', 132429, 442, 6616, 25818.5, 106610),
('2021-09-11', 1149.28, 4783, 361, 25818.5, -24669.2),
('2021-09-12', 51553.7, 19, 2758, 25818.5, 25735.2),
('2021-09-13', 84427.1, 1327, 1931, 25818.5, 58608.6),
('2021-09-14', 55958.9, 3392, 2531, 25818.5, 30140.4),
('2021-09-15', 4822.74, 2198, 133, 25818.5, -20995.8),
('2021-09-16', 60777.7, 183, 5597, 25818.5, 34959.2),
('2021-09-17', 86716.5, 1165, 5879, 25818.5, 60898),
('2021-09-18', 14030, 3757, 2238, 25818.5, -11788.5),
('2021-09-19', 67806.1, 554, 350, 25818.5, 41987.5),
('2021-09-20', 54093.8, 3313, 1455, 25818.5, 28275.2),
('2021-09-21', 125961, 2360, 4854, 25818.5, 100142),
('2021-09-22', 96831.9, 4952, 5299, 25818.5, 71013.3),
('2021-09-23', 78719, 3427, 3682, 25818.5, 52900.5),
('2021-09-24', 44081.6, 2238, 500, 25818.5, 18263.1),
('2021-09-25', 88782, 2213, 4877, 25818.5, 62963.5),
('2021-09-26', 70556.8, 3124, 3730, 25818.5, 44738.2),
('2021-09-27', 37353.1, 3257, 709, 25818.5, 11534.6),
('2021-09-28', 50079.2, 1788, 6923, 25818.5, 24260.7),
('2021-09-29', 31819.5, 2157, 1489, 25818.5, 6000.94),
('2021-09-30', 135189, 1139, 6630, 25818.5, 109371),
('2021-10-01', 64238.4, 4846, 5430, 25818.5, 38419.9),
('2021-10-02', 50280.4, 2126, 3849, 25818.5, 24461.9),
('2021-10-03', 51495.8, 2244, 6051, 25818.5, 25677.3),
('2021-10-04', 41077.9, 2090, 4162, 25818.5, 15259.4),
('2021-10-05', 49815.5, 659, 3968, 25818.5, 23997),
('2021-10-06', 32047.5, 1823, 1876, 25818.5, 6228.96),
('2021-10-07', 102368, 739, 1638, 25818.5, 76549.8),
('2021-10-08', 25491.2, 4638, 6681, 25818.5, -327.37),
('2021-10-09', 69371.3, 762, 1681, 25818.5, 43552.8),
('2021-10-10', 47685.9, 2936, 1903, 25818.5, 21867.4),
('2021-10-11', 21172.3, 1911, 4027, 25818.5, -4646.21),
('2021-10-12', 111690, 682, 3007, 25818.5, 85871.2),
('2021-10-13', 56680.3, 4925, 3704, 25818.5, 30861.8),
('2021-10-14', 12318.3, 2666, 494, 25818.5, -13500.2),
('2021-10-15', 71074.8, 569, 2594, 25818.5, 45256.3),
('2021-10-16', 74119.8, 2643, 2246, 25818.5, 48301.3),
('2021-10-17', 21256, 3095, 2668, 25818.5, -4562.55),
('2021-10-18', 32585, 39, 3307, 25818.5, 6766.46),
('2021-10-19', 45443.9, 1310, 748, 25818.5, 19625.4),
('2021-10-20', 36567.7, 2251, 400, 25818.5, 10749.2),
('2021-10-21', 43918.9, 1690, 1703, 25818.5, 18100.3),
('2021-10-22', 82942.9, 1534, 2310, 25818.5, 57124.4),
('2021-10-23', 100863, 4004, 4335, 25818.5, 75044.6),
('2021-10-24', 10119.5, 3006, 934, 25818.5, -15699),
('2021-10-25', 49340.2, 436, 3886, 25818.5, 23521.7),
('2021-10-26', 22436.9, 1322, 1440, 25818.5, -3381.57),
('2021-10-27', 57092.1, 893, 3047, 25818.5, 31273.6),
('2021-10-28', 40387.3, 1431, 631, 25818.5, 14568.8),
('2021-10-29', 45155.7, 1834, 3114, 25818.5, 19337.2),
('2021-10-30', 33130.2, 1065, 3256, 25818.5, 7311.71),
('2021-10-31', 79620.1, 751, 2189, 25818.5, 53801.6),
('2021-11-01', 35378.9, 3317, 2545, 25818.5, 9560.4),
('2021-11-02', 50286.1, 1187, 4941, 25818.5, 24467.6),
('2021-11-03', 104153, 550, 2857, 25818.5, 78334),
('2021-11-04', 99727.4, 4829, 5284, 25818.5, 73908.9),
('2021-11-05', 59864.6, 2774, 2263, 25818.5, 34046.1),
('2021-11-06', 48633, 2915, 3034, 25818.5, 22814.5),
('2021-11-07', 5683.88, 1333, 2418, 25818.5, -20134.6),
('2021-11-08', 90985.9, 83, 1252, 25818.5, 65167.4),
('2021-11-09', 92164.7, 4171, 2262, 25818.5, 66346.2),
('2021-11-10', 75678.4, 4119, 5179, 25818.5, 49859.8),
('2021-11-11', 44807.3, 2490, 2343, 25818.5, 18988.7),
('2021-11-12', 113965, 1706, 6421, 25818.5, 88146.5),
('2021-11-13', 101484, 4762, 882, 25818.5, 75666),
('2021-11-14', 94125.7, 4737, 4673, 25818.5, 68307.1),
('2021-11-15', 35065.3, 3070, 3541, 25818.5, 9246.77),
('2021-11-16', 96407.2, 596, 1436, 25818.5, 70588.7),
('2021-11-17', 78138.8, 4690, 1931, 25818.5, 52320.3),
('2021-11-18', 79037.4, 3424, 2963, 25818.5, 53218.9),
('2021-11-19', 157179, 3367, 6292, 25818.5, 131360),
('2021-11-20', 35585.3, 4886, 3036, 25818.5, 9766.82),
('2021-11-21', 39852.4, 1593, 792, 25818.5, 14033.9),
('2021-11-22', 75548.6, 3633, 649, 25818.5, 49730.1),
('2021-11-23', 8883.49, 238, 3436, 25818.5, -16935),
('2021-11-24', 72899.2, 2389, 8077, 25818.5, 47080.7),
('2021-11-25', 56259.1, 498, 2355, 25818.5, 30440.6),
('2021-11-26', 161866, 8032, 5765, 25818.5, 136048),
('2021-11-27', 82556.8, 3489, 2356, 25818.5, 56738.3),
('2021-11-28', 102531, 4589, 4653, 25818.5, 76712.9),
('2021-11-29', 154517, 5794, 9999, 25818.5, 128698),
('2021-11-30', 194182, 7859, 10284, 25818.5, 168364);

-- --------------------------------------------------------

--
-- Table structure for table `rides`
--

CREATE TABLE `rides` (
  `rideName` varchar(100) NOT NULL,
  `capacity` int(11) NOT NULL DEFAULT 0,
  `numTrains` int(11) NOT NULL DEFAULT 0,
  `heightRequirement` int(11) DEFAULT NULL,
  `requiresMaintenance` tinyint(1) NOT NULL,
  `location` int(11) NOT NULL,
  `rideID` int(11) NOT NULL,
  `operationCost` float NOT NULL DEFAULT 0,
  `totalRiders` int(11) NOT NULL DEFAULT 0,
  `employeeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rides`
--

INSERT INTO `rides` (`rideName`, `capacity`, `numTrains`, `heightRequirement`, `requiresMaintenance`, `location`, `rideID`, `operationCost`, `totalRiders`, `employeeID`) VALUES
('mine train', 24, 2, 36, 0, 3, 1, 273.97, 0, 3),
('man of iron', 32, 8, 48, 0, 8, 2, 117.81, 0, 23),
('mr bones wild ride', 40, 10, 48, 0, 4, 3, 213.7, 0, 14),
('1000 screams', 12, 2, 60, 0, 4, 4, 150.68, 0, 8),
('leviathan', 48, 8, 54, 0, 8, 5, 279.45, 0, 30),
('jolly blue giant', 48, 8, 54, 0, 7, 6, 284.93, 0, 15),
('cupcake carousel', 30, 30, 36, 0, 2, 7, 57.53, 0, 16),
('berzerker', 24, 4, 60, 0, 7, 8, 104.1, 0, 7),
('jungle jam', 16, 4, 36, 0, 2, 9, 38.3, 0, 17),
('semifinal destination', 40, 10, 48, 0, 9, 10, 57.5, 0, 20),
('flat zone', 30, 6, 36, 0, 5, 11, 76.71, 0, 27),
('fountain of screams', 32, 8, 36, 0, 3, 12, 82.19, 0, 32),
('mirage', 24, 4, 48, 0, 5, 13, 112.33, 0, 28),
('2fort', 24, 4, 48, 0, 5, 14, 136.98, 0, 22),
('space cowboy', 32, 4, 54, 0, 6, 15, 142.47, 0, 40),
('intergalactic planetary', 64, 8, 36, 0, 6, 16, 35.62, 0, 31),
('frosteez', 28, 4, 36, 0, 10, 17, 84.93, 0, 29),
('snowpeak ruins', 64, 8, 36, 0, 10, 18, 249.32, 0, 24);

--
-- Triggers `rides`
--
DELIMITER $$
CREATE TRIGGER `updateEmp_deletedRide` AFTER DELETE ON `rides` FOR EACH ROW UPDATE employees e SET is_assigned=0 WHERE e.employeeID = OLD.employeeID
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateEmp_updatedRide` AFTER UPDATE ON `rides` FOR EACH ROW UPDATE employees e SET is_assigned=0 WHERE e.employeeID = OLD.employeeID
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ticketamountsold`
--

CREATE TABLE `ticketamountsold` (
  `boothID` int(11) NOT NULL,
  `ticketType` varchar(25) NOT NULL,
  `numSold` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticketamountsold`
--

INSERT INTO `ticketamountsold` (`boothID`, `ticketType`, `numSold`) VALUES
(1, 'adult', 0),
(1, 'bama_student', 0),
(1, 'child', 0),
(1, 'senior', 0),
(2, 'adult', 0),
(2, 'bama_student', 0),
(2, 'child', 0),
(2, 'senior', 0),
(3, 'adult', 0),
(3, 'bama_student', 0),
(3, 'child', 0),
(3, 'senior', 0),
(4, 'adult', 0),
(4, 'bama_student', 0),
(4, 'child', 0),
(4, 'senior', 0),
(5, 'adult', 0),
(5, 'bama_student', 0),
(5, 'child', 0),
(5, 'senior', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ticketbooths`
--

CREATE TABLE `ticketbooths` (
  `boothID` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `employeeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticketbooths`
--

INSERT INTO `ticketbooths` (`boothID`, `location`, `employeeID`) VALUES
(1, 1, 7),
(2, 1, 14),
(3, 1, 34),
(4, 1, 21),
(5, 1, 2);

--
-- Triggers `ticketbooths`
--
DELIMITER $$
CREATE TRIGGER `updateEmp_deletedBooth` AFTER DELETE ON `ticketbooths` FOR EACH ROW UPDATE employees e SET is_assigned=0 WHERE e.employeeID = OLD.employeeID
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateEmp_updatedBooth` AFTER UPDATE ON `ticketbooths` FOR EACH ROW UPDATE employees e SET is_assigned=0 WHERE e.employeeID = OLD.employeeID
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ticketType` varchar(32) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticketType`, `price`) VALUES
('adult', 34.99),
('bama_student', 499.99),
('child', 15.99),
('senior', 10.99);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `concessions`
--
ALTER TABLE `concessions`
  ADD PRIMARY KEY (`concessionID`),
  ADD KEY `location` (`location`),
  ADD KEY `employeeID` (`employeeID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employeeID`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`locationID`);

--
-- Indexes for table `productamountsold`
--
ALTER TABLE `productamountsold`
  ADD PRIMARY KEY (`concessionID`,`productID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `profits`
--
ALTER TABLE `profits`
  ADD PRIMARY KEY (`date`);

--
-- Indexes for table `rides`
--
ALTER TABLE `rides`
  ADD PRIMARY KEY (`rideID`),
  ADD KEY `location` (`location`),
  ADD KEY `employeeID` (`employeeID`);

--
-- Indexes for table `ticketamountsold`
--
ALTER TABLE `ticketamountsold`
  ADD PRIMARY KEY (`boothID`,`ticketType`),
  ADD KEY `ticketType` (`ticketType`);

--
-- Indexes for table `ticketbooths`
--
ALTER TABLE `ticketbooths`
  ADD PRIMARY KEY (`boothID`),
  ADD KEY `location` (`location`),
  ADD KEY `employeeID` (`employeeID`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticketType`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `concessions`
--
ALTER TABLE `concessions`
  MODIFY `concessionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `locationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `rides`
--
ALTER TABLE `rides`
  MODIFY `rideID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `ticketbooths`
--
ALTER TABLE `ticketbooths`
  MODIFY `boothID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `concessions`
--
ALTER TABLE `concessions`
  ADD CONSTRAINT `concessions_ibfk_1` FOREIGN KEY (`location`) REFERENCES `location` (`locationID`),
  ADD CONSTRAINT `concessions_ibfk_2` FOREIGN KEY (`employeeID`) REFERENCES `employees` (`employeeID`);

--
-- Constraints for table `productamountsold`
--
ALTER TABLE `productamountsold`
  ADD CONSTRAINT `productamountsold_ibfk_1` FOREIGN KEY (`concessionID`) REFERENCES `concessions` (`concessionID`),
  ADD CONSTRAINT `productamountsold_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`),
  ADD CONSTRAINT `productamountsold_ibfk_3` FOREIGN KEY (`concessionID`) REFERENCES `concessions` (`concessionID`);

--
-- Constraints for table `rides`
--
ALTER TABLE `rides`
  ADD CONSTRAINT `rides_ibfk_1` FOREIGN KEY (`location`) REFERENCES `location` (`locationID`),
  ADD CONSTRAINT `rides_ibfk_2` FOREIGN KEY (`employeeID`) REFERENCES `employees` (`employeeID`);

--
-- Constraints for table `ticketamountsold`
--
ALTER TABLE `ticketamountsold`
  ADD CONSTRAINT `ticketamountsold_ibfk_1` FOREIGN KEY (`boothID`) REFERENCES `ticketbooths` (`boothID`),
  ADD CONSTRAINT `ticketamountsold_ibfk_2` FOREIGN KEY (`ticketType`) REFERENCES `tickets` (`ticketType`);

--
-- Constraints for table `ticketbooths`
--
ALTER TABLE `ticketbooths`
  ADD CONSTRAINT `ticketbooths_ibfk_1` FOREIGN KEY (`location`) REFERENCES `location` (`locationID`),
  ADD CONSTRAINT `ticketbooths_ibfk_2` FOREIGN KEY (`location`) REFERENCES `location` (`locationID`),
  ADD CONSTRAINT `ticketbooths_ibfk_3` FOREIGN KEY (`employeeID`) REFERENCES `employees` (`employeeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
