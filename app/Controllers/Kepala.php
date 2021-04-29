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
use App\Models\PendidikanPegModel;
use App\Models\KeluargaPegModel;
use App\Models\FingerprintModel;
use App\Models\InventarisModel;
use App\Models\PeminjamanModel;
use App\Models\SatkerModel;
use App\Models\JabatanPegModel;
use App\Models\LiburModel;
use DateTime;
use monken\TablesIgniter;
use phpDocumentor\Reflection\Types\This;

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
    protected $pendidikanPegawai;
    protected $keluargaPegawai;
    protected $fingerprintModel;
    protected $inventarisModel;
    protected $peminjamanModel;
    protected $satkerModel;
    protected $jabatanpegModel;
    protected $liburModel;


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
        $this->pendidikanPegawai = new PendidikanPegModel();
        $this->keluargaPegawai = new KeluargaPegModel();
        $this->fingerprintModel = new FingerprintModel();
        $this->inventarisModel = new InventarisModel();
        $this->peminjamanModel = new PeminjamanModel();
        $this->satkerModel = new SatkerModel();
        $this->jabatanpegModel = new JabatanPegModel();
        $this->liburModel = new LiburModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
        ];
        return view('kepala/dashboard', $data);
    }

    // Data Master
    public function jns_pegawai()
    {
        $jenis_pegawai = $this->jenisPegawai->getData();
        $data = [
            'title' => 'Jenis Pegawai',
            'page' => 'Master Data',
            'jenis_pegawai' => $jenis_pegawai,
        ];

        return view('kepala/master/jns_pegawai', $data);
    }

    public function jns_pegawai_save()
    {
        $rules = [
            'jenis_pegawai' => 'required|max_length[50]',
            'keterangan' => 'max_length[100]',
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            $session = session();
            $session->setFlashdata('info', $this->validator->getErrors());
            $validation = \Config\Services::validation();
            return redirect()->to('/kepala/jns_pegawai')->withInput()->with('validation', $validation);
        } else {
            $this->jenisPegawai->save([
                'jenis_pegawai' => $this->request->getVar('jenis_pegawai'),
                'keterangan' => $this->request->getVar('keterangan'),
            ]);
            $session = session();
            $session->setFlashdata('success', 'Data Jenis Pegawai Berhasil Disimpan!');
            return redirect()->to('/kepala/jns_pegawai');
        }
    }

    public function jns_pegawai_update()
    {
        $rules = [
            'jenis_pegawai' => 'required|max_length[50]',
            'keterangan' => 'max_length[100]',
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            $session = session();
            $session->setFlashdata('info', $this->validator->getErrors());
            $validation = \Config\Services::validation();
            return redirect()->to('/kepala/jns_pegawai')->withInput()->with('validation', $validation);
        } else {
            $id = $this->request->getVar('jenis_pegawai_id');
            $this->jenisPegawai->update($id, [
                'jenis_pegawai' => $this->request->getVar('jenis_pegawai'),
                'keterangan' => $this->request->getVar('keterangan'),
            ]);
            $session = session();
            $session->setFlashdata('success', 'Data Jenis Pegawai Berhasil Disimpan!');
            return redirect()->to('/kepala/jns_pegawai');
        }
    }

    public function jns_pegawai_del()
    {
        $id = $this->request->getVar('jenis_pegawai_id');
        $this->jenisPegawai->where('jenis_pegawai_id', $id)->delete($id);
        $session = session();
        $session->setFlashdata('success', 'Data Berhasil Dihapus!');
        return redirect()->to('/kepala/jns_pegawai');
    }

    public function jns_pend()
    {
        $jenis_pendidikan = $this->jenisPendidikan->getData();
        $data = [
            'title' => 'Jenis Pendidikan',
            'page' => 'Master Data',
            'jenis_pendidikan' => $jenis_pendidikan,
        ];

        return view('kepala/master/jns_pend', $data);
    }

    public function jns_pend_save()
    {
        $rules = [
            'jenis_pendidikan' => 'required|max_length[50]',
            'keterangan' => 'max_length[100]',
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            $session = session();
            $session->setFlashdata('info', $this->validator->getErrors());
            $validation = \Config\Services::validation();
            return redirect()->to('/kepala/jns_pend')->withInput()->with('validation', $validation);
        } else {
            $this->jenisPendidikan->save([
                'jenis_pendidikan' => $this->request->getVar('jenis_pendidikan'),
                'keterangan' => $this->request->getVar('keterangan'),
            ]);
            $session = session();
            $session->setFlashdata('success', 'Data Jenis Pendidikan Berhasil Disimpan!');
            return redirect()->to('/kepala/jns_pend');
        }
    }

    public function jns_pend_update()
    {
        $rules = [
            'jenis_pendidikan' => 'required|max_length[50]',
            'keterangan' => 'max_length[100]',
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            $session = session();
            $session->setFlashdata('info', $this->validator->getErrors());
            $validation = \Config\Services::validation();
            return redirect()->to('/kepala/jns_pend')->withInput()->with('validation', $validation);
        } else {
            $id = $this->request->getVar('jenis_pend_id');
            $this->jenisPendidikan->update($id, [
                'jenis_pendidikan' => $this->request->getVar('jenis_pendidikan'),
                'keterangan' => $this->request->getVar('keterangan'),
            ]);
            $session = session();
            $session->setFlashdata('success', 'Data Jenis Pendidikan Berhasil Disimpan!');
            return redirect()->to('/kepala/jns_pend');
        }
    }

    public function jns_pend_del()
    {
        $id = $this->request->getVar('jenis_pend_id');
        $this->jenisPendidikan->where('jenis_pend_id', $id)->delete($id);
        $session = session();
        $session->setFlashdata('success', 'Data Berhasil Dihapus!');
        return redirect()->to('/kepala/jns_pend');
    }

    public function izin()
    {
        $izinjenis = $this->izinjenisModel->getData();
        $this->db = \Config\Database::connect();
        $sql = $this->db->table('izin i')->select('i.izin_id, i.nama, j.izin_jenis_id, j.nama as nama_jenis')->join('izin_jenis j', 'j.izin_jenis_id = i.izin_jenis_id')->get();
        $izin = $sql->getResultArray();
        // dd($izin);
        $data = [
            'title' => 'Data Izin',
            'title1' => 'Data Izin Jenis',
            'title2' => 'Data Izin',
            'page' => 'Master Data',
            'izinjenis' => $izinjenis,
            'izin' => $izin,
        ];

        return view('kepala/master/izin', $data);
    }

    public function izin_jenis_save()
    {
        $rules = [
            'jenis_izin' => 'required|max_length[30]',
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            $session = session();
            $session->setFlashdata('info', $this->validator->getErrors());
            $validation = \Config\Services::validation();
            return redirect()->to('/kepala/izin')->withInput()->with('validation', $validation);
        } else {
            $this->izinjenisModel->save([
                'nama' => $this->request->getVar('jenis_izin'),
            ]);
            $session = session();
            $session->setFlashdata('success', 'Data Jenis Izin Berhasil Disimpan!');
            return redirect()->to('/kepala/izin');
        }
    }

    public function izin_jenis_update()
    {
        $rules = [
            'jenis_izin' => 'required|max_length[30]',
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            $session = session();
            $session->setFlashdata('info', $this->validator->getErrors());
            $validation = \Config\Services::validation();
            return redirect()->to('/kepala/izin')->withInput()->with('validation', $validation);
        } else {
            $id = $this->request->getVar('izin_jenis_id');
            $this->izinjenisModel->update($id, [
                'nama' => $this->request->getVar('jenis_izin'),
            ]);
            $session = session();
            $session->setFlashdata('success', 'Data Jenis Izin Berhasil Dirubah!');
            return redirect()->to('/kepala/izin');
        }
    }

    public function izin_jenis_del()
    {
        $id = $this->request->getVar('izin_jenis_id');
        $this->izinjenisModel->where('izin_jenis_id', $id)->delete($id);
        $session = session();
        $session->setFlashdata('success', 'Data Jenis Izin Berhasil Dihapus!');
        return redirect()->to('/kepala/izin');
    }

    public function izin_save()
    {
        $rules = [
            'jenis_izin' => 'required',
            'nama_izin' => 'required|max_length[50]'
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            $session = session();
            $session->setFlashdata('info', $this->validator->getErrors());
            $validation = \Config\Services::validation();
            return redirect()->to('/kepala/izin')->withInput()->with('validation', $validation);
        } else {
            $this->izinModel->save([
                'izin_jenis_id' => $this->request->getVar('jenis_izin'),
                'nama' => $this->request->getVar('nama_izin'),
            ]);
            $session = session();
            $session->setFlashdata('success', 'Data Izin Berhasil Disimpan!');
            return redirect()->to('/kepala/izin');
        }
    }

    public function izin_update()
    {
        $rules = [
            'jenis_izin' => 'required',
            'nama_izin' => 'required|max_length[50]'
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            $session = session();
            $session->setFlashdata('info', $this->validator->getErrors());
            $validation = \Config\Services::validation();
            return redirect()->to('/kepala/izin')->withInput()->with('validation', $validation);
        } else {
            $id = $this->request->getVar('izin_id');
            $this->izinModel->update($id, [
                'izin_jenis_id' => $this->request->getVar('jenis_izin'),
                'nama' => $this->request->getVar('nama_izin'),
            ]);
            $session = session();
            $session->setFlashdata('success', 'Data Izin Berhasil Dirubah!');
            return redirect()->to('/kepala/izin');
        }
    }

    public function izin_del()
    {
        $id = $this->request->getVar('izin_id');
        $this->izinModel->where('izin_id', $id)->delete($id);
        $session = session();
        $session->setFlashdata('success', 'Data Izin Berhasil Dihapus!');
        return redirect()->to('/kepala/izin');
    }

    public function jen_pend()
    {
        $jenjang_pendidikan = $this->jenjangPendidikan->getData();
        $data = [
            'title' => 'Jenjang Pendidikan',
            'page' => 'Master Data',
            'jenjang_pendidikan' => $jenjang_pendidikan,
        ];

        return view('kepala/master/jen_pend', $data);
    }

    public function jen_pend_save()
    {
        $rules = [
            'jenjang_pendidikan' => 'required|max_length[50]',
            'keterangan' => 'max_length[100]',
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            $session = session();
            $session->setFlashdata('info', $this->validator->getErrors());
            $validation = \Config\Services::validation();
            return redirect()->to('/kepala/jen_pend')->withInput()->with('validation', $validation);
        } else {
            $this->jenjangPendidikan->save([
                'jenjang_pendidikan' => $this->request->getVar('jenjang_pendidikan'),
                'keterangan' => $this->request->getVar('keterangan'),
            ]);
            $session = session();
            $session->setFlashdata('success', 'Data Jenjang Pendidikan Berhasil Disimpan!');
            return redirect()->to('/kepala/jen_pend');
        }
    }

    public function jen_pend_update()
    {
        $rules = [
            'jenjang_pendidikan' => 'required|max_length[50]',
            'keterangan' => 'max_length[100]',
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            $session = session();
            $session->setFlashdata('info', $this->validator->getErrors());
            $validation = \Config\Services::validation();
            return redirect()->to('/kepala/jen_pend')->withInput()->with('validation', $validation);
        } else {
            $id = $this->request->getVar('jenj_pend_id');
            $this->jenjangPendidikan->update($id, [
                'jenjang_pendidikan' => $this->request->getVar('jenjang_pendidikan'),
                'keterangan' => $this->request->getVar('keterangan'),
            ]);
            $session = session();
            $session->setFlashdata('success', 'Data Jenjang Pendidikan Berhasil Disimpan!');
            return redirect()->to('/kepala/jen_pend');
        }
    }

    public function jen_pend_del()
    {
        $id = $this->request->getVar('jenj_pend_id');
        $this->jenjangPendidikan->where('jenj_pend_id', $id)->delete($id);
        $session = session();
        $session->setFlashdata('success', 'Data Berhasil Dihapus!');
        return redirect()->to('/kepala/jen_pend');
    }

    public function hub_keluarga()
    {
        $hubkel = $this->hubunganKeluarga->getData();
        $data = [
            'title' => 'Hubungan Keluarga',
            'page' => 'Master Data',
            'hubkel' => $hubkel,
        ];

        return view('kepala/master/hub_keluarga', $data);
    }

    public function hub_keluarga_save()
    {
        $rules = [
            'hubkel' => 'required|max_length[50]',
            'keterangan' => 'max_length[100]',
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            $session = session();
            $session->setFlashdata('info', $this->validator->getErrors());
            $validation = \Config\Services::validation();
            return redirect()->to('/kepala/hub_keluarga')->withInput()->with('validation', $validation);
        } else {
            $this->hubunganKeluarga->save([
                'hubkel' => $this->request->getVar('hubkel'),
                'keterangan' => $this->request->getVar('keterangan'),
            ]);
            $session = session();
            $session->setFlashdata('success', 'Data Hubungan Keluarga Berhasil Disimpan!');
            return redirect()->to('/kepala/hub_keluarga');
        }
    }

    public function hub_keluarga_update()
    {
        $rules = [
            'hubkel' => 'required|max_length[50]',
            'keterangan' => 'max_length[100]',
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            $session = session();
            $session->setFlashdata('info', $this->validator->getErrors());
            $validation = \Config\Services::validation();
            return redirect()->to('/kepala/hub_keluarga')->withInput()->with('validation', $validation);
        } else {
            $id = $this->request->getVar('hubkel_id');
            $this->hubunganKeluarga->update($id, [
                'hubkel' => $this->request->getVar('hubkel'),
                'keterangan' => $this->request->getVar('keterangan'),
            ]);
            $session = session();
            $session->setFlashdata('success', 'Data Hubungan Keluarga Berhasil Disimpan!');
            return redirect()->to('/kepala/hub_keluarga');
        }
    }

    public function hub_keluarga_del()
    {
        $id = $this->request->getVar('hubkel_id');
        $this->hubunganKeluarga->where('hubkel_id', $id)->delete($id);
        $session = session();
        $session->setFlashdata('success', 'Data Berhasil Dihapus!');
        return redirect()->to('/kepala/hub_keluarga');
    }

    public function satker()
    {
        $satker = $this->satkerModel->getData();
        $data = [
            'title' => 'Unit Kerja',
            'page' => 'Master Data',
            'satker' => $satker,
        ];

        return view('kepala/master/satker', $data);
    }

    public function satker_save()
    {
        $rules = [
            'nama' => 'required|max_length[50]',
            'keterangan' => 'max_length[100]',
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            $session = session();
            $session->setFlashdata('info', $this->validator->getErrors());
            $validation = \Config\Services::validation();
            return redirect()->to('/kepala/satker')->withInput()->with('validation', $validation);
        } else {
            $this->satkerModel->save([
                'nama' => $this->request->getVar('nama'),
                'keterangan' => $this->request->getVar('keterangan'),
            ]);
            $session = session();
            $session->setFlashdata('success', 'Data Unit Kerja Berhasil Disimpan!');
            return redirect()->to('/kepala/satker');
        }
    }

    public function satker_update()
    {
        $rules = [
            'nama' => 'required|max_length[50]',
            'keterangan' => 'max_length[100]',
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            $session = session();
            $session->setFlashdata('info', $this->validator->getErrors());
            $validation = \Config\Services::validation();
            return redirect()->to('/kepala/satker')->withInput()->with('validation', $validation);
        } else {
            $id = $this->request->getVar('satker_id');
            $this->satkerModel->update($id, [
                'nama' => $this->request->getVar('nama'),
                'keterangan' => $this->request->getVar('keterangan'),
            ]);
            $session = session();
            $session->setFlashdata('success', 'Data Unit Kerja Berhasil Disimpan!');
            return redirect()->to('/kepala/satker');
        }
    }

    public function satker_del()
    {
        $id = $this->request->getVar('satker_id');
        $this->satkerModel->where('satker_id', $id)->delete($id);
        $session = session();
        $session->setFlashdata('success', 'Data Berhasil Dihapus!');
        return redirect()->to('/kepala/satker');
    }

    public function periode()
    {
        $periode = $this->periodeModel->getData();
        $data = [
            'title' => 'Data Periode',
            'page' => 'Master Data',
            'periode' => $periode,
        ];

        return view('kepala/master/periode', $data);
    }

    public function periode_save()
    {
        $rules = [
            'kode' => 'required|max_length[10]',
            'wajib' => 'required|max_length[10]',
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            $session = session();
            $session->setFlashdata('info', $this->validator->getErrors());
            $validation = \Config\Services::validation();
            return redirect()->to('/kepala/periode')->withInput()->with('validation', $validation);
        } else {
            $this->periodeModel->save([
                'kode' => $this->request->getVar('kode'),
                'tanggal_mulai' => $this->request->getVar('tanggal_mulai'),
                'tanggal_akhir' => $this->request->getVar('tanggal_akhir'),
                'wajib' => $this->request->getVar('wajib'),
                'status' => $this->request->getVar('status'),
            ]);
            $session = session();
            $session->setFlashdata('success', 'Data Periode Berhasil Disimpan!');
            return redirect()->to('/kepala/periode');
        }
    }

    public function periode_update()
    {
        $rules = [
            'kode' => 'required|max_length[10]',
            'wajib' => 'required|max_length[10]',
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            $session = session();
            $session->setFlashdata('info', $this->validator->getErrors());
            $validation = \Config\Services::validation();
            return redirect()->to('/kepala/periode')->withInput()->with('validation', $validation);
        } else {
            $id = $this->request->getVar('periode_id');
            $this->periodeModel->update($id, [
                'kode' => $this->request->getVar('kode'),
                'tanggal_mulai' => $this->request->getVar('tanggal_mulai'),
                'tanggal_akhir' => $this->request->getVar('tanggal_akhir'),
                'wajib' => $this->request->getVar('wajib'),
                'status' => $this->request->getVar('status'),
            ]);
            $session = session();
            $session->setFlashdata('success', 'Data Periode Berhasil Disimpan!');
            return redirect()->to('/kepala/periode');
        }
    }

    public function periode_del()
    {
        $id = $this->request->getVar('periode_id');
        $this->periodeModel->where('periode_id', $id)->delete($id);
        $session = session();
        $session->setFlashdata('success', 'Data Berhasil Dihapus!');
        return redirect()->to('/kepala/periode');
    }

    public function libur()
    {
        $libur = $this->liburModel->getData();
        $data = [
            'title' => 'Data Hari Libur',
            'page' => 'Master Data',
            'libur' => $libur,
        ];

        return view('kepala/master/hari_libur', $data);
    }

    public function libur_save()
    {
        $rules = [
            'tgl_libur' => 'required|max_length[10]',
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            $session = session();
            $session->setFlashdata('info', $this->validator->getErrors());
            $validation = \Config\Services::validation();
            return redirect()->to('/kepala/libur')->withInput()->with('validation', $validation);
        } else {
            $this->liburModel->save([
                'tgl_libur' => $this->request->getVar('tgl_libur'),
                'keterangan' => $this->request->getVar('keterangan'),
            ]);
            $session = session();
            $session->setFlashdata('success', 'Data Hari Libur Berhasil Disimpan!');
            return redirect()->to('/kepala/libur');
        }
    }

    public function libur_update()
    {
        $rules = [
            'tgl_libur' => 'required|max_length[10]',
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            $session = session();
            $session->setFlashdata('info', $this->validator->getErrors());
            $validation = \Config\Services::validation();
            return redirect()->to('/kepala/libur')->withInput()->with('validation', $validation);
        } else {
            $id = $this->request->getVar('libur_id');
            $this->liburModel->update($id, [
                'tgl_libur' => $this->request->getVar('tgl_libur'),
                'keterangan' => $this->request->getVar('keterangan'),
            ]);
            $session = session();
            $session->setFlashdata('success', 'Data Hari Libur Berhasil Disimpan!');
            return redirect()->to('/kepala/libur');
        }
    }

    public function libur_del()
    {
        $id = $this->request->getVar('libur_id');
        $this->liburModel->where('libur_id', $id)->delete($id);
        $session = session();
        $session->setFlashdata('success', 'Data Berhasil Dihapus!');
        return redirect()->to('/kepala/libur');
    }

    //Pegawai
    public function data_pegawai()
    {
        $this->db = \Config\Database::connect();
        $sql = $this->db->table('pegawai p')
            ->select('p.pegawai_id, p.nama, j.nama_jabatan, p.gelar_depan, p.gelar_belakang, p.nik, p.tempat_lahir, p.tanggal_lahir, p.jenis_kelamin, p.telepon, p.email, p.gambar, u.user_id, u.username, u.role, u.pegawai_id as id')
            ->join('users u', 'u.pegawai_id = p.pegawai_id', 'Left')
            ->join('jabatan_pegawai j', 'j.pegawai_id = p.pegawai_id', 'Left')->get();
        $pegawai = $sql->getResultArray();
        // $pegawai = $this->pegawaiModel->getData();
        // dd($pegawai);
        $data = [
            'title' => 'Data Pegawai',
            'page' => 'Pegawai',
            'pegawai' => $pegawai,
        ];
        return view('kepala/pegawai/data', $data);
    }

    public function add_pegawai()
    {
        session();
        $prov = new \App\Models\ProvinsiModel();
        $provinsi = $prov->getData();
        $jenis_peg = $this->jenisPegawai->getData();
        $data = [
            'title' => 'Tambah Pegawai',
            'page' => 'Pegawai',
            'jenis_peg' => $jenis_peg,
            'provinsi' => $provinsi,
            'validation' => \Config\Services::validation(),
        ];
        return view('kepala/pegawai/add', $data);
    }

    public function pegawai_save()
    {

        $rules = [
            'nama' => 'required|max_length[50]',
            'telepon' => 'required|min_length[5]|max_length[15]',
            'email' => 'required|max_length[50]|is_unique[pegawai.email]',
        ];

        if (!$this->validate($rules)) {
            $data = $this->validator->listErrors();
            $session = session();
            $session->setFlashdata('info', $this->validator->getErrors());
            // dd($data);
            return redirect()->to('/kepala/add_pegawai');
        } else {
            $file = $this->request->getFile('gambar');
            if ($file->isValid() && !$file->hasMoved()) {
                $file_type = $file->getClientMimeType();
                $valid_type = array('image/png', 'image/jpg', 'image/jpeg', 'image/gif');
                if (in_array($file_type, $valid_type)) {
                    $randomName = $file->getRandomName();
                    $file->move(ROOTPATH . 'public/images/user/', $randomName);

                    $this->pegawaiModel->save([
                        'nama' => $this->request->getVar('nama'),
                        'nik' => $this->request->getVar('nik'),
                        'gelar_depan' => $this->request->getVar('gelar_depan'),
                        'gelar_belakang' => $this->request->getVar('gelar_belakang'),
                        'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                        'status_perkawin' => $this->request->getVar('status_perkawinan'),
                        'tempat_lahir' => $this->request->getVar('tempat_lahir'),
                        'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
                        'telepon' => $this->request->getVar('telepon'),
                        'email' => $this->request->getVar('email'),
                        'provinsi' => $this->request->getVar('provinsi'),
                        'kota' => $this->request->getVar('kabupaten'),
                        'kecamatan' => $this->request->getVar('kecamatan'),
                        'kelurahan' => $this->request->getVar('kelurahan'),
                        'alamat' => $this->request->getVar('alamat'),
                        'jenis_pegawai_id' => $this->request->getVar('jenis_pegawai'),
                        'status_pegawai' => $this->request->getVar('status_pegawai'),
                        'tanggal_masuk' => $this->request->getVar('tanggal_masuk'),
                        'rekening' => $this->request->getVar('rekening'),
                        'gambar' => $randomName,
                        'sidik_id' => $this->request->getVar('sidik_id'),
                    ]);
                    $session = session();
                    $session->setFlashdata('success', 'Data Pegawai Berhasil Disimpan!');
                    return redirect()->to('/kepala/data_pegawai');
                } else {
                    $session = session();
                    $session->setFlashdata('waning', 'Tipe gambar yang dipilih tidak sesuai');
                    return redirect()->to('/kepala/add_pegawai');
                }
            } else {
                $this->pegawaiModel->save([
                    'nama' => $this->request->getVar('nama'),
                    'nik' => $this->request->getVar('nik'),
                    'gelar_depan' => $this->request->getVar('gelar_depan'),
                    'gelar_belakang' => $this->request->getVar('gelar_belakang'),
                    'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                    'status_perkawin' => $this->request->getVar('status_perkawinan'),
                    'tempat_lahir' => $this->request->getVar('tempat_lahir'),
                    'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
                    'telepon' => $this->request->getVar('telepon'),
                    'email' => $this->request->getVar('email'),
                    'provinsi' => $this->request->getVar('provinsi'),
                    'kota' => $this->request->getVar('kabupaten'),
                    'kecamatan' => $this->request->getVar('kecamatan'),
                    'kelurahan' => $this->request->getVar('kelurahan'),
                    'alamat' => $this->request->getVar('alamat'),
                    'jenis_pegawai_id' => $this->request->getVar('jenis_pegawai'),
                    'status_pegawai' => $this->request->getVar('status_pegawai'),
                    'tanggal_masuk' => $this->request->getVar('tanggal_masuk'),
                    'rekening' => $this->request->getVar('rekening'),
                    'sidik_id' => $this->request->getVar('sidik_id'),
                ]);
                $session = session();
                $session->setFlashdata('success', 'Data Pegawai Berhasil Disimpan!');
                return redirect()->to('/kepala/data_pegawai');
            }
        }
    }

    public function pegawai_del()
    {
        $id = $this->request->getVar('pegawai_id');
        $this->pegawaiModel->where('pegawai_id', $id)->delete($id);
        // $this->userModel->getData();
        $session = session();
        $session->setFlashdata('success', 'Data Berhasil Dihapus!');
        return redirect()->to('/kepala/data_pegawai');
    }

    public function edit_pegawai($id)
    {
        $jenis_peg = $this->jenisPegawai->getData();
        $pegawai = $this->pegawaiModel->getData($id)->getRowArray();
        $prov = new \App\Models\ProvinsiModel();
        $kab = new \App\Models\KabModel();
        $kec = new \App\Models\KecModel();
        $kelu = new \App\Models\KelModel();
        $provinsi = $prov->getData();
        $kabupaten = $kab->getWhere(array('id' => $pegawai['kota']))->getRowArray();
        $kecamatan = $kec->getWhere(array('id' => $pegawai['kecamatan']))->getRowArray();
        $kelurahan = $kelu->getWhere(array('id' => $pegawai['kelurahan']))->getRowArray();
        // dd($kelurahan);
        $data = [
            'title' => 'Edit Pegawai',
            'page' => 'Pegawai',
            'jenis_peg' => $jenis_peg,
            'pegawai' => $pegawai,
            'provinsi' => $provinsi,
            'kabupaten' => $kabupaten,
            'kecamatan' => $kecamatan,
            'kelurahan' => $kelurahan,
        ];
        return view('kepala/pegawai/edit', $data);
    }

    public function pegawai_update()
    {
        $rules = [
            'nama' => 'required|max_length[50]',
            'telepon' => 'required|min_length[5]|max_length[15]',
            'email' => 'required|max_length[50]',
        ];

        $id = $this->request->getVar('pegawai_id');

        if (!$this->validate($rules)) {
            $data = $this->validator->listErrors();
            $session = session();
            $session->setFlashdata('info', $this->validator->getErrors());
            // dd($data);
            return redirect()->to('/kepala/add_pegawai');
        } else {
            $file = $this->request->getFile('gambar');
            if ($file->isValid() && !$file->hasMoved()) {
                $file_type = $file->getClientMimeType();
                $valid_type = array('image/png', 'image/jpg', 'image/jpeg', 'image/gif');
                if (in_array($file_type, $valid_type)) {
                    $randomName = $file->getRandomName();
                    $file->move(ROOTPATH . 'public/images/user/', $randomName);

                    $this->pegawaiModel->update($id, [
                        'nama' => $this->request->getVar('nama'),
                        'nik' => $this->request->getVar('nik'),
                        'gelar_depan' => $this->request->getVar('gelar_depan'),
                        'gelar_belakang' => $this->request->getVar('gelar_belakang'),
                        'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                        'status_perkawin' => $this->request->getVar('status_perkawinan'),
                        'tempat_lahir' => $this->request->getVar('tempat_lahir'),
                        'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
                        'telepon' => $this->request->getVar('telepon'),
                        'email' => $this->request->getVar('email'),
                        'provinsi' => $this->request->getVar('provinsi'),
                        'kota' => $this->request->getVar('kabupaten'),
                        'kecamatan' => $this->request->getVar('kecamatan'),
                        'kelurahan' => $this->request->getVar('kelurahan'),
                        'alamat' => $this->request->getVar('alamat'),
                        'jenis_pegawai_id' => $this->request->getVar('jenis_pegawai'),
                        'status_pegawai' => $this->request->getVar('status_pegawai'),
                        'tanggal_masuk' => $this->request->getVar('tanggal_masuk'),
                        'rekening' => $this->request->getVar('rekening'),
                        'gambar' => $randomName,
                        'sidik_id' => $this->request->getVar('sidik_id'),
                    ]);
                    $session = session();
                    $session->setFlashdata('success', 'Data Pegawai Berhasil Disimpan!');
                    return redirect()->to('/kepala/data_pegawai');
                } else {
                    $session = session();
                    $session->setFlashdata('waning', 'Tipe gambar yang dipilih tidak sesuai');
                    return redirect()->to('/kepala/add_pegawai');
                }
            } else {
                $this->pegawaiModel->update($id, [
                    'nama' => $this->request->getVar('nama'),
                    'nik' => $this->request->getVar('nik'),
                    'gelar_depan' => $this->request->getVar('gelar_depan'),
                    'gelar_belakang' => $this->request->getVar('gelar_belakang'),
                    'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                    'status_perkawin' => $this->request->getVar('status_perkawinan'),
                    'tempat_lahir' => $this->request->getVar('tempat_lahir'),
                    'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
                    'telepon' => $this->request->getVar('telepon'),
                    'email' => $this->request->getVar('email'),
                    'provinsi' => $this->request->getVar('provinsi'),
                    'kota' => $this->request->getVar('kabupaten'),
                    'kecamatan' => $this->request->getVar('kecamatan'),
                    'kelurahan' => $this->request->getVar('kelurahan'),
                    'alamat' => $this->request->getVar('alamat'),
                    'jenis_pegawai_id' => $this->request->getVar('jenis_pegawai'),
                    'status_pegawai' => $this->request->getVar('status_pegawai'),
                    'tanggal_masuk' => $this->request->getVar('tanggal_masuk'),
                    'rekening' => $this->request->getVar('rekening'),
                    'sidik_id' => $this->request->getVar('sidik_id'),
                ]);
                $session = session();
                $session->setFlashdata('success', 'Data Pegawai Berhasil Disimpan!');
                return redirect()->to('/kepala/data_pegawai');
            }
        }
    }

    public function pegawai_akun_create()
    {
        $id = $this->request->getVar('pegawai_id');
        $rules = [
            'username' => 'required|is_unique[users.username]',
            'password' => 'min_length[5]',
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            $session = session();
            $session->setFlashdata('info', $this->validator->getErrors());
            $validation = \Config\Services::validation();
            return redirect()->to('/kepala/data_pegawai')->withInput()->with('validation', $validation);
        } else {
            $pass = password_hash($this->request->getVar('password'), PASSWORD_BCRYPT);
            $this->userModel->save([
                'username' => $this->request->getVar('username'),
                'password' => $pass,
                'role' => $this->request->getVar('role'),
                'pegawai_id' => $this->request->getVar('pegawai_id'),
            ]);
            $session = session();
            $session->setFlashdata('success', 'Akun Pegawai Berhasil Dibuat!');
            return redirect()->to('/kepala/data_pegawai');
        }
    }

    public function pegawai_akun_delete()
    {
        $id = $this->request->getVar('user_id');
        $this->userModel->where('user_id', $id)->delete($id);
        $session = session();
        $session->setFlashdata('success', 'Data Akun Berhasil Dihapus!');
        return redirect()->to('/kepala/data_pegawai');
    }

    public function jabatan_pegawai()
    {
        $pegawai = $this->pegawaiModel->getData();
        $data = [
            'title' => 'Jabatan Pegawai',
            'page' => 'Pegawai',
            'pegawai' => $pegawai,
        ];
        return view('kepala/pegawai/jabatan_pegawai', $data);
    }

    public function kelola_jabatan($id)
    {
        $pegawai = $this->pegawaiModel->getData($id)->getRow();
        $jabatan = $this->jabatanpegModel->getWhere(array('pegawai_id' => $id))->getResultArray();
        $satker = $this->satkerModel->getData();
        $data = [
            'title' => 'Kelola Jabatan Pegawai',
            'page' => 'Pegawai',
            'pegawai' => $pegawai,
            'satker' => $satker,
            'jabatan' => $jabatan,
        ];
        return view('kepala/pegawai/kelola_jabatan', $data);
    }

    public function jab_pegawai_save()
    {
        $id = $this->request->getVar('pegawai_id');

        $rules = [
            'jabatan' => 'required|max_length[50]',
            'tmt_jabatan' => 'required',
            'tanggal_sk' => 'required',
            'nomor_sk' => 'required',
        ];

        if (!$this->validate($rules)) {
            $data = $this->validator->listErrors();
            $session = session();
            $session->setFlashdata('info', $this->validator->getErrors());
            // dd($data);
            return redirect()->to('/kepala/kelola_jabatan/' . $id);
        } else {
            $file = $this->request->getFile('file');
            if ($file->isValid() && !$file->hasMoved()) {
                $file_type = $file->getClientMimeType();
                $valid_type = array('image/png', 'image/jpg', 'image/jpeg', 'image/gif');
                if (in_array($file_type, $valid_type)) {
                    $randomName = $file->getRandomName();
                    $file->move(ROOTPATH . 'public/file/jabatan/', $randomName);

                    $this->jabatanpegModel->save([
                        'nama_jabatan' => $this->request->getVar('jabatan'),
                        'tmt_jabatan' => $this->request->getVar('tmt_jabatan'),
                        'tanggal_sk' => $this->request->getVar('tanggal_sk'),
                        'nomor_sk' => $this->request->getVar('nomor_sk'),
                        'satker_id' => $this->request->getVar('satker'),
                        'keterangan' => $this->request->getVar('keterangan'),
                        'status' => $this->request->getVar('status'),
                        'pegawai_id' => $id,
                        'file' => $randomName,
                    ]);
                    $session = session();
                    $session->setFlashdata('success', 'Data Jabatan Pegawai Berhasil Disimpan!');
                    return redirect()->to('/kepala/kelola_jabatan/' . $id);
                } else {
                    $session = session();
                    $session->setFlashdata('warning', 'Tipe file yang dipilih tidak sesuai');
                    return redirect()->to('/kepala/kelola_jabatan/' . $id);
                }
            } else {
                $this->jabatanpegModel->save([
                    'nama_jabatan' => $this->request->getVar('jabatan'),
                    'tmt_jabatan' => $this->request->getVar('tmt_jabatan'),
                    'tanggal_sk' => $this->request->getVar('tanggal_sk'),
                    'nomor_sk' => $this->request->getVar('nomor_sk'),
                    'satker_id' => $this->request->getVar('satker'),
                    'keterangan' => $this->request->getVar('keterangan'),
                    'status' => $this->request->getVar('status'),
                    'pegawai_id' => $id,
                ]);
                $session = session();
                $session->setFlashdata('success', 'Data Jabatan Pegawai Berhasil Disimpan!');
                return redirect()->to('/kepala/kelola_jabatan/' . $id);
            }
        }
    }

    public function jab_pegawai_update()
    {
        $id_pegawai = $this->request->getVar('pegawai_id');
        $id = $this->request->getVar('id');

        $rules = [
            'jabatan' => 'required|max_length[50]',
            'tmt_jabatan' => 'required',
            'tanggal_sk' => 'required',
            'nomor_sk' => 'required',
        ];

        if (!$this->validate($rules)) {
            $data = $this->validator->listErrors();
            $session = session();
            $session->setFlashdata('info', $this->validator->getErrors());
            // dd($data);
            return redirect()->to('/kepala/kelola_jabatan/' . $id_pegawai);
        } else {
            $file = $this->request->getFile('file');
            if ($file->isValid() && !$file->hasMoved()) {
                $file_type = $file->getClientMimeType();
                $valid_type = array('image/png', 'image/jpg', 'image/jpeg', 'image/gif');
                if (in_array($file_type, $valid_type)) {
                    $randomName = $file->getRandomName();
                    $file->move(ROOTPATH . 'public/file/jabatan/', $randomName);

                    $this->jabatanpegModel->update($id, [
                        'nama_jabatan' => $this->request->getVar('jabatan'),
                        'tmt_jabatan' => $this->request->getVar('tmt_jabatan'),
                        'tanggal_sk' => $this->request->getVar('tanggal_sk'),
                        'nomor_sk' => $this->request->getVar('nomor_sk'),
                        'satker_id' => $this->request->getVar('satker'),
                        'keterangan' => $this->request->getVar('keterangan'),
                        'status' => $this->request->getVar('status'),
                        'file' => $randomName,
                    ]);
                    $session = session();
                    $session->setFlashdata('success', 'Data Jabtan Pegawai Berhasil Disimpan!');
                    return redirect()->to('/kepala/kelola_jabatan/' . $id_pegawai);
                } else {
                    $session = session();
                    $session->setFlashdata('warning', 'Tipe gambar yang dipilih tidak sesuai');
                    return redirect()->to('/kepala/kelola_jabatan/' . $id_pegawai);
                }
            } else {
                $this->jabatanpegModel->update($id, [
                    'nama_jabatan' => $this->request->getVar('jabatan'),
                    'tmt_jabatan' => $this->request->getVar('tmt_jabatan'),
                    'tanggal_sk' => $this->request->getVar('tanggal_sk'),
                    'nomor_sk' => $this->request->getVar('nomor_sk'),
                    'satker_id' => $this->request->getVar('satker'),
                    'keterangan' => $this->request->getVar('keterangan'),
                    'status' => $this->request->getVar('status'),
                ]);
                $session = session();
                $session->setFlashdata('success', 'Data Jabatan Pegawai Berhasil Disimpan!');
                return redirect()->to('/kepala/kelola_jabatan/' . $id_pegawai);
            }
        }
    }

    public function jab_pegawai_del()
    {
        $id = $this->request->getVar('id');
        $pegawai_id = $this->request->getVar('pegawai_id');
        $this->jabatanpegModel->where('jab_peg_id', $id)->delete($id);
        $session = session();
        $session->setFlashdata('success', 'Data Berhasil Dihapus!');
        return redirect()->to('/kepala/kelola_jabatan/' . $pegawai_id);
    }

    public function pendidikan_pegawai()
    {
        $pegawai = $this->pegawaiModel->getData();
        $data = [
            'title' => 'Pendidikan Pegawai',
            'page' => 'Pegawai',
            'pegawai' => $pegawai,
        ];
        return view('kepala/pegawai/pendidikan_pegawai', $data);
    }

    public function pendidikan_pegawai_save()
    {
        $id = $this->request->getVar('pegawai_id');

        $rules = [
            'nama_pendidikan' => 'required|max_length[50]',
            'penyelenggara' => 'required|max_length[50]',
            'nomor_ijazah' => 'required|max_length[50]',
        ];

        if (!$this->validate($rules)) {
            $data = $this->validator->listErrors();
            $session = session();
            $session->setFlashdata('info', $this->validator->getErrors());
            // dd($data);
            return redirect()->to('/kepala/kelola_pendidikan/' . $id);
        } else {
            $file = $this->request->getFile('gambar');
            if ($file->isValid() && !$file->hasMoved()) {
                $file_type = $file->getClientMimeType();
                $valid_type = array('image/png', 'image/jpg', 'image/jpeg', 'image/gif');
                if (in_array($file_type, $valid_type)) {
                    $randomName = $file->getRandomName();
                    $file->move(ROOTPATH . 'public/images/ijazah/', $randomName);

                    $this->pendidikanPegawai->save([
                        'nama_pendidikan' => $this->request->getVar('nama_pendidikan'),
                        'penyelenggara' => $this->request->getVar('penyelenggara'),
                        'jenis_pend_id' => $this->request->getVar('jenis_pendidikan'),
                        'jenj_pend_id' => $this->request->getVar('jenjang_pendidikan'),
                        'tanggal_ijazah' => $this->request->getVar('tanggal_ijazah'),
                        'nomor_ijazah' => $this->request->getVar('nomor_ijazah'),
                        'tahun_lulus' => $this->request->getVar('tahun_lulus'),
                        'keterangan' => $this->request->getVar('keterangan'),
                        'pegawai_id' => $id,
                        'file' => $randomName,
                    ]);
                    $session = session();
                    $session->setFlashdata('success', 'Data Pendidikan Pegawai Berhasil Disimpan!');
                    return redirect()->to('/kepala/kelola_pendidikan/' . $id);
                } else {
                    $session = session();
                    $session->setFlashdata('warning', 'Tipe gambar yang dipilih tidak sesuai');
                    return redirect()->to('/kepala/kelola_pendidikan/' . $id);
                }
            } else {
                $this->pendidikanPegawai->save([
                    'nama_pendidikan' => $this->request->getVar('nama_pendidikan'),
                    'penyelenggara' => $this->request->getVar('penyelenggara'),
                    'jenis_pend_id' => $this->request->getVar('jenis_pendidikan'),
                    'jenj_pend_id' => $this->request->getVar('jenjang_pendidikan'),
                    'tanggal_ijazah' => $this->request->getVar('tanggal_ijazah'),
                    'nomor_ijazah' => $this->request->getVar('nomor_ijazah'),
                    'tahun_lulus' => $this->request->getVar('tahun_lulus'),
                    'keterangan' => $this->request->getVar('keterangan'),
                    'pegawai_id' => $id,
                ]);
                $session = session();
                $session->setFlashdata('success', 'Data Pendidikan Pegawai Berhasil Disimpan!');
                return redirect()->to('/kepala/kelola_pendidikan/' . $id);
            }
        }
    }

    public function pendidikan_pegawai_update()
    {
        $id_pegawai = $this->request->getVar('pegawai_id');
        $id = $this->request->getVar('id');

        $rules = [
            'nama_pendidikan' => 'required|max_length[50]',
            'penyelenggara' => 'required|max_length[50]',
            'nomor_ijazah' => 'required|max_length[50]',
        ];

        if (!$this->validate($rules)) {
            $data = $this->validator->listErrors();
            $session = session();
            $session->setFlashdata('info', $this->validator->getErrors());
            // dd($data);
            return redirect()->to('/kepala/kelola_pendidikan/' . $id_pegawai);
        } else {
            $file = $this->request->getFile('gambar1');
            if ($file->isValid() && !$file->hasMoved()) {
                $file_type = $file->getClientMimeType();
                $valid_type = array('image/png', 'image/jpg', 'image/jpeg', 'image/gif');
                if (in_array($file_type, $valid_type)) {
                    $randomName = $file->getRandomName();
                    $file->move(ROOTPATH . 'public/images/ijazah/', $randomName);

                    $this->pendidikanPegawai->update($id, [
                        'nama_pendidikan' => $this->request->getVar('nama_pendidikan'),
                        'penyelenggara' => $this->request->getVar('penyelenggara'),
                        'jenis_pend_id' => $this->request->getVar('jenis_pendidikan'),
                        'jenj_pend_id' => $this->request->getVar('jenjang_pendidikan'),
                        'tanggal_ijazah' => $this->request->getVar('tanggal_ijazah'),
                        'nomor_ijazah' => $this->request->getVar('nomor_ijazah'),
                        'tahun_lulus' => $this->request->getVar('tahun_lulus'),
                        'keterangan' => $this->request->getVar('keterangan'),
                        'file' => $randomName,
                    ]);
                    $session = session();
                    $session->setFlashdata('success', 'Data Pendidikan Pegawai Berhasil Disimpan!');
                    return redirect()->to('/kepala/kelola_pendidikan/' . $id_pegawai);
                } else {
                    $session = session();
                    $session->setFlashdata('warning', 'Tipe gambar yang dipilih tidak sesuai');
                    return redirect()->to('/kepala/kelola_pendidikan/' . $id_pegawai);
                }
            } else {
                $this->pendidikanPegawai->update($id, [
                    'nama_pendidikan' => $this->request->getVar('nama_pendidikan'),
                    'penyelenggara' => $this->request->getVar('penyelenggara'),
                    'jenis_pend_id' => $this->request->getVar('jenis_pendidikan'),
                    'jenj_pend_id' => $this->request->getVar('jenjang_pendidikan'),
                    'tanggal_ijazah' => $this->request->getVar('tanggal_ijazah'),
                    'nomor_ijazah' => $this->request->getVar('nomor_ijazah'),
                    'tahun_lulus' => $this->request->getVar('tahun_lulus'),
                    'keterangan' => $this->request->getVar('keterangan'),
                ]);
                $session = session();
                $session->setFlashdata('success', 'Data Pendidikan Pegawai Berhasil Disimpan!');
                return redirect()->to('/kepala/kelola_pendidikan/' . $id_pegawai);
            }
        }
    }

    public function pendidikan_pegawai_del()
    {
        $id = $this->request->getVar('id');
        $pegawai_id = $this->request->getVar('pegawai_id');
        $this->pendidikanPegawai->where('pend_peg_id', $id)->delete($id);
        $session = session();
        $session->setFlashdata('success', 'Data Berhasil Dihapus!');
        return redirect()->to('/kepala/kelola_pendidikan/' . $pegawai_id);
    }

    public function keluarga_pegawai()
    {
        $pegawai = $this->pegawaiModel->getData();
        $data = [
            'title' => 'Keluarga Pegawai',
            'page' => 'Pegawai',
            'pegawai' => $pegawai,
        ];
        return view('kepala/pegawai/keluarga_pegawai', $data);
    }

    public function keluarga_pegawai_save()
    {
        $id = $this->request->getVar('pegawai_id');

        $rules = [
            'nama' => 'required|max_length[50]',
            'nomor_telepon' => 'required|max_length[15]|min_length[5]',
        ];

        if (!$this->validate($rules)) {
            $data = $this->validator->listErrors();
            $session = session();
            $session->setFlashdata('info', $this->validator->getErrors());
            // dd($data);
            return redirect()->to('/kepala/kelola_keluarga/' . $id);
        } else {
            $this->keluargaPegawai->save([
                'pegawai_id' => $id,
                'hubkel_id' => $this->request->getVar('hubkel'),
                'jenj_pend_id' => $this->request->getVar('jenjang_pendidikan'),
                'nama' => $this->request->getVar('nama'),
                'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                'tempat_lahir' => $this->request->getVar('tempat_lahir'),
                'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
                'telepon' => $this->request->getVar('nomor_telepon'),
                'email' => $this->request->getVar('email'),
                'alamat' => $this->request->getVar('alamat'),
            ]);
            $session = session();
            $session->setFlashdata('success', 'Data Keluarga Pegawai Berhasil Disimpan!');
            return redirect()->to('/kepala/kelola_keluarga/' . $id);
        }
    }

    public function keluarga_pegawai_update()
    {
        $id_pegawai = $this->request->getVar('pegawai_id');
        $id = $this->request->getVar('id');

        $rules = [
            'nama' => 'required|max_length[50]',
            'nomor_telepon' => 'required|max_length[50]',
        ];

        if (!$this->validate($rules)) {
            $data = $this->validator->listErrors();
            $session = session();
            $session->setFlashdata('info', $this->validator->getErrors());
            // dd($data);
            return redirect()->to('/kepala/kelola_keluarga/' . $id_pegawai);
        } else {
            $this->keluargaPegawai->update($id, [
                'hubkel_id' => $this->request->getVar('hubkel'),
                'jenj_pend_id' => $this->request->getVar('jenjang_pendidikan'),
                'nama' => $this->request->getVar('nama'),
                'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                'tempat_lahir' => $this->request->getVar('tempat_lahir'),
                'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
                'telepon' => $this->request->getVar('nomor_telepon'),
                'email' => $this->request->getVar('email'),
                'alamat' => $this->request->getVar('alamat'),
            ]);
            $session = session();
            $session->setFlashdata('success', 'Data Keluarga Pegawai Berhasil Diupdate!');
            return redirect()->to('/kepala/kelola_keluarga/' . $id_pegawai);
        }
    }

    public function keluarga_pegawai_del()
    {
        $id = $this->request->getVar('id');
        $pegawai_id = $this->request->getVar('pegawai_id');
        $this->keluargaPegawai->where('kel_peg_id', $id)->delete($id);
        $session = session();
        $session->setFlashdata('success', 'Data Berhasil Dihapus!');
        return redirect()->to('/kepala/kelola_keluarga/' . $pegawai_id);
    }

    public function kelola_pendidikan($id)
    {
        session();
        $this->db = \Config\Database::connect();
        $sql = $this->db->table('pendidikan_pegawai pp')
            ->select('*')
            ->join('jenis_pendidikan jenis', 'jenis.jenis_pend_id = pp.jenis_pend_id')
            ->join('jenjang_pendidikan jenj', 'jenj.jenj_pend_id = pp.jenj_pend_id')
            ->where('pp.pegawai_id', $id)->get();
        $pendidikan_pegawai = $sql->getResultArray();

        $pegawai = $this->pegawaiModel->getData($id)->getRow();
        $jenis_pendidikan = $this->jenisPendidikan->getData();
        $jenjang_pendidikan = $this->jenjangPendidikan->getData();
        // $pendidikan_pegawai = $this->pendidikanPegawai->getData();
        // dd($pendidikan_pegawai);
        $data = [
            'title' => 'Kelola Pendidikan Pegawai',
            'page' => 'Pegawai',
            'pegawai' => $pegawai,
            'jenis_pendidikan' => $jenis_pendidikan,
            'jenjang_pendidikan' => $jenjang_pendidikan,
            'pendidikan_pegawai' => $pendidikan_pegawai,
            'validation' => \Config\Services::validation(),
        ];
        return view('kepala/pegawai/kelola_pendidikan', $data);
    }

    public function kelola_keluarga($id)
    {
        $keluarga_pegawai = $this->keluargaPegawai->getData();
        // dd($keluarga_pegawai);
        $pegawai = $this->pegawaiModel->getData($id)->getRow();
        $jenjang_pendidikan = $this->jenjangPendidikan->getData();
        $hubkel = $this->hubunganKeluarga->getData();
        $data = [
            'title' => 'Kelola Keluarga Pegawai',
            'page' => 'Pegawai',
            'pegawai' => $pegawai,
            'jenjang_pendidikan' => $jenjang_pendidikan,
            'hubkel' => $hubkel,
            'keluarga_pegawai' => $keluarga_pegawai,
        ];
        return view('kepala/pegawai/kelola_keluarga', $data);
    }

    public function ajax_kab()
    {
        $this->db = \Config\Database::connect();
        $id = $this->request->getVar('id');
        $data = $this->db->table('regencies')->getWhere(['province_id' => $id])->getResult();
        // dd($data);
        echo json_encode($data);
    }

    public function ajax_kec()
    {
        $this->db = \Config\Database::connect();
        $id = $this->request->getVar('id');
        $data = $this->db->table('districts')->getWhere(['regency_id' => $id])->getResult();
        // dd($data);
        echo json_encode($data);
    }

    public function ajax_kel()
    {
        $this->db = \Config\Database::connect();
        $id = $this->request->getVar('id');
        $data = $this->db->table('villages')->getWhere(['district_id' => $id])->getResult();
        // dd($data);
        echo json_encode($data);
    }

    public function kelola_izin()
    {
        $this->db = \Config\Database::connect();
        $sql = $this->db->table('izin_pegawai a')
            ->select('a.izin_pegawai_id, c.nama as jenis_izin, b.nama as nama_izin, p.nama as nama_pegawai, a.tanggal_awal, a.tanggal_akhir, datediff(a.tanggal_akhir, a.tanggal_awal) as lama, a.file, a.status')
            ->join('pegawai p', 'p.pegawai_id = a.pegawai_id')
            ->join('izin b', 'b.izin_id = a.izin_id')
            ->join('izin_jenis c', 'c.izin_jenis_id = b.izin_jenis_id')->get();
        $izin_pegawai = $sql->getResultArray();
        // $izin_pegawai = $this->izinPegawaiModel->getData();
        // dd($izin_pegawai);
        $data = [
            'title' => 'Kelola Izin',
            'izin_pegawai' => $izin_pegawai,
        ];

        return view('kepala/absensi/kelola_izin', $data);
    }

    public function pegawai_izin_view($id)
    {
        $this->db = \Config\Database::connect();
        $sql = $this->db->table('izin_pegawai a')
            ->select('a.izin_pegawai_id, c.nama as jenis_izin, b.nama as nama_izin, a.tanggal_awal, a.tanggal_akhir, datediff(a.tanggal_akhir, a.tanggal_awal) as lama, a.file, a.status')
            ->join('izin b', 'b.izin_id = a.izin_id')
            ->join('izin_jenis c', 'c.izin_jenis_id = b.izin_jenis_id')
            ->where('a.pegawai_id', $id)->get();
        $izin_pegawai = $sql->getResultArray();
        $pegawai = $this->pegawaiModel->getData($id)->getRow();
        // dd($izin_pegawai);
        $data = [
            'title' => 'Izin Detail Pegawai',
            'izin_pegawai' => $izin_pegawai,
            'page' => 'Pegawai',
            'pegawai' => $pegawai,
        ];

        return view('kepala/pegawai/izin_view', $data);
    }

    public function add_izin()
    {
        session();
        $pegawai = $this->pegawaiModel->getData();
        $jenis_izin = $this->izinjenisModel->getData();
        $data = [
            'title' => 'Tambah Izin Pegawai',
            'page' => 'Kelola Izin',
            'jenis_izin' => $jenis_izin,
            'pegawai' => $pegawai,
            'validation' => \Config\Services::validation(),
        ];
        return view('kepala/absensi/add_izin', $data);
    }

    public function get_nama_izin()
    {
        $this->db = \Config\Database::connect();
        $id_jenis = $this->request->getVar('izin_jenis_id');
        $data = $this->db->table('izin')->getWhere(['izin_jenis_id' => $id_jenis])->getResult();
        // dd($data);
        echo json_encode($data);
    }

    public function izin_pegawai_save()
    {
        $rules = [
            'status' => 'required',
            'tanggal_awal' => 'required',
            'tanggal_akhir' => 'required',
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            $session = session();
            $session->setFlashdata('info', $this->validator->getErrors());
            $validation = \Config\Services::validation();
            return redirect()->to('/kepala/add_izin')->withInput()->with('validation', $validation);
        } else {
            $file = $this->request->getFile('file');
            if ($file->isValid() && !$file->hasMoved()) {
                $file_type = $file->getClientMimeType();
                $valid_type = array('image/png', 'image/jpg', 'image/jpeg', 'image/gif', 'application/pdf', 'application/doc', 'application/docx');
                if (in_array($file_type, $valid_type)) {
                    $randomName = $file->getRandomName();
                    $file->move(ROOTPATH . 'public/file/izin/', $randomName);
                    $this->izinPegawaiModel->save([
                        'pegawai_id' => $this->request->getVar('pegawai'),
                        'izin_jenis_id' => $this->request->getVar('jenis_izin'),
                        'izin_id' => $this->request->getVar('nama_izin'),
                        'tanggal_awal' => $this->request->getVar('tanggal_awal'),
                        'tanggal_akhir' => $this->request->getVar('tanggal_akhir'),
                        'keterangan' => $this->request->getVar('keterangan'),
                        'status' => $this->request->getVar('status'),
                        'file' => $randomName,
                    ]);
                    $session = session();
                    $session->setFlashdata('success', 'Data Izin Berhasil Ditambah!');
                    return redirect()->to('/kepala/kelola_izin');
                } else {
                    $session = session();
                    $session->setFlashdata('warning', 'Tipe Gambar Tidak Sesuai');
                    return redirect()->to('/kepala/add_izin');
                }
            } else {
                $this->izinPegawaiModel->save([
                    'pegawai_id' => $this->request->getVar('pegawai'),
                    'izin_jenis_id' => $this->request->getVar('jenis_izin'),
                    'izin_id' => $this->request->getVar('nama_izin'),
                    'tanggal_awal' => $this->request->getVar('tanggal_awal'),
                    'tanggal_akhir' => $this->request->getVar('tanggal_akhir'),
                    'keterangan' => $this->request->getVar('keterangan'),
                    'status' => $this->request->getVar('status'),
                ]);
                $session = session();
                $session->setFlashdata('success', 'Data Izin Berhasil Ditambah!');
                return redirect()->to('/kepala/kelola_izin');
            }
        }
    }

    public function file_izin_download($id)
    {
        $file = $this->izinPegawaiModel->getData($id)->getRow();
        return $this->response->download('file/izin/' . $file->file, null);
    }

    public function ijazah_download($id)
    {
        $file = $this->pendidikanPegawai->getData($id)->getRow();
        return $this->response->download('images/ijazah/' . $file->file, null);
    }

    public function kelola_izin_edit($id)
    {
        $izin_pegawai = $this->izinPegawaiModel->getData($id)->getRow();
        $pegawai = $this->pegawaiModel->getData();
        $jenis_izin = $this->izinjenisModel->getData();
        // dd($izin_pegawai);
        $data = [
            'title' => 'Edit Izin Pegawai',
            'page' => 'Kelola Izin',
            'jenis_izin' => $jenis_izin,
            'pegawai' => $pegawai,
            'izin_pegawai' => $izin_pegawai,
        ];
        return view('kepala/absensi/edit_izin', $data);
    }

    public function konfirmasi_izin()
    {
        $this->db = \Config\Database::connect();
        $sql = $this->db->table('izin_pegawai a')
            ->select('a.izin_pegawai_id, a.keterangan, c.nama as jenis_izin, b.nama as nama_izin, p.nama as nama_pegawai, a.tanggal_awal, a.tanggal_akhir, datediff(a.tanggal_akhir, a.tanggal_awal) as lama, a.file, a.status')
            ->join('pegawai p', 'p.pegawai_id = a.pegawai_id')
            ->join('izin b', 'b.izin_id = a.izin_id')
            ->join('izin_jenis c', 'c.izin_jenis_id = b.izin_jenis_id')
            ->where('a.status', 'Menunggu')->get();
        $izin_pegawai = $sql->getResultArray();
        // $izin_pegawai = $this->izinPegawaiModel->getData();
        // dd($izin_pegawai);
        $data = [
            'title' => 'Konfirmasi Izin',
            'izin_pegawai' => $izin_pegawai,
        ];

        return view('kepala/absensi/konfirmasi_izin', $data);
    }

    public function konfirmasi_izin_approve()
    {
        $id = $this->request->getVar('izin_pegawai_id');
        $this->izinPegawaiModel->update($id, [
            'status' => 'Diterima',
        ]);
        $session = session();
        $session->setFlashdata('success', 'Izin Berhasil Diterima!');
        return redirect()->to('/kepala/kelola_izin');
    }

    public function konfirmasi_izin_reject()
    {
        $id = $this->request->getVar('izin_pegawai_id');
        $this->izinPegawaiModel->update($id, [
            'status' => 'Ditolak',
        ]);
        $session = session();
        $session->setFlashdata('success', 'Izin Pegawai Ditolak!');
        return redirect()->to('/kepala/kelola_izin');
    }


    //ABSENSI
    public function data_fingerprint()
    {
        $finger = $this->fingerprintModel->findAll();

        $data = [
            'title' => 'Data Fingerprint',
            'page' => 'Absensi',
            'fingerprint' => $finger,
        ];

        return view('kepala/absensi/fingerprint', $data);
    }

    public function import_fingerprint()
    {
        $rules = [
            'fingerprint' => 'uploaded[fingerprint]|ext_in[fingerprint,xls,xlsx]|max_size[fingerprint,2048]',
        ];

        $file = $this->request->getFile('fingerprint');

        if (!$this->validate($rules)) {
            $session = session();
            $session->setFlashdata('info', $this->validator->getErrors());
            return redirect()->to('/kepala/data_fingerprint/');
        } else {
            $extension = $file->getClientExtension();

            if ($extension == 'xls') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
            $spreadsheet = $reader->load($file);
            $data = $spreadsheet->getActiveSheet()->toArray();

            foreach ($data as $key => $row) {
                if ($key == 0) {
                    continue;
                }

                $sidik_id = $row[0];
                $date = date('Y-m-d', strtotime($row[1]));
                $time = $row[2];
                $state = $row[3];

                // dd($date);

                $this->fingerprintModel->save([
                    'sidik_id' => $sidik_id,
                    'date' => $date,
                    'time' => $time,
                    'state' => $state,
                ]);
            }


            $session = session();
            $session->setFlashdata('success', 'Data Absensi Pegawai Berhasil Diimport!');
            return redirect()->to('/kepala/data_fingerprint/');
        }
    }

    public function absensi_pegawai()
    {
        $finger = $this->fingerprintModel->findAll();

        $data = [
            'title' => 'Data Fingerprint',
            'page' => 'Absensi',
            'fingerprint' => $finger,
        ];

        return view('kepala/absensi/fingerprint', $data);
    }

    public function absensi_detail($id)
    {
        $pegawai = $this->pegawaiModel->getData($id)->getRow();
        if ($pegawai->sidik_id == NULL || $pegawai->sidik_id == '' || $pegawai->sidik_id == '0') {
            $session = session();
            $session->setFlashdata('warning', 'Sidik Jari Pegawai Belum Di Atur, Harap Masukkan Nomor Sidik Jari');
            return redirect()->to('/kepala/data_pegawai');
        } else {
            $periode = $this->periodeModel->aktif()->getRow();
            $periode_all = $this->periodeModel->getData();
            $fingerprint = $this->fingerprintModel->getData($pegawai->sidik_id)->getResultArray();

            $mulai = $periode->tanggal_mulai;
            $akhir = $periode->tanggal_akhir;

            $tgl1 = date_create($mulai);
            $tgl2 = date_create($akhir);
            $diff  = date_diff($tgl1, $tgl2);
            $range =  $diff->format("%R%a days");

            $todayDate = $mulai;
            $now = strtotime($todayDate);

            for ($i = 0; $i <= $range; $i++) {
                $nilai[] = date('Y-m-d', strtotime('+' . $i . 'days', $now));
            }

            $data = [
                'title' => 'Absensi Detail',
                'page' => 'Absensi',
                'pegawai' => $pegawai,
                'fingerprint' => $fingerprint,
                'list' => $nilai,
                'periode' => $periode_all,
                'aktif' => $periode,
            ];

            return view('kepala/absensi/absensi_detail', $data);
        }
    }

    public function isi_detail($id)
    {
        $data_table = new TablesIgniter();

        $data_table->setTable($this->fingerprintModel->fingerprint_pegawai($id))
            ->setOutput(["id", "sidik_id", "date", "time", "state"]);

        return $data_table->getDatatable();
    }


    //INVENTARIS
    public function data_inventaris()
    {
        $inventaris = $this->inventarisModel->getData();
        $data = [
            'title' => 'Data Inventaris',
            'page' => 'Inventaris',
            'inventaris' => $inventaris,
        ];

        return view('kepala/inventaris/data', $data);
    }

    public function inventaris_save()
    {
        $rules = [
            'nama_barang' => 'required|max_length[50]',
            'nomor_seri' => 'required|max_length[20]',
        ];

        if (!$this->validate($rules)) {
            $data = $this->validator->listErrors();
            $session = session();
            $session->setFlashdata('info', $this->validator->getErrors());
            // dd($data);
            return redirect()->to('/kepala/data_inventaris/');
        } else {
            $date = new DateTime();
            $this->inventarisModel->save([
                'nama_barang' => $this->request->getVar('nama_barang'),
                'nomor_seri' => $this->request->getVar('nomor_seri'),
                'merk' => $this->request->getVar('merk'),
                'unit' => $this->request->getVar('unit'),
                'lokasi' => $this->request->getVar('lokasi'),
                'jumlah' => $this->request->getVar('jumlah'),
                'keterangan' => $this->request->getVar('keterangan'),
                'created_at' => $date->format('d-m-Y H:i:s'),
            ]);
            $session = session();
            $session->setFlashdata('success', 'Data Inventaris Berhasil Disimpan!');
            return redirect()->to('/kepala/data_inventaris/');
        }
    }

    public function inventaris_update()
    {
        $rules = [
            'nama_barang' => 'required|max_length[50]',
            'nomor_seri' => 'required|max_length[20]',
        ];

        if (!$this->validate($rules)) {
            $data = $this->validator->listErrors();
            $session = session();
            $session->setFlashdata('info', $this->validator->getErrors());
            // dd($data);
            return redirect()->to('/kepala/data_inventaris/');
        } else {
            $date = new DateTime();
            $id = $this->request->getVar('inventaris_id');
            $this->inventarisModel->update($id, [
                'nama_barang' => $this->request->getVar('nama_barang'),
                'nomor_seri' => $this->request->getVar('nomor_seri'),
                'merk' => $this->request->getVar('merk'),
                'unit' => $this->request->getVar('unit'),
                'lokasi' => $this->request->getVar('lokasi'),
                'jumlah' => $this->request->getVar('jumlah'),
                'keterangan' => $this->request->getVar('keterangan'),
                'created_at' => $date->format('d-m-Y H:i:s'),
            ]);
            $session = session();
            $session->setFlashdata('success', 'Data Inventaris Berhasil Dirubah!');
            return redirect()->to('/kepala/data_inventaris/');
        }
    }

    public function inventaris_del()
    {
        $id = $this->request->getVar('inventaris_id');
        $this->inventarisModel->where('inventaris_id', $id)->delete($id);
        // $this->userModel->getData();
        $session = session();
        $session->setFlashdata('success', 'Data Berhasil Dihapus!');
        return redirect()->to('/kepala/data_inventaris');
    }

    public function riwayat_peminjaman()
    {
        $this->db = \Config\Database::connect();
        $sql = $this->db->table('peminjaman_inventaris a')
            ->select('p.nama as nama_pegawai, a.pegawai_id, a.inventaris_id, i.nama_barang, a.tanggal_kembali, a.status, a.tanggal_pinjam, a.lokasi_pinjam, a.keperluan, a.foto, a.peminjaman_id')
            ->join('pegawai p', 'p.pegawai_id = a.pegawai_id')
            ->join('inventaris i', 'i.inventaris_id = a.inventaris_id')->get();
        $peminjaman = $sql->getResultArray();
        $data = [
            'title' => 'Riwayat Peminjaman',
            'page' => 'Inventaris',
            'peminjaman' => $peminjaman,
        ];

        return view('kepala/inventaris/peminjaman', $data);
    }

    public function add_peminjaman()
    {
        $inventaris = $this->inventarisModel->getData();
        $pegawai = $this->pegawaiModel->getData();
        $data = [
            'title' => 'Data Inventaris',
            'page' => 'Inventaris',
            'inventaris' => $inventaris,
            'pegawai' => $pegawai,
            'validation' => \Config\Services::validation(),
        ];

        return view('kepala/inventaris/add_peminjaman', $data);
    }

    public function edit_peminjaman($id)
    {
        $peminjaman = $this->peminjamanModel->getData($id)->getRow();
        $inventaris = $this->inventarisModel->getData();
        $pegawai = $this->pegawaiModel->getData();
        $data = [
            'title' => 'Data Inventaris',
            'page' => 'Inventaris',
            'inventaris' => $inventaris,
            'pegawai' => $pegawai,
            'peminjaman' => $peminjaman,
            'validation' => \Config\Services::validation(),
        ];

        return view('kepala/inventaris/edit_peminjaman', $data);
    }

    public function peminjaman_save()
    {
        $rules = [
            'pegawai' => 'required',
            'inventaris' => 'required',
            'tanggal_pinjam' => 'required',
            'keperluan' => 'required',
        ];

        if (!$this->validate($rules)) {
            $data = $this->validator->listErrors();
            $session = session();
            $session->setFlashdata('info', $this->validator->getErrors());
            // dd($data);
            return redirect()->to('/admin/add_peminjaman/');
        } else {
            $file = $this->request->getFile('file');
            $inventaris_id = $this->request->getVar('inventaris');
            $jml = $this->request->getVar('jumlah');
            $asal = $this->inventarisModel->getData($inventaris_id)->getRow();
            $pinjam = $this->peminjamanModel->cek_jumlah($inventaris_id)->getRow();
            $sisa = (intval($asal->jumlah)) - (intval($pinjam->jumlah));
            // dd($sisa);
            if ($sisa < $jml) {
                $session = session();
                $session->setFlashdata('warning', 'Barang tidak mencukupi, harap periksa jumlah barang');
                return redirect()->back()->withInput();
            } else {
                if ($file->isValid() && !$file->hasMoved()) {
                    $file_type = $file->getClientMimeType();
                    $valid_type = array('image/png', 'image/jpg', 'image/jpeg', 'image/gif');
                    if (in_array($file_type, $valid_type)) {
                        $randomName = $file->getRandomName();
                        $file->move(ROOTPATH . 'public/images/peminjaman/', $randomName);

                        $date = new DateTime();
                        $this->peminjamanModel->save([
                            'inventaris_id' => $this->request->getVar('inventaris'),
                            'pegawai_id' => $this->request->getVar('pegawai'),
                            'tanggal_pinjam' => $this->request->getVar('tanggal_pinjam'),
                            'lokasi_pinjam' => $this->request->getVar('lokasi_pinjam'),
                            'keperluan' => $this->request->getVar('keperluan'),
                            'jumlah' => $this->request->getVar('jumlah'),
                            'status' => $this->request->getVar('status'),
                            'foto' => $randomName,
                            'created_at' => $date->format('Y-m-d H:i:s'),
                        ]);
                        $session = session();
                        $session->setFlashdata('success', 'Data Inventaris Berhasil Disimpan!');
                        return redirect()->to('/admin/riwayat_peminjaman');
                    } else {
                        $session = session();
                        $session->setFlashdata('warning', 'Tipe Gambar Tidak Sesuai');
                        return redirect()->to('/admin/add_peminjaman/');
                    }
                } else {
                    $date = new DateTime();
                    $this->peminjamanModel->save([
                        'inventaris_id' => $this->request->getVar('inventaris'),
                        'pegawai_id' => $this->request->getVar('pegawai'),
                        'tanggal_pinjam' => $this->request->getVar('tanggal_pinjam'),
                        'lokasi_pinjam' => $this->request->getVar('lokasi_pinjam'),
                        'keperluan' => $this->request->getVar('keperluan'),
                        'jumlah' => $this->request->getVar('jumlah'),
                        'status' => $this->request->getVar('status'),
                        'created_at' => $date->format('Y-m-d H:i:s'),
                    ]);
                    $session = session();
                    $session->setFlashdata('success', 'Data Inventaris Berhasil Disimpan!');
                    return redirect()->to('/admin/riwayat_peminjaman/');
                }
            }
        }
    }

    public function peminjaman_update()
    {
        $rules = [
            'pegawai' => 'required',
            'inventaris' => 'required',
            'tanggal_pinjam' => 'required',
            'keperluan' => 'required',
        ];

        $id = $this->request->getVar('peminjaman_id');

        if (!$this->validate($rules)) {
            $data = $this->validator->listErrors();
            $session = session();
            $session->setFlashdata('info', $this->validator->getErrors());
            // dd($data);
            return redirect()->to('/kepala/edit_peminjaman/' . $id);
        } else {
            $file = $this->request->getFile('file');
            if ($file->isValid() && !$file->hasMoved()) {
                $file_type = $file->getClientMimeType();
                $valid_type = array('image/png', 'image/jpg', 'image/jpeg', 'image/gif');
                if (in_array($file_type, $valid_type)) {
                    $randomName = $file->getRandomName();
                    $file->move(ROOTPATH . 'public/images/peminjaman/', $randomName);

                    $date = new DateTime();
                    $this->peminjamanModel->update($id, [
                        'inventaris_id' => $this->request->getVar('inventaris'),
                        'pegawai_id' => $this->request->getVar('pegawai'),
                        'tanggal_pinjam' => $this->request->getVar('tanggal_pinjam'),
                        'lokasi_pinjam' => $this->request->getVar('lokasi_pinjam'),
                        'keperluan' => $this->request->getVar('keperluan'),
                        'jumlah' => $this->request->getVar('jumlah'),
                        'foto' => $randomName,
                        'created_at' => $date->format('Y-m-d H:i:s'),
                    ]);
                    $session = session();
                    $session->setFlashdata('success', 'Data Inventaris Berhasil Disimpan!');
                    return redirect()->to('/kepala/riwayat_peminjaman/');
                } else {
                    $session = session();
                    $session->setFlashdata('info', 'Tipe Gambar Tidak Sesuai');
                    return redirect()->to('/kepala/edit_peminjaman/');
                }
            } else {
                $date = new DateTime();
                $this->peminjamanModel->update($id, [
                    'inventaris_id' => $this->request->getVar('inventaris'),
                    'pegawai_id' => $this->request->getVar('pegawai'),
                    'tanggal_pinjam' => $this->request->getVar('tanggal_pinjam'),
                    'lokasi_pinjam' => $this->request->getVar('lokasi_pinjam'),
                    'keperluan' => $this->request->getVar('keperluan'),
                    'jumlah' => $this->request->getVar('jumlah'),
                    'created_at' => $date->format('Y-m-d H:i:s'),
                ]);
                $session = session();
                $session->setFlashdata('success', 'Data Inventaris Berhasil Disimpan!');
                return redirect()->to('/kepala/riwayat_peminjaman/');
            }
        }
    }

    public function peminjaman_del()
    {
        $id = $this->request->getVar('peminjaman_id');
        $this->peminjamanModel->where('peminjaman_id', $id)->delete($id);
        $session = session();
        $session->setFlashdata('success', 'Data Berhasil Dihapus!');
        return redirect()->to('/kepala/riwayat_peminjaman');
    }

    public function konfirmasi_peminjaman()
    {
        $this->db = \Config\Database::connect();
        $sql = $this->db->table('peminjaman_inventaris a')
            ->select('p.nama as nama_pegawai, a.pegawai_id, a.inventaris_id, i.nama_barang, a.tanggal_pinjam, a.lokasi_pinjam, a.keperluan, a.foto, a.peminjaman_id')
            ->join('pegawai p', 'p.pegawai_id = a.pegawai_id')
            ->join('inventaris i', 'i.inventaris_id = a.inventaris_id')
            ->where('a.status', 'Menunggu')->get();
        $peminjaman = $sql->getResultArray();
        // dd($peminjaman);
        $data = [
            'title' => 'Konfirmasi Peminjaman',
            'page' => 'Inventaris',
            'peminjaman' => $peminjaman,
        ];

        return view('kepala/inventaris/konfirmasi', $data);
    }

    public function peminjaman_approve()
    {
        $id = $this->request->getVar('peminjaman_id');
        $peminjaman = $this->peminjamanModel->getData($id)->getRow();
        $asal = $this->inventarisModel->getData($peminjaman->inventaris_id)->getRow();
        $pinjam = $this->peminjamanModel->cek_jumlah($peminjaman->inventaris_id)->getRow();
        $sisa = (intval($asal->jumlah)) - (intval($pinjam->jumlah));
        $jml = $peminjaman->jumlah;
        // dd($sisa);
        if ($sisa < $jml) {
            $session = session();
            $session->setFlashdata('warning', 'Barang tidak mencukupi, harap periksa jumlah barang');
            return redirect()->back()->withInput();
        } else {
            $this->peminjamanModel->update($id, [
                'status' => 'Diterima',
            ]);
            $session = session();
            $session->setFlashdata('success', 'Peminjaman Diterima!');
            return redirect()->to('/kepala/konfirmasi_peminjaman');
        }
    }

    public function peminjaman_reject()
    {
        $id = $this->request->getVar('peminjaman_id');
        $this->peminjamanModel->update($id, [
            'status' => 'Ditolak',
        ]);
        $session = session();
        $session->setFlashdata('success', 'Peminjaman Ditolak!');
        return redirect()->to('/kepala/konfirmasi_peminjaman');
    }

    public function peminjaman_return()
    {
        $rules = [
            'tanggal_kembali' => 'required',
        ];

        $id = $this->request->getVar('peminjaman_id');

        if (!$this->validate($rules)) {
            $data = $this->validator->listErrors();
            $session = session();
            $session->setFlashdata('info', $this->validator->getErrors());
            // dd($data);
            return redirect()->to('/kepala/riwayat_peminjaman');
        } else {
            $date = new DateTime();
            $this->peminjamanModel->update($id, [
                'tanggal_kembali' => $this->request->getVar('tanggal_kembali'),
                'status' => 'Selesai',
            ]);
            $session = session();
            $session->setFlashdata('success', 'Data Inventaris Berhasil Dikembalikan!');
            return redirect()->to('/kepala/riwayat_peminjaman');
        }
    }

    public function change_password()
    {
        $data = [
            'title' => 'Rubah Password',
            'page' => 'Profile',
            'validation' => \Config\Services::validation(),
        ];

        return view('kepala/change_password', $data);
    }

    public function update_password()
    {
        $session = session();
        $id = $session->get('user_id');
        $rules = [
            'password_new' => 'required|min_length[5]',
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            $session = session();
            $session->setFlashdata('info', $this->validator->getErrors());
            $validation = \Config\Services::validation();
            return redirect()->to('/kepala/change_password')->withInput()->with('validation', $validation);
        } else {
            $pass_new = $this->request->getVar('password_new');
            $pass_new_conf = $this->request->getVar('password_new_confirm');

            if ($pass_new == $pass_new_conf) {
                $pass = password_hash($pass_new, PASSWORD_BCRYPT);
                $this->userModel->update($id, [
                    'password' => $pass,
                ]);
                $session = session();
                $session->setFlashdata('success', 'Password Berhasil Dirubah!');
                return redirect()->to('/kepala/change_password');
            } else {
                $session = session();
                $session->setFlashdata('warning', 'Password Tidak Sama');
                return redirect()->to('/kepala/change_password');
            }
        }
    }
}
