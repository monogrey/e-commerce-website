-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 13, 2024 at 11:49 AM
-- Server version: 5.7.44
-- PHP Version: 8.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deleong5_bookorama`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `customerid` varchar(50) NOT NULL,
  `street` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(25) NOT NULL,
  `zipcode` char(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`customerid`, `street`, `city`, `state`, `zipcode`) VALUES
('iloveshopping', '223 Cool Street', 'Philadelphia', 'Pennsylvania', '19141');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryid` char(15) NOT NULL,
  `categoryname` varchar(50) DEFAULT NULL,
  `catdesc` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryid`, `categoryname`, `catdesc`) VALUES
('109876543210123', 'Figures', 'Here are all the figures available for purchase.'),
('222333444555888', 'Pins', 'Decorate with all these pins available!'),
('765123958578039', 'Keychains', 'Get some cool keychains for your house keys!'),
('123456789002345', 'Accessories', 'Accessorize yourself with these cool accessories!'),
('666777888999222', 'Apparel', 'Walk out in fashion with our apparel!');

-- --------------------------------------------------------

--
-- Stand-in structure for view `customer_info`
-- (See below for the actual view)
--
CREATE TABLE `customer_info` (
`userid` varchar(50)
,`fname` varchar(20)
,`lname` varchar(50)
,`email` varchar(50)
,`phonenumber` char(10)
,`customerid` varchar(50)
,`street` varchar(30)
,`city` varchar(30)
,`state` varchar(25)
,`zipcode` char(5)
);

-- --------------------------------------------------------

--
-- Table structure for table `cust_order`
--

CREATE TABLE `cust_order` (
  `orderid` int(15) NOT NULL,
  `customerid` varchar(50) NOT NULL,
  `pid` char(12) NOT NULL,
  `total` float(4,2) DEFAULT NULL,
  `orderdate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empid` varchar(50) NOT NULL,
  `empname` varchar(20) NOT NULL,
  `emplast` varchar(20) NOT NULL,
  `ssn` char(9) NOT NULL,
  `birthdate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empid`, `empname`, `emplast`, `ssn`, `birthdate`) VALUES
('webadmin', 'Eric', 'Jones', '321123444', '1994-08-20');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `itemid` char(15) NOT NULL,
  `instock` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`itemid`, `instock`) VALUES
('1234567890', 32),
('1231234564', 35),
('1344556677', 28),
('1023478599', 12),
('1000333444', 9),
('1000333455', 9),
('1009988776', 15),
('1004567833', 5),
('1079884733', 5),
('1255748932', 5),
('1010998877', 7),
('1000001937', 14),
('1380048329', 5),
('1099334422', 5),
('1008847583', 5),
('1000338859', 5),
('1055667788', 5),
('1011225577', 13),
('1022223333', 5),
('1993747385', 11),
('1008334421', 5),
('1098234556', 5),
('1223377485', 10),
('1010112233', 5),
('1003034556', 13),
('1111111111', 0);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(50) NOT NULL,
  `upassword` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `upassword`) VALUES
('iloveshopping', 'b2ef636fbb4a278d15858fdf6f0a8b96'),
('webadmin', '16c81a9cd3365c535750cc15a72bfa79');

-- --------------------------------------------------------

--
-- Table structure for table `order_receipt`
--

CREATE TABLE `order_receipt` (
  `orderid` int(15) NOT NULL,
  `productid` char(12) NOT NULL,
  `unitprice` float(4,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_receipt`
--

