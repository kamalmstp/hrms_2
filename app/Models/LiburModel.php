<?php

namespace App\Models;

use CodeIgniter\Model;

class LiburModel extends Model
{
    protected $table = 'hari_libur';
    protected $primaryKey = 'libur_id';

    protected $allowedFields = ['tgl_libur', 'keterangan'];

    public function getData($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['libur_id' => $id]);
        }
    }

    public function cek_libur($tgl)
    {
        return $this->getWhere(['tgl_libur' => $tgl]);
    }

    public function total($mulai, $selesai)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('hari_libur');
        $builder->where("tgl_libur BETWEEN '" . $mulai . "' AND '" . $selesai . "'");

        return $builder->get();
    }
}
