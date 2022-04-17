-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Apr 2022 pada 15.08
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `room_rental`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `room_id` varchar(11) NOT NULL,
  `tenant_id` int(11) NOT NULL,
  `book_start_date` date NOT NULL,
  `book_end_date` date NOT NULL,
  `payment_status` enum('unpaid','paid') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `books`
--

INSERT INTO `books` (`book_id`, `room_id`, `tenant_id`, `book_start_date`, `book_end_date`, `payment_status`) VALUES
(4, '2', 5, '2022-04-04', '2022-06-04', 'unpaid'),
(6, '1', 7, '2022-04-10', '2022-05-17', 'unpaid'),
(8, '7', 9, '2022-04-16', '2022-08-16', 'paid');

-- --------------------------------------------------------

--
-- Struktur dari tabel `histories`
--

CREATE TABLE `histories` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `tenant_id` int(11) NOT NULL,
  `book_start_date` date NOT NULL,
  `book_end_date` date NOT NULL,
  `fine_broken_bed` int(11) NOT NULL,
  `fine_broken_mattress` int(11) NOT NULL,
  `fine_broken_pillow` int(11) NOT NULL,
  `fine_light_bulb` int(11) NOT NULL,
  `fine_desk` int(11) NOT NULL,
  `fine_air_conditioner` int(11) NOT NULL,
  `fine_trash_can` int(11) NOT NULL,
  `fine_window` int(11) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `histories`
--

INSERT INTO `histories` (`id`, `room_id`, `tenant_id`, `book_start_date`, `book_end_date`, `fine_broken_bed`, `fine_broken_mattress`, `fine_broken_pillow`, `fine_light_bulb`, `fine_desk`, `fine_air_conditioner`, `fine_trash_can`, `fine_window`, `total_price`) VALUES
(4, 9, 6, '2022-04-17', '2022-06-17', 1500000, 500000, 100000, 0, 0, 0, 0, 0, 3100000),
(5, 6, 8, '2022-04-18', '2022-07-18', 0, 500000, 100000, 30000, 0, 0, 25000, 0, 3855000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(10) NOT NULL,
  `room_label` varchar(50) NOT NULL,
  `room_location` enum('1st Floor','2nd Floor') NOT NULL,
  `room_gender` enum('Men','Women') NOT NULL,
  `room_window` varchar(50) NOT NULL,
  `room_monthly_price` int(11) NOT NULL,
  `room_availability` enum('Available','Booked') NOT NULL,
  `room_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_label`, `room_location`, `room_gender`, `room_window`, `room_monthly_price`, `room_availability`, `room_description`) VALUES
(1, 'M1', '1st Floor', 'Men', 'Tembok', 1000000, 'Booked', 'AC, TV'),
(2, 'M2', '1st Floor', 'Men', 'Floor', 1000000, 'Booked', 'AC, TV'),
(3, 'M3', '1st Floor', 'Men', 'Floor', 1000000, 'Available', 'AC, TV'),
(4, 'M4', '1st Floor', 'Men', 'Floor', 1000000, 'Available', 'AC, TV'),
(5, 'M5', '1st Floor', 'Men', 'Floor', 1000000, 'Available', 'AC, TV'),
(6, 'M6', '2nd Floor', 'Men', 'Garden', 1400000, 'Available', 'AC, TV, KULKAS, DAPUR'),
(7, 'M7', '2nd Floor', 'Men', 'Garden', 1400000, 'Booked', 'AC, TV, KULKAS, DAPUR'),
(8, 'W1', '1st Floor', 'Women', 'Garden', 1000000, 'Available', 'AC, TV, KULKAS, DAPUR'),
(9, 'W2', '1st Floor', 'Women', 'Garden', 1000000, 'Available', 'AC, TV, KULKAS, DAPUR');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tenants`
--

CREATE TABLE `tenants` (
  `tenant_id` int(11) NOT NULL,
  `tenant_name` varchar(100) NOT NULL,
  `tenant_address` varchar(100) NOT NULL,
  `tenant_ktp_no` varchar(20) NOT NULL,
  `tenant_phone` varchar(20) NOT NULL,
  `tenant_email` varchar(100) NOT NULL,
  `tenant_emergcp` varchar(100) NOT NULL,
  `tenant_emergcp_phone` varchar(20) NOT NULL,
  `tenant_emergcp_email` varchar(100) NOT NULL,
  `tenant_bankaccount` varchar(50) NOT NULL,
  `tenant_bankaccount_no` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tenants`
--

INSERT INTO `tenants` (`tenant_id`, `tenant_name`, `tenant_address`, `tenant_ktp_no`, `tenant_phone`, `tenant_email`, `tenant_emergcp`, `tenant_emergcp_phone`, `tenant_emergcp_email`, `tenant_bankaccount`, `tenant_bankaccount_no`) VALUES
(4, 'Minho', 'Jln. Amir Hamzah no. 999', '123456789', '08123456789', 'minho@gmail.com', 'Snow White', '081987654321', 'snowwhite@gmail.com', 'minho', '41231231'),
(5, 'Morgan Housel', 'North America', '789798798', '798789798', 'morganhousel@morgan.com', 'dasdas', '081987654321', 'dasda@gmail.com', 'Morgan Housel', '78798798798'),
(6, 'Thomas Muller', 'Bandung, Indonesia', '123123123', '098787878', 'thomasmuller@gmail.com', 'Chris Foo', '123123121', 'chrisfoo@gmail.com', 'Thomas Muller', '9080980980'),
(7, 'Efvy Zem', 'Jakarta, Indonesia', '1313123', '08123456789', 'efvyzem@gmail.com', 'Riyanto', '3131321231', 'riyanto@gmail.com', 'Efvy Zem', '31231231'),
(8, 'Keyta', 'Manchester, England', '311231', '989831312', 'kayta@gmail.com', 'Keyroro', '77878788', 'keyroro@gmail.com', 'Keyta', '980980980'),
(9, 'Minho', 'Kediri, Jawa Timur', '33121321', '98983131212', 'minho@minho.com', 'Snow White', '312313212312', 'snowwhite@gmail.com', 'Minho', '312312');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indeks untuk tabel `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indeks untuk tabel `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`tenant_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `histories`
--
ALTER TABLE `histories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tenants`
--
ALTER TABLE `tenants`
  MODIFY `tenant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
