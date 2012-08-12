-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 12, 2012 at 03:05 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=94 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `created`, `updated`, `url`, `width`, `height`, `cropfile`, `tags`) VALUES
(64, '2012-08-11 15:00:23', '2012-08-12 02:52:24', 'http://blog.dark-warriors.net/wp-content/uploads/2011/02/redshoes.jpg', 480, 360, 'raw', ''),
(65, '2012-08-11 15:01:11', '2012-08-12 02:52:22', 'http://4.bp.blogspot.com/-JqfKPQnlLAs/T44LoDsrLdI/AAAAAAAAFe0/ojsHYdfrf9o/s1600/jeffreycampbell-charo.jpeg', 400, 411, 'raw', ''),
(66, '2012-08-11 15:01:56', '2012-08-12 02:52:18', 'http://www.thefashionpolice.net/wp-content/uploads/2011/02/irregular-choice-tea-and-cakes-shoes.jpg', 362, 332, 'raw', ''),
(67, '2012-08-11 15:02:58', '2012-08-12 02:52:16', 'http://www.suprasvaider.com/images/2011-supras-footwears/Supra%20Skytop%20Men%20(green%20black%20red)%20Shoes.jpg', 640, 480, 'raw', ''),
(68, '2012-08-11 15:04:28', '2012-08-12 03:01:33', 'http://suprasneakersoutlets.com/images/20120618/original/Supra-Pilot-Blue-Yellow-Green-Red-Shoes-Outlet_314_214.jpeg', 750, 498, 'raw', ''),
(69, '2012-08-11 15:06:19', '2012-08-12 02:52:11', 'http://www.aboutsneakers.com/wp-content/gallery/339/nike-sb-blazer-green-spark-red-shoes.jpg', 560, 337, 'raw', ''),
(70, '2012-08-11 15:07:35', '2012-08-12 02:52:08', 'http://www.supratops.com/images/Supra-for-sale/Womens%20Supra%20Vaider%20Shoes%20Green%20Red.jpg', 554, 475, 'raw', ''),
(71, '2012-08-11 15:08:26', '2012-08-12 02:52:05', 'http://cache.elizabethannedesigns.com/blog/wp-content/uploads/2010/09/Royal-Blue-Bridal-Shoes-500x333.jpg', 500, 333, 'raw', ''),
(72, '2012-08-11 15:09:42', '2012-08-12 02:52:03', 'http://0.tqn.com/d/shoes/1/0/S/d/blue_shoes.jpg', 480, 360, 'raw', ''),
(73, '2012-08-11 15:10:36', '2012-08-12 02:52:01', 'http://savitail.info/img.php?fl=l506r4u52354t224n4o4k474o4h484m5w5r5l5p284f4v5p2p3j5x5g5c4e5t5r4u224e4e464l5c4l404n5c4r5n426l4f4c4t2q4b4j494l424s4l455p3q2q2p4o2i4u5m5', 332, 329, 'raw', ''),
(74, '2012-08-11 15:11:19', '2012-08-12 02:51:55', 'http://www.thesapphirering.com/img/burma-star-sapphire-ring.jpg', 450, 350, 'raw', ''),
(75, '2012-08-11 15:11:42', '2012-08-12 02:51:53', 'http://3.bp.blogspot.com/-BdfIPE28y54/T2Kjetvrv1I/AAAAAAAAALA/qbT5gEtiBeY/s1600/sapphire-rings.jpg', 300, 300, 'raw', ''),
(76, '2012-08-11 15:12:37', '2012-08-12 02:51:50', 'http://www.jewelryadviser.net/wp-content/uploads/blue-topaz-large-ring.jpg', 450, 450, 'raw', ''),
(77, '2012-08-11 15:15:03', '2012-08-12 02:51:48', 'http://www.alljewelrydesigners.com/wp-content/uploads/lab-created-emerald-ring.jpg', 420, 360, 'raw', ''),
(78, '2012-08-11 15:15:44', '2012-08-12 02:51:46', 'http://www.articlesweb.org/blog/wp-content/gallery/tourmaline-jewelry/tourmaline-jewelry-14.jpg', 480, 360, 'raw', ''),
(79, '2012-08-11 15:16:58', '2012-08-12 02:51:39', 'http://image0-rubylane.s3.amazonaws.com/shops/retrodeluxe/2461BA.1L.jpg', 648, 472, 'raw', ''),
(80, '2012-08-11 15:18:00', '2012-08-12 02:51:38', 'http://www.greentradingcompany.co.uk/shop/catalog/images/MB7%20Dark%20Blue%20Bracelet.jpg', 499, 500, 'raw', ''),
(81, '2012-08-11 15:18:43', '2012-08-12 02:51:36', 'http://s8.thisnext.com/media/largest_dimension/56EB0FC4.jpg', 500, 500, 'raw', ''),
(82, '2012-08-11 15:19:12', '2012-08-12 02:51:34', 'http://butterflybrooch.net/wp-content/uploads/2010/11/blue-bracelets.jpg', 250, 250, 'raw', ''),
(83, '2012-08-11 15:20:08', '2012-08-12 02:51:29', 'http://www.jeririggs.com/images/SpikyBlueNecklace-w.jpg', 550, 852, 'crop_ready', ''),
(84, '2012-08-11 15:20:58', '2012-08-12 02:51:27', 'http://www.vintagejewelrybyteresa.com/images/necklace_red_facet_cutglass_1_.jpg', 640, 480, 'raw', ''),
(85, '2012-08-11 15:23:07', '2012-08-12 02:51:24', 'http://www.seeplus.co/shop/images/280/rings_two_red_800-1.jpg', 800, 800, 'crop_ready', ''),
(86, '2012-08-11 15:25:04', '2012-08-12 02:51:22', 'http://partywiththis.com/images/P/09-8116-RedVictorianRing.jpg', 475, 475, 'raw', ''),
(87, '2012-08-11 15:25:40', '2012-08-12 02:51:20', 'http://www.ishineaccessories.com/wp-content/uploads/Gold-Color-Urban-Boho-Ring-Red.jpg', 450, 450, 'raw', ''),
(88, '2012-08-11 15:26:12', '2012-08-12 02:51:16', 'http://eragem.com/media/catalog/product/cache/1/image/300x/5e06319eda06f020e43594a9c230972d/h/h/hh6i-antique-red-coral-diamond-ring-14k-gold.jpg', 300, 300, 'raw', ''),
(89, '2012-08-11 16:01:08', '2012-08-12 02:51:18', 'http://www.shoewawa.com/red-shoes.jpg', 631, 648, 'raw', ''),
(90, '2012-08-11 16:02:27', '2012-08-12 02:51:12', 'http://images.devilcostumes.com/accessories_zoot_suit_shoes.jpg', 350, 205, 'raw', ''),
(91, '2012-08-11 16:03:18', '2012-08-12 02:51:10', 'http://www.thefashionpolice.net/wp-content/uploads/2010/12/miss-l-fire-red-court-shoes.jpg', 328, 307, 'raw', ''),
(92, '2012-08-11 16:03:52', '2012-08-12 02:51:09', 'http://www.christian-louboution.com/product_images/x/406/Christian_Louboutin_Fifre_Suede_Ankle_red_Boots_CL01038__99743_zoom__55535_zoom.jpg', 500, 500, 'raw', ''),
(93, '2012-08-11 16:05:14', '2012-08-12 02:51:07', 'http://www.scavengeinc.com/images/Product/medium/pleaser/red-patent-gogo-boots.jpg', 432, 432, 'raw', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=338 ;

--
-- Dumping data for table `products_tags`
--

INSERT INTO `products_tags` (`id`, `created`, `updated`, `product_id`, `tag_id`, `numberOfColors`) VALUES
(263, '2012-08-12 02:51:07', '0000-00-00 00:00:00', 93, 1, 1),
(264, '2012-08-12 02:51:07', '0000-00-00 00:00:00', 93, 7, 1),
(265, '2012-08-12 02:51:09', '0000-00-00 00:00:00', 92, 1, 1),
(266, '2012-08-12 02:51:09', '0000-00-00 00:00:00', 92, 7, 1),
(267, '2012-08-12 02:51:10', '0000-00-00 00:00:00', 91, 1, 1),
(268, '2012-08-12 02:51:10', '0000-00-00 00:00:00', 91, 7, 1),
(269, '2012-08-12 02:51:12', '0000-00-00 00:00:00', 90, 1, 1),
(270, '2012-08-12 02:51:12', '0000-00-00 00:00:00', 90, 7, 1),
(273, '2012-08-12 02:51:16', '0000-00-00 00:00:00', 88, 9, 1),
(274, '2012-08-12 02:51:16', '0000-00-00 00:00:00', 88, 1, 1),
(275, '2012-08-12 02:51:18', '0000-00-00 00:00:00', 89, 1, 1),
(276, '2012-08-12 02:51:18', '0000-00-00 00:00:00', 89, 7, 1),
(277, '2012-08-12 02:51:20', '0000-00-00 00:00:00', 87, 1, 1),
(278, '2012-08-12 02:51:20', '0000-00-00 00:00:00', 87, 9, 1),
(279, '2012-08-12 02:51:22', '0000-00-00 00:00:00', 86, 1, 1),
(280, '2012-08-12 02:51:22', '0000-00-00 00:00:00', 86, 9, 1),
(281, '2012-08-12 02:51:24', '0000-00-00 00:00:00', 85, 9, 1),
(282, '2012-08-12 02:51:24', '0000-00-00 00:00:00', 85, 1, 1),
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
(297, '2012-08-12 02:51:46', '0000-00-00 00:00:00', 78, 9, 1),
(298, '2012-08-12 02:51:46', '0000-00-00 00:00:00', 78, 2, 1),
(299, '2012-08-12 02:51:48', '0000-00-00 00:00:00', 77, 9, 1),
(300, '2012-08-12 02:51:48', '0000-00-00 00:00:00', 77, 2, 1),
(301, '2012-08-12 02:51:50', '0000-00-00 00:00:00', 76, 3, 1),
(302, '2012-08-12 02:51:50', '0000-00-00 00:00:00', 76, 9, 1),
(303, '2012-08-12 02:51:53', '0000-00-00 00:00:00', 75, 9, 1),
(304, '2012-08-12 02:51:53', '0000-00-00 00:00:00', 75, 3, 1),
(305, '2012-08-12 02:51:55', '0000-00-00 00:00:00', 74, 9, 1),
(306, '2012-08-12 02:51:55', '0000-00-00 00:00:00', 74, 3, 1),
(307, '2012-08-12 02:52:01', '0000-00-00 00:00:00', 73, 9, 1),
(308, '2012-08-12 02:52:01', '0000-00-00 00:00:00', 73, 3, 1),
(309, '2012-08-12 02:52:03', '0000-00-00 00:00:00', 72, 7, 1),
(310, '2012-08-12 02:52:03', '0000-00-00 00:00:00', 72, 3, 1),
(311, '2012-08-12 02:52:05', '0000-00-00 00:00:00', 71, 7, 1),
(312, '2012-08-12 02:52:05', '0000-00-00 00:00:00', 71, 3, 1),
(313, '2012-08-12 02:52:08', '0000-00-00 00:00:00', 70, 7, 2),
(314, '2012-08-12 02:52:08', '0000-00-00 00:00:00', 70, 2, 2),
(315, '2012-08-12 02:52:08', '0000-00-00 00:00:00', 70, 1, 2),
(316, '2012-08-12 02:52:11', '0000-00-00 00:00:00', 69, 7, 2),
(317, '2012-08-12 02:52:11', '0000-00-00 00:00:00', 69, 2, 2),
(318, '2012-08-12 02:52:11', '0000-00-00 00:00:00', 69, 1, 2),
(323, '2012-08-12 02:52:16', '0000-00-00 00:00:00', 67, 7, 3),
(324, '2012-08-12 02:52:16', '0000-00-00 00:00:00', 67, 2, 3),
(325, '2012-08-12 02:52:16', '0000-00-00 00:00:00', 67, 1, 3),
(326, '2012-08-12 02:52:16', '0000-00-00 00:00:00', 67, 3, 3),
(327, '2012-08-12 02:52:18', '0000-00-00 00:00:00', 66, 7, 1),
(328, '2012-08-12 02:52:18', '0000-00-00 00:00:00', 66, 1, 1),
(329, '2012-08-12 02:52:22', '0000-00-00 00:00:00', 65, 7, 1),
(330, '2012-08-12 02:52:22', '0000-00-00 00:00:00', 65, 1, 1),
(331, '2012-08-12 02:52:24', '0000-00-00 00:00:00', 64, 7, 1),
(332, '2012-08-12 02:52:24', '0000-00-00 00:00:00', 64, 1, 1),
(333, '2012-08-12 03:01:33', '0000-00-00 00:00:00', 68, 7, 4),
(334, '2012-08-12 03:01:33', '0000-00-00 00:00:00', 68, 2, 4),
(335, '2012-08-12 03:01:33', '0000-00-00 00:00:00', 68, 3, 4),
(336, '2012-08-12 03:01:33', '0000-00-00 00:00:00', 68, 1, 4),
(337, '2012-08-12 03:01:33', '0000-00-00 00:00:00', 68, 12, 4);

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
  PRIMARY KEY (`id`),
  KEY `tabs_type_id` (`tags_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `created`, `updated`, `name`, `tags_type_id`) VALUES
(1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'red', 1),
(2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'green', 1),
(3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'blue', 1),
(7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'shoes', 5),
(9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'rings', 5),
(10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'braclets', 5),
(11, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'necklaces', 5),
(12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'yellow', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tags_types`
--

INSERT INTO `tags_types` (`id`, `created`, `updated`, `name`, `multiple`) VALUES
(1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'color', 1),
(2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'custom', 1),
(3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'style', 1),
(4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'age_bracket', 0),
(5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'article', 0),
(6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'gem', 1),
(7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'fabric', 1);
