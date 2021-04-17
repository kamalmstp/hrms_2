<?php

namespace App\Models;

use CodeIgniter\Model;

class InventarisModel extends Model
{
    protected $table = 'inventaris';
    protected $primaryKey = 'inventaris_id';

    protected $allowedFields = ['inventaris', 'keterangan', 'nama_barang', 'nomor_seri', 'merk', 'unit', 'jumlah', 'lokasi', 'keterangan', 'foto', 'created_at'];

    public function getData($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['inventaris_id' => $id]);
        }
    }
}
