-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2021 at 01:24 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoppingcart`
--

-- --------------------------------------------------------

--
-- Table structure for table `customerorder`
--

CREATE TABLE `customerorder` (
  `customerid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `Total_Bill` varchar(50) NOT NULL,
  `order_number` varchar(222) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customerorder`
--

INSERT INTO `customerorder` (`customerid`, `username`, `Total_Bill`, `order_number`, `Date`) VALUES
(1, 'tejas', '60.21', '202106083720', '2021-06-08 06:00:36'),
(27, '', '20.97', '202106086331', '2021-06-08 00:00:00'),
(28, 'tejas', '27.96', '202106085427', '2021-06-08 00:00:00'),
(29, 'tejas', '31.95', '202106083043', '2021-06-08 05:37:31'),
(30, 'tejas', '2.38', '202106085722', '2021-06-08 05:48:56'),
(31, 'tejas', '6.99', '202106083845', '2021-06-08 05:49:57'),
(32, 'tejas', '39.09', '202106082818', '2021-06-08 05:55:51'),
(33, 'tejas', '69.96', '20210608308', '2021-06-08 06:15:55'),
(34, 'tejas', '79.95', '202106085352', '2021-06-08 06:21:21'),
(35, 'tejas', '86.94', '20210608427', '2021-06-08 06:36:48'),
(36, 'tejas', '89.32', '202106087235', '2021-06-08 06:39:26'),
(37, 'tejas', '4.99', '20210608210', '2021-06-08 07:35:53'),
(38, 'tejas', '11.9', '202106084567', '2021-06-08 08:03:43'),
(39, 'tejas', '37.27', '202106081593', '2021-06-08 11:11:01'),
(40, 'ravi', '26.94', '20210609625', '2021-06-09 12:45:01'),
(41, 'ravi', '36.93', '202106092985', '2021-06-09 12:45:31'),
(42, 'ravi', '36.93', '202106094189', '2021-06-09 12:49:39'),
(43, 'abc', '6.99', '202106094847', '2021-06-09 05:44:38'),
(44, 'abc', '24.96', '202106096691', '2021-06-09 05:45:19'),
(45, 'tejas', '19.96', '202106099950', '2021-06-09 03:19:47'),
(46, 'pargol', '133.83', '202106091359', '2021-06-09 03:47:41'),
(47, 'pargol', '2.99', '202107068713', '2021-07-06 06:39:55'),
(48, 'pargol', '2.99', '202107065689', '2021-07-06 06:43:07'),
(49, 'pargol', '2.99', '202107065716', '2021-07-06 07:08:24'),
(50, 'pargol', '2.99', '202107079996', '2021-07-07 11:33:42'),
(51, 'pargol', '2.99', '202107078216', '2021-07-07 11:34:07'),
(52, 'pargol', '2.99', '202107076694', '2021-07-07 11:34:34'),
(53, 'pargol', '2.99', '202107072017', '2021-07-07 11:34:51'),
(54, 'pargol', '2.99', '202107073840', '2021-07-07 11:44:13');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `desc` text NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `rrp` decimal(7,2) NOT NULL DEFAULT 0.00,
  `quantity` int(11) NOT NULL,
  `img` text CHARACTER SET latin1 NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `desc`, `price`, `rrp`, `quantity`, `img`, `date_added`) VALUES
(1, 'Spinach', 'Spinach, Spinacia oleracea, is a leafy herbaceous annual plant in the family Amaranthaceae grown for its leaves which are used as a vegetable. The spinach plant has simple leaves which stem from the center of the plant and measure about 2–30 cm (0.8–12.0 in) long and 1 to 15 cm (0.4–6.0 in) across. ', '3.00', '0.00', 19, 'https://i5.walmartimages.ca/images/Enlarge/094/416/6000200094416.jpg', '0000-00-00 00:00:00'),
(2, 'Lemon', 'Lemon, Citrus limon, is a small evergreen tree in the family Rutaceae grown for its edible fruit which, among other things, are used in a variety of foods and drinks. The tree has a spreading, upright growth habit, few large branches and stiff thorns. The tree possesses large, oblong or oval, light green leaves and produces purple-white flowers in clusters. ', '2.38', '0.00', 17, 'https://i5.walmartimages.ca/images/Large/094/504/6000200094504.jpg', '0000-00-00 00:00:00'),
(3, 'Potato 4lb', 'Potato, Solanum tuberosum, is an herbaceous perennial plant in the family Solanaceae which is grown for its edible tubers. The potato plant has a branched stem and alternately arranged leaves consisting of leaflets which are both of unequal size and shape. The leaflets can be oval to oblong in shape and the leaves can reach 10–30 cm (4–12 in) in length and 5–15 cm (2–6 in) wide. ', '6.99', '0.00', 20, 'https://i5.walmartimages.ca/images/Large/094/563/6000200094563.jpg', '0000-00-00 00:00:00'),
(4, 'Bell pepper ', 'Bell peppers, Capsicum annuum are a cultivar group of annual or perennial plants in the family Solanaceae grown for their edible fruits. Bell pepper plants are short bushes with woody stems that grow brightly colored fruits. The alternating leaves are elliptical, smooth edged, and come to a distinct point.', '3.99', '0.00', 44, 'https://i5.walmartimages.ca/images/Large/284/684/6000191284684.jpg', '0000-00-00 00:00:00'),
(5, 'Coriander/Cilantro', 'Coriander, Coriandrum sativum, is an erect annual herb in the family Apiaceae. The leaves of the plant are variable in shape, broadly lobed at the base of the plant, and slender and feathery higher on the flowering stems. It is a soft, hairless plant. The flowers are produced in small umbels and are white or very pale pink in color with the petals pointing away from the centre of the umbel longer than those pointing towards it.', '3.99', '0.00', 33, 'https://i5.walmartimages.ca/images/Enlarge/094/548/6000200094548.jpg', '0000-00-00 00:00:00'),
(6, 'Cauliflower', 'Cauliflower, Brassica oleracea var. botrytis, is an herbaceous annual or biennial vegetable plant in the family Brassicaceae grown for its edible head. The head is actually a mass of abortive flowers (flowers which are unable to produce fruit or seed as they possess only female reproductive organs; the male organs are either underdeveloped or totally lacking).', '2.99', '0.00', 16, 'https://i5.walmartimages.ca/images/Large/272/324/6000191272324.jpg', '0000-00-00 00:00:00'),
(7, 'Broccoli', 'Broccoli, Brassica oleracea, is an herbaceous annual or biennial grown for its edible flower heads which are used as a vegetable. The broccoli plant has a thick green stalk, or stem, which gives rise to thick, leathery, oblong leaves which are gray-blue to green in color.', '3.99', '0.00', 12, 'https://i5.walmartimages.ca/images/Large/094/505/6000200094505.jpg', '0000-00-00 00:00:00'),
(8, 'Pepper- Green', ' Pepper plants can grow 1 m (3.3 ft) tall and are usually grown as annuals in temperate regions for only one growing season. Bell pepper may be referred to as red pepper, yellow pepper or green pepper and is believed to have originated in Central and South America.', '3.49', '0.00', 18, 'https://i5.walmartimages.ca/images/Large/287/775/6000191287775.jpg', '0000-00-00 00:00:00'),
(10, 'Banana -1lb', 'The banana plant, Musa paradisiaca, is the world\'s largest herbaceous perennial plant and belongs to the family Musaceae. It is grown for it\'s fleshy, curved banana fruit. The plant is tall, tropical and tree-like with a sturdy main pseudostem (not a true stem as it is made of rolled leaf bases) with the leaves arranged spirally at the top.', '2.99', '0.00', 23, 'https://i5.walmartimages.ca/images/Large/580/6_r/875806_R.jpg', '0000-00-00 00:00:00'),
(11, 'Apple 1lb', 'Apple, Malus domestica, is a deciduous tree in the family Rosaceae which is grown for its fruits, known as apples. Apple fruits are one of the most widely cultivated fruits in the world, are round (pome) in shape and range in color from green to red. When planted from a seed, an apple tree can take six to ten years to mature and produce fruit of its own. ', '4.99', '0.00', 14, 'https://i5.walmartimages.ca/images/Large/094/514/6000200094514.jpg', '0000-00-00 00:00:00'),
(12, 'Orange', 'Orange, Citrus sinensis, is an evergreen tree in the family Rutaceae grown for its edible fruit. The orange tree is branched with a rounded crown and possesses elliptical or oval leaves which are alternately arranged on the branches. The leaves have narrowly winged petioles, a feature that distinguishes it from bitter orange, which has broadly winged petioles.', '4.99', '0.00', 26, 'https://i5.walmartimages.ca/images/Large/234/6_r/6000191272346_R.jpg', '0000-00-00 00:00:00'),
(13, 'Grapes', 'The Common or European grapevine (Vitis vinifera) is a long stemmed, woody vine (liana) which produces high value berries, or grapes. The vines can reach lengths in excess of 30 m and can live for many years with proper management. The leaves of the grape vine are alternately arranged on the stem and are long and broad with 5–7 lobes, typically reaching sizes of 5–20 cm (2.0–7.9 in).', '5.99', '0.00', 30, 'https://i5.walmartimages.ca/images/Large/557/738/6000200557738.jpg', '0000-00-00 00:00:00'),
(100, 'Quebon 1%', 'Why change tradition ? Québon partly skimmed 1% milk combine all the great taste and freshness of Quebec\'s milk with many vitamins and minerals necessary to the maintenance of good health. From our farms to your family.\r\n• No antibiotics or artificial growth hormones*\r\n• Milk is a preservative-free dairy product\r\n• Pure taste\r\n• Naturally gluten-free\r\n• Only quality Canadian milk—always fresh and wholesome\r\n• An excellent source of vitamin D and calcium', '6.99', '0.00', 55, 'https://i5.walmartimages.ca/images/Large/231/001/6000203231001.jpg', '0000-00-00 00:00:00'),
(101, 'Yogurt', 'Astro Original Balkan yogourt is made with 100% all-natural ingredients.\r\n\r\nIt’s thick and creamy with only 3 ingredients: skim milk, cream and active bacterial cultures.\r\n\r\nGreat for cooking and baking – be sure to try it in all your favourite recipes. The way yogourt is meant to be.\r\n\r\nThick, rich and creamy\r\nMade from natural ingredients\r\n100% kosher\r\nContain no gelatin', '2.99', '0.00', 30, 'https://i5.walmartimages.ca/images/Large/075/015/999999-Main_6820075015.jpg', '0000-00-00 00:00:00'),
(102, 'Omega-3 Eggs 18 Count', 'Nutri Omega-3 large white eggs are a good choice for a healthier diet for your family, with 75mg of polyunsaturated DHA-Omega-3 per egg. Also an excellent source of vitamin E.\r\n• Pack of 18 large white eggs\r\n• Nutri Omega-3 eggs are an excellent source of vitamin E', '3.59', '0.00', 17, 'https://i5.walmartimages.ca/images/Large/011/626/999999-061719011626.jpg', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `create_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `create_datetime`) VALUES
(4, 'tejas', '$2y$10$WrWMdpEVrCJQfop/OtAJauL/jdasS9.ypAXjbTt.hhVEHQabPGIgK', '2021-05-24 16:23:47'),
(5, 'urvee01', '$2y$10$jNvo4tKSIV.eYLQMk6FiEuSEfx7w2n34ht3cvbDRfhHq1GwHw3ZbG', '2021-05-25 21:27:52'),
(6, 'abc', '$2y$10$I5ekAb/tJUe2mnXjp1ugUuxyt6IewAs0lSFrJ2TX/5GuHyKgf4fwu', '2021-06-08 14:34:56'),
(7, 'ravi', '$2y$10$dR3wAXeYJ4VDbiYpzXkCm.YNA5Rwd8WETNWYKhf68vog5/xrTeuvy', '2021-06-08 18:44:32'),
(8, 'pargol', '$2y$10$DWwj7rO0bCaEfBkBGoMi2.Ww1T8HIxUYF2zZ3Q1PP0NBHhzM109Um', '2021-06-09 09:45:10'),
(9, 'abcd', '$2y$10$F6vFIzUmLKIvIDGCJOccduNs2OT7wRSZJTdANtyNI04E8DIBgT9vO', '2021-06-14 19:34:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customerorder`
--
ALTER TABLE `customerorder`
  ADD PRIMARY KEY (`customerid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customerorder`
--
ALTER TABLE `customerorder`
  MODIFY `customerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
