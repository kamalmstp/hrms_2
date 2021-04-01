<?php

namespace App\Models;

use CodeIgniter\Model;

class JenjPendModel extends Model
{
    protected $table = 'jenjang_pendidikan';
    protected $primaryKey = 'jenj_pend_id';

    protected $allowedFields = ['jenjang_pendidikan', 'keterangan'];

    public function getData($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['jenj_pend_id' => $id]);
        }
    }
}
