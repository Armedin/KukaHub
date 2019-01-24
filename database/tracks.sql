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
-- Table structure for table `tracks`
--

CREATE TABLE `tracks` (
  `trackId` int(11) NOT NULL,
  `music_name` varchar(512) CHARACTER SET utf8 NOT NULL,
  `jap_name` varchar(512) CHARACTER SET utf8 NOT NULL,
  `img` varchar(512) CHARACTER SET utf8 NOT NULL,
  `music_link` varchar(512) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracks`
--

INSERT INTO `tracks` (`trackId`, `music_name`, `jap_name`, `img`, `music_link`) VALUES
(1, 'Black Clover Opening 3', 'Black Rover', 'https://www.dropbox.com/s/uqpfigb1q0izjcj/black_clover.png?raw=1', 'https://www.dropbox.com/s/qrcxop9gg1k3qq5/Black%20Clover%20Opening%203.mp3?raw=1'),
(2, 'Overlord Opening 3', 'Myth & Roid - Voracity', 'https://www.dropbox.com/s/vc8hjn1u6g4dld9/overlord_season3.png?raw=1', 'https://www.dropbox.com/s/42q6rqtfsbx4oo2/Overlord%20Opening%203.mp3?raw=1'),
(3, 'Boku No Hero Op 3', 'Sora ni Utaeba', 'https://www.dropbox.com/s/jj7tbyco9i2q4j3/boku_no_hero_academia.png?raw=1', 'https://www.dropbox.com/s/ltn8bu3ur7pjcgj/Boku%20no%20Hero%20Academia%20Season%202%20Opening%202.mp3?raw=1'),
(4, 'Charlotte Ending 1', '灼け落ちない翼', 'https://www.dropbox.com/s/z61ni6w9af89vqx/charlotte.png?raw=1', 'https://www.dropbox.com/s/821b8wbcfldii7o/Charlotte%20Ending.mp3?raw=1'),
(5, 'Kyoukai No Kanata Ending 1', '境界の彼方 ED', 'https://www.dropbox.com/s/n28xq62xjqo0ycd/kyoukai_no_kanata.png?raw=1', 'https://www.dropbox.com/s/i8kcl54wxmactoo/Kyoukai%20no%20Kanata%20Ending.mp3?raw=1'),
(6, 'Code Geass Opening 1', 'コードギアスOP1', 'https://www.dropbox.com/s/m4idojtel70q9eh/code_geass.png?raw=1', 'https://www.dropbox.com/s/p7k6wlalc0xl63r/Code%20Geass%20Opening%201.mp3?raw=1'),
(7, 'Shigatsu wa Kimi no Uso Op 1', '光るなら Goose House', 'https://www.dropbox.com/s/tmw87zii6dq7pj0/shigatsu_wa_kimi_no_uso_op1.png?raw=1', 'https://www.dropbox.com/s/p0gaw45qi86jzag/Shigatsu%20wa%20Kimi%20no%20Uso%20Opening%201.mp3?raw=1'),
(8, 'Shigatsu wa Kimi no Uso Op 2', '七色シンフォニー', 'https://www.dropbox.com/s/f9pbjyzyrx0qa71/shigatsu_wa_kimi_no_uso_op2.png?raw=1', 'https://www.dropbox.com/s/5f3cygwot731xr5/Shigatsu%20wa%20Kimi%20no%20Uso%20Opening%202.mp3?raw=1'),
(9, 'Naruto Opening 3', 'Kanashimi Wo Yasashisa Ni', 'https://www.dropbox.com/s/pwhiknu1hy8sq0y/naruto_op3.png?raw=1', 'https://www.dropbox.com/s/5x75hn7hcceqo07/Naruto%20Opening%203.mp3?raw=1'),
(10, 'Naruto Shippuden Opening 3', 'Blue Bird', 'https://www.dropbox.com/s/h8r4du24v8dyy68/naruto_shippuden_op3.png?raw=1', 'https://www.dropbox.com/s/rxg97q5crzad8nu/Naruto%20Shippuden%20Opening%203.mp3?raw=1'),
(11, 'Naruto Shippuden Opening 16', 'Silhouette', 'https://www.dropbox.com/s/cqlaaeb075c01s3/naruto_shippuden_op16.png?raw=1', 'https://www.dropbox.com/s/4xnuk52vh50dfmb/Naruto%20Shippuden%20Opening%2016.mp3?raw=1'),
(12, 'Naruto Shippuden Opening 17', 'Kaze wind Yamazaru', 'https://www.dropbox.com/s/teuj1914iqwpnax/naruto_shippuden_op17.png?raw=1', 'https://www.dropbox.com/s/09dc7vmb5suolh3/Naruto%20Shippuden%20Opening%2017.mp3?raw=1'),
(13, 'Kyoukai no Kanata Opening 1', '境界の彼方', 'https://www.dropbox.com/s/hem9zn465i4tb9f/kyoukai_no_kanata_opening.png?raw=1', 'https://www.dropbox.com/s/vq3z761tqoavwpo/Kyoukai%20no%20Kanata%20Opening.mp3?raw=1'),
(14, 'Kyoukai no Kanata Movie Ending ', '会いたかった空', 'https://www.dropbox.com/s/ptci14onpg0ly2l/kyoukai_no_kanata_ending.png?raw=1', 'https://www.dropbox.com/s/w3gakskbn1b9p6a/Kyoukai%20no%20Kanata%20Movie%20Ending.mp3?raw=1'),
(15, 'Anohana Opening', 'Kimi ga Kureta Mono', 'https://www.dropbox.com/s/7u9iqjfnsasq4e1/anohana_opening.png?raw=1', 'https://www.dropbox.com/s/7p1upfat6ab3mcz/Anohana%20Opening.mp3?raw=1'),
(16, 'Anohana Ending', 'Aoi Shiori(青い栞)', 'https://www.dropbox.com/s/d6zmetmy06plq9d/anohana_ending.png?raw=1', 'https://www.dropbox.com/s/nx7lz3g8s4ipzo4/Anohana%20Ending.mp3?raw=1'),
(17, 'Boku no Hero Season 2 Opening 1', 'Peace Sign', 'https://www.dropbox.com/s/3unfnb9ynciaduh/boku_no_hero_season2_op1.png?raw=1', 'https://www.dropbox.com/s/8z11wwzob7n0x3r/Boku%20no%20Hero%20Academia%20Season%202%20Opening%201.mp3?raw=1'),
(18, 'One Piece Opening 17', 'Wake up!', 'https://www.dropbox.com/s/5rvgy4y39hit423/one_piece_op17.png?raw=1', 'https://www.dropbox.com/s/2ejeh3trjxun1il/One%20Piece%20Opening%2017.mp3?raw=1'),
(19, 'One Piece Opening 5', 'Kokoro no Chizu', 'https://www.dropbox.com/s/ny2d0yf6x82c98m/one_piece_op5.png?raw=1', 'https://www.dropbox.com/s/ae3h6pd6pblm2p2/One%20Piece%20Opening%205.mp3?raw=1'),
(20, 'Man of the World', 'Naruto Shippuden OST', 'https://www.dropbox.com/s/iyq3t842calk5w7/naruto_shippuden_man_of_the_world.jpg?raw=1', 'https://www.dropbox.com/s/dx7dyu4swpc4nx4/Naruto%20Shippuden%20OST%20Man%20of%20The%20World.mp3?raw=1'),
(21, 'Samidare', 'Naruto Shippuden OST', 'https://www.dropbox.com/s/l33bzdjmr2hzsit/naruto_shippuden_samidare.png?raw=1', 'https://www.dropbox.com/s/y5ngrmjkh6dlsm7/Naruto%20Shippuden%20OST%20Samidare.mp3?raw=1'),
(22, 'Sadness and Sorrow', 'Naruto Shippuden OST', 'https://www.dropbox.com/s/grwqfzulwkas4al/naruto_shippuden_sadness_sorrow.png?raw=1', 'https://www.dropbox.com/s/rbtcmsjb01ogs0f/Naruto%20Shippuden%20OST%20Sadness%20and%20Sorrow.mp3?raw=1'),
(23, 'Despair', 'Naruto Shippuden OST', 'https://www.dropbox.com/s/6l396rt0wsn5vw7/naruto_shippuden_despair.png?raw=1', 'https://www.dropbox.com/s/2k0zvvm0k5zl4ol/Naruto%20Shippuden%20OST%20Despair.mp3?raw=1'),
(24, 'Obito\'s Theme', 'Naruto Shippuden OST', 'https://www.dropbox.com/s/v422nim8i20q31l/naruto_shippuden_obito_theme.jpg?raw=1', 'https://www.dropbox.com/s/s6ln9r5pl1zwqxf/Naruto%20Shippuden%20OST%20Obito%27s%20Theme.mp3?raw=1'),
(25, 'Ao Haru Ride Opening', '世界は恋に落ちている', 'https://www.dropbox.com/s/1rkvdswih2hfzzc/ao_haru_ride_op1.png?raw=1', 'https://www.dropbox.com/s/se6kkjsth3xqnfn/Ao%20Haru%20Ride%20Opening.mp3?raw=1'),
(26, 'Ao Haru Ride Ending', 'ブルー', 'https://www.dropbox.com/s/2zaq8dvp0636ktb/ao_haru_ride_ending.png?raw=1', 'https://www.dropbox.com/s/h86c7korcja6wii/Ao%20Haru%20Ride%20Ending.mp3?raw=1'),
(27, 'Orange Opening', 'Hikari no Hahen', 'https://www.dropbox.com/s/w3ku8rl9ferjlyj/orange_opening.png?raw=1', 'https://www.dropbox.com/s/ralcc5youub4bis/Orange%20Opening.mp3?raw=1'),
(28, 'Bakemonogatari Opening 4', '恋愛サーキュレーション', 'https://www.dropbox.com/s/6fkiqdmka0ss4u0/bakemonogatari_op4.png?raw=1', 'https://www.dropbox.com/s/it4nqgxi031juar/Bakemonogatari%20Opening%203.mp3?raw=1'),
(29, 'Bakemonogatari Opening 1', 'Staple Stable', 'https://www.dropbox.com/s/h0psa48ztmf22mr/bakemonogatari_op1.png?raw=1', 'https://www.dropbox.com/s/p4wec8dvds723t4/Bakemonogatari%20Opening%201.mp3?raw=1'),
(30, 'Sakamoto Desu Ga Opening', 'カスタマイZ「COOLEST」', 'https://www.dropbox.com/s/ln8umyun9by1rlu/sakamoto_desu_ga_opening.png?raw=1', 'https://www.dropbox.com/s/pyylqf3ooedjhqx/Sakamoto%20Desu%20Ga%20Opening.mp3?raw=1'),
(31, 'Zenki Opening', 'Vajra On!', 'https://www.dropbox.com/s/347wr5dbo7sj422/zenki_opening.png?raw=1', 'https://www.dropbox.com/s/sj21k69hq7nfz34/Zenki%20Opening.mp3?raw=1'),
(32, 'Naruto Shippuden Opening 9', 'Lovers (ラヴァーズ)', 'https://www.dropbox.com/s/bwd3hli21x654ao/naruto_shippuden_op9.png?raw=1', 'https://www.dropbox.com/s/rr6ncxel8mcr1hr/Naruto%20Shippuden%20Opening%209.mp3?raw=1'),
(33, 'Plastic Memories Ending', 'Asayake no Starmine', 'https://www.dropbox.com/s/86304lq9wgb286v/plastic_memories_ending.png?raw=1', 'https://www.dropbox.com/s/jhswbqfjtsbyicd/Plastic%20Memories%20Ending.mp3?raw=1'),
(34, 'Kimi no Suizou wo Tabetai ', 'Fanfare', 'https://www.dropbox.com/s/i7py6ncl8zyysmj/kimi_no_suizou_wo_tabetai_opening.png?raw=1', 'https://www.dropbox.com/s/h5h9pkmk6070o8a/Kimi%20no%20Suizou%20wo%20Tabetai%20Opening.mp3?raw=1'),
(35, 'Kimi no Suizou wo Tabetai ', 'Haru Natsu Aki Fuyu', 'https://www.dropbox.com/s/pigymemeuk54z5y/kimi_no_suizou_wo_tabetai_ending.png?raw=1', 'https://www.dropbox.com/s/n2valoiyf6hxx2m/Kimi%20no%20Suizou%20wo%20Tabetai%20Ending.mp3?raw=1'),
(36, 'Shigatsu wa Kimi no Uso Ending 1', 'Kirameki', 'https://www.dropbox.com/s/5iqb5cf9f7slaaq/shigatsu_wa_kimi_no_uso_kirameki.png?raw=1', 'https://www.dropbox.com/s/8qmuslvg0cbx8cz/Shigatsu%20wa%20Kimi%20no%20Uso%20Ending%201.mp3?raw=1'),
(37, 'Shigatsu wa Kimi no Uso Ending 2', 'Orange', 'https://www.dropbox.com/s/kg3eiueab1vnjgw/shigatsu_wa_kimi_no_uso_orange.png?raw=1', 'https://www.dropbox.com/s/pn5hlpvpxlroz9m/Shigatsu%20wa%20Kimi%20no%20Uso%20Ending%202.mp3?raw=1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tracks`
--
ALTER TABLE `tracks`
  ADD PRIMARY KEY (`trackId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tracks`
--
ALTER TABLE `tracks`
  MODIFY `trackId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
