-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 11, 2018 at 11:38 PM
-- Server version: 5.5.61-cll
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pakdenti_dental`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `user_name`, `password`) VALUES
(1, 'admin@gmail.com', '479cf2a193c2334a4c804f5402723e06');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(10) NOT NULL,
  `clinic_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `id` int(10) NOT NULL,
  `date` date NOT NULL,
  `time_slot` varchar(50) NOT NULL,
  `type` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `clinic_id`, `user_id`, `id`, `date`, `time_slot`, `type`, `description`) VALUES
(3, 1, 1, 3, '2018-10-11', '07:35-08:00', 'Meeting', 'sdafsdddadnanali'),
(4, 1, 1, 3, '2018-10-05', '-', 'Meeting', 'sdafsda'),
(5, 1, 1, 3, '2018-10-03', '-', 'Meeting', 'kjk'),
(6, 1, 1, 3, '2018-10-05', '07:30-08:00', 'Patient appointment', 'kjkj'),
(7, 1, 1, 3, '2018-10-04', '07:30-08:00', 'Meeting', 'sds'),
(10, 1, 1, 3, '2018-10-06', '07:30-08:00', 'Meeting', 'sdfsd'),
(14, 1, 1, 9, '2018-10-24', '5:00-5:30', 'Meeting', 'scaling'),
(16, 1, 1, 3, '2018-10-10', '07:30-08:00', 'Meeting', 'jjj'),
(17, 3, 14, 3, '2018-10-23', 'ALL DAY', 'Patient appointment', 'jnjnj');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bill_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `location` varchar(50) NOT NULL,
  `clinic` varchar(100) NOT NULL,
  `dentist` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `cheif_complaint` varchar(200) NOT NULL,
  `sign_symp` varchar(200) NOT NULL,
  `diagnosis` varchar(500) NOT NULL,
  `procedure_name` varchar(500) NOT NULL,
  `material` varchar(500) NOT NULL,
  `prescription` varchar(500) NOT NULL,
  `patient_id` int(10) NOT NULL,
  `amount` int(20) NOT NULL,
  `total_amount` int(10) NOT NULL,
  `payment` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bill_id`, `date`, `location`, `clinic`, `dentist`, `status`, `cheif_complaint`, `sign_symp`, `diagnosis`, `procedure_name`, `material`, `prescription`, `patient_id`, `amount`, `total_amount`, `payment`) VALUES
(19, '2018-10-23 12:51:15', '18', '1', 'Adnan Ali', 'Resto', 'Lorem Ipsum', '90000 RS', 'Lorem Ipsumd', 'Endodontics | Surgical Odontectomy / Impaction\r\n |  |  | Class II Position A Inverted Impaction', 'Consumables | Tooth brush |  | MKTG | Just Testing', 'Amoxicillin | Promox Cap|120 mg / 5 ml x 120 ml | Take 10 ml immediately, then 5 ml every 6 hours for 3 days.', 3, 0, 273, 1),
(20, '2018-10-23 12:51:31', '18', '1', 'Adnan Ali', 'Resto', 'Lorem Ipsum', '90000 RS', 'Lorem Ipsumd', 'Endodontics | Surgical Odontectomy / Impaction\r\n |  |  | Class II Position A Inverted Impaction', 'Consumables | Tooth brush |  | MKTG | Just Testing', 'Amoxicillin | Promox Cap|120 mg / 5 ml x 120 ml | Take 10 ml immediately, then 5 ml every 6 hours for 3 days.', 3, 0, 273, 1),
(21, '2018-10-23 12:51:41', '18', '1', 'Adnan Ali', 'Resto', 'Lorem Ipsum', '90000 RS', 'Lorem Ipsumd', 'Endodontics | Surgical Odontectomy / Impaction\r\n |  |  | Class II Position A Inverted Impaction', 'Consumables | Tooth brush |  | MKTG | Just Testing', 'Amoxicillin | Promox Cap|120 mg / 5 ml x 120 ml | Take 10 ml immediately, then 5 ml every 6 hours for 3 days.', 3, 0, 273, 1),
(22, '2018-10-23 12:51:54', 'Adult Quadrant 1', '1', 'Adnan Ali', 'Resto', 'Bleeding Gumss', 'Pain', 'Lorem Ipsumd.sss', 'Endodontics | Root Canal Treatment |  | MKTG | Just Testing', 'Consumables | Tooth brush |  |  | Tooth paste', 'Amoxicillin | Polymox Susp|90 mg | df', 3, 1276, 1276, 0),
(23, '2018-10-23 20:58:43', 'Adult Quadrant 1', '1', 'Adnan Ali', 'Resto', 'Bleeding Gumss', 'Pain', 'Lorem Ipsumd.sss', 'Endodontics | Root Canal Treatment |  | MTHB | Just Testing', 'Consumables | Tooth paste |  |  | Tooth brush', 'Amoxicillin | Promox Cap|120 mg / 5 ml x 120 ml | Take 10 ml immediately, then 5 ml every 6 hours for 3 days.', 3, 50, 100, 0),
(25, '2018-10-23 20:59:13', 'Adult Quadrant 1', '1', 'Adnan Ali', 'Resto', 'Bleeding Gumss', 'Pain', 'Lorem Ipsumd.sss', 'Endodontics | Root Canal Treatment |  | MKTG | Just Testing', 'Consumables | Tooth paste |  |  | Tooth brush', 'Amoxicillin | Polymox Susp|90 mg | df', 3, 500, 800, 0),
(26, '2018-10-23 12:52:22', '43', '1', 'Adnan Ali', 'Endo', 'Bleeding Gums', 'Pain', 'Pulpitis', 'Endodontics | Root Canal Treatment |  | MTHB | Just Testing', 'Test 4  | adsfe | 250 mg | MTHB | Just Testing', 'Amoxicillin | Promox Cap|120 mg / 5 ml x 120 ml | Take 10 ml immediately, then 5 ml every 6 hours for 3 days.', 7, 0, 20, 1),
(27, '2018-10-23 12:52:29', 'Adult Quadrant 1', '1', 'Adnan Ali', 'Surgery', 'Bleeding Gumss', 'Pain', 'Lorem Ipsum', 'Endodontics | Root Canal Treatment |  | MTHB | Just Testing', 'Cosmetic Dentistry | Indirect Composite |  |  | Tooth brush', 'Ampicilin | Biogenerics Ampicillin Cap|250 mg | Take 1 cap immediately, then 1 cap every 8 hours for 7 days.', 7, 121, 121, 0),
(28, '2018-10-23 12:54:58', 'Adult Quadrant 1', '1', 'Adnan Ali', 'Resto', 'Bleeding Gums', 'Pain', 'Pulpitis', 'Endodontics | Root Canal Treatment |  | MTHB | Just Testing', 'Consumables | Tooth paste |  |  | Tooth brush', 'Amoxicillin | Polymox Susp|90 mg | df', 3, 68, 168, 0),
(29, '2018-10-26 12:21:49', 'Adult Quadrant 1', '1', 'Adnan Ali', 'Resto', 'Bleeding Gums', 'Pain', 'Pulpitis', 'Endodontics | Root Canal |  | MKTG | Just Testing', 'Consumables | Tooth paste |  |  | Tooth brush', 'Amoxicillin | Polymox Susp|90 mg | df', 8, 248, 248, 0),
(30, '2018-10-26 12:44:34', '13', '2', 'Adnan Ali', 'General', 'Bleeding Gums', 'Pain', 'Pulpitis', 'Endodontics | Root Canal |  | MKTG | Just Testing', 'Consumables | Tooth paste |  |  | Tooth brush', 'Amoxicillin | Polymox Susp|90 mg | df', 8, 168, 168, 0),
(31, '2018-10-26 12:47:01', 'Adult Quadrant 1', '1', 'Adnan Ali', 'Resto', 'Bleeding Gums', 'Pain', 'Pulpitis', 'Endodontics | Root Canal |  | MKTG | Just Testing', 'Oral Surgery | Bovine Collagen | Ali |  | Test', 'Amoxicillin | Polymox Susp|90 mg | df', 8, 265, 265, 0),
(32, '2018-10-26 14:44:08', 'Adult Quadrant 1', '1', 'Adnan Ali', 'Resto', 'Bleeding Gums', 'Pain', 'Pulpitis', 'Endodontics | Root Canal Treatment |  | MTHB | Just Testing', 'Consumables | Tooth brush |  |  | Tooth paste', 'Amoxicillin | Polymox Susp|90 mg | df', 8, 168, 168, 0),
(33, '2018-10-26 15:18:47', 'Adult Quadrant 1', '1', 'Adnan Ali', 'Resto', 'Bleeding Gums', 'Pain', 'Pulpitis', 'Endodontics | ae | ae | MKTG | ae', 'Consumables | Tooth brush |  | MKTG | Just Testing', 'Amoxicillin | Polymox Susp|90 mg | df', 8, 37, 37, 0),
(34, '2018-10-26 15:19:47', 'Adult Quadrant 1', '1', 'Adnan Ali', 'Resto', 'Bleeding Gums', 'Pain', 'Pulpitis', 'Endodontics | Surgical Odontectomy / Impaction\r\n |  |  | Class II Position A Inverted Impaction', 'Consumables | Tooth brush |  | MKTG | Just Testing', 'Amoxicillin | Polymox Susp|90 mg | df', 8, 103, 103, 0),
(35, '2018-10-26 15:36:01', '15', '2', 'Adnan Ali', 'Surgery', 'Disclouration of teeth', 'Fever', 'Flurosis', 'Endodontics | Surgical Odontectomy / Impaction\r\n |  |  | Class II Position A Inverted Impaction', 'Consumables | Tooth brush |  | MKTG | Just Testing', 'Amoxicillin | Polymox Susp|90 mg | df', 8, 81, 81, 0),
(36, '2018-10-26 15:46:40', '23', '2', 'Adnan Ali', 'Surgery', 'Bleeding Gums', 'Fever', 'Flurosis', 'Endodontics | Surgical Odontectomy / Impaction\r\n |  |  | Class II Position A Inverted Impaction', 'Consumables | Tooth brush |  | MKTG | Just Testing', 'Acetylsalicylic Acid | Pentrexyl Cap|250 mg | Take 1 cap immediately, then 1 cap every 8 hours for 7 days.', 8, 42, 92, 0),
(37, '2018-10-30 08:07:30', '17', '1', 'Adnan Ali', 'General', 'Dental Pain', 'Pain', 'Pulpitis', 'Endodontics | Surgical Odontectomy / Impaction\r\n |  |  | Class II Position A Inverted Impaction', 'Consumables | Tooth brush |  | MKTG | Just Testing', 'Amoxicillin | Polymox Susp|90 mg | df', 7, 106, 106, 0),
(38, '2018-10-30 08:08:56', 'Adult Quadrant 1', '1', 'Adnan Ali', 'Resto', 'Bleeding Gums', 'Pain', 'Pulpitis', 'Endodontics | Surgical Odontectomy / Impaction\r\n |  |  | Class II Position A Inverted Impaction', 'Consumables | Tooth brush |  | MKTG | Just Testing', 'Amoxicillin | Polymox Susp|90 mg | df', 7, 199, 199, 0),
(39, '2018-10-30 08:49:30', 'Adult Quadrant 1', '1', 'Adnan Ali', 'Endo', 'Bleeding Gums', 'Pain', 'Pulpitis', 'perio | pdl | pd1 | pero | pd2', 'Oral Surgery | Bovine Collagen | Adnan Ali |  | Test 10/10', 'Amoxicillin | Polymox Susp|90 mg | df', 8, 5080, 5080, 0),
(40, '2018-10-30 08:49:44', 'Adult Quadrant 1', '1', 'Adnan Ali', 'perio', 'Bleeding Gums', 'Pain', 'Pulpitis', 'perio | pdl | pd1 | pero | pd2', 'Oral Surgery | Bovine Collagen |  |  | Materials.php', 'Amoxicillin | Polymox Susp|90 mg | df', 7, 5080, 5080, 0),
(41, '2018-10-30 08:54:13', 'Adult Quadrant 1', '1', 'Adnan Ali', 'Endo', 'Bleeding Gums', 'Fever', 'Flurosis', 'perio | pdl | pd1 | pero | pd2', 'Cosmetic Dentistry | Indirect Composite |  |  | Tooth brush', 'Amoxicillin | Polymox Susp|90 mg | df', 8, 35033, 35033, 0),
(42, '2018-10-31 13:39:05', '25', '7', 'Dr Agha Muhammad Raza', 'perio', 'Dental Pain', 'Pain', 'Pulpitis', 'Endodontics | Root Canal Treatment | Anterior Teeth | RCT | singal cannal', 'Consumables | Tooth brush |  |  | Tooth paste', 'Amoxicillin | Polymox Susp|90 mg | df', 7, 6080, 6080, 0),
(43, '2018-10-31 13:43:40', 'Adult Quadrant 1', '1', 'Adnan Ali', 'Resto', 'Bleeding Gums', 'Pain', 'Pulpitis', 'Endodontics | Root Canal Treatment | Anterior Teeth | RCT | singal cannal', 'Consumables | Tooth paste |  |  | Tooth brush', 'Amoxicillin | Polymox Susp|90 mg | df', 7, 12080, 12080, 0),
(44, '2018-10-31 13:44:13', 'Adult Quadrant 1', '1', 'Adnan Ali', 'Resto', 'Bleeding Gums', 'Pain', 'Pulpitis', 'Endodontics | Root Canal Treatment | Anterior Teeth | RCT | singal cannal', 'Consumables | Tooth brush |  |  | Tooth paste', 'Amoxicillin | Polymox Susp|90 mg | df', 7, 6082, 6082, 0),
(45, '2018-10-31 14:17:46', 'Adult Quadrant 1', '1', 'Adnan Ali', 'Resto', 'Bleeding Gums', 'Pain', 'Pulpitis', 'Endodontics | Root Canal Treatment | Anterior Teeth | RCT | singal cannal', 'Consumables | Tooth brush |  |  | Tooth paste', 'Amoxicillin | Polymox Susp|90 mg | df', 9, 1080, 6080, 0),
(46, '2018-11-03 12:31:37', '26', '7', 'Dr Agha Muhammad Raza', 'perio', 'Dental Pain', 'Fever', 'Flurosis', 'perio | pdl | pd1 | pero | pd2', 'Cosmetic Dentistry | Indirect Composite |  |  | Tooth brush', 'Amoxicillin | Polymox Susp|90 mg | df', 7, 50066, 50066, 0),
(47, '2018-11-03 12:33:01', 'Adult Quadrant 1', '1', 'Adnan Ali', 'Resto', 'Bleeding Gums', 'Pain', 'Pulpitis', 'perio | pdl | pd1 | pero | pd2', 'Cosmetic Dentistry | Indirect Composite |  |  | Tooth brush', 'Amoxicillin | Polymox Susp|90 mg | df', 7, 35033, 35033, 0),
(48, '2018-11-03 12:33:08', 'Adult Quadrant 1', '1', 'Adnan Ali', 'Resto', 'Bleeding Gums', 'Pain', 'Pulpitis', 'perio | pdl | pd1 | pero | pd2', 'Cosmetic Dentistry | Indirect Composite |  |  | Tooth brush', 'Amoxicillin | Polymox Susp|90 mg | df', 7, 35033, 35033, 0),
(49, '2018-11-03 12:33:41', 'Adult Quadrant 1', '1', 'Adnan Ali', 'Resto', 'Bleeding Gums', 'Pain', 'Pulpitis', 'perio | pdl | pd1 | pero | pd2', 'Cosmetic Dentistry | Indirect Composite |  |  | Tooth brush', 'Amoxicillin | Polymox Susp|90 mg | df', 7, 35033, 35033, 0),
(50, '2018-11-03 12:34:08', 'Adult Quadrant 1', '1', 'Adnan Ali', 'Resto', 'Bleeding Gums', 'Pain', 'Pulpitis', 'perio | pdl | pd1 | pero | pd2', 'Cosmetic Dentistry | Indirect Composite |  |  | Tooth brush', 'Amoxicillin | Polymox Susp|90 mg | df', 7, 35033, 35033, 0);

-- --------------------------------------------------------

--
-- Table structure for table `chief_complaint`
--

CREATE TABLE `chief_complaint` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chief_complaint`
--

