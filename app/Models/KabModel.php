<?php

namespace App\Models;

use CodeIgniter\Model;

class KabModel extends Model
{
    protected $table = 'regencies';
    protected $primaryKey = 'id';

    protected $allowedFields = ['name'];

    public function getData($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['province_id' => $id]);
        }
    }
}
