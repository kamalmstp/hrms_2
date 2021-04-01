<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisPegModel extends Model
{
    protected $table = 'jenis_pegawai';
    protected $primaryKey = 'jenis_pegawai_id';

    protected $allowedFields = ['jenis_pegawai', 'keterangan'];

    public function getData($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['jenis_pegawai_id' => $id]);
        }
    }
}