INSERT INTO `chief_complaint` (`id`, `name`, `description`) VALUES
(22, 'Bleeding Gums', 'Gums bleed on light pressure or brushing.'),
(43, 'Disclouration of teeth', 'Stained teeth'),
(44, 'Dental Pain', 'Pain in teeth');

-- --------------------------------------------------------

--
-- Table structure for table `clanic`
--

CREATE TABLE `clanic` (
  `id` int(10) NOT NULL,
  `clanic_name` varchar(200) NOT NULL,
  `building_name` varchar(150) NOT NULL,
  `office_num` varchar(10) NOT NULL,
  `street` varchar(50) NOT NULL,
  `street_num` varchar(10) NOT NULL,
  `country` varchar(20) NOT NULL,
  `postal_code` varchar(10) NOT NULL,
  `city` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `phone_num` varchar(50) NOT NULL,
  `fax_num` varchar(50) NOT NULL,
  `mob_num` varchar(50) NOT NULL,
  `email_add` varchar(100) NOT NULL,
  `govt_name` varchar(100) NOT NULL,
  `govt_regiter_num` varchar(50) NOT NULL,
  `company_tax` varchar(10) NOT NULL,
  `clanic_manager` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clanic`
--

INSERT INTO `clanic` (`id`, `clanic_name`, `building_name`, `office_num`, `street`, `street_num`, `country`, `postal_code`, `city`, `district`, `province`, `phone_num`, `fax_num`, `mob_num`, `email_add`, `govt_name`, `govt_regiter_num`, `company_tax`, `clanic_manager`) VALUES
(1, 'Green Clinic', 'Balochistan Medical Centre', '02', 'Fatima Jinnah Road corner Prince Road', '01', 'Pakistan', '87300', 'Quetta', 'Quetta', 'Balochistan', '+9281 283 6448', '', '', 'doctorsmartpc@live.com', 'Balochistan', '1234', '1234', 'Saeed'),
(2, 'Pink Clinic', 'Balochistan Medical Centre', '03', 'Fatima Jinnah Road corner Prince Road', '1', 'Pakistan', '87300', 'Quetta', 'Quetta', 'Balochistan', '+9281 282 5275', '', '', 'doctorsmartpc@live.com', 'Balochistan', '1234', '1234', 'Abdullah'),
(3, 'Karachi Clinic', 'Mezan Chock', '0819876547', 'Saryab Road', '4', 'Pakistan', '89733', 'Quetta', 'lk', 'jk', 'jlkj', 'jk', 'jlk', 'jlk', 'jlk', 'jk', 'jl', 'jlk'),
(4, 'Lahore 1', 'Satelite Town', '0819876345', 'Quetta Cantt', '5', 'Pakistan', '89733', 'Quetta', 'lk', 'jk', 'jlkj', 'jk', 'jlk', 'jlk', 'Balochistan', 'jk', 'jl', 'jlk'),
(5, 'Pakistan Clinic', 'Saryab Building', '0817645398', 'Gulistan Road', '6', 'Pakistan', '89733', 'Quetta', 'lk', 'jk', 'jlkj', 'jk', 'jlk', 'jlk', 'jlk', 'jk', 'jl', 'jlk'),
(7, 'Blue Clinic', 'Balochistan Medical Centre', '0812836448', 'Fatima Jinnah Road corner Prince Road', '01', '', '87300', 'Quetta', 'quetta', 'Balochistan', '+92812836448', '1234', '+92812836448', 'doctorsmartpc@live.com', 'gov', '12', '123', 'Ashraf');

-- --------------------------------------------------------

--
-- Table structure for table `clanic_doctor`
--

CREATE TABLE `clanic_doctor` (
  `clanic_doctor_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clanic_doctor`
--

INSERT INTO `clanic_doctor` (`clanic_doctor_id`, `user_id`, `id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 8, 1),
(5, 1, 3),
(6, 1, 4),
(11, 12, 1),
(12, 12, 5),
(15, 14, 1),
(16, 14, 3),
(19, 16, 7),
(20, 17, 1),
(21, 18, 1),
(22, 19, 1),
(23, 20, 2),
(25, 22, 7);

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE `diagnosis` (
  `id` int(11) NOT NULL,
  `abbrev` varchar(150) NOT NULL,
  `diagnosis` varchar(150) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`id`, `abbrev`, `diagnosis`, `description`) VALUES
