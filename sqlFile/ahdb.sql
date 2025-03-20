-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2025 at 06:44 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ahdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(100) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_country` text NOT NULL,
  `admin_job` varchar(255) NOT NULL,
  `admin_about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_contact`, `admin_country`, `admin_job`, `admin_about`) VALUES
(1, 'demo tester', 'demo@test.in', '1234', '1.png', '+919876543219', 'India', 'Tester', 'Work as a tester at AutoHub!'),
(2, 'AUser01', 'user@test.in', '1234', '', '8585651020`', 'India', 'Operations-Administrator', 'Operations Administrator at AutoHub - Network Monitoring'),
(3, 'AUser00', '123@456.com', '1234', 'Vehicle Scrap Service.png', '34345252102', 'India', 'Unemployed', 'Intruder in AutoHub');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(100) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(100) NOT NULL,
  `fuel_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `qty`, `fuel_type`) VALUES
(30, '::1', 1, 'Diesel');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `QID` int(11) NOT NULL,
  `CName` varchar(255) NOT NULL,
  `CEmail` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `query_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`QID`, `CName`, `CEmail`, `subject`, `msg`, `query_date`) VALUES
(1, 'Stone', 'stone@gmail.com', 'i want to download bios update for hp pavilion 5CD2414VN1', 'ert', '2025-02-28 13:05:16'),
(5, 'Stone', 'stone@gmail.com', '789456789', '1234564133', '2025-02-28 13:05:16'),
(24, 'Stone leaf coold', 'stone@gmail.com', 'Test', 'Can share there Concerns!', '2025-03-01 14:16:10'),
(25, 'Stone leaf coold', 'stone@gmail.com', 'test', 'can share there concerns', '2025-03-01 14:18:37'),
(26, 'Stone leaf coold', 'stone@gmail.com', 'test', 'We can raise our concerns', '2025-03-01 14:28:39'),
(30, 'Stone leaf', 'stone@gmail.com', '12345', 'asd', '2025-03-19 15:48:46');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(100) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text DEFAULT NULL,
  `customer_ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES
(6, 'Stone leaf', 'stone@gmail.com', '1234', 'India', 'none,N/A23', '14141414', 'Kolsewadi, 148', '', '::1'),
(28, 'FName LName', 'fname@lname.com', '4321', 'India', 'Dombivil', '1144778855', 'st.abc CHS ', 'origina.webp', '::1'),
(35, 'Elon Musk', 'elon@tesla.io', 'Elom123', 'Bhutan', 'Sprit', '8887776660', 'Maxy Ground, California', 'profile01 (2).jpg', '::1'),
(36, 'vyrath khooli', 'vyrahtkholi@worldcup.in', 'Qw12345', 'Pakistan', 'Lahore', '8888899999', 'st road nr. GB', 'profile01 (9).jpg', '::1'),
(39, 'Rakesh Gedam', 'rakeshgedam204@gmail.com', 'sd@Wsad2', 'India', 'Kyn', '08828602507', 'Kyn', '', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `product_id` int(100) DEFAULT NULL,
  `due_amount` int(200) NOT NULL,
  `invoice_no` int(200) NOT NULL,
  `qty` int(99) NOT NULL,
  `fuel_type` text NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`order_id`, `customer_id`, `product_id`, `due_amount`, `invoice_no`, `qty`, `fuel_type`, `order_date`, `order_status`) VALUES
(14, 28, 21, 299999, 972187152, 1, 'Select Fuel Type', '2025-02-01 18:01:49', 'pending'),
(16, 35, 15, 70799996, 693798421, 4, 'Select Fuel Type', '2025-02-19 08:36:25', 'pending'),
(18, 36, 8, 5865999, 1302403161, 1, 'Select Fuel Type', '2025-02-19 11:00:06', 'Complete'),
(45, 36, 20, 287999, 1571801250, 1, 'Petrol', '2025-02-28 16:29:11', 'Complete'),
(54, 36, 21, 299999, 301916481, 1, 'Petrol', '2025-02-28 16:22:46', 'pending'),
(55, 36, 6, 9196, 301916481, 4, 'N/A', '2025-02-28 16:22:46', 'pending'),
(56, 36, 20, 287999, 301916481, 1, 'Electric', '2025-02-28 16:22:46', 'pending'),
(57, 36, 21, 299999, 1905348182, 1, 'Petrol', '2025-02-28 16:23:25', 'pending'),
(76, 6, 6, 4598, 852887060, 2, 'N/A', '2025-03-08 20:27:21', 'pending'),
(77, 6, 6, 2299, 1430644512, 1, 'N/A', '2025-03-08 20:58:48', 'pending'),
(78, 28, 6, 2299, 1365146190, 1, 'N/A', '2025-03-08 21:26:38', 'pending'),
(79, 6, 30, 98572, 780111008, 1, 'Diesel', '2025-03-17 13:33:05', 'pending'),
(80, 6, 21, 299999, 197671480, 1, 'Petrol', '2025-03-17 13:59:24', 'pending'),
(81, 6, 1, 389999, 921935767, 1, 'Diesel', '2025-03-17 14:00:23', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_desc` text NOT NULL,
  `cat_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`cat_id`, `cat_title`, `cat_desc`, `cat_img`) VALUES
(1, 'TATA', 'Experience the strength and innovation of TATA vehicles, where each model combines durability, performance, and cutting-edge technology. TATA vehicles are designed for both urban commutes and rugged terrains, ensuring reliability in every journey. With a commitment to safety and sustainability, TATA offers a diverse lineup that caters to families, adventurers, and professionals alike. Discover your perfect ride with AutoHub and drive with confidence knowing you have a trusted brand at your side.', 'tata.png'),
(2, 'Volkswagen', 'Discover the exceptional engineering and timeless design of Volkswagen vehicles, where performance meets practicality. Known for their precision and reliability, Volkswagen offers a diverse range of models tailored for every lifestyle, from compact cars to spacious SUVs. With a commitment to innovation and sustainability, Volkswagen vehicles are equipped with advanced safety features and cutting-edge technology to enhance your driving experience. Choose Volkswagen at AutoHub for a blend of style, comfort, and reliability that transforms every journey into a memorable adventure.\r\n\r\n', 'vs.jpg'),
(3, 'Nissan', 'Experience the perfect blend of innovation, efficiency, and style with Nissan vehicles. Renowned for their advanced engineering and thoughtful design, Nissan offers a wide range of models that cater to diverse lifestyles—from fuel-efficient sedans to rugged SUVs. Each Nissan vehicle is equipped with cutting-edge technology and safety features to ensure a smooth and secure driving experience. Choose Nissan at AutoHub for vehicles that embody reliability, performance, and comfort, making every journey enjoyable and memorable.\r\n\r\n', 'Nissan.png'),
(4, 'Maruti', 'Discover the essence of practicality and affordability with Maruti vehicles. Known for their fuel efficiency and compact designs, Maruti cars are perfect for both city commuting and long drives. Each model combines modern technology with reliability, ensuring you enjoy a hassle-free driving experience. With a wide range of options, from economical hatchbacks to spacious SUVs, Maruti caters to all your automotive needs. Choose Maruti at AutoHub for a vehicle that delivers exceptional value, making every journey a pleasure.', 'Suzuki.png'),
(5, 'Others', 'Explore our extensive inventory of vehicles', 'otherss.png'),
(13, 'sasdsa', 'weqweqw', 'other.png'),
(14, 'Mahindra', 'Discover the strength and reliability of Mahindra vehicles, built to perform on every road. Combining powerful engineering with advanced features, Mahindra ensures a smooth and secure driving experience. Whether for city commutes or off-road adventures, Mahindra offers versatility you can trust. Find your perfect Mahindra vehicle with AutoHub and drive with confidence.', 'Mahindra.png');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(100) NOT NULL,
  `invoice_id` int(100) NOT NULL,
  `amount` int(255) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int(100) NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `invoice_id`, `amount`, `payment_mode`, `ref_no`, `payment_date`) VALUES
(4, 1867860567, 99600, 'Digital Wallets', 858562, '20024-02-02'),
(5, 1302403161, 0, 'Bank Transfers', 0, '2025-02-19'),
(6, 20205, 2000, 'UPI/Mobile Payments', 1, '2025-02-24'),
(11, 1571801250, 127300, 'Credit and Debit Card Payments', 4545656, '2025-02-28'),
(12, 1455462114, 2299, 'UPI/Mobile Payments', 121212556, '2025-03-01'),
(17, 56266461, 11495, 'Credit and Debit Card Payments', 1, '2025-03-08'),
(19, 848339182, 299999, 'Credit and Debit Card Payments', 54, '0022-12-11'),
(20, 105990564, 299999, 'Digital Wallets', 858562, '2025-03-13');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `$product_qty` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_img4` text NOT NULL,
  `product_price` decimal(20,2) DEFAULT NULL,
  `product_desc` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `$product_qty`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_img4`, `product_price`, `product_desc`, `product_keywords`) VALUES
(1, 1, 1, 2, '2025-03-07 16:21:29', 'Tata Altroz iTurbo', 'imga1.jpg', 'imga2.png', 'imga3.png', 'imga4.png', 389999.00, 'Gold standard of Design! Designed to devour, the Tata ALTROZ Racer brings the thrill of the tracks to the usual Indian roads.\r\nDesigned to provide a comprehensive and all-around safe driving experience, the Tata ALTROZ has acquired a 5-star Global NCAP rating', 'Car,TATA,second hand'),
(2, 2, 5, NULL, '2024-11-04 08:29:56', 'BMW S 1000 R 2024', 'bimg11.jpg', 'bimg12.jpg', 'bimg13.jpg', 'bimg14.jpg', 459999.00, 'Dynamic roadster on the outside, superbike DNA on the inside. Ultra-agile, ultra-precise: the S 1000 R from BMW Motorrad. Ready for any challenge.', 'Bike,BMW,2024'),
(3, 1, 5, NULL, '2024-11-04 08:48:19', 'BMW M3 sedan (green)', 'bimg21.webp', 'bimg22.png', 'bimg23.webp', 'bimg24.webp', 13599999.00, 'The inline 6-cylinder engine featuring M TwinPower Turbo Technology, available in three performance levels, features superior power delivery and the striking characteristic M engine sound. Two mono-scroll turbochargers, direct High-Precision Injection, fully variable valve control and variable camshaft control ensure outstanding performance at any time. The BMW M3 Competition Sedan with M xDrive accelerates from 0 to 100 km/h in just 3.5 seconds and from 0 to 200 km/h in just 11.8 seconds – a new benchmark.', 'Car,BMW,Sedan'),
(6, 5, 5, 5, '2025-03-07 16:21:43', 'Castrol MAGNATEC 5W-30 - Full Synthetic Engine Oil ', 'eimg1.jpg', 'eimg2.jpg', 'eimg3.jpg', 'eimg4.jpg', 2299.00, 'Castrol MAGNATEC offers unique DUALOCK technology that clings to critical engine parts and locks together at the surface to form a powerful force-field of protection. Castrol 3-in-1 SHINER - The easy-to-use shiner spray creates a long-lasting gloss finish that bond to paint surfaces and acts as a shield, protecting from UV exposure. Suitable for Bikes and Cars.\r\n\r\nFREE Castrol 3-IN-1 SHINER ', 'Castrol,engine oil,essentials'),
(7, 4, 5, NULL, '2024-11-05 06:45:19', 'Bajaj RE E TEC 9.0 Auto Rickshaw', 'rimg.png', 'rimg2.png', 'rimg3.jpg', 'rimg4.jpg', 374999.00, 'The Bajaj RE E-TEC 9.0 is an electric auto-rickshaw designed for efficient urban transport. Powered by an advanced electric motor, it offers a quieter, eco-friendly alternative to traditional three-wheelers. With a durable design, it promises lower maintenance costs, quick charging, and smooth rides, making it ideal for sustainable urban mobility solutions', 'Bajaj, Auto ,3 wheeler'),
(8, 3, 1, NULL, '2024-11-05 16:23:05', 'TATA PRIMA 5530.S', 'imgt1.jpg', 'imgt2.jpg', 'imgt3.jpg', 'imgt4.jpg', 5865999.00, 'TATA PRIMA 2830.K REPTO stands out as a prime example of engineering brilliance. Combining power, reliability, and innovation, it redefines industry standards. With superior performance, advanced features, and exceptional durability, it becomes an invaluable asset for the logistics ', 'TATA,Trucks'),
(9, 1, 5, NULL, '2025-02-04 09:53:10', 'Mercedes-Maybach Sedan', 'mimg1.jpg', 'mimg2.jpg', 'mimg3.jpg', 'mimg4.jpg', 27099999.00, 'Explore real luxury and unwavering strength - Mercedes Benz SUVs. Visit our online store. Unmatched comfort and technology to help you move forward.', 'luxury, red, Mercedes, suv '),
(10, 1, 5, NULL, '2024-11-07 15:56:55', 'Audi e-tron', 'aimg1.jpg', 'aimg2.webp', 'aimg3.webp', 'aimg4.webp', 17199999.00, 'The latest Audi Q8 e-tron electric SUV Car with amazing mileage, the latest technology, impressive features, and a progressive design', 'Car,Audi, e-tron'),
(12, 1, 5, NULL, '2024-11-09 08:50:47', 'AMG GT Black-Series! ', 'mimg11.jpg', 'mimg12.jpg', 'mimg13.jpg', 'mimg14.jpg', 2599999.00, 'The Mercedes-AMG GT Track Series combines the high-performance genes of the Mercedes-AMG GT Black Series with the racetrack-proven qualities of the GT3.\r\nIt achieves a staggering 720 horsepower and 590 lb-ft of torque, races from 0-100 km/h in 3.2 seconds, and reaches 200 km/h in fewer than 9 seconds.', 'Mercedes, amg gt, black '),
(13, 1, 5, NULL, '2024-11-09 08:55:59', 'Porsche Taycan Turbo S', 'pimg1.webp', 'pimg2.webp', 'pimg3.webp', 'pimg4.webp', 24399999.00, 'All-wheel drive. In the Taycan Turbo S, the electric motors on the front and rear axles provide more power output with less weight than in the previous model. Porsche Taycan Cross Turismo Turbo S is available in Automatic transmission', 'Porsche ,Taycan, white'),
(14, 1, 5, NULL, '2024-11-09 09:01:51', 'Porsche 911 GT3 - Touring ', 'pimg21.jpg', 'pimg22.jpg', 'pimg23.jpg', 'pimg24.jpg', 27499999.00, 'GT3 with Touring Package is powered by a 3996 cc Petrol engine mated to a 8 Gears, Paddle Shift, Sport Mode speed Automatic (DCT) gearbox \r\nWith modern racing technology, consistent lightweight construction and a sonorous high-revving naturally aspirated engine, its racing line is at the limit.\r\n', 'Porsche, GT3,Touring ,green'),
(15, 1, 5, NULL, '2024-11-09 09:06:12', ' Mercedes-Benz AMG E63 S 4MATIC ', 'mimg21.jpg', 'mimg22.jpg', 'mimg23.jpg', 'mimg24.jpg', 17699999.00, 'The E63 S is a delightful machine, surging through space with its twin-turbo V8 pumping out 603 thundering horsepower and 627 pound-feet of torque.\r\nTop Speed. 300 kmph · Acceleration (0-100 kmph). 3.4 seconds · Engine. 3982 cc, 8 Cylinders In V Shape, 4 Valves/Cylinder, DOHC', ' Mercedes, E63, Grey'),
(16, 2, 5, NULL, '2024-11-24 15:10:18', 'Aprilia RS 660', 'abimg1.jpg', 'abimg2.jpg', 'abimg3.jpg', 'abimg4.jpg', 1394999.00, 'The RS 660 can manage 0-60 mph in 3.29 seconds which put it right up there with 600 cc Supersport bikes. Also, 0-100 mph is achieved in under seven seconds at 6.80', 'Aprilia,Bike,RS'),
(19, 2, 5, NULL, '2024-11-24 16:13:07', 'MV Agusta Dragster 800 RR', 'abimg11.heic', 'abimg12.heic', 'abimg13.heic', 'abimg14.heic', 1872999.00, 'The 140 HP three-cylinder of the Dragster RR SCS leaves you breathless thanks to its immediate and precise response to the twist of the throttle.\r\n\r\nType	Three cylinders, 4 stroke, 12 valves\r\nFinal drive ratio	16/41\r\nClaimed Maximum speed	244 km/h (151.6 mph)\r\nClaimed Acceleration	0-100 km/h in 3.55 s; 0-200 km/h in 10.10 s.\r\n', 'Agusta, Dragster, Motorcycle'),
(20, 2, 5, NULL, '2024-11-24 17:45:48', 'Neev Motorcycles Zangetsu', 'nimg1.heic', 'nimg2.heic', 'nimg3.heic', 'nimg4.heic', 287999.00, 'he Neev Motorcycles Zangetsu is a custom motorcycle based on the Royal Enfield Interceptor 650, showcasing a fusion of intricate craftsmanship and bold design. The name \"Zangetsu\" aligns with its sharp, aggressive aesthetic, echoing a samurai-inspired theme. ', 'Neev, Motorcycles, Zangetsu,Black'),
(21, 2, 5, NULL, '2024-11-24 17:52:18', ' Royal Enfield Interceptor 650', 'rimg21.heic', 'rimg22.heic', 'rimg23.heic', 'rimg24.heic', 299999.00, 'Royal Enfield Interceptor 650 mileage is 24 kmpl (approximate). In terms of performance, the 650cc motorcycle can accelerate from 0-100 kmph in 6.23 seconds. \r\nThis Interceptor 650 bike weighs 213 kg and has a fuel tank capacity of 13.7 liters. Royal Enfield Interceptor 650 top speed is 170 kmph', ' Royal, Interceptor, Bullet'),
(30, 2, 5, NULL, '2025-03-07 19:19:13', 'Suzuki Avenis 125', 'simg1.webp', 'simg2.webp', 'simg3.webp', 'simg4.webp', 98572.00, 'Gone are the days when scooters had to be simple, convenient, and utilitarian. Nowadays, tech-savvy buyers expect their scooters to offer the best of features, unique styling and zippy performance. So much so, that we have an entire segment dedicated to sporty scooters. Suzuki wants to join the bandwagon with the all-new Avenis 125 with 4- Stroke, 1-Cylinder, Air Cooled Engine Type · SOHC, 2-Valve Valve System · 124 cm³ Displacement. ', 'Suzuki, Avenis, 125,Blue, scooter, scooty, 2 wheeler'),
(31, 1, 14, NULL, '2025-03-19 18:43:05', 'Mahindra BE 6 ', 'm4.avif', 'm3.avif', 'm2.avif', 'm1.avif', 1907999.00, 'Experience luxury and innovation with the BE 6’s thoughtfully designed cabin. Its standout twin-spoke steering wheel features an illuminated BE logo and touch-capacitive controls, offering a modern touch. The SUV’s sleek dashboard boasts a twin-display setup, enhancing convenience and connectivity. Adding to its charm is a unique strap-style door grab handle for improved ergonomics.\r\n\r\nKey features include:\r\n✅ Wireless Mobile Charging for effortless power on the go\r\n✅ Automatic Climate Control ensuring optimal comfort\r\n✅ Drive Modes for tailored performance\r\n✅ Panoramic Sunroof for an expansive view\r\n✅ 16-Speaker Harman Kardon Sound System for an immersive audio experience\r\n✅ OTA Updates keeping your system current and feature-rich\r\n\r\nWith the BE 6, sophistication meets practicality — perfect for both urban drives and adventurous journeys.', 'Mahindra, BE, SUV, EV');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `p_cat_id` int(11) NOT NULL,
  `p_cat_title` varchar(255) NOT NULL,
  `p_cat_desc` text NOT NULL,
  `p_cat_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`p_cat_id`, `p_cat_title`, `p_cat_desc`, `p_cat_img`) VALUES
