<?php

namespace App\Models;

use CodeIgniter\Model;

class PendidikanPegModel extends Model
{
    protected $table = 'pendidikan_pegawai';
    protected $primaryKey = 'pend_peg_id';

    protected $allowedFields = ['pegawai_id', 'jenis_pend_id', 'jenj_pend_id', 'nama_pendidikan', 'penyelenggara', 'tanggal_ijazah', 'tahun_lulus', 'nomor_ijazah', 'keterangan', 'file'];

    public function getData($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['pend_peg_id' => $id]);
        }
    }
}
