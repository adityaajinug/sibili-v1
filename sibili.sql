-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 19 Jan 2022 pada 05.54
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
-- Struktur dari tabel `announcement`
--

CREATE TABLE `announcement` (
  `id_announce` int(11) NOT NULL,
  `topic` varchar(200) NOT NULL,
  `description` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_announce` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bab`
--

CREATE TABLE `bab` (
  `id_bab` int(11) NOT NULL,
  `status_bab` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category_bab` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bab`
--

INSERT INTO `bab` (`id_bab`, `status_bab`, `name`, `description`, `category_bab`) VALUES
(1, 1, 'BAB I', 'Merupakan pendahuluan dari <br> laporan KKI.', 1),
(2, 2, 'BAB II', 'Merupakan tinjauan perusahaan dari <br> laporan KKI.', 1),
(3, 3, 'Bab III', 'Merupakan perancangan dan implementasi dari laporan KKI.', 1),
(4, 4, 'BAB IV', 'Merupakan kesimpulan dan saran <br> dari proyek akhir.', 1),
(5, 5, 'Daftar Pustaka', 'Merupakan rujukan referensi <br> dari laporan KKI.', 1),
(6, 6, 'ALL', 'Merupakan keseluruhan laporan KKI <br> yang sudah jadi.', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bab_dosen`
--

CREATE TABLE `bab_dosen` (
  `id_bab_dosen` int(11) NOT NULL,
  `bab_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pembimbing_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bab_dosen`
--

INSERT INTO `bab_dosen` (`id_bab_dosen`, `bab_id`, `user_id`, `pembimbing_id`) VALUES
(9, 1, 5, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bimbingan`
--

CREATE TABLE `bimbingan` (
  `id_bimbingan` int(11) NOT NULL,
  `file` text NOT NULL,
  `bab_dosen_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pembimbing_id` int(11) NOT NULL,
  `status_konfirmasi` int(11) NOT NULL,
  `category_bimbingan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bimbingan`
--

INSERT INTO `bimbingan` (`id_bimbingan`, `file`, `bab_dosen_id`, `user_id`, `pembimbing_id`, `status_konfirmasi`, `category_bimbingan`) VALUES
(14, 'A22_2019_02756_LAPORAN_KKI_1_SIBILI-halaman-2-42.pdf', 1, 2, 8, 1, 1),
(15, 'A22_2019_02756_LAPORAN_KKI_1_SIBILI-halaman-2-43.pdf', 1, 6, 8, 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bimbingan_koreksi`
--

CREATE TABLE `bimbingan_koreksi` (
  `id_bimbingan_koreksi` int(11) NOT NULL,
  `file` text NOT NULL,
  `bab_dosen_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pembimbing_id` int(11) NOT NULL,
  `category_bimbingan_koreksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bimbingan_koreksi`
--

INSERT INTO `bimbingan_koreksi` (`id_bimbingan_koreksi`, `file`, `bab_dosen_id`, `user_id`, `pembimbing_id`, `category_bimbingan_koreksi`) VALUES
(7, 'A22_2019_02756_LAPORAN_KKI_1_SIBILI-halaman-5-62.pdf', 1, 5, 8, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `chats`
--

CREATE TABLE `chats` (
  `id_chats` int(11) NOT NULL,
  `incoming_chat_id` int(11) NOT NULL,
  `outgoing_chat_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `time` datetime NOT NULL,
  `bab_dosen_id` int(11) NOT NULL,
  `group` varchar(20) NOT NULL,
  `category_chats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `chats`
--

INSERT INTO `chats` (`id_chats`, `incoming_chat_id`, `outgoing_chat_id`, `message`, `time`, `bab_dosen_id`, `group`, `category_chats`) VALUES
(3, 5, 2, 'pak saya sudah upload bab 1', '2022-01-17 10:00:18', 1, 'DTI1558', 1),
(4, 2, 5, 'ya baik', '2022-01-17 10:00:43', 1, 'DTI1558', 1),
(5, 6, 5, 'test', '2022-01-19 12:33:18', 1, 'DTI1558', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `dosen_name` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status_penguji` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `dosen_name`, `email`, `status_penguji`, `user_id`) VALUES
(1, 'Dr. Fikri Budiman, M.Kom', 'fikri.budiman@dsn.dinus.ac.id', 1, 3),
(2, 'Edi Sugiarto, S.Kom, M.Kom', 'edi.sugiarto@dsn.dinus.ac.id', 1, 5),
(11, 'Zaenal Arifin SE, M.Kom', 'zaenal.arifin@dsn.dinus.ac.id', 0, 15),
(12, 'Novi Hendiriyanto, M.Kom', 'novi.hendriyanto@dsn.dinus.ac.id', 1, 20),
(13, 'Muslih, M.Kom', 'muslih@dsn.dinus.ac.id', 1, 21);

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
(4, 'DTI2122', 1),
(7, 'DTI3730', 12),
(8, 'DTI1558', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `format`
--

CREATE TABLE `format` (
  `id_format` int(11) NOT NULL,
  `format_name` int(11) NOT NULL,
  `file` int(11) NOT NULL,
  `category_format` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_upload`
--

CREATE TABLE `form_upload` (
  `id_form` int(11) NOT NULL,
  `limit_end` timestamp NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_form` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `form_upload`
--

INSERT INTO `form_upload` (`id_form`, `limit_end`, `user_id`, `category_form`) VALUES
(1, '2022-01-12 00:31:00', 7, 5),
(2, '2022-01-12 04:13:00', 7, 5),
(3, '2022-01-13 04:30:00', 7, 5),
(10, '2022-01-18 03:02:00', 15, 1),
(13, '2022-01-20 02:38:00', 15, 2);

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
  `status_mhs` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mhs`, `mhs_name`, `email`, `status_mhs`, `user_id`) VALUES
(1, 'Aditya Ajie Nugroho', 'adityaajinug@gmail.com', 'aktif', 2),
(2, 'Ferisa Salsabila Putri', '122201902739@mhs.dinus.ac.id', 'aktif', 4),
(3, 'Mohammad Bagus Chalil Akbar', 'bagus.chalil@gmail.com', 'aktif', 6),
(6, 'Muhammad Dicky Afriza', '122201902785@mhs.dinus.ac.id', 'aktif', 18);

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
(4, 5, 2),
(5, 6, 6),
(7, 4, 2),
(8, 7, 6),
(9, 8, 1),
(10, 8, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mhs_bimbingan_akhir`
--

CREATE TABLE `mhs_bimbingan_akhir` (
  `id_mhs_bimbingan` int(11) NOT NULL,
  `pembimbing_id` int(11) NOT NULL,
  `mhs_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mhs_bimbingan_akhir`
--

INSERT INTO `mhs_bimbingan_akhir` (`id_mhs_bimbingan`, `pembimbing_id`, `mhs_id`) VALUES
(3, 6, 6),
(4, 4, 3),
(5, 4, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mhs_exam`
--

CREATE TABLE `mhs_exam` (
  `id_exam` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `mhs_id` int(11) NOT NULL,
  `pembimbing_id` int(11) NOT NULL,
  `assesor_one` int(11) NOT NULL,
  `assesor_two` int(11) NOT NULL,
  `group_exam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `schedule`
--

CREATE TABLE `schedule` (
  `id_schedule` int(11) NOT NULL,
  `schedule_start` timestamp NOT NULL,
  `semester` varchar(10) NOT NULL,
  `year_id` int(20) NOT NULL,
  `category_schedule` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `schedule`
--

INSERT INTO `schedule` (`id_schedule`, `schedule_start`, `semester`, `year_id`, `category_schedule`) VALUES
(3, '2022-01-17 01:00:00', '1', 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `school_year`
--

CREATE TABLE `school_year` (
  `id_year` int(11) NOT NULL,
  `year` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `school_year`
--

INSERT INTO `school_year` (`id_year`, `year`) VALUES
(1, '2021/2022'),
(2, '2022/2023'),
(3, '2023/2024');

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
-- Struktur dari tabel `upload`
--

CREATE TABLE `upload` (
  `id_upload` int(11) NOT NULL,
  `file` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `tahun` varchar(20) NOT NULL,
  `category_upload` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `upload`
--

INSERT INTO `upload` (`id_upload`, `file`, `user_id`, `tahun`, `category_upload`) VALUES
(3, 'Projek_Akhir_UAS-Event_Tech-_A22_2019_02756.pdf', 2, '2018', 4),
(14, 'A22_2019_02756_LAPORAN_KKI_1_SIBILI-halaman-5-622.pdf', 2, '2019', 2);

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
(1, 'admin', '$2y$10$5rILPOC8uldJRzPxikBgL.OpbJnwXsigMuZdU4XGDk2Nh1P9U8SW6', 'default.jpg', 1, 1642571308),
(2, 'A22.2019.02756', '$2y$10$5rILPOC8uldJRzPxikBgL.OpbJnwXsigMuZdU4XGDk2Nh1P9U8SW6', 'default.jpg', 2, 1642571654),
(3, '0686.11.1995.070', '$2y$10$5rILPOC8uldJRzPxikBgL.OpbJnwXsigMuZdU4XGDk2Nh1P9U8SW6', 'default.jpg', 3, 1641860333),
(4, 'A22.2019.02739', '$2y$10$5rILPOC8uldJRzPxikBgL.OpbJnwXsigMuZdU4XGDk2Nh1P9U8SW6', 'defaul.jpg', 2, 1642336894),
(5, '0686.11.2008.358', '$2y$10$5rILPOC8uldJRzPxikBgL.OpbJnwXsigMuZdU4XGDk2Nh1P9U8SW6', 'default.jpg', 3, 1642570448),
(6, 'A22.2019.02733', '$2y$10$5rILPOC8uldJRzPxikBgL.OpbJnwXsigMuZdU4XGDk2Nh1P9U8SW6', 'default.jpg', 2, 1642571367),
(15, '0686.11.1993.041', '$2y$10$ItgahUkxqfutTnItk4KFuueA7JBGm7Be52sbgWnRZlD9WmokCWDcG', 'default.jpg', 4, 1642570115),
(18, 'A22.2019.02785', '$2y$10$/JWZS9dR8eQ.PkYwE1EkTOsko9xdJv4Ri7id5sSY07MbBkvFJiwEy', 'default.jpg', 2, 1642387590),
(19, 'kaprodi', '$2y$10$5rILPOC8uldJRzPxikBgL.OpbJnwXsigMuZdU4XGDk2Nh1P9U8SW6', 'default.jpg', 7, 1642571633),
(20, '0686.11.2016.646', '$2y$10$WDJVLzWYH0NyGERBiIePquwxRkgFiILj9HYlgfRC/H9RZn7mNdkja', 'default.jpg', 6, 1642387587),
(21, '0686.11.1996.082', '$2y$10$qcA1llHGdgRutRZF6cpdFeTZxJhgQuPw7KMFKHNIh/7Xxevs7vWDO', 'default.jpg', 5, 1642394524);

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
(56, 2, 3),
(57, 2, 4),
(58, 2, 5),
(60, 3, 3),
(63, 3, 5),
(64, 5, 3),
(65, 5, 4),
(66, 5, 5),
(73, 2, 6),
(74, 2, 7),
(76, 5, 6),
(78, 3, 6),
(79, 4, 3),
(80, 4, 6),
(81, 7, 3),
(82, 7, 4),
(83, 7, 5),
(84, 7, 6),
(85, 7, 7),
(86, 6, 3),
(87, 6, 4),
(88, 6, 5),
(89, 6, 6);

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
(17, 1, 2),
(19, 1, 3),
(32, 2, 7),
(33, 2, 11),
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
(64, 2, 19),
(68, 1, 15),
(69, 2, 10),
(70, 2, 12),
(72, 5, 19),
(73, 1, 20),
(77, 3, 19),
(81, 4, 13),
(82, 4, 4),
(83, 4, 16),
(84, 4, 19),
(86, 2, 23),
(87, 2, 24),
(88, 2, 25),
(89, 2, 26),
(90, 2, 21),
(92, 1, 17),
(93, 1, 18),
(94, 1, 5),
(95, 7, 13),
(96, 7, 14),
(97, 7, 9),
(98, 7, 10),
(99, 7, 12),
(100, 7, 21),
(101, 7, 19),
(102, 5, 11),
(103, 6, 4),
(104, 6, 16),
(105, 6, 11),
(106, 6, 19),
(107, 6, 9),
(108, 6, 7);

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
(6, 'Informasi'),
(7, 'Referensi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL,
  `category_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`, `category_role`) VALUES
(1, 'Admin', 1),
(2, 'Mahasiswa', 2),
(3, 'Dosen', 3),
(4, 'Dosen Koordinator KKI ', 3),
(5, 'Dosen Koordinator Sertifikasi ', 3),
(6, 'Dosen Koordinator PA ', 3),
(7, 'Kaprodi', 3);

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
(6, 3, 'Log Harian', 'fas fa-signature', 'kki/log_harian', 1),
(7, 5, 'Tugas Akhir', 'fas fa-file-alt', 'proyekakhir', 1),
(9, 5, 'Koordinator PA', 'fas fa-user-tie', 'proyekakhir/koordinator', 1),
(10, 7, 'File PA', 'fas fa-fw fa-folder', 'referensi/file', 1),
(11, 4, 'User Guide', 'fas fa-file-alt', 'sertifikasi/user_guide', 1),
(12, 7, 'File Laporan', 'fas fa-fw fa-folder', 'referensi/laporan', 1),
(13, 3, 'Koordinator KKI', 'fas fa-fw fa-user-tie', 'kki/koordinator', 1),
(14, 4, 'Koordinator Sertif', 'fas fa-fw fa-user-tie', 'sertifikasi/koordinator', 1),
(16, 3, 'Proposal', 'fas fa-file-alt', 'kki/proposal', 1),
(17, 1, 'Data Mahasiswa', 'fas fa-user-graduate', 'admin/mahasiswa', 1),
(18, 1, 'Data Dosen', 'fas fa-user-tie', 'admin/dosen', 1),
(19, 6, 'Pengumuman', 'fas fa-bullhorn', 'informasi/pengumuman', 1),
(21, 7, 'File User Guide', 'fas fa-fw fa-folder', 'referensi/user_guide', 1),
(22, 1, 'Tahun Ajaran', 'fas fa-graduation-cap', 'admin/tahun_ajaran', 1),
(23, 7, 'Industri', 'fas fa-building', 'referensi/industri', 1),
(24, 3, 'Ujian KKI', 'fas fa-paste', 'kki/ujian', 1),
(25, 4, 'Ujian Sertifikasi', 'fas fa-paste', 'sertifikasi/ujian', 1),
(26, 5, 'Ujian Tugas Akhir', 'fas fa-paste', 'pa/ujian', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id_announce`);

--
-- Indeks untuk tabel `bab`
--
ALTER TABLE `bab`
  ADD PRIMARY KEY (`id_bab`);

--
-- Indeks untuk tabel `bab_dosen`
--
ALTER TABLE `bab_dosen`
  ADD PRIMARY KEY (`id_bab_dosen`);

--
-- Indeks untuk tabel `bimbingan`
--
ALTER TABLE `bimbingan`
  ADD PRIMARY KEY (`id_bimbingan`);

--
-- Indeks untuk tabel `bimbingan_koreksi`
--
ALTER TABLE `bimbingan_koreksi`
  ADD PRIMARY KEY (`id_bimbingan_koreksi`);

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
-- Indeks untuk tabel `format`
--
ALTER TABLE `format`
  ADD PRIMARY KEY (`id_format`);

--
-- Indeks untuk tabel `form_upload`
--
ALTER TABLE `form_upload`
  ADD PRIMARY KEY (`id_form`);

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
-- Indeks untuk tabel `mhs_bimbingan_akhir`
--
ALTER TABLE `mhs_bimbingan_akhir`
  ADD PRIMARY KEY (`id_mhs_bimbingan`);

--
-- Indeks untuk tabel `mhs_exam`
--
ALTER TABLE `mhs_exam`
  ADD PRIMARY KEY (`id_exam`);

--
-- Indeks untuk tabel `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id_schedule`);

--
-- Indeks untuk tabel `school_year`
--
ALTER TABLE `school_year`
  ADD PRIMARY KEY (`id_year`);

--
-- Indeks untuk tabel `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id_upload`);

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
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id_announce` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `bab`
--
ALTER TABLE `bab`
  MODIFY `id_bab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `bab_dosen`
--
ALTER TABLE `bab_dosen`
  MODIFY `id_bab_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `bimbingan`
--
ALTER TABLE `bimbingan`
  MODIFY `id_bimbingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `bimbingan_koreksi`
--
ALTER TABLE `bimbingan_koreksi`
  MODIFY `id_bimbingan_koreksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `chats`
--
ALTER TABLE `chats`
  MODIFY `id_chats` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `dosen_pembimbing`
--
ALTER TABLE `dosen_pembimbing`
  MODIFY `id_pembimbing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `format`
--
ALTER TABLE `format`
  MODIFY `id_format` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `form_upload`
--
ALTER TABLE `form_upload`
  MODIFY `id_form` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `industries`
--
ALTER TABLE `industries`
  MODIFY `id_industries` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `mhs_bimbingan`
--
ALTER TABLE `mhs_bimbingan`
  MODIFY `id_mhs_bimbingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `mhs_bimbingan_akhir`
--
ALTER TABLE `mhs_bimbingan_akhir`
  MODIFY `id_mhs_bimbingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `mhs_exam`
--
ALTER TABLE `mhs_exam`
  MODIFY `id_exam` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id_schedule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `school_year`
--
ALTER TABLE `school_year`
  MODIFY `id_year` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `upload`
--
ALTER TABLE `upload`
  MODIFY `id_upload` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT untuk tabel `user_access_sub_menu`
--
ALTER TABLE `user_access_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
