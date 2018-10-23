-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2018 at 07:47 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tailorms`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat` text NOT NULL,
  `tran_id` int(11) NOT NULL,
  `neck` int(11) NOT NULL,
  `sleeve` int(11) NOT NULL,
  `cuff` int(11) NOT NULL,
  `chest` int(11) NOT NULL,
  `waist` int(11) NOT NULL,
  `rise` int(11) NOT NULL,
  `inseam` int(11) NOT NULL,
  `outseam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat`, `tran_id`, `neck`, `sleeve`, `cuff`, `chest`, `waist`, `rise`, `inseam`, `outseam`) VALUES
(1, 'Shirt', 18081401, 11, 12, 13, 14, 0, 0, 0, 0),
(2, 'Pant', 18081402, 0, 0, 0, 0, 12, 13, 14, 15),
(3, 'Pant', 18081403, 0, 0, 0, 0, 12, 13, 14, 15),
(4, 'Pant', 18081104, 0, 0, 0, 0, 12, 13, 14, 15);

-- --------------------------------------------------------

--
-- Table structure for table `complete_list`
--

CREATE TABLE `complete_list` (
  `id` int(255) NOT NULL,
  `tran_id` int(255) NOT NULL,
  `voucher_no` varchar(255) NOT NULL,
  `customer_name` text NOT NULL,
  `category` text NOT NULL,
  `delivery_date` date NOT NULL,
  `total` int(255) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complete_list`
--

INSERT INTO `complete_list` (`id`, `tran_id`, `voucher_no`, `customer_name`, `category`, `delivery_date`, `total`, `status`) VALUES
(1, 18081403, 'RN7mM', 'Rakibul Islam', 'Pant', '2018-08-29', 1000, ''),
(2, 18081104, 'dh0Rc', 'Symon Hasan', 'Pant', '2018-08-22', 2000, '');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(255) NOT NULL,
  `category` text NOT NULL,
  `name` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tran_id` int(255) NOT NULL,
  `voucher` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `category`, `name`, `phone`, `address`, `tran_id`, `voucher`) VALUES
(1, 'Shirt', 'Ashiqur Rahman', '01234559677', 'Dhaka Bangladesh', 18081401, 'EiZWV'),
(2, 'Pant', 'Nabil Islam', '01234559677', 'Comilla Bangladesh', 18081402, 'O7eDl'),
(3, 'Pant', 'Rakibul Islam', '012345596101', 'Chowddogram, Comilla', 18081403, 'RN7mM'),
(4, 'Pant', 'Symon Hasan', '01343345596', 'Dhanmondi, Dhaka', 18081104, 'dh0Rc');

-- --------------------------------------------------------

--
-- Table structure for table `order_info`
--

CREATE TABLE `order_info` (
  `id` int(255) NOT NULL,
  `tran_id` int(255) NOT NULL,
  `category` text NOT NULL,
  `design` text NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_date` date NOT NULL,
  `delivery_date` date NOT NULL,
  `total_price` int(255) NOT NULL,
  `paid` int(255) NOT NULL,
  `due` int(255) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `voucher` varchar(255) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_info`
--

INSERT INTO `order_info` (`id`, `tran_id`, `category`, `design`, `quantity`, `order_date`, `delivery_date`, `total_price`, `paid`, `due`, `customer_name`, `customer_address`, `customer_phone`, `voucher`, `status`) VALUES
(1, 18081401, 'Shirt', '1.jpg', 2, '2018-08-14', '2018-08-21', 500, 200, 300, 'Ashiqur Rahman', 'Dhaka Bangladesh', '01234559677', 'EiZWV', 'Pending'),
(2, 18081402, 'Pant', '2.jpg', 3, '2018-08-21', '2018-08-30', 600, 200, 300, 'Nabil Islam', 'Comilla Bangladesh', '01234559677', 'O7eDl', 'Pending'),
(3, 18081403, 'Pant', '9.jpg', 5, '2018-08-22', '2018-08-29', 1000, 200, 800, 'Rakibul Islam', 'Chowddoram, Comilla', '012345596101', 'RN7mM', 'Complete'),
(4, 18081104, 'Pant', '13.jpg', 4, '2018-08-15', '2018-08-22', 2000, 1000, 1000, 'Symon Hasan', 'Dhanmondi, Dhaka', '01343345596', 'dh0Rc', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(255) NOT NULL,
  `user_f_name` text NOT NULL,
  `user_l_name` text NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_contact` varchar(255) NOT NULL,
  `user_images` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_f_name`, `user_l_name`, `user_email`, `user_pass`, `user_contact`, `user_images`) VALUES
(1, 'Rakibul', 'Islam', 'rakibul@gmail.com', 'rakib', '012345678910', 'pro.jpg'),
(2, 'Ashiqur', 'Rahman', 'ashiq@gmail.com', 'ashiq', '01717000001', 'DSC_0398.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `id` int(255) NOT NULL,
  `tran_id` int(255) NOT NULL,
  `voucher_no` varchar(255) NOT NULL,
  `category` text NOT NULL,
  `name` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `order_date` date NOT NULL,
  `delivery_date` date NOT NULL,
  `total` int(255) NOT NULL,
  `paid` int(255) NOT NULL,
  `due` int(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`id`, `tran_id`, `voucher_no`, `category`, `name`, `phone`, `order_date`, `delivery_date`, `total`, `paid`, `due`, `address`) VALUES
(1, 18081401, 'EiZWV', 'Shirt', 'Ashiqur Rahman', '01234559677', '2018-08-14', '2018-08-21', 500, 200, 300, 'Dhaka Bangladesh'),
(2, 18081402, 'O7eDl', 'Pant', 'Nabil Islam', '01234559677', '2018-08-21', '2018-08-30', 600, 200, 300, 'Comilla Bangladesh'),
(3, 18081403, 'RN7mM', 'Pant', 'Rakibul Islam', '012345596101', '2018-08-22', '2018-08-29', 1000, 200, 800, 'Chowddogram, Comilla'),
(4, 18081104, 'dh0Rc', 'Pant', 'Symon Hasan', '01343345596', '2018-08-15', '2018-08-22', 2000, 1000, 1000, 'Dhanmondi, Dhaka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complete_list`
--
ALTER TABLE `complete_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_info`
--
ALTER TABLE `order_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `complete_list`
--
ALTER TABLE `complete_list`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_info`
--
ALTER TABLE `order_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
