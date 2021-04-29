<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamanModel extends Model
{
    protected $table = 'peminjaman_inventaris';
    protected $primaryKey = 'peminjaman_id';

    protected $allowedFields = ['inventaris_id', 'pegawai_id', 'tanggal_pinjam', 'tanggal_kembali', 'lokasi_pinjam', 'foto', 'jumlah', 'keperluan', 'status', 'created_at'];

    public function getData($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['peminjaman_id' => $id]);
        }
    }

    public function cek_jumlah($inventaris_id)
    {
        return $this->selectSum('jumlah')->getWhere(['inventaris_id' => $inventaris_id, 'status' => 'Diterima']);
    }
}
