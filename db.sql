-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2022 at 12:54 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `session` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `cat` varchar(255) DEFAULT NULL,
  `fav` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `phone`, `password`, `picture`, `session`, `role`, `bio`, `cat`, `fav`) VALUES
(2, 'fathi', 'fathy@gmail.com', '01207380878', '123', '', '22428023', 'buyer', NULL, '87214', '17440');

-- --------------------------------------------------------

--
-- Table structure for table `cart_87214`
--

CREATE TABLE `cart_87214` (
  `id` int(10) UNSIGNED NOT NULL,
  `count` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `product` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`product`, `name`, `date`, `time`, `comment`, `email`) VALUES
('3', 'michael', '2022/10/15', '12:38:20am', '55', 'mzaref360@gmail.com'),
('3', 'michael', '2022/10/15', '02:41:20pm', 'ff', 'mzaref360@gmail.com'),
('3', 'michael', '2022/10/15', '02:41:22pm', 'ff', 'mzaref360@gmail.com'),
('3', 'michael', '2022/10/15', '02:41:24pm', 'ff', 'mzaref360@gmail.com'),
('4', 'michael', '2022/10/15', '10:57:52pm', 'good product', 'mzaref360@gmail.com'),
('4', 'michael', '2022/10/15', '10:58:19pm', 'recommend this product', 'mzaref360@gmail.com'),
('4', 'michael', '2022/10/16', '08:19:02pm', 'good product and recomended', 'mzaref360@gmail.com'),
(' 6', 'michael', '2022/10/17', '09:16:37am', 'good product', 'mzaref360@gmail.com'),
(' 6', 'michael', '2022/10/17', '09:16:48am', 'recommend this product', 'mzaref360@gmail.com'),
(' 7', '', '2022/10/19', '11:27:43am', 'good product', ''),
(' 4', 'michael', '2022/10/20', '09:26:23pm', 'good product', 'mzaref360@gmail.com'),
(' 4', 'michael', '2022/10/20', '09:33:11pm', 'recommend this product', 'mzaref360@gmail.com'),
(' 4', 'michael', '2022/10/20', '09:33:50pm', 'good product', 'mzaref360@gmail.com'),
(' 9', 'michael', '2022/10/20', '10:55:51pm', 'good product', 'mzaref360@gmail.com'),
(' 9', 'michael', '2022/10/20', '10:55:54pm', 'recommend this product', 'mzaref360@gmail.com'),
(' 10', 'girgis', '2022/10/21', '05:16:35pm', 'good product', 'girgis@gmail.com'),
(' 10', 'michael', '2022/10/21', '05:16:54pm', 'recommend this product', 'mzaref360@gmail.com'),
(' 9', '', '2022/10/21', '07:32:56pm', 'over rated', ''),
(' 4', 'michael', '2022/10/22', '03:23:01pm', 'recommend this product', 'mzaref360@gmail.com'),
(' 4', 'michael', '2022/10/30', '02:38:50pm', 'hhh', 'mzaref360@gmail.com'),
('m', 'michael', '2022/11/04', '04:37:04pm', 'dfwe', 'mzaref360@gmail.com'),
(' 4', 'houda', '2022/11/21', '11:21:36am', 'gsdgd', 'houda@gmail.com'),
(' 4', 'houda', '2022/11/21', '11:46:38am', 'hshhshs', 'houda@gmail.com'),
('4', '', '2022/11/21', '05:03:27pm', 'good product', '');

-- --------------------------------------------------------

--
-- Table structure for table `fav_17440`
--

CREATE TABLE `fav_17440` (
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `precent` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `name`, `precent`, `img`, `code`) VALUES
(4, 'back friday', '10', 'sale.jpg', 'bf-2022');

-- --------------------------------------------------------

--
-- Table structure for table `posters`
--

