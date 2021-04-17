CREATE TABLE `inventaris` (
  `inventaris_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nama_barang` VARCHAR(50) DEFAULT NULL,
  `nomor_seri` VARCHAR(20) DEFAULT NULL,
  `merk` VARCHAR(50) DEFAULT NULL,
  `unit` VARCHAR(20) DEFAULT NULL,
  `lokasi` VARCHAR(50) DEFAULT NULL,
  `keterangan` VARCHAR(100) DEFAULT NULL,
  `jumlah` INT(11) DEFAULT NULL,
  `foto` longtext DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);

CREATE TABLE `peminjaman_inventaris` (
  `peminjaman_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `inventaris_id` int(50) DEFAULT NULL,
  `pegawai_id` int(20) DEFAULT NULL,
  `tanggal_pinjam` datetime DEFAULT NULL,
  `tanggal_kembali` datetime DEFAULT NULL,
  `lokasi_pinjam` VARCHAR(50) DEFAULT NULL,
  `keperluan` VARCHAR(100) DEFAULT NULL,
  `jumlah` INT(11) DEFAULT NULL,
  `status` VARCHAR(20) DEFAULT NULL,
  `foto` longtext DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);