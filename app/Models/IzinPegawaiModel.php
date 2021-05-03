<?php

namespace App\Models;

use CodeIgniter\Model;

class IzinPegawaiModel extends Model
{
    protected $table = 'izin_pegawai';
    protected $primaryKey = 'izin_pegawai_id';

    protected $allowedFields = ['izin_id', 'izin_jenis_id', 'pegawai_id', 'tanggal_awal', 'tanggal_akhir', 'keterangan', 'status', 'file', 'created_at'];

    public function getData($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['izin_pegawai_id' => $id]);
        }
    }

    public function absensi_libur($id, $tgl)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('izin_pegawai');
        $builder->where("'" . $tgl . "' BETWEEN tanggal_awal AND tanggal_akhir");
        $builder->where('pegawai_id', $id);
        $builder->where('status', 'Diterima');

        return $builder->get();
    }

    public function get_izin($id)
    {
        $this->db = \Config\Database::connect();
        $sql = $this->db->table('izin_pegawai a')
            ->select('a.izin_pegawai_id, c.nama as jenis_izin, b.nama as nama_izin, p.nama as nama_pegawai, a.tanggal_awal, a.tanggal_akhir, datediff(a.tanggal_akhir, a.tanggal_awal) as lama, a.file, a.status')
            ->join('pegawai p', 'p.pegawai_id = a.pegawai_id')
            ->join('izin b', 'b.izin_id = a.izin_id')
            ->join('izin_jenis c', 'c.izin_jenis_id = b.izin_jenis_id')
            ->where('c.izin_jenis_id', $id)->get();

        return $sql;
    }
}
