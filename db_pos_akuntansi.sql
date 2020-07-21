/*
SQLyog Enterprise - MySQL GUI v7.14 
MySQL - 5.6.21 : Database - db_pos_akuntansi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_pos_akuntansi` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_pos_akuntansi`;

/*Table structure for table `akun` */

DROP TABLE IF EXISTS `akun`;

CREATE TABLE `akun` (
  `noakun` varchar(10) NOT NULL,
  `namaakun` varchar(20) DEFAULT NULL,
  `saldo` double DEFAULT NULL,
  `is_deleted` enum('0','1') DEFAULT '1' COMMENT '0=tdk boleh 1=boleh',
  `beban` enum('0','1') DEFAULT '0' COMMENT '0=bukan beban 1=beban',
  PRIMARY KEY (`noakun`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `akun` */

insert  into `akun`(`noakun`,`namaakun`,`saldo`,`is_deleted`,`beban`) values ('1110','Kas',0,'0','0'),('4110','Penjualan',0,'0','0'),('4210','Diskon Penjualan',0,'0','0'),('5110','Beban Gaji',NULL,'1','1'),('5111','beban x',NULL,'1','1'),('5112','a',NULL,'1','1');

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `brngId` int(11) NOT NULL AUTO_INCREMENT,
  `brngKode` varchar(10) NOT NULL,
  `brngNama` varchar(50) NOT NULL,
  `brngStunId` int(11) NOT NULL,
  `brngHargaJual` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`brngId`),
  KEY `brngId` (`brngId`),
  KEY `FK_barang` (`brngStunId`),
  CONSTRAINT `FK_barang` FOREIGN KEY (`brngStunId`) REFERENCES `satuan` (`stunId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `barang` */

insert  into `barang`(`brngId`,`brngKode`,`brngNama`,`brngStunId`,`brngHargaJual`) values (17,'B001','Banner 3x3 Meter',3,30000);

/*Table structure for table `beban` */

DROP TABLE IF EXISTS `beban`;

CREATE TABLE `beban` (
  `idbeban` varchar(10) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `noakun` varchar(10) DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`idbeban`),
  KEY `FK_beban` (`noakun`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `beban` */

insert  into `beban`(`idbeban`,`tanggal`,`noakun`,`jumlah`,`keterangan`) values ('BI001','2020-05-03','5110',400000,'');

/*Table structure for table `detorderpenjualan` */

DROP TABLE IF EXISTS `detorderpenjualan`;

CREATE TABLE `detorderpenjualan` (
  `dopjId` int(11) NOT NULL AUTO_INCREMENT,
  `dopjOpnjId` int(11) NOT NULL,
  `dopjBrngId` int(11) NOT NULL,
  `dopjJumlah` int(11) NOT NULL,
  `dopjHarga` double DEFAULT NULL,
  `dopjDiskon` double DEFAULT NULL,
  PRIMARY KEY (`dopjId`),
  KEY `FK_detpenjualan` (`dopjBrngId`),
  KEY `FK_detpenjualan1` (`dopjOpnjId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `detorderpenjualan` */

insert  into `detorderpenjualan`(`dopjId`,`dopjOpnjId`,`dopjBrngId`,`dopjJumlah`,`dopjHarga`,`dopjDiskon`) values (2,2,17,1,30000,0),(3,3,17,1,30000,0);

/*Table structure for table `detorderpenjualan_temp` */

DROP TABLE IF EXISTS `detorderpenjualan_temp`;

CREATE TABLE `detorderpenjualan_temp` (
  `dopjId` int(11) NOT NULL AUTO_INCREMENT,
  `dopjBrngId` int(11) NOT NULL,
  `dopjJumlah` int(11) NOT NULL,
  `dopjHarga` double DEFAULT NULL,
  `dopjDiskon` double DEFAULT NULL,
  `dopjCreatedBy` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`dopjId`),
  KEY `FK_detpenjualan` (`dopjBrngId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `detorderpenjualan_temp` */

/*Table structure for table `detpenjualan` */

DROP TABLE IF EXISTS `detpenjualan`;

CREATE TABLE `detpenjualan` (
  `dtpjId` int(11) NOT NULL AUTO_INCREMENT,
  `dtpjPnjlId` int(11) NOT NULL,
  `dtpjBrngId` int(11) NOT NULL,
  `dtpjJumlah` int(11) NOT NULL,
  `dtpjHarga` double DEFAULT NULL,
  `dtpjDiskon` double DEFAULT NULL,
  PRIMARY KEY (`dtpjId`),
  KEY `FK_detpenjualan` (`dtpjBrngId`),
  KEY `FK_detpenjualan1` (`dtpjPnjlId`),
  CONSTRAINT `FK_detpenjualan` FOREIGN KEY (`dtpjBrngId`) REFERENCES `barang` (`brngId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_detpenjualan1` FOREIGN KEY (`dtpjPnjlId`) REFERENCES `penjualan` (`pnjlId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `detpenjualan` */

insert  into `detpenjualan`(`dtpjId`,`dtpjPnjlId`,`dtpjBrngId`,`dtpjJumlah`,`dtpjHarga`,`dtpjDiskon`) values (4,3,17,1,30000,0),(5,4,17,1,30000,0);

/*Table structure for table `detpenjualan_temp` */

DROP TABLE IF EXISTS `detpenjualan_temp`;

CREATE TABLE `detpenjualan_temp` (
  `dtpjId` int(11) NOT NULL AUTO_INCREMENT,
  `dtpjBrngId` int(11) NOT NULL,
  `dtpjJumlah` int(11) NOT NULL,
  `dtpjHarga` double DEFAULT NULL,
  `dtpjCreatedBy` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`dtpjId`),
  KEY `FK_detpenjualan_temp` (`dtpjBrngId`),
  CONSTRAINT `FK_detpenjualan_temp` FOREIGN KEY (`dtpjBrngId`) REFERENCES `barang` (`brngId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `detpenjualan_temp` */

/*Table structure for table `orderpenjualan` */

DROP TABLE IF EXISTS `orderpenjualan`;

CREATE TABLE `orderpenjualan` (
  `opnjId` int(11) NOT NULL AUTO_INCREMENT,
  `opnjNoFaktur` varchar(40) NOT NULL,
  `opnjTanggal` date DEFAULT NULL,
  `opnjPlgnId` int(11) NOT NULL,
  `opnjKet` text NOT NULL,
  `opnjTotalOrder` double DEFAULT NULL,
  `opnjStatusOrder` enum('Order','Sales') DEFAULT 'Order',
  `opnjPnjlId` int(11) DEFAULT NULL,
  PRIMARY KEY (`opnjId`),
  KEY `FK_penjualan` (`opnjPlgnId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `orderpenjualan` */

insert  into `orderpenjualan`(`opnjId`,`opnjNoFaktur`,`opnjTanggal`,`opnjPlgnId`,`opnjKet`,`opnjTotalOrder`,`opnjStatusOrder`,`opnjPnjlId`) values (2,'PJ05200001','2020-05-08',7,'asas',30000,'Sales',3),(3,'PJ06200002','2020-06-12',7,'as',30000,'Sales',4);

/*Table structure for table `pelanggan` */

DROP TABLE IF EXISTS `pelanggan`;

CREATE TABLE `pelanggan` (
  `plgnId` int(11) NOT NULL AUTO_INCREMENT,
  `plgnKode` varchar(10) NOT NULL,
  `plgnNama` varchar(50) NOT NULL,
  `plgnNamaKontak` varchar(50) DEFAULT NULL,
  `plgnTelp1` varchar(12) NOT NULL,
  `plgnTelp2` varchar(12) DEFAULT NULL,
  `plgnAlamat` text,
  `plgnPiutang` double DEFAULT NULL,
  `plgnNik` varchar(30) DEFAULT NULL,
  `plgnNamaUser` varchar(40) DEFAULT NULL,
  `plgnPassword` varchar(30) DEFAULT NULL,
  `plgnEmail` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`plgnId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `pelanggan` */

insert  into `pelanggan`(`plgnId`,`plgnKode`,`plgnNama`,`plgnNamaKontak`,`plgnTelp1`,`plgnTelp2`,`plgnAlamat`,`plgnPiutang`,`plgnNik`,`plgnNamaUser`,`plgnPassword`,`plgnEmail`) values (7,'P001','eg','sas','34','324','324324',0,NULL,'sadasd','123','asas');

/*Table structure for table `penjualan` */

DROP TABLE IF EXISTS `penjualan`;

CREATE TABLE `penjualan` (
  `pnjlId` int(11) NOT NULL AUTO_INCREMENT,
  `pnjlNoFaktur` varchar(40) NOT NULL,
  `pnjlTanggal` date DEFAULT NULL,
  `pnjlPlgnId` int(11) NOT NULL,
  `pnjlKet` text NOT NULL,
  `pnjlTotalJual` double DEFAULT NULL,
  `pnjlSisaBayar` double DEFAULT NULL,
  `pnjlUangMuka` double DEFAULT NULL,
  `pnjlJatuhTempo` date DEFAULT NULL,
  `pnjlDiskon` double DEFAULT NULL,
  `pnjlOngkir` double DEFAULT NULL,
  PRIMARY KEY (`pnjlId`),
  KEY `FK_penjualan` (`pnjlPlgnId`),
  CONSTRAINT `FK_penjualan` FOREIGN KEY (`pnjlPlgnId`) REFERENCES `pelanggan` (`plgnId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `penjualan` */

insert  into `penjualan`(`pnjlId`,`pnjlNoFaktur`,`pnjlTanggal`,`pnjlPlgnId`,`pnjlKet`,`pnjlTotalJual`,`pnjlSisaBayar`,`pnjlUangMuka`,`pnjlJatuhTempo`,`pnjlDiskon`,`pnjlOngkir`) values (3,'PJ05200001','2020-05-08',7,'asas',30000,30000,0,'2020-06-07',0,0),(4,'PJ06200002','2020-06-12',7,'as',30000,30000,0,'2020-07-12',0,0);

/*Table structure for table `satuan` */

DROP TABLE IF EXISTS `satuan`;

CREATE TABLE `satuan` (
  `stunId` int(11) NOT NULL AUTO_INCREMENT,
  `stunNama` varchar(40) NOT NULL,
  `stunSimbol` varchar(20) NOT NULL,
  PRIMARY KEY (`stunId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `satuan` */

insert  into `satuan`(`stunId`,`stunNama`,`stunSimbol`) values (3,'Buah','Bh'),(6,'5110','Biaya Gaji');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userNama` varchar(20) DEFAULT NULL,
  `userPassword` varchar(50) DEFAULT NULL,
  `userHakAkses` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`userId`,`userNama`,`userPassword`,`userHakAkses`) values (26,'penjualan','penjualan','Penjualan'),(27,'keuangan','keuangan','Keuangan'),(28,'pimpinan','pimpinan','Pimpinan');

/*Table structure for table `vw_jurnal` */

DROP TABLE IF EXISTS `vw_jurnal`;

/*!50001 DROP VIEW IF EXISTS `vw_jurnal` */;
/*!50001 DROP TABLE IF EXISTS `vw_jurnal` */;

/*!50001 CREATE TABLE `vw_jurnal` (
  `kodetransaksi` varchar(40) NOT NULL DEFAULT '',
  `tanggal` date DEFAULT NULL,
  `noakun` varchar(10) DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `keterangan` text,
  `namaakun` varchar(20) DEFAULT NULL,
  `status` varchar(1) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 */;

/*View structure for view vw_jurnal */

/*!50001 DROP TABLE IF EXISTS `vw_jurnal` */;
/*!50001 DROP VIEW IF EXISTS `vw_jurnal` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_jurnal` AS (select `beban`.`idbeban` AS `kodetransaksi`,`beban`.`tanggal` AS `tanggal`,`beban`.`noakun` AS `noakun`,`beban`.`jumlah` AS `jumlah`,`beban`.`keterangan` AS `keterangan`,`akun`.`namaakun` AS `namaakun`,'1' AS `status` from (`beban` join `akun`) where (`beban`.`noakun` = `akun`.`noakun`)) union (select `penjualan`.`pnjlNoFaktur` AS `pnjlNoFaktur`,`penjualan`.`pnjlTanggal` AS `pnjlTanggal`,'4110' AS `4110`,`penjualan`.`pnjlTotalJual` AS `pnjlTotalJual`,'Penjualan Barang' AS `Penjualan Barang`,`akun`.`namaakun` AS `namaakun`,'2' AS `2` from (`penjualan` join `akun`) where (`akun`.`noakun` = '4110')) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
