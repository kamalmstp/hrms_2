<?php

namespace App\Models;

use CodeIgniter\Model;

class JabatanPegModel extends Model
{
    protected $table = 'jabatan_pegawai';
    protected $primaryKey = 'jab_peg_id';

    protected $allowedFields = ['pegawai_id', 'nama_jabatan', 'tmt_jabatan', 'tanggal_sk', 'nomor_sk', 'satker_id', 'keterangan', 'file', 'status', 'created_at'];

    public function getData($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['jab_peg_id' => $id]);
        }
    }
}
