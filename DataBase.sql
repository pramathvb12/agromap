SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Table structure for table `crop`

CREATE TABLE `crop` (
  `crop_id` int(11) NOT NULL,
  `crop_name` varchar(100) NOT NULL,
  `crop_category` varchar(50) NOT NULL,
  `crop_type` varchar(100) NOT NULL,
  `farmer_id` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `cost` float NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table `crop`

INSERT INTO `crop` (`crop_id`, `crop_name`, `crop_category`, `crop_type`, `farmer_id`, `quantity`, `cost`, `datetime`) VALUES (35, 'apple', 'food', 'organic', 'f101', 200, 110, '2023-01-28 11:10:50'),
(36, 'ragi', 'food', 'organic', 'f101', 20, 30, '2023-01-28 11:11:22');

-- Table structure for table `crop_orders`

CREATE TABLE `crop_orders` (
  `crop_id` int(4) NOT NULL,
  `customer_id` varchar(100) NOT NULL,
  `farmer_id` varchar(200) NOT NULL,
  `total_cost` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `dateandtime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table `crop_orders`

INSERT INTO `crop_orders` (`crop_id`, `customer_id`, `farmer_id`, `total_cost`, `quantity`, `dateandtime`) VALUES (30, 'c101', 'f101', 20000, 100, '2023-01-19 04:25:58'),
(31, 'c101', 'f102', 1200, 30, '2023-01-27 13:15:47'),
(31, 'c101', 'f102', 7040, 176, '2023-01-27 13:16:52'),
(32, 'c101', 'f101', 1040, 13, '2023-01-27 13:21:14'),
(33, 'c101', 'f101', 260, 13, '2032-01-27 13:27:26'),
(34, 'c101', 'f102', 1000, 50, '2023-01-27 16:39:28'),
(34, 'c101', 'f102', 1000, 50, '2023-01-27 16:40:16');


-- Table structure for table `customer`

CREATE TABLE `customer` (
  `customer_id` varchar(200) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table `customer`

INSERT INTO `customer` (`customer_id`, `customer_name`, `phone_number`, `email`, `city`) VALUES ('c101', 'nishantha', '7618798561', 'nks@gmail.com', 'shivamogga');

-- Table structure for table `farmer`

CREATE TABLE `farmer` (
  `farmer_id` varchar(100) NOT NULL,
  `farmer_name` varchar(100) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table `farmer`

INSERT INTO `farmer` (`farmer_id`, `farmer_name`, `phone_number`, `email`, `city`) VALUES ('f101', 'pramath', '9901285584', 'pvb@abc.com', 'uttara kannada'),
('f102', 'ambika', '9078909876', 'aaa@gmail.com', 'bangalore'),
('f103', 'rajesh', '8980987890', 'avc@gmail.com', 'mysore');

-- Table structure for table `login`

CREATE TABLE `login` (
  `user_id` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table `login`

INSERT INTO `login` (`user_id`, `password`, `role_id`) VALUES ('admin1', '1111', 1),
('admin2', '1111', 1),
('admin3', '1111', 1),
('admin4', '1111', 1),
('c101', '3333', 3),
('f101', '2222', 2),
('f102', '2222', 2),
('f103', '2222', 2);

-- Table structure for table `role`

CREATE TABLE `role` (
  `role_id` int(50) NOT NULL,
  `role_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table `role`

INSERT INTO `role` (`role_id`, `role_name`) VALUES (1, 'admin'),
(2, 'farmer'),
(3, 'customer');

-- Indexes for dumped tables

-- Indexes for table `crop`

ALTER TABLE `crop`
  ADD PRIMARY KEY (`crop_id`,`crop_name`,`crop_category`),
  ADD KEY `farmer_id` (`farmer_id`);

-- Indexes for table `crop_orders`

ALTER TABLE `crop_orders`
  ADD KEY `crop_orders_ibfk_5` (`farmer_id`),
  ADD KEY `crop_orders_ibfk_3` (`customer_id`);

-- Indexes for table `customer`

ALTER TABLE `customer`
  ADD KEY `customer_id` (`customer_id`);

-- Indexes for table `farmer`

ALTER TABLE `farmer`
  ADD KEY `farmer_id` (`farmer_id`);

-- Indexes for table `login`

ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

-- Indexes for table `role`

ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

-- AUTO_INCREMENT for dumped tables

-- AUTO_INCREMENT for table `crop`

ALTER TABLE `crop`
  MODIFY `crop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

-- Constraints for dumped tables

-- Constraints for table `crop`

ALTER TABLE `crop`
  ADD CONSTRAINT `crop_ibfk_1` FOREIGN KEY (`farmer_id`) REFERENCES `login` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- Constraints for table `crop_orders`

ALTER TABLE `crop_orders`
  ADD CONSTRAINT `crop_orders_ibfk_3` FOREIGN KEY (`customer_id`) REFERENCES `login` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `crop_orders_ibfk_5` FOREIGN KEY (`farmer_id`) REFERENCES `login` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- Constraints for table `customer`

ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `login` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- Constraints for table `farmer`

ALTER TABLE `farmer`
  ADD CONSTRAINT `farmer_id` FOREIGN KEY (`farmer_id`) REFERENCES `login` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;