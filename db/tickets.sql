-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 24 jan. 2025 à 13:09
-- Version du serveur : 11.5.2-MariaDB
-- Version de PHP : 8.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hackers_poulette`
--

-- --------------------------------------------------------

--
-- Structure de la table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE IF NOT EXISTS `tickets` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT 'Auto',
  `name` varchar(255) NOT NULL COMMENT 'Min 2 chars',
  `firstname` varchar(255) NOT NULL COMMENT 'Min 2 chars',
  `email` varchar(255) NOT NULL COMMENT 'Min 2 chars',
  `file` text DEFAULT NULL COMMENT 'Max 2MB',
  `description` text NOT NULL COMMENT 'Min 2 chars',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tickets`
--

INSERT INTO `tickets` (`id`, `name`, `firstname`, `email`, `file`, `description`) VALUES
(1, 'Doe', 'John', 'john.doe@example.com', 'uploads/image1.jpg', 'This is a test description for ticket 1.'),
(2, 'Smith', 'Jane', 'jane.smith@example.com', 'uploads/image2.png', 'This is a test description for ticket 2.'),
(3, 'Brown', 'Charlie', 'charlie.brown@example.com', NULL, 'This is a test description for ticket 3.'),
(4, 'Johnson', 'Emily', 'emily.johnson@example.com', 'uploads/image3.gif', 'This is a test description for ticket 4.'),
(5, 'Williams', 'Michael', 'michael.williams@example.com', NULL, 'This is a test description for ticket 5.'),
(6, 'Jones', 'Sarah', 'sarah.jones@example.com', 'uploads/image4.jpg', 'This is a test description for ticket 6.'),
(7, 'Garcia', 'David', 'david.garcia@example.com', NULL, 'This is a test description for ticket 7.'),
(8, 'Martinez', 'Laura', 'laura.martinez@example.com', 'uploads/image5.png', 'This is a test description for ticket 8.'),
(9, 'Hernandez', 'Daniel', 'daniel.hernandez@example.com', NULL, 'This is a test description for ticket 9.'),
(10, 'Lopez', 'Jessica', 'jessica.lopez@example.com', 'uploads/image6.gif', 'This is a test description for ticket 10.'),
(11, 'Gonzalez', 'Matthew', 'matthew.gonzalez@example.com', NULL, 'This is a test description for ticket 11.'),
(12, 'Wilson', 'Ashley', 'ashley.wilson@example.com', 'uploads/image7.jpg', 'This is a test description for ticket 12.'),
(13, 'Anderson', 'Joshua', 'joshua.anderson@example.com', NULL, 'This is a test description for ticket 13.'),
(14, 'Thomas', 'Megan', 'megan.thomas@example.com', 'uploads/image8.png', 'This is a test description for ticket 14.'),
(15, 'Taylor', 'Ryan', 'ryan.taylor@example.com', NULL, 'This is a test description for ticket 15.'),
(16, 'Moore', 'Hannah', 'hannah.moore@example.com', 'uploads/image9.gif', 'This is a test description for ticket 16.'),
(17, 'Jackson', 'Ethan', 'ethan.jackson@example.com', NULL, 'This is a test description for ticket 17.'),
(18, 'Martin', 'Samantha', 'samantha.martin@example.com', 'uploads/image10.jpg', 'This is a test description for ticket 18.'),
(19, 'Lee', 'Alexander', 'alexander.lee@example.com', NULL, 'This is a test description for ticket 19.'),
(20, 'Perez', 'Ava', 'ava.perez@example.com', 'uploads/image11.png', 'This is a test description for ticket 20.'),
(21, 'Thompson', 'Liam', 'liam.thompson@example.com', NULL, 'This is a test description for ticket 21.'),
(22, 'White', 'Isabella', 'isabella.white@example.com', 'uploads/image12.gif', 'This is a test description for ticket 22.'),
(23, 'Harris', 'Noah', 'noah.harris@example.com', NULL, 'This is a test description for ticket 23.'),
(24, 'Sanchez', 'Sophia', 'sophia.sanchez@example.com', 'uploads/image13.jpg', 'This is a test description for ticket 24.'),
(25, 'Clark', 'Mason', 'mason.clark@example.com', NULL, 'This is a test description for ticket 25.'),
(26, 'Ramirez', 'Charlotte', 'charlotte.ramirez@example.com', 'uploads/image14.png', 'This is a test description for ticket 26.'),
(27, 'Lewis', 'James', 'james.lewis@example.com', NULL, 'This is a test description for ticket 27.'),
(28, 'Robinson', 'Amelia', 'amelia.robinson@example.com', 'uploads/image15.gif', 'This is a test description for ticket 28.'),
(29, 'Walker', 'Benjamin', 'benjamin.walker@example.com', NULL, 'This is a test description for ticket 29.'),
(30, 'Hall', 'Harper', 'harper.hall@example.com', 'uploads/image16.jpg', 'This is a test description for ticket 30.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
