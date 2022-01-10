-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 10 Jan 2022 pada 00.58
-- Versi server: 5.7.33
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sibili`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bab_kki`
--

CREATE TABLE `bab_kki` (
  `id_bab` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bab_kki`
--

INSERT INTO `bab_kki` (`id_bab`, `name`, `description`) VALUES
(1, 'BAB I', 'Merupakan pendahuluan dari <br> laporan KKI.'),
(2, 'BAB II', 'Merupakan tinjauan perusahaan dari <br> laporan KKI.'),
(3, 'Bab III', 'Merupakan perancangan dan implementasi dari laporan KKI.'),
(4, 'BAB IV', 'Merupakan kesimpulan dan saran <br> dari proyek akhir.'),
(5, 'Daftar Pustaka', 'Merupakan rujukan referensi <br> dari laporan KKI.'),
(6, 'ALL', 'Merupakan keseluruhan laporan KKI <br> yang sudah jadi.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `chats`
--

CREATE TABLE `chats` (
  `id_chats` int(11) NOT NULL,
  `incoming_chat_id` int(11) NOT NULL,
  `outgoing_chat_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `time` int(11) NOT NULL,
  `bab_id` int(11) NOT NULL,
  `pembimbing_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `chats`
--

INSERT INTO `chats` (`id_chats`, `incoming_chat_id`, `outgoing_chat_id`, `message`, `time`, `bab_id`, `pembimbing_id`) VALUES
(7, 7, 4, 'cek', 1641687847, 1, 'DTI3422'),
(8, 7, 4, 'filenya ', 1641687898, 1, 'DTI3422'),
(9, 7, 4, 'sd', 1641689336, 1, 'DTI3422'),
(36, 7, 4, 'test', 1641689564, 1, 'DTI3422'),
(37, 7, 4, 'coba', 1641689768, 1, 'DTI3422'),
(38, 7, 4, 'lagi', 1641689778, 1, 'DTI3422'),
(39, 7, 4, 'sds', 1641689821, 1, 'DTI3422'),
(40, 7, 4, 'sds123', 1641689845, 2, 'DTI3422'),
(41, 7, 4, 'sdvc', 1641689863, 2, 'DTI3422'),
(42, 7, 4, 'pagi pak', 1641693104, 1, 'DTI3422'),
(43, 7, 4, 'halo\r\n', 1641693203, 1, 'DTI3422'),
(44, 4, 7, 'iya', 1641693203, 1, 'DTI3422'),
(45, 7, 4, 'd', 1641694190, 1, 'DTI3422'),
(46, 7, 4, 'bab 2', 1641701736, 2, 'DTI3422'),
(47, 7, 4, 'c', 1641701883, 2, 'DTI3422'),
(48, 7, 4, 'c', 1641701990, 2, 'DTI3422'),
(49, 7, 4, 'sd', 1641702241, 2, 'DTI3422'),
(50, 3, 6, 'malam', 1641741867, 2, 'DTI2122'),
(51, 3, 6, 'coba', 1641742476, 2, 'DTI2122'),
(52, 3, 6, 'bab 3', 1641742567, 3, 'DTI2122'),
(53, 3, 6, 'c', 1641743584, 1, 'DTI2122'),
(54, 3, 6, 'test', 1641743679, 1, 'DTI2122'),
(55, 3, 6, 'test', 1641771609, 4, 'DTI2122');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `dosen_name` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `dosen_name`, `email`, `address`, `status`, `user_id`) VALUES
(1, 'Dr. Fikri Budiman, M.Kom', 'fikribudiman@gmail.com', 'Tembalang', 'dosen', 3),
(2, 'Edi Sugiarto, S.Kom, M.Kom', 'edi.sugiarto@dsn.dinus.ac.id', 'semarang', 'dosen', 5),
(3, 'Muslih, M.Kom', 'muslih@dsn.dinus.ac.id', 'Gunung Pati', 'Koordinator Sertifikasi', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen_pembimbing`
--

CREATE TABLE `dosen_pembimbing` (
  `id_pembimbing` int(11) NOT NULL,
  `group` varchar(50) NOT NULL,
  `dosen_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen_pembimbing`
--

INSERT INTO `dosen_pembimbing` (`id_pembimbing`, `group`, `dosen_id`) VALUES
(3, 'DTI0122', 2),
(4, 'DTI2122', 1),
(5, 'DTI3422', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `file_laporan`
--

CREATE TABLE `file_laporan` (
  `id_file` int(11) NOT NULL,
  `file` text NOT NULL,
  `bab_id` int(11) NOT NULL,
  `jenis_kki` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pembimbing_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `file_laporan`
--

INSERT INTO `file_laporan` (`id_file`, `file`, `bab_id`, `jenis_kki`, `user_id`, `pembimbing_id`) VALUES
(1, 'bab1.pdf', 1, 1, 2, 3),
(2, 'bab2.pdf', 2, 1, 2, 3),
(3, 'A22.2019.02756_PROPOSAL_SIBILI.pdf', 1, 1, 4, 5),
(4, 'bab3.pdf', 1, 1, 6, 4),
(6, 'catatan.pdf', 2, 1, 6, 4),
(7, 'BIMBINGAN_KKI_KE_6_Progres_Laporan_KKI_Ke_1.pdf', 3, 1, 6, 4),
(8, 'lap1.pdf', 6, 1, 6, 4),
(9, '852-2722-1-PB.pdf', 4, 1, 6, 4),
(10, 'Hasil_kegiatan.pdf', 2, 1, 4, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `industries`
--

CREATE TABLE `industries` (
  `id_industries` int(11) NOT NULL,
  `industry_name` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `maps` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `industries`
--

INSERT INTO `industries` (`id_industries`, `industry_name`, `address`, `maps`) VALUES
(1, 'Ardata Media Center', 'Jl. Sekaran Gunung Pati Smg', 'https://goo.gl/maps/uuEgfPjScgK6BDat8'),
(2, 'Badan Metrologi dan Geofisika Kelas I', 'Jl. Siliwangi No. 291 Kalibanteng Kulon', 'https://g.page/bmkg_semarang?share'),
(3, 'Badan Penangg Bencana Daerah (BPBD) Jateng', 'Jl. Imam Bonjol No. 1F Dadapsari Smg', 'https://goo.gl/maps/yZmcmvtqJ4jLVJvX9'),
(4, 'Badan Pusat Statistik Kab Semarang', 'Jln. Garuda No. 7 Ungaran', 'https://goo.gl/maps/KSzTidx79YokA5wH9'),
(5, 'Balai Industri Kreatif Digital dan Kemasan', 'Jl. Ki Mangun Sarkoro No. 10 Smg', 'https://goo.gl/maps/YakuRikmdn3V8sRS7'),
(6, 'Big Benjaya Rent Car', 'jln. Srinindito Timur IV RT 04 RW 03 Simongan Smg', 'https://g.page/bigbenjaya-official?share'),
(7, 'BPMPK ', 'Pakintelan Gn. Pati Semarang', 'https://goo.gl/maps/oM3rNty2yqJNYbvV6'),
(8, 'BPS Jateng', 'Jln. Pahlawan No. 6 Pleburan Smg Sltan 50241', 'https://goo.gl/maps/t3ECKXnAL6QJj17u9'),
(9, 'BPSDMD Jateng', 'Jln. Setia Budi No. 201 A Semarang', 'https://goo.gl/maps/FCUPnG2mNbxtb2Hu6'),
(10, 'BPTIK Dikbud', 'Jl. Tarupolo Tengah No. 7 Gisik drono Smg ', 'https://goo.gl/maps/fA23w7XvAhJ2qThJ7'),
(11, 'CV. Bee Digital Printing Kudus', 'Ds. Bakalan Krapyak RT 07 RW 03 Kaliwungu Kudus', 'https://www.google.co.id/maps/search/CV.+Bee+Digital+Printing+Kudus/@-6.8083897,110.8410073,18.21z'),
(12, 'CV. Can Creative', 'Jln. Warigalit II No. 285 Semarang', 'https://g.page/cancreative?share'),
(13, 'CV. Seven Media Technology', 'Jl. Stonen Timur No.7A Gjh mungkur Smg', 'https://g.page/sevenmediatech?share'),
(14, 'CV. Wintio Mandiri', 'Jln. Kinibalu Timur No. 97 Tandang Tembalang 50274', 'https://goo.gl/maps/RH9NebWUR2pUuGmK6'),
(15, 'Dinas Kesehatan Prop Jateng', 'Jln. Kapt Pierre Tendean No. 24 Sekayu Smg Tengah', 'https://goo.gl/maps/bZT4GUUwGQNB69aY7'),
(16, 'Dinas Pekerjaan Umum Semarang', 'jln. Madukoro Raya Krobokan Smg Barat', 'https://g.page/pu_kotasemarang?share'),
(17, 'Dinas Pendidikan dan Kebudayaan Jateng', 'jln. Pemuda No. 134 Smg 50132', 'https://goo.gl/maps/5zdrVz7KQg24xxr19'),
(18, 'Dinas PUPR Kab. Grobogan', 'Jl. Gajahmada No. 32 Kuripan Pwdd', 'https://goo.gl/maps/QVXbpuqe8FmbDwQy7'),
(19, 'Diskom dan Informatika Kab. Demak', 'Jl. Sultan Hadiwijaya No. 4 Demak', 'https://goo.gl/maps/Tv2bMz9mq7nVk7is8'),
(20, 'Diskominfo Prov Jateng', 'Jl. Mentri Supeno 1/2 Mugassari Smg', 'https://goo.gl/maps/6hXYXH6YgeFMie178'),
(21, 'Disnakertrans Smg', 'Jl. Pahlawan No. 16 Smg', 'https://goo.gl/maps/wiQvwXsRrYjpNRPV9'),
(22, 'Disperindag Jateng', 'Jl. Pahlawan No. 4 Pleburan Smg', 'https://g.page/disperindagjateng?share'),
(23, 'DPU Smb Daya Air dan Penataan Ruang', 'Jl. Madukoro Blok AA-BB Smg', 'https://goo.gl/maps/v7kWcbv1o9ipuffUA'),
(24, 'EZATECH Blok D No. 16 ', 'Gemah Permai Regency Sendguwo Tmblng Smg 50273', 'https://goo.gl/maps/8b55vZxLmZfmd7HY8'),
(25, 'JDK Studio Semarang', 'Jln. Dr. Sutomo No 59 Randusari Smg', 'https://goo.gl/maps/JRE5dzbHSsPb6zJi7'),
(26, 'Jepara Art Furnicraft', 'Jl. Cik Lanang No. 25  Jobokuto Jepara', 'https://g.page/jeparaartfurnicraft?share'),
(27, 'Kantor Pos Erlangga Smg', 'Jln. Imam Barjo No. 2 Pleburan Smg 50241', 'https://goo.gl/maps/5cLB6M6Rdub3gscA8'),
(28, 'Kantor Pos Regional 6 ', 'Jln. Sisingamangaraja No. 45 Smg 50252', 'https://goo.gl/maps/uU9Q9WuRbsuE4H6JA'),
(29, 'Majlis Pustaka dan Informasi PWM Jateng', 'Jln. Singosari Raya No. 33 Semarang', 'https://g.page/pwmjateng?share'),
(30, 'Multindo', 'Jl. Pandanaran No. 119 Mugassari Smg', 'https://goo.gl/maps/KHaM1fMkmK4CNuRY9'),
(31, 'Nasmoco Pemuda', 'Jln. Pemuda No. 72 Kembangsari Smg', 'https://g.page/NasmocoPemudaSales?share'),
(32, 'Nasmoco Training Center', 'Jln. Raya Walisongo Km 11 No. 203 Tambak Aji Smg', 'https://goo.gl/maps/yPXcRqz83xVeukyz9'),
(33, 'Omah Koding', 'Jln. Imam Bonjol No. 190 Semarang Tengah', 'https://goo.gl/maps/CaPZivifKN3As2eF7'),
(34, 'Pemprov Jateng', 'Jl. Pahlawan No. 9 Mugas Smg', 'https://goo.gl/maps/DZj8xcG9WFwJUUnx9'),
(35, 'Perum Bulog Kancab Semarang', 'Jl. Siliwangi No. 289 Kalibanteng Kulon Smg', 'https://goo.gl/maps/5rz4rQeAvm6BqqWV7'),
(36, 'Polda Jateng', 'Jln. Pahlawan No. 1 Smg', 'https://goo.gl/maps/n8ub5TgQwhs1Wqx77'),
(37, 'Politeknik Ilmu Pelayaran Semarang', 'Jln. Singosari 2 A Wonodri Smg ', 'https://goo.gl/maps/6zcyf9G6kWkBtetm9'),
(38, 'Polrestabes Semarang', 'Jl. Dr. Sutomo No. 19 Barusari', 'https://goo.gl/maps/mTnnJ4mWVnGwm4hx8'),
(39, 'PT. Arindo Bangun Jaya', 'Jln. Kinibalu Timur No. 97 Tandang Tembalang 50274', 'https://goo.gl/maps/6aUsNbCyfobp2V5D9'),
(40, 'PT. Campus Data Media', 'Jln. Sadewa I No 30 Pendrikan Kidul Smg', 'https://goo.gl/maps/L9uWvgBeTjhoredc6'),
(41, 'PT. Desa Riset dan Teknologi', 'Jl. Pedurungan Tengah Kec. Pedurungan Smg', 'https://goo.gl/maps/K23MP1R65UUnDkms9'),
(42, 'PT. Glory Industrial Smg', 'Jl. Soetta Secang Samban Bawen Kab. Smg ', 'https://goo.gl/maps/DgpNdkLp9g8xA1dVA'),
(43, 'PT. Indonesia Power Up ', 'Jl. Ronggo Warsito Tanjung Emas', 'https://goo.gl/maps/91fPPqAhVncYMjS86'),
(44, 'PT. Millenium Pharmacon International tbk', 'Jln. Gisikdrono Smg Barat Smg 50149', 'https://goo.gl/maps/7Li2vLTed7EVEbmx6'),
(45, 'PT. Purinusa Eka Persada Demak', 'Jalan Raya Semarang Demak Km 17 Ds. Wonokerto', 'https://goo.gl/maps/Hm1P6XX4LVTgPBp47'),
(46, 'PT. Sarana Patra Jateng', 'Jln. Pamularsih Raya No. 15 Bongsari Smg', 'https://goo.gl/maps/y6afCXVzBjtaTZjS9'),
(47, 'PT. Sidji Jaya Abadi ', 'Jln. Arya Mukti II/895 Blok Flamboyan Pdrungan Smg', 'https://goo.gl/maps/43rRiHNnYeB62wRE7'),
(48, 'PT. Telekomunikasi Indonesia Tbk', 'Jln. Pahlawan No. 10 Smg', 'https://goo.gl/maps/g7Yiws1QHs3Ytu3m7'),
(49, 'PT. ZMG Telekomunikasi Servis Indonesia', 'Jln. Ngesrep Barat VI Kompleks PLN No. 11 Tembalang', '#'),
(50, 'Satria Computer', 'Jln. Soekarno Hatta No. 3C Pedurungan Smg', 'https://g.page/satriacomputersemarang?share'),
(51, 'Star Share', 'Jln. Langgeng Asri 5 No. 01 Nongko Sawit Gn. Pati Smg', 'https://g.page/PT-BerbagiBintangTeknologi?share'),
(52, 'Tri Niche Indonesia Smg Plaza Lt.1 No 107', 'Jln. KH. Agus Salim No. 7 Kauman Smg', '#'),
(53, 'Undip Semarang', 'Jln. Prof Sudarto Tembalang Smg', 'https://goo.gl/maps/v5VuXdc8AL6AgZDS6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mhs` int(11) NOT NULL,
  `mhs_name` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mhs`, `mhs_name`, `email`, `address`, `status`, `user_id`) VALUES
(1, 'Aditya Ajie Nugroho', 'adityaajinug@gmail.com', 'Kab.Semarang', 'aktif', 2),
(2, 'Made Garda', 'made@gmail.com', 'semarang', 'aktif', 4),
(3, 'Bagus', 'bagus@gamil.com', 'semarang', 'aktif', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mhs_bimbingan`
--

CREATE TABLE `mhs_bimbingan` (
  `id_mhs_bimbingan` int(11) NOT NULL,
  `pembimbing_id` int(11) NOT NULL,
  `mhs_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mhs_bimbingan`
--

INSERT INTO `mhs_bimbingan` (`id_mhs_bimbingan`, `pembimbing_id`, `mhs_id`) VALUES
(1, 3, 1),
(3, 4, 3),
(4, 5, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas_akhir`
--

CREATE TABLE `tugas_akhir` (
  `id_tugasakhir` int(11) NOT NULL,
  `title` text NOT NULL,
  `file` text NOT NULL,
  `status_file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` char(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `image` text NOT NULL,
  `role_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `image`, `role_id`, `status`) VALUES
(1, 'admin', '$2y$10$5rILPOC8uldJRzPxikBgL.OpbJnwXsigMuZdU4XGDk2Nh1P9U8SW6', 'default.jpg', 1, 1641633916),
(2, 'A22.2019.02756', '$2y$10$5rILPOC8uldJRzPxikBgL.OpbJnwXsigMuZdU4XGDk2Nh1P9U8SW6', 'default.jpg', 2, 1641688132),
(3, '0686.11.1995.070', '$2y$10$5rILPOC8uldJRzPxikBgL.OpbJnwXsigMuZdU4XGDk2Nh1P9U8SW6', 'default.jpg', 3, 1641456233),
(4, 'A22.2019.12345', '$2y$10$5rILPOC8uldJRzPxikBgL.OpbJnwXsigMuZdU4XGDk2Nh1P9U8SW6', 'defaul.jpg', 2, 1641705615),
(5, '0686.11.2008.358', '$2y$10$5rILPOC8uldJRzPxikBgL.OpbJnwXsigMuZdU4XGDk2Nh1P9U8SW6', 'default.jpg', 3, 1641693172),
(6, 'A22.2019.09876', '$2y$10$5rILPOC8uldJRzPxikBgL.OpbJnwXsigMuZdU4XGDk2Nh1P9U8SW6', 'default.jpg', 2, 1641776313),
(7, '0686.11.1996.082', '$2y$10$5rILPOC8uldJRzPxikBgL.OpbJnwXsigMuZdU4XGDk2Nh1P9U8SW6', 'default.jpg', 5, 1641457376);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(41, 1, 1),
(50, 1, 3),
(51, 1, 5),
(54, 1, 4),
(55, 1, 2),
(56, 2, 3),
(57, 2, 4),
(58, 2, 5),
(59, 2, 6),
(60, 3, 3),
(63, 3, 5),
(64, 5, 3),
(65, 5, 4),
(66, 5, 5),
(67, 1, 7),
(69, 1, 6),
(70, 2, 7),
(71, 3, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_sub_menu`
--

CREATE TABLE `user_access_sub_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `submenu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_sub_menu`
--

INSERT INTO `user_access_sub_menu` (`id`, `role_id`, `submenu_id`) VALUES
(4, 1, 5),
(11, 1, 9),
(17, 1, 2),
(19, 1, 3),
(24, 1, 13),
(27, 1, 14),
(32, 2, 7),
(33, 2, 11),
(35, 2, 10),
(36, 2, 12),
(37, 2, 15),
(38, 2, 4),
(39, 2, 8),
(42, 2, 16),
(44, 2, 6),
(45, 3, 4),
(46, 3, 16),
(47, 3, 7),
(48, 3, 8),
(49, 5, 4),
(50, 5, 16),
(51, 5, 14),
(52, 5, 7),
(53, 5, 8),
(54, 5, 6),
(55, 1, 17),
(56, 1, 18),
(57, 1, 19),
(58, 1, 10),
(59, 1, 12),
(60, 1, 15),
(61, 2, 19),
(62, 3, 19);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'Menu Management'),
(3, 'KKI'),
(4, 'Sertifikasi'),
(5, 'Proyek Akhir'),
(6, 'Referensi'),
(7, 'Informasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Mahasiswa'),
(3, 'Dosen'),
(4, 'Dosen Koordinator KKI '),
(5, 'Dosen Koordinator Sertifikasi '),
(6, 'Dosen Koordinator PA ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id_sub` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `url` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id_sub`, `menu_id`, `title`, `icon`, `url`, `is_active`) VALUES
(2, 2, 'Menu ', 'fas fa-tag', 'menu', 1),
(3, 2, 'Submenu', 'fas fa-tags', 'menu/submenu', 1),
(4, 3, 'Laporan', 'fas fa-file-alt', 'kki/laporan', 1),
(5, 1, 'Role Akses', 'fas fa-user-secret', 'admin/role', 1),
(6, 3, 'Absensi', 'fas fa-signature', 'kki/absensi', 1),
(7, 5, 'Tugas Akhir', 'fas fa-file-alt', 'proyekakhir', 1),
(8, 5, 'Absensi PA', 'fas fa-signature', 'proyekakhir/absensi', 1),
(9, 5, 'Koordinator PA', 'fas fa-user-tie', 'proyekakhir/koordinator', 1),
(10, 6, 'File PA', 'fas fa-fw fa-folder', 'referensi/file', 1),
(11, 4, 'User Guide', 'fas fa-file-alt', 'sertifikasi/user_guide', 1),
(12, 6, 'Video', 'fab fa-youtube', 'referensi/video', 1),
(13, 3, 'Koordinator KKI', 'fas fa-fw fa-user-tie', 'kki/koordinator', 1),
(14, 4, 'Koordinator Sertif', 'fas fa-fw fa-user-tie', 'sertifikasi/koordinator', 1),
(15, 6, 'Industri', 'fas fa-fw fa-building', 'referensi/industri', 1),
(16, 3, 'Proposal', 'fas fa-file-alt', 'kki/proposal', 1),
(17, 1, 'Data Mahasiswa', 'fas fa-user-graduate', 'admin/datamhs', 1),
(18, 1, 'Data Dosen', 'fas fa-user-tie', 'admin/datadosen', 1),
(19, 7, 'Pengumuman', 'fas fa-bullhorn', 'informasi/pengumuman', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `videos`
--

CREATE TABLE `videos` (
  `id_videos` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bab_kki`
--
ALTER TABLE `bab_kki`
  ADD PRIMARY KEY (`id_bab`);

--
-- Indeks untuk tabel `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id_chats`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `dosen_pembimbing`
--
ALTER TABLE `dosen_pembimbing`
  ADD PRIMARY KEY (`id_pembimbing`);

--
-- Indeks untuk tabel `file_laporan`
--
ALTER TABLE `file_laporan`
  ADD PRIMARY KEY (`id_file`);

--
-- Indeks untuk tabel `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`id_industries`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mhs`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `mhs_bimbingan`
--
ALTER TABLE `mhs_bimbingan`
  ADD PRIMARY KEY (`id_mhs_bimbingan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_sub_menu`
--
ALTER TABLE `user_access_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id_sub`);

--
-- Indeks untuk tabel `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id_videos`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bab_kki`
--
ALTER TABLE `bab_kki`
  MODIFY `id_bab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `chats`
--
ALTER TABLE `chats`
  MODIFY `id_chats` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `dosen_pembimbing`
--
ALTER TABLE `dosen_pembimbing`
  MODIFY `id_pembimbing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `file_laporan`
--
ALTER TABLE `file_laporan`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `industries`
--
ALTER TABLE `industries`
  MODIFY `id_industries` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mhs_bimbingan`
--
ALTER TABLE `mhs_bimbingan`
  MODIFY `id_mhs_bimbingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `user_access_sub_menu`
--
ALTER TABLE `user_access_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `videos`
--
ALTER TABLE `videos`
  MODIFY `id_videos` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
