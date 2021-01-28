<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\JabatanModel;
use App\Models\BidangModel;
use App\Models\PegawaiModel;

class Admin extends BaseController
{
	public function index()
	{
        $data['title'] = 'Dashboard';
        $data['page'] = 'dashboard';

        echo view('index', $data);
    }

    public function data_pegawai()
    {
        $model = new PegawaiModel();
        $data['title'] = 'Data Pegawai';
        $data['page'] = 'data_pegawai';
        $data['pegawai'] = $model->getData();
        echo view('index', $data);
    }

    public function add_pegawai()
    {
        $jabatan = new JabatanModel();
        $bidang = new BidangModel();
        helper('form');
        $data['title'] = 'Add Pegawai';
        $data['page'] = 'add_pegawai';
        $data['jabatan'] = $jabatan->getData();
        $data['bidang'] = $bidang->getData();

        echo view('index', $data);
    }

    public function save_pegawai()
    {
        if ($this->request->getMethod() == 'post') {
			$rules = [
				'nama' => 'required|min_length[3]|max_length[50]',
                'no_ktp' => 'required|min_length[3]|max_length[16]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[pegawai.email]',
                'foto' => 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,2048]',
			];

			if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
                $session = session();
				$session->setFlashdata('error', 'Data tidak Disimpan, ada kesalahan, silahkan isi ulang');
				return redirect()->to('/add_pegawai');
			}else{
                $model = new PegawaiModel();
                $foto = $this->request->getFile('foto');
                $namabaru = $foto->getRandomName();
                if ($foto->move(ROOTPATH . 'public/img/pegawai', $namabaru)) {
                    $newData = [
                        'nama' => $this->request->getVar('nama'),
                        'nik' => $this->request->getVar('no_ktp'),
                        'tempat_lahir' => $this->request->getVar('tempat_lahir'),
                        'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
                        'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                        'status_perkawinan' => $this->request->getVar('status_perkawinan'),
                        'status_pegawai'    => $this->request->getVar('status_pegawai'),
                        'alamat'    => $this->request->getVar('alamat'),
                        'pendidikan_terakhir'   => $this->request->getVar('pendidikan_terakhir'),
                        'jabatan_id'    => $this->request->getVar('jabatan_id'),
                        'tanggal_pengangkatan'  => $this->request->getVar('tanggal_pengangkatan'),
                        'bidang_id' => $this->request->getVar('bidang_id'),
                        'no_hp' => $this->request->getVar('no_hp'),
                        'email' => $this->request->getVar('email'),
                        'foto' => $namabaru,
                    ];
                    $model->save($newData);
                    $session = session();
                    $session->setFlashdata('success', 'Data Pegawai Berhasil Disimpan');
                    return redirect()->to('/data_pegawai');
                } else {
                    $session = session();
                    $session->setFlashdata('error', 'Ada kesalahan');
                    return redirect()->to('/add_pegawai');
                }
			}
		}
    }

    public function data_jabatan()
    {
        helper('form');
        $jabatan = new JabatanModel();
        $data['jabatan'] = $jabatan->getData();

        $data['title'] = 'Data Jabatan';
        $data['page'] = 'data_jabatan';

        echo view('index', $data);
    }

    public function save_jabatan()
    {
        if ($this->request->getMethod() == 'post') {
			$rules = [
				'bidang' => 'required|min_length[3]|max_length[50]',
                'keterangan' => 'max_length[100]',
			];

			if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
                $session = session();
				$session->setFlashdata('error', 'Data Gagal Disimpan');
				return redirect()->to('/data_bidang');
			}else{
                $model = new JabatanModel();

                $newData = [
                    'nama' => $this->request->getVar('jabatan'),
                    'ket' => $this->request->getVar('keterangan'),
                ];
                $model->save($newData);
                $session = session();
                $session->setFlashdata('success', 'Data Jabatan Berhasil Disimpan!');
                return redirect()->to('/data_jabatan');
            }
        }
    }

    public function update_jabatan()
    {
        $model = new JabatanModel();
        $id = $this->request->getVar('jabatan_id');
        $data = [
            'nama' => $this->request->getVar('jabatan'),
            'ket' => $this->request->getVar('keterangan'),
        ];
        $model->update($id, $data);
        $session = session();
        $session->setFlashdata('success', 'Data Jabatan Berhasil Dirubah!');
        return redirect()->to('/data_jabatan');
    }

    public function del_jabatan()
    {
        $model = new JabatanModel();
        
        $id = $this->request->getVar('jabatan_id');
        $model->where('jabatan_id', $id)->delete($id);
        $session = session();
        $session->setFlashdata('success', 'Data Jabatan Berhasil Dihapus!');
        return redirect()->to('/data_jabatan');
    }

    public function data_bidang()
    {
        helper('form');
        $bidang = new BidangModel();
        $data['bidang'] = $bidang->getData();

        $data['title'] = 'Data Bidang';
        $data['page'] = 'data_bidang';

        echo view('index', $data);
    }

    public function save_bidang()
    {
        if ($this->request->getMethod() == 'post') {
			$rules = [
				'bidang' => 'required|min_length[3]|max_length[50]',
                'keterangan' => 'max_length[100]',
			];

			if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
                $session = session();
				$session->setFlashdata('error', 'Data Gagal Disimpan');
				return redirect()->to('/data_bidang');
			}else{
				$model = new BidangModel();

				$newData = [
					'nama' => $this->request->getVar('bidang'),
					'ket' => $this->request->getVar('keterangan'),
				];
				$model->save($newData);
				$session = session();
				$session->setFlashdata('success', 'Data Bidang Berhasil Disimpan');
				return redirect()->to('/data_bidang');

			}
		}
    }

    public function update_bidang()
    {
        $model = new BidangModel();
        $id = $this->request->getVar('bidang_id');
        $data = [
            'nama' => $this->request->getVar('bidang'),
            'ket' => $this->request->getVar('keterangan'),
        ];
        $model->update($id, $data);
        $session = session();
        $session->setFlashdata('success', 'Data Bidang Berhasil Dirubah!');
        return redirect()->to('/data_bidang');
    }

    public function del_bidang()
    {
        $model = new BidangModel();
        
        $id = $this->request->getVar('bidang_id');
        $model->where('bidang_id', $id)->delete($id);
        $session = session();
        $session->setFlashdata('success', 'Data Bidang Berhasil Dihapus!');
        return redirect()->to('/data_bidang');
    }

}