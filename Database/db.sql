/*
SQLyog Ultimate v8.55 
MySQL - 5.5.5-10.4.27-MariaDB : Database - dbsdnwadas
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbsdnwadas` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `dbsdnwadas`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `username` varchar(30) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `admin` */

insert  into `admin`(`username`,`password`) values ('admin','123');

/*Table structure for table `hasil` */

DROP TABLE IF EXISTS `hasil`;

CREATE TABLE `hasil` (
  `nis` varchar(5) NOT NULL,
  `nilai` decimal(10,3) DEFAULT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `hasil` */

insert  into `hasil`(`nis`,`nilai`) values ('549','0.613'),('553','0.732'),('555','1.000'),('556','0.493'),('558','0.986'),('559','0.423'),('561','0.423'),('563','0.606'),('565','0.493'),('566','0.782'),('575','0.493');

/*Table structure for table `seleksi` */

DROP TABLE IF EXISTS `seleksi`;

CREATE TABLE `seleksi` (
  `nis` varchar(3) NOT NULL,
  `tahun` year(4) NOT NULL,
  `pendapatan` int(11) DEFAULT NULL,
  `keluarga` int(2) DEFAULT NULL,
  `umur` double(10,2) DEFAULT NULL,
  `nilai` double(10,2) DEFAULT NULL,
  `pendapatanorang` int(11) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`nis`,`tahun`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `seleksi` */

insert  into `seleksi`(`nis`,`tahun`,`pendapatan`,`keluarga`,`umur`,`nilai`,`pendapatanorang`,`username`) values ('549',2024,1500000,3,11.10,81.78,500000,'admin'),('553',2024,1500000,4,11.30,72.56,375000,'admin'),('555',2024,1200000,5,11.20,82.60,240000,'admin'),('556',2024,2000000,3,11.20,81.33,666667,'admin'),('558',2024,1250000,5,11.40,83.78,240000,'admin'),('559',2024,2500000,3,11.50,81.70,833333,'admin'),('561',2024,2500000,3,12.00,82.89,833333,'admin'),('563',2024,1500000,3,10.60,79.90,500000,'admin'),('565',2024,2000000,3,11.10,82.50,666667,'admin'),('566',2024,1100000,3,11.70,80.60,366667,'admin'),('575',2024,2000000,3,11.60,84.11,666667,'admin');

/*Table structure for table `siswa` */

DROP TABLE IF EXISTS `siswa`;

CREATE TABLE `siswa` (
  `nis` varchar(3) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `siswa` */

insert  into `siswa`(`nis`,`nama`,`alamat`,`telepon`) values ('549','Irna Salsabila','Kendal',''),('553','Daffa Muhamad F.','Kendal',''),('555','Talita Nabila','Kendal',''),('556','M. Andika Arya Maula','Kendal',''),('558','Muhamad Ali Rohmad','Kendal',''),('559','Nadia Izma Aulia','Kendal',''),('561','Farzan Ahza Argani','Kendal',''),('563','Farid Khoirunnafi','Kendal',''),('565','Khauroa Nasyaya A.','Kendal',''),('566','Lina Sofiayanti','Kendal',''),('575','Ariya Eka Adhitama','Kendal','');

/*Table structure for table `temp` */

DROP TABLE IF EXISTS `temp`;

CREATE TABLE `temp` (
  `nis` varchar(5) NOT NULL,
  `nilai` decimal(10,5) DEFAULT NULL,
  `nilai1` decimal(10,5) DEFAULT NULL,
  `nilai2` decimal(10,5) DEFAULT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `temp` */

insert  into `temp`(`nis`,`nilai`,`nilai1`,`nilai2`) values ('549','0.06378','15.67929','0.06743'),('553','0.05295','18.88506','0.08122'),('555','0.03716','26.90717','0.11573'),('556','0.08504','11.75946','0.05057'),('558','0.03785','26.42201','0.11362'),('559','0.10630','9.40758','0.04046'),('561','0.10630','9.40758','0.04046'),('563','0.06378','15.67929','0.06743'),('565','0.08504','11.75946','0.05057'),('566','0.04677','21.38083','0.09195'),('575','0.08504','11.75946','0.05057');

/*Table structure for table `temp1` */

DROP TABLE IF EXISTS `temp1`;

CREATE TABLE `temp1` (
  `nis` varchar(5) NOT NULL,
  `nilai` decimal(10,5) DEFAULT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `temp1` */

insert  into `temp1`(`nis`,`nilai`) values ('549','0.01926'),('553','0.02237'),('555','0.02619'),('556','0.01929'),('558','0.02634'),('559','0.01945'),('561','0.01975'),('563','0.01894'),('565','0.01930'),('566','0.01950'),('575','0.01961');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
