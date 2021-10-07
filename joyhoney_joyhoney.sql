-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 06, 2021 at 04:15 PM
-- Server version: 10.3.30-MariaDB-log-cll-lve
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `joyhoney_joyhoney`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_log`
--

CREATE TABLE `access_log` (
  `ACCESS_LOG_ID` int(11) NOT NULL,
  `ACCESS_BY_AGENT` int(11) NOT NULL,
  `ACCESS_BY_IP_ADDRESS` varchar(20) DEFAULT NULL,
  `ACCESS_FROM_OS` varchar(20) DEFAULT NULL,
  `ACCESS_ON_DATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `AGENT_ID` int(11) NOT NULL,
  `AGENT_NAME` varchar(50) DEFAULT NULL,
  `AGENT_ADDRESS` varchar(250) DEFAULT NULL,
  `AGENT_ADHAR_NO` varchar(20) DEFAULT NULL,
  `AGENT_PHONE_NUMBER` varchar(20) DEFAULT NULL,
  `AGENT_FOR_CITY` varchar(30) DEFAULT NULL,
  `AGENT_STATUS` varchar(255) NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`AGENT_ID`, `AGENT_NAME`, `AGENT_ADDRESS`, `AGENT_ADHAR_NO`, `AGENT_PHONE_NUMBER`, `AGENT_FOR_CITY`, `AGENT_STATUS`) VALUES
