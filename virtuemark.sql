-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th1 03, 2022 lúc 02:20 PM
-- Phiên bản máy phục vụ: 8.0.21
-- Phiên bản PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `virtuemark`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbn_account`
--

DROP TABLE IF EXISTS `tbn_account`;
CREATE TABLE IF NOT EXISTS `tbn_account` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_german2_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_german2_ci NOT NULL,
  `typeaccount_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8_german2_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_german2_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_german2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Đang đổ dữ liệu cho bảng `tbn_account`
--

INSERT INTO `tbn_account` (`id`, `username`, `password`, `typeaccount_id`, `name`, `phone`, `address`) VALUES
(23, 'minhkiet@gmail.com', 'c81e728d9d4c2f636f067f89cc14862c', 31, 'Minh kiệt 2', '987866', 'Binh Minh Hue'),
(22, 'quanghuy@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 3, 'Quang Huy', '987639', 'Hue'),
(11, 'cho', 'bb97354e4173df9819936fabcfcabecf', 1, 'Nguyễn Tấn Phúc', '097968936', 'lầm Đồng ,Bình Dương'),
(12, 'meo', 'c3d113f1ad562ac247f7e2a852f1b1f0', 3, 'Đinh Hình Huy', '', ''),
(15, 'phus@gmail.com', 'phu', 31, '', '', ''),
(16, 'chobee@gmail.com', 'chobee', 31, '', '', ''),
(17, 'cho@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 31, '', '', ''),
(18, 'thinh123', '87ef067531ad5e77c15a8709c37953ef', 1, '', '', ''),
(20, 'tanphuc', 'c4ca4238a0b923820dcc509a6f75849b', 1, 'Nguyen Tan Phuc', '09739732', 'Quang Nam'),
(21, 'honbi', 'c4ca4238a0b923820dcc509a6f75849b', 31, 'hon bi', '2323', 'address'),
(24, 'minh@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 3, 'Trần Châu Minh', '0986864', 'Vũng Tàu'),
(25, 'tanphucnguyen@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 33, 'tấn phúc', '099898', 'huế');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbn_category`
--

DROP TABLE IF EXISTS `tbn_category`;
CREATE TABLE IF NOT EXISTS `tbn_category` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_german2_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_german2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Đang đổ dữ liệu cho bảng `tbn_category`
--

INSERT INTO `tbn_category` (`id`, `name`, `image`) VALUES
(25, 'Furniture', 'Category_219.jpg'),
(24, 'Clothing', 'Category_537.jpg'),
(26, 'Cosmetic', 'Category_542.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbn_comment`
--

DROP TABLE IF EXISTS `tbn_comment`;
CREATE TABLE IF NOT EXISTS `tbn_comment` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `account_id` int NOT NULL,
  `description` varchar(255) COLLATE utf8_german2_ci NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Đang đổ dữ liệu cho bảng `tbn_comment`
--

INSERT INTO `tbn_comment` (`id`, `account_id`, `description`, `product_id`) VALUES
(6, 23, 'giao hàng nhanh\r\n', 37),
(7, 23, 'giao hàng nhanh , đóng gói kỉ càng , lên dang đẹp lắm', 52),
(8, 23, 'giá nào của náy bạn ơi', 52),
(9, 23, 'giao hàng nhanh', 36),
(10, 23, 'chủ shop nhiệt tình lắm, tư vấn rất nhiệt tình\r\n', 14);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbn_order`
--

DROP TABLE IF EXISTS `tbn_order`;
CREATE TABLE IF NOT EXISTS `tbn_order` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int NOT NULL,
  `user_id` int NOT NULL,
  `status` varchar(50) COLLATE utf8_german2_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=93 DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Đang đổ dữ liệu cho bảng `tbn_order`
--

INSERT INTO `tbn_order` (`id`, `product_id`, `price`, `quantity`, `user_id`, `status`, `date`) VALUES
(78, 47, '200.00', 5, 22, 'received', '2021-12-13 08:09:55'),
(92, 60, '12.00', 2, 24, 'accepted', '2021-12-21 07:59:12'),
(73, 28, '100.99', 12, 22, 'received', '2021-12-12 13:47:32'),
(65, 45, '205.99', 1, 23, 'ordered', '2021-12-12 08:06:52'),
(64, 46, '248.99', 1, 23, 'ordered', '2021-12-12 08:06:50'),
(66, 44, '370.99', 1, 23, 'ordered', '2021-12-12 08:06:54'),
(76, 28, '100.99', 1, 22, 'ordered', '2021-12-12 13:49:29'),
(81, 21, '260.99', 2, 22, 'ordered', '2021-12-16 07:25:23'),
(84, 22, '130.99', 1, 22, 'ordered', '2021-12-19 08:33:15'),
(86, 59, '120.00', 15, 22, 'accepted', '2021-12-19 14:47:14'),
(87, 59, '120.00', 100, 22, 'accepted', '2021-12-19 15:15:18'),
(88, 59, '120.00', 1, 22, 'ordered', '2021-12-19 15:16:01'),
(89, 23, '140.99', 1, 22, 'chose', '2021-12-20 08:30:13'),
(90, 24, '150.99', 4, 22, 'chose', '2021-12-20 08:30:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbn_product`
--

DROP TABLE IF EXISTS `tbn_product`;
CREATE TABLE IF NOT EXISTS `tbn_product` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_german2_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_german2_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `product_category_id` int NOT NULL,
  `status` varchar(50) COLLATE utf8_german2_ci NOT NULL,
  `vendor_id` int NOT NULL,
  `image` varchar(250) COLLATE utf8_german2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Đang đổ dữ liệu cho bảng `tbn_product`
--

INSERT INTO `tbn_product` (`id`, `name`, `description`, `price`, `product_category_id`, `status`, `vendor_id`, `image`) VALUES
(14, 'Formal Blue Shirt', 'The Oversized Boxy T-shirt is an oversized, relaxed style. The fit is much looser and more boxy than our regular T-shirts.', '45.99', 20, 'Yes', 1, 'product_389.jpg'),
(47, 'Men Jacket Sample Description', 'Long sleeve insulated melton wool and grained calfskin bomber jacket colorblocked in black and white.', '210.00', 20, 'No', 22, 'product_895.jpg'),
(15, 'Gabi Full Sleeve Sweatshirt', 'This jacket from Versace features a front zip fastening, long sleeves, elasticated hem and cuffs, a hood, stitched panels, front pockets and logo bands print all over. ', '45.99', 20, 'Yes', 2, 'product_626.jpg'),
(16, 'Dark Blue Track Pants', '100% Cotton\r\nMade in Italy\r\n\r\nDesigner Model Number: NUW21311\r\nDesigner Colour: 009dep', '80.99', 20, 'Yes', 2, 'product_719.jpg'),
(17, 'Round Neck Black T-Shirt', '100% Cotton\r\nMade in Japan\r\n\r\nDesigner Model Number: JGT031051\r\nDesigner Colour: 2', '190.99', 20, 'Yes', 0, 'product_739.jpg'),
(18, 'Men Black Jeans', 'Kids Black Cashmere Louie Lounge Pants\r\nRelaxed-fit knit cashmere lounge pants in black.\r\n\r\n· Mid-rise\r\n· Elasticized waistband for a comfortable fit\r\n· Rib knit cuffs', '60.99', 20, 'Yes', 3, 'product_968.jpg'),
(19, 'Analog Watch', 'The Nomos Glashütte 1303 is from the Autobahn Neomatik 41 Date Sports Gra Automatic Silver Dial 41.0mm Men Watches collection. ', '1000.00', 20, 'Yes', 1, 'product_351.jpg'),
(20, 'Reversible Belt', 'Co-founded in 2002 by British designers Marcus Wainwright and David Neville, New York-based label Rag & Bone distinguished itself by combining British style with directional, modern design.', '30.99', 20, 'Yes', 2, 'product_923.jpg'),
(21, 'Party Men Blazer', 'Reverse in technical satin in orange featuring graphic printed in black at back.', '260.99', 20, 'Yes', 1, 'product_746.jpg'),
(22, 'A-line Black Skirt', '88% Recycled Polyamide, 12% Recycled Spandex\r\nMade in Portugal\r\n\r\nDesigner Model Number: T068ICONWFW21JERPA0001\r\nDesigner Colour: 02', '130.99', 21, 'Yes', 2, 'product_80.jpg'),
(23, 'Sleeveless Solid Blue Top', '100% Silk, 96% Viscose, 4% Elastane\r\nMade in Italy\r\n\r\nDesigner Model Number: NPWB442606STGR\r\nDesigner Colour: U807', '140.99', 21, 'Yes', 2, 'product_755.jpg'),
(24, 'Skinny Jeans', 'Straight-leg stretch denim jeans in blue. Mid-rise. Five-pocket styling. Belt loops at waistband. Tonal logo printed at front.', '150.99', 21, 'Yes', 2, 'product_577.jpg'),
(25, 'Black Basic Shorts', 'The 365 shorts are made from 100% Organic Cotton. They are a medium weight fabric, with a loop back texture inside and a finishing that provides extra softness.', '120.99', 21, 'Yes', 2, 'product_685.jpg'),
(26, 'Recycled Cashmere Track Pants', 'These Track Pants have a ribbed, elasticated waistband, ribbed cuffs at the hem, drawstring and two side pockets. The relaxed fit is easy to wear running errands or lounging at home.', '220.99', 21, 'Yes', 3, 'product_809.jpg'),
(27, 'Analog Watch', 'Gold-tone 18kt rose gold case with a black rubber strap. Fixed gold-tone diamond set bezel. Black dial with gold-tone hands. Dial Type: Analog. Hublot Calibre HUB1213 automatic movement with a 72-hour power reserve.', '320.99', 21, 'Yes', 3, 'product_274.jpg'),
(28, 'Ankle Length Socks', 'Black Classic Logo Socks\r\nAnkle-high cotton stretch socks in black featuring jacquard knit text and logo in yellow throughout. Rib knit cuffs.', '100.99', 21, 'Yes', 3, 'product_974.jpg'),
(29, 'Reebok Women Tights', 'From studio day to cardio session, these women high-rise leggings are a workout essential. Soft and full of stretch, they move with you as you pose, stretch or flex. They pair well with a crop top of your choice.', '130.99', 21, 'Yes', 1, 'product_690.jpg'),
(30, 'Lorem Ipsum 2015', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in ullamcorper ligula. Proin nec lectus eget nulla gravida imperdiet. In dapibus eget nisi non efficitur. Sed consequat mi libero, sed tincidunt ante pretium eu.', '991.00', 22, 'Yes', 20, 'product_582.jpg'),
(31, 'Maimz Sofa', 'The UberLight Flex is a professional worklight originally designed for manufacturing applications. The owner of the company, an audiophile himself, discovered the UberLight could also function as a high-quality turntable lamp.', '800.99', 23, 'Yes', 2, 'product_548.jpg'),
(32, 'Darcy Sofa', 'Linsy Luxury European Classic Style Couch Sofa Set Home Decor 1 2 3 6 7 Seater Gray Sectional Sofa Living Room Furniture RAG1K', '369.99', 22, 'Yes', 2, 'product_361.jpg'),
(33, 'Jarreau Sofa Chaise Sleeper', 'Sofa L (Left Corner) 1516 attracts at first sight by its simplicity and elegance. High quality fabric, soft and supple, with good elasticity. High-quality PVC material, durable, good-strength seat cushion, does not collapse when used.', '579.99', 22, 'Yes', 2, 'product_302.jpg'),
(34, 'Caladeron Sofa', ' High quality PVC material, durable seat cushion, good bearing capacity, will not collapse when used. With an integrated design, the user can sit and stretch his legs or lie down. ', '588.99', 22, 'Yes', 2, 'product_780.png'),
(35, 'Alcona Sofa', 'Our Wendy Egyptian Cotton Duvet Cover Set is a must-have in every home. It is a piece that can be used over and over again for years to come without any fear of clashing with changing trends. The versatile design is anchored with simplicity and keeps the ', '800.99', 25, 'Yes', 2, 'product_333.jpg'),
(36, 'Jesolo Manual Reclining Sofa', ' With an integrated design, the user can sit and stretch his legs or lie down. The wooden chair frame is carefully processed, providing a feeling of safety. Under the sofa with the floor, short sofa legs, good bearing have the right distance to help users', '699.99', 22, 'Yes', 3, 'product_604.jpg'),
(37, 'Accrington Sofa', ' With an integrated design, the user can sit and stretch his legs or lie down. The wooden chair frame is carefully processed, providing a feeling of safety. Under the sofa with the floor, short sofa legs, good bearing have the right distance to help users', '546.99', 22, 'Yes', 3, 'product_523.jpg'),
(38, 'Gerdanet Coffee Table with Lift Top', 'Zhida High Quality Italian Style Modern Chinese Home Furniture Living Room Fabric Leather Modular L Shape Sectional Sofa for Villa', '153.99', 23, 'Yes', 2, 'product_444.jpg'),
(39, 'Carynhurst Coffee Table', 'Decorate your room and complete it with a tropical-inspired tree shape Palmera floor and table lamp. The body is masterfully shaped to imitate the palm tree, and decorated with leaf-like ostrich feathers on top to create tropical motives in your space. ', '317.99', 23, 'Yes', 0, 'product_751.jpg'),
(40, 'Haroflyn Coffee Table', 'Decorate your room and complete it with a tropical-inspired tree shape Palmera floor and table lamp. The body is masterfully shaped to imitate the palm tree, and decorated with leaf-like ostrich feathers on top to create tropical motives in your space. ', '228.99', 23, 'Yes', 21, 'product_796.jpg'),
(41, 'Wynora Coffee Table', 'Mix some vibrant warm themes into your casual sleeping space decor, with Egyptian cotton and avian prints of the Solarosa bedding set. Made of silky and soft Egyptian cotton with beautiful birds and plants prints on it, the set brings coziness and warmth ', '186.99', 23, 'Yes', 3, 'product_176.jpg'),
(42, 'Wystfield Coffee Table', 'We sparingly used embroidery in our Anahi Egyptian Cotton Duvet Cover Set to ensure that tradition and modernity could easily be balanced in the piece.', '548.99', 23, 'Yes', 1, 'product_297.jpg'),
(43, 'Kelton Coffee Table with Nesting Stools', 'Stop fussing with having to deal with layers of useless blankets every night, switch them all out with just one, our Fargo Quilted Comforter, and find yourself snug and cozy throughout the year.', '197.99', 23, 'Yes', 2, 'product_730.jpg'),
(44, 'Shawnalore Coffee Table', 'Stop fussing with having to deal with layers of useless blankets every night, switch them all out with just one, our Fargo Quilted Comforter, and find yourself snug and cozy throughout the year.', '370.99', 23, 'Yes', 6, 'product_159.jpg'),
(45, 'Arlenbry Coffee Table', 'The oak top layer enhances the plank feeling and details like the floating table top and dovetail joints give the table a crafted look. A table full of character and plenty of room for family and friends.', '205.99', 23, 'Yes', 232, 'product_388.jpg'),
(46, 'Calmoni Coffee Table', 'Tables are used to work, place computers, study lights, books, documents, often placed in offices, study corners. Due to this nature, it often comes with additional drawers, power sockets, etc. and shares the same design.', '248.99', 23, 'Yes', 3, 'product_325.jpg'),
(59, 'ANGEL TEE SHIRT', '100% Supima cotton for a high-quality feel. A basic item that goes with any look.', '120.00', 20, 'Yes', 22, 'product_114.jpg'),
(52, 'MEN Supima Cotton Crew Neck Short Sleeve T-Shirt', 'The brown color brings out your honest look while this chocolate leather motorcycle is superior and modish will give you just the right look to make a status statement and will be a staple item in your closet all year long and for years to come.', '230.00', 20, 'Yes', 22, 'product_203.jpg'),
(60, 'shirt T26', 'As classic as they come, this is the garment that speaks to every man. Designed to stand the test of time, our signature straight-cut crew neck T-Shirt is made from premium heavyweight Egyptian cotton jersey and accentuated with a ribbed neckline. ', '12.00', 24, 'Yes', 22, 'product_821.jpg'),
(64, 'Colorful Flowers Checkered Blouse in Blue and Green', 'BAMBINIFASHION looks to the future of children’s clothing to anticipate the needs of our clients by offering a mix of high-end European labels like Gucci, Fendi and Dolce & Gabbana as well as artisanal up-and-coming labels.', '90.00', 24, 'Yes', 24, 'product_272.jpg'),
(61, 'MOLO', 'Molo has one mission – to dress children in splendid, bright colors and make them look adorable. They are doing a stellar job thanks to their playful colors, imaginative prints, and whimsical designs.', '80.00', 24, 'Yes', 24, 'product_154.jpg'),
(63, 'Boundary Print Tunic-Hoodie in Blue and Red', 'Full of vibrant hues, feminine silhouettes, and imaginative illustrations, Spanish label Rosalita Senoritas is ideal for parties or any occasion girls want to stand out from the crowd. ', '100.00', 24, 'Yes', 24, 'product_379.jpg'),
(65, 'Paradise Garden Print Long-Sleeved T-Shirt in Light Blue', 'PRODUCT FEATURES\r\nPerfect for everyday styling\r\nFloral print\r\nPerfect for active kids\r\nStretch Cotton', '100.00', 24, 'Yes', 24, 'product_435.jpg'),
(66, 'Stella Loves Print Dress with Shorties in Pink', 'The label  collection is 85% sustainable This design is composed of 100% lycoell twill. The pretty bloomers boast a comfortable, elasticated fit, perfect for active babies learning to crawl or walk.', '112.00', 24, 'waiting', 24, 'product_44.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbn_product_category`
--

DROP TABLE IF EXISTS `tbn_product_category`;
CREATE TABLE IF NOT EXISTS `tbn_product_category` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_german2_ci NOT NULL,
  `category_id` int NOT NULL,
  `image` varchar(255) COLLATE utf8_german2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Đang đổ dữ liệu cho bảng `tbn_product_category`
--

INSERT INTO `tbn_product_category` (`id`, `name`, `category_id`, `image`) VALUES
(24, 'Child', 24, 'type_product_566.jpg'),
(21, 'Women', 24, 'type_product_57.jpg'),
(23, 'Table', 25, 'type_product_791.jpg'),
(20, 'Men', 24, 'type_product_103.jpg'),
(22, 'Sofas', 25, 'type_product_902.jpg'),
(25, 'Bed', 25, 'type_product_666.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbn_typeaccount`
--

DROP TABLE IF EXISTS `tbn_typeaccount`;
CREATE TABLE IF NOT EXISTS `tbn_typeaccount` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_german2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Đang đổ dữ liệu cho bảng `tbn_typeaccount`
--

INSERT INTO `tbn_typeaccount` (`id`, `name`) VALUES
(1, 'Admin'),
(3, 'Seller'),
(33, 'Pending'),
(31, 'Customer');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
