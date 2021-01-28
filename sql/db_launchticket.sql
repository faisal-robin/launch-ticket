-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2021 at 08:06 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_launchticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_source` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `booking_tax_percent` double(3,2) NOT NULL,
  `booking_tax_amount` double(25,2) NOT NULL,
  `booking_discount_amount` double(25,2) NOT NULL,
  `booking_sub_total` double(25,2) NOT NULL,
  `booking_grand_total` double(25,2) NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `booking_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `booking_code`, `customer_id`, `customer_name`, `status`, `booking_tax_percent`, `booking_tax_amount`, `booking_discount_amount`, `booking_sub_total`, `booking_grand_total`, `transaction_id`, `currency`, `phone`, `email`, `address`, `booking_date`, `created_at`, `updated_at`) VALUES
(1, 'B-123', 25, 'Faisal robin', 'Processing', 0.00, 0.00, 0.00, 500.00, 500.00, '6005248d99d56', 'BDT', NULL, NULL, NULL, '2021-01-18', NULL, NULL),
(2, 'B-123', 26, 'sfsdaf sdfsadf', 'Processing', 0.00, 0.00, 0.00, 500.00, 500.00, '60066a40ac2aa', 'BDT', NULL, NULL, NULL, '2021-01-19', NULL, NULL),
(3, 'B-123', 27, 'sfsadf asdf sdfsadfsda', 'Processing', 0.00, 0.00, 0.00, 500.00, 500.00, '60066aa9cad93', 'BDT', NULL, NULL, NULL, '2021-01-19', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `launch_schedule_id` bigint(20) UNSIGNED NOT NULL,
  `launch_room_id` bigint(20) UNSIGNED NOT NULL,
  `booking_room_price` double(25,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`id`, `booking_id`, `launch_schedule_id`, `launch_room_id`, `booking_room_price`, `created_at`, `updated_at`) VALUES
(1, 1, 9, 5, 500.00, '2021-01-18 00:02:53', '2021-01-18 00:02:53'),
(2, 2, 10, 5, 500.00, '2021-01-18 23:12:32', '2021-01-18 23:12:32'),
(3, 3, 10, 5, 500.00, '2021-01-18 23:14:17', '2021-01-18 23:14:17');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `category_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_cover_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_thumbnail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_menu_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_page_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `category_name`, `slug`, `category_description`, `category_cover_image`, `category_thumbnail`, `category_menu_image`, `meta_title`, `meta_description`, `meta_keywords`, `home_page_status`, `created_at`, `updated_at`) VALUES
(2, NULL, 'Cabin', 'cabin', NULL, 'category/category_cover/fOr1Es2OOh8PMyYfU3OBZt6lDu6U1azRkFN5pTJf.png', 'category_thumbnail/fOr1Es2OOh8PMyYfU3OBZt6lDu6U1azRkFN5pTJf.png', 'category/category_menu/nwD4ysGWG2PsxRyHLKy1cgB5TV3iFQrvAvcLbKLk.png', NULL, NULL, NULL, 0, '2020-11-16 02:14:29', '2020-12-27 02:37:52'),
(4, 2, 'Vip', 'vip', NULL, 'category/category_cover/7Nn6dtwAQ6ZXSjHIE6vTj3cZCSnt0CNtXCT8hC2e.png', 'category/category_thumbnail/7Nn6dtwAQ6ZXSjHIE6vTj3cZCSnt0CNtXCT8hC2e.png', 'category/category_menu/FhBv4PQj3Ynw3BHAYdbh6r2t3XFXsQnCtb6Nmwg7.png', NULL, NULL, NULL, 0, '2020-12-27 02:39:09', '2020-12-27 02:39:09'),
(5, 2, 'Sami Vip', 'sami-vip', NULL, 'category/category_cover/saTOVoLWNbdtdaLz6coWbkYEptvjMDsneoprNo7p.png', 'category/category_thumbnail/saTOVoLWNbdtdaLz6coWbkYEptvjMDsneoprNo7p.png', 'category/category_menu/POuKeTtn4s7hsnkZaSlTN2BwCbvZsX9BnhtHdKKy.png', NULL, NULL, NULL, 0, '2020-12-27 02:39:32', '2020-12-27 02:39:32'),
(6, 2, 'Normal', 'normal', NULL, 'category/category_cover/9e4rPI2Pq05UhJeZ8bqFhni3JVzBD0gNkmavQW1D.png', 'category/category_thumbnail/9e4rPI2Pq05UhJeZ8bqFhni3JVzBD0gNkmavQW1D.png', 'category/category_menu/b9OLjZUvSDKoophQkRYKpBh57GVPGotCCd5BLUMx.png', NULL, NULL, NULL, 0, '2020-12-27 02:39:56', '2020-12-27 02:39:56'),
(7, 4, 'Single', 'single', NULL, 'category/category_cover/ZI639dfRqAHmgDdLhRa5EG6YYD6yZWWhEyk8zoSK.png', 'category/category_thumbnail/ZI639dfRqAHmgDdLhRa5EG6YYD6yZWWhEyk8zoSK.png', 'category/category_menu/GKkCyw6HgYOGkgT3Brji3N5FH90hWeMDcz76roKy.png', NULL, NULL, NULL, 0, '2020-12-27 02:40:31', '2020-12-27 02:40:31'),
(8, 4, 'Double', 'double', NULL, 'category/category_cover/9IzjlRZANLFhJ99LrGcanKNzzQJhzhPVuz5xwHSC.png', 'category/category_thumbnail/9IzjlRZANLFhJ99LrGcanKNzzQJhzhPVuz5xwHSC.png', 'category/category_menu/5d3EcdpB99Bb1mRqlrspaPDMeom5TCWe7quQmoKR.png', NULL, NULL, NULL, 0, '2020-12-27 02:40:52', '2020-12-27 02:40:52'),
(9, 4, 'Family', 'family', NULL, 'category/category_cover/oo94VP8olmiBRs0VlWgWJofLBTW3qmGwnRwlUhdN.png', 'category/category_thumbnail/oo94VP8olmiBRs0VlWgWJofLBTW3qmGwnRwlUhdN.png', 'category/category_menu/EAItZBWFRvtzG0dXEhZbhL2ERDInxZuQFrZe45Sb.png', NULL, NULL, NULL, 0, '2020-12-27 02:41:21', '2020-12-27 02:41:21');

-- --------------------------------------------------------

--
-- Table structure for table `company_info`
--

CREATE TABLE `company_info` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_email` varchar(255) DEFAULT NULL,
  `company_phone` varchar(30) DEFAULT NULL,
  `company_image` text NOT NULL,
  `company_thumbnail` varchar(255) DEFAULT NULL,
  `company_summary` text DEFAULT NULL,
  `facebook_link` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `pinterest_link` varchar(255) DEFAULT NULL,
  `google_link` varchar(255) DEFAULT NULL,
  `instagram_link` text DEFAULT NULL,
  `company_address` text NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `company_info`
--

INSERT INTO `company_info` (`id`, `company_name`, `company_email`, `company_phone`, `company_image`, `company_thumbnail`, `company_summary`, `facebook_link`, `twitter_link`, `pinterest_link`, `google_link`, `instagram_link`, `company_address`, `latitude`, `longitude`) VALUES
(5, 'M360 ICT', 'm360ict@gmail.com', '01797986445', 'company/PYbi3Chb10HwGJiBwjzXqaehOB6XLISNf5JaFWog.png', 'company/company_thumbnail/PYbi3Chb10HwGJiBwjzXqaehOB6XLISNf5JaFWog.png', 'M360 ICT is the service mark of Digital Business of M360 ICT, M360 ICT Consultants Ltd., M360 Consultants Ltd., ABH World Ltd, Digital 360 Ltd.', NULL, NULL, NULL, NULL, NULL, 'House: 24/A CWN (B), Road: 36\r\nGulshan 2, Dhaka – 1212, Bangladesh.', 23.7758, 90.4124);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `sortname` varchar(3) NOT NULL,
  `name` varchar(150) NOT NULL,
  `phonecode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `sortname`, `name`, `phonecode`) VALUES
(1, 'AF', 'Afghanistan', 93),
(2, 'AL', 'Albania', 355),
(3, 'DZ', 'Algeria', 213),
(4, 'AS', 'American Samoa', 1684),
(5, 'AD', 'Andorra', 376),
(6, 'AO', 'Angola', 244),
(7, 'AI', 'Anguilla', 1264),
(8, 'AQ', 'Antarctica', 0),
(9, 'AG', 'Antigua And Barbuda', 1268),
(10, 'AR', 'Argentina', 54),
(11, 'AM', 'Armenia', 374),
(12, 'AW', 'Aruba', 297),
(13, 'AU', 'Australia', 61),
(14, 'AT', 'Austria', 43),
(15, 'AZ', 'Azerbaijan', 994),
(16, 'BS', 'Bahamas The', 1242),
(17, 'BH', 'Bahrain', 973),
(18, 'BD', 'Bangladesh', 880),
(19, 'BB', 'Barbados', 1246),
(20, 'BY', 'Belarus', 375),
(21, 'BE', 'Belgium', 32),
(22, 'BZ', 'Belize', 501),
(23, 'BJ', 'Benin', 229),
(24, 'BM', 'Bermuda', 1441),
(25, 'BT', 'Bhutan', 975),
(26, 'BO', 'Bolivia', 591),
(27, 'BA', 'Bosnia and Herzegovina', 387),
(28, 'BW', 'Botswana', 267),
(29, 'BV', 'Bouvet Island', 0),
(30, 'BR', 'Brazil', 55),
(31, 'IO', 'British Indian Ocean Territory', 246),
(32, 'BN', 'Brunei', 673),
(33, 'BG', 'Bulgaria', 359),
(34, 'BF', 'Burkina Faso', 226),
(35, 'BI', 'Burundi', 257),
(36, 'KH', 'Cambodia', 855),
(37, 'CM', 'Cameroon', 237),
(38, 'CA', 'Canada', 1),
(39, 'CV', 'Cape Verde', 238),
(40, 'KY', 'Cayman Islands', 1345),
(41, 'CF', 'Central African Republic', 236),
(42, 'TD', 'Chad', 235),
(43, 'CL', 'Chile', 56),
(44, 'CN', 'China', 86),
(45, 'CX', 'Christmas Island', 61),
(46, 'CC', 'Cocos (Keeling) Islands', 672),
(47, 'CO', 'Colombia', 57),
(48, 'KM', 'Comoros', 269),
(49, 'CG', 'Republic Of The Congo', 242),
(50, 'CD', 'Democratic Republic Of The Congo', 242),
(51, 'CK', 'Cook Islands', 682),
(52, 'CR', 'Costa Rica', 506),
(53, 'CI', 'Cote D\'Ivoire (Ivory Coast)', 225),
(54, 'HR', 'Croatia (Hrvatska)', 385),
(55, 'CU', 'Cuba', 53),
(56, 'CY', 'Cyprus', 357),
(57, 'CZ', 'Czech Republic', 420),
(58, 'DK', 'Denmark', 45),
(59, 'DJ', 'Djibouti', 253),
(60, 'DM', 'Dominica', 1767),
(61, 'DO', 'Dominican Republic', 1809),
(62, 'TP', 'East Timor', 670),
(63, 'EC', 'Ecuador', 593),
(64, 'EG', 'Egypt', 20),
(65, 'SV', 'El Salvador', 503),
(66, 'GQ', 'Equatorial Guinea', 240),
(67, 'ER', 'Eritrea', 291),
(68, 'EE', 'Estonia', 372),
(69, 'ET', 'Ethiopia', 251),
(70, 'XA', 'External Territories of Australia', 61),
(71, 'FK', 'Falkland Islands', 500),
(72, 'FO', 'Faroe Islands', 298),
(73, 'FJ', 'Fiji Islands', 679),
(74, 'FI', 'Finland', 358),
(75, 'FR', 'France', 33),
(76, 'GF', 'French Guiana', 594),
(77, 'PF', 'French Polynesia', 689),
(78, 'TF', 'French Southern Territories', 0),
(79, 'GA', 'Gabon', 241),
(80, 'GM', 'Gambia The', 220),
(81, 'GE', 'Georgia', 995),
(82, 'DE', 'Germany', 49),
(83, 'GH', 'Ghana', 233),
(84, 'GI', 'Gibraltar', 350),
(85, 'GR', 'Greece', 30),
(86, 'GL', 'Greenland', 299),
(87, 'GD', 'Grenada', 1473),
(88, 'GP', 'Guadeloupe', 590),
(89, 'GU', 'Guam', 1671),
(90, 'GT', 'Guatemala', 502),
(91, 'XU', 'Guernsey and Alderney', 44),
(92, 'GN', 'Guinea', 224),
(93, 'GW', 'Guinea-Bissau', 245),
(94, 'GY', 'Guyana', 592),
(95, 'HT', 'Haiti', 509),
(96, 'HM', 'Heard and McDonald Islands', 0),
(97, 'HN', 'Honduras', 504),
(98, 'HK', 'Hong Kong S.A.R.', 852),
(99, 'HU', 'Hungary', 36),
(100, 'IS', 'Iceland', 354),
(101, 'IN', 'India', 91),
(102, 'ID', 'Indonesia', 62),
(103, 'IR', 'Iran', 98),
(104, 'IQ', 'Iraq', 964),
(105, 'IE', 'Ireland', 353),
(106, 'IL', 'Israel', 972),
(107, 'IT', 'Italy', 39),
(108, 'JM', 'Jamaica', 1876),
(109, 'JP', 'Japan', 81),
(110, 'XJ', 'Jersey', 44),
(111, 'JO', 'Jordan', 962),
(112, 'KZ', 'Kazakhstan', 7),
(113, 'KE', 'Kenya', 254),
(114, 'KI', 'Kiribati', 686),
(115, 'KP', 'Korea North', 850),
(116, 'KR', 'Korea South', 82),
(117, 'KW', 'Kuwait', 965),
(118, 'KG', 'Kyrgyzstan', 996),
(119, 'LA', 'Laos', 856),
(120, 'LV', 'Latvia', 371),
(121, 'LB', 'Lebanon', 961),
(122, 'LS', 'Lesotho', 266),
(123, 'LR', 'Liberia', 231),
(124, 'LY', 'Libya', 218),
(125, 'LI', 'Liechtenstein', 423),
(126, 'LT', 'Lithuania', 370),
(127, 'LU', 'Luxembourg', 352),
(128, 'MO', 'Macau S.A.R.', 853),
(129, 'MK', 'Macedonia', 389),
(130, 'MG', 'Madagascar', 261),
(131, 'MW', 'Malawi', 265),
(132, 'MY', 'Malaysia', 60),
(133, 'MV', 'Maldives', 960),
(134, 'ML', 'Mali', 223),
(135, 'MT', 'Malta', 356),
(136, 'XM', 'Man (Isle of)', 44),
(137, 'MH', 'Marshall Islands', 692),
(138, 'MQ', 'Martinique', 596),
(139, 'MR', 'Mauritania', 222),
(140, 'MU', 'Mauritius', 230),
(141, 'YT', 'Mayotte', 269),
(142, 'MX', 'Mexico', 52),
(143, 'FM', 'Micronesia', 691),
(144, 'MD', 'Moldova', 373),
(145, 'MC', 'Monaco', 377),
(146, 'MN', 'Mongolia', 976),
(147, 'MS', 'Montserrat', 1664),
(148, 'MA', 'Morocco', 212),
(149, 'MZ', 'Mozambique', 258),
(150, 'MM', 'Myanmar', 95),
(151, 'NA', 'Namibia', 264),
(152, 'NR', 'Nauru', 674),
(153, 'NP', 'Nepal', 977),
(154, 'AN', 'Netherlands Antilles', 599),
(155, 'NL', 'Netherlands The', 31),
(156, 'NC', 'New Caledonia', 687),
(157, 'NZ', 'New Zealand', 64),
(158, 'NI', 'Nicaragua', 505),
(159, 'NE', 'Niger', 227),
(160, 'NG', 'Nigeria', 234),
(161, 'NU', 'Niue', 683),
(162, 'NF', 'Norfolk Island', 672),
(163, 'MP', 'Northern Mariana Islands', 1670),
(164, 'NO', 'Norway', 47),
(165, 'OM', 'Oman', 968),
(166, 'PK', 'Pakistan', 92),
(167, 'PW', 'Palau', 680),
(168, 'PS', 'Palestinian Territory Occupied', 970),
(169, 'PA', 'Panama', 507),
(170, 'PG', 'Papua new Guinea', 675),
(171, 'PY', 'Paraguay', 595),
(172, 'PE', 'Peru', 51),
(173, 'PH', 'Philippines', 63),
(174, 'PN', 'Pitcairn Island', 0),
(175, 'PL', 'Poland', 48),
(176, 'PT', 'Portugal', 351),
(177, 'PR', 'Puerto Rico', 1787),
(178, 'QA', 'Qatar', 974),
(179, 'RE', 'Reunion', 262),
(180, 'RO', 'Romania', 40),
(181, 'RU', 'Russia', 70),
(182, 'RW', 'Rwanda', 250),
(183, 'SH', 'Saint Helena', 290),
(184, 'KN', 'Saint Kitts And Nevis', 1869),
(185, 'LC', 'Saint Lucia', 1758),
(186, 'PM', 'Saint Pierre and Miquelon', 508),
(187, 'VC', 'Saint Vincent And The Grenadines', 1784),
(188, 'WS', 'Samoa', 684),
(189, 'SM', 'San Marino', 378),
(190, 'ST', 'Sao Tome and Principe', 239),
(191, 'SA', 'Saudi Arabia', 966),
(192, 'SN', 'Senegal', 221),
(193, 'RS', 'Serbia', 381),
(194, 'SC', 'Seychelles', 248),
(195, 'SL', 'Sierra Leone', 232),
(196, 'SG', 'Singapore', 65),
(197, 'SK', 'Slovakia', 421),
(198, 'SI', 'Slovenia', 386),
(199, 'XG', 'Smaller Territories of the UK', 44),
(200, 'SB', 'Solomon Islands', 677),
(201, 'SO', 'Somalia', 252),
(202, 'ZA', 'South Africa', 27),
(203, 'GS', 'South Georgia', 0),
(204, 'SS', 'South Sudan', 211),
(205, 'ES', 'Spain', 34),
(206, 'LK', 'Sri Lanka', 94),
(207, 'SD', 'Sudan', 249),
(208, 'SR', 'Suriname', 597),
(209, 'SJ', 'Svalbard And Jan Mayen Islands', 47),
(210, 'SZ', 'Swaziland', 268),
(211, 'SE', 'Sweden', 46),
(212, 'CH', 'Switzerland', 41),
(213, 'SY', 'Syria', 963),
(214, 'TW', 'Taiwan', 886),
(215, 'TJ', 'Tajikistan', 992),
(216, 'TZ', 'Tanzania', 255),
(217, 'TH', 'Thailand', 66),
(218, 'TG', 'Togo', 228),
(219, 'TK', 'Tokelau', 690),
(220, 'TO', 'Tonga', 676),
(221, 'TT', 'Trinidad And Tobago', 1868),
(222, 'TN', 'Tunisia', 216),
(223, 'TR', 'Turkey', 90),
(224, 'TM', 'Turkmenistan', 7370),
(225, 'TC', 'Turks And Caicos Islands', 1649),
(226, 'TV', 'Tuvalu', 688),
(227, 'UG', 'Uganda', 256),
(228, 'UA', 'Ukraine', 380),
(229, 'AE', 'United Arab Emirates', 971),
(230, 'GB', 'United Kingdom', 44),
(231, 'US', 'United States', 1),
(232, 'UM', 'United States Minor Outlying Islands', 1),
(233, 'UY', 'Uruguay', 598),
(234, 'UZ', 'Uzbekistan', 998),
(235, 'VU', 'Vanuatu', 678),
(236, 'VA', 'Vatican City State (Holy See)', 39),
(237, 'VE', 'Venezuela', 58),
(238, 'VN', 'Vietnam', 84),
(239, 'VG', 'Virgin Islands (British)', 1284),
(240, 'VI', 'Virgin Islands (US)', 1340),
(241, 'WF', 'Wallis And Futuna Islands', 681),
(242, 'EH', 'Western Sahara', 212),
(243, 'YE', 'Yemen', 967),
(244, 'YU', 'Yugoslavia', 38),
(245, 'ZM', 'Zambia', 260),
(246, 'ZW', 'Zimbabwe', 263);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_first_name` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_last_name` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_phone` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint(20) DEFAULT NULL,
  `country_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `state_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_postal_code` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_status` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_code`, `customer_first_name`, `customer_last_name`, `customer_email`, `password`, `customer_phone`, `country_id`, `country_name`, `state_id`, `state_name`, `customer_postal_code`, `customer_address`, `customer_status`, `created_at`, `updated_at`, `Name`) VALUES
(1, '#customer-code123', 'Shahed', 'Shanjid', 'shahed@gmail.com', '$2y$10$CYv92FPG1P5na88RcH0W0.kPPWweDi4UFu9dG5ysVen/f0p/JhEbq', '01656941545', 18, 'Bangladesh', 348, 'Dhaka', '1205', 'Kalabagan', '1', NULL, NULL, NULL),
(6, '', 'faisal', 'robin', 'faisalrobin22@gmail.com', '', '8801819545997', NULL, NULL, NULL, NULL, '', 'chittagong', '1', NULL, NULL, NULL),
(7, 'CUS-5ffd53cf9c139', 'kaiser', 'jewel', 'faisalrobin22@gmail.com', NULL, '01819545997', NULL, NULL, NULL, NULL, NULL, 'north kattli', '1', '2021-01-12 01:46:23', '2021-01-12 01:46:23', NULL),
(8, 'CUS-5ffed943706e7', 'kaiser', 'jewel', 'faisal@gmail.com', NULL, '8801819545997', NULL, NULL, NULL, NULL, NULL, 'chittagong', '1', '2021-01-13 05:28:03', '2021-01-13 05:28:03', NULL),
(9, 'CUS-5ffed9522ac00', 'kaiser', 'jewel', 'faisal@gmail.com', NULL, '8801819545997', NULL, NULL, NULL, NULL, NULL, 'chittagong', '1', '2021-01-13 05:28:18', '2021-01-13 05:28:18', NULL),
(10, 'CUS-5ffed9594cbc1', 'kaiser', 'jewel', 'faisal@gmail.com', NULL, '8801819545997', NULL, NULL, NULL, NULL, NULL, 'chittagong', '1', '2021-01-13 05:28:25', '2021-01-13 05:28:25', NULL),
(11, 'CUS-5ffed9942ca9e', 'kaiser', 'jewel', 'faisal@gmail.com', NULL, '8801819545997', NULL, NULL, NULL, NULL, NULL, 'chittagong', '1', '2021-01-13 05:29:24', '2021-01-13 05:29:24', NULL),
(12, 'CUS-5ffeda3bd43c9', 'sdfas', 'sdfasd', 'dfsasd@gmail.com', NULL, '8801819545997', NULL, NULL, NULL, NULL, NULL, 'sdfaasdf', '1', '2021-01-13 05:32:11', '2021-01-13 05:32:11', NULL),
(13, 'CUS-5ffedb136bbaa', 'sdfasdf', 'sdfasdf', 'sdafasdf', NULL, 'sdfsadf', NULL, NULL, NULL, NULL, NULL, 'sdfasdf', '1', '2021-01-13 05:35:47', '2021-01-13 05:35:47', NULL),
(14, 'CUS-5ffedb76cfef8', 'sdfsad', 'sdfsadf', 'sdfsad@gmail.com', NULL, '8801819545997', NULL, NULL, NULL, NULL, NULL, 'sdfsad', '1', '2021-01-13 05:37:26', '2021-01-13 05:37:26', NULL),
(15, 'CUS-5ffedf6b57808', 'sdfasdf', 'sadfsadf', 'fa@gmail.com', NULL, '8801819545997', NULL, NULL, NULL, NULL, NULL, 'sadfsad', '1', '2021-01-13 05:54:19', '2021-01-13 05:54:19', NULL),
(16, 'CUS-5ffedfb081f22', 'sdfasdf', 'sadfsadf', 'fa@gmail.com', NULL, '8801819545997', NULL, NULL, NULL, NULL, NULL, 'sadfsad', '1', '2021-01-13 05:55:28', '2021-01-13 05:55:28', NULL),
(17, 'CUS-5ffedfc20348a', 'sdfasdf', 'sadfsadf', 'fa@gmail.com', NULL, '8801819545997', NULL, NULL, NULL, NULL, NULL, 'sadfsad', '1', '2021-01-13 05:55:46', '2021-01-13 05:55:46', NULL),
(18, 'CUS-5ffee11fce320', 'sdfasf', 'safsdaf', 'fasd@gmail.com', NULL, '8801819545997', NULL, NULL, NULL, NULL, NULL, 'sadfsdaf', '1', '2021-01-13 06:01:35', '2021-01-13 06:01:35', NULL),
(19, 'CUS-5ffee16595734', 'sfsadf', 'sadfsadf', 'sfaasd@gmail.com', NULL, 'safsadf', NULL, NULL, NULL, NULL, NULL, 'sdafasdf', '1', '2021-01-13 06:02:45', '2021-01-13 06:02:45', NULL),
(20, 'CUS-6003cc3b4c323', 'faisal', 'robin', 'faisalrobin22@gmail.com', NULL, '8801819545997', NULL, NULL, NULL, NULL, NULL, 'chittagong', '1', '2021-01-16 23:33:47', '2021-01-16 23:33:47', NULL),
(21, 'CUS-6003ce4e1edae', 'faisal', 'robin', 'sfsdaf@gmail.com', NULL, '8801819545997', NULL, NULL, NULL, NULL, NULL, 'sfsdf', '1', '2021-01-16 23:42:38', '2021-01-16 23:42:38', NULL),
(22, 'CUS-6003ceb52b1b6', 'sdfasdf sadf', 'sdfasdfsad', 'safasd@gmail.com', NULL, '8801819545997', NULL, NULL, NULL, NULL, NULL, 'dgdfgsd', '1', '2021-01-16 23:44:21', '2021-01-16 23:44:21', NULL),
(23, 'CUS-6003d9e72ea3f', 'sdfas', 'asdas', 'faa@gmail.com', NULL, '8801819545997', NULL, NULL, NULL, NULL, NULL, 'sadfsdaf', '1', '2021-01-17 00:32:07', '2021-01-17 00:32:07', NULL),
(24, 'CUS-6003da59d7028', 'sdfsadf', 'sdfsadf', 'sdfas@gmail.com', NULL, '8801819545997', NULL, NULL, NULL, NULL, NULL, 'asdfsadf', '1', '2021-01-17 00:34:01', '2021-01-17 00:34:01', NULL),
(25, 'CUS-6005248d90560', 'Faisal', 'robin', 'faisalrobin22@gmail.com', NULL, '8801819545997', NULL, NULL, NULL, NULL, NULL, 'north kattali', '1', '2021-01-18 00:02:53', '2021-01-18 00:02:53', NULL),
(26, 'CUS-60066a408e1cf', 'sfsdaf', 'sdfsadf', 'sdfsadf@gmail.com', NULL, '8801819545997', NULL, NULL, NULL, NULL, NULL, 'safsadf', '1', '2021-01-18 23:12:32', '2021-01-18 23:12:32', NULL),
(27, 'CUS-60066aa9c093d', 'sfsadf asdf', 'sdfsadfsda', 'sfsad@gmaill.com', NULL, '8801819545997', NULL, NULL, NULL, NULL, NULL, 'fasdfsd', '1', '2021-01-18 23:14:17', '2021-01-18 23:14:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `custom_fields`
--

CREATE TABLE `custom_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `field_section` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `field_type` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `field_key` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `field_label` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `field_validation` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `field_default_value` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `field_created_by` bigint(20) NOT NULL,
  `field_in_list` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `field_status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `launches`
--

CREATE TABLE `launches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `launch_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `launch_price_range` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `launch_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `launch_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `launch_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `launches`
--

INSERT INTO `launches` (`id`, `launch_name`, `launch_price_range`, `launch_image`, `launch_description`, `launch_status`, `created_at`, `updated_at`) VALUES
(1, 'Manami update', '3-8', 'launch/LbhQxmssI2VxD9exjYFFaIbsyl0sIH8gwc9dBVvT.png', 'sdfa ssdf', 'ACTIVE', '2020-12-27 05:45:17', '2020-12-28 00:20:35'),
(2, 'Surovi', '500-6000', 'launch/zD4N7fYaEM6JtAIJCPsCjl0Rcz0MF2C0olHnqFku.png', NULL, 'ACTIVE', '2020-12-27 23:25:51', '2020-12-27 23:25:51'),
(3, 'Green Line', '500-6000', 'launch/5OUhBJP14dBd0rP3EXb5CYqaG42Hb0eeUvlb8Dfi.png', 'sfsdaf sadfsdaf', 'ACTIVE', '2021-01-03 00:48:41', '2021-01-03 00:48:41');

-- --------------------------------------------------------

--
-- Table structure for table `launch_schedules`
--

CREATE TABLE `launch_schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `launch_id` bigint(20) NOT NULL,
  `launch_name` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `terminal_from` bigint(20) NOT NULL,
  `terminal_to` bigint(20) NOT NULL,
  `from_state_id` int(11) NOT NULL,
  `to_state_id` int(11) NOT NULL,
  `schedule_date` date NOT NULL,
  `schedule_time` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `launch_schedules`
--

INSERT INTO `launch_schedules` (`id`, `launch_id`, `launch_name`, `terminal_from`, `terminal_to`, `from_state_id`, `to_state_id`, `schedule_date`, `schedule_time`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 2, 'Surovi', 2, 1, 345, 348, '2021-01-13', '6:00 AM', 7, '2020-12-30 05:55:02', '2021-01-13 23:43:13'),
(3, 3, 'Green Line', 1, 2, 348, 340, '2021-01-05', '11:46 AM', 7, '2021-01-04 23:46:15', '2021-01-04 23:46:15'),
(4, 3, 'Green Line', 1, 3, 348, 340, '2021-01-13', '3:26 PM', 7, '2021-01-10 03:26:10', '2021-01-11 02:51:00'),
(5, 2, 'Surovi', 1, 3, 348, 340, '2021-01-14', '11:42 AM', 7, '2021-01-13 23:42:21', '2021-01-13 23:42:21'),
(6, 3, 'Green Line', 1, 3, 348, 340, '2021-01-14', '5:15 PM', 7, '2021-01-14 05:15:56', '2021-01-14 05:15:56'),
(7, 3, 'Green Line', 1, 3, 348, 340, '2021-01-17', '11:15 AM', 7, '2021-01-16 23:16:07', '2021-01-16 23:16:07'),
(8, 2, 'Surovi', 1, 3, 348, 340, '2021-01-18', '12:00 PM', 7, '2021-01-18 00:00:39', '2021-01-18 00:00:39'),
(9, 3, 'Green Line', 1, 3, 348, 340, '2021-01-18', '12:01 PM', 7, '2021-01-18 00:01:56', '2021-01-18 00:01:56'),
(10, 3, 'Green Line', 1, 3, 348, 340, '2021-01-19', '11:03 AM', 7, '2021-01-18 23:04:01', '2021-01-18 23:10:46'),
(11, 3, 'Green Line', 1, 3, 348, 340, '2021-01-25', '11:20 AM', 7, '2021-01-23 23:20:28', '2021-01-25 00:54:43');

-- --------------------------------------------------------

--
-- Table structure for table `launch_schedule_item`
--

CREATE TABLE `launch_schedule_item` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `schedule_id` bigint(20) NOT NULL,
  `room_id` bigint(20) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'AVAILABLE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `launch_schedule_item`
--

INSERT INTO `launch_schedule_item` (`id`, `schedule_id`, `room_id`, `status`) VALUES
(7, 3, 5, 'AVAILABLE'),
(8, 3, 6, 'AVAILABLE'),
(10, 4, 5, 'AVAILABLE'),
(11, 5, 3, 'AVAILABLE'),
(12, 5, 4, 'AVAILABLE'),
(13, 2, 3, 'AVAILABLE'),
(14, 2, 4, 'AVAILABLE'),
(15, 6, 5, 'AVAILABLE'),
(16, 6, 6, 'AVAILABLE'),
(17, 7, 5, 'AVAILABLE'),
(18, 7, 6, 'AVAILABLE'),
(19, 8, 3, 'AVAILABLE'),
(20, 8, 4, 'AVAILABLE'),
(21, 9, 5, 'AVAILABLE'),
(22, 9, 6, 'AVAILABLE'),
(27, 10, 5, 'BOOKED'),
(28, 10, 6, 'AVAILABLE'),
(31, 11, 5, 'AVAILABLE'),
(32, 11, 6, 'AVAILABLE');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_05_30_154104_create_brands_table', 1),
(5, '2020_06_02_011826_create_categories_table', 1),
(6, '2020_06_04_135012_sliders', 1),
(7, '2020_06_04_163127_attributes', 1),
(8, '2020_09_16_042341_create_permissions_table', 2),
(9, '2020_09_16_042714_create_roles_table', 2),
(10, '2020_09_16_045255_create_users_permissions_table', 2),
(11, '2020_09_16_045702_create_users_roles_table', 2),
(12, '2020_09_16_045803_create_roles_permissions_table', 2),
(13, '2020_09_29_091631_create_products_table', 2),
(14, '2020_09_30_082510_create_products_attributes_table', 2),
(15, '2020_10_01_052531_create_products_categories_table', 2),
(16, '2020_10_01_053003_create_products_images_table', 2),
(17, '2020_10_01_082205_add_additional_columns_to_categories', 2),
(18, '2020_10_04_062210_create_types_table', 2),
(19, '2020_10_04_091902_create_units_table', 2),
(21, '2020_11_08_091701_create_vendors_table', 2),
(22, '2020_11_08_041243_create_customers_table', 3),
(23, '2020_11_08_110316_create_orders_table', 3),
(24, '2020_11_08_110452_create_order_details_table', 4),
(25, '2020_11_09_070711_create_custom_fields_table', 5),
(26, '2020_11_11_082549_create_company_info_table', 6),
(27, '2020_12_06_063436_create_shipping_table', 6),
(28, '2020_12_06_100548_create_trending_products_table', 7),
(29, '2020_12_06_105331_create_special_products_table', 8),
(30, '2020_12_09_065202_create_flash_sale_products_table', 9),
(31, '2020_12_10_055823_create_order_detail_attributes_table', 10),
(32, '2020_12_27_091758_create_launches_table', 11),
(33, '2020_12_28_045553_create_terminals_table', 12),
(34, '2020_12_28_081601_create_rooms_table', 12),
(35, '2020_12_28_083039_create_room_categories_table', 12),
(36, '2020_12_28_112538_create_launch_schedules_table', 12),
(37, '2020_12_28_115124_create_launch_schedules_item_table', 12),
(38, '2020_12_28_105629_add_additional_columns_to_rooms_table', 13),
(39, '2021_01_03_112556_add_additional_columns_to_categories_table', 14),
(40, '2021_01_04_070216_add_additional_columns_to_rooms_table', 15),
(41, '2021_01_05_070405_add_additional_columns_to_terminals_table', 16),
(42, '2021_01_05_084309_add_additional_columns_to_launch_schedules_table', 16),
(43, '2021_01_06_063727_create_room_images_table', 17),
(44, '2021_01_06_065756_add_additional_columns_to_room_images_table', 17),
(45, '2021_01_06_085557_create_blogs_table', 17),
(46, '2021_01_06_093333_add_additional_columns_to_blogs_table', 17),
(47, '2021_01_11_090938_create_bookings_table', 18),
(48, '2021_01_11_091055_create_booking_details_table', 18),
(49, '2021_01_12_052648_add_additional_columns_to_bookings_table', 19),
(50, '2021_01_19_044735_add_status_to_schedul_item_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `section_name`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Vendor', 'Add Vendor', 'add-vendor', '2020-09-16 17:43:19', '2020-09-27 21:17:10'),
(2, 'Vendor', 'Edit Vendor', 'edit-vendor', '2020-09-21 23:15:43', '2020-09-22 16:19:56'),
(3, 'Vendor', 'Delete Vendor', 'delete-vendor', '2020-09-21 23:16:07', '2020-09-21 23:16:07'),
(4, 'Vendor', 'View Vendor', 'view-vendor', '2020-09-21 23:16:20', '2020-09-22 16:20:19'),
(5, 'Users', 'Add User', 'add-user', '2020-09-22 16:18:37', '2020-09-22 16:18:37'),
(6, 'Users', 'Edit User', 'edit-user', '2020-09-22 16:19:26', '2020-09-22 16:19:26'),
(7, 'Users', 'Delete User', 'delete-user', '2020-09-22 16:19:41', '2020-09-22 16:19:41'),
(8, 'Users', 'View User', 'view-user', '2020-09-22 16:20:38', '2020-09-22 16:20:38'),
(9, 'Customer', 'Add Customer', 'add-customer', '2020-09-22 16:22:42', '2020-09-22 16:22:42'),
(10, 'Customer', 'Edit Customer', 'edit-customer', '2020-09-22 16:22:54', '2020-09-22 16:22:54'),
(11, 'Customer', 'Delete Customer', 'delete-customer', '2020-09-22 16:23:10', '2020-09-22 16:23:10'),
(12, 'Customer', 'View Customer', 'view-customer', '2020-09-22 16:23:27', '2020-09-22 16:23:27'),
(13, 'Role', 'Add Role', 'add-role', '2020-09-27 20:54:28', '2020-09-27 20:54:28'),
(14, 'Role', 'Edit Role', 'edit-role', '2020-09-27 20:54:28', '2020-09-27 20:54:28'),
(15, 'Role', 'Delete Role', 'delete-role', '2020-09-27 20:54:28', '2020-09-27 20:54:28'),
(16, 'Role', 'View Role', 'view-role', '2020-09-27 20:54:28', '2020-09-27 20:54:28'),
(17, 'Slider', 'Add Slider', 'add-slider', '2020-10-05 16:20:24', '2020-10-05 16:20:24'),
(18, 'Slider', 'Edit Slider', 'edit-slider', '2020-10-05 16:20:24', '2020-10-05 16:20:24'),
(19, 'Slider', 'Delete Slider', 'delete-slider', '2020-10-05 16:20:24', '2020-10-05 16:20:24'),
(20, 'Slider', 'View Slider', 'view-slider', '2020-10-05 16:20:24', '2020-10-05 16:20:24'),
(21, 'Brand', 'Add Brand', 'add-brand', '2020-10-05 16:21:02', '2020-10-05 16:21:02'),
(22, 'Brand', 'Edit Brand', 'edit-brand', '2020-10-05 16:21:02', '2020-10-05 16:21:02'),
(23, 'Brand', 'Delete Brand', 'delete-brand', '2020-10-05 16:21:02', '2020-10-05 16:21:02'),
(24, 'Brand', 'View Brand', 'view-brand', '2020-10-05 16:21:02', '2020-10-05 16:21:02'),
(25, 'Category', 'Add Category', 'add-category', '2020-10-05 16:22:27', '2020-10-05 16:22:27'),
(26, 'Category', 'Edit Category', 'edit-category', '2020-10-05 16:22:27', '2020-10-05 16:22:27'),
(27, 'Category', 'Delete Category', 'delete-category', '2020-10-05 16:22:27', '2020-10-05 16:22:27'),
(28, 'Category', 'View Category', 'view-category', '2020-10-05 16:22:27', '2020-10-05 16:22:27'),
(29, 'Attribute', 'Add Attribute', 'add-attribute', '2020-10-05 16:23:11', '2020-10-05 16:23:11'),
(30, 'Attribute', 'Edit Attribute', 'edit-attribute', '2020-10-05 16:23:11', '2020-10-05 16:23:11'),
(31, 'Attribute', 'Delete Attribute', 'delete-attribute', '2020-10-05 16:23:11', '2020-10-05 16:23:11'),
(32, 'Attribute', 'View Attribute', 'view-attribute', '2020-10-05 16:23:11', '2020-10-05 16:23:11'),
(33, 'Product', 'Add Product', 'add-product', '2020-10-05 16:24:12', '2020-10-05 16:24:12'),
(34, 'Product', 'Edit Product', 'edit-product', '2020-10-05 16:24:12', '2020-10-05 16:24:12'),
(35, 'Product', 'Delete Product', 'delete-product', '2020-10-05 16:24:12', '2020-10-05 16:24:12'),
(36, 'Product', 'View Product', 'view-product', '2020-10-05 16:24:12', '2020-10-05 16:24:12');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `slug`, `name`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', 'Super Admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles_permissions`
--

CREATE TABLE `roles_permissions` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles_permissions`
--

INSERT INTO `roles_permissions` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `launch_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sell_price` double(10,2) NOT NULL,
  `purchase_price` double(10,2) NOT NULL,
  `room_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `main_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `launch_id`, `room_no`, `sell_price`, `purchase_price`, `room_status`, `main_category`, `room_description`, `created_at`, `updated_at`) VALUES
(1, '1', 'M-123', 0.00, 0.00, 'ACTIVE', '2', NULL, '2020-12-29 23:45:56', '2020-12-29 23:45:56'),
(2, '1', 'M-4567', 0.00, 0.00, 'ACTIVE', '2', NULL, '2020-12-29 23:46:52', '2020-12-29 23:46:52'),
(3, '2', 'S-123', 0.00, 0.00, 'ACTIVE', '2', NULL, '2020-12-29 23:47:21', '2020-12-29 23:47:21'),
(4, '2', 'S6789', 0.00, 0.00, 'ACTIVE', '5', NULL, '2020-12-29 23:47:43', '2020-12-29 23:47:43'),
(5, '3', 'G-1', 500.00, 700.00, 'ACTIVE', '2', NULL, '2021-01-03 00:56:48', '2021-01-03 00:56:48'),
(6, '3', 'G-2', 600.00, 700.00, 'ACTIVE', '2', NULL, '2021-01-03 00:57:23', '2021-01-03 00:57:23');

-- --------------------------------------------------------

--
-- Table structure for table `room_categories`
--

CREATE TABLE `room_categories` (
  `room_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_categories`
--

INSERT INTO `room_categories` (`room_id`, `category_id`) VALUES
(1, 2),
(1, 4),
(1, 7),
(2, 2),
(2, 4),
(2, 8),
(3, 2),
(3, 4),
(3, 7),
(4, 2),
(4, 5),
(5, 2),
(5, 4),
(5, 7),
(6, 2),
(6, 4),
(6, 8);

-- --------------------------------------------------------

--
-- Table structure for table `room_images`
--

CREATE TABLE `room_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_source` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_main_image` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_tag` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_image`, `slider_title`, `slider_text`, `slider_tag`, `created_at`, `updated_at`) VALUES
(7, 'sliders/31fl4uZO7S2jAzr5RyL48tKt93GRwArXYrFYvvxO.jpeg', 'Slider Title', 'Slider Text', 'Slider Tag', '2020-11-22 03:45:02', '2020-11-22 03:45:02'),
(8, 'sliders/QrlKXKY1aSyONiqpCwQAjcNBLtD622S1enOShhoS.jpeg', 'Slider Title', 'Slider Text', 'Slider Tag', '2020-12-07 00:01:58', '2020-12-07 00:01:58');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `country_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`) VALUES
(337, 'Bagar Hat', 18),
(338, 'Bandarban', 18),
(339, 'Barguna', 18),
(340, 'Barisal', 18),
(341, 'Bhola', 18),
(342, 'Bogora', 18),
(343, 'Brahman Bariya', 18),
(344, 'Chandpur', 18),
(345, 'Chattagam', 18),
(346, 'Chittagong Division', 18),
(347, 'Chuadanga', 18),
(348, 'Dhaka', 18),
(349, 'Dinajpur', 18),
(350, 'Faridpur', 18),
(351, 'Feni', 18),
(352, 'Gaybanda', 18),
(353, 'Gazipur', 18),
(354, 'Gopalganj', 18),
(355, 'Habiganj', 18),
(356, 'Jaipur Hat', 18),
(357, 'Jamalpur', 18),
(358, 'Jessor', 18),
(359, 'Jhalakati', 18),
(360, 'Jhanaydah', 18),
(361, 'Khagrachhari', 18),
(362, 'Khulna', 18),
(363, 'Kishorganj', 18),
(364, 'Koks Bazar', 18),
(365, 'Komilla', 18),
(366, 'Kurigram', 18),
(367, 'Kushtiya', 18),
(368, 'Lakshmipur', 18),
(369, 'Lalmanir Hat', 18),
(370, 'Madaripur', 18),
(371, 'Magura', 18),
(372, 'Maimansingh', 18),
(373, 'Manikganj', 18),
(374, 'Maulvi Bazar', 18),
(375, 'Meherpur', 18),
(376, 'Munshiganj', 18),
(377, 'Naral', 18),
(378, 'Narayanganj', 18),
(379, 'Narsingdi', 18),
(380, 'Nator', 18),
(381, 'Naugaon', 18),
(382, 'Nawabganj', 18),
(383, 'Netrakona', 18),
(384, 'Nilphamari', 18),
(385, 'Noakhali', 18),
(386, 'Pabna', 18),
(387, 'Panchagarh', 18),
(388, 'Patuakhali', 18),
(389, 'Pirojpur', 18),
(390, 'Rajbari', 18),
(391, 'Rajshahi', 18),
(392, 'Rangamati', 18),
(393, 'Rangpur', 18),
(394, 'Satkhira', 18),
(395, 'Shariatpur', 18),
(396, 'Sherpur', 18),
(397, 'Silhat', 18),
(398, 'Sirajganj', 18),
(399, 'Sunamganj', 18),
(400, 'Tangayal', 18),
(401, 'Thakurgaon', 18);

