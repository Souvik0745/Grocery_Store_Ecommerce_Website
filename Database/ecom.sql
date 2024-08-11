-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2024 at 05:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories`, `status`) VALUES
(2, 'Vegetables', 1),
(3, 'Dairy & Eggs', 1),
(4, 'Snacks', 1),
(5, 'Spices', 1),
(6, 'Tea & Coffees', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `email` varchar(75) NOT NULL,
  `mobile` text NOT NULL,
  `message` text NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` int(11) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `total_price` float NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `order_status` int(11) NOT NULL,
  `txnid` varchar(20) NOT NULL,
  `mihpayid` varchar(20) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address`, `city`, `pincode`, `payment_type`, `total_price`, `payment_status`, `order_status`, `txnid`, `mihpayid`, `added_on`) VALUES
(1, 3, '293, Dum Dum Road, Motijheel', 'Kolkata', 700074, 'COD', 68, 'Unpaid', 1, '6198f3a048fac5fffe9b', '', '2024-06-15 07:47:26'),
(2, 3, '293, Dum Dum Road, Motijheel', 'Kolkata', 700074, 'COD', 131, 'Unpaid', 1, '886bc494a1936b2081a2', '', '2024-06-15 09:50:31'),
(3, 3, 'C-1, Police Colony, Pahar Ganj', 'Delhi', 110055, 'razorpay', 297, 'Paid', 1, 'bdc678e69fb0a4e301e3', 'pay_ON2E2Vjk2SH2et', '2024-06-15 02:22:09'),
(4, 8, 'Adeshwar Apt, Dr M P Vaidya Marg, Off Tilak Rd, Ghatkopar (e)', 'Mumbai', 400077, 'razorpay', 131, 'Paid', 1, '1de15589adce4ff8378e', 'pay_ON2J6wDka02vU8', '2024-06-15 02:26:59'),
(5, 3, '31-B, Darulshafa', 'Lucknow', 226001, 'razorpay', 20, 'Paid', 1, '962ed2c56b2733269832', 'pay_ON2OgYqSvBczBi', '2024-06-15 02:32:13'),
(6, 3, 'C-1, Police Colony, Pahar Ganj', 'Delhi', 110055, 'COD', 105, 'Unpaid', 1, '3cd702289264f019dd0a', '', '2024-06-15 03:00:50'),
(7, 7, 'C-1, Police Colony, Pahar Ganj', 'Delhi', 110055, 'COD', 105, 'Unpaid', 1, '3af7bdf411dd65db5cf0', '', '2024-06-15 03:45:04'),
(8, 6, 'C-1, Police Colony, Pahar Ganj', 'Delhi', 110055, 'COD', 346, 'Unpaid', 1, '97e36ad66f93454a5f4a', '', '2024-06-15 04:11:47'),
(9, 6, '293, Dum Dum Road, Motijheel', 'Kolkata', 700074, 'razorpay', 105, 'Paid', 1, 'b23c90d387fdce4d0bf6', 'pay_ON48kbuZIFG216', '2024-06-15 04:14:34'),
(10, 3, 'C-1, Police Colony, Pahar Ganj', 'Delhi', 110055, 'COD', 20, 'Unpaid', 1, 'd3dd10f0e2dd2f562950', '', '2024-06-15 04:40:41'),
(11, 3, '293, Dum Dum Road, Motijheel', 'Kolkata', 700074, 'razorpay', 20, 'Paid', 1, 'b5ccafc7003fa244a20a', 'pay_ON4agH0xp8LF0v', '2024-06-15 04:41:01'),
(12, 8, 'C-1, Police Colony, Pahar Ganj', 'Delhi', 110055, 'COD', 34, 'Unpaid', 1, '3857812e754fc91dce15', '', '2024-06-17 01:17:45'),
(13, 3, 'C-1, Police Colony, Pahar Ganj', 'Delhi', 110055, 'COD', 30, 'Unpaid', 1, '0fed9d1e266f393e9978', '', '2024-06-17 01:56:57'),
(14, 3, 'C-1, Police Colony, Pahar Ganj', 'Delhi', 110055, 'COD', 20, 'Unpaid', 1, '1b93bb7b5d0d3d8841ac', '', '2024-06-17 01:58:08'),
(15, 3, '31-B, Darulshafa', 'Lucknow', 226001, 'COD', 30, 'Unpaid', 1, 'b38ad1f808c5d8b8a1c2', '', '2024-06-17 02:32:04'),
(16, 4, '293, Dum Dum Road, Motijheel', 'Kolkata', 700074, 'razorpay', 34, 'Paid', 1, '52cb9bdd93cd3f2a7808', 'pay_ONpVFnfhbl9JaW', '2024-06-17 02:34:27'),
(17, 4, '293, Dum Dum Road, Motijheel', 'Kolkata', 700074, 'COD', 20, 'Unpaid', 1, 'f8b061bee85243242c14', '', '2024-06-17 03:26:39'),
(18, 4, '293, Dum Dum Road, Motijheel', 'Kolkata', 700074, 'COD', 105, 'Unpaid', 1, 'd50fd2c580a4597fc048', '', '2024-06-17 03:37:50'),
(19, 3, 'C-1, Police Colony, Pahar Ganj', 'Delhi', 110055, 'COD', 20, 'Unpaid', 1, 'c14cf4daf0f59929e241', '', '2024-06-17 04:23:17'),
(20, 3, 'C-1, Police Colony, Pahar Ganj', 'Delhi', 110055, 'COD', 127, 'Unpaid', 1, 'ecc19214eeceea683bc0', '', '2024-06-17 04:24:19'),
(21, 3, 'C-1, Police Colony, Pahar Ganj', 'Delhi', 110055, 'razorpay', 56, 'Paid', 1, '663bb7a6274396e35146', 'pay_ONs3CqRNBM4GDo', '2024-06-17 05:04:01'),
(22, 3, 'C-1, Police Colony, Pahar Ganj', 'Delhi', 110055, 'COD', 75, 'Unpaid', 1, '5a31f4239638f9668d98', '', '2024-06-17 05:53:19'),
(23, 8, '31-B, Darulshafa', 'Lucknow', 226001, 'COD', 75, 'Unpaid', 1, '28d64d38978f336554ad', '', '2024-06-18 05:02:14'),
(24, 7, 'Adeshwar Apt, Dr M P Vaidya Marg, Off Tilak Rd, Ghatkopar (e)', 'Mumbai', 400077, 'COD', 34, 'Unpaid', 1, '8980049ba607290b9a7c', '', '2024-06-18 05:15:55'),
(25, 20, '31-B, Darulshafa', 'Lucknow', 226001, 'COD', 34, 'Unpaid', 1, '1062fc790ad584c6a723', '', '2024-06-18 05:54:23'),
(26, 21, 'C-1, Police Colony, Pahar Ganj', 'Delhi', 110055, 'COD', 34, 'Unpaid', 1, 'db4622dc3387baaeea5c', '', '2024-06-18 06:12:10'),
(27, 21, '31-B, Darulshafa', 'Lucknow', 226001, 'razorpay', 293, 'Paid', 1, 'b1038813fbdd26daa321', 'pay_OO5nzohW2QcVvr', '2024-06-18 06:31:17'),
(28, 21, '31-B, Darulshafa', 'Lucknow', 226001, 'COD', 127, 'Unpaid', 1, '2951aa1acdbd60d9a633', '', '2024-06-18 06:38:59'),
(29, 21, '31-B, Darulshafa', 'Lucknow', 226001, 'COD', 115, 'Unpaid', 1, 'd3fe3f90a3b0185f04bb', '', '2024-06-18 07:40:36'),
(30, 22, 'C-1, Police Colony, Pahar Ganj', 'Delhi', 110055, 'razorpay', 68, 'Paid', 1, '889b0e1a230bdafed69d', 'pay_OO7AWkw94QpyP9', '2024-06-18 07:51:21'),
(31, 23, 'C-1, Police Colony, Pahar Ganj', 'Delhi', 110055, 'razorpay', 220, 'Paid', 1, 'd6cbb44bd1b2a0c7dd05', 'pay_OO7U9jDeGw2QJu', '2024-06-18 08:09:55'),
(32, 25, '293, Dum Dum Road, Motijheel', 'Kolkata', 700074, 'COD', 175, 'Unpaid', 1, 'ad749a2959940b655078', '', '2024-07-19 09:06:18'),
(33, 25, '293, Dum Dum Road, Motijheel', 'Kolkata', 700074, 'razorpay', 48, 'Paid', 1, 'ce43187cedcd1ab4699c', 'pay_OaP1k0RBq4jEVY', '2024-07-19 09:07:31'),
(34, 25, '293, Dum Dum Road, Motijheel', 'Kolkata', 700074, 'COD', 75, 'Unpaid', 1, '4432229f20f24bcfd59c', '', '2024-07-19 01:45:06'),
(35, 25, 'Adeshwar Apt, Dr M P Vaidya Marg, Off Tilak Rd, Ghatkopar (e)', 'Mumbai', 400077, 'razorpay', 382, 'Unpaid', 1, '441d192accbb1e72656b', '', '2024-07-20 10:10:04'),
(36, 25, 'Adeshwar Apt, Dr M P Vaidya Marg, Off Tilak Rd, Ghatkopar (e)', 'Mumbai', 400077, 'razorpay', 34, 'Unpaid', 1, '2fea8cdfdfdee1c4356e', '', '2024-07-21 07:35:44'),
(37, 25, 'C-1, Police Colony, Pahar Ganj', 'Delhi', 110055, 'razorpay', 369, 'Paid', 1, '07892eb6a46ed4c912fa', 'pay_Oe2U1URNOZDZmq', '2024-07-28 01:40:18');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `qty`, `price`) VALUES
(1, 1, 32, 2, 34),
(2, 2, 37, 1, 20),
(3, 2, 35, 1, 111),
(4, 3, 41, 1, 24),
(5, 3, 37, 1, 20),
(6, 3, 36, 2, 20),
(7, 3, 22, 2, 45),
(8, 3, 9, 1, 123),
(9, 4, 37, 1, 20),
(10, 4, 35, 1, 111),
(11, 5, 38, 1, 20),
(12, 6, 19, 1, 105),
(13, 7, 19, 1, 105),
(14, 8, 17, 1, 100),
(15, 8, 27, 1, 56),
(16, 8, 24, 1, 190),
(17, 9, 19, 1, 105),
(18, 10, 36, 1, 20),
(19, 11, 37, 1, 20),
(20, 12, 32, 1, 34),
(21, 13, 15, 1, 30),
(22, 14, 12, 1, 20),
(23, 15, 21, 1, 30),
(24, 16, 32, 1, 34),
(25, 17, 36, 1, 20),
(26, 18, 19, 1, 105),
(27, 19, 36, 1, 20),
(28, 20, 31, 1, 127),
(29, 21, 27, 1, 56),
(30, 22, 40, 1, 75),
(31, 23, 40, 1, 75),
(32, 24, 32, 1, 34),
(33, 25, 32, 1, 34),
(34, 26, 32, 1, 34),
(35, 27, 32, 2, 34),
(36, 27, 40, 3, 75),
(37, 28, 31, 1, 127),
(38, 29, 28, 1, 115),
(39, 30, 32, 2, 34),
(40, 31, 40, 1, 75),
(41, 31, 38, 1, 20),
(42, 31, 39, 1, 20),
(43, 31, 34, 1, 105),
(44, 32, 28, 1, 115),
(45, 32, 11, 3, 20),
(46, 33, 13, 1, 20),
(47, 33, 6, 1, 28),
(48, 34, 40, 1, 75),
(49, 35, 28, 2, 115),
(50, 35, 21, 1, 30),
(51, 35, 32, 3, 34),
(52, 35, 37, 1, 20),
(53, 36, 32, 1, 34),
(54, 37, 28, 1, 115),
(55, 37, 32, 1, 34),
(56, 37, 24, 1, 190),
(57, 37, 21, 1, 30);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Shipped'),
(4, 'Cancelled'),
(5, 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mrp` float NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `ingredients` varchar(2000) NOT NULL,
  `description` text NOT NULL,
  `best_seller` int(11) NOT NULL,
  `meta_title` varchar(2000) NOT NULL,
  `meta_desc` varchar(2000) NOT NULL,
  `meta_keyword` varchar(2000) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `categories_id`, `name`, `mrp`, `price`, `qty`, `image`, `ingredients`, `description`, `best_seller`, `meta_title`, `meta_desc`, `meta_keyword`, `status`) VALUES
