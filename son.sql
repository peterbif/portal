-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2019 at 04:12 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `son`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicant_nok`
--

CREATE TABLE `applicant_nok` (
  `applicant_nok_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `nsurname` varchar(100) NOT NULL,
  `nfirstname` varchar(100) NOT NULL,
  `ngender` varchar(10) DEFAULT NULL,
  `nrelationship` varchar(20) DEFAULT NULL,
  `ncontact_add` text NOT NULL,
  `nphone_no` varchar(20) NOT NULL,
  `nemail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicant_nok`
--

INSERT INTO `applicant_nok` (`applicant_nok_id`, `applicant_id`, `nsurname`, `nfirstname`, `ngender`, `nrelationship`, `ncontact_add`, `nphone_no`, `nemail`) VALUES
(2, 1165, 'Ogunbiyi', 'Omowo', '1', 'Brother', 'No 3 adeyemi Street', '08063124524', 'omolara@yahoo.com'),
(3, 1170, 'Adeola', 'Adeoye', '1', 'Brother', 'No 12 Kunle Fajuyi Road Bodija, Ibadan', '08023145698', 'adeola1234@yahoo.com'),
(4, 1171, 'OGEDDENGBE NOK', 'OGEDDENGBE NOK', '1', 'HUSBAND', '27, amadu bello way', '0805632420401', 'G@MAIL.COM'),
(5, 1174, 'Ojo', 'Adebola', '2', 'Mother', '27, amadu bello way', '08023451693', 'awodiya@yahoo.com'),
(6, 1175, 'Ogunleye', 'Samson', '1', 'Brother', '27, amadu bello way', '80812345678', 'ondog@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_ref`
--

CREATE TABLE `applicant_ref` (
  `applicant_ref_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `rsurname` varchar(100) NOT NULL,
  `rfirstname` varchar(100) NOT NULL,
  `rgender` varchar(10) DEFAULT NULL,
  `roccupation` varchar(250) NOT NULL,
  `rcontact_add` text NOT NULL,
  `rphone_no` varchar(20) NOT NULL,
  `remail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicant_ref`
--

INSERT INTO `applicant_ref` (`applicant_ref_id`, `applicant_id`, `rsurname`, `rfirstname`, `rgender`, `roccupation`, `rcontact_add`, `rphone_no`, `remail`) VALUES
(3, 1170, 'Ogunleye', 'Olorunda', '1', 'Civil Service/ Chief IT officer', '27, amadu bello way', '08023124596', 'olorunda23@gmail.com'),
(4, 1171, 'OGEDDENGBE REF', 'OGEDDENGBE REF', '1', 'P', '27, amadu bello way', '08032420401', 'A@GMAIL.COM'),
(5, 1174, 'oAdekola', 'Tope', '2', 'Nursing/Chief Nursing Officer', '27, amadu bello way', '08056234763', 'adekola@yahoo.com'),
(7, 1165, 'Ogunleye', 'Omo', '1', 'Civil Service/Chief IT officer', 'NO Adekemi Road', '08063452136', 'peter@yahoo.com'),
(8, 1165, 'Ogunleye', 'Omo', '2', 'Civil Service/Chief IT officer', 'NO Adekemi Road\'s road', '08063452136', 'peter@yahoo.com'),
(9, 1165, 'Akin', 'Alabi', '2', 'Chief Police Officer', '27, amadu bello way', '08023145698', 'alabi@yahoo.com'),
(10, 1175, 'Ajumobi', 'Isaiq', '1', 'Governor', '27, amadu bello way', '08085645564533', 'fdfdf@ggd.com');

-- --------------------------------------------------------

--
-- Table structure for table `application_edu`
--

CREATE TABLE `application_edu` (
  `application_edu_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `form_ref` varchar(20) NOT NULL,
  `session_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `exam_type` int(11) DEFAULT NULL,
  `exam_year` varchar(50) DEFAULT NULL,
  `subject_1` int(11) DEFAULT NULL,
  `grade_1` int(11) DEFAULT NULL,
  `subject_2` int(11) DEFAULT NULL,
  `grade_2` int(11) DEFAULT NULL,
  `subject_3` int(11) DEFAULT NULL,
  `grade_3` int(11) DEFAULT NULL,
  `subject_4` int(11) DEFAULT NULL,
  `grade_4` int(11) DEFAULT NULL,
  `subject_5` int(11) DEFAULT NULL,
  `grade_5` int(11) DEFAULT NULL,
  `subject_6` int(11) DEFAULT NULL,
  `grade_6` int(11) DEFAULT NULL,
  `subject_7` int(11) DEFAULT NULL,
  `grade_7` int(11) DEFAULT NULL,
  `subject_8` int(11) DEFAULT NULL,
  `grade_8` int(11) DEFAULT NULL,
  `subject_9` int(11) DEFAULT NULL,
  `grade_9` int(11) DEFAULT NULL,
  `jamb_score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE `awards` (
  `award_id` int(11) NOT NULL,
  `award` varchar(50) NOT NULL,
  `scholarship_details` text NOT NULL,
  `applicant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bio_data`
--

CREATE TABLE `bio_data` (
  `biodata_id` int(100) NOT NULL,
  `bsurname` varchar(250) NOT NULL,
  `bfirstname` varchar(250) NOT NULL,
  `bothername` varchar(250) DEFAULT NULL,
  `maiden_name` varchar(100) DEFAULT NULL,
  `date_of_birth` date NOT NULL,
  `bgender` varchar(10) NOT NULL,
  `bmarital_status` varchar(50) NOT NULL,
  `breligion_id` int(11) NOT NULL,
  `hobby` text NOT NULL,
  `applicant_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bio_data`
--

INSERT INTO `bio_data` (`biodata_id`, `bsurname`, `bfirstname`, `bothername`, `maiden_name`, `date_of_birth`, `bgender`, `bmarital_status`, `breligion_id`, `hobby`, `applicant_id`) VALUES
(3, 'Ogunleye', 'Peter', 'Omowonuola', 'Ogunsolu', '1989-03-15', '1', '2', 1, 'Reading And Playing Football', 1165),
(4, 'Ogunleye', 'Peter', 'Omo', 'ojo', '2004-06-09', '1', '2', 1, 'Reading and Playing Football', 1170),
(5, 'OGEDENGBE', 'IDOWU', 'Omowonuola', '', '2019-02-22', '1', '2', 1, 'Reading', 1171),
(6, 'Awodiya', 'Ronke', 'Oluyemisi', 'ojo', '1995-07-14', '2', '2', 1, 'Reading and Playing Football', 1174),
(7, 'Ogunleye', 'Peter', 'Omo', 'Ukpeye', '1987-06-23', '1', '1', 1, 'Reading', 1175);

-- --------------------------------------------------------

--
-- Table structure for table `capture`
--

CREATE TABLE `capture` (
  `id` int(100) NOT NULL,
  `applicant_id` int(100) NOT NULL,
  `capture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `capture`
--

INSERT INTO `capture` (`id`, `applicant_id`, `capture`) VALUES
(43, 1170, '13347.jpg'),
(44, 1171, '282426.jpg'),
(45, 1174, '637235.jpg'),
(46, 1175, '963782.jpg'),
(48, 1165, '57622986.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact_add`
--

CREATE TABLE `contact_add` (
  `contact_add_id` int(100) NOT NULL,
  `street_add2` varchar(250) NOT NULL,
  `city` varchar(255) NOT NULL,
  `lg_of_origin` int(11) NOT NULL,
  `state_of_origin` int(11) NOT NULL,
  `applicant_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_add`
--

INSERT INTO `contact_add` (`contact_add_id`, `street_add2`, `city`, `lg_of_origin`, `state_of_origin`, `applicant_id`) VALUES
(1, 'No 23 Adeyemi\' Street Adekunle\'s Way', 'Ibadan', 587, 2, 1165),
(2, '27, Amadu Bello Way', 'Ilorin', 485, 14, 1170),
(3, '27, Amadu Bello Way', 'Ilorin', 485, 14, 1171),
(4, '27, Amadu Bello Way', 'Ilorin', 485, 14, 1174),
(5, '27, Amadu Bello Way', 'Ilorin', 485, 14, 1175);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL,
  `country` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `country`) VALUES
(1, 'Afghanistan'),
(2, 'Albania'),
(3, 'Algeria'),
(4, 'Andorra'),
(5, 'Angola'),
(6, 'Antigua And Barbuda'),
(7, 'Argentina'),
(8, 'Armenia'),
(9, 'Aruba'),
(10, 'Australia'),
(11, 'Austria'),
(12, 'Azerbaijan'),
(13, 'Bahamas, The'),
(14, 'Bahrain'),
(15, 'Bangladesh'),
(16, 'Barbados'),
(17, 'Belarus'),
(18, 'Belgium'),
(19, 'Belize'),
(20, 'Benin'),
(21, 'Bhutan'),
(22, 'Bolivia'),
(23, 'Bosnia And Herzegovina'),
(24, 'Botswana'),
(25, 'Brazil'),
(26, 'Brunei'),
(27, 'Bulgaria'),
(28, 'Burkina Faso'),
(29, 'Burma'),
(30, 'Burundi'),
(31, 'Cambodia'),
(32, 'Cameroon'),
(33, 'Canada'),
(34, 'Cabo Verde'),
(35, 'Central African Republic'),
(36, 'Chad'),
(37, 'Chile'),
(38, 'China'),
(39, 'Colombia'),
(40, 'Comoros'),
(41, 'Democratic Republic  Congo'),
(42, ' Republic Congo'),
(43, 'Costa Rica'),
(44, 'Croatia'),
(45, 'Cuba'),
(46, 'Curacao'),
(47, 'Cyprus'),
(48, 'Czechia'),
(49, 'Denmark'),
(50, 'Djibouti'),
(51, 'Dominica'),
(52, 'Dominican Republic'),
(53, 'Egypt'),
(54, 'El Salvador'),
(55, 'Equatorial Guinea'),
(56, 'Eritrea'),
(57, 'Estonia'),
(58, 'Eswatini'),
(59, 'Ethiopia'),
(60, 'Fiji'),
(61, 'Finland'),
(62, 'France'),
(64, 'Top Of Page'),
(65, 'Gabon'),
(66, 'Gambia, The'),
(67, 'Georgia'),
(68, 'Germany'),
(69, 'Ghana'),
(70, 'Greece'),
(71, 'Grenada'),
(72, 'Guatemala'),
(73, 'Guinea'),
(74, 'Guinea-Bissau'),
(75, 'Guyana'),
(76, 'Haiti'),
(77, 'Holy See'),
(78, 'Honduras'),
(79, 'Hong Kong'),
(80, 'Hungary'),
(81, 'Ireland'),
(82, 'Israel'),
(83, 'Italy'),
(84, 'Jamaica'),
(85, 'Japan'),
(86, 'Jordan'),
(87, 'Kazakhstan'),
(88, 'Kenya'),
(89, 'Kiribati'),
(90, 'Korea, North'),
(91, 'Korea, South'),
(92, 'Kosovo'),
(93, 'Kuwait'),
(94, 'Kyrgyzstan'),
(95, 'Laos'),
(96, 'Latvia'),
(97, 'Lebanon'),
(98, 'Lesotho'),
(99, 'Liberia'),
(100, 'Libya'),
(101, 'Liechtenstein'),
(102, 'Lithuania'),
(103, 'Luxembourg'),
(104, 'Macau'),
(105, 'Macedonia'),
(106, 'Madagascar'),
(107, 'Malawi'),
(108, 'Malaysia'),
(109, 'Maldives'),
(110, 'Mali'),
(111, 'Malta'),
(112, 'Marshall Islands'),
(113, 'Mauritania'),
(114, 'Mauritius'),
(115, 'Mexico'),
(116, 'Micronesia'),
(117, 'Moldova'),
(118, 'Monaco'),
(119, 'Mongolia'),
(120, 'Montenegro'),
(121, 'Morocco'),
(122, 'Mozambique'),
(124, 'Namibia'),
(125, 'Nauru'),
(126, 'Nepal'),
(127, 'Netherlands'),
(128, 'New Zealand'),
(129, 'Nicaragua'),
(130, 'Niger'),
(131, 'Nigeria'),
(132, 'North Korea'),
(133, 'Norway'),
(134, 'Oman'),
(135, 'Pakistan'),
(136, 'Palau'),
(137, 'Palestinian Territories'),
(138, 'Panama'),
(139, 'Papua New Guinea'),
(140, 'Paraguay'),
(141, 'Peru'),
(142, 'Philippines'),
(143, 'Poland'),
(144, 'Portugal'),
(145, 'Qatar'),
(146, 'Romania'),
(147, 'Russia'),
(148, 'Rwanda'),
(149, 'Saint Kitts And Nevis'),
(150, 'Saint Lucia'),
(151, 'Saint Vincent And The Grenadines'),
(152, 'Samoa'),
(153, 'San Marino'),
(154, 'Sao Tome And Principe'),
(155, 'Saudi Arabia'),
(156, 'Senegal'),
(157, 'Serbia'),
(158, 'Seychelles'),
(159, 'Sierra Leone'),
(160, 'Singapore'),
(161, 'Sint Maarten'),
(162, 'Slovakia'),
(163, 'Slovenia'),
(164, 'Solomon Islands'),
(165, 'Somalia'),
(166, 'South Africa'),
(167, 'South Korea'),
(168, 'South Sudan'),
(169, 'Spain'),
(170, 'Sri Lanka'),
(171, 'Sudan'),
(172, 'Suriname'),
(173, 'Swaziland (See Eswatini)'),
(174, 'Sweden'),
(175, 'Switzerland'),
(176, 'Syria'),
(177, 'Taiwan'),
(178, 'Tajikistan'),
(179, 'Tanzania'),
(180, 'Thailand'),
(181, 'Timor-Leste'),
(182, 'Togo'),
(183, 'Tonga'),
(184, 'Trinidad And Tobago'),
(185, 'Tunisia'),
(186, 'Turkey'),
(187, 'Turkmenistan'),
(188, 'Tuvalu'),
(189, 'Uganda'),
(190, 'Ukraine'),
(191, 'United Arab Emirates'),
(192, 'United Kingdom'),
(193, 'Uruguay'),
(194, 'Uzbekistan'),
(195, 'Vanuatu'),
(196, 'Venezuela'),
(197, 'Vietnam'),
(198, 'Yemen'),
(199, 'Zambia'),
(200, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `credit_passes`
--

CREATE TABLE `credit_passes` (
  `credit_passes_id` int(11) NOT NULL,
  `credit_passes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credit_passes`
--

INSERT INTO `credit_passes` (`credit_passes_id`, `credit_passes`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `education_id` int(11) NOT NULL,
  `school_name` varchar(250) NOT NULL,
  `ecourse` varchar(250) NOT NULL,
  `equalification` varchar(100) NOT NULL,
  `reg_no` varchar(100) DEFAULT NULL,
  `yearf` varchar(20) NOT NULL,
  `yeart` varchar(20) NOT NULL,
  `applicant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`education_id`, `school_name`, `ecourse`, `equalification`, `reg_no`, `yearf`, `yeart`, `applicant_id`) VALUES
(5, 'NOUN\'s School ', 'Nursing', 'B.science', '458967', '2006', '2012', 1165),
(8, 'ST Luke College', 'Leaving School Cert.', 'WASSCE', NULL, '1991', '1997', 1170),
(9, 'National Open University Of Nigeria', 'Communication Technology', 'B. Sc.', NULL, '2006', '2012', 1170),
(10, 'Loyola College Ibadan', 'O Level', 'WASSCE', NULL, '1999', '2011', 1174),
(11, 'School Of Nursing UCH', 'General Nursing', 'RN', NULL, '2000', '2003', 1174),
(13, 'UI', 'Info Tech', 'B.sc.', '4563245', '2011', '2015', 1165),
(14, 'University Of Ibadan', 'Preoperative Nursing', 'RN', '56234', '2001', '2003', 1165),
(15, 'Ibadan Grammar School', '', 'WASSCE', '', '2011', '2017', 1175);

-- --------------------------------------------------------

--
-- Table structure for table `exam_type`
--

CREATE TABLE `exam_type` (
  `exam_type_id` int(11) NOT NULL,
  `exam_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_type`
--

INSERT INTO `exam_type` (`exam_type_id`, `exam_type`) VALUES
(5, 'NABTEB May/June'),
(6, 'NABTEB Nove/Dec'),
(3, 'NECO May/June'),
(4, 'NECO Nov/Dec'),
(1, 'WASSCE May/June'),
(2, 'WASSCE Nov/Dec');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `gender_id` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`gender_id`, `gender`) VALUES
(2, 'Female'),
(1, 'Male'),
(3, 'others');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `grade_id` int(11) NOT NULL,
  `grade` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`grade_id`, `grade`) VALUES
(1, 'A1'),
(21, 'A2'),
(22, 'A3'),
(19, 'Awaiting Result (AR)'),
(2, 'B2'),
(3, 'B3'),
(4, 'C4'),
(5, 'C5'),
(6, 'C6'),
(7, 'D7'),
(8, 'E8'),
(9, 'F9'),
(10, 'N/A'),
(27, 'None'),
(23, 'P7'),
(24, 'P8');

-- --------------------------------------------------------

--
-- Table structure for table `local_govt`
--

CREATE TABLE `local_govt` (
  `lg_id` int(11) NOT NULL,
  `lg_name` varchar(100) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `local_govt`
--

INSERT INTO `local_govt` (`lg_id`, `lg_name`, `state_id`) VALUES
(1, 'Gwagwalada', 39),
(2, 'Kuje', 39),
(3, 'Abaji', 39),
(4, 'Abuja Municipal', 39),
(5, 'Bwari', 39),
(6, 'Kwali', 39),
(7, 'Aba North', 18),
(8, 'Aba South', 18),
(9, 'Arochukwu', 18),
(10, 'Bende', 18),
(11, 'Ikwuano', 18),
(12, 'Isiala-Ngwa North', 18),
(13, 'Isiala-Ngwa South', 18),
(14, 'Isuikwato', 18),
(15, 'Obi Nwa', 18),
(16, 'Ohafia', 18),
(17, 'Osisioma', 18),
(18, 'Ngwa', 18),
(19, 'Ugwunagbo', 18),
(20, 'Ukwa East', 18),
(21, 'Ukwa West', 18),
(22, 'Umuahia North', 18),
(23, 'Umuahia South', 18),
(24, 'Umu-Neochi', 18),
(25, 'Demsa', 8),
(26, 'Fufore', 8),
(27, 'Ganaye', 8),
(28, 'Gireri', 8),
(29, 'Gombi', 8),
(30, 'Guyuk', 8),
(31, 'Hong', 8),
(32, 'Jada', 8),
(33, 'Lamurde', 8),
(34, 'Madagali', 8),
(35, 'Maiha', 8),
(36, 'Mayo-Belwa', 8),
(37, 'Michika', 8),
(38, 'Mubi North', 8),
(39, 'Mubi South', 8),
(40, 'Numan', 8),
(41, 'Shelleng', 8),
(42, 'Song', 8),
(43, 'Toungo', 8),
(44, 'Yola North', 8),
(45, 'Yola South', 8),
(46, 'Abak', 19),
(47, 'Eastern Obolo', 19),
(48, 'Eket', 19),
(49, 'Esit Eket', 19),
(50, 'Essien Udim', 19),
(51, 'Etim Ekpo', 19),
(52, 'Etinan', 19),
(53, 'Ibeno', 19),
(54, 'Ibesikpo Asutan', 19),
(55, 'Ibiono Ibom', 19),
(56, 'Ika', 19),
(57, 'Ikono', 19),
(58, 'Ikot Abasi', 19),
(59, 'Ikot Ekpene', 19),
(60, 'Ini', 19),
(61, 'Itu', 19),
(62, 'Mbo', 19),
(63, 'Mkpat Enin', 19),
(64, 'Nsit Atai', 19),
(65, 'Nsit Ibom', 19),
(66, 'Nsit Ubium', 19),
(67, 'Obot Akara', 19),
(68, 'Okobo', 19),
(69, 'Onna', 19),
(70, 'Oron', 19),
(71, 'Oruk Anam', 19),
(72, 'Udung Uko', 19),
(73, 'Ukanafun', 19),
(74, 'Uruan', 19),
(75, 'Urue-Offong/Oruko', 19),
(76, 'Uyo', 19),
(77, 'Aguata', 8),
(78, 'Anambra East', 8),
(79, 'Anambra West', 8),
(80, 'Anaocha', 8),
(81, 'Awka North', 8),
(82, 'Awka South', 8),
(83, 'Ayamelum', 8),
(84, 'Dunukofia', 8),
(85, 'Ekwusigo', 8),
(86, 'Idemili North', 8),
(87, 'Idemili south', 8),
(88, 'Ihiala', 8),
(89, 'Njikoka', 8),
(90, 'Nnewi North', 8),
(91, 'Nnewi South', 8),
(92, 'Ogbaru', 8),
(93, 'Onitsha North', 8),
(94, 'Onitsha South', 8),
(95, 'Orumba North', 8),
(96, 'Orumba South', 8),
(97, 'Oyi', 8),
(98, 'Alkaleri', 20),
(99, 'Bauchi', 20),
(100, 'Bogoro', 20),
(101, 'Damban', 20),
(102, 'Darazo', 20),
(103, 'Dass', 20),
(104, 'Ganjuwa', 20),
(105, 'Giade', 20),
(106, 'Itas/Gadau', 20),
(107, 'Jama\'are', 20),
(108, 'Katagum', 20),
(109, 'Kirfi', 20),
(110, 'Misau', 20),
(111, 'Ningi', 20),
(112, 'Shira', 20),
(113, 'Tafawa-Balewa', 20),
(114, 'Toro', 20),
(115, 'Warji', 20),
(116, 'Zaki', 20),
(117, 'Brass', 7),
(118, 'Ekeremor', 7),
(119, 'Kolokuma/Opokuma', 7),
(120, 'Nembe', 7),
(121, 'Ogbia', 7),
(122, 'Sagbama', 7),
(123, 'Southern Jaw', 7),
(124, 'Yenegoa', 7),
(125, 'Ado', 13),
(126, 'Agatu', 13),
(127, 'Apa', 13),
(128, 'Buruku', 13),
(129, 'Gboko', 13),
(130, 'Guma', 13),
(131, 'Gwer East', 13),
(132, 'Gwer West', 13),
(133, 'Katsina-Ala', 13),
(134, 'Konshisha', 13),
(135, 'Kwande', 13),
(136, 'Logo', 13),
(137, 'Makurdi', 13),
(138, 'Obi', 13),
(139, 'Ogbadibo', 13),
(140, 'Oju', 13),
(141, 'Okpokwu', 13),
(142, 'Ohimini', 13),
(143, 'Oturkpo', 13),
(144, 'Tarka', 13),
(145, 'Ukum', 13),
(146, 'Ushongo', 13),
(147, 'Vandeikya', 13),
(148, 'Abadam', 21),
(149, 'Askira/Uba', 21),
(150, 'Bama', 21),
(151, 'Bayo', 21),
(152, 'Biu', 21),
(153, 'Chibok', 21),
(154, 'Damboa', 21),
(155, 'Dikwa', 21),
(156, 'Gubio', 21),
(157, 'Guzamala', 21),
(158, 'Gwoza', 21),
(159, 'Hawul', 21),
(160, 'Jere', 21),
(161, 'Kaga', 21),
(162, 'Kala/Balge', 21),
(163, 'Konduga', 21),
(164, 'Kukawa', 21),
(165, 'Kwaya Kusar', 21),
(166, 'Mafa', 21),
(167, 'Magumeri', 21),
(168, 'Maiduguri', 21),
(169, 'Marte', 21),
(170, 'Mobbar', 21),
(171, 'Monguno', 21),
(172, 'Ngala', 21),
(173, 'Nganzai', 21),
(174, 'Shani', 21),
(175, 'Akpabuyo', 17),
(176, 'Odukpani', 17),
(177, 'Akamkpa', 17),
(178, 'Biase', 17),
(179, 'Abi', 17),
(180, 'Ikom', 17),
(181, 'Yarkur', 17),
(182, 'Odubra', 17),
(183, 'Boki', 17),
(184, 'Ogoja', 17),
(185, 'Yala', 17),
(186, 'Obanliku', 17),
(187, 'Obudu', 17),
(188, 'Calabar South', 17),
(189, 'Etung', 17),
(190, 'Bekwara', 17),
(191, 'Bakassi', 17),
(192, 'Calabar Municipality', 17),
(193, 'Oshimili', 22),
(194, 'Aniocha', 22),
(195, 'Aniocha South', 22),
(196, 'Ika South', 22),
(197, 'Ika North-East', 22),
(198, 'Ndokwa West', 22),
(199, 'Ndokwa East', 22),
(200, 'Isoko south', 22),
(201, 'Isoko North', 22),
(202, 'Bomadi', 22),
(203, 'Burutu', 22),
(204, 'Ughelli South', 22),
(205, 'Ughelli North', 22),
(206, 'Ethiope West', 22),
(207, 'Ethiope East', 22),
(208, 'Sapele', 22),
(209, 'Okpe', 22),
(210, 'Warri North', 22),
(211, 'Warri South', 22),
(212, 'Uvwie', 22),
(213, 'Udu', 22),
(214, 'Warri Central', 22),
(215, 'Ukwani', 22),
(216, 'Oshimili North', 22),
(217, 'Patani', 22),
(218, 'Afikpo South', 23),
(219, 'Afikpo North', 23),
(220, 'Onicha', 23),
(221, 'Ohaozara', 23),
(222, 'Abakaliki', 23),
(223, 'Ishielu', 23),
(224, 'lkwo', 23),
(225, 'Ezza', 23),
(226, 'Ezza South', 23),
(227, 'Ohaukwu', 23),
(228, 'Ebonyi', 23),
(229, 'Ivo?', 23),
(230, 'Esan North-East', 10),
(231, 'Esan Central', 10),
(232, 'Esan West', 10),
(233, 'Egor', 10),
(234, 'Ukpoba', 10),
(235, 'Central', 10),
(236, 'Etsako Central', 10),
(237, 'Igueben', 10),
(238, 'Oredo', 10),
(239, 'Ovia SouthWest', 10),
(240, 'Ovia South-East', 10),
(241, 'Orhionwon', 10),
(242, 'Uhunmwonde', 10),
(243, 'Etsako East', 10),
(244, 'Esan South-East', 10),
(245, 'Ado', 9),
(246, 'Ekiti-East', 9),
(247, 'Ekiti-West', 9),
(248, 'Emure/Ise/Orun', 9),
(249, 'Ekiti South-West', 9),
(250, 'Ikare', 9),
(251, 'Irepodun', 9),
(252, 'Ijero', 9),
(253, 'Ido/Osi', 9),
(254, 'Oye', 9),
(255, 'Ikole', 9),
(256, 'Moba', 9),
(257, 'Gbonyin', 9),
(258, 'Efon', 9),
(259, 'Ise/Orun', 9),
(260, 'Ilejemeje.', 9),
(261, 'Enugu South', 24),
(262, 'Igbo-Eze South', 24),
(263, 'Enugu North', 24),
(264, 'Nkanu', 24),
(265, 'Udi Agwu', 24),
(266, 'Oji-River', 24),
(267, 'Ezeagu', 24),
(268, 'IgboEze North', 24),
(269, 'Isi-Uzo', 24),
(270, 'Nsukka', 24),
(271, 'Igbo-Ekiti', 24),
(272, 'Uzo-Uwani', 24),
(273, 'Enugu Eas', 24),
(274, 'Aninri', 24),
(275, 'Nkanu East', 24),
(276, 'Udenu', 24),
(277, 'Akko', 25),
(278, 'Balanga', 25),
(279, 'Billiri', 25),
(280, 'Dukku', 25),
(281, 'Kaltungo', 25),
(282, 'Kwami', 25),
(283, 'Shomgom', 25),
(284, 'Funakaye', 25),
(285, 'Gombe', 25),
(286, 'Nafada/Bajoga', 25),
(287, 'Yamaltu/Delta', 25),
(288, 'Aboh-Mbaise', 15),
(289, 'Ahiazu-Mbaise', 15),
(290, 'Ehime-Mbano', 15),
(291, 'Ezinihitte', 15),
(292, 'Ideato North', 15),
(293, 'Ideato South', 15),
(294, 'Ihitte/Uboma', 15),
(295, 'Ikeduru', 15),
(296, 'Isiala Mbano', 15),
(297, 'Isu', 15),
(298, 'Mbaitoli', 15),
(299, 'Mbaitoli', 15),
(300, 'Ngor-Okpala', 15),
(301, 'Njaba', 15),
(302, 'Nwangele', 15),
(303, 'Nkwerre', 15),
(304, 'Obowo', 15),
(305, 'Oguta', 15),
(306, 'Ohaji/Egbema', 15),
(307, 'Okigwe', 15),
(308, 'Orlu', 15),
(309, 'Orsu', 15),
(310, 'Oru East', 15),
(311, 'Oru West', 15),
(312, 'Owerri-Municipal', 15),
(313, 'Owerri North', 15),
(314, 'Owerri West', 15),
(315, 'Auyo', 26),
(316, 'Babura', 26),
(317, 'Birni Kudu', 26),
(318, 'Biriniwa', 26),
(319, 'Buji', 26),
(320, 'Dutse', 26),
(321, 'Gagarawa', 26),
(322, 'Garki', 26),
(323, 'Gumel', 26),
(324, 'Guri', 26),
(325, 'Gwaram', 26),
(326, 'Gwiwa', 26),
(327, 'Hadejia', 26),
(328, 'Jahun', 26),
(329, 'Kafin Hausa', 26),
(330, 'Kaugama Kazaure', 26),
(331, 'Kiri Kasamma', 26),
(332, 'Kiyawa', 26),
(333, 'Maigatari', 26),
(334, 'Malam Madori', 26),
(335, 'Miga', 26),
(336, 'Ringim', 26),
(337, 'Roni', 26),
(338, 'Sule-Tankarkar', 26),
(339, 'Taura', 26),
(340, 'Yankwashi', 26),
(341, 'Birni-Gwari', 27),
(342, 'Chikun', 27),
(343, 'Giwa', 27),
(344, 'Igabi', 27),
(345, 'Ikara', 27),
(346, 'jaba', 27),
(347, 'Jema\'a', 27),
(348, 'Kachia', 27),
(349, 'Kaduna North', 27),
(350, 'Kaduna South', 27),
(351, 'Kagarko', 27),
(352, 'Kajuru', 27),
(353, 'Kaura', 27),
(354, 'Kauru', 27),
(355, 'Kubau', 27),
(356, 'Kudan', 27),
(357, 'Lere', 27),
(358, 'Makarfi', 27),
(359, 'Sabon-Gari', 27),
(360, 'Sanga', 27),
(361, 'Soba', 27),
(362, 'Zango-Kataf', 27),
(363, 'Zaria', 27),
(364, 'Ajingi', 6),
(365, 'Albasu', 6),
(366, 'Bagwai', 6),
(367, 'Bebeji', 6),
(368, 'Bichi', 6),
(369, 'Bunkure', 6),
(370, 'Dala', 6),
(371, 'Dambatta', 6),
(372, 'Dawakin Kudu', 6),
(373, 'Dawakin Tofa', 6),
(374, 'Doguwa', 6),
(375, 'Fagge', 6),
(376, 'Gabasawa', 6),
(377, 'Garko', 6),
(378, 'Garum', 6),
(379, 'Mallam', 6),
(380, 'Gaya', 6),
(381, 'Gezawa', 6),
(382, 'Gwale', 6),
(383, 'Gwarzo', 6),
(384, 'Kabo', 6),
(385, 'Kano Municipal', 6),
(386, 'Karaye', 6),
(387, 'Kibiya', 6),
(388, 'Kiru', 6),
(389, 'kumbotso', 6),
(390, 'Kunchi', 6),
(391, 'Kura', 6),
(392, 'Madobi', 6),
(393, 'Makoda', 6),
(394, 'Minjibir', 6),
(395, 'Nasarawa', 6),
(396, 'Rano', 6),
(397, 'Rimin Gado', 6),
(398, 'Rogo', 6),
(399, 'Shanono', 6),
(400, 'Sumaila', 6),
(401, 'Takali', 6),
(402, 'Tarauni', 6),
(403, 'Tofa', 6),
(404, 'Tsanyawa', 6),
(405, 'Tudun Wada', 6),
(406, 'Ungogo', 6),
(407, 'Warawa', 6),
(408, 'Wudil', 6),
(409, 'Bakori', 28),
(410, 'Batagarawa', 28),
(411, 'Batsari', 28),
(412, 'Baure', 28),
(413, 'Bindawa', 28),
(414, 'Charanchi', 28),
(415, 'Dandume', 28),
(416, 'Danja', 28),
(417, 'Dan Musa', 28),
(418, 'Daura', 28),
(419, 'Dutsi', 28),
(420, 'Dutsin-Ma', 28),
(421, 'Faskari', 28),
(422, 'Funtua', 28),
(423, 'Ingawa', 28),
(424, 'Jibia', 28),
(425, 'Kafur', 28),
(426, 'Kaita', 28),
(427, 'Kankara', 28),
(428, 'Kankia', 28),
(429, 'Katsina', 28),
(430, 'Kurfi', 28),
(431, 'Kusada', 28),
(432, 'Mai\'Adua', 28),
(433, 'Malumfashi', 28),
(434, 'Mani', 28),
(435, 'Mashi', 28),
(436, 'Matazuu', 28),
(437, 'Musawa', 28),
(438, 'Rimi', 28),
(439, 'Sabuwa', 28),
(440, 'Safana', 28),
(441, 'Sandamu', 28),
(442, 'Zango', 28),
(443, 'Aleiro', 29),
(444, 'Arewa-Dandi', 29),
(445, 'Argungu', 29),
(446, 'Augie', 29),
(447, 'Bagudo', 29),
(448, 'Birnin Kebbi', 29),
(449, 'Bunza', 29),
(450, 'Dandi', 29),
(451, 'Fakai', 29),
(452, 'Gwandu', 29),
(453, 'Jega', 29),
(454, 'Kalgo', 29),
(455, 'Koko/Besse', 29),
(456, 'Maiyama', 29),
(457, 'Ngaski', 29),
(458, 'Sakaba', 29),
(459, 'Shanga', 29),
(460, 'Suru', 29),
(461, 'Wasagu/Danko', 29),
(462, 'Yauri', 29),
(463, 'Zuru', 29),
(464, 'Adavi', 30),
(465, 'Ajaokuta', 30),
(466, 'Ankpa', 30),
(467, 'Bassa', 30),
(468, 'Dekina', 30),
(469, 'Ibaji', 30),
(470, 'Idah', 30),
(471, 'Igalamela-Odolu', 30),
(472, 'Ijumu', 30),
(473, 'Kabba/Bunu', 30),
(474, 'Kogi', 30),
(475, 'Lokoja', 30),
(476, 'Mopa-Muro', 30),
(477, 'Ofu', 30),
(478, 'Ogori/Mangongo', 30),
(479, 'Okehi', 30),
(480, 'Okene', 30),
(481, 'Olamabolo', 30),
(482, 'Omala', 30),
(483, 'Yagba East', 30),
(484, 'Yagba West', 30),
(485, 'Asa', 14),
(486, 'Baruten', 14),
(487, 'Edu', 14),
(488, 'Ekiti', 14),
(489, 'Ifelodun', 14),
(490, 'Ilorin East', 14),
(491, 'Ilorin West', 14),
(492, 'Irepodun', 14),
(493, 'Isin', 14),
(494, 'Kaiama', 14),
(495, 'Moro', 14),
(496, 'Offa', 14),
(497, 'Oke-Ero', 14),
(498, 'Oyun', 14),
(499, 'Pategi', 14),
(500, 'Akwanga', 31),
(501, 'Awe', 31),
(502, 'Doma', 31),
(503, 'Karu', 31),
(504, 'Keana', 31),
(505, 'Keffi', 31),
(506, 'Kokona', 31),
(507, 'Lafia', 31),
(508, 'Nasarawa', 31),
(509, 'Nasarawa-Eggon', 31),
(510, 'Obi', 31),
(511, 'Toto', 31),
(512, 'Wamba', 31),
(513, 'Agaie', 32),
(514, 'Agwara', 32),
(515, 'Bida', 32),
(516, 'Borgu', 32),
(517, 'Bosso', 32),
(518, 'Chanchaga', 32),
(519, 'Edati', 32),
(520, 'Gbako', 32),
(521, 'Gurara', 32),
(522, 'Katcha', 32),
(523, 'Kontagora', 32),
(524, 'Lapai', 32),
(525, 'Lavun', 32),
(526, 'Magama', 32),
(527, 'Mariga', 32),
(528, 'Mashegu', 32),
(529, 'Mokwa', 32),
(530, 'Muya', 32),
(531, 'Pailoro', 32),
(532, 'Rafi', 32),
(533, 'Rijau', 32),
(534, 'Shiroro', 32),
(535, 'Suleja', 32),
(536, 'Tafa', 32),
(537, 'Wushishi', 32),
(538, 'Akoko North East', 12),
(539, 'Akoko North West', 12),
(540, 'Akoko South East', 12),
(541, 'Akoko South West', 12),
(542, 'Akure North', 12),
(543, 'Akure South', 12),
(544, 'Ese-Odo', 12),
(545, 'Idanre', 12),
(546, 'Ifedore', 12),
(547, 'Ilaje', 12),
(548, 'Ile-Oluji', 12),
(549, 'Okeigbo', 12),
(550, 'Irele', 12),
(551, 'Odigbo', 12),
(552, 'Okitipupa', 12),
(553, 'Ondo East', 12),
(554, 'Ondo West', 12),
(555, 'Ose', 12),
(556, 'Owo', 12),
(557, 'Aiyedade', 11),
(558, 'Aiyedire', 11),
(559, 'Atakumosa East', 11),
(560, 'Atakumosa West', 11),
(561, 'Boluwaduro', 11),
(562, 'Boripe', 11),
(563, 'Ede North', 11),
(564, 'Ede South', 11),
(565, 'Egbedore', 11),
(566, 'Ejigbo', 11),
(567, 'Ife Central', 11),
(568, 'Ife East', 11),
(569, 'Ife North', 11),
(570, 'Ife South', 11),
(571, 'Ifedayo', 11),
(572, 'Ifelodun', 11),
(573, 'Ila', 11),
(574, 'Ilesha East', 11),
(575, 'Ilesha West', 11),
(576, 'Irepodun', 11),
(577, 'Irewole', 11),
(578, 'Isokan', 11),
(579, 'Iwo', 11),
(580, 'Obokun', 11),
(581, 'Odo-Otin', 11),
(582, 'Ola-Oluwa', 11),
(583, 'Olorunda', 11),
(584, 'Oriade', 11),
(585, 'Orolu', 11),
(586, 'Osogbo', 11),
(587, 'Afijio', 2),
(588, 'Akinyele', 2),
(589, 'Atiba', 2),
(590, 'Atigbo', 2),
(591, 'Egbeda', 2),
(592, 'Ibadan North East', 2),
(593, 'Ibadan North', 2),
(594, 'Ibadan North West', 2),
(595, 'Ibadan South East', 2),
(596, 'Ibadan South West', 2),
(597, 'Ibarapa Central', 2),
(598, 'Ibarapa East', 2),
(599, 'Ibarapa North', 2),
(600, 'Ido', 2),
(601, 'Irepo', 2),
(602, 'Iseyin', 2),
(603, 'Itesiwaju', 2),
(604, 'Iwajowa', 2),
(605, 'Kajola', 2),
(606, 'Lagelu Ogbomosho North', 2),
(607, 'Ogbmosho South', 2),
(608, 'Ogo Oluwa', 2),
(609, 'Olorunsogo', 2),
(610, 'Oluyole', 2),
(611, 'Ona-Ara', 2),
(612, 'Orelope', 2),
(613, 'Ori Ire', 2),
(614, 'Oyo East', 2),
(615, 'Oyo West', 2),
(616, 'Saki East', 2),
(617, 'Saki West', 2),
(618, 'Surulere', 2),
(619, 'Barikin Ladi', 33),
(620, 'Bassa', 33),
(621, 'Bokkos', 33),
(622, 'Jos East', 33),
(623, 'Jos North', 33),
(624, 'Jos South', 33),
(625, 'Kanam', 33),
(626, 'Kanke', 33),
(627, 'Langtang North', 33),
(628, 'Langtang South', 33),
(629, 'Mangu', 33),
(630, 'Mikang', 33),
(631, 'Pankshin', 33),
(632, 'Qua\'an Pan', 33),
(633, 'Riyom', 33),
(634, 'Shendam', 33),
(635, 'Wase', 33),
(636, 'Abua/Odual', 34),
(637, 'Ahoada East', 34),
(638, 'Ahoada West', 34),
(639, 'Akuku Toru', 34),
(640, 'Andoni', 34),
(641, 'Asari-Toru', 34),
(642, 'Bonny', 34),
(643, 'Degema', 34),
(644, 'Emohua', 34),
(645, 'Eleme', 34),
(646, 'Etche', 34),
(647, 'Gokana', 34),
(648, 'Ikwerre', 34),
(649, 'Khana', 34),
(650, 'Obia/Akpor', 34),
(651, 'Ogba/Egbema/Ndoni', 34),
(652, 'Ogu/Bolo', 34),
(653, 'Okrika', 34),
(654, 'Omumma', 34),
(655, 'Opobo/Nkoro', 34),
(656, 'Oyigbo', 34),
(657, 'Port-Harcourt', 34),
(658, 'Tai?', 34),
(659, 'Binji', 35),
(660, 'Bodinga', 35),
(661, 'Dange-shnsi', 35),
(662, 'Gada', 35),
(663, 'Goronyo', 35),
(664, 'Gudu', 35),
(665, 'Gawabawa', 35),
(666, 'Illela', 35),
(667, 'Isa', 35),
(668, 'Kware', 35),
(669, 'kebbe', 35),
(670, 'Rabah', 35),
(671, 'Sabon birni', 35),
(672, 'Shagari', 35),
(673, 'Silame', 35),
(674, 'Sokoto North', 35),
(675, 'Sokoto South', 35),
(676, 'Tambuwal', 35),
(677, 'Tqngaza', 35),
(678, 'Tureta', 35),
(679, 'Wamako', 35),
(680, 'Wurno', 35),
(681, 'Yabo', 35),
(682, 'Ardo-kola', 36),
(683, 'Bali', 36),
(684, 'Donga', 36),
(685, 'Gashaka', 36),
(686, 'Cassol', 36),
(687, 'Ibi', 36),
(688, 'Jalingo', 36),
(689, 'Karin-Lamido', 36),
(690, 'Kurmi', 36),
(691, 'Lau', 36),
(692, 'Sardauna', 36),
(693, 'Takum', 36),
(694, 'Ussa', 36),
(695, 'Wukari', 36),
(696, 'Yorro', 36),
(697, 'Zing', 36),
(698, 'Bade', 37),
(699, 'Bursari', 37),
(700, 'Damaturu', 37),
(701, 'Fika', 37),
(702, 'Fune', 37),
(703, 'Geidam', 37),
(704, 'Gujba', 37),
(705, 'Gulani', 37),
(706, 'Jakusko', 37),
(707, 'Karasuwa', 37),
(708, 'Karawa', 37),
(709, 'Machina', 37),
(710, 'Nangere', 37),
(711, 'Nguru Potiskum', 37),
(712, 'Tarmua', 37),
(713, 'Yunusari', 37),
(714, 'Yusufari', 37),
(715, 'Anka?', 38),
(716, 'Bakura', 38),
(717, 'Birnin Magaji', 38),
(718, 'Bukkuyum', 38),
(719, 'Bungudu', 38),
(720, 'Gummi', 38),
(721, 'Gusau', 38),
(722, 'Kaura', 38),
(723, 'Namoda', 38),
(724, 'Maradun', 38),
(725, 'Maru', 38),
(726, 'Shinkafi', 38),
(727, 'Talata Mafara', 38),
(728, 'Tsafe', 38),
(729, 'Zurmi?', 38),
(730, 'unknown', 3),
(731, 'Abeokuta North', 4),
(732, 'Abeokuta South', 4),
(733, 'Ado-Odo/Ota', 4),
(734, 'Egbado North', 4),
(735, 'Egbado South', 4),
(736, 'Ewekoro', 4),
(737, 'Ifo', 4),
(738, 'Ijebu East', 4),
(739, 'Ijebu North', 4),
(740, 'Ijebu North East', 4),
(741, 'Ijebu Ode', 4),
(742, 'Ikenne', 4),
(743, 'Imeko-Afon', 4),
(744, 'Ipokia', 4),
(745, 'Obafemi-Owode', 4),
(746, 'Ogun Waterside', 4),
(747, 'Odeda', 4),
(748, 'Odogbolu', 4),
(749, 'Remo North', 4),
(750, 'Shagamu', 4),
(751, 'Agege', 5),
(752, 'Ajeromi-Ifelodun', 5),
(753, 'Alimosho', 5),
(754, 'Amuwo-Odofin', 5),
(755, 'Apapa', 5),
(756, 'Badagry', 5),
(757, 'Epe', 5),
(758, 'Eti-Osa', 5),
(759, 'Ibeju/Lekki', 5),
(760, 'Ifako-Ijaye', 5),
(761, 'Ikeja', 5),
(762, 'Ikorodu', 5),
(763, 'Kosofe', 5),
(764, 'Lagos Island', 5),
(765, 'Lagos Mainland', 5),
(766, 'Mushin', 5),
(767, 'Ojo', 5),
(768, 'Oshodi-Isolo', 5),
(769, 'Shomolu', 5),
(770, 'Surulere', 5),
(771, 'Anambra East', 16),
(772, 'Anambra West', 16),
(773, 'Anaocha', 16),
(774, 'Awka North', 16),
(775, ' Ayamelum', 16),
(776, 'Dunukofia', 16),
(777, 'Ekwusigo', 16),
(778, 'Idemili North', 16),
(779, 'Idemili south', 16),
(780, 'Ihiala', 16),
(781, 'Njikoka', 16),
(782, 'Nnewi North', 16),
(783, 'Nnewi South', 16),
(784, 'Ogbaru', 16),
(785, 'Onitsha North', 16),
(786, 'Onitsha South', 16),
(787, 'Orumba North', 16),
(788, 'Orumba South', 16),
(789, 'Oyi', 16),
(790, 'Aguata', 16),
(791, 'Owan West', 10),
(792, 'Owan East', 10),
(793, 'Akoko-Edo', 10);

-- --------------------------------------------------------

--
-- Table structure for table `marital_status`
--

CREATE TABLE `marital_status` (
  `marital_status_id` int(11) NOT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marital_status`
--

INSERT INTO `marital_status` (`marital_status_id`, `status`) VALUES
(1, 'Single'),
(2, 'Married'),
(3, 'Widowed'),
(4, 'Separated'),
(5, 'Divorced');

-- --------------------------------------------------------

--
-- Table structure for table `mode_of_training`
--

CREATE TABLE `mode_of_training` (
  `mode_id` int(11) NOT NULL,
  `sponsor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mode_of_training`
--

INSERT INTO `mode_of_training` (`mode_id`, `sponsor`) VALUES
(1, 'Government-sponsored'),
(2, 'Self-sponsored'),
(3, 'Organisation-Sponsored');

-- --------------------------------------------------------

--
-- Table structure for table `olevel`
--

CREATE TABLE `olevel` (
  `olevel_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `exam_type` int(11) DEFAULT NULL,
  `exam_year` varchar(50) DEFAULT NULL,
  `exam_no` varchar(50) NOT NULL,
  `sitting_id` int(20) NOT NULL,
  `subject_1` int(11) DEFAULT NULL,
  `grade_1` int(11) DEFAULT NULL,
  `subject_2` int(11) DEFAULT NULL,
  `grade_2` int(11) DEFAULT NULL,
  `subject_3` int(11) DEFAULT NULL,
  `grade_3` int(11) DEFAULT NULL,
  `subject_4` int(11) DEFAULT NULL,
  `grade_4` int(11) DEFAULT NULL,
  `subject_5` int(11) DEFAULT NULL,
  `grade_5` int(11) DEFAULT NULL,
  `subject_6` int(11) DEFAULT NULL,
  `grade_6` int(11) DEFAULT NULL,
  `subject_7` int(11) DEFAULT NULL,
  `grade_7` int(11) DEFAULT NULL,
  `subject_8` int(11) DEFAULT NULL,
  `grade_8` int(11) DEFAULT NULL,
  `subject_9` int(11) DEFAULT NULL,
  `grade_9` int(11) DEFAULT NULL,
  `no_of_credit_passes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `olevel`
--

INSERT INTO `olevel` (`olevel_id`, `applicant_id`, `exam_type`, `exam_year`, `exam_no`, `sitting_id`, `subject_1`, `grade_1`, `subject_2`, `grade_2`, `subject_3`, `grade_3`, `subject_4`, `grade_4`, `subject_5`, `grade_5`, `subject_6`, `grade_6`, `subject_7`, `grade_7`, `subject_8`, `grade_8`, `subject_9`, `grade_9`, `no_of_credit_passes`) VALUES
(41, 1170, 6, '2003', 'DASFTG451263978', 1, 7, 1, 20, 21, 3, 22, 4, 2, 1, 1, 9, 3, 1, 2, 19, 19, 5, 1, 0),
(42, 1170, 2, '2011', 'AEDSR124563', 2, 4, 21, 18, 3, 2, 22, 9, 22, 8, 22, 10, 10, 1, 2, 11, 10, 11, 3, 0),
(43, 1171, 3, '2019', 'A234455', 1, 7, 1, 1, 5, 8, 23, 2, 21, 4, 4, 10, 10, 10, 10, 10, 10, 10, 10, 0),
(44, 1174, 1, '2000', 'AWE1234', 1, 3, 1, 4, 1, 9, 22, 9, 4, 5, 21, 6, 5, 2, 21, 12, 5, 17, 2, 0),
(45, 1175, 1, '2012', 'D435757', 1, 1, 1, 4, 22, 2, 1, 3, 4, 5, 22, 7, 21, 9, 6, 11, 22, 13, 5, 0),
(51, 1165, 1, '2015', 'AQE324567', 1, 7, 21, 3, 22, 15, 2, 13, 3, 9, 4, 2, 6, 10, 10, 10, 10, 10, 10, 6),
(52, 1165, 3, '2015', 'ADE24512', 2, 3, 22, 4, 3, 8, 4, 9, 7, 14, 4, 10, 22, 1, 6, 10, 10, 10, 10, 7);

-- --------------------------------------------------------

--
-- Table structure for table `passport`
--

CREATE TABLE `passport` (
  `passport_id` int(100) NOT NULL,
  `applicant_id` int(11) DEFAULT NULL,
  `file` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `permanent_add`
--

CREATE TABLE `permanent_add` (
  `permanent_add_id` int(100) NOT NULL,
  `street_add` text NOT NULL,
  `home_town` varchar(250) NOT NULL,
  `senatorial_district` int(11) NOT NULL,
  `lg_of_origin` int(11) NOT NULL,
  `state_of_origin` int(11) NOT NULL,
  `nationality` int(50) NOT NULL,
  `applicant_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permanent_add`
--

INSERT INTO `permanent_add` (`permanent_add_id`, `street_add`, `home_town`, `senatorial_district`, `lg_of_origin`, `state_of_origin`, `nationality`, `applicant_id`) VALUES
(7, 'No 3 Adeyemi Street\'s', 'Ibadan', 201, 245, 9, 131, 1165),
(8, '27, Amadu Bello Way', 'Ilorin', 129, 485, 14, 16, 1170),
(9, '27, Amadu Bello Way', 'Ilorin', 131, 485, 14, 131, 1171),
(10, '27, Amadu Bello Way', 'Ilorin', 197, 485, 14, 131, 1174),
(11, '27, Amadu Bello Way', 'Ilorin', 208, 587, 2, 131, 1175);

-- --------------------------------------------------------

--
-- Table structure for table `pin`
--

CREATE TABLE `pin` (
  `pin_id` int(11) NOT NULL,
  `pin` varchar(50) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pin`
--

INSERT INTO `pin` (`pin_id`, `pin`, `school_id`, `session_id`) VALUES
(2002, 'wvn7o1Gt', 11, 4),
(2003, 'HKG8A9Es', 11, 4),
(2004, 'AaB649cG', 11, 4),
(2005, 'hM51sj48', 11, 4),
(2006, 'sds4dEsG', 11, 4),
(2007, '1uh4vDVe', 11, 4),
(2008, '4dzcJxs9', 11, 4),
(2009, '8nvAQD87', 11, 4),
(2010, 'sI8ZT6BH', 11, 4),
(2011, 's2ZfgzOB', 11, 4),
(2012, 'sL35df8b', 11, 4),
(2013, 'Jtx2Z359', 11, 4),
(2014, 'J97v43b3', 11, 4),
(2015, 'sqTwBS9J', 11, 4),
(2016, 'UDP75248', 11, 4),
(2017, 'ha3i6eqc', 11, 4),
(2018, 'ns91kD92', 11, 4),
(2019, 'DGgV7sHF', 11, 4),
(2020, '34sX7Vso', 11, 4),
(2021, 'texN8OXn', 11, 4),
(2022, '9eJ5G3C0', 11, 4),
(2023, 'UBG396JK', 11, 4),
(2024, '65j9s8mc', 11, 4),
(2025, '9bLID19c', 11, 4),
(2026, 'ky067e8t', 11, 4),
(2027, '6J5B2aun', 11, 4),
(2028, 'FRdnGmXs', 11, 4),
(2029, '8E4ezaHx', 11, 4),
(2030, 'XOntXp8K', 11, 4),
(2031, '4x21k9XH', 11, 4),
(2032, 'X75K5F5b', 11, 4),
(2033, 'CJTzBe79', 11, 4),
(2034, '54XBqBG0', 11, 4),
(2035, 'XbT8pANI', 11, 4),
(2036, 'dTXu0b5B', 11, 4),
(2037, 'x6953BXO', 11, 4),
(2038, 'PYc4tUta', 11, 4),
(2039, 't5ngfELz', 11, 4),
(2040, 'LDAretes', 11, 4),
(2041, 'tPgRUwS9', 11, 4),
(2042, '1U95yJgY', 11, 4),
(2043, '6f75647P', 11, 4),
(2044, 'asf71aXd', 11, 4),
(2045, 'pYDb6U8H', 11, 4),
(2046, 'C8389aaT', 11, 4),
(2047, 'cA4XeLxJ', 11, 4),
(2048, 'fBrbJMG3', 11, 4),
(2049, '65J94TOr', 11, 4),
(2050, 'Hne9A5cV', 11, 4),
(2051, 'cUba105X', 11, 4),
(2052, '6B3nKJV8', 11, 4),
(2053, '9trdq869', 11, 4),
(2054, 'Y6jNrRmz', 11, 4),
(2055, 'AP866d3x', 11, 4),
(2056, '199aznz1', 11, 4),
(2057, '0amneWBO', 11, 4),
(2058, 'Bt9HTMN4', 11, 4),
(2059, 'x0s7Icp4', 11, 4),
(2060, 'seAELzik', 11, 4),
(2061, 'TCDoa28Z', 11, 4),
(2062, 'A95XKraD', 11, 4),
(2063, 'hw2tt9KD', 11, 4),
(2064, 'RX53Ae41', 11, 4),
(2065, 'u55Xa2dm', 11, 4),
(2066, 'gn557w1a', 11, 4),
(2067, '5J418ms6', 11, 4),
(2068, 'RgYUJ6Wc', 11, 4),
(2069, '1KV3RdCQ', 11, 4),
(2070, 'e28Iwc2B', 11, 4),
(2071, '4QIeBL1c', 11, 4),
(2072, 'Li21f8ss', 11, 4),
(2073, '42i5RK8n', 11, 4),
(2074, '5bF9A4r2', 11, 4),
(2075, 'dej9z3KX', 11, 4),
(2076, '362mbc5z', 11, 4),
(2077, 'EH8kcj3v', 11, 4),
(2078, 'xXr36VAK', 11, 4),
(2079, 'b2b5Vq1a', 11, 4),
(2080, 'XV4X75rD', 11, 4),
(2081, 'hedYz2M4', 11, 4),
(2082, 'ca9Sd91t', 11, 4),
(2083, 'EKDKLAod', 11, 4),
(2084, 'e8MfYTsG', 11, 4),
(2085, '609LetQH', 11, 4),
(2086, 'gLXJ9x8b', 11, 4),
(2087, 'COj4tu89', 11, 4),
(2088, '247d29Vk', 11, 4),
(2089, 'KG0qcz9J', 11, 4),
(2090, 'sfU337SG', 11, 4),
(2091, 'L43cX8s0', 11, 4),
(2092, 'IAgxN5hd', 11, 4),
(2093, '3wd276C9', 11, 4),
(2094, 'eXUB9NT9', 11, 4),
(2095, '3grWCbvX', 11, 4),
(2096, '5gJBf2m7', 11, 4),
(2097, 'CUzez3XE', 11, 4),
(2098, '9z3mYwHA', 11, 4),
(2099, '9HRwKnQD', 11, 4),
(2100, '7aTYdcFR', 11, 4),
(2101, '9x2xcT53', 11, 4),
(2102, '37jt2LHq', 11, 4),
(2103, 'TdsbnY59', 11, 4),
(2104, 'GLdCTgS0', 11, 4),
(2105, 'XNcvstXt', 11, 4),
(2106, 'vKGhkZ61', 11, 4),
(2107, 'mt65Gx39', 11, 4),
(2108, 'zkOX2Ttr', 11, 4),
(2109, 'kzs2sdcY', 11, 4),
(2110, 'U8Qxhnbp', 11, 4),
(2111, 'g2D865h4', 11, 4),
(2112, '9Y2nNPXd', 11, 4),
(2113, 'qj4c5Bbm', 11, 4),
(2114, 'sg9c5b6X', 11, 4),
(2115, '4ep58Vnx', 11, 4),
(2116, 'GkDAc3cf', 11, 4),
(2117, 'syb62NsH', 11, 4),
(2118, 'K6Bz1kab', 11, 4),
(2119, 'nXY1O5NM', 11, 4),
(2120, '9NK2sXCu', 11, 4),
(2121, 'z44D0iT6', 11, 4),
(2122, '25GY485r', 11, 4),
(2123, 'Ds08X9Ie', 11, 4),
(2124, 'JXb2HEL8', 11, 4),
(2125, '9K8u98Am', 11, 4),
(2126, 'GSM1a4wy', 11, 4),
(2127, 'ba147kD9', 11, 4),
(2128, '7SAtzz9N', 11, 4),
(2129, 'gaYD9t98', 11, 4),
(2130, '84aT4591', 11, 4),
(2131, '2IEtKZ4H', 11, 4),
(2132, 'h6XN8Hdj', 11, 4),
(2133, 'Y7A839rT', 11, 4),
(2134, 'QVAB1p3a', 11, 4),
(2135, 'L4waCmjq', 11, 4),
(2136, '1X82a7dG', 11, 4),
(2137, 'C3ZJ28xo', 11, 4),
(2138, 's1WbbKgt', 11, 4),
(2139, 'sY7W2E76', 11, 4),
(2140, '8A2b4786', 11, 4),
(2141, '2uqX2W0n', 11, 4),
(2142, 'y86dpzBc', 11, 4),
(2143, 'yW3D4TYZ', 11, 4),
(2144, 'b3By2asV', 11, 4),
(2145, '3g44h7Jj', 11, 4),
(2146, 'GKU45tzk', 11, 4),
(2147, '91obN32g', 11, 4),
(2148, '86sCyq3t', 11, 4),
(2149, 'dtGDiYw9', 11, 4),
(2150, 'Mo83c8XR', 11, 4),
(2151, 't4PG21A9', 11, 4),
(2152, '9N9WhORe', 11, 4),
(2153, 'y92LPnXx', 11, 4),
(2154, 'B7ox32L6', 11, 4),
(2155, '5BsOv3ag', 11, 4),
(2156, 'veskQtCR', 11, 4),
(2157, 'rA5tWZ1V', 11, 4),
(2158, 'qa5mH2X2', 11, 4),
(2159, 'XaH2eOdy', 11, 4),
(2160, 'ciFR85kz', 11, 4),
(2161, '3bhYLqA5', 11, 4),
(2162, 'exDuFbEM', 11, 4),
(2163, '98kjp6zH', 11, 4),
(2164, 'JjVEXCWH', 11, 4),
(2165, 'T7TNxGkw', 11, 4),
(2166, 's1448A0a', 11, 4),
(2167, 'n2c9dZE7', 11, 4),
(2168, 'EH2UtHnT', 11, 4),
(2169, 'G4t89KXw', 11, 4),
(2170, 'YWBmct76', 11, 4),
(2171, '44KJ1XSx', 11, 4),
(2172, 'b1TtQ5Xr', 11, 4),
(2173, '7Xyhb1Vr', 11, 4),
(2174, 'DwtEbLnb', 11, 4),
(2175, 'FEY79tS4', 11, 4),
(2176, '699hKG4d', 11, 4),
(2177, 'Vr4AsFtG', 11, 4),
(2178, 'HT1b0RwF', 11, 4),
(2179, 'Ft1cySxs', 11, 4),
(2180, 'u8c6QrKn', 11, 4),
(2181, 'GD8w52Av', 11, 4),
(2182, 'X43yc892', 11, 4),
(2183, 'bhLgA5JK', 11, 4),
(2184, 'FH0J28TX', 11, 4),
(2185, '54eqnIK3', 11, 4),
(2186, '6cHSnYt7', 11, 4),
(2187, 'P06tYsd1', 11, 4),
(2188, 'nD472Wg4', 11, 4),
(2189, 'jQTqcJ75', 11, 4),
(2190, 'kYKFEc9H', 11, 4),
(2191, 'Oha5Gdcs', 11, 4),
(2192, '86BoxF1i', 11, 4),
(2193, 'PorBKGNd', 11, 4),
(2194, 'HtJize6V', 11, 4),
(2195, 'BP8u9qer', 11, 4),
(2196, '3D8zd6ZA', 11, 4),
(2197, 'hDyJsK81', 11, 4),
(2198, '2O6n5Xd7', 11, 4),
(2199, '56wX6Me4', 11, 4),
(2200, 'i6A34jcb', 11, 4),
(2201, 'cx5vwt23', 11, 4),
(2202, 'r7hj1o6a', 11, 4),
(2203, 'g2K6a8O7', 11, 4),
(2204, 'HAh5Y71B', 11, 4),
(2205, 'z21XH3w6', 11, 4),
(2206, '8cH1ujt8', 11, 4),
(2207, 'a4X675da', 11, 4),
(2208, 'HNzhDbda', 11, 4),
(2209, 'A3chq8dJ', 11, 4),
(2210, 'oQn5indL', 11, 4),
(2211, '6IrKc9xt', 11, 4),
(2212, 'OH2bX1Gz', 11, 4),
(2213, 'Lf783WTs', 11, 4),
(2214, '5KGn5Ad4', 11, 4),
(2215, '7YKX4LUm', 11, 4),
(2216, 'TgehSKf5', 11, 4),
(2217, 'YIhteGA9', 11, 4),
(2218, 'HPbBndKr', 11, 4),
(2219, 'LuG6S1h5', 11, 4),
(2220, '7S9d6961', 11, 4),
(2221, 'z3bSxd8v', 11, 4),
(2222, 'US7A61T9', 11, 4),
(2223, 'jSU4HbBb', 11, 4),
(2224, 'sF2ImJe3', 11, 4),
(2225, 'zXUqXugd', 11, 4),
(2226, 'OJaRBX68', 11, 4),
(2227, '2yYg8bXA', 11, 4),
(2228, 'gDojLKX7', 11, 4),
(2229, '0ZRO5T31', 11, 4),
(2230, 'XrBc6yVg', 11, 4),
(2231, 'NQgbKtWo', 11, 4),
(2232, '2xJYX24D', 11, 4),
(2233, 'PYeE5Y3u', 11, 4),
(2234, 'JYRbd85D', 11, 4),
(2235, 'Rs7qPtkp', 11, 4),
(2236, 'P4DTwZrL', 11, 4),
(2237, '8Us66T4X', 11, 4),
(2238, '4GjXJRn5', 11, 4),
(2239, '9Kr61tkc', 11, 4),
(2240, 'LDe8t5Wr', 11, 4),
(2241, 'BXUrhaN4', 11, 4),
(2242, 'wQ3rdB28', 11, 4),
(2243, '5GPY079Y', 11, 4),
(2244, '7s3h2hrS', 11, 4),
(2245, '5bjTen39', 11, 4),
(2246, 'svgeQs4Y', 11, 4),
(2247, 's4jkAxiu', 11, 4),
(2248, 'd5e73D5c', 11, 4),
(2249, 'HtdrTneL', 11, 4),
(2250, 'F3543bKN', 11, 4),
(2251, 'aEKmL4NX', 11, 4),
(2252, 'dnE8dtzr', 11, 4),
(2253, '4h3KW8UT', 11, 4),
(2254, 'nDgx5DW4', 11, 4),
(2255, '82dt1kRa', 11, 4),
(2256, 'h8UX4ceA', 11, 4),
(2257, 'aAg59S3r', 11, 4),
(2258, '38ef9ha4', 11, 4),
(2259, 'A6d52MH7', 11, 4),
(2260, '64WOY9nB', 11, 4),
(2261, 'sZv28dRz', 11, 4),
(2262, 'de53G9Mt', 11, 4),
(2263, 'DKneXPQ3', 11, 4),
(2264, '96KaBKJr', 11, 4),
(2265, 's916XRZ5', 11, 4),
(2266, 'HGQN9z5z', 11, 4),
(2267, 'mXhdAJY9', 11, 4),
(2268, 'Va6e4zdn', 11, 4),
(2269, 'au20NJ3D', 11, 4),
(2270, '484W2I9c', 11, 4),
(2271, 'n464JG4c', 11, 4),
(2272, '68V3Zte7', 11, 4),
(2273, 'J4fm3eE4', 11, 4),
(2274, '8LGp2zXQ', 11, 4),
(2275, 'DXz56Ig3', 11, 4),
(2276, 'wsA4t74t', 11, 4),
(2277, '7Z8VK6uI', 11, 4),
(2278, 'cp4662Jd', 11, 4),
(2279, '35XJIdQG', 11, 4),
(2280, 'sjk2ZN75', 11, 4),
(2281, 'GNxtLq5E', 11, 4),
(2282, 'J5dkYXn5', 11, 4),
(2283, 'O5MkF84V', 11, 4),
(2284, 'Mesaz3b8', 11, 4),
(2285, 'WZ6es1SG', 11, 4),
(2286, '54Q2vaXG', 11, 4),
(2287, '6AyE2Ysn', 11, 4),
(2288, 'bY42Ut6x', 11, 4),
(2289, '9eBJaT2h', 11, 4),
(2290, 'cJ4S8BUy', 11, 4),
(2291, '6YC3p5Rv', 11, 4),
(2292, '2Jao5mu9', 11, 4),
(2293, 'BgXFbinY', 11, 4),
(2294, 'rVJ96g9s', 11, 4),
(2295, 'VN9rbg5c', 11, 4),
(2296, 'Ba2sCIje', 11, 4),
(2297, '6GHmYHw8', 11, 4),
(2298, 'drz8IOYB', 11, 4),
(2299, 'Xd55wRuM', 11, 4),
(2300, 'v5Yu264r', 11, 4),
(2301, '7Y7b9QtI', 11, 4),
(2302, '27KAB8u3', 11, 4),
(2303, 'UgXhXP9p', 11, 4),
(2304, 'TJ7Z5My9', 11, 4),
(2305, '3p32HNwP', 11, 4),
(2306, '1wdNMatX', 11, 4),
(2307, '99Bseag7', 11, 4),
(2308, '5YITL18n', 11, 4),
(2309, '1X35104c', 11, 4),
(2310, 'a38TF22n', 11, 4),
(2311, 'A379Uo92', 11, 4),
(2312, '9B05482N', 11, 4),
(2313, 'G15V6kWz', 11, 4),
(2314, '92XrZI5K', 11, 4),
(2315, 'K7EHr12d', 11, 4),
(2316, 'X9JU893H', 11, 4),
(2317, 's5XZAbha', 11, 4),
(2318, 's0984sbB', 11, 4),
(2319, 'gD7iaT1G', 11, 4),
(2320, 'DktgIh20', 11, 4),
(2321, '85u6r4h4', 11, 4),
(2322, '9J4ft5XV', 11, 4),
(2323, 'ohxBzWDu', 11, 4),
(2324, '1ecdpsTX', 11, 4),
(2325, 'TgZGe596', 11, 4),
(2326, 'cey625q8', 11, 4),
(2327, 'vKa5Lcuw', 11, 4),
(2328, 'bS5M5pNb', 11, 4),
(2329, 'h9vn65aO', 11, 4),
(2330, 'bZuEp5sj', 11, 4),
(2331, 't3tBm3W1', 11, 4),
(2332, '82atKbnA', 11, 4),
(2333, 'nNydJ9u6', 11, 4),
(2334, 'Hnbd92pT', 11, 4),
(2335, 'QT8Gb1ev', 11, 4),
(2336, 'cc6bB09Q', 11, 4),
(2337, 'nftgWBem', 11, 4),
(2338, '8TX9w862', 11, 4),
(2339, 'stnJeG0T', 11, 4),
(2340, 'ydbaqa6J', 11, 4),
(2341, 'eEXPX1Hq', 11, 4),
(2342, 'Vn9OtK6X', 11, 4),
(2343, 'saJKSW17', 11, 4),
(2344, 'bcKA1s2n', 11, 4),
(2345, 'b58rdk45', 11, 4),
(2346, 'HYnnI1dK', 11, 4),
(2347, 'yLx9bRU3', 11, 4),
(2348, '4I2cUkSY', 11, 4),
(2349, '8ucIthRT', 11, 4),
(2350, '6A3fXYQ8', 11, 4),
(2351, 'DmPAnAD2', 11, 4),
(2352, 'X55VZtWs', 11, 4),
(2353, 'ye5xXzQY', 11, 4),
(2354, 'dsg65o0q', 11, 4),
(2355, 'I5nhQBP4', 11, 4),
(2356, '1S28BHVt', 11, 4),
(2357, '1aGb6hJv', 11, 4),
(2358, 'xvb5eJP9', 11, 4),
(2359, 'Sxd1T85B', 11, 4),
(2360, 'Uzxw6x83', 11, 4),
(2361, 'UVs6tA8Y', 11, 4),
(2362, 'aDaJYrfB', 11, 4),
(2363, 'a5H8T6aj', 11, 4),
(2364, '4w9r3i38', 11, 4),
(2365, '9rd8jGYk', 11, 4),
(2366, '48Xh2ZJ6', 11, 4),
(2367, 'dFVbxmse', 11, 4),
(2368, 'nfGAQBvx', 11, 4),
(2369, 'Ak3BFTKx', 11, 4),
(2370, 'e4KR3s1o', 11, 4),
(2371, 's8B7bE45', 11, 4),
(2372, '3qX1Ddev', 11, 4),
(2373, '6BtB5sqb', 11, 4),
(2374, '6EkOB3a2', 11, 4),
(2375, '9kB5ZG7J', 11, 4),
(2376, '5TL2Ax5n', 11, 4),
(2377, 'x3cm4nG6', 11, 4),
(2378, 'QXELrb9h', 11, 4),
(2379, 'eaFHxZ58', 11, 4),
(2380, 'oWDjv379', 11, 4),
(2381, 'SxUXcnc2', 11, 4),
(2382, '9WRnuUJF', 11, 4),
(2383, 'gykagVn4', 11, 4),
(2384, 'r86382ON', 11, 4),
(2385, 'bH6YT9qy', 11, 4),
(2386, 'KAR3bo87', 11, 4),
(2387, 'dbT5oJQg', 11, 4),
(2388, '6g9bcjG8', 11, 4),
(2389, 's3BdXAzg', 11, 4),
(2390, 'YJ7G1k2a', 11, 4),
(2391, 'bc3STF9e', 11, 4),
(2392, 'ftyH35mx', 11, 4),
(2393, 'RrvTscrd', 11, 4),
(2394, 'NgDuOtja', 11, 4),
(2395, '8WJGh278', 11, 4),
(2396, '395FMhSY', 11, 4),
(2397, '7sPAU4GS', 11, 4),
(2398, 'jbYcDrD5', 11, 4),
(2399, 'Waa2qBA9', 11, 4),
(2400, '5a47YBLi', 11, 4),
(2401, '3a12JuYp', 11, 4),
(2402, 'B62VAhxc', 11, 4),
(2403, 'v2g4eeb9', 11, 4),
(2404, '13Mm686A', 11, 4),
(2405, '3SgJbKct', 11, 4),
(2406, 'pdm42W3G', 11, 4),
(2407, '489XfEX5', 11, 4),
(2408, 'K1451c6H', 11, 4),
(2409, 'j2z573nH', 11, 4),
(2410, 'Bs9NXpfa', 11, 4),
(2411, 'zrbAt8H9', 11, 4),
(2412, 'd17u7695', 11, 4),
(2413, 'L2Q36DzX', 11, 4),
(2414, 'gA0iLD98', 11, 4),
(2415, '72kLc6Xz', 11, 4),
(2416, '8AybH5QV', 11, 4),
(2417, 'LsXbH8Ts', 11, 4),
(2418, 'XWsdgLu4', 11, 4),
(2419, 'Trn59rX4', 11, 4),
(2420, 'YA2a24gQ', 11, 4),
(2421, 'K9J52938', 11, 4),
(2422, 'yZRdsctg', 11, 4),
(2423, 'd937JIGy', 11, 4),
(2424, 'AtrkWcBT', 11, 4),
(2425, '62hNKsIG', 11, 4),
(2426, 'Y40s1ndC', 11, 4),
(2427, 'WYI71R2B', 11, 4),
(2428, 'bxUx4dhN', 11, 4),
(2429, '51iPhJ9d', 11, 4),
(2430, 'VXn5QDX9', 11, 4),
(2431, 'ZBFN9Scn', 11, 4),
(2432, 'x3zH7637', 11, 4),
(2433, '696puNIV', 11, 4),
(2434, '7269bi8c', 11, 4),
(2435, 'RBd9a7e2', 11, 4),
(2436, 'e6ZLiDxW', 11, 4),
(2437, 'KT9GDMb2', 11, 4),
(2438, '8db1es73', 11, 4),
(2439, 'O7LtKTxs', 11, 4),
(2440, 'XtAEG6s1', 11, 4),
(2441, 'fdrt587t', 11, 4),
(2442, 'xeb245KM', 11, 4),
(2443, 'azsiaKSP', 11, 4),
(2444, 'IwCTVaLd', 11, 4),
(2445, 'R1AJL6r2', 11, 4),
(2446, 't7JgnekR', 11, 4),
(2447, '84QR63c2', 11, 4),
(2448, 'GgsTLu3q', 11, 4),
(2449, 'dOhbbXz9', 11, 4),
(2450, 'TTuGpAtd', 11, 4),
(2451, 'TZzd1uhU', 11, 4),
(2452, 'H97eot29', 11, 4),
(2453, 'cOJ4Qa63', 11, 4),
(2454, 'XqtcJfz2', 11, 4),
(2455, '2Rgdedc1', 11, 4),
(2456, 'Ae34B1qb', 11, 4),
(2457, 'R4Qoa6c5', 11, 4),
(2458, 'KviJb4nW', 11, 4),
(2459, 'J6bgtND8', 11, 4),
(2460, 'fr21vPm8', 11, 4),
(2461, 'Ihx8Jqt6', 11, 4),
(2462, '69aZb9aP', 11, 4),
(2463, 'fBdn6chJ', 11, 4),
(2464, 'UDI5q385', 11, 4),
(2465, '8tTZc8z5', 11, 4),
(2466, 'us5Y8GTz', 11, 4),
(2467, 'g5pavxdt', 11, 4),
(2468, '1yg3zUi0', 11, 4),
(2469, 'Sh3dT653', 11, 4),
(2470, '2V4sSTYU', 11, 4),
(2471, 'JFTs0sUb', 11, 4),
(2472, 'e9821rK1', 11, 4),
(2473, 'x595ej23', 11, 4),
(2474, 'Nnzf899e', 11, 4),
(2475, 'AGttoHBK', 11, 4),
(2476, 'vpcBEw4F', 11, 4),
(2477, 'TFT2x83G', 11, 4),
(2478, 'xrHqek6E', 11, 4),
(2479, '398BV8ch', 11, 4),
(2480, 'Wt954582', 11, 4),
(2481, 'Rc6983Z2', 11, 4),
(2482, '4RU9Oxr7', 11, 4),
(2483, 'Psgr9aKe', 11, 4),
(2484, 'Ynm5OcS1', 11, 4),
(2485, '2tzdQ59X', 11, 4),
(2486, 'xbnUr5At', 11, 4),
(2487, 'dC9s2asY', 11, 4),
(2488, 'Yp519G1c', 11, 4),
(2489, 'pxd3Hbjs', 11, 4),
(2490, 'D0haTck5', 11, 4),
(2491, 'C4pBB8a8', 11, 4),
(2492, 'Gee4T9aJ', 11, 4),
(2493, '2J4z638v', 11, 4),
(2494, 'xE7tJijX', 11, 4),
(2495, 'WX55t58h', 11, 4),
(2496, '29IcDQ6N', 11, 4),
(2497, '3vx1hMQ6', 11, 4),
(2498, 'cYidhrnY', 11, 4),
(2499, 'sDt9axaX', 11, 4),
(2500, 'BKmXnsg2', 11, 4),
(2501, 'h23ZG69v', 11, 4),
(2502, 'JK13XM5s', 11, 4),
(2503, 'KANc4T9t', 11, 4),
(2504, 'XJaozMrO', 11, 4),
(2505, '8HK2YHsg', 11, 4),
(2506, 'fcG38H2K', 11, 4),
(2507, 'E3gexHkc', 11, 4),
(2508, 'gQ16HjX5', 11, 4),
(2509, '79nrs3G3', 11, 4),
(2510, 'AWJ8bYD2', 11, 4),
(2511, 'TPD1YdGN', 11, 4),
(2512, 'hT68S42m', 11, 4),
(2513, 'cYLc7Diu', 11, 4),
(2514, '1X6O38Nx', 11, 4),
(2515, 'C1xXFedL', 11, 4),
(2516, '15Da9Axd', 11, 4),
(2517, 'zSXW6Vyk', 11, 4),
(2518, 'Xs6WfJtE', 11, 4),
(2519, '35O5e4Z8', 11, 4),
(2520, '5m9IAoHD', 11, 4),
(2521, 'c5iJ4kz8', 11, 4),
(2522, 'gZG68prx', 11, 4),
(2523, 'VydCqt9r', 11, 4),
(2524, '79gEXdh1', 11, 4),
(2525, 'DJ0w3ORs', 11, 4),
(2526, 'AGNJfabe', 11, 4),
(2527, 'Mmio8969', 11, 4),
(2528, 'eYmC8T7Q', 11, 4),
(2529, 'Xc897M6H', 11, 4),
(2530, 'HM8m39Be', 11, 4),
(2531, '9jmGOGhT', 11, 4),
(2532, '5KApChUf', 11, 4),
(2533, '756qasc2', 11, 4),
(2534, '8T2iUV2G', 11, 4),
(2535, 'vMJ5U9NT', 11, 4),
(2536, 'pDX59KSt', 11, 4),
(2537, 'bhF6qJQt', 11, 4),
(2538, 'x4zatnGP', 11, 4),
(2539, 'Dgsz0VH9', 11, 4),
(2540, 'UnFjRHmX', 11, 4),
(2541, 'ths32WL3', 11, 4),
(2542, 'nc83TRg6', 11, 4),
(2543, 'T3JvKQX4', 11, 4),
(2544, 'Tg5hcG4D', 11, 4),
(2545, 'r2dJaHc5', 11, 4),
(2546, '20j4Ufx5', 11, 4),
(2547, 'Rw24BHsB', 11, 4),
(2548, '4tdu2ssz', 11, 4),
(2549, '8GpnqvD3', 11, 4),
(2550, 'bNwMr3Xj', 11, 4),
(2551, '5ojhgzzm', 11, 4),
(2552, '7958JhWC', 11, 4),
(2553, 'wTzWJ183', 11, 4),
(2554, 'W1J5Pc1x', 11, 4),
(2555, 's383s9o9', 11, 4),
(2556, 'JjfE5Z9d', 11, 4),
(2557, '7XAZ9L2G', 11, 4),
(2558, 'Zzb96fhB', 11, 4),
(2559, '3jtHk091', 11, 4),
(2560, 'SQd256TF', 11, 4),
(2561, 'NIzaLds8', 11, 4),
(2562, 'x0H7gAAs', 11, 4),
(2563, 'N8GRxe6u', 11, 4),
(2564, '4hUd52M9', 11, 4),
(2565, '7OK34iC9', 11, 4),
(2566, 'ng48dqXi', 11, 4),
(2567, 'sc2E35xp', 11, 4),
(2568, 'JhMR2NJf', 11, 4),
(2569, '5XsN5Ag7', 11, 4),
(2570, 'KEne1B48', 11, 4),
(2571, 'J7g7khnd', 11, 4),
(2572, 'Px82oK3N', 11, 4),
(2573, 'B42s1YGH', 11, 4),
(2574, 'oTrizds7', 11, 4),
(2575, 'Pbc25AA9', 11, 4),
(2576, 'X9mssn5e', 11, 4),
(2577, 'xT97JBt3', 11, 4),
(2578, 'KBz8dr8S', 11, 4),
(2579, 'G4TOGWvY', 11, 4),
(2580, 'Gs632mN3', 11, 4),
(2581, 'n36qV9cx', 11, 4),
(2582, 'd579oxt5', 11, 4),
(2583, '3Y13461a', 11, 4),
(2584, '0TX7s639', 11, 4),
(2585, 'XZn36oN5', 11, 4),
(2586, 'zU7r374F', 11, 4),
(2587, 'szxXc6BA', 11, 4),
(2588, '8Y2jear6', 11, 4),
(2589, 'bH5G8DtA', 11, 4),
(2590, '22wctY6d', 11, 4),
(2591, '6Cyct8gk', 11, 4),
(2592, '1Ot2sQcz', 11, 4),
(2593, 'cJ9dn1Dn', 11, 4),
(2594, '9yA81H03', 11, 4),
(2595, 'jJWYO86t', 11, 4),
(2596, '9P6bA67T', 11, 4),
(2597, 'gOXrG9Xu', 11, 4),
(2598, 'tMt64Ob9', 11, 4),
(2599, 'GdDSLAHf', 11, 4),
(2600, '3HeVtnJK', 11, 4),
(2601, 'HAsXKAN9', 11, 4),
(2602, '4ddxeNRz', 11, 4),
(2603, 'Negcd27C', 11, 4),
(2604, 'A9hTOnb5', 11, 4),
(2605, '3t3x7s2G', 11, 4),
(2606, 'GDc815qJ', 11, 4),
(2607, 'TGv1Yazs', 11, 4),
(2608, 'LEQ76Xim', 11, 4),
(2609, 'i32fmrb4', 11, 4),
(2610, 'rJda3B84', 11, 4),
(2611, 'W2z7yah4', 11, 4),
(2612, '1ut0A3Xj', 11, 4),
(2613, 'mc4Cx2sQ', 11, 4),
(2614, 'XPYSI7p1', 11, 4),
(2615, 'tBEJnsaa', 11, 4),
(2616, 'iI823mLX', 11, 4),
(2617, 'b832MJ90', 11, 4),
(2618, 'h9515XcG', 11, 4),
(2619, '8HzcGnAd', 11, 4),
(2620, 'e9AgZuLo', 11, 4),
(2621, '552U9861', 11, 4),
(2622, 'CggbQY81', 11, 4),
(2623, 'sjx8P52G', 11, 4),
(2624, 'Wao6H7e6', 11, 4),
(2625, 'a5zGjL29', 11, 4),
(2626, 'fC354xs6', 11, 4),
(2627, '5Fs0c4dq', 11, 4),
(2628, '5CWGtxr8', 11, 4),
(2629, 's2r3i5Yz', 11, 4),
(2630, 'UOhI3P2s', 11, 4),
(2631, 'w4s2av5B', 11, 4),
(2632, 'vpd2D1Sf', 11, 4),
(2633, 'b5i6b3RM', 11, 4),
(2634, 'c3M5aJ5G', 11, 4),
(2635, '5SpFaTdD', 11, 4),
(2636, '5n92xKXe', 11, 4),
(2637, 'UZM8cO9E', 11, 4),
(2638, 'spK8x25Q', 11, 4),
(2639, '124iZ6zX', 11, 4),
(2640, 'JGiHMtKd', 11, 4),
(2641, 'sb1KO8U6', 11, 4),
(2642, '069z8W7C', 11, 4),
(2643, 's79x6aWg', 11, 4),
(2644, '3KuMBWSx', 11, 4),
(2645, 'L29dsth7', 11, 4),
(2646, 'tDm9rAD1', 11, 4),
(2647, 'dj8Na1Ib', 11, 4),
(2648, 'Y73nA5Hf', 11, 4),
(2649, 'SsowXHa4', 11, 4),
(2650, '8zbT228X', 11, 4),
(2651, 'CG4z7sh8', 11, 4),
(2652, 'Z8xY4h4Q', 11, 4),
(2653, '5D01DbR9', 11, 4),
(2654, 'D2SNsEjz', 11, 4),
(2655, 'gJ3bTcwn', 11, 4),
(2656, 'r48Bq5MD', 11, 4),
(2657, '0nT5Hmz9', 11, 4),
(2658, 'nX28HCJ2', 11, 4),
(2659, '8Jr0zBi2', 11, 4),
(2660, '1ET7xX9F', 11, 4),
(2661, 's4Yfy7tA', 11, 4),
(2662, 'DgGc63M7', 11, 4),
(2663, 'D8B595B1', 11, 4),
(2664, 'ch8veV5q', 11, 4),
(2665, 'vH1rVswh', 11, 4),
(2666, 'wKHSxYdA', 11, 4),
(2667, 'THYeicd5', 11, 4),
(2668, '42TEPY36', 11, 4),
(2669, 'XLJu8c9D', 11, 4),
(2670, 'k4LgD3Bz', 11, 4),
(2671, 'Dd93sO50', 11, 4),
(2672, '3i6DFz6K', 11, 4),
(2673, 'OcmzH7bb', 11, 4),
(2674, 'Abn5cdjB', 11, 4),
(2675, '061x8tQL', 11, 4),
(2676, '6QFh9qXg', 11, 4),
(2677, '66rgxbc2', 11, 4),
(2678, 'B6AUeb2L', 11, 4),
(2679, '1adG5Tb8', 11, 4),
(2680, '6PSeMgN5', 11, 4),
(2681, 'BeJ09iKJ', 11, 4),
(2682, 'f5u8K7g7', 11, 4),
(2683, '16GW9nte', 11, 4),
(2684, 'gz865ni6', 11, 4),
(2685, 'tp8bo4iv', 11, 4),
(2686, '4G833saq', 11, 4),
(2687, 't545X90a', 11, 4),
(2688, 'SK7hs688', 11, 4),
(2689, 'R69nwGri', 11, 4),
(2690, 'Ao7CEnFd', 11, 4),
(2691, '86M3A1kK', 11, 4),
(2692, 'nv61aeBc', 11, 4),
(2693, 'N8zb9yJm', 11, 4),
(2694, 'L8trond5', 11, 4),
(2695, 'hM9A856P', 11, 4),
(2696, 'xz45Tbk9', 11, 4),
(2697, '6Mf2r3Wd', 11, 4),
(2698, '8EI8b476', 11, 4),
(2699, 'b4cNS64a', 11, 4),
(2700, 'cxrRa6td', 11, 4),
(2701, 'd05sD5we', 11, 4),
(2702, 'v6tBgX88', 11, 4),
(2703, 'R0GHMVtb', 11, 4),
(2704, '9HRpF165', 11, 4),
(2705, 'h16Rx7gq', 11, 4),
(2706, '5iupbKzA', 11, 4),
(2707, 'O2IHsb6x', 11, 4),
(2708, '94po624r', 11, 4),
(2709, 'ApQqa2KF', 11, 4),
(2710, 'Ts329dOJ', 11, 4),
(2711, 'O81TUi8F', 11, 4),
(2712, 'R26Ej9Fp', 11, 4),
(2713, 'cHKW3w6i', 11, 4),
(2714, '3ReVaIJ9', 11, 4),
(2715, '8N93zkX1', 11, 4),
(2716, 'tws3Y6eX', 11, 4),
(2717, 'tcdH4WJ4', 11, 4),
(2718, 'm5345It6', 11, 4),
(2719, 'zpVTwvqd', 11, 4),
(2720, 'YdS85KbT', 11, 4),
(2721, 'Dg5dIBqK', 11, 4),
(2722, 'jse2avZt', 11, 4),
(2723, '7raT9vGd', 11, 4),
(2724, '9B2tsR1a', 11, 4),
(2725, 'tE9zTPnb', 11, 4),
(2726, 'GJUM958P', 11, 4),
(2727, 'c9bJ6e39', 11, 4),
(2728, 'AO9zmb5H', 11, 4),
(2729, 'pehwut8G', 11, 4),
(2730, 'e9zBr4td', 11, 4),
(2731, 'jsNb3CHY', 11, 4),
(2732, '87ua8D6Y', 11, 4),
(2733, '1DX5bX6G', 11, 4),
(2734, '8WdHxX9z', 11, 4),
(2735, 'Tyz24O9s', 11, 4),
(2736, 'G992sd88', 11, 4),
(2737, '2X75vDDo', 11, 4),
(2738, 'DV5I6ef8', 11, 4),
(2739, 'HE2A463d', 11, 4),
(2740, 'Uhs1uv23', 11, 4),
(2741, 'ubrD3x5e', 11, 4),
(2742, 'aNctu3Q6', 11, 4),
(2743, 'r3627TJ0', 11, 4),
(2744, '162B556r', 11, 4),
(2745, 'epSN6X8z', 11, 4),
(2746, 'DQY3TGac', 11, 4),
(2747, '2tT4hG7f', 11, 4),
(2748, 'JwcGUsI7', 11, 4),
(2749, 'rq4dh2dF', 11, 4),
(2750, 'dMFqHbYT', 11, 4),
(2751, '38txoP9a', 11, 4),
(2752, 'a9GBzJ8W', 11, 4),
(2753, '7i6bGnQY', 11, 4),
(2754, 'xaM1A2K9', 11, 4),
(2755, 'SPT8wXQy', 11, 4),
(2756, 'VQk8n427', 11, 4),
(2757, '53643n45', 11, 4),
(2758, 'pTQ3eV86', 11, 4),
(2759, 'cKs5s69H', 11, 4),
(2760, 'bXWLbaa1', 11, 4),
(2761, '86BRATKo', 11, 4),
(2762, '9C2jJdbO', 11, 4),
(2763, 'mvCt7z8Z', 11, 4),
(2764, 'FVB4aB6p', 11, 4),
(2765, 'co3wrT1a', 11, 4),
(2766, 'GTySxgts', 11, 4),
(2767, 'Ti6R5bFJ', 11, 4),
(2768, '7mxDez69', 11, 4),
(2769, 'cmGLiKhb', 11, 4),
(2770, 'Fe9581aa', 11, 4),
(2771, 'OTJ756rU', 11, 4),
(2772, '5oRsce82', 11, 4),
(2773, 'gDc9P0eR', 11, 4),
(2774, '9dsCQz5c', 11, 4),
(2775, 'HM18J365', 11, 4),
(2776, '1a5SX6aj', 11, 4),
(2777, '2J5tGDJ7', 11, 4),
(2778, 'X5LYdhPH', 11, 4),
(2779, 'eixzUW24', 11, 4),
(2780, 'Zx3UL8pF', 11, 4),
(2781, 'K8yDGetI', 11, 4),
(2782, 'KVO2iEhB', 11, 4),
(2783, 'Hd6b6gDY', 11, 4),
(2784, 's5h0n6Dn', 11, 4),
(2785, 'ByAqHara', 11, 4),
(2786, 'Gt2yYd8Z', 11, 4),
(2787, 'Jn6vBMTY', 11, 4),
(2788, 'tfmhRcE2', 11, 4),
(2789, 'e34CavJM', 11, 4),
(2790, 'TtJ58zKm', 11, 4),
(2791, '4JmD1anY', 11, 4),
(2792, 'v72bc2Da', 11, 4),
(2793, 'EeUamkit', 11, 4),
(2794, '8AOXhCt6', 11, 4),
(2795, '3vsnahHu', 11, 4),
(2796, 'b6Kz8NB3', 11, 4),
(2797, 'xUO4BMJn', 11, 4),
(2798, 'QbSL4W2z', 11, 4),
(2799, '1Y0dacb7', 11, 4),
(2800, '9KhIMoTX', 11, 4),
(2801, 'I7yesadH', 11, 4),
(2802, 'AoHXcad8', 11, 4),
(2803, 'E4WB56sg', 11, 4),
(2804, 'YT3zboKe', 11, 4),
(2805, 'MBTcb30z', 11, 4),
(2806, '5PYK8Qtb', 11, 4),
(2807, 'n13Wh56v', 11, 4),
(2808, 'K3cD40b4', 11, 4),
(2809, 'rz7cxp9e', 11, 4),
(2810, '6dc9J5K0', 11, 4),
(2811, 'Tdt89t83', 11, 4),
(2812, 'nUbcEzfM', 11, 4),
(2813, '2kcPfY9H', 11, 4),
(2814, '9732Qt7T', 11, 4),
(2815, 'Tp4r9VJX', 11, 4),
(2816, '1oAD6n8X', 11, 4),
(2817, 'EaDcbR2p', 11, 4),
(2818, '1Oh9hL5P', 11, 4),
(2819, 'TdF8dK2c', 11, 4),
(2820, 'ZhebgnAb', 11, 4),
(2821, 'gSu6oQ5c', 11, 4),
(2822, 'wbxNFpI1', 11, 4),
(2823, '24b8zZMX', 11, 4),
(2824, 'KY76vc6X', 11, 4),
(2825, '3xdO49vh', 11, 4),
(2826, '1wKc6mjx', 11, 4),
(2827, 'tuynx63e', 11, 4),
(2828, 'qceTX661', 11, 4),
(2829, '7qtY8Ldb', 11, 4),
(2830, 'a7ygh3m8', 11, 4),
(2831, 'H5ZdyG5F', 11, 4),
(2832, 'Q9hYBGZd', 11, 4),
(2833, '643YEng2', 11, 4),
(2834, '1z4r3mgj', 11, 4),
(2835, 'sj901x9E', 11, 4),
(2836, 'kF54cR2b', 11, 4),
(2837, '1LcHj15s', 11, 4),
(2838, '6a9GAF8b', 11, 4),
(2839, 'QCOB77fA', 11, 4),
(2840, '64Jxb7aB', 11, 4),
(2841, 'LtwB9V6a', 11, 4),
(2842, 'CegtL8DZ', 11, 4),
(2843, 't30vIxhs', 11, 4),
(2844, '5a2ih19K', 11, 4),
(2845, 'gHsn9hNe', 11, 4),
(2846, '59AsqQYg', 11, 4),
(2847, '2J9BJ7t8', 11, 4),
(2848, '2y9tSJ4d', 11, 4),
(2849, 'f93485Rx', 11, 4),
(2850, 'k5Vg6pw2', 11, 4),
(2851, 'JdZVFcPB', 11, 4),
(2852, 'KFn4Xea6', 11, 4),
(2853, 'JOtch4Q8', 11, 4),
(2854, 'b5sGTF8j', 11, 4),
(2855, '40J9IK8x', 11, 4),
(2856, 'rjFaa2J4', 11, 4),
(2857, 'rXa5GAsD', 11, 4),
(2858, 'kbe8ph73', 11, 4),
(2859, 'FK35KAXT', 11, 4),
(2860, 'n8XwCz8e', 11, 4),
(2861, 'IC5VF1xg', 11, 4),
(2862, '4319K5Dx', 11, 4),
(2863, 'p53dG6rY', 11, 4),
(2864, 'E2eU16Q4', 11, 4),
(2865, 'qXed9KR5', 11, 4),
(2866, '91WqRf44', 11, 4),
(2867, 'GOws0XbU', 11, 4),
(2868, 'I5ZoifGs', 11, 4),
(2869, '992je4oM', 11, 4),
(2870, 'D671Rt9b', 11, 4),
(2871, 'eXc43Ih5', 11, 4),
(2872, 'eafDWdx8', 11, 4),
(2873, '06h3u3tS', 11, 4),
(2874, 'itnbIL8K', 11, 4),
(2875, 'G6mL6Kz7', 11, 4),
(2876, '32zY1cO1', 11, 4),
(2877, 'd25D29gT', 11, 4),
(2878, '12cwExQ5', 11, 4),
(2879, 'NcE566sD', 11, 4),
(2880, 'r9ts8TFV', 11, 4),
(2881, 'SsunG6i3', 11, 4),
(2882, '1vWjZhTt', 11, 4),
(2883, 'Og3H89z1', 11, 4),
(2884, 'pV8gBkSO', 11, 4),
(2885, 'o50ztXT9', 11, 4),
(2886, '4U1Vpy9d', 11, 4),
(2887, 'V3zhSUCH', 11, 4),
(2888, '35s4vjGr', 11, 4),
(2889, 'zTcCidq4', 11, 4),
(2890, 'U6fXDdsT', 11, 4),
(2891, 'BtbLft43', 11, 4),
(2892, 'g6q35n1j', 11, 4),
(2893, 'SUe89D2G', 11, 4),
(2894, 's9JtpJbc', 11, 4),
(2895, 'zUD5aB4L', 11, 4),
(2896, '24Inhk33', 11, 4),
(2897, '3fyv7t9c', 11, 4),
(2898, 'KAbeJtxq', 11, 4),
(2899, '47Z497ga', 11, 4),
(2900, 'Xs76RWw4', 11, 4),
(2901, 'aXnt2DsA', 11, 4),
(2902, 'bAJUXvRj', 11, 4),
(2903, 'CthMf568', 11, 4),
(2904, 'A6a24M5T', 11, 4),
(2905, 'eE09xB9n', 11, 4),
(2906, '3gSJpee7', 11, 4),
(2907, '6k2Y654t', 11, 4),
(2908, 'fsVPt943', 11, 4),
(2909, '65tgs8a7', 11, 4),
(2910, 'z0ae918n', 11, 4),
(2911, 'c2b47Xij', 11, 4),
(2912, 'zwx3JK8x', 11, 4),
(2913, 'dGiknsAT', 11, 4),
(2914, 'I8sjst1a', 11, 4),
(2915, 'CndtXyJz', 11, 4),
(2916, 'A6IJ04h4', 11, 4),
(2917, 'sBi39I72', 11, 4),
(2918, 'LJZdGXTc', 11, 4),
(2919, 'L34DS6kg', 11, 4),
(2920, '3bzET37d', 11, 4),
(2921, 'JHd68JW3', 11, 4),
(2922, 'Ar0wZz97', 11, 4),
(2923, 'jzmnADUT', 11, 4),
(2924, 'ttp97gXY', 11, 4),
(2925, '6axKFBt9', 11, 4),
(2926, 'cEiaQ9K6', 11, 4),
(2927, 'bB7YD8se', 11, 4),
(2928, '7K82dYs6', 11, 4),
(2929, 'Qw8Cb3Wc', 11, 4),
(2930, 'cn6RaS51', 11, 4),
(2931, 'Ocat327C', 11, 4),
(2932, 'wBE30q5p', 11, 4),
(2933, 'NP9w2HIJ', 11, 4),
(2934, '4zsbRaU9', 11, 4),
(2935, '5bsE8H9e', 11, 4),
(2936, '4Gswz8O2', 11, 4),
(2937, '3T7V9dc1', 11, 4),
(2938, '9vBhdV3g', 11, 4),
(2939, 'J7uYY6Nc', 11, 4),
(2940, '25GKcS75', 11, 4),
(2941, '979nX1XH', 11, 4),
(2942, 'Ve9E43tf', 11, 4),
(2943, 'peXPQGcm', 11, 4),
(2944, 'AtzWDkB7', 11, 4),
(2945, '7d504o9X', 11, 4),
(2946, 'i9cCFcVt', 11, 4),
(2947, 'k5sbcF5w', 11, 4),
(2948, '2rDdk64Q', 11, 4),
(2949, '8Cws86r9', 11, 4),
(2950, 'HTA2cX75', 11, 4),
(2951, 'K93c2ocF', 11, 4),
(2952, '12s53Trc', 11, 4),
(2953, 'y4c6vSu9', 11, 4),
(2954, '8evrQ9J2', 11, 4),
(2955, 'b71z6e1o', 11, 4),
(2956, '6s9J3VH4', 11, 4),
(2957, 'QEX849oa', 11, 4),
(2958, 'Z4Dtt8wa', 11, 4),
(2959, 'JhsBoeLn', 11, 4),
(2960, 'zJ6826uX', 11, 4),
(2961, '9B4qj9QG', 11, 4),
(2962, 'GYbQ5kh2', 11, 4),
(2963, 'fLb6cdnM', 11, 4),
(2964, 'C6Nr98VK', 11, 4),
(2965, '4Q35T5ic', 11, 4),
(2966, 'Ebt912Z5', 11, 4),
(2967, 'I7A9d9Xe', 11, 4),
(2968, 'wefUM763', 11, 4),
(2969, 'zdNJ4coA', 11, 4),
(2970, '539bXhSg', 11, 4),
(2971, 'F9dTZaBU', 11, 4),
(2972, 'K3rW48gc', 11, 4),
(2973, 'rzh4DO2e', 11, 4),
(2974, 'pXLBW6d7', 11, 4),
(2975, '5F692sQz', 11, 4),
(2976, 'k08i3X7Y', 11, 4),
(2977, '2h75GJRV', 11, 4),
(2978, 'idxhWtKg', 11, 4),
(2979, 'z1947WTG', 11, 4),
(2980, 'aaCsGW3z', 11, 4),
(2981, 'TXbg92MD', 11, 4),
(2982, '29sdEe9G', 11, 4),
(2983, '5at5cqzX', 11, 4),
(2984, '8nXz5T7p', 11, 4),
(2985, 'y2J9sfq2', 11, 4),
(2986, 'bjN22vpX', 11, 4),
(2987, 'pR4Be1Mf', 11, 4),
(2988, 'C63fte80', 11, 4),
(2989, 'L5bsX9u8', 11, 4),
(2990, 'cm4DYgKM', 11, 4),
(2991, 'Gx3jJg6T', 11, 4),
(2992, '271gO42M', 11, 4),
(2993, 'Jhcst8YL', 11, 4),
(2994, 'N1mAhxj3', 11, 4),
(2995, 'aKTxh9dA', 11, 4),
(2996, '6LB6mT5K', 11, 4),
(2997, 'Yca1Xibb', 11, 4),
(2998, '4gcnv6yK', 11, 4),
(2999, '96MB1GcO', 11, 4),
(3000, '1J4YhEHh', 11, 4),
(3001, 'TJW6atd9', 11, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pin_nos`
--

CREATE TABLE `pin_nos` (
  `pin_no_id` int(100) NOT NULL,
  `pin_no` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_no` varchar(100) NOT NULL,
  `pin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pin_nos`
--

INSERT INTO `pin_nos` (`pin_no_id`, `pin_no`, `email`, `phone_no`, `pin`) VALUES
(1165, '7a756aeea607dfcd13a0199a2ad4e795', 'peterbifme@gmail.com', '08067155307', 'edfrt12'),
(1166, '8d1cec5eb6ec3e412952e27d6224697d', 'peterbif12@yahoo.com', '080652347896', 'X4502kZq');

-- --------------------------------------------------------

--
-- Table structure for table `present_appointment`
--

CREATE TABLE `present_appointment` (
  `present_appointment_id` int(11) NOT NULL,
  `pestab` varchar(255) DEFAULT NULL,
  `paddress` varchar(255) DEFAULT NULL,
  `pdate` varchar(255) DEFAULT NULL,
  `psalary` varchar(255) DEFAULT NULL,
  `pnature` varchar(255) DEFAULT NULL,
  `applicant_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `previous_appointment`
--

CREATE TABLE `previous_appointment` (
  `present_appointment_id` int(11) NOT NULL,
  `preestab` varchar(255) DEFAULT NULL,
  `preaddress` varchar(255) DEFAULT NULL,
  `predate` varchar(255) DEFAULT NULL,
  `presalary` varchar(255) DEFAULT NULL,
  `prenature` varchar(255) DEFAULT NULL,
  `applicant_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `professional_training`
--

CREATE TABLE `professional_training` (
  `pro_id` int(11) NOT NULL,
  `pschool_name` varchar(250) NOT NULL,
  `pcourse` varchar(250) NOT NULL,
  `pcertificate` varchar(250) NOT NULL,
  `pdate` varchar(20) NOT NULL,
  `applicant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE `qualification` (
  `qualification_id` int(11) NOT NULL,
  `qualification` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qualification`
--

INSERT INTO `qualification` (`qualification_id`, `qualification`) VALUES
(14, 'B. Ed.'),
(2, 'B.sc.'),
(17, 'BDS'),
(6, 'HND'),
(4, 'M.sc.'),
(15, 'MBBS'),
(16, 'MBChB'),
(9, 'N/A'),
(8, 'NCE'),
(7, 'ND'),
(13, 'O\'Level'),
(3, 'PGD'),
(5, 'PH\'d'),
(12, 'RN'),
(10, 'RNRM'),
(11, 'Technician');

-- --------------------------------------------------------

--
-- Table structure for table `religion`
--

CREATE TABLE `religion` (
  `religion_id` int(11) NOT NULL,
  `religion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `religion`
--

INSERT INTO `religion` (`religion_id`, `religion`) VALUES
(1, 'Christianity'),
(2, 'Islam'),
(3, 'Tradition'),
(4, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `residency`
--

CREATE TABLE `residency` (
  `residency_id` int(11) NOT NULL,
  `specialty` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `residency`
--

INSERT INTO `residency` (`residency_id`, `specialty`) VALUES
(1, 'Anaesthesia'),
(2, 'Chemical Pathology'),
(3, 'Clinical Pharmacology'),
(4, 'Family Medicine'),
(5, 'Haematology'),
(6, 'Paediatrics'),
(7, 'Obstetrics & Gynaecology'),
(8, 'Pathology'),
(9, 'Psychiatry'),
(10, 'Radiology'),
(11, 'Surgery'),
(12, 'Neurological Surgery'),
(13, 'Neurology'),
(14, 'Nuclear Medicine'),
(15, 'Child & Adolescent Psychiatry'),
(16, 'Plastic'),
(17, 'Reconstructive & Anaesthetic Surgery'),
(18, 'Otorhinolaryngology'),
(19, 'Radiation Oncology'),
(20, 'Periodontology & Community Dentistry'),
(21, 'Community Medicine'),
(22, 'Internal Medicine'),
(23, 'Oral & Maxillofacial Surgery'),
(24, 'Family Dentistry'),
(25, 'Oral Pathology'),
(26, 'Restorative Dentistry'),
(27, 'Child Oral Health'),
(28, 'Medical Microbiology'),
(29, 'Ophthalmology'),
(30, 'Orthopaedics & Trauma');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `school_id` int(11) NOT NULL,
  `schools_id` int(11) NOT NULL,
  `code` int(20) NOT NULL,
  `session` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`school_id`, `schools_id`, `code`, `session`, `applicant_id`) VALUES
(12, 3, 6591472, 7, 1165),
(13, 3, 8602935, 7, 1169),
(14, 3, 6280574, 7, 1170),
(15, 3, 2697514, 7, 1171),
(16, 3, 9846031, 7, 1174),
(17, 8, 574231, 7, 1175);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `schools_id` int(11) NOT NULL,
  `school` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`schools_id`, `school`) VALUES
(3, 'School of Nursing'),
(8, 'Perioperative Nursing School'),
(9, 'School Of Occupational Health Nursing'),
(10, 'School of Midwifery'),
(11, 'School of Health Information Management');

-- --------------------------------------------------------

--
-- Table structure for table `school_logo`
--

CREATE TABLE `school_logo` (
  `school_logo_id` int(11) NOT NULL,
  `logo` varchar(500) DEFAULT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_logo`
--

INSERT INTO `school_logo` (`school_logo_id`, `logo`, `school_id`) VALUES
(3, '637898.png', 3),
(4, '953612.jpg', 8),
(5, '97388.jpg', 9),
(6, '141332.png', 10),
(7, '87880.jpg', 11);

-- --------------------------------------------------------

--
-- Table structure for table `senatorial_district`
--

CREATE TABLE `senatorial_district` (
  `senatorial_district_id` int(11) NOT NULL,
  `district` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `senatorial_district`
--

INSERT INTO `senatorial_district` (`senatorial_district_id`, `district`) VALUES
(172, '  Kaduna South'),
(120, 'Abia Central '),
(119, 'Abia North '),
(121, 'Abia South '),
(227, 'Abuja Municipal'),
(127, 'Adamawa Central'),
(125, 'Adamawa North'),
(126, 'Adamawa South '),
(122, 'Akwa Ibom North East'),
(123, 'Akwa Ibom North West '),
(124, 'Akwa Ibom South '),
(129, 'Anambra Central '),
(128, 'Anambra North '),
(130, 'Anambra South '),
(132, 'Bauchi Central '),
(133, 'Bauchi North '),
(131, 'Bauchi South '),
(135, 'Bayelsa Central '),
(134, 'Bayelsa East'),
(136, 'Bayelsa West '),
(137, 'Benue North  East '),
(138, 'Benue North West'),
(139, 'Benue South'),
(141, 'Borno Central'),
(140, 'Borno North'),
(142, 'Borno South'),
(144, 'Cross River Central'),
(143, 'Cross River North'),
(145, 'Cross River South'),
(146, 'Delta Central'),
(147, 'Delta North'),
(148, 'Delta South'),
(151, 'Ebonyi  South'),
(150, 'Ebonyi Central'),
(149, 'Ebonyi North'),
(154, 'Edo  South'),
(152, 'Edo Central'),
(153, 'Edo North'),
(157, 'Ekiti  South'),
(156, 'Ekiti Central'),
(155, 'Ekiti North'),
(160, 'Enugu  North'),
(158, 'Enugu East'),
(159, 'Enugu West'),
(161, 'Gombe Central'),
(163, 'Gombe North  '),
(162, 'Gombe South'),
(164, 'Imo East'),
(166, 'Imo North  '),
(165, 'Imo West'),
(168, 'Jigawa North  East'),
(169, 'Jigawa North  West '),
(167, 'Jigawa South  West'),
(171, 'Kaduna Central'),
(170, 'Kaduna North'),
(175, 'Kano  South'),
(173, 'Kano Central'),
(174, 'Kano North'),
(178, 'Katsina Central '),
(176, 'Katsina North'),
(177, 'Katsina South'),
(180, 'Kebbi Central'),
(179, 'Kebbi North'),
(181, 'Kebbi South'),
(182, 'Kogi Central'),
(183, 'Kogi East'),
(184, 'Kogi West'),
(186, 'Kwara Central'),
(185, 'Kwara North'),
(187, 'Kwara South'),
(190, 'Lagos  West'),
(188, 'Lagos Central'),
(189, 'Lagos East'),
(193, 'Nassarawa  South'),
(191, 'Nassarawa North'),
(192, 'Nassarawa West'),
(194, 'Niger East'),
(195, 'Niger North'),
(196, 'Niger South'),
(197, 'Ogun Central'),
(198, 'Ogun East'),
(199, 'Ogun West'),
(201, 'Ondo Central'),
(200, 'Ondo North'),
(202, 'Ondo South'),
(203, 'Osun Central'),
(204, 'Osun East'),
(205, 'Osun West'),
(206, 'Oyo Central'),
(207, 'Oyo North'),
(208, 'Oyo South'),
(210, 'Plateau Central'),
(211, 'Plateau North'),
(209, 'Plateau South'),
(212, 'Rivers East'),
(213, 'Rivers South East'),
(214, 'Rivers West'),
(215, 'Sokoto East'),
(216, 'Sokoto North'),
(217, 'Sokoto South'),
(219, 'Taraba Central'),
(220, 'Taraba North'),
(218, 'Taraba South'),
(221, 'Yobe East'),
(222, 'Yobe North'),
(223, 'Yobe South'),
(225, 'Zamfara Central'),
(224, 'Zamfara North'),
(226, 'Zamfara West');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `session_id` int(11) NOT NULL,
  `session` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`session_id`, `session`) VALUES
(1, '2016/2017'),
(2, '2017/2018'),
(4, '2019/2020'),
(7, '2018/2019'),
(8, '2020/2021'),
(9, '2021/2022');

-- --------------------------------------------------------

--
-- Table structure for table `set_session`
--

CREATE TABLE `set_session` (
  `set_session_id` int(11) NOT NULL,
  `set_session` varchar(100) NOT NULL,
  `school` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `set_session`
--

INSERT INTO `set_session` (`set_session_id`, `set_session`, `school`) VALUES
(16, '1', 3),
(17, '2', 3),
(18, '2', 8),
(19, '7', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sittings`
--

CREATE TABLE `sittings` (
  `sittings_id` int(11) NOT NULL,
  `sitting` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sittings`
--

INSERT INTO `sittings` (`sittings_id`, `sitting`) VALUES
(1, '1st Sitting'),
(2, '2nd Sitting');

-- --------------------------------------------------------

--
-- Table structure for table `sponsor`
--

CREATE TABLE `sponsor` (
  `sponsor_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `ssurname` varchar(100) NOT NULL,
  `sfirstname` varchar(100) NOT NULL,
  `soccupation` varchar(100) NOT NULL,
  `scontact_add` text NOT NULL,
  `sphone_no` varchar(20) NOT NULL,
  `semail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponsor`
--

INSERT INTO `sponsor` (`sponsor_id`, `applicant_id`, `ssurname`, `sfirstname`, `soccupation`, `scontact_add`, `sphone_no`, `semail`) VALUES
(2, 1165, 'Ogunleye', 'Kehinde', 'Civil Service', 'NO 23 Adekunle Roads\'s', '08056231478', 'kunle@gmail.com'),
(3, 1170, 'Ogunleye', 'Omolara', 'Civil Service', 'No 23 Adekunle Road, Ibadan, Oyo State', '08063254178', 'omolara@gmail.com'),
(4, 1171, 'OGEDENGBE', 'IDOWU', 'CIVIL SERVANT', '27, amadu bello way', '08032420401', 'idowu.ogedengbe@gmail.com'),
(5, 1174, 'Awodiya', 'Ronke', 'Nursing', '27, amadu bello way', '08056231478', 'awodiya@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `sponsor2`
--

CREATE TABLE `sponsor2` (
  `sponsor2_id` int(11) NOT NULL,
  `ssponsor` int(11) NOT NULL,
  `sagency` varchar(250) DEFAULT NULL,
  `applicant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponsor2`
--

INSERT INTO `sponsor2` (`sponsor2_id`, `ssponsor`, `sagency`, `applicant_id`) VALUES
(2, 3, 'University College Hospital, Ibadan\'s ', 1165),
(3, 1, 'university College hospital', 1175);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_name`) VALUES
(2, 'Oyo'),
(3, 'Unknown'),
(4, 'Ogun'),
(5, 'Lagos'),
(6, 'Kano'),
(7, 'Bayelsa'),
(8, 'Adamawa'),
(9, 'Ekiti'),
(10, 'Edo'),
(11, 'Osun'),
(12, 'Ondo'),
(13, 'Benue'),
(14, 'Kwara'),
(15, 'Imo'),
(16, 'Anambra'),
(17, 'Cross-River'),
(18, 'Abia'),
(19, 'Akwaibom'),
(20, 'Bauchi'),
(21, 'Borno'),
(22, 'Delta'),
(23, 'Ebonyi'),
(24, 'Enugu'),
(25, 'Gombe'),
(26, 'Jigawa'),
(27, 'Kaduna'),
(28, 'Katsina'),
(29, 'Kebbi'),
(30, 'Kogi'),
(31, 'Nassarawa'),
(32, 'Niger'),
(33, 'Plateau'),
(34, 'Rivers'),
(35, 'Sokoto'),
(36, 'Taraba'),
(37, 'Yobe'),
(38, 'Zamfara'),
(39, 'Abuja F.C.T.');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentId` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `other_name` varchar(255) DEFAULT NULL,
  `date_of_birth` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `grade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `subject` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject`) VALUES
(1, 'Mathematics'),
(2, 'English Language'),
(3, 'Biology'),
(4, 'Chemistry'),
(5, 'Physics'),
(6, 'Futher Mathematics'),
(7, 'Agric Science'),
(8, 'Computer Science'),
(9, 'Economics'),
(10, 'N/A'),
(11, 'Yoruba'),
(12, 'Hausa'),
(13, 'Geography'),
(14, 'Government'),
(15, 'Commerce'),
(16, 'Financial Accounts / Accounts '),
(17, 'Igbo'),
(18, 'Civic Education'),
(19, 'Marketing'),
(20, 'Animal Husbandry'),
(21, 'Fishery');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `usurname` varchar(200) NOT NULL,
  `ufirstname` varchar(200) NOT NULL,
  `uemail` varchar(200) NOT NULL,
  `uphone_no` varchar(200) DEFAULT NULL,
  `password` varchar(250) NOT NULL,
  `role` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usurname`, `ufirstname`, `uemail`, `uphone_no`, `password`, `role`) VALUES
(46, 'Ogunleye', 'Olorunda', 'olorunda@gmail.com', '08056321478', '471cb78dbf3c0cc694626bd671786065', 1),
(47, 'Ogunleye', 'Peter', 'peterbif@yahoo.com', '08067155307', 'c7f9c25ac11980278159618eacffcd0b', 2),
(49, 'Ogedengbe', 'Idowu ', 'idowu.ogedengbe@uch-ibadan.org.ng', '08032420401', '3cc0f8e312c885e84b9e5f77fded14b2', 1),
(50, 'Oteyowo', 'Odunayo', 'sunrites@yahoo.com', '07069701403', '1b30528d9ecbcde7709832ca5067f552', 1),
(51, 'Makinde', 'Adeniyi', 'adeniyimakinde2014@yahoo.com', '08034007592', 'f6bbd7ab9e7101679fa24b7e6f39f762', 1),
(52, 'Brown', 'Victoria', 'vicbbrown@yahoo.com', '08037272857', '55e824b631f53fa95ddfa68c260f6efc', 1),
(53, 'Adetunji', 'Sadiq', 'sadiqadetunji2016@gmail.com', '08110368144', '54927818611444bf3e4c8e77c44270e7', 1),
(54, 'Adetule', 'Olubunmi', 'bummyshalom777@gmail.com', '08031376004', 'fa9b825dc1844fca067049aa09e8736e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `work_experience`
--

CREATE TABLE `work_experience` (
  `work_experience_id` int(11) NOT NULL,
  `establishment` varchar(250) NOT NULL,
  `position` varchar(250) NOT NULL,
  `yearfw` varchar(100) NOT NULL,
  `yeartw` varchar(100) NOT NULL,
  `applicant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_experience`
--

INSERT INTO `work_experience` (`work_experience_id`, `establishment`, `position`, `yearfw`, `yeartw`, `applicant_id`) VALUES
(3, 'University Of Ibadan\'s Model School', 'Principal Computer Analyst', '2005', '2008', 1165),
(4, 'University College Hospital Ibadan ', 'Chief IT Officers', '2000', '2009', 1165),
(5, 'NOUN', 'Chief Exam Officer', '2012', '2015', 1165),
(6, 'USAID', 'Volunteer', '2001', '2012', 1175);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant_nok`
--
ALTER TABLE `applicant_nok`
  ADD PRIMARY KEY (`applicant_nok_id`),
  ADD UNIQUE KEY `student_id` (`applicant_id`);

--
-- Indexes for table `applicant_ref`
--
ALTER TABLE `applicant_ref`
  ADD PRIMARY KEY (`applicant_ref_id`),
  ADD KEY `student_id` (`applicant_id`);

--
-- Indexes for table `application_edu`
--
ALTER TABLE `application_edu`
  ADD PRIMARY KEY (`application_edu_id`),
  ADD UNIQUE KEY `student_id` (`student_id`),
  ADD UNIQUE KEY `student_id_2` (`student_id`),
  ADD UNIQUE KEY `form_ref` (`form_ref`),
  ADD KEY `exam_type` (`exam_type`),
  ADD KEY `subject_1` (`subject_1`),
  ADD KEY `subject_2` (`subject_2`),
  ADD KEY `subject_3` (`subject_3`),
  ADD KEY `subject_4` (`subject_4`),
  ADD KEY `subject_5` (`subject_5`),
  ADD KEY `subject_6` (`subject_6`),
  ADD KEY `subject_7` (`subject_7`),
  ADD KEY `subject_8` (`subject_8`),
  ADD KEY `subject_9` (`subject_9`),
  ADD KEY `grade_1` (`grade_1`),
  ADD KEY `grade_2` (`grade_2`),
  ADD KEY `grade_3` (`grade_3`),
  ADD KEY `grade_4` (`grade_4`),
  ADD KEY `grade_5` (`grade_5`),
  ADD KEY `grade_6` (`grade_6`),
  ADD KEY `grade_7` (`grade_7`),
  ADD KEY `grade_8` (`grade_8`),
  ADD KEY `grade_9` (`grade_9`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `session_id` (`session_id`);

--
-- Indexes for table `awards`
--
ALTER TABLE `awards`
  ADD PRIMARY KEY (`award_id`);

--
-- Indexes for table `bio_data`
--
ALTER TABLE `bio_data`
  ADD PRIMARY KEY (`biodata_id`),
  ADD UNIQUE KEY `applicant_id` (`applicant_id`);

--
-- Indexes for table `capture`
--
ALTER TABLE `capture`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `donor_id` (`applicant_id`),
  ADD UNIQUE KEY `capture` (`capture`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `contact_add`
--
ALTER TABLE `contact_add`
  ADD PRIMARY KEY (`contact_add_id`),
  ADD UNIQUE KEY `applicant_id` (`applicant_id`),
  ADD KEY `state_of_origin` (`state_of_origin`),
  ADD KEY `lg_of_origin` (`lg_of_origin`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `credit_passes`
--
ALTER TABLE `credit_passes`
  ADD PRIMARY KEY (`credit_passes_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`education_id`),
  ADD KEY `ecourse` (`ecourse`) USING BTREE;

--
-- Indexes for table `exam_type`
--
ALTER TABLE `exam_type`
  ADD PRIMARY KEY (`exam_type_id`),
  ADD UNIQUE KEY `exam_type` (`exam_type`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`gender_id`),
  ADD UNIQUE KEY `gender` (`gender`),
  ADD UNIQUE KEY `gender_2` (`gender`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`grade_id`),
  ADD UNIQUE KEY `grade` (`grade`);

--
-- Indexes for table `local_govt`
--
ALTER TABLE `local_govt`
  ADD PRIMARY KEY (`lg_id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `marital_status`
--
ALTER TABLE `marital_status`
  ADD PRIMARY KEY (`marital_status_id`);

--
-- Indexes for table `mode_of_training`
--
ALTER TABLE `mode_of_training`
  ADD PRIMARY KEY (`mode_id`);

--
-- Indexes for table `olevel`
--
ALTER TABLE `olevel`
  ADD PRIMARY KEY (`olevel_id`),
  ADD KEY `exam_type` (`exam_type`),
  ADD KEY `subject_1` (`subject_1`),
  ADD KEY `subject_2` (`subject_2`),
  ADD KEY `subject_3` (`subject_3`),
  ADD KEY `subject_4` (`subject_4`),
  ADD KEY `subject_5` (`subject_5`),
  ADD KEY `subject_6` (`subject_6`),
  ADD KEY `subject_7` (`subject_7`),
  ADD KEY `subject_8` (`subject_8`),
  ADD KEY `subject_9` (`subject_9`),
  ADD KEY `grade_1` (`grade_1`),
  ADD KEY `grade_2` (`grade_2`),
  ADD KEY `grade_3` (`grade_3`),
  ADD KEY `grade_4` (`grade_4`),
  ADD KEY `grade_5` (`grade_5`),
  ADD KEY `grade_6` (`grade_6`),
  ADD KEY `grade_7` (`grade_7`),
  ADD KEY `grade_8` (`grade_8`),
  ADD KEY `grade_9` (`grade_9`);

--
-- Indexes for table `passport`
--
ALTER TABLE `passport`
  ADD PRIMARY KEY (`passport_id`),
  ADD UNIQUE KEY `file` (`file`),
  ADD UNIQUE KEY `passport_id` (`passport_id`),
  ADD UNIQUE KEY `student_id` (`applicant_id`),
  ADD UNIQUE KEY `student_id_2` (`applicant_id`);

--
-- Indexes for table `permanent_add`
--
ALTER TABLE `permanent_add`
  ADD PRIMARY KEY (`permanent_add_id`),
  ADD UNIQUE KEY `applicant_id` (`applicant_id`),
  ADD KEY `state_of_origin` (`state_of_origin`),
  ADD KEY `lg_of_origin` (`lg_of_origin`);

--
-- Indexes for table `pin`
--
ALTER TABLE `pin`
  ADD PRIMARY KEY (`pin_id`),
  ADD UNIQUE KEY `pin` (`pin`);

--
-- Indexes for table `pin_nos`
--
ALTER TABLE `pin_nos`
  ADD PRIMARY KEY (`pin_no_id`),
  ADD UNIQUE KEY `access_code_id` (`pin_no_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `pin` (`pin`),
  ADD KEY `pin_no` (`pin_no`);

--
-- Indexes for table `present_appointment`
--
ALTER TABLE `present_appointment`
  ADD PRIMARY KEY (`present_appointment_id`),
  ADD UNIQUE KEY `applicant_id` (`applicant_id`),
  ADD KEY `pestab` (`pestab`) USING BTREE;

--
-- Indexes for table `previous_appointment`
--
ALTER TABLE `previous_appointment`
  ADD PRIMARY KEY (`present_appointment_id`),
  ADD KEY `preestab` (`preestab`) USING BTREE;

--
-- Indexes for table `professional_training`
--
ALTER TABLE `professional_training`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `pcourse` (`pcourse`) USING BTREE;

--
-- Indexes for table `qualification`
--
ALTER TABLE `qualification`
  ADD PRIMARY KEY (`qualification_id`),
  ADD UNIQUE KEY `qualification` (`qualification`);

--
-- Indexes for table `religion`
--
ALTER TABLE `religion`
  ADD PRIMARY KEY (`religion_id`);

--
-- Indexes for table `residency`
--
ALTER TABLE `residency`
  ADD PRIMARY KEY (`residency_id`),
  ADD UNIQUE KEY `specialty` (`specialty`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`school_id`),
  ADD UNIQUE KEY `applicant_id` (`applicant_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`schools_id`);

--
-- Indexes for table `school_logo`
--
ALTER TABLE `school_logo`
  ADD PRIMARY KEY (`school_logo_id`),
  ADD UNIQUE KEY `school_id_2` (`school_id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `senatorial_district`
--
ALTER TABLE `senatorial_district`
  ADD PRIMARY KEY (`senatorial_district_id`),
  ADD UNIQUE KEY `district` (`district`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `set_session`
--
ALTER TABLE `set_session`
  ADD PRIMARY KEY (`set_session_id`);

--
-- Indexes for table `sittings`
--
ALTER TABLE `sittings`
  ADD PRIMARY KEY (`sittings_id`),
  ADD UNIQUE KEY `sitting` (`sitting`);

--
-- Indexes for table `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`sponsor_id`),
  ADD UNIQUE KEY `applicant_id` (`applicant_id`);

--
-- Indexes for table `sponsor2`
--
ALTER TABLE `sponsor2`
  ADD PRIMARY KEY (`sponsor2_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentId`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`uemail`),
  ADD UNIQUE KEY `phone_no` (`uphone_no`);

--
-- Indexes for table `work_experience`
--
ALTER TABLE `work_experience`
  ADD PRIMARY KEY (`work_experience_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant_nok`
--
ALTER TABLE `applicant_nok`
  MODIFY `applicant_nok_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `applicant_ref`
--
ALTER TABLE `applicant_ref`
  MODIFY `applicant_ref_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `application_edu`
--
ALTER TABLE `application_edu`
  MODIFY `application_edu_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `awards`
--
ALTER TABLE `awards`
  MODIFY `award_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bio_data`
--
ALTER TABLE `bio_data`
  MODIFY `biodata_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `capture`
--
ALTER TABLE `capture`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `contact_add`
--
ALTER TABLE `contact_add`
  MODIFY `contact_add_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `credit_passes`
--
ALTER TABLE `credit_passes`
  MODIFY `credit_passes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `education_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `exam_type`
--
ALTER TABLE `exam_type`
  MODIFY `exam_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `gender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `local_govt`
--
ALTER TABLE `local_govt`
  MODIFY `lg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=794;

--
-- AUTO_INCREMENT for table `marital_status`
--
ALTER TABLE `marital_status`
  MODIFY `marital_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mode_of_training`
--
ALTER TABLE `mode_of_training`
  MODIFY `mode_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `olevel`
--
ALTER TABLE `olevel`
  MODIFY `olevel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `passport`
--
ALTER TABLE `passport`
  MODIFY `passport_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permanent_add`
--
ALTER TABLE `permanent_add`
  MODIFY `permanent_add_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pin`
--
ALTER TABLE `pin`
  MODIFY `pin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3002;

--
-- AUTO_INCREMENT for table `pin_nos`
--
ALTER TABLE `pin_nos`
  MODIFY `pin_no_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1167;

--
-- AUTO_INCREMENT for table `present_appointment`
--
ALTER TABLE `present_appointment`
  MODIFY `present_appointment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `previous_appointment`
--
ALTER TABLE `previous_appointment`
  MODIFY `present_appointment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `professional_training`
--
ALTER TABLE `professional_training`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qualification`
--
ALTER TABLE `qualification`
  MODIFY `qualification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `religion`
--
ALTER TABLE `religion`
  MODIFY `religion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `residency`
--
ALTER TABLE `residency`
  MODIFY `residency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `schools_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `school_logo`
--
ALTER TABLE `school_logo`
  MODIFY `school_logo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `senatorial_district`
--
ALTER TABLE `senatorial_district`
  MODIFY `senatorial_district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `set_session`
--
ALTER TABLE `set_session`
  MODIFY `set_session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `sittings`
--
ALTER TABLE `sittings`
  MODIFY `sittings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sponsor`
--
ALTER TABLE `sponsor`
  MODIFY `sponsor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sponsor2`
--
ALTER TABLE `sponsor2`
  MODIFY `sponsor2_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `work_experience`
--
ALTER TABLE `work_experience`
  MODIFY `work_experience_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `local_govt`
--
ALTER TABLE `local_govt`
  ADD CONSTRAINT `local_govt_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `state` (`state_id`);

--
-- Constraints for table `passport`
--
ALTER TABLE `passport`
  ADD CONSTRAINT `passport_ibfk_1` FOREIGN KEY (`applicant_id`) REFERENCES `bio_data` (`biodata_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
