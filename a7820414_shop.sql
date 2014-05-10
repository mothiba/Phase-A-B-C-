-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 08, 2010 at 09:18 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `a7820414_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE IF NOT EXISTS `branches` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Branch_Name` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`ID`, `Branch_Name`) VALUES
(1, 'Rivonia'),
(2, 'JHBCentral');

-- --------------------------------------------------------

--
-- Table structure for table `jhbcentral`
--

CREATE TABLE IF NOT EXISTS `jhbcentral` (
  `Product_id` int(11) NOT NULL AUTO_INCREMENT,
  `Product_category` varchar(100) NOT NULL,
  `Product_Name` varchar(100) NOT NULL,
  `Product_qty` varchar(100) NOT NULL,
  `Product_Price` varchar(100) NOT NULL,
  `Discount` varchar(100) NOT NULL,
  PRIMARY KEY (`Product_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `jhbcentral`
--

INSERT INTO `jhbcentral` (`Product_id`, `Product_category`, `Product_Name`, `Product_qty`, `Product_Price`, `Discount`) VALUES
(22, 'Clothing', 'Visio top', '2', '350', '5'),
(23, 'Clothing', 'Viso short', '0', '250', '0.00'),
(24, 'Clothing', 'Alpha SL jacket', '474', '550', '10'),
(26, 'Refreshment', 'Veerebher / veerublog', '480', '2000', '200'),
(27, 'Refreshment', 'Adia', '496', '3000', '50'),
(28, ' ', 'Earings', '484', '2500', '30'),
(29, ' ', 'Ring', '487', '5000', '40'),
(30, 'Bags', 'Drawstring', '500', '450', '30'),
(32, 'Bags', 'Jarler', '497', '99.70', '0.00'),
(33, 'Shoes', 'Nike-air control ii-fs', '487', '100', '0.00'),
(34, 'Shoes', 'Nike-air zoom-control', '492', '550', '0.00'),
(35, 'Clothing', 'Yogawear toppage', '494', '250', '0.00'),
(36, 'Clothing', 'Insulated jackets', '498', '200', '0.00'),
(37, 'Clothing', 'Scottevest', '190', '350', '0.00'),
(38, 'Clothing', 'AD Athletic', '226', '250', '0.00'),
(39, 'Refreshment', 'Cocaine soft drinks', '93', '650', '0.00'),
(40, 'Refreshment', 'Pure natural Bottled Water', '143', '500', '0.00'),
(41, 'Refreshment', 'Huge mineral water', '93', '750', '0.00'),
(42, 'Refreshment', 'Buxton', '193', '350', '0.00'),
(43, ' ', 'Diamond Ring', '491', '3500', '0.00'),
(44, ' ', 'Gold Ring', '199', '4000', '0.00'),
(45, ' ', 'Pearl Necklace', '43', '650', '0.00'),
(46, ' ', 'Pearl Earings', '64', '600', '0.00'),
(47, ' ', 'Necklace', '199', '250', '10'),
(48, 'Shoes', 'Adidas F30', '195', '500', '0.00'),
(49, 'Shoes', 'Adidas adicore', '146', '850', '0.00'),
(50, 'Shoes', 'Adidas F5', '408', '600', '0.00'),
(51, 'Shoes', 'Dital', '224', '250', '0.00'),
(52, 'Shoes', 'Sidi', '242', '300', '0.00'),
(53, 'Bags', 'Vintage-Adidas', '248', '200', '5'),
(54, 'Bags', 'Square end', '200', '50', '5'),
(55, 'Bags', 'Bottega neneta man bag', '300', '150', '0.00'),
(56, 'Bags', 'Towel N A bag', '400', '450', '0.00'),
(57, 'Clothing', 'Fremout running shirt', '12', '100', '10'),
(58, 'Clothing', 'adidas ', '11', '150', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `rivonia`
--

CREATE TABLE IF NOT EXISTS `rivonia` (
  `Product_id` int(11) NOT NULL AUTO_INCREMENT,
  `Product_category` varchar(100) NOT NULL,
  `Product_Name` varchar(100) NOT NULL,
  `Product_qty` varchar(100) NOT NULL,
  `Product_Price` varchar(100) NOT NULL,
  `Discount` varchar(100) NOT NULL,
  PRIMARY KEY (`Product_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `rivonia`
--

INSERT INTO `rivonia` (`Product_id`, `Product_category`, `Product_Name`, `Product_qty`, `Product_Price`, `Discount`) VALUES
(22, 'Clothing', 'Visio top', '2', '350', '5'),
(23, 'Clothing', 'Viso short', '0', '250', '0.00'),
(24, 'Clothing', 'Alpha SL jacket', '474', '550', '10'),
(26, 'Refreshment', 'Veerebher / veerublog', '480', '2000', '200'),
(27, 'Refreshment', 'Adia', '496', '3000', '50'),
(28, ' ', 'Earings', '484', '2500', '30'),
(29, ' ', 'Ring', '487', '5000', '40'),
(30, 'Bags', 'Drawstring', '500', '450', '30'),
(32, 'Bags', 'Jarler', '497', '99.70', '0.00'),
(33, 'Shoes', 'Nike-air control ii-fs', '487', '100', '0.00'),
(34, 'Shoes', 'Nike-air zoom-control', '492', '550', '0.00'),
(35, 'Clothing', 'Yogawear toppage', '494', '250', '0.00'),
(36, 'Clothing', 'Insulated jackets', '498', '200', '0.00'),
(37, 'Clothing', 'Scottevest', '190', '350', '0.00'),
(38, 'Clothing', 'AD Athletic', '226', '250', '0.00'),
(39, 'Refreshment', 'Cocaine soft drinks', '93', '650', '0.00'),
(40, 'Refreshment', 'Pure natural Bottled Water', '143', '500', '0.00'),
(41, 'Refreshment', 'Huge mineral water', '93', '750', '0.00'),
(42, 'Refreshment', 'Buxton', '193', '350', '0.00'),
(43, ' ', 'Diamond Ring', '491', '3500', '0.00'),
(44, ' ', 'Gold Ring', '199', '4000', '0.00'),
(45, ' ', 'Pearl Necklace', '43', '650', '0.00'),
(46, ' ', 'Pearl Earings', '64', '600', '0.00'),
(47, ' ', 'Necklace', '199', '250', '10'),
(48, 'Shoes', 'Adidas F30', '195', '500', '0.00'),
(49, 'Shoes', 'Adidas adicore', '146', '850', '0.00'),
(50, 'Shoes', 'Adidas F5', '408', '600', '0.00'),
(51, 'Shoes', 'Dital', '224', '250', '0.00'),
(52, 'Shoes', 'Sidi', '242', '300', '0.00'),
(53, 'Bags', 'Vintage-Adidas', '248', '200', '5'),
(54, 'Bags', 'Square end', '200', '50', '5'),
(55, 'Bags', 'Bottega neneta man bag', '300', '150', '0.00'),
(56, 'Bags', 'Towel N A bag', '400', '450', '0.00'),
(57, 'Clothing', 'Fremout running shirt', '12', '100', '10'),
(58, 'Clothing', 'adidas ', '11', '150', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `Role_ID` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Pasword` varchar(100) NOT NULL,
  `
Role_type` varchar(100) NOT NULL,
  `Branch` varchar(100) NOT NULL,
  PRIMARY KEY (`Role_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`Role_ID`, `Username`, `Pasword`, `
Role_type`, `Branch`) VALUES
(0, 'masemola', '208259440', 'Sales', 'Rivonia'),
(2, 'kholofelo', '0782918995', 'Manager', 'HQ');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Branch_Name` varchar(100) NOT NULL,
  `Product_category` varchar(100) NOT NULL,
  `Product_Name` varchar(100) NOT NULL,
  `Product_qty` varchar(100) NOT NULL,
  `Product_Price` varchar(100) NOT NULL,
  `Discount` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`ID`, `Branch_Name`, `Product_category`, `Product_Name`, `Product_qty`, `Product_Price`, `Discount`) VALUES
(1, '', 'Clothing', 'Visio top', '0', '5', '350'),
(2, '', 'Clothing', 'Viso short', '0', '0.00', '250'),
(3, '', 'Clothing', 'Alpha SL jacket', '474', '10', '550'),
(4, '', 'Refreshment', 'Veerebher / veerublog', '480', '200', '2000'),
(5, '', 'Refreshment', 'Adia', '496', '50', '3000'),
(6, '', ' ', 'Earings', '484', '30', '2500'),
(7, '', ' ', 'Ring', '487', '40', '5000'),
(8, '', 'Bags', 'Drawstring', '500', '30', '450'),
(9, '', 'Bags', 'Jarler', '497', '0.00', '99.70'),
(10, '', 'Shoes', 'Nike-air control ii-fs', '487', '0.00', '100'),
(11, '', 'Shoes', 'Nike-air zoom-control', '492', '0.00', '550'),
(12, '', 'Clothing', 'Yogawear toppage', '494', '0.00', '250'),
(13, '', 'Clothing', 'Insulated jackets', '498', '0.00', '200'),
(14, '', 'Clothing', 'Scottevest', '190', '0.00', '350'),
(15, '', 'Clothing', 'AD Athletic', '226', '0.00', '250'),
(16, '', 'Refreshment', 'Cocaine soft drinks', '93', '0.00', '650'),
(17, '', 'Refreshment', 'Pure natural Bottled Water', '143', '0.00', '500'),
(18, '', 'Refreshment', 'Huge mineral water', '93', '0.00', '750'),
(19, '', 'Refreshment', 'Buxton', '193', '0.00', '350'),
(20, '', ' ', 'Diamond Ring', '491', '0.00', '3500'),
(21, '', ' ', 'Gold Ring', '199', '0.00', '4000'),
(22, '', ' ', 'Pearl Necklace', '43', '0.00', '650'),
(23, '', ' ', 'Pearl Earings', '64', '0.00', '600'),
(24, '', ' ', 'Necklace', '199', '10', '250'),
(25, '', 'Shoes', 'Adidas F30', '195', '0.00', '500'),
(26, '', 'Shoes', 'Adidas adicore', '146', '0.00', '850'),
(27, '', 'Shoes', 'Adidas F5', '408', '0.00', '600'),
(28, '', 'Shoes', 'Dital', '224', '0.00', '250'),
(29, '', 'Shoes', 'Sidi', '242', '0.00', '300'),
(30, '', 'Bags', 'Vintage-Adidas', '248', '5', '200'),
(31, '', 'Bags', 'Square end', '200', '5', '50'),
(32, '', 'Bags', 'Bottega neneta man bag', '300', '0.00', '150'),
(33, '', 'Bags', 'Towel N A bag', '400', '0.00', '450'),
(34, '', 'Clothing', 'Fremout running shirt', '12', '10', '100');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE IF NOT EXISTS `tblproduct` (
  `Product_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Product_Name` varchar(45) NOT NULL,
  `Product_qty` varchar(10) NOT NULL,
  `Product_Category` varchar(45) NOT NULL,
  `Product_price` varchar(45) NOT NULL,
  `Picture_path` varchar(300) DEFAULT NULL,
  `Discount` varchar(45) NOT NULL,
  PRIMARY KEY (`Product_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`Product_id`, `Product_Name`, `Product_qty`, `Product_Category`, `Product_price`, `Picture_path`, `Discount`) VALUES
(22, 'Visio top', '0', 'Clothing', '350', '  ', '5'),
(23, 'Viso short', '0', 'Clothing', '250', ' ', '0.00'),
(24, 'Alpha SL jacket', '419', 'Clothing', '550', ' ', '10'),
(26, 'Veerebher / veerublog', '478', 'Refreshment', '2000', ' ', '200'),
(27, 'Adia', '496', 'Refreshment', '3000', ' ', '50'),
(28, 'Earings', '484', ' ', '2500', ' ', '30'),
(29, 'Ring', '487', ' ', '5000', ' ', '40'),
(30, 'Drawstring', '493', 'Bags', '450', ' ', '30'),
(32, 'Jarler', '497', 'Bags', '99.70', ' ', '0.00'),
(33, 'Nike-air control ii-fs', '485', 'Shoes', '100', ' ', '5'),
(34, 'Nike-air zoom-control', '492', 'Shoes', '550', ' ', '0.00'),
(35, 'Yogawear toppage', '494', 'Clothing', '250', ' ', '0.00'),
(36, 'Insulated jackets', '498', 'Clothing', '200', ' ', '0.00'),
(37, 'Scottevest', '190', 'Clothing', '350', ' ', '0.00'),
(38, 'AD Athletic', '226', 'Clothing', '250', ' ', '0.00'),
(39, 'Cocaine soft drinks', '93', 'Refreshment', '650', ' ', '0.00'),
(40, 'Pure natural Bottled Water', '143', 'Refreshment', '500', ' ', '0.00'),
(41, 'Huge mineral water', '93', 'Refreshment', '750', ' ', '0.00'),
(42, 'Buxton', '192', 'Refreshment', '350', ' ', '0.00'),
(43, 'Diamond Ring', '491', ' ', '3500', ' ', '0.00'),
(44, 'Gold Ring', '199', ' ', '4000', ' ', '0.00'),
(45, 'Pearl Necklace', '43', ' ', '650', ' ', '0.00'),
(46, 'Pearl Earings', '64', ' ', '600', ' ', '0.00'),
(47, 'Necklace', '199', ' ', '250', ' ', '10'),
(48, 'Adidas F30', '195', 'Shoes', '500', ' ', '0.00'),
(49, 'Adidas adicore', '146', 'Shoes', '850', ' ', '0.00'),
(50, 'Adidas F5', '408', 'Shoes', '600', ' ', '0.00'),
(51, 'Dital', '224', 'Shoes', '250', ' ', '0.00'),
(52, 'Sidi', '242', 'Shoes', '300', ' ', '0.00'),
(53, 'Vintage-Adidas', '248', 'Bags', '200', ' ', '5'),
(54, 'Square end', '200', 'Bags', '50', ' ', '5'),
(55, 'Bottega neneta man bag', '300', 'Bags', '150', ' ', '0.00'),
(56, 'Towel N A bag', '400', 'Bags', '450', ' ', '0.00'),
(57, 'Fremout running shirt', '12', 'Clothing', '100', ' ', '10'),
(61, 'adidas ', '11', 'Clothing', '150', '', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE IF NOT EXISTS `tblusers` (
  `Customer_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Idnumber` varchar(13) NOT NULL,
  `Usertitle` varchar(10) NOT NULL,
  `Firstname` varchar(45) NOT NULL,
  `Lastname` varchar(45) NOT NULL,
  `User_email` varchar(45) NOT NULL,
  `Contactnumber` varchar(15) NOT NULL,
  `Gender` varchar(45) NOT NULL,
  PRIMARY KEY (`Customer_id`,`Idnumber`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`Customer_id`, `Idnumber`, `Usertitle`, `Firstname`, `Lastname`, `User_email`, `Contactnumber`, `Gender`) VALUES
(1, '8902255333089', 'Mr', 'Kholofelo', 'Selowa', 'kpb@webmail.com', '0722537086', 'Male'),
(2, '8902255333080', 'Mr', 'Manager2', 'Selowa2', 'sdfsd@eree.com', '0722537080', 'Male'),
(3, '8803035880086', 'Mr', 'fikile', 'mathonsi', 'fklmathonsi@webmail.co.za', '0732854328', 'Male'),
(4, '8803035880086', 'Mr', 'Mika', 'Moloto', 'mikamoloto@gmail.com', '0736605795', 'Male'),
(5, '8803035880086', 'Miss', 'dffds', 'dfds', 'fd@gmail.com', '0012424536', 'Male'),
(6, '8901270924088', 'Miss', 'sharon', 'mothibi', 'fsdf@gmail.com', '0735748669', 'Female'),
(7, '9809236005082', 'Mr', 'kholofelo', 'VAN DER MASEMOLA', 'km.masemola@gmail.com', '0782918995', 'Male'),
(8, '9809236005082', '', 'kholo', 'kgoete', 'km.kgoete@gmail.com', '0782918995', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE IF NOT EXISTS `tbl_cart` (
  `Customer_id` int(10) unsigned NOT NULL,
  `Product_id` int(10) unsigned NOT NULL,
  `Qty` varchar(10) NOT NULL,
  `Purchase_date` varchar(45) NOT NULL,
  `Total` varchar(10) NOT NULL,
  `Reg_Stat` int(10) unsigned DEFAULT NULL,
  KEY `FK_tbl_cart_1` (`Product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_history`
--

CREATE TABLE IF NOT EXISTS `tbl_history` (
  `Customer_id` int(10) unsigned NOT NULL,
  `Product_id` int(10) unsigned NOT NULL,
  `Qty` varchar(10) NOT NULL,
  `Purchase_date` varchar(45) NOT NULL,
  `Total` varchar(10) NOT NULL,
  `pmethod` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_history`
--

INSERT INTO `tbl_history` (`Customer_id`, `Product_id`, `Qty`, `Purchase_date`, `Total`, `pmethod`) VALUES
(7, 24, '1', '2010-09-7 01:59:13', '540', 'Master');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE IF NOT EXISTS `tbl_login` (
  `Username` varchar(45) NOT NULL,
  `Userpassword` varchar(45) NOT NULL,
  `Idnumber` varchar(13) NOT NULL,
  `Usertype` varchar(45) NOT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`Username`, `Userpassword`, `Idnumber`, `Usertype`) VALUES
('Kholo1', 'fff', '8902255333089', 'Customer'),
('Barry', '9171', '8902255333080', 'Manager'),
('jamie', 'pearl', '8803035880086', 'Customer'),
('Mika', 'mazibuko1', '8803035880086', 'Customer'),
('sharon', 'sharonm', '8803035880086', 'Customer'),
('sharez', 'sharezm', '8901270924088', 'Customer'),
('masemola', '208259440', '9809236005082', 'Customer');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
