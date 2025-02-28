-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 21, 2022 at 07:14 AM
-- Server version: 5.7.36-cll-lve
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-bus`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `seat_amout` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `bus_id` bigint(20) UNSIGNED NOT NULL,
  `bus_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bus_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bus_departuretime` time NOT NULL,
  `bus_departuredate` timestamp NULL DEFAULT NULL,
  `bus_origin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bus_origin_lat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bus_origin_lang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bus_destination` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bus_destination_lat` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bus_destination_long` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arrival_time` time DEFAULT NULL,
  `arrival_date` timestamp NULL DEFAULT NULL,
  `assign_driver` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assignn_codoctor` int(10) NOT NULL,
  `bus_price` decimal(10,2) NOT NULL,
  `operator_id` int(11) NOT NULL,
  `bus_terminal_id` int(100) NOT NULL,
  `total_seats` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bus_stop_trigger` int(10) DEFAULT NULL,
  `bus_arrival_trigger` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`bus_id`, `bus_name`, `bus_code`, `bus_departuretime`, `bus_departuredate`, `bus_origin`, `bus_origin_lat`, `bus_origin_lang`, `bus_destination`, `bus_destination_lat`, `bus_destination_long`, `arrival_time`, `arrival_date`, `assign_driver`, `assignn_codoctor`, `bus_price`, `operator_id`, `bus_terminal_id`, `total_seats`, `status`, `created_at`, `updated_at`, `bus_stop_trigger`, `bus_arrival_trigger`) VALUES
