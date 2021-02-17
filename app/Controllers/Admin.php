<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\JabatanModel;
use App\Models\BidangModel;
use App\Models\PegawaiModel;
use App\Models\PeriodeModel;
use App\Models\AsetyayasanModel;
use App\Models\AsetpegawaiModel;

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
                'no_ktp' => 'required|min_length[3]|max_length[20]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[pegawai.email]',
                'foto' => 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,2048]',
			];

			if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
                $session = session();
				$session->setFlashdata('error', 'Data tidak Disimpan, ada kesalahan, silahkan isi ulang');
				return redirect()->to('/add_pegawai');
			}else{

                $foto = $this->request->getFile('foto');
                $namabaru = $foto->getRandomName();
                if (!empty($this->request->getFile('foto'))) {
                    if ($foto->move(ROOTPATH . 'public/img/pegawai', $namabaru)) {
                        $model = new PegawaiModel();
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
                } else {
                    $model2 = new PegawaiModel();
                    $newData2 = [
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
                    ];
                    $model2->save($newData2);
                    $session = session();
                    $session->setFlashdata('success', 'Data Pegawai Berhasil Disimpan');
                    return redirect()->to('/data_pegawai');
                }
			}
		}
    }

    public function update_pegawai()
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

    public function aset_yayasan()
    {
        helper('form');
        $aset = new AsetyayasanModel();
        $data['aset'] = $aset->getData();

        $data['title'] = 'Company Assets';
        $data['page'] = 'aset_yayasan';

        echo view('index', $data);
    }

		public function aset_pegawai()
    {
        helper('form');
        $aset = new AsetpegawaiModel();
				$pegawai = new PegawaiModel();
        $data['aset'] = $aset->getData();
				$data['pegawai'] = $pegawai->getData();

        $data['title'] = 'Asset Pegawai';
        $data['page'] = 'aset_pegawai';

        echo view('index', $data);
    }

    public function save_asetc()
    {
        if ($this->request->getMethod() == 'post') {
			$rules = [
				'nama' => 'required|min_length[3]|max_length[50]',
                'jumlah' => 'max_length[10]',
			];

			if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
                $session = session();
				$session->setFlashdata('error', 'Data Gagal Disimpan');
				return redirect()->to('/aset_yayasan');
			}else{
                $file = $this->request->getFile('doc');
                $newname = $file->getRandomName();
                if (!empty($this->request->getFile('doc'))) {
                    if ($file->move(ROOTPATH. 'public/document', $newname)) {
                        $model = new AsetyayasanModel();

                        $newData = [
                            'nama' => $this->request->getVar('nama'),
                            'jumlah' => $this->request->getVar('jumlah'),
                            'file' => $newname,
                            'keterangan' => $this->request->getVar('keterangan'),
                        ];
                        $model->save($newData);
                        $session = session();
                        $session->setFlashdata('success', 'Data Aset Berhasil Disimpan!');
                        return redirect()->to('/aset_yayasan');
                    }else {
                        $session = session();
                        $session->setFlashdata('error', 'Ada Kesalahan, Silahkan Ulangi');
                        return redirect()->to('/aset_yayasan');
                    }
                } else {
                    $model = new AsetyayasanModel();

                    $newData = [
                        'nama' => $this->request->getVar('nama'),
                        'jumlah' => $this->request->getVar('jumlah'),
                        'keterangan' => $this->request->getVar('keterangan'),
                    ];
                    $model->save($newData);
                    $session = session();
                    $session->setFlashdata('success', 'Data Aset Berhasil Disimpan!');
                    return redirect()->to('/aset_yayasan');
                }
            }
        }
    }

		public function save_asetp()
    {
        if ($this->request->getMethod() == 'post') {
			$rules = [
				'nama' => 'required|min_length[3]|max_length[50]',
                'jumlah' => 'max_length[10]',
			];

			if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
                $session = session();
				$session->setFlashdata('error', 'Data Gagal Disimpan');
				return redirect()->to('/aset_pegawai');
			}else{
                $model = new AsetpegawaiModel();

                $newData = [
                    'nama' => $this->request->getVar('nama'),
                    'jumlah' => $this->request->getVar('jumlah'),
										'pegawai_id' => $this->request->getVar('pegawai_id'),
                    'keterangan' => $this->request->getVar('keterangan'),
                ];
                $model->save($newData);
                $session = session();
                $session->setFlashdata('success', 'Data Aset Berhasil Disimpan!');
                return redirect()->to('/aset_pegawai');
            }
        }
    }

    public function do_upload()
    {

    	if ($this->request->getMethod() !== 'post') {
            return redirect()->to(base_url('uploadfile?msg=Method Salah'));
        }

        //$request = \Config\Services::request();
        $file = $this->request->getFile('uploadedFile');
        $name = $file->getName();// Mengetahui Nama File
        $originalName = $file->getClientName();// Mengetahui Nama Asli
        $tempfile = $file->getTempName();// Mengetahui Nama TMP File name
        $ext = $file->getClientExtension();// Mengetahui extensi File
        $type = $file->getClientMimeType();// Mengetahui Mime File
        $size_kb = $file->getSize('kb'); // Mengetahui Ukuran File dalam kb
        $size_mb = $file->getSize('mb');// Mengetahui Ukuran File dalam mb


        //$namabaru = $file->getRandomName();//define nama fiel yang baru secara acak

        if ($type == (('image/png') or ('image/jpeg'))) //cek mime file
        {	// File Tipe Sesuai
        	$image = \Config\Services::image('gd'); //Load Image Libray
        	$info = $image->withFile($file)->getFile()->getProperties(true); //Mendapatkan Files Propertis
        	$width = $info['width'];// Mengetahui Image Width
        	$height = $info['height'];// Mengetahui Image Height

        	helper('filesystem'); // Load Helper File System
        	$direktori = ROOTPATH.'upload'; //definisikan direktori upload
        	$namabaru = 'user_name.jpg'; //definisikan nama fiel yang baru
        	$map = directory_map($direktori, FALSE, TRUE); // List direktori

	        /* Cek File apakah ada */
	        foreach ($map as $key) {
	        	if ($key == $namabaru){
	        		delete_files($direktori,$namabaru); //Hapus terlebih dahulu jika file ada
	        	}
	        }
	        //Metode Upload Pilih salah satu
        	//$path = $this->request->getFile('uploadedFile')->store($direktori, $namabaru);
        	//$file->move($direktori, $namabaru)
	        if ($file->move($direktori, $namabaru)){
	        	return redirect()->to(base_url('uploadfile?msg=Upload Berhasil'));
	        }else{

	        	return redirect()->to(base_url('uploadfile?msg=Upload Gagal'));
	        }
        }else{
        	// File Tipe Tidak Sesuai
        	return redirect()->to(base_url('uploadfile?msg=Format File Salah'));
        }
    }

    public function update_asetc()
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

		public function update_asetp()
    {
        $model = new AsetpegawaiModel();
        $id = $this->request->getVar('aset_pegawai_id');
        $data = [
            'nama' => $this->request->getVar('nama'),
						'jumlah' => $this->request->getVar('jumlah'),
						'pegawai_id' => $this->request->getVar('pegawai_id'),
						'keterangan' => $this->request->getVar('keterangan'),
        ];
        $model->update($id, $data);
        $session = session();
        $session->setFlashdata('success', 'Data Asset Berhasil Dirubah!');
        return redirect()->to('/aset_pegawai');
    }

    public function del_asetc()
    {
        $model = new JabatanModel();

        $id = $this->request->getVar('jabatan_id');
        $model->where('jabatan_id', $id)->delete($id);
        $session = session();
        $session->setFlashdata('success', 'Data Jabatan Berhasil Dihapus!');
        return redirect()->to('/data_jabatan');
    }

		public function del_asetp()
    {
        $model = new AsetpegawaiModel();

        $id = $this->request->getVar('aset_pegawai_id');
        $model->where('aset_pegawai_id', $id)->delete($id);
        $session = session();
        $session->setFlashdata('success', 'Data Aset Berhasil Dihapus!');
        return redirect()->to('/aset_pegawai');
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
				'jabatan' => 'required|min_length[3]|max_length[50]',
                'keterangan' => 'max_length[100]',
			];

			if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
                $session = session();
				$session->setFlashdata('error', 'Data Gagal Disimpan');
				return redirect()->to('/data_jabatan');
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

    public function data_periode()
    {
        helper('form');
        $periode = new PeriodeModel();
        $data['periode'] = $periode->getData();

        $data['title'] = 'Data Periode';
        $data['page'] = 'data_periode';

        echo view('index', $data);
    }

    public function save_periode()
    {
        if ($this->request->getMethod() == 'post') {
			$rules = [
				'kode' => 'required|min_length[3]',
                'date_start' => 'required',
                'date_end' => 'required',
                'total' => 'required',
			];

			if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
                $session = session();
				$session->setFlashdata('error', 'Data Gagal Disimpan');
				return redirect()->to('/data_periode');
			}else{
				$model = new PeriodeModel();

				$newData = [
					'kode' => $this->request->getVar('kode'),
					'date_start' => $this->request->getVar('date_start'),
					'date_end' => $this->request->getVar('date_end'),
					'total' => $this->request->getVar('total'),
				];
				$model->save($newData);
				$session = session();
				$session->setFlashdata('success', 'Data Periode Berhasil Disimpan');
				return redirect()->to('/data_periode');

			}
		}
    }

    public function update_periode()
    {
        $model = new PeriodeModel();
        $id = $this->request->getVar('periode_id');
        $data = [
            'kode' => $this->request->getVar('kode'),
            'date_start' => $this->request->getVar('date_start'),
            'date_end' => $this->request->getVar('date_end'),
            'total' => $this->request->getVar('total'),
        ];
        $model->update($id, $data);
        $session = session();
        $session->setFlashdata('success', 'Data Periode Berhasil Dirubah!');
        return redirect()->to('/data_periode');
    }

    public function del_periode()
    {
        $model = new PeriodeModel();

        $id = $this->request->getVar('periode_id');
        $model->where('periode_id', $id)->delete($id);
        $session = session();
        $session->setFlashdata('success', 'Data periode Berhasil Dihapus!');
        return redirect()->to('/data_periode');
    }

}