(9, 'Pulpitis', 'Pulpitis', 'Infection of pulpsdsss'),
(11, 'Flurosis', 'Flurosis', 'fluoride deposition');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` int(11) NOT NULL,
  `abbrev` varchar(255) NOT NULL,
  `consumables` varchar(255) NOT NULL,
  `pricing_defined` varchar(255) NOT NULL,
  `price_s` varchar(150) NOT NULL,
  `price_m` varchar(150) NOT NULL,
  `price_l` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `abbrev`, `consumables`, `pricing_defined`, `price_s`, `price_m`, `price_l`) VALUES
(15, 'Lorem Ipsumi', 'Lorem Ipsum', 'Lorem Ipsum', '9000 RS', '9000 RS', '1000 RS');

-- --------------------------------------------------------

--
-- Table structure for table `material_by_amount`
--

CREATE TABLE `material_by_amount` (
  `by_amount_id` int(10) NOT NULL,
  `abbrev` varchar(100) NOT NULL,
  `by_amount_name` varchar(200) NOT NULL,
  `by_amount` varchar(100) NOT NULL,
  `small` int(10) NOT NULL,
  `medium` int(10) NOT NULL,
  `large` int(10) NOT NULL,
  `sub_attri_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material_by_amount`
--

INSERT INTO `material_by_amount` (`by_amount_id`, `abbrev`, `by_amount_name`, `by_amount`, `small`, `medium`, `large`, `sub_attri_id`) VALUES
(1, '', ' Sep. Spring M', 'By Amount', 60, 60, 100, 13),
(2, '', 'Test', 'By Amount', 44, 33, 100, 15),
(3, 'MTHB', 'Just Testing', 'By Amount', 3, 4, 5, 24),
(4, '', 'Just Testing', 'By Amount', 3, 4, 5, 30),
(5, 'MKTG', 'Just Testing', 'By Amount', 3, 4, 5, 32);

-- --------------------------------------------------------

--
-- Table structure for table `material_by_length`
--

CREATE TABLE `material_by_length` (
  `material_length_id` int(10) NOT NULL,
  `abbrev` varchar(100) NOT NULL,
  `by_length_name` varchar(200) NOT NULL,
  `by_length` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `sub_attri_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material_by_length`
--

INSERT INTO `material_by_length` (`material_length_id`, `abbrev`, `by_length_name`, `by_length`, `price`, `sub_attri_id`) VALUES
(3, '', 'Materials.php', 'By Length', 80, 12),
(4, '', 'Adnan', 'By WEight', 80, 13),
(5, '', 'adnan', 'By Volume', 33, 14),
(6, 'MTHB', 'Just Testing', 'By Length', 0, 27);

-- --------------------------------------------------------

--
-- Table structure for table `material_cat`
--

CREATE TABLE `material_cat` (
  `cat_id` int(10) NOT NULL,
  `material_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material_cat`
--

INSERT INTO `material_cat` (`cat_id`, `material_name`) VALUES
(1, 'Consumables'),
(3, 'Cosmetic Dentistry'),
(4, 'Oral Surgery'),
(12, 'Test 4 '),
(13, 'Test 45'),
(14, 'Test 5'),
(16, 'Test 6');

-- --------------------------------------------------------

--
-- Table structure for table `material_per_price`
--

CREATE TABLE `material_per_price` (
  `per_price_id` int(10) NOT NULL,
  `abbrev` varchar(100) NOT NULL,
  `per_price_name` varchar(200) NOT NULL,
  `per_price` varchar(150) NOT NULL,
  `price` int(10) NOT NULL,
  `sub_attri_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material_per_price`
--

INSERT INTO `material_per_price` (`per_price_id`, `abbrev`, `per_price_name`, `per_price`, `price`, `sub_attri_id`) VALUES
(3, '', 'Tooth brush', 'Per Piece', 33, 6),
(4, '', 'Tooth paste', 'Per Piece', 80, 9),
(5, '', 'Tooth brush', 'Per Piece', 80, 10),
(6, '', 'Test 10/10', 'Per Price', 80, 14),
(7, 'MTHB', 'Just Testing', 'Per Piece', 0, 23),
(8, 'MTHB', 'Just Testing', 'Per Piece', 0, 25);

-- --------------------------------------------------------

--
-- Table structure for table `material_subcat`
--

CREATE TABLE `material_subcat` (
  `sub_id` int(10) NOT NULL,
  `sub_name` varchar(200) NOT NULL,
  `cat_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material_subcat`
--

INSERT INTO `material_subcat` (`sub_id`, `sub_name`, `cat_id`) VALUES
(1, 'Tooth brush', 1),
(4, 'Indirect Composite', 3),
(5, 'Tooth paste', 1),
(6, 'Bovine Collagen', 4),
(14, 'adsfe', 12),
(15, 'adsfe5', 13),
(16, 'adsfeeee', 14),
(18, 'e', 16),
(20, 'ee', 16),
(21, 'bovine Collagend', 4);

-- --------------------------------------------------------

--
-- Table structure for table `material_sub_attri`
--

CREATE TABLE `material_sub_attri` (
  `sub_attri_id` int(10) NOT NULL,
  `attribute_name` varchar(200) NOT NULL,
  `sub_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material_sub_attri`
--

INSERT INTO `material_sub_attri` (`sub_attri_id`, `attribute_name`, `sub_id`) VALUES
(6, '', 4),
(9, '', 1),
(10, '', 5),
(12, '', 6),
(13, 'Sep. Spring M', 6),
(14, 'Adnan Ali', 6),
(15, 'Ali', 6),
(23, '250 mg', 14),
(24, '250 mg5', 15),
(25, '250 mgc', 16),
(27, '250e mg', 18),
(30, '90', 21),
(32, '', 1),
(33, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `clinic` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `middle_name` varchar(150) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `gender` varchar(150) NOT NULL,
  `birdth` varchar(150) NOT NULL,
  `nationality` varchar(150) NOT NULL,
  `marital_status` varchar(150) NOT NULL,
  `house` varchar(150) NOT NULL,
  `street` varchar(150) NOT NULL,
  `district` varchar(150) NOT NULL,
  `city` varchar(150) NOT NULL,
  `province` varchar(150) NOT NULL,
  `postal_code` varchar(150) NOT NULL,
  `mobile` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `comment` varchar(150) NOT NULL,
  `occupation` varchar(150) NOT NULL,
  `status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `clinic`, `last_name`, `middle_name`, `first_name`, `gender`, `birdth`, `nationality`, `marital_status`, `house`, `street`, `district`, `city`, `province`, `postal_code`, `mobile`, `email`, `comment`, `occupation`, `status`) VALUES