(1, 'Cars', 'Discover the perfect combination of style, performance, and reliability. This vehicle is designed for those who demand excellence in their daily drives and adventures. Don’t wait! Contact us today.', 'SUV.webp'),
(2, 'Bikes', 'Experience the thrill of riding with AutoHub, where we offer an exceptional selection of bikes tailored to your needs. Choosing a bike from AutoHub means you benefit from our commitment to quality and reliability, ensuring you receive only the best vehicles. Our diverse inventory caters to all preferences, whether you seek performance, comfort, or fuel efficiency.', 'bmt.webp'),
(3, 'Heavy-Duty ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎  ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ Vehicles', 'At AutoHub, we are excited to introduce our Heavy-Duty Vehicles category, designed for those who demand unparalleled strength and performance. Whether you need a reliable truck for your business or a robust vehicle for off-road adventures, our selection caters to your needs.', 'hdv.png'),
(4, 'Others', 'Explore a variety of other vehicles that don’t fit into our standard categories, each offering unique features and benefits tailored to diverse needs.', 'other.png'),
(5, 'Vehicle  ‎ ‎ ‎ ‎   ‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ ‎  ‎  ‎ ‎ ‎ Essentials', 'We believe that maintaining your vehicle is just as important as choosing the right one. Our “Vehicle Essentials” category is dedicated to providing you with a comprehensive range of products and services that ensure your vehicle operates at its best.', 'vss.jpg'),
(8, 'test', 'lorem sda ASDA ASD S asdfgvbhtyu srtascx yuf X f a zSG', 'Tesla.png');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(10) NOT NULL,
  `slider_name` varchar(100) NOT NULL,
  `slider_image` text NOT NULL,
  `slider_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `slider_name`, `slider_image`, `slider_url`) VALUES
(2, 'slider number 2', 'simg2.jpg', 'http://localhost/AutoRepo/shop.php'),
(3, 'slider number 3', 'simg3.jpg', ''),
(4, 'slider number 4', 'simg4.jpg', 'http://localhost/AutoRepo/details.php?pro_id=21'),
(5, 'slider  number 5', 'simg5.jpg', 'http://localhost/AutoRepo/details.php?pro_id=15'),
(6, 'slider number 6', 'simg6.jpg', ''),
(10, 'slider number 1', 'simg1.jpg', 'http://localhost/AutoRepo/details.php?pro_id=3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`QID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `QID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `p_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