INSERT INTO `order_receipt` (`orderid`, `productid`, `unitprice`, `quantity`) VALUES
(2, '1234567890', 12.00, 1),
(3, '1023478599', 12.00, 2),
(4, '1000333444', 12.00, 3),
(5, '1234567890', 12.00, 1),
(6, '1000333455', 12.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` int(12) NOT NULL,
  `productname` varchar(100) DEFAULT NULL,
  `unitprice` float(4,2) DEFAULT NULL,
  `description` text,
  `catid` char(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `productname`, `unitprice`, `description`, `catid`) VALUES
(1234567890, 'Sackboy Funko POP! Figure', 12.00, 'Our favorite heroic rag doll in figure form.', '109876543210123'),
(1231234564, 'Sackboy Funko POP! Keychain', 5.00, 'Now in keychain form! Carry Sackboy around with your keys as you journey across your day!', '765123958578039'),
(1344556677, 'Sackboy Funko POP! Pin', 8.00, 'Need a little decoration? Pin Sackboy whereever you would like!', '222333444555888'),
(1023478599, 'Oddsock Funko POP! Figure', 12.00, 'One of the legendary heroes of Bunkum! An agile fella they are!', '109876543210123'),
(1000333444, 'Toggle Funko POP! Figure', 12.00, 'One of the legendary heroes of Bunkum! He can switch between his large form and his small form.', '109876543210123'),
(1000333455, 'Toggle (Small ver.) Funko POP! Figure', 12.00, 'One of the legendary heroes of Bunkum! He can switch between his large form and his small form.', '109876543210123'),
(1009988776, 'Swoop Funko POP! Figure', 12.00, 'One of the legendary heroes of Bunkum! Watch her soar across the skies for new adventures!', '109876543210123'),
(1004567833, 'Newton Funko POP! Figure', 12.00, 'The antagonist of our story. Quite the betrayal, was it not?', '109876543210123'),
(1079884733, 'Nana Pud Funko POP! Figure', 12.00, 'The mother of our main antagonist. She only wants to save her son from himself.', '109876543210123'),
(1255748932, 'Captain Pud Funko POP! Figure', 12.00, 'The father of our main antagonist. His son is quite the handful.', '109876543210123'),
(1010998877, 'Sackbot Funko POP! Figure', 12.00, 'Formerly made as a soilder for the Alliance, this robotic fella was brought to life to ultimately help save Craftworld.', '109876543210123'),
(1000001937, 'Oddsock Funko POP! Pin', 8.00, 'Our scampering hero now in pin form!', '222333444555888'),
(1380048329, 'Toggle (both ver.) Funko POP! Pin Bundle', 10.00, 'Stocky or small, our form-changing hero can now be pinned anywhere!', '222333444555888'),
(1099334422, 'Swoop Funko POP! Pin', 8.00, 'Our heroic avian now in pin form!', '222333444555888'),
(1008847583, 'Sackbot Funko POP! Pin', 8.00, 'Our expressive robotic friend now in pin form!', '222333444555888'),
(1000338859, 'Oddsock Funko POP! Keychain', 5.00, 'Carry Oddsock around with this keychain!', '765123958578039'),
(1055667788, 'Toggle (both ver.) Funko POP! Keychain Bundle', 5.00, 'Carry both forms of Toggle as keychain!', '765123958578039'),
(1011225577, 'Swoop Funko POP! Keychain', 5.00, 'Carry Swoop around as a keychain!', '765123958578039'),
(1022223333, 'Newton Funko POP! Keychain', 5.00, 'Carry Newton around as a keychain!', '765123958578039'),
(1993747385, 'Sackbot Funko POP! Keychain', 5.00, 'Carry Sackbot around as a keychain!', '765123958578039'),
(1008334421, 'Funko POP! Foldable Figure Protector', 6.00, 'Protect your figure cases with this foldable protector.', '123456789002345'),
(1098234556, 'Funko POP! Sackboy Backpack', 25.00, 'Perfect for the biggest fans of Sackboy and those who need some extra carry-on space.', '123456789002345'),
(1223377485, 'Funko POP! LBP Wallet', 15.00, 'Express your love for LBP while carrying your money.', '123456789002345'),
(1010112233, 'Funko POP! LBP Shirt', 20.00, 'Do you love LBP? We love LBP too! Show your love with this shirt!', '666777888999222'),
(1003034556, 'Funko POP! LBP Hoodie', 40.00, 'Do you love LBP? We love LBP too! Show your love with this hoodie!', '666777888999222'),
(1111111111, 'Oreo Funko POP! Figure', 12.00, 'This is Oreo. He is a cute little shih tzu. Be warned, he is very spoiled.', '109876543210123');

-- --------------------------------------------------------

--
-- Stand-in structure for view `product_category`
-- (See below for the actual view)
--
CREATE TABLE `product_category` (
`productid` int(12)
,`productname` varchar(100)
,`unitprice` float(4,2)
,`description` text
,`catid` char(15)
,`categoryid` char(15)
,`categoryname` varchar(50)
,`catdesc` text
);

-- --------------------------------------------------------

--
-- Table structure for table `shoppers`
--

CREATE TABLE `shoppers` (
  `userid` varchar(50) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phonenumber` char(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shoppers`
--

INSERT INTO `shoppers` (`userid`, `fname`, `lname`, `email`, `phonenumber`) VALUES
('iloveshopping', 'John', 'Smith', 'jsmith@example.com', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `prodid` char(12) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `totalprice` float(4,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure for view `customer_info` exported as a table
--
DROP TABLE IF EXISTS `customer_info`;
CREATE TABLE`customer_info`(
    `userid` varchar(50) COLLATE latin1_swedish_ci NOT NULL,
    `fname` varchar(20) COLLATE latin1_swedish_ci NOT NULL,
    `lname` varchar(50) COLLATE latin1_swedish_ci NOT NULL,
    `email` varchar(50) COLLATE latin1_swedish_ci NOT NULL,
    `phonenumber` char(10) COLLATE latin1_swedish_ci NOT NULL,
    `customerid` varchar(50) COLLATE latin1_swedish_ci NOT NULL,
    `street` varchar(30) COLLATE latin1_swedish_ci NOT NULL,
    `city` varchar(30) COLLATE latin1_swedish_ci NOT NULL,
    `state` varchar(25) COLLATE latin1_swedish_ci NOT NULL,
    `zipcode` char(5) COLLATE latin1_swedish_ci NOT NULL
);

-- --------------------------------------------------------

--
-- Structure for view `product_category` exported as a table
--
DROP TABLE IF EXISTS `product_category`;
CREATE TABLE`product_category`(
    `productid` int(12) NOT NULL,
    `productname` varchar(100) COLLATE latin1_swedish_ci DEFAULT NULL,
    `unitprice` float(4,2) DEFAULT NULL,
    `description` text COLLATE latin1_swedish_ci DEFAULT NULL,
    `catid` char(15) COLLATE latin1_swedish_ci DEFAULT NULL,
    `categoryid` char(15) COLLATE latin1_swedish_ci NOT NULL,
    `categoryname` varchar(50) COLLATE latin1_swedish_ci DEFAULT NULL,
    `catdesc` text COLLATE latin1_swedish_ci DEFAULT NULL
);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`customerid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryid`),
  ADD UNIQUE KEY `categoryid` (`categoryid`);

--
-- Indexes for table `cust_order`
--
ALTER TABLE `cust_order`
  ADD PRIMARY KEY (`orderid`),
  ADD UNIQUE KEY `orderid` (`orderid`),
  ADD KEY `customerid` (`customerid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD KEY `itemid` (`itemid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `order_receipt`
--
ALTER TABLE `order_receipt`
  ADD KEY `orderid` (`orderid`),
  ADD KEY `productid` (`productid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`),
  ADD UNIQUE KEY `productid` (`productid`),
  ADD KEY `prod_cat` (`catid`);

--
-- Indexes for table `shoppers`
--
ALTER TABLE `shoppers`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD KEY `prodid` (`prodid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cust_order`
--
ALTER TABLE `cust_order`
  MODIFY `orderid` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
