<?php

namespace App\Models;

use CodeIgniter\Model;

class IzinModel extends Model
{
    protected $table = 'izin';
    protected $primaryKey = 'izin_id';

    protected $allowedFields = ['nama','izin_jenis_id'];

    public function getData($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['izin_id' => $id]);
        }
    }
}
