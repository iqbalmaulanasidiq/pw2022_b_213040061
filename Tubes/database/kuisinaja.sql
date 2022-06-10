-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2022 at 04:07 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuisinaja`
--

-- --------------------------------------------------------

--
-- Table structure for table `adm`
--

CREATE TABLE `adm` (
  `id` int(11) NOT NULL,
  `kd_admin` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adm`
--

INSERT INTO `adm` (`id`, `kd_admin`, `nama`, `pass`, `gambar`) VALUES
(4, 'admin', 'iqbal sidiq', 'admin', '62a32d41eae85kujang-wallpaper-23.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `id_jawaban` int(11) NOT NULL,
  `jawaban_soal` varchar(255) DEFAULT NULL,
  `nilai` varchar(255) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id_jawaban`, `jawaban_soal`, `nilai`, `id`, `id_kategori`) VALUES
(17, 'pancasila.pdf', '90', 53, 39);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori_ujian` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori_ujian`) VALUES
(39, 'Computer (IT)'),
(40, 'Matematika'),
(41, 'IPA'),
(42, 'Sejarah'),
(43, 'filsafat');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id` int(11) NOT NULL,
  `nama_peserta` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id`, `nama_peserta`, `username`, `email`, `pass`, `gambar`) VALUES
(51, 'Iqbal Maulana Sidiq', 'iqbal', 'iqbalsidiq523@gmail.com', 'iqbal', '62a32c00d4a16wayang-bima-free-vector.jpg'),
(53, 'Ardhia Nugraha', 'ardhi', 'ardhi@gmail.com', '123', '62a32d8e8276bmelanie-these-rz3eCYGgGSc-unsplash.jpg'),
(54, 'ruhayat', 'ayat', 'ayat@gmail', 'ayatdong', 'nophoto.png'),
(55, 'mamat', 'amat', 'amat@amat', 'amatinaja', 'nophoto.png'),
(56, 'suhayat', 'hayat', 'hayat@gmail.com', 'hatai', 'nophoto.png');

-- --------------------------------------------------------

--
-- Table structure for table `soalsoal`
--

CREATE TABLE `soalsoal` (
  `id_soal` int(11) NOT NULL,
  `pertanyaan` varchar(500) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `soalsoal`
--

INSERT INTO `soalsoal` (`id_soal`, `pertanyaan`, `id_kategori`) VALUES
(71, 'sebutkan pengertian dari computer', 39),
(72, 'apa itu internet?', 39),
(73, 'sebutkan dan jelaskan apa pengertian dari hardware, software dan brainware!', 39),
(74, 'kapan komputer di temukan?', 39),
(75, 'siapa penemu komputer?\r\n', 39),
(76, 'sebutkan apa saja yang termasuk hardware?', 39),
(77, 'sebutkan apa saja yang termasuk software?', 39),
(78, 'apa kepanjangan dari CPU, dan jelaskan apa fungsinya?\r\n', 39),
(79, 'Tuliskan rumus phythagoras!', 40),
(80, 'tuliskan rumus menghitung luas lingkaran!', 40),
(81, '2 x 2 + 4 - 2 x 12 x 0 =', 40),
(82, 'tuliskan rumus peluang', 40),
(83, 'suatu kolam berbentuk  persegi dengan sisi 100km, hitung keliling dan luasnya!', 40),
(84, 'Hewan yang mengalami metamorfosis sempurna adalah\r\n\r\n', 41),
(85, 'Indikator: Peserta didik mampu mengklasifikasikan keragaman pada sistem organisasi kehidupan dari sel, jaringan, organ, sistem organ dan organisme\r\nSusunan yang tepat pada sistem organisasi kehidupan dari yang sederhana menuju kompleks adalah', 41),
(86, 'Indikator: Peserta didik mampu mengidentifikasi ciri-ciri makhluk abiotik dan biotik yang ada di lingkungan sekitar\r\nBerikut ini merupakan komponen biotik di alam adalah', 41),
(87, 'Indikator: Peserta didik mampu menganalisis prosedur pengelolaan lingkungan untuk mengatasi pencemaran dan kerusakan lingkungan\r\nUpaya meminimalisasi sampah hasil limbah rumah tangga agar tidak mencemari perairan dapat dilakukan dengan cara mendaur ulang sampah-sampah di sekitar kita. Seperti dibuat menjadi kompos, kerajinan tangan, dan benda berguna lainnya. Upaya tersebut disebut dengan istilah….', 41),
(88, 'Tubuh manusia dibentuk oleh tulang-tulang yang tersusun secara teratur yang disebut rangka. Terdapat 4 fungsi utama sistem rangka bagi tubuh, yaitu :', 41),
(89, 'Pemerintah kolonial Belanda, mengumumkan pembuatan parlemen di Hindia Belanda melalui \r\n', 42),
(90, 'Salah satu tuntutan dalam Gerakan Reformasi 1998 adalah mendesak pemerintah agar melakukan penguatan terhadap konstitusi negara. Hal ini kemudian diwujudkan dengan', 42),
(91, '“Jepang melarang pemakaian bahasa Belanda dan bahasa Inggris serta memajukan bahasa Jepang dan pelarangan penggunaan buku-buku dari Barat”. Makna yang terkandung atas kebijakan Jepang tersebut adalah', 42),
(92, 'Salah satu konflik paling menakutkan pada masa Perang Dingin adalah ketika Amerika Serikat berkonflik dengan negara Kuba yang baru saja berhasil melakukan revolusi dan membuat kekuataan sosialis menjadi penguasa di negara tersebut lewat bantuan Uni Soviet. Hal tersebut mendorong Amerika Serikat melakukan aksi militer dengan menginvasi Teluk Babi agar', 42),
(93, 'Jelaskan arti pengetahuan mistik berdasarkan bahasa dan istilah!', 43),
(94, 'Jelaskan aliran-aliran (monoisme, dualisme, pluralisme, nihilisme, agnotisme) yang dapat ditimbulkan dari pengetahuan mistik!', 43),
(95, 'Jelaskan objek dalam pengetahuan mistik!', 43),
(96, 'Bagaimana cara pengetahuan mistik diperoleh!', 43),
(97, 'Jelaskan ukuran kebenaran dalam pengetahuan mistik!', 43),
(98, 'Jelaskan kegunaan pengetahuan mistik!', 43);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id_jawaban`),
  ADD KEY `id` (`id`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soalsoal`
--
ALTER TABLE `soalsoal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adm`
--
ALTER TABLE `adm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `soalsoal`
--
ALTER TABLE `soalsoal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD CONSTRAINT `jawaban_ibfk_1` FOREIGN KEY (`id`) REFERENCES `peserta` (`id`),
  ADD CONSTRAINT `jawaban_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON UPDATE CASCADE;

--
-- Constraints for table `soalsoal`
--
ALTER TABLE `soalsoal`
  ADD CONSTRAINT `soalsoal_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
