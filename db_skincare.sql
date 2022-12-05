-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Des 2022 pada 03.04
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_skincare`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_category`
--

CREATE TABLE `tb_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_category`
--

INSERT INTO `tb_category` (`category_id`, `category_name`) VALUES
(6, 'Skincare');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE `tb_produk` (
  `produk_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `data_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`produk_id`, `category_id`, `nama_produk`, `harga`, `deskripsi`, `gambar`, `data_created`) VALUES
(13, 6, 'NPURE Centella Asiatica Face Primer Serum', 120000, 'NPURE Centella Asiatica Face Primer Serum', 'produk1669947866.jpg', '2022-12-02 02:24:26'),
(14, 6, 'NPURE Centella Asiatica Face Toner', 90000, 'NPURE Centella Asiatica Face Toner', 'produk1669947899.jpeg', '2022-12-02 02:24:59'),
(15, 6, 'NPURE Essence Centella', 135000, 'NPURE Essence Centella', 'produk1669947932.jpg', '2022-12-02 02:25:32'),
(16, 6, 'NPURE Centella Asiatica Face Wash', 90000, 'NPURE Centella Asiatica Face Wash', 'produk1669947965.jpg', '2022-12-02 02:26:05'),
(17, 6, 'NPURE Night Cream Centella', 90000, 'NPURE Night Cream Centella', 'produk1669948001.jpg', '2022-12-02 02:26:41'),
(18, 6, 'NPURE Day Cream Centella', 90000, 'NPURE Day Cream Centella', 'produk1669948037.jpg', '2022-12-02 02:27:17'),
(19, 6, 'NPURE PAKET CICA (Wash,Toner,Day,Night,Primer Serum)', 490000, 'NPURE PAKET CICA (Wash,Toner,Day,Night,Primer Serum)', 'produk1669949286.jpg', '2022-12-02 02:27:45');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeks untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`produk_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD CONSTRAINT `tb_produk_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tb_category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
