<?php namespace App\Models;

use CodeIgniter\Model;

class AsetyayasanModel extends Model
{
    protected $table = "aset_yayasan";
    protected $primaryKey = "aset_yayasan_id";
    protected $allowedFields = ['nama','jumlah', 'keterangan', 'file'];

    public function getData($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['periode_id' => $id]);
        }
    }

}