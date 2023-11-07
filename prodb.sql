-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 07, 2023 at 03:47 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_list`
--

CREATE TABLE `company_list` (
  `id` int(11) NOT NULL,
  `host_key` varchar(255) DEFAULT NULL,
  `company_name` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `currency` varchar(200) DEFAULT NULL,
  `company_key` varchar(255) DEFAULT NULL,
  `checker_id` varchar(200) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company_list`
--

INSERT INTO `company_list` (`id`, `host_key`, `company_name`, `country`, `currency`, `company_key`, `checker_id`, `created_date`) VALUES
(64, '6e18fe6dd5f327785b0bbd1a8d0af896d0f3c7e9', 'Opiand', 'Nigeria', '111', 'f6e814f143a8650e05ce849c91d60c004ee42fa2', '65445d7a39308', '2023-11-03 03:39:54'),
(65, '6e18fe6dd5f327785b0bbd1a8d0af896d0f3c7e9', 'Otiola', 'Burundi', '8', '4bff23f530233a25f66b99a06a83c06863f76852', '65445fe149d0e', '2023-11-03 03:50:09'),
(67, '6e18fe6dd5f327785b0bbd1a8d0af896d0f3c7e9', 'zigyig', 'Bhutan', '162', 'b52b0976850a30cbd375b2d97fd81f9aa6ee88ef', '6548baff16a39', '2023-11-06 11:07:59'),
(68, '6e18fe6dd5f327785b0bbd1a8d0af896d0f3c7e9', 'Opel', 'Anguilla', '9', 'ea374d87592e5b994c3f894c7e82bfde50fd9e99', '6548e8a5c1e49', '2023-11-06 14:22:45'),
(69, '6e18fe6dd5f327785b0bbd1a8d0af896d0f3c7e9', 'Nano', 'Peru', '131', 'a18cacf66e71649304b640a292a3c69fc2a8f66a', '65492c237f7b4', '2023-11-06 19:10:43'),
(70, '6e18fe6dd5f327785b0bbd1a8d0af896d0f3c7e9', 'Davis', 'Tajikistan', '110', 'b9c5b92d6d7f8d33220f33ca80d0cb6ef4988ebd', '6549f6164cbf7', '2023-11-07 09:32:22'),
(71, '029ecbfb700bca1afcde375e68bc4ba111e78343', 'smartphone_hub', 'Nigeria', '111', '2bb01c3c64f22a79692e36ed52713464d87221d9', '6549fa33a4a1e', '2023-11-07 09:49:55'),
(72, '029ecbfb700bca1afcde375e68bc4ba111e78343', 'smartphone_hub2', 'Andorra', '53', 'd21eb5e3ac1f718af6937a20cf8c07991beca3fd', '6549fa681ce1c', '2023-11-07 09:50:48'),
(73, '029ecbfb700bca1afcde375e68bc4ba111e78343', 'Phoneaffairs', 'Antartica', '24', '2737d6f19f42695f0daa18f4350f28b259d8911d', '6549fab2aec2c', '2023-11-07 09:52:02'),
(74, '6e18fe6dd5f327785b0bbd1a8d0af896d0f3c7e9', 'Ndsessity', 'nigeria', 'NGN', 'c1411b49ef69182ec7d5e50c45e699b4cff70953', '654a007c0834e', '2023-11-07 10:16:44'),
(75, '6e18fe6dd5f327785b0bbd1a8d0af896d0f3c7e9', 'Ndsessity', 'nigeria', 'NGN', '1b389f06dea470c306619d22fe55874179cb5268', '654a00cc7ca23', '2023-11-07 10:18:04'),
(76, '029ecbfb700bca1afcde375e68bc4ba111e78343', 'Dabotassl', 'Argentina', '8', 'f7f0d293d8c7f71851df51b0fe269f3f8485f93f', '654a1f7bd42b9', '2023-11-07 12:28:59');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `currency_code` varchar(3) NOT NULL,
  `currency_name` varchar(50) NOT NULL,
  `currency_symbol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `currency_code`, `currency_name`, `currency_symbol`) VALUES
(1, 'AFA', 'Afghan Afghani', '؋'),
(2, 'ALL', 'Albanian Lek', 'Lek'),
(3, 'DZD', 'Algerian Dinar', 'دج'),
(4, 'AOA', 'Angolan Kwanza', 'Kz'),
(5, 'ARS', 'Argentine Peso', '$'),
(6, 'AMD', 'Armenian Dram', '֏'),
(7, 'AWG', 'Aruban Florin', 'ƒ'),
(8, 'AUD', 'Australian Dollar', '$'),
(9, 'AZN', 'Azerbaijani Manat', 'm'),
(10, 'BSD', 'Bahamian Dollar', 'B$'),
(11, 'BHD', 'Bahraini Dinar', '.د.ب'),
(12, 'BDT', 'Bangladeshi Taka', '৳'),
(13, 'BBD', 'Barbadian Dollar', 'Bds$'),
(14, 'BYR', 'Belarusian Ruble', 'Br'),
(15, 'BEF', 'Belgian Franc', 'fr'),
(16, 'BZD', 'Belize Dollar', '$'),
(17, 'BMD', 'Bermudan Dollar', '$'),
(18, 'BTN', 'Bhutanese Ngultrum', 'Nu.'),
(19, 'BTC', 'Bitcoin', '฿'),
(20, 'BOB', 'Bolivian Boliviano', 'Bs.'),
(21, 'BAM', 'Bosnia-Herzegovina Convertible Mark', 'KM'),
(22, 'BWP', 'Botswanan Pula', 'P'),
(23, 'BRL', 'Brazilian Real', 'R$'),
(24, 'GBP', 'British Pound Sterling', '£'),
(25, 'BND', 'Brunei Dollar', 'B$'),
(26, 'BGN', 'Bulgarian Lev', 'Лв.'),
(27, 'BIF', 'Burundian Franc', 'FBu'),
(28, 'KHR', 'Cambodian Riel', 'KHR'),
(29, 'CAD', 'Canadian Dollar', '$'),
(30, 'CVE', 'Cape Verdean Escudo', '$'),
(31, 'KYD', 'Cayman Islands Dollar', '$'),
(32, 'XOF', 'CFA Franc BCEAO', 'CFA'),
(33, 'XAF', 'CFA Franc BEAC', 'FCFA'),
(34, 'XPF', 'CFP Franc', '₣'),
(35, 'CLP', 'Chilean Peso', '$'),
(36, 'CLF', 'Chilean Unit of Account', 'CLF'),
(37, 'CNY', 'Chinese Yuan', '¥'),
(38, 'COP', 'Colombian Peso', '$'),
(39, 'KMF', 'Comorian Franc', 'CF'),
(40, 'CDF', 'Congolese Franc', 'FC'),
(41, 'CRC', 'Costa Rican Colón', '₡'),
(42, 'HRK', 'Croatian Kuna', 'kn'),
(43, 'CUC', 'Cuban Convertible Peso', '$, CUC'),
(44, 'CZK', 'Czech Republic Koruna', 'Kč'),
(45, 'DKK', 'Danish Krone', 'Kr.'),
(46, 'DJF', 'Djiboutian Franc', 'Fdj'),
(47, 'DOP', 'Dominican Peso', '$'),
(48, 'XCD', 'East Caribbean Dollar', '$'),
(49, 'EGP', 'Egyptian Pound', 'ج.م'),
(50, 'ERN', 'Eritrean Nakfa', 'Nfk'),
(51, 'EEK', 'Estonian Kroon', 'kr'),
(52, 'ETB', 'Ethiopian Birr', 'Nkf'),
(53, 'EUR', 'Euro', '€'),
(54, 'FKP', 'Falkland Islands Pound', '£'),
(55, 'FJD', 'Fijian Dollar', 'FJ$'),
(56, 'GMD', 'Gambian Dalasi', 'D'),
(57, 'GEL', 'Georgian Lari', 'ლ'),
(58, 'DEM', 'German Mark', 'DM'),
(59, 'GHS', 'Ghanaian Cedi', 'GH₵'),
(60, 'GIP', 'Gibraltar Pound', '£'),
(61, 'GRD', 'Greek Drachma', '₯, Δρχ, Δρ'),
(62, 'GTQ', 'Guatemalan Quetzal', 'Q'),
(63, 'GNF', 'Guinean Franc', 'FG'),
(64, 'GYD', 'Guyanaese Dollar', '$'),
(65, 'HTG', 'Haitian Gourde', 'G'),
(66, 'HNL', 'Honduran Lempira', 'L'),
(67, 'HKD', 'Hong Kong Dollar', '$'),
(68, 'HUF', 'Hungarian Forint', 'Ft'),
(69, 'ISK', 'Icelandic Króna', 'kr'),
(70, 'INR', 'Indian Rupee', '₹'),
(71, 'IDR', 'Indonesian Rupiah', 'Rp'),
(72, 'IRR', 'Iranian Rial', '﷼'),
(73, 'IQD', 'Iraqi Dinar', 'د.ع'),
(74, 'ILS', 'Israeli New Sheqel', '₪'),
(75, 'ITL', 'Italian Lira', 'L,£'),
(76, 'JMD', 'Jamaican Dollar', 'J$'),
(77, 'JPY', 'Japanese Yen', '¥'),
(78, 'JOD', 'Jordanian Dinar', 'ا.د'),
(79, 'KZT', 'Kazakhstani Tenge', 'лв'),
(80, 'KES', 'Kenyan Shilling', 'KSh'),
(81, 'KWD', 'Kuwaiti Dinar', 'ك.د'),
(82, 'KGS', 'Kyrgystani Som', 'лв'),
(83, 'LAK', 'Laotian Kip', '₭'),
(84, 'LVL', 'Latvian Lats', 'Ls'),
(85, 'LBP', 'Lebanese Pound', '£'),
(86, 'LSL', 'Lesotho Loti', 'L'),
(87, 'LRD', 'Liberian Dollar', '$'),
(88, 'LYD', 'Libyan Dinar', 'د.ل'),
(89, 'LTC', 'Litecoin', 'Ł'),
(90, 'LTL', 'Lithuanian Litas', 'Lt'),
(91, 'MOP', 'Macanese Pataca', '$'),
(92, 'MKD', 'Macedonian Denar', 'ден'),
(93, 'MGA', 'Malagasy Ariary', 'Ar'),
(94, 'MWK', 'Malawian Kwacha', 'MK'),
(95, 'MYR', 'Malaysian Ringgit', 'RM'),
(96, 'MVR', 'Maldivian Rufiyaa', 'Rf'),
(97, 'MRO', 'Mauritanian Ouguiya', 'MRU'),
(98, 'MUR', 'Mauritian Rupee', '₨'),
(99, 'MXN', 'Mexican Peso', '$'),
(100, 'MDL', 'Moldovan Leu', 'L'),
(101, 'MNT', 'Mongolian Tugrik', '₮'),
(102, 'MAD', 'Moroccan Dirham', 'MAD'),
(103, 'MZM', 'Mozambican Metical', 'MT'),
(104, 'MMK', 'Myanmar Kyat', 'K'),
(105, 'NAD', 'Namibian Dollar', '$'),
(106, 'NPR', 'Nepalese Rupee', '₨'),
(107, 'ANG', 'Netherlands Antillean Guilder', 'ƒ'),
(108, 'TWD', 'New Taiwan Dollar', '$'),
(109, 'NZD', 'New Zealand Dollar', '$'),
(110, 'NIO', 'Nicaraguan Córdoba', 'C$'),
(111, 'NGN', 'Nigerian Naira', '₦'),
(112, 'KPW', 'North Korean Won', '₩'),
(113, 'NOK', 'Norwegian Krone', 'kr'),
(114, 'OMR', 'Omani Rial', '.ع.ر'),
(115, 'PKR', 'Pakistani Rupee', '₨'),
(116, 'PAB', 'Panamanian Balboa', 'B/.'),
(117, 'PGK', 'Papua New Guinean Kina', 'K'),
(118, 'PYG', 'Paraguayan Guarani', '₲'),
(119, 'PEN', 'Peruvian Nuevo Sol', 'S/.'),
(120, 'PHP', 'Philippine Peso', '₱'),
(121, 'PLN', 'Polish Zloty', 'zł'),
(122, 'QAR', 'Qatari Rial', 'ق.ر'),
(123, 'RON', 'Romanian Leu', 'lei'),
(124, 'RUB', 'Russian Ruble', '₽'),
(125, 'RWF', 'Rwandan Franc', 'FRw'),
(126, 'SVC', 'Salvadoran Colón', '₡'),
(127, 'WST', 'Samoan Tala', 'SAT'),
(128, 'STD', 'São Tomé and Príncipe Dobra', 'Db'),
(129, 'SAR', 'Saudi Riyal', '﷼'),
(130, 'RSD', 'Serbian Dinar', 'din'),
(131, 'SCR', 'Seychellois Rupee', 'SRe'),
(132, 'SLL', 'Sierra Leonean Leone', 'Le'),
(133, 'SGD', 'Singapore Dollar', '$'),
(134, 'SKK', 'Slovak Koruna', 'Sk'),
(135, 'SBD', 'Solomon Islands Dollar', 'Si$'),
(136, 'SOS', 'Somali Shilling', 'Sh.so.'),
(137, 'ZAR', 'South African Rand', 'R'),
(138, 'KRW', 'South Korean Won', '₩'),
(139, 'SSP', 'South Sudanese Pound', '£'),
(140, 'XDR', 'Special Drawing Rights', 'SDR'),
(141, 'LKR', 'Sri Lankan Rupee', 'Rs'),
(142, 'SHP', 'St. Helena Pound', '£'),
(143, 'SDG', 'Sudanese Pound', '.س.ج'),
(144, 'SRD', 'Surinamese Dollar', '$'),
(145, 'SZL', 'Swazi Lilangeni', 'E'),
(146, 'SEK', 'Swedish Krona', 'kr'),
(147, 'CHF', 'Swiss Franc', 'CHf'),
(148, 'SYP', 'Syrian Pound', 'LS'),
(149, 'TJS', 'Tajikistani Somoni', 'SM'),
(150, 'TZS', 'Tanzanian Shilling', 'TSh'),
(151, 'THB', 'Thai Baht', '฿'),
(152, 'TOP', 'Tongan Pa\'anga', '$'),
(153, 'TTD', 'Trinidad & Tobago Dollar', '$'),
(154, 'TND', 'Tunisian Dinar', 'ت.د'),
(155, 'TRY', 'Turkish Lira', '₺'),
(156, 'TMT', 'Turkmenistani Manat', 'T'),
(157, 'UGX', 'Ugandan Shilling', 'USh'),
(158, 'UAH', 'Ukrainian Hryvnia', '₴'),
(159, 'AED', 'United Arab Emirates Dirham', 'إ.د'),
(160, 'UYU', 'Uruguayan Peso', '$'),
(161, 'USD', 'US Dollar', '$'),
(162, 'UZS', 'Uzbekistan Som', 'лв'),
(163, 'VUV', 'Vanuatu Vatu', 'VT'),
(164, 'VEF', 'Venezuelan BolÃvar', 'Bs'),
(165, 'VND', 'Vietnamese Dong', '₫'),
(166, 'YER', 'Yemeni Rial', '﷼'),
(167, 'ZMK', 'Zambian Kwacha', 'ZK'),
(168, 'ZWL', 'Zimbabwean dollar', '$');

-- --------------------------------------------------------

--
-- Table structure for table `len_members`
--

CREATE TABLE `len_members` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `user_key` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email_addr` varchar(255) DEFAULT NULL,
  `pwd_pass` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `payment_plan` varchar(55) DEFAULT '1',
  `phone` varchar(55) DEFAULT NULL,
  `subscription_start` varchar(55) DEFAULT NULL,
  `subscription_end` int(55) DEFAULT NULL,
  `account_activation` int(55) DEFAULT 0,
  `secure_login` varchar(255) DEFAULT NULL,
  `activation` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `len_members`
