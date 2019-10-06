-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2019 at 02:20 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tsewang`
--

-- --------------------------------------------------------

--
-- Table structure for table `app`
--

CREATE TABLE `app` (
  `id` int(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `img` varchar(60) NOT NULL,
  `category` varchar(100) NOT NULL,
  `size` varchar(30) NOT NULL,
  `version` varchar(40) NOT NULL,
  `rating` int(10) NOT NULL,
  `file_src` varchar(30) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `developer` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app`
--

INSERT INTO `app` (`id`, `title`, `img`, `category`, `size`, `version`, `rating`, `file_src`, `remark`, `developer`) VALUES
(0, 'Sho tibetan classic leisure game', 'img/a.jpg', 'leisure', '23mb', 'version 2.1.4', 5, '', 'it is nothing but good for nothing', 'dasdasda'),
(1, 'tibetan book of history', 'img/b.jpg', 'education', '23mb', 'version 1.0.0', 2, '', 'this is a tibetan history book', ''),
(2, 'no man racer', 'img/c.jpg', 'racing', '48mb', 'version 2.4.1', 3, '', 'this is a racing game', ''),
(3, 'tibetan oppa', 'img/sho.jpg', 'casual', '12mb', '1.0.0.0', 2, 'app/oppa tibetan.apk', 'no remarks for this', '');

-- --------------------------------------------------------

--
-- Table structure for table `file_dt`
--

