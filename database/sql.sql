/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.1.30-MariaDB : Database - db_knn_kmeans
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_knn_kmeans` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_knn_kmeans`;

/*Table structure for table `tb_admin` */

DROP TABLE IF EXISTS `tb_admin`;

CREATE TABLE `tb_admin` (
  `user` varchar(16) NOT NULL,
  `pass` varchar(16) DEFAULT NULL,
  `level` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_admin` */

insert  into `tb_admin`(`user`,`pass`,`level`) values 
('admin','admin','admin'),
('pemilik','pemilik','pemilik');

/*Table structure for table `tb_atribut` */

DROP TABLE IF EXISTS `tb_atribut`;

CREATE TABLE `tb_atribut` (
  `id_atribut` varchar(16) NOT NULL,
  `nama_atribut` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_atribut`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tb_atribut` */

insert  into `tb_atribut`(`id_atribut`,`nama_atribut`,`keterangan`) values 
('A01','Jumlah',''),
('A02','Volume',''),
('A03','Harga',''),
('A04','Jenis Barang',''),
('A05','Label','');

/*Table structure for table `tb_barang` */

DROP TABLE IF EXISTS `tb_barang`;

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
  `stok` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_barang` */

insert  into `tb_barang`(`id_barang`,`nama_barang`,`jenis_barang`,`panjang`,`lebar`,`tinggi`,`volume`,`harga_meter`,`harga_barang`,`stok`) values 
('B00001','Merbau Oven 500 x 3 x 35','Papan',500,3,35,0.0525,15000000,787500,300),
('B00002','Samarinda Oven 400 x 4 x 20',NULL,400,4,20,0.032,10000000,320000,400);

/*Table structure for table `tb_dataset` */

DROP TABLE IF EXISTS `tb_dataset`;

CREATE TABLE `tb_dataset` (
  `id_dataset` int(11) NOT NULL AUTO_INCREMENT,
  `nomor` int(11) DEFAULT NULL,
  `ket_dataset` varchar(255) DEFAULT NULL,
  `id_atribut` varchar(16) DEFAULT NULL,
  `id_nilai` double DEFAULT NULL,
  PRIMARY KEY (`id_dataset`)
) ENGINE=MyISAM AUTO_INCREMENT=9346 DEFAULT CHARSET=latin1;

/*Data for the table `tb_dataset` */

insert  into `tb_dataset`(`id_dataset`,`nomor`,`ket_dataset`,`id_atribut`,`id_nilai`) values 
(1,1,'Merbau Oven 500 x 3 x 35','A01',4),
(2,1,'Merbau Oven 500 x 3 x 35','A02',0.21),
(3,1,'Merbau Oven 500 x 3 x 35','A03',1365000),
(4,1,'Merbau Oven 500 x 3 x 35','A04',3),
(5,1,'Merbau Oven 500 x 3 x 35','A05',5),
(6,2,'Samarinda Oven 400 x 4 x 20','A01',2),
(7,2,'Samarinda Oven 400 x 4 x 20','A02',0.064),
(8,2,'Samarinda Oven 400 x 4 x 20','A03',350400),
(9,2,'Samarinda Oven 400 x 4 x 20','A04',3),
(10,2,'Samarinda Oven 400 x 4 x 20','A05',7),
(11,3,'Samarinda Oven 400 x 4 x 30','A01',3),
(12,3,'Samarinda Oven 400 x 4 x 30','A02',0.144),
(13,3,'Samarinda Oven 400 x 4 x 30','A03',540000),
(14,3,'Samarinda Oven 400 x 4 x 30','A04',3),
(15,3,'Samarinda Oven 400 x 4 x 30','A05',7),
(16,4,'Samarinda Oven 400 x 6 x 12','A01',2),
(17,4,'Samarinda Oven 400 x 6 x 12','A02',0.0576),
(18,4,'Samarinda Oven 400 x 6 x 12','A03',300960),
(19,4,'Samarinda Oven 400 x 6 x 12','A04',2),
(20,4,'Samarinda Oven 400 x 6 x 12','A05',7),
(21,5,'Samarinda Oven 400 x 6 x 17','A01',1),
(22,5,'Samarinda Oven 400 x 6 x 17','A02',0.0408),
(23,5,'Samarinda Oven 400 x 6 x 17','A03',442680),
(24,5,'Samarinda Oven 400 x 6 x 17','A04',2),
(25,5,'Samarinda Oven 400 x 6 x 17','A05',6);

/*Table structure for table `tb_detail_pembelian` */

DROP TABLE IF EXISTS `tb_detail_pembelian`;

CREATE TABLE `tb_detail_pembelian` (
  `id_detail_pembelian` int(11) NOT NULL AUTO_INCREMENT,
  `no_faktur_pembelian` varchar(45) DEFAULT NULL,
  `id_barang` varchar(45) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL,
  PRIMARY KEY (`id_detail_pembelian`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `tb_detail_pembelian` */

insert  into `tb_detail_pembelian`(`id_detail_pembelian`,`no_faktur_pembelian`,`id_barang`,`harga`,`jumlah`,`total`) values 
(16,'INV-FPB-0001','B00001',787500,3,2362500);

/*Table structure for table `tb_detail_penjualan` */

DROP TABLE IF EXISTS `tb_detail_penjualan`;

CREATE TABLE `tb_detail_penjualan` (
  `id_detail_penjualan` int(11) NOT NULL AUTO_INCREMENT,
  `no_faktur_penjualan` varchar(45) DEFAULT NULL,
  `id_barang` varchar(45) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL,
  PRIMARY KEY (`id_detail_penjualan`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tb_detail_penjualan` */

insert  into `tb_detail_penjualan`(`id_detail_penjualan`,`no_faktur_penjualan`,`id_barang`,`harga`,`jumlah`,`total`) values 
(5,'INV-FPJ-0001','B00001',787500,4,3150000),
(6,'INV-FPJ-0002','B00001',787500,3,2362500),
(7,'INV-FPJ-0002','B00002',320000,10,3200000);

/*Table structure for table `tb_nilai` */

DROP TABLE IF EXISTS `tb_nilai`;

CREATE TABLE `tb_nilai` (
  `id_nilai` int(11) NOT NULL AUTO_INCREMENT,
  `id_atribut` varchar(255) NOT NULL,
  `nama_nilai` varchar(255) NOT NULL,
  `bobot` double DEFAULT NULL,
  PRIMARY KEY (`id_nilai`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tb_nilai` */

insert  into `tb_nilai`(`id_nilai`,`id_atribut`,`nama_nilai`,`bobot`) values 
(1,'A04','Balken',30),
(2,'A04','Balok',20),
(3,'A04','Papan',25),
(4,'A04','Kaso',15),
(5,'A05','Kurang Laris',10),
(6,'A05','Cukup Laris',20),
(7,'A05','Sangat Laris',40);

/*Table structure for table `tb_pembelian` */

DROP TABLE IF EXISTS `tb_pembelian`;

CREATE TABLE `tb_pembelian` (
  `no_faktur_pembelian` varchar(45) NOT NULL,
  `tanggal_pembelian` date DEFAULT NULL,
  `grandtotal` double DEFAULT NULL,
  PRIMARY KEY (`no_faktur_pembelian`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_pembelian` */

insert  into `tb_pembelian`(`no_faktur_pembelian`,`tanggal_pembelian`,`grandtotal`) values 
('INV-FPB-0001','2021-07-06',2362500);

/*Table structure for table `tb_penjualan` */

DROP TABLE IF EXISTS `tb_penjualan`;

CREATE TABLE `tb_penjualan` (
  `no_faktur_penjualan` varchar(45) NOT NULL,
  `tanggal_penjualan` date DEFAULT NULL,
  `grandtotal` double DEFAULT NULL,
  PRIMARY KEY (`no_faktur_penjualan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_penjualan` */

insert  into `tb_penjualan`(`no_faktur_penjualan`,`tanggal_penjualan`,`grandtotal`) values 
('INV-FPJ-0001','2021-07-04',3150000),
('INV-FPJ-0002','2021-07-04',5562500);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