(1, 3, 'Amul Fresh Cream (250ml)', 70, 68, 50, '788008660_fc.png', 'Amul Fresh Cream, Low Fat', 'Amul Fresh Cream is a low fat cream with a smooth texture and rich milky taste. It is used to prepare mouth-watering desserts and dishes like vegetable makhanwala, fruit salads, sweet meals, salad dressings, ice-creams etc.', 1, '', '', '', 1),
(2, 3, 'Mithai Mate (200G)', 68, 66, 100, '776470336_mm.png', 'Amul Mithai Mate - Sweetened Condensed Milk', 'Brand:	Amul\r\nFlavour:	Sweetened Condensed Milk\r\nItem Weight:	200 Grams\r\nItem Form:	Liquid\r\nNet Quantity:	200.0 gram\r\nDiet Type:	Vegetarian\r\nPackage Weight:	200 Grams\r\nSpeciality:	suitable for vegetarians\r\nManufacturer:	Amul', 0, '', '', '', 1),
(3, 3, 'Amulspray (1kg)', 455, 448, 100, '484260676_ams.png', 'Amulspray Baby Milk Powder', 'Enriched with essential nutrients, Amulspray Infant Milk Powder helps in the all round development of the baby. It makes for an excellent milk substitute and can also be used as a dairy whitener.', 0, '', '', '', 1),
(4, 3, 'Amulya (200g)', 235, 234, 100, '858545875_amly.png', 'Amulya Dairy Whitener', 'Enhance the flavour of sweets and beverages use Amulya dairy whitener. The loose powder milk form can be used for making tea, coffee, various sweet dishes, curd and other bakery items too. It is healthy and consist of sucrose, it is rich in protein and calcium and has high sodium content in it. Amulya has zero trans - fat which makes it healthier. The flavour is amazing as it is partly skimmed milk. The few spoons of the milk powder, when mixed with lukewarm water and stirred, can be used for direct consumption as well.', 0, '', '', '', 1),
(5, 3, 'OVO Farm MoreOVOr White Eggs (6 pieces)', 58, 57, 100, '937564729_461ac293-341e-4265-b932-ae2bc5bb06ec.png', 'White Eggs', '', 0, '', '', '', 1),
(6, 2, 'Onion (1kg)', 30, 28, 50, '962926057_onion.png', 'Contains Folic acid, Vitamin C and Amino acid .Vitamin C acts as a powerful antioxidant and also helps formation of collagen that is responsible for skin and hair health.', 'Onion is a staple in India and are commonly chopped and used as an ingredient in various hearty warm dishes. They are versatile and can be baked, boiled, braised, grilled, fried, roasted, sautéed, or eaten raw in salads.', 0, '', '', '', 1),
(7, 2, 'Potato (1kg)', 30, 29, 150, '434226333_potato.png', 'Contains Vitamin C, Potassium, starch,.Potato helps in reducing inflammation, promote digestion and are good for skin.', '', 0, '', '', '', 1),
(8, 2, 'Garlic (500g)', 150, 148, 100, '434672674_garlic.png', 'Contains, Fibre, Vitamin B1,Vitamin B2, Vitamin B6, Folic acid, Potassium. Garlic acts as a natural antibiotic, clears the skin and is good for Digestive system.', 'Garlic is a herb, best known for flavoring and seasoning of food and is widely used in various cuisines ranging from desi cuisines like Tadka Dal to dishes such as Garlic Bread. Garlic seems to be used in virtually all cuisines as a strong flavoring agent.', 0, '', '', '', 1),
(9, 2, 'Ginger (500g)', 125, 123, 100, '581019522_ginger.png', 'The phenolic compounds in ginger are mainly gingerols, shogaols, and paradols. In fresh ginger, gingerols are the major polyphenols, such as 6-gingerol, 8-gingerol, and 10-gingerol. With heat treatment or long-time storage, gingerols can be transformed into corresponding shogaols.', 'Ginger is one of the most used spices in the world and comes in numerous forms, including fresh, dried, pickled, preserved, crystallized, candied, and powdered/ground. Ginger, along with green onion and garlic, is considered part of the “holy trinity” of Chinese cooking.', 0, '', '', '', 1),
(10, 2, 'Lemon (10pcs.)', 50, 48, 500, '820818189_lemon.png', 'Rich source of Vitamin C, it boosts the immune system and aids in digestion.', 'Popularly used in Bengali cuisine, it enhances the flavor of dishes and has a fantastic aroma and flavor. It is quite oblong and has a thick green rind.', 0, '', '', '', 1),
(11, 4, 'Lays', 20, 20, 100, '636571894_lays.png', 'Lay\'s India\'s Magic Masala Potato Chips (40 g)', 'Binge on these exquisite bites of pure Masala magic! With hints of cumin, coriander, chili powder, onion, and garlic, Lay’s India’s Magic Masala is a one-way ticket to a world of exploding flavours. Experience this one-of-a-kind snack and indulge in the boldness of the Masala spice blend. Lay\'s India’s Magic Masala chips are perfect for any occasion. From the quick snack breaks at work, to the impromptu get-togethers, this snack is perfect to binge on.', 0, '', '', '', 1),
(12, 4, 'Kurkure', 20, 20, 100, '535590709_kurkure.png', 'Kurkure Masala Munch Crisps 77g', 'Kurkure Masala Munch is made from fresh rice meal, corn meal and is spiced with various condiments. As Indian and delicious as ever, this tangy snack is a perfect munch with an enticing flavour of masala.', 0, '', '', '', 1),
(13, 4, 'Bingo Tedhe Medhe', 20, 20, 100, '827837366_bingo.png', 'Bingo Tedhe Medhe Masala Tadka Crisps 80g', 'Want something spicy to shake things up? All you need is a pack of Bingo! Tedhe Medhe Masala Tadka to satisfy every ‘something masaledaar’ craving of yours. We Indians are very attached to our spices. No food is complete without a dash of masalas to make it more exciting. To make sure that you feel a little more desi with every bite you take, Indian masalas are added to the spindle shaped sticks.', 0, '', '', '', 1),
(14, 4, 'Crax Curls', 40, 40, 100, '458963771_curls.png', 'Crax Curls Chatpata Masala Puffs 82g', 'Crax chatpata masala curls is for you. Enjoy it with your favourite beverage or drink! It\'s the perfect party snack for when your friends and family are over. These snacks are a blend of different tastes and spices that all come to play to make it worth drooling over.', 0, '', '', '', 1),
(15, 4, 'Doritos Cheese Nachos', 30, 30, 100, '277043990_doritos.png', 'Doritos Cheese Nachos 60g', 'Doritos is the spark that ignites you to be bold. Tooth Rattling Crunch & Intense Flavours that ignite you to Seize the Moment & Release your inner boldness. If you are up to the challenge, grab a bag of DORITOS Nacho Cheese tortilla chips and get ready for the experience. Its a bold experience in snacking and beyond', 0, '', '', '', 1),
(16, 5, 'JK Clove', 60, 59, 50, '117147341_cl.png', 'JK Clove Whole/Laung 25g', 'A classic ingredient to enhance the taste of your food, JK Clove Whole Laung/Clove is chosen from the best quality produce to keep the taste as authentic as possible. These small spices can be added to your dishes to give an aromatic taste. The high quality is maintained by choosing the best produce. Adds a distinct aroma to the dishes that it is added to. It can be used as a condiment or spice in your dishes.', 0, '', '', '', 1),
(17, 5, 'JK Green Cardamom', 105, 100, 100, '189795845_se.png', 'JK Green Cardamom Whole/Elaichi Small 25g', 'An aromatic and flavourful spice that is used to bring about an exotic taste in Indian dishes. This versatile JK Green Cardamom can be eaten raw or added to food dishes for an authentic and aromatic taste. Rich in aroma. Adds an exotic flavour to pulao, halwa, kheer, etc. Helps in the prevention of toothaches.', 0, '', '', '', 1),
(18, 5, 'Zoff Premium Star Anise', 30, 30, 50, '332269203_sa.png', 'Zoff Premium Star Anise 20g', '', 0, '', '', '', 1),
(19, 5, 'Sunrise Pure Poppy Seeds', 106, 105, 100, '866302193_ps.png', 'Sunrise Pure Poppy Seeds (Posta) 50g', '', 0, '', '', '', 1),
(20, 5, 'Pro Nature Organic Cinnamon', 80, 78, 100, '307556753_dc.png', 'Pro Nature Organic Cinnamon Whole (Dalchini) 50g', '', 0, '', '', '', 1),
(21, 6, 'Brooke Bond Red Label Tea', 30, 30, 100, '615475998_rl.png', 'Brooke Bond Red Label Tea 100g', 'Brooke Bond Red Label Tea is a blend CTC tea with best quality leaves, processed in the unique Brooke Bond Tea Excellence Centre .It was in 1903 that Brooke Bond launched “Red Label”. Every cup of Red Label is brewed with the best-chosen tea leaves, that ensure your tea has strength, rich colour, and refreshing taste. We believe our tea has the taste of togetherness that gives that perfect taste, colour and irresistible aroma. Red Label is all about coming together over a warm cup of tea with everyone arounds. It is the “Swad Apnepan ka (Taste of Togetherness). Enjoy the great tasting range from Red Label Core and Red Label Natural Care, that has a mix of 5 Ayurvedic ingredients namely Tulsi, Ashwagandha, Mulethi, Ginger and Cardamom. Red Label Natural Care is clinically proven to enhance immunity and help you fall ill less often.', 1, '', '', '', 1),
(22, 6, 'Tata Tea Gold', 45, 45, 100, '435393133_tg.png', 'Tata Tea Gold Black Tea 100g', 'In the place, where the valley meets the mountains, Tata Tea Gold is born. An exquisite tea that combines the rich fullness of fine valley grown teas from Assam with the irresistible aroma of specially selected long leaves from highlands. Expertly blended by the master craftsmen from Tata Tea, this marque national black tea offering from Tata Tea’s portfolio has been specially crafted for the discerning tea consumers. Taste so rich and aroma so irresistible that it will leave you longing for more!', 0, '', '', '', 1),
(23, 6, 'Tata Tea Premium', 40, 40, 100, '390880224_tp.png', 'Tata Tea Premium 100g', '‘Chai’ is more than a cup of tea, rather it is an integral part of the culture and life of every Indian. While drinking chai is enjoyed across the country, the way people like their cup in India varies across regions. Tata Tea Premium- Desh ki Chai, sourced solely from India, understands these varying taste preferences and hence our tea experts have crafted a unique blend that ‘chai’ lovers across India will enjoy. Blended since 1985. Storage Instructions: Once opened, transfer the contents into an airtight container and keep the lid tightly closed after each use.', 0, '', '', '', 1),
(24, 6, 'Nescafe Classic - Instant Coffee', 200, 190, 50, '566994943_nc.png', 'Nescafe Classic - Instant Coffee 45g', 'NESCAFE, world’s favourite instant coffee brand, brings to you rich and aromatic coffee in the form of NESCAFE Classic Instant Coffee, that will take your coffee experiences to the next level. Start your day right with the first sip of this 100% pure coffee and let the bold taste and rich aroma of NESCAFE Classic Instant Coffee awaken your senses to new opportunities.', 1, '', '', '', 1),
(25, 6, 'Lipton Clear & Light Green Tea Bags', 340, 245, 50, '964232506_lg.png', 'Lipton Clear & Light Green Tea Bags (50pcs./pack)', 'Lipton green pure and light tea is fresh and pure to provide instant alertness. Since it is 99.5% water, it has virtually zero calories. It thus, helps manage weight and daily fluid intake. Every sip of this tea makes one feel healthy and revitalized.', 0, '', '', '', 1),
(27, 3, 'Amul Salted Butter 100g', 58, 56, 100, '740892493_amb1.png', 'Milk fat, salt, annatto extract color (E160b). Composition: Milk fat minimum 80%, moisture maximum 16%, salt maximum 2.5%, milk solids-not-fat maximum 1.5%.', 'Made from the freshest of cream, the Amul butter has wonderful taste which is delicate and slightly salty. This finely processed butter is natural, pure and tastes best with toasts and sandwiches. Has a natural and pure formulation that gives a great taste. Made from fresh cream that has a delicious flavor. Spread it over toast or cook your curries in it for a heavenly taste.', 0, '', '', '', 1),
(28, 3, 'Amul Salted Butter 200g', 118, 115, 100, '887874415_amb2.png', 'Milk fat, salt, annatto extract color (E160b). Composition: Milk fat minimum 80%, moisture maximum 16%, salt maximum 2.5%, milk solids-not-fat maximum 1.5%.', 'Used in several delightful recipes, the \'Utterly Butterly Delicious\' taste of Amul Butter is popular in every Indian household. Made from pure milk fat, it is rich in calcium. Creamier and tastier, it spreads easily to make your breakfast butterlicious.', 1, '', '', '', 1),
(29, 3, 'Amul Salted Butter (Chiplets) 10units', 70, 67, 100, '590428163_amb.png', 'Milk fat, salt, annatto extract color (E160b). Composition: Milk fat minimum 80%, moisture maximum 16%, salt maximum 2.5%, milk solids-not-fat maximum 1.5%.', 'Utterly Butterly delicious, Amul Butter (Chiplets) is a popular name among households. This luscious butter can be consumed with bread, paratha, roti, nans and sandwiches.', 0, '', '', '', 1),
(30, 3, 'Amul Pure Milk Cheese Slices 200g', 145, 141, 100, '484926817_amc.png', 'Cheese, Sodium Citrate, Common Salt, Citric Acid, permitted natural colour - Annatto. Emulsifier and Class II preservatives. It is made from graded cow/buffalo milk using microbial rennet.', 'Enjoy the real taste of India With Amul Cheese Slices. The Amul cheese is made from the graded milk and by using microbial Renne. Sliced cheese is a great source of milk proteins, vitamins and other nutrients. It can be used in hundreds of ways in any dish. It\'s delicate flavoured ingredient gives a lip-smacking flavour to every dish. Cheese is a delicious component and is also used in the preparation of sweet dishes.', 0, '', '', '', 1),
(31, 3, 'Amul Cheese Block 200g', 130, 127, 100, '369698697_amcb.png', 'Cheese, Sodium Citrate, Common Salt, Citric Acid, permitted natural colour - Annatto. Emulsifier and Class II preservatives. It is made from graded cow/buffalo milk using microbial rennet.', 'The nationally recognized Amul brings to you Amul Cheese which is as fresh as it can get. Tasty and healthy. Nationally recognized brand. Good for energy and growth. Best quality is ensured.', 0, '', '', '', 1),
(32, 3, 'Amul Masti Curd 400g', 35, 34, 100, '624450465_acurd.png', 'Fat: 3.1%, SnF:11.2% Pasteurized Toned Milk', 'Delicious and nutritious, Amul Masti Dahi (Polypack) makes for an ideal meal-time accompaniment. Made from pasteurized toned milk, it can be used in the preparation of Lassi, Dahi Wada, Mughlai Food, etc. and to marinate a wide variety of veg and non-veg dishes.', 1, '', '', '', 1),
(33, 3, 'Metro Curd 200g', 18, 18, 100, '627917302_mcurd.png', 'Metro Dairy offers a variety of curds, including set curds and plain pouch dahi. The main ingredient in curd is casein, a milk protein that gives curd its white color and high protein content. Curd also contains lactic acid bacteria, which ferments milk to create curd. Other ingredients in curd may include milk solids and water.', 'Superior taste and good quality has made keventer metro dahi a household name in a matter of time. This cup of metro curd is delicious curd made from pasteurized toned milk by one of India\'s most loved and trusted dairy brands Amul. Enjoy yummy curd whenever you feel like. Have it with your meals for good digestion at all times.', 0, '', '', '', 1),
(34, 4, 'Bikano Aloo Bhujia', 109, 105, 100, '322344065_80f11925-12ac-41ff-a00b-d57f7f793f60.png', 'Light, deliciously crunchy and crisp\r\nScrumptious combination of quality potatoes and selected spices\r\nA classic favorite\r\nPerfect accompaniment to tea time', '', 0, '', '', '', 1),
(35, 4, 'Haldiram\'s Prabhuji Bhujia 400g', 115, 111, 100, '570507557_9857d39b-fc1e-41b8-bacd-cc9739ae10e7.png', 'Tapary Beans Flour (Moth), Edible Vegetable Oil, Chick Peas Flour, Salt, Red Chilli Powder, Clove Powder, Black Pepper, Dried Ginger Powder, Cardamom, Bay Leaves.', 'Enjoy this savoury Haldiram\'s Prabhuji Bhujia Namkeen snacks anytime, anywhere with friends and family. Ideal hunger snacking partner with evening or morning brew. This healthy, crispy, crunchy and lip-smacking snack is enjoyed by all. Perfect for a party or a festival, this tasty, yummy, ready to eat snacks is always the best option for snacking. It is made from the choicest of the ingredients and wide range of spices, making it taste scrumptious.', 0, '', '', '', 1),
(36, 4, 'Uncle Chipps Plain Salted Potato Chips 50g', 20, 20, 100, '779634983_534449a.png', 'Potato, Edible Vegetable Oil (Palm olein), Iodized Salt (1.5%).', '', 0, '', '', '', 1),
(37, 4, 'Lay\'s Chile Limon Flavour Potato Chips 40g', 20, 20, 100, '337827206_6d1dfcc2-6386-4c5e-98dc-31af73b99bcd.png', 'Potatoes, Vegetable Oil (Sunflower, Corn, and/or Canola Oil), Chile Limon Seasoning (Spices [Including Chile Pepper], Salt, Yeast Extract, Maltodextrin [Made From Corn], Sunflower Oil, Corn Syrup Solids, Citric Acid, Sugar, Onion Powder, Lime Juice, Garlic Powder, Natural Flavor, Milk Protein Concentrate, Paprika.', 'If you’re looking for a snack with character, look no more because Lay’s Chile Limon is the tangy kick of flavour that will light up your day! Seasoned with the spice of chilies and the zing of real lime, these bold chips are full of flavour and are lip-smacking good. Their powerful kick is as intense as it gets and is everything you never knew you needed. Lay\'s Chile Limon chips are versatile and are perfect for any occasion. From the quick snack breaks at work, to the impromptu get-togethers, this snack is perfect to binge on.', 0, '', '', '', 1),
(38, 4, 'Kurkure Sizzlin\' Hot Crisps 78g', 20, 20, 100, '499215202_531031a.png', 'Nutrients -Energy, Protein, Carbohydrate, Sugars, Fat, Sodium', '', 0, '', '', '', 1),
(39, 4, 'Uncle Chipps Spicy Treat Potato Chips 50g', 20, 20, 100, '668340053_uc.png', 'Potato, Edible Vegetable Oil (Palmolein), *Seasoning (Sugar, Iodised Salt, ~Spices & Condiments, Acidity Regulators (330, 334, 296), Matodextrin, Edible Starch, Salt Substitute (Potassium Chloride), Milk Solids, Anticaking Agents (551, 470), Flavour Enhancers (631, 627), Color (150d), Flavour (Natural and Nature Identical Flavouring Substances), Modified Starch (1450)).\r\nContains Milk\r\n*As flavouring agent. ~Contains Onion', 'Who’s in for a roller coaster of spicy flavors and crunchy bites? If you feel like spicing up your day, you need a snack with character and Uncle Chipps Spicy Treat will surely do the trick. Made with high-quality thinly sliced potatoes and topped with mouth-watering seasoning, these chips are just exquisite and will make you come back for more. Enjoy watching your favorite programs with a bag of Uncle Chipps or have this delicious treat on your quick work break. These chips are just perfect to snack on and their irresistible flavor makes them the ideal go-to treat.', 0, '', '', '', 1),
(40, 3, 'Total Classic Farm White Eggs (6 pieces)', 78, 75, 100, '691226561_6f7d5483-8c9b-4f97-9e44-756843c3553c.png', 'High in protein yet low in calories, fat, and cholesterol', 'White eggs are making them a good food to include in your eating plan if you\'re trying to lose weight. They may also benefit those who have high protein requirements but need to watch their calorie intake, such as athletes or bodybuilders.', 0, '', '', '', 1),
(41, 5, 'JK Red Small Mustard Seeds 50g', 24, 24, 100, '533646739_5edf9150-2a1a-454d-9657-c6baea424965.png', 'Small Mustard Seeds', 'JK Red Mustard Seeds are hygienically packed to ensure the best quality. It is used as condiment in a variety of dishes to elevate flavour. Rich in a nutrient called selenium, known for its high anti-inflammatory effects. Magnesium in mustard seeds helps reducing the severity of asthma attacks and certain symptoms of rheumatoid arthritis. Gives relief from migraine. Rich in calcium, manganese, omega 3 fatty acids, iron, zinc, protein and dietary fibre.', 0, '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `review` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `order_id`, `product_id`, `rating`, `review`) VALUES
(1, 25, 32, 28, 5, 'Fresh product!'),
(2, 25, 32, 11, 5, 'Spicy!');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(75) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `password`, `added_on`) VALUES
(25, 'Sourav Bannerjee', 'sb@gmail.com', '3245189732', '123', '2024-07-18 07:16:50'),
(26, 'Mayank Sharma', 'ms@gmail.com', '1234567890', '123', '2024-07-19 01:57:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `reviews_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
