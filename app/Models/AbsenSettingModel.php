<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsenSettingModel extends Model
{
    protected $table = 'absensi_setting';
    protected $primaryKey = 'setting_id';

    protected $allowedFields = ['jam_masuk', 'jam_pulang'];

    public function getData($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['setting_id' => $id]);
        }
    }
}
