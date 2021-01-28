<?php namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table = "pegawai";
    protected $primaryKey = "pegawai_id";
    protected $allowedFields = ['nama','nik','tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'status_perkawinan', 'status_pegawai', 'alamat', 'pendidikan_terakhir', 'jabatan_id', 'tanggal_pengangkatan', 'jabatan_id', 'tanggal_pengangkatan', 'bidang_id', 'no_hp', 'email', 'foto'];

    public function getData($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['pegawai_id' => $id]);
        }
    }

}