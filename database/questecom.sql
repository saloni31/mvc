-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2021 at 02:35 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `questecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `addressId` int(11) NOT NULL,
  `customerId` int(11) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `country` varchar(50) NOT NULL,
  `addressType` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`addressId`, `customerId`, `address`, `city`, `state`, `zipcode`, `country`, `addressType`) VALUES
(5, 47, '										bsdjzbjskz								', 'sevfeswv', 'Maharashtra', 123456, 'India', 'billing'),
(6, 47, '										bsdjzbjskz								', 'sevfeswv', 'Maharashtra', 123456, 'India', 'shipping'),
(7, 48, '', 'sevfeswv', 'Maharashtra', 123456, 'India', 'billing'),
(8, 48, '					sdzvss				', 'sevfeswv', 'Maharashtra', 123456, 'India', 'shipping'),
(9, 50, 'sdzvss', 'sevfeswv', 'Maharashtra', 123456, 'India', 'billing'),
(10, 50, 'gurukrupa res.', 'nadiad', 'gujarat', 123456, 'India', 'shipping');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `username`, `password`, `status`, `createdDate`) VALUES
(3, 'saloni', '202cb962ac59075b964b07152d234b70', 0, '2021-03-01 10:22:41'),
(4, 'komal', '202cb962ac59075b964b07152d234b70', 1, '0000-00-00 00:00:00'),
(11, 'saloni@gmail.com', 'afbd90bf1897f51d5adddc4b8ff2a3b5', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE `attribute` (
  `attributeId` int(11) NOT NULL,
  `entityType` enum('Product','Category') NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(20) NOT NULL,
  `inputType` varchar(20) NOT NULL,
  `sortOrder` int(4) NOT NULL,
  `backendType` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`attributeId`, `entityType`, `name`, `code`, `inputType`, `sortOrder`, `backendType`) VALUES
(9, 'Product', 'Color', 'color', 'multiSelect', 1, 'INT'),
(11, 'Product', 'Collection', 'collection', 'select', 3, 'VARCHAR(255)'),
(12, 'Product', 'Brand', 'brand', 'textarea', 3, 'VARCHAR(255)');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_option`
--