(3, 'BUITEMS', 'Rahman', 'ur', 'Anees', 'm', '2000/03/20', '', 'single', '40', 'office no1 3rd floor Sadiq Arcade Link road, model town Lahore Pakistan', 'Quetta', 'Quetta', 'Balochistan', '87800', '14341343535', 'example@gamil.com', 'example', 'Doctor', 'Regular patient'),
(7, 'BUITEMS', 'Raza', 'Muhammad', 'Agha', 'm', '1976/09/12', 'Pakistani', 'married', '', '', '', '', '', '', '', 'doctorsmartpc@live.com', '', '', 'Regular patient'),
(8, 'BUITEMS', 'Ali', 'dawood', 'dw', 'm', '1980/01/01', 'Pakistani', 'married', '', '', '', '', '', '', '', 'daw', '', '', 'Regular patient'),
(9, 'BUITEMS', 'Mengal', 'Ambreen', 'Dr', 'f', '1986/04/28', '', 'single', '', '', '', '', '', '', '', 'abc', '', '', 'Regular patient');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` int(11) NOT NULL,
  `acetylsalicylic_acid` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `instructions` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `acetylsalicylic_acid`, `price`, `instructions`) VALUES
(1, 'Lorem Ipsum', '8998 RS', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.');

-- --------------------------------------------------------

--
-- Table structure for table `pre_cat`
--

CREATE TABLE `pre_cat` (
  `cat_id` int(10) NOT NULL,
  `pre_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pre_cat`
--

INSERT INTO `pre_cat` (`cat_id`, `pre_name`) VALUES
(1, 'Amoxicillin'),
(2, 'Ampicilin'),
(3, 'Acetylsalicylic Acid'),
(4, 'Bacampicillin'),
(7, 'Cefalexin'),
(11, 'Co-amoxiclav'),
(12, 'Seferia');

-- --------------------------------------------------------

--
-- Table structure for table `pre_desc`
--

CREATE TABLE `pre_desc` (
  `desc_id` int(10) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `instruction` varchar(300) NOT NULL,
  `sub_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pre_desc`
--

INSERT INTO `pre_desc` (`desc_id`, `quantity`, `price`, `instruction`, `sub_id`) VALUES
(3, '120 mg / 5 ml x 120 ml', 0, 'Take 10 ml immediately, then 5 ml every 6 hours for 3 days.', 2),
(5, '250 mg', 0, 'Take 1 cap immediately, then 1 cap every 8 hours for 7 days.', 3),
(6, '250 mg', 0, 'Take 1 cap immediately, then 1 cap every 8 hours for 7 days.', 4),
(12, '375 mg', 0, 'Take 1 tab immediately, then 1 tab every 8 hours for 5 days.', 13),
(13, '250 mg', 0, 'dfdsf', 3),
(15, '250 mg', 0, 'Take One Spoon After Breakfast', 14),
(16, '375 mg', 0, 'Lorup Ipsum', 15),
(17, '250 mg', 0, 'Test Case', 16),
(21, '375 mg', 0, 'Take one spoon', 20),
(23, '90 mg', 0, 'df', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pre_subcat`
--

