CREATE TABLE `keluarga_pegawai` (
  `kel_peg_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `pegawai_id` int(11) DEFAULT NULL,
  `hubkel_id` int(11) DEFAULT NULL,
  `jenj_pend_id` int(11) DEFAULT NULL,
  `nama` VARCHAR(50) DEFAULT NULL,
  `jenis_kelamin` enum('P','L') DEFAULT NULL,
  `tempat_lahir` VARCHAR(50) DEFAULT NULL,
  `tanggal_lahir` DATE DEFAULT NULL,
  `telepon` VARCHAR(20) DEFAULT NULL,
  `email` VARCHAR(50) DEFAULT NULL,
  `alamat` LONGTEXT DEFAULT NULL
);