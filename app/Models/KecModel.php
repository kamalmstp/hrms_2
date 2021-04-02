<?php

namespace App\Models;

use CodeIgniter\Model;

class KecModel extends Model
{
    protected $table = 'districts';
    protected $primaryKey = 'id';

    protected $allowedFields = ['name'];

    public function getData($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['regency_id' => $id]);
        }
    }
}
