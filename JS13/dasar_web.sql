-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 18, 2024 at 11:00 PM
-- Server version: 10.4.26-MariaDB
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dasar_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_buku`
--

CREATE TABLE `m_buku` (
  `buku_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `buku_kode` varchar(10) NOT NULL,
  `buku_nama` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_buku`
--

INSERT INTO `m_buku` (`buku_id`, `kategori_id`, `buku_kode`, `buku_nama`, `jumlah`, `deskripsi`, `gambar`) VALUES
(1, 3, 'KHBK', '111 Kode HTML untuk Belajar Kilat', 2, 'Sinopsis:\r\nTeknik menguasai HTML secepat kilat untuk pemula yang ingin menjadi master HTML!\r\n\r\nUntuk menguasai pemrograman web, HTML adalah syarat mutlak yang harus dikuasai sebelum mempelajari bahasa pemrograman web lainnya. Untuk menguasai HTML bisa dikatakan gampang-gampang susah. \r\n\r\nSebenarnya mudah untuk mempelajari HTML, namun banyaknya buku referensi yang tidak ringkas dan terlalu panjang justru membuat yang ingin belajar merasa lelah dan tidak mampu menguasai HTML seutuhnya. \r\n\r\nDiperlukan panduan ringkas namun dapat mencakup semua pembahasan. Oleh karena itu, hadirlah buku ini yang memuat 111 kode HTML untuk belajar HTML secara kilat. Diharapkan setelah mahir menguasai HTML, pembaca dapat menguasai pemrograman web lainnya dengan mudah. \r\n\r\nPembahasan dalam buku mencakup: \r\n- Dasar-dasar HTML \r\n- HTML Styles \r\n- HTML Tabel \r\n- HTML Form \r\n- HTML Graphic \r\n- dan lain-lain.\r\n\r\nMengingat pembahasannya yang ringkas dan mudah, buku 111 Kode HTML untuk Belajar Kilat sangat direkomendasikan untuk semua kalangan, baik itu pemula, mahasiswa jurusan Teknik Informatika, karyawan, atau ibu rumah tangga yang mau jadi master HTML! Anda tidak hanya akan memiliki keahlian baru, tetapi juga sumber penghasilan tambahan sebagai programmer ke depannya.\r\n\r\nSegera dapatkan buku 111 Kode HTML untuk Belajar Kilat hanya di Gramedia terdekat di kota Anda atau pesan secara online di gramedia.com!\r\n\r\nInformasi Lainnya:\r\nTerbit: 8 April 2019\r\nPenerbit: Elex Media Komputindo\r\nFormat: soft-cover\r\nPenulis: Arista Prasetyo Adi\r\nISBN: 9786020496863\r\nJumlah halaman: 176\r\nHarga: Rp 56.800\r\nDimensi: 21 x 14 cm', 'https://cdn.gramedia.com/uploads/items/9786020496863_111_Kode_HTML.jpg'),
(2, 2, 'LB', 'Laut Bercerita', 3, 'Buku ini terdiri atas dua bagian. Bagian pertama mengambil sudut pandang seorang mahasiswa aktivis bernama Laut, menceritakan bagaimana Laut dan kawan-kawannya menyusun rencana, berpindah-pindah dalam pelarian, hingga tertangkap oleh pasukan rahasia. Sedangkan bagian kedua dikisahkan oleh Asmara, adik Laut. Bagian kedua mewakili perasaan keluarga korban penghilangan paksa, bagaimana pencarian mereka terhadap kerabat mereka yang tak pernah kembali.\r\n\r\nBuku ini ditulis sebagai bentuk tribute bagi para aktivis yang diculik, yang kembali, dan yang tak kembali dan keluarga yang terus menerus sampai sekarang mencari-cari jawaban. \r\n\r\nNovel ini merupakan perwujudan dalam bentuk fiksi bahwa kita sebagai bangsa Indonesia tidak boleh melupakan sejarah yang telah membentuk sekaligus menjadi tumpuan bangsa Ini. Novel ini juga mengajak pembaca menguak misteri-misteri bangsa ini yang mana tidak diajarkan di sekolah. Walaupun novel ini adalah fiksi, laut bercerita menunjukkan kepada pembaca bahwa negeri ini pernah memasuki masa pemerintahan yang kelam.\r\n\r\nSinopsis\r\n\r\nLaut Bercerita, novel terbaru Leila S. Chudori, bertutur tentang kisah keluarga yang kehilangan, sekumpulan sahabat yang merasakan kekosongan di dada, sekelompok orang yang gemar menyiksa dan lancar berkhianat, sejumlah keluarga yang mencari kejelasan makam anaknya, dan tentang cinta yang tak akan luntur.\r\n\r\nDetail \r\n\r\nFormat : Soft cover, E-Book \r\nJumlah halaman : 400 halaman \r\nTanggal terbit : 21 Desember 2017 \r\nPenerbit : Kepustakaan Populer Gramedia\r\nPenulis	: Leila S. Chudori\r\nISBN : 9786024246945\r\nBahasa : Indonesia\r\nBerat : 0.315 kg\r\nPanjang	: 20 cm\r\nLebar : 13.5 cm', 'https://cdn.gramedia.com/uploads/items/9786024246945_Laut-Bercerita.png');

-- --------------------------------------------------------

--
-- Table structure for table `m_kategori`
--

CREATE TABLE `m_kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_kode` varchar(20) NOT NULL,
  `kategori_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_kategori`
--

INSERT INTO `m_kategori` (`kategori_id`, `kategori_kode`, `kategori_nama`) VALUES
(1, 'FKS', 'Fiksi'),
(2, 'NVL', 'Novel'),
(3, 'ILM', 'Ilmiah'),
(4, 'MTR', 'Misteri'),
(5, 'SSL', 'Sosial');

-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

CREATE TABLE `m_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` enum('admin','user') DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_user`
--

INSERT INTO `m_user` (`user_id`, `username`, `nama`, `level`, `password`) VALUES
(1, 'admin', 'Administrator', 'admin', '$2y$10$t9Gz10izTPl7Xku6MyPdlOnkmgawj18Tt848AOzjvAo0.srumQ03W'),
(2, 'aira', 'Pengguna', 'user', '$2y$10$t9Gz10izTPl7Xku6MyPdlOnkmgawj18Tt848AOzjvAo0.srumQ03W');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_buku`
--
ALTER TABLE `m_buku`
  ADD PRIMARY KEY (`buku_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `m_kategori`
--
ALTER TABLE `m_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_buku`
--
ALTER TABLE `m_buku`
  MODIFY `buku_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `m_kategori`
--
ALTER TABLE `m_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `m_user`
--
ALTER TABLE `m_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `m_buku`
--
ALTER TABLE `m_buku`
  ADD CONSTRAINT `m_buku_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `m_kategori` (`kategori_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
