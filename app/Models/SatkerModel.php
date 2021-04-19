<?php

namespace App\Models;

use CodeIgniter\Model;

class SatkerModel extends Model
{
    protected $table = 'satker';
    protected $primaryKey = 'satker_id';

    protected $allowedFields = ['nama', 'keterangan'];

    public function getData($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['satker_id' => $id]);
        }
    }
}
