-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2020 at 06:53 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_opentrip`
--

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `kode_paket` varchar(255) NOT NULL,
  `nama_fasilitas` varchar(128) NOT NULL,
  `keterangan_fasilitas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `kode_paket`, `nama_fasilitas`, `keterangan_fasilitas`) VALUES
(1, 'PKT007', 'transfortasi ', 'transofrtasi dari magelang to basecamp arjuno pulang pergi dengan transfortasi mini bus'),
(2, '', '', ''),
(3, '', 'makan 3x', '1x saat mau naik\r\n1x saat di gunung (makan malam)\r\n1x saat hendak turun'),
(4, 'PKT001', 'makan 3x', '1x saat mau naik\r\n1x saat di gunung(makan malem)\r\n1x saat mau turun(optional)'),
(8, 'PKT008', 'makan 3x', 'sebelum berangkat 1x\r\ndi gunung 1x\r\nsebelum turun gunung 1x');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `nama_lengkap` varchar(128) NOT NULL,
  `nomer_hp` int(13) NOT NULL,
  `isi_feedback` varchar(255) NOT NULL,
  `status_feedback` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `email`, `nama_lengkap`, `nomer_hp`, `isi_feedback`, `status_feedback`) VALUES
(1, 'rizanalfalah@gmail.com', 'muhamad Rizan Alfalah', 83817566, 'pemesanan masih ribet', 1),
(2, 'redeyes199802@gmail.com', 'feisal akbar G', 234234, 'banyak yang harus di tambahkan pada pemesanan paket', 0),
(3, 'rizanalfalah@gmail.com', 'reza', 0, 'dsa', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gallerygunung`
--

CREATE TABLE `gallerygunung` (
  `id_gambar` int(11) NOT NULL,
  `gambar_satu` varchar(255) NOT NULL,
  `gambar_dua` varchar(255) NOT NULL,
  `gambar_tiga` varchar(255) NOT NULL,
  `gambar_empat` varchar(255) NOT NULL,
  `gambar_lima` varchar(255) NOT NULL,
  `kode_gunung` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallerygunung`
--

INSERT INTO `gallerygunung` (`id_gambar`, `gambar_satu`, `gambar_dua`, `gambar_tiga`, `gambar_empat`, `gambar_lima`, `kode_gunung`) VALUES
(8, '73cda99b2c8b3ed7eaf841cd222de177.jpg', 'cad634e7941d26ee3c15f579496d4eaf.jpg', 'gambar_tiga.jpg', '5b445dd4b4fb72e7e2599d6829fab514.jpg', '8be287774ceb37441cdadd917ec768ef.jpg', 'DGN001'),
(9, 'b05bff3399b7bd67921f8fc5bb8ad50a.jpg', '1b4465984115af4dafa11345595261ae.jpg', '8858ced2820fde3e7cef51409995dc18.jpg', 'e2b15ebf055b6a291e1832bdbf78008d.jpg', '72e3a5f74aa6fead0c5029d5e4fa54ab.jpg', 'DGN002'),
(10, 'gambar_satu.jpg', '957bf906eb253b9890a7bdb6d835a85e.jpg', '5dfeded9e3b24bf67e2f9556abc2d7e5.png', 'a889c20a081f2d0158a6ffaaf092a7b8.jpg', '720x9603.jpg', 'DGN003'),
(11, 'cf88e02fb20cc910adbba4d90736e894.jpg', 'fb4c9eaa5d7676eda0aba41f395cc4a1.jpg', '2eef63ee91de38c13dc200489b92fc4a.jpg', '1c50624c6acfb77936feabe62bee8d69.jpg', '21d0135aff8c937fc4ee67126ec7faf2.jpg', 'DGN004'),
(12, 'e9767a1f0791b553c7f92ea42142e22a.jpg', 'ba7a551863624d06f77fff83e039b880.jpg', 'bb46fb38756243c18a7190b1d3bce0a4.jpg', 'a905986442e3ee98286c55a3f7d28029.jpg', 'e22250560895e0106965966fb22b7bd4.jpg', 'DGN005'),
(13, '12adc4cf2075358ccb84b105478f46b6.jpg', '896387f452408a70e266d59fb81f1b35.jpg', '560ee6b5992d925ca4962ba2daef2aaa.jpg', '6d66d8874fb72943369aefbc18021733.jpg', '1f269204363af41b197275cf61fea219.jpg', 'DGN006'),
(14, '65a2de3c9f264572c186fd8b8cd413e8.jpg', '76d7e9395d30b6d4ea476ee68fccb5e5.jpg', 'dd741ed45ff10fac306dd0a3d411be8c.jpg', 'c4c5b214807820d3ad6ad82ce08e2267.jpg', 'd7e71ef6e45a3aa35a335f3a504cc875.jpg', 'DGN007'),
(15, '16aa1dd34ba3270f7c0afbe5d2e1be95.JPG', 'efc3a9064b9ce0b6354791f9884af640.jpg', 'a08ea5595f3bc575018191aa1bf16004.jpg', '3cf84bd8af27c062fcff36cd27e12207.jpg', '7894d14e77ed2e60017973b8f7ca09cc.jpg', 'DGN008'),
(16, 'd138e6e1ae0ce395f6a7bc2a353cdbec.jpg', 'f1b47636cb8e54a850f3410ccbd5f93c.jpg', '7d16999a6c81e66da4010fb580e1626a.jpg', '228b2f794a9c6a6954316f11c96f0b17.jpg', '0e8dccca275174c1c9878457f3cd63d8.jpg', 'DGN009'),
(17, '8f5b9a4091c13f7efea3ed14e25b2753.jpg', '19b6b55984d08b54c0a762dd97b7280c.jpg', '37c50350f91481e66ac0f037a3c59293.jpg', '1c72ec70303a947c56a8588847664e46.jpg', 'c38e6110965082572cde80fda6142584.jpg', 'DGN010');

-- --------------------------------------------------------

--
-- Table structure for table `gunung`
--

CREATE TABLE `gunung` (
  `id_gunung` int(11) NOT NULL,
  `kode_gunung` varchar(255) NOT NULL,
  `nama_gunung` varchar(128) NOT NULL,
  `ketinggian` double NOT NULL,
  `rata_rata_suhu` float NOT NULL,
  `kategori_id` varchar(128) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gunung`
--

INSERT INTO `gunung` (`id_gunung`, `kode_gunung`, `nama_gunung`, `ketinggian`, `rata_rata_suhu`, `kategori_id`, `keterangan`, `alamat`) VALUES
(11, 'DGN001', 'Andong', 1726, 19, '', 'Nama Gunung Andong berasal dari nama sebuah daun yang sering disebut “Andong“. Daun Andong dalam kepercayaan Jawa merupakan salah satu daun yang dipersyaratkan dalam ritual. Khususnya dalam acara Selamatan. Daun Andong memiliki makna “Andongoo” yaitu Berd', 'Ngablak,Tlogrojo'),
(12, 'DGN002', 'anjasmoro', 2282, 5, '', 'Gunung Anjasmoro merupakan sebuah gunung yang terdapat di pulau Jawa, Indonesia. Ketinggian gunung ini ialah 2.282 meter. Gunung Anjasmoro termasuk ke dalam wilayah Kabupaten Jombang, Kabupaten Mojokerto, dan Kota Batu, Jawa Timur. Gunung Anjasmoro terlet', 'jomlang, mojokerto'),
(13, 'DGN003', 'Argopuro', 3088, 5, '', 'Gunung Argapura memiliki ketinggian 3.088 mdpl. Gunung di timur Jawa ini menyimpan keindahan alam yang luar biasa. Satu hal lain yang membuat banyak pendaki penasaran dengan gunung ini adalah panjangnya jalur perjalanan yang harus ditempuh hingga puncak e', 'Probolinggo,lumajang'),
(14, 'DGN004', 'Arjuno', 3339, 5, '', 'Gunung Arjuno (terkadang dieja Gunung Arjuna) adalah sebuah gunung berapi kerucut (istirahat) di Jawa Timur, Indonesia dengan ketinggian 3.339 m dpl. Gunung Arjuno secara administratif terletak di perbatasan Kota Batu, Kabupaten Malang, dan Kabupaten Pasu', 'Malang,Pasuruan'),
(15, 'DGN005', 'Batok', 2440, 5, '', 'Gunung Batok adalah sebuah gunung yang terletak di Jawa Timur, Indonesia. Gunung ini memiliki ketinggian 2.440 meter di atas permukaan laut dan berada di antara empat wilayah kabupaten, yakni Kabupaten Probolinggo, Kabupaten Pasuruan, Kabupaten Lumajang, ', 'Probolinggo, lumajang'),
(16, 'DGN006', 'Bromo', 2329, 5, '', 'Gunung Bromo (dari bahasa Sanskerta: Brahma, salah seorang Dewa Utama dalam agama Hindu) atau dalam bahasa Tengger dieja &quot;Brama&quot;, adalah sebuah gunung berapi aktif di Jawa Timur, Indonesia. Gunung ini memiliki ketinggian 2.329 meter di atas perm', 'Probolinggo, Pasuruan'),
(17, 'DGN007', 'Butak', 2868, 5, '', 'Gunung Butak adalah gunung stratovolcano yang terletak di Kabupaten Malang, Jawa Timur, Indonesia. Gunung Butak terletak berdekatan dengan Gunung Kawi. Tidak diketemukan catatan sejarah atas erupsi dari Gunung Butak sampai saat ini.[1] Gunung ini berada p', 'Malang'),
(18, 'DGN008', 'Ciremai', 3078, 5, '', 'Gunung Ceremai (sering kali secara salah kaprah dinamakan &quot;Ciremai&quot;) (Aksara Sunda Baku: ᮌᮥᮔᮥᮀ ᮎᮨᮛᮨᮙᮦ, Latin: Gunung Ceremé) adalah gunung berapi kerucut yang secara administratif termasuk dalam wilayah dua kabupaten, yakni Kabupaten Kuningan da', 'Majalengka, Kuningan'),
(19, 'DGN009', 'Gede', 2958, 5, '', 'Gunung Gede (Aksara Sunda Baku: ᮌᮥᮔᮥᮀ ᮌᮨᮓᮦ, Gunung Gedé) merupakan sebuah gunung api bertipe stratovolcano yang berada di Pulau Jawa, Indonesia. Gunung Gede berada dalam ruang lingkup Taman Nasional Gede Pangrango, yang merupakan salah satu dari lima tama', 'Cianjur, Sukabumi'),
(20, 'DGN010', 'Pangrango', 3019, 5, '', 'Gunung Pangrango (Aksara Sunda Baku: ᮌᮥᮔᮥᮀ ᮕᮍᮢᮍᮧ) merupakan sebuah gunung yang terdapat di pulau Jawa, Indonesia. Gunung Pangrango mempunyai ketinggian setinggi 3.019 meter dari permukaan laut. Puncaknya dinamakan Puncak Mandalawangi. Puncak Mandalawangi ', 'Cianjur, Sukabumi');

-- --------------------------------------------------------

--
-- Table structure for table `jalurpendakian`
--

CREATE TABLE `jalurpendakian` (
  `id_jalur` int(11) NOT NULL,
  `nama_jalur` varchar(128) NOT NULL,
  `jumlah_pos` int(10) NOT NULL,
  `jarak_jalur` int(10) NOT NULL,
  `foto_jalur` varchar(255) NOT NULL,
  `gambar_basecamp` varchar(255) NOT NULL,
  `kode_gunung` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jalurpendakian`
--

INSERT INTO `jalurpendakian` (`id_jalur`, `nama_jalur`, `jumlah_pos`, `jarak_jalur`, `foto_jalur`, `gambar_basecamp`, `kode_gunung`) VALUES
(14, 'Sawit', 2, 4, '39b11880d363b7dbe012854f8f23e8a4.jpg', '211c5581f1b317b81291b7293e2c9223.jpg', 'DGN001'),
(15, 'carang wulung', 3, 4, 'jalur_anjasmoro.jpg', 'basecamp_anjasmoro1.jpg', 'DGN002'),
(16, 'Bremi', 3, 40, '068416c1d5f142a5d3c7937e0fd7c9a5.jpg', 'ba99702e712e266be3b247af79476dbb.JPG', 'DGN003'),
(17, 'Tretes', 3, 16, '7d87186f88d3b6dceb9be58d3df17584.JPG', '96e7ebe0e4192af785c2a7375f77b95d.jpg', 'DGN004'),
(18, 'Gunung Batok di TNBTS', 0, 1, '5c9af9d94f50084c9ddd5a88a623aa12.jpg', 'd8864f8908d1542f3bc97e5293204758.jpg', 'DGN005'),
(19, 'Bromo', 0, 3, '63c76bafc28f861bc2f1798bbfb2a202.jpg', '67d8d1ec2aabf0f2f4c7a6fc4c86b412.jpg', 'DGN006'),
(20, 'Panderman', 5, 5, '432b0b1f5aa4d86353ad4d9d854d703f.jpg', '1919e81dd78b3c1563bbefe60d1c7f44.jpg', 'DGN007'),
(21, 'Linggar jati', 6, 5, 'ac426c6a5bc5ba05f3be493791fe84f9.jpg', 'gambar_basecamp.jpeg', 'DGN008'),
(22, 'putri', 6, 6, '7a692195c92365dc874d7057f27a6456.jpg', 'e89b819c6e49aa27768a9e36588b0a38.JPG', 'DGN009'),
(23, 'cibodas', 12, 15, '960a2b30951aba196d97ee11ed34bf07.jpg', '8a20f523d32b83135c777b3167db2c08.JPG', 'DGN010');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_gunung`
--

CREATE TABLE `kategori_gunung` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `paket_pendakian`
--

CREATE TABLE `paket_pendakian` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `kodepaket` varchar(255) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_berakhir` date NOT NULL,
  `titik_kumpul` varchar(255) NOT NULL,
  `kouta_paket` int(50) NOT NULL,
  `perlengkapan_pribadi` varchar(255) NOT NULL,
  `harga_paket` int(10) NOT NULL,
  `no_rekening_admin` int(10) NOT NULL,
  `kode_gunung` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket_pendakian`
--

INSERT INTO `paket_pendakian` (`id`, `email`, `kodepaket`, `tanggal_mulai`, `tanggal_berakhir`, `titik_kumpul`, `kouta_paket`, `perlengkapan_pribadi`, `harga_paket`, `no_rekening_admin`, `kode_gunung`) VALUES
(2, 'ahmadhamdi@gmail.com', 'PKT001', '2020-08-13', '2020-08-15', 'pasar cibodas parkiran bus basecamp ibu icuk', 19, 'carier, sleeping bag, makan ringan untuk 2 hari, trashbag, pakean ganti layak pakai, sepatu gunu(recomended), alat makan( sendok, piring platik dll)', 350000, 456371723, 'DGN004'),
(4, 'ahmadhamdi@gmail.com', 'PKT003', '2020-08-20', '2020-08-21', 'magelang', 15, 'sepatu gunung', 300000, 33241234, 'DGN002'),
(5, 'ahmadhamdi@gmail.com', 'PKT004', '2020-08-18', '2020-08-19', 'magelang', 19, 'carier makanan ringan', 100000, 3223123, 'DGN001'),
(6, 'ahmadhamdi@gmail.com', 'PKT005', '2020-08-22', '2020-08-23', 'basecamp arjuno treres', 13, 'caier spatu gunung sleeping bag, alat makan, makanan ringan untuk diperjalanan', 300000, 2344352, 'DGN004'),
(7, 'ahmadhamdi@gmail.com', 'PKT006', '2020-08-30', '2020-08-31', 'basecamp andong peak', 12, 'alatmakan pribadi, carier 20-60 ltr, spatugunung, sleepingbag', 100000, 1243243, 'DGN002'),
(8, 'ahmadhamdi@gmail.com', 'PKT007', '2020-08-16', '2020-08-17', 'magelang', 17, 'carier', 345000, 2341234, 'DGN003'),
(9, 'ArynGrande199802@gmail.com', 'PKT008', '2020-08-18', '2020-08-20', 'Basecamp argopuro', 19, 'fullpack', 30000, 123456, 'DGN003');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `kode_pembayaran` varchar(225) NOT NULL,
  `nama_pengirim` varchar(128) NOT NULL,
  `bank` varchar(128) NOT NULL,
  `no_rek_pengirim` int(20) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `jumlah_nominal` int(10) NOT NULL,
  `gambar_bukti_pembayaran` varchar(255) NOT NULL,
  `status_pembayaran` varchar(128) NOT NULL,
  `kode_pemesanan` varchar(255) NOT NULL,
  `email` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `kode_pembayaran`, `nama_pengirim`, `bank`, `no_rek_pengirim`, `tanggal_pembayaran`, `jumlah_nominal`, `gambar_bukti_pembayaran`, `status_pembayaran`, `kode_pemesanan`, `email`) VALUES
(3, 'PBN002', 'rezan alfalahu', 'BCA', 123, '2020-08-10', 345000, '7169d8fc6265420dac2be78553f608aa.JPG', '1', 'KDP015', 'ahmadhamdi@gmail.com'),
(4, 'PBN003', 'rezan alfalahu', 'BCA', 44235235, '2020-08-11', 300000, 'dcfa9bcc9b5883d68c918427340c0e24.jpg', '1', 'KDP017', 'ahmadhamdi@gmail.com'),
(5, 'PBN004', 'rezan alfalahu', 'BCA', 123, '2020-08-11', 100000, 'bbd265be327bd8358df84f271a331f43.jpg', '1', 'KDP018', 'ahmadhamdi@gmail.com'),
(6, 'PBN005', 'Calon Pendaki ', 'BCA', 123456, '2020-08-11', 100000, '0318fc48de04e58a94debd14f3763e03.jpg', '1', 'KDP019', 'redeyes199802@gmail.com'),
(7, 'PBN006', 'rezan alfalahu', 'BCA', 123, '2020-08-11', 300000, 'b49c3779aae4736a83db16ccb34f879d.jpg', '1', 'KDP016', 'ahmadhamdi@gmail.com'),
(8, 'PBN007', 'Calon Pendaki ', 'BCA', 123, '2020-08-11', 300000, '35d09e90ff2657c260a00ad73c6fc806.JPG', '1', 'KDP020', 'redeyes199802@gmail.com'),
(9, 'PBN008', 'Calon Pendaki ', 'BCA', 123, '2020-08-11', 30000, 'c8ba98d6d9e5739cf24caab3fe0053c3.jpg', '1', 'KDP021', 'redeyes199802@gmail.com'),
(10, 'PBN009', 'rezan alfalahu', 'BCA', 123, '2020-08-12', 100000, 'acde6c195c367f757fa6cb1c6542aa06.jpg', '0', 'KDP023', 'ahmadhamdi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `kode_pemesanan` varchar(255) NOT NULL,
  `email` varchar(128) NOT NULL,
  `kode_paket` varchar(255) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `nama_gunung` varchar(123) NOT NULL,
  `harga_paket` varchar(128) NOT NULL,
  `foto_pemesanan` varchar(255) NOT NULL,
  `kouta_paket` int(20) NOT NULL,
  `sts_kirimPembayaran` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `kode_pemesanan`, `email`, `kode_paket`, `tanggal_pemesanan`, `nama_gunung`, `harga_paket`, `foto_pemesanan`, `kouta_paket`, `sts_kirimPembayaran`) VALUES
(5, 'KDP005', 'redeyes199802@gmail.com', 'PKT004', '2020-08-09', 'Andong', '100000', '8be287774ceb37441cdadd917ec768ef.jpg', 0, ''),
(10, 'KDP009', 'ahmadhamdi@gmail.com', 'PKT001', '2020-08-10', 'Arjuno', '350000', '21d0135aff8c937fc4ee67126ec7faf2.jpg', 1, ''),
(11, 'KDP010', 'ahmadhamdi@gmail.com', 'PKT004', '2020-08-10', 'Andong', '100000', '8be287774ceb37441cdadd917ec768ef.jpg', 1, 'terkirim'),
(13, 'KDP012', 'ahmadhamdi@gmail.com', 'PKT005', '2020-08-10', 'Arjuno', '300000', '21d0135aff8c937fc4ee67126ec7faf2.jpg', 1, ''),
(14, 'KDP013', 'ahmadhamdi@gmail.com', 'PKT007', '2020-08-10', 'Argopuro', '345000', '720x9603.jpg', 1, ''),
(16, 'KDP015', 'redeyes199802@gmail.com', 'PKT007', '2020-08-10', 'Argopuro', '345000', '720x9603.jpg', 1, 'terverifikasi'),
(20, 'KDP016', 'ahmadhamdi@gmail.com', 'PKT005', '2020-08-11', 'Arjuno', '300000', '21d0135aff8c937fc4ee67126ec7faf2.jpg', 1, 'terverifikasi'),
(21, 'KDP017', 'ahmadhamdi@gmail.com', 'PKT005', '2020-08-11', 'Arjuno', '300000', '21d0135aff8c937fc4ee67126ec7faf2.jpg', 1, 'terverifikasi'),
(22, 'KDP018', 'redeyes199802@gmail.com', 'PKT006', '2020-08-11', 'anjasmoro', '100000', '72e3a5f74aa6fead0c5029d5e4fa54ab.jpg', 1, 'terverifikasi'),
(23, 'KDP019', 'redeyes199802@gmail.com', 'PKT006', '2020-08-11', 'anjasmoro', '100000', '72e3a5f74aa6fead0c5029d5e4fa54ab.jpg', 1, 'terverifikasi'),
(24, 'KDP020', 'redeyes199802@gmail.com', 'PKT005', '2020-08-11', 'Arjuno', '300000', '21d0135aff8c937fc4ee67126ec7faf2.jpg', 1, 'terverifikasi'),
(25, 'KDP020', 'ahmadhamdi@gmail.com', 'PKT005', '2020-08-11', 'Arjuno', '300000', '21d0135aff8c937fc4ee67126ec7faf2.jpg', 1, 'terverifikasi'),
(26, 'KDP021', 'redeyes199802@gmail.com', 'PKT008', '2020-08-11', 'Argopuro', '30000', '720x9603.jpg', 1, 'terverifikasi'),
(27, 'KDP022', 'CalonPendakirizanalfalah@gmail.com', 'PKT005', '2020-08-11', 'Arjuno', '300000', '21d0135aff8c937fc4ee67126ec7faf2.jpg', 1, 'belum'),
(28, 'KDP023', 'ahmadhamdi@gmail.com', 'PKT004', '2020-08-12', 'Andong', '100000', '8be287774ceb37441cdadd917ec768ef.jpg', 1, 'terkirim'),
(29, 'KDP024', 'ahmadhamdi@gmail.com', 'PKT005', '2020-08-12', 'Arjuno', '300000', '21d0135aff8c937fc4ee67126ec7faf2.jpg', 1, 'belum');

--
-- Triggers `pemesanan`
--
DELIMITER $$
CREATE TRIGGER `tambah_pemesanan` AFTER INSERT ON `pemesanan` FOR EACH ROW begin
	update paket_pendakian set kouta_paket = kouta_paket - new.kouta_paket where kodepaket = new.kode_paket;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level_akses` int(10) NOT NULL,
  `user_aktif` int(10) NOT NULL,
  `tanggal_registrasi` int(11) NOT NULL,
  `nama_depan` varchar(128) NOT NULL,
  `nama_belakang` varchar(128) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `foto_profil` varchar(255) NOT NULL,
  `foto_sampul` varchar(255) NOT NULL,
  `no_telepon` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `level_akses`, `user_aktif`, `tanggal_registrasi`, `nama_depan`, `nama_belakang`, `alamat`, `foto_profil`, `foto_sampul`, `no_telepon`) VALUES
(10, 'CalonPendakiredeyes199802@gmail.com', '$2y$10$MKk8UZ9MNyASR7ULXuABSO9rjV99SPWwENJhX2GlVWy3EtU/NzQ5a', 3, 1, 0, 'Calon Pendaki', '', '', 'default.jpg', 'default.jpg', 0),
(14, 'ArynGrande199802@gmail.com', '$2y$10$tDPkOZh0R1zoHImEXm1qwevvOaB/hD00eyO4FhyheZyW/gvQZvojW', 2, 0, 0, 'Guide', 'alfalah', '', 'default.png', 'default.jpg', 0),
(15, 'ahmadhamdi@gmail.com', '$2y$10$ixFSqTsInSIG/2BhMoBVcunJ7EGS4L9i9U7d9Yrx0Wu5nKWUIHZi2', 1, 1, 1596532379, 'rezan', 'alfalahu', 'Ciloto', 'default.jpg', 'default.jpg', 0),
(24, 'AgungADG@gmail.com', '$2y$10$vRcbYwWiP/At7FVmleD0.Of76slXRx6kzzv2aWTsAheihCTQ81WPa', 3, 1, 1596966007, 'Agung', '', '', 'default.jpg', 'default.jpg', 0),
(25, 'rizanalfalah@gmail.com', '$2y$10$L8UiEiXTvwGLr0cKAmKBzuLjuV/6Wy76f0Z2k3.eorh3XtW630q0G', 1, 1, 1596966118, 'Rijan', 'Alfalah', '', 'default.jpg', 'default.jpg', 0),
(26, 'roswitatita8@gmail.com', '$2y$10$QbU4B9esRh4WdtrOBh3dqeNnrGOqY.9PIV56SDSSpX4dr2AnRcIzG', 3, 1, 1597134377, 'Tita', 'Roswita', '', 'default.jpg', 'default.jpg', 1),
(27, 'Guideroswitatita8@gmail.com', '$2y$10$tv2EKzos475MkFvkbA6lPO9ofoQcYSnQ1NgDHfT6EVmvZYgjGHo9S', 2, 1, 0, 'Tita', '', '', 'default.jpg', 'default.jpg', 0),
(28, 'salmaahmr@gmail.com', '$2y$10$Lp.0UiQZX00IRvUb3gFZ3uddg4aGFF6PYI9arzZFm70OTRibO/iKC', 3, 1, 1597135187, 'Salma', '', '', 'default.jpg', 'default.jpg', 0),
(29, 'Guidesalmaahmr@gmail.com', '$2y$10$ZZvUJifbpsMuV0koqSN4t.Y7rljr63tOpLvPt3tVDBnofjw.P.NmK', 2, 1, 0, 'Salma', '', '', 'default.jpg', 'default.jpg', 0),
(30, 'anitafauziah46@gmail.com', '$2y$10$lATSp/UvK56Mcig.1CUR2ecAZiYaWO05NfU8VSkIfuF5eD8lKCz.u', 3, 1, 1597135266, 'Anita Fauziah', '', '', 'default.jpg', 'default.jpg', 0),
(31, 'Guideanitafauziah46@gmail.com', '$2y$10$0ZrNY1ZvHMjomOIHihcyguqGTrVX/0nwOSYP4V3iQSZ.pEgoXJ9r2', 2, 1, 0, 'Anita Fauziah', '', '', 'default.jpg', 'default.jpg', 0),
(32, 'krakeeno@gmail.com', '$2y$10$Dm259wwNP/tCM4rbM7FAzu30whX74G.DmBze2Nzx4CjKk16d1bV7O', 3, 1, 1597135337, 'Indratama', '', '', 'default.jpg', 'default.jpg', 0),
(33, 'Guidekrakeeno@gmail.com', '$2y$10$WjbC5IozjCHx6LE.N4y/VuaOA8xF3cN.CGD.2BIzBq1DweuwvmXD.', 2, 1, 0, 'Indratama', '', '', 'default.jpg', 'default.jpg', 0),
(34, 'abdurahmann.s97@gmail.com', '$2y$10$Bs1nJSMASoOTKoBa.Gx.I.IpzfEmbhQTqJQNpdXaMTeeVBB9rGb8q', 3, 1, 1597135445, 'Abdurahman Sidiq', '', '', 'default.jpg', 'default.jpg', 0),
(35, 'saahuri8@gmail.com', '$2y$10$UrUfPO4paoZsNaF3rb/KquC5FotA1FPe6YCBHZKX4awJATbiL8uSa', 3, 1, 1597135479, 'Anya ahuri', '', '', 'default.jpg', 'default.jpg', 0),
(36, 'Guidesaahuri8@gmail.com', '$2y$10$tvhyNSdCfaJh2bPaFtpnyeeH0.X9cORg..mE/dtBRN9ZdSZ9.ANye', 2, 1, 0, 'Anya ahuri', '', '', 'default.jpg', 'default.jpg', 0),
(37, 'vinkiarilesmana@gmail.com', '$2y$10$yQh5k.Fo5CJY5y7RyRSziOexiprA8E2P51NB76uitwYTTAIMXEM5y', 3, 1, 1597135600, 'Vinki Ari Lesmana', '', '', 'default.jpg', 'default.jpg', 0),
(38, 'Guidevinkiarilesmana@gmail.com', '$2y$10$c47ltO3qLL71S0jqUF90ae3AxYRlxzsV8p/HWuqjPC4YOkN6ZwcO.', 2, 1, 0, 'Vinki Ari Lesmana', '', '', 'default.jpg', 'default.jpg', 0),
(39, 'mrisqid@gmail.com', '$2y$10$IO8Vvm3VpUSMBMpnOaEvWO8gINlGjB9zJJGRRkuKdIbmdQ3JECCCy', 3, 1, 1597135685, 'Muhammad Risqi Darmawan', '', '', 'default.jpg', 'default.jpg', 0),
(40, 'Guidemrisqid@gmail.com', '$2y$10$T8gHIyOKYdhOnj9NeS.k/.NawY2hcPxief0y9.FMaAFnO54Z1O/su', 2, 1, 0, 'Muhammad Risqi Darmawan', '', '', 'default.jpg', 'default.jpg', 0),
(41, 'awanbabsky@gmail.com', '$2y$10$.dKxqeG6tGM8KXVrt4cMG.c3yD1RuJHbUvjkw1Azyd8vRO.2Gp7ka', 3, 1, 1597135794, 'Triawan', '', '', 'default.jpg', 'default.jpg', 0),
(42, 'Guideawanbabsky@gmail.com', '$2y$10$XLri.unz3PA3J61bRnaRgO9krJDT0CuNOASl/LoDBY7/ljxwb/WZG', 2, 1, 0, 'Triawan', '', '', 'default.jpg', 'default.jpg', 0),
(43, 'dindin.iskandar85@gmail.com', '$2y$10$HCKydCcGMFQBDf0uAN.yWO0.nwYMr3Toam.3KsglqfA0Y440gPfEi', 3, 1, 1597135857, 'H. Dindin Iskandar,S.Pd', '', '', 'default.jpg', 'default.jpg', 0),
(44, 'aditiathernawan@gmail.com', '$2y$10$Wn7cKhm/sEn4N5lUfEjxsuqrML6qYJUV8/CkSAFStYTBOGEg1LUvG', 3, 1, 1597135878, 'Aditia T Hernawan', '', '', 'default.jpg', 'default.jpg', 0),
(45, 'Guidedindin.iskandar85@gmail.com', '$2y$10$JSpDdJhNhwDWsAzh.b3EPeHbud0VAWJqze34ONiGxTd.GNssE3UpC', 2, 1, 0, 'H. Dindin Iskandar,S.Pd', '', '', 'default.jpg', 'default.jpg', 0),
(46, 'Guideaditiathernawan@gmail.com', '$2y$10$SQ7EIareKX0vU4wVMzoIUeiXhxU8D4KWWne0c55l3S4PrhOs/nkVy', 2, 1, 0, 'Aditia T Hernawan', '', '', 'default.jpg', 'default.jpg', 0),
(47, 'tari60266@gmail.com', '$2y$10$1c1zztQfC7dlknJsngUnHei2RiKlbjDk1pJYLUUQATCVSrmsos9M2', 3, 1, 1597136004, 'Tari nurlestari', '', '', 'default.jpg', 'default.jpg', 0),
(49, 'namagigih@gmail.com', '$2y$10$GB.XYEgq6j/a2gtdnEMZuuISTmRpqhYUQg37ZOrdom4DJBKko/hq6', 3, 1, 1597136058, 'Gigih Ridho', '', '', 'default.jpg', 'default.jpg', 0),
(50, 'Guidenamagigih@gmail.com', '$2y$10$4tBNu2iz30jXj.6sp2QFPusr9iEdDNwiL42u4YzURoP9jPCN8Etxm', 2, 1, 0, 'Gigih Ridho', '', '', 'default.jpg', 'default.jpg', 0),
(51, 'asepriki2013@gmail.com', '$2y$10$977ryM707gPy215b9BdpXu/ujzqMAUMMcgQ26kpSjPOpnh/fRV0Ya', 3, 1, 1597136139, 'Asep Riki', '', '', 'default.jpg', 'default.jpg', 0),
(52, 'Guideasepriki2013@gmail.com', '$2y$10$B6.wsxGlYbZjhnPZyjdo5eN1Yb4CcaDs2sS9zaGe7j0raB9UxaY7W', 2, 1, 0, 'Asep Riki', '', '', 'default.jpg', 'default.jpg', 0),
(53, 'silmakaffah.sk@gmail.com', '$2y$10$b631eXm8t7b6hcDHm36dSOagzOltaGBVhl8bRtw3XOjIlvXASKRBy', 3, 1, 1597136206, 'Silma kaffah', '', '', 'default.jpg', 'default.jpg', 0),
(54, 'Guidesilmakaffah.sk@gmail.com', '$2y$10$iBp/pmvmhr8UZaS8eu7MkOlqLWam0iHbg.PkAucYOfNWF8nsB2mMK', 2, 1, 0, 'Silma kaffah', '', '', 'default.jpg', 'default.jpg', 0),
(55, 'ulfahnurf@rocketmail.com', '$2y$10$RcAb4ovfmcho4OGNVmZK9e7Cr/3zP5u25qY0YoCrP7xwf9VkUQesi', 3, 1, 1597136267, 'Ulfah Nur Fadilah', '', '', 'default.jpg', 'default.jpg', 0),
(56, 'Guideulfahnurf@rocketmail.com', '$2y$10$H1XKn1cSDeW1Di4th.AK9eOzxhxfQWoxY5sYLyrd2o4I8VQhmtoNi', 2, 1, 0, 'Ulfah Nur Fadilah', '', '', 'default.jpg', 'default.jpg', 0),
(57, 'Guidekikilaumudin@aol.com', '$2y$10$S76UqAGKeJVY12Gq0EzbvuuKrBhPUrc32N8gqPVMAlhN8guQ..0Py', 2, 1, 1597136645, 'Kiki Laumudin', '', '', 'default.jpg', 'default.jpg', 0),
(58, 'Guideabdurahmann.s97@gmail.com', '$2y$10$zPtO8fXTRI/zlzm93JsemOqUiUhbSNUeTSHIUrEDcTcZJSCjfUPNa', 2, 1, 1597136756, 'Abdurahman Sidiq', '', '', 'default.jpg', 'default.jpg', 0),
(61, 'redeyes199802@gmail.com', '$2y$10$sqdLNGJnSTkZgABT4o0/WO4VmSKJRBOAcfguOIOQjN/M9FbSLZUHy', 1, 1, 1597192798, 'rizan', 'alfalah', '', 'default.jpg', 'default.jpg', 0),
(64, 'Guide_rizanalfalah@gmail.com', '$2y$10$bYJDkYka1nHOy9U3mRv9I.x/.E7RQ0vO6asQgGiRfDIcip82a.20a', 2, 1, 1597222014, 'rizan', '', '', 'default.jpg', 'default.jpg', 0),
(65, 'CalonPendaki_rizanalfalah@gmail.com', '$2y$10$Mnh0pMXZJjTWUCMdjfuGzuXv3b4iYDLRXNkdjVLCIhsdhmvDnkKrK', 3, 1, 1597297330, 'rizan', '', '', 'default.jpg', 'default.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `userakses`
--

CREATE TABLE `userakses` (
  `id` int(11) NOT NULL,
  `user_akses` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `usermenu`
--

CREATE TABLE `usermenu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usermenu`
--

INSERT INTO `usermenu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'Guide'),
(3, 'Calon Pendaki');

-- --------------------------------------------------------

--
-- Table structure for table `usersubmenu`
--

CREATE TABLE `usersubmenu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usersubmenu`
--

INSERT INTO `usersubmenu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Admin Dashboard', 'user/dashboardAdmin', 'nc-layout-11', 1),
(2, 1, 'Kelola Data Calon Pendaki', 'KelolaCalonPendaki', 'nc-single-02', 1),
(3, 1, 'Kelola Data Guide', 'KelolaGuide', 'nc-badge', 1),
(4, 1, 'Kelola Data Gunung', 'Gunung', 'nc-world-2', 1),
(5, 1, 'Kelola Pembayaran Paket Pendakian', 'Pembayaran/lihatStatusPembayaran', 'nc-money-coins', 1),
(6, 2, 'Kelola Paket Pendakian', 'PaketPendakian', 'nc-calendar-60', 1),
(7, 2, 'Lihat Status Pembayaran', 'Pembayaran/lihatStatusPembayaranGuide', 'nc-tile-56', 1),
(8, 3, 'Profil Saya', 'User', 'nc-circle-10', 1),
(9, 3, 'Keranjang', 'Pembayaran', 'nc-cart-simple', 1),
(10, 3, 'Paket Saya', 'Pemesanan', 'nc-bag-16', 1),
(11, 1, 'Data Feedback', 'Feedback/lihatDataFeedback', 'nc-paper', 1),
(12, 1, 'Kelola Jalur Pendakian', 'gunung/kelolajalurpendakian', 'nc-compass-05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `usertoken`
--

CREATE TABLE `usertoken` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(255) NOT NULL,
  `tanggal_token` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_akses_menu`
--

CREATE TABLE `user_akses_menu` (
  `id` int(11) NOT NULL,
  `userakses` int(11) NOT NULL,
  `menuakses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_akses_menu`
--

INSERT INTO `user_akses_menu` (`id`, `userakses`, `menuakses`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 2),
(5, 2, 3),
(6, 3, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallerygunung`
--
ALTER TABLE `gallerygunung`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `gunung`
--
ALTER TABLE `gunung`
  ADD PRIMARY KEY (`id_gunung`),
  ADD UNIQUE KEY `kode_gunung` (`kode_gunung`);

--
-- Indexes for table `jalurpendakian`
--
ALTER TABLE `jalurpendakian`
  ADD PRIMARY KEY (`id_jalur`);

--
-- Indexes for table `kategori_gunung`
--
ALTER TABLE `kategori_gunung`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `paket_pendakian`
--
ALTER TABLE `paket_pendakian`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kodepaket` (`kodepaket`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `userakses`
--
ALTER TABLE `userakses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usermenu`
--
ALTER TABLE `usermenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usersubmenu`
--
ALTER TABLE `usersubmenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertoken`
--
ALTER TABLE `usertoken`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_akses_menu`
--
ALTER TABLE `user_akses_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gallerygunung`
--
ALTER TABLE `gallerygunung`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `gunung`
--
ALTER TABLE `gunung`
  MODIFY `id_gunung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `jalurpendakian`
--
ALTER TABLE `jalurpendakian`
  MODIFY `id_jalur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `kategori_gunung`
--
ALTER TABLE `kategori_gunung`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paket_pendakian`
--
ALTER TABLE `paket_pendakian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `userakses`
--
ALTER TABLE `userakses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usermenu`
--
ALTER TABLE `usermenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usersubmenu`
--
ALTER TABLE `usersubmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `usertoken`
--
ALTER TABLE `usertoken`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_akses_menu`
--
ALTER TABLE `user_akses_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
