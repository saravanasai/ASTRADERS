-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 14, 2022 at 08:21 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testemi`
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
  `PASSWORD` varchar(255) DEFAULT NULL,
  `AGENT_FOR_CITY` varchar(30) DEFAULT NULL,
  `AGENT_STATUS` varchar(255) NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`AGENT_ID`, `AGENT_NAME`, `AGENT_ADDRESS`, `AGENT_ADHAR_NO`, `AGENT_PHONE_NUMBER`, `PASSWORD`, `AGENT_FOR_CITY`, `AGENT_STATUS`) VALUES
(1, 'FAIZUL', 'KANDBARA', '988568919219', '8329830704', '0e4e946668cf2afc4299b462b812caca', '20', 'ACTIVE'),
(2, 'à®…à®®à¯€à®©à¯à®ªà®¾à®¯à¯', 'nandurbar', '664507252052', '8156005006', '0e4e946668cf2afc4299b462b812caca', '20', 'ACTIVE'),
(3, 'vishal	', 'à®•à¯‡â€Œà®œà¯†â€Œà®µà®¿â€Œà®œà®¿', '473615481398', '8866477741', '0e4e946668cf2afc4299b462b812caca', '20', 'ACTIVE'),
(4, 'RAMA PAWAR', 'Agent Address', '123456789211', '8903557126', '0e4e946668cf2afc4299b462b812caca', '20', 'ACTIVE'),
(5, 'TEST AGENT', 'TEST AGENT ADDRESS', '175789456123', '9524752610', '81dc9bdb52d04dc20036dbd8313ed055', '1', 'ACTIVE');

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
(1, 1, 20, NULL),
(2, 2, 20, NULL),
(3, 3, 20, NULL),
(4, 4, 20, NULL),
(5, 5, 20, NULL),
(6, 6, 20, NULL),
(7, 7, 20, NULL),
(8, 8, 20, NULL),
(9, 9, 20, NULL),
(10, 10, 20, NULL),
(11, 11, 20, NULL),
(12, 12, 20, NULL),
(13, 13, 20, NULL),
(14, 14, 20, NULL),
(15, 15, 20, NULL),
(16, 16, 20, NULL),
(17, 17, 20, NULL),
(18, 18, 20, NULL),
(19, 19, 20, NULL),
(20, 20, 20, NULL),
(21, 21, 20, NULL),
(22, 22, 20, NULL),
(23, 23, 20, NULL),
(24, 24, 20, NULL),
(25, 25, 20, NULL),
(26, 26, 20, NULL),
(27, 27, 20, NULL),
(28, 28, 20, NULL),
(29, 29, 20, NULL),
(30, 30, 20, NULL),
(31, 31, 20, NULL),
(32, 32, 20, NULL),
(33, 33, 1, 5),
(34, 34, 20, NULL),
(35, 35, 20, NULL),
(36, 36, 20, NULL),
(37, 37, 20, NULL),
(38, 38, 20, NULL),
(39, 39, 20, NULL),
(40, 40, 20, NULL),
(41, 41, 20, NULL),
(42, 42, 20, NULL),
(43, 43, 20, NULL),
(44, 44, 20, NULL),
(45, 45, 20, NULL),
(46, 46, 20, NULL),
(47, 47, 20, NULL),
(48, 48, 20, NULL),
(49, 49, 20, NULL),
(50, 50, 20, NULL),
(51, 51, 20, NULL),
(52, 52, 20, NULL),
(53, 53, 20, NULL),
(54, 54, 20, NULL),
(55, 55, 20, NULL),
(56, 56, 20, NULL),
(57, 57, 20, NULL),
(58, 58, 20, NULL),
(59, 59, 20, NULL),
(60, 60, 20, NULL),
(61, 61, 20, NULL),
(62, 62, 20, NULL),
(63, 63, 20, NULL),
(64, 64, 20, NULL),
(65, 65, 20, NULL),
(66, 66, 20, NULL),
(67, 67, 20, NULL),
(68, 68, 20, NULL),
(69, 69, 20, NULL),
(70, 70, 20, NULL),
(71, 71, 20, NULL),
(72, 72, 20, NULL),
(73, 73, 20, NULL),
(74, 74, 20, NULL),
(75, 75, 20, NULL),
(76, 76, 20, NULL);

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
(1, 'AAYANA(A LINE)', 20),
(2, 'AARADE(A LINE)', 20),
(3, 'TALWADE(A LINE)', 20),
(4, 'ASHTA(B LINE)', 20),
(5, 'CHAKLEPADA (B LINE)', 20),
(6, 'MOGARANI(KBR)', 20),
(7, 'HARNI PADA(KBR)', 20),
(8, 'KADKI PADA(KBR)', 20),
(9, 'PIMPLA(KBR)', 20),
(10, 'KANDBARA (KBR)', 20),
(11, 'BHANGARPADA(KBR)', 20),
(12, 'SONARE(KBR)', 20),
(13, 'BILLBARA(KBR)', 20),
(14, 'CHIKHALI(KBR)', 20),
(15, 'NIMBHEL (C LINE)', 20),
(16, 'ANJANE(KBR)', 20),
(17, 'KARUD(KBR)', 20),
(18, 'GHOGALPADA(KBR)', 20),
(19, 'GHOGALPADA MOUCHI PALLI(KBR)', 20),
(20, 'KARLE (C LINE)', 20),
(21, 'SRAVANI(KBR)', 20),
(22, 'HINGINI(B LINE)', 20),
(23, 'KHOLGHAR(B LINE)', 20),
(24, 'HUNMANPADA(B LINE)', 20),
(25, 'SINDGAVAN(A LINE)', 20),
(26, 'KAKARDE(A LINE)', 20),
(27, 'DHAVALIPADA(KBR)', 20),
(28, 'Nimdhoida(KBR)', 20),
(29, 'MUBARAKPUR(B LINE)', 20),
(30, 'KOTHLI(B LINE)', 20),
(31, 'PATHARAI(B LINE)', 20),
(32, 'VARDA(KBR)', 20),
(33, 'NC BILL', 1),
(34, 'ASANE (C LINE)', 20),
(35, 'GHOTANE (C LINE)', 20),
(36, 'MAHALKADU(KBR)', 20),
(37, 'WANZALE(B LINE)', 20),
(38, 'GOOGEL GAAV(B LINE)', 20),
(39, 'KARDHA (KBN)', 20),
(40, 'RANALA(B LINE)', 20),
(41, 'CHOUPALE(B LINE)', 20),
(42, 'BARDIPADA(KBR)', 20),
(43, 'VARJAHAN(KBR)', 20),
(44, 'RANALA', 20),
(45, 'KADAMBAA(KBR)', 20),
(46, 'KARDA(A LINE)', 20),
(47, 'NANDHAR KHEDA(B LINE)', 20),
(48, 'KARAN CHOCK  (B LINE)', 20),
(49, 'MEHANDI PADA(KBR)', 1),
(50, 'KUKRADE(A LINE)', 20),
(51, 'VADBARA  (C LINE)', 20),
(52, 'KANDRE  (C LINE)', 20),
(53, 'VAITANA(A LINE)', 20),
(54, 'KOTTA(KBR)', 20),
(55, 'KAKAR PADA (KBR)', 20),
(56, 'BHADVAD(C LINE)', 20),
(57, 'AMSARPADA(B LINE)', 20),
(58, 'BORALE (A LINE)', 20),
(59, 'MEHANDI PADA(KBR)', 20),
(60, 'THAVADA(C LINE)', 20),
(61, 'JUN MOHIDE(A LINE)', 20),
(62, 'LOCAL CUSTOMBER(B LINE)', 20),
(63, 'NAILEI ( C LINE )', 20),
(64, 'BAIDHANA (C LINE )', 20),
(65, 'BORATH ( B LINE )', 20),
(66, 'KHEDALE( B LINE)', 20),
(67, 'THARAVATH', 20),
(68, 'BHAIDANA ( A  LINE )', 20),
(69, 'KHEVADIPADA (B LINE)', 20),
(70, 'SATURKHE ( C LINE )', 20),
(71, 'MODE(B LINE)', 20),
(72, 'AATHMOIDA(A LINE)', 20),
(73, 'BHELDAA ( KBN )', 20),
(74, 'KADUVAAN (KBR)', 20),
(75, 'KARACHKOPE(B LINE)', 20),
(76, 'SAHI', 20);

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
(1, 'EVER COOL '),
(2, 'MAX'),
(3, 'AMDO'),
(4, 'ARISTO'),
(5, 'MADHINI'),
(7, 'DURO TUFF'),
(8, 'POLYTECK'),
(9, 'SAI'),
(10, 'HARI OM METALS'),
(11, 'ASIF PLASTIC'),
(12, 'SAFAR '),
(13, 'HITESH STEEL'),
(14, 'FARVAZ COTTON'),
(15, 'PINTU'),
(16, 'IZAZ KOOTI'),
(17, 'PLASTIC'),
(18, 'POLYSKY'),
(19, 'PINTU'),
(21, 'CEMAX'),
(22, 'ARISTO NATIONAL'),
(23, 'CHETHAK'),
(25, 'PLATE JAMBO'),
(26, 'PINTU KAAPAT'),
(27, 'TEST BRAND'),
(28, 'APOLLO');

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
  `COLLECTED_ON_DATE` date DEFAULT NULL,
  `COLLECTION_STATUS` int(11) DEFAULT 1,
  `PAID_ON` varchar(50) NOT NULL DEFAULT 'ON STORE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `collectionList`
--

INSERT INTO `collectionList` (`COLLECTION_ID`, `COLLECTION_LN_ID`, `COLLECTION_TO_CUSTOMER`, `COLLECTION_TO_PRODUCT`, `COLLECTION_TOTAL_AMOUNT`, `COLLECTION_LAST_AMOUNT_PAID`, `COLLECTION_BALANCE_AMOUNT`, `COLLECTION_ON_DATE`, `COLLECTED_ON_DATE`, `COLLECTION_STATUS`, `PAID_ON`) VALUES
(1, 1, 1, 1, '3050', 50, '2800', '2022-12-14', '2022-07-14', 1, 'ON STORE');

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
,`CUSTOMER_ADDRESS` varchar(50)
,`CUSTOMER_IMAGE` varchar(265)
,`LOAN_ID` bigint(20)
,`CUSTOMER_FIRST_NAME` varchar(50)
,`CUSTOMER_PHONE_NUMBER` varchar(255)
,`CUSTOMER_REMARK` varchar(255)
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
  `CUSTOMER_REMARK` varchar(255) DEFAULT 'NO REMARKS',
  `CUSTOMER_STATUS` int(11) NOT NULL DEFAULT 1,
  `CUSTOMER_IMAGE` varchar(265) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customermaster`
