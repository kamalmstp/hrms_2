<?php

namespace App\Models;

use CodeIgniter\Model;

class KeluargaPegModel extends Model
{
    protected $table = 'keluarga_pegawai';
    protected $primaryKey = 'kel_peg_id';

    protected $allowedFields = ['pegawai_id', 'hubkel_id', 'jenj_pend_id', 'nama', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'telepon', 'alamat', 'email'];

    public function getData($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['kel_peg_id' => $id]);
        }
    }
}