CREATE TABLE `attribute_option` (
  `optionId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `attributeId` int(11) NOT NULL,
  `sortOrder` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attribute_option`
--

INSERT INTO `attribute_option` (`optionId`, `name`, `attributeId`, `sortOrder`) VALUES
(32, 'collection1', 11, 3),
(35, 'green', 9, 3),
(36, 'red', 9, 1),
(37, 'blue', 9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(11) NOT NULL,
  `categoryName` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `description` varchar(255) NOT NULL,
  `parentCategoryId` int(11) NOT NULL DEFAULT 0,
  `path` varchar(255) NOT NULL,
  `featured` tinyint(1) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `categoryName`, `status`, `description`, `parentCategoryId`, `path`, `featured`, `createdDate`) VALUES
(1, 'Bedroom', 1, 'Bedroom', 0, '1', 0, '2021-03-18 12:12:45'),
(2, 'Living Room', 1, 'Living Room', 0, '2', 0, '2021-03-18 12:12:45'),
(3, 'Dining & Kitchen', 1, 'Dining & Kitchen', 0, '3', 0, '2021-03-18 12:12:45'),
(4, 'Office', 1, 'Office', 0, '4', 0, '2021-03-18 12:12:45'),
(5, 'Bar & Game Room', 1, 'Bar & Game Room', 0, '5', 0, '2021-03-18 12:12:45'),
(6, 'Accessories', 1, 'Accessories', 0, '6', 0, '2021-03-18 12:12:45'),
(7, 'Outdoor', 1, 'Outdoor', 0, '7', 0, '2021-03-18 12:12:45'),
(8, 'Entry & Mudroom', 1, 'Entry & Mudroom', 0, '8', 0, '2021-03-18 12:12:45'),
(9, 'Bedroom Sets', 1, 'Bedroom Sets\r\n', 1, '1=9', 0, '2021-03-18 12:12:45'),
(10, 'Beds', 0, 'Beds', 1, '1=10', 0, '2021-03-18 12:12:45'),
(11, 'Nightstands', 1, 'Nightstands', 1, '1=11', 0, '2021-03-18 12:12:45'),
(12, 'Dressers', 1, 'Dressers', 1, '1=12', 0, '2021-03-18 12:12:45'),
(13, 'Dresser Mirrors', 1, 'Dresser Mirrors', 1, '1=13', 0, '2021-03-18 12:12:45'),
(14, 'Chests', 1, 'Chests', 1, '1=14', 0, '2021-03-18 12:12:45'),
(15, 'Bedroom Benches', 1, 'Bedroom Benches', 1, '1=15', 0, '2021-03-18 12:12:45'),
(16, 'Bed Frames & Headboards', 1, 'Bed Frames & Headboards', 1, '1=16', 0, '2021-03-18 12:12:45'),
(17, 'Armoires and Wardrobes', 1, 'Armoires and Wardrobes', 1, '1=17', 0, '2021-03-18 12:12:45'),
(18, 'Bedroom Vanities', 1, 'Bedroom Vanities', 1, '1=18', 0, '2021-03-18 12:12:45'),
(19, 'Media Chests', 1, 'Media Chests', 1, '1=19', 0, '2021-03-18 12:12:45'),
(20, 'Jewelry Armoires', 1, 'Jewelry Armoires', 1, '1=20', 0, '2021-03-18 12:12:45'),
(21, 'Day Beds and Futons', 1, 'Day Beds and Futons', 1, '1=21', 0, '2021-03-18 12:12:45'),
(22, 'Kids Room', 1, 'Kids Room', 1, '1=22', 0, '2021-03-18 12:12:45'),
(23, 'Kids and Youth Furniture', 1, 'Kids and Youth Furniture', 1, '1=23', 0, '2021-03-18 12:12:45'),
(24, 'Baby Furniture', 1, 'Baby Furniture', 1, '1=24', 0, '2021-03-18 12:12:45'),
(25, 'Mattresses', 0, 'Mattresses', 1, '1=25', 0, '2021-03-18 12:12:45'),
(26, 'Box Springs & Foundations', 0, 'Box Springs & Foundations', 1, '1=26', 0, '2021-03-18 12:12:45'),
(27, 'Adjustable Beds', 1, 'Adjustable Beds', 1, '1=27', 0, '2021-03-18 12:12:45'),
(28, 'Pillows', 1, 'Pillows', 1, '1=28', 0, '2021-03-18 12:12:45'),
(29, 'Bedding and Comforter Sets', 1, 'Bedding and Comforter Sets', 1, '1=29', 0, '2021-03-18 12:12:45'),
(30, 'Living Room Sets', 1, 'Living Room Sets', 2, '2=30', 0, '2021-03-18 12:12:45'),
(31, 'Sectionals', 1, 'Sectionals', 2, '2=31', 0, '2021-03-18 12:12:45'),
(32, 'Sofas', 1, 'Sofas', 2, '2=32', 0, '2021-03-18 12:12:45'),
(33, 'Loveseats', 1, 'Loveseats', 2, '2=33', 0, '2021-03-18 12:12:45'),
(34, 'Reclining Loveseats', 1, 'Reclining Loveseats', 2, '2=34', 0, '2021-03-18 12:12:45'),
(35, 'Sleeper Sofas', 1, 'Sleeper Sofas', 2, '2=35', 0, '2021-03-18 12:12:45'),
(36, 'Recliners and Rockers', 1, 'Recliners and Rockers', 2, '2=36', 0, '2021-03-18 12:12:45'),
(37, 'Theater Seating', 1, 'Theater Seating', 2, '2=37', 0, '2021-03-18 12:12:45'),
(38, 'Chairs', 1, 'Chairs', 2, '2=38', 0, '2021-03-18 12:12:45'),
(39, 'Accent Chairs', 1, 'Accent Chairs', 2, '2=39', 0, '2021-03-18 12:12:45'),
(40, 'Chaises', 1, 'Chaises', 2, '2=40', 0, '2021-03-18 12:12:45'),
(41, 'Ottomans', 1, 'Ottomans', 2, '2=41', 0, '2021-03-18 12:12:45'),
(42, 'Futons', 1, 'Futons', 2, '2=42', 0, '2021-03-18 12:12:45'),
(43, 'Leather Furniture', 1, 'Leather Furniture', 2, '2=43', 0, '2021-03-18 12:12:45'),
(44, 'Occasional Table Sets', 1, 'Occasional Table Sets', 2, '2=44', 0, '2021-03-18 12:12:45'),
(45, 'Sofa Tables', 1, 'Sofa Tables', 2, '2=45', 0, '2021-03-18 12:12:45'),
(46, 'Accent Chests and Cabinets', 1, 'Accent Chests and Cabinets', 2, '2=46', 0, '2021-03-18 12:12:45'),
(47, 'Console Tables', 1, 'Console Tables', 2, '2=47', 0, '2021-03-18 12:12:45'),
(48, 'Coffee and Cocktail Tables', 1, 'Coffee and Cocktail Tables', 2, '2=48', 0, '2021-03-18 12:12:45'),
(49, 'End Tables', 1, 'End Tables', 2, '2=49', 0, '2021-03-18 12:12:45'),
(50, 'Accent Tables', 1, 'Accent Tables', 2, '2=50', 0, '2021-03-18 12:12:45'),
(51, 'Side Tables', 1, 'Side Tables', 2, '2=51', 0, '2021-03-18 12:12:45'),
(52, 'Rugs and Accessories', 1, 'Rugs and Accessories', 2, '2=52', 0, '2021-03-18 12:12:45'),
(53, 'Entertainment Centers and Walls', 1, 'Entertainment Centers and Walls', 2, '2=53', 0, '2021-03-18 12:12:45'),
(54, 'TV Stands and TV Consoles', 1, 'TV Stands and TV Consoles', 2, '2=54', 0, '2021-03-18 12:12:45'),
(55, 'CD and DVD Media Storage', 1, 'CD and DVD Media Storage', 2, '2=55', 0, '2021-03-18 12:12:45'),
(56, 'Dining Sets', 1, 'Dining Sets', 3, '3=56', 0, '2021-03-18 12:12:45'),
(57, 'Dinette Sets', 1, 'Dinette Sets', 3, '3=57', 0, '2021-03-18 12:12:45'),
(58, 'Dining Chairs', 1, 'Dining Chairs', 3, '3=58', 0, '2021-03-18 12:12:45'),
(59, 'Dining Tables', 1, 'Dining Tables', 3, '3=59', 0, '2021-03-18 12:12:45'),
(60, 'Dining Benches', 1, 'Dining Benches', 3, '3=60', 0, '2021-03-18 12:12:45'),
(61, 'China Cabinets', 1, 'China Cabinets', 3, '3=61', 0, '2021-03-18 12:12:45'),
(62, 'Curios & Displays', 1, 'Curios & Displays', 3, '3=62', 0, '2021-03-18 12:12:45'),
(63, 'Kitchen Island, Kitchen Cart', 1, 'Kitchen Island, Kitchen Cart', 3, '3=63', 0, '2021-03-18 12:12:45'),
(64, 'Servers, Sideboards & Buffets', 1, 'Servers, Sideboards & Buffets', 3, '3=64', 0, '2021-03-18 12:12:45'),
(65, 'Home Office Sets', 1, 'Home Office Sets', 4, '4=65', 0, '2021-03-18 12:12:45'),
(66, 'Office Chairs', 1, 'Office Chairs', 4, '4=66', 0, '2021-03-18 12:12:45'),
(67, 'Desks & Hutches', 1, 'Desks & Hutches', 4, '4=67', 0, '2021-03-18 12:12:45'),
(68, 'Modular Office Furniture', 1, 'Modular Office Furniture', 4, '4=68', 0, '2021-03-18 12:12:45'),
(69, 'Conference Room', 1, 'Conference Room', 4, '4=69', 0, '2021-03-18 12:12:45'),
(70, 'Filing Cabinets and Storage', 1, 'Filing Cabinets and Storage', 4, '4=70', 0, '2021-03-18 12:12:45'),
(71, 'Bookcases, Book Shelves', 1, 'Bookcases, Book Shelves', 4, '4=71', 0, '2021-03-18 12:12:45'),
(72, 'Office Accessories', 1, 'Office Accessories', 4, '4=72', 0, '2021-03-18 12:12:45'),
(73, 'Miscellaneous', 1, 'Miscellaneous', 4, '4=73', 0, '2021-03-18 12:12:45'),
(74, 'Home Bar Sets', 1, 'Home Bar Sets', 5, '5=74', 0, '2021-03-18 12:12:45'),
(75, 'Bistro and Bar Table Sets', 1, 'Bistro and Bar Table Sets', 5, '5=75', 0, '2021-03-18 12:12:45'),
(76, 'Game Table Sets', 1, 'Game Table Sets', 5, '5=76', 0, '2021-03-18 12:12:45'),
(77, 'Bar Tables and Pub Tables', 1, 'Bar Tables and Pub Tables', 5, '5=77', 0, '2021-03-18 12:12:45'),
(78, 'Barstools', 1, 'Barstools', 5, '5=78', 0, '2021-03-18 12:12:45'),
(79, 'Wine Racks', 1, 'Wine Racks', 5, '5=79', 0, '2021-03-18 12:12:45'),
(80, 'Game Tables', 1, 'Game Tables', 5, '5=80', 0, '2021-03-18 12:12:45'),
(81, 'Game Room Chairs', 1, 'Game Room Chairs', 5, '5=81', 0, '2021-03-18 12:12:45'),
(82, 'Bar and Wine Cabinets', 1, 'Bar and Wine Cabinets', 5, '5=82', 0, '2021-03-18 12:12:45'),
(83, 'Rugs', 1, 'Rugs', 6, '6=83', 0, '2021-03-18 12:12:45'),
(84, 'Wall Art', 1, 'Wall Art', 6, '6=84', 0, '2021-03-18 12:12:45'),
(85, 'Accent and Storage Benches', 1, 'Accent and Storage Benches', 6, '6=85', 0, '2021-03-18 12:12:45'),
(86, 'Accent Mirrors', 1, 'Accent Mirrors', 6, '6=86', 0, '2021-03-18 12:12:45'),
(87, 'Curios', 1, 'Curios', 6, '6=87', 0, '2021-03-18 12:12:45'),
(88, 'Pillows and Throws', 1, 'Pillows and Throws', 6, '6=88', 0, '2021-03-18 12:12:45'),
(89, 'Decorative Accessories', 1, 'Decorative Accessories', 6, '6=89', 0, '2021-03-18 12:12:45'),
(90, 'Entryway Furniture', 1, 'Entryway Furniture', 6, '6=90', 0, '2021-03-18 12:12:45'),
(91, 'Storage and Organization', 1, 'Storage and Organization', 6, '6=91', 0, '2021-03-18 12:12:45'),
(92, 'Etageres', 1, 'Etageres', 6, '6=92', 0, '2021-03-18 12:12:45'),
(93, 'Clocks', 1, 'Clocks', 6, '6=93', 0, '2021-03-18 12:12:45'),
(94, 'Artificial Plants', 1, 'Artificial Plants', 6, '6=94', 0, '2021-03-18 12:12:45'),
(95, 'Picture Frames', 1, 'Picture Frames', 6, '6=95', 0, '2021-03-18 12:12:45'),
(96, 'Lighting', 1, 'Lighting', 6, '6=96', 0, '2021-03-18 12:12:45'),
(97, 'Desk and Buffet Lamps', 1, 'Desk and Buffet Lamps', 6, '6=97', 0, '2021-03-18 12:12:45'),
(98, 'Lamp Sets', 1, 'Lamp Sets', 6, '6=98', 0, '2021-03-18 12:12:45'),
(99, 'Floor Lamps', 1, 'Floor Lamps', 6, '6=99', 0, '2021-03-18 12:12:45'),
(100, 'Pendant Lighting', 1, 'Pendant Lighting', 6, '6=100', 0, '2021-03-18 12:12:45'),
(101, 'Wall Sconces', 1, 'Wall Sconces', 6, '6=101', 0, '2021-03-18 12:12:45'),
(102, 'Bathroom Furniture', 1, 'Bathroom Furniture', 6, '6=102', 0, '2021-03-18 12:12:45'),
(103, 'Outdoor Conversation Sets', 1, 'Outdoor Conversation Sets', 7, '7=103', 0, '2021-03-18 12:12:45'),
(104, 'Outdoor Dining Furniture', 1, 'Outdoor Dining Furniture', 7, '7=104', 0, '2021-03-18 12:12:45'),
(105, 'Outdoor Tables', 1, 'Outdoor Tables', 7, '7=105', 0, '2021-03-18 12:12:45'),
(106, 'Outdoor Chairs', 1, 'Outdoor Chairs', 7, '7=106', 0, '2021-03-18 12:12:45'),
(107, 'Outdoor Sofas & Loveseats', 1, 'Outdoor Sofas & Loveseats', 7, '7=107', 0, '2021-03-18 12:12:45'),
(108, 'Outdoor Chaise Loungers', 1, 'Outdoor Chaise Loungers', 7, '7=108', 0, '2021-03-18 12:12:45'),
(109, 'Outdoor Bar Furniture', 1, 'Outdoor Bar Furniture', 7, '7=109', 0, '2021-03-18 12:12:45'),
(110, 'Outdoor Accessories', 1, 'Outdoor Accessories', 7, '7=110', 0, '2021-03-18 12:12:45'),
(111, 'Outdoor Fireplaces', 1, 'Outdoor Fireplaces', 7, '7=111', 0, '2021-03-18 12:12:45'),
(112, 'Outdoor Benches', 1, 'Outdoor Benches', 7, '7=112', 0, '2021-03-18 12:12:45'),
(113, 'Outdoor Ottomans', 1, 'Outdoor Ottomans', 7, '7=113', 0, '2021-03-18 12:12:45'),
(114, 'Console Tables', 1, 'Console Tables', 8, '8=114', 0, '2021-03-18 12:12:45'),
(115, 'Storage Benches', 1, 'Storage Benches', 8, '8=115', 0, '2021-03-18 12:12:45'),
(116, 'Hall Trees', 1, 'Hall Trees', 8, '8=116', 0, '2021-03-18 12:12:45'),
(117, 'Coat Racks', 1, 'Coat Racks', 8, '8=117', 0, '2021-03-18 12:12:45'),
(118, 'Panel Bed', 0, 'Panel Bed', 1, '1=118', 0, '2021-03-18 09:54:05');

-- --------------------------------------------------------

--
-- Table structure for table `cms_page`
--

CREATE TABLE `cms_page` (
  `pageId` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `identifier` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cms_page`
--

INSERT INTO `cms_page` (`pageId`, `title`, `identifier`, `content`, `status`, `createdDate`) VALUES
(3, 'About Us', 'about us', '<p style=\"text-align:center\"><span style=\"font-size:20px\"><strong><u>ABOUT US</u></strong></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">This is an about us page for our system. This system is for an organization which wants to sell their own products in the market</span></p>\r\n', 0, '2021-03-12 06:01:12'),
(4, 'contact us', 'contact us', '<p style=\"text-align:center\"><strong><u><span style=\"font-size:18px\">Contact Us</span></u></strong></p>\n\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">This is an contact us page. You can contact us on&nbsp;<strong>xyz@gmail.com&nbsp;</strong>&nbsp;or also call us on&nbsp;<strong>&nbsp;0123456789</strong>.</span></p>\n', 1, '2021-03-12 06:06:18');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerId` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `groupId` int(11) DEFAULT NULL,
  `createdDate` datetime NOT NULL,
  `updatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerId`, `firstName`, `lastName`, `email`, `mobile`, `password`, `status`, `groupId`, `createdDate`, `updatedDate`) VALUES
(47, 'Saloni', 'Sindhi', 'saloni@gmail.com', 2147483647, '202cb962ac59075b964b07152d234b70', 0, 3, '2021-03-14 10:22:47', '2021-03-16 17:36:55'),
(48, 'komal', 'sindhi', 'komal@gmail.com', 2147483647, '202cb962ac59075b964b07152d234b70', 1, 2, '2021-03-14 10:23:18', '0000-00-00 00:00:00'),
(50, 'Saloni', 'Sindhi', 'saloni@gmail.com', 2147483647, '202cb962ac59075b964b07152d234b70', 0, 3, '2021-03-15 06:14:43', '0000-00-00 00:00:00'),
(51, 'xdjks', 'szajkc', 'saloni@gmail.com', 2147483647, 'ed7716c93b5dc0ae78590c0952f76b4c', 0, NULL, '2021-03-16 18:28:11', '0000-00-00 00:00:00'),
(52, 'Saloni', 'Sindhi', 'saloni@gmail.com', 2147483647, '202cb962ac59075b964b07152d234b70', 0, 3, '2021-03-17 13:46:19', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `customergroup`
--

CREATE TABLE `customergroup` (
  `groupId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customergroup`
--

INSERT INTO `customergroup` (`groupId`, `name`, `status`, `createdDate`) VALUES
(2, 'retailer', 0, '2021-03-02 07:13:09'),
(3, 'wholesaler', 0, '2021-03-02 07:13:17'),
(5, 'group1', 1, '2021-03-14 10:39:38');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `mediaId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `image` text NOT NULL,
  `label` varchar(255) DEFAULT NULL,
  `small` tinyint(1) NOT NULL DEFAULT 0,
  `thumb` tinyint(1) NOT NULL DEFAULT 0,
  `base` tinyint(1) NOT NULL DEFAULT 0,
  `gallery` tinyint(1) NOT NULL DEFAULT 0,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`mediaId`, `productId`, `image`, `label`, `small`, `thumb`, `base`, `gallery`, `createdDate`) VALUES
(59, 32, './skin/admin/images/products/1615875280_login.PNG', 'nsjvdk', 1, 0, 1, 1, '0000-00-00 00:00:00'),
(62, 32, './skin/admin/images/products/1615876789_pig game winner.PNG', 'sdjkbk', 0, 0, 0, 0, '0000-00-00 00:00:00'),
(64, 43, './skin/admin/images/products/1615917166_login.PNG', 'sdvusis', 1, 0, 0, 1, '0000-00-00 00:00:00'),
(65, 43, './skin/admin/images/products/1615917166_logout.PNG', 'sdgjsbj', 0, 1, 0, 1, '0000-00-00 00:00:00'),
(66, 43, './skin/admin/images/products/1615917174_login.PNG', 'jhjdsbs', 0, 0, 0, 1, '0000-00-00 00:00:00'),
(77, 42, './skin/admin/images/products/1615988065_login.PNG', NULL, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(81, 42, './skin/admin/images/products/1615989153_login.PNG', NULL, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(82, 101, './skin/admin/images/products/1616074437_login.PNG', NULL, 0, 0, 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `paymentmethod`
--

CREATE TABLE `paymentmethod` (
  `paymentMethodId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paymentmethod`
--

INSERT INTO `paymentmethod` (`paymentMethodId`, `name`, `code`, `description`, `status`, `createdDate`) VALUES
(4, 'COD', 'COD_CODE', 'cash on delievery payment', 1, '2021-02-19 21:19:57'),
(5, 'Debit', 'DEBIT_CODE', 'debit card payment', 0, '2021-02-19 21:20:16');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `sku` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdDate` datetime NOT NULL,
  `updatedDate` datetime NOT NULL,
  `color` int(11) DEFAULT NULL,
  `collection` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `sku`, `name`, `price`, `discount`, `quantity`, `description`, `status`, `createdDate`, `updatedDate`, `color`, `collection`, `brand`) VALUES
(1, 'B720-57-54-96;B720-92', 'Birlanny Silver Upholstered Panel Bedroom', '1496.00', '10.00', 3, 'Lose yourself in luxury with this Brilanny Silver Upholstered Panel Bedroom Set, created by the master furniture crafters of Signature Design by Ashley.', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(2, 'B733-77-74-98;B733-92', 'Lettner Light Gray Sleigh Bedroom Set', '731.70', '10.00', 3, 'Part of Lettner Collection from Ashley.Crafted fom select birch veneers and hardwood solids.Burnished light gray finish.Nightstand, Dresser & Chest features patinated silver color knob and back plate drawers, Dovetail Drawer Construction , color finish drawer interior, ball bearing drawer glides & felt drawer bottoms on select drawers', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(3, '?B647-54-77-96;B647-191', 'Bolanburg White Louvered Panel Bedroom Set', '819.30', '10.00', 3, 'Part of Bolanburg Collection.Crafted from acacia veneers and solids.Textured antique white finish.Shelter style panel bed.Louvered design', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(4, 'B647-54-77-96;B647-192', 'Bolanburg White Panel Bedroom Set ', '1100.00', '10.00', 3, 'Part of Tashay Collection from ACME Furniture.Upholstered in green fabric.Weather wicker frame.Square side table.', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(5, 'B647-54-77-96;B647-193', 'Lettner Light Gray Panel Storage Bedroom Set ', '2100.00', '10.00', 3, 'Grace your room with the opulence of the birlanny bed. Carved mouldings curving around the top and bottom along with fluted pilasters', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(6, 'B647-54-77-96;B647-194', 'Lettner Light Gray Panel Bedroom Set ', '230.00', '10.00', 3, 'Cypress Point Ocean Terrace features a distinctive V-pattern of all-weather woven wicker, aluminum frames in a custom aged iron finish?', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(7, 'B647-54-77-96;B647-195', 'Magnolia Manor Antique White Upholstered Panel Bed', '500.00', '10.00', 3, 'Grace your room with the opulence of the birlanny bed. Carved mouldings curving around the top and bottom along with fluted pilasters', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(8, 'B647-54-77-96;B647-196', 'Mirage Panel Bedroom Set ', '490.00', '10.00', 3, 'Designs in Island Estate Lanai celebrate the natural beauty and classic look of woven wicker.?', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(9, 'B647-54-77-96;B647-197', 'Cassimore Pearl Silver Panel Bedroom Set ', '2300.00', '10.00', 3, 'Part of Tashay Collection from ACME Furniture.Upholstered in green fabric.Weather wicker frame.Square side table.', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(10, 'B647-54-77-96;B647-198', 'Cassimore North Shore Pearl Silver Panel Bedroom S', '1167.08', '10.00', 3, 'Accent a room with the bolanburg bed that exudes a mix of styles including shabby chic casual cottage and a touch of down home country.?', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(11, 'B647-54-77-96;B647-199', 'North Shore Panel Bedroom Set ', '1183.45', '10.00', 3, 'Lose yourself in luxury with this Brilanny Silver Upholstered Panel Bedroom Set, created by the master furniture crafters of Signature Design by Ashley.', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(12, 'B647-54-77-96;B647-200', 'North Shore Sleigh Bedroom Set ', '1199.82', '10.00', 3, 'Accent a room with the bolanburg bed that exudes a mix of styles including shabby chic casual cottage and a touch of down home country.?', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(13, 'B647-54-77-96;B647-201', 'Flynnter Medium Brown Sleigh Storage Bedroom Set ', '1216.20', '10.00', 3, 'Grace your room with the opulence of the birlanny bed. Carved mouldings curving around the top and bottom along with fluted pilasters', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(14, 'B647-54-77-96;B647-202', 'Allyson Park Wire Brushed White Panel Bedroom Set ', '1232.57', '10.00', 3, 'Part of Lettner Collection from Ashley.Crafted fom select birch veneers and hardwood solids.Burnished light gray finish.Nightstand, Dresser & Chest features patinated silver color knob and back plate drawers, Dovetail Drawer Construction , color finish drawer interior, ball bearing drawer glides & felt drawer bottoms on select drawers', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(15, 'B647-54-77-96;B647-203', 'Seville Storage Bedroom Set ', '1248.94', '10.00', 3, 'Lose yourself in luxury with this Brilanny Silver Upholstered Panel Bedroom Set, created by the master furniture crafters of Signature Design by Ashley.', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(16, 'B647-54-77-96;B647-204', 'Tacoma Panel Bedroom Set ', '1265.31', '10.00', 3, 'Part of Tashay Collection from ACME Furniture.Upholstered in green fabric.Weather wicker frame.Square side table.', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(17, 'B647-54-77-96;B647-205', 'Linda Bookcase Storage Bedroom Set (Black) ', '1281.68', '10.00', 3, 'Accent a room with the bolanburg bed that exudes a mix of styles including shabby chic casual cottage and a touch of down home country.?', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(18, 'B647-54-77-96;B647-206', 'Lyssa Panel Bedroom Set ', '1298.05', '10.00', 3, 'Designs in Island Estate Lanai celebrate the natural beauty and classic look of woven wicker.?', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(19, 'B647-54-77-96;B647-207', 'Crown Mark Furniture Emily Captain\'s Bedroom Set i', '1314.43', '10.00', 3, 'Part of Bolanburg Collection.Crafted from acacia veneers and solids.Textured antique white finish.Shelter style panel bed.Louvered design', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(20, 'B647-54-77-96;B647-208', 'Naples White Lacquer Platform Bedroom Set ', '1330.80', '10.00', 3, 'Cypress Point Ocean Terrace features a distinctive V-pattern of all-weather woven wicker, aluminum frames in a custom aged iron finish?', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(21, 'B647-54-77-96;B647-209', 'Celandine Silver Panel Bedroom Set ', '1347.17', '10.00', 3, 'Part of Lettner Collection from Ashley.Crafted fom select birch veneers and hardwood solids.Burnished light gray finish.Nightstand, Dresser & Chest features patinated silver color knob and back plate drawers, Dovetail Drawer Construction , color finish drawer interior, ball bearing drawer glides & felt drawer bottoms on select drawers', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(22, 'B647-54-77-96;B647-210', 'Sheffield Panel Bedroom Set (Antique Grey) ', '1363.54', '10.00', 3, 'Accent a room with the bolanburg bed that exudes a mix of styles including shabby chic casual cottage and a touch of down home country.?', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(23, 'B647-54-77-96;B647-211', 'Farrow Panel Bedroom Set (Chocolate) ', '1379.91', '10.00', 3, 'Grace your room with the opulence of the birlanny bed. Carved mouldings curving around the top and bottom along with fluted pilasters', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(24, 'B647-54-77-96;B647-212', 'Stanley Sleigh Bedroom Set ', '1396.28', '10.00', 3, 'Part of Tashay Collection from ACME Furniture.Upholstered in green fabric.Weather wicker frame.Square side table.', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(25, 'B647-54-77-96;B647-213', 'Turin Light Grey and Black Lacquer Platform Bedroo', '1412.66', '10.00', 3, 'Lose yourself in luxury with this Brilanny Silver Upholstered Panel Bedroom Set, created by the master furniture crafters of Signature Design by Ashley.', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(26, 'B647-54-77-96;B647-214', 'Global Furniture Hudson Platform Bedroom Set in Ze', '1429.03', '10.00', 3, 'Designs in Island Estate Lanai celebrate the natural beauty and classic look of woven wicker.?', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(27, 'B647-54-77-96;B647-215', 'Bracco Brown Platform Storage Bedroom Set ', '1445.40', '10.00', 3, 'Cypress Point Ocean Terrace features a distinctive V-pattern of all-weather woven wicker, aluminum frames in a custom aged iron finish?', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(28, 'B647-54-77-96;B647-216', 'Lucca Black Lacquer Platform Bedroom Set ', '1461.77', '10.00', 3, 'Part of Lettner Collection from Ashley.Crafted fom select birch veneers and hardwood solids.Burnished light gray finish.Nightstand, Dresser & Chest features patinated silver color knob and back plate drawers, Dovetail Drawer Construction , color finish drawer interior, ball bearing drawer glides & felt drawer bottoms on select drawers', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(29, 'B647-54-77-96;B647-217', 'Global Furniture Linda/8269 Platform Bedroom Set i', '1478.14', '10.00', 3, 'Part of Bolanburg Collection.Crafted from acacia veneers and solids.Textured antique white finish.Shelter style panel bed.Louvered design', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(30, 'B647-54-77-96;B647-218', 'Barcelona Platform Bedroom Set ', '1494.51', '10.00', 3, 'Lose yourself in luxury with this Brilanny Silver Upholstered Panel Bedroom Set, created by the master furniture crafters of Signature Design by Ashley.', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(31, 'B647-54-77-96;B647-219', 'Madison II Bookcase Storage Bedroom Set ', '1510.89', '10.00', 3, 'Lose yourself in luxury with this Brilanny Silver Upholstered Panel Bedroom Set, created by the master furniture crafters of Signature Design by Ashley.', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(32, 'B647-54-77-96;B647-220', 'Madison Espresso Platform Bedroom Set ', '1527.26', '10.00', 3, 'Cypress Point Ocean Terrace features a distinctive V-pattern of all-weather woven wicker, aluminum frames in a custom aged iron finish?', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(33, 'B647-54-77-96;B647-221', 'Albright Driftwood Gray Upholstered Bedroom Set ', '1543.63', '10.00', 3, 'Designs in Island Estate Lanai celebrate the natural beauty and classic look of woven wicker.?', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(34, 'B647-54-77-96;B647-222', 'Janeiro Rustic Natural Bedroom Set ', '1560.00', '10.00', 3, 'Part of Bolanburg Collection.Crafted from acacia veneers and solids.Textured antique white finish.Shelter style panel bed.Louvered design', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(35, 'B647-54-77-96;B647-223', 'Porto Natural Light Grey Lacquer Platform Bedroom ', '1576.37', '10.00', 3, 'Grace your room with the opulence of the birlanny bed. Carved mouldings curving around the top and bottom along with fluted pilasters', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(36, 'B647-54-77-96;B647-224', 'Balfour Brown Cherry Panel Storage Bedroom Set ', '1592.74', '10.00', 3, 'Lose yourself in luxury with this Brilanny Silver Upholstered Panel Bedroom Set, created by the master furniture crafters of Signature Design by Ashley.', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(37, 'B647-54-77-96;B647-225', 'Marley Sleigh Bedroom Set (Silver) ', '1609.12', '10.00', 3, 'Part of Lettner Collection from Ashley.Crafted fom select birch veneers and hardwood solids.Burnished light gray finish.Nightstand, Dresser & Chest features patinated silver color knob and back plate drawers, Dovetail Drawer Construction , color finish drawer interior, ball bearing drawer glides & felt drawer bottoms on select drawers', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(38, 'B647-54-77-96;B647-226', 'Flandreau Brown Panel Bedroom Set ', '1625.49', '10.00', 3, 'Lose yourself in luxury with this Brilanny Silver Upholstered Panel Bedroom Set, created by the master furniture crafters of Signature Design by Ashley.', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(39, 'B647-54-77-96;B647-227', 'Deryn Park Poster Bedroom Set ', '1641.86', '10.00', 3, 'Part of Bolanburg Collection.Crafted from acacia veneers and solids.Textured antique white finish.Shelter style panel bed.Louvered design', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(40, 'B647-54-77-96;B647-228', 'Braga Natural Grey Lacquer Platform Bedroom Set ', '1658.23', '10.00', 3, 'With designs highlighted by sweeping contours and graceful lines, the Pavlova collections offers a fresh interpretation of classic contemporary styling.?', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(41, 'B647-54-77-96;B647-229', 'Platinum Legno Bedroom Set ', '1674.60', '10.00', 3, 'Savor every moment outdoors with this contemporary dining set. Designed with gorgeous natural eucalyptus wood for value and versatility, friends and family will spend hours in one of the four comfy armchairs that surround its generous dining table.', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(42, 'B647-54-77-96;B647-230', 'Barocco Bedroom Set (Ivory) ', '1690.97', '10.00', 3, 'Part of Tashay Collection from ACME Furniture.Upholstered in green fabric.Weather wicker frame.Square side table.', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(43, 'B647-54-77-96;B647-231', 'Royal Highlands Rich Cherry Panel Bedroom Set ', '1707.35', '10.00', 3, 'Part of Tashay Collection from ACME Furniture.Upholstered in green fabric.Weather wicker frame.Square side table.', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(44, 'B647-54-77-96;B647-232', 'Tamblin Panel Bedroom Set ', '1723.72', '10.00', 3, 'Savor every moment outdoors with this contemporary dining set. Designed with gorgeous natural eucalyptus wood for value and versatility, friends and family will spend hours in one of the four comfy armchairs that surround its generous dining table.', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(45, 'B647-54-77-96;B647-233', 'Sanremo B Platform Bedroom Set ', '1740.09', '10.00', 3, 'Part of Tashay Collection from ACME Furniture.Upholstered in green fabric.Weather wicker frame.Square side table.', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(46, 'B647-54-77-96;B647-234', 'Cotterill Cherry Panel Bedroom Set ', '1756.46', '10.00', 3, 'Cypress Point Ocean Terrace features a distinctive V-pattern of all-weather woven wicker, aluminum frames in a custom aged iron finish?', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(47, 'B647-54-77-96;B647-235', 'Rhapsody Brown Panel Bedroom Set ', '1772.83', '10.00', 3, 'Designs in Island Estate Lanai celebrate the natural beauty and classic look of woven wicker.?', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(48, 'B647-54-77-96;B647-236', 'Ireland White Youth Bookcase Storage Bedroom Set', '1789.20', '10.00', 3, 'With designs highlighted by sweeping contours and graceful lines, the Pavlova collections offers a fresh interpretation of classic contemporary styling.?', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(49, 'B647-54-77-96;B647-237', 'Paris Light Gray Platform Bedroom Set ', '1805.58', '10.00', 3, 'Part of Tashay Collection from ACME Furniture.Upholstered in green fabric.Weather wicker frame.Square side table.', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(50, 'B647-54-77-96;B647-238', 'Louis Philippe Antique Gray Sleigh Bedroom Set ', '1821.95', '10.00', 3, 'Savor every moment outdoors with this contemporary dining set. Designed with gorgeous natural eucalyptus wood for value and versatility, friends and family will spend hours in one of the four comfy armchairs that surround its generous dining table.', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(51, 'B647-54-77-96;B647-239', 'Rustic Hills Spiced Cream Poster Bedroom Set ', '1838.32', '10.00', 3, 'Part of Tashay Collection from ACME Furniture.Upholstered in green fabric.Weather wicker frame.Square side table.', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(52, 'B647-54-77-96;B647-240', 'Crown Mark Furniture Evan Bedroom Set in Warm Brow', '1854.69', '10.00', 3, 'Part of Tashay Collection from ACME Furniture.Upholstered in green fabric.Weather wicker frame.Square side table.', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(53, 'B647-54-77-96;B647-241', 'Panang Mahogany Panel Storage Bedroom Set ', '1871.06', '10.00', 3, 'Savor every moment outdoors with this contemporary dining set. Designed with gorgeous natural eucalyptus wood for value and versatility, friends and family will spend hours in one of the four comfy armchairs that surround its generous dining table.', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(54, 'B647-54-77-96;B647-242', 'Barcelona Storage Bedroom Set ', '1887.43', '10.00', 3, 'Part of Tashay Collection from ACME Furniture.Upholstered in green fabric.Weather wicker frame.Square side table.', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(55, 'B647-54-77-96;B647-243', 'Mar Panel Wall Bedroom Set ', '1903.81', '10.00', 3, 'Cypress Point Ocean Terrace features a distinctive V-pattern of all-weather woven wicker, aluminum frames in a custom aged iron finish?', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(56, 'B647-54-77-96;B647-244', 'Ambra Panel Bedroom Set ', '1920.18', '10.00', 3, 'Designs in Island Estate Lanai celebrate the natural beauty and classic look of woven wicker.?', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(57, 'B647-54-77-96;B647-245', 'Carmen Platform Bedroom Set (Walnut) ', '1936.55', '10.00', 3, 'With designs highlighted by sweeping contours and graceful lines, the Pavlova collections offers a fresh interpretation of classic contemporary styling.?', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(58, 'B647-54-77-96;B647-246', 'Lorraine Dark Grey Upholstered Storage Platform Be', '1952.92', '10.00', 3, 'Part of Tashay Collection from ACME Furniture.Upholstered in green fabric.Weather wicker frame.Square side table.', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(59, 'B647-54-77-96;B647-247', 'Tranquility White Panel Bedroom Set ', '1969.29', '10.00', 3, 'Savor every moment outdoors with this contemporary dining set. Designed with gorgeous natural eucalyptus wood for value and versatility, friends and family will spend hours in one of the four comfy armchairs that surround its generous dining table.', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(60, 'B647-54-77-96;B647-248', 'Curated Sloane White Living Room Set ', '1985.66', '10.00', 3, 'Part of Tashay Collection from ACME Furniture.Upholstered in green fabric.Weather wicker frame.Square side table.', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(61, 'B647-54-77-96;B647-249', 'Mila Living Room Set ', '2002.04', '10.00', 3, 'Lose yourself in luxury with this Brilanny Silver Upholstered Panel Bedroom Set, created by the master furniture crafters of Signature Design by Ashley.', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(62, 'B647-54-77-96;B647-250', 'Morgan Rose Accolade Living Room Set ', '2018.41', '10.00', 3, 'Part of Lettner Collection from Ashley.Crafted fom select birch veneers and hardwood solids.Burnished light gray finish.Nightstand, Dresser & Chest features patinated silver color knob and back plate drawers, Dovetail Drawer Construction , color finish drawer interior, ball bearing drawer glides & felt drawer bottoms on select drawers', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(63, 'B647-54-77-96;B647-251', 'Greeley Double Reclining Living Room Set ', '2034.78', '10.00', 3, 'Grace your room with the opulence of the birlanny bed. Carved mouldings curving around the top and bottom along with fluted pilasters', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(64, 'B647-54-77-96;B647-252', 'Braelyn Living Room Set (Black / Red) ', '2051.15', '10.00', 3, 'Designs in Island Estate Lanai celebrate the natural beauty and classic look of woven wicker.?', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(65, 'B647-54-77-96;B647-253', 'Pierre Black Living Room Set ', '2067.52', '10.00', 3, 'Grace your room with the opulence of the birlanny bed. Carved mouldings curving around the top and bottom along with fluted pilasters', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(66, 'B647-54-77-96;B647-254', 'A973 Black Italian Leather Living Room Set ', '2083.89', '10.00', 3, 'Part of Tashay Collection from ACME Furniture.Upholstered in green fabric.Weather wicker frame.Square side table.', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(67, 'B647-54-77-96;B647-255', 'Parma Ivory Leatherette Living Room Set ', '2100.27', '10.00', 3, 'Lose yourself in luxury with this Brilanny Silver Upholstered Panel Bedroom Set, created by the master furniture crafters of Signature Design by Ashley.', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(68, 'B647-54-77-96;B647-256', 'Jamael Brown Living Room Set ', '2116.64', '10.00', 3, 'Cypress Point Ocean Terrace features a distinctive V-pattern of all-weather woven wicker, aluminum frames in a custom aged iron finish?', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(69, 'B647-54-77-96;B647-257', 'Julian Living Room Set (Grey/ Chrome) ', '2133.01', '10.00', 3, 'Grace your room with the opulence of the birlanny bed. Carved mouldings curving around the top and bottom along with fluted pilasters', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(70, 'B647-54-77-96;B647-258', 'Poppy Living Room Set Grey ', '2149.38', '10.00', 3, 'Designs in Island Estate Lanai celebrate the natural beauty and classic look of woven wicker.?', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(71, 'B647-54-77-96;B647-259', 'Mitzy Living Room Set ', '2165.75', '10.00', 3, 'Part of Lettner Collection from Ashley.Crafted fom select birch veneers and hardwood solids.Burnished light gray finish.Nightstand, Dresser & Chest features patinated silver color knob and back plate drawers, Dovetail Drawer Construction , color finish drawer interior, ball bearing drawer glides & felt drawer bottoms on select drawers', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(72, 'B647-54-77-96;B647-260', 'Meridian Ferrara 2 Piece Living Room Set in Grey ', '2182.12', '10.00', 3, 'Cypress Point Ocean Terrace features a distinctive V-pattern of all-weather woven wicker, aluminum frames in a custom aged iron finish?', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(73, 'B647-54-77-96;B647-261', 'Meridian Bowery 2 Piece Living Room Set ', '2198.50', '10.00', 3, 'Part of Tashay Collection from ACME Furniture.Upholstered in green fabric.Weather wicker frame.Square side table.', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(74, 'B647-54-77-96;B647-262', 'Meridian Naomi 2pc Velvet Living Room Set in Black', '2214.87', '10.00', 3, 'Savor every moment outdoors with this contemporary dining set. Designed with gorgeous natural eucalyptus wood for value and versatility, friends and family will spend hours in one of the four comfy armchairs that surround its generous dining table.', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(75, 'B647-54-77-96;B647-263', 'Rawcliffe Parchment Oversized Accent Ottoman ', '2231.24', '10.00', 3, 'Part of Tashay Collection from ACME Furniture.Upholstered in green fabric.Weather wicker frame.Square side table.', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(76, 'B647-54-77-96;B647-264', 'Accrington Oversized Accent Ottoman ', '2247.61', '10.00', 3, 'Cypress Point Ocean Terrace features a distinctive V-pattern of all-weather woven wicker, aluminum frames in a custom aged iron finish?', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(77, 'B647-54-77-96;B647-265', 'Curated Sloane White Chair ', '2263.98', '10.00', 3, 'Designs in Island Estate Lanai celebrate the natural beauty and classic look of woven wicker.?', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(78, 'B647-54-77-96;B647-266', 'Branson Camel Lay Flat Power Reclining Sofa ', '2280.35', '10.00', 3, 'With designs highlighted by sweeping contours and graceful lines, the Pavlova collections offers a fresh interpretation of classic contemporary styling.?', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(79, 'B647-54-77-96;B647-267', 'Liberty Furniture Mirage 7-Piece Trestle Dining Ta', '2296.73', '10.00', 3, 'Part of Tashay Collection from ACME Furniture.Upholstered in green fabric.Weather wicker frame.Square side table.', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(80, 'B647-54-77-96;B647-268', 'Liberty Furniture Mirage 5-Piece Round Dining Tabl', '2313.10', '10.00', 3, 'Savor every moment outdoors with this contemporary dining set. Designed with gorgeous natural eucalyptus wood for value and versatility, friends and family will spend hours in one of the four comfy armchairs that surround its generous dining table.', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(81, 'B647-54-77-96;B647-269', 'Coviar Brown 6 Piece Dining Room Set ', '2329.47', '10.00', 3, 'Part of Tashay Collection from ACME Furniture.Upholstered in green fabric.Weather wicker frame.Square side table.', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(82, 'B647-54-77-96;B647-270', 'Havenbrook Rustic Russet Trestle Dining Room Set ', '2345.84', '10.00', 3, 'Part of Lettner Collection from Ashley.Crafted fom select birch veneers and hardwood solids.Burnished light gray finish.Nightstand, Dresser & Chest features patinated silver color knob and back plate drawers, Dovetail Drawer Construction , color finish drawer interior, ball bearing drawer glides & felt drawer bottoms on select drawers', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(83, 'B647-54-77-96;B647-271', 'Meridian Furniture Pierre 5pcs Dining Room Set in ', '2362.21', '10.00', 3, 'Lose yourself in luxury with this Brilanny Silver Upholstered Panel Bedroom Set, created by the master furniture crafters of Signature Design by Ashley.', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(84, 'B647-54-77-96;B647-272', 'Meridian Furniture Alexis 5pcs Dining Room Set in ', '2378.58', '10.00', 3, 'Designs in Island Estate Lanai celebrate the natural beauty and classic look of woven wicker.?', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(85, 'B647-54-77-96;B647-273', 'Deryn Park Cherry Extendable Leg Dining Room Set ', '2394.96', '10.00', 3, 'Cypress Point Ocean Terrace features a distinctive V-pattern of all-weather woven wicker, aluminum frames in a custom aged iron finish?', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(86, 'B647-54-77-96;B647-274', 'Amina Champagne Round Dining Room Set ', '2411.33', '10.00', 3, 'Grace your room with the opulence of the birlanny bed. Carved mouldings curving around the top and bottom along with fluted pilasters', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(87, 'B647-54-77-96;B647-275', 'D1628 Dining Room Set w/ Two-Tone Chairs ', '2427.70', '10.00', 3, 'Part of Tashay Collection from ACME Furniture.Upholstered in green fabric.Weather wicker frame.Square side table.', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(88, 'B647-54-77-96;B647-276', 'Avesta 45.28 Mid-Century Modern High Double Cabine', '2444.07', '10.00', 3, 'Accent a room with the bolanburg bed that exudes a mix of styles including shabby chic casual cottage and a touch of down home country.?', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(89, 'B647-54-77-96;B647-277', 'Shabby Chic Cottage Antique Gray 1 Door Accent Cab', '2460.44', '10.00', 3, 'Designs in Island Estate Lanai celebrate the natural beauty and classic look of woven wicker.?', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(90, 'B647-54-77-96;B647-278', 'Keegan Buffet and Hutch ', '2476.81', '10.00', 3, 'Part of Lettner Collection from Ashley.Crafted fom select birch veneers and hardwood solids.Burnished light gray finish.Nightstand, Dresser & Chest features patinated silver color knob and back plate drawers, Dovetail Drawer Construction , color finish drawer interior, ball bearing drawer glides & felt drawer bottoms on select drawers', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(91, 'B647-54-77-96;B647-279', 'Arcadia File Cabinet ZARC-6010 ', '2493.19', '10.00', 3, 'Savor every moment outdoors with this contemporary dining set. Designed with gorgeous natural eucalyptus wood for value and versatility, friends and family will spend hours in one of the four comfy armchairs that surround its generous dining table.', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(92, 'B647-54-77-96;B647-280', 'Milam Cream 2 Door Drop Lid Cabinet ', '2509.56', '10.00', 3, 'Lose yourself in luxury with this Brilanny Silver Upholstered Panel Bedroom Set, created by the master furniture crafters of Signature Design by Ashley.', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(93, 'B647-54-77-96;B647-281', 'Tashay Beige Wicker 3 Piece Patio Bistro Set ', '2525.93', '10.00', 3, 'Designs in Island Estate Lanai celebrate the natural beauty and classic look of woven wicker.?', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(94, 'B647-54-77-96;B647-282', 'Mardin Dining Set ', '2542.30', '10.00', 3, 'Accent a room with the bolanburg bed that exudes a mix of styles including shabby chic casual cottage and a touch of down home country.?', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(95, 'B647-54-77-96;B647-283', 'Bradbury Dark Slate Grey and Beige 5-Piece Dining ', '2558.67', '10.00', 3, 'Part of Tashay Collection from ACME Furniture.Upholstered in green fabric.Weather wicker frame.Square side table.', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', NULL, NULL, NULL),
(96, 'B647-54-77-96;B647-284', 'Charissa Antique Black Patio Dining Room Set ', '2575.04', '10.00', 3, 'Cypress Point Ocean Terrace features a distinctive V-pattern of all-weather woven wicker, aluminum frames in a custom aged iron finish?', 1, '2021-03-18 14:12:14', '2021-03-18 09:49:00', 0, '', ''),
(97, 'B647-54-77-96;B647-285', 'Grasson Lane Brown And Blue Outdoor Chaise Lounger', '2591.42', '10.00', 3, 'Savor every moment outdoors with this contemporary dining set. Designed with gorgeous natural eucalyptus wood for value and versatility, friends and family will spend hours in one of the four comfy armchairs that surround its generous dining table.', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', 0, '', ''),
(98, 'B647-54-77-96;B647-286', 'Island Estate Lanai Chaise ', '2607.79', '10.00', 3, 'Part of Tashay Collection from ACME Furniture.Upholstered in green fabric.Weather wicker frame.Square side table.', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', 0, '', ''),
(99, 'B647-54-77-96;B647-287', 'Solano Black and White Sunlounger ', '2624.16', '10.00', 3, 'Cypress Point Ocean Terrace features a distinctive V-pattern of all-weather woven wicker, aluminum frames in a custom aged iron finish?', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', 0, '', ''),
(100, 'B647-54-77-96;B647-288', 'Pavlova Chaise Lounge ', '2640.53', '10.00', 3, 'Designs in Island Estate Lanai celebrate the natural beauty and classic look of woven wicker.?', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', 0, '', ''),
(101, 'B647-54-77-96;B647-289', 'Aviano Chaise Lounge ', '2656.90', '10.00', 3, 'With designs highlighted by sweeping contours and graceful lines, the Pavlova collections offers a fresh interpretation of classic contemporary styling.?', 1, '2021-03-18 14:12:14', '2021-03-18 14:12:14', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `product_category_id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`product_category_id`, `productId`, `categoryId`, `createdDate`) VALUES
(11, 42, 68, '0000-00-00 00:00:00'),
(12, 42, 87, '0000-00-00 00:00:00'),
(14, 101, 118, '0000-00-00 00:00:00'),
(16, 101, 11, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_customer_group_price`
--

CREATE TABLE `product_customer_group_price` (
  `entityId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `groupId` int(11) NOT NULL,
  `groupPrice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_customer_group_price`
--

INSERT INTO `product_customer_group_price` (`entityId`, `productId`, `groupId`, `groupPrice`) VALUES
(4, 32, 2, 100),
(5, 31, 2, 250),
(6, 25, 2, 19000),
(7, 25, 3, 19000),
(8, 31, 3, 180),
(9, 32, 3, 250),
(10, 32, 5, 200),
(13, 32, 8, 120),
(15, 32, 9, 300),
(16, 31, 9, 100),
(17, 31, 5, 200),
(18, 42, 3, 10),
(19, 42, 2, 100),
(20, 42, 5, 20000),
(21, 42, 9, 100),
(22, 43, 9, 100),
(23, 43, 9, 100),
(24, 43, 9, 100);

-- --------------------------------------------------------

--
-- Table structure for table `shippingmethod`
--

CREATE TABLE `shippingmethod` (
  `shippingMethodId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `amount` float NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shippingmethod`
--

INSERT INTO `shippingmethod` (`shippingMethodId`, `name`, `code`, `amount`, `description`, `status`, `createdDate`) VALUES
(2, 'COD', 'COD_HOME', 200, 'refridgerator', 0, '2021-03-18 08:31:10'),
(3, 'early', 'EARLY_CODE', 200, 'Early delivery', 1, '2021-02-19 21:14:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`addressId`),
  ADD KEY `customerId` (`customerId`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`attributeId`);

--
-- Indexes for table `attribute_option`
--
ALTER TABLE `attribute_option`
  ADD PRIMARY KEY (`optionId`),
  ADD KEY `attributeId` (`attributeId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `cms_page`
--
ALTER TABLE `cms_page`
  ADD PRIMARY KEY (`pageId`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerId`),
  ADD KEY `customer_ibfk_1` (`groupId`);

--
-- Indexes for table `customergroup`
--
ALTER TABLE `customergroup`
  ADD PRIMARY KEY (`groupId`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`mediaId`);

--
-- Indexes for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  ADD PRIMARY KEY (`paymentMethodId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`product_category_id`);

--
-- Indexes for table `product_customer_group_price`
--
ALTER TABLE `product_customer_group_price`
  ADD PRIMARY KEY (`entityId`);

--
-- Indexes for table `shippingmethod`
--
ALTER TABLE `shippingmethod`
  ADD PRIMARY KEY (`shippingMethodId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `addressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `attributeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `attribute_option`
--
ALTER TABLE `attribute_option`
  MODIFY `optionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `cms_page`
--
ALTER TABLE `cms_page`
  MODIFY `pageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `customergroup`
--
ALTER TABLE `customergroup`
  MODIFY `groupId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `mediaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  MODIFY `paymentMethodId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `product_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_customer_group_price`
--
ALTER TABLE `product_customer_group_price`
  MODIFY `entityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `shippingmethod`
--
ALTER TABLE `shippingmethod`
  MODIFY `shippingMethodId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `customer` (`customerId`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `attribute_option`
--
ALTER TABLE `attribute_option`
  ADD CONSTRAINT `attribute_option_ibfk_1` FOREIGN KEY (`attributeId`) REFERENCES `attribute` (`attributeId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`groupId`) REFERENCES `customergroup` (`groupId`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
