<?php

namespace App\Models;

use CodeIgniter\Model;

class FingerprintModel extends Model
{
    protected $table = 'fingerprint';
    protected $primaryKey = 'id';

    protected $allowedFields = ['sidik_id', 'date', 'time', 'state'];

    public function getData($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['sidik_id' => $id]);
        }
    }

    public function noticeFunction()
    {
        $builder = $this->db->table('fingerprint');

        return $builder;
    }

    public function fingerprint_pegawai($id)
    {
        $builder = $this->db->table('fingerprint');
        $builder->where('sidik_id', $id);

        return $builder;
    }
}
