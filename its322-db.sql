-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2017 at 06:34 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `its322-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `activity_id` int(11) NOT NULL,
  `activity_name` varchar(255) NOT NULL,
  `activity_text` text NOT NULL,
  `activity_imgs` text NOT NULL,
  `activity_1day` datetime NOT NULL,
  `activity_start` date NOT NULL,
  `activity_end` date NOT NULL,
  `activity_locat` varchar(255) NOT NULL,
  `activity_ptime` datetime NOT NULL,
  `activity_type` int(11) NOT NULL DEFAULT '1',
  `visitor_act` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`activity_id`, `activity_name`, `activity_text`, `activity_imgs`, `activity_1day`, `activity_start`, `activity_end`, `activity_locat`, `activity_ptime`, `activity_type`, `visitor_act`) VALUES
(1, 'Vestibulum non sem a massa', 'Nunc in nunc sit amet dolor dictum blandit ut a ipsum. Pellentesque venenatis metus placerat nulla iaculis gravida. Phasellus nec auctor risus. Nullam arcu arcu, malesuada vitae lobortis ac, lacinia vitae metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas quam sapien, euismod sit amet dui sed, mollis fringilla massa. \r\nMauris ullamcorper quam vel ligula finibus dignissim. Donec in gravida massa. Nulla eget ornare ante. Praesent arcu elit, bibendum in nunc at, sollicitudin posuere metus. Aenean euismod massa lobortis, vestibulum nulla eget, efficitur velit. Nullam finibus vestibulum aliquet. Proin ultrices a risus id euismod. ', 'figure1.svg?#figure2.jpg?#figure3.jpg', '2017-12-05 18:00:00', '2017-12-04', '2017-12-06', 'Mauris ullamcorper', '2017-12-04 09:12:39', 3, 75),
(2, 'Mauris tempus elit non', 'Nunc in nunc sit amet dolor dictum blandit ut a ipsum. Pellentesque venenatis metus placerat nulla iaculis gravida. Phasellus nec auctor risus. Nullam arcu arcu, malesuada vitae lobortis ac, lacinia vitae metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas quam sapien, euismod sit amet dui sed, mollis fringilla massa. \r\nMauris ullamcorper quam vel ligula finibus dignissim. Donec in gravida massa. Nulla eget ornare ante. Praesent arcu elit, bibendum in nunc at, sollicitudin posuere metus. Aenean euismod massa lobortis, vestibulum nulla eget, efficitur velit. Nullam finibus vestibulum aliquet. Proin ultrices a risus id euismod. ', 'figure2.jpg?#figure3.jpg', '2017-12-06 08:30:00', '0000-00-00', '0000-00-00', 'Donec in gravida', '2017-12-05 11:35:11', 1, 9),
(4, 'Nunc in nunc sit', 'Nullam imperdiet tristique cursus. Ut convallis rutrum nunc sit amet sollicitudin. Nam et leo vulputate, ullamcorper diam sed, posuere eros. Praesent bibendum, felis ac dignissim sollicitudin, dolor metus finibus mi, nec finibus erat elit in metus. Etiam sed pharetra lacus. In non bibendum elit, sollicitudin aliquam ex. Donec maximus dui eros, quis dapibus urna lacinia ut. Aliquam pulvinar quam lacus, a tristique diam lobortis vehicula. Donec vitae nulla lectus. Mauris facilisis fermentum risus, quis consectetur nisi varius ut. Pellentesque aliquet aliquam arcu, et pulvinar ante rhoncus a. Quisque congue metus a augue volutpat tincidunt eu et orci. Donec tristique at erat ac rhoncus. In sed bibendum lectus. Mauris placerat rhoncus lorem non tempus. ', 'figure3.jpg?#figure2.jpg', '2017-12-10 12:00:00', '0000-00-00', '0000-00-00', 'Aenean euismod', '2017-12-08 18:20:52', 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_pw`) VALUES
(1, 'karanpoj@gmail.com', 'cGFzc3dvcmQ= ');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `article_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `article_name` varchar(255) NOT NULL,
  `art_author` varchar(255) NOT NULL,
  `article_time` datetime NOT NULL,
  `article_text` text NOT NULL,
  `article_imgs` text NOT NULL,
  `visitor_art` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`article_id`, `tag_id`, `article_name`, `art_author`, `article_time`, `article_text`, `article_imgs`, `visitor_art`) VALUES
(1, 1, 'What Is Global Warming?', 'National GeoGraphic', '2017-12-03 10:16:18', 'What will we do to slow this warming? How will we cope with the changes we\'ve already set into motion? While we struggle to figure it all out, the face of the Earth as we know it-coasts, forests, farms and snow-capped mountains-hangs in the balance.\r\nFirst, sunlight shines onto the Earth\'s surface, where it is absorbed and then radiates back into the atmosphere as heat. In the atmosphere, \"greenhouse\" gases trap some of this heat, and the rest escapes into space. The more greenhouse gases are in the atmosphere, the more heat gets trapped.', 'img_lights.jpg?#img_mountains.jpg', 232),
(2, 1, 'What Is Global Warming? 2', 'National GeoGraphic', '2017-12-04 10:40:09', 'Glaciers are melting, sea levels are rising, cloud forests are dying, and wildlife is scrambling to keep pace. It\'s becoming clear that humans have caused most of the past century\'s warming by releasing heat-trapping gases as we power our modern lives. Called greenhouse gases, their levels are higher now than in the last 650,000 years.\r\nWe call the result global warming, but it is causing a set of changes to the Earth\'s climate, or long-term weather patterns, that varies from place to place. As the Earth spins each day, the new heat swirls with it, picking up moisture over the oceans, rising here, settling there. It\'s changing the rhythms of climate that all living things have come to rely upon.\r\nWhat will we do to slow this warming? How will we cope with the changes we\'ve already set into motion? While we struggle to figure it all out, the face of the Earth as we know it—coasts, forests, farms and snow-capped mountains—hangs in the balance.\r\nGreenhouse effect\r\nThe \"greenhouse effect\" is the warming that happens when certain gases in Earth\'s atmosphere trap heat. These gases let in light but keep heat from escaping, like the glass walls of a greenhouse.\r\nFirst, sunlight shines onto the Earth\'s surface, where it is absorbed and then radiates back into the atmosphere as heat. In the atmosphere, “greenhouse” gases trap some of this heat, and the rest escapes into space. The more greenhouse gases are in the atmosphere, the more heat gets trapped.', 'img_mountains.jpg?#img_lights.jpg', 0),
(3, 1, 'What Is Global Warming? 3', 'National GeoGraphic', '2017-12-04 11:16:18', 'Glaciers are melting, sea levels are rising, cloud forests are dying, and wildlife is scrambling to keep pace. It\'s becoming clear that humans have caused most of the past century\'s warming by releasing heat-trapping gases as we power our modern lives. Called greenhouse gases, their levels are higher now than in the last 650,000 years.\r\nWe call the result global warming, but it is causing a set of changes to the Earth\'s climate, or long-term weather patterns, that varies from place to place. As the Earth spins each day, the new heat swirls with it, picking up moisture over the oceans, rising here, settling there. It\'s changing the rhythms of climate that all living things have come to rely upon.\r\nWhat will we do to slow this warming? How will we cope with the changes we\'ve already set into motion? While we struggle to figure it all out, the face of the Earth as we know it—coasts, forests, farms and snow-capped mountains—hangs in the balance.\r\nGreenhouse effect\r\nThe \"greenhouse effect\" is the warming that happens when certain gases in Earth\'s atmosphere trap heat. These gases let in light but keep heat from escaping, like the glass walls of a greenhouse.\r\nFirst, sunlight shines onto the Earth\'s surface, where it is absorbed and then radiates back into the atmosphere as heat. In the atmosphere, “greenhouse” gases trap some of this heat, and the rest escapes into space. The more greenhouse gases are in the atmosphere, the more heat gets trapped.', 'img_lights.jpg?#img_mountains.jpg', 9),
(4, 1, 'What Is Global Warming? 4', 'National GeoGraphic', '2017-12-04 11:46:21', 'Glaciers are melting, sea levels are rising, cloud forests are dying, and wildlife is scrambling to keep pace. It\'s becoming clear that humans have caused most of the past century\'s warming by releasing heat-trapping gases as we power our modern lives. Called greenhouse gases, their levels are higher now than in the last 650,000 years.\r\nWe call the result global warming, but it is causing a set of changes to the Earth\'s climate, or long-term weather patterns, that varies from place to place. As the Earth spins each day, the new heat swirls with it, picking up moisture over the oceans, rising here, settling there. It\'s changing the rhythms of climate that all living things have come to rely upon.\r\nWhat will we do to slow this warming? How will we cope with the changes we\'ve already set into motion? While we struggle to figure it all out, the face of the Earth as we know it—coasts, forests, farms and snow-capped mountains—hangs in the balance.\r\nGreenhouse effect\r\nThe \"greenhouse effect\" is the warming that happens when certain gases in Earth\'s atmosphere trap heat. These gases let in light but keep heat from escaping, like the glass walls of a greenhouse.\r\nFirst, sunlight shines onto the Earth\'s surface, where it is absorbed and then radiates back into the atmosphere as heat. In the atmosphere, “greenhouse” gases trap some of this heat, and the rest escapes into space. The more greenhouse gases are in the atmosphere, the more heat gets trapped.', 'img_mountains.jpg?#img_lights.jpg', 1),
(5, 1, 'What Is Global Warming? 5', 'National GeoGraphic', '2017-12-04 12:05:10', 'Glaciers are melting, sea levels are rising, cloud forests are dying, and wildlife is scrambling to keep pace. It\'s becoming clear that humans have caused most of the past century\'s warming by releasing heat-trapping gases as we power our modern lives. Called greenhouse gases, their levels are higher now than in the last 650,000 years.\r\nWe call the result global warming, but it is causing a set of changes to the Earth\'s climate, or long-term weather patterns, that varies from place to place. As the Earth spins each day, the new heat swirls with it, picking up moisture over the oceans, rising here, settling there. It\'s changing the rhythms of climate that all living things have come to rely upon.\r\nWhat will we do to slow this warming? How will we cope with the changes we\'ve already set into motion? While we struggle to figure it all out, the face of the Earth as we know it—coasts, forests, farms and snow-capped mountains—hangs in the balance.\r\nGreenhouse effect\r\nThe \"greenhouse effect\" is the warming that happens when certain gases in Earth\'s atmosphere trap heat. These gases let in light but keep heat from escaping, like the glass walls of a greenhouse.\r\nFirst, sunlight shines onto the Earth\'s surface, where it is absorbed and then radiates back into the atmosphere as heat. In the atmosphere, “greenhouse” gases trap some of this heat, and the rest escapes into space. The more greenhouse gases are in the atmosphere, the more heat gets trapped.', 'img_lights.jpg?#img_mountains.jpg', 1),
(6, 1, 'What Is Global Warming? 6', 'National GeoGraphic', '2017-12-04 12:31:17', 'Glaciers are melting, sea levels are rising, cloud forests are dying, and wildlife is scrambling to keep pace. It\'s becoming clear that humans have caused most of the past century\'s warming by releasing heat-trapping gases as we power our modern lives. Called greenhouse gases, their levels are higher now than in the last 650,000 years.\r\nWe call the result global warming, but it is causing a set of changes to the Earth\'s climate, or long-term weather patterns, that varies from place to place. As the Earth spins each day, the new heat swirls with it, picking up moisture over the oceans, rising here, settling there. It\'s changing the rhythms of climate that all living things have come to rely upon.\r\nWhat will we do to slow this warming? How will we cope with the changes we\'ve already set into motion? While we struggle to figure it all out, the face of the Earth as we know it—coasts, forests, farms and snow-capped mountains—hangs in the balance.\r\nGreenhouse effect\r\nThe \"greenhouse effect\" is the warming that happens when certain gases in Earth\'s atmosphere trap heat. These gases let in light but keep heat from escaping, like the glass walls of a greenhouse.\r\nFirst, sunlight shines onto the Earth\'s surface, where it is absorbed and then radiates back into the atmosphere as heat. In the atmosphere, “greenhouse” gases trap some of this heat, and the rest escapes into space. The more greenhouse gases are in the atmosphere, the more heat gets trapped.', 'img_mountains.jpg?#img_lights.jpg', 3),
(7, 1, 'What Is Global Warming? 7', 'National GeoGraphic', '2017-12-04 13:50:27', 'Glaciers are melting, sea levels are rising, cloud forests are dying, and wildlife is scrambling to keep pace. It\'s becoming clear that humans have caused most of the past century\'s warming by releasing heat-trapping gases as we power our modern lives. Called greenhouse gases, their levels are higher now than in the last 650,000 years.\r\nWe call the result global warming, but it is causing a set of changes to the Earth\'s climate, or long-term weather patterns, that varies from place to place. As the Earth spins each day, the new heat swirls with it, picking up moisture over the oceans, rising here, settling there. It\'s changing the rhythms of climate that all living things have come to rely upon.\r\nWhat will we do to slow this warming? How will we cope with the changes we\'ve already set into motion? While we struggle to figure it all out, the face of the Earth as we know it—coasts, forests, farms and snow-capped mountains—hangs in the balance.\r\nGreenhouse effect\r\nThe \"greenhouse effect\" is the warming that happens when certain gases in Earth\'s atmosphere trap heat. These gases let in light but keep heat from escaping, like the glass walls of a greenhouse.\r\nFirst, sunlight shines onto the Earth\'s surface, where it is absorbed and then radiates back into the atmosphere as heat. In the atmosphere, “greenhouse” gases trap some of this heat, and the rest escapes into space. The more greenhouse gases are in the atmosphere, the more heat gets trapped.', 'img_lights.jpg?#img_mountains.jpg', 4),
(8, 1, 'What Is Global Warming? 8', 'National GeoGraphic', '2017-12-04 14:09:22', 'Glaciers are melting, sea levels are rising, cloud forests are dying, and wildlife is scrambling to keep pace. It\'s becoming clear that humans have caused most of the past century\'s warming by releasing heat-trapping gases as we power our modern lives. Called greenhouse gases, their levels are higher now than in the last 650,000 years.\r\nWe call the result global warming, but it is causing a set of changes to the Earth\'s climate, or long-term weather patterns, that varies from place to place. As the Earth spins each day, the new heat swirls with it, picking up moisture over the oceans, rising here, settling there. It\'s changing the rhythms of climate that all living things have come to rely upon.\r\nWhat will we do to slow this warming? How will we cope with the changes we\'ve already set into motion? While we struggle to figure it all out, the face of the Earth as we know it—coasts, forests, farms and snow-capped mountains—hangs in the balance.\r\nGreenhouse effect\r\nThe \"greenhouse effect\" is the warming that happens when certain gases in Earth\'s atmosphere trap heat. These gases let in light but keep heat from escaping, like the glass walls of a greenhouse.\r\nFirst, sunlight shines onto the Earth\'s surface, where it is absorbed and then radiates back into the atmosphere as heat. In the atmosphere, “greenhouse” gases trap some of this heat, and the rest escapes into space. The more greenhouse gases are in the atmosphere, the more heat gets trapped.', 'img_mountains.jpg?#img_lights.jpg', 6),
(10, 1, 'What Is Global Warming? 9', 'National GeoGraphic', '2017-12-04 14:49:23', 'Glaciers are melting, sea levels are rising, cloud forests are dying, and wildlife is scrambling to keep pace. It\'s becoming clear that humans have caused most of the past century\'s warming by releasing heat-trapping gases as we power our modern lives. Called greenhouse gases, their levels are higher now than in the last 650,000 years.\r\nWe call the result global warming, but it is causing a set of changes to the Earth\'s climate, or long-term weather patterns, that varies from place to place. As the Earth spins each day, the new heat swirls with it, picking up moisture over the oceans, rising here, settling there. It\'s changing the rhythms of climate that all living things have come to rely upon.\r\nWhat will we do to slow this warming? How will we cope with the changes we\'ve already set into motion? While we struggle to figure it all out, the face of the Earth as we know it—coasts, forests, farms and snow-capped mountains—hangs in the balance.\r\nGreenhouse effect\r\nThe \"greenhouse effect\" is the warming that happens when certain gases in Earth\'s atmosphere trap heat. These gases let in light but keep heat from escaping, like the glass walls of a greenhouse.\r\nFirst, sunlight shines onto the Earth\'s surface, where it is absorbed and then radiates back into the atmosphere as heat. In the atmosphere, “greenhouse” gases trap some of this heat, and the rest escapes into space. The more greenhouse gases are in the atmosphere, the more heat gets trapped.', 'img_mountains.jpg?#img_lights.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `com_id` int(11) NOT NULL,
  `com_on` varchar(255) NOT NULL,
  `post_id` int(11) NOT NULL,
  `com_name` varchar(255) NOT NULL,
  `com_usertype` varchar(11) NOT NULL,
  `com_txt` text NOT NULL,
  `com_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`com_id`, `com_on`, `post_id`, `com_name`, `com_usertype`, `com_txt`, `com_time`) VALUES
