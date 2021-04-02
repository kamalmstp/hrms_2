<?php

namespace App\Controllers;

use App\Models\HubkelModel;
use App\Models\JenisPegModel;
use App\Models\JenisPendModel;
use App\Models\JenjPendModel;
use App\Models\PegawaiModel;
use App\Models\UserModel;

class Admin extends BaseController
{
    protected $jenisPegawai;
    protected $jenisPendidikan;
    protected $jenjangPendidikan;
    protected $hubunganKeluarga;
    protected $pegawaiModel;
    protected $userModel;


    public function __construct()
    {
        $this->jenisPegawai = new JenisPegModel();
        $this->jenisPendidikan = new JenisPendModel();
        $this->jenjangPendidikan = new JenjPendModel();
        $this->hubunganKeluarga = new HubkelModel();
        $this->pegawaiModel = new PegawaiModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
        ];
        return view('admin/dashboard', $data);
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

        return view('admin/master/jns_pegawai', $data);
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
            $session->setFlashdata('error', 'Data Gagal Disimpan');
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/jns_pegawai')->withInput()->with('validation', $validation);
        } else {
            $this->jenisPegawai->save([
                'jenis_pegawai' => $this->request->getVar('jenis_pegawai'),
                'keterangan' => $this->request->getVar('keterangan'),
            ]);
            $session = session();
            $session->setFlashdata('success', 'Data Jenis Pegawai Berhasil Disimpan!');
            return redirect()->to('/admin/jns_pegawai');
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
            $session->setFlashdata('error', 'Data Gagal Disimpan');
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/jns_pegawai')->withInput()->with('validation', $validation);
        } else {
            $id = $this->request->getVar('jenis_pegawai_id');
            $this->jenisPegawai->update($id, [
                'jenis_pegawai' => $this->request->getVar('jenis_pegawai'),
                'keterangan' => $this->request->getVar('keterangan'),
            ]);
            $session = session();
            $session->setFlashdata('success', 'Data Jenis Pegawai Berhasil Disimpan!');
            return redirect()->to('/admin/jns_pegawai');
        }
    }

    public function jns_pegawai_del()
    {
        $id = $this->request->getVar('jenis_pegawai_id');
        $this->jenisPegawai->where('jenis_pegawai_id', $id)->delete($id);
        $session = session();
        $session->setFlashdata('success', 'Data Berhasil Dihapus!');
        return redirect()->to('/admin/jns_pegawai');
    }

    public function jns_pend()
    {
        $jenis_pendidikan = $this->jenisPendidikan->getData();
        $data = [
            'title' => 'Jenis Pendidikan',
            'page' => 'Master Data',
            'jenis_pendidikan' => $jenis_pendidikan,
        ];

        return view('admin/master/jns_pend', $data);
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
            $session->setFlashdata('error', 'Data Gagal Disimpan');
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/jns_pend')->withInput()->with('validation', $validation);
        } else {
            $this->jenisPendidikan->save([
                'jenis_pendidikan' => $this->request->getVar('jenis_pendidikan'),
                'keterangan' => $this->request->getVar('keterangan'),
            ]);
            $session = session();
            $session->setFlashdata('success', 'Data Jenis Pendidikan Berhasil Disimpan!');
            return redirect()->to('/admin/jns_pend');
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
            $session->setFlashdata('error', 'Data Gagal Disimpan');
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/jns_pend')->withInput()->with('validation', $validation);
        } else {
            $id = $this->request->getVar('jenis_pend_id');
            $this->jenisPendidikan->update($id, [
                'jenis_pendidikan' => $this->request->getVar('jenis_pendidikan'),
                'keterangan' => $this->request->getVar('keterangan'),
            ]);
            $session = session();
            $session->setFlashdata('success', 'Data Jenis Pendidikan Berhasil Disimpan!');
            return redirect()->to('/admin/jns_pend');
        }
    }

    public function jns_pend_del()
    {
        $id = $this->request->getVar('jenis_pend_id');
        $this->jenisPendidikan->where('jenis_pend_id', $id)->delete($id);
        $session = session();
        $session->setFlashdata('success', 'Data Berhasil Dihapus!');
        return redirect()->to('/admin/jns_pend');
    }

    public function jen_pend()
    {
        $jenjang_pendidikan = $this->jenjangPendidikan->getData();
        $data = [
            'title' => 'Jenjang Pendidikan',
            'page' => 'Master Data',
            'jenjang_pendidikan' => $jenjang_pendidikan,
        ];

        return view('admin/master/jen_pend', $data);
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
            $session->setFlashdata('error', 'Data Gagal Disimpan');
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/jen_pend')->withInput()->with('validation', $validation);
        } else {
            $this->jenjangPendidikan->save([
                'jenjang_pendidikan' => $this->request->getVar('jenjang_pendidikan'),
                'keterangan' => $this->request->getVar('keterangan'),
            ]);
            $session = session();
            $session->setFlashdata('success', 'Data Jenjang Pendidikan Berhasil Disimpan!');
            return redirect()->to('/admin/jen_pend');
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
            $session->setFlashdata('error', 'Data Gagal Disimpan');
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/jen_pend')->withInput()->with('validation', $validation);
        } else {
            $id = $this->request->getVar('jenj_pend_id');
            $this->jenjangPendidikan->update($id, [
                'jenjang_pendidikan' => $this->request->getVar('jenjang_pendidikan'),
                'keterangan' => $this->request->getVar('keterangan'),
            ]);
            $session = session();
            $session->setFlashdata('success', 'Data Jenjang Pendidikan Berhasil Disimpan!');
            return redirect()->to('/admin/jen_pend');
        }
    }

    public function jen_pend_del()
    {
        $id = $this->request->getVar('jenj_pend_id');
        $this->jenjangPendidikan->where('jenj_pend_id', $id)->delete($id);
        $session = session();
        $session->setFlashdata('success', 'Data Berhasil Dihapus!');
        return redirect()->to('/admin/jen_pend');
    }

    public function hub_keluarga()
    {
        $hubkel = $this->hubunganKeluarga->getData();
        $data = [
            'title' => 'Hubungan Keluarga',
            'page' => 'Master Data',
            'hubkel' => $hubkel,
        ];

        return view('admin/master/hub_keluarga', $data);
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
            $session->setFlashdata('error', 'Data Gagal Disimpan');
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/hub_keluarga')->withInput()->with('validation', $validation);
        } else {
            $this->hubunganKeluarga->save([
                'hubkel' => $this->request->getVar('hubkel'),
                'keterangan' => $this->request->getVar('keterangan'),
            ]);
            $session = session();
            $session->setFlashdata('success', 'Data Hubungan Keluarga Berhasil Disimpan!');
            return redirect()->to('/admin/hub_keluarga');
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
            $session->setFlashdata('error', 'Data Gagal Disimpan');
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/hub_keluarga')->withInput()->with('validation', $validation);
        } else {
            $id = $this->request->getVar('hubkel_id');
            $this->hubunganKeluarga->update($id, [
                'hubkel' => $this->request->getVar('hubkel'),
                'keterangan' => $this->request->getVar('keterangan'),
            ]);
            $session = session();
            $session->setFlashdata('success', 'Data Hubungan Keluarga Berhasil Disimpan!');
            return redirect()->to('/admin/hub_keluarga');
        }
    }

    public function hub_keluarga_del()
    {
        $id = $this->request->getVar('hubkel_id');
        $this->hubunganKeluarga->where('hubkel_id', $id)->delete($id);
        $session = session();
        $session->setFlashdata('success', 'Data Berhasil Dihapus!');
        return redirect()->to('/admin/hub_keluarga');
    }

    //Pegawai
    public function data_pegawai()
    {
        $this->db = \Config\Database::connect();
        $sql = $this->db->table('pegawai')->select('*')->join('users', 'users.pegawai_id = pegawai.pegawai_id', 'Left')->get();
        $pegawai = $sql->getResultArray();
        // $pegawai = $this->pegawaiModel->getData();
        $data = [
            'title' => 'Data Pegawai',
            'page' => 'Pegawai',
            'pegawai' => $pegawai,
        ];
        return view('admin/pegawai/data', $data);
    }

    public function add_pegawai()
    {
        $jenis_peg = $this->jenisPegawai->getData();
        $data = [
            'title' => 'Tambah Pegawai',
            'page' => 'Pegawai',
            'jenis_peg' => $jenis_peg,
        ];
        return view('admin/pegawai/add', $data);
    }

    public function pegawai_save()
    {
        $rules = [
            'nama' => 'required|max_length[50]',
            'email' => 'required|max_length[30]',
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            $session = session();
            $session->setFlashdata('error', 'Data Gagal Disimpan');
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/add_pegawai')->withInput()->with('validation', $validation);
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
                'kabupaten' => $this->request->getVar('kota'),
                'kecamatan' => $this->request->getVar('kecamatan'),
                'kelurahan' => $this->request->getVar('kelurahan'),
                'alamat' => $this->request->getVar('alamat'),
                'jenis_pegawai_id' => $this->request->getVar('jenis_pegawai'),
                // 'tanggal_masuk' => $this->request->getVar('tanggal_masuk'),
                'status_pegawai' => $this->request->getVar('status_pegawai'),
                'rekening' => $this->request->getVar('rekening'),
            ]);
            $session = session();
            $session->setFlashdata('success', 'Data Pegawai Berhasil Disimpan!');
            return redirect()->to('/admin/data_pegawai');
        }
    }

    public function pegawai_del()
    {
        $id = $this->request->getVar('pegawai_id');
        $this->pegawaiModel->where('pegawai_id', $id)->delete($id);
        $session = session();
        $session->setFlashdata('success', 'Data Berhasil Dihapus!');
        return redirect()->to('/admin/data_pegawai');
    }

    public function edit_pegawai($id)
    {
        $jenis_peg = $this->jenisPegawai->getData();
        $pegawai = $this->pegawaiModel->getData($id)->getRowArray();
        $data = [
            'title' => 'Edit Pegawai',
            'page' => 'Pegawai',
            'jenis_peg' => $jenis_peg,
            'pegawai' => $pegawai,
        ];
        return view('admin/pegawai/edit', $data);
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
            $session->setFlashdata('error', 'Data Gagal Disimpan');
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/data_pegawai')->withInput()->with('validation', $validation);
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
            return redirect()->to('/admin/data_pegawai');
        }
    }

    public function pegawai_akun_delete()
    {
        $id = $this->request->getVar('user_id');
        $this->userModel->where('user_id', $id)->delete($id);
        $session = session();
        $session->setFlashdata('success', 'Data Akun Berhasil Dihapus!');
        return redirect()->to('/admin/data_pegawai');
    }
}
