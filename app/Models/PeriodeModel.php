<?php namespace App\Models;

use CodeIgniter\Model;

class PeriodeModel extends Model
{
    protected $table = "periode";
    protected $primaryKey = "periode_id";
    protected $allowedFields = ['kode','date_start', 'date_end', 'total'];

    public function getData($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['periode_id' => $id]);
        }
    }

}