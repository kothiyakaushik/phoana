-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2017 at 05:21 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phoana_n_bk20170420`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Album_Size_Id` int(11) DEFAULT NULL,
  `Album_Cover_Design` varchar(250) DEFAULT NULL,
  `Album_Cover_Material_Id` int(11) DEFAULT NULL,
  `Album_Page_Type_Id` int(11) DEFAULT NULL,
  `Created_At` datetime DEFAULT NULL,
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `album_cover_material`
--

CREATE TABLE `album_cover_material` (
  `ID` int(11) NOT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Created_At` datetime DEFAULT NULL,
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `album_images`
--

CREATE TABLE `album_images` (
  `ID` int(11) NOT NULL,
  `Album_ID` int(11) DEFAULT NULL,
  `Image_Path` varchar(150) DEFAULT NULL,
  `Created_At` datetime DEFAULT NULL,
  `updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `album_order`
--

CREATE TABLE `album_order` (
  `ID` int(11) NOT NULL,
  `Album_ID` int(11) DEFAULT NULL,
  `Album_Order_Quantity` int(11) DEFAULT NULL,
  `Album_Price_Per_Unit` decimal(11,2) DEFAULT NULL,
  `Album_Price_Grand_Total` decimal(11,2) DEFAULT NULL,
  `Discount` decimal(5,2) DEFAULT NULL,
  `Price_Total` decimal(11,2) DEFAULT NULL,
  `Album_Expect_Delivery_Date` datetime DEFAULT NULL,
  `Shipping_Address_ID` int(11) DEFAULT NULL,
  `Order_Date` datetime DEFAULT NULL,
  `Payment_Mode` varchar(20) DEFAULT NULL,
  `Payment_ID` varchar(100) DEFAULT NULL,
  `Transaction_ID` varchar(100) DEFAULT NULL,
  `Amount_Paid` decimal(11,2) DEFAULT NULL,
  `Delivery_Status` tinyint(1) DEFAULT NULL,
  `Delivered_By_ID` int(11) DEFAULT NULL,
  `Delivered_Date` date DEFAULT NULL,
  `Vendor_ID` int(11) DEFAULT NULL,
  `Created_At` datetime DEFAULT NULL,
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `album_page_type`
--

CREATE TABLE `album_page_type` (
  `ID` int(11) NOT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Style` varchar(50) DEFAULT NULL,
  `Created_At` datetime DEFAULT NULL,
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `album_size`
--

CREATE TABLE `album_size` (
  `ID` int(11) NOT NULL,
  `Height` decimal(4,2) DEFAULT NULL,
  `Width` decimal(4,2) DEFAULT NULL,
  `Created_At` datetime DEFAULT NULL,
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `demo_request`
--

CREATE TABLE `demo_request` (
  `ID` int(11) NOT NULL,
  `User_ID` int(11) DEFAULT NULL,
  `Request_Type_ID` int(11) DEFAULT NULL,
  `Address_Line_1` varchar(100) DEFAULT NULL,
  `Address_Line_2` varchar(100) DEFAULT NULL,
  `Zip_Code` varchar(20) DEFAULT NULL,
  `Landmark` varchar(250) DEFAULT NULL,
  `Contact_Person` varchar(100) DEFAULT NULL,
  `Contact_Person_Mobile` varchar(25) DEFAULT NULL,
  `Scheduled_Date_Time` datetime DEFAULT NULL,
  `Lat` decimal(12,9) DEFAULT NULL,
  `Long` decimal(12,9) DEFAULT NULL,
  `Msg` text,
  `Order_Date_Time` datetime DEFAULT NULL,
  `Payment_Mode` varchar(20) DEFAULT NULL,
  `Payment_ID` varchar(100) DEFAULT NULL,
  `Transaction_ID` varchar(100) DEFAULT NULL,
  `Amount_Paid` decimal(11,2) DEFAULT NULL,
  `Payment_Status` tinyint(1) DEFAULT NULL,
  `Demo_Status` tinyint(1) DEFAULT NULL,
  `Demo_Date_Time` date DEFAULT NULL,
  `Staff_ID` int(11) DEFAULT NULL,
  `Coupon_Code` varchar(20) DEFAULT NULL,
  `Created_At` datetime DEFAULT NULL,
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Wall_ID` int(11) DEFAULT NULL,
  `Venue_Address_1` varchar(100) DEFAULT NULL,
  `Venue_Address_2` varchar(100) DEFAULT NULL,
  `Venue_Zip_Code` varchar(20) DEFAULT NULL,
  `Landmark` varchar(250) DEFAULT NULL,
  `Contact_Person` varchar(100) DEFAULT NULL,
  `Contact_Person_Mobile` varchar(25) DEFAULT NULL,
  `Event_Date_Time` datetime DEFAULT NULL,
  `Msg` text,
  `Lat` decimal(12,9) DEFAULT NULL,
  `Long` decimal(12,9) DEFAULT NULL,
  `Is_Shareable` tinyint(1) DEFAULT NULL,
  `Created_At` datetime DEFAULT NULL,
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event_confirmation`
--

CREATE TABLE `event_confirmation` (
  `ID` int(11) NOT NULL,
  `Event_ID` int(11) NOT NULL,
  `Event_Shared_ID` int(11) DEFAULT NULL,
  `Invitees_ID` int(11) DEFAULT NULL COMMENT 'user_id',
  `Conformation_Status` tinyint(1) DEFAULT NULL,
  `Msg` text,
  `Created_At` datetime DEFAULT NULL,
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `ID` int(11) NOT NULL,
  `Status` tinyint(1) DEFAULT NULL,
  `Category_ID` int(11) DEFAULT NULL,
  `Comments` varchar(500) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Image_Path` varchar(255) DEFAULT NULL,
  `Msg` text,
  `Created_At` datetime DEFAULT NULL,
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback_category`
--

CREATE TABLE `feedback_category` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Created_At` datetime DEFAULT NULL,
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `frame`
--

CREATE TABLE `frame` (
  `ID` int(11) NOT NULL,
  `Name` varchar(155) NOT NULL,
  `Frame_Design_ID` int(11) DEFAULT NULL,
  `Price` decimal(11,2) DEFAULT NULL,
  `Height` decimal(5,2) DEFAULT NULL,
  `Width` decimal(5,2) DEFAULT NULL,
  `Created_At` datetime DEFAULT NULL,
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `frame_design`
--

CREATE TABLE `frame_design` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Religion_ID` int(11) DEFAULT NULL,
  `Glass_Thickness` varchar(10) DEFAULT NULL,
  `Hardboard_Thickness` varchar(10) DEFAULT NULL,
  `Designed_By` varchar(100) DEFAULT NULL,
  `Created_At` datetime DEFAULT NULL,
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `frame_order`
--

CREATE TABLE `frame_order` (
  `ID` int(11) NOT NULL,
  `Frame_ID` int(11) DEFAULT NULL,
  `Frame_Design_ID` int(11) DEFAULT NULL,
  `Frame_Type_ID` int(11) DEFAULT NULL,
  `Frame_Size_ID` int(11) DEFAULT NULL,
  `Frame_Price` decimal(11,2) DEFAULT NULL,
  `Frame_Expect_Delivery_Date` datetime DEFAULT NULL,
  `Shipping_Address_ID` varchar(255) DEFAULT NULL,
  `Order_Date` datetime DEFAULT NULL,
  `Payment_Mode` varchar(20) DEFAULT NULL,
  `Payment_ID` varchar(100) DEFAULT NULL,
  `Transaction_ID` varchar(100) DEFAULT NULL,
  `Amount_Paid` decimal(11,2) DEFAULT NULL,
  `Delivery_Status` tinyint(1) DEFAULT NULL,
  `Delivered_By_ID` int(11) DEFAULT NULL,
  `Delivered_Date` date DEFAULT NULL,
  `Vendor_ID` int(11) DEFAULT NULL,
  `Created_At` datetime DEFAULT NULL,
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `frame_size`
--

CREATE TABLE `frame_size` (
  `ID` int(11) NOT NULL,
  `Height` decimal(4,2) DEFAULT NULL,
  `Width` decimal(4,2) DEFAULT NULL,
  `Created_At` datetime DEFAULT NULL,
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `global_preferences`
--

CREATE TABLE `global_preferences` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Value` varchar(255) DEFAULT NULL,
  `Created_At` datetime DEFAULT NULL,
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `ID` int(11) NOT NULL,
  `Sender_ID` int(11) NOT NULL,
  `Receiver_ID` int(11) NOT NULL,
  `Order_No` int(11) DEFAULT NULL,
  `Notification_Text` varchar(255) NOT NULL,
  `Notification_Type` varchar(50) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `Notification_Sent_At` datetime DEFAULT NULL,
  `Created_At` datetime DEFAULT NULL,
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Offer_Type_ID` int(11) DEFAULT NULL,
  `Valid_From` datetime DEFAULT NULL,
  `Valid_Till` datetime DEFAULT NULL,
  `Valid_Till_Count` int(11) DEFAULT NULL,
  `Min_Order_Amount` decimal(11,2) DEFAULT NULL,
  `Max_Offer_Amount` decimal(11,2) DEFAULT NULL,
  `Persent_Off` int(2) DEFAULT NULL,
  `Fixed_Off` decimal(11,2) DEFAULT NULL,
  `Coupon_Code` varchar(20) DEFAULT NULL,
  `Coupon_Code_Added_By` int(11) DEFAULT NULL COMMENT 'user_id',
  `Coupon_Code_Updated_By` int(11) DEFAULT NULL COMMENT 'user_id',
  `Detail` text,
  `Created_At` datetime DEFAULT NULL,
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `religion`
--

CREATE TABLE `religion` (
  `ID` int(11) NOT NULL,
  `Religion` varchar(50) DEFAULT NULL,
  `Created_At` datetime DEFAULT NULL,
  `Updated_At` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shared_event`
--

CREATE TABLE `shared_event` (
  `ID` int(11) NOT NULL,
  `Event_ID` int(11) DEFAULT NULL,
  `Event_Owner_ID` int(11) DEFAULT NULL,
  `Shared_With_ID` int(11) DEFAULT NULL,
  `Shared_By_ID` int(11) DEFAULT NULL,
  `Description` text,
  `Shared_On_Date` datetime DEFAULT NULL,
  `Status` tinyint(1) DEFAULT NULL,
  `Created_At` datetime DEFAULT NULL,
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shared_wall`
--

CREATE TABLE `shared_wall` (
  `ID` int(11) NOT NULL,
  `Wall_ID` int(11) NOT NULL,
  `Shared_With_ID` int(11) DEFAULT NULL,
  `Shared_On_Date` datetime DEFAULT NULL,
  `Shared_By_ID` int(11) DEFAULT NULL,
  `Status` tinyint(1) DEFAULT NULL,
  `Created_At` datetime DEFAULT NULL,
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_address`
--

CREATE TABLE `shipping_address` (
  `ID` int(11) NOT NULL,
  `Status` tinyint(1) DEFAULT NULL,
  `House_No` varchar(20) DEFAULT NULL,
  `Street` varchar(50) DEFAULT NULL,
  `Colony_Name` varchar(50) DEFAULT NULL,
  `Area_Name` varchar(50) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `Pin` varchar(20) DEFAULT NULL,
  `State` varchar(50) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `Landmark` varchar(100) DEFAULT NULL,
  `Special_Instraction` varchar(250) DEFAULT NULL,
  `Created_At` datetime DEFAULT NULL,
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Mobile_No` varchar(20) DEFAULT NULL,
  `Office_Contact_No` varchar(20) DEFAULT NULL,
  `Whats_No` varchar(20) DEFAULT NULL,
  `Skype_ID` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Address_Line_1` varchar(100) DEFAULT NULL,
  `Address_Line_2` varchar(100) DEFAULT NULL,
  `Zip_Code` varchar(100) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `State` varchar(50) DEFAULT NULL,
  `Country` varchar(50) DEFAULT NULL,
  `Firm_Name` varchar(50) DEFAULT NULL,
  `Service_ID` int(11) DEFAULT NULL,
  `Created_At` datetime DEFAULT NULL,
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wall`
--

CREATE TABLE `wall` (
  `ID` int(11) NOT NULL,
  `Wall_Name` varchar(100) NOT NULL,
  `Temp_Name` varchar(50) NOT NULL,
  `Temp_ID` int(11) DEFAULT NULL,
  `Deceased_Name` varchar(100) DEFAULT NULL,
  `Deceased_Father_Name` varchar(100) DEFAULT NULL,
  `Deceased_Husband_Name` varchar(100) DEFAULT NULL,
  `Relation_With_Deceased` varchar(100) NOT NULL,
  `DOB_Of_Deceased` datetime DEFAULT NULL,
  `DOD_Of_Deceased` datetime DEFAULT NULL,
  `Deceased_Photo` varchar(250) DEFAULT NULL,
  `Demise_Message` text,
  `Is_Shareable` tinyint(1) DEFAULT NULL,
  `Created_At` datetime DEFAULT NULL,
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wall_condolence_msg_thread`
--

CREATE TABLE `wall_condolence_msg_thread` (
  `ID` int(11) NOT NULL,
  `Wall_ID` int(11) DEFAULT NULL,
  `Condolence_Msg` varchar(500) DEFAULT NULL,
  `Msg_Owner_ID` int(11) DEFAULT NULL,
  `Msg_Date` datetime DEFAULT NULL,
  `Msg_Viewed_OnDate` datetime DEFAULT NULL,
  `Created_At` datetime DEFAULT NULL,
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `album_cover_material`
--
ALTER TABLE `album_cover_material`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `album_images`
--
ALTER TABLE `album_images`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `album_order`
--
ALTER TABLE `album_order`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `album_page_type`
--
ALTER TABLE `album_page_type`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `album_size`
--
ALTER TABLE `album_size`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `demo_request`
--
ALTER TABLE `demo_request`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `event_confirmation`
--
ALTER TABLE `event_confirmation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `feedback_category`
--
ALTER TABLE `feedback_category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `frame`
--
ALTER TABLE `frame`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `frame_design`
--
ALTER TABLE `frame_design`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `frame_order`
--
ALTER TABLE `frame_order`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `frame_size`
--
ALTER TABLE `frame_size`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `global_preferences`
--
ALTER TABLE `global_preferences`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `religion`
--
ALTER TABLE `religion`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `shared_event`
--
ALTER TABLE `shared_event`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `shared_wall`
--
ALTER TABLE `shared_wall`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `shipping_address`
--
ALTER TABLE `shipping_address`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `wall`
--
ALTER TABLE `wall`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `wall_condolence_msg_thread`
--
ALTER TABLE `wall_condolence_msg_thread`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `album_cover_material`
--
ALTER TABLE `album_cover_material`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `album_images`
--
ALTER TABLE `album_images`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `album_order`
--
ALTER TABLE `album_order`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `album_page_type`
--
ALTER TABLE `album_page_type`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `album_size`
--
ALTER TABLE `album_size`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `demo_request`
--
ALTER TABLE `demo_request`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `event_confirmation`
--
ALTER TABLE `event_confirmation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `feedback_category`
--
ALTER TABLE `feedback_category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `frame`
--
ALTER TABLE `frame`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `frame_design`
--
ALTER TABLE `frame_design`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `frame_order`
--
ALTER TABLE `frame_order`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `frame_size`
--
ALTER TABLE `frame_size`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `global_preferences`
--
ALTER TABLE `global_preferences`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `religion`
--
ALTER TABLE `religion`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shared_event`
--
ALTER TABLE `shared_event`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shared_wall`
--
ALTER TABLE `shared_wall`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shipping_address`
--
ALTER TABLE `shipping_address`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wall`
--
ALTER TABLE `wall`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wall_condolence_msg_thread`
--
ALTER TABLE `wall_condolence_msg_thread`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