CREATE TABLE `file_dt` (
  `id` int(20) NOT NULL,
  `file_no` varchar(30) NOT NULL,
  `reference_no` varchar(30) NOT NULL,
  `remark` varchar(300) NOT NULL,
  `r_department` varchar(200) NOT NULL,
  `mydate` date NOT NULL,
  `page_no` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `file_dt`
--

INSERT INTO `file_dt` (`id`, `file_no`, `reference_no`, `remark`, `r_department`, `mydate`, `page_no`) VALUES
(7, '100k', '23', 'hahahahah', 'TCRC', '2019-03-20', 13),
(50, '100c', 'asdfasdfasd', 'asdfasdfasdfasdf', 'sefafasa', '0000-00-00', 23),
(59, '100s', '12', '12', '12', '2019-03-20', 12),
(60, '100s', '1212121', '12121', '121212', '0000-00-00', 1212),
(201, '100k', '1/1', 'nothing but remarks 2', 'DIIR', '0000-00-00', 1),
(202, '100k', '1/2', 'nothing but remarks 3', 'DIIR', '0000-00-00', 1),
(203, '100k', '1/3', 'nothing but remark 4', 'DIIR', '0000-00-00', 1),
(204, '100k', '2', 'nothing but remarks 5', 'DIIR', '0000-00-00', 1),
(205, '100k', '2/1', 'nothing but remarks 6', 'DIIR', '0000-00-00', 2),
(206, '100k', '2/2', 'nothing but remarks 7', 'DIIR', '0000-00-00', 2),
(208, '100k', '4', 'nothing but remark 9', 'DIIR', '0000-00-00', 2),
(209, '100k', '4/1', 'nothing but remarks 10', 'DIIR', '0000-00-00', 2),
(210, '100k', '1', 'nothing but remarks of TCRC 1', 'TCRC', '0000-00-00', 11111),
(211, '100k', '1/1', 'nothing but remarks of TCRC 2', 'TCRC', '0000-00-00', 3),
(212, '100k', '1/2', 'nothing but remarks of TCRC 3', 'TCRC', '0000-00-00', 3),
(213, '100k', '1/3', 'nothing but remarks of TCRC 4', 'TCRC', '0000-00-00', 3),
(214, '100k', '2', 'nothing but remarks of TCRC 5', 'TCRC', '0000-00-00', 100),
(225, '100k', '12', 'dfgdgs gsdg dfg sdgsdg dfgd', 'ABCD', '2019-02-27', 100),
(226, '100k', '13', 'asfa afa adfad asf asdfasdf dsf', 'ABCD', '2019-02-27', 102),
(228, '1005', '12/1', 'tsad saasdfa d sadfasd', 'CTA', '0000-00-00', 1),
(229, '1005', '12/2', 'asdfadfasdf sdfasdfasd asfasdf', 'CTA', '0000-00-00', 2),
(230, '1005', '12/3', 'asdafs dfasdfa sd', 'CTA', '0000-00-00', 3),
(231, '1005', '12/4', 'asdfasd fsdfasd ', 'CTA', '2019-05-12', 4),
(239, '100k', '12/1', 'this is tenzin remark', 'TCRC', '0000-00-00', 23),
(242, '100c', '123', 'tenzin is boy', 'tenzin', '2018-03-19', 23),
(273, '100k', '100', 'ahhahahhahahaha', 'XDA', '0000-00-00', 1),
(274, '100k', '13', 'sdfgsdf gsfgsdf gsfgsfdgsdfg sdfgsdf dfgdsfgsd fgs', 'XDA', '2019-03-16', 13),
(275, '100k', '14', 'dfgsd fgsfdsdfgsdfgsdf sdfgsdfg sdfgsfg sdfsdfg sdfgsd', 'XDA', '2019-03-16', 14),
(276, '100k', '25', 'sdfgds fgsdfgsdf sgdfgsdf gfgsdfgdsfgsdf gsdfg sdfgsd', 'XDA', '2019-03-16', 15),
(277, '100k', '56', 'dfgsd fgsdfgsdfgsdfg fgsdfgsdfgs dfgsdfgsdfg sdf', 'XDA', '2019-03-16', 16),
(278, '100q', '12', 'this is remarks of reference no 12', 'tsewang yougyal', '2019-03-19', 1),
(279, '100q', '13', 'this is remarks of reference no 13', 'tsewang yougyal', '2019-03-19', 2),
(280, '100q', '14', 'this is remarks of reference no 14', 'tsewang yougyal', '2019-03-19', 4),
(281, '100q', '15', 'this is remarks of reference no 15', 'tsewang yougyal', '2019-03-19', 6),
(282, '100q', '16', 'this is remarks of reference no 16', 'tsewang yougyal', '2019-03-19', 6),
(284, '100k', 'sdfgsdfg', 'im tsewang and its updating now', 'xda', '2019-03-25', 12),
(293, '100f', '12', 'nothing but alright', 'im good , but my tooth ache', '2019-09-05', 12),
(295, '100f', '34', 'nothing but alright', 'you look good', '2019-09-05', 13),
(296, '100f', '12', 'nothing but alright', 'i have stomach problem', '2019-09-05', 13),
(297, '100f', '12', 'nothing but alright', 'i have headache', '2019-09-05', 13),
(299, '100c', 'dfbsdfbsdbs', 'dbsdbsbvb', 'bsdfbs', '2019-09-10', 0),
(300, '100s', '1', 'nothing but remarks', 'department of financial', '2019-09-19', 12),
(301, '100s', '3', 'nothing but remarks', 'department of financial', '2019-09-19', 12),
(302, '100s', '4', 'nothing but remarks', 'department of financial', '2019-09-19', 12),
(303, '100s', '6', 'nothing but remarks', 'department of financial', '2019-09-19', 12),
(304, '100s', '8', 'nothing but remarks', 'department of financial', '2019-09-19', 12),
(305, 'Clash Of Clan', 'level 2', 'this cannon can only defend enemy approaching from the ground within of shooting range  ', 'ground defense', '2019-09-23', 0),
(306, 'Clash Of Clan', 'level 1', 'this cannon can only defend enemy approaching from the ground within of shooting range ', 'ground defense', '2019-09-23', 0),
(307, 'Clash Of Clan', 'level 5', 'this cannon can only defend enemy approaching from the ground within of shooting range ', 'ground defense', '2019-09-23', 0),
(308, 'Clash Of Clan', 'level 6', 'this cannon can only defend enemy approaching from the ground within of shooting range ', 'ground defense', '2019-09-23', 0),
(309, 'Clash Of Clan', 'level 3', 'this cannon can only defend enemy approaching from the ground within of shooting range ', 'ground defense', '2019-09-23', 0),
(310, 'Clash Of Clan', 'level 2', 'this cannon can only defend enemy approaching from the ground within of shooting range  ', 'ground defense', '2019-09-23', 0),
(311, 'Clash Of Clan', 'level 1', 'this cannon can only defend enemy approaching from the ground within of shooting range ', 'ground defense', '2019-09-23', 0),
(312, 'Clash Of Clan', 'level 5', 'this cannon can only defend enemy approaching from the ground within of shooting range ', 'ground defense', '2019-09-23', 0),
(313, 'Clash Of Clan', 'level 6', 'this cannon can only defend enemy approaching from the ground within of shooting range ', 'ground defense', '2019-09-23', 0),
(314, 'Clash Of Clan', 'level 3', 'this cannon can only defend enemy approaching from the ground within of shooting range ', 'ground defense', '2019-09-23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `file_info`
--

CREATE TABLE `file_info` (
  `file_no` varchar(20) NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `year` year(4) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=REDUNDANT;

--
-- Dumping data for table `file_info`
--

INSERT INTO `file_info` (`file_no`, `file_name`, `year`, `department`) VALUES
('1005', 'tsewang', 2019, 'TCRC'),
('100c', 'བདེ་སྲུང', 2019, 'བདེ་སྲུང'),
('100f', 'medical research report', 0000, 'delek hospital'),
('100k', 'བསོད་ནམས', 2019, 'བདེ་སྲུང'),
('100q', 'tsewang is tsewang', 2019, 'nak naka naku'),
('100s', 'བསོད་ནམས', 2012, 'བདེ་སྲུང'),
('Clash Of Clan', 'Defense ', 2016, 'cannon');

-- --------------------------------------------------------

--
-- Table structure for table `file_record`
--

CREATE TABLE `file_record` (
  `id` int(10) NOT NULL,
  `file_no` varchar(10) NOT NULL,
  `year` year(4) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `department` varchar(30) NOT NULL,
  `page_no` int(10) NOT NULL,
  `r_department` varchar(30) NOT NULL,
  `reference_no` varchar(20) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `mydate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `file_record`
--

INSERT INTO `file_record` (`id`, `file_no`, `year`, `file_name`, `department`, `page_no`, `r_department`, `reference_no`, `remark`, `mydate`) VALUES
(211, '100c', 2011, 'ཐདཔཐདཔཐདནཔ', 'ཏཐདནཏདཐན', 4, 'ཏཐདནཏཐདནཏཐདནཏཐདནཐཏདནཐདན', '2/1', 'དནཏཐདཏཐདནཏཐདནཏཐདན', '2019-02-01 10:12:52'),
(213, '100c', 2010, 'ཐདཔཐདཔཐདནཔ', 'བདེ་སྲུང', 4, 'ཐཐཐཐཐཐདནཔདནདནཔདནཔདནཔ', '2/1', 'ཐཐཐཐཐཐདནཔདནདནཔདནཔ', '2019-02-01 10:12:52'),
(214, '100a', 2011, 'བསོད་ནམས', 'བདེ་སྲུང', 5, 'ཐཐཐཐཐཐདནཔདནདནཔདནཔདནཔ', '1', 'weafsdfasdfsdfasdfasdf', '2019-02-01 10:13:26'),
(215, '100a', 2010, 'བསོད་ནམས', 'བདེ་སྲུང', 67, 'ཐཐཐཐཐཐདནཔདནདནཔདནཔདནཔ', '1', 'weafsdfasdfsdfasdfasdf', '2019-02-01 10:13:34'),
(226, '100c', 2010, 'ཐདཔཐདཔཐདནཔ', 'ཏཐདནཏདཐན', 5, 'ཐཐཐཐཐཐདནཔདནདནཔདནཔདནཔ', '6', 'ཐནཐདཏཐདནཏཐདནཏཐནཐཏདནཏཐདནཏནཏཐད', '2019-02-02 10:43:51'),
(227, '100c', 2010, 'ཐདཔཐདཔཐདནཔ', 'ཏཐདནཏདཐན', 5, 'ཐཐཐཐཐཐདནཔདནདནཔདནཔདནཔ', '6', 'ཐནཐདཏཐདནཏཐདནཏཐནཐཏདནཏཐདནཏནཏཐད', '2019-02-02 10:43:53'),
(228, '100b', 2018, 'sfsdfgsdfgsdfgsdf', 'sdfgsdfgsdgsdgsdgfsdfgsf', 5, 'ཏཐདནཏཐདནཏཐདནཏཐདནཐཏདནཐདན', '1', 'sdfgr5gwergwrgwerg erw4twer wertwert wertwertwertwe', '2019-02-13 04:14:34'),
(229, '100b', 2018, 'sfsdfgsdfgsdfgsdf', 'sdfgsdfgsdgsdgsdgfsdfgsf', 5, 'ཏཐདནཏཐདནཏཐདནཏཐདནཐཏདནཐདན', '1', 'sdfgr5gwergwrgwerg erw4twer wertwert wertwertwertwe', '2019-02-13 04:14:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `tag` tinyint(1) DEFAULT NULL,
  `img` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `gender`, `email`, `username`, `password`, `tag`, `img`) VALUES
(18, 'TSEWANG YOUGYAL', 'Male', 'tsewangyougyal35@gmail.com', 'tsewang yougyal', 'f4cf676496261e18f12cea039cdacbf5', 1, 'user/tsewang.jpg'),
(19, 'tashi delek', 'Male', 'tashidelek34@yahoo.com', 'tashi', '81dc9bdb52d04dc20036dbd8313ed055', 0, 'user/tashi.jpg'),
(20, 'tenzin dolma ', 'Female', 'dolma12@gmail.com', 'dolma', '07563a3fe3bbe7e3ba84431ad9d055af', 0, 'user/dolma.jpg'),
(21, 'Levi Acherman', 'Male', 'levi23@gmail.com', 'levi', '2b9f07ef4d5678f659fbf019f6a7240e', 0, 'user/levi.jpg'),
(22, 'Metok Lhamo', 'Female', 'metok@gmail.com', 'metok', '81dc9bdb52d04dc20036dbd8313ed055', 0, 'user/metok.jpg'),
(23, 'Lhamo', 'Female', 'lhamo11@gmail.com', 'lhamo', '81dc9bdb52d04dc20036dbd8313ed055', 0, 'user/lhamo.jpg'),
(24, 'tenzin dechen', 'Female', 'tenzindechen12@gmail.com', 'dechen', '81dc9bdb52d04dc20036dbd8313ed055', 0, 'user/dechen.jpg'),
(25, 'tenzin pema', 'Male', 'ten-pema@gmail.com', 'pema', '81dc9bdb52d04dc20036dbd8313ed055', 0, 'user/pema.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app`
--
ALTER TABLE `app`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_dt`
--
ALTER TABLE `file_dt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `file_no` (`file_no`);

--
-- Indexes for table `file_info`
--
ALTER TABLE `file_info`
  ADD PRIMARY KEY (`file_no`);

--
-- Indexes for table `file_record`
--
ALTER TABLE `file_record`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file_dt`
--
ALTER TABLE `file_dt`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=315;

--
-- AUTO_INCREMENT for table `file_record`
--
ALTER TABLE `file_record`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `file_dt`
--
ALTER TABLE `file_dt`
  ADD CONSTRAINT `file_dt_ibfk_1` FOREIGN KEY (`file_no`) REFERENCES `file_info` (`file_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
