
CREATE TABLE `satker` (
  `satker_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nama` VARCHAR(50) DEFAULT NULL,
  `keterangan` VARCHAR(100) DEFAULT NULL
);

CREATE TABLE `jabatan_pegawai` (
  `jab_peg_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `pegawai_id` int(11) DEFAULT NULL,
  `nama_jabatan` VARCHAR(50) DEFAULT NULL,
  `tmt_jabatan` date DEFAULT NULL,
  `tanggal_sk` date DEFAULT NULL,
  `nomor_sk` VARCHAR(50) DEFAULT NULL,
  `satker_id` int(11) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `file` longtext DEFAULT NULL,
  `status` char(2) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);