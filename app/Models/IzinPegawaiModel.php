<?php

namespace App\Models;

use CodeIgniter\Model;

class IzinPegawaiModel extends Model
{
    protected $table = 'izin_pegawai';
    protected $primaryKey = 'izin_pegawai_id';

    protected $allowedFields = ['izin_id', 'pegawai_id', 'tanggal_awal', 'tanggal_akhir', 'keterangan', 'status', 'file', 'created_at'];

    public function getData($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['izin_pegawai_id' => $id]);
        }
    }
}
