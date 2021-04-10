CREATE TABLE `pendidikan_pegawai` (
  `pend_peg_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `pegawai_id` int(11) DEFAULT NULL,
  `jenis_pend_id` int(11) DEFAULT NULL,
  `jenj_pend_id` int(11) DEFAULT NULL,
  `nama_pendidikan` VARCHAR(50) DEFAULT NULL,
  `penyelenggara` VARCHAR(50) DEFAULT NULL,
  `tanggal_ijazah` DATE DEFAULT NULL,
  `tahun_lulus` int(4) DEFAULT NULL,
  `nomor_ijazah` VARCHAR(50) DEFAULT NULL,
  `keterangan` VARCHAR(100) DEFAULT NULL,
  `file` LONGTEXT DEFAULT NULL
);