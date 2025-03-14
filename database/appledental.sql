-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 14, 2025 at 05:53 PM
-- Server version: 10.6.18-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appledental`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `main_content` text NOT NULL,
  `full_content` text NOT NULL,
  `title_image` varchar(255) NOT NULL,
  `main_image` varchar(255) NOT NULL,
  `video` varchar(255) DEFAULT NULL,
  `service` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `main_content`, `full_content`, `title_image`, `main_image`, `video`, `service`, `created_at`) VALUES
(59, 'Tooth Extraction', '<p>Tooth Extraction <span style=\"background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);\">is a common dental procedure performed for various reasons, such as severe tooth decay, damage, or crowding</span></p>', '<p><span style=\"background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);\">Tooth extraction is often needed when a tooth becomes severely decayed, fractured, or impacted. It may also be required for crowded teeth, gum disease, or dental injuries. Tooth luxation, a condition where the tooth is loosened from its socket, is another common reason for extraction.</span></p><p><strong style=\"color: rgb(33, 154, 2); background-color: transparent;\">Sedation During Extraction</strong></p><p><br></p><p><span style=\"color: rgb(0, 0, 0); background-color: transparent;\">For your comfort, several sedation options are available, including nitrous oxide (laughing gas), oral conscious sedation, and intravenous sedation. These help ease dental anxiety, making your experience more relaxed and pain-free.</span></p><p><br></p>', '', '67d2cf48d2bde_1741868872.png', '67d2cf48d2c10_1741868872.mp4', 'Tooth Extraction', '2025-03-13 12:27:52'),
(60, 'A Permanent Solution for Missing Teeth', '<h3><strong>What Are Dental Implants?</strong></h3><p>Dental implants are a long-lasting and natural-looking solution for replacing missing teeth. Unlike dentures or bridges, implants are surgically placed into the jawbone, acting as artificial tooth roots that support crowns, bridges, or dentures. Made from biocompatible titanium, dental implants integrate with the bone over time, ensuring a secure and stable foundation for replacement teeth.</p>', '<h3><strong>Benefits of Dental Implants</strong></h3><p>One of the biggest advantages of dental implants is their durability—they can last a lifetime with proper care. They also prevent bone loss, maintain facial structure, and function just like natural teeth, allowing you to eat and speak comfortably. Additionally, implants improve confidence by providing a natural-looking smile without the discomfort or instability of traditional dentures.</p>', '', '67d2d27f61100_1741869695.jpg', '67d2d27f61135_1741869695.mp4', 'Dental Implant', '2025-03-13 12:41:35'),
(61, 'Restoring Your Oral Health', '<h3><strong>Understanding the Importance of Gum Surgery</strong></h3><p>Gum surgery is a crucial dental procedure used to treat severe gum diseases like periodontitis and correct gum recession. When bacteria accumulate beneath the gums, they cause inflammation, leading to gum and bone loss. If left untreated, this can result in tooth mobility and even loss. Gum surgery helps remove infected tissue, deep-clean the gums, and restore a healthy foundation for your teeth.</p>', '<h3><strong>Types of Gum Surgery and Their Benefits</strong></h3><p>There are different types of gum surgery, depending on the severity of the issue. <strong>Flap surgery</strong> involves lifting the gums to clean deep pockets, while <strong>gum grafting</strong> covers exposed tooth roots using tissue from another area of the mouth. These procedures not only improve oral health but also enhance aesthetics, reduce tooth sensitivity, and prevent further gum recession. Proper aftercare, including good oral hygiene and regular dental visits, ensures successful healing and long-term benefits.</p>', '', '67d2d286ad627_1741869702.jpg', '67d2d286ad65a_1741869702.mp4', 'Gum Surgery', '2025-03-13 12:41:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `created_at`) VALUES
(5, 'bhavi', 'creations', 'bhavicreations@gmail.com', '600c304331ed6847dd108dea621d56ea', '2024-11-12 11:08:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
