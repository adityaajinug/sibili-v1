-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 30 Des 2021 pada 06.33
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
(6, 'ALL', 'Merupakan keseluruhan laporan KKI yang sudah jadi.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bimbingan`
--

CREATE TABLE `bimbingan` (
  `id_bimbingan` int(11) NOT NULL,
  `title` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `upload_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `chats`
--

CREATE TABLE `chats` (
  `id_chats` int(11) NOT NULL,
  `groups_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `isi` text NOT NULL,
  `time` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `comments`
--

CREATE TABLE `comments` (
  `id_comments` int(11) NOT NULL,
  `upload_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `notes` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `dosen_name`, `email`, `address`, `status`, `user_id`, `group_id`) VALUES
(1, 'Dr. Fikri Budiman, M.Kom', 'fikribudiman@gmail.com', 'Tembalang', 'dosen', 3, 1),
(2, 'Edi Sugiarto, S.Kom, M.Kom', 'edi.sugiarto[a]dsn.dinus.ac.id', 'semarang', 'dosen', 5, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `file_laporan`
--

CREATE TABLE `file_laporan` (
  `id_file` int(11) NOT NULL,
  `file` text NOT NULL,
  `bab_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dosen_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `file_laporan`
--

INSERT INTO `file_laporan` (`id_file`, `file`, `bab_id`, `user_id`, `dosen_id`, `group_id`) VALUES
(1, 'bab1.pdf', 1, 2, 5, 2),
(2, 'bab2.pdf', 2, 2, 5, 2),
(3, 'A22.2019.02756_PROPOSAL_SIBILI.pdf', 1, 4, 5, 2),
(4, 'bab3.pdf', 2, 6, 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE `groups` (
  `id_group` int(11) NOT NULL,
  `group` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`id_group`, `group`) VALUES
(1, 1),
(5, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `group_code`
--

CREATE TABLE `group_code` (
  `id_code` int(11) NOT NULL,
  `code` varchar(25) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `group_code`
--

INSERT INTO `group_code` (`id_code`, `code`, `group_id`) VALUES
(1, 'DTI12345', 1),
(2, 'DTI54321', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `industries`
--

CREATE TABLE `industries` (
  `id_industries` int(11) NOT NULL,
  `industry_name` varchar(200) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `industries`
--

INSERT INTO `industries` (`id_industries`, `industry_name`, `address`) VALUES
(1, 'Ardata Media Center', 'Jl. Sekaran Gunung Pati Smg'),
(2, 'Badan Metrologi dan Geofisika Kelas I', 'Jl. Siliwangi No. 291 Kalibanteng Kulon'),
(3, 'Badan Penangg Bencana Daerah (BPBD) Jateng', 'Jl. Imam Bonjol No. 1F Dadapsari Smg'),
(4, 'Badan Pusat Statistik Kab Semarang', 'Jln. Garuda No. 7 Ungaran'),
(5, 'Balai Industri Kreatif Digital dan Kemasan', 'Jl. Ki Mangun Sarkoro No. 10 Smg'),
(6, 'Big Benjaya Rent Car', 'jln. Srinindito Timur IV RT 04 RW 03 Simongan Smg'),
(7, 'BPMPK ', 'Pakintelan Gn. Pati Semarang'),
(8, 'BPS Jateng', 'Jln. Pahlawan No. 6 Pleburan Smg Sltan 50241'),
(9, 'BPSDMD Jateng', 'Jln. Setyobudi No. 201 A Semarang'),
(10, 'BPTIK Dikbud', 'Jl. Tarupolo Tengah No. 7 Gisik drono Smg '),
(11, 'CV. Bee Digital Printing Kudus', 'Ds. Bakalan Krapyak RT 07 RW 03 Kaliwungu Kudus'),
(12, 'CV. Can Creative', 'Jln. Warigalit II No. 285 Semarang'),
(13, 'CV. Seven Media Technology', 'Jl. Stonen Timur No.7A Gjh mungkur Smg'),
(14, 'CV. Wintio Mandiri', 'Jln. Kinibalu Timur No. 97 Tandang Tembalang 50274'),
(15, 'Dinas Kesehatan Prop Jateng', 'Jln. Kapt Pierre Tendean No. 24 Sekayu Smg Tengah'),
(16, 'Dinas Pekerjaan Umum Semarang', 'jln. Madukoro Raya Krobokan Smg Barat'),
(17, 'Dinas Pendidikan dan Kebudayaan Jateng', 'jln. Pemuda No. 134 Smg 50132'),
(18, 'Dinas PUPR Kab. Grobogan', 'Jl. Gajahmada No. 32 Kuripan Pwdd'),
(19, 'Diskom dan Informatika Kab. Demak', 'Jl. Sultan Hadiwijaya No. 4 Demak'),
(20, 'Diskominfo Prov Jateng', 'Jl. Mentri Supeno 1/2 Mugassari Smg'),
(21, 'Disnakertrans Smg', 'Jl. Pahlawan No. 16 Smg'),
(22, 'Disperindag Jateng', 'Jl. Pahlawan No. 4 Pleburan Smg'),
(23, 'DPU Smb Daya Air dan Penataan Ruang', 'Jl. Madukoro Blok AA-BB Smg'),
(24, 'EZATECH Blok D No. 16 ', 'Gemah Permai Regency Sendguwo Tmblng Smg 50273'),
(25, 'JDK Studio Semarang', 'Jln. Dr. Sutomo No 59 Randusari Smg'),
(26, 'Jepara Art Furnicraft', 'Jl. Cik Lanang No. 25  Jobokuto Jepara'),
(27, 'Kantor Pos Erlangga Smg', 'Jln. Imam Barjo No. 2 Pleburan Smg 50241'),
(28, 'Kantor Pos Regional 6 ', 'Jln. Sisingamangaraja No. 45 Smg 50252'),
(29, 'Majlis Pustaka dan Informasi PWM Jateng', 'Jln. Singosari Raya No. 33 Semarang'),
(30, 'Multindo', 'Jl. Pandanaran No. 119 Mugassari Smg'),
(31, 'Nasmoco Pemuda', 'Jln. Pemuda No. 72 Kembangsari Smg'),
(32, 'Nasmoco Training Center', 'Jln. Raya Walisongo Km 11 No. 203 Tambak Aji Smg'),
(33, 'Omah Koding', 'Jln. Imam Bonjol No. 190 Semarang Tengah'),
(34, 'Pemprov Jateng', 'Jl. Pahlawan No. 9 Mugas Smg'),
(35, 'Perum Bulog Kancab Semarang', 'Jl. Siliwangi No. 289 Kalibanteng Kulon Smg'),
(36, 'Polda Jateng', 'Jln. Pahlawan No. 1 Smg'),
(37, 'Politeknik Ilmu Pelayaran Semarang', 'Jln. Singosari 2 A Wonodri Smg '),
(38, 'Polrestabes Semarang', 'Jl. Dr. Sutomo No. 19 Barusari'),
(39, 'PT. Arindo Bangun Jaya', 'Jln. Kinibalu Timur No. 97 Tandang Tembalang 50274'),
(40, 'PT. Campus Data Media', 'Jln. Sadewa I No 30 Pendrikan Kidul Smg'),
(41, 'PT. Desa Riset dan Teknologi', 'Jl. Pedurungan Tengah Kec. Pedurungan Smg'),
(42, 'PT. Glory Industrial Smg', 'Jl. Soekarno Hatta Secang Samban Bawen  Smg '),
(43, 'PT. Glory Industrial Smg', 'Jl. Soetta Secang Samban Bawen Kab. Smg '),
(44, 'PT. Indonesia Power Up ', 'Jl. Ronggo Warsito Tanjung Emas'),
(45, 'PT. Millenium Pharmacon International tbk', 'Jln. Gisikdrono Smg Barat Smg 50149'),
(46, 'PT. Purinusa Eka Persada Demak', 'Jalan Raya Semarang Demak Km 17 Ds. Wonokerto'),
(47, 'PT. Sarana Patra Jateng', 'Jln. Pamularsih Raya No. 15 Bongsari Smg'),
(48, 'PT. Sidji Jaya Abadi ', 'Jln. Arya Mukti II/895 Blok Flamboyan Pdrungan Smg'),
(49, 'PT. Telekomunikasi Indonesia Tbk', 'Jln. Pahlawan No. 10 Smg'),
(50, 'PT. ZMG Telekomunikasi Servis Indonesia', 'Jln. Ngesrep Barat VI Kompleks PLN No. 11 Tembalang'),
(51, 'Satria Computer', 'Jln. Soekarno Hatta No. 3C Pedurungan Smg'),
(52, 'Star Share', 'Jln. Langgeng Asri 5 No. 01 Nongko Sawit Gn. Pati Smg'),
(53, 'Tri Niche Indonesia Smg Plaza Lt.1 No 107', 'Jln. KH. Agus Salim No. 7 Kauman Smg'),
(54, 'Undip Semarang', 'Jln. Prof Sudarto Tembalang Smg');

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
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mhs`, `mhs_name`, `email`, `address`, `status`, `user_id`, `group_id`) VALUES
(1, 'Aditya Ajie Nugroho', 'adityaajinug@gmail.com', 'Kab.Semarang', 'mahasiswa aktif', 2, 2),
(2, 'Made Garda', 'made@gmail.com', 'semarang', 'mahasiswa aktif', 4, 2),
(3, 'Bagus', 'bagus@gamil.com', 'semarang', 'mahasiswa aktif', 6, 1);

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
  `user_id` int(11) NOT NULL,
  `file` text NOT NULL,
  `catatan` text NOT NULL
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
(1, 'admin', '$2y$10$5rILPOC8uldJRzPxikBgL.OpbJnwXsigMuZdU4XGDk2Nh1P9U8SW6', 'default.jpg', 1, 1640763299),
(2, 'A22.2019.02756', '$2y$10$5rILPOC8uldJRzPxikBgL.OpbJnwXsigMuZdU4XGDk2Nh1P9U8SW6', 'default.jpg', 2, 1640763356),
(3, '0686.11.1995.070', '$2y$10$5rILPOC8uldJRzPxikBgL.OpbJnwXsigMuZdU4XGDk2Nh1P9U8SW6', 'default.jpg', 3, 1640760077),
(4, 'A22.2019.12345', '$2y$10$5rILPOC8uldJRzPxikBgL.OpbJnwXsigMuZdU4XGDk2Nh1P9U8SW6', 'defaul.jpg', 2, 0),
(5, '062.12.12345.322', '$2y$10$5rILPOC8uldJRzPxikBgL.OpbJnwXsigMuZdU4XGDk2Nh1P9U8SW6', 'default.jpg', 3, 1640767115),
(6, 'A22.2019.09876', '$2y$10$5rILPOC8uldJRzPxikBgL.OpbJnwXsigMuZdU4XGDk2Nh1P9U8SW6', 'default.jpg', 2, 0);

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
(53, 1, 6),
(54, 1, 4),
(55, 1, 2),
(56, 2, 3),
(57, 2, 4),
(58, 2, 5),
(59, 2, 6),
(60, 3, 3),
(63, 3, 5);

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
(12, 1, 7),
(13, 1, 8),
(15, 1, 10),
(17, 1, 2),
(19, 1, 3),
(23, 1, 12),
(24, 1, 13),
(25, 1, 4),
(27, 1, 14),
(28, 1, 11),
(29, 1, 15),
(32, 2, 7),
(33, 2, 11),
(35, 2, 10),
(36, 2, 12),
(37, 2, 15),
(38, 2, 4),
(39, 2, 8),
(40, 1, 16),
(41, 1, 6),
(42, 2, 16),
(44, 2, 6),
(45, 3, 4),
(46, 3, 16),
(47, 3, 7),
(48, 3, 8);

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
(6, 'Referensi');

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
(7, 5, 'Bimbingan', 'fas fa-file-alt', 'proyekakhir', 1),
(8, 5, 'Absensi PA', 'fas fa-signature', 'proyekakhir/absensi', 1),
(9, 5, 'Koordinator PA', 'fas fa-user-tie', 'proyekakhir/koordinator', 1),
(10, 6, 'File PA', 'fas fa-fw fa-folder', 'referensi/file', 1),
(11, 4, 'User Guide', 'fas fa-file-alt', 'sertifikasi/user_guide', 1),
(12, 6, 'Video', 'fab fa-youtube', 'referensi/video', 1),
(13, 3, 'Koordinator KKI', 'fas fa-fw fa-user-tie', 'kki/koordinator', 1),
(14, 4, 'Koordinator Sertif', 'fas fa-fw fa-user-tie', 'sertifikasi/koordinator', 1),
(15, 6, 'Industri', 'fas fa-fw fa-building', 'referensi/industri', 1),
(16, 3, 'Proposal', 'fas fa-file-alt', 'kki/proposal', 1);

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
-- Indeks untuk tabel `bimbingan`
--
ALTER TABLE `bimbingan`
  ADD PRIMARY KEY (`id_bimbingan`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `upload_id` (`upload_id`);

--
-- Indeks untuk tabel `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id_chats`);

--
-- Indeks untuk tabel `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comments`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `file_laporan`
--
ALTER TABLE `file_laporan`
  ADD PRIMARY KEY (`id_file`);

--
-- Indeks untuk tabel `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id_group`),
  ADD KEY `user_id` (`group`);

--
-- Indeks untuk tabel `group_code`
--
ALTER TABLE `group_code`
  ADD PRIMARY KEY (`id_code`);

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
-- AUTO_INCREMENT untuk tabel `bimbingan`
--
ALTER TABLE `bimbingan`
  MODIFY `id_bimbingan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `chats`
--
ALTER TABLE `chats`
  MODIFY `id_chats` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comments` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `file_laporan`
--
ALTER TABLE `file_laporan`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `groups`
--
ALTER TABLE `groups`
  MODIFY `id_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `group_code`
--
ALTER TABLE `group_code`
  MODIFY `id_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `industries`
--
ALTER TABLE `industries`
  MODIFY `id_industries` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `upload`
--
ALTER TABLE `upload`
  MODIFY `id_upload` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `user_access_sub_menu`
--
ALTER TABLE `user_access_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `videos`
--
ALTER TABLE `videos`
  MODIFY `id_videos` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bimbingan`
--
ALTER TABLE `bimbingan`
  ADD CONSTRAINT `bimbingan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `bimbingan_ibfk_2` FOREIGN KEY (`upload_id`) REFERENCES `upload` (`id_upload`);

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
