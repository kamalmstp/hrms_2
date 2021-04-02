<?php

namespace App\Models;

use CodeIgniter\Model;

class KelModel extends Model
{
    protected $table = 'villages';
    protected $primaryKey = 'id';

    protected $allowedFields = ['name'];

    public function getData($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['district_id' => $id]);
        }
    }
}