CREATE TABLE `posters` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `path` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posters`
--

INSERT INTO `posters` (`id`, `name`, `path`) VALUES
(1, 'sale', 'sale.jpg'),
(3, 'cover', 'cover.jpg'),
(5, 'slide', 'slid1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `name` varchar(100) NOT NULL,
  `disc` varchar(500) NOT NULL,
  `price` varchar(10) NOT NULL,
  `rate` varchar(10) NOT NULL,
  `image` varchar(500) NOT NULL,
  `note` varchar(500) NOT NULL,
  `trader` varchar(100) NOT NULL,
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`name`, `disc`, `price`, `rate`, `image`, `note`, `trader`, `id`) VALUES
('mobile ', 'mobile phone one plus \r\n- 128 GB\r\n- 8 GB RAM', '8500', '', 'download.png', '', 'mzaref360@gmail.com', 4),
('keyboard RGB', 'SteelSeries Apex 3 RGB Gaming Keyboard – 10-Zone RGB Illumination – IP32 Water Resistant – Premium Magnetic Wrist Rest (Whisper Quiet Gaming Switch)', '39.99', '', 'keyboard.jpg', '', 'michael', 9),
('Gaming headphone', 'SteelSeries Arctis 1 Wired Gaming Headset – Detachable ClearCast Microphone – Lightweight Steel-Reinforced Headband – For PS5, PS4, PC, Xbox, Nintendo Switch, Mobile', '2000', '', '81V01sm1kaL._SX522_.jpg', '', 'girgis', 10),
('JBL Speaker', 'JBL Clip 4: Portable Speaker with Bluetooth, Built-in Battery, Waterproof and Dustproof Feature - Black (JBLCLIP4BLKAM)', '44.95', '', 'jbl.jpg', '', 'michael', 15),
('michael', 'jbl headphones sterio', '500', '', '81V01sm1kaL._SX522_.jpg', '', 'fathi', 16),
('head phons jbl', 'head phons jbl sterio', '500', '', '81V01sm1kaL._SX522_.jpg', '', 'david@gmail.com', 18);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `email` varchar(50) NOT NULL,
  `id` int(50) NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`email`, `id`, `time`) VALUES
('mzaref360@gmail.com', 15811603, '2022-10-15'),
('mzaref360@gmail.com', 95508327, '2022-10-15'),
('mzaref360@gmail.com', 66410309, '2022-10-15'),
('mzaref360@gmail.com', 39704132, '2022-10-15'),
('michael_nabil@gmail.com', 68019040, '2022-10-15'),
('michael_nabil@gmail.com', 36974350, '2022-10-15'),
('mzaref360@gmail.com', 95328255, '2022-10-15'),
('mzaref90@gMAIL.COM', 98659014, '2022-10-15'),
('michael_nabil@gmail.com', 19151984, '2022-10-15'),
('mzaref360@gmail.com', 77269344, '2022-10-15'),
('mzaref360@gmail.com', 12655446, '2022-10-15'),
('mzaref360@gmail.com', 83557104, '2022-10-15'),
('mzaref360@gmail.com', 33848950, '2022-10-15'),
('mzaref360@gmail.com', 86017156, '2022-10-16'),
('mzaref360@gmail.com', 20892448, '2022-10-16'),
('mzaref360@gmail.com', 39362751, '2022-10-16'),
('mzaref360@gmail.com', 54899019, '2022-10-17'),
('mzaref90@gMAIL.COM', 26503609, '2022-10-17'),
('mzaref360@gmail.com', 11102281, '2022-10-17'),
('mzaref360@gmail.com', 48501663, '2022-10-18'),
('mzaref360@gMAIL.COM', 87324035, '2022-10-19'),
('mzaref360@gmail.com', 60259233, '2022-10-20'),
('alaa@gmail.com', 63208650, '2022-10-20'),
('ammar360@gmail.com', 68244579, '2022-10-20'),
('mzaref360@gmail.com', 31771181, '2022-10-21'),
('mzaref360@gmail.com', 45262382, '2022-10-22'),
('mzaref360@gmail.com', 76646264, '2022-10-19'),
('mzaref360@gmail.com', 64952998, '2022-10-19'),
('mzaref360@gmail.com', 88935703, '2022-10-22'),
('mzaref360@gmail.com', 91722247, '2022-10-22'),
('mzaref360@gmail.com', 62290479, '2022-10-22'),
('girgis@gmail.com', 82983570, '2022-10-22'),
('mzaref360@gmail.com', 61871732, '2022-10-22'),
('mzaref360@gmail.com', 65775940, '2022-10-23'),
('mzaref360@gmail.com', 49274104, '2022-10-23'),
('mzaref360@gmail.com', 49461454, '2022-10-24'),
('mzaref360@gmail.com', 97036182, '2022-10-25'),
('mzaref360@gMAIL.COM', 23836387, '2022-10-28'),
('mzaref360@gmail.com', 34839224, '2022-10-29'),
('mzaref360@gmail.com', 41728115, '2022-10-31'),
('mzaref360@gmail.com', 36976978, '2022-10-31'),
('mzaref360@gmail.com', 87795675, '2022-10-31'),
('mzaref360@gmail.com', 35232846, '2022-10-31'),
('mzaref360@gmail.com', 57587340, '2022-10-31'),
('mzaref360@gmail.com', 34474022, '2022-11-01'),
('mzaref360@gmail.com', 58679496, '2022-11-02'),
('mzaref90@gMAIL.COM', 43346502, '2022-11-02'),
('mzaref360@gmail.com', 44107365, '2022-11-02'),
('mzaref90@gMAIL.COM', 31023286, '2022-11-02'),
('mzaref360@gmail.com', 62973049, '2022-11-03'),
('mzaref360@gmail.com', 73268069, '2022-11-03'),
('mzaref360@gmail.com', 36716126, '2022-11-04'),
('mzaref360@gmail.com', 48370186, '2022-11-05'),
('mzaref360@gmail.com', 34583586, '2022-11-05'),
('mzaref360@gmail.com', 71328997, '2022-11-05'),
('mzaref360@gmail.com', 69237803, '2022-11-06'),
('mzaref360@gmail.com', 25512156, '2022-11-06'),
('mzaref360@gmail.com', 81355739, '2022-11-06'),
('mzaref360@gmail.com', 98944015, '2022-11-06'),
('mzaref360@gmail.com', 63710225, '2022-11-09'),
('mzaref360@gmail.com', 56897647, '2022-11-12'),
('mzaref360@gmail.com', 55760816, '2022-11-13'),
('mzaref360@gmail.com', 38709032, '2022-11-15'),
('mzaref360@gmail.com', 58924259, '2022-11-19'),
('mzaref360@gmail.com', 70248515, '2022-11-19'),
('mzaref360@gmail.com', 75650292, '2022-11-19'),
('mzaref360@gmail.com', 37641464, '2022-11-19'),
('mzaref360@gmail.com', 49967679, '2022-11-19'),
('mzaref360@gmail.com', 42404827, '2022-11-20'),
('mzaref360@gmail.com', 47733725, '2022-11-20'),
('mzaref360@gmail.com', 70151106, '2022-11-20'),
('mzaref360@gmail.com', 28450348, '2022-11-20'),
('mzaref360@gmail.com', 90498830, '2022-11-20'),
('mzaref360@gmail.com', 21966879, '2022-11-21'),
('mzaref90@gmail.com', 99827310, '2022-11-21'),
('mzaref360@gmail.com', 19856068, '2022-11-21'),
('mzaref360@gmail.com', 79318499, '2022-11-21'),
('mzaref00@gmail.com', 65043651, '2022-11-21'),
('mzaref5@gmail.com', 27518764, '2022-11-21'),
('mzaref5@gmail.com', 28112772, '2022-11-21'),
('zaref360@gmail.com', 91983762, '2022-11-21'),
('mzaref360@gmail.com', 17204334, '2022-11-21'),
('mzaref360@gmail.com', 23441812, '2022-11-21'),
('houda@gmail.com', 34496872, '2022-11-22'),
('atef@gmail.com', 52234634, '2022-11-22'),
('atef@gmail.com', 30542013, '2022-11-22'),
('mariam@gmail.com', 61541153, '2022-11-22'),
('mariam@gmail.com', 26876163, '2022-11-23'),
('mzaref360@gmail.com', 75318780, '2022-11-23'),
('mzaref360@gmail.com', 72330750, '2022-11-23'),
('mzaref360@gmail.com', 15845860, '2022-11-23'),
('mzaref360@gmail.com', 84909839, '2022-11-23'),
('mzaref360@gmail.com', 11047000, '2022-11-23'),
('mzaref360@gmail.com', 21249205, '2022-11-23'),
('mzaref360@gmail.com', 62916757, '2022-11-23'),
('mzaref360@gmail.com', 61529065, '2022-11-23'),
('mzaref360@gmail.com', 52984888, '2022-11-23'),
('mzaref360@gmail.com', 46348037, '2022-11-23'),
('mzaref360@gmail.com', 63070254, '2022-11-23'),
('mzaref360@gmail.com', 20970887, '2022-11-23'),
('mzaref360@gmail.com', 25574574, '2022-11-23'),
('mzaref360@gmail.com', 23429629, '2022-11-23'),
('mzaref20@gmail.com', 65161271, '2022-11-23'),
('mzaref360@gmail.com', 77201022, '2022-11-23'),
('mzaref0@gmail.com', 81260075, '2022-11-23'),
('mzaref20@gmail.com', 72441611, '2022-11-23'),
('mzaref20@gmail.com', 49732967, '2022-11-23'),
('mzaref20@gmail.com', 19892526, '2022-11-23'),
('fathy@gmail.com', 68250234, '2022-11-23'),
('mzaref20@gmail.com', 88875868, '2022-11-24'),
('fathy@gmail.com', 45142028, '2022-11-24'),
('fathy@gmail.com', 18089168, '2022-11-24'),
('david@gmail.com', 30367324, '2022-11-24'),
('david@gmail.com', 40362475, '2022-11-24'),
('fathy@gmail.com', 28910503, '2022-11-24'),
('david@gmail.com', 87866614, '2022-11-25'),
('fathy@gmail.com', 22428023, '2022-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `picture` varchar(500) NOT NULL,
  `session` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `bio` varchar(50) NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `cart` varchar(10) DEFAULT NULL,
  `fav` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `posters`
--
ALTER TABLE `posters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posters`
--
ALTER TABLE `posters`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