(1, 'KHAJA ', 'Agent Address', '664507252052', '8156005006', '20', 'ACTIVE'),
(2, 'JOY', 'Agent Address', '479824933314', '8866477741', '9', 'ACTIVE'),
(3, 'SAI', 'Agent AddressKJB/', '564789256341', '8903557126', '20', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `agents_to_area`
--

CREATE TABLE `agents_to_area` (
  `AG_TO_AREA_ID` int(11) NOT NULL,
  `AREA_ID_AG` int(11) DEFAULT NULL,
  `AREA_TO_DISTRICT` int(11) DEFAULT NULL,
  `AREA_TO_AGENT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agents_to_area`
--

INSERT INTO `agents_to_area` (`AG_TO_AREA_ID`, `AREA_ID_AG`, `AREA_TO_DISTRICT`, `AREA_TO_AGENT`) VALUES
(1, 1, 20, 1),
(2, 2, 20, 1),
(3, 3, 20, 1),
(4, 4, 9, 2),
(5, 5, 9, 2),
(6, 6, 9, 2),
(7, 7, 9, NULL),
(8, 8, 9, NULL),
(9, 9, 9, NULL),
(10, 10, 20, 3),
(11, 11, 20, 3),
(12, 12, 19, NULL),
(13, 13, 20, 3);

-- --------------------------------------------------------

--
-- Stand-in structure for view `agents_to_area_view`
-- (See below for the actual view)
--
CREATE TABLE `agents_to_area_view` (
`AREA_ID` int(11)
,`AREA_NAME` varchar(50)
,`AREA_DISTRICT` int(11)
,`AG_TO_AREA_ID` int(11)
,`AREA_ID_AG` int(11)
,`AREA_TO_DISTRICT` int(11)
,`AREA_TO_AGENT` int(11)
,`DISTRICT_ID` int(11)
,`DISTRICT_NAME` varchar(50)
,`AGENT_ID` int(11)
,`AGENT_NAME` varchar(50)
,`AGENT_ADDRESS` varchar(250)
,`AGENT_ADHAR_NO` varchar(20)
,`AGENT_PHONE_NUMBER` varchar(20)
,`AGENT_FOR_CITY` varchar(30)
,`AGENT_STATUS` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `AREA_ID` int(11) NOT NULL,
  `AREA_NAME` varchar(50) DEFAULT NULL,
  `AREA_DISTRICT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`AREA_ID`, `AREA_NAME`, `AREA_DISTRICT`) VALUES
(1, 'MK NAGER', 20),
(2, 'nk', 20),
(3, 'KARAN CHOCK', 20),
(4, 'AARALE', 9),
(5, 'AAYANA', 9),
(6, 'OSARLI', 9),
(7, 'KAKARDE', 9),
(8, 'bazzar', 9),
(9, 'chock', 9),
(10, 'CHIKHALI', 20),
(11, 'BIGBOSS', 20),
(12, 'bazzar', 19),
(13, 'bazzar', 20);

--
-- Triggers `areas`
--
DELIMITER $$
CREATE TRIGGER `ADD_TO_AENTS_TO_AREA` AFTER INSERT ON `areas` FOR EACH ROW INSERT INTO `agents_to_area`
( `AREA_ID_AG`, `AREA_TO_DISTRICT`)
VALUES (
    NEW.AREA_ID,
    NEW.AREA_DISTRICT
   )
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `BRAND_ID` int(11) NOT NULL,
  `BRAND_NAME` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`BRAND_ID`, `BRAND_NAME`) VALUES
(5, 'EVER COOL '),
(6, 'ARISTO'),
(7, 'SAI'),
(8, 'HITES STEELS');

-- --------------------------------------------------------

--
-- Table structure for table `collectionList`
--

CREATE TABLE `collectionList` (
  `COLLECTION_ID` bigint(20) NOT NULL,
  `COLLECTION_LN_ID` bigint(20) NOT NULL,
  `COLLECTION_TO_CUSTOMER` bigint(20) DEFAULT NULL,
  `COLLECTION_TO_PRODUCT` bigint(20) DEFAULT NULL,
  `COLLECTION_TOTAL_AMOUNT` varchar(50) DEFAULT NULL,
  `COLLECTION_LAST_AMOUNT_PAID` bigint(20) DEFAULT 0,
  `COLLECTION_BALANCE_AMOUNT` varchar(50) DEFAULT NULL,
  `COLLECTION_ON_DATE` date DEFAULT NULL COMMENT 'NEXT COLLECTION DATE ADDED ON DATE OF CREATION',
  `COLLECTION_STATUS` int(11) DEFAULT 1,
  `PAID_ON` varchar(50) NOT NULL DEFAULT 'ON STORE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `collectionList`
--

INSERT INTO `collectionList` (`COLLECTION_ID`, `COLLECTION_LN_ID`, `COLLECTION_TO_CUSTOMER`, `COLLECTION_TO_PRODUCT`, `COLLECTION_TOTAL_AMOUNT`, `COLLECTION_LAST_AMOUNT_PAID`, `COLLECTION_BALANCE_AMOUNT`, `COLLECTION_ON_DATE`, `COLLECTION_STATUS`, `PAID_ON`) VALUES
(1, 1, 1, 1, '2700', 400, '1800', '2021-09-27', 1, '2'),
(2, 2, 2, 2, '2600', 50, '1950', '2021-09-27', 1, '2'),
(3, 3, 3, 4, '4500', 200, '3500', '2021-09-27', 1, '2'),
(4, 4, 4, 3, '3600', 300, '3300', '2021-09-13', 1, 'ON STORE'),
(5, 5, 5, 4, '4500', 1000, '3500', '2021-09-13', 1, 'ON STORE'),
(6, 6, 6, 5, '330', 30, '300', '2021-09-13', 1, 'ON STORE'),
(7, 7, 7, 3, '3600', 500, '2500', '2021-09-20', 1, '1'),
(8, 8, 8, 2, '2600', 50, '2000', '2021-09-20', 1, '1'),
(9, 9, 9, 5, '1650', 200, '800', '2021-09-20', 1, '1'),
(10, 10, 10, 4, '4500', 450, '3500', '2021-09-20', 1, '1'),
(11, 11, 11, 3, '3600', 200, '2800', '2021-09-20', 1, '3'),
(12, 12, 12, 5, '990', 190, '600', '2021-09-20', 1, '3'),
(13, 13, 13, 2, '13000', 500, '8500', '2021-10-04', 1, '3');

--
-- Triggers `collectionList`
--
DELIMITER $$
CREATE TRIGGER `INSERT_TO_TRANSACTION_TABLE` AFTER INSERT ON `collectionList` FOR EACH ROW INSERT INTO `loanTransaction`(
    `TR_LN_ID`,
    `TR_OF_CUSTOMER`, 
    `TR_TO_PRODUCT`,
    `TR_AMOUNT_PAID_INITIAL`,
    `TR_AMOUNT_PAID`, 
    `TR_AMOUNT_BALANCE`,
    `TR_DONE_ON`) 
VALUES (
                           
NEW.COLLECTION_LN_ID ,                        NEW.COLLECTION_TO_CUSTOMER,
NEW.COLLECTION_TO_PRODUCT,
NEW.COLLECTION_TOTAL_AMOUNT,                  NEW.COLLECTION_LAST_AMOUNT_PAID,
NEW.COLLECTION_BALANCE_AMOUNT,
NEW.PAID_ON 

    )
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_on_update_transaction` AFTER UPDATE ON `collectionList` FOR EACH ROW INSERT INTO `loanTransaction`(
`TR_LN_ID`,
`TR_OF_CUSTOMER`, 
`TR_TO_PRODUCT`,
`TR_AMOUNT_PAID_INITIAL`,
`TR_AMOUNT_PAID`, 
`TR_AMOUNT_BALANCE`,
`TR_DONE_ON`
) 
VALUES (
NEW.COLLECTION_LN_ID ,                        NEW.COLLECTION_TO_CUSTOMER,                    NEW.COLLECTION_TO_PRODUCT,
NEW.COLLECTION_TOTAL_AMOUNT ,                  NEW.COLLECTION_LAST_AMOUNT_PAID,              NEW.COLLECTION_BALANCE_AMOUNT,
NEW.PAID_ON 
)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_to_loanmaster` BEFORE UPDATE ON `collectionList` FOR EACH ROW UPDATE `loanMaster` SET `LN_TAB_BALANCE_AMOUNT`=NEW. 	COLLECTION_BALANCE_AMOUNT ,
`LN_STATUS`=NEW.COLLECTION_STATUS 
WHERE 
loanMaster.LOAN_ID=NEW.COLLECTION_LN_ID AND 
  `LN_TO_CUSTOMER`=NEW.COLLECTION_TO_CUSTOMER
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `collectionListView`
-- (See below for the actual view)
--
CREATE TABLE `collectionListView` (
`CUSTOMER_ID` bigint(20)
,`LOAN_ID` bigint(20)
,`CUSTOMER_FIRST_NAME` varchar(50)
,`CUSTOMER_PHONE_NUMBER` varchar(255)
,`DISTRICT_NAME` varchar(50)
,`PRODUCT_NAME` varchar(50)
,`LN_PRODUCT_QUANTITY` bigint(20)
,`LN_TAB_TOTAL_AMOUNT` varchar(50)
,`LN_TAB_BALANCE_AMOUNT` varchar(50)
,`LN_STATUS` int(11)
,`LN_ON_DATE` date
,`COLLECTION_BALANCE_AMOUNT` varchar(50)
,`AREA_NAME` varchar(50)
,`AREA_ID` int(11)
,`DISTRICT_ID` int(11)
,`COLLECTION_ON_DATE` date
);

-- --------------------------------------------------------

--
-- Table structure for table `customermaster`
--

CREATE TABLE `customermaster` (
  `CUSTOMER_ID` bigint(20) NOT NULL,
  `CUSTOMER_FIRST_NAME` varchar(50) DEFAULT NULL,
  `CUSTOMER_LAST_NAME` varchar(50) DEFAULT NULL,
  `CUSTOMER_PHONE_NUMBER` varchar(255) DEFAULT NULL,
  `CUSTOMER_EMAIL` varchar(50) DEFAULT NULL,
  `CUSTOMER_ADHAR_NO` varchar(50) DEFAULT NULL,
  `CUSTOMER_DISTRICT` int(11) DEFAULT NULL,
  `CUSTOMER_CITY` int(11) DEFAULT NULL,
  `CUSTOMER_ADDRESS` varchar(50) DEFAULT NULL,
  `CUSTOMER_STATUS` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customermaster`
--

INSERT INTO `customermaster` (`CUSTOMER_ID`, `CUSTOMER_FIRST_NAME`, `CUSTOMER_LAST_NAME`, `CUSTOMER_PHONE_NUMBER`, `CUSTOMER_EMAIL`, `CUSTOMER_ADHAR_NO`, `CUSTOMER_DISTRICT`, `CUSTOMER_CITY`, `CUSTOMER_ADDRESS`, `CUSTOMER_STATUS`) VALUES
(1, 'ROHAIT', 'PATEL', '', '', '', 9, 4, 'FW', 1),
(2, 'RAM', 'KNK', '', '', '', 9, 5, 'QWD', 1),
(3, 'VIJAY', ',M ', '', '', '', 9, 6, '. ', 1),
(4, 'RAHUL', 'MN', '', '', '', 9, 7, ' ,M', 1),
(5, 'SHARMA', '., ', '', '', '', 9, 9, '/. ', 1),
(6, 'DJ', 'KLNLKN', '', '', '', 9, 8, ',M ,', 1),
(7, 'SADDAM', '., ', '', '', '', 20, 1, '/..', 1),
(8, 'HUSSAIN', 'shinga', '', '', '', 20, 2, 'V.KJV', 1),
(9, 'FIROZ', ',M', '', '', '', 20, 2, 'LLN', 1),
(10, 'SIKANDER', '//', '', '', '', 20, 3, '.;,;,/', 1),
(11, 'BAPS', 'UGB', '', '', '', 20, 10, 'N, ', 1),
(12, 'BABU', ',J', '', '', '', 20, 11, ' V ', 1),
(13, 'MHGC', 'KUYDFC', '', '', '', 20, 13, 'HGC', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `customerMasterView`
-- (See below for the actual view)
--
CREATE TABLE `customerMasterView` (
`CUSTOMER_ID` bigint(20)
,`CUSTOMER_FIRST_NAME` varchar(50)
,`CUSTOMER_LAST_NAME` varchar(50)
,`CUSTOMER_PHONE_NUMBER` varchar(255)
,`DISTRICT_NAME` varchar(50)
,`AREA_NAME` varchar(50)
,`AREA_ID` int(11)
,`DISTRICT_ID` int(11)
,`CUSTOMER_STATUS` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `customerTransactionView`
-- (See below for the actual view)
--
CREATE TABLE `customerTransactionView` (
`CUSTOMER_FIRST_NAME` varchar(50)
,`CUSTOMER_LAST_NAME` varchar(50)
,`CUSTOMER_ID` bigint(20)
,`CUSTOMER_PHONE_NUMBER` varchar(255)
,`PRODUCT_NAME` varchar(50)
,`PRODUCT_MODEL_NO` varchar(50)
,`PRODUCT_PRICE` bigint(20)
,`LN_PRODUCT_QUANTITY` bigint(20)
,`TR_AMOUNT_PAID` bigint(20)
,`TR_AMOUNT_BALANCE` bigint(20)
,`TR_DATE` date
,`TR_TIME` time
,`TR_OF_CUSTOMER` bigint(20)
,`TR_AMOUNT_PAID_INITIAL` bigint(20)
,`TR_COMMIT_STATUS` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `DISTRICT_ID` int(11) NOT NULL,
  `DISTRICT_NAME` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`DISTRICT_ID`, `DISTRICT_NAME`) VALUES
(1, 'Ahmednagar'),
(2, 'Akola'),
(3, 'Amravati'),
(4, 'Aurangabad'),
(5, 'Beed'),
(6, 'Bhandara'),
(7, 'Buldhana'),
(8, 'Chandrapur'),
(9, 'Dhule'),
(10, 'Gadchiroli'),
(11, 'Gondia'),
(12, 'Hingoli'),
(13, 'Jalgaon'),
(14, 'Jalna'),
(15, 'Kolhapur'),
(16, 'Latur'),
(17, 'Mumbai City'),
(18, 'Mumbai suburban'),
(19, 'Nanded'),
(20, 'Nandurbar'),
(21, 'Nagpur'),
(22, 'Nashik'),
(23, 'Osmanabad'),
(24, 'Parbhani'),
(25, 'Pune'),
(26, 'Raigad'),
(27, 'Ratnagiri'),
(28, 'Sangli'),
(29, 'Satara'),
(30, 'Sindhudurg'),
(31, 'Solapur'),
(32, 'Thane'),
(33, 'Wardha'),
(34, 'Washim'),
(35, 'Yavatmal');

-- --------------------------------------------------------

--
-- Table structure for table `loanMaster`
--

CREATE TABLE `loanMaster` (
  `LOAN_ID` bigint(20) NOT NULL,
  `LN_TO_CUSTOMER` bigint(20) DEFAULT NULL,
  `LN_TO_PRODUCT` bigint(20) DEFAULT NULL,
  `LN_PRODUCT_QUANTITY` bigint(20) DEFAULT NULL,
  `LN_TAB_TOTAL_AMOUNT` varchar(50) DEFAULT NULL,
  `LN_TAB_INITIAL_AMOUNT` varchar(50) DEFAULT NULL,
  `LN_TAB_BALANCE_AMOUNT` varchar(50) DEFAULT NULL,
  `LN_STATUS` int(11) DEFAULT NULL,
  `LN_ON_DATE` date DEFAULT current_timestamp(),
  `LN_ON_TIME` timestamp NULL DEFAULT current_timestamp(),
  `LN_ON` varchar(50) NOT NULL DEFAULT 'ON STORE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loanMaster`
--

INSERT INTO `loanMaster` (`LOAN_ID`, `LN_TO_CUSTOMER`, `LN_TO_PRODUCT`, `LN_PRODUCT_QUANTITY`, `LN_TAB_TOTAL_AMOUNT`, `LN_TAB_INITIAL_AMOUNT`, `LN_TAB_BALANCE_AMOUNT`, `LN_STATUS`, `LN_ON_DATE`, `LN_ON_TIME`, `LN_ON`) VALUES
(1, 1, 1, 2, '2700', '300', '1800', 1, '2021-09-06', '2021-09-06 05:21:04', 'ON STORE'),
(2, 2, 2, 1, '2600', '500', '1950', 1, '2021-09-06', '2021-09-06 05:23:37', 'ON STORE'),
(3, 3, 4, 1, '4500', '500', '3500', 1, '2021-09-06', '2021-09-06 05:24:20', 'ON STORE'),
(4, 4, 3, 1, '3600', '300', '3300', 1, '2021-09-06', '2021-09-06 05:25:27', 'ON STORE'),
(5, 5, 4, 1, '4500', '1000', '3500', 1, '2021-09-06', '2021-09-06 05:26:26', 'ON STORE'),
(6, 6, 5, 6, '330', '30', '300', 1, '2021-09-06', '2021-09-06 05:27:06', 'ON STORE'),
(7, 7, 3, 1, '3600', '600', '2500', 1, '2021-09-06', '2021-09-06 05:28:04', 'ON STORE'),
(8, 8, 2, 1, '2600', '550', '2000', 1, '2021-09-06', '2021-09-06 05:29:15', 'ON STORE'),
(9, 9, 5, 30, '1650', '650', '800', 1, '2021-09-06', '2021-09-06 05:30:08', 'ON STORE'),
(10, 10, 4, 1, '4500', '550', '3500', 1, '2021-09-06', '2021-09-06 05:32:00', 'ON STORE'),
(11, 11, 3, 1, '3600', '600', '2800', 1, '2021-09-06', '2021-09-06 05:48:51', 'ON STORE'),
(12, 12, 5, 18, '990', '200', '600', 1, '2021-09-06', '2021-09-06 05:49:26', 'ON STORE'),
(13, 13, 2, 5, '13000', '2999', '8500', 1, '2021-09-06', '2021-09-06 05:49:59', 'ON STORE');

--
-- Triggers `loanMaster`
--
DELIMITER $$
CREATE TRIGGER `add_to_collection_list` AFTER INSERT ON `loanMaster` FOR EACH ROW INSERT INTO `collectionList`( 
 `COLLECTION_LN_ID`,
 `COLLECTION_TO_CUSTOMER`, `COLLECTION_TO_PRODUCT`, `COLLECTION_TOTAL_AMOUNT`, 
`COLLECTION_LAST_AMOUNT_PAID`,               `COLLECTION_BALANCE_AMOUNT`, `COLLECTION_ON_DATE`,
`COLLECTION_STATUS`,
`PAID_ON`)
 VALUES ( 
    NEW.LOAN_ID ,
    NEW.LN_TO_CUSTOMER ,
    NEW.LN_TO_PRODUCT,
    NEW.LN_TAB_TOTAL_AMOUNT ,
    NEW.LN_TAB_INITIAL_AMOUNT ,                 NEW.LN_TAB_BALANCE_AMOUNT,
    DATE_ADD(NEW.LN_ON_DATE  , INTERVAL 7 DAY),
    NEW.LN_STATUS,
    NEW.LN_ON 
)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `add_to_salestable` AFTER INSERT ON `loanMaster` FOR EACH ROW INSERT INTO `sales`(
 `SALE_PRODUCT`,
 `SALE_PRODUCT_TO_CUSTOMER`, `SALE_PRODUCT_QUANTITY`, 
 `SALE_TOTAL_AMOUNT`, `SALE_PRODUCT_INITIAL_PAYMENT`, `SALE_PRODUCT_BALANCE_PAYMENT`)
VALUES (
    NEW.LN_TO_PRODUCT ,
    NEW.LN_TO_CUSTOMER,
    NEW.LN_PRODUCT_QUANTITY,
    NEW.LN_TAB_TOTAL_AMOUNT ,
    NEW.LN_TAB_INITIAL_AMOUNT ,
    NEW.LN_TAB_BALANCE_AMOUNT 	
)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `loanTransaction`
--

CREATE TABLE `loanTransaction` (
  `TR_ID` bigint(20) NOT NULL,
  `TR_LN_ID` bigint(20) NOT NULL,
  `TR_OF_CUSTOMER` bigint(20) DEFAULT NULL,
  `TR_TO_PRODUCT` bigint(20) DEFAULT NULL,
  `TR_AMOUNT_PAID_INITIAL` bigint(20) NOT NULL,
  `TR_AMOUNT_PAID` bigint(20) DEFAULT NULL,
  `TR_AMOUNT_BALANCE` bigint(20) DEFAULT NULL,
  `TR_DATE` date DEFAULT current_timestamp(),
  `TR_TIME` time DEFAULT current_timestamp(),
  `TR_COMMIT_STATUS` int(11) NOT NULL DEFAULT 1,
  `TR_DONE_ON` varchar(50) NOT NULL DEFAULT 'ON STORE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loanTransaction`
--

INSERT INTO `loanTransaction` (`TR_ID`, `TR_LN_ID`, `TR_OF_CUSTOMER`, `TR_TO_PRODUCT`, `TR_AMOUNT_PAID_INITIAL`, `TR_AMOUNT_PAID`, `TR_AMOUNT_BALANCE`, `TR_DATE`, `TR_TIME`, `TR_COMMIT_STATUS`, `TR_DONE_ON`) VALUES
(1, 1, 1, 1, 2700, 300, 2400, '2021-09-06', '15:21:04', 0, 'ON STORE'),
(2, 2, 2, 2, 2600, 500, 2100, '2021-09-06', '15:23:37', 0, 'ON STORE'),
(3, 3, 3, 4, 4500, 500, 4000, '2021-09-06', '15:24:20', 0, 'ON STORE'),
(4, 4, 4, 3, 3600, 300, 3300, '2021-09-06', '15:25:27', 0, 'ON STORE'),
(5, 5, 5, 4, 4500, 1000, 3500, '2021-09-06', '15:26:26', 0, 'ON STORE'),
(6, 6, 6, 5, 330, 30, 300, '2021-09-06', '15:27:06', 0, 'ON STORE'),
(7, 7, 7, 3, 3600, 600, 3000, '2021-09-06', '15:28:04', 0, 'ON STORE'),
(8, 8, 8, 2, 2600, 550, 2050, '2021-09-06', '15:29:15', 0, 'ON STORE'),
(9, 9, 9, 5, 1650, 650, 1000, '2021-09-06', '15:30:08', 0, 'ON STORE'),
(10, 10, 10, 4, 4500, 550, 3950, '2021-09-06', '15:32:00', 0, 'ON STORE'),
(11, 7, 7, 3, 3600, 500, 2500, '2021-09-06', '15:37:38', 0, '1'),
(12, 8, 8, 2, 2600, 50, 2000, '2021-09-06', '15:37:48', 0, '1'),
(13, 9, 9, 5, 1650, 200, 800, '2021-09-06', '15:37:55', 0, '1'),
(14, 10, 10, 4, 4500, 450, 3500, '2021-09-06', '15:38:02', 0, '1'),
(15, 1, 1, 1, 2700, 200, 2200, '2021-09-06', '15:41:08', 0, '2'),
(16, 2, 2, 2, 2600, 100, 2000, '2021-09-06', '15:41:17', 0, '2'),
(17, 3, 3, 4, 4500, 300, 3700, '2021-09-06', '15:41:24', 0, '2'),
(18, 1, 1, 1, 2700, 400, 1800, '2021-09-06', '15:41:58', 0, '2'),
(19, 3, 3, 4, 4500, 200, 3500, '2021-09-06', '15:42:40', 0, '2'),
(20, 2, 2, 2, 2600, 50, 1950, '2021-09-06', '15:42:51', 0, '2'),
(21, 11, 11, 3, 3600, 600, 3000, '2021-09-06', '15:48:51', 0, 'ON STORE'),
(22, 12, 12, 5, 990, 200, 790, '2021-09-06', '15:49:26', 0, 'ON STORE'),
(23, 13, 13, 2, 13000, 2999, 10001, '2021-09-06', '15:49:59', 0, 'ON STORE'),
(24, 13, 13, 2, 13000, 560, 9441, '2021-09-06', '15:51:00', 0, '3'),
(25, 11, 11, 3, 3600, 200, 2800, '2021-09-06', '15:51:07', 0, '3'),
(26, 12, 12, 5, 990, 190, 600, '2021-09-06', '15:51:17', 0, '3'),
(27, 13, 13, 2, 13000, 441, 9000, '2021-09-06', '15:53:08', 0, '3'),
(28, 13, 13, 2, 13000, 500, 8500, '2021-09-06', '16:01:19', 0, '3');

--
-- Triggers `loanTransaction`
--
DELIMITER $$
CREATE TRIGGER `UDATE_ON_LOAN_MASTER_IF_TRANSACTION_ALTERD` AFTER UPDATE ON `loanTransaction` FOR EACH ROW UPDATE `loanMaster` SET `LN_TAB_BALANCE_AMOUNT`=NEW.TR_AMOUNT_BALANCE
            WHERE `LOAN_ID`=NEW.TR_LN_ID  AND `LN_TO_CUSTOMER`=NEW.TR_OF_CUSTOMER
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `LOGINID` int(11) NOT NULL,
  `USERNAME` varchar(30) DEFAULT NULL,
  `USER_PASSWORD` varchar(250) DEFAULT NULL,
  `USER_LEVEL` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`LOGINID`, `USERNAME`, `USER_PASSWORD`, `USER_LEVEL`) VALUES
(1, 'ADMIN', '0e4e946668cf2afc4299b462b812caca', 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `PRODUCT_ID` bigint(20) NOT NULL,
  `PRODUCT_NAME` varchar(50) DEFAULT NULL,
  `PRODUCT_BRAND` int(11) DEFAULT NULL,
  `PRODUCT_MODEL_NO` varchar(50) DEFAULT NULL,
  `PRODUCT_PRICE` bigint(20) DEFAULT NULL,
  `PRODUCT_QUANTITY` bigint(20) DEFAULT NULL,
  `PRODUCT_STATUS` int(11) DEFAULT 1 COMMENT 'TO VIEW THE STATUS OF PRODUCT',
  `PRODUCT_CREATED` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`PRODUCT_ID`, `PRODUCT_NAME`, `PRODUCT_BRAND`, `PRODUCT_MODEL_NO`, `PRODUCT_PRICE`, `PRODUCT_QUANTITY`, `PRODUCT_STATUS`, `PRODUCT_CREATED`) VALUES
(1, 'FAN', 5, 'LOTES', 1450, 18, 1, NULL),
(2, 'MIXER', 6, 'SPEEDO', 2600, 25, 1, NULL),
(3, 'Aluminium 6', 7, 'soni', 3600, 21, 1, NULL),
(4, 'PEDESTAL FAN', 7, 'BULLET FAN', 4500, 9, 1, NULL),
(5, 'GLASS', 8, 'ROUND', 55, 46, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `SALE_ID` bigint(20) NOT NULL,
  `SALE_PRODUCT` bigint(20) DEFAULT NULL,
  `SALE_PRODUCT_TO_CUSTOMER` bigint(20) DEFAULT NULL,
  `SALE_PRODUCT_QUANTITY` bigint(20) DEFAULT NULL,
  `SALE_TOTAL_AMOUNT` bigint(20) DEFAULT NULL,
  `SALE_PRODUCT_INITIAL_PAYMENT` bigint(20) DEFAULT NULL,
  `SALE_PRODUCT_BALANCE_PAYMENT` bigint(20) DEFAULT NULL,
  `SALE_ON_DATE` date DEFAULT current_timestamp(),
  `SALE_ON_TIME` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`SALE_ID`, `SALE_PRODUCT`, `SALE_PRODUCT_TO_CUSTOMER`, `SALE_PRODUCT_QUANTITY`, `SALE_TOTAL_AMOUNT`, `SALE_PRODUCT_INITIAL_PAYMENT`, `SALE_PRODUCT_BALANCE_PAYMENT`, `SALE_ON_DATE`, `SALE_ON_TIME`) VALUES
(1, 1, 1, 2, 2700, 300, 2400, '2021-09-06', '2021-09-06 05:21:04'),
(2, 2, 2, 1, 2600, 500, 2100, '2021-09-06', '2021-09-06 05:23:37'),
(3, 4, 3, 1, 4500, 500, 4000, '2021-09-06', '2021-09-06 05:24:20'),
(4, 3, 4, 1, 3600, 300, 3300, '2021-09-06', '2021-09-06 05:25:27'),
(5, 4, 5, 1, 4500, 1000, 3500, '2021-09-06', '2021-09-06 05:26:26'),
(6, 5, 6, 6, 330, 30, 300, '2021-09-06', '2021-09-06 05:27:06'),
(7, 3, 7, 1, 3600, 600, 3000, '2021-09-06', '2021-09-06 05:28:04'),
(8, 2, 8, 1, 2600, 550, 2050, '2021-09-06', '2021-09-06 05:29:15'),
(9, 5, 9, 30, 1650, 650, 1000, '2021-09-06', '2021-09-06 05:30:08'),
(10, 4, 10, 1, 4500, 550, 3950, '2021-09-06', '2021-09-06 05:32:00'),
(11, 3, 11, 1, 3600, 600, 3000, '2021-09-06', '2021-09-06 05:48:51'),
(12, 5, 12, 18, 990, 200, 790, '2021-09-06', '2021-09-06 05:49:26'),
(13, 2, 13, 5, 13000, 2999, 10001, '2021-09-06', '2021-09-06 05:49:59');

--
-- Triggers `sales`
--
DELIMITER $$
CREATE TRIGGER `update_product_table` AFTER INSERT ON `sales` FOR EACH ROW UPDATE `products` SET `PRODUCT_QUANTITY`=`PRODUCT_QUANTITY`-NEW.SALE_PRODUCT_QUANTITY WHERE PRODUCT_ID=NEW.SALE_PRODUCT
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `todayTransactionView`
-- (See below for the actual view)
--
CREATE TABLE `todayTransactionView` (
`TR_ID` bigint(20)
,`TR_AMOUNT_PAID` bigint(20)
,`TR_AMOUNT_BALANCE` bigint(20)
,`TR_DATE` date
,`TR_COMMIT_STATUS` int(11)
,`CUSTOMER_ID` bigint(20)
,`CUSTOMER_FIRST_NAME` varchar(50)
,`CUSTOMER_PHONE_NUMBER` varchar(255)
,`DISTRICT_NAME` varchar(50)
,`AREA_NAME` varchar(50)
,`AREA_ID` int(11)
,`DISTRICT_ID` int(11)
,`PRODUCT_NAME` varchar(50)
,`TR_TIME` time
,`TR_DONE_ON` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `agents_to_area_view`
--
DROP TABLE IF EXISTS `agents_to_area_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `agents_to_area_view`  AS  select `areas`.`AREA_ID` AS `AREA_ID`,`areas`.`AREA_NAME` AS `AREA_NAME`,`areas`.`AREA_DISTRICT` AS `AREA_DISTRICT`,`agents_to_area`.`AG_TO_AREA_ID` AS `AG_TO_AREA_ID`,`agents_to_area`.`AREA_ID_AG` AS `AREA_ID_AG`,`agents_to_area`.`AREA_TO_DISTRICT` AS `AREA_TO_DISTRICT`,`agents_to_area`.`AREA_TO_AGENT` AS `AREA_TO_AGENT`,`districts`.`DISTRICT_ID` AS `DISTRICT_ID`,`districts`.`DISTRICT_NAME` AS `DISTRICT_NAME`,`agents`.`AGENT_ID` AS `AGENT_ID`,`agents`.`AGENT_NAME` AS `AGENT_NAME`,`agents`.`AGENT_ADDRESS` AS `AGENT_ADDRESS`,`agents`.`AGENT_ADHAR_NO` AS `AGENT_ADHAR_NO`,`agents`.`AGENT_PHONE_NUMBER` AS `AGENT_PHONE_NUMBER`,`agents`.`AGENT_FOR_CITY` AS `AGENT_FOR_CITY`,`agents`.`AGENT_STATUS` AS `AGENT_STATUS` from (((`areas` join `agents_to_area`) join `districts`) join `agents`) where `areas`.`AREA_ID` = `agents_to_area`.`AREA_ID_AG` and `areas`.`AREA_DISTRICT` = `agents_to_area`.`AREA_TO_DISTRICT` and `agents_to_area`.`AREA_TO_DISTRICT` = `districts`.`DISTRICT_ID` and `agents_to_area`.`AREA_TO_AGENT` = `agents`.`AGENT_ID` ;

-- --------------------------------------------------------

--
-- Structure for view `collectionListView`
--
DROP TABLE IF EXISTS `collectionListView`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `collectionListView`  AS  select `customermaster`.`CUSTOMER_ID` AS `CUSTOMER_ID`,`loanMaster`.`LOAN_ID` AS `LOAN_ID`,`customermaster`.`CUSTOMER_FIRST_NAME` AS `CUSTOMER_FIRST_NAME`,`customermaster`.`CUSTOMER_PHONE_NUMBER` AS `CUSTOMER_PHONE_NUMBER`,`districts`.`DISTRICT_NAME` AS `DISTRICT_NAME`,`products`.`PRODUCT_NAME` AS `PRODUCT_NAME`,`loanMaster`.`LN_PRODUCT_QUANTITY` AS `LN_PRODUCT_QUANTITY`,`loanMaster`.`LN_TAB_TOTAL_AMOUNT` AS `LN_TAB_TOTAL_AMOUNT`,`loanMaster`.`LN_TAB_BALANCE_AMOUNT` AS `LN_TAB_BALANCE_AMOUNT`,`loanMaster`.`LN_STATUS` AS `LN_STATUS`,`loanMaster`.`LN_ON_DATE` AS `LN_ON_DATE`,`collectionList`.`COLLECTION_BALANCE_AMOUNT` AS `COLLECTION_BALANCE_AMOUNT`,`areas`.`AREA_NAME` AS `AREA_NAME`,`areas`.`AREA_ID` AS `AREA_ID`,`districts`.`DISTRICT_ID` AS `DISTRICT_ID`,`collectionList`.`COLLECTION_ON_DATE` AS `COLLECTION_ON_DATE` from (((((`loanMaster` join `districts`) join `customermaster`) join `products`) join `collectionList`) join `areas`) where `districts`.`DISTRICT_ID` = `customermaster`.`CUSTOMER_DISTRICT` and `products`.`PRODUCT_ID` = `loanMaster`.`LN_TO_PRODUCT` and `loanMaster`.`LN_TAB_BALANCE_AMOUNT` > 0 and `loanMaster`.`LN_TO_CUSTOMER` = `customermaster`.`CUSTOMER_ID` and `collectionList`.`COLLECTION_LN_ID` = `loanMaster`.`LOAN_ID` and `areas`.`AREA_ID` = `customermaster`.`CUSTOMER_CITY` ;

-- --------------------------------------------------------

--
-- Structure for view `customerMasterView`
--
DROP TABLE IF EXISTS `customerMasterView`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `customerMasterView`  AS  select `customermaster`.`CUSTOMER_ID` AS `CUSTOMER_ID`,`customermaster`.`CUSTOMER_FIRST_NAME` AS `CUSTOMER_FIRST_NAME`,`customermaster`.`CUSTOMER_LAST_NAME` AS `CUSTOMER_LAST_NAME`,`customermaster`.`CUSTOMER_PHONE_NUMBER` AS `CUSTOMER_PHONE_NUMBER`,`districts`.`DISTRICT_NAME` AS `DISTRICT_NAME`,`areas`.`AREA_NAME` AS `AREA_NAME`,`areas`.`AREA_ID` AS `AREA_ID`,`districts`.`DISTRICT_ID` AS `DISTRICT_ID`,`customermaster`.`CUSTOMER_STATUS` AS `CUSTOMER_STATUS` from ((`customermaster` join `districts`) join `areas`) where `districts`.`DISTRICT_ID` = `customermaster`.`CUSTOMER_DISTRICT` and `areas`.`AREA_ID` = `customermaster`.`CUSTOMER_CITY` ;

-- --------------------------------------------------------

--
-- Structure for view `customerTransactionView`
--
DROP TABLE IF EXISTS `customerTransactionView`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `customerTransactionView`  AS  select `customermaster`.`CUSTOMER_FIRST_NAME` AS `CUSTOMER_FIRST_NAME`,`customermaster`.`CUSTOMER_LAST_NAME` AS `CUSTOMER_LAST_NAME`,`customermaster`.`CUSTOMER_ID` AS `CUSTOMER_ID`,`customermaster`.`CUSTOMER_PHONE_NUMBER` AS `CUSTOMER_PHONE_NUMBER`,`products`.`PRODUCT_NAME` AS `PRODUCT_NAME`,`products`.`PRODUCT_MODEL_NO` AS `PRODUCT_MODEL_NO`,`products`.`PRODUCT_PRICE` AS `PRODUCT_PRICE`,`loanMaster`.`LN_PRODUCT_QUANTITY` AS `LN_PRODUCT_QUANTITY`,`loanTransaction`.`TR_AMOUNT_PAID` AS `TR_AMOUNT_PAID`,`loanTransaction`.`TR_AMOUNT_BALANCE` AS `TR_AMOUNT_BALANCE`,`loanTransaction`.`TR_DATE` AS `TR_DATE`,`loanTransaction`.`TR_TIME` AS `TR_TIME`,`loanTransaction`.`TR_OF_CUSTOMER` AS `TR_OF_CUSTOMER`,`loanTransaction`.`TR_AMOUNT_PAID_INITIAL` AS `TR_AMOUNT_PAID_INITIAL`,`loanTransaction`.`TR_COMMIT_STATUS` AS `TR_COMMIT_STATUS` from (((`customermaster` join `products`) join `loanMaster`) join `loanTransaction`) where `loanTransaction`.`TR_LN_ID` = `loanMaster`.`LOAN_ID` and `loanTransaction`.`TR_OF_CUSTOMER` = `customermaster`.`CUSTOMER_ID` and `loanTransaction`.`TR_TO_PRODUCT` = `products`.`PRODUCT_ID` ;

-- --------------------------------------------------------

--
-- Structure for view `todayTransactionView`
--
DROP TABLE IF EXISTS `todayTransactionView`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `todayTransactionView`  AS  select `loanTransaction`.`TR_ID` AS `TR_ID`,`loanTransaction`.`TR_AMOUNT_PAID` AS `TR_AMOUNT_PAID`,`loanTransaction`.`TR_AMOUNT_BALANCE` AS `TR_AMOUNT_BALANCE`,`loanTransaction`.`TR_DATE` AS `TR_DATE`,`loanTransaction`.`TR_COMMIT_STATUS` AS `TR_COMMIT_STATUS`,`customermaster`.`CUSTOMER_ID` AS `CUSTOMER_ID`,`customermaster`.`CUSTOMER_FIRST_NAME` AS `CUSTOMER_FIRST_NAME`,`customermaster`.`CUSTOMER_PHONE_NUMBER` AS `CUSTOMER_PHONE_NUMBER`,`districts`.`DISTRICT_NAME` AS `DISTRICT_NAME`,`areas`.`AREA_NAME` AS `AREA_NAME`,`areas`.`AREA_ID` AS `AREA_ID`,`districts`.`DISTRICT_ID` AS `DISTRICT_ID`,`products`.`PRODUCT_NAME` AS `PRODUCT_NAME`,`loanTransaction`.`TR_TIME` AS `TR_TIME`,`loanTransaction`.`TR_DONE_ON` AS `TR_DONE_ON` from ((((`customermaster` join `loanTransaction`) join `areas`) join `districts`) join `products`) where `loanTransaction`.`TR_OF_CUSTOMER` = `customermaster`.`CUSTOMER_ID` and `districts`.`DISTRICT_ID` = `customermaster`.`CUSTOMER_DISTRICT` and `areas`.`AREA_ID` = `customermaster`.`CUSTOMER_CITY` and `products`.`PRODUCT_ID` = `loanTransaction`.`TR_TO_PRODUCT` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_log`
--
ALTER TABLE `access_log`
  ADD PRIMARY KEY (`ACCESS_LOG_ID`),
  ADD KEY `ACCESS_BY_AGENT` (`ACCESS_BY_AGENT`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`AGENT_ID`),
  ADD UNIQUE KEY `AGENT_PHONE_NUMBER` (`AGENT_PHONE_NUMBER`);

--
-- Indexes for table `agents_to_area`
--
ALTER TABLE `agents_to_area`
  ADD PRIMARY KEY (`AG_TO_AREA_ID`),
  ADD KEY `AREA_ID_AG` (`AREA_ID_AG`),
  ADD KEY `AREA_TO_DISTRICT` (`AREA_TO_DISTRICT`),
  ADD KEY `AREA_TO_AGENT` (`AREA_TO_AGENT`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`AREA_ID`),
  ADD KEY `AREA_DISTRICT` (`AREA_DISTRICT`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`BRAND_ID`);

--
-- Indexes for table `collectionList`
--
ALTER TABLE `collectionList`
  ADD PRIMARY KEY (`COLLECTION_ID`),
  ADD KEY `COLLECTION_TO_CUSTOMER` (`COLLECTION_TO_CUSTOMER`),
  ADD KEY `COLLECTION_TO_PRODUCT` (`COLLECTION_TO_PRODUCT`),
  ADD KEY `COLLECTION_LN_ID` (`COLLECTION_LN_ID`);

--
-- Indexes for table `customermaster`
--
ALTER TABLE `customermaster`
  ADD PRIMARY KEY (`CUSTOMER_ID`),
  ADD KEY `CUSTOMER_DISTRICT` (`CUSTOMER_DISTRICT`),
  ADD KEY `CUSTOMER_CITY` (`CUSTOMER_CITY`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`DISTRICT_ID`);

--
-- Indexes for table `loanMaster`
--
ALTER TABLE `loanMaster`
  ADD PRIMARY KEY (`LOAN_ID`),
  ADD KEY `LN_TO_CUSTOMER` (`LN_TO_CUSTOMER`),
  ADD KEY `LN_TO_PRODUCT` (`LN_TO_PRODUCT`);

--
-- Indexes for table `loanTransaction`
--
ALTER TABLE `loanTransaction`
  ADD PRIMARY KEY (`TR_ID`),
  ADD KEY `TR_OF_CUSTOMER` (`TR_OF_CUSTOMER`),
  ADD KEY `TR_TO_PRODUCT` (`TR_TO_PRODUCT`),
  ADD KEY `TR_LN_ID` (`TR_LN_ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`LOGINID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`PRODUCT_ID`),
  ADD KEY `PRODUCT_BRAND` (`PRODUCT_BRAND`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`SALE_ID`),
  ADD KEY `SALE_PRODUCT` (`SALE_PRODUCT`),
  ADD KEY `SALE_PRODUCT_TO_CUSTOMER` (`SALE_PRODUCT_TO_CUSTOMER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_log`
--
ALTER TABLE `access_log`
  MODIFY `ACCESS_LOG_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `AGENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `agents_to_area`
--
ALTER TABLE `agents_to_area`
  MODIFY `AG_TO_AREA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `AREA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `BRAND_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `collectionList`
--
ALTER TABLE `collectionList`
  MODIFY `COLLECTION_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customermaster`
--
ALTER TABLE `customermaster`
  MODIFY `CUSTOMER_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `DISTRICT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `loanMaster`
--
ALTER TABLE `loanMaster`
  MODIFY `LOAN_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `loanTransaction`
--
ALTER TABLE `loanTransaction`
  MODIFY `TR_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `LOGINID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `PRODUCT_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `SALE_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `access_log`
--
ALTER TABLE `access_log`
  ADD CONSTRAINT `access_log_ibfk_1` FOREIGN KEY (`ACCESS_BY_AGENT`) REFERENCES `agents` (`AGENT_ID`);

--
-- Constraints for table `agents_to_area`
--
ALTER TABLE `agents_to_area`
  ADD CONSTRAINT `agents_to_area_ibfk_1` FOREIGN KEY (`AREA_ID_AG`) REFERENCES `areas` (`AREA_ID`),
  ADD CONSTRAINT `agents_to_area_ibfk_2` FOREIGN KEY (`AREA_TO_DISTRICT`) REFERENCES `districts` (`DISTRICT_ID`),
  ADD CONSTRAINT `agents_to_area_ibfk_3` FOREIGN KEY (`AREA_TO_AGENT`) REFERENCES `agents` (`AGENT_ID`);

--
-- Constraints for table `areas`
--
ALTER TABLE `areas`
  ADD CONSTRAINT `areas_ibfk_1` FOREIGN KEY (`AREA_DISTRICT`) REFERENCES `districts` (`DISTRICT_ID`);

--
-- Constraints for table `customermaster`
--
ALTER TABLE `customermaster`
  ADD CONSTRAINT `customermaster_ibfk_1` FOREIGN KEY (`CUSTOMER_DISTRICT`) REFERENCES `districts` (`DISTRICT_ID`),
  ADD CONSTRAINT `customermaster_ibfk_2` FOREIGN KEY (`CUSTOMER_CITY`) REFERENCES `areas` (`AREA_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
