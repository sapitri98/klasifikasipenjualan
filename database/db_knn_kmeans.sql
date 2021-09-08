-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2021 at 04:26 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_knn_kmeans`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `user` varchar(16) NOT NULL,
  `pass` varchar(16) DEFAULT NULL,
  `level` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`user`, `pass`, `level`) VALUES
('admin', 'admin', 'admin'),
('pemilik', 'pemilik', 'pemilik');

-- --------------------------------------------------------

--
-- Table structure for table `tb_atribut`
--

CREATE TABLE `tb_atribut` (
  `id_atribut` varchar(16) NOT NULL,
  `nama_atribut` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_atribut`
--

INSERT INTO `tb_atribut` (`id_atribut`, `nama_atribut`, `keterangan`) VALUES
('A01', 'Jumlah', ''),
('A02', 'Volume', ''),
('A03', 'Harga', ''),
('A04', 'Jenis Barang', ''),
('A05', 'Label', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` varchar(45) NOT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `jenis_barang` varchar(55) DEFAULT NULL,
  `panjang` double DEFAULT NULL,
  `lebar` double DEFAULT NULL,
  `tinggi` double DEFAULT NULL,
  `volume` double DEFAULT NULL,
  `harga_meter` double DEFAULT NULL,
  `harga_barang` double DEFAULT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `jenis_barang`, `panjang`, `lebar`, `tinggi`, `volume`, `harga_meter`, `harga_barang`, `stok`) VALUES
('B00001', 'Merbau Oven 500 x 3 x 35', 'Papan', 500, 3, 35, 0.0525, 15000000, 787500, 300),
('B00002', 'Samarinda Oven 400 x 4 x 20', NULL, 400, 4, 20, 0.032, 10000000, 320000, 400),
('B00003', 'Merbau Oven 500 x 3 x 35', 'Papan', 500, 3, 35, 0.0525, 1365000, 71662.5, 100),
('B00004', 'Bangkirai 400 x 3 x 20', 'Papan', 400, 3, 20, 0.024, 444000, 10656, 200),
('B00005', 'Bangkirai 400 x 6 x 15', 'Balok', 400, 6, 15, 0.036, 630000, 22680, 100),
('B00006', 'Bangkirai 400 x 8 x 15', 'Balken', 400, 8, 15, 0.048, 864000, 41472, 100),
('B00007', 'Merbau Oven 500 x 3 x 35', 'Papan', 500, 3, 35, 0.0525, 630000, 33075, 100);

-- --------------------------------------------------------

--
-- Table structure for table `tb_dataset`
--

CREATE TABLE `tb_dataset` (
  `id_dataset` int(11) NOT NULL,
  `nomor` int(11) DEFAULT NULL,
  `ket_dataset` varchar(255) DEFAULT NULL,
  `id_atribut` varchar(16) DEFAULT NULL,
  `id_nilai` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dataset`
--

INSERT INTO `tb_dataset` (`id_dataset`, `nomor`, `ket_dataset`, `id_atribut`, `id_nilai`) VALUES
(1, 1, 'Merbau Oven 500 x 3 x 35', 'A01', 4),
(2, 1, 'Merbau Oven 500 x 3 x 35', 'A02', 0.21),
(3, 1, 'Merbau Oven 500 x 3 x 35', 'A03', 1365000),
(4, 1, 'Merbau Oven 500 x 3 x 35', 'A04', 3),
(5, 1, 'Merbau Oven 500 x 3 x 35', 'A05', 5),
(6, 2, 'Samarinda Oven 400 x 4 x 20', 'A01', 2),
(7, 2, 'Samarinda Oven 400 x 4 x 20', 'A02', 0.064),
(8, 2, 'Samarinda Oven 400 x 4 x 20', 'A03', 350400),
(9, 2, 'Samarinda Oven 400 x 4 x 20', 'A04', 3),
(10, 2, 'Samarinda Oven 400 x 4 x 20', 'A05', 7),
(11, 3, 'Samarinda Oven 400 x 4 x 30', 'A01', 3),
(12, 3, 'Samarinda Oven 400 x 4 x 30', 'A02', 0.144),
(13, 3, 'Samarinda Oven 400 x 4 x 30', 'A03', 540000),
(14, 3, 'Samarinda Oven 400 x 4 x 30', 'A04', 3),
(15, 3, 'Samarinda Oven 400 x 4 x 30', 'A05', 7),
(16, 4, 'Samarinda Oven 400 x 6 x 12', 'A01', 2),
(17, 4, 'Samarinda Oven 400 x 6 x 12', 'A02', 0.0576),
(18, 4, 'Samarinda Oven 400 x 6 x 12', 'A03', 300960),
(19, 4, 'Samarinda Oven 400 x 6 x 12', 'A04', 2),
(20, 4, 'Samarinda Oven 400 x 6 x 12', 'A05', 7),
(21, 5, 'Samarinda Oven 400 x 6 x 17', 'A01', 1),
(22, 5, 'Samarinda Oven 400 x 6 x 17', 'A02', 0.0408),
(23, 5, 'Samarinda Oven 400 x 6 x 17', 'A03', 442680),
(24, 5, 'Samarinda Oven 400 x 6 x 17', 'A04', 2),
(25, 5, 'Samarinda Oven 400 x 6 x 17', 'A05', 6),
(9346, 6, 'SO Merah 400 x 6 15', 'A01', 2),
(9347, 6, 'SO Merah 400 x 6 15', 'A02', 0.072),
(9348, 6, 'SO Merah 400 x 6 15', 'A03', 331200),
(9349, 6, 'SO Merah 400 x 6 15', 'A04', 2),
(9350, 6, 'SO Merah 400 x 6 15', 'A05', 5),
(9351, 7, 'Samarinda Oven 400 x 3 x 25', 'A01', 1),
(9352, 7, 'Samarinda Oven 400 x 3 x 25', 'A02', 0.03),
(9353, 7, 'Samarinda Oven 400 x 3 x 25', 'A03', 324000),
(9354, 7, 'Samarinda Oven 400 x 3 x 25', 'A04', 3),
(9355, 7, 'Samarinda Oven 400 x 3 x 25', 'A05', 7),
(9356, 8, 'Samarinda Oven 400 x 3 x 30', 'A01', 1),
(9357, 8, 'Samarinda Oven 400 x 3 x 30', 'A02', 0.036),
(9358, 8, 'Samarinda Oven 400 x 3 x 30', 'A03', 396000),
(9359, 8, 'Samarinda Oven 400 x 3 x 30', 'A04', 3),
(9360, 8, 'Samarinda Oven 400 x 3 x 30', 'A05', 7),
(9361, 9, 'Samarinda Oven 400 x 4 x 20', 'A01', 2),
(9362, 9, 'Samarinda Oven 400 x 4 x 20', 'A02', 0.064),
(9363, 9, 'Samarinda Oven 400 x 4 x 20', 'A03', 342400),
(9364, 9, 'Samarinda Oven 400 x 4 x 20', 'A04', 3),
(9365, 9, 'Samarinda Oven 400 x 4 x 20', 'A05', 7),
(9366, 10, 'Samarinda Oven 500 x 4 x 25', 'A01', 1),
(9367, 10, 'Samarinda Oven 500 x 4 x 25', 'A02', 0.05),
(9368, 10, 'Samarinda Oven 500 x 4 x 25', 'A03', 540000),
(9369, 10, 'Samarinda Oven 500 x 4 x 25', 'A04', 3),
(9370, 10, 'Samarinda Oven 500 x 4 x 25', 'A05', 7),
(9371, 11, 'Merbau Basah 230 x 6 x 15', 'A01', 2),
(9372, 11, 'Merbau Basah 230 x 6 x 15', 'A02', 0.0414),
(9373, 11, 'Merbau Basah 230 x 6 x 15', 'A03', 457470),
(9374, 11, 'Merbau Basah 230 x 6 x 15', 'A04', 2),
(9375, 11, 'Merbau Basah 230 x 6 x 15', 'A05', 6),
(9376, 12, 'Merbau Oven 400 x 6 x 12', 'A01', 6),
(9377, 12, 'Merbau Oven 400 x 6 x 12', 'A02', 0.1728),
(9378, 12, 'Merbau Oven 400 x 6 x 12', 'A03', 650880),
(9379, 12, 'Merbau Oven 400 x 6 x 12', 'A04', 2),
(9380, 12, 'Merbau Oven 400 x 6 x 12', 'A05', 6),
(9381, 13, 'SO Merah 400 x 6 x 15', 'A01', 4),
(9382, 13, 'SO Merah 400 x 6 x 15', 'A02', 0.144),
(9383, 13, 'SO Merah 400 x 6 x 15', 'A03', 331200),
(9384, 13, 'SO Merah 400 x 6 x 15', 'A04', 2),
(9385, 13, 'SO Merah 400 x 6 x 15', 'A05', 5),
(9386, 14, 'Samarinda Oven 400 x 3 x 30', 'A01', 1),
(9387, 14, 'Samarinda Oven 400 x 3 x 30', 'A02', 0.036),
(9388, 14, 'Samarinda Oven 400 x 3 x 30', 'A03', 396000),
(9389, 14, 'Samarinda Oven 400 x 3 x 30', 'A04', 3),
(9390, 14, 'Samarinda Oven 400 x 3 x 30', 'A05', 7),
(9391, 15, 'Samarinda Oven 400 x 4 x 20', 'A01', 1),
(9392, 15, 'Samarinda Oven 400 x 4 x 20', 'A02', 0.032),
(9393, 15, 'Samarinda Oven 400 x 4 x 20', 'A03', 342400),
(9394, 15, 'Samarinda Oven 400 x 4 x 20', 'A04', 3),
(9395, 15, 'Samarinda Oven 400 x 4 x 20', 'A05', 7),
(9396, 16, 'Samarinda Oven 400 x 4 x 25', 'A01', 1),
(9397, 16, 'Samarinda Oven 400 x 4 x 25', 'A02', 0.04),
(9398, 16, 'Samarinda Oven 400 x 4 x 25', 'A03', 432000),
(9399, 16, 'Samarinda Oven 400 x 4 x 25', 'A04', 3),
(9400, 16, 'Samarinda Oven 400 x 4 x 25', 'A05', 7),
(9401, 17, 'Merbau Oven 400 x 5 x 15', 'A01', 1),
(9402, 17, 'Merbau Oven 400 x 5 x 15', 'A02', 0.03),
(9403, 17, 'Merbau Oven 400 x 5 x 15', 'A03', 693000),
(9404, 17, 'Merbau Oven 400 x 5 x 15', 'A04', 2),
(9405, 17, 'Merbau Oven 400 x 5 x 15', 'A05', 5),
(9406, 18, 'Merbau Oven 500 x 5 x 15', 'A01', 2),
(9407, 18, 'Merbau Oven 500 x 5 x 15', 'A02', 0.075),
(9408, 18, 'Merbau Oven 500 x 5 x 15', 'A03', 885000),
(9409, 18, 'Merbau Oven 500 x 5 x 15', 'A04', 2),
(9410, 18, 'Merbau Oven 500 x 5 x 15', 'A05', 6),
(9411, 19, 'Merbau Oven 400 x 4 x 15', 'A01', 2),
(9412, 19, 'Merbau Oven 400 x 4 x 15', 'A02', 0.048),
(9413, 19, 'Merbau Oven 400 x 4 x 15', 'A03', 566400),
(9414, 19, 'Merbau Oven 400 x 4 x 15', 'A04', 3),
(9415, 19, 'Merbau Oven 400 x 4 x 15', 'A05', 5),
(9416, 20, 'Samarinda Oven 400 x 4 x 25', 'A01', 6),
(9417, 20, 'Samarinda Oven 400 x 4 x 25', 'A02', 0.24),
(9418, 20, 'Samarinda Oven 400 x 4 x 25', 'A03', 432000),
(9419, 20, 'Samarinda Oven 400 x 4 x 25', 'A04', 3),
(9420, 20, 'Samarinda Oven 400 x 4 x 25', 'A05', 7),
(9421, 21, 'Merbau Oven 400 x 4 x 12', 'A01', 1),
(9422, 21, 'Merbau Oven 400 x 4 x 12', 'A02', 0.0192),
(9423, 21, 'Merbau Oven 400 x 4 x 12', 'A03', 453120),
(9424, 21, 'Merbau Oven 400 x 4 x 12', 'A04', 3),
(9425, 21, 'Merbau Oven 400 x 4 x 12', 'A05', 5),
(9426, 22, 'Merbau Oven 400 x 8 x 15', 'A01', 1),
(9427, 22, 'Merbau Oven 400 x 8 x 15', 'A02', 0),
(9428, 22, 'Merbau Oven 400 x 8 x 15', 'A03', 1108800),
(9429, 22, 'Merbau Oven 400 x 8 x 15', 'A04', 1),
(9430, 22, 'Merbau Oven 400 x 8 x 15', 'A05', 5),
(9431, 23, 'Merbau Basah 260 x 6 x 15', 'A01', 6),
(9432, 23, 'Merbau Basah 260 x 6 x 15', 'A02', 0.1404),
(9433, 23, 'Merbau Basah 260 x 6 x 15', 'A03', 517140),
(9434, 23, 'Merbau Basah 260 x 6 x 15', 'A04', 2),
(9435, 23, 'Merbau Basah 260 x 6 x 15', 'A05', 6),
(9436, 24, 'Merbau Basah 500 x 8 x 15', 'A01', 5),
(9437, 24, 'Merbau Basah 500 x 8 x 15', 'A02', 0.3),
(9438, 24, 'Merbau Basah 500 x 8 x 15', 'A03', 1392000),
(9439, 24, 'Merbau Basah 500 x 8 x 15', 'A04', 1),
(9440, 24, 'Merbau Basah 500 x 8 x 15', 'A05', 5),
(9441, 25, 'Merbau Basah 90 x 6 x 15', 'A01', 3),
(9442, 25, 'Merbau Basah 90 x 6 x 15', 'A02', 0.0243),
(9443, 25, 'Merbau Basah 90 x 6 x 15', 'A03', 167670),
(9444, 25, 'Merbau Basah 90 x 6 x 15', 'A04', 2),
(9445, 25, 'Merbau Basah 90 x 6 x 15', 'A05', 6),
(9446, 26, 'Samarinda Oven 500 x 6 x 17', 'A01', 1),
(9447, 26, 'Samarinda Oven 500 x 6 x 17', 'A02', 0.051),
(9448, 26, 'Samarinda Oven 500 x 6 x 17', 'A03', 581400),
(9449, 26, 'Samarinda Oven 500 x 6 x 17', 'A04', 2),
(9450, 26, 'Samarinda Oven 500 x 6 x 17', 'A05', 6),
(9451, 27, 'Samarinda Oven 400 x 5 x 20', 'A01', 1),
(9452, 27, 'Samarinda Oven 400 x 5 x 20', 'A02', 0.04),
(9453, 27, 'Samarinda Oven 400 x 5 x 20', 'A03', 440000),
(9454, 27, 'Samarinda Oven 400 x 5 x 20', 'A04', 1),
(9455, 27, 'Samarinda Oven 400 x 5 x 20', 'A05', 5),
(9456, 28, 'Samarinda Oven 400 x 5 x 30', 'A01', 4),
(9457, 28, 'Samarinda Oven 400 x 5 x 30', 'A02', 0.24),
(9458, 28, 'Samarinda Oven 400 x 5 x 30', 'A03', 672000),
(9459, 28, 'Samarinda Oven 400 x 5 x 30', 'A04', 1),
(9460, 28, 'Samarinda Oven 400 x 5 x 30', 'A05', 5),
(9461, 29, 'Samarinda Oven 400 x 3 x 20', 'A01', 1),
(9462, 29, 'Samarinda Oven 400 x 3 x 20', 'A02', 0.024),
(9463, 29, 'Samarinda Oven 400 x 3 x 20', 'A03', 256800),
(9464, 29, 'Samarinda Oven 400 x 3 x 20', 'A04', 3),
(9465, 29, 'Samarinda Oven 400 x 3 x 20', 'A05', 5),
(9466, 30, 'Merbau Oven 250 x 4 x 25', 'A01', 2),
(9467, 30, 'Merbau Oven 250 x 4 x 25', 'A02', 0.05),
(9468, 30, 'Merbau Oven 250 x 4 x 25', 'A03', 615000),
(9469, 30, 'Merbau Oven 250 x 4 x 25', 'A04', 3),
(9470, 30, 'Merbau Oven 250 x 4 x 25', 'A05', 6),
(9471, 31, 'Merbau Oven 300 x 4 x 25', 'A01', 3),
(9472, 31, 'Merbau Oven 300 x 4 x 25', 'A02', 0.09),
(9473, 31, 'Merbau Oven 300 x 4 x 25', 'A03', 738000),
(9474, 31, 'Merbau Oven 300 x 4 x 25', 'A04', 3),
(9475, 31, 'Merbau Oven 300 x 4 x 25', 'A05', 5),
(9476, 32, 'Merbau Oven 500 x 3 x 35', 'A01', 2),
(9477, 32, 'Merbau Oven 500 x 3 x 35', 'A02', 0.105),
(9478, 32, 'Merbau Oven 500 x 3 x 35', 'A03', 1365000),
(9479, 32, 'Merbau Oven 500 x 3 x 35', 'A04', 3),
(9480, 32, 'Merbau Oven 500 x 3 x 35', 'A05', 5),
(9481, 33, 'Merbau Basah 220 x 6 x 15', 'A01', 3),
(9482, 33, 'Merbau Basah 220 x 6 x 15', 'A02', 0.0594),
(9483, 33, 'Merbau Basah 220 x 6 x 15', 'A03', 437580),
(9484, 33, 'Merbau Basah 220 x 6 x 15', 'A04', 2),
(9485, 33, 'Merbau Basah 220 x 6 x 15', 'A05', 5),
(9486, 34, 'Merbau Basah 270 x 6 x 15', 'A01', 1),
(9487, 34, 'Merbau Basah 270 x 6 x 15', 'A02', 0.0243),
(9488, 34, 'Merbau Basah 270 x 6 x 15', 'A03', 537030),
(9489, 34, 'Merbau Basah 270 x 6 x 15', 'A04', 2),
(9490, 34, 'Merbau Basah 270 x 6 x 15', 'A05', 5),
(9491, 35, 'Merbau Oven 500 x 5 x 20', 'A01', 10),
(9492, 35, 'Merbau Oven 500 x 5 x 20', 'A02', 0.5),
(9493, 35, 'Merbau Oven 500 x 5 x 20', 'A03', 1260000),
(9494, 35, 'Merbau Oven 500 x 5 x 20', 'A04', 1),
(9495, 35, 'Merbau Oven 500 x 5 x 20', 'A05', 5),
(9496, 36, 'Merbau Oven 500 x 5 x 25', 'A01', 4),
(9497, 36, 'Merbau Oven 500 x 5 x 25', 'A02', 0.25),
(9498, 36, 'Merbau Oven 500 x 5 x 25', 'A03', 1575000),
(9499, 36, 'Merbau Oven 500 x 5 x 25', 'A04', 1),
(9500, 36, 'Merbau Oven 500 x 5 x 25', 'A05', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_pembelian`
--

CREATE TABLE `tb_detail_pembelian` (
  `id_detail_pembelian` int(11) NOT NULL,
  `no_faktur_pembelian` varchar(45) DEFAULT NULL,
  `id_barang` varchar(45) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_pembelian`
--

INSERT INTO `tb_detail_pembelian` (`id_detail_pembelian`, `no_faktur_pembelian`, `id_barang`, `harga`, `jumlah`, `total`) VALUES
(16, 'INV-FPB-0001', 'B00001', 787500, 3, 2362500);

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_penjualan`
--

CREATE TABLE `tb_detail_penjualan` (
  `id_detail_penjualan` int(11) NOT NULL,
  `no_faktur_penjualan` varchar(45) DEFAULT NULL,
  `id_barang` varchar(45) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_penjualan`
--

INSERT INTO `tb_detail_penjualan` (`id_detail_penjualan`, `no_faktur_penjualan`, `id_barang`, `harga`, `jumlah`, `total`) VALUES
(5, 'INV-FPJ-0001', 'B00001', 787500, 4, 3150000),
(6, 'INV-FPJ-0002', 'B00001', 787500, 3, 2362500),
(7, 'INV-FPJ-0002', 'B00002', 320000, 10, 3200000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_atribut` varchar(255) NOT NULL,
  `nama_nilai` varchar(255) NOT NULL,
  `bobot` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_nilai`
--

INSERT INTO `tb_nilai` (`id_nilai`, `id_atribut`, `nama_nilai`, `bobot`) VALUES
(1, 'A04', 'Balken', 30),
(2, 'A04', 'Balok', 20),
(3, 'A04', 'Papan', 25),
(4, 'A04', 'Kaso', 15),
(5, 'A05', 'Kurang Laris', 10),
(6, 'A05', 'Cukup Laris', 20),
(7, 'A05', 'Sangat Laris', 40);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `no_faktur_pembelian` varchar(45) NOT NULL,
  `tanggal_pembelian` date DEFAULT NULL,
  `grandtotal` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembelian`
--

INSERT INTO `tb_pembelian` (`no_faktur_pembelian`, `tanggal_pembelian`, `grandtotal`) VALUES
('INV-FPB-0001', '2021-07-06', 2362500);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `no_faktur_penjualan` varchar(45) NOT NULL,
  `tanggal_penjualan` date DEFAULT NULL,
  `grandtotal` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`no_faktur_penjualan`, `tanggal_penjualan`, `grandtotal`) VALUES
('INV-FPJ-0001', '2021-07-04', 3150000),
('INV-FPJ-0002', '2021-07-04', 5562500),
('INV-FPJ-0003', '2021-07-09', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`user`);

--
-- Indexes for table `tb_atribut`
--
ALTER TABLE `tb_atribut`
  ADD PRIMARY KEY (`id_atribut`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_dataset`
--
ALTER TABLE `tb_dataset`
  ADD PRIMARY KEY (`id_dataset`);

--
-- Indexes for table `tb_detail_pembelian`
--
ALTER TABLE `tb_detail_pembelian`
  ADD PRIMARY KEY (`id_detail_pembelian`);

--
-- Indexes for table `tb_detail_penjualan`
--
ALTER TABLE `tb_detail_penjualan`
  ADD PRIMARY KEY (`id_detail_penjualan`);

--
-- Indexes for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`no_faktur_pembelian`);

--
-- Indexes for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`no_faktur_penjualan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dataset`
--
ALTER TABLE `tb_dataset`
  MODIFY `id_dataset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9501;

--
-- AUTO_INCREMENT for table `tb_detail_pembelian`
--
ALTER TABLE `tb_detail_pembelian`
  MODIFY `id_detail_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_detail_penjualan`
--
ALTER TABLE `tb_detail_penjualan`
  MODIFY `id_detail_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
