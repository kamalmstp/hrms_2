<?php

namespace App\Models;

use CodeIgniter\Model;

class HubkelModel extends Model
{
    protected $table = 'hubkel';
    protected $primaryKey = 'hubkel_id';

    protected $allowedFields = ['hubkel', 'keterangan'];

    public function getData($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['hubkel_id' => $id]);
        }
    }
}
