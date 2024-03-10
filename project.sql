-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2024 at 10:01 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cardb`
--

CREATE TABLE `cardb` (
  `id_car` int(11) NOT NULL,
  `marka` varchar(20) DEFAULT NULL,
  `model` varchar(20) DEFAULT NULL,
  `typ_nadwozia` varchar(20) DEFAULT NULL,
  `rocznik` int(11) DEFAULT NULL,
  `cena` decimal(5,2) DEFAULT NULL,
  `dostepnosc` tinyint(1) DEFAULT NULL,
  `data_wypozyczenia` date DEFAULT NULL,
  `data_oddania` date DEFAULT NULL,
  `id_umowy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cardb`
--

INSERT INTO `cardb` (`id_car`, `marka`, `model`, `typ_nadwozia`, `rocznik`, `cena`, `dostepnosc`, `data_wypozyczenia`, `data_oddania`, `id_umowy`) VALUES
(1, 'Toyota', 'Corolla', 'sedan', 2020, 150.00, NULL, NULL, NULL, NULL),
(2, 'Ford', 'Focus', 'hatchback', 2019, 130.00, NULL, NULL, NULL, NULL),
(3, 'Chevrolet', 'Malibu', 'sedan', 2021, 180.00, NULL, NULL, NULL, NULL),
(4, 'Honda', 'Civic', 'sedan', 2022, 160.00, NULL, NULL, NULL, NULL),
(5, 'Volkswagen', 'Jetta', 'sedan', 2018, 140.00, NULL, NULL, NULL, NULL),
(6, 'Hyundai', 'Elantra', 'sedan', 2020, 145.00, NULL, NULL, NULL, NULL),
(7, 'Nissan', 'Altima', 'sedan', 2019, 155.00, NULL, NULL, NULL, NULL),
(8, 'BMW', '3 Series', 'sedan', 2021, 200.00, NULL, NULL, NULL, NULL),
(9, 'Mercedes-Benz', 'C-Class', 'sedan', 2018, 220.00, NULL, NULL, NULL, NULL),
(10, 'Audi', 'A4', 'sedan', 2022, 230.00, NULL, NULL, NULL, NULL),
(11, 'Toyota', 'Camry', 'sedan', 2017, 170.00, NULL, NULL, NULL, NULL),
(12, 'Ford', 'Fusion', 'sedan', 2020, 160.00, NULL, NULL, NULL, NULL),
(13, 'Chevrolet', 'Impala', 'sedan', 2019, 175.00, NULL, NULL, NULL, NULL),
(14, 'Honda', 'Accord', 'sedan', 2021, 190.00, NULL, NULL, NULL, NULL),
(15, 'Volkswagen', 'Passat', 'sedan', 2018, 165.00, NULL, NULL, NULL, NULL),
(16, 'Hyundai', 'Sonata', 'sedan', 2020, 155.00, NULL, NULL, NULL, NULL),
(17, 'Nissan', 'Maxima', 'sedan', 2019, 185.00, NULL, NULL, NULL, NULL),
(18, 'BMW', '5 Series', 'sedan', 2022, 250.00, NULL, NULL, NULL, NULL),
(19, 'Mercedes-Benz', 'E-Class', 'sedan', 2018, 240.00, NULL, NULL, NULL, NULL),
(20, 'Audi', 'A6', 'sedan', 2021, 260.00, NULL, NULL, NULL, NULL),
(21, 'Toyota', 'Rav4', 'SUV', 2019, 180.00, NULL, NULL, NULL, NULL),
(22, 'Ford', 'Escape', 'SUV', 2020, 170.00, NULL, NULL, NULL, NULL),
(23, 'Chevrolet', 'Equinox', 'SUV', 2022, 190.00, NULL, NULL, NULL, NULL),
(24, 'Honda', 'CR-V', 'SUV', 2018, 200.00, NULL, NULL, NULL, NULL),
(25, 'Volkswagen', 'Tiguan', 'SUV', 2021, 210.00, NULL, NULL, NULL, NULL),
(26, 'Hyundai', 'Tucson', 'SUV', 2019, 175.00, NULL, NULL, NULL, NULL),
(27, 'Nissan', 'Rogue', 'SUV', 2020, 185.00, NULL, NULL, NULL, NULL),
(28, 'BMW', 'X3', 'SUV', 2017, 220.00, NULL, NULL, NULL, NULL),
(29, 'Mercedes-Benz', 'GLC', 'SUV', 2022, 270.00, NULL, NULL, NULL, NULL),
(30, 'Audi', 'Q5', 'SUV', 2018, 240.00, NULL, NULL, NULL, NULL),
(31, 'Toyota', 'Highlander', 'SUV', 2020, 250.00, NULL, NULL, NULL, NULL),
(32, 'Ford', 'Explorer', 'SUV', 2019, 230.00, NULL, NULL, NULL, NULL),
(33, 'Chevrolet', 'Traverse', 'SUV', 2021, 260.00, NULL, NULL, NULL, NULL),
(34, 'Honda', 'Pilot', 'SUV', 2018, 270.00, NULL, NULL, NULL, NULL),
(35, 'Volkswagen', 'Atlas', 'SUV', 2022, 280.00, NULL, NULL, NULL, NULL),
(36, 'Hyundai', 'Palisade', 'SUV', 2019, 290.00, NULL, NULL, NULL, NULL),
(37, 'Nissan', 'Pathfinder', 'SUV', 2020, 255.00, NULL, NULL, NULL, NULL),
(38, 'BMW', 'X5', 'SUV', 2017, 300.00, NULL, NULL, NULL, NULL),
(39, 'Mercedes-Benz', 'GLE', 'SUV', 2021, 320.00, NULL, NULL, NULL, NULL),
(40, 'Audi', 'Q7', 'SUV', 2018, 310.00, NULL, NULL, NULL, NULL),
(41, 'Toyota', 'Tacoma', 'pickup', 2022, 180.00, NULL, NULL, NULL, NULL),
(42, 'Ford', 'Ranger', 'pickup', 2019, 170.00, NULL, NULL, NULL, NULL),
(43, 'Chevrolet', 'Colorado', 'pickup', 2020, 190.00, NULL, NULL, NULL, NULL),
(44, 'Honda', 'Ridgeline', 'pickup', 2018, 200.00, NULL, NULL, NULL, NULL),
(45, 'Volkswagen', 'Amarok', 'pickup', 2021, 210.00, NULL, NULL, NULL, NULL),
(46, 'Hyundai', 'Santa Cruz', 'pickup', 2019, 175.00, NULL, NULL, NULL, NULL),
(47, 'Nissan', 'Frontier', 'pickup', 2020, 185.00, NULL, NULL, NULL, NULL),
(48, 'Toyota', 'Tundra', 'pickup', 2017, 220.00, NULL, NULL, NULL, NULL),
(49, 'Ford', 'F-150', 'pickup', 2022, 270.00, NULL, NULL, NULL, NULL),
(50, 'Chevrolet', 'Silverado', 'pickup', 2018, 240.00, NULL, NULL, NULL, NULL),
(51, 'Honda', 'Civic Type R', 'hatchback', 2021, 280.00, NULL, NULL, NULL, NULL),
(52, 'Volkswagen', 'Golf GTI', 'hatchback', 2019, 250.00, NULL, NULL, NULL, NULL),
(53, 'Hyundai', 'Veloster N', 'hatchback', 2020, 260.00, NULL, NULL, NULL, NULL),
(54, 'Nissan', '370Z', 'coupe', 2018, 270.00, NULL, NULL, NULL, NULL),
(55, 'BMW', 'M2', 'coupe', 2022, 300.00, NULL, NULL, NULL, NULL),
(56, 'Mercedes-Benz', 'AMG A45', 'hatchback', 2017, 320.00, NULL, NULL, NULL, NULL),
(57, 'Audi', 'RS3', 'sedan', 2021, 310.00, NULL, NULL, NULL, NULL),
(58, 'Toyota', 'Supra', 'coupe', 2019, 350.00, NULL, NULL, NULL, NULL),
(59, 'Ford', 'Mustang', 'coupe', 2020, 330.00, NULL, NULL, NULL, NULL),
(60, 'Chevrolet', 'Camaro', 'coupe', 2018, 340.00, NULL, NULL, NULL, NULL),
(61, 'Honda', 'NSX', 'coupe', 2022, 400.00, NULL, NULL, NULL, NULL),
(62, 'Volkswagen', 'Arteon', 'sedan', 2017, 370.00, NULL, NULL, NULL, NULL),
(63, 'Hyundai', 'Genesis G70', 'sedan', 2019, 380.00, NULL, NULL, NULL, NULL),
(64, 'Nissan', 'GT-R', 'coupe', 2020, 360.00, NULL, NULL, NULL, NULL),
(65, 'BMW', 'M5', 'sedan', 2018, 420.00, NULL, NULL, NULL, NULL),
(66, 'Mercedes-Benz', 'S63 AMG', 'sedan', 2021, 450.00, NULL, NULL, NULL, NULL),
(67, 'Audi', 'S8', 'sedan', 2019, 430.00, NULL, NULL, NULL, NULL),
(68, 'Toyota', 'Land Cruiser', 'SUV', 2022, 380.00, NULL, NULL, NULL, NULL),
(69, 'Ford', 'Expedition', 'SUV', 2017, 400.00, NULL, NULL, NULL, NULL),
(70, 'Chevrolet', 'Suburban', 'SUV', 2018, 420.00, NULL, NULL, NULL, NULL),
(71, 'Honda', 'Pilot', 'SUV', 2021, 440.00, NULL, NULL, NULL, NULL),
(72, 'Volkswagen', 'Atlas Cross Sport', 'SUV', 2019, 410.00, NULL, NULL, NULL, NULL),
(73, 'Hyundai', 'Kona', 'SUV', 2020, 370.00, NULL, NULL, NULL, NULL),
(74, 'Nissan', 'Kicks', 'SUV', 2018, 360.00, NULL, NULL, NULL, NULL),
(75, 'BMW', 'X1', 'SUV', 2022, 390.00, NULL, NULL, NULL, NULL),
(76, 'Mercedes-Benz', 'GLA', 'SUV', 2017, 380.00, NULL, NULL, NULL, NULL),
(77, 'Audi', 'Q3', 'SUV', 2019, 370.00, NULL, NULL, NULL, NULL),
(78, 'Toyota', 'C-HR', 'SUV', 2020, 350.00, NULL, NULL, NULL, NULL),
(79, 'Ford', 'EcoSport', 'SUV', 2018, 340.00, NULL, NULL, NULL, NULL),
(80, 'Chevrolet', 'Trailblazer', 'SUV', 2021, 330.00, NULL, NULL, NULL, NULL),
(81, 'Honda', 'HR-V', 'SUV', 2019, 320.00, NULL, NULL, NULL, NULL),
(82, 'Volkswagen', 'T-Roc', 'SUV', 2022, 310.00, NULL, NULL, NULL, NULL),
(83, 'Hyundai', 'Venue', 'SUV', 2018, 300.00, NULL, NULL, NULL, NULL),
(84, 'Nissan', 'Kicks', 'SUV', 2020, 290.00, NULL, NULL, NULL, NULL),
(85, 'BMW', 'X2', 'SUV', 2017, 280.00, NULL, NULL, NULL, NULL),
(86, 'Mercedes-Benz', 'GLB', 'SUV', 2019, 270.00, NULL, NULL, NULL, NULL),
(87, 'Audi', 'Q2', 'SUV', 2021, 260.00, NULL, NULL, NULL, NULL),
(88, 'Toyota', 'Sienna', 'van', 2018, 250.00, NULL, NULL, NULL, NULL),
(89, 'Ford', 'Transit', 'van', 2020, 240.00, NULL, NULL, NULL, NULL),
(90, 'Chevrolet', 'Express', 'van', 2022, 230.00, NULL, NULL, NULL, NULL),
(91, 'Honda', 'Odyssey', 'van', 2019, 220.00, NULL, NULL, NULL, NULL),
(92, 'Volkswagen', 'Caravelle', 'van', 2017, 210.00, NULL, NULL, NULL, NULL),
(93, 'Hyundai', 'Palisade', 'SUV', 2021, 200.00, NULL, NULL, NULL, NULL),
(94, 'Nissan', 'NV200', 'van', 2018, 190.00, NULL, NULL, NULL, NULL),
(95, 'BMW', 'X7', 'SUV', 2020, 180.00, NULL, NULL, NULL, NULL),
(96, 'Mercedes-Benz', 'Sprinter', 'van', 2022, 170.00, NULL, NULL, NULL, NULL),
(97, 'Audi', 'Q8', 'SUV', 2019, 160.00, NULL, NULL, NULL, NULL),
(98, 'Toyota', 'Highlander Hybrid', 'SUV', 2017, 150.00, NULL, NULL, NULL, NULL),
(99, 'Ford', 'Escape Hybrid', 'SUV', 2018, 140.00, NULL, NULL, NULL, NULL),
(100, 'Chevrolet', 'Tahoe Hybrid', 'SUV', 2021, 130.00, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `docsdb`
--

CREATE TABLE `docsdb` (
  `id_umowy` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_car` int(11) DEFAULT NULL,
  `imie` varchar(30) DEFAULT NULL,
  `nazwisko` varchar(30) DEFAULT NULL,
  `data_wypozyczenia` date DEFAULT NULL,
  `data_oddania` date DEFAULT NULL,
  `cena_total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `logindb`
--

CREATE TABLE `logindb` (
  `id_user` int(11) NOT NULL,
  `login` varchar(30) DEFAULT NULL,
  `haslo` varchar(30) DEFAULT NULL,
  `imie` varchar(30) DEFAULT NULL,
  `nazwisko` varchar(30) DEFAULT NULL,
  `data_urodzenia` date DEFAULT NULL,
  `nr_prawajazdy` int(11) DEFAULT NULL,
  `admin_perm` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logindb`