--

INSERT INTO `len_members` (`id`, `user_id`, `user_key`, `username`, `email_addr`, `pwd_pass`, `created_date`, `payment_plan`, `phone`, `subscription_start`, `subscription_end`, `account_activation`, `secure_login`, `activation`) VALUES
(70, '653d3c5e0e1d3', '6e18fe6dd5f327785b0bbd1a8d0af896d0f3c7e9', 'wilson32', 'wilson32@gmail.com', 'e8248cbe79a288ffec75d7300ad2e07172f487f6', '2023-10-28 17:52:46', '1', NULL, NULL, NULL, 1, '2d435bacd7e70abb55f1064f2d1822430527fb8317b7bb5dc80e426dab326595', 92839394),
(71, '65412c7c4ac7f', '9eb664c5de6ccdce8f692e6ac5b1a915235744cc', 'edwineke001', 'edwin@mail.cmo', 'c05969dfda2fd48ca943586874722df5fab5d7de', '2023-10-31 17:34:04', '1', NULL, NULL, NULL, 0, NULL, 0),
(72, '6549f92989c51', '5c10ef68d5f3b25cdd8b9b9f92948e99f6c4cfad', 'davis1234', 'wilson32@gmail.co', 'a642a77abd7d4f51bf9226ceaf891fcbb5b299b8', '2023-11-07 09:45:29', '1', NULL, NULL, NULL, 0, NULL, 0),
(73, '6549f9c5d55df', '029ecbfb700bca1afcde375e68bc4ba111e78343', 'Aderson123', 'Aderson@mail.com', 'a642a77abd7d4f51bf9226ceaf891fcbb5b299b8', '2023-11-07 09:48:05', '1', NULL, NULL, NULL, 0, '1ee0e2d7fc143b7f3bb6377d2a69885a3570853aaaea72021b6cdf2628aabb24', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_list`
--
ALTER TABLE `company_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `checker_id` (`checker_id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `len_members`
--
ALTER TABLE `len_members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_addr` (`email_addr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_list`
--
ALTER TABLE `company_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `len_members`
--
ALTER TABLE `len_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
