CREATE TABLE   `tbl_cart` (
  `Customer_id` int(10) unsigned NOT NULL,
  `Product_id` int(10) unsigned NOT NULL,
  `Qty` varchar(10) NOT NULL,
  `Purchase_date` varchar(45) NOT NULL,
  `Total` varchar(10) NOT NULL,
  `Reg_Stat` int(10) unsigned default NULL,
  KEY `FK_tbl_cart_1` (`Product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 
--

CREATE TABLE  `tbl_comments` (
  `Customer_id` int(10) unsigned NOT NULL,
  `txtComment` varchar(200) NOT NULL,
  `Date_posted` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop`.`tbl_comments`
--

/*!40000 ALTER TABLE `tbl_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_comments` ENABLE KEYS */;


--
-- Structure for table `shop`.`tbl_history`
--

CREATE TABLE  `tbl_history` (
  `Customer_id` int(10) unsigned NOT NULL,
  `Product_id` int(10) unsigned NOT NULL,
  `Qty` varchar(10) NOT NULL,
  `Purchase_date` varchar(45) NOT NULL,
  `Total` varchar(10) NOT NULL,
  `pmethod` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop`.`tbl_history`
--

/*!40000 ALTER TABLE `tbl_history` DISABLE KEYS */;
INSERT INTO `tbl_history` (`Customer_id`,`Product_id`,`Qty`,`Purchase_date`,`Total`,`pmethod`) VALUES 
 (1,15,'1','2009-10-19 12:30:28','10','Master'),
 (6,23,'1','2009-10-19 02:05:37','2000','Master'),
 (6,22,'1','2009-10-19 02:05:37','340','Master'),
 (6,24,'1','2009-10-19 02:05:37','540','Master'),
 (1,22,'6','2009-10-21 03:02:58','2070','eBucks'),
 (1,28,'2','2009-10-22 11:42:10','4940','Master');
/*!40000 ALTER TABLE `tbl_history` ENABLE KEYS */;


--
-- Structure for table `shop`.`tbl_login`
--


CREATE TABLE  `tbl_login` (
  `Username` varchar(45) NOT NULL,
  `Userpassword` varchar(45) NOT NULL,
  `Idnumber` varchar(13) NOT NULL,
  `Usertype` varchar(45) NOT NULL,
  PRIMARY KEY  (`Username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop`.`tbl_login`
--

/*!40000 ALTER TABLE `tbl_login` DISABLE KEYS */;
INSERT INTO `tbl_login` (`Username`,`Userpassword`,`Idnumber`,`Usertype`) VALUES 
 ('Kholo1','fff','8902255333089','Customer'),
 ('Barry','9171','8902255333080','Manager'),
 ('jamie','pearl','8803035880086','Customer'),
 ('Mika','mazibuko1','8803035880086','Customer'),
 ('sharon','sharonm','8803035880086','Customer'),
 ('sharez','sharezm','8901270924088','Customer');
/*!40000 ALTER TABLE `tbl_login` ENABLE KEYS */;


--
-- Structure for table `shop`.`tblproduct`
--


CREATE TABLE  `tblproduct` (
  `Product_id` int(10) unsigned NOT NULL auto_increment,
  `Product_Name` varchar(45) NOT NULL,
  `Product_qty` varchar(10) NOT NULL,
  `Product_Category` varchar(45) NOT NULL,
  `Product_price` varchar(45) NOT NULL,
  `Picture_path` varchar(300) default NULL,
  `Discount` varchar(45) NOT NULL,
  PRIMARY KEY  (`Product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop`.`tblproduct`
--

/*!40000 ALTER TABLE `tblproduct` DISABLE KEYS */;
INSERT INTO `tblproduct` (`Product_id`,`Product_Name`,`Product_qty`,`Product_Category`,`Product_price`,`Picture_path`,`Discount`) VALUES 
 (22,'Levis Jean','472','Clothing','350','images/p7.jpg','5'),
 (23,'Leather Jacket','486','Clothing','2000','images/18.jpg','0.00'),
 (24,'Guess Hand Bag','487','Clothing','550','images/p9.jpg','10'),
 (26,'LG Micro Oven','491','Household','2000','images/30_litre_silver_microwave_178.jpg','200'),
 (27,'Curtains','496','Household','3000','images/jacqueline_peach_178.jpg','50'),
 (28,'Earings','491','Jewellery','2500','images/C29138.jpg','30'),
 (29,'Ring','493','Jewellery','5000','images/C29812.jpg','40'),
 (30,'Barbie','480','Toys','450','images/805219018279.jpg','0.00'),
 (32,'Easy PC','500','Toys','99.70','images/easy_pc.jpg','0.00'),
 (33,'Mouse','491','Computers','100','images/26.jpg','0.00'),
 (34,'23 Inch Monitor','500','Computers','3500','images/23.jpg','0.00'),
 (35,'Guess Sneaker','498','Clothing','1000','images/p6.jpg','0.00'),
 (36,'LadiesTop','500','Clothing','200','images/p8.jpg','0.00'),
 (37,'Ladies levi\'s Jeans','200','Clothing','350','images/p5.jpg','0.00');
INSERT INTO `tblproduct` (`Product_id`,`Product_Name`,`Product_qty`,`Product_Category`,`Product_price`,`Picture_path`,`Discount`) VALUES 
 (38,'Roxy Ladies Top','237','Clothing','250','images/p14.jpg','0.00'),
 (39,'Bed Set','93','Household','650','images/bottom3.jpg','0.00'),
 (40,'Dinner Set','143','Household','500','images/monsoon_178.jpg','0.00'),
 (41,'Suitcase Set ','93','Household','750','images/paris_178.jpg','0.00'),
 (42,'Towel Set','193','Household','350','images/tulip_178.jpg','0.00'),
 (43,'Diamond Ring','493','Jewellery','3500','images/RD04959.jpg','0.00'),
 (44,'Gold Ring','200','Jewellery','4000','images/RD03720.jpg','0.00'),
 (45,'Pearl Necklace','45','Jewellery','650','images/PC1143.jpg','0.00'),
 (46,'Pearl Earings','65','Jewellery','600','images/PC1156.jpg','0.00'),
 (47,'Necklace','200','Jewellery','250','images/C9988.jpg','10'),
 (48,'Desktop Case','200','Computers','4000','images/27.jpg','0.00'),
 (49,'Processor','150','Computers','3000','images/Opteron_qc.jpg','0.00'),
 (50,'Laptop','413','Computers','8000','images/22.jpg','0.00');
INSERT INTO `tblproduct` (`Product_id`,`Product_Name`,`Product_qty`,`Product_Category`,`Product_price`,`Picture_path`,`Discount`) VALUES 
 (51,'Printer','226','Computers','4500','images/24.jpg','0.00'),
 (52,'Mouse and Keyboard','247','Computers','300','images/J920C.jpg','0.00'),
 (53,'Picachu','250','Toys','200','images/074451307063.jpg','5'),
 (54,'Plastic Bracelets','200','Toys','50','images/713_TO-89176.jpg','5'),
 (55,'Stuart Little','300','Toys','150','images/8713291010000.jpg','0.00'),
 (56,'Board Game','400','Toys','450','images/8717278850023.jpg','0.00');
/*!40000 ALTER TABLE `tblproduct` ENABLE KEYS */;


--
-- Structure for table `shop`.`tblusers`
--


CREATE TABLE  `tblusers` (
  `Customer_id` int(10) unsigned NOT NULL auto_increment,
  `Idnumber` varchar(13) NOT NULL,
  `Usertitle` varchar(10) NOT NULL,
  `Firstname` varchar(45) NOT NULL,
  `Lastname` varchar(45) NOT NULL,
  `User_email` varchar(45) NOT NULL,
  `Contactnumber` varchar(15) NOT NULL,
  `Province` varchar(45) NOT NULL,
  `Userlanguage` varchar(45) NOT NULL,
  `Gender` varchar(45) NOT NULL,
  PRIMARY KEY  (`Customer_id`,`Idnumber`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop`.`tblusers`
--

/*!40000 ALTER TABLE `tblusers` DISABLE KEYS */;
INSERT INTO `tblusers` (`Customer_id`,`Idnumber`,`Usertitle`,`Firstname`,`Lastname`,`User_email`,`Contactnumber`,`Province`,`Userlanguage`,`Gender`) VALUES 
 (1,'8902255333089','Mr','Kholofelo','Selowa','kpb@webmail.com','0722537086','Gauteng','English','Male'),
 (2,'8902255333080','Mr','Manager2','Selowa2','sdfsd@eree.com','0722537080','Gauteng','English','Male'),
 (3,'8803035880086','Mr','fikile','mathonsi','fklmathonsi@webmail.co.za','0732854328','Gauteng','English','Male'),
 (4,'8803035880086','Mr','Mika','Moloto','mikamoloto@gmail.com','0736605795','Gauteng','English','Male'),
 (5,'8803035880086','Miss','dffds','dfds','fd@gmail.com','0012424536','Gauteng','English','Male'),
 (6,'8901270924088','Miss','sharon','mothibi','fsdf@gmail.com','0735748669','Gauteng','English','Female');
/*!40000 ALTER TABLE `tblusers` ENABLE KEYS */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
