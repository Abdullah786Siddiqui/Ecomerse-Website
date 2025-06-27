-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2025 at 11:23 AM
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
-- Database: `ecommerce_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `brand_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `subcategory_id`, `created_at`, `brand_id`) VALUES
(13, 'Apple iPhone X, 64GB Unlocked - Silver', 'iPhone X features an all-screen design with a 5.8-inch Super Retina HD display with HDR and True Tone. Designed with the most durable glass ever in a smartphone and a surgical grade stainless steel band. Charges wirelessly. Resists water and dust. 12MP dual cameras with dual optical image stabilization for great low-light photos. True Depth camera with Portrait selfies and new Portrait Lighting. Face ID lets you unlock and use Apple Pay with just a glance. Powered by A11 Bionic, the most powerful and smartest chip ever in a smartphone. Supports augmented reality experiences in games and apps. With iPhone X, the next era of iPhone has begun.', 12000.00, 73, '2025-06-27 02:44:56', 1),
(14, 'Apple iPhone 14 Pro, 128GB, Deep Purple', 'The best gets even better with the Pro Perfection of the iPhone 14 Pro. Its powerful, has amazing cameras, sports a beautiful display, and Dynamic Island is a good notch replacement. From its pocketable form factor to its sheer horsepower and camera capabilities, the iPhone 14 Pro crushes anything else that tries to stand against it. Simply as close to a perfect phone ever seen.', 12778.00, 73, '2025-06-27 03:20:55', 1),
(15, 'Apple iPhone XR, US Version, 64GB, Red ', 'With the iPhone XR you get a roomy 6.1-inch display, fast enough performance from Apple\'s A12 Bionic processor and good camera quality in a colorful design and affordable package. Apple has included the all-new Liquid Retina LCD as the display on the iPhone XR. Apple released the iPhone XR with a smattering of color options. Both the glass back and the metal frame are brightly colored, with the glass using an in-depth seven-layer color process to achieve the rich finish and the Apple-exclusive aluminum alloy anodized to match. Instead of 3D Touch, the iPhone XR replicates the experience through \"Haptic Touch\". Advanced Face ID lets you securely unlock your iPhone and log in to apps with just a glance.', 13000.00, 73, '2025-06-27 03:27:00', 1),
(16, 'Samsung Galaxy A16 5G A Series Cell Phone', 'Measured diagonally, the screen size is 6.7\" in the full rectangle and 6.5\" accounting for the rounded corners. Actual viewable area is less due to the rounded corners and the camera cutout. ²IP54 rating for water and dust resistance. Water resistance based on laboratory test conditions for exposure to splashes of fresh water. Not advised for beach or pool use. Dust resistance based on laboratory test conditions, with limited protection against dust ingress.', 23000.00, 73, '2025-06-27 04:01:39', 3),
(17, 'SAMSUNG Galaxy S25 Ultra Cell Phone', 'Galaxy S25 Ultra handles the small details so you can focus on staying in the moment. Get several tasks fulfilled with one simple ask, and get insightful tips throughout your day to stay one step ahead. Simplify life with AI¹⁰ that evolves with you to work better for you.', 34000.00, 73, '2025-06-27 04:04:26', 3),
(18, 'MMY I25 Ultra Unlocked Cell Phone', 'Galaxy S25 Ultra handles the small details so you can focus on staying in the moment. Get several tasks fulfilled with one simple ask, and get insightful tips throughout your day to stay one step ahead. Simplify life with AI¹⁰ that evolves with you to work better for you.', 12000.00, 73, '2025-06-27 04:06:17', 3),
(19, 'Sony Xperia 10 VI 5G XQ-ES72 128GB 8GB', 'Sony Xperia 10 VI 5G XQ-ES72 128GB 8GB RAM Factory Unlocked (GSM Only | No CDMA – not Compatible with Verizon/Sprint) Smartphone Global Version Mobile', 45000.00, 73, '2025-06-27 04:11:14', 4),
(20, 'Sony Xperia 1 IV XQ-CT72 5G Dual 256GB', 'Sony Xperia 1 IV XQ-CT72 5G Dual 256GB 128GB 8GB RAM Factory Unlocked (GSM Only | No CDMA – not Compatible with Verizon/Sprint) Smartphone Global Version Mobile', 12300.00, 73, '2025-06-27 04:14:25', 4),
(22, 'Apple AirPods Pro 2 Wireless Earbuds', ' AirPods Pro 2 unlock the world’s first all-in-one hearing health experience: a scientifically validated Hearing Test,* clinical-grade and active Hearing Protection', 1200.00, 76, '2025-06-27 04:23:29', 1),
(23, 'Apple AirPods Max Wireless', 'ULTIMATE OVER-EAR LISTENING EXPERIENCE — Apple-designed dynamic driver provides high-fidelity audio. Computational audio combines custom acoustic design with the Apple H1 chip and software for breakthrough listening experiences.', 3400.00, 76, '2025-06-27 05:10:47', 1),
(24, 'Samsung Galaxy Buds 3 Pro', 'Meet the new shape of sound — Galaxy Buds3 Pro — now completely redesigned with improved hardware to bring you deeper into the audio than ever before. With Galaxy AI¹, your Buds create the best listening experience by optimizing sound based on your surroundings and how you wear them — while providing a snug fit for all-day comfort, no matter what you do. Buds3 Pro get how much you love your audio.', 189.00, 76, '2025-06-27 05:51:45', 3),
(25, 'SAMSUNG AKG Earbuds ', 'Samsung AKG Earbuds Original USB Type C In-Ear Earbud Headphones with Remote & Mic for Galaxy A53 5G, S22, S21, S21 FE, S20 Ultra, Note 10, Note 10+, S10 Plus - Braided - Includes Velvet Pouch - Black', 145.00, 76, '2025-06-27 05:56:25', 3),
(26, 'Lenovo Go Wired Speakerphone', 'Elevate remote workforce communication with the Lenovo Go Wired Speakerphone, delivering enterprise-grade conferencing and audio capabilities. This portable plug-and-play solution enables seamless and natural conference calls, enhanced by cutting-edge voice-first algorithms. Plus, with Teams Certification, you can confidently maximize the potential of your preferred UC platform.', 156.00, 76, '2025-06-27 06:02:42', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategory_id` (`subcategory_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