--

INSERT INTO `logindb` (`id_user`, `login`, `haslo`, `imie`, `nazwisko`, `data_urodzenia`, `nr_prawajazdy`, `admin_perm`) VALUES
(0, 'admin1', 'admin1', NULL, NULL, NULL, NULL, 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `cardb`
--
ALTER TABLE `cardb`
  ADD PRIMARY KEY (`id_car`),
  ADD UNIQUE KEY `id_car` (`id_car`),
  ADD UNIQUE KEY `id_car_2` (`id_car`),
  ADD KEY `id_umowy` (`id_umowy`);

--
-- Indeksy dla tabeli `docsdb`
--
ALTER TABLE `docsdb`
  ADD PRIMARY KEY (`id_umowy`),
  ADD UNIQUE KEY `id_umowy` (`id_umowy`),
  ADD UNIQUE KEY `id_umowy_2` (`id_umowy`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_car` (`id_car`);

--
-- Indeksy dla tabeli `logindb`
--
ALTER TABLE `logindb`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `id_user` (`id_user`),
  ADD UNIQUE KEY `id_user_2` (`id_user`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `nr_prawajazdy` (`nr_prawajazdy`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cardb`
--
ALTER TABLE `cardb`
  ADD CONSTRAINT `cardb_ibfk_1` FOREIGN KEY (`id_umowy`) REFERENCES `docsdb` (`id_umowy`);

--
-- Constraints for table `docsdb`
--
ALTER TABLE `docsdb`
  ADD CONSTRAINT `docsdb_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `logindb` (`id_user`),
  ADD CONSTRAINT `docsdb_ibfk_2` FOREIGN KEY (`id_car`) REFERENCES `cardb` (`id_car`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
