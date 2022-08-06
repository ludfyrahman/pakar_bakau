-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 06 Agu 2022 pada 22.33
-- Versi server: 10.5.16-MariaDB-cll-lve
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u1554775_tembakau`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_riwayat`
--

CREATE TABLE `detail_riwayat` (
  `id` int(11) NOT NULL,
  `id_riwayat` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_riwayat`
--

INSERT INTO `detail_riwayat` (`id`, `id_riwayat`, `id_gejala`) VALUES
(1, 1, 8),
(2, 1, 11),
(3, 1, 14),
(4, 1, 17),
(5, 2, 1),
(6, 2, 3),
(7, 2, 12),
(8, 2, 13),
(9, 3, 1),
(10, 3, 2),
(11, 3, 5),
(12, 3, 14),
(13, 3, 36),
(14, 4, 28),
(15, 4, 29),
(16, 4, 31),
(17, 4, 33),
(18, 5, 28),
(19, 5, 29),
(20, 5, 31),
(21, 5, 33),
(22, 5, 36),
(23, 6, 28),
(24, 6, 29),
(25, 6, 31),
(26, 6, 33),
(27, 6, 36),
(28, 7, 1),
(29, 7, 3),
(30, 7, 11),
(31, 7, 32),
(32, 7, 33),
(33, 7, 38),
(34, 8, 1),
(35, 8, 6),
(36, 8, 31),
(37, 8, 39),
(38, 9, 1),
(39, 9, 6),
(40, 9, 19),
(41, 9, 32),
(42, 9, 34),
(43, 9, 37),
(44, 9, 39),
(45, 10, 1),
(46, 10, 2),
(47, 10, 5),
(48, 10, 7),
(49, 11, 1),
(50, 11, 3),
(51, 11, 5),
(52, 11, 6),
(53, 12, 1),
(54, 12, 6),
(55, 12, 15),
(56, 12, 17),
(57, 13, 1),
(58, 13, 2),
(59, 13, 3),
(60, 13, 4),
(61, 13, 5),
(62, 13, 6),
(63, 13, 7),
(64, 13, 8),
(65, 13, 9),
(66, 13, 10),
(67, 13, 11),
(68, 13, 12),
(69, 13, 13),
(70, 13, 14),
(71, 14, 29),
(72, 14, 30),
(73, 14, 31),
(74, 14, 32),
(75, 15, 1),
(76, 15, 2),
(77, 15, 3),
(78, 15, 4),
(79, 16, 1),
(80, 16, 2),
(81, 16, 3),
(82, 16, 4),
(83, 17, 1),
(84, 17, 10),
(85, 17, 16),
(86, 17, 26),
(87, 17, 33),
(88, 18, 4),
(89, 18, 6),
(90, 18, 11),
(91, 18, 34),
(92, 19, 4),
(93, 19, 6),
(94, 19, 11),
(95, 19, 34),
(96, 20, 1),
(97, 20, 2),
(98, 20, 3),
(99, 20, 4),
(100, 21, 3),
(101, 21, 10),
(102, 21, 11),
(103, 21, 22),
(104, 21, 23),
(105, 22, 3),
(106, 22, 10),
(107, 22, 11),
(108, 22, 22),
(109, 22, 23),
(110, 23, 14),
(111, 23, 15),
(112, 23, 16),
(113, 23, 18),
(114, 24, 8),
(115, 24, 9),
(116, 24, 11),
(117, 24, 12),
(118, 24, 13),
(119, 25, 1),
(120, 25, 2),
(121, 25, 3),
(122, 25, 19),
(123, 26, 1),
(124, 26, 4),
(125, 26, 5),
(126, 26, 6),
(127, 27, 36),
(128, 27, 37),
(129, 27, 38),
(130, 27, 39),
(131, 28, 1),
(132, 28, 2),
(133, 28, 4),
(134, 28, 8),
(135, 29, 36),
(136, 29, 37),
(137, 29, 38),
(138, 29, 39),
(139, 30, 2),
(140, 30, 8),
(141, 30, 9),
(142, 30, 10),
(143, 30, 16),
(144, 31, 1),
(145, 31, 2),
(146, 31, 3),
(147, 31, 4),
(148, 31, 5),
(149, 32, 1),
(150, 32, 2),
(151, 32, 3),
(152, 32, 4),
(153, 32, 5),
(154, 33, 1),
(155, 33, 2),
(156, 33, 3),
(157, 33, 4),
(158, 33, 5),
(159, 34, 1),
(160, 34, 2),
(161, 34, 3),
(162, 34, 4),
(163, 34, 5),
(164, 35, 1),
(165, 35, 2),
(166, 35, 3),
(167, 35, 4),
(168, 35, 5),
(169, 36, 1),
(170, 36, 2),
(171, 36, 3),
(172, 36, 4),
(173, 36, 5),
(174, 37, 1),
(175, 37, 2),
(176, 37, 3),
(177, 37, 4),
(178, 37, 5),
(179, 38, 1),
(180, 38, 2),
(181, 38, 3),
(182, 38, 4),
(183, 38, 5),
(184, 39, 1),
(185, 39, 2),
(186, 39, 3),
(187, 39, 4),
(188, 39, 5),
(189, 40, 1),
(190, 40, 2),
(191, 40, 3),
(192, 40, 4),
(193, 40, 5),
(194, 41, 1),
(195, 41, 2),
(196, 41, 3),
(197, 41, 4),
(198, 41, 5),
(199, 42, 1),
(200, 42, 2),
(201, 42, 3),
(202, 42, 4),
(203, 42, 5),
(204, 43, 1),
(205, 43, 2),
(206, 43, 4),
(207, 43, 6),
(208, 44, 16),
(209, 44, 17),
(210, 44, 19),
(211, 44, 20),
(212, 44, 28),
(213, 45, 1),
(214, 45, 2),
(215, 45, 3),
(216, 45, 4),
(217, 45, 9),
(218, 45, 10),
(219, 45, 11),
(220, 45, 12),
(221, 45, 13),
(222, 45, 16),
(223, 45, 17),
(224, 45, 19),
(225, 45, 21),
(226, 45, 22),
(227, 46, 1),
(228, 46, 3),
(229, 46, 4),
(230, 46, 5),
(231, 46, 7),
(232, 46, 8),
(233, 46, 10),
(234, 46, 11),
(235, 46, 13),
(236, 46, 14),
(237, 46, 18),
(238, 46, 21),
(239, 46, 23),
(240, 46, 25),
(241, 47, 1),
(242, 47, 2),
(243, 47, 7),
(244, 47, 10),
(245, 48, 1),
(246, 48, 2),
(247, 48, 3),
(248, 48, 4),
(249, 49, 3),
(250, 49, 4),
(251, 49, 7),
(252, 49, 22),
(253, 50, 1),
(254, 50, 2),
(255, 50, 3),
(256, 50, 4),
(257, 51, 3),
(258, 51, 4),
(259, 51, 7),
(260, 51, 22),
(261, 52, 15),
(262, 52, 18),
(263, 52, 20),
(264, 52, 22),
(265, 53, 1),
(266, 53, 2),
(267, 53, 7),
(268, 53, 10),
(269, 54, 2),
(270, 54, 4),
(271, 54, 5),
(272, 54, 8),
(273, 55, 23),
(274, 55, 24),
(275, 55, 25),
(276, 55, 26);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`id`, `nama`) VALUES
(1, 'Pada serangan lanjutan daun menjadi transparan'),
(2, 'Bekas gigitan pada daun tidak beraturan'),
(3, 'menyisahkan tulang daun '),
(4, 'Menggerek buah dan memakan biji '),
(5, 'Menyerang Pucuk Daun yang meyebabkan daun pucuk berlubang'),
(6, 'Daun tembakau lengket'),
(7, 'Bekas kotoran kotoran tersebut di tumbuhi jamur cendawan sehingga Nampak kehitaman'),
(8, 'Bercak Nekrotik pada permukaan daun '),
(9, 'Timbulnya jelaga yang menutupi Permukaan daun '),
(10, 'Bintik bitnik berwarna perak di dekat tulang daun'),
(11, 'Daun tampak keriput mengeritinng dan melengkung ke atas'),
(12, 'Daun Menjadi layu dan akhirnya kering'),
(13, 'Bagian akar tanaman tampak bisul-bisul bulat, tanaman bisa kerdil, layu, daun berguguran'),
(14, 'Tanaman menunjukkan gejala layu mirip seperti layu fusarium pada akar terdapat bintil atau bisul aki'),
(15, 'Daun terserang berlubang-lubang terutama daun muda sehingga ada tangkai daun rebah'),
(16, 'Menyerang tembakau muda / awal tanam menyerang pada sore hari sehingga ada tangkai daun rebah'),
(17, 'Batang tanaman yang terinfeksi akan mengering dan berwarna coklat sampai hitam seperti terbakar'),
(18, 'Tanaman layu tiba-tiba, seluruh daun terkulai tetapi masih hijau.'),
(19, 'Ketika dicabut, pangkal batang terlihat coklat meskipun perakaran masih terlihat sehat.'),
(20, 'Apabila dibelah, empulurnya terlihat bersekat-sekat'),
(21, 'Permukaan daun berwarna cokelat'),
(22, 'Di atas daun terdapat bercak bulat putih hingga coklat, bagian daunyang terserang menjadi rapuh dan '),
(23, 'Gejala awal berupa bercak-bercak kecil berwarna cokelat muda atau tua di bawah permukaan dauan\n \n'),
(24, 'Gejala pada tanaman tua berupa bercak-bercak kecil melekuk berwarna cokelat tua sampai hitam pada ta'),
(25, 'Tanaman layu tiba-tiba, seluruh daun terkulai dan membusuk'),
(26, 'Pangkal bibit berlekuk seperti terjepit ,busuk, berwarna cokelat dan akhirnya roboh'),
(27, 'Daun daun muda terdapat bercak-bercak kuning yang tidak teratur\n\n'),
(28, 'Daun daun mudanya berwarna lebih terang dari pada tulang biasa'),
(29, 'Tanaman kerdil'),
(30, 'Daun menyempit dan mengalami distori'),
(31, 'Tulang daun berwarna jernih'),
(32, 'Daun berwarna putih memanjang atau membengkok'),
(33, 'Daun berkerut dengan tepi melengkung'),
(34, 'Tepi daun melengkung ke bawah, tulang daun jernih dan tidak menebal'),
(35, 'Tanaman mulai layu'),
(36, 'Seluruh tanaman layu daun menguning sampai cokelat kehitam hitaman'),
(37, 'Tanaman layu'),
(38, 'Daun daun berwarna kuning'),
(39, 'Bagian batang berlubang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `solusi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`id`, `nama`, `solusi`) VALUES
(1, 'Hama Ulat Grayak (Spodoptera litura)', 'Telur dan larva di kumpulkan lalu dimusnahkan\r\nPengolahan tanah dapat membunuh pupa yang berada dalam tanah\r\nmenggunakan pestisida nabati( daun dan biji mimba)\r\n'),
(2, 'Hama Ulat Pucuk (Helicoverpa assulta Gen', '-ulat dikumpulkan lalu dimusnahkan\r\n-Pengolahan tanah dapat membunuh pupa yang berada di dalam tanah'),
(3, 'Hama Kutu Daun (Myzus Persicae)', '-Memanfaatkan predator dari famili lalt Syrphid kumbang macan\r\n-Insektisidda kimia sebagia bahan alternatif terakhir pengendalian yang berbahan aktif permetrin deltametrin dan indoksakarb'),
(4, 'Hama Kutu Kebul/kutu putih (Bemissia tab', '-Membersihkan gulma dan inang alternatif\r\n-Mencabut bibit yang terserang biasanya daun terlihat keriting\r\n-Pemanfaatan  predator kumbang macan, jangkrik, gangsir dan semut merah\r\n-Insektida yang digukan berbahan aktif etiprol'),
(5, 'Hama Thrips  (Thrips parvispinus)', '-Pemasangan perangkap lekat warna biru putih atu kuning\r\n-pemanfaatan musuh alami predator kumbang macan\r\n-Penyemprotan insektisida yang di anjurkan adalah insektisida yang selektif yaitu yang berbahan aktif Spinosad'),
(6, 'Hama Wereng Tembakau ( Cyrtopeltis tenui', '-Penggunaan perangkap serangan berpekat warna kuning\r\n-Penggunaan Beauveria bassiana'),
(7, 'Hama Nematoda (Meloydogyne sp)', '-Pengendalian dapat dilakukan dengan pengolahan lahan yang baik, menjaga sanitasi lingkungan tanaman, membersihkan gulma dan pemberian nematisida\r\n-Pemberian nematisida dapat dilakukan dengan menaburkan pada pangkal batang\r\n-Nematisida yang dapat digunakan misalnya curater, pentakur, furadan atau petrofur.'),
(9, 'Hama Ulat Tanah (Agrotis ipsilon)', '-dengan membuat pagar yang rapat dari bambu setinggi 6 cm mengelilingi tempat pembibitan atau terlebih dahulu membakar atau\r\nmenggenangi tempat yang dipeniapkan untuk pembibitan\r\n-Pengendalian secara kimia dapat menggunakan insektisida Basamid G'),
(11, 'Penyakit Hangus Batang (dampingoff)', '- desinfeksi bibit, renggangkan jarak tanam, tanah diolah secara intensif, gunakan air bersih, bila sudah parah tanaman dicabut dan dibakar'),
(12, 'Penyakit Lanas (Phytopthora nicotiane)', '-Mencabut tanaman sakit kemudia dikumpulkan dan dibakar\r\n-Pembuatan guludan yang tinggi sehingga drainase lebih baik\r\n-Pembuatan pupuk kandang yang telah masak\r\n-Pemakain varietas tahan\r\n-Kimiawi dengan penyemprotan pangkal batang dengan fungisida\r\n'),
(13, 'Penyakit Patik Daun (Cercospora nicotina', '-Pengolahan lahan dengan baik, mengatur jarak tanam, rotasi tanaman, cabut dan musnahkan tanaman terinfeksi serta penyemprotan fungisida.'),
(14, 'Penyakit Bercak Coklat(Alternia SP)', '-Mencabut dan membakar tanaman yang terserang'),
(15, 'Penyakit Busuk Daun (Phytophthora infest', '-Rotasi tanaman, mencabut dan memusnahkan tanaman terinfeksi serta penyemprotan bakterisida seperti plantomicyn, bactoxyn atau agrept.\r\n-Pengendalian kimiawi menggunakan fungisida seperti Phytoklor 82,5 WG atau Nuplant 722 SL sebagai langkah pencegahan pada saat serangan awal terbukti  efektif melindungi tanaman dari busuk daun untuk segala musim'),
(16, 'Penyakit Rebah Kecambah (Pythium sp,Rhiz', '-Penyakit ini dapat diatasi dengan pengaturan jarak tanam pembibitan, disinfeksi tanah sebelum penaburan benih atau penyemprotan pembibitan serta pencelupan bibit sebelum tanam dengan fungisida.'),
(17, 'Penyakit Virus  TMV (Tobacco Mosaic Viru', '-Hindari membuat bibit dilahan bekas tanaman inang virus antara lain( terong,cabe,semangka,tomat dan bayam) karena tanaman ini paling rentan terhadap virus\r\n-Pemberian abu tonang dan abu sekam pada bedeng pembibitan akan membantu menghambat perkembangan virus\r\n-Pengurangan Pupuk N\r\n-Pemberian Agens\r\n-Pemakaian bokasi cair '),
(18, 'Penyakit Virus CMV (Cucumber Mosaic Viru', '-Penghindaran sumber infeksi\r\n-Penghilangan sumber inokulum\r\n-Pengendalian vektor virus\r\n-penggunaan tanaman transgenik'),
(19, 'Penyakit Virus Betok', '-Sanitasi penggunaan varietas tahan dan pengendalian dengan insektisida berbahan aktif imidakloprid atau dimetoat'),
(20, 'Penyakit Virus Kerupuk (tobacco Leaf Cur', '-Mencabut tanaman sakit mauopun sisa-sisa pertanaman dan gulma kemudian dikumpulkan dan dimusnahkan\r\n-Pengendalian vektor B. tabaci dengan insektisida yang  berbahan aktif dimetoat atau imidakloprid'),
(21, 'Penyakit Layu Bakteri (Ralstonia solanac', '-Pencegahan dapat dilakukan dengan pengolahan lahan yang baik, pemberian trichoderma, rotasi tanaman serta penggunaan varietas tahan. Pengocoran trichoderma pada pangkal batang setiap 1 minggu sekali.'),
(22, 'Penyakit Batang Berlubang (hollow stalk)', '-Pemilihan lahan hendaknya memilih bekas lahan yang ditanami padi selama dua musim \r\n-Pemberian kapur pada tanah karena lahan yang memiliki kadar Ca tinggi mempunyai tingkat serangan bakteri tinggi busuk batang berlubang yang lebih rendah\r\n-Pengendalian dapat pula dilakukan dengan cara menanam tembakau pada gulud semu\r\n-Menyiram insektida berbahan aktif Streptomisin sulfat atau oksitetrasiklin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat`
--

CREATE TABLE `riwayat` (
  `id` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ip` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `riwayat`
--

INSERT INTO `riwayat` (`id`, `id_penyakit`, `tanggal`, `ip`) VALUES
(1, 4, '2022-07-11 18:14:26', '::1'),
(2, 1, '2022-07-12 07:07:10', '125.166.119.2'),
(3, 1, '2022-07-12 07:17:18', '125.166.119.2'),
(4, 20, '2022-07-12 07:19:04', '125.166.119.2'),
(5, 20, '2022-07-12 07:19:13', '125.166.119.2'),
(6, 19, '2022-07-12 07:19:34', '125.166.119.2'),
(7, 20, '2022-07-13 01:42:24', '125.166.119.2'),
(8, 3, '2022-07-13 04:57:39', '125.166.119.2'),
(9, 22, '2022-07-13 04:59:48', '125.166.119.2'),
(10, 1, '2022-07-13 05:11:10', '125.166.119.2'),
(11, 1, '2022-07-13 05:11:45', '125.166.119.2'),
(12, 3, '2022-07-13 05:27:17', '125.166.119.2'),
(13, 1, '2022-07-16 07:47:09', '125.166.118.2'),
(14, 18, '2022-07-16 08:39:17', '125.166.118.2'),
(15, 1, '2022-07-17 22:39:20', '182.1.88.49'),
(16, 1, '2022-07-17 22:51:38', '125.166.116.9'),
(17, 20, '2022-07-18 01:53:23', '36.68.222.48'),
(18, 3, '2022-07-18 03:22:11', '125.166.118.1'),
(19, 3, '2022-07-18 03:23:50', '125.166.118.1'),
(20, 1, '2022-07-18 11:00:59', '125.166.116.9'),
(21, 13, '2022-07-18 11:01:51', '125.166.116.9'),
(22, 13, '2022-07-18 11:04:22', '125.166.116.9'),
(23, 11, '2022-07-18 19:16:29', '116.206.40.49'),
(24, 4, '2022-07-19 11:19:46', '125.166.118.2'),
(25, 1, '2022-07-20 03:52:35', '116.206.40.9'),
(26, 3, '2022-07-21 19:29:56', '202.67.41.253'),
(27, 21, '2022-07-23 17:27:14', '125.164.4.17'),
(28, 4, '2022-07-24 20:54:38', '182.1.100.0'),
(29, 21, '2022-07-26 04:45:15', '125.166.116.1'),
(30, 4, '2022-07-28 11:08:54', '182.253.139.2'),
(31, 1, '2022-07-29 22:42:18', '125.166.119.5'),
(32, 1, '2022-07-29 23:01:56', '125.166.119.5'),
(33, 1, '2022-07-29 23:02:00', '125.166.119.5'),
(34, 1, '2022-07-29 23:02:02', '125.166.119.5'),
(35, 1, '2022-07-29 23:02:13', '125.166.119.5'),
(36, 1, '2022-07-29 23:03:15', '125.166.119.5'),
(37, 1, '2022-07-29 23:04:32', '125.166.119.5'),
(38, 1, '2022-07-29 23:04:35', '125.166.119.5'),
(39, 1, '2022-07-29 23:04:56', '125.166.119.5'),
(40, 1, '2022-07-29 23:05:11', '125.166.119.5'),
(41, 1, '2022-07-29 23:05:35', '125.166.119.5'),
(42, 1, '2022-07-29 23:06:38', '125.166.119.5'),
(43, 1, '2022-07-31 09:43:57', '125.166.118.1'),
(44, 12, '2022-07-31 16:09:02', '125.166.119.1'),
(45, 1, '2022-08-01 00:42:15', '116.206.40.29'),
(46, 4, '2022-08-01 00:45:28', '114.5.221.47'),
(47, 3, '2022-08-01 11:01:28', '182.253.139.2'),
(48, 1, '2022-08-01 13:57:10', '182.253.139.2'),
(49, 1, '2022-08-01 14:00:51', '182.253.139.2'),
(50, 1, '2022-08-01 14:03:24', '182.253.139.2'),
(51, 1, '2022-08-01 15:23:37', '182.253.139.2'),
(52, 9, '2022-08-01 15:24:58', '182.253.139.2'),
(53, 1, '2022-08-01 15:38:26', '182.253.139.2'),
(54, 2, '2022-08-01 15:53:23', '182.253.139.2'),
(55, 11, '2022-08-03 22:57:34', '125.166.118.1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_penyakit`
--

CREATE TABLE `role_penyakit` (
  `id` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL,
  `mb` float NOT NULL,
  `md` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role_penyakit`
--

INSERT INTO `role_penyakit` (`id`, `id_penyakit`, `id_gejala`, `mb`, `md`) VALUES
(1, 1, 1, 0.8, 0.6),
(2, 1, 2, 1, 0.2),
(3, 1, 3, 0.8, 0),
(4, 2, 4, 0.8, 0.2),
(5, 2, 5, 0.8, 0.2),
(6, 3, 6, 0.6, 0),
(7, 3, 7, 1, 0.4),
(8, 4, 8, 1, 0),
(9, 4, 9, 0.8, 0.2),
(10, 5, 10, 0.6, 0),
(11, 5, 11, 0.6, 0),
(12, 0, 10, 0, 0),
(13, 6, 12, 0.8, 0.2),
(14, 7, 13, 1, 0),
(15, 8, 15, 0.6, 0),
(16, 9, 18, 1, 0),
(17, 10, 19, 0.8, 0.2),
(18, 10, 20, 0.6, 0),
(19, 10, 21, 0.8, 0),
(20, 11, 22, 0.8, 0.2),
(21, 11, 23, 1, 0),
(22, 12, 24, 0.8, 0.2),
(23, 13, 19, 0.8, 0),
(24, 13, 25, 0.6, 0),
(25, 14, 26, 0.6, 0),
(26, 15, 27, 0.8, 0.2),
(27, 15, 28, 1, 0),
(28, 16, 29, 0.8, 0.2),
(29, 16, 30, 0.6, 0),
(30, 17, 31, 0.6, 0),
(31, 17, 32, 0.8, 0.2),
(32, 18, 33, 1, 0),
(33, 18, 34, 0.8, 0.2),
(34, 19, 35, 0.6, 0),
(35, 19, 36, 0.6, 0),
(36, 20, 37, 0.8, 0.2),
(37, 20, 38, 0.8, 0.2),
(38, 20, 39, 0.8, 0.2);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=277;

--
-- AUTO_INCREMENT untuk tabel `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `role_penyakit`
--
ALTER TABLE `role_penyakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
