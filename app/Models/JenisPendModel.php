<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisPendModel extends Model
{
    protected $table = 'jenis_pendidikan';
    protected $primaryKey = 'jenis_pend_id';

    protected $allowedFields = ['jenis_pendidikan', 'keterangan'];

    public function getData($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['jenis_pend_id' => $id]);
        }
    }
}
