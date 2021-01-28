<?php namespace App\Models;

use CodeIgniter\Model;

class BidangModel extends Model
{
    protected $table = "bidang";
    protected $primaryKey = "bidang_id";
    protected $allowedFields = ['nama','ket'];

    public function getData($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['bidang_id' => $id]);
        }
    }

}