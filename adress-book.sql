-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2025 at 01:36 PM
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
-- Database: `adress-book`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address_line1` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) DEFAULT 'Pakistan',
  `type` enum('billing','shipping') NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(1, 'Apple'),
(2, 'DELL'),
(3, 'Samsung'),
(4, 'Sony'),
(5, 'LG'),
(6, 'HP'),
(7, 'Lenovo'),
(8, 'canon'),
(9, 'Nikon'),
(10, 'Kodak');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Electronics'),
(2, 'Health & Beauty'),
(3, 'Home & Lifestyle'),
(4, 'TV & Home Appliances'),
(5, 'Fashions'),
(6, 'Books & Stationary');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `status` enum('pending','shipped','delivered','cancelled') DEFAULT 'pending',
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `brand_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `subcategory_id`, `created_at`, `brand_id`, `category_id`) VALUES
(13, 'Apple iPhone X, 64GB Unlocked - Silver', 'iPhone X features an all-screen design with a 5.8-inch Super Retina HD display with HDR and True Tone. Designed with the most durable glass ever in a smartphone and a surgical grade stainless steel band. Charges wirelessly. Resists water and dust. 12MP dual cameras with dual optical image stabilization for great low-light photos. True Depth camera with Portrait selfies and new Portrait Lighting. Face ID lets you unlock and use Apple Pay with just a glance. Powered by A11 Bionic, the most powerful and smartest chip ever in a smartphone. Supports augmented reality experiences in games and apps. With iPhone X, the next era of iPhone has begun.', 12000.00, 73, '2025-06-27 02:44:56', 1, 1),
(14, 'Apple iPhone 14 Pro, 128GB, Deep Purple', 'The best gets even better with the Pro Perfection of the iPhone 14 Pro. Its powerful, has amazing cameras, sports a beautiful display, and Dynamic Island is a good notch replacement. From its pocketable form factor to its sheer horsepower and camera capabilities, the iPhone 14 Pro crushes anything else that tries to stand against it. Simply as close to a perfect phone ever seen.', 12778.00, 73, '2025-06-27 03:20:55', 1, 1),
(15, 'Apple iPhone XR, US Version, 64GB, Red ', 'With the iPhone XR you get a roomy 6.1-inch display, fast enough performance from Apple\'s A12 Bionic processor and good camera quality in a colorful design and affordable package. Apple has included the all-new Liquid Retina LCD as the display on the iPhone XR. Apple released the iPhone XR with a smattering of color options. Both the glass back and the metal frame are brightly colored, with the glass using an in-depth seven-layer color process to achieve the rich finish and the Apple-exclusive aluminum alloy anodized to match. Instead of 3D Touch, the iPhone XR replicates the experience through \"Haptic Touch\". Advanced Face ID lets you securely unlock your iPhone and log in to apps with just a glance.', 13000.00, 73, '2025-06-27 03:27:00', 1, 1),
(16, 'Samsung Galaxy A16 5G A Series Cell Phone', 'Measured diagonally, the screen size is 6.7\" in the full rectangle and 6.5\" accounting for the rounded corners. Actual viewable area is less due to the rounded corners and the camera cutout. ²IP54 rating for water and dust resistance. Water resistance based on laboratory test conditions for exposure to splashes of fresh water. Not advised for beach or pool use. Dust resistance based on laboratory test conditions, with limited protection against dust ingress.', 23000.00, 73, '2025-06-27 04:01:39', 3, 1),
(17, 'SAMSUNG Galaxy S25 Ultra Cell Phone', 'Galaxy S25 Ultra handles the small details so you can focus on staying in the moment. Get several tasks fulfilled with one simple ask, and get insightful tips throughout your day to stay one step ahead. Simplify life with AI¹⁰ that evolves with you to work better for you.', 34000.00, 73, '2025-06-27 04:04:26', 3, 1),
(18, 'MMY I25 Ultra Unlocked Cell Phone', 'Galaxy S25 Ultra handles the small details so you can focus on staying in the moment. Get several tasks fulfilled with one simple ask, and get insightful tips throughout your day to stay one step ahead. Simplify life with AI¹⁰ that evolves with you to work better for you.', 12000.00, 73, '2025-06-27 04:06:17', 3, 1),
(19, 'Sony Xperia 10 VI 5G XQ-ES72 128GB 8GB', 'Sony Xperia 10 VI 5G XQ-ES72 128GB 8GB RAM Factory Unlocked (GSM Only | No CDMA – not Compatible with Verizon/Sprint) Smartphone Global Version Mobile', 45000.00, 73, '2025-06-27 04:11:14', 4, 1),
(20, 'Sony Xperia 1 IV XQ-CT72 5G Dual 256GB', 'Sony Xperia 1 IV XQ-CT72 5G Dual 256GB 128GB 8GB RAM Factory Unlocked (GSM Only | No CDMA – not Compatible with Verizon/Sprint) Smartphone Global Version Mobile', 12300.00, 73, '2025-06-27 04:14:25', 4, 1),
(22, 'Apple AirPods Pro 2 Wireless Earbuds', ' AirPods Pro 2 unlock the world’s first all-in-one hearing health experience: a scientifically validated Hearing Test,* clinical-grade and active Hearing Protection', 1200.00, 76, '2025-06-27 04:23:29', 1, 1),
(23, 'Apple AirPods Max Wireless', 'ULTIMATE OVER-EAR LISTENING EXPERIENCE — Apple-designed dynamic driver provides high-fidelity audio. Computational audio combines custom acoustic design with the Apple H1 chip and software for breakthrough listening experiences.', 3400.00, 76, '2025-06-27 05:10:47', 1, 1),
(24, 'Samsung Galaxy Buds 3 Pro', 'Meet the new shape of sound — Galaxy Buds3 Pro — now completely redesigned with improved hardware to bring you deeper into the audio than ever before. With Galaxy AI¹, your Buds create the best listening experience by optimizing sound based on your surroundings and how you wear them — while providing a snug fit for all-day comfort, no matter what you do. Buds3 Pro get how much you love your audio.', 189.00, 76, '2025-06-27 05:51:45', 3, 1),
(25, 'SAMSUNG AKG Earbuds ', 'Samsung AKG Earbuds Original USB Type C In-Ear Earbud Headphones with Remote & Mic for Galaxy A53 5G, S22, S21, S21 FE, S20 Ultra, Note 10, Note 10+, S10 Plus - Braided - Includes Velvet Pouch - Black', 145.00, 76, '2025-06-27 05:56:25', 3, 1),
(26, 'Lenovo Go Wired Speakerphone', 'Elevate remote workforce communication with the Lenovo Go Wired Speakerphone, delivering enterprise-grade conferencing and audio capabilities. This portable plug-and-play solution enables seamless and natural conference calls, enhanced by cutting-edge voice-first algorithms. Plus, with Teams Certification, you can confidently maximize the potential of your preferred UC platform.', 156.00, 76, '2025-06-27 06:02:42', 7, 1),
(27, 'Canon EOS Rebel T7 DSLR Camera with 18-55mm Lens', 'Perfect for beginners, this camera bundle offers the essential tools needed to take your SLR skills to new heights, all in one convenient package. No matter where your next adventure takes you, count on the EOS Rebel t7\'s impressive 24.1 Megapixel CMOS sensor and wide ISO range of 100-6400 (H: 12800) to capture high-quality images, even in low-light situations.', 1288.00, 77, '2025-06-27 16:00:23', 8, NULL),
(28, 'Nikon D7500 20.9MP DSLR Camera with AF-S DX NIKKOR', 'Class leading image quality, ISO range, image processing and metering equivalent to the award-winning D500 Large 3.2” 922K dot, tilting LCD screen with touch functionality 51-point AF system with 15 cross-type sensors and group-area AF paired with up to 8 fps continuous shooting capability 4K Ultra HD and 1080p Full HD video with stereo sound, power aperture control, auto ISO, 4K UHD Time-Lapse and more.', 1288.00, 77, '2025-06-27 16:10:08', 9, NULL),
(30, 'Nikon Z fc with Wide-Angle Zoom Lens ', 'The Z fc mirrorless camera features a classic, tactile design fused with modern Z series technology. Equipped with a flip out vlogger screen, this DX-format 4K UHD compact camera delivers big image quality for photos and videos.', 12500.00, 77, '2025-06-27 16:23:49', 9, NULL),
(31, 'KODAK PIXPRO Friendly Zoom FZ45-BK 16MP ', 'Introducing the FZ45, Friendly Zoom model from the KODAK PIXPRO collection of digital cameras. Compact, intuitive and oh so easy to use, the FZ45 is the perfect camera to take anywhere you go. One-touch video, red-eye removal, face detection and convenient AA batteries are just the start. KODAK PIXPRO Digital Cameras - Tell your story.\r\n\r\n', 1460.00, 77, '2025-06-27 16:26:46', 10, NULL),
(32, 'LG K51 Unlocked Smartphone ', 'A phone packed with premium features that will keep you connected and fit your budget.\r\nIntroducing the impressive LG K51 that enables you to capture and experience life’s special moments.\r\n\r\n', 34800.00, 73, '2025-06-27 16:29:16', 5, NULL),
(33, 'Nikon Z fc with Wide-Angle Zoom Lens ', 'The Z fc mirrorless camera features a classic, tactile design fused with modern Z series technology. Equipped with a flip out vlogger screen, this DX-format 4K UHD compact camera delivers big image quality for photos and videos.', 12500.00, 77, '2025-06-27 20:40:32', 9, NULL),
(34, 'Nikon Z fc with Wide-Angle Zoom Lens ', 'The Z fc mirrorless camera features a classic, tactile design fused with modern Z series technology. Equipped with a flip out vlogger screen, this DX-format 4K UHD compact camera delivers big image quality for photos and videos.', 12500.00, 77, '2025-06-27 20:40:43', 9, NULL),
(37, 'toy', 'adkajdkajdkjakdjakdjakdjak', 10000.00, 92, '2025-06-27 22:55:48', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_url`) VALUES
(13, 13, '1750974296-61V0WhicC1L._AC_SX569_.jpg'),
(14, 14, '1750976455-2_.jpg'),
(15, 15, '1750976820-3_.jpg'),
(16, 16, '1750978899-4.jpg'),
(17, 17, '1750979066-5.jpg'),
(18, 18, '1750979177-6.jpg'),
(19, 19, '1750979474-7.jpg'),
(20, 20, '1750979665-8.jpg'),
(22, 22, '1750980209-9.jpg'),
(23, 23, '1750983047-10.jpg'),
(24, 24, '1750985505-11.jpg'),
(25, 25, '1750985785-12.jpg'),
(26, 26, '1750986162-13.jpg'),
(27, 27, '1751022023-14.jpg'),
(28, 28, '1751022608-15.jpg'),
(30, 30, '1751023429-16.jpg'),
(31, 31, '1751023606-17.jpg'),
(32, 32, '1751023756-18.jpg'),
(33, 33, '1751038832-16.jpg'),
(34, 34, '1751038843-16.jpg'),
(35, 37, '1751046948-mindless.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `category_id`) VALUES
(31, 'Home Decor', 3),
(32, 'Furniture', 3),
(33, 'Kitchen & Dining', 3),
(34, 'Bedding & Bath', 3),
(35, 'Lighting', 3),
(36, 'Storage & Organizers', 3),
(37, 'Clocks & Wall Art', 3),
(38, 'Rugs & Carpets', 3),
(39, 'Gardening Tools & Supplies', 3),
(40, 'Candles & Fragrances', 3),
(41, 'Televisions', 4),
(42, 'Refrigerators', 4),
(43, 'Washing Machines', 4),
(44, 'Air Conditioners', 4),
(45, 'Microwave Ovens', 4),
(46, 'Kitchen Appliances', 4),
(47, 'Vacuum Cleaners', 4),
(48, 'Water Purifiers', 4),
(49, 'Fans & Air Coolers', 4),
(50, 'Geysers & Heaters', 4),
(51, 'Men\'s Clothing', 5),
(52, 'Women\'s Clothing', 5),
(53, 'Kids & Baby Clothing', 5),
(54, 'Footwear', 5),
(55, 'Bags & Luggage', 5),
(56, 'Watches', 5),
(57, 'Sunglasses & Eyewear', 5),
(58, 'Jewelry & Accessories', 5),
(59, 'Innerwear & Sleepwear', 5),
(60, 'Ethnic & Traditional Wear', 5),
(61, 'Academic Books', 6),
(62, 'Novels & Literature', 6),
(63, 'Children\'s Books', 6),
(64, 'Exam Preparation Books', 6),
(65, 'Office Supplies', 6),
(66, 'Notebooks & Diaries', 6),
(67, 'Art Supplies', 6),
(68, 'Pens & Writing Instruments', 6),
(69, 'Files & Folders', 6),
(70, 'Calculators', 6),
(71, 'School Supplies', 6),
(72, 'Greeting Cards & Gift Wrap', 6),
(73, 'Mobile Phone', 1),
(76, 'Audio Devices', 1),
(77, 'Cameras', 1),
(89, 'Skincare', 2),
(90, 'Hair Care', 2),
(91, 'Personal Care', 2),
(92, 'Makeup', 2),
(93, 'Fragrances', 2),
(94, 'Beauty Tools', 2),
(95, 'Health Devices', 2),
(96, 'Vitamins & Supplements', 2),
(97, 'Men\'s Grooming', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `role` enum('user','admin') DEFAULT 'user',
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `role`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Abdullah', 'abdullahsidzz333@gmail.com', '$2y$10$nSWutBAVg8mnAkDv89FYHO694TO9HchMaaTmdEPoSZ.K5iPHk5BvS', NULL, 'admin', 'active', '2025-06-23 18:00:58', '2025-06-23 18:04:48'),
(4, 'Mohsin', 'Mohsin333@gmail.com', '$2y$10$tkE/F3RHsLWS8855LA3nvuohw3Ko1k/XTEam/IMLKkK4h6qNwMubO', NULL, 'user', 'active', '2025-06-23 18:22:41', '2025-06-23 18:22:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `address_id` (`address_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategory_id` (`subcategory_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_ibfk_1` (`product_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
