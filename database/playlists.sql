-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 11, 2019 at 12:08 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kukahub`
--

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `playlistId` int(11) NOT NULL,
  `name` varchar(216) NOT NULL,
  `playlist_img` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playlists`
--

INSERT INTO `playlists` (`playlistId`, `name`, `playlist_img`) VALUES
(1, 'Most Popular Music', 'https://www.dropbox.com/s/uibdwdewz1rwzw6/most_popular_music.png?raw=1'),
(2, 'Naruto Shippuden Openings', 'https://www.dropbox.com/s/7dehucy888syt3b/naruto_shippuden_playlist.png?raw=1'),
(3, 'Emotional Music', 'https://www.dropbox.com/s/ud1v1gktfifj9qp/emotional_music.png?raw=1'),
(4, 'Kimi no Suizou wo Tabetai ', 'https://www.dropbox.com/s/dkb7j3o6la6suie/kimi_no_suizou_wo_tabetai_playlist.png?raw=1'),
(5, 'Shigatsu wa Kimi no Uso', 'https://www.dropbox.com/s/x8b4slbxxfk4du9/shigatsu_wa_kimi_no_uso_playlist.png?raw=1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`playlistId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `playlistId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
