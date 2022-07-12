-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jul 2022 pada 01.21
-- Versi server: 8.0.28
-- Versi PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi_forward_tembakau`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_riwayat`
--

CREATE TABLE `detail_riwayat` (
  `id` int NOT NULL,
  `id_riwayat` int NOT NULL,
  `id_gejala` int NOT NULL
) ;

--
-- Dumping data untuk tabel `detail_riwayat`
--

INSERT INTO `detail_riwayat` (`id`, `id_riwayat`, `id_gejala`) VALUES
(1, 1, 8),
(2, 1, 11),
(3, 1, 14),
(4, 1, 17);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `id` int NOT NULL,
  `nama` varchar(40) NOT NULL
) ;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`id`, `nama`) VALUES
(1, 'Daun menjadi transparan'),
(2, 'Daun berlubang tidak beraturan'),
(3, 'Daun sisa tulang '),
(4, 'Daun berlubang'),
(5, 'Daun pucuk berlubang'),
(6, 'Daun tembakau lengket'),
(7, 'Daun ditumbuhi cendawan berwarna hitam'),
(8, 'Permukaan daun nekrotik'),
(9, 'Permukaan daun ditutupi jelaga'),
(10, 'Bintik bitnik berwarna perak di dekat tu'),
(11, 'Daun tampak keriput mengeritinng dan mel'),
(12, 'Daun Menjadi layu dan akhirnya kering'),
(13, 'Bagian akar tanaman tampak bisul-bisul b'),
(14, 'Pertumbuhan tanaman terhambat. Kutu ini '),
(15, 'daun terserang berlubang-lubang terutama'),
(16, '.bagian bawah daun yang terserang berwar'),
(17, 'Daun tampak masak sebelum waktunya, kada'),
(18, 'batang tanaman yang terinfeksi akan meng'),
(19, 'Tanaman layu tiba-tiba, seluruh daun ter'),
(20, '.Ketika dicabut, pangkal batang terlihat'),
(21, 'Apabila dibelah, empulurnya terlihat ber'),
(22, 'Permukaan daun berwarna cokelat'),
(23, 'di atas daun terdapat bercak bulat putih'),
(24, 'timbul bercak-bercak coklat'),
(25, 'mirip dengan lanas namun daun membusuk,'),
(26, 'Pangkal bibit seperti kejepit, busuk, be'),
(27, 'Daun daun muda terdapat bercak-bercak ku'),
(28, 'Daun daun mudanya warna lebih terang'),
(29, 'Tanaman kerdil'),
(30, 'Daun menyempit dan mengalami distori'),
(31, 'Tulang daun berwarna jernih'),
(32, 'Daun berwarna putih memanjang atau membe'),
(33, 'Daun berkerut dengan tepi melengkung'),
(34, 'Tepi daun melengkung ke bawah, tulang da'),
(35, 'Tanaman mulai layu'),
(36, 'Seluruh tanaman layu daun menguning samp'),
(37, 'Tanaman layu'),
(38, 'Daun daun berwarna kuning'),
(39, 'Bagian batang berlubang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int NOT NULL,
  `nama` varchar(40) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(35) NOT NULL
) ;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `username`, `password`) VALUES
(3, 'Admin Website', 'admin', 'c4ca4238a0b923820dcc509a6f75849b'),
(5, 'ok', 'admin1', '444bcb3a3fcf8389296c49467f27e1d6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit`
--

CREATE TABLE `penyakit` (
  `id` int NOT NULL,
  `nama` varchar(40) NOT NULL,
  `solusi` text
) ;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`id`, `nama`, `solusi`) VALUES
(1, 'Ulat Grayak (Spodoptera litura)', '-'),
(2, 'Ulat Pucuk', '-'),
(3, 'Kutu Daun', '-'),
(4, 'Kutu Kebul/kutu putih (Bemissia tabaci)', '-'),
(5, 'Thrips  (Thrips parvispinus)', '-'),
(6, 'Wereng Tembakau', '-'),
(7, 'Nematoda', '-'),
(8, 'Kutu Kutuan', '-'),
(9, 'Ulat Tanah', '-'),
(10, 'Londrak', '-'),
(11, 'Hangus Batang', '-'),
(12, 'Lanas', '-'),
(13, 'Patik Daun', '-'),
(14, 'Bercak Coklat', '-'),
(15, 'Busuk Daun', '-'),
(16, 'Rebah Kecambah', '-'),
(17, 'Virus  TMV', '-'),
(18, 'Virus CMV', '-'),
(19, 'Virus Betok', '-'),
(20, 'Virus Kerupuk', '-'),
(21, 'Layu Bakteri', '-'),
(22, 'Batang Berlubang', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat`
--

CREATE TABLE `riwayat` (
  `id` int NOT NULL,
  `id_penyakit` int NOT NULL,
  `tanggal` timestamp NOT NULL,
  `ip` varchar(13) NOT NULL
) ;

--
-- Dumping data untuk tabel `riwayat`
--

INSERT INTO `riwayat` (`id`, `id_penyakit`, `tanggal`, `ip`) VALUES
(1, 4, '2022-07-11 18:14:26', '::1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_penyakit`
--

CREATE TABLE `role_penyakit` (
  `id` int NOT NULL,
  `id_penyakit` int NOT NULL,
  `id_gejala` int NOT NULL,
  `mb` float NOT NULL,
  `md` float NOT NULL
) ;

--
-- Dumping data untuk tabel `role_penyakit`
--

INSERT INTO `role_penyakit` (`id`, `id_penyakit`, `id_gejala`, `mb`, `md`) VALUES
(1, 1, 1, 0.8, 0.6),
(2, 1, 2, 1, 0.2),
(3, 1, 3, 0.8, 0),
(4, 2, 4, 0.8, 0.8),
(5, 2, 5, 0.8, 0.2),
(6, 3, 6, 0.6, 0),
(7, 3, 7, 1, 0.4),
(8, 4, 8, 1, 0),
(9, 4, 9, 0.8, 0.2),
(10, 5, 10, 0.6, 0),
(11, 5, 11, 0.6, 0),
(12, 6, 12, 0.8, 0.2),
(13, 7, 13, 1, 0),
(14, 8, 14, 0.8, 0.2),
(15, 9, 15, 0.6, 0),
(16, 10, 16, 0.6, 0),
(17, 10, 17, 0.8, 0.2),
(18, 11, 18, 1, 0),
(19, 12, 19, 0.8, 0.2),
(20, 12, 20, 0.6, 0),
(21, 12, 21, 0.8, 0),
(22, 13, 22, 0.8, 0.2),
(23, 13, 23, 1, 0),
(24, 14, 24, 0.8, 0.2),
(25, 15, 25, 0.6, 0),
(26, 16, 26, 0.6, 0),
(27, 17, 27, 0.8, 0.2),
(28, 18, 29, 0.8, 0.2),
(29, 18, 30, 0.6, 0),
(30, 19, 31, 0.6, 0),
(31, 19, 32, 0.8, 0.2),
(32, 20, 33, 1, 0),
(33, 20, 34, 0.8, 0.2),
(34, 21, 35, 0.6, 0),
(35, 21, 36, 0.6, 0),
(36, 22, 37, 0.8, 0.2),
(37, 22, 38, 0.8, 0.2),
(38, 22, 39, 0.8, 0.2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_riwayat`
--
ALTER TABLE `detail_riwayat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role_penyakit`
--
ALTER TABLE `role_penyakit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_riwayat`
--
ALTER TABLE `detail_riwayat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `role_penyakit`
--
ALTER TABLE `role_penyakit`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
