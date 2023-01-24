-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 25 jan 2023 om 00:20
-- Serverversie: 10.4.22-MariaDB
-- PHP-versie: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taxi`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `brand` varchar(200) NOT NULL,
  `model` varchar(200) NOT NULL,
  `numberplate` varchar(200) NOT NULL,
  `amount_of_seats` int(100) NOT NULL,
  `in_bezit` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `cars`
--

INSERT INTO `cars` (`id`, `brand`, `model`, `numberplate`, `amount_of_seats`, `in_bezit`) VALUES
(1, 'Mercedes-Benz', 'Vito', 'DK-66-24', 9, 0),
(2, 'Mercedes-Benz', 'C-Klasse', 'K-981-TV', 5, 1),
(3, 'Mercedes-Benz', 'C-Klasse', 'KP-83-30', 5, 0),
(4, 'Mercedes-Benz', 'C-Klasse', '01-RDW-1', 5, 0),
(5, 'Mercedes-Benz', 'C-Klasse', 'CD-56-80', 5, 0),
(6, 'Mercedes-Benz', 'C-Klasse', 'TNT-11-B', 5, 0),
(7, 'Mercedes-Benz', 'C-Klasse', 'D-12-BDF', 5, 0),
(8, 'Mercedes-Benz', 'C-Klasse', '0-DB-O13', 5, 0),
(9, 'Mercedes-Benz', 'C-Klasse', 'TN-326-G', 5, 0),
(10, 'Mercedes-Benz', 'C-Klasse', 'TR-95-NJ', 5, 0),
(11, 'Mercedes-Benz', 'C-Klasse', 'JG-PV-81', 5, 0),
(12, 'Mercedes-Benz', 'C-Klasse', 'KP-345-2', 5, 0),
(13, 'Mercedes-Benz', 'C-Klasse', 'G-936-BB', 5, 0),
(14, 'Mercedes-Benz', 'C-Klasse', 'JS-777-N', 5, 0),
(15, 'Mercedes-Benz', 'C-Klasse', 'XK-50-HF', 5, 0),
(16, 'Mercedes-Benz', 'C-Klasse', '01-VBB-1', 5, 0),
(17, 'Mercedes-Benz', 'Vito', 'G-943-JD', 9, 0),
(18, 'Mercedes-Benz', 'Vito', 'TBD-65-F', 9, 0),
(19, 'Mercedes-Benz', 'Vito', 'ZZ-51-41', 9, 0),
(20, 'Mercedes-Benz', 'Vito', 'FZ-VB-57', 9, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `riders`
--

CREATE TABLE `riders` (
  `id` int(11) NOT NULL,
  `cleint_id` int(11) NOT NULL,
  `taxi_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `status` enum('aangevraagd','bezig','gedaan','') NOT NULL,
  `number_of_passengers` int(100) NOT NULL,
  `pickup_datetime` datetime NOT NULL,
  `pickup_address` varchar(200) NOT NULL,
  `pickup_city` varchar(200) NOT NULL,
  `destination_datetime` datetime NOT NULL,
  `destination_address` varchar(200) NOT NULL,
  `destination_city` varchar(200) NOT NULL,
  `driven_distance` int(100) NOT NULL,
  `totalprice` double(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `riders`
--

INSERT INTO `riders` (`id`, `cleint_id`, `taxi_id`, `driver_id`, `status`, `number_of_passengers`, `pickup_datetime`, `pickup_address`, `pickup_city`, `destination_datetime`, `destination_address`, `destination_city`, `driven_distance`, `totalprice`) VALUES
(2, 1, 2, 5, 'gedaan', 3, '2023-01-13 14:31:00', 'jkh', 'ghdjhg', '2023-01-18 21:54:00', 'jkghjk', 'jhjhl', 0, 0.00),
(6, 1, 1, 3, 'gedaan', 2, '2023-01-14 22:47:00', 'ghdfajk', 'wewf', '2023-01-20 06:55:00', 'ibyuim', 'scv', 0, 0.00),
(7, 1, 2, 5, 'gedaan', 2, '2023-01-06 05:23:00', 'hsjsadfs', 'sdfasdf', '2023-01-13 07:54:00', 'asdfasdf', 'sdfgsdfg', 5, 13.00),
(8, 1, 2, 5, 'aangevraagd', 2, '2023-01-27 03:00:00', 'sdf', 'dsg', '0000-00-00 00:00:00', 'ewwer', 'sdfas', 5, 13.00),
(9, 47, 14, 5, 'gedaan', 4, '2023-01-20 15:20:00', 'dam 1', 'amsterdam', '2023-01-20 20:27:00', 'schiphol', 'amsterdam', 5, 13.00);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `role` enum('employee','driver','customer','') NOT NULL,
  `is_bezig` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `firstname`, `lastname`, `address`, `city`, `is_active`, `role`, `is_bezig`) VALUES
