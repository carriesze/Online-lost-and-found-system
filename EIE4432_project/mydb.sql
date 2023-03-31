-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2022 年 12 月 06 日 16:55
-- 伺服器版本： 10.4.21-MariaDB
-- PHP 版本： 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `mydb`
--
CREATE DATABASE IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `mydb`;

-- --------------------------------------------------------

--
-- 資料表結構 `notice`
--

DROP TABLE IF EXISTS `notice`;
CREATE TABLE `notice` (
  `noticeNo` int(11) NOT NULL,
  `type` varchar(45) NOT NULL,
  `date` date NOT NULL,
  `venue` varchar(45) NOT NULL,
  `contact` varchar(45) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `notice`
--

INSERT INTO `notice` (`noticeNo`, `type`, `date`, `venue`, `contact`, `description`, `image`) VALUES
(1, 'found', '2022-10-30', 'Canteen', '98761234', 'A water bottle is found in canteen.', 'waterbottle.jpg'),
(2, 'lost', '2022-11-04', 'Block Z', '61234567', 'I lost my ring.', 'ring.jpg'),
(3, 'found', '2022-11-05', 'Room A105, 1/F, Block A', '61234567', 'An umbrella is found.', 'umbrella.jpg'),
(4, 'lost', '2022-11-07', 'Block Y', '72345678', 'I lost my Super Mario keychain.', 'keychain.jpg'),
(5, 'lost', '2022-11-09', 'Block U', '72345678', 'Has anyone seen this frog plush? ', 'frog.jpg'),
(6, 'found', '2022-11-09', 'Canteen', '72345678', 'I found a sunglasses.', 'sunglasses.jpg'),
(7, 'found', '2022-11-11', 'Room 201, 2/F, Block Z', '68765432', 'I found the key with the purple plastic keychain.', 'key.jpg'),
(8, 'found', '2022-11-11', 'Room 201, 2/F, Block Z', '68765432', 'A watch is found.', 'watch.jpg'),
(9, 'found', '2022-11-12', 'Room X502, 5/F, Block X', '68765432', 'A black long wallet is found.', 'wallet.jpg'),
(10, 'found', '2022-11-13', 'Room A303, 3/F, Block A', '68765432', 'A black long teddy plush is found.', 'teddy.jpg'),
(11, 'lost', '2022-11-15', 'Block C', '91234567', 'I lost my panda plush!', 'panda.jpg'),
(12, 'lost', '2022-11-15', 'Block C', '91234567', 'I lost my cardholder. It is brown in colour.', 'cardholder.jpg'),
(13, 'lost', '2022-11-18', 'Block V', '91234567', 'I lost my AirPods.', 'airpods.jpg'),
(14, 'lost', '2022-11-21', 'Block V', '98761234', 'I lost this ornaments!', 'ornaments.jpg'),
(15, 'found', '2022-11-25', 'Room A303, 3/F, Block A', '91234567', 'A bracelet is found.', 'bracelet.jpg'),
(16, 'lost', '2022-12-06', 'Canteen', '61234567', 'I lost my handbag. It is pink in colour.', 'handbag.jpg'),
(17, 'found', '2022-12-06', 'Room A303, 3/F, Block A', '61234567', 'A dinosaur plush is found.', 'dinosaur.jpg'),
(18, 'lost', '2022-12-06', 'Room A303, 3/F, Block A', '56156199', 'I lost my glasses.', 'glasses.jpg'),
(19, 'found', '2022-12-06', 'Room 201, 2/F, Block Z', '56156199', 'I found a bunny.', 'bunny.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `noticeUser`
--

DROP TABLE IF EXISTS `noticeUser`;
CREATE TABLE `noticeUser` (
  `noticeNo` int(11) NOT NULL,
  `createdBy` varchar(45) NOT NULL,
  `respondedBy` varchar(45) DEFAULT NULL,
  `respondMsg` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `noticeUser`
--

INSERT INTO `noticeUser` (`noticeNo`, `createdBy`, `respondedBy`, `respondMsg`) VALUES
(1, 'Chiu0601', 'wong123', 'It is my water bottle. Thanks a lot!'),
(2, 'Wong123', 'liuu2004', 'I just found it.'),
(3, 'Wong123', NULL, NULL),
(4, 'leeeee58', NULL, NULL),
(5, 'leeeee58', NULL, NULL),
(6, 'leeeee58', 'wong123', 'This is my sunglasses. Thanks a lot!'),
(7, 'liuu2004', NULL, NULL),
(8, 'liuu2004', NULL, NULL),
(9, 'liuu2004', NULL, NULL),
(10, 'liuu2004', 'carrie114', 'This is my teddy. Thank you!'),
(11, 'chan567', 'carrie114', 'I found this panda!'),
(12, 'chan567', 'wong123', 'I just found it.'),
(13, 'chan567', NULL, NULL),
(14, 'Chiu0601', NULL, NULL),
(15, 'Chiu0601', NULL, NULL),
(16, 'wong123', NULL, NULL),
(17, 'wong123', NULL, NULL),
(18, 'carrie114', NULL, NULL),
(19, 'carrie114', NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `userID` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `nickname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `profileImage` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `birthday` date NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`userID`, `password`, `nickname`, `email`, `profileImage`, `gender`, `birthday`, `admin`) VALUES
('admin', 'adminpass', 'admin', 'admin@email.com', 'admin.png', 'Female', '1999-01-01', 1),
('carrie114', '87654321', 'Kayi', 'Kayi114@email.com', 'profile06.png', 'Female', '2002-01-14', 0),
('chan567', '18765432', 'Chan', 'chanchan@email.com', 'profile04.png', 'Male', '1988-08-07', 0),
('Chiu0601', '43218765', 'Chiu', 'chiu0601@email.com', 'profile01.png', 'Female', '2000-01-06', 0),
('leeeee58', '87654321', 'Lee', 'leeeeeeee@email.com', 'profile03.png', 'Female', '1977-05-08', 0),
('liuu2004', '56781234', 'Liu', 'liu040508@email.com', 'profile02.png', 'Male', '2004-05-08', 0),
('wong123', '87654321', 'Robin', 'robin0203@email.com', 'profile05.png', 'Other', '1966-02-03', 0);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`noticeNo`);

--
-- 資料表索引 `noticeUser`
--
ALTER TABLE `noticeUser`
  ADD PRIMARY KEY (`noticeNo`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `notice`
--
ALTER TABLE `notice`
  MODIFY `noticeNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
