-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2023 at 05:58 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_pancing`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `username`, `email`, `password`) VALUES
(1, 'user', 'user@gmail.com', '$2y$10$iO.aACeOtnlcvz8iaESUh.G1sRPL1c31olHeyRRfQUqnEkRye1ttW'),
(2, 'revi', 'revi@gmail.com', '$2y$10$R2685pJkeb8UY8kyTNOrmuTkUUvGm.a4LDm5k3dUC/TqyZmpEQa5G'),
(3, 'ramsal', 'ramsalkodok@gmail.com', '$2y$10$F5sgzjggq/sZpGOb2KRgCOZgmIV/7kRYEl3da/bgK744yRBOGB.hC');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `tanggal_pesanan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_produk`, `id_akun`, `quantity`, `tanggal_pesanan`) VALUES
(32, 8, 1, 1, '2023-11-17'),
(33, 9, 1, 1, '2023-11-17'),
(34, 8, 1, 1, '2023-11-17'),
(35, 8, 1, 1, '2023-11-17'),
(36, 8, 1, 1, '2023-11-17'),
(37, 8, 1, 1, '2023-11-17'),
(38, 15, 2, 1, '2023-11-17'),
(39, 9, 2, 1, '2023-11-17'),
(40, 8, 2, 1, '2023-11-18'),
(41, 9, 2, 1, '2023-11-18');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_keranjang` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `jumlah` int(15) NOT NULL,
  `total` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `type_barang` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `desk` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_barang`, `type_barang`, `stok`, `harga`, `desk`, `gambar`) VALUES
(7, 'Joran Shimano Grappler Type LJ B63-2 Model 2019', 'spining rod', 200, 365000, 'Joran Kualitas Bagus', 'Joran Shimano Grappler Type LJ B63-2 Model 2019.joran shimano grappler type lj b63-2 model 2019.jpg'),
(8, 'Joran Shimano Holiday pack 20-270', 'spining rod', 140, 250000, 'Joran kualitas Bagus', 'Joran Shimano Holiday pack 20-270.joran shimano holiday pack 20-270.jpg'),
(9, 'Joran Shimano Speed Master R S631 PE 1.5', 'spining rod', 140, 420000, 'Joran kualitas terbaik', 'Joran Shimano Speed Master R S631 PE 1.5.joran shimano speed master r s631 pe 1.5.jpg'),
(10, 'Joran Spinning Pioneer Amethyst 502 150cm Ring Full Fuji', 'spining rod', 140, 370000, 'Joran kualitas bagus', 'Joran Spinning Pioneer Amethyst 502 150cm Ring Full Fuji.joran spinning pioneer amethyst 502 150cm ring full fuji.jpg'),
(11, 'Joran KastKing Blackhawk II', 'spining rod', 70, 780000, 'Joran kualitas super', 'Joran KastKing Blackhawk II.kastking blackhawk ii.jpg'),
(12, 'PLUSINNO Fishing Rod and Reel Combos', 'spining rod', 50, 1050000, 'Joran dan reel dengan kualitas super', 'PLUSINNO Fishing Rod and Reel Combos.plusinno fishing rod and reel combos.jpg'),
(13, 'DAIDO DAIMOS ULTRA SW 6000', 'casting rod', 150, 450000, 'Reel kualitas super', 'DAIDO DAIMOS ULTRA SW 6000.daido daimos ultra sw 6000.webp'),
(14, 'ABU GARCIA PRO MAX 3-L', 'casting rod', 130, 300000, 'Reel kualitas bagus', 'ABU GARCIA PRO MAX 3-L.rell abu garcia pro max 3-l.jpg'),
(15, 'ANYFISH VANGUARD 3000 power hendel', 'casting rod', 120, 240000, 'Reel kualitas bagus', 'ANYFISH VANGUARD 3000 power hendel.rell anyfish vanguard 3000 power hendel.jpg'),
(16, 'KYOTO LEEDER 3000C POWER HENDEL', 'casting rod', 180, 200000, 'Reel kualitas bagus', 'KYOTO LEEDER 3000C POWER HENDEL.rell pancing kyoto leeder 3000c power hendel.jpg'),
(17, 'PENN BATTLE II 6000 METAL BODY', 'casting rod', 100, 230000, 'Reel kualitas bagus', 'PENN BATTLE II 6000 METAL BODY.rell penn battle ii 6000 metal body.jpg'),
(18, 'RYOBI ZEUS HP 6000 POWER HENDEL', 'casting rod', 50, 560000, 'Joran kualitas super', 'RYOBI ZEUS HP 6000 POWER HENDEL.rell ryobi zeus hp 6000 power hendel.jpg'),
(19, 'PE DAIWA J BRAID X8 PE 1', 'bottom fishing rod', 100, 80000, 'Senar kualitas bagus', 'PE DAIWA J BRAID X8 PE 1.senar pe daiwa j braid x8 pe 1.webp'),
(20, 'PE Shimano KAIRIKI X8 30lbs 150m', 'bottom fishing rod', 90, 95000, 'Senar kualitas bagus', 'PE Shimano KAIRIKI X8 30lbs 150m.senar pe shimano kairiki x8 30lbs 150m.jpg'),
(21, 'PE Shimano SEPHIA 0.4 150M', 'bottom fishing rod', 200, 65000, 'Senar kualitas bagus ', 'PE Shimano SEPHIA 0.4 150M.senar pe shimano sephia 0.4 150m.jpg'),
(22, 'MILANO ELITE THE BEST QUALITY', 'fly rod', 123, 9000, 'kail kualitas bagus', 'MILANO ELITE THE BEST QUALITY.kail milano elite the best quality.jpg'),
(23, 'PANCING INDIGO MARUSODE 1054 MATERIAL JEPANG SUPER TAJAM DAN KUAT', 'fly rod', 240, 45000, 'Kail kualitas super', 'PANCING INDIGO MARUSODE 1054 MATERIAL JEPANG SUPER TAJAM DAN KUAT.kail pancing indigo marusode 1054 material jepang super tajam dan kuat.jpg'),
(24, 'PREMIUM QUALITY HAMMER HEAD CHINU MERAH', 'fly rod', 120, 36000, 'Kail kualitas super', 'PREMIUM QUALITY HAMMER HEAD CHINU MERAH.kail premium quality hammer head chinu merah.jpg'),
(25, 'Umpan Pancing DJEMPOL KAKAP ORIGINAL', 'jigging rod', 80, 23000, 'Umpan pancing gacor', 'Umpan Pancing DJEMPOL KAKAP ORIGINAL.umpan pancing djempol kakap original.jpg'),
(26, 'Umpan Pancing ESSEN STELLA MURNI AROMA SOTO AYAM 30ML Super GACOR', 'jigging rod', 324, 34000, 'Essen super gacor', 'Umpan Pancing ESSEN STELLA MURNI AROMA SOTO AYAM 30ML Super GACOR.umpan pancing essen stella murni aroma soto ayam 30ml super gacor.jpg'),
(27, 'Aksesoris Pancing Kili Kili Catfish Three Way Swivel', 'spin-cast rod', 240, 8000, 'Kili kili untuk pancingan gacor', 'Aksesoris Pancing Kili Kili Catfish Three Way Swivel.aksesoris pancing kili kili catfish three way swivel.jpg'),
(28, 'Timah jantung J1-J9 Buat mancing di laut - J1', 'spin-cast rod', 214, 24000, 'Timah pemberat pancinga', 'Timah jantung J1-J9 Buat mancing di laut - J1.timah jantung j1-j9 buat mancing di laut - j1.jpg'),
(29, 'Pelampung Pancing BUSA BOLONG TENGAH Warna POKEMON Super Gacor', 'spin-cast rod', 432, 6000, 'Pelampung untuk memancing', 'Pelampung Pancing BUSA BOLONG TENGAH Warna POKEMON Super Gacor.pelampung pancing busa bolong tengah warna pokemon super gacor.png'),
(30, 'UMPAN PANCING METAL JIG DAIDO BENTUK IKAN LURE KILLER 14 - 40 GRAM - 14 Gram', 'jigging rod', 43, 27000, 'Umpan pancing metal gacor wak', 'UMPAN PANCING METAL JIG DAIDO BENTUK IKAN LURE KILLER 14 - 40 GRAM - 14 Gram.umpan pancing metal jig daido bentuk ikan lure killer 14 - 40 gram - 14 gram.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `fk_id_produk` (`id_produk`),
  ADD KEY `fk_id_akun` (`id_akun`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `fk_id_kj` (`id_keranjang`),
  ADD KEY `fk_id_akn` (`id_akun`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `fk_id_akun` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id_akun`),
  ADD CONSTRAINT `fk_id_produk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk_id_akn` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id_akun`),
  ADD CONSTRAINT `fk_id_kj` FOREIGN KEY (`id_keranjang`) REFERENCES `keranjang` (`id_keranjang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
