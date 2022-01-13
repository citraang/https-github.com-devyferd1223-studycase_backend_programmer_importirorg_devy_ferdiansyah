/*
SQLyog Ultimate v11.5 (64 bit)
MySQL - 5.7.33 : Database - dbtesimportir_devy_ferdiansyah
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbtesimportir_devy_ferdiansyah` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dbtesimportir_devy_ferdiansyah`;

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `sku` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_barang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_barang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok_barang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`sku`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `barang` */

insert  into `barang`(`sku`,`id_kategori`,`nama_barang`,`harga_barang`,`stok_barang`,`created_at`,`updated_at`) values ('B001',1,'Kemejea Tangan Panjang','135000','111','2022-01-13 13:30:04','2022-01-13 07:05:13'),('B002',2,'Pensil','10000','25','2022-01-13 08:23:37','2022-01-13 08:23:37'),('B003',1,'Kaos Oblong','100000','33','2022-01-20 08:24:29','2022-01-13 08:24:29'),('B004',2,'Pulpen','20000','31','2022-01-20 08:24:51','2022-01-13 08:24:51'),('B005',2,'Penghapus','5000','15','2021-12-09 08:25:20','2022-01-13 08:25:20'),('B006',2,'Buku Tulis','25000','40','2021-12-08 08:25:37','2022-01-13 08:25:37'),('B007',1,'Celana Jeans','500000','14','2021-12-08 08:26:05','2022-01-13 08:26:05'),('B008',1,'Celana Bahan','300000','18','2021-12-06 08:26:21','2022-01-13 08:26:21');

/*Table structure for table `barang_keluar` */

DROP TABLE IF EXISTS `barang_keluar`;

CREATE TABLE `barang_keluar` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sku` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_keluar` date NOT NULL,
  `jml_barang` int(11) NOT NULL,
  `petugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `barang_keluar` */

insert  into `barang_keluar`(`id`,`sku`,`tgl_keluar`,`jml_barang`,`petugas`,`created_at`,`updated_at`) values (2,'B002','2002-01-13',11,'Devy Ferdiansyah','2022-01-13 08:14:46','2022-01-13 08:14:46');

/*Table structure for table `barang_masuk` */

DROP TABLE IF EXISTS `barang_masuk`;

CREATE TABLE `barang_masuk` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sku` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_masuk` date NOT NULL,
  `jml_barang` int(11) NOT NULL,
  `petugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `barang_masuk` */

insert  into `barang_masuk`(`id`,`sku`,`tgl_masuk`,`jml_barang`,`petugas`,`created_at`,`updated_at`) values (2,'B002','2002-01-13',11,'Devy Ferdiansyah','2022-01-13 07:42:18','2022-01-13 07:42:18');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `kategori_barang` */

DROP TABLE IF EXISTS `kategori_barang`;

CREATE TABLE `kategori_barang` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kategori_barang` */

insert  into `kategori_barang`(`id`,`nama_kategori`,`created_at`,`updated_at`) values (1,'Pakaian','2022-01-13 05:59:06','2022-01-13 06:24:26'),(2,'Alat Tulis Kantor','2022-01-13 05:59:29','2022-01-13 05:59:29'),(3,'Perlengkapan Dapur','2022-01-13 06:22:01','2022-01-13 06:22:01');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2022_01_13_014638_create_role_user_table',2),(5,'2022_01_13_053951_create_barang_table',3),(6,'2022_01_13_054438_create_kategori_barang_table',3),(7,'2022_01_13_071533_create_barang_masuk_table',4),(8,'2022_01_13_071548_create_barang_keluar_table',4);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `role_user` */

DROP TABLE IF EXISTS `role_user`;

CREATE TABLE `role_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `role_user` */

insert  into `role_user`(`id`,`role_name`,`created_at`,`updated_at`) values (1,'Admin','2022-01-13 05:32:25','2022-01-13 05:32:25'),(2,'Staff Gudang','2022-01-13 05:33:05','2022-01-13 05:33:05');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_role_id_unique` (`role_id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`role_id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values (4,'1','Devy Ferdiansyah','devyferd1223@gmail.com',NULL,'$2y$10$Rr4vNTE1TRNa.Qo5lijgKOz4p/cyN/cCR.qk8uCGg4ajFtULtbBWC',NULL,'2022-01-13 02:34:12','2022-01-13 02:34:12');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
