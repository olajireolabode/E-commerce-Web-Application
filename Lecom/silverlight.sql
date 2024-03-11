-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2023 at 05:35 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `silverlight`
--

-- --------------------------------------------------------

--
-- Table structure for table `actions`
--

CREATE TABLE `actions` (
  `action_id` int(8) NOT NULL,
  `function` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `pk` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`pk`, `product_id`, `quantity`, `username`) VALUES
(8, 13, 2, 'adm1n'),
(9, 14, 112, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(8) NOT NULL,
  `product_id` int(8) NOT NULL,
  `user_name` varchar(24) NOT NULL,
  `comment` varchar(512) NOT NULL,
  `date_posted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `product_id`, `user_name`, `comment`, `date_posted`) VALUES
(1, 14, 'admin', 'very nice', '2023-11-30'),
(2, 14, 'admin', 'nice one', '2023-12-15'),
(3, 13, 'jire', 'Wow what an amazing product', '2023-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` int(8) NOT NULL,
  `name` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `name`) VALUES
(1, 'admin'),
(2, 'users');

-- --------------------------------------------------------

--
-- Table structure for table `groups_actions`
--

CREATE TABLE `groups_actions` (
  `group_id` int(8) NOT NULL,
  `action_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gyms`
--

CREATE TABLE `gyms` (
  `gym_id` int(8) NOT NULL,
  `gym_name` varchar(32) NOT NULL,
  `location_number` int(8) NOT NULL,
  `street_name` varchar(64) NOT NULL,
  `city` varchar(24) NOT NULL,
  `zip` varchar(8) NOT NULL,
  `office_number` varchar(12) NOT NULL,
  `email` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gyms`
--

INSERT INTO `gyms` (`gym_id`, `gym_name`, `location_number`, `street_name`, `city`, `zip`, `office_number`, `email`) VALUES
(14, 'FitZone', 1234, 'Rue Fitness', 'Montréal', 'H3B 1K1', '(555) 123-45', 'info@fitzone.com'),
(15, 'PowerFit Gym', 5678, 'Rue Énergie', 'Montréal', 'H2G 1M8', '(555) 987-65', 'contact@powerfitgym.net'),
(16, 'Cardio Pulse', 91011, 'Rue Cardiaque', 'Montréal', 'H1H 1H1', '(555) 222-33', 'info@cardiopulse.com'),
(17, 'Flex Fitness Hub', 12131, 'Rue Flex', 'Montréal', 'H2X 1X9', '(555) 444-55', 'info@flexfitnesshub.org'),
(18, ' Zen Yoga Studio', 14151, 'Rue Sérénité', 'Montréal', 'H4C 1M7', '(555) 666-77', 'info@zenyogastudio.com');

-- --------------------------------------------------------

--
-- Table structure for table `gyms_locations`
--

CREATE TABLE `gyms_locations` (
  `gym_id` int(8) NOT NULL,
  `locations_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gyms_subscriptions`
--

CREATE TABLE `gyms_subscriptions` (
  `gym_id` int(8) NOT NULL,
  `subscription_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventory_id` int(8) NOT NULL,
  `qty` int(8) NOT NULL,
  `product_id` int(8) NOT NULL,
  `location_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `location_id` int(8) NOT NULL,
  `number` int(8) NOT NULL,
  `street_name` varchar(16) NOT NULL,
  `city` varchar(16) NOT NULL,
  `zip` varchar(8) NOT NULL,
  `office_number` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`location_id`, `number`, `street_name`, `city`, `zip`, `office_number`) VALUES
(1, 4546, 'Sherbrooke Ouest', 'Montreal', 'H4A 1H3', 514),
(2, 589, 'Scarth Street', 'Montreal', 'S4P 3Y2', 514);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(8) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `order_id` int(8) NOT NULL,
  `orderitem_id` int(8) NOT NULL,
  `product_id` int(8) NOT NULL,
  `quantity` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(8) NOT NULL,
  `product_name` varchar(32) NOT NULL,
  `product_description` varchar(512) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` int(8) NOT NULL,
  `product_quantity` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_image`, `product_price`, `product_quantity`) VALUES
