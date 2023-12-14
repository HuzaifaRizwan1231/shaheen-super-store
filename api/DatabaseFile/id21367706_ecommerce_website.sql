-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 14, 2023 at 03:24 PM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id21367706_ecommerce_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_login_id` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_fullName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_login_id`, `admin_password`, `admin_fullName`) VALUES
(1, 'admin@gmail.com', 'admin', 'Admin Huzaifa');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`) VALUES
(1, 'Nike'),
(3, 'A4Tech'),
(6, 'CA'),
(7, 'Adidas'),
(8, 'Nestle'),
(9, 'Kookabura'),
(10, 'Boya'),
(11, 'IKEA'),
(12, 'Corsair');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(4, 'Clothes'),
(7, 'Sports'),
(8, 'Computer Accessories'),
(9, 'Shoes'),
(10, 'Food'),
(11, 'Furniture');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `order_status`) VALUES
(1, 2, 12, 'Paid'),
(5, 4, 12, 'Paid'),
(6, 4, 10, 'Paid'),
(7, 4, 20, 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_brand_id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_keywords`, `product_price`, `product_image1`, `product_image2`, `product_image3`, `product_brand_id`, `product_category_id`, `product_reg_date`) VALUES
(10, 'A4Tech Gaming Mous', 'Enhance your gaming with a high-performance, ergonomic gaming mouse designed for precision and comfort.', 'Gaming mouse, Precision, Speed, Ergonomic design, Customizable RGB lighting, Responsive buttons, Immersive gaming, High-performance, DPI settings, Comfortable grip, eSports, Gaming peripherals', 1500, '61lCLrCtuhL._AC_SL1000_.jpg', 'images.jpeg', 'images (1).jpeg', 3, 8, '2023-09-23 17:05:27'),
(11, 'HardBall Bat', 'Power your game with our top-quality hardball bat, built for performance and durability on the field.', 'Hardball bat Baseball equipment Power hitter Precision Durability Performance Batting tool Baseball gear', 2000, '202207041822571969279790.jpg', 'images (2).jpeg', 'images (1).png', 6, 7, '2023-09-01 16:44:30'),
(12, 'Nike Black Shoes', 'Experience style and comfort with our Nike black shoes, perfect for everyday wear and athletic performance', 'Nike Black shoes Footwear Style Comfort Athletic shoes Everyday wear Performance Sports gear Fashionable sneakers', 5000, '5b0981ff-45f8-40c3-9372-32430a62aaea.jpg', 'images1.jpeg', 'images (3).jpeg', 1, 9, '2023-09-01 16:56:27'),
(13, 'Adidas Shirt', 'Elevate your style with our Adidas black shirt, a versatile and comfortable choice for everyday fashion and sports activities', 'Adidas Black shirt Apparel Fashion Style Comfort Versatile Everyday wear Sports clothing Active lifestyle', 4000, '62310640_o.jpg', 'images (4).jpeg', 'images (5).jpeg', 7, 4, '2023-09-01 17:00:23'),
(14, 'Nestle Fresh Yogurt ', 'Indulge in the creamy delight of Nestle fresh yogurt, a wholesome and delicious snack bursting with probiotics and natural goodness.', 'Nestle Fresh yogurt Creamy Wholesome Delicious Snack Probiotics Natural goodness Dairy product Healthy choice', 250, 'grocerapp-nestle-original-yogurt-sweet--60eed2c5d8dba.jpeg', 'images (6).jpeg', 'images (7).jpeg', 8, 10, '2023-09-01 17:03:30'),
(15, 'A4Tech Headset ', 'Experience immersive audio with the A4tech headset, designed for crystal-clear sound, comfort.', 'A4tech Headset Immersive audio Crystal-clear sound Comfortable Precision Gaming Multimedia Audio device Gaming peripherals', 1250, 't_3145.png', 'images (8).jpeg', 'images (9).jpeg', 3, 8, '2023-09-01 17:12:40'),
(16, 'Cricket Leather Ball', 'Unleash your cricketing prowess with our top-quality hardball, crafted for power, durability, and precision on the pitch.', 'Cricket hardball Cricket equipment Power hitter Durability Precision Sports gear Cricket ball Pitch performance Batting practice Cricketing excellence', 550, 'a10c640734671a9d7a70d522a96efd86.jpg', 'images (10).jpeg', 'images (11).jpeg', 9, 7, '2023-09-01 17:11:24'),
(17, 'Adidas Sneakers', 'Elevate your style with Adidas sneakers, combining comfort and fashion in a versatile footwear choice suitable for any occasion.', 'Adidas Sneakers Footwear Style Comfort Fashion Versatile Athletic shoes Casual wear Trendy sneakers', 3200, 'bd43ce71f589498ab6b1aad6009a0e6e_9366.jpg', 'images (12).jpeg', 'images (13).jpeg', 7, 9, '2023-09-01 17:14:49'),
(18, 'Jeans for Men', 'Step out in timeless style with Adidas jeans, offering classic design, comfort, and versatility for your everyday fashion.', 'Adidas Jeans Denim Classic design Fashion Comfortable Versatile Everyday wear Casual style Timeless fashion', 1700, 'JU9T1NKNT28-26_4.jpg', 'images (14).jpeg', 'images (15).jpeg', 7, 4, '2023-09-01 17:17:25'),
(19, 'Boya Wired Mic', 'Enhance your audio recording with a Boya microphone, known for its clarity, versatility, and professional-grade performance.', 'Boya microphone Audio recording Clarity Versatile Professional-grade Sound quality Mic Podcasting Videography Broadcasting', 2000, 'ecebaa6402d6d0b826fed03f2c6617ea.jpg', 'images (16).jpeg', 'images (17).jpeg', 10, 8, '2023-09-01 17:24:52'),
(20, 'IKEA White Bed', 'Experience comfort and style with an IKEA bed, offering affordability, durability, and Scandinavian design for your bedroom oasis.', 'IKEA bed Bedroom furniture Comfort Style Affordability Durability Scandinavian design Bedroom oasis Furniture Home decor', 50000, 'malm-bed-frame-high-white__0749130_pe745499_s5.jpg', 'download (2).jpeg', 'download (3).jpeg', 11, 11, '2023-09-01 17:23:44'),
(21, 'Neslte Chaunsa Juice', 'Quench your thirst with Nestle juices, packed with refreshing flavors, natural ingredients, and essential nutrients for a revitalizing experience.', 'Nestle juice Refreshing Flavors Natural ingredients Nutrients Hydration Beverage Healthy drink Fruit juice Thirst quencher', 250, 'images (18).jpeg', 'download (4).jpeg', 'images (19).jpeg', 8, 10, '2023-09-01 17:27:15'),
(22, 'Corsair 8 GB RAM', 'Elevate your PC performance and aesthetics with Corsair RGB RAM, featuring customizable lighting, high-speed performance, and reliability.', 'Corsair RGB RAM PC memory Customizable lighting High-speed performance Aesthetics Gaming rig PC upgrades', 4000, 'download (5).jpeg', 'images (20).jpeg', 'images (21).jpeg', 12, 8, '2023-09-01 17:41:34'),
(23, 'IKEA Comfort Chair ', 'Enhance your comfort and style with an IKEA chair, offering affordability, durability, and Scandinavian design for your home or office.', 'IKEA chair Furniture Comfort Style Affordability Durability Scandinavian design Home decor Office chair Seating solution', 7500, 'download (6).jpeg', 'images (22).jpeg', 'images (23).jpeg', 11, 11, '2023-09-01 17:34:59'),
(24, 'FIFA WC Football', 'Experience the thrill of FIFA football, the world favorite sport, known for its global tournaments, talented athletes, and passionate fans.', 'Global tournaments Athletes Passionate fans International competition Goal scoring Sportsmanship Athletic excellen FIFA football Soccerce', 6500, '51d6rN1G4LL._AC_UF894,1000_QL80_.jpg', 'images (24).jpeg', 'images (25).jpeg', 7, 7, '2023-09-01 17:39:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_login_id` varchar(100) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_fullName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_login_id`, `user_password`, `user_fullName`) VALUES
(2, 'huzaifa.rizwan1231@gmail.com', '123', 'Huzaifa Rizwan'),
(4, '1234@gmail.com', 'abcd', 'Rizwan Ashraf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
