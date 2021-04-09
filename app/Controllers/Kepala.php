<?php

namespace App\Controllers;

use App\Models\HubkelModel;
use App\Models\JenisPegModel;
use App\Models\JenisPendModel;
use App\Models\JenjPendModel;
use App\Models\PegawaiModel;
use App\Models\UserModel;
use App\Models\IzinJenisModel;
use App\Models\IzinModel;
use App\Models\IzinPegawaiModel;
use App\Models\PeriodeModel;

class Kepala extends BaseController
{
    protected $jenisPegawai;
    protected $jenisPendidikan;
    protected $jenjangPendidikan;
    protected $hubunganKeluarga;
    protected $pegawaiModel;
    protected $userModel;
    protected $izinjenisModel;
    protected $izinModel;
    protected $izinPegawaiModel;
    protected $periodeModel;


    public function __construct()
    {
        $this->jenisPegawai = new JenisPegModel();
        $this->jenisPendidikan = new JenisPendModel();
        $this->jenjangPendidikan = new JenjPendModel();
        $this->hubunganKeluarga = new HubkelModel();
        $this->pegawaiModel = new PegawaiModel();
        $this->userModel = new UserModel();
        $this->izinjenisModel = new IzinJenisModel;
        $this->izinModel = new IzinModel;
        $this->izinPegawaiModel = new IzinPegawaiModel();
        $this->periodeModel = new PeriodeModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
        ];
        return view('kepala/dashboard', $data);
    }

    public function daftar_izin()
    {
        $session = session();
        $pegawai_id = $session->get('pegawai_id');

        $this->db = \Config\Database::connect();
        $sql = $this->db->table('izin_pegawai a')
            ->select('a.izin_pegawai_id, c.nama as jenis_izin, b.nama as nama_izin, a.tanggal_awal, a.tanggal_akhir, datediff(a.tanggal_akhir, a.tanggal_awal) as lama, a.file, a.status')
            ->join('izin b', 'b.izin_id = a.izin_id')
            ->join('izin_jenis c', 'c.izin_jenis_id = b.izin_jenis_id')
            ->where('a.pegawai_id', $pegawai_id)->get();
        $izin_pegawai = $sql->getResultArray();
        // $izin_pegawai = $this->izinPegawaiModel->getData();
        // dd($izin_pegawai);
        $data = [
            'title' => 'Daftar Izin Anda',
            'izin_pegawai' => $izin_pegawai,
        ];

        return view('pegawai/izin/data', $data);
    }

    public function ajukan_izin()
    {
        session();
        $jenis_izin = $this->izinjenisModel->getData();
        $data = [
            'title' => 'Ajukan Izin',
            'page' => 'Izin',
            'jenis_izin' => $jenis_izin,
            'validation' => \Config\Services::validation(),
        ];
        return view('pegawai/izin/add', $data);
    }

    public function get_nama_izin()
    {
        $this->db = \Config\Database::connect();
        $id_jenis = $this->request->getVar('izin_jenis_id');
        $data = $this->db->table('izin')->getWhere(['izin_jenis_id' => $id_jenis])->getResult();
        // dd($data);
        echo json_encode($data);
    }

    public function izin_save()
    {
        $session = session();
        $file = $this->request->getFile('file');
        // dd($file);
        if (!empty($file)) {
            $rules = [
                'tanggal_awal' => 'required',
                'tanggal_akhir' => 'required',
                'file' => 'mime_in[file,image/jpg,image/jpeg,image/png,image/gif]|max_size[file,2048]',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                $session = session();
                $session->setFlashdata('error', 'Data Gagal Disimpan');
                $validation = \Config\Services::validation();
                return redirect()->to('/pegawai/ajukan_izin')->withInput()->with('validation', $validation);
            } else {
                $randomName = $file->getRandomName();
                if ($file->move(ROOTPATH . 'public/file/izin/', $randomName)) {
                    $this->izinPegawaiModel->save([
                        'pegawai_id' => $session->get('pegawai_id'),
                        'izin_jenis_id' => $this->request->getVar('jenis_izin'),
                        'izin_id' => $this->request->getVar('nama_izin'),
                        'tanggal_awal' => $this->request->getVar('tanggal_awal'),
                        'tanggal_akhir' => $this->request->getVar('tanggal_akhir'),
                        'keterangan' => $this->request->getVar('keterangan'),
                        'status' => 'Menunggu',
                        'file' => $randomName,
                    ]);
                    $session = session();
                    $session->setFlashdata('success', 'Data Izin Berhasil Ditambah!');
                    return redirect()->to('/pegawai/daftar_izin');
                }
            }
        } else {
            $rules = [
                'tanggal_awal' => 'required',
                'tanggal_akhir' => 'required',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                $session = session();
                $session->setFlashdata('error', 'Data Gagal Disimpan');
                $validation = \Config\Services::validation();
                return redirect()->to('/pegawai/ajukan_izin')->withInput()->with('validation', $validation);
            } else {
                $this->izinPegawaiModel->save([
                    'pegawai_id' => $session->get('pegawai_id'),
                    'izin_jenis_id' => $this->request->getVar('jenis_izin'),
                    'izin_id' => $this->request->getVar('nama_izin'),
                    'tanggal_awal' => $this->request->getVar('tanggal_awal'),
                    'tanggal_akhir' => $this->request->getVar('tanggal_akhir'),
                    'keterangan' => $this->request->getVar('keterangan'),
                    'status' => 'Menunggu',
                ]);
                $session = session();
                $session->setFlashdata('success', 'Data Izin Berhasil Ditambah!');
                return redirect()->to('/pegawai/daftar_izin');
            }
        }
    }
}