CREATE TABLE `pre_subcat` (
  `sub_id` int(10) NOT NULL,
  `sub_name` varchar(200) NOT NULL,
  `cat_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pre_subcat`
--

INSERT INTO `pre_subcat` (`sub_id`, `sub_name`, `cat_id`) VALUES
(1, 'Polymox Susp', 1),
(2, 'Promox Cap', 1),
(3, 'Biogenerics Ampicillin Cap', 2),
(4, 'Pentrexyl Cap', 3),
(13, 'Amoclav Tab', 11),
(14, 'Radix Susp', 12),
(15, 'Cefalen Clip', 7),
(16, 'Amocla Cab', 11),
(20, 'Cefalen Suspension', 4);

-- --------------------------------------------------------

--
-- Table structure for table `procedures`
--

CREATE TABLE `procedures` (
  `id` int(11) NOT NULL,
  `abbrev` varchar(255) NOT NULL,
  `cosmetic_dentistry` varchar(255) NOT NULL,
  `pricing_defined` varchar(255) NOT NULL,
  `price` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `procedure_attribute`
--

CREATE TABLE `procedure_attribute` (
  `attri_id` int(10) NOT NULL,
  `attribute_name` varchar(200) NOT NULL,
  `procedure_subcat_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `procedure_attribute`
--

INSERT INTO `procedure_attribute` (`attri_id`, `attribute_name`, `procedure_subcat_id`) VALUES
(1, 'Posterior Tooth', 1),
(2, '', 2),
(3, ' Alveolar Fracture', 3),
(4, '', 4),
(6, '250 mg', 6),
(7, 'sd', 7),
(15, '375 mgew', 19),
(18, 'sdafee', 22),
(20, '250 mgee', 24),
(21, '', 25),
(23, 'b', 27),
(24, '', 28),
(25, '', 29),
(26, '', 30),
(29, '', 1),
(31, '', 31),
(33, 'steel', 1),
(34, 'pd1', 33),
(35, 'Anterior Teeth', 1),
(36, 'Premolars', 1),
(37, 'molar', 1),
(38, 'molar', 1),
(39, 'molar', 1),
(40, 'scaling', 34);

-- --------------------------------------------------------

--
-- Table structure for table `procedure_cat`
--

CREATE TABLE `procedure_cat` (
  `procedure_id` int(10) NOT NULL,
  `cat_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `procedure_cat`
--

INSERT INTO `procedure_cat` (`procedure_id`, `cat_name`) VALUES
(1, 'Endodontics'),
(2, 'Oral Surgery'),
(4, 'Test Surgery'),
(5, 'Test 2'),
(17, 'Test 5'),
(20, 'Test 8'),
(22, 'Test 9'),
(25, 'Test11'),
(27, 'Test 3'),
(28, 'Test 12'),
(29, 'Test8'),
(30, 'perio');

-- --------------------------------------------------------

--
-- Table structure for table `procedure_multiple`
--

CREATE TABLE `procedure_multiple` (
  `multiple_id` int(10) NOT NULL,
  `abbrev` varchar(100) NOT NULL,
  `multiple_name` varchar(200) NOT NULL,
  `q` int(10) NOT NULL,
  `mx` int(10) NOT NULL,
  `mn` int(10) NOT NULL,
  `mxmn` int(10) NOT NULL,
  `amx` int(10) NOT NULL,
  `amn` int(10) NOT NULL,
  `rpmx` int(10) NOT NULL,
  `lpmx` int(10) NOT NULL,
  `rpmn` int(10) NOT NULL,
  `lpmn` int(10) NOT NULL,
  `attri_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `procedure_multiple`
--

INSERT INTO `procedure_multiple` (`multiple_id`, `abbrev`, `multiple_name`, `q`, `mx`, `mn`, `mxmn`, `amx`, `amn`, `rpmx`, `lpmx`, `rpmn`, `lpmn`, `attri_id`) VALUES
(1, '', ' Interdental Wiring', 1000, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 3),
(2, 'RCT', 'three cannal', 250, 251, 251, 502, 125, 125, 124, 0, 124, 124, 38);

-- --------------------------------------------------------

--
-- Table structure for table `procedure_per_other`
--

CREATE TABLE `procedure_per_other` (
  `other_id` int(10) NOT NULL,
  `abbrev` varchar(100) NOT NULL,
  `other_name` varchar(200) NOT NULL,
  `ul` int(10) NOT NULL,
  `ll` int(10) NOT NULL,
  `rc` int(10) NOT NULL,
  `lc` int(10) NOT NULL,
  `t` int(10) NOT NULL,
  `f` int(10) NOT NULL,
  `hp` int(10) NOT NULL,
  `sp` int(10) NOT NULL,
  `attri_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `procedure_per_other`
--

INSERT INTO `procedure_per_other` (`other_id`, `abbrev`, `other_name`, `ul`, `ll`, `rc`, `lc`, `t`, `f`, `hp`, `sp`, `attri_id`) VALUES
(1, '', 'Excision For Biopsy', 344, 3445, 554, 65, 54, 553, 434, 909, 2),
(2, 'MTHB', 'c', 1, 2, 3, 4, 5, 6, 7, 8, 23),
(3, 'MTHB', 'Just Testing', 1, 2, 3, 4, 5, 6, 7, 8, 24),
(4, 'MTHB', 'Just Testing', 1, 2, 3, 4, 5, 6, 7, 8, 26),
(5, '', 'three cannal', 12, 13, 14, 15, 16, 17, 18, 19, 39);

-- --------------------------------------------------------

--
-- Table structure for table `procedure_per_proce`
--

CREATE TABLE `procedure_per_proce` (
  `per_procedure_id` int(10) NOT NULL,
  `abbrev` varchar(200) NOT NULL,
  `per_procedure_name` varchar(200) NOT NULL,
  `ppr` int(10) NOT NULL,
  `prap` int(10) NOT NULL,
  `attri_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `procedure_per_proce`
--

INSERT INTO `procedure_per_proce` (`per_procedure_id`, `abbrev`, `per_procedure_name`, `ppr`, `prap`, `attri_id`) VALUES
(3, 'MTHB', 'Just Testing', 34, 54, 6),
(4, 'MTHB', 'Just Testing', 34, 54, 15),
(7, 'MTHB', 'Just Testing', 34, 54, 20),
(8, 'MTHB', 'Just Testing', 34, 54, 21),
(9, 'MKTG', 'Just Testing', 34, 54, 25),
(12, 'MTHB', 'Just Testing', 34, 54, 29),
(16, 'MTHB', 'Just Testing', 34, 54, 31),
(18, 'pero', 'pd2', 5000, 30000, 34),
(19, 'RCT', 'singal cannal', 6000, 1, 35),
(20, 'scaling', 'scaling', 0, 0, 40);

-- --------------------------------------------------------

--
-- Table structure for table `procedure_per_single`
--

CREATE TABLE `procedure_per_single` (
  `per_id` int(10) NOT NULL,
  `abbrev` varchar(100) NOT NULL,
  `per_name` varchar(200) NOT NULL,
  `sp` int(11) NOT NULL,
  `mp` int(11) NOT NULL,
  `cp` int(11) NOT NULL,
  `attri_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `procedure_per_single`
--

INSERT INTO `procedure_per_single` (`per_id`, `abbrev`, `per_name`, `sp`, `mp`, `cp`, `attri_id`) VALUES
(1, '', 'Class II Position A Inverted Impaction', 98, 87, 76, 4),
(2, 'MKTG', 'df', 3, 4, 5, 7),
(3, '', 'Just Testing', 3, 4, 5, 18),
(4, 'RCT', 'singal cannal', 6500, 6600, 6700, 36);

-- --------------------------------------------------------

--
-- Table structure for table `procedure_subcat`
--

CREATE TABLE `procedure_subcat` (
  `procedure_subcat_id` int(10) NOT NULL,
  `sub_name` varchar(200) NOT NULL,
  `procedure_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `procedure_subcat`
--

INSERT INTO `procedure_subcat` (`procedure_subcat_id`, `sub_name`, `procedure_id`) VALUES
(1, 'Root Canal Treatment', 1),
(2, 'Excision For Biopsy', 2),
(3, 'Fracture Management', 2),
(4, 'Surgical Odontectomy / Impaction\r\n', 1),
(6, 'Amoclav Tab', 4),
(7, 'sd', 5),
(19, 'jkjkjklllllllllllllllllllllllllllllle', 17),
(22, 'sdfeee', 20),
(24, 'adsfeee', 22),
(25, 'jkjkjkllllllllllllllllllllllllllewlllleeee', 25),
(27, 'a', 27),
(28, 'b', 28),
(29, 'Root Canal', 1),
(30, 'Excision Management', 2),
(31, 'Test8', 29),
(32, 'ae', 1),
(33, 'pdl', 30),
(34, 'scaling', 30);

-- --------------------------------------------------------

--
-- Table structure for table `sign_symptom`
--

CREATE TABLE `sign_symptom` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sign_symptom`
--

INSERT INTO `sign_symptom` (`id`, `name`, `description`) VALUES
(25, 'Pain', 'pain'),
(30, 'Fever', 'High temperature');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `d_score` int(100) NOT NULL,
  `m_score` int(100) NOT NULL,
  `f_score` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `category`, `status`, `color`, `description`, `d_score`, `m_score`, `f_score`) VALUES
(23, 'Resto', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 9, 9, 9),
(24, 'Surgery', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 9, 9, 9),
(35, 'Implant', 'asdf', 'kj', 'jkjlk', 9, 9, 7700),
(36, 'Preventive', 'asdf', 'kj', 'jkjlk', 9, 9, 77),
(37, 'Prostho', 'asdf', 'kj', 'jkjlk', 9, 9, 77),
(38, 'General', 'asdf', 'kj', 'jkjlk', 9, 9, 77),
(39, 'Endo', 'adsf', 'adnan', 'fsd', 2, 45, 5),
(40, 'Caries', 'class 1', '123', 'afasdf new creating', 3, 3, 3),
(42, 'perio', 'per', '123', 'vfgghh', 566, 566, 555);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `u_name` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `u_pass` varchar(150) NOT NULL,
  `user_group` varchar(50) NOT NULL,
  `license_num` varchar(50) NOT NULL,
  `assoc_mem` varchar(50) NOT NULL,
  `local_tax` varchar(50) NOT NULL,
  `local_tax_date` date NOT NULL,
  `dd_license` varchar(50) NOT NULL,
  `dd_license_date` date NOT NULL,
  `dmf_scor` varchar(50) NOT NULL,
  `clanic_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `u_name`, `gender`, `u_email`, `u_pass`, `user_group`, `license_num`, `assoc_mem`, `local_tax`, `local_tax_date`, `dd_license`, `dd_license_date`, `dmf_scor`, `clanic_id`) VALUES
(1, 'Adnan Ali', 'm', 'adnan@gmail.com', 'c5b4490bb2e1039cc7c55dc178121de5', 'Dentist', '89993', '99399', '93943', '2018-09-18', '343433', '2018-09-18', 'fef', '1'),
(8, 'Adnan', 'm', 'adnanm@gmail.com', '479cf2a193c2334a4c804f5402723e06', 'Dentist', '90000', '32432', '88888', '2018-09-18', '888888', '2018-09-18', 'icdas_4-6', '1,3,6'),
(12, 'ARSLAN ALI', 'm', 'arslan@gmail.com', ' ', 'Dentist', '90000', '324324', '888888', '2018-10-23', '888888', '2018-10-23', 'icdas_4-6', '1,5'),
(14, 'Adnan Ali', 'm', 'adnan.qta2013@gmail.com', 'db7bcf2bebb57eee204d3bf044e489a6', 'Dentist', '90000', '324324', '888888', '2018-10-02', '888888', '2018-10-10', 'icdas_1-6', '1,3'),
(16, 'Dr Agha Muhammad Raza', 'm', 'doctorsmartpc@live.com', ' ', 'Dentist', ' ', ' ', ' ', '0000-00-00', ' ', '0000-00-00', ' ', '7'),
(17, 'Dr Muhammad Tariq', 'm', '123', ' ', 'Dentist', ' ', ' ', ' ', '0000-00-00', ' ', '0000-00-00', ' ', '1'),
(18, 'Dr Naila Amir', 'f', '04', ' ', 'Dentist', ' ', ' ', ' ', '0000-00-00', ' ', '0000-00-00', ' ', '1'),
(19, 'Dr Muhammad Nawaz', 'm', '05', ' ', 'Dentist', ' ', ' ', ' ', '0000-00-00', ' ', '0000-00-00', ' ', '1'),
(20, 'Dr Zer Khatoon', 'f', '09', ' ', 'Dentist', ' ', ' ', ' ', '0000-00-00', ' ', '0000-00-00', ' ', '2'),
(22, 'Dr Ambreen Mengal', 'f', '1234', ' ', 'Dentist', ' ', ' ', ' ', '0000-00-00', ' ', '0000-00-00', ' ', '7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `clinic_id` (`clinic_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `chief_complaint`
--
ALTER TABLE `chief_complaint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clanic`
--
ALTER TABLE `clanic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clanic_doctor`
--
ALTER TABLE `clanic_doctor`
  ADD PRIMARY KEY (`clanic_doctor_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material_by_amount`
--
ALTER TABLE `material_by_amount`
  ADD PRIMARY KEY (`by_amount_id`),
  ADD KEY `sub_attri_id` (`sub_attri_id`);

--
-- Indexes for table `material_by_length`
--
ALTER TABLE `material_by_length`
  ADD PRIMARY KEY (`material_length_id`),
  ADD KEY `sub_attri_id` (`sub_attri_id`);

--
-- Indexes for table `material_cat`
--
ALTER TABLE `material_cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `material_per_price`
--
ALTER TABLE `material_per_price`
  ADD PRIMARY KEY (`per_price_id`),
  ADD KEY `sub_attri_id` (`sub_attri_id`);

--
-- Indexes for table `material_subcat`
--
ALTER TABLE `material_subcat`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `material_sub_attri`
--
ALTER TABLE `material_sub_attri`
  ADD PRIMARY KEY (`sub_attri_id`),
  ADD KEY `sub_id` (`sub_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pre_cat`
--
ALTER TABLE `pre_cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `pre_desc`
--
ALTER TABLE `pre_desc`
  ADD PRIMARY KEY (`desc_id`),
  ADD KEY `sub_id` (`sub_id`);

--
-- Indexes for table `pre_subcat`
--
ALTER TABLE `pre_subcat`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `procedure_attribute`
--
ALTER TABLE `procedure_attribute`
  ADD PRIMARY KEY (`attri_id`),
  ADD KEY `procedure_subcat_id` (`procedure_subcat_id`);

--
-- Indexes for table `procedure_cat`
--
ALTER TABLE `procedure_cat`
  ADD PRIMARY KEY (`procedure_id`);

--
-- Indexes for table `procedure_multiple`
--
ALTER TABLE `procedure_multiple`
  ADD PRIMARY KEY (`multiple_id`),
  ADD KEY `attri_id` (`attri_id`);

--
-- Indexes for table `procedure_per_other`
--
ALTER TABLE `procedure_per_other`
  ADD PRIMARY KEY (`other_id`),
  ADD KEY `attri_id` (`attri_id`);

--
-- Indexes for table `procedure_per_proce`
--
ALTER TABLE `procedure_per_proce`
  ADD PRIMARY KEY (`per_procedure_id`),
  ADD KEY `attri_id` (`attri_id`);

--
-- Indexes for table `procedure_per_single`
--
ALTER TABLE `procedure_per_single`
  ADD PRIMARY KEY (`per_id`),
  ADD KEY `attri_id` (`attri_id`);

--
-- Indexes for table `procedure_subcat`
--
ALTER TABLE `procedure_subcat`
  ADD PRIMARY KEY (`procedure_subcat_id`),
  ADD KEY `procedure_id` (`procedure_id`);

--
-- Indexes for table `sign_symptom`
--
ALTER TABLE `sign_symptom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `chief_complaint`
--
ALTER TABLE `chief_complaint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `clanic`
--
ALTER TABLE `clanic`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `clanic_doctor`
--
ALTER TABLE `clanic_doctor`
  MODIFY `clanic_doctor_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `material_by_amount`
--
ALTER TABLE `material_by_amount`
  MODIFY `by_amount_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `material_by_length`
--
ALTER TABLE `material_by_length`
  MODIFY `material_length_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `material_cat`
--
ALTER TABLE `material_cat`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `material_per_price`
--
ALTER TABLE `material_per_price`
  MODIFY `per_price_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `material_subcat`
--
ALTER TABLE `material_subcat`
  MODIFY `sub_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `material_sub_attri`
--
ALTER TABLE `material_sub_attri`
  MODIFY `sub_attri_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pre_cat`
--
ALTER TABLE `pre_cat`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pre_desc`
--
ALTER TABLE `pre_desc`
  MODIFY `desc_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pre_subcat`
--
ALTER TABLE `pre_subcat`
  MODIFY `sub_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `procedure_attribute`
--
ALTER TABLE `procedure_attribute`
  MODIFY `attri_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `procedure_cat`
--
ALTER TABLE `procedure_cat`
  MODIFY `procedure_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `procedure_multiple`
--
ALTER TABLE `procedure_multiple`
  MODIFY `multiple_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `procedure_per_other`
--
ALTER TABLE `procedure_per_other`
  MODIFY `other_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `procedure_per_proce`
--
ALTER TABLE `procedure_per_proce`
  MODIFY `per_procedure_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `procedure_per_single`
--
ALTER TABLE `procedure_per_single`
  MODIFY `per_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `procedure_subcat`
--
ALTER TABLE `procedure_subcat`
  MODIFY `procedure_subcat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `sign_symptom`
--
ALTER TABLE `sign_symptom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`clinic_id`) REFERENCES `clanic` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_3` FOREIGN KEY (`id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `clanic_doctor`
--
ALTER TABLE `clanic_doctor`
  ADD CONSTRAINT `clanic_doctor_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clanic_doctor_ibfk_2` FOREIGN KEY (`id`) REFERENCES `clanic` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `material_by_amount`
--
ALTER TABLE `material_by_amount`
  ADD CONSTRAINT `material_by_amount_ibfk_1` FOREIGN KEY (`sub_attri_id`) REFERENCES `material_sub_attri` (`sub_attri_id`);

--
-- Constraints for table `material_by_length`
--
ALTER TABLE `material_by_length`
  ADD CONSTRAINT `material_by_length_ibfk_1` FOREIGN KEY (`sub_attri_id`) REFERENCES `material_sub_attri` (`sub_attri_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `material_per_price`
--
ALTER TABLE `material_per_price`
  ADD CONSTRAINT `material_per_price_ibfk_1` FOREIGN KEY (`sub_attri_id`) REFERENCES `material_sub_attri` (`sub_attri_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `material_subcat`
--
ALTER TABLE `material_subcat`
  ADD CONSTRAINT `material_subcat_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `material_cat` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `material_sub_attri`
--
ALTER TABLE `material_sub_attri`
  ADD CONSTRAINT `material_sub_attri_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `material_subcat` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pre_desc`
--
ALTER TABLE `pre_desc`
  ADD CONSTRAINT `pre_desc_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `pre_subcat` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pre_subcat`
--
ALTER TABLE `pre_subcat`
  ADD CONSTRAINT `pre_subcat_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `pre_cat` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `procedure_attribute`
--
ALTER TABLE `procedure_attribute`
  ADD CONSTRAINT `procedure_attribute_ibfk_1` FOREIGN KEY (`procedure_subcat_id`) REFERENCES `procedure_subcat` (`procedure_subcat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `procedure_multiple`
--
ALTER TABLE `procedure_multiple`
  ADD CONSTRAINT `procedure_multiple_ibfk_1` FOREIGN KEY (`attri_id`) REFERENCES `procedure_attribute` (`attri_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `procedure_per_other`
--
ALTER TABLE `procedure_per_other`
  ADD CONSTRAINT `procedure_per_other_ibfk_1` FOREIGN KEY (`attri_id`) REFERENCES `procedure_attribute` (`attri_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `procedure_per_proce`
--
ALTER TABLE `procedure_per_proce`
  ADD CONSTRAINT `procedure_per_proce_ibfk_1` FOREIGN KEY (`attri_id`) REFERENCES `procedure_attribute` (`attri_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `procedure_per_single`
--
ALTER TABLE `procedure_per_single`
  ADD CONSTRAINT `procedure_per_single_ibfk_1` FOREIGN KEY (`attri_id`) REFERENCES `procedure_attribute` (`attri_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `procedure_subcat`
--
ALTER TABLE `procedure_subcat`
  ADD CONSTRAINT `procedure_subcat_ibfk_1` FOREIGN KEY (`procedure_id`) REFERENCES `procedure_cat` (`procedure_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