(1, 'hoi@hoi.com', 'hoi', 'hoi', 'caron', 'hoi2', 'hallo', 1, 'customer', 0),
(3, 'driver@d.com', '123', 'driver', 'driver', 'driver2', 'driver', 1, 'driver', 0),
(4, 'admin@admin.com', 'admin', 'admin', 'admin', 'sdf', 'sdf', 1, 'employee', 0),
(5, 'd@driver.com', 'driver', 'driver2', 'driver2', 'daf', 'sadf', 1, 'driver', 0),
(6, 'driver2@d.com', 'driver', 'driver3', 'driver3', 'avboivcu', 'uewrgfiueg', 1, 'driver', 0),
(7, 'driver4@d.com', 'driver', 'driver4', 'driver4', 'afs', 'jkhsgldk', 1, 'driver', 0),
(8, 'driver5@d.com', 'driver', 'driver5', 'driver5', 'sdgasd', 'sdfasd', 1, 'driver', 0),
(9, 'driver6@d.com', 'driver', 'driver6', 'driver6', 'djkf', 'kjdfsgl', 1, 'driver', 0),
(10, 'driver7@d.com', 'driver', 'driver7', 'driver7', 'skjdfhlksjda', 'nnouiubioouo', 1, 'driver', 0),
(11, 'driver8@d.com', 'driver', 'driver8', 'driver8', 'gtveggevvgtrgtrv', 'uycgbyfgbyue', 1, 'driver', 0),
(13, 'driver9@d.com', 'driver', 'driver9', 'driver9', 'uyscibfg', 'lksjdgfakjsh', 1, 'driver', 0),
(14, 'driver10@d.com', 'driver', 'driver10', 'driver10', 'sdfjachni', 'euhnfociwge', 1, 'driver', 1),
(15, 'driver19@d.com', 'driver', 'driver11', 'driver19', 'sdflwieurqo', 'poiuyf', 1, 'driver', 0),
(17, 'driver11@d.com', 'driver', 'driver11', 'driver11', 'sdflwieurqo', 'poiuyf', 1, 'driver', 0),
(18, 'driver12@d.com', 'driver', 'driver12', 'driver12', 'driveskjldfh', 'sdanfksj', 1, 'driver', 0),
(19, 'driver13@d.com', 'driver', 'driver13', 'driver13', 'driveskjldfh', 'sdanfksj', 1, 'driver', 0),
(20, 'driver14@d.com', 'driver', 'driver14', 'driver14', 'driveskjldfh', 'sdanfksj', 1, 'driver', 0),
(21, 'driver15@d.com', 'driver', 'driver15', 'driver15', 'driveskjldfh', 'sdanfksj', 1, 'driver', 0),
(22, 'driver16@d.com', 'driver', 'driver16', 'driver16', 'driveskjldfh', 'sdanfksj', 1, 'driver', 0),
(23, 'driver17@d.com', 'driver', 'driver17', 'driver17', 'driveskjldfh', 'sdanfksj', 1, 'driver', 0),
(24, 'driver18@d.com', 'driver', 'driver18', 'driver18', 'driveskjldfh', 'sdanfksj', 1, 'driver', 0),
(25, 'driver20@d.com', 'driver', 'driver20', 'driver20', 'driveskjldfh', 'sdanfksj', 1, 'driver', 0),
(26, 'driver21@d.com', 'driver', 'driver21', 'driver21', 'driveskjldfh', 'sdanfksj', 1, 'driver', 0),
(27, 'driver22@d.com', 'driver', 'driver22', 'driver22', 'driveskjldfh', 'sdanfksj', 1, 'driver', 0),
(28, 'driver23@d.com', 'driver', 'driver23', 'driver23', 'driveskjldfh', 'sdanfksj', 1, 'driver', 0),
(29, 'driver24@d.com', 'driver', 'driver24', 'driver24', 'sdfsa', 'sadfsadfs', 1, 'driver', 0),
(30, 'driver25@d.com', 'driver', 'driver25', 'driver25', 'skjdfaluy', 'qwerty', 1, 'driver', 0),
(31, 'driver26', 'driver', 'driver26', 'driver26', 'jkasdfhl', 'asf', 1, 'driver', 0),
(32, 'driver27@d.com', 'driver', 'driver27', 'driver27', 'sdfghjk', 'kjhg', 1, 'driver', 0),
(33, 'driver28@d.com', 'driver', 'driver28', 'driver28', 'dfghjiv', 'rfgvbhjuyf', 1, 'driver', 0),
(34, 'driver29@d.com', 'driver', 'driver29', 'driver29', 'dfghhjklbhkhvft', 'dgtryuiopjk hg', 1, 'driver', 0),
(35, 'driver28@d.com', 'driver', 'driver28', 'driver28', 'dfghjiv', 'rfgvbhjuyf', 1, 'driver', 0),
(36, 'driver29@d.com', 'driver', 'driver29', 'driver29', 'dfghhjklbhkhvft', 'dgtryuiopjk hg', 1, 'driver', 0),
(37, 'driver30@d.com', 'driver', 'driver30', 'driver30', 'rdtyuioern', 'poiugyftgcvbnhjh', 1, 'driver', 0),
(38, 'driver31@d.com', 'driver', 'driver31', 'driver31', 'iujhnb', 'edcfgvbkljhn', 1, 'driver', 0),
(39, 'driver32@d.com', 'driver', 'driver32', 'driver32', 'rdtyuioern', 'poiugyftgcvbnhjh', 1, 'driver', 0),
(40, 'driver33@d.com', 'driver', 'driver33', 'driver33', 'iujhnb', 'edcfgvbkljhn', 1, 'driver', 0),
(41, 'driver34@d.com', 'driver', 'driver34', 'driver34', 'swedfcgvbhnjkj', 'sedfcgvbnkjhg', 1, 'driver', 0),
(42, 'driver35@d.com', 'driver', 'driver35', 'driver35', 'sedfcgvbijhbnxdjhmmjiyd', 'lkjl;kl;jk', 1, 'driver', 0),
(43, 'admin2@a.com', 'admin', 'admin2', 'admin2', 'tyfjkyyug hjbj', 'oiuyhbhj', 1, 'employee', 0),
(44, 'admin3@a.com', 'admin', 'admin3', 'admin3', 'ybrtheryhbry', 'mutnyvcr', 1, 'employee', 0),
(45, 'admin4@a.com', 'admin', 'admin4', 'admin4', 'drftgbhjn', 'uihggvc', 1, 'employee', 0),
(46, 'admin5@a.com', 'admin', 'admin5', 'admin5', 'iuhgvbnjtfgvhb', 'rfgvbhbn', 1, 'employee', 0),
(47, 'broes@willis.com', 'welkom', 'broes', 'willis', 'kerklaan 1', 'alkmaar', 0, 'customer', 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `riders`
--
ALTER TABLE `riders`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT voor een tabel `riders`
--
ALTER TABLE `riders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
