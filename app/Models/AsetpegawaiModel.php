<?php namespace App\Models;

use CodeIgniter\Model;

class AsetpegawaiModel extends Model
{
    protected $table = "aset_pegawai";
    protected $primaryKey = "aset_pegawai_id";
    protected $allowedFields = ['nama','jumlah', 'keterangan', 'pegawai_id'];

    public function getData($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['aset_pegawai_id' => $id]);
        }
    }

}
