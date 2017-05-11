/*
SQLyog Ultimate v9.20 
MySQL - 5.5.5-10.1.13-MariaDB : Database - pnoana_old
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pnoana_old` /*!40100 DEFAULT CHARACTER SET latin1 */;

/*Table structure for table `album` */

DROP TABLE IF EXISTS `album`;

CREATE TABLE `album` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) DEFAULT NULL,
  `Album_Size_Id` int(11) DEFAULT NULL,
  `Album_Cover_Design` varchar(250) DEFAULT NULL,
  `Album_Cover_Material_Id` int(11) DEFAULT NULL,
  `Album_Page_Type_Id` int(11) DEFAULT NULL,
  `Created_At` datetime DEFAULT NULL,
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `album` */

/*Table structure for table `album_cover_material` */

DROP TABLE IF EXISTS `album_cover_material`;

CREATE TABLE `album_cover_material` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(50) DEFAULT NULL,
  `Created_At` datetime DEFAULT NULL,
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `album_cover_material` */

/*Table structure for table `album_images` */

DROP TABLE IF EXISTS `album_images`;

CREATE TABLE `album_images` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Album_ID` int(11) DEFAULT NULL,
  `Image_Path` varchar(150) DEFAULT NULL,
  `Created_At` datetime DEFAULT NULL,
  `updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `album_images` */

/*Table structure for table `album_order` */

DROP TABLE IF EXISTS `album_order`;

CREATE TABLE `album_order` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
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
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `album_order` */

/*Table structure for table `album_page_type` */

DROP TABLE IF EXISTS `album_page_type`;

CREATE TABLE `album_page_type` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(50) DEFAULT NULL,
  `Style` varchar(50) DEFAULT NULL,
  `Created_At` datetime DEFAULT NULL,
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `album_page_type` */

/*Table structure for table `album_size` */

DROP TABLE IF EXISTS `album_size`;

CREATE TABLE `album_size` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Height` decimal(4,2) DEFAULT NULL,
  `Width` decimal(4,2) DEFAULT NULL,
  `Created_At` datetime DEFAULT NULL,
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `album_size` */

/*Table structure for table `demo_request` */

DROP TABLE IF EXISTS `demo_request`;

CREATE TABLE `demo_request` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
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
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `demo_request` */

/*Table structure for table `event` */

DROP TABLE IF EXISTS `event`;

CREATE TABLE `event` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
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
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `event` */

/*Table structure for table `event_confirmation` */

DROP TABLE IF EXISTS `event_confirmation`;

CREATE TABLE `event_confirmation` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Event_ID` int(11) NOT NULL,
  `Event_Shared_ID` int(11) DEFAULT NULL,
  `Invitees_ID` int(11) DEFAULT NULL COMMENT 'user_id',
  `Conformation_Status` tinyint(1) DEFAULT NULL,
  `Msg` text,
  `Created_At` datetime DEFAULT NULL,
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `event_confirmation` */

/*Table structure for table `feedback` */

DROP TABLE IF EXISTS `feedback`;

CREATE TABLE `feedback` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Status` tinyint(1) DEFAULT NULL,
  `Category_ID` int(11) DEFAULT NULL,
  `Comments` varchar(500) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Image_Path` varchar(255) DEFAULT NULL,
  `Msg` text,
  `Created_At` datetime DEFAULT NULL,
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `feedback` */

/*Table structure for table `feedback_category` */

DROP TABLE IF EXISTS `feedback_category`;

CREATE TABLE `feedback_category` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) DEFAULT NULL,
  `Created_At` datetime DEFAULT NULL,
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `feedback_category` */

/*Table structure for table `frame` */

DROP TABLE IF EXISTS `frame`;

CREATE TABLE `frame` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(155) NOT NULL,
  `Frame_Design_ID` int(11) DEFAULT NULL,
  `Price` decimal(11,2) DEFAULT NULL,
  `Height` decimal(5,2) DEFAULT NULL,
  `Width` decimal(5,2) DEFAULT NULL,
  `Created_At` datetime DEFAULT NULL,
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `frame` */

/*Table structure for table `frame_design` */

DROP TABLE IF EXISTS `frame_design`;