-- --------------------------------------------------------

--
-- Table structure for table `terminals`
--

CREATE TABLE `terminals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `terminal_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` int(11) NOT NULL,
  `terminal_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terminals`
--

INSERT INTO `terminals` (`id`, `terminal_name`, `state_id`, `terminal_status`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 348, 'ACTIVE', '2020-12-29 23:29:33', '2020-12-29 23:29:33'),
(2, 'Chittagong', 345, 'ACTIVE', '2020-12-29 23:29:53', '2021-01-10 03:24:19'),
(3, 'Barisal', 340, 'ACTIVE', '2021-01-10 03:24:08', '2021-01-10 03:24:08');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_sort` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `type_section`, `type_name`, `type_sort`, `created_at`, `updated_at`) VALUES
(1, 'CUSTOMER', 'Customer Type', 0, '2020-11-09 02:11:16', '2020-11-09 02:11:16'),
(2, 'VENDOR', 'Vendor Type', 0, '2020-11-11 02:43:44', '2020-11-11 02:43:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Shahed Shanjid', 'shahedshanjid11@gmail.com', NULL, '$2y$10$uijYPC8OtQstBxg60nEmPud0Jjgh178Ug7gb8Q89kGykWVneb.7za', NULL, '2020-11-09 00:40:40', '2020-11-09 00:40:40'),
(7, 'Shahed Shanjid', 'admin@gmail.com', NULL, '$2y$10$20oLzq1IHy4klt4nL5USA.PgC2lhD2YMPFtIWKSJoofLOQq6Wwa8K', NULL, '2020-11-11 03:07:21', '2020-11-11 03:10:10'),
(8, 'M360', 'M360@gmail.com', NULL, '$2y$10$B1QNYaDV4Sg3QYUXEps1aeAUK.8KCPppJIINS7gvpbjtWq1Zfnpc6', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_permissions`
--

CREATE TABLE `users_permissions` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

CREATE TABLE `users_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_roles`
--

INSERT INTO `users_roles` (`user_id`, `role_id`) VALUES
(2, 1),
(7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_name` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_phone` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint(20) DEFAULT NULL,
  `country_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `state_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_nid` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_created_by` bigint(20) NOT NULL,
  `vendor_status` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_details_booking_id_foreign` (`booking_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_info`
--
ALTER TABLE `company_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_fields`
--
ALTER TABLE `custom_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `launches`
--
ALTER TABLE `launches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `launch_schedules`
--
ALTER TABLE `launch_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `launch_schedule_item`
--
ALTER TABLE `launch_schedule_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  ADD PRIMARY KEY (`role_id`,`permission_id`),
  ADD KEY `roles_permissions_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_images`
--
ALTER TABLE `room_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terminals`
--
ALTER TABLE `terminals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_permissions`
--
ALTER TABLE `users_permissions`
  ADD PRIMARY KEY (`user_id`,`permission_id`),
  ADD KEY `users_permissions_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `users_roles_role_id_foreign` (`role_id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `company_info`
--
ALTER TABLE `company_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `custom_fields`
--
ALTER TABLE `custom_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `launches`
--
ALTER TABLE `launches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `launch_schedules`
--
ALTER TABLE `launch_schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `launch_schedule_item`
--
ALTER TABLE `launch_schedule_item`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `room_images`
--
ALTER TABLE `room_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4122;

--
-- AUTO_INCREMENT for table `terminals`
--
ALTER TABLE `terminals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD CONSTRAINT `booking_details_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  ADD CONSTRAINT `roles_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `roles_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users_permissions`
--
ALTER TABLE `users_permissions`
  ADD CONSTRAINT `users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD CONSTRAINT `users_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
