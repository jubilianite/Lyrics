-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2021 at 04:37 PM
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
-- Database: `hcc`
--

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` int(1) NOT NULL,
  `version` varchar(100) NOT NULL,
  `dbupdated` varchar(100) NOT NULL,
  `totalsongs` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `version`, `dbupdated`, `totalsongs`) VALUES
(1, '3.0.0', '2021-12-08 23:37:13', 3);

-- --------------------------------------------------------

--
-- Table structure for table `lyrics`
--

CREATE TABLE `lyrics` (
  `id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `lyrics` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lyrics`
--

INSERT INTO `lyrics` (`id`, `title`, `lyrics`) VALUES
(0, ' 10,000 REASONS\r\n', '<pre>\r\nBless the Lord O my soul\nO my soul, worship His Holy name\r\n\r\nSing like never before, O my soul\nI’ll worship Your Holy name\r\n\r\nThe sun comes up\nIt’s a new day dawning\r\n\r\nIt’s time to sing Your song again\r\n\r\nWhatever may pass\nAnd whatever lies before me\r\n\r\nLet me be singing\nWhen the evening comes\r\n\r\nYou’re rich in love\nAnd You’re slow to anger\r\n\r\nYour name is great\nAnd Your heart is kind\r\n\r\nFor all Your goodness\nI will keep on singing\r\n\r\nTen thousand reasons\nFor my heart to find\r\n\r\nAnd on that day \nWhen my strength is failing\r\n\r\nThe end draws near\nAnd my time has come\r\n\r\nStill my soul will\nSing Your praise unending\r\n\r\nTen thousand years\nAnd then forevermore\r\n\r\n</pre>'),
(1, ' A Great Awakening (Combined)\r\n', '<pre>\r\n主倾倒你圣灵\nLord, pour out Your Spirit \r\n\r\n在你全地的子民\nOn all the people of the earth \r\n\r\n让你的儿女们\n Let Your sons and daughters \r\n\r\n释放你启示语言 \nSpeak Your words of prophesy \r\n\r\n赐下异梦异象\nSend us dreams and visions \r\n\r\n透露你心中的秘密\nReveal the secrets of Your heart \r\n\r\n让我名的信心兴起\nLord, our faith is rising\r\n\r\n让全穹苍宣扬你日子来临\nLet all heaven sound The coming of Your day \r\n\r\n大苏醒就快 降临\nThere\'s gonna be a great awakening \r\n\r\n大复兴就快要 降临在这地方\nThere\'s gonna be a great revival in our land \r\n\r\n大苏醒就快 降临\nThere\'s gonna be a great awakening \r\n\r\n无论何人呼求主耶稣 他必得救\nAnd everyone who calls on Jesus, they will be saved \r\n\r\n主倾倒你圣灵\nLord, pour out Your Spirit \r\n\r\n浇灌在全民全地\nOn all the nations of the world \r\n\r\n让你荣耀彰显\nLet them see Your glory \r\n\r\n让万膝都来跪拜\nLet them fall in reverent awe \r\n\r\n显出你的大能\nShow Your mighty power \r\n\r\n摇振天空与大地\nShake the heavens and the earth \r\n\r\n主世界在期待\nLord, the world is waiting\r\n\r\n让万物观看你来临的日子\nLet creation see the coming of Your day \r\n\r\n</pre>'),
(2, ' A Heart After You (Combined)\r\n', '<pre>\r\n Create in me a new heart\n求赐给我清洁的心\r\n\r\nOne that follows You\n紧紧跟随你\r\n\r\n Place in me a deep desire\n 我渴慕更深爱你\r\n\r\nTo know You as I\'m known\n 因你已先爱我\r\n\r\nSet my feet in Your ways\n跟随你的脚步\r\n\r\nTo live worthy of Your call\n活出你对我呼召\r\n\r\nDraw me near to You, Lord\n每一天带领我\r\n\r\nEvery single day\n更多亲近你\r\n\r\nI just want to be more like You\n我愿这一生更像你\r\n\r\nWalk with You beside me\n求与我同行 \r\n\r\nLord, won\'t You be my guide\n哦主，引导我生命\r\n\r\nPlace Your heart inside my soul\n赐给我甜美的灵\r\n\r\n A heart that\'s ever true\n能合乎你心意\r\n\r\nOne that\'s after You\n一生跟随你\r\n\r\nAll I desire, a heart after You\n我唯一渴慕 一生跟随你</pre>');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
