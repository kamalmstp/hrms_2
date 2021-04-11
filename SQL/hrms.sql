
CREATE TABLE `districts` (
  `id` char(7) COLLATE utf8_unicode_ci NOT NULL,
  `regency_id` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `hubkel` (
  `hubkel_id` int(11) NOT NULL,
  `hubkel` varchar(50) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `izin` (
  `izin_id` int(11) NOT NULL,
  `izin_jenis_id` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `izin_jenis` (
  `izin_jenis_id` int(11) NOT NULL,
  `nama` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `izin_pegawai` (
  `izin_pegawai_id` int(11) NOT NULL,
  `izin_id` int(11) DEFAULT NULL,
  `izin_jenis_id` int(11) DEFAULT NULL,
  `pegawai_id` int(11) DEFAULT NULL,
  `tanggal_awal` date DEFAULT NULL,
  `tanggal_akhir` date DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `file` longtext DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `jenis_pegawai` (
  `jenis_pegawai_id` int(11) NOT NULL,
  `jenis_pegawai` varchar(50) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `jenis_pendidikan` (
  `jenis_pend_id` int(11) NOT NULL,
  `jenis_pendidikan` varchar(50) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `jenjang_pendidikan` (
  `jenj_pend_id` int(11) NOT NULL,
  `jenjang_pendidikan` varchar(50) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `pegawai` (
  `pegawai_id` int(11) NOT NULL,
  `jenis_pegawai_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gelar_depan` varchar(20) DEFAULT NULL,
  `gelar_belakang` varchar(20) DEFAULT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('P','L') DEFAULT NULL,
  `status_perkawin` enum('Belum Menikah','Menikah','Janda Cerai','Janda Mati','Duda Cerai','Duda Mati') NOT NULL,
  `provinsi` varchar(2) DEFAULT NULL,
  `kota` varchar(4) DEFAULT NULL,
  `kecamatan` varchar(6) DEFAULT NULL,
  `kelurahan` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `rekening` varchar(24) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `status_pegawai` int(1) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `periode` (
  `periode_id` int(11) NOT NULL,
  `kode` varchar(10) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_akhir` date DEFAULT NULL,
  `wajib` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `provinces` (
  `id` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `regencies` (
  `id` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `province_id` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` longtext DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL,
  `pegawai_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `villages` (
  `id` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `district_id` char(7) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `pendidikan_pegawai` (
  `pend_peg_id` int(11) NOT NULL,
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

CREATE TABLE `keluarga_pegawai` (
  `kel_peg_id` int(11) NOT NULL,
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

ALTER TABLE `keluarga_pegawai`
  ADD PRIMARY KEY (`kel_peg_id`),
  ADD KEY `pegawai_kel_id_index` (`pegawai_id`),
  ADD KEY `hubkel_peg_id_index` (`hubkel_id`),
  ADD KEY `jenjang_kel_id_index` (`jenj_pend_id`);

ALTER TABLE `pendidikan_pegawai`
  ADD PRIMARY KEY (`pend_peg_id`),
  ADD KEY `pegawai_pend_id_index` (`pegawai_id`),
  ADD KEY `jenis_pend_pendpeg_id_index` (`jenis_pend_id`),
  ADD KEY `jenj_pend_pendpeg_id_index` (`jenj_pend_id`),

ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_id_index` (`regency_id`);

ALTER TABLE `hubkel`
  ADD PRIMARY KEY (`hubkel_id`);

ALTER TABLE `izin`
  ADD PRIMARY KEY (`izin_id`);
  ADD KEY `izin_id_index` (`izin_jenis_id`);

ALTER TABLE `izin_jenis`
  ADD PRIMARY KEY (`izin_jenis_id`);

ALTER TABLE `izin_pegawai`
  ADD PRIMARY KEY (`izin_pegawai_id`),
  ADD KEY `izin_peg_id_index` (`izin_id`),
  ADD KEY `izin_peg_jen_id_index` (`izin_jenis_id`),
  ADD KEY `izin_pegid_index` (`pegawai_id`);

ALTER TABLE `jenis_pegawai`
  ADD PRIMARY KEY (`jenis_pegawai_id`);

ALTER TABLE `jenis_pendidikan`
  ADD PRIMARY KEY (`jenis_pend_id`);

ALTER TABLE `jenjang_pendidikan`
  ADD PRIMARY KEY (`jenj_pend_id`);

ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`pegawai_id`),
  ADD KEY `jenis_peg_id_index` (`jenis_pegawai_id`),
  ADD UNIQUE KEY `nik` (`nik`,`email`);

ALTER TABLE `periode`
  ADD PRIMARY KEY (`periode_id`);

ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `regencies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `regencies_province_id_index` (`province_id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);
  ADD KEY `users_peg_id_index` (`pegawai_id`);

ALTER TABLE `villages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `villages_district_id_index` (`district_id`);

ALTER TABLE `hubkel`
  MODIFY `hubkel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `pendidikan_pegawai`
  MODIFY `pend_peg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `keluarga_pegawai`
  MODIFY `kel_peg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `izin`
  MODIFY `izin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `izin_jenis`
  MODIFY `izin_jenis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `izin_pegawai`
  MODIFY `izin_pegawai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `jenis_pegawai`
  MODIFY `jenis_pegawai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

ALTER TABLE `jenis_pendidikan`
  MODIFY `jenis_pend_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `jenjang_pendidikan`
  MODIFY `jenj_pend_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `pegawai`
  MODIFY `pegawai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

ALTER TABLE `periode`
  MODIFY `periode_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

ALTER TABLE `districts`
  ADD CONSTRAINT `districts_regency_id_foreign` FOREIGN KEY (`regency_id`) REFERENCES `regencies` (`id`);

ALTER TABLE `regencies`
  ADD CONSTRAINT `regencies_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`);

ALTER TABLE `villages`
  ADD CONSTRAINT `villages_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`);

ALTER TABLE `izin`
  ADD CONSTRAINT `izin_id_foreign` FOREIGN KEY (`izin_jenis_id`) REFERENCES `izin_jenis` (`izin_jenis_id`);

ALTER TABLE `izin_pegawai`
  ADD CONSTRAINT `izin_peg_id_foreign` FOREIGN KEY (`izin_id`) REFERENCES `izin` (`izin_id`),
  ADD CONSTRAINT `izin_peg_jen_id_foreign` FOREIGN KEY (`izin_jenis_id`) REFERENCES `izin_jenis` (`izin_jenis_id`),
  ADD CONSTRAINT `izin_pegid_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`pegawai_id`);

ALTER TABLE `pegawai`
  ADD CONSTRAINT `jenis_peg_id_foreign` FOREIGN KEY (`jenis_pegawai_id`) REFERENCES `jenis_pegawai` (`jenis_pegawai_id`);

ALTER TABLE `users`
  ADD CONSTRAINT `users_peg_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`pegawai_id`);

ALTER TABLE `keluarga_pegawai`
  ADD CONSTRAINT `pegawai_kel_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`pegawai_id`),
  ADD CONSTRAINT `hubkel_peg_id_foreign` FOREIGN KEY (`hubkel_id`) REFERENCES `hubkel` (`hubkel_id`),
  ADD CONSTRAINT `jenjang_kel_id_foreign` FOREIGN KEY (`jenj_pend_id`) REFERENCES `jenjang_pendidikan` (`jenj_pend_id`);

ALTER TABLE `pendidikan_pegawi`
  ADD CONSTRAINT `pegawai_pend_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`pegawai_id`),
  ADD CONSTRAINT `jenis_pend_pendpeg_id_foreign` FOREIGN KEY (`jenis_pend_id`) REFERENCES `jenis_pendidikan` (`jenis_pend_id`),
  ADD CONSTRAINT `jenj_pend_pendpeg_id_foreign` FOREIGN KEY (`jenj_pend_id`) REFERENCES `jenjang_pendidikan` (`jenj_pend_id`);

COMMIT;
