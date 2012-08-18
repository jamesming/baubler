﻿-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 18, 2012 at 12:17 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `baubler_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `url` varchar(255) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `cropfile` varchar(15) NOT NULL,
  `tags` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=97 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `created`, `updated`, `url`, `width`, `height`, `cropfile`, `tags`) VALUES
(64, '2012-08-11 15:00:23', '2012-08-12 06:36:33', 'http://blog.dark-warriors.net/wp-content/uploads/2011/02/redshoes.jpg', 480, 360, 'raw', ''),
(65, '2012-08-11 15:01:11', '2012-08-12 06:39:13', 'http://4.bp.blogspot.com/-JqfKPQnlLAs/T44LoDsrLdI/AAAAAAAAFe0/ojsHYdfrf9o/s1600/jeffreycampbell-charo.jpeg', 400, 411, 'raw', ''),
(66, '2012-08-11 15:01:56', '2012-08-12 06:38:53', 'http://www.thefashionpolice.net/wp-content/uploads/2011/02/irregular-choice-tea-and-cakes-shoes.jpg', 362, 332, 'raw', ''),
(67, '2012-08-11 15:02:58', '2012-08-12 06:13:51', 'http://www.suprasvaider.com/images/2011-supras-footwears/Supra%20Skytop%20Men%20(green%20black%20red)%20Shoes.jpg', 640, 480, 'raw', ''),
(68, '2012-08-11 15:04:28', '2012-08-12 06:13:46', 'http://suprasneakersoutlets.com/images/20120618/original/Supra-Pilot-Blue-Yellow-Green-Red-Shoes-Outlet_314_214.jpeg', 750, 498, 'raw', ''),
(69, '2012-08-11 15:06:19', '2012-08-12 06:13:41', 'http://www.aboutsneakers.com/wp-content/gallery/339/nike-sb-blazer-green-spark-red-shoes.jpg', 560, 337, 'raw', ''),
(70, '2012-08-11 15:07:35', '2012-08-12 07:32:37', 'http://www.supratops.com/images/Supra-for-sale/Womens%20Supra%20Vaider%20Shoes%20Green%20Red.jpg', 554, 475, 'raw', ''),
(71, '2012-08-11 15:08:26', '2012-08-12 07:44:11', 'http://cache.elizabethannedesigns.com/blog/wp-content/uploads/2010/09/Royal-Blue-Bridal-Shoes-500x333.jpg', 500, 333, 'raw', ''),
(72, '2012-08-11 15:09:42', '2012-08-12 06:12:36', 'http://0.tqn.com/d/shoes/1/0/S/d/blue_shoes.jpg', 480, 360, 'raw', ''),
(73, '2012-08-11 15:10:36', '2012-08-12 16:19:58', 'http://savitail.info/img.php?fl=l506r4u52354t224n4o4k474o4h484m5w5r5l5p284f4v5p2p3j5x5g5c4e5t5r4u224e4e464l5c4l404n5c4r5n426l4f4c4t2q4b4j494l424s4l455p3q2q2p4o2i4u5m5', 332, 329, 'raw', ''),
(74, '2012-08-11 15:11:19', '2012-08-12 16:19:47', 'http://www.thesapphirering.com/img/burma-star-sapphire-ring.jpg', 450, 350, 'raw', ''),
(75, '2012-08-11 15:11:42', '2012-08-12 16:19:43', 'http://3.bp.blogspot.com/-BdfIPE28y54/T2Kjetvrv1I/AAAAAAAAALA/qbT5gEtiBeY/s1600/sapphire-rings.jpg', 300, 300, 'raw', ''),
(76, '2012-08-11 15:12:37', '2012-08-12 16:19:29', 'http://www.jewelryadviser.net/wp-content/uploads/blue-topaz-large-ring.jpg', 450, 450, 'raw', ''),
(77, '2012-08-11 15:15:03', '2012-08-12 16:19:51', 'http://www.alljewelrydesigners.com/wp-content/uploads/lab-created-emerald-ring.jpg', 420, 360, 'raw', ''),
(78, '2012-08-11 15:15:44', '2012-08-12 16:19:54', 'http://www.articlesweb.org/blog/wp-content/gallery/tourmaline-jewelry/tourmaline-jewelry-14.jpg', 480, 360, 'raw', ''),
(79, '2012-08-11 15:16:58', '2012-08-12 02:51:39', 'http://image0-rubylane.s3.amazonaws.com/shops/retrodeluxe/2461BA.1L.jpg', 648, 472, 'raw', ''),
(80, '2012-08-11 15:18:00', '2012-08-12 02:51:38', 'http://www.greentradingcompany.co.uk/shop/catalog/images/MB7%20Dark%20Blue%20Bracelet.jpg', 499, 500, 'raw', ''),
(81, '2012-08-11 15:18:43', '2012-08-12 02:51:36', 'http://s8.thisnext.com/media/largest_dimension/56EB0FC4.jpg', 500, 500, 'raw', ''),
(82, '2012-08-11 15:19:12', '2012-08-12 02:51:34', 'http://butterflybrooch.net/wp-content/uploads/2010/11/blue-bracelets.jpg', 250, 250, 'raw', ''),
(83, '2012-08-11 15:20:08', '2012-08-12 02:51:29', 'http://www.jeririggs.com/images/SpikyBlueNecklace-w.jpg', 550, 852, 'crop_ready', ''),
(84, '2012-08-11 15:20:58', '2012-08-12 02:51:27', 'http://www.vintagejewelrybyteresa.com/images/necklace_red_facet_cutglass_1_.jpg', 640, 480, 'raw', ''),
(85, '2012-08-11 15:23:07', '2012-08-12 16:21:04', 'http://www.seeplus.co/shop/images/280/rings_two_red_800-1.jpg', 800, 800, 'crop_ready', ''),
(86, '2012-08-11 15:25:04', '2012-08-12 16:18:56', 'http://partywiththis.com/images/P/09-8116-RedVictorianRing.jpg', 475, 475, 'raw', ''),
(87, '2012-08-11 15:25:40', '2012-08-12 16:19:04', 'http://www.ishineaccessories.com/wp-content/uploads/Gold-Color-Urban-Boho-Ring-Red.jpg', 450, 450, 'raw', ''),
(88, '2012-08-11 15:26:12', '2012-08-12 16:18:58', 'http://eragem.com/media/catalog/product/cache/1/image/300x/5e06319eda06f020e43594a9c230972d/h/h/hh6i-antique-red-coral-diamond-ring-14k-gold.jpg', 300, 300, 'raw', ''),
(89, '2012-08-11 16:01:08', '2012-08-12 07:45:12', 'http://www.shoewawa.com/red-shoes.jpg', 631, 648, 'raw', ''),
(90, '2012-08-11 16:02:27', '2012-08-12 06:31:11', 'http://images.devilcostumes.com/accessories_zoot_suit_shoes.jpg', 350, 205, 'raw', ''),
(91, '2012-08-11 16:03:18', '2012-08-12 06:38:16', 'http://www.thefashionpolice.net/wp-content/uploads/2010/12/miss-l-fire-red-court-shoes.jpg', 328, 307, 'raw', ''),
(92, '2012-08-11 16:03:52', '2012-08-12 14:29:22', 'http://www.christian-louboution.com/product_images/x/406/Christian_Louboutin_Fifre_Suede_Ankle_red_Boots_CL01038__99743_zoom__55535_zoom.jpg', 500, 500, 'raw', ''),
(93, '2012-08-11 16:05:14', '2012-08-13 19:04:53', 'http://www.scavengeinc.com/images/Product/medium/pleaser/red-patent-gogo-boots.jpg', 432, 432, 'raw', ''),
(94, '2012-08-12 03:12:50', '2012-08-12 16:18:50', 'http://images.jtv.com/loadimage.aspx?btype=.jpg&h=400&w=533&cgid=2881357&img=1', 533, 400, 'raw', ''),
(95, '2012-08-12 03:13:53', '2012-08-12 16:18:39', 'http://2.imimg.com/data2/MW/RL/MY-4575874/yellow-green-blue-resin-ring-250x250.jpg', 250, 250, 'raw', ''),
(96, '2012-08-12 03:22:49', '2012-08-12 07:44:02', 'http://poshposh.com/image/2009/07/Jessica%20Simpson%20Pagona%20shoe%20yellow.jpg', 450, 443, 'raw', '');

-- --------------------------------------------------------

--
-- Table structure for table `products_tags`
--

CREATE TABLE IF NOT EXISTS `products_tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `tag_id` int(11) DEFAULT NULL,
  `numberOfColors` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `tab_id` (`tag_id`),
  KEY `numberOfColors` (`numberOfColors`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=701 ;

--
-- Dumping data for table `products_tags`
--

INSERT INTO `products_tags` (`id`, `created`, `updated`, `product_id`, `tag_id`, `numberOfColors`) VALUES
(283, '2012-08-12 02:51:27', '0000-00-00 00:00:00', 84, 11, 1),
(284, '2012-08-12 02:51:27', '0000-00-00 00:00:00', 84, 1, 1),
(285, '2012-08-12 02:51:29', '0000-00-00 00:00:00', 83, 11, 1),
(286, '2012-08-12 02:51:29', '0000-00-00 00:00:00', 83, 3, 1),
(287, '2012-08-12 02:51:34', '0000-00-00 00:00:00', 82, 10, 1),
(288, '2012-08-12 02:51:34', '0000-00-00 00:00:00', 82, 3, 1),
(289, '2012-08-12 02:51:36', '0000-00-00 00:00:00', 81, 10, 1),
(290, '2012-08-12 02:51:36', '0000-00-00 00:00:00', 81, 3, 1),
(291, '2012-08-12 02:51:38', '0000-00-00 00:00:00', 80, 3, 1),
(292, '2012-08-12 02:51:38', '0000-00-00 00:00:00', 80, 10, 1),
(293, '2012-08-12 02:51:39', '0000-00-00 00:00:00', 79, 10, 3),
(294, '2012-08-12 02:51:39', '0000-00-00 00:00:00', 79, 1, 3),
(295, '2012-08-12 02:51:39', '0000-00-00 00:00:00', 79, 2, 3),
(296, '2012-08-12 02:51:39', '0000-00-00 00:00:00', 79, 12, 3),
(416, '2012-08-12 06:12:36', '0000-00-00 00:00:00', 72, 7, 1),
(417, '2012-08-12 06:12:36', '0000-00-00 00:00:00', 72, 3, 1),
(418, '2012-08-12 06:12:36', '0000-00-00 00:00:00', 72, 14, 1),
(419, '2012-08-12 06:12:36', '0000-00-00 00:00:00', 72, 21, 1),
(429, '2012-08-12 06:13:41', '0000-00-00 00:00:00', 69, 7, 2),
(430, '2012-08-12 06:13:41', '0000-00-00 00:00:00', 69, 2, 2),
(431, '2012-08-12 06:13:41', '0000-00-00 00:00:00', 69, 1, 2),
(432, '2012-08-12 06:13:41', '0000-00-00 00:00:00', 69, 22, 2),
(433, '2012-08-12 06:13:41', '0000-00-00 00:00:00', 69, 16, 2),
(434, '2012-08-12 06:13:46', '0000-00-00 00:00:00', 68, 7, 4),
(435, '2012-08-12 06:13:46', '0000-00-00 00:00:00', 68, 2, 4),
(436, '2012-08-12 06:13:46', '0000-00-00 00:00:00', 68, 3, 4),
(437, '2012-08-12 06:13:46', '0000-00-00 00:00:00', 68, 1, 4),
(438, '2012-08-12 06:13:46', '0000-00-00 00:00:00', 68, 12, 4),
(439, '2012-08-12 06:13:46', '0000-00-00 00:00:00', 68, 22, 4),
(440, '2012-08-12 06:13:46', '0000-00-00 00:00:00', 68, 16, 4),
(441, '2012-08-12 06:13:51', '0000-00-00 00:00:00', 67, 7, 3),
(442, '2012-08-12 06:13:51', '0000-00-00 00:00:00', 67, 2, 3),
(443, '2012-08-12 06:13:51', '0000-00-00 00:00:00', 67, 1, 3),
(444, '2012-08-12 06:13:51', '0000-00-00 00:00:00', 67, 3, 3),
(445, '2012-08-12 06:13:51', '0000-00-00 00:00:00', 67, 22, 3),
(446, '2012-08-12 06:13:51', '0000-00-00 00:00:00', 67, 16, 3),
(482, '2012-08-12 06:31:11', '0000-00-00 00:00:00', 90, 1, 1),
(483, '2012-08-12 06:31:11', '0000-00-00 00:00:00', 90, 7, 1),
(484, '2012-08-12 06:31:11', '0000-00-00 00:00:00', 90, 19, 1),
(485, '2012-08-12 06:31:11', '0000-00-00 00:00:00', 90, 16, 1),
(490, '2012-08-12 06:36:33', '0000-00-00 00:00:00', 64, 7, 1),
(491, '2012-08-12 06:36:33', '0000-00-00 00:00:00', 64, 1, 1),
(492, '2012-08-12 06:36:33', '0000-00-00 00:00:00', 64, 25, 1),
(493, '2012-08-12 06:36:33', '0000-00-00 00:00:00', 64, 19, 1),
(504, '2012-08-12 06:38:15', '0000-00-00 00:00:00', 91, 1, 1),
(505, '2012-08-12 06:38:15', '0000-00-00 00:00:00', 91, 7, 1),
(506, '2012-08-12 06:38:16', '0000-00-00 00:00:00', 91, 14, 1),
(507, '2012-08-12 06:38:16', '0000-00-00 00:00:00', 91, 19, 1),
(508, '2012-08-12 06:38:16', '0000-00-00 00:00:00', 91, 24, 1),
(509, '2012-08-12 06:38:16', '0000-00-00 00:00:00', 91, 25, 1),
(516, '2012-08-12 06:38:53', '0000-00-00 00:00:00', 66, 7, 1),
(517, '2012-08-12 06:38:53', '0000-00-00 00:00:00', 66, 1, 1),
(518, '2012-08-12 06:38:53', '0000-00-00 00:00:00', 66, 25, 1),
(519, '2012-08-12 06:38:53', '0000-00-00 00:00:00', 66, 24, 1),
(520, '2012-08-12 06:38:53', '0000-00-00 00:00:00', 66, 18, 1),
(521, '2012-08-12 06:39:13', '0000-00-00 00:00:00', 65, 7, 1),
(522, '2012-08-12 06:39:13', '0000-00-00 00:00:00', 65, 1, 1),
(523, '2012-08-12 06:39:13', '0000-00-00 00:00:00', 65, 21, 1),
(524, '2012-08-12 06:39:13', '0000-00-00 00:00:00', 65, 24, 1),
(525, '2012-08-12 06:39:13', '0000-00-00 00:00:00', 65, 20, 1),
(586, '2012-08-12 07:32:37', '0000-00-00 00:00:00', 70, 7, 2),
(587, '2012-08-12 07:32:37', '0000-00-00 00:00:00', 70, 2, 2),
(588, '2012-08-12 07:32:37', '0000-00-00 00:00:00', 70, 1, 2),
(589, '2012-08-12 07:32:37', '0000-00-00 00:00:00', 70, 22, 2),
(590, '2012-08-12 07:32:37', '0000-00-00 00:00:00', 70, 16, 2),
(610, '2012-08-12 07:44:02', '0000-00-00 00:00:00', 96, 7, 1),
(611, '2012-08-12 07:44:02', '0000-00-00 00:00:00', 96, 12, 1),
(612, '2012-08-12 07:44:02', '0000-00-00 00:00:00', 96, 14, 1),
(613, '2012-08-12 07:44:02', '0000-00-00 00:00:00', 96, 21, 1),
(614, '2012-08-12 07:44:02', '0000-00-00 00:00:00', 96, 17, 1),
(615, '2012-08-12 07:44:02', '0000-00-00 00:00:00', 96, 19, 1),
(616, '2012-08-12 07:44:11', '0000-00-00 00:00:00', 71, 7, 1),
(617, '2012-08-12 07:44:11', '0000-00-00 00:00:00', 71, 3, 1),
(618, '2012-08-12 07:44:11', '0000-00-00 00:00:00', 71, 25, 1),
(619, '2012-08-12 07:44:11', '0000-00-00 00:00:00', 71, 24, 1),
(620, '2012-08-12 07:44:11', '0000-00-00 00:00:00', 71, 14, 1),
(627, '2012-08-12 07:45:12', '0000-00-00 00:00:00', 89, 1, 1),
(628, '2012-08-12 07:45:12', '0000-00-00 00:00:00', 89, 7, 1),
(629, '2012-08-12 07:45:12', '0000-00-00 00:00:00', 89, 14, 1),
(630, '2012-08-12 07:45:12', '0000-00-00 00:00:00', 89, 24, 1),
(631, '2012-08-12 07:45:12', '0000-00-00 00:00:00', 89, 25, 1),
(632, '2012-08-12 07:45:12', '0000-00-00 00:00:00', 89, 19, 1),
(633, '2012-08-12 14:29:22', '0000-00-00 00:00:00', 92, 1, 1),
(634, '2012-08-12 14:29:22', '0000-00-00 00:00:00', 92, 7, 1),
(635, '2012-08-12 14:29:22', '0000-00-00 00:00:00', 92, 14, 1),
(636, '2012-08-12 14:29:22', '0000-00-00 00:00:00', 92, 18, 1),
(637, '2012-08-12 14:29:22', '0000-00-00 00:00:00', 92, 16, 1),
(643, '2012-08-12 16:18:39', '0000-00-00 00:00:00', 95, 2, 2),
(644, '2012-08-12 16:18:39', '0000-00-00 00:00:00', 95, 9, 2),
(645, '2012-08-12 16:18:39', '0000-00-00 00:00:00', 95, 12, 2),
(646, '2012-08-12 16:18:39', '0000-00-00 00:00:00', 95, 27, 2),
(647, '2012-08-12 16:18:39', '0000-00-00 00:00:00', 95, 28, 2),
(648, '2012-08-12 16:18:50', '0000-00-00 00:00:00', 94, 2, 2),
(649, '2012-08-12 16:18:50', '0000-00-00 00:00:00', 94, 3, 2),
(650, '2012-08-12 16:18:50', '0000-00-00 00:00:00', 94, 9, 2),
(651, '2012-08-12 16:18:50', '0000-00-00 00:00:00', 94, 27, 2),
(652, '2012-08-12 16:18:56', '0000-00-00 00:00:00', 86, 1, 1),
(653, '2012-08-12 16:18:56', '0000-00-00 00:00:00', 86, 9, 1),
(654, '2012-08-12 16:18:56', '0000-00-00 00:00:00', 86, 27, 1),
(655, '2012-08-12 16:18:58', '0000-00-00 00:00:00', 88, 9, 1),
(656, '2012-08-12 16:18:58', '0000-00-00 00:00:00', 88, 1, 1),
(657, '2012-08-12 16:18:58', '0000-00-00 00:00:00', 88, 27, 1),
(658, '2012-08-12 16:19:04', '0000-00-00 00:00:00', 87, 1, 1),
(659, '2012-08-12 16:19:04', '0000-00-00 00:00:00', 87, 9, 1),
(660, '2012-08-12 16:19:04', '0000-00-00 00:00:00', 87, 27, 1),
(664, '2012-08-12 16:19:29', '0000-00-00 00:00:00', 76, 3, 1),
(665, '2012-08-12 16:19:29', '0000-00-00 00:00:00', 76, 9, 1),
(666, '2012-08-12 16:19:29', '0000-00-00 00:00:00', 76, 27, 1),
(677, '2012-08-12 16:19:43', '0000-00-00 00:00:00', 75, 9, 1),
(678, '2012-08-12 16:19:43', '0000-00-00 00:00:00', 75, 3, 1),
(679, '2012-08-12 16:19:43', '0000-00-00 00:00:00', 75, 27, 1),
(680, '2012-08-12 16:19:47', '0000-00-00 00:00:00', 74, 9, 1),
(681, '2012-08-12 16:19:47', '0000-00-00 00:00:00', 74, 3, 1),
(682, '2012-08-12 16:19:47', '0000-00-00 00:00:00', 74, 27, 1),
(683, '2012-08-12 16:19:51', '0000-00-00 00:00:00', 77, 9, 1),
(684, '2012-08-12 16:19:51', '0000-00-00 00:00:00', 77, 2, 1),
(685, '2012-08-12 16:19:51', '0000-00-00 00:00:00', 77, 27, 1),
(686, '2012-08-12 16:19:54', '0000-00-00 00:00:00', 78, 9, 1),
(687, '2012-08-12 16:19:54', '0000-00-00 00:00:00', 78, 2, 1),
(688, '2012-08-12 16:19:54', '0000-00-00 00:00:00', 78, 27, 1),
(689, '2012-08-12 16:19:58', '0000-00-00 00:00:00', 73, 9, 1),
(690, '2012-08-12 16:19:58', '0000-00-00 00:00:00', 73, 3, 1),
(691, '2012-08-12 16:19:58', '0000-00-00 00:00:00', 73, 27, 1),
(692, '2012-08-12 16:21:04', '0000-00-00 00:00:00', 85, 9, 1),
(693, '2012-08-12 16:21:04', '0000-00-00 00:00:00', 85, 1, 1),
(694, '2012-08-12 16:21:04', '0000-00-00 00:00:00', 85, 28, 1),
(695, '2012-08-12 16:21:04', '0000-00-00 00:00:00', 85, 27, 1),
(696, '2012-08-13 19:04:53', '0000-00-00 00:00:00', 93, 1, 1),
(697, '2012-08-13 19:04:53', '0000-00-00 00:00:00', 93, 7, 1),
(698, '2012-08-13 19:04:53', '0000-00-00 00:00:00', 93, 13, 1),
(699, '2012-08-13 19:04:53', '0000-00-00 00:00:00', 93, 15, 1),
(700, '2012-08-13 19:04:53', '0000-00-00 00:00:00', 93, 23, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `name` varchar(255) NOT NULL,
  `tags_type_id` int(11) DEFAULT NULL,
  `parent_tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tabs_type_id` (`tags_type_id`),
  KEY `parent_tag_id` (`parent_tag_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `created`, `updated`, `name`, `tags_type_id`, `parent_tag_id`) VALUES
(1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'red', 1, 0),
(2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '#00CC33', 1, 0),
(3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '#0066FF', 1, 0),
(7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'shoes', 5, 0),
(9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'rings', 5, 0),
(10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'braclets', 5, 0),
(11, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'necklaces', 5, 0),
(12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'yellow', 1, 0),
(13, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'boot', 7, 7),
(14, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'heels', 7, 7),
(15, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'leather', 8, 7),
(16, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'lace', 8, 7),
(17, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'buckle', 8, 7),
(18, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'suede', 8, 7),
(19, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Faux Leather', 8, 7),
(20, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'cloth', 8, 7),
(21, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'straps', 8, 7),
(22, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'sneaker', 7, 7),
(23, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'zipper', 8, 7),
(24, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'bow', 8, 7),
(25, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'slip on', 8, 7),
(26, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'band only', 7, 9),
(27, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'gem', 7, 9),
(28, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'plastic', 8, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tags_types`
--

CREATE TABLE IF NOT EXISTS `tags_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `name` varchar(100) NOT NULL,
  `multiple` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tags_types`
--

INSERT INTO `tags_types` (`id`, `created`, `updated`, `name`, `multiple`) VALUES
(1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'color', 1),
(5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'articles', 0),
(7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'typeOf', 0),
(8, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'custom', 1);
