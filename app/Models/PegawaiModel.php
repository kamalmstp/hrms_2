<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table = 'pegawai';
    protected $primaryKey = 'pegawai_id';

    protected $allowedFields = ['jenis_pegawai_id', 'nama', 'gelar_depan', 'gelar_belakang', 'nip', 'nik', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'status_perkawin', 'provinsi', 'kota', 'kecamatan', 'kelurahan', 'alamat', 'telepon', 'email', 'rekening', 'gambar', 'keterangan', 'status_pegawai'];

    public function getData($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['pegawai_id' => $id]);
        }
    }
}
