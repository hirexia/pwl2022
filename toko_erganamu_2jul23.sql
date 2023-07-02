/*
SQLyog Community v13.2.0 (64 bit)
MySQL - 10.4.27-MariaDB : Database - pwl_4219
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pwl_4219` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `pwl_4219`;

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `harga` float DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `foto` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `barang` */

insert  into `barang`(`id`,`nama`,`harga`,`jumlah`,`keterangan`,`foto`) values 
(1,'Indomie Goreng',2500,51,'Indomie Seleraku','indomie-mi-goreng-special_detail_094906814 (1).png'),
(2,'Sari Roti Kismis',5000,100,'Roti Single','roti_tawar_raisin1.jpg'),
(3,'Susu Ultra',5000,100,'Susu UHT','e31f03c4-8216-425d-8279-b7cee6e75cf8.jpg'),
(4,'Dji Sam Soe Refill',20000,24,'Ududnya Orang NU','dji-sam-soe-234-premium-12-285587.jpg'),
(5,'eskrim walls',9000,13,'cemilan anak-anak oye','1688282676_ad8113d9d27221f08a9d.png');

/*Table structure for table `transaksi` */

DROP TABLE IF EXISTS `transaksi`;

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `total_harga` double DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `ongkir` double DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `transaksi` */

insert  into `transaksi`(`id`,`username`,`total_harga`,`alamat`,`ongkir`,`status`,`created_by`,`created_date`) values 
(1,'awawa',87500,'popopop',65000,0,'awawa','2023-06-26 10:44:07'),
(2,'zabania',0,'',0,0,'zabania','2023-06-30 14:46:12');

/*Table structure for table `transaksi_detail` */

DROP TABLE IF EXISTS `transaksi_detail`;

CREATE TABLE `transaksi_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `diskon` double DEFAULT NULL,
  `subtotal_harga` double DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `transaksi_detail` */

insert  into `transaksi_detail`(`id`,`id_transaksi`,`id_barang`,`jumlah`,`diskon`,`subtotal_harga`,`created_by`,`created_date`) values 
(1,1,1,1,0,2500,'awawa','2023-06-26 10:44:07'),
(2,1,2,2,0,10000,'awawa','2023-06-26 10:44:07'),
(3,1,3,2,0,10000,'awawa','2023-06-26 10:44:08'),
(4,2,1,1,0,2500,'zabania','2023-06-30 14:46:12');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `role` varchar(25) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `is_aktif` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`role`,`password`,`is_aktif`) values 
(1,'zabania','admin','6c0335c3e70024ddee159ecdf07c178f',1),
(2,'awawa','user','6c0335c3e70024ddee159ecdf07c178f',1),
(7,'kikuri','user','b26986ceee60f744534aaab928cc12df',1),
(9,'tsubaki','user','a3dcb4d229de6fde0db5686dee47145d',1),
(10,'umara','user','a3dcb4d229de6fde0db5686dee47145d',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