(13, 'PureProtein Whey Isolate', 'PureProtein Whey Isolate is a premium protein powder designed to support muscle growth and recovery. With high-quality whey isolate, it delivers maximum protein content with minimal carbs and fats.', 'pureprotein.png', 30, 100),
(14, 'EnergyBite Protein Snacks', 'EnergyBite Protein Snacks are the perfect on-the-go solution for fitness enthusiasts. Packed with protein and delicious flavors, they provide a convenient and tasty way to refuel between workouts.', 'energybite.jpg', 10, 100),
(15, 'VeganFuel Plant-Based Protein', 'VeganFuel is a plant-based protein blend that caters to vegans and those with dairy sensitivities. It offers a complete amino acid profile for muscle support and comes in a variety of delicious flavors.', 'veganfuel.png', 40, 100),
(16, 'FitMeals Ready-to-Eat ', 'FitMeals are ready-to-eat fitness meals crafted for convenience without compromising nutrition. These balanced meals provide the right mix of proteins, carbs, and fats to fuel your active lifestyle.', 'fitmeals.png', 250, 100),
(17, 'FlexFit Vegan Protein Bar', ' FlexFit Vegan Protein Bars are a tasty and nutritious snack for plant-based fitness enthusiasts. Packed with protein and natural ingredients, they make for a guilt-free indulgence.', 'veganProteinBar.png', 5, 100),
(18, 'The Shredded Chef', 'If you want to know how to build muscle and burn fat by eating healthy, delicious meals that are easy to cook and easy on your wallet, then you want to read this book.', 'theshreddchef.jpg', 15, 25),
(19, 'You Are Your Own Gym', 'From an elite Special Operations physical trainer, an ingeniously simple, rapid-results, do-anywhere program for getting into amazing shape\r\n \r\nFor men and women of all athletic abilities!', 'youaregym.png', 28, 50),
(20, 'MuscleMax Creatine Monohydrate', 'MuscleMax Creatine Monohydrate is a pure and micronized form of creatine, supporting muscle strength and endurance. It\'s an essential supplement for those looking to maximize their workout performance.', 'maxcreatine.png', 60, 100),
(21, 'SmartHydrate Electrolyte Drink M', 'SmartHydrate is an electrolyte drink mix that replenishes essential minerals lost during intense workouts. Stay hydrated and maintain peak performance with this flavorful and low-calorie solution.', 'electrolyte.png', 40, 100),
(22, 'FlexiBlend Shaker Bottle', 'FlexiBlend Shaker Bottle is designed for convenience. With a blending ball and leak-proof design, it\'s perfect for mixing protein shakes and supplements on the go.', 'shaker.png', 20, 50),
(23, 'PowerGrip Weightlifting Gloves', 'PowerGrip Weightlifting Gloves provide superior hand protection and grip during weightlifting sessions. With a breathable design, they ensure comfort while preventing calluses and blisters.', 'powergripgloves.png', 45, 50),
(24, 'AeroFlex Resistance Band Set', ' AeroFlex Resistance Bands offer a versatile and effective workout solution. With varying resistance levels, they cater to users of all fitness levels and can be used for a wide range of exercises.', 'bands.png', 60, 40),
(25, 'TechFit Fitness Tracker Watch', 'TechFit Fitness Tracker Watch is a sleek and feature-packed wearable. Monitor your workouts, track your steps, and stay connected with this stylish fitness accessory.', 'fitnesstracker.png', 75, 20),
(26, 'StaminaMax Adjustable Dumbbells', 'StaminaMax Adjustable Dumbbell Set is a space-saving solution for home workouts. Easily adjust the weight for different exercises, providing a comprehensive strength training experience.', 'adjustabledumbbells.png', 250, 25),
(27, 'BalanceFlex Stability Ball with ', 'BalanceFlex Stability Ball is ideal for core workouts and stability exercises. The included pump ensures easy inflation, allowing you to enhance your balance and strength training.', 'stabilityball.png', 45, 55),
(28, 'MindBody Wellness Journal', 'MindBody Wellness Journal is a comprehensive tool for tracking your fitness journey. Document your workouts, nutrition, and mental well-being to stay focused on your goals and celebrate your progress.', 'wellnessjournal.png', 25, 100),
(29, 'CozyFlex Oversized Hoodie', 'CozyFlex Oversized Hoodie is the epitome of comfort and style. With its relaxed fit and soft, breathable fabric, this hoodie is perfect for post-workout lounging or casual outings. Stay cozy while making a fashion statement with this versatile oversized hoodie.', 'oversizedhoodie.png', 25, 200),
(30, 'MaxSupport Lifting Belt', 'MaxSupport Lifting Belt is a must-have for serious weightlifters. Constructed with durable materials and featuring a secure buckle, this belt provides essential support to your lower back during heavy lifts, promoting proper form and reducing the risk of injuries.', 'liftingbelt.png', 60, 50);

-- --------------------------------------------------------

--
-- Table structure for table `products_comments`
--