(30, 'Bovjen Transport', 'ZXW 574', '10:00:00', '2022-03-20 07:00:00', 'Doroteo Jose', '14.6053', '120.9808', 'Cubao', '14.6243', '121.0154', NULL, NULL, '8', 9, 28.00, 1, 1, 45, 0, '2022-01-16 09:03:01', '2022-01-16 09:03:01', NULL, NULL),
(32, 'Prince Mckhaine Transport', 'ACP 4283', '10:00:00', '2022-03-20 07:00:00', 'Doroteo Jose', '14.6053', '120.9808', 'Cubao', '14.6243', '121.0154', NULL, NULL, '20', 21, 28.00, 8, 1, 45, 0, '2022-01-04 10:20:46', '2022-01-04 10:20:46', NULL, NULL),
(34, 'AC Transit', 'TAW 673', '10:00:00', '2022-03-20 07:00:00', 'Doroteo Jose', '14.6053', '120.9808', 'Cubao', '14.6243', '121.0154', NULL, NULL, '24', 25, 28.00, 23, 1, 45, 0, '2022-01-05 00:16:26', '2022-01-05 00:16:26', NULL, NULL),
(35, 'Bigaa Buslink Transport', 'ABF8641', '10:00:00', '2022-03-20 07:00:00', 'Doroteo Jose', '14.6207', '121.0534', 'Cubao', '14.6243', '121.0154', NULL, NULL, '22', 23, 28.00, 16, 1, 45, 0, '2022-01-05 23:34:21', '2022-01-05 23:34:21', NULL, NULL),
(37, 'BBL Bus', 'TYU 481', '10:00:00', '2022-03-25 07:00:00', 'LRT Buendia', '14.5544', '121.0343', 'Balibago, Laguna', '15.1685', '120.5978', NULL, NULL, '17', 18, 65.00, 15, 2, 45, 0, '2022-01-09 12:50:16', '2022-01-09 12:50:16', NULL, NULL),
(38, 'Laguna Starbus', 'NXX 863', '10:00:00', '2022-03-25 07:00:00', 'Karuhatan Valenzuela', '14.6899', '120.9740', 'Meycauayan, Bulacan', '14.7499', '120.9739', NULL, NULL, '29', 30, 31.00, 19, 3, 45, 0, '2022-01-14 10:57:21', '2022-01-14 10:57:21', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bus_schedules`
--

CREATE TABLE `bus_schedules` (
  `schedule_id` bigint(20) UNSIGNED NOT NULL,
  `bus_id` int(11) NOT NULL,
  `operator_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `sub_region_id` int(11) NOT NULL,
  `depart_date` date NOT NULL,
  `return_date` date NOT NULL,
  `depart_time` time NOT NULL,
  `return_time` time NOT NULL,
  `pickup_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dropoff_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staus` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(11) NOT NULL,
  `driver_name` varchar(50) NOT NULL,
  `driver_address` varchar(50) NOT NULL,
  `driver_contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_02_101703_create_buses_table', 1),
(5, '2019_12_03_095623_create_operators_table', 1),
(6, '2019_12_03_095825_create_bookings_table', 1),
(7, '2019_12_03_095902_create_bus_schedules_table', 1),
(8, '2019_12_03_095934_create_regions_table', 1),
(9, '2019_12_03_095957_create_sub_regions_table', 1),
(10, '2019_12_03_100022_create_customers_table', 1),
(11, '2022_01_02_121658_create_passenger_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `operators`
--

CREATE TABLE `operators` (
  `operator_id` bigint(20) UNSIGNED NOT NULL,
  `terminal_id` int(50) NOT NULL,
  `operator_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operator_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operator_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operator_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operator_logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `operators`
--

INSERT INTO `operators` (`operator_id`, `terminal_id`, `operator_name`, `operator_email`, `operator_phone`, `operator_address`, `operator_logo`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bovjen Transport Services', 'bovjen@gmail.com', '09456328669', 'Sitio Pintong Bato Guyong, 3022 Santa Maria', ' ', 0, '2022-01-15 00:25:54', '2022-01-15 00:25:54'),
(8, 1, 'Prince Mckhaine Transport Inc.', 'prince@gmail.com', '9423763240', 'test123', '184462242.jpg', 0, '2022-01-02 23:30:01', '2022-01-02 23:30:01'),
(15, 0, 'BBL Company', 'bbl@gmail.com', '0920 296 5945', 'Taft Avenue, 1302 Pasay City', ' ', 0, '2022-01-03 00:13:34', '2022-01-03 00:13:34'),
(19, 0, 'Laguna Starbus Transportation System, INC.,', 'laguna@gmail.com', '(02) 234430', '311 McArthur Highway, Karuhatan, , Valenzuela City', ' ', 0, '2022-01-14 10:53:56', '2022-01-14 10:53:56'),
(20, 1, 'Bigaa Buslink Transport Inc.', 'bigaa@gmail.com', '09568463665', '729 MacArthur Hwy, Balagtas, Bulacan', ' ', 0, '2022-01-15 00:24:02', '2022-01-15 00:24:02'),
(23, 1, 'AC Transit', 'ac@gmail.com', '09603546695', '10 PNB Homes Barcelon Street, 1740 Las Pinas City', ' ', 0, '2022-01-16 07:11:50', '2022-01-16 07:11:50'),
(25, 9, 'New Terminal Services', 'new@gmail.com', '09123456789', 'Pasig City', ' ', 0, '2022-03-08 03:20:50', '2022-03-08 03:20:50'),
(26, 2, 'BBL Company', 'bblcompany@gmail.com', '0920 296 5945', 'Taft Avenue, 1302 Pasay City', ' ', 0, '2022-03-10 07:40:14', '2022-03-10 07:40:14');

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `passenger_id` bigint(20) UNSIGNED NOT NULL,
  `passenger_ticket` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passenger_lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passenger_fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passenger_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passenger_contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passenger_email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passenger_bday` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `passenger_age` int(10) NOT NULL,
  `passenger_lstat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passenger_seat_id` int(11) NOT NULL,
  `passenger_total` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passenger_payment` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passenger_mode` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passenger_bus_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passenger_terminal` int(50) DEFAULT NULL,
  `passenger_created_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`passenger_id`, `passenger_ticket`, `passenger_lname`, `passenger_fname`, `passenger_address`, `passenger_contact`, `passenger_email`, `passenger_bday`, `passenger_age`, `passenger_lstat`, `passenger_seat_id`, `passenger_total`, `passenger_payment`, `passenger_mode`, `passenger_bus_id`, `passenger_terminal`, `passenger_created_date`, `created_at`, `updated_at`) VALUES
(3, 'BO280A', 'Selwyn', 'Tayong', 'Udm.tondo manila', '123456789123', 'selwyntayong12@gmail.com', '2022-01-27 13:20:40', 22, 'student', 280, '25.2', 'Paid', 'gcash', '30', 1, '2022-01-20', NULL, NULL),
(5, 'BB201A', 'CLARISSA', 'LAVARIAS', '14 Mariveles St. Quezon City', '09194215216', 'clarissalavarias@gmail.com', '2022-01-27 13:37:41', 19, 'student', 201, '58.5', NULL, 'gcash', '37', 2, '2022-01-27', NULL, NULL),
(6, 'BO289A', 'Angeline', 'Reyes', 'Caloocan city', '09163938418', 'angelinefatimareyes885@gmail.com', '2022-01-27 13:56:56', 18, 'student', 289, '25.2', 'Paid', 'gcash', '30', 1, '2022-01-27', NULL, NULL),
(7, 'BO276A', 'Kristian', 'Ramirez', '932 negros', '09157651518', 'kristianramirez218@gmail.com', '2022-01-27 14:10:02', 21, 'student', 276, '25.2', NULL, 'bank Transfer', '30', 1, '2022-01-27', NULL, NULL),
(8, 'BO283A', 'Gidor', 'Elen', 'Pasay', '09773048980', 'eleonorgidor@gmail.com', '2022-01-27 14:17:48', 22, 'student', 283, '25.2', 'Paid', 'gcash', '30', 1, '2022-01-27', NULL, NULL),
(9, 'BB197A', 'MILLEN', 'PAJAYAT', 'TENEMENT BUILDING PUNTA STA.ANA, MANILA', '09956604746', 'millenpajayat25@gmail.com', '2022-01-27 14:36:41', 21, 'student', 197, '58.5', NULL, 'gcash', '37', 2, '2022-01-27', NULL, NULL),
(10, 'LA238A', 'Aira Erika', 'Torres', '1283 int 30 St. Sta. Cruz Manila', '09970646710', 'ariaserrot21@gmail.com', '2022-01-27 14:37:23', 23, 'student', 238, '27.9', NULL, 'Payment Option', '38', 3, '2022-01-27', NULL, NULL),
(11, 'BO294A', 'Resty', 'Gomez', '1283 int 30 St. Sta. Cruz Manila', '09915210059', 'ytser.001@Gmail.com', '2022-01-27 14:41:03', 25, 'student', 294, '25.2', NULL, 'gcash', '30', 1, '2022-01-27', NULL, NULL),
(12, 'BB196A', 'Luisa', 'Pracullos', 'Paco, manila', '09392492913', 'xxluisapracullos@gmail.com', '2022-01-27 14:50:01', 21, 'adult', 196, '65.00', NULL, 'gcash', '37', 2, '2022-01-27', NULL, NULL),
(13, 'BO316A', 'Heinrick', 'Espiritu', '406 C int. 3 Pavia st. Tondo, Manila', '09298476054', 'heinrickespiritu@gmail.com', '2022-01-27 15:06:10', 21, 'student', 316, '25.2', NULL, 'gcash', '30', 1, '2022-01-27', NULL, NULL),
(14, 'LA255A', 'Jia', 'Reas', '270 D. Aquino Ext 2nd Ave Caloocan City', '09352918184', 'jiareas2001@gmail.com', '2022-01-27 15:24:54', 21, 'student', 255, '27.9', 'Paid', 'gcash', '38', 3, '2022-01-27', NULL, NULL),
(15, 'BO285A', 'Mafe', 'Segundo', '2872 Rizal ave sta cruz Manila', '09517885536', 'mafefedoc@gmail.com', '2022-01-27 15:25:02', 21, 'student', 285, '25.2', 'Paid', 'gcash', '30', 1, '2022-01-27', NULL, NULL),
(16, 'BO279A', 'Elaine', 'Orevillo', 'Baseco Port Area Manila', '09661501684', 'orevillo.elaine22@gmail.com', '2022-01-27 15:26:03', 24, 'student', 279, '25.2', NULL, 'gcash', '30', 1, '2022-01-27', NULL, NULL),
(17, 'BB193A', 'Princess Angela', 'Marcos', '1340 Int. 8 Burgos St. Paco, Manila', '0916-991-5717', 'princessangelamarcos012@gmail.com', '2022-01-27 15:26:15', 20, 'student', 193, '58.5', NULL, 'gcash', '37', 2, '2022-01-27', NULL, NULL),
(19, 'BO277A', 'Ellaine', 'Santos', '994 Tondo, Manila', '09086882426', 'ellejysnts@gmail.com', '2022-01-27 15:45:37', 22, 'student', 277, '25.2', NULL, 'gcash', '30', 1, '2022-01-27', NULL, NULL),
(21, 'BO274A', 'EDRIAN', 'ESTROPIA', 'sta.quiteria, caloocan', '09171130652', 'edrian.joaquin.work@gmail.com', '2022-01-27 16:00:11', 27, 'adult', 274, '28.00', NULL, 'gcash', '30', 1, '2022-01-28', NULL, NULL),
(22, 'BO281A', 'marielle', 'lavarias', '14 mariveles st quezon city', '09565888201', 'sylorbro@gmail.com', '2022-01-27 19:00:34', 21, 'student', 281, '25.2', NULL, 'gcash', '30', 1, '2022-01-28', NULL, NULL),
(23, 'BO286A', 'Girlie', 'Dela Cruz', 'Quezon City', '09656456782', 'girliecruz807@gmail.com', '2022-01-27 20:27:05', 19, 'student', 286, '25.2', NULL, 'Payment Option', '30', 1, '2022-01-28', NULL, NULL),
(25, 'BO292A', 'Jericho', 'Evangelista', '754 Kagandahan St.', '09953425756', 'jecsevangelista@gmail.com', '2022-01-27 23:10:38', 22, 'student', 292, '25.2', NULL, 'gcash', '30', 1, '2022-01-28', NULL, NULL),
(27, 'BO295A', 'Matthew', 'Arroyo', '1881 Trinidad Rizal St. Tondo, Manila', '09219104684', 'mtthwarroyo24@gmail.com', '2022-01-28 03:45:11', 22, 'student', 295, '25.2', NULL, 'bank Transfer', '30', 1, '2022-01-28', NULL, NULL),
(28, 'BO296A', 'Sharie', 'Plancia', 'Paco, Manila', '09123456789', 'spp.army114@gmail.com', '2022-01-29 06:52:43', 0, 'student', 296, '25.2', NULL, 'gcash', '30', 1, '2022-01-29', NULL, NULL),
(30, 'AC69A', 'Marc', 'Cruz', '1251 Sawata A-1', '09106394489', 'marcangelocruz@rocketmail.com', '2022-01-29 10:18:20', 21, 'student', 69, '25.2', NULL, 'bank Transfer', '34', 1, '2022-01-29', NULL, NULL),
(31, 'BB199A', 'Hanna Grace', 'Ayop', 'Block 35 Lot 3 Logwood Street Central Phase 3, Camella Springville Molino 3, Camella Springville Molino 3', '09278367156', 'hanna.grcae16@gmail.com', '2022-02-04 13:18:15', 22, 'adult', 199, '65.00', NULL, 'gcash', '37', 2, '2022-02-04', NULL, NULL),
(32, 'BO291A', 'Kim', 'Santos', '2872 Rizal ave sta cruz manila', '09568345258', 'kimsantos@gmail.com', '2022-02-04 13:20:37', 22, 'student', 291, '25.2', NULL, 'bank Transfer', '30', 1, '2022-02-04', NULL, NULL),
(33, 'AC58A', 'Marianne', 'Lumba', '1251 G. Tambunting St. Sta. Cruz, Manila', '09953922876', 'mariannekimx@gmail.com', '2022-02-04 13:21:00', 21, 'student', 58, '25.2', NULL, 'gcash', '34', 1, '2022-02-04', NULL, NULL),
(34, 'BB198A', 'Hanna Grace', 'Ayop', 'Block 35 Lot 3 Logwood Street Central Phase 3, Camella Springville Molino 3, Camella Springville Molino 3', '09278367156', 'hanna.grcae16@gmail.com', '2022-02-04 13:22:01', 22, 'adult', 198, '65.00', NULL, 'gcash', '37', 2, '2022-02-04', NULL, NULL),
(35, 'PR10A', 'rissa', 'gomez', 'sksj', '09602139873', 'rissagomez027@gmail.com', '2022-02-04 13:50:11', 21, 'child', 10, '25.2', NULL, 'gcash', '32', 1, '2022-02-04', NULL, NULL),
(36, 'LA234A', 'rissa', 'gomez', 'Manila city', '09569483996', 'rissagomez027@gmail.com', '2022-02-04 13:57:58', 21, 'student', 234, '27.9', NULL, 'gcash', '38', 3, '2022-02-04', NULL, NULL),
(37, 'BB200A', 'Brix Ledif', 'Bedia', '2920 Clemente Street, Gagalangin, Tondo, Manila, Barangay 178, 1013', '09163634124', 'brixbedia19@gmail.com', '2022-02-04 14:02:47', 22, 'student', 200, '58.5', NULL, 'gcash', '37', 2, '2022-02-04', NULL, NULL),
(38, 'BO288A', 'Namz', 'Amaro', 'Test', '09159461868', 'anamaeamaro2019@gmail.com', '2022-02-04 14:32:31', 16, 'child', 288, '25.2', NULL, 'bank Transfer', '30', 1, '2022-02-04', NULL, NULL),
(46, 'BB185A', 'Jenny', 'Antonio', 'Block13, Lot59 Southgate1, Springtown Villas, Bucal Tanza, Cavite', '09365365479', 'jhonny01@gmail.com', '2022-02-04 15:12:40', 29, 'adult', 185, '65.00', NULL, 'gcash', '37', 2, '2022-02-04', NULL, NULL),
(47, 'BO290A', 'Jose Mikaelo', 'Perito', '410 Capulong Street Tondo Manila', '09151151972', 'josemikaeloperito@gmail.com', '2022-02-05 04:37:54', 22, 'student', 290, '25.2', NULL, 'gcash', '30', 1, '2022-02-05', NULL, NULL),
(48, 'BO284A', 'Aljon', 'Mariano', '1234 st. Brgy.567 manila', '12345678910', 'alfredomariano31@gmail.com', '2022-02-05 07:14:12', 25, 'student', 284, '25.2', NULL, 'gcash', '30', 1, '2022-02-05', NULL, NULL),
(49, 'BO278A', 'Kevin', 'Lim', 'Manila', '09623185', 'kevinrey012@gmail.com', '2022-02-05 07:21:00', 24, 'adult', 278, '28.00', NULL, 'gcash', '30', 1, '2022-02-05', NULL, NULL),
(50, 'BO272A', 'mark', 'luriz', '1433 dagupan st. Tondo manila', '09350153275', 'lurizmark22@gmail.com', '2022-02-05 07:41:09', 24, 'student', 272, '25.2', NULL, 'gcash', '30', 1, '2022-02-05', NULL, NULL),
(51, 'BB182A', 'Joshue', 'Mamarsel', '123 ABC St. Tondo, Manila', '09911231231', 'jm@gmail.com', '2022-02-05 09:18:10', 23, 'student', 182, '58.5', NULL, 'gcash', '37', 2, '2022-02-05', NULL, NULL),
(52, 'BI107A', 'Joanna Mae', 'Bolor', 'Tondo, Manila', '09086882426', 'ellejysnts@gmail.com', '2022-02-10 16:30:20', 21, 'student', 107, '25.2', NULL, 'gcash', '35', 1, '2022-02-11', NULL, NULL),
(53, 'BO299A', 'Shammie', 'Salvador', 'Sta. Cruz, Manila', '09552374561', 'ellejysnts@gmail.com', '2022-02-10 16:40:51', 24, 'student', 299, '25.2', NULL, 'bank Transfer', '30', 1, '2022-02-11', NULL, NULL),
(54, 'PR42A', 'Allana', 'Nicdao', 'Manila', '09754583691', 'ellejysnts@gmail.com', '2022-02-10 16:45:43', 23, 'student', 42, '25.2', NULL, 'bank Transfer', '32', 1, '2022-02-11', NULL, NULL),
(55, 'PR7A', 'Santos', 'Patrick', 'Tondo, Manila', '09394561278', 'ellejysnts@gmail.com', '2022-02-10 16:47:47', 26, 'adult', 7, '28.00', NULL, 'gcash', '32', 1, '2022-02-11', NULL, NULL),
(56, 'LA241A', 'Genessie', 'Canlas', 'Sta. Cruz, Manila', '09552374561', 'ellejysnts@gmail.com', '2022-02-10 16:50:57', 24, 'adult', 241, '31.00', NULL, 'gcash', '38', 3, '2022-02-11', NULL, NULL),
(57, 'AC60A', 'Gwen', 'Soriano', 'Mandaluyong', '09394569213', 'ellejysnts@gmail.com', '2022-02-10 16:55:46', 19, 'student', 60, '25.2', NULL, 'gcash', '34', 1, '2022-02-11', NULL, NULL),
(58, 'AC66A', 'Phobie', 'Salas', 'Tondo, Manila', '09752564531', 'ellejysnts@gmail.com', '2022-02-10 16:58:28', 23, 'adult', 66, '28.00', NULL, 'gcash', '34', 1, '2022-02-11', NULL, NULL),
(59, 'BB188A', 'Rose Belle', 'Gamboa', 'Taguig', '09467648963', 'ellejysnts@gmail.com', '2022-02-10 17:01:55', 21, 'student', 188, '58.5', NULL, 'gcash', '37', 2, '2022-02-11', NULL, NULL),
(60, 'BB190A', 'Karl', 'De Guzman', 'Tondo, Manila', '09051563274', 'ellejysnts@gmail.com', '2022-02-10 17:06:39', 31, 'adult', 190, '65.00', NULL, 'bank Transfer', '37', 2, '2022-02-11', NULL, NULL),
(61, 'BB221A', 'Nomer', 'Sarmiento', 'Tondo, Manila', '09204789632', 'ellejysnts@gmail.com', '2022-02-10 17:10:06', 32, 'adult', 221, '65.00', NULL, 'bank Transfer', '37', 2, '2022-02-11', NULL, NULL),
(62, 'BB219A', 'Cassandra', 'Rellizan', 'Coral st. tondom, manila', '0987654321', 'cassy@gmail.com', '2022-03-02 07:25:14', 23, 'student', 219, '58.5', NULL, 'gcash', '37', 2, '2022-03-02', NULL, NULL),
(63, 'BB219A', 'Cassandra', 'Rellizan', 'Coral st. tondom, manila', '0987654321', 'cassy@gmail.com', '2022-03-02 07:30:30', 23, 'student', 219, '58.5', NULL, 'gcash', '37', 2, '2022-03-02', NULL, NULL),
(64, 'BO300A', 'Julie', 'Cruz', 'Block13, Lot59 Southgate1,, Springtown Villas, Bucal Tanza, Cavite', '09365365479', 'julierose.28a@gmail.com', '2022-03-03 12:56:21', 22, 'adult', 300, '28.00', NULL, 'gcash', '30', 1, '2022-03-03', NULL, NULL),
(65, 'PR30A', 'Marc', 'Cruz', 'Caloocan', '09365365479', 'julierose.28a@gmail.com', '2022-03-04 10:04:28', 21, 'adult', 30, '28.00', NULL, 'bank Transfer', '32', 1, '2022-03-04', NULL, NULL),
(66, 'BO297A', 'Julie', 'Rose', 'Block13, Lot59 Southgate1,, Springtown Villas, Bucal Tanza, Cavite', '09365365479', 'beayoo.arivo17@gmail.com', '2022-03-04 10:12:29', 21, 'student', 297, '25.2', NULL, 'gcash', '30', 1, '2022-03-04', NULL, NULL),
(67, 'BO297A', 'Julie', 'Rose', 'Block13, Lot59 Southgate1,, Springtown Villas, Bucal Tanza, Cavite', '09365365479', 'beayoo.arivo17@gmail.com', '2022-03-04 10:12:29', 21, 'student', 297, '25.2', NULL, 'gcash', '30', 1, '2022-03-04', NULL, NULL),
(68, 'AC71A', 'Acey', 'Boni', 'Manila', '09278663216', 'dev@gmail.com', '2022-03-05 04:45:10', 23, 'adult', 71, '28.00', NULL, 'bank Transfer', '34', 1, '2022-03-05', NULL, NULL),
(69, 'LA233A', 'alu', 'arcilla', 'Pajjo, Manila', '09456556906', 'aluarcilla@gmail.com', '2022-03-05 08:48:27', 21, 'student', 233, '27.9', NULL, 'Payment Option', '38', 3, '2022-03-05', NULL, NULL),
(117, 'BO273A', 'Ana', 'Amaro', 'test1234343', '09159461868', 'ana@gmail.com', '2022-03-05 14:12:57', 20, 'adult', 273, '28.00', NULL, 'gcash', '30', 1, '2022-03-05', NULL, NULL),
(123, 'BB195A', 'kiko', 'fernandez', 'Manila', '09654556906', 'kikofernandez@gmail.com', '2022-03-06 14:41:49', 23, 'student', 195, '58.5', NULL, 'Payment Option', '37', 2, '2022-03-06', NULL, NULL),
(124, 'BO273A', 'Namz', 'Amaro', 'test123', '09159461868', 'anamaeamaro2019@gmail.com', '2022-03-06 14:43:22', 18, 'student', 273, '25.2', NULL, 'gcash', '30', 1, '2022-03-06', NULL, NULL),
(125, 'BO282A', 'Leo', 'Pored', 'Manila', '09567480998', 'leopored@gmail.com', '2022-03-06 14:43:42', 23, 'child', 282, '25.2', NULL, 'gcash', '30', 1, '2022-03-06', NULL, NULL),
(126, 'BO282A', 'Leo', 'Pored', 'Manila', '09567480998', 'leopored@gmail.com', '2022-03-06 14:49:54', 23, 'child', 282, '25.2', NULL, 'gcash', '30', 1, '2022-03-06', NULL, NULL),
(127, 'BO302A', 'Jayson', 'Hernandez', 'Manila', '09567489330', 'jaysonhernandez@gmail.com', '2022-03-06 14:51:59', 23, 'senior', 302, '25.2', NULL, 'Payment Option', '30', 1, '2022-03-06', NULL, NULL),
(129, 'BO275A', 'Vanilla', 'Gomez', 'Manila', '09567890448', 'vanillagomez@gmail.com', '2022-03-12 15:37:24', 21, 'student', 275, '25.2', 'Unpaid', 'Payment Option', '30', 1, '2022-03-12', NULL, NULL),
(130, 'BO293A', 'Lucas', 'De Vera', 'Manila', '09567894009', 'lucas@gmail.com', '2022-03-13 13:57:07', 23, 'student', 293, '25.2', NULL, 'gcash', '30', 1, '2022-03-13', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('anamaeamaro2019@gmail.com', '$2y$10$0Nn/cuIS612OUZ549m2C9./kNbZn5.9OY6L9k1X9yfKOB.uLFj96C', '2022-01-07 01:51:58');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `region_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` int(11) NOT NULL,
  `bus_seat_code` varchar(100) NOT NULL,
  `seat_number` int(50) NOT NULL,
  `seat_status` int(10) NOT NULL,
  `sit_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`id`, `bus_seat_code`, `seat_number`, `seat_status`, `sit_created_at`) VALUES
(2, 'ACP 4283', 1, 0, '2022-03-05 13:54:39'),
(3, 'ACP 4283', 2, 0, '2022-01-18 10:05:35'),
(4, 'ACP 4283', 3, 0, '2022-03-05 13:57:47'),
(5, 'ACP 4283', 4, 0, '2022-01-04 10:20:46'),
(6, 'ACP 4283', 5, 0, '2022-01-04 10:20:46'),
(7, 'ACP 4283', 6, 1, '2022-02-10 16:47:47'),
(8, 'ACP 4283', 7, 0, '2022-01-18 10:05:35'),
(9, 'ACP 4283', 8, 0, '2022-01-04 10:20:46'),
(10, 'ACP 4283', 9, 1, '2022-02-04 13:50:11'),
(11, 'ACP 4283', 10, 1, '2022-03-05 13:06:07'),
(12, 'ACP 4283', 11, 1, '2022-03-05 13:03:37'),
(13, 'ACP 4283', 12, 0, '2022-01-04 10:20:46'),
(14, 'ACP 4283', 13, 0, '2022-01-18 10:05:35'),
(15, 'ACP 4283', 14, 0, '2022-01-18 10:05:35'),
(16, 'ACP 4283', 15, 0, '2022-01-28 03:39:52'),
(17, 'ACP 4283', 16, 0, '2022-01-31 11:14:43'),
(18, 'ACP 4283', 17, 0, '2022-01-18 10:05:35'),
(19, 'ACP 4283', 18, 0, '2022-01-18 10:05:35'),
(20, 'ACP 4283', 19, 0, '2022-01-18 10:05:35'),
(21, 'ACP 4283', 20, 0, '2022-01-04 10:20:46'),
(22, 'ACP 4283', 21, 0, '2022-01-18 10:05:35'),
(23, 'ACP 4283', 22, 0, '2022-01-18 10:05:35'),
(24, 'ACP 4283', 23, 0, '2022-01-04 10:20:46'),
(25, 'ACP 4283', 24, 0, '2022-01-18 10:05:35'),
(26, 'ACP 4283', 25, 0, '2022-01-18 10:05:35'),
(27, 'ACP 4283', 26, 0, '2022-01-04 10:20:46'),
(28, 'ACP 4283', 27, 0, '2022-01-04 10:20:46'),
(29, 'ACP 4283', 28, 0, '2022-01-18 10:05:35'),
(30, 'ACP 4283', 29, 1, '2022-03-04 10:04:28'),
(31, 'ACP 4283', 30, 0, '2022-01-04 10:20:46'),
(32, 'ACP 4283', 31, 0, '2022-01-04 10:20:46'),
(33, 'ACP 4283', 32, 0, '2022-01-04 10:20:46'),
(34, 'ACP 4283', 33, 0, '2022-01-04 10:20:46'),
(35, 'ACP 4283', 34, 0, '2022-01-04 10:20:46'),
(36, 'ACP 4283', 35, 0, '2022-01-04 10:20:46'),
(37, 'ACP 4283', 36, 0, '2022-01-04 10:20:46'),
(38, 'ACP 4283', 37, 0, '2022-01-04 10:20:46'),
(39, 'ACP 4283', 38, 0, '2022-01-04 10:20:46'),
(40, 'ACP 4283', 39, 0, '2022-01-04 10:20:47'),
(41, 'ACP 4283', 40, 0, '2022-01-04 10:20:47'),
(42, 'ACP 4283', 41, 1, '2022-02-10 16:45:43'),
(43, 'ACP 4283', 42, 0, '2022-01-04 10:20:47'),
(44, 'ACP 4283', 43, 0, '2022-01-04 10:20:47'),
(45, 'ACP 4283', 44, 0, '2022-01-04 10:20:47'),
(46, 'ACP 4283', 45, 0, '2022-01-04 10:20:47'),
(47, 'TAW 673', 1, 0, '2022-01-18 10:05:35'),
(48, 'TAW 673', 2, 0, '2022-01-18 10:05:35'),
(49, 'TAW 673', 3, 0, '2022-01-05 00:16:26'),
(50, 'TAW 673', 4, 0, '2022-01-05 00:16:26'),
(51, 'TAW 673', 5, 0, '2022-01-05 00:16:26'),
(52, 'TAW 673', 6, 0, '2022-01-05 00:16:26'),
(53, 'TAW 673', 7, 0, '2022-01-05 00:16:26'),
(54, 'TAW 673', 8, 0, '2022-01-05 00:16:26'),
(55, 'TAW 673', 9, 0, '2022-01-05 00:16:26'),
(56, 'TAW 673', 10, 0, '2022-01-28 14:27:38'),
(57, 'TAW 673', 11, 0, '2022-01-05 00:16:26'),
(58, 'TAW 673', 12, 1, '2022-02-04 13:21:00'),
(59, 'TAW 673', 13, 0, '2022-01-05 00:16:26'),
(60, 'TAW 673', 14, 1, '2022-02-10 16:55:46'),
(61, 'TAW 673', 15, 0, '2022-01-05 00:16:26'),
(62, 'TAW 673', 16, 0, '2022-01-05 00:16:26'),
(63, 'TAW 673', 17, 0, '2022-01-05 00:16:26'),
(64, 'TAW 673', 18, 0, '2022-01-05 00:16:26'),
(65, 'TAW 673', 19, 0, '2022-01-05 00:16:26'),
(66, 'TAW 673', 20, 1, '2022-02-10 16:58:28'),
(67, 'TAW 673', 21, 0, '2022-01-05 00:16:26'),
(68, 'TAW 673', 22, 0, '2022-01-05 00:16:26'),
(69, 'TAW 673', 23, 1, '2022-01-29 10:18:20'),
(70, 'TAW 673', 24, 0, '2022-01-05 00:16:26'),
(71, 'TAW 673', 25, 1, '2022-03-05 04:45:10'),
(72, 'TAW 673', 26, 0, '2022-01-05 00:16:26'),
(73, 'TAW 673', 27, 0, '2022-01-05 00:16:26'),
(74, 'TAW 673', 28, 0, '2022-01-05 00:16:26'),
(75, 'TAW 673', 29, 0, '2022-01-05 00:16:26'),
(76, 'TAW 673', 30, 0, '2022-01-05 00:16:26'),
(77, 'TAW 673', 31, 0, '2022-01-05 00:16:26'),
(78, 'TAW 673', 32, 0, '2022-01-05 00:16:26'),
(79, 'TAW 673', 33, 0, '2022-01-05 00:16:26'),
(80, 'TAW 673', 34, 0, '2022-01-05 00:16:26'),
(81, 'TAW 673', 35, 0, '2022-01-05 00:16:26'),
(82, 'TAW 673', 36, 0, '2022-01-05 00:16:26'),
(83, 'TAW 673', 37, 0, '2022-01-05 00:16:26'),
(84, 'TAW 673', 38, 0, '2022-01-05 00:16:26'),
(85, 'TAW 673', 39, 0, '2022-01-05 00:16:26'),
(86, 'TAW 673', 40, 0, '2022-01-05 00:16:26'),
(87, 'TAW 673', 41, 0, '2022-01-05 00:16:26'),
(88, 'TAW 673', 42, 0, '2022-01-05 00:16:26'),
(89, 'TAW 673', 43, 0, '2022-01-05 00:16:26'),
(90, 'TAW 673', 44, 0, '2022-01-05 00:16:26'),
(91, 'TAW 673', 45, 0, '2022-01-05 00:16:26'),
(92, 'ABF8641', 1, 0, '2022-01-18 10:05:35'),
(93, 'ABF8641', 2, 0, '2022-01-18 10:05:35'),
(94, 'ABF8641', 3, 0, '2022-01-05 23:34:21'),
(95, 'ABF8641', 4, 0, '2022-01-05 23:34:21'),
(96, 'ABF8641', 5, 0, '2022-01-05 23:34:21'),
(97, 'ABF8641', 6, 0, '2022-01-05 23:34:21'),
(98, 'ABF8641', 7, 0, '2022-01-05 23:34:21'),
(99, 'ABF8641', 8, 0, '2022-01-05 23:34:21'),
(100, 'ABF8641', 9, 0, '2022-01-05 23:34:21'),
(101, 'ABF8641', 10, 0, '2022-01-18 10:05:35'),
(102, 'ABF8641', 11, 0, '2022-01-05 23:34:21'),
(103, 'ABF8641', 12, 0, '2022-01-05 23:34:21'),
(104, 'ABF8641', 13, 0, '2022-01-05 23:34:21'),
(105, 'ABF8641', 14, 0, '2022-01-05 23:34:21'),
(106, 'ABF8641', 15, 0, '2022-01-05 23:34:21'),
(107, 'ABF8641', 16, 1, '2022-02-10 16:30:20'),
(108, 'ABF8641', 17, 0, '2022-01-05 23:34:21'),
(109, 'ABF8641', 18, 0, '2022-01-05 23:34:21'),
(110, 'ABF8641', 19, 0, '2022-01-05 23:34:21'),
(111, 'ABF8641', 20, 0, '2022-01-05 23:34:21'),
(112, 'ABF8641', 21, 0, '2022-01-05 23:34:21'),
(113, 'ABF8641', 22, 0, '2022-01-05 23:34:21'),
(114, 'ABF8641', 23, 0, '2022-01-05 23:34:21'),
(115, 'ABF8641', 24, 0, '2022-01-05 23:34:21'),
(116, 'ABF8641', 25, 0, '2022-01-05 23:34:21'),
(117, 'ABF8641', 26, 0, '2022-01-05 23:34:21'),
(118, 'ABF8641', 27, 0, '2022-01-05 23:34:21'),
(119, 'ABF8641', 28, 0, '2022-01-05 23:34:21'),
(120, 'ABF8641', 29, 0, '2022-01-05 23:34:21'),
(121, 'ABF8641', 30, 0, '2022-01-05 23:34:21'),
(122, 'ABF8641', 31, 0, '2022-01-05 23:34:21'),
(123, 'ABF8641', 32, 0, '2022-01-05 23:34:21'),
(124, 'ABF8641', 33, 0, '2022-01-05 23:34:21'),
(125, 'ABF8641', 34, 0, '2022-01-05 23:34:21'),
(126, 'ABF8641', 35, 0, '2022-01-05 23:34:21'),
(127, 'ABF8641', 36, 0, '2022-01-05 23:34:21'),
(128, 'ABF8641', 37, 0, '2022-01-05 23:34:21'),
(129, 'ABF8641', 38, 0, '2022-01-05 23:34:21'),
(130, 'ABF8641', 39, 0, '2022-01-05 23:34:21'),
(131, 'ABF8641', 40, 0, '2022-01-05 23:34:21'),
(132, 'ABF8641', 41, 0, '2022-01-05 23:34:21'),
(133, 'ABF8641', 42, 0, '2022-01-05 23:34:21'),
(134, 'ABF8641', 43, 0, '2022-01-05 23:34:21'),
(135, 'ABF8641', 44, 0, '2022-01-05 23:34:21'),
(136, 'ABF8641', 45, 0, '2022-01-05 23:34:21'),
(137, '344554', 1, 0, '2022-01-07 19:56:12'),
(138, '344554', 2, 0, '2022-01-07 19:56:12'),
(139, '344554', 3, 0, '2022-01-07 19:56:12'),
(140, '344554', 4, 0, '2022-01-07 19:56:12'),
(141, '344554', 5, 0, '2022-01-07 19:56:12'),
(142, '344554', 6, 0, '2022-01-07 19:56:12'),
(143, '344554', 7, 0, '2022-01-07 19:56:12'),
(144, '344554', 8, 0, '2022-01-07 19:56:12'),
(145, '344554', 9, 0, '2022-01-07 19:56:12'),
(146, '344554', 10, 0, '2022-01-07 19:56:12'),
(147, '344554', 11, 0, '2022-01-07 19:56:12'),
(148, '344554', 12, 0, '2022-01-07 19:56:12'),
(149, '344554', 13, 0, '2022-01-07 19:56:12'),
(150, '344554', 14, 0, '2022-01-07 19:56:12'),
(151, '344554', 15, 0, '2022-01-07 19:56:12'),
(152, '344554', 16, 0, '2022-01-07 19:56:12'),
(153, '344554', 17, 0, '2022-01-07 19:56:12'),
(154, '344554', 18, 0, '2022-01-07 19:56:12'),
(155, '344554', 19, 0, '2022-01-07 19:56:12'),
(156, '344554', 20, 0, '2022-01-07 19:56:12'),
(157, '344554', 21, 0, '2022-01-07 19:56:12'),
(158, '344554', 22, 0, '2022-01-07 19:56:12'),
(159, '344554', 23, 0, '2022-01-07 19:56:12'),
(160, '344554', 24, 0, '2022-01-07 19:56:12'),
(161, '344554', 25, 0, '2022-01-07 19:56:12'),
(162, '344554', 26, 0, '2022-01-07 19:56:12'),
(163, '344554', 27, 0, '2022-01-07 19:56:12'),
(164, '344554', 28, 0, '2022-01-07 19:56:12'),
(165, '344554', 29, 0, '2022-01-07 19:56:12'),
(166, '344554', 30, 0, '2022-01-07 19:56:12'),
(167, '344554', 31, 0, '2022-01-07 19:56:12'),
(168, '344554', 32, 0, '2022-01-07 19:56:12'),
(169, '344554', 33, 0, '2022-01-07 19:56:12'),
(170, '344554', 34, 0, '2022-01-07 19:56:12'),
(171, '344554', 35, 0, '2022-01-07 19:56:12'),
(172, '344554', 36, 0, '2022-01-07 19:56:12'),
(173, '344554', 37, 0, '2022-01-07 19:56:12'),
(174, '344554', 38, 0, '2022-01-07 19:56:12'),
(175, '344554', 39, 0, '2022-01-07 19:56:12'),
(176, '344554', 40, 0, '2022-01-07 19:56:12'),
(177, '344554', 41, 0, '2022-01-07 19:56:12'),
(178, '344554', 42, 0, '2022-01-07 19:56:12'),
(179, '344554', 43, 0, '2022-01-07 19:56:12'),
(180, '344554', 44, 0, '2022-01-07 19:56:12'),
(181, '344554', 45, 0, '2022-01-07 19:56:12'),
(182, 'TYU 481', 1, 1, '2022-02-05 09:18:10'),
(183, 'TYU 481', 2, 0, '2022-01-09 12:50:16'),
(184, 'TYU 481', 3, 0, '2022-01-09 12:50:16'),
(185, 'TYU 481', 4, 1, '2022-02-04 15:12:40'),
(186, 'TYU 481', 5, 0, '2022-01-09 12:50:16'),
(187, 'TYU 481', 6, 0, '2022-01-09 12:50:16'),
(188, 'TYU 481', 7, 1, '2022-02-10 17:01:55'),
(189, 'TYU 481', 8, 0, '2022-01-09 12:50:16'),
(190, 'TYU 481', 9, 1, '2022-02-10 17:06:39'),
(191, 'TYU 481', 10, 0, '2022-01-09 12:50:16'),
(192, 'TYU 481', 11, 0, '2022-01-09 12:50:16'),
(193, 'TYU 481', 12, 1, '2022-01-27 15:26:15'),
(194, 'TYU 481', 13, 0, '2022-01-09 12:50:16'),
(195, 'TYU 481', 14, 1, '2022-03-06 14:41:49'),
(196, 'TYU 481', 15, 1, '2022-01-27 14:50:01'),
(197, 'TYU 481', 16, 1, '2022-01-27 14:36:41'),
(198, 'TYU 481', 17, 1, '2022-02-04 13:22:01'),
(199, 'TYU 481', 18, 1, '2022-02-04 13:18:15'),
(200, 'TYU 481', 19, 1, '2022-02-04 14:02:47'),
(201, 'TYU 481', 20, 1, '2022-01-27 13:37:41'),
(202, 'TYU 481', 21, 0, '2022-01-09 12:50:16'),
(203, 'TYU 481', 22, 0, '2022-01-09 12:50:16'),
(204, 'TYU 481', 23, 0, '2022-01-09 12:50:16'),
(205, 'TYU 481', 24, 0, '2022-01-09 12:50:16'),
(206, 'TYU 481', 25, 0, '2022-01-09 12:50:16'),
(207, 'TYU 481', 26, 0, '2022-01-09 12:50:16'),
(208, 'TYU 481', 27, 0, '2022-01-09 12:50:16'),
(209, 'TYU 481', 28, 0, '2022-01-09 12:50:16'),
(210, 'TYU 481', 29, 0, '2022-01-09 12:50:16'),
(211, 'TYU 481', 30, 0, '2022-01-09 12:50:16'),
(212, 'TYU 481', 31, 0, '2022-01-09 12:50:16'),
(213, 'TYU 481', 32, 0, '2022-01-09 12:50:16'),
(214, 'TYU 481', 33, 0, '2022-01-09 12:50:16'),
(215, 'TYU 481', 34, 0, '2022-01-09 12:50:16'),
(216, 'TYU 481', 35, 0, '2022-01-09 12:50:16'),
(217, 'TYU 481', 36, 0, '2022-01-09 12:50:16'),
(218, 'TYU 481', 37, 0, '2022-01-09 12:50:16'),
(219, 'TYU 481', 38, 1, '2022-03-02 07:25:14'),
(220, 'TYU 481', 39, 0, '2022-01-09 12:50:16'),
(221, 'TYU 481', 40, 1, '2022-02-10 17:10:06'),
(222, 'TYU 481', 41, 0, '2022-01-09 12:50:16'),
(223, 'TYU 481', 42, 0, '2022-01-09 12:50:16'),
(224, 'TYU 481', 43, 0, '2022-01-09 12:50:16'),
(225, 'TYU 481', 44, 0, '2022-01-09 12:50:16'),
(226, 'TYU 481', 45, 0, '2022-01-09 12:50:16'),
(227, 'NXX 863', 1, 0, '2022-01-18 10:05:35'),
(228, 'NXX 863', 2, 0, '2022-01-14 10:57:22'),
(229, 'NXX 863', 3, 0, '2022-01-14 10:57:22'),
(230, 'NXX 863', 4, 0, '2022-01-14 10:57:22'),
(231, 'NXX 863', 5, 0, '2022-01-14 10:57:22'),
(232, 'NXX 863', 6, 0, '2022-01-14 10:57:22'),
(233, 'NXX 863', 7, 1, '2022-03-05 08:48:27'),
(234, 'NXX 863', 8, 1, '2022-02-04 13:57:58'),
(235, 'NXX 863', 9, 0, '2022-01-14 10:57:22'),
(236, 'NXX 863', 10, 0, '2022-01-14 10:57:22'),
(237, 'NXX 863', 11, 0, '2022-01-14 10:57:22'),
(238, 'NXX 863', 12, 1, '2022-01-27 14:37:23'),
(239, 'NXX 863', 13, 0, '2022-01-14 10:57:22'),
(240, 'NXX 863', 14, 0, '2022-01-28 03:45:10'),
(241, 'NXX 863', 15, 1, '2022-02-10 16:50:57'),
(242, 'NXX 863', 16, 0, '2022-01-14 10:57:22'),
(243, 'NXX 863', 17, 0, '2022-01-14 10:57:22'),
(244, 'NXX 863', 18, 0, '2022-01-14 10:57:22'),
(245, 'NXX 863', 19, 0, '2022-01-14 10:57:22'),
(246, 'NXX 863', 20, 0, '2022-01-14 10:57:22'),
(247, 'NXX 863', 21, 0, '2022-01-14 10:57:22'),
(248, 'NXX 863', 22, 0, '2022-01-14 10:57:22'),
(249, 'NXX 863', 23, 0, '2022-01-14 10:57:22'),
(250, 'NXX 863', 24, 0, '2022-01-14 10:57:22'),
(251, 'NXX 863', 25, 0, '2022-01-14 10:57:22'),
(252, 'NXX 863', 26, 0, '2022-01-14 10:57:22'),
(253, 'NXX 863', 27, 0, '2022-01-14 10:57:22'),
(254, 'NXX 863', 28, 0, '2022-01-14 10:57:22'),
(255, 'NXX 863', 29, 1, '2022-01-27 15:16:12'),
(256, 'NXX 863', 30, 0, '2022-01-14 10:57:22'),
(257, 'NXX 863', 31, 0, '2022-01-14 10:57:22'),
(258, 'NXX 863', 32, 0, '2022-01-14 10:57:22'),
(259, 'NXX 863', 33, 0, '2022-01-14 10:57:22'),
(260, 'NXX 863', 34, 0, '2022-01-14 10:57:22'),
(261, 'NXX 863', 35, 0, '2022-01-14 10:57:22'),
(262, 'NXX 863', 36, 0, '2022-01-14 10:57:22'),
(263, 'NXX 863', 37, 0, '2022-01-14 10:57:22'),
(264, 'NXX 863', 38, 0, '2022-01-14 10:57:22'),
(265, 'NXX 863', 39, 0, '2022-01-14 10:57:22'),
(266, 'NXX 863', 40, 0, '2022-01-14 10:57:22'),
(267, 'NXX 863', 41, 0, '2022-01-14 10:57:22'),
(268, 'NXX 863', 42, 0, '2022-01-14 10:57:22'),
(269, 'NXX 863', 43, 0, '2022-01-14 10:57:22'),
(270, 'NXX 863', 44, 0, '2022-01-14 10:57:22'),
(271, 'NXX 863', 45, 0, '2022-01-14 10:57:22'),
(272, 'ZXW 574', 1, 1, '2022-02-05 07:41:09'),
(273, 'ZXW 574', 2, 1, '2022-03-06 14:43:22'),
(274, 'ZXW 574', 3, 1, '2022-01-27 16:00:11'),
(275, 'ZXW 574', 4, 1, '2022-03-12 15:33:58'),
(276, 'ZXW 574', 5, 1, '2022-01-27 14:10:02'),
(277, 'ZXW 574', 6, 1, '2022-01-27 15:45:37'),
(278, 'ZXW 574', 7, 1, '2022-02-05 07:21:00'),
(279, 'ZXW 574', 8, 1, '2022-01-27 15:26:03'),
(280, 'ZXW 574', 9, 1, '2022-01-19 16:29:05'),
(281, 'ZXW 574', 10, 1, '2022-01-27 19:00:34'),
(282, 'ZXW 574', 11, 1, '2022-03-06 14:43:42'),
(283, 'ZXW 574', 12, 1, '2022-01-27 14:14:00'),
(284, 'ZXW 574', 13, 1, '2022-02-05 07:14:12'),
(285, 'ZXW 574', 14, 1, '2022-01-27 15:21:53'),
(286, 'ZXW 574', 15, 1, '2022-01-27 20:27:05'),
(287, 'ZXW 574', 16, 1, '2022-02-04 14:34:13'),
(288, 'ZXW 574', 17, 1, '2022-02-04 14:32:31'),
(289, 'ZXW 574', 18, 1, '2022-01-27 13:51:55'),
(290, 'ZXW 574', 19, 1, '2022-02-05 04:37:54'),
(291, 'ZXW 574', 20, 1, '2022-02-04 13:20:37'),
(292, 'ZXW 574', 21, 1, '2022-01-27 23:10:38'),
(293, 'ZXW 574', 22, 1, '2022-03-13 13:57:07'),
(294, 'ZXW 574', 23, 1, '2022-01-27 14:41:03'),
(295, 'ZXW 574', 24, 1, '2022-01-28 03:45:11'),
(296, 'ZXW 574', 25, 1, '2022-01-29 06:52:43'),
(297, 'ZXW 574', 26, 1, '2022-03-04 10:12:29'),
(298, 'ZXW 574', 27, 0, '2022-03-13 14:21:01'),
(299, 'ZXW 574', 28, 1, '2022-02-10 16:40:51'),
(300, 'ZXW 574', 29, 1, '2022-03-03 12:56:21'),
(301, 'ZXW 574', 30, 0, '2022-01-16 09:03:01'),
(302, 'ZXW 574', 31, 1, '2022-03-06 14:51:59'),
(303, 'ZXW 574', 32, 0, '2022-01-16 09:03:01'),
(304, 'ZXW 574', 33, 0, '2022-01-16 09:03:01'),
(305, 'ZXW 574', 34, 0, '2022-01-16 09:03:01'),
(306, 'ZXW 574', 35, 0, '2022-01-18 10:05:35'),
(307, 'ZXW 574', 36, 0, '2022-01-16 09:03:01'),
(308, 'ZXW 574', 37, 0, '2022-01-16 09:03:01'),
(309, 'ZXW 574', 38, 0, '2022-01-16 09:03:01'),
(310, 'ZXW 574', 39, 0, '2022-01-16 09:03:01'),
(311, 'ZXW 574', 40, 0, '2022-01-16 09:03:01'),
(312, 'ZXW 574', 41, 0, '2022-01-16 09:03:01'),
(313, 'ZXW 574', 42, 0, '2022-01-16 09:03:01'),
(314, 'ZXW 574', 43, 0, '2022-01-16 09:03:01'),
(315, 'ZXW 574', 44, 0, '2022-01-16 09:03:01'),
(316, 'ZXW 574', 45, 1, '2022-01-27 15:06:10'),
(317, 'NT01', 1, 0, '2022-03-07 12:44:44'),
(318, 'NT01', 2, 0, '2022-03-08 03:10:18'),
(319, 'NT01', 3, 0, '2022-03-08 03:10:18'),
(320, 'NT01', 4, 0, '2022-03-08 03:10:18'),
(321, 'NT01', 5, 0, '2022-03-08 03:10:18'),
(322, 'NT01', 6, 0, '2022-03-08 03:10:18'),
(323, 'NT01', 7, 0, '2022-03-08 03:10:18'),
(324, 'NT01', 8, 0, '2022-03-08 03:10:18'),
(325, 'NT01', 9, 0, '2022-03-08 03:10:18'),
(326, 'NT01', 10, 0, '2022-03-08 03:10:18'),
(327, 'NT01', 11, 0, '2022-03-08 03:10:18'),
(328, 'NT01', 12, 0, '2022-03-08 03:10:18'),
(329, 'NT01', 13, 0, '2022-03-08 03:10:18'),
(330, 'NT01', 14, 0, '2022-03-08 03:10:18'),
(331, 'NT01', 15, 0, '2022-03-08 03:10:18'),
(332, 'NT01', 16, 0, '2022-03-08 03:10:18'),
(333, 'NT01', 17, 0, '2022-03-08 03:10:18'),
(334, 'NT01', 18, 0, '2022-03-08 03:10:18'),
(335, 'NT01', 19, 0, '2022-03-08 03:10:18'),
(336, 'NT01', 20, 0, '2022-03-08 03:10:18'),
(337, 'NT01', 21, 0, '2022-03-08 03:10:18'),
(338, 'NT01', 22, 0, '2022-03-08 03:10:18'),
(339, 'NT01', 23, 0, '2022-03-08 03:10:18'),
(340, 'NT01', 24, 0, '2022-03-08 03:10:18'),
(341, 'NT01', 25, 0, '2022-03-08 03:10:18'),
(342, 'NT01', 26, 0, '2022-03-08 03:10:18'),
(343, 'NT01', 27, 0, '2022-03-08 03:10:18'),
(344, 'NT01', 28, 0, '2022-03-08 03:10:18'),
(345, 'NT01', 29, 0, '2022-03-08 03:10:18'),
(346, 'NT01', 30, 0, '2022-03-08 03:10:18'),
(347, 'NT01', 31, 0, '2022-03-08 03:10:18'),
(348, 'NT01', 32, 0, '2022-03-08 03:10:18'),
(349, 'NT01', 33, 0, '2022-03-08 03:10:18'),
(350, 'NT01', 34, 0, '2022-03-08 03:10:18'),
(351, 'NT01', 35, 0, '2022-03-08 03:10:18'),
(352, 'NT01', 36, 0, '2022-03-08 03:10:18'),
(353, 'NT01', 37, 0, '2022-03-08 03:10:18'),
(354, 'NT01', 38, 0, '2022-03-08 03:10:18'),
(355, 'NT01', 39, 0, '2022-03-08 03:10:18'),
(356, 'NT01', 40, 0, '2022-03-08 03:10:18'),
(357, 'NT01', 41, 0, '2022-03-08 03:10:18'),
(358, 'NT01', 42, 0, '2022-03-08 03:10:18'),
(359, 'NT01', 43, 0, '2022-03-08 03:10:18'),
(360, 'NT01', 44, 0, '2022-03-08 03:10:18'),
(361, 'NT01', 45, 0, '2022-03-08 03:10:18'),
(362, 'NT01', 1, 0, '2022-03-08 03:25:13'),
(363, 'NT01', 2, 0, '2022-03-08 03:25:13'),
(364, 'NT01', 3, 0, '2022-03-08 03:25:13'),
(365, 'NT01', 4, 0, '2022-03-08 03:25:13'),
(366, 'NT01', 5, 0, '2022-03-08 03:25:13'),
(367, 'NT01', 6, 0, '2022-03-08 03:25:13'),
(368, 'NT01', 7, 0, '2022-03-08 03:25:13'),
(369, 'NT01', 8, 0, '2022-03-08 03:25:13'),
(370, 'NT01', 9, 0, '2022-03-08 03:25:13'),
(371, 'NT01', 10, 0, '2022-03-08 03:25:13'),
(372, 'NT01', 11, 0, '2022-03-08 03:25:13'),
(373, 'NT01', 12, 0, '2022-03-08 03:25:13'),
(374, 'NT01', 13, 0, '2022-03-08 03:25:13'),
(375, 'NT01', 14, 0, '2022-03-08 03:25:13'),
(376, 'NT01', 15, 0, '2022-03-08 03:25:13'),
(377, 'NT01', 16, 0, '2022-03-08 03:25:13'),
(378, 'NT01', 17, 0, '2022-03-08 03:25:13'),
(379, 'NT01', 18, 0, '2022-03-08 03:25:13'),
(380, 'NT01', 19, 0, '2022-03-08 03:25:13'),
(381, 'NT01', 20, 0, '2022-03-08 03:25:13'),
(382, 'NT01', 21, 0, '2022-03-08 03:25:13'),
(383, 'NT01', 22, 0, '2022-03-08 03:25:13'),
(384, 'NT01', 23, 0, '2022-03-08 03:25:13'),
(385, 'NT01', 24, 0, '2022-03-08 03:25:13'),
(386, 'NT01', 25, 0, '2022-03-08 03:25:13'),
(387, 'NT01', 26, 0, '2022-03-08 03:25:13'),
(388, 'NT01', 27, 0, '2022-03-08 03:25:13'),
(389, 'NT01', 28, 0, '2022-03-08 03:25:13'),
(390, 'NT01', 29, 0, '2022-03-08 03:25:13'),
(391, 'NT01', 30, 0, '2022-03-08 03:25:13'),
(392, 'NT01', 31, 0, '2022-03-08 03:25:13'),
(393, 'NT01', 32, 0, '2022-03-08 03:25:13'),
(394, 'NT01', 33, 0, '2022-03-08 03:25:13'),
(395, 'NT01', 34, 0, '2022-03-08 03:25:13'),
(396, 'NT01', 35, 0, '2022-03-08 03:25:13'),
(397, 'NT01', 36, 0, '2022-03-08 03:25:13'),
(398, 'NT01', 37, 0, '2022-03-08 03:25:13'),
(399, 'NT01', 38, 0, '2022-03-08 03:25:13'),
(400, 'NT01', 39, 0, '2022-03-08 03:25:13'),
(401, 'NT01', 40, 0, '2022-03-08 03:25:13'),
(402, 'NT01', 41, 0, '2022-03-08 03:25:13'),
(403, 'NT01', 42, 0, '2022-03-08 03:25:13'),
(404, 'NT01', 43, 0, '2022-03-08 03:25:13'),
(405, 'NT01', 44, 0, '2022-03-08 03:25:13'),
(406, 'NT01', 45, 0, '2022-03-08 03:25:13'),
(407, 'XXX2', 1, 0, '2022-03-14 02:34:31'),
(408, 'XXX2', 2, 0, '2022-03-14 02:34:31'),
(409, 'XXX2', 3, 0, '2022-03-14 02:34:31'),
(410, 'XXX2', 4, 0, '2022-03-14 02:34:31'),
(411, 'XXX2', 5, 0, '2022-03-14 02:34:31'),
(412, 'XXX2', 6, 0, '2022-03-14 02:34:31'),
(413, 'XXX2', 7, 0, '2022-03-14 02:34:31'),
(414, 'XXX2', 8, 0, '2022-03-14 02:34:31'),
(415, 'XXX2', 9, 0, '2022-03-14 02:34:31'),
(416, 'XXX2', 10, 0, '2022-03-14 02:34:31'),
(417, 'XXX2', 11, 0, '2022-03-14 02:34:31'),
(418, 'XXX2', 12, 0, '2022-03-14 02:34:31'),
(419, 'XXX2', 13, 0, '2022-03-14 02:34:31'),
(420, 'XXX2', 14, 0, '2022-03-14 02:34:31'),
(421, 'XXX2', 15, 0, '2022-03-14 02:34:31'),
(422, 'XXX2', 16, 0, '2022-03-14 02:34:31'),
(423, 'XXX2', 17, 0, '2022-03-14 02:34:31'),
(424, 'XXX2', 18, 0, '2022-03-14 02:34:31'),
(425, 'XXX2', 19, 0, '2022-03-14 02:34:31'),
(426, 'XXX2', 20, 0, '2022-03-14 02:34:31'),
(427, 'XXX2', 21, 0, '2022-03-14 02:34:31'),
(428, 'XXX2', 22, 0, '2022-03-14 02:34:31'),
(429, 'XXX2', 23, 0, '2022-03-14 02:34:31'),
(430, 'XXX2', 24, 0, '2022-03-14 02:34:31'),
(431, 'XXX2', 25, 0, '2022-03-14 02:34:31'),
(432, 'XXX2', 26, 0, '2022-03-14 02:34:31'),
(433, 'XXX2', 27, 0, '2022-03-14 02:34:31'),
(434, 'XXX2', 28, 0, '2022-03-14 02:34:31'),
(435, 'XXX2', 29, 0, '2022-03-14 02:34:31'),
(436, 'XXX2', 30, 0, '2022-03-14 02:34:31'),
(437, 'XXX2', 31, 0, '2022-03-14 02:34:31'),
(438, 'XXX2', 32, 0, '2022-03-14 02:34:31'),
(439, 'XXX2', 33, 0, '2022-03-14 02:34:31'),
(440, 'XXX2', 34, 0, '2022-03-14 02:34:31'),
(441, 'XXX2', 35, 0, '2022-03-14 02:34:31'),
(442, 'XXX2', 36, 0, '2022-03-14 02:34:31'),
(443, 'XXX2', 37, 0, '2022-03-14 02:34:31'),
(444, 'XXX2', 38, 0, '2022-03-14 02:34:31'),
(445, 'XXX2', 39, 0, '2022-03-14 02:34:31'),
(446, 'XXX2', 40, 0, '2022-03-14 02:34:31'),
(447, 'XXX2', 41, 0, '2022-03-14 02:34:31'),
(448, 'XXX2', 42, 0, '2022-03-14 02:34:31'),
(449, 'XXX2', 43, 0, '2022-03-14 02:34:31'),
(450, 'XXX2', 44, 0, '2022-03-14 02:34:31'),
(451, 'XXX2', 45, 0, '2022-03-14 02:34:31'),
(452, 'NB001', 1, 0, '2022-03-14 04:12:42'),
(453, 'NB001', 2, 0, '2022-03-14 04:12:42'),
(454, 'NB001', 3, 0, '2022-03-14 04:12:42'),
(455, 'NB001', 4, 0, '2022-03-14 04:12:42'),
(456, 'NB001', 5, 0, '2022-03-14 04:12:42'),
(457, 'NB001', 6, 0, '2022-03-14 04:12:42'),
(458, 'NB001', 7, 0, '2022-03-14 04:12:42'),
(459, 'NB001', 8, 0, '2022-03-14 04:12:42'),
(460, 'NB001', 9, 0, '2022-03-14 04:12:42'),
(461, 'NB001', 10, 0, '2022-03-14 04:12:42'),
(462, 'NB001', 11, 0, '2022-03-14 04:12:42'),
(463, 'NB001', 12, 0, '2022-03-14 04:12:42'),
(464, 'NB001', 13, 0, '2022-03-14 04:12:42'),
(465, 'NB001', 14, 0, '2022-03-14 04:12:42'),
(466, 'NB001', 15, 0, '2022-03-14 04:12:42'),
(467, 'NB001', 16, 0, '2022-03-14 04:12:42'),
(468, 'NB001', 17, 0, '2022-03-14 04:12:42'),
(469, 'NB001', 18, 0, '2022-03-14 04:12:42'),
(470, 'NB001', 19, 0, '2022-03-14 04:12:42'),
(471, 'NB001', 20, 0, '2022-03-14 04:12:42'),
(472, 'NB001', 21, 0, '2022-03-14 04:12:42'),
(473, 'NB001', 22, 0, '2022-03-14 04:12:42'),
(474, 'NB001', 23, 0, '2022-03-14 04:12:42'),
(475, 'NB001', 24, 0, '2022-03-14 04:12:42'),
(476, 'NB001', 25, 0, '2022-03-14 04:12:42'),
(477, 'NB001', 26, 0, '2022-03-14 04:12:42'),
(478, 'NB001', 27, 0, '2022-03-14 04:12:42'),
(479, 'NB001', 28, 0, '2022-03-14 04:12:42'),
(480, 'NB001', 29, 0, '2022-03-14 04:12:42'),
(481, 'NB001', 30, 0, '2022-03-14 04:12:42'),
(482, 'NB001', 31, 0, '2022-03-14 04:12:42'),
(483, 'NB001', 32, 0, '2022-03-14 04:12:42'),
(484, 'NB001', 33, 0, '2022-03-14 04:12:42'),
(485, 'NB001', 34, 0, '2022-03-14 04:12:42'),
(486, 'NB001', 35, 0, '2022-03-14 04:12:42'),
(487, 'NB001', 36, 0, '2022-03-14 04:12:42'),
(488, 'NB001', 37, 0, '2022-03-14 04:12:42'),
(489, 'NB001', 38, 0, '2022-03-14 04:12:42'),
(490, 'NB001', 39, 0, '2022-03-14 04:12:42'),
(491, 'NB001', 40, 0, '2022-03-14 04:12:42'),
(492, 'NB001', 41, 0, '2022-03-14 04:12:42'),
(493, 'NB001', 42, 0, '2022-03-14 04:12:42'),
(494, 'NB001', 43, 0, '2022-03-14 04:12:42'),
(495, 'NB001', 44, 0, '2022-03-14 04:12:42'),
(496, 'NB001', 45, 0, '2022-03-14 04:12:42'),
(497, 'ZZZ1', 1, 0, '2022-03-14 04:49:07'),
(498, 'ZZZ1', 2, 0, '2022-03-14 04:49:07'),
(499, 'ZZZ1', 3, 0, '2022-03-14 04:49:07'),
(500, 'ZZZ1', 4, 0, '2022-03-14 04:49:07'),
(501, 'ZZZ1', 5, 0, '2022-03-14 04:49:07'),
(502, 'ZZZ1', 6, 0, '2022-03-14 04:49:07'),
(503, 'ZZZ1', 7, 0, '2022-03-14 04:49:07'),
(504, 'ZZZ1', 8, 0, '2022-03-14 04:49:07'),
(505, 'ZZZ1', 9, 0, '2022-03-14 04:49:07'),
(506, 'ZZZ1', 10, 0, '2022-03-14 04:49:07'),
(507, 'ZZZ1', 11, 0, '2022-03-14 04:49:07'),
(508, 'ZZZ1', 12, 0, '2022-03-14 04:49:07'),
(509, 'ZZZ1', 13, 0, '2022-03-14 04:49:07'),
(510, 'ZZZ1', 14, 0, '2022-03-14 04:49:07'),
(511, 'ZZZ1', 15, 0, '2022-03-14 04:49:07'),
(512, 'ZZZ1', 16, 0, '2022-03-14 04:49:07'),
(513, 'ZZZ1', 17, 0, '2022-03-14 04:49:07'),
(514, 'ZZZ1', 18, 0, '2022-03-14 04:49:07'),
(515, 'ZZZ1', 19, 0, '2022-03-14 04:49:07'),
(516, 'ZZZ1', 20, 0, '2022-03-14 04:49:07'),
(517, 'ZZZ1', 21, 0, '2022-03-14 04:49:07'),
(518, 'ZZZ1', 22, 0, '2022-03-14 04:49:07'),
(519, 'ZZZ1', 23, 0, '2022-03-14 04:49:07'),
(520, 'ZZZ1', 24, 0, '2022-03-14 04:49:07'),
(521, 'ZZZ1', 25, 0, '2022-03-14 04:49:07'),
(522, 'ZZZ1', 26, 0, '2022-03-14 04:49:07'),
(523, 'ZZZ1', 27, 0, '2022-03-14 04:49:07'),
(524, 'ZZZ1', 28, 0, '2022-03-14 04:49:07'),
(525, 'ZZZ1', 29, 0, '2022-03-14 04:49:07'),
(526, 'ZZZ1', 30, 0, '2022-03-14 04:49:07'),
(527, 'ZZZ1', 31, 0, '2022-03-14 04:49:07'),
(528, 'ZZZ1', 32, 0, '2022-03-14 04:49:07'),
(529, 'ZZZ1', 33, 0, '2022-03-14 04:49:07'),
(530, 'ZZZ1', 34, 0, '2022-03-14 04:49:07'),
(531, 'ZZZ1', 35, 0, '2022-03-14 04:49:07'),
(532, 'ZZZ1', 36, 0, '2022-03-14 04:49:07'),
(533, 'ZZZ1', 37, 0, '2022-03-14 04:49:07'),
(534, 'ZZZ1', 38, 0, '2022-03-14 04:49:07'),
(535, 'ZZZ1', 39, 0, '2022-03-14 04:49:07'),
(536, 'ZZZ1', 40, 0, '2022-03-14 04:49:07'),
(537, 'ZZZ1', 41, 0, '2022-03-14 04:49:07'),
(538, 'ZZZ1', 42, 0, '2022-03-14 04:49:07'),
(539, 'ZZZ1', 43, 0, '2022-03-14 04:49:07'),
(540, 'ZZZ1', 44, 0, '2022-03-14 04:49:07'),
(541, 'ZZZ1', 45, 0, '2022-03-14 04:49:07');

-- --------------------------------------------------------

--
-- Table structure for table `stops`
--

CREATE TABLE `stops` (
  `id` int(11) NOT NULL,
  `bus_id` int(50) DEFAULT NULL,
  `s1` varchar(50) DEFAULT NULL,
  `s2` varchar(50) DEFAULT NULL,
  `s3` varchar(50) DEFAULT NULL,
  `s4` varchar(50) DEFAULT NULL,
  `s5` varchar(50) DEFAULT NULL,
  `s6` varchar(50) DEFAULT NULL,
  `s7` varchar(50) DEFAULT NULL,
  `s8` varchar(50) DEFAULT NULL,
  `s9` varchar(50) DEFAULT NULL,
  `s10` varchar(50) DEFAULT NULL,
  `sd` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sub_regions`
--

CREATE TABLE `sub_regions` (
  `sub_region_id` bigint(20) UNSIGNED NOT NULL,
  `sub_region_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_region_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `terminal`
--

CREATE TABLE `terminal` (
  `terminal_id` int(11) NOT NULL,
  `terminal_name` varchar(50) NOT NULL,
  `terminal_address` varchar(50) NOT NULL,
  `terminal_contact` varchar(20) NOT NULL,
  `terminal_created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `terminal`
--

INSERT INTO `terminal` (`terminal_id`, `terminal_name`, `terminal_address`, `terminal_contact`, `terminal_created_date`) VALUES
(1, 'Consurtion Terminal', 'Doroteo Jose Manila', '09605219273', '2022-01-04 15:02:29'),
(2, 'BBL Terminal', 'LRT Buendia Manila', '0920 296 5945', '2022-01-08 21:52:25'),
(3, 'Laguna Starbus Terminal', '1441 Valenzuela City, Metro Manila', '09566543996', '2022-01-08 21:52:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operator_id` int(100) DEFAULT NULL,
  `terminal_id` int(50) NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `operator_id`, `terminal_id`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'NAMZ', 'anamaeamaro20194@gmail.com', 'Super Admin', 0, 0, '$2y$10$pCOWfjPfNCOPvqQg4thEveNI4mDo48v0J4p8Vwf6ZCezCmbre3r4e', NULL, '2022-01-02 22:52:21', '2022-01-02 22:52:21'),
(8, 'Gilbert Morante', 'gilbert@gmail.com', 'Driver', 1, 1, '$2y$10$dxd53yrm2XqtSLRWT1fd3Ow5iZNT.JukF/rP7vf5MWZwgW6aJ0C0a', 'X0ASqOSJQZTNoHrrVKj04LEPgzWgDOPljXkDxo5fsahgtg6gEyQHGkzGriAl', '2022-01-05 00:03:02', NULL),
(9, 'Manuel  Andagan', 'ma@gmail.com', 'Conductor', 1, 1, '$2y$10$hICr4H.NboGZAVJfhphEcOtBt.3ml9OG6c54OtyNi9NengNOHxc9e', 'hugQy2vNgjhylSF15gf5GOZ5jZCHFT2r6eq7NxZTNc6MK7Amx7zYZvVtk4zV', '2022-01-05 00:11:21', NULL),
(16, 'Developer', 'dev@gmail.com', 'Super Admin', 0, 0, '$2y$10$pCOWfjPfNCOPvqQg4thEveNI4mDo48v0J4p8Vwf6ZCezCmbre3r4e', NULL, '2022-01-02 22:52:21', '2022-01-02 22:52:21'),
(17, 'Josefino Flores', 'josefinof@gmail.com', 'Driver', 15, 2, '$2y$10$/D33P8e.lQ3Y1FKSlv5XiuWlN1lAb/jlXa04TOXgraH0hjffVvru6', 'QnhduZ1ys9GxwIuwGsixb1ZKLnz0QXaKY3t0Caf2S2qLrdPweKBvACt7xAns', '2022-01-08 16:42:48', NULL),
(18, 'Karlo Burgos', 'karlo@gmail.com', 'Conductor', 15, 2, '$2y$10$VF0E7vFhnf9Gcry4qWSqFO4DPWzSgSBGV0RvH7yjVoxZ6nlu/0Ln6', ' ', '2022-01-08 20:05:02', NULL),
(19, 'Rolando Rasenes', 'rolando123@gmail.com', 'Dispatcher', 0, 1, '$2y$10$LCgY1krTHKW6A/ihRj.OneiYw0BdkXqC9CTHJD.OeE51E/7cW7CwK', 'hUThFt7xOUU9WAE0sRaClOuzBGOAAKIWQyL004wHhbJj7yLl29FuakWowF5f', '2022-01-10 00:24:54', NULL),
(20, 'Lito Santos', 'lito@gmail.com', 'Driver', 8, 1, '$2y$10$Av9g1cKUoDPTC2Is0lFdVuFJ3XXfxIDRYz7RhijWAazXo/kavmNm.', 'AGIgteSvf5bSQiY3RG2iiZ56leV02qfxTge0kKvpl8BDFkTsCEFr7Mo3t22X', '2022-01-15 00:19:23', NULL),
(21, 'Jimmy Cortez', 'jimmy@gmail.com', 'Conductor', 8, 1, '$2y$10$RCXoxTRrT5fCZ/hLMm5hZOD1Vk8SP9h6Vrxy3YFnAPWIgvv/Sftfq', 'Jmn2Vbq0v5lwVXMdyCQirXLjrl67g0iEJOcgD6j7SwGgQ5TEgIijcoG21XQK', '2022-01-15 00:20:50', NULL),
(22, 'Mario Padua', 'mario@gmail.com', 'Driver', 20, 1, '$2y$10$U/JR879ucGEXZRUae98iqOnEw5ZAzndi7HIatdrby1fYpux8iycBS', 'XKhuNZq0dJd0UYT0A0S0vM502Otdu7tK34362IZNMHQTPiuHQpo6Qx3JrRyK', '2022-01-15 00:31:20', NULL),
(23, 'Vince Devera', 'vince@gmail.com', 'Conductor', 20, 1, '$2y$10$TvHw/uT68QJhVg0bByhk7etXr62eWLm8pVM6aGjhBpbFRLmrUdTxy', ' ', '2022-01-15 00:32:03', NULL),
(24, 'Wilfredo Marquez', 'wilfredo@gmail.com', 'Driver', 23, 1, '$2y$10$vP9oUmVOK.hc6dZFjSk.suucbT5sB/d7z9lIfXFyu12ZT5Ds9SFrK', 'qR4qajWLUTxLFxdpLHVhNHWyX7Bw9PGnsb27fEJCWMNbwUICOCOZKnEwH7RA', '2022-01-15 00:32:41', NULL),
(25, 'Ivan Beltran', 'ivan@gmail.com', 'Conductor', 23, 1, '$2y$10$qNq3.a8659qggWwA1d0Z.uytx4wyaVAwW6yxGXw2UFWNSI8p2WNU.', ' ', '2022-01-15 00:33:18', NULL),
(27, 'Joel Mandocdoc', 'joel123@gmail.com', 'Dispatcher', 15, 2, '$2y$10$vILsL7LmPbCyvNa9BoFFl.uYFl30hCUxaVwlGAI723hJuoVvXw/Qu', 'IUcsbhNS2VYSd4qPaSfd7LwgHEejAgw2OcZnHYRoF7YyhP7LbyhbRLH79E4G', '2022-01-15 00:47:22', NULL),
(28, 'Robert Oller', 'robert123@gmail.com', 'Dispatcher', 19, 3, '$2y$10$cEI.7ajmATfd2v9J0njEsOSckbASAc44JJfFTDxprNXWpcdtSst82', 'uBoJjJISHJfRJwkPpVsF7lLflTWFbuTdjtwvljVBctWVGE4Lj3gsi3Oyu5Gg', '2022-01-15 00:48:10', NULL),
(29, 'Leo Pilar', 'leo@gmail.com', 'Driver', 19, 3, '$2y$10$QhVdSiMzA1RBt9C8WCwBsuXLPjR5rMWWMSTausop7HiN3LTI0nDLa', '4jAnZuujlwWdWZdvSU8Gjl6GnxYImPuKwvtmYATmXpi0G0WIPQfaEbhkEoO4', '2022-01-15 00:50:42', NULL),
(30, 'Ranz Camtad', 'ranz@gmail.com', 'Conductor', 19, 3, '$2y$10$GZWsIKbdT5/cl1W4Tx2h9e0GzGD8TcjNcYQTxb8OkPItSw67tmkjO', 'LBKdMiPvt4Yaqm87dwQZdGgxSEgyOqIBqniQXTxJrk4rwDskbP9kuOpLjunF', '2022-01-15 00:51:08', NULL),
(39, 'Criselda Lim', 'criseldaadmin@gmail.com', 'Admin', 0, 1, '$2y$10$Rfgz6ee8uKu0tx3gbgs2bO6UooydX5jDOejZvg2PIk9xwReUCbMj2', 'a09vEH3UydLhUUgFH7L3DyrjGFFKHWeI9c39IYLf2gzha1O5NkawjbtBH907', '2022-03-10 06:33:34', NULL),
(40, 'Lenard Dimaano', 'lenardadmin@gmail.com', 'Admin', 15, 2, '$2y$10$0/626/ECEnWG9eKoxpDP8.ZMWvCjDB9x1fHxaweOOJD/Au4IJI/9i', 'F3UO4lK9BPt0fQTPbEvtFqh5ABm726kVWzS94WQZglWebOXPyjwZZ238m3Bq', '2022-03-10 07:26:05', NULL),
(41, 'Drex Batan', 'drexadmin@gmail.com', 'Admin', 19, 3, '$2y$10$rlP7k.Cp3XNLqozwZCENCuwY1TvTGZVAZaOFacCZvYHDzPOJdHbhO', ' ', '2022-03-10 07:26:43', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`bus_id`);

--
-- Indexes for table `bus_schedules`
--
ALTER TABLE `bus_schedules`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operators`
--
ALTER TABLE `operators`
  ADD PRIMARY KEY (`operator_id`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`passenger_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`region_id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stops`
--
ALTER TABLE `stops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_regions`
--
ALTER TABLE `sub_regions`
  ADD PRIMARY KEY (`sub_region_id`);

--
-- Indexes for table `terminal`
--
ALTER TABLE `terminal`
  ADD PRIMARY KEY (`terminal_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `bus_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `bus_schedules`
--
ALTER TABLE `bus_schedules`
  MODIFY `schedule_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `operators`
--
ALTER TABLE `operators`
  MODIFY `operator_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `passenger`
--
ALTER TABLE `passenger`
  MODIFY `passenger_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `region_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=542;

--
-- AUTO_INCREMENT for table `stops`
--
ALTER TABLE `stops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_regions`
--
ALTER TABLE `sub_regions`
  MODIFY `sub_region_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `terminal`
--
ALTER TABLE `terminal`
  MODIFY `terminal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
