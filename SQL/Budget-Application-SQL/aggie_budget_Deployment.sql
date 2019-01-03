-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 29, 2018 at 10:20 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aggie_budget`
--

-- --------------------------------------------------------

--
-- Table structure for table `billers`
--

CREATE TABLE `billers` (
  `id` int(11) NOT NULL,
  `billerName` varchar(30) NOT NULL,
  `billingAmount` float(9,2) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `budgetprofile`
--

CREATE TABLE `budgetprofile` (
  `id` int(11) NOT NULL,
  `savings` int(11) DEFAULT '20',
  `bills` int(11) DEFAULT '30',
  `entertainment` int(11) DEFAULT '20',
  `discretionary` int(11) DEFAULT '30',
  `checkAmount` float DEFAULT '0',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `budgetprofile`
--

INSERT INTO `budgetprofile` (`id`, `savings`, `bills`, `entertainment`, `discretionary`, `checkAmount`, `user_id`) VALUES
(1, 40, 30, 20, 10, 0, 1),
(2, 20, 30, 20, 30, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `individual_check`
--

CREATE TABLE `individual_check` (
  `id` int(11) NOT NULL,
  `amount` float(9,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `individual_check`
--

INSERT INTO `individual_check` (`id`, `amount`, `created_at`, `user_id`) VALUES
(1, 700.00, '2017-12-03 20:44:57', 1),
(2, 500.00, '2017-12-03 20:45:42', 1),
(3, 1000.00, '2017-12-03 20:47:15', 1),
(4, 200.00, '2018-04-29 17:13:48', 2),
(5, 400.00, '2018-04-29 17:14:07', 2),
(6, 300.00, '2018-04-29 17:14:30', 2),
(7, 200.00, '2018-04-29 18:02:07', 1),
(8, 1300.00, '2018-04-29 19:03:36', 1),
(9, 400.00, '2018-04-29 19:03:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `savings_goals`
--

CREATE TABLE `savings_goals` (
  `id` int(11) NOT NULL,
  `goalName` varchar(30) NOT NULL,
  `currentAmount` float(9,2) DEFAULT '0.00',
  `goalAmount` float(9,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `savings_goals`
--

INSERT INTO `savings_goals` (`id`, `goalName`, `currentAmount`, `goalAmount`, `created_at`, `user_id`) VALUES
(1, 'Car', 1160.00, 5000.00, '2017-12-03 20:46:35', 1),
(2, 'Car', 60.00, 3000.00, '2018-04-29 17:14:20', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `upassword` varchar(250) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneNum` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `upassword`, `email`, `phoneNum`, `created_at`) VALUES
(1, 'Mary', 'Butler', 'f0324913582a900d34058eb91dd6f35c', 'chad.thomas.ii@gmail.com', '+19195368657', '2017-12-03 20:43:38'),
(2, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com', '+11234567890', '2018-04-29 17:13:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billers`
--
ALTER TABLE `billers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `budgetprofile`
--
ALTER TABLE `budgetprofile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `individual_check`
--
ALTER TABLE `individual_check`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `savings_goals`
--
ALTER TABLE `savings_goals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billers`
--
ALTER TABLE `billers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `budgetprofile`
--
ALTER TABLE `budgetprofile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `individual_check`
--
ALTER TABLE `individual_check`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `savings_goals`
--
ALTER TABLE `savings_goals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `billers`
--
ALTER TABLE `billers`
  ADD CONSTRAINT `billers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `budgetprofile`
--
ALTER TABLE `budgetprofile`
  ADD CONSTRAINT `budgetprofile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `individual_check`
--
ALTER TABLE `individual_check`
  ADD CONSTRAINT `individual_check_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `savings_goals`
--
ALTER TABLE `savings_goals`
  ADD CONSTRAINT `savings_goals_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