--

INSERT INTO `customermaster` (`CUSTOMER_ID`, `CUSTOMER_FIRST_NAME`, `CUSTOMER_LAST_NAME`, `CUSTOMER_PHONE_NUMBER`, `CUSTOMER_EMAIL`, `CUSTOMER_ADHAR_NO`, `CUSTOMER_DISTRICT`, `CUSTOMER_CITY`, `CUSTOMER_ADDRESS`, `CUSTOMER_REMARK`, `CUSTOMER_STATUS`, `CUSTOMER_IMAGE`) VALUES
(1, 'Chase', 'Potter', '+1 (881) 839-4482', 'xito@mailinator.com', '788', 1, 33, 'Soluta sit mollitia', 'NO REMARKS', 1, '218650fan_meme_povilas_korop.jpg');

-- --------------------------------------------------------

--
-- Stand-in structure for view `customerMasterView`
-- (See below for the actual view)
--
CREATE TABLE `customerMasterView` (
`CUSTOMER_ID` bigint(20)
,`CUSTOMER_FIRST_NAME` varchar(50)
,`CUSTOMER_IMAGE` varchar(265)
,`CUSTOMER_LAST_NAME` varchar(50)
,`CUSTOMER_PHONE_NUMBER` varchar(255)
,`CUSTOMER_EMAIL` varchar(50)
,`CUSTOMER_ADHAR_NO` varchar(50)
,`CUSTOMER_DISTRICT` int(11)
,`CUSTOMER_CITY` int(11)
,`CUSTOMER_ADDRESS` varchar(50)
,`CUSTOMER_REMARK` varchar(255)
,`CUSTOMER_STATUS` int(11)
,`DISTRICT_NAME` varchar(50)
,`AREA_NAME` varchar(50)
,`AREA_ID` int(11)
,`DISTRICT_ID` int(11)
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
,`LOAN_ID` bigint(20)
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
-- Stand-in structure for view `customerZeroBalanceListView`
-- (See below for the actual view)
--
CREATE TABLE `customerZeroBalanceListView` (
`CUSTOMER_ID` bigint(20)
,`CUSTOMER_FIRST_NAME` varchar(50)
,`CUSTOMER_LAST_NAME` varchar(50)
,`CUSTOMER_PHONE_NUMBER` varchar(255)
,`DISTRICT_NAME` varchar(50)
,`AREA_NAME` varchar(50)
,`AREA_ID` int(11)
,`DISTRICT_ID` int(11)
,`CUSTOMER_STATUS` int(11)
,`COLLECTION_BALANCE_AMOUNT` varchar(50)
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
(35, 'Yavatmal'),
(36, 'Ahmedabad'),
(37, 'Amreli'),
(38, 'Anand'),
(39, 'Aravalli'),
(40, 'Banaskantha'),
(41, 'Bharuch'),
(42, 'Bhavnagar'),
(43, 'Botad'),
(44, 'Chhota Udaipur'),
(45, 'Dahod'),
(46, 'Dang'),
(47, 'Devbhoomi Dwarka'),
(48, 'Gandhinagar'),
(49, 'Gir Somnath'),
(50, 'Jamnagar'),
(51, 'Junagadh'),
(52, 'Kheda'),
(53, 'Kutch'),
(54, 'Mahisagar'),
(55, 'Mehsana'),
(56, 'Morbi'),
(57, 'Narmada'),
(58, 'Navsari'),
(59, 'Panchmahal'),
(60, 'Patan'),
(61, 'Porbandar'),
(62, 'Rajkot'),
(63, 'Sabarkantha'),
(64, 'Surat'),
(65, 'Surendranagar'),
(66, 'Tapi'),
(67, 'Vadodara'),
(68, 'Valsad');

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
  `LN_TAB_DISCOUNT` bigint(20) DEFAULT NULL,
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

INSERT INTO `loanMaster` (`LOAN_ID`, `LN_TO_CUSTOMER`, `LN_TO_PRODUCT`, `LN_PRODUCT_QUANTITY`, `LN_TAB_TOTAL_AMOUNT`, `LN_TAB_DISCOUNT`, `LN_TAB_INITIAL_AMOUNT`, `LN_TAB_BALANCE_AMOUNT`, `LN_STATUS`, `LN_ON_DATE`, `LN_ON_TIME`, `LN_ON`) VALUES
(1, 1, 1, 1, '3050', 0, '50', '2800', 1, '2022-07-13', '2022-07-13 05:02:29', 'ON STORE');

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
  `TR_AMOUNT_PAID_INITIAL` bigint(20) DEFAULT NULL,
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
(1, 1, 1, 1, 3050, 50, 3000, '2022-07-13', '10:32:29', 0, 'ON STORE'),
(13, 1, 1, NULL, NULL, 100, 2600, '2022-07-14', '11:07:04', 1, 'ON STORE'),
(14, 1, 1, NULL, NULL, 50, 2550, '2022-07-14', '11:20:25', 1, 'ON STORE'),
(15, 1, 1, NULL, NULL, 50, 2500, '2022-07-14', '11:20:56', 1, 'ON STORE');

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
(1, 'REHAAN', '22752b4efa8e52d53b4742a9fc74902c', 'ADMIN'),
(2, 'ADMIN', '0e4e946668cf2afc4299b462b812caca', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orderItemMaster`
--

CREATE TABLE `orderItemMaster` (
  `OR_IT_ID` bigint(20) NOT NULL,
  `OR_TO_LN_ID` bigint(20) DEFAULT NULL COMMENT 'THIS ORDER ITEM IS BELONGS TO',
  `OR_OF_CUS` bigint(20) DEFAULT NULL,
  `OR_OF_PR_ID` bigint(20) DEFAULT NULL,
  `OR_OF_PR_QUANTITY` bigint(20) DEFAULT NULL,
  `OR_BILL_STATUS` int(11) DEFAULT 1 COMMENT 'THIS SHOWS THE ORDER ITEMS OF CURRENT BILL'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderItemMaster`
--

INSERT INTO `orderItemMaster` (`OR_IT_ID`, `OR_TO_LN_ID`, `OR_OF_CUS`, `OR_OF_PR_ID`, `OR_OF_PR_QUANTITY`, `OR_BILL_STATUS`) VALUES
(1, 1, 1, 1, 1, 0),
(2, 1, 1, 5, 1, 0);

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
(1, 'FAN', 1, 'SPEEDO', 1700, 1, 1, NULL),
(2, 'FAN SMALL  ', 2, '24inc', 1400, 0, 1, NULL),
(3, 'BULLET', 3, 'BULLET FAN', 2700, 0, 1, NULL),
(4, 'MIXER', 4, 'LOTES', 3000, 0, 1, NULL),
(5, 'KHAAT', 5, 'KHAAT', 1350, 6, 1, NULL),
(6, 'CHAIR', 7, 'JUMBO', 600, 0, 1, NULL),
(7, 'CHAIR HARAM', 8, 'FANCY', 900, 16, 1, NULL),
(8, 'TV TABLE', 10, 'WOOD', 1700, 2, 1, NULL),
(9, 'COMPUTER TABLE', 10, 'WOODEN', 4500, 0, 1, NULL),
(10, 'OFFICE  TABLE', 10, 'IRON', 4800, 0, 1, NULL),
(11, 'DRUM', 11, 'COBRA', 1350, 12, 1, NULL),
(12, 'MAACHI', 10, 'IRON', 1300, 0, 1, NULL),
(13, 'PLYWOOD PALANG', 12, 'PLB', 5000, 0, 1, NULL),
(14, 'BHAAKADA', 12, 'PLY WOOD', 2500, 0, 1, NULL),
(15, 'Aluminium 6', 13, 'NAKODA', 2800, 0, 1, NULL),
(16, 'STEEL BOX', 13, 'SONI', 2800, 0, 1, NULL),
(17, 'RECK', 12, 'IRON', 3300, 4, 1, NULL),
(18, 'GHADI S', 14, 'SMALL GHADI', 800, 0, 1, NULL),
(19, 'GHADI BIG', 14, 'BIGG', 1700, 16, 1, NULL),
(20, 'PLATES', 13, '24inc', 950, 0, 1, NULL),
(21, 'IRON BOX', 15, '1000', 1000, 17, 1, NULL),
(22, 'WATER CAN', 10, 'PLASTIC', 1200, 0, 1, NULL),
(23, 'ALUMINIUM THAPALI', 13, 'LOW', 950, 0, 1, NULL),
(24, 'PLD & GHADHI', 12, 'PLY WOOD & GHADI', 6100, 0, 1, NULL),
(25, 'KOTI', 16, 'IRON', 1300, 1, 1, NULL),
(26, 'SMALL GHADI', 14, 'COTTON', 850, 10, 1, NULL),
(27, 'KOTI  BIG', 16, 'IRON', 1800, 0, 1, NULL),
(28, 'WATER CAN', 17, 'COOL', 1000, 0, 1, NULL),
(29, 'BALTHI ', 10, 'ALM', 700, 1, 1, NULL),
(30, 'Aluminium 4', 13, 'soni', 2800, 0, 1, NULL),
(31, 'Aluminium 10', 13, 'ALUMINIUM', 5500, 0, 1, NULL),
(32, 'STEEL PAWALI', 13, '26', 2500, 8, 1, NULL),
(33, 'COOKER 5', 13, '5 LITER', 950, 0, 1, NULL),
(34, 'CUP', 13, '6 PIC', 500, 0, 1, NULL),
(35, 'BABY', 18, 'HARAM', 300, 0, 1, NULL),
(36, 'KAPAT', 15, '20@40', 12000, 0, 1, NULL),
(37, 'IDLY COOKER', 13, '9 SET', 2500, 2, 1, NULL),
(38, 'VATTI', 13, '6SET', 450, 0, 1, NULL),
(39, 'GLASS', 13, '6 PIC', 600, 47, 1, NULL),
(40, 'CEMAX', 15, 'TV 32 INC', 17500, 0, 1, NULL),
(41, 'STABOLIZER', 15, 'APRANA', 1500, 0, 1, NULL),
(42, 'STABOLIZER', 15, 'APRANA', 1500, 0, 1, NULL),
(43, 'THAPALI', 13, '26N', 1000, 0, 1, NULL),
(44, 'NASIK KOMAL', 13, 'STEEL AANDA', 600, 7, 1, NULL),
(45, 'AUM  GUNDA', 13, 'soni', 600, 0, 1, NULL),
(46, 'BASKET STEEL ', 13, 'WASING ITEM', 700, 24, 1, NULL),
(47, 'LOOTA STEEL', 13, '6PCS', 600, 33, 1, NULL),
(48, 'L  R BOX', 10, '18', 2800, 0, 1, NULL),
(49, 'MASAL  BOX', 13, '6 PIC', 600, 0, 1, NULL),
(50, 'OFFICE CHAIR', 10, 'SINGLE  HAND', 475, 0, 1, NULL),
(51, 'MIXER', 22, '4 JARS', 3000, 4, 1, NULL),
(52, 'BULLET  FORTUNER', 15, 'BULLET FAN', 3000, 2, 1, NULL),
(53, 'STEEL PAVAALI', 23, '24', 2500, 0, 1, NULL),
(54, 'MAACH BIG', 12, 'IRON', 1700, 2, 1, NULL),
(55, 'STEEL BARNI', 13, '5 LTR', 600, 0, 1, NULL),
(57, 'STEEL BARNI', 13, '1', 150, 0, 1, NULL),
(58, 'DINING TABLE', 10, 'PLASTIC', 1600, 2, 1, NULL),
(59, 'DHOOT KAPAT ', 10, 'HOME IRON', 1800, 0, 1, NULL),
(60, 'STEEL  PARATH ', 13, 'STEEL', 700, 0, 1, NULL),
(62, 'STEEL BARNI', 13, '3 LTR', 450, 0, 1, NULL),
(64, 'ALM THAARI', 13, 'M', 600, 0, 1, NULL),
(65, 'THAMBA PLATE', 13, 'THAMBA', 700, 0, 1, NULL),
(66, 'PLATE JAMBO', 13, 'STEEL', 1300, 7, 1, NULL),
(67, 'RECK STEEL', 13, '4 FIT', 2700, 0, 1, NULL),
(68, 'CHAPPAL STAND', 13, '3', 1100, 0, 1, NULL),
(69, 'KAAPAT BIG', 26, '20/40', 13000, 0, 1, NULL),
(70, 'THAPALI  ', 13, 'SET 10', 2500, 0, 1, NULL),
(71, 'COOLER 1', 15, 'DITO', 9000, 0, 1, NULL),
(72, 'PURI MAKER', 13, '7', 1500, 0, 1, NULL),
(73, 'BALTY STEEL', 13, '6', 700, 8, 1, NULL),
(74, 'TEST PRODUCT', 27, 'TEST MODEL', 5000, 47, 1, NULL),
(75, 'HEN BOX', 9, '1800', 2600, 0, 1, NULL),
(76, 'TABLE OFFICE', 9, 'PLAY', 5500, 0, 1, NULL),
(77, 'TYRE', 28, '40/50/10. APA', 2900, 0, 1, NULL),
(78, 'DRUM', 17, '220', 1500, 0, 1, NULL),
(79, 'KAPAT', 26, '15', 7000, 0, 1, NULL);

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
(1, 1, 1, 1, 3050, 50, 3000, '2022-07-13', '2022-07-13 05:02:29');

-- --------------------------------------------------------

--
-- Stand-in structure for view `salesReportView`
-- (See below for the actual view)
--
CREATE TABLE `salesReportView` (
`SALE_ID` bigint(20)
,`SALE_TOTAL_AMOUNT` bigint(20)
,`SALE_PRODUCT_INITIAL_PAYMENT` bigint(20)
,`SALE_ON_DATE` date
,`CUSTOMER_FIRST_NAME` varchar(50)
,`CUSTOMER_LAST_NAME` varchar(50)
,`CUSTOMER_ID` bigint(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `todayTransactionView`
-- (See below for the actual view)
--
CREATE TABLE `todayTransactionView` (
`TR_ID` bigint(20)
,`TR_LN_ID` bigint(20)
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
,`TR_TIME` time
,`TR_DONE_ON` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `todayTransactionViewWithAgents`
-- (See below for the actual view)
--
CREATE TABLE `todayTransactionViewWithAgents` (
`TR_ID` bigint(20)
,`TR_LN_ID` bigint(20)
,`TR_AMOUNT_PAID` bigint(20)
,`TR_AMOUNT_BALANCE` bigint(20)
,`TR_COMMIT_STATUS` int(11)
,`TR_DATE` date
,`TR_DONE_ON` varchar(50)
,`CUSTOMER_FIRST_NAME` varchar(50)
,`CUSTOMER_LAST_NAME` varchar(50)
,`CUSTOMER_PHONE_NUMBER` varchar(255)
,`CUSTOMER_ID` bigint(20)
,`AGENT_NAME` varchar(50)
,`AGENT_PHONE_NUMBER` varchar(20)
,`DISTRICT_NAME` varchar(50)
,`AREA_NAME` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `agents_to_area_view`
--
DROP TABLE IF EXISTS `agents_to_area_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `agents_to_area_view`  AS SELECT `areas`.`AREA_ID` AS `AREA_ID`, `areas`.`AREA_NAME` AS `AREA_NAME`, `areas`.`AREA_DISTRICT` AS `AREA_DISTRICT`, `agents_to_area`.`AG_TO_AREA_ID` AS `AG_TO_AREA_ID`, `agents_to_area`.`AREA_ID_AG` AS `AREA_ID_AG`, `agents_to_area`.`AREA_TO_DISTRICT` AS `AREA_TO_DISTRICT`, `agents_to_area`.`AREA_TO_AGENT` AS `AREA_TO_AGENT`, `districts`.`DISTRICT_ID` AS `DISTRICT_ID`, `districts`.`DISTRICT_NAME` AS `DISTRICT_NAME`, `agents`.`AGENT_ID` AS `AGENT_ID`, `agents`.`AGENT_NAME` AS `AGENT_NAME`, `agents`.`AGENT_ADDRESS` AS `AGENT_ADDRESS`, `agents`.`AGENT_ADHAR_NO` AS `AGENT_ADHAR_NO`, `agents`.`AGENT_PHONE_NUMBER` AS `AGENT_PHONE_NUMBER`, `agents`.`AGENT_FOR_CITY` AS `AGENT_FOR_CITY`, `agents`.`AGENT_STATUS` AS `AGENT_STATUS` FROM (((`areas` join `agents_to_area`) join `districts`) join `agents`) WHERE `areas`.`AREA_ID` = `agents_to_area`.`AREA_ID_AG` AND `areas`.`AREA_DISTRICT` = `agents_to_area`.`AREA_TO_DISTRICT` AND `agents_to_area`.`AREA_TO_DISTRICT` = `districts`.`DISTRICT_ID` AND `agents_to_area`.`AREA_TO_AGENT` = `agents`.`AGENT_ID` ;

-- --------------------------------------------------------

--
-- Structure for view `collectionListView`
--
DROP TABLE IF EXISTS `collectionListView`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `collectionListView`  AS SELECT `customermaster`.`CUSTOMER_ID` AS `CUSTOMER_ID`, `customermaster`.`CUSTOMER_ADDRESS` AS `CUSTOMER_ADDRESS`, `customermaster`.`CUSTOMER_IMAGE` AS `CUSTOMER_IMAGE`, `loanMaster`.`LOAN_ID` AS `LOAN_ID`, `customermaster`.`CUSTOMER_FIRST_NAME` AS `CUSTOMER_FIRST_NAME`, `customermaster`.`CUSTOMER_PHONE_NUMBER` AS `CUSTOMER_PHONE_NUMBER`, `customermaster`.`CUSTOMER_REMARK` AS `CUSTOMER_REMARK`, `districts`.`DISTRICT_NAME` AS `DISTRICT_NAME`, `products`.`PRODUCT_NAME` AS `PRODUCT_NAME`, `loanMaster`.`LN_PRODUCT_QUANTITY` AS `LN_PRODUCT_QUANTITY`, `loanMaster`.`LN_TAB_TOTAL_AMOUNT` AS `LN_TAB_TOTAL_AMOUNT`, `loanMaster`.`LN_TAB_BALANCE_AMOUNT` AS `LN_TAB_BALANCE_AMOUNT`, `loanMaster`.`LN_STATUS` AS `LN_STATUS`, `loanMaster`.`LN_ON_DATE` AS `LN_ON_DATE`, `collectionList`.`COLLECTION_BALANCE_AMOUNT` AS `COLLECTION_BALANCE_AMOUNT`, `areas`.`AREA_NAME` AS `AREA_NAME`, `areas`.`AREA_ID` AS `AREA_ID`, `districts`.`DISTRICT_ID` AS `DISTRICT_ID`, `collectionList`.`COLLECTION_ON_DATE` AS `COLLECTION_ON_DATE` FROM (((((`loanMaster` join `districts`) join `customermaster`) join `products`) join `collectionList`) join `areas`) WHERE `districts`.`DISTRICT_ID` = `customermaster`.`CUSTOMER_DISTRICT` AND `products`.`PRODUCT_ID` = `loanMaster`.`LN_TO_PRODUCT` AND `loanMaster`.`LN_TAB_BALANCE_AMOUNT` > 0 AND `loanMaster`.`LN_TO_CUSTOMER` = `customermaster`.`CUSTOMER_ID` AND `collectionList`.`COLLECTION_LN_ID` = `loanMaster`.`LOAN_ID` AND `areas`.`AREA_ID` = `customermaster`.`CUSTOMER_CITY` ;

-- --------------------------------------------------------

--
-- Structure for view `customerMasterView`
--
DROP TABLE IF EXISTS `customerMasterView`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `customerMasterView`  AS SELECT `customermaster`.`CUSTOMER_ID` AS `CUSTOMER_ID`, `customermaster`.`CUSTOMER_FIRST_NAME` AS `CUSTOMER_FIRST_NAME`, `customermaster`.`CUSTOMER_IMAGE` AS `CUSTOMER_IMAGE`, `customermaster`.`CUSTOMER_LAST_NAME` AS `CUSTOMER_LAST_NAME`, `customermaster`.`CUSTOMER_PHONE_NUMBER` AS `CUSTOMER_PHONE_NUMBER`, `customermaster`.`CUSTOMER_EMAIL` AS `CUSTOMER_EMAIL`, `customermaster`.`CUSTOMER_ADHAR_NO` AS `CUSTOMER_ADHAR_NO`, `customermaster`.`CUSTOMER_DISTRICT` AS `CUSTOMER_DISTRICT`, `customermaster`.`CUSTOMER_CITY` AS `CUSTOMER_CITY`, `customermaster`.`CUSTOMER_ADDRESS` AS `CUSTOMER_ADDRESS`, `customermaster`.`CUSTOMER_REMARK` AS `CUSTOMER_REMARK`, `customermaster`.`CUSTOMER_STATUS` AS `CUSTOMER_STATUS`, `districts`.`DISTRICT_NAME` AS `DISTRICT_NAME`, `areas`.`AREA_NAME` AS `AREA_NAME`, `areas`.`AREA_ID` AS `AREA_ID`, `districts`.`DISTRICT_ID` AS `DISTRICT_ID` FROM ((`customermaster` join `districts`) join `areas`) WHERE `districts`.`DISTRICT_ID` = `customermaster`.`CUSTOMER_DISTRICT` AND `areas`.`AREA_ID` = `customermaster`.`CUSTOMER_CITY` ;

-- --------------------------------------------------------

--
-- Structure for view `customerTransactionView`
--
DROP TABLE IF EXISTS `customerTransactionView`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `customerTransactionView`  AS SELECT `customermaster`.`CUSTOMER_FIRST_NAME` AS `CUSTOMER_FIRST_NAME`, `customermaster`.`CUSTOMER_LAST_NAME` AS `CUSTOMER_LAST_NAME`, `customermaster`.`CUSTOMER_ID` AS `CUSTOMER_ID`, `customermaster`.`CUSTOMER_PHONE_NUMBER` AS `CUSTOMER_PHONE_NUMBER`, `products`.`PRODUCT_NAME` AS `PRODUCT_NAME`, `products`.`PRODUCT_MODEL_NO` AS `PRODUCT_MODEL_NO`, `products`.`PRODUCT_PRICE` AS `PRODUCT_PRICE`, `loanMaster`.`LN_PRODUCT_QUANTITY` AS `LN_PRODUCT_QUANTITY`, `loanMaster`.`LOAN_ID` AS `LOAN_ID`, `loanTransaction`.`TR_AMOUNT_PAID` AS `TR_AMOUNT_PAID`, `loanTransaction`.`TR_AMOUNT_BALANCE` AS `TR_AMOUNT_BALANCE`, `loanTransaction`.`TR_DATE` AS `TR_DATE`, `loanTransaction`.`TR_TIME` AS `TR_TIME`, `loanTransaction`.`TR_OF_CUSTOMER` AS `TR_OF_CUSTOMER`, `loanTransaction`.`TR_AMOUNT_PAID_INITIAL` AS `TR_AMOUNT_PAID_INITIAL`, `loanTransaction`.`TR_COMMIT_STATUS` AS `TR_COMMIT_STATUS` FROM (((`customermaster` join `products`) join `loanMaster`) join `loanTransaction`) WHERE `loanTransaction`.`TR_LN_ID` = `loanMaster`.`LOAN_ID` AND `loanTransaction`.`TR_OF_CUSTOMER` = `customermaster`.`CUSTOMER_ID` AND `loanTransaction`.`TR_TO_PRODUCT` = `products`.`PRODUCT_ID` ;

-- --------------------------------------------------------

--
-- Structure for view `customerZeroBalanceListView`
--
DROP TABLE IF EXISTS `customerZeroBalanceListView`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `customerZeroBalanceListView`  AS SELECT `customermaster`.`CUSTOMER_ID` AS `CUSTOMER_ID`, `customermaster`.`CUSTOMER_FIRST_NAME` AS `CUSTOMER_FIRST_NAME`, `customermaster`.`CUSTOMER_LAST_NAME` AS `CUSTOMER_LAST_NAME`, `customermaster`.`CUSTOMER_PHONE_NUMBER` AS `CUSTOMER_PHONE_NUMBER`, `districts`.`DISTRICT_NAME` AS `DISTRICT_NAME`, `areas`.`AREA_NAME` AS `AREA_NAME`, `areas`.`AREA_ID` AS `AREA_ID`, `districts`.`DISTRICT_ID` AS `DISTRICT_ID`, `customermaster`.`CUSTOMER_STATUS` AS `CUSTOMER_STATUS`, `collectionList`.`COLLECTION_BALANCE_AMOUNT` AS `COLLECTION_BALANCE_AMOUNT` FROM (((`customermaster` join `districts`) join `areas`) join `collectionList`) WHERE `districts`.`DISTRICT_ID` = `customermaster`.`CUSTOMER_DISTRICT` AND `areas`.`AREA_ID` = `customermaster`.`CUSTOMER_CITY` AND `customermaster`.`CUSTOMER_ID` = `collectionList`.`COLLECTION_TO_CUSTOMER` AND `collectionList`.`COLLECTION_BALANCE_AMOUNT` = 0 ;

-- --------------------------------------------------------

--
-- Structure for view `salesReportView`
--
DROP TABLE IF EXISTS `salesReportView`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `salesReportView`  AS SELECT `sales`.`SALE_ID` AS `SALE_ID`, `sales`.`SALE_TOTAL_AMOUNT` AS `SALE_TOTAL_AMOUNT`, `sales`.`SALE_PRODUCT_INITIAL_PAYMENT` AS `SALE_PRODUCT_INITIAL_PAYMENT`, `sales`.`SALE_ON_DATE` AS `SALE_ON_DATE`, `customermaster`.`CUSTOMER_FIRST_NAME` AS `CUSTOMER_FIRST_NAME`, `customermaster`.`CUSTOMER_LAST_NAME` AS `CUSTOMER_LAST_NAME`, `customermaster`.`CUSTOMER_ID` AS `CUSTOMER_ID` FROM (`sales` join `customermaster`) WHERE `sales`.`SALE_PRODUCT_TO_CUSTOMER` = `customermaster`.`CUSTOMER_ID` ;

-- --------------------------------------------------------

--
-- Structure for view `todayTransactionView`
--
DROP TABLE IF EXISTS `todayTransactionView`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `todayTransactionView`  AS SELECT `loanTransaction`.`TR_ID` AS `TR_ID`, `loanTransaction`.`TR_LN_ID` AS `TR_LN_ID`, `loanTransaction`.`TR_AMOUNT_PAID` AS `TR_AMOUNT_PAID`, `loanTransaction`.`TR_AMOUNT_BALANCE` AS `TR_AMOUNT_BALANCE`, `loanTransaction`.`TR_DATE` AS `TR_DATE`, `loanTransaction`.`TR_COMMIT_STATUS` AS `TR_COMMIT_STATUS`, `customermaster`.`CUSTOMER_ID` AS `CUSTOMER_ID`, `customermaster`.`CUSTOMER_FIRST_NAME` AS `CUSTOMER_FIRST_NAME`, `customermaster`.`CUSTOMER_PHONE_NUMBER` AS `CUSTOMER_PHONE_NUMBER`, `districts`.`DISTRICT_NAME` AS `DISTRICT_NAME`, `areas`.`AREA_NAME` AS `AREA_NAME`, `areas`.`AREA_ID` AS `AREA_ID`, `districts`.`DISTRICT_ID` AS `DISTRICT_ID`, `loanTransaction`.`TR_TIME` AS `TR_TIME`, `loanTransaction`.`TR_DONE_ON` AS `TR_DONE_ON` FROM (((`customermaster` join `loanTransaction`) join `areas`) join `districts`) WHERE `loanTransaction`.`TR_OF_CUSTOMER` = `customermaster`.`CUSTOMER_ID` AND `districts`.`DISTRICT_ID` = `customermaster`.`CUSTOMER_DISTRICT` AND `areas`.`AREA_ID` = `customermaster`.`CUSTOMER_CITY` ;

-- --------------------------------------------------------

--
-- Structure for view `todayTransactionViewWithAgents`
--
DROP TABLE IF EXISTS `todayTransactionViewWithAgents`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `todayTransactionViewWithAgents`  AS SELECT `loanTransaction`.`TR_ID` AS `TR_ID`, `loanTransaction`.`TR_LN_ID` AS `TR_LN_ID`, `loanTransaction`.`TR_AMOUNT_PAID` AS `TR_AMOUNT_PAID`, `loanTransaction`.`TR_AMOUNT_BALANCE` AS `TR_AMOUNT_BALANCE`, `loanTransaction`.`TR_COMMIT_STATUS` AS `TR_COMMIT_STATUS`, `loanTransaction`.`TR_DATE` AS `TR_DATE`, `loanTransaction`.`TR_DONE_ON` AS `TR_DONE_ON`, `customermaster`.`CUSTOMER_FIRST_NAME` AS `CUSTOMER_FIRST_NAME`, `customermaster`.`CUSTOMER_LAST_NAME` AS `CUSTOMER_LAST_NAME`, `customermaster`.`CUSTOMER_PHONE_NUMBER` AS `CUSTOMER_PHONE_NUMBER`, `customermaster`.`CUSTOMER_ID` AS `CUSTOMER_ID`, `agents`.`AGENT_NAME` AS `AGENT_NAME`, `agents`.`AGENT_PHONE_NUMBER` AS `AGENT_PHONE_NUMBER`, `districts`.`DISTRICT_NAME` AS `DISTRICT_NAME`, `areas`.`AREA_NAME` AS `AREA_NAME` FROM ((((`loanTransaction` join `customermaster` on(`customermaster`.`CUSTOMER_ID` = `loanTransaction`.`TR_OF_CUSTOMER`)) left join `agents` on(`agents`.`AGENT_ID` = `loanTransaction`.`TR_DONE_ON`)) join `districts`) join `areas`) WHERE `districts`.`DISTRICT_ID` = `customermaster`.`CUSTOMER_DISTRICT` AND `areas`.`AREA_ID` = `customermaster`.`CUSTOMER_CITY` ;

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
-- Indexes for table `orderItemMaster`
--
ALTER TABLE `orderItemMaster`
  ADD PRIMARY KEY (`OR_IT_ID`),
  ADD KEY `OR_OF_PR_ID` (`OR_OF_PR_ID`),
  ADD KEY `OR_TO_LN_ID` (`OR_TO_LN_ID`),
  ADD KEY `orderItemMaster_ibfk_1` (`OR_OF_CUS`);

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
  MODIFY `AGENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `agents_to_area`
--
ALTER TABLE `agents_to_area`
  MODIFY `AG_TO_AREA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `AREA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `BRAND_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `collectionList`
--
ALTER TABLE `collectionList`
  MODIFY `COLLECTION_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customermaster`
--
ALTER TABLE `customermaster`
  MODIFY `CUSTOMER_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `DISTRICT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `loanMaster`
--
ALTER TABLE `loanMaster`
  MODIFY `LOAN_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loanTransaction`
--
ALTER TABLE `loanTransaction`
  MODIFY `TR_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `LOGINID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orderItemMaster`
--
ALTER TABLE `orderItemMaster`
  MODIFY `OR_IT_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `PRODUCT_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `SALE_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `customermaster_ibfk_1` FOREIGN KEY (`CUSTOMER_DISTRICT`) REFERENCES `districts` (`DISTRICT_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `customermaster_ibfk_2` FOREIGN KEY (`CUSTOMER_CITY`) REFERENCES `areas` (`AREA_ID`);

--
-- Constraints for table `orderItemMaster`
--
ALTER TABLE `orderItemMaster`
  ADD CONSTRAINT `orderItemMaster_ibfk_1` FOREIGN KEY (`OR_OF_CUS`) REFERENCES `customermaster` (`CUSTOMER_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `orderItemMaster_ibfk_2` FOREIGN KEY (`OR_OF_PR_ID`) REFERENCES `products` (`PRODUCT_ID`),
  ADD CONSTRAINT `orderItemMaster_ibfk_3` FOREIGN KEY (`OR_TO_LN_ID`) REFERENCES `loanMaster` (`LOAN_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
