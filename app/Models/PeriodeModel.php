<?php

namespace App\Models;

use CodeIgniter\Model;

class PeriodeModel extends Model
{
    protected $table = 'periode';
    protected $primaryKey = 'periode_id';

    protected $allowedFields = ['kode', 'tanggal_mulai', 'tanggal_akhir', 'wajib', 'status'];

    public function getData($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['periode_id' => $id]);
        }
    }

    public function aktif()
    {
        return $this->getWhere(['status' => '1']);
    }
}
