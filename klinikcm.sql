/*
SQLyog Ultimate v8.4 
MySQL - 5.5.5-10.1.10-MariaDB : Database - klinikcm
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`klinikcm` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `klinikcm`;

/*Table structure for table `alat_kb` */

DROP TABLE IF EXISTS `alat_kb`;

CREATE TABLE `alat_kb` (
  `kd_alatkb` int(11) NOT NULL AUTO_INCREMENT,
  `nama_alat` varchar(100) NOT NULL,
  `biaya` int(11) NOT NULL,
  PRIMARY KEY (`kd_alatkb`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `alat_kb` */

insert  into `alat_kb`(`kd_alatkb`,`nama_alat`,`biaya`) values (1,'iud',250000),(2,'implan',300000),(3,'mow',200000),(4,'pill',100000),(5,'mop',250000),(6,'kondom ',50000),(7,'suntikan',150000);

/*Table structure for table `anc` */

DROP TABLE IF EXISTS `anc`;

CREATE TABLE `anc` (
  `id_pemeriksaan` varchar(100) NOT NULL,
  `tgl_pemeriksaan` datetime NOT NULL,
  `no_rm` varchar(100) NOT NULL,
  `kd_detpol` int(11) NOT NULL,
  `umur` varchar(50) DEFAULT NULL,
  `id_bidan` varchar(100) NOT NULL,
  `nm_suami` varchar(100) DEFAULT NULL,
  `umur_suami` varchar(30) DEFAULT NULL,
  `pnd_suami` varchar(100) DEFAULT NULL,
  `agama_suami` varchar(50) DEFAULT NULL,
  `kerja_suami` varchar(100) DEFAULT NULL,
  `jum_hamil` int(11) DEFAULT NULL,
  `jum_persalinan` int(11) DEFAULT NULL,
  `jum_keguguran` int(11) DEFAULT NULL,
  `hpht` date DEFAULT NULL,
  `hpl` date DEFAULT NULL,
  `keterangan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_pemeriksaan`),
  KEY `FK_anc` (`id_bidan`),
  KEY `FK_anc1` (`no_rm`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `anc` */

insert  into `anc`(`id_pemeriksaan`,`tgl_pemeriksaan`,`no_rm`,`kd_detpol`,`umur`,`id_bidan`,`nm_suami`,`umur_suami`,`pnd_suami`,`agama_suami`,`kerja_suami`,`jum_hamil`,`jum_persalinan`,`jum_keguguran`,`hpht`,`hpl`,`keterangan`) values ('PRS-000323062020003810','2020-06-23 00:43:23','RM-2020006',6,'29 tahun 1 bulan ','BDN-0001','Budi','30 Tahun','SMA','Islam','Wiraswasta',1,1,0,'2020-06-22','2021-04-04','Telah Melakukan Pembayaran'),('PRS-000724062020135850','2020-06-24 14:02:03','RM-2020006',6,'29 tahun 1 bulan ','BDN-0001','tomi','22 tahun','SMA','islam','pengusaha',2,2,0,'2020-06-23','2021-04-06','Telah Melakukan Pembayaran'),('PRS-001103072020174315','2020-07-03 17:55:11','RM-2020006',6,'29 tahun 2 bulan ','BDN-0002','Tomi','29 Tahun','SMA','Islam','Wiraswasta',3,3,0,'2020-07-02','2021-02-10','Telah Melakukan Pembayaran');

/*Table structure for table `anc_det` */

DROP TABLE IF EXISTS `anc_det`;

CREATE TABLE `anc_det` (
  `id_detanc` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemeriksaan` varchar(100) NOT NULL,
  `no_rm` varchar(100) NOT NULL,
  `anak` int(11) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `umur` varchar(50) DEFAULT NULL,
  `jk` varchar(50) DEFAULT NULL,
  `bbl` text,
  `cara_persalinan` text,
  `penolong` varchar(50) DEFAULT NULL,
  `tmp_persalinan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_detanc`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `anc_det` */

insert  into `anc_det`(`id_detanc`,`id_pemeriksaan`,`no_rm`,`anak`,`tahun`,`umur`,`jk`,`bbl`,`cara_persalinan`,`penolong`,`tmp_persalinan`) values (1,'PRS-000323062020003810','RM-2020006',1,2015,'5 Tahun','Laki-Laki','20','Normal','Bidan','Rs Sardjito'),(2,'PRS-000724062020135850','RM-2020006',1,2015,'5 tahun','Laki-Laki','30','normal','bidan','rs sardjito'),(3,'PRS-001103072020174315','RM-2020006',2,2020,'3 Tahun','Laki-Laki','30','Normal','Bidan','Rs. Panti Rapih');

/*Table structure for table `anc_ku` */

DROP TABLE IF EXISTS `anc_ku`;

CREATE TABLE `anc_ku` (
  `id_ku` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemeriksaan` varchar(100) NOT NULL,
  `muntah` text,
  `nyeri_perut` text,
  `pusing` text,
  `nfsu_mkn` text,
  `pendarahan` text,
  `derita_sakit` varchar(225) DEFAULT NULL,
  `rw_sktkeluarga` varchar(225) DEFAULT NULL,
  `kebiasaan` varchar(225) DEFAULT NULL,
  `keluhan` varchar(225) DEFAULT NULL,
  `ps_sexistri` text,
  `ps_sexsuami` text,
  PRIMARY KEY (`id_ku`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `anc_ku` */

insert  into `anc_ku`(`id_ku`,`id_pemeriksaan`,`muntah`,`nyeri_perut`,`pusing`,`nfsu_mkn`,`pendarahan`,`derita_sakit`,`rw_sktkeluarga`,`kebiasaan`,`keluhan`,`ps_sexistri`,`ps_sexsuami`) values (1,'PRS-000323062020003810','Biasa','Ada','Biasa','Baik','Ada','','','','','Satu','Satu'),(2,'PRS-000724062020135850','Biasa','Ada','Biasa','Baik','Ada','','','','','Satu','Satu'),(3,'PRS-001103072020174315','Biasa','Ada','Biasa','Baik','Ada','','','','','Satu','Satu');

/*Table structure for table `anc_prs` */

DROP TABLE IF EXISTS `anc_prs`;

CREATE TABLE `anc_prs` (
  `id_ancpers` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemeriksaan` varchar(100) NOT NULL,
  `bntuk_tbh` text,
  `paru` text,
  `kesadaran` text,
  `jantung` text,
  `mata` text,
  `hati` text,
  `leher` text,
  `sb` text,
  `payudara` text,
  `genetelia` text,
  PRIMARY KEY (`id_ancpers`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `anc_prs` */

insert  into `anc_prs`(`id_ancpers`,`id_pemeriksaan`,`bntuk_tbh`,`paru`,`kesadaran`,`jantung`,`mata`,`hati`,`leher`,`sb`,`payudara`,`genetelia`) values (1,'PRS-000323062020003810','Normal','Normal','Baik','Nafas Normal','Normal','Normal','Besar','Normal','Normal','Varises '),(2,'PRS-000724062020135850','Normal','Normal','Baik','Nafas Normal','Normal','Normal','Besar','Normal','Normal','Varises '),(3,'PRS-001103072020174315','Normal','Normal','Baik','Nafas Normal','Normal','Normal','Besar','Normal','Normal','Varises ');

/*Table structure for table `antrian` */

DROP TABLE IF EXISTS `antrian`;

CREATE TABLE `antrian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_antrian` varchar(100) NOT NULL,
  `id_pemeriksaan` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_antrian` (`id_pemeriksaan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `antrian` */

insert  into `antrian`(`id`,`no_antrian`,`id_pemeriksaan`) values (1,'A-0001','PRS-000122062020234711'),(2,'A-0001','PRS-000524062020135046'),(3,'A-0001','PRS-000830062020021845'),(4,'A-0001','PRS-000903072020023736');

/*Table structure for table `antrian_kia` */

DROP TABLE IF EXISTS `antrian_kia`;

CREATE TABLE `antrian_kia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_antrian` varchar(100) NOT NULL,
  `id_pemeriksaan` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_antrian_kia` (`id_pemeriksaan`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `antrian_kia` */

insert  into `antrian_kia`(`id`,`no_antrian`,`id_pemeriksaan`) values (1,'A-0001','PRS-000223062020003432'),(2,'A-0002','PRS-000323062020003810'),(3,'A-0003','PRS-000423062020004725'),(4,'A-0001','PRS-000624062020135459'),(5,'A-0002','PRS-000724062020135850'),(6,'A-0001','PRS-001003072020024827'),(7,'A-0002','PRS-001103072020174315'),(8,'A-0003','PRS-001203072020180440');

/*Table structure for table `bidan` */

DROP TABLE IF EXISTS `bidan`;

CREATE TABLE `bidan` (
  `id_bidan` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `agama` varchar(30) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  PRIMARY KEY (`id_bidan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `bidan` */

insert  into `bidan`(`id_bidan`,`nama`,`jk`,`alamat`,`agama`,`tempat_lahir`,`tgl_lahir`,`no_hp`) values ('BDN-0001','Mayasari Amd.Keb','Perempuan','Poko RT 08, RW 03, Cepoko, Panekan, Magetan','Islam','Langkap','1991-07-12','082243429118'),('BDN-0002','Indah Cahyani Amd.Keb','Laki-Laki','Perum. Sonosewu Baru No460, Ngestiharjo, Kasihan, Bantul, Yogyakarta','Islam','Pematang','1992-07-26','085799958171'),('BDN-0003','Nur Hamidah Amd.Keb','Perempuan','Gendingan, NG 2/361 RT 17/03, Notoprajan, Ngampilan, Yogyakarta','Islam','Oku Timur','1994-12-10','085743870087'),('BDN-0004','Widiya Nur Hamudah Amd.Keb','Perempuan','Perum. Sonosewu Baru No.460, Ngestiharjo, Kasihan, Bantul, Yogyakarta','Islam','Surabaya','1995-09-09','082285415198');

/*Table structure for table `det_imun` */

DROP TABLE IF EXISTS `det_imun`;

CREATE TABLE `det_imun` (
  `kd_detimun` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemeriksaan` varchar(100) NOT NULL,
  `kd_vaksin` int(11) NOT NULL,
  PRIMARY KEY (`kd_detimun`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `det_imun` */

insert  into `det_imun`(`kd_detimun`,`id_pemeriksaan`,`kd_vaksin`) values (1,'PRS-000423062020004725',3),(2,'PRS-001203072020180440',4),(3,'PRS-001203072020180440',6);

/*Table structure for table `det_poly` */

DROP TABLE IF EXISTS `det_poly`;

CREATE TABLE `det_poly` (
  `kd_detpol` int(11) NOT NULL AUTO_INCREMENT,
  `kd_poly` varchar(100) NOT NULL,
  `layanan` varchar(100) NOT NULL,
  `biaya` int(11) NOT NULL,
  PRIMARY KEY (`kd_detpol`),
  KEY `NewIndex1` (`kd_poly`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `det_poly` */

insert  into `det_poly`(`kd_detpol`,`kd_poly`,`layanan`,`biaya`) values (2,'POLY-02','Keluarga Berencana (KB)',30000),(4,'POLY-02','Imunisasi',50000),(5,'POLY-01','Rawat Jalan',30000),(6,'POLY-02','Antenatal Care (ANC)',30000);

/*Table structure for table `det_resep` */

DROP TABLE IF EXISTS `det_resep`;

CREATE TABLE `det_resep` (
  `id_detresep` int(11) NOT NULL AUTO_INCREMENT,
  `id_resep` varchar(100) NOT NULL,
  `kd_obat` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  `aturan_minum` text NOT NULL,
  PRIMARY KEY (`id_detresep`),
  KEY `FK_det_resep123` (`kd_obat`),
  KEY `FK_det_resep_det_resep` (`id_resep`),
  CONSTRAINT `FK_det_resep_det_resep` FOREIGN KEY (`id_resep`) REFERENCES `resep_obat` (`id_resep`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `det_resep` */

insert  into `det_resep`(`id_detresep`,`id_resep`,`kd_obat`,`jumlah`,`satuan`,`aturan_minum`) values (1,'RSP-0001','OBT-0001',12,'Tablet','2 x sehari'),(2,'RSP-0002','OBT-0003',4,'Tube','2 x sehari'),(3,'RSP-0003','OBT-0002',12,'Tablet','3 x sehari'),(4,'RSP-0004','OBT-0149',10,'Nebul','1 x sehari'),(5,'RSP-0004','OBT-0010',6,'Tablet','2 x sehari'),(6,'RSP-0005','OBT-0002',10,'Tablet','3 x sehari'),(7,'RSP-0006','OBT-0001',5,'Tablet','1 x sehari'),(8,'RSP-0006','OBT-0010',2,'Tablet','1 x sehari'),(9,'RSP-0007','OBT-0002',10,'Tablet','2 x sehari'),(10,'RSP-0008','OBT-0006',12,'Tablet','3 x sehari'),(11,'RSP-0009','OBT-0127',6,'Suppo','2 x sehari'),(12,'RSP-0010','OBT-0002',10,'Tablet','2 x sehari');

/*Table structure for table `dokter` */

DROP TABLE IF EXISTS `dokter`;

CREATE TABLE `dokter` (
  `id_dokter` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  PRIMARY KEY (`id_dokter`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dokter` */

insert  into `dokter`(`id_dokter`,`nama`,`jk`,`agama`,`alamat`,`tempat_lahir`,`tgl_lahir`,`no_hp`) values ('DOK-0001','dr. Neli Witasari','Perempuan','Islam','Perum. Darusalam F.5, Meijing, Gamping, Sleman, Yogyakarta','Yogyakarta','1985-12-27','08529225785'),('DOK-0002','dr. Trigis Thursina','Perempuan','Islam','Perum. Tirta Mas 1, Ngrame, Kasihan, Bantul, Yogyakarta','Bima','1991-01-03','082323265595');

/*Table structure for table `imun_vaksin` */

DROP TABLE IF EXISTS `imun_vaksin`;

CREATE TABLE `imun_vaksin` (
  `kd_vaksin` int(11) NOT NULL AUTO_INCREMENT,
  `nm_vaksin` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`kd_vaksin`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `imun_vaksin` */

insert  into `imun_vaksin`(`kd_vaksin`,`nm_vaksin`,`stok`,`harga`) values (1,'HB 0',45,120000),(2,'BCG',47,150000),(3,'Pentavalent',17,150000),(4,'POLIO',18,100000),(5,'MR',20,100000),(6,'BOOSTER PENTA',29,100000),(7,'BOOSTER MR',20,100000);

/*Table structure for table `imunisasi` */

DROP TABLE IF EXISTS `imunisasi`;

CREATE TABLE `imunisasi` (
  `id_pemeriksaan` varchar(100) NOT NULL,
  `tgl_pemeriksaan` datetime NOT NULL,
  `no_rm` varchar(100) NOT NULL,
  `id_bidan` varchar(100) NOT NULL,
  `kd_detpol` int(11) NOT NULL,
  `nm_ibu` varchar(200) DEFAULT NULL,
  `nm_ayah` varchar(200) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `bb_lhr` varchar(11) DEFAULT NULL,
  `pb_lhr` varchar(11) DEFAULT NULL,
  `bb` varchar(11) DEFAULT NULL,
  `pb` varchar(11) DEFAULT NULL,
  `umur` varchar(50) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_pemeriksaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `imunisasi` */

insert  into `imunisasi`(`id_pemeriksaan`,`tgl_pemeriksaan`,`no_rm`,`id_bidan`,`kd_detpol`,`nm_ibu`,`nm_ayah`,`no_telp`,`bb_lhr`,`pb_lhr`,`bb`,`pb`,`umur`,`keterangan`) values ('PRS-000423062020004725','2020-06-23 00:49:11','RM-2020005','BDN-0001',4,'Siti','Tomi','0812909012','20','30','30','40','4 bulan ','Telah Melakukan Pembayaran'),('PRS-001203072020180440','2020-07-03 18:06:58','RM-2020007','BDN-0002',4,'Mira','Mirza','081219212','39','49','50','60','5 bulan ','Telah Melakukan Pembayaran');

/*Table structure for table `jad_bid` */

DROP TABLE IF EXISTS `jad_bid`;

CREATE TABLE `jad_bid` (
  `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `hari` date NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `id_bidan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_jadwal`),
  KEY `FK_jad_bid` (`id_bidan`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `jad_bid` */

insert  into `jad_bid`(`id_jadwal`,`hari`,`waktu_mulai`,`waktu_selesai`,`id_bidan`) values (1,'2020-07-06','08:00:00','14:00:00','BDN-0001'),(2,'2020-07-07','08:00:00','14:00:00','BDN-0001'),(3,'2020-07-08','08:00:00','16:00:00','BDN-0001'),(4,'2020-07-09','08:00:00','16:00:00','BDN-0001'),(5,'2020-07-10','08:00:00','14:00:00','BDN-0001'),(6,'2020-07-11','08:00:00','14:00:00','BDN-0001'),(7,'2020-07-06','16:00:00','20:00:00','BDN-0002'),(8,'2020-07-07','16:00:00','20:00:00','BDN-0002'),(9,'2020-07-08','16:00:00','20:00:00','BDN-0002'),(10,'2020-07-09','16:00:00','20:00:00','BDN-0002'),(11,'2020-07-10','16:00:00','20:00:00','BDN-0002'),(12,'2020-07-11','16:00:00','20:00:00','BDN-0002'),(13,'2020-07-06','08:00:00','14:00:00','BDN-0003'),(14,'2020-07-07','08:00:00','14:00:00','BDN-0003'),(15,'2020-07-08','08:00:00','14:00:00','BDN-0003'),(16,'2020-07-09','08:00:00','14:00:00','BDN-0003'),(17,'2020-07-10','08:00:00','14:00:00','BDN-0003'),(18,'2020-07-11','08:00:00','14:00:00','BDN-0003'),(19,'2020-07-06','14:00:00','20:00:00','BDN-0004'),(20,'2020-07-07','14:00:00','20:00:00','BDN-0004'),(21,'2020-07-08','14:00:00','20:00:00','BDN-0004'),(22,'2020-07-09','14:00:00','20:00:00','BDN-0004'),(23,'2020-07-10','14:00:00','20:00:00','BDN-0004'),(24,'2020-07-11','14:00:00','20:00:00','BDN-0004');

/*Table structure for table `jad_dok` */

DROP TABLE IF EXISTS `jad_dok`;

CREATE TABLE `jad_dok` (
  `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `hari` date NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `id_dokter` varchar(100) NOT NULL,
  PRIMARY KEY (`id_jadwal`),
  KEY `FK_jad_dok` (`id_dokter`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `jad_dok` */

insert  into `jad_dok`(`id_jadwal`,`hari`,`waktu_mulai`,`waktu_selesai`,`id_dokter`) values (4,'2020-07-12','08:00:00','23:00:00','DOK-0001'),(5,'2020-07-07','08:00:00','14:00:00','DOK-0001'),(6,'2020-07-08','08:00:00','14:00:00','DOK-0001'),(7,'2020-07-09','08:00:00','14:00:00','DOK-0001'),(8,'2020-07-10','08:00:00','14:00:00','DOK-0001'),(9,'2020-07-11','08:00:00','14:00:00','DOK-0001'),(10,'2020-07-06','16:00:00','20:00:00','DOK-0002'),(11,'2020-07-07','16:00:00','20:00:00','DOK-0002'),(12,'2020-07-08','16:00:00','20:00:00','DOK-0002'),(13,'2020-07-09','16:00:00','20:00:00','DOK-0002'),(14,'2020-07-10','16:00:00','20:00:00','DOK-0002'),(15,'2020-07-11','16:00:00','20:00:00','DOK-0002');

/*Table structure for table `kb` */

DROP TABLE IF EXISTS `kb`;

CREATE TABLE `kb` (
  `id_pemeriksaan` varchar(100) NOT NULL,
  `tgl_pemeriksaan` datetime NOT NULL,
  `no_rm` varchar(100) NOT NULL,
  `kd_detpol` int(11) NOT NULL,
  `umur` varchar(50) DEFAULT NULL,
  `nama_suami` varchar(50) DEFAULT NULL,
  `pndk_suami` varchar(100) DEFAULT NULL,
  `pekerjaan_suami` varchar(100) DEFAULT NULL,
  `jkn` varchar(100) DEFAULT NULL,
  `jum_al` int(11) DEFAULT NULL,
  `jum_ap` int(11) DEFAULT NULL,
  `jum_umurterkecil` varchar(100) DEFAULT NULL,
  `status_kb` varchar(50) DEFAULT NULL,
  `kb_terakhir` varchar(50) DEFAULT NULL,
  `haid_terakhir` date DEFAULT NULL,
  `status_hamil` varchar(50) DEFAULT NULL,
  `jum_hamil` varchar(100) DEFAULT NULL,
  `jum_persalinan` varchar(100) DEFAULT NULL,
  `jum_keguguran` varchar(100) DEFAULT NULL,
  `status_menyusui` varchar(50) DEFAULT NULL,
  `riwayat_sakit` varchar(50) DEFAULT NULL,
  `keadaan` varchar(50) DEFAULT NULL,
  `bb` varchar(50) DEFAULT NULL,
  `td` varchar(100) DEFAULT NULL,
  `periksa_dalam` text,
  `posisi_rahim` varchar(50) DEFAULT NULL,
  `periksa_tambahan` text,
  `alat_kontraboleh` varchar(50) DEFAULT NULL,
  `kd_alatkb` int(11) DEFAULT NULL,
  `tgl_pesan` date DEFAULT NULL,
  `tgl_cabut` date DEFAULT NULL,
  `id_bidan` varchar(100) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_pemeriksaan`),
  KEY `FK_kb` (`id_bidan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kb` */

insert  into `kb`(`id_pemeriksaan`,`tgl_pemeriksaan`,`no_rm`,`kd_detpol`,`umur`,`nama_suami`,`pndk_suami`,`pekerjaan_suami`,`jkn`,`jum_al`,`jum_ap`,`jum_umurterkecil`,`status_kb`,`kb_terakhir`,`haid_terakhir`,`status_hamil`,`jum_hamil`,`jum_persalinan`,`jum_keguguran`,`status_menyusui`,`riwayat_sakit`,`keadaan`,`bb`,`td`,`periksa_dalam`,`posisi_rahim`,`periksa_tambahan`,`alat_kontraboleh`,`kd_alatkb`,`tgl_pesan`,`tgl_cabut`,`id_bidan`,`keterangan`) values ('PRS-000223062020003432','2020-06-23 00:36:36','RM-2020003',2,'20 tahun 2 bulan ','Alex','SMA','Wiraswasta','\r\n    Bukan Peserta JKN',1,1,'1 Tahun','Baru Pertama Kali','','2020-06-16','Tidak','1','1','','Ya','Tidak Ada','Baik','60','128/20','-','Retrofleksi','-','Pill',4,'2020-06-23','0000-00-00','BDN-0001','Telah Melakukan Pembayaran'),('PRS-000624062020135459','2020-06-24 13:57:57','RM-2020003',2,'20 tahun 2 bulan ','budi','SMA','wiraswasta','\r\n    Peserta JKN Penerima Bahan Bantuan Iuran',1,1,'1 tahun','Pernah Pakai Alat KB','Pill','2020-06-23','Tidak','2','2','','Ya','Tidak Ada','Baik','60','128/20','-','Retrofleksi','-','Pill',4,'2020-06-24','0000-00-00','BDN-0001','Telah Melakukan Pembayaran'),('PRS-001003072020024827','2020-07-03 03:27:04','RM-2020003',2,'20 tahun 2 bulan ','Budi','SMA','wiraswasta','\r\n    Peserta JKN Penerima Bahan Bantuan Iuran',1,1,'5 Tahum','Baru Pertama Kali','','2020-07-03','Ya','2','2','','Ya','Tidak Ada','Baik','67','128/20','-','Retrofleksi','-','Pill',4,'2020-07-03','0000-00-00','BDN-0002','Telah Melakukan Pembayaran'),('PRS-001519062020214532','2020-06-19 22:55:59','RM-2020003',2,'20 tahun 2 bulan ','alex','SD','wiraswasta','\r\n        Peserta JKN Penerima Bahan Bantuan Iuran',1,0,'12 Tahun','Pernah Pakai Alat KB','Pill','2020-06-19','Tidak','1','1','','Ya','Tidak Ada','Baik','67','128/20','-','Retrofleksi','-','Pill',4,'2020-06-19','0000-00-00','BDN-0002','Telah Melakukan Pembayaran'),('PRS-2020040001','2020-04-08 23:47:25','RM-2020003',0,'19 Tahun','asas','SD','aas','Peserta JKN Penerima Bahan Bantuan Iuran',1,1,'12 Tahun','Baru Pertama Kali','IUD','2020-04-07','Tidak','2','1','1','Ya','Tidak Ada','Baik','78kg','128','Tidak Ada Tanda-Tanda Radang dan Tumor/Kegaanasan ','Retrofleksi','Tidak Ada Tanda-Tanda Diabetes, Kelainan Pembekukan Darah, Radang Orchitis/Epydimitis dan Tumor/Kega','IUD',0,'2020-04-08','2020-04-30','BDN-0001','Selesai Diperiksa'),('PRS-2020040002','2020-04-08 23:54:02','RM-2020003',0,'19 Tahun','asas','SD','asas','Peserta JKN Penerima Bahan Bantuan Iuran',2,1,'122 tahun','Baru Pertama Kali','IUD','2020-04-10','Tidak','5','5','','Ya','Tidak Ada','Baik','24 kg','5 kg','Tidak Ada Tanda-Tanda Radang dan Tumor/Kegaanasan ','Retrofleksi','Tidak Ada Tanda-Tanda Diabetes, Kelainan Pembekukan Darah, Radang Orchitis/Epydimitis dan Tumor/Kega','IUD',0,'2020-04-15','2020-04-07','BDN-0001','Selesai Diperiksa'),('PRS-2020040003','2020-04-11 00:07:56','RM-2020003',0,'19 Tahun','Alexa','D4','Wiraswasta','Bukan Peserta JKN',1,1,'12 tahun','Baru Pertama Kali','IUD','2020-04-09','Tidak','1','1','','Ya','Tidak Ada','Baik','12 KG','128/10','Tidak Ada Tanda-Tanda Radang dan Tumor/Kegaanasan ginekologi','Retrofleksi','Tidak Ada Tanda-Tanda Diabetes, Kelainan Pembekukan Darah, Radang Orchitis/Epydimitis dan Tumor/Keganasan Ginekologi','Kondom',0,'2020-08-12','0000-00-00','BDN-0001','Selesai Diperiksa'),('PRS-2020040004','2020-04-11 00:14:08','RM-2020003',0,'19 Tahun','asasa','SD','asas','Peserta JKN Penerima Bahan Bantuan Iuran',1,1,'12 tahun','Baru Pertama Kali','','2020-04-09','Tidak','1','1','1','Ya','Tidak Ada','Sedang','56 kg','128/20','Tidak Ada Tanda-Tanda Radang dan Tumor/Kegaanasan ginekologi','Retrofleksi','Tidak Ada Tanda-Tanda Diabetes, Kelainan Pembekukan Darah, Radang Orchitis/Epydimitis dan Tumor/Keganasan Ginekologi','HOP',0,'2020-04-18','0000-00-00','BDN-0001','Selesai Diperiksa'),('PRS-2020040006','2020-04-27 22:51:32','RM-2020003',0,'20 Tahun','','','','',0,0,'','','','0000-00-00','','1','1','1','','','','','','','','','',0,'0000-00-00','0000-00-00','BDN-0001','Selesai Diperiksa'),('PRS-2020050041','2020-05-10 23:15:31','RM-2020003',0,'20 tahun 0 bulan ','alex','SD','Wiraswasta','Peserta JKN Penerima Bahan Bantuan Iuran',1,1,'12 Tahun','Pernah Pakai Alat KB','Suntikan','2020-05-04','Tidak','1','1','','Ya','Tidak Ada','Baik','67','128/80','-','Retrofleksi','-','Suntikan',0,'2020-05-10','0000-00-00','BDN-0002','Selesai Diperiksa'),('PRS-2020050047','2020-05-14 16:39:49','RM-2020003',0,'20 tahun 1 bulan ','Suhirman','SMA','wiraswasta','Peserta JKN Penerima Bahan Bantuan Iuran',2,1,'12 Tahun','Baru Pertama Kali','','2020-05-12','Tidak','2','1','','Ya','Tidak Ada','Baik','67','128/20','-','Retrofleksi','-','Suntikan',0,'2020-05-14','0000-00-00','BDN-0002','Selesai Diperiksa'),('PRS-2020060051','2020-06-01 17:12:47','RM-2020003',0,'20 tahun 1 bulan ','Sukimin','SD','Wiraswasta','Peserta JKN Penerima Bahan Bantuan Iuran',1,1,'12 Tahun','Pernah Pakai Alat KB','Kondom','2020-06-01','Tidak','1','1','1','Ya','Tidak Ada','Baik','60','12','-','Retrofleksi','-','Suntikan',0,'2020-06-02','0000-00-00','BDN-0002','Selesai Diperiksa'),('PRS-2020060073','2020-06-16 00:39:41','RM-2020003',0,'20 tahun 2 bulan ','robi','SMP','Wiraswasta','Bukan Peserta JKN',1,2,'2 tahun','Pernah Pakai Alat KB','Kondom','2020-06-09','Ya','2','2','','Ya','Tidak Ada','Baik','67','128/20','-','Retrofleksi','-','Kondom',2,'2020-06-16','2020-09-16','BDN-0001','Selesai Diperiksa'),('PRS-2020060074','2020-06-16 01:12:47','RM-2020006',2,'29 tahun 1 bulan ','assa','SD','asas','\r\n        Peserta JKN Penerima Bahan Bantuan Iuran',1,1,'12 tahun','Baru Pertama Kali','','2020-06-16','Ya','1','1','','Ya','Tidak Ada','Baik','67','128/20','-','Retrofleksi','-','Kondom',5,'2020-06-16','0000-00-00','BDN-0001','Telah Melakukan Pembayaran'),('PRS-2020060075','2020-06-16 01:04:46','RM-2020004',2,'24 tahun 10 bulan ','asas','SD','asas','\r\n        Peserta JKN Penerima Bahan Bantuan Iuran',2,1,'12 tahun','Baru Pertama Kali','','2020-06-16','Ya','2','2','','Ya','Tidak Ada','Baik','67','128.20','-','Retrofleksi','-','',4,'2020-06-16','0000-00-00','BDN-0001','Telah Melakukan Pembayaran'),('PRS-2020060077','2020-06-16 02:13:22','RM-2020002',2,'20 tahun 8 bulan ','aasas','SD','asas','\r\n        Peserta JKN Penerima Bahan Bantuan Iuran',1,1,'sas','Baru Pertama Kali','','2020-06-16','Ya','1','1','','Ya','Tidak Ada','Baik','67','128/20','-','Retrofleksi','-','IUD',1,'2020-06-16','2020-09-16','BDN-0001','Telah Melakukan Pembayaran');

/*Table structure for table `obat` */

DROP TABLE IF EXISTS `obat`;

CREATE TABLE `obat` (
  `kd_obat` varchar(100) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  PRIMARY KEY (`kd_obat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `obat` */

insert  into `obat`(`kd_obat`,`nama_obat`,`satuan`,`harga`,`stok`) values ('OBT-0001','Acyclovir 200mg','Tablet',1000,45),('OBT-0002','Acyclovir 400mg','Tablet',1500,40),('OBT-0003','Acyclovir Zalf','Tube',7000,50),('OBT-0004','Allopurinol 100mg','Tablet',1000,50),('OBT-0005','Allopuronol 300mg','Tablet',1000,50),('OBT-0006','Alerfed','Tablet',2500,38),('OBT-0007','Ambroxol 30mg','Tablet',1000,50),('OBT-0008','Amblodipine 5mg','Tablet',1000,50),('OBT-0009','Amlodipine 10mg','Tablet',1100,60),('OBT-0010','Amoxcillin 500mg','Tablet',1000,58),('OBT-0011','Asam Mefenamat','Tablet',1000,50),('OBT-0012','Asam Traneksamat 500mg','Tablet',3500,50),('OBT-0013','AB-Intimus','Box',308000,20),('OBT-0014','Betadine 30ml','Botol',26000,50),('OBT-0015','Betadine 5ml','Botol',5500,50),('OBT-0016','Betamethasone Salep','Tube',6200,50),('OBT-0017','Bioplacenton','Tube',24000,50),('OBT-0018','Captopril 25mg','Tablet',1000,50),('OBT-0019','Caviplex','Tablet',1000,50),('OBT-0020','Catizen Drop','Botol',35000,50),('OBT-0021','Cefadroxil 500mg','Kapsul',1800,50),('OBT-0022','Cevadroxil syr','Botol ',13500,50),('OBT-0023','Cevixime syr','Botol ',41000,50),('OBT-0024','Cefixime 100mg','Tablet',3600,50),('OBT-0025','Cetirizine Tab','Tablet',1000,50),('OBT-0026','CTM','Tablet',1000,50),('OBT-0027','Ciprolovaxacin 500mg','Tablet',1100,50),('OBT-0028','Combatrin','Tablet',9000,50),('OBT-0029','Cotrimaxazole syr ','Botol',10000,50),('OBT-0030','Curviplex syr','Botol ',15000,50),('OBT-0031','Curcuma Tab','Tablet',1500,50),('OBT-0032','Cyclofem inj','Vial',17500,50),('OBT-0033','Eflin','Tablet',2000,50),('OBT-0034','Demacolin','Tablet',1800,50),('OBT-0035','Depoprogestin','Vial',12500,50),('OBT-0036','Dexametason Inj','amp',4100,50),('OBT-0037','Dexatamine syr','Botol',45400,50),('OBT-0038','Dextral Tab','tablet',1000,50),('OBT-0039','Dimenhydrinate Tab','Tablet',1000,50),('OBT-0040','Dololicobion','Tablet ',1000,50),('OBT-0041','Dulcolax','Tablet',1000,50),('OBT-0042','Erlamycetin Eyedrop','Botol',22000,50),('OBT-0043','Erlamycetin Eyedrop Plus','Botol',23100,50),('OBT-0044','Erlamycetin Eyexalf','Boto;',11500,50),('OBT-0045','Erlamycetin Eardrop','Botol ',11000,50),('OBT-0046','Exulton ','Tablet ',40000,25),('OBT-0047','Farsifen sfr','Botol',12000,25),('OBT-0048','Fasifen 400mg','Tablet',1000,50),('OBT-0049','Fasidol Drop ','Botol ',22000,35),('OBT-0050','Fasidol syr','Botol',16000,35),('OBT-0051','Faxiden 10mg','Tablet ',1000,50),('OBT-0052','Flacoid/Dexa Kaleng','Tablet',1000,50),('OBT-0053','Flixotide','Nebul ',28000,30),('OBT-0054','Fluranize 5mg tab','Tablet ',2000,50),('OBT-0055','Furosemid ','Tablet ',1000,50),('OBT-0056','Folaplus','Tablet ',1200,50),('OBT-0057','Grahabion','Tablet',1000,50),('OBT-0058','Grastinal-HD','Tablet ',1000,50),('OBT-0059','Genoint Zalf Mata ','ZM ',11000,50),('OBT-0060','GG Tab','Tablet',1000,50),('OBT-0061','Glibenclamid','Tablet',1000,50),('OBT-0062','GOM','Table',5000,40),('OBT-0063','Graflin/salbu 2mg','Tablet',1000,50),('OBT-0064','Grafazole 500 mg','Tablet',1000,50),('OBT-0065','Gentamicin Zalf','Tube',4000,40),('OBT-0066','Guanistrep syr','Botol ',15000,30),('OBT-0067','H-booster syr','Botol ',16000,30),('OBT-0068','Herbati sari asi','Kapsul ',3000,40),('OBT-0069','Herbati Sari Putih','Kapsul',3000,40),('OBT-0070','Histigo','Tablet',1000,50),('OBT-0071','Hufamg syr','Botol',10000,30),('OBT-0072','Hydrocortison 1%','Tube',7500,25),('OBT-0073','Hidrocortison 2,5%','Tube',7500,50),('OBT-0074','Ikamycetin sk','Tube',12000,50),('OBT-0075','Imboost','Tablet',5000,50),('OBT-0076','Itunal Forte','Tablet',1200,50),('OBT-0077','Itunal Merah','Tablet',1000,50),('OBT-0078','Itunal syr','Botol',19000,40),('OBT-0079','Kamidern Zalf','Tube',10500,40),('OBT-0080','Ketorolac 30mg inj','Amp',17500,50),('OBT-0081','Ketoconazole Zalf','Tube',10000,50),('OBT-0082','Lactacyd Baby','Botol',39000,40),('OBT-0083','Lactacyd Wanita','Botol',37000,40),('OBT-0084','Lacto-B','Sach',8800,40),('OBT-0085','Lapisiv Syr','Botol',29000,40),('OBT-0086','Lapisiv Tab','Tablet',1700,50),('OBT-0087','Lasal Expectoran','Botol',45000,50),('OBT-0088','Lasal','Botol',40000,40),('OBT-0089','Laxadine Syr','Botol',48000,50),('OBT-0090','Lerzin/Cetirizine syr','Botol',19000,40),('OBT-0091','Licodexon','Tablet',1000,50),('OBT-0092','Licokalk','Tablet',1000,50),('OBT-0093','Liconam (B6) tab','Tablet',1000,50),('OBT-0094','Licostan (Asmef)','Tablet',1000,50),('OBT-0095','Licodain Inj','Vial',6000,50),('OBT-0096','Lopamid','Tablet',1000,50),('OBT-0097','Loratadine','Tablet',1000,50),('OBT-0098','Maltofer','Tablet',5000,50),('OBT-0099','Mecobalamin 500mg','Kapsul',1800,50),('OBT-0100','Metformin 500mg','Tablet',1000,50),('OBT-0101','Methergin inj','Vial',18000,30),('OBT-0102','Methergin inj bs','Vial',15000,30),('OBT-0103','Microlax Enema','TUbe',37000,30),('OBT-0104','Mucifat Susp','Botol',40000,50),('OBT-0105','Mucos Drop','Botol',40000,50),('OBT-0106','Mucos Syr','Botol',27000,30),('OBT-0107','Meprolut Tab','Tablet',5000,50),('OBT-0108','Neo Kaominal','Botol',15000,50),('OBT-0109','Neurotropic Inj','Vial',2500,50),('OBT-0110','New Antides','Tablet',1000,50),('OBT-0111','New Diabetes','Tablet',1200,50),('OBT-0112','Nifedipine 10mg','Tablet',1000,50),('OBT-0113','Nisagon','Tube',7300,50),('OBT-0114','Norages Inj','Vial',15000,50),('OBT-0115','Obimin - AF','Kapsul ',2500,50),('OBT-0116','Omegtrim 480mg','Tablet',1000,50),('OBT-0117','Omeprazole ','Kapsul',1000,50),('OBT-0118','Ondasetron 4mg inj','Vial',12000,50),('OBT-0119','Ondasetron 4mg tab','Tablet',2500,50),('OBT-0120','OBH syr','Botol',10000,50),('OBT-0121','Planotab','Tablet ',15000,50),('OBT-0122','Potaflam 50mg/kaditic','Tablet',1000,50),('OBT-0123','Praxion 250mg/ml syr','Botol',40000,40),('OBT-0124','Primavon 480mg','Tablet',1000,50),('OBT-0125','Profolat','Tablet',1000,50),('OBT-0126','Paracetamol Kaleng','Tablet',1000,50),('OBT-0127','Paracetamol supp','Suppo',16000,44),('OBT-0128','Pimtracol syr','Botol',17000,40),('OBT-0129','Pyrexin/paracetamol generik','Tablet',1000,50),('OBT-0130','PP Test','Strip',15000,40),('OBT-0131','Provagin Ovula','Suppo',20400,40),('OBT-0132','Ranitidin Inj','Vial',7000,40),('OBT-0133','Reco Tetes Mata','Botol',12800,30),('OBT-0134','Recodyrl Inj','Vial',2000,30),('OBT-0135','Rotho TM','Botol',16500,30),('OBT-0136','Salycyl Fresh Bedak','Botol',17000,40),('OBT-0137','Salbutamol Syr','Botol',10000,40),('OBT-0138','Scopma Plus','Tablet',2100,50),('OBT-0139','Superhoid Supp','Suppo',6700,50),('OBT-0140','Simvastatin 10mg','Tablet',1000,50),('OBT-0141','Simvastatin 20mg','Tablet',1000,50),('OBT-0142','Sintosinon Inj','Vial',32000,50),('OBT-0143','Spasminal','Tablet',1400,50),('OBT-0144','Thrombo Gel','Tube',55000,30),('OBT-0145','Taivit-K Inj','Vial',15200,50),('OBT-0146','Triamcinolone','Tablet',1200,50),('OBT-0147','Triclofem Inj','Vial',17500,40),('OBT-0148','Valenor','Tablet',40000,30),('OBT-0149','Ventolin','Nebul',18000,40),('OBT-0150','Vesverum 10mg','Tablet',1000,40),('OBT-0151','Vesverum Syr','Botol',17500,40),('OBT-0152','Vit. BC Inj','Vial',2000,40),('OBT-0153','Vit. B12','Tablet',1000,50),('OBT-0154','Vit. C','Tablet',1000,40),('OBT-0155','Vit. K4','Tablet',1000,50),('OBT-0156','Vitonal','Tablet',1000,50),('OBT-0157','Yusimox syr','Botol',10500,40),('OBT-0158','Yusimox Forte syr','Botol',25000,40),('OBT-0159','Zirkum Kids syr','Botol',37500,50),('OBT-0160','Zinc Tab','Tablet',11000,50);

/*Table structure for table `owner` */

DROP TABLE IF EXISTS `owner`;

CREATE TABLE `owner` (
  `id_owner` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `tmpt_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_hp` int(20) NOT NULL,
  PRIMARY KEY (`id_owner`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `owner` */

insert  into `owner`(`id_owner`,`nama`,`jk`,`agama`,`alamat`,`tmpt_lahir`,`tgl_lahir`,`no_hp`) values ('OWN-1','Yusuf Mansurs','Laki-Laki','Islam','Bekasi','Bekasi','1999-09-11',1212121);

/*Table structure for table `pasien` */

DROP TABLE IF EXISTS `pasien`;

CREATE TABLE `pasien` (
  `no_rm` varchar(100) NOT NULL,
  `nama_lengkap` varchar(150) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `pekerjaan` varchar(50) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `alergi_obat` text,
  `pendidikan_akhir` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`no_rm`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pasien` */

insert  into `pasien`(`no_rm`,`nama_lengkap`,`jk`,`agama`,`alamat`,`tempat_lahir`,`tgl_lahir`,`pekerjaan`,`no_hp`,`alergi_obat`,`pendidikan_akhir`) values ('RM-2020001','La Risman Wahid','Laki-Laki','Islam','Karangjati RT 16 RW 40 Sinduadi Mlati Sleman Yogayakrta','Yogyakarta','1997-07-17','Mahasiswa','085254181500','Amoxilin','SMA'),('RM-2020002','Erdin Pratama','Laki-Laki','Islam','Sleman','Yogyakarta,Sleman','1999-09-18','Wiraswasta','0897261861','Antalgin, Kataflam','SMA'),('RM-2020003','Renatha Saskia','Perempuan','Katolik','Bantul','Magetan','2000-04-13','Mahasiswa','0897121212','Antalgin','SMA'),('RM-2020004','Rio Pratama','Laki-Laki','Islam','Sleman','Bantul','1995-07-18','Dosen','9091281291','Amoxilin','D3'),('RM-2020005','Reza','Laki-Laki','Islam','Sleman','Sleman','2020-02-02','','','','SD'),('RM-2020006','Aprillia Setiowati','Perempuan','Islam','Sleman','Sleman','1991-05-02','Wiraswasta','089712121','Asam Fenamat','SD'),('RM-2020007','Alex ','Laki-Laki','Islam','Sleman','Sleman','2020-02-03','','','','SD');

/*Table structure for table `pegawai` */

DROP TABLE IF EXISTS `pegawai`;

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `agama` varchar(20) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pegawai` */

insert  into `pegawai`(`id_pegawai`,`nama`,`jabatan`,`alamat`,`agama`,`jk`,`tempat_lahir`,`tanggal_lahir`,`no_hp`) values ('PGW-0001','Dio Pratama Rahmat','Administrasi','Sleaman','Katolik','Laki-Laki','Sleman','1999-09-18','12121212121'),('PGW-0002','Edy Supriyanto Amd','Administrasi','Perum. Gejawan Indah Bill I/162, Balecatur, Gamping, Sleman, Yogyakarta','Islam','Laki-Laki','Magelang','1962-09-27','081802747887'),('PGW-0003','Lely Nisfia Apriana S.Far.,Apt.','Apoteker','Patang Puluhan WB 3, Gg. Dorodasih, No.521, RT 20, RW 04, Yogyakarta','Islam','Perempuan','Magelang','1980-04-11','082241278766');

/*Table structure for table `pembayaran` */

DROP TABLE IF EXISTS `pembayaran`;

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemeriksaan` varchar(100) NOT NULL,
  `tgl_bayar` datetime NOT NULL,
  `tipe_bayar` varchar(50) DEFAULT NULL,
  `no_bpjs` varchar(100) DEFAULT NULL,
  `biaya` int(11) NOT NULL,
  `kd_detpol` varchar(100) NOT NULL,
  `id_bidan` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_pembayaran`),
  KEY `FK_pembayaran` (`id_bidan`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `pembayaran` */

insert  into `pembayaran`(`id_pembayaran`,`id_pemeriksaan`,`tgl_bayar`,`tipe_bayar`,`no_bpjs`,`biaya`,`kd_detpol`,`id_bidan`,`keterangan`) values (1,'PRS-000122062020234711','2020-06-22 23:59:24','umum','',37000,'5','BDN-0001','Telah Melakukan Pembayaran'),(2,'PRS-000223062020003432','2020-06-23 00:37:17','-','-',130000,'2','BDN-0002','Telah Melakukan Pembayaran'),(3,'PRS-000323062020003810','2020-06-23 00:44:05','-','-',30000,'6','BDN-0002','Telah Melakukan Pembayaran'),(4,'PRS-000423062020004725','2020-06-23 00:49:37','-','-',200000,'4','BDN-0002','Telah Melakukan Pembayaran'),(5,'PRS-000524062020135046','2020-06-24 13:54:16','umum','',60000,'5','BDN-0003','Telah Melakukan Pembayaran'),(6,'PRS-000624062020135459','2020-06-24 13:58:16','-','-',130000,'2','BDN-0003','Telah Melakukan Pembayaran'),(7,'PRS-000724062020135850','2020-06-24 14:02:41','-','-',30000,'6','BDN-0003','Telah Melakukan Pembayaran'),(8,'PRS-000830062020021845','2020-06-30 18:02:41','bpjs','12121209090',126000,'5','BDN-0001','Telah Melakukan Pembayaran'),(9,'PRS-000903072020023736','2020-07-03 03:17:18','umum','',45000,'5','BDN-0001','Telah Melakukan Pembayaran'),(10,'PRS-001003072020024827','2020-07-03 03:32:50','-','-',130000,'2','BDN-0001','Telah Melakukan Pembayaran'),(11,'PRS-001003072020024827','2020-07-03 03:32:51','-','-',130000,'2','BDN-0001','Telah Melakukan Pembayaran'),(12,'PRS-001103072020174315','2020-07-03 18:04:19','-','-',30000,'6','BDN-0001','Telah Melakukan Pembayaran'),(13,'PRS-001203072020180440','2020-07-03 18:11:18','-','-',250000,'4','BDN-0001','Telah Melakukan Pembayaran');

/*Table structure for table `pemeriksaan` */

DROP TABLE IF EXISTS `pemeriksaan`;

CREATE TABLE `pemeriksaan` (
  `id_pemeriksaan` varchar(100) NOT NULL,
  `id_dokter` varchar(100) NOT NULL,
  `no_rm` varchar(100) NOT NULL,
  `tgl_pemeriksaan` datetime NOT NULL,
  `anamnesa` text NOT NULL,
  `diagnosa` text NOT NULL,
  `edukasi` text NOT NULL,
  `suhu_badan` varchar(100) NOT NULL,
  `tekanan_darah` varchar(100) NOT NULL,
  `bb` varchar(100) DEFAULT NULL,
  `umur` varchar(50) NOT NULL,
  `kd_detpol` varchar(100) NOT NULL,
  `pelayanan` varchar(50) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_pemeriksaan`),
  KEY `FK_pemeriksaan` (`id_dokter`),
  KEY `FK_pemeriksaan1` (`no_rm`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pemeriksaan` */

insert  into `pemeriksaan`(`id_pemeriksaan`,`id_dokter`,`no_rm`,`tgl_pemeriksaan`,`anamnesa`,`diagnosa`,`edukasi`,`suhu_badan`,`tekanan_darah`,`bb`,`umur`,`kd_detpol`,`pelayanan`,`keterangan`) values ('PRS-000122062020232400','DOK-0001','RM-2020001','2020-01-12 10:00:00','demam','demam','demam','36','128/20','67','22 tahun','5','umum','Telah Diperiksa'),('PRS-000122062020232758','DOK-0001','RM-2020002','2020-02-20 13:00:00','pilek','pilek','kurangi konsumsi makan/minum dingin','36','128/20','70','20 Tahun','5','umum','Telah Diperiksa'),('PRS-000122062020233018','DOK-0001','RM-2020003','2020-02-02 10:30:00','demam','demam','kurangi konsumsi makan/minum es','35','128/20','60','19 Tahun','5','umum','Telah Diperiksa'),('PRS-000122062020233710','DOK-0002','RM-2020006','2020-02-09 19:00:00','Sakit Perut','Diare','Tidak boleh konsumsi makanan pedas','35','128/20','60','19 Tahun','5','umum','Telah Diperiksa'),('PRS-000122062020234711','DOK-0002','RM-2020002','2020-06-22 23:57:55','panas','panas','panas','37','128/20','67','20 tahun 9 bulan ','5','umum','Telah Melakukan Pembayaran'),('PRS-000524062020134748','DOK-0002','RM-2020001','2020-03-03 13:00:00','panas','panas','kurangi makan/minum dingin','37','129/20','67','16 Tahun','5','umum','Telah Diperiksa'),('PRS-000524062020135046','DOK-0001','RM-2020002','2020-06-24 13:53:13','demam','demam','kurangi minum es','37','128/20','67','20 tahun 9 bulan ','5','umum','Telah Melakukan Pembayaran'),('PRS-000830062020021845','DOK-0001','RM-2020002','2020-06-30 18:01:37','sakit tenggorokan','amandel','kurangi makan berminyak','37','128/20','67','20 tahun 9 bulan ','5','bpjs','Telah Melakukan Pembayaran'),('PRS-000903072020023736','DOK-0001','RM-2020001','2020-07-03 03:07:02','radang tenggorokan, panas dingin, mual','malaria','istirahat yg cukup','37','128/20','67','22 tahun 11 bulan ','5','umum','Telah Melakukan Pembayaran');

/*Table structure for table `pendaftaran` */

DROP TABLE IF EXISTS `pendaftaran`;

CREATE TABLE `pendaftaran` (
  `id_pemeriksaan` varchar(100) NOT NULL,
  `tgl_pendaftaran` datetime NOT NULL,
  `pelayanan` varchar(50) DEFAULT NULL,
  `id_bidan` varchar(100) DEFAULT NULL,
  `id_dokter` varchar(100) DEFAULT NULL,
  `no_rm` varchar(100) NOT NULL,
  `kd_detpol` int(11) NOT NULL,
  `umur` varchar(20) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_pemeriksaan`),
  KEY `FK_pendaftaran` (`id_dokter`),
  KEY `FK_pendaftaran1` (`id_bidan`),
  KEY `FK_pendaftaran2` (`no_rm`),
  KEY `FK_pendaftaran4` (`kd_detpol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pendaftaran` */

insert  into `pendaftaran`(`id_pemeriksaan`,`tgl_pendaftaran`,`pelayanan`,`id_bidan`,`id_dokter`,`no_rm`,`kd_detpol`,`umur`,`keterangan`) values ('PRS-000122062020234711','2020-06-22 23:47:00','umum',NULL,'DOK-0002','RM-2020002',5,'20 tahun 9 bulan ','Telah Melakukan Pembayaran'),('PRS-000223062020003432','2020-06-23 00:34:00',NULL,'BDN-0001',NULL,'RM-2020003',2,'20 tahun 2 bulan ','Telah Melakukan Pembayaran'),('PRS-000323062020003810','2020-06-23 00:38:00',NULL,'BDN-0001',NULL,'RM-2020006',6,'29 tahun 1 bulan ','Telah Melakukan Pembayaran'),('PRS-000423062020004725','2020-06-23 00:47:00',NULL,'BDN-0001',NULL,'RM-2020005',4,'4 bulan ','Telah Melakukan Pembayaran'),('PRS-000524062020135046','2020-06-24 13:50:00','umum',NULL,'DOK-0001','RM-2020002',5,'20 tahun 9 bulan ','Telah Melakukan Pembayaran'),('PRS-000624062020135459','2020-06-24 13:54:00',NULL,'BDN-0001',NULL,'RM-2020003',2,'20 tahun 2 bulan ','Telah Melakukan Pembayaran'),('PRS-000724062020135850','2020-06-24 13:58:00',NULL,'BDN-0001',NULL,'RM-2020006',6,'29 tahun 1 bulan ','Telah Melakukan Pembayaran'),('PRS-000830062020021845','2020-06-30 02:18:00','bpjs',NULL,'DOK-0001','RM-2020002',5,'20 tahun 9 bulan ','Telah Melakukan Pembayaran'),('PRS-000903072020023736','2020-07-03 08:00:00','umum',NULL,'DOK-0001','RM-2020001',5,'22 tahun 11 bulan ','Telah Melakukan Pembayaran'),('PRS-001003072020024827','2020-07-03 16:00:00',NULL,'BDN-0002',NULL,'RM-2020003',2,'20 tahun 2 bulan ','Telah Melakukan Pembayaran'),('PRS-001103072020174315','2020-07-03 17:43:00',NULL,'BDN-0002',NULL,'RM-2020006',6,'29 tahun 2 bulan ','Telah Melakukan Pembayaran'),('PRS-001203072020180440','2020-07-03 18:04:00',NULL,'BDN-0002',NULL,'RM-2020007',4,'5 bulan ','Telah Melakukan Pembayaran');

/*Table structure for table `poly` */

DROP TABLE IF EXISTS `poly`;

CREATE TABLE `poly` (
  `kd_poly` varchar(100) NOT NULL,
  `nama_poly` varchar(50) NOT NULL,
  PRIMARY KEY (`kd_poly`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `poly` */

insert  into `poly`(`kd_poly`,`nama_poly`) values ('POLY-01','Umum'),('POLY-02','Kesahatan Ibu dan Anak');

/*Table structure for table `resep_obat` */

DROP TABLE IF EXISTS `resep_obat`;

CREATE TABLE `resep_obat` (
  `id_resep` varchar(100) NOT NULL,
  `id_pemeriksaan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_resep`),
  KEY `FK_resep_obat2` (`id_pemeriksaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `resep_obat` */

insert  into `resep_obat`(`id_resep`,`id_pemeriksaan`) values ('RSP-0001','PRS-000122062020232400'),('RSP-0002','PRS-000122062020232758'),('RSP-0003','PRS-000122062020233018'),('RSP-0004','PRS-000122062020233710'),('RSP-0005','PRS-000122062020234251'),('RSP-0006','PRS-000122062020234711'),('RSP-0007','PRS-000524062020134748'),('RSP-0008','PRS-000524062020135046'),('RSP-0009','PRS-000830062020021845'),('RSP-0010','PRS-000903072020023736');

/*Table structure for table `tmp_detresep` */

DROP TABLE IF EXISTS `tmp_detresep`;

CREATE TABLE `tmp_detresep` (
  `id_detresep` int(11) NOT NULL AUTO_INCREMENT,
  `id_resep` varchar(100) NOT NULL,
  `kd_obat` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `aturan_minum` text NOT NULL,
  PRIMARY KEY (`id_detresep`),
  KEY `FK_tmp_detresep_tmp` (`id_resep`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `tmp_detresep` */

insert  into `tmp_detresep`(`id_detresep`,`id_resep`,`kd_obat`,`jumlah`,`satuan`,`aturan_minum`) values (1,'RSP-0001','OBT-0001',12,'Tablet','2 x sehari'),(2,'RSP-0002','OBT-0003',4,'Tube','2 x sehari'),(3,'RSP-0003','OBT-0002',12,'Tablet','3 x sehari'),(4,'RSP-0004','OBT-0149',10,'Nebul','1 x sehari'),(5,'RSP-0004','OBT-0010',6,'Tablet','2 x sehari'),(6,'RSP-0005','OBT-0002',10,'Tablet','3 x sehari'),(7,'RSP-0006','OBT-0001',5,'Tablet','1 x sehari'),(8,'RSP-0006','OBT-0010',2,'Tablet','1 x sehari'),(9,'RSP-0007','OBT-0002',10,'Tablet','2 x sehari'),(10,'RSP-0008','OBT-0006',12,'Tablet','3 x sehari'),(11,'RSP-0009','OBT-0127',6,'Suppo','2 x sehari'),(12,'RSP-0010','OBT-0002',10,'Tablet','2 x sehari');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pasword` varchar(500) NOT NULL,
  `level` varchar(50) NOT NULL,
  `status` enum('aktif','tidak_aktif') NOT NULL DEFAULT 'aktif',
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`no`,`id_user`,`nama`,`email`,`pasword`,`level`,`status`) values (2,'BDN-0001','Mayasari Amd.Keb','ridaw@gmail.com','$2y$10$KQqR.EqkrzQlU7mgGWqHQu.5urkDAP93z56kJjOP4PIidtpX8JJCW','Bidan','aktif'),(3,'PGW-0001','Dio Pratama Rahmat','Diop@gmail.com','$2y$10$pLJcaN/NkCBMj2smkUzuA.ht2uvRBTdoaamd4a.kD5x6XgfSqXYCC','Administrasi','aktif'),(4,'PGW-0002','Ciko Jericho','Cikoj@yahoo.com','$2y$10$ZjCbiAhIFMaXrJ./mYScm.TM4sqSjhJ.77aCPrG.15AHYgYm7GZGu','Apoteker','aktif'),(7,'OWN-1','Yusuf Mansurs','yusufm@yahoo.com','$2y$10$oiNVRVwFZWKQsMuRpfSFL.t4WLeGQAuZhjcdGVHmEyEzFSU6anX92','Owner','aktif'),(8,'DOK-0001','dr. Neli Witasari','neliwitasari@gmail.com','$2y$10$gjejVTL3eS7lRvYUheyTZ.9gYlXfW5W7p6w9WS98CbAlWUCxBO/wW','Dokter','aktif'),(9,'DOK-0002','dr. Trigis Thursina','trigisthursina@gmail.com','$2y$10$IWbfmqt7BzbRrZMzBaUgWuw3imX62Iim2pr6SX.KAlJeGSvMXbCa.','Dokter','aktif'),(10,'BDN-0001','Mayasari Amd.Keb','mayasari@gmail.com','$2y$10$bFJtcNzFjGMpitDhDOeXPuNXtig3JnSyaU4.PZZrvlar3ZZoIEmPG','Bidan','aktif'),(11,'BDN-0002','Indah Cahyani Amd.Keb','indahc@gmail.com','$2y$10$/V4VWzcmqOBeroJHoVrT6O6My7Xg3bBEXbFRIjgWvuEvaWQqXnxq6','Bidan','aktif'),(12,'BDN-0003','Nur Hamidah Amd.Keb','nurhamidah@gmail.com','$2y$10$fQpa87yxNYEUesXZkXlSIOH30hki6XknqAeHa.omes8LUSptBKHx.','Bidan','aktif'),(13,'BDN-0004','Widiya Nur Hamudah Amd.Keb','widiyanh@gmail.com','$2y$10$AH/Z0VoTY9HNixIkBz.BZeUREJAlWwtXOiDJ09C8gq1qy1KFiO99e','Bidan','aktif'),(14,'PGW-0002','Edy Supriyanto Amd','edys@gmail.com','$2y$10$Q9k3Rclhc1Ierq8doGBjF.RPj3/xrNZiG2taq/CiGkyDzca7.wy6a','Administrasi','aktif'),(15,'PGW-0003','Lely Nisfia Apriana S.Far.,Apt.','lelyna@gmail.com','$2y$10$rFdPrFuYlEPH1ui.Gsa9zeQ4ACg32oGJ6mJZ/KaI95mV7ABQ87EaK','Apoteker','aktif');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
