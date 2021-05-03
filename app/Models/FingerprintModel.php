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

    public function getPeriode()
    {
        $aturan = $this->db->table('absensi_setting');

        return $aturan->periode;
    }

    public function listPeriode()
    {
        $periode = $this->getPeriode();

        $x       = explode(' - ', $periode);
        $tgl1    = date('Y-m-d', strtotime($x[0]));
        $tgl2    = date('Y-m-d', strtotime($x[1]));

        // FUNGSI MENGHITUNG RANGE TANGGAL
        $date1 = date_create($tgl1);
        $date2 = date_create($tgl2);
        $diff  = date_diff($date1, $date2);
        $range =  $diff->format("%R%a days");

        // TANGGAL PINJAM
        $todayDate = $tgl1;
        $now = strtotime($todayDate);

        // BUAT SEMUA TANGGAL
        for ($i = 0; $i <= $range; $i++) {
            $nilai[] = date('Y-m-d', strtotime('+' . $i . 'days', $now));
        }

        return $nilai;
    }

    public function cek_absensi($id, $tgl)
    {
        $in = $this->getWhere(['sidik_id' => $id, 'date' => $tgl, 'state' => 'C/In'])->getResultArray();
        $out = $this->getWhere(['sidik_id' => $id, 'date' => $tgl, 'state' => 'C/Out'])->getResultArray();

        if (count($in) == 0) {
            return false;
        }

        if (count($in) >= 1 && count($out) == 0) {
            return false;
        }

        if (count($in) >= 1 && count($out) >= 1) {
            return true;
        }
    }

    public function tampil_absensi($id, $tgl)
    {
        $sql = $this->table('fingerprint')->select('date, MIN(time) as jam_datang, MAX(time) as jam_pulang')
            ->where('sidik_id', $id)->where('date', $tgl)->get();
        dd($sql);
        return $sql;
    }

    public function masuk($id, $tgl)
    {
        return $this->getWhere(['sidik_id' => $id, 'date' => $tgl, 'state' => 'C/In']);
    }

    public function pulang($id, $tgl)
    {
        return $this->getWhere(['sidik_id' => $id, 'date' => $tgl, 'state' => 'C/Out']);
    }

    public function total_hadir($id)
    {
        $tgl = $this->listPeriode();

        return $tgl;
    }
}