CREATE TABLE `products_comments` (
  `product_id` int(8) NOT NULL,
  `comment_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_comments`
--

INSERT INTO `products_comments` (`product_id`, `comment_id`) VALUES
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `question_answer_table`
--

CREATE TABLE `question_answer_table` (
  `pk` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `q_id` int(11) NOT NULL,
  `sender` varchar(255) DEFAULT NULL,
  `created_on` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question_answer_table`
--

INSERT INTO `question_answer_table` (`pk`, `message`, `q_id`, `sender`, `created_on`) VALUES
(1, 'New successfull message From Admin5', 2, NULL, '2023-12-08'),
(2, 'New successfull message From Admin2', 1, NULL, '2023-12-08'),
(3, 'New successfull message From Admin3', 2, NULL, '2023-12-08'),
(4, 'New successfull message From Admin2', 2, NULL, '2023-12-08'),
(5, 'New successfull message From Admin1', 2, NULL, '2023-12-08'),
(6, 'New successfull message From admin', 6, NULL, '2023-12-08'),
(7, 'New successfull 2 message From User', 1, 'adm1n', '2023-12-09'),
(8, 'New successfull message From User', 1, 'adm1n', '2023-12-09'),
(9, 'New Reply on Question #4', 4, 'adm1n', '2023-12-09'),
(10, 'New message from sam admin', 2, NULL, '2023-12-09'),
(11, 'now user is replying', 2, 'adm1n', '2023-12-09'),
(12, 'So sorry about that but however we try to offer the best prices ', 8, 'admin', '2023-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `subscription_id` int(8) NOT NULL,
  `name` varchar(16) NOT NULL,
  `cost` int(8) NOT NULL,
  `description` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`subscription_id`, `name`, `cost`, `description`) VALUES
(1, 'Two Weeks Promo', 12, 'Get ready to embark on a two-week fitness journey like no other!'),
(2, 'Regular Monthly', 20, 'Elevate your fitness journey with our affordable monthly members'),
(3, 'VIP Monthly', 35, 'Unleash the full spectrum of premium fitness and self-care with ');

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `trainer_id` int(8) NOT NULL,
  `trainer_name` varchar(32) NOT NULL,
  `trainer_qualification` varchar(64) NOT NULL,
  `location_number` int(8) NOT NULL,
  `street_name` varchar(64) NOT NULL,
  `city` varchar(24) NOT NULL,
  `zip` varchar(8) NOT NULL,
  `phone_number` varchar(16) NOT NULL,
  `email` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`trainer_id`, `trainer_name`, `trainer_qualification`, `location_number`, `street_name`, `city`, `zip`, `phone_number`, `email`) VALUES
(5, 'Isabelle Tremblay', ' Certified Personal Trainer', 1, 'Rue Fitness', 'Montréal', 'H3B 1K1', ' (555) 123-4567', 'isabelle@fitnessexpert.c'),
(6, 'Marc Dupont', 'CrossFit Specialist', 2, 'Rue Énergie', 'Montréal', 'H2G 1M8', '(555) 987-6543', 'marc@crossfitmontreal.co'),
(7, 'Sophie Leclair', 'Yoga Instructor (RYT-200)', 3, 'Rue Sérénité', 'Montréal', 'H4C 1M7', '(555) 222-3333', 'sophie@yogawithsophie.ca'),
(8, 'Alexandre Gagnon', 'Strength and Conditioning Coach', 4, 'Rue Musculation', 'Montréal', 'H1H 1H1', '(555) 444-5555', ' alexandre@strengthhubmt'),
(9, 'Mia Tranquil', 'Pilates Instructor', 5, 'Rue Harmonie', 'Montréal', ' H2Y 1Z6', '(555) 666-7777', 'mia@harmonyfit.ca');

-- --------------------------------------------------------

--
-- Table structure for table `trainers_locations`
--

CREATE TABLE `trainers_locations` (
  `trainer_id` int(8) NOT NULL,
  `location_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainers_locations`
--

INSERT INTO `trainers_locations` (`trainer_id`, `location_id`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_name` varchar(24) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(24) NOT NULL,
  `user_group` varchar(24) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_name`, `password`, `email`, `user_group`) VALUES
('adm1n', '$2y$10$OtjAG9M1yuVbVXUJsKdZu.aYZI/XsMqtuoJu3XzRdLT2HYsjz74va', 'admin@gmail.com', 'user'),
('adm2n', '$2y$10$pl/30iuU89lNoK2TPMGGjeds2IPF4TasWi/uvSwTJ/mbGB0vnUS3a', 'pamol40854@gyxmz.com', 'admin'),
('admin', '$2y$10$icdiKmG39PDjKN1I8s5yNOvgzpUW/20RlEEykLusrBibvfx5z9RYe', 'admin@admin.com', 'admin'),
('jire', '$2y$10$Fy8a1zGPygItf9N6QSxwGe6cJEQW/AEfcrt7E.JhFIQL7ybLtbVyy', 'jire@jire.com', 'admin'),
('regularjoe21', '$2y$10$o/vKuTXRF/Cu1PLFrLAioO2IwXo8pfJYuU9rohwIsfArryGOi86uK', 'joe21@email.com', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users_comments`
--

CREATE TABLE `users_comments` (
  `user_name` varchar(24) NOT NULL,
  `comment_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_comments`
--

INSERT INTO `users_comments` (`user_name`, `comment_id`) VALUES
('1', 1),
('2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `user_name` varchar(24) NOT NULL,
  `group_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_orders`
--

CREATE TABLE `users_orders` (
  `user_name` varchar(24) NOT NULL,
  `order_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_question`
--

CREATE TABLE `user_question` (
  `pk` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_question`
--

INSERT INTO `user_question` (`pk`, `name`, `email`, `message`, `username`) VALUES
(3, 'Question #3', 'pamol40854@gyxmz.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', 'adm1n'),
(4, 'Question #4', 'pamol40854@gyxmz.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', 'adm1n'),
(5, 'Question #5', 'ravena9408@fesgrid.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', 'adm1n1'),
(6, 'Question #6', 'pamol40854@gyxmz.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', 'adm1n'),
(7, 'Question #7', 'pamol40854@gyxmz.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', 'adm1n'),
(8, 'admin', 'admin@admin.com', 'Some of your prices are too expensive', 'admin'),
(9, 'joe', 'joe21@email.com', 'Why are some of your books boring', 'regularjoe21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`action_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`pk`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_name` (`user_name`) USING BTREE;

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `groups_actions`
--
ALTER TABLE `groups_actions`
  ADD KEY `group_id` (`group_id`),
  ADD KEY `action_id` (`action_id`);

--
-- Indexes for table `gyms`
--
ALTER TABLE `gyms`
  ADD PRIMARY KEY (`gym_id`);

--
-- Indexes for table `gyms_locations`
--
ALTER TABLE `gyms_locations`
  ADD KEY `gym_id` (`gym_id`),
  ADD KEY `locations_id` (`locations_id`);

--
-- Indexes for table `gyms_subscriptions`
--
ALTER TABLE `gyms_subscriptions`
  ADD KEY `gym_id` (`gym_id`),
  ADD KEY `subscription_id` (`subscription_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventory_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`location_id`);

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
-- Indexes for table `question_answer_table`
--
ALTER TABLE `question_answer_table`
  ADD PRIMARY KEY (`pk`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`subscription_id`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`trainer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_name`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD KEY `user_name` (`user_name`,`group_id`),
  ADD KEY `group_id_fk` (`group_id`);

--
-- Indexes for table `users_orders`
--
ALTER TABLE `users_orders`
  ADD KEY `user_name` (`user_name`);

--
-- Indexes for table `user_question`
--
ALTER TABLE `user_question`
  ADD PRIMARY KEY (`pk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actions`
--
ALTER TABLE `actions`
  MODIFY `action_id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gyms`
--
ALTER TABLE `gyms`
  MODIFY `gym_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `location_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `question_answer_table`
--
ALTER TABLE `question_answer_table`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `subscription_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `trainer_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_question`
--
ALTER TABLE `user_question`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `groups_actions`
--
ALTER TABLE `groups_actions`
  ADD CONSTRAINT `action_id_fk` FOREIGN KEY (`action_id`) REFERENCES `actions` (`action_id`);

--
-- Constraints for table `gyms_locations`
--
ALTER TABLE `gyms_locations`
  ADD CONSTRAINT `gyms_id_fk` FOREIGN KEY (`gym_id`) REFERENCES `gyms` (`gym_id`),
  ADD CONSTRAINT `locations_id_fk` FOREIGN KEY (`locations_id`) REFERENCES `locations` (`location_id`);

--
-- Constraints for table `gyms_subscriptions`
--
ALTER TABLE `gyms_subscriptions`
  ADD CONSTRAINT `subscription_id_fk` FOREIGN KEY (`subscription_id`) REFERENCES `subscriptions` (`subscription_id`);

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `group_id_fk` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`),
  ADD CONSTRAINT `user_name_fk` FOREIGN KEY (`user_name`) REFERENCES `users` (`user_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
