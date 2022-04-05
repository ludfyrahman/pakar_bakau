-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Apr 2022 pada 05.46
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
-- Database: `skripsi_naive_bayes_ayam`
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
(1, 1, 54),
(2, 1, 55),
(3, 1, 56),
(4, 1, 57);

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
(1, 'Ngorok'),
(2, 'Menggeleng-gelengkan kepala '),
(3, 'Mengeluarkan nanah dari hidung '),
(4, 'Batuk '),
(5, 'Bersin '),
(6, 'Tampak lesu dan mengantuk '),
(7, 'Nafsu makan menurun'),
(8, 'Nafsu minum menurun'),
(9, 'Mencret '),
(10, 'Jengger dan kepala kebiruan '),
(11, 'Kornea menjadi keruh '),
(12, 'Gemetar '),
(13, 'Kejang-kejang '),
(14, 'Bulu tampak kusam '),
(15, 'Diare berlendir mengotori bulu pantat '),
(16, 'Bulu lengket di sekitar pantat'),
(17, 'Mematok dubur sendiri '),
(18, 'Paruh menempel di lantai ketika tidur '),
(19, 'Terdapat kotoran warna darah menempel di'),
(20, 'Kloaka tampak putih '),
(21, 'Mata menutup '),
(22, 'Lumpuh '),
(23, 'Bulu kusam dan mengkerut'),
(24, 'Diare'),
(25, 'Badan kurus'),
(26, 'Produksi telur menurun'),
(27, 'Keluar nanah dari mata'),
(28, 'Nafas cepat'),
(29, 'Sesak nafas '),
(30, 'Nafas megap-megap'),
(31, 'Terdapat leleran hidung lengket'),
(32, 'Terdapat cairan berbusa pada mata'),
(33, 'Kualitas telur jelek'),
(34, 'Sayap menggantung'),
(35, 'Pincang'),
(36, 'Sempoyongan'),
(37, 'Muka pucat'),
(38, 'Pembengkakan dari sinus dan mata'),
(39, 'Duduk membungkuk'),
(40, 'Kotoran kehijau-hijauan'),
(41, 'Kotoran keputih-putihan'),
(42, 'Diare kehijau-hijauan'),
(43, 'Kepala dan leher bergetar'),
(44, 'Warna telur pudar / menghilang'),
(45, 'Kelainan bentuk telur'),
(46, 'Telur kerabang lunak '),
(47, 'Telur tanpa kerabang'),
(48, 'Muka / kepala bengkak'),
(49, 'Keluar cairan encer dari mata dan hidung'),
(50, 'Terdapat lendir bercampur darah pada ron'),
(51, 'Batuk darah'),
(52, 'Murung '),
(53, 'Perut bengkak'),
(54, 'Kaki radang'),
(55, 'Kaki bengkak'),
(56, 'Kedinginan'),
(57, 'Sianosis / nampak membiru'),
(58, 'Pertumbuhan terhambat'),
(59, 'Jengger pucat'),
(60, 'Kepala tertunduk'),
(61, 'Jengger / pial menyusut'),
(62, 'Mati secara mendadak');

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
(3, 'Admin Website', 'admin', 'c4ca4238a0b923820dcc509a6f75849b');

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
(1, 'Encefalomielitis unggas', '1. Vaksin\n2. Anak ayam yang kondisinya parah, sebaiknya diafkir. Untuk anak ayam yang sudah mati, bangkainya bisa dimusnahkan dengan cara dibakar atau dikubur. \n3. Anak ayam yang kondisinya belum parah perlu diisolasi dan diberi nutrisi, serta disuplementasi dengan vitamin Fortevit atau Kumavit. Pemberian antibiotik pada kasus ini tidak terlalu direkomendasikan, kecuali apabila ditemukan penyakit bakterial lainnya yang juga menginfeksi ayam dalam waktu bersamaan.\n4. Ayam dewasa yang dikhawatirkan sebagai pembawa penyakit dapat disembelih, serta dagingnya bisa dikonsumsi dan telurnya bisa dijual sebagai telur konsumsi. Ayam dewasa yang terserang memang bisa sembuh, namun sangat sedikit yang bisa mencapai kesembuhan sempurna dan ayam tersebut biasanya sudah tidak efisien lagi untuk dipelihara.\n5. Segera perketat biosecurity. Kandang dan peralatan yang tercemar harus segera didesinfeksi. Virus AE termasuk virus yang relatif stabil karena strukturnya tidak beramplop. Untuk itu kita perlu memilih desinfektan yang sesuai digunakan membasmi virus AE, seperti dari golongan iodine Antisep atau Neo Antisep dan aldehyde Formades Plus atau Sporades. '),
(2, 'Gumboro', '1. Vaksin\n2. Ambil gula merah sebanyak 100 gram, kunyit sebanyak 100 gram, lempuyang sebanyak 100 gram, dan air sebanyak 1liter. Campur semua bahan-bahan tersebut kemudian diblender dengan air, dan direbus hingga mendidih. Kemudian dinginkan dan saring dan jadilah jamu herbal. Jamu ini bisa dicampur dengan air bersih atau diencerkan hingga menjadi 10 liter. Berikan jamu herbal pada ayam yang terkena penyakit gumboro selama 7 hari berturut-turut. '),
(3, 'Penyakit tetelo', '1. Vaksin\n2. Ambil daun pepaya yang sudah terlihat tua, namun belum menguning , letakkan pada wadah atau mangkok yang berisi air sebanyak 100 ml, peras daun pepaya yang sudah diberi air hingga berwarna hijau pekat, minumkan air ekstrak tersebut pada ayam sebanyak dua sendok makan atau sekitar 5 ml secara rutin tiga kali sehari, pada hari ketiga dosis dikurangi menjadi dua kali sehari.'),
(4, 'Bronkitis menular', '1. Vaksin\n2. Pemberian obat antibiotik selama 3 sampai 5 hari '),
(5, 'Bronkitis menular', '1. Vaksin'),
(6, 'Sampar itik', '1. Menjaga kondisi badan tetap baik dan meningkatkan nafsu makan dengan memberikan Vita Stress. \n2. Infeksi sekunder dicegah dengan memberikan Therapy atau Doxyvet. \n3. Dapat pula diberikan pemanasan tambahan pada kandang.\n4. Mengusahakan galur ayam yang bebas EDS'),
(7, 'Kerabang telur lembek', '1. Vaksin\n2. Gunakan kapas untuk melepaskan sumbatan pada saluran pernafasan.\n3. Berikan antibiotik seperti Neo Meditril atau Ampicol untuk mencegah infeksi sekunder, untuk membantu proses penyembuhan ayam berikan vitamin seperti Fortevit.\n4. Memisahkan ayam yang terlihat sakit agar tidak menulari ayam yang sehat. Keluarkan ayam yang mati dan kuburkan jauh dari area kandang.'),
(8, 'Laryngotracheitis menular', '1. Vaksin belum tersedia.\n2. Diperlukan pemberantasan untuk memotong rantai penularan'),
(9, 'Leukosit unggas', '1. Vaksin\n2. sanitasi dan ventilasi yang baik.\n3. pemusnahan bangkai yang sempurna.'),
(10, 'Penyakit marek', '1. Pemberian chlortetracyline atau oxytetracycline pada pakan.\n2. Pemberian obat 200mg streptomycin.'),
(11, 'Radang sendi menular', '1. Pemberian dan penyesuaian alat pemanas pada ayam.\n2. Pakan dicampur antibiotik dan vitamin yang larut dalam air.\n'),
(12, 'Penyakit jengger biru', '1. Vaksin\n2. Peningkatan biosekuriti\n3. Pemusnahan terbatas atau selektif di daerah tertular\n4. Pengendalian lalu lintas keluar masuk unggas'),
(13, 'Flu burung', '1. Pengobatan dengan preparat sulfa serta memberikan antibiotik seperti streptomisin, erytromisin, novobiosin, gentamisin.'),
(14, 'Infeksi pasteura anatipestifer', '1. Pengobatan dimulai  dari memperbaiki sanitasi lingkungan, pakan, dan air.\n2. Pemberian nitrofurans atau neomisin'),
(15, 'Kolibasilosis unggas', '1. Pengobatan dilakukan menggunakan preparat sulfa dan antibiotik'),
(16, 'Berak kapur', '1. Pengobatan dilakukan menggunakan preparat sulfa, nitrofuran dan antibitotik.'),
(17, 'Tipus unggas', '1. Pengobatan tidak efektif\n2. Mengeleminasi ayam yang sakit\n3. Mensanitasi lingkungan secara ketat'),
(18, 'Tuberculosis unggas', '1. Pemberian basitrasin eritromisin, tilosin, spektinomisin dan linkomisin melalui makanan, air minum atau injeksi'),
(19, 'Penyakit pernafasan menahun', '1. Pemberian obat sulfatiasol atau sulfadimetoksin\n2. Pemberian obat sulfametasin, sulfamerasin atau eritrimisin'),
(20, 'Pilek ayam', '1. Pemberian obat Copper sulfate 1 gr/5 liter air minum selama 3 hari atau nistatin 100 gr/ton pakan. \n2. Pemberian vitamin konsentrasi tinggi seperti Fortevit.'),
(21, 'Aspergillosis', '1. Pengobatan dilakukan dengan fumigasi atau pencelupan dengan insektisida klordan 2,5 %, piretrum 10% dan na-fluorida'),
(22, 'Caplak Unggas', '-');

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
(1, 15, '2022-04-04 22:43:03', '::1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_penyakit`
--

CREATE TABLE `role_penyakit` (
  `id` int NOT NULL,
  `id_penyakit` int NOT NULL,
  `id_gejala` int NOT NULL
) ;

--
-- Dumping data untuk tabel `role_penyakit`
--

INSERT INTO `role_penyakit` (`id`, `id_penyakit`, `id_gejala`) VALUES
(1, 1, 6),
(2, 1, 11),
(3, 1, 22),
(4, 1, 26),
(5, 1, 36),
(6, 1, 43),
(7, 1, 52),
(8, 2, 6),
(9, 2, 7),
(10, 2, 8),
(11, 2, 14),
(12, 2, 15),
(13, 2, 17),
(14, 2, 18),
(15, 2, 36),
(16, 3, 1),
(17, 3, 4),
(18, 3, 5),
(19, 3, 6),
(20, 3, 7),
(21, 3, 10),
(22, 3, 20),
(23, 3, 26),
(24, 3, 29),
(25, 3, 30),
(26, 3, 42),
(27, 3, 45),
(28, 3, 48),
(29, 4, 1),
(30, 4, 7),
(31, 4, 8),
(32, 4, 12),
(33, 4, 26),
(34, 4, 28),
(35, 4, 30),
(36, 4, 33),
(37, 4, 45),
(38, 4, 49),
(39, 5, 6),
(40, 5, 12),
(41, 5, 19),
(42, 5, 22),
(43, 5, 24),
(44, 5, 26),
(45, 5, 34),
(46, 5, 36),
(47, 5, 49),
(48, 5, 57),
(49, 6, 33),
(50, 6, 44),
(51, 6, 46),
(52, 6, 47),
(53, 7, 1),
(54, 7, 2),
(55, 7, 4),
(56, 7, 5),
(57, 7, 29),
(58, 7, 31),
(59, 7, 49),
(60, 7, 50),
(61, 7, 51),
(62, 7, 52),
(63, 8, 6),
(64, 8, 25),
(65, 8, 26),
(66, 8, 42),
(67, 8, 53),
(68, 9, 6),
(69, 9, 10),
(70, 9, 22),
(71, 9, 25),
(72, 9, 28),
(73, 9, 34),
(74, 9, 35),
(75, 9, 36),
(76, 9, 37),
(77, 9, 38),
(78, 10, 22),
(79, 10, 25),
(80, 10, 35),
(81, 10, 39),
(82, 10, 52),
(83, 10, 54),
(84, 10, 55),
(85, 11, 6),
(86, 11, 7),
(87, 11, 9),
(88, 11, 57),
(89, 11, 56),
(90, 12, 1),
(91, 12, 4),
(92, 12, 5),
(93, 12, 7),
(94, 12, 9),
(95, 12, 26),
(96, 12, 30),
(97, 12, 32),
(98, 12, 48),
(99, 12, 57),
(100, 12, 62),
(101, 13, 4),
(102, 13, 5),
(103, 13, 12),
(104, 13, 36),
(105, 13, 42),
(106, 13, 49),
(107, 14, 7),
(108, 14, 16),
(109, 14, 23),
(110, 14, 24),
(111, 14, 25),
(112, 14, 52),
(113, 14, 58),
(114, 15, 6),
(115, 15, 16),
(116, 15, 24),
(117, 15, 30),
(118, 15, 40),
(119, 15, 41),
(120, 15, 52),
(121, 15, 55),
(122, 15, 56),
(123, 15, 60),
(124, 16, 6),
(125, 16, 7),
(126, 16, 8),
(127, 16, 23),
(128, 16, 25),
(129, 16, 42),
(130, 16, 59),
(131, 17, 24),
(132, 17, 25),
(133, 17, 37),
(134, 17, 59),
(135, 17, 61),
(136, 18, 1),
(137, 18, 5),
(138, 18, 32),
(139, 18, 49),
(140, 18, 60),
(141, 19, 1),
(142, 19, 2),
(143, 19, 3),
(144, 19, 5),
(145, 19, 7),
(146, 19, 8),
(147, 19, 21),
(148, 19, 24),
(149, 19, 26),
(150, 19, 27),
(151, 19, 28),
(152, 19, 31),
(153, 19, 48),
(154, 19, 58),
(155, 20, 4),
(156, 20, 6),
(157, 20, 7),
(158, 20, 13),
(159, 20, 25),
(160, 20, 30),
(161, 20, 57),
(162, 21, 6),
(163, 21, 7),
(164, 21, 25),
(165, 21, 26),
(166, 21, 59),
(167, 22, 0);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