(1, 'article', 1, 'user 1', 'user', 'The more greenhouse gases are in the atmosphere, the more heat gets trapped.', '2017-12-04 19:21:47'),
(2, 'article', 1, 'User 2', 'user', 'What will we do to slow this warming? How will we cope with the changes we\'ve already set into motion? While we struggle to figure it all out, the face of the Earth as we know it-coasts, forests, farms and snow-capped mountains-hangs in the balance.', '2017-12-04 19:34:20'),
(4, 'activity', 1, 'karanpoj', 'user', 'test comment activity 1\r\n', '2017-12-08 16:12:46'),
(5, 'activity', 1, 'Admin', 'admin', 'admin reply comment 1', '2017-12-10 16:00:36'),
(6, 'article', 1, 'Admin', 'admin', 'admin new reply', '2017-12-10 16:40:26'),
(7, 'activity', 1, 'Admin', 'admin', 'admin', '2017-12-10 17:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE `conversation` (
  `con_id` int(11) NOT NULL,
  `con_name` varchar(255) NOT NULL,
  `con_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conversation`
--

INSERT INTO `conversation` (`con_id`, `con_name`, `con_email`) VALUES
(1, 'karanpoj', 'karanpoj@gmail.com'),
(2, 'dsafadsfsdaf', 'adsfadsf');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `mes_id` int(11) NOT NULL,
  `con_id` int(11) NOT NULL,
  `mes_from` varchar(255) NOT NULL,
  `mes_txt` text NOT NULL,
  `mes_datetime` datetime NOT NULL,
  `mes_check` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`mes_id`, `con_id`, `mes_from`, `mes_txt`, `mes_datetime`, `mes_check`) VALUES
(1, 1, 'user', 'user message 1', '2017-12-04 19:08:44', 0),
(2, 1, 'user', 'user message 2', '2017-12-04 19:08:54', 0),
(3, 1, 'admin', 'admin reply1', '2017-12-04 19:10:23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL,
  `tag_name` varchar(255) NOT NULL,
  `visitor_count` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_id`, `tag_name`, `visitor_count`) VALUES
(1, 'tag1', 128);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`mes_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `mes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