CREATE TABLE `frame_design` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) DEFAULT NULL,
  `Religion_ID` int(11) DEFAULT NULL,
  `Glass_Thickness` varchar(10) DEFAULT NULL,
  `Hardboard_Thickness` varchar(10) DEFAULT NULL,
  `Designed_By` varchar(100) DEFAULT NULL,
  `Created_At` datetime DEFAULT NULL,
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `frame_design` */

/*Table structure for table `frame_order` */

DROP TABLE IF EXISTS `frame_order`;

CREATE TABLE `frame_order` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
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
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `frame_order` */

/*Table structure for table `frame_size` */

DROP TABLE IF EXISTS `frame_size`;

CREATE TABLE `frame_size` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Height` decimal(4,2) DEFAULT NULL,
  `Width` decimal(4,2) DEFAULT NULL,
  `Created_At` datetime DEFAULT NULL,
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `frame_size` */

/*Table structure for table `global_preferences` */

DROP TABLE IF EXISTS `global_preferences`;

CREATE TABLE `global_preferences` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `Value` varchar(255) DEFAULT NULL,
  `Created_At` datetime DEFAULT NULL,
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `global_preferences` */

/*Table structure for table `notification` */

DROP TABLE IF EXISTS `notification`;

CREATE TABLE `notification` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Sender_ID` int(11) NOT NULL,
  `Receiver_ID` int(11) NOT NULL,
  `Order_No` int(11) DEFAULT NULL,
  `Notification_Text` varchar(255) NOT NULL,
  `Notification_Type` varchar(50) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `Notification_Sent_At` datetime DEFAULT NULL,
  `Created_At` datetime DEFAULT NULL,
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `notification` */

/*Table structure for table `offers` */

DROP TABLE IF EXISTS `offers`;

CREATE TABLE `offers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
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
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `offers` */

/*Table structure for table `religion` */

DROP TABLE IF EXISTS `religion`;

CREATE TABLE `religion` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Religion` varchar(50) DEFAULT NULL,
  `Created_At` datetime DEFAULT NULL,
  `Updated_At` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `religion` */

/*Table structure for table `shared_event` */

DROP TABLE IF EXISTS `shared_event`;

CREATE TABLE `shared_event` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Event_ID` int(11) DEFAULT NULL,
  `Event_Owner_ID` int(11) DEFAULT NULL,
  `Shared_With_ID` int(11) DEFAULT NULL,
  `Shared_By_ID` int(11) DEFAULT NULL,
  `Description` text,
  `Shared_On_Date` datetime DEFAULT NULL,
  `Status` tinyint(1) DEFAULT NULL,
  `Created_At` datetime DEFAULT NULL,
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `shared_event` */

/*Table structure for table `shared_wall` */

DROP TABLE IF EXISTS `shared_wall`;

CREATE TABLE `shared_wall` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Wall_ID` int(11) NOT NULL,
  `Shared_With_ID` int(11) DEFAULT NULL,
  `Shared_On_Date` datetime DEFAULT NULL,
  `Shared_By_ID` int(11) DEFAULT NULL,
  `Status` tinyint(1) DEFAULT NULL,
  `Created_At` datetime DEFAULT NULL,
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `shared_wall` */

/*Table structure for table `shipping_address` */

DROP TABLE IF EXISTS `shipping_address`;

CREATE TABLE `shipping_address` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
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
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `shipping_address` */

/*Table structure for table `vendor` */

DROP TABLE IF EXISTS `vendor`;

CREATE TABLE `vendor` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
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
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `vendor` */

/*Table structure for table `wall` */

DROP TABLE IF EXISTS `wall`;

CREATE TABLE `wall` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
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
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `wall` */

/*Table structure for table `wall_condolence_msg_thread` */

DROP TABLE IF EXISTS `wall_condolence_msg_thread`;

CREATE TABLE `wall_condolence_msg_thread` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Wall_ID` int(11) DEFAULT NULL,
  `Condolence_Msg` varchar(500) DEFAULT NULL,
  `Msg_Owner_ID` int(11) DEFAULT NULL,
  `Msg_Date` datetime DEFAULT NULL,
  `Msg_Viewed_OnDate` datetime DEFAULT NULL,
  `Created_At` datetime DEFAULT NULL,
  `Updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `wall_condolence_msg_thread` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
