<?php

namespace App\Models;

use CodeIgniter\Model;

class IzinJenisModel extends Model
{
    protected $table = 'izin_jenis';
    protected $primaryKey = 'izin_jenis_id';

    protected $allowedFields = ['nama'];

    public function getData($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['izin_jenis_id' => $id]);
        }
    }
}
