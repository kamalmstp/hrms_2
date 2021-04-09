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

class Admin extends BaseController
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

        return view('admin/master/izin', $data);
    }

    public function izin_jenis_save()
    {
        $rules = [
            'jenis_izin' => 'required|max_length[30]',
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            $session = session();
            $session->setFlashdata('error', 'Data Gagal Disimpan');
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/izin')->withInput()->with('validation', $validation);
        } else {
            $this->izinjenisModel->save([
                'nama' => $this->request->getVar('jenis_izin'),
            ]);
            $session = session();
            $session->setFlashdata('success', 'Data Jenis Izin Berhasil Disimpan!');
            return redirect()->to('/admin/izin');
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
            $session->setFlashdata('error', 'Data Gagal Disimpan');
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/izin')->withInput()->with('validation', $validation);
        } else {
            $id = $this->request->getVar('izin_jenis_id');
            $this->izinjenisModel->update($id, [
                'nama' => $this->request->getVar('jenis_izin'),
            ]);
            $session = session();
            $session->setFlashdata('success', 'Data Jenis Izin Berhasil Dirubah!');
            return redirect()->to('/admin/izin');
        }
    }

    public function izin_jenis_del()
    {
        $id = $this->request->getVar('izin_jenis_id');
        $this->izinjenisModel->where('izin_jenis_id', $id)->delete($id);
        $session = session();
        $session->setFlashdata('success', 'Data Jenis Izin Berhasil Dihapus!');
        return redirect()->to('/admin/izin');
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
            $session->setFlashdata('error', 'Data Gagal Disimpan');
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/izin')->withInput()->with('validation', $validation);
        } else {
            $this->izinModel->save([
                'izin_jenis_id' => $this->request->getVar('jenis_izin'),
                'nama' => $this->request->getVar('nama_izin'),
            ]);
            $session = session();
            $session->setFlashdata('success', 'Data Izin Berhasil Disimpan!');
            return redirect()->to('/admin/izin');
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
            $session->setFlashdata('error', 'Data Gagal Disimpan');
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/izin')->withInput()->with('validation', $validation);
        } else {
            $id = $this->request->getVar('izin_id');
            $this->izinModel->update($id, [
                'izin_jenis_id' => $this->request->getVar('jenis_izin'),
                'nama' => $this->request->getVar('nama_izin'),
            ]);
            $session = session();
            $session->setFlashdata('success', 'Data Izin Berhasil Dirubah!');
            return redirect()->to('/admin/izin');
        }
    }

    public function izin_del()
    {
        $id = $this->request->getVar('izin_id');
        $this->izinModel->where('izin_id', $id)->delete($id);
        $session = session();
        $session->setFlashdata('success', 'Data Izin Berhasil Dihapus!');
        return redirect()->to('/admin/izin');
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

    public function periode()
    {
        $periode = $this->periodeModel->getData();
        $data = [
            'title' => 'Data Periode',
            'page' => 'Master Data',
            'periode' => $periode,
        ];

        return view('admin/master/periode', $data);
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
            $session->setFlashdata('error', 'Data Gagal Disimpan');
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/periode')->withInput()->with('validation', $validation);
        } else {
            $this->periodeModel->save([
                'kode' => $this->request->getVar('kode'),
                'tanggal_mulai' => $this->request->getVar('tanggal_mulai'),
                'tanggal_akhir' => $this->request->getVar('tanggal_akhir'),
                'wajib' => $this->request->getVar('wajib'),
            ]);
            $session = session();
            $session->setFlashdata('success', 'Data Periode Berhasil Disimpan!');
            return redirect()->to('/admin/periode');
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
            $session->setFlashdata('error', 'Data Gagal Disimpan');
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/periode')->withInput()->with('validation', $validation);
        } else {
            $id = $this->request->getVar('periode_id');
            $this->periodeModel->update($id, [
                'kode' => $this->request->getVar('kode'),
                'tanggal_mulai' => $this->request->getVar('tanggal_mulai'),
                'tanggal_akhir' => $this->request->getVar('tanggal_akhir'),
                'wajib' => $this->request->getVar('wajib'),
            ]);
            $session = session();
            $session->setFlashdata('success', 'Data Periode Berhasil Disimpan!');
            return redirect()->to('/admin/periode');
        }
    }

    public function periode_del()
    {
        $id = $this->request->getVar('periode_id');
        $this->periodeModel->where('periode_id', $id)->delete($id);
        $session = session();
        $session->setFlashdata('success', 'Data Berhasil Dihapus!');
        return redirect()->to('/admin/periode');
    }

    //Pegawai
    public function data_pegawai()
    {
        $this->db = \Config\Database::connect();
        $sql = $this->db->table('pegawai p')
            ->select('p.pegawai_id, p.nama, p.gelar_depan, p.gelar_belakang, p.nik, p.tempat_lahir, p.tanggal_lahir, p.jenis_kelamin, p.telepon, p.email, p.gambar, u.user_id, u.username, u.role, u.pegawai_id as id')
            ->join('users u', 'u.pegawai_id = p.pegawai_id', 'Left')->get();
        $pegawai = $sql->getResultArray();
        // $pegawai = $this->pegawaiModel->getData();
        // dd($pegawai);
        $data = [
            'title' => 'Data Pegawai',
            'page' => 'Pegawai',
            'pegawai' => $pegawai,
        ];
        return view('admin/pegawai/data', $data);
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
        return view('admin/pegawai/add', $data);
    }

    public function pegawai_save()
    {
        $file = $this->request->getFile('gambar');

        if (!empty($file)) {
            $rules = [
                'nama' => 'required|max_length[50]',
                'telepon' => 'required|min_length[5]|max_length[15]',
                'email' => 'required|max_length[30]|is_unique[pegawai.email]',
                'gambar' => 'mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar,2048]',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                $session = session();
                $session->setFlashdata('error', $this->validator->listErrors());
                $validation = \Config\Services::validation();
                return redirect()->to('/admin/add_pegawai')->withInput()->with('validation', $validation);
            } else {
                $randomName = $file->getRandomName();
                if ($file->move(ROOTPATH . 'public/images/user/', $randomName)) {
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
                    ]);
                    $session = session();
                    $session->setFlashdata('success', 'Data Pegawai Berhasil Disimpan!');
                    return redirect()->to('/admin/data_pegawai');
                } else {
                    $session = session();
                    $session->setFlashdata('error', 'Gambar Gagal di Upload!');
                }
            }
        } else {

            $rules = [
                'nama' => 'required|max_length[50]',
                'telepon' => 'required|min_length[5]|max_length[15]',
                'email' => 'required|max_length[30]|is_unique[pegawai.email]',
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
                    'kabupaten' => $this->request->getVar('kabupaten'),
                    'kecamatan' => $this->request->getVar('kecamatan'),
                    'kelurahan' => $this->request->getVar('kelurahan'),
                    'alamat' => $this->request->getVar('alamat'),
                    'jenis_pegawai_id' => $this->request->getVar('jenis_pegawai'),
                    'status_pegawai' => $this->request->getVar('status_pegawai'),
                    'tanggal_masuk' => $this->request->getVar('tanggal_masuk'),
                    'rekening' => $this->request->getVar('rekening'),
                ]);
                $session = session();
                $session->setFlashdata('success', 'Data Pegawai Berhasil Disimpan!');
                return redirect()->to('/admin/data_pegawai');
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
        return redirect()->to('/admin/data_pegawai');
    }

    public function edit_pegawai($id)
    {
        $jenis_peg = $this->jenisPegawai->getData();
        $prov = new \App\Models\ProvinsiModel();

        $provinsi = $prov->getData();
        $pegawai = $this->pegawaiModel->getData($id)->getRowArray();
        $data = [
            'title' => 'Edit Pegawai',
            'page' => 'Pegawai',
            'jenis_peg' => $jenis_peg,
            'pegawai' => $pegawai,
            'provinsi' => $provinsi,
        ];
        return view('admin/pegawai/edit', $data);
    }

    public function pegawai_update()
    {
        $file = $this->request->getFile('gambar');

        if (!empty($file)) {
            $rules = [
                'nama' => 'required|max_length[50]',
                'telepon' => 'required|min_length[5]|max_length[15]',
                'email' => 'required|max_length[30]',
                'gambar' => 'mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar,2048]',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                $session = session();
                $session->setFlashdata('error', $this->validator->listErrors());
                $validation = \Config\Services::validation();
                return redirect()->to('/admin/edit_pegawai')->withInput()->with('validation', $validation);
            } else {
                $id = $this->request->getVar('pegawai_id');
                $randomName = $file->getRandomName();
                if ($file->move(ROOTPATH . 'public/images/user/', $randomName)) {
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
                    ]);
                    $session = session();
                    $session->setFlashdata('success', 'Data Pegawai Berhasil Diupdate!');
                    return redirect()->to('/admin/data_pegawai');
                } else {
                    $session = session();
                    $session->setFlashdata('error', 'Gambar Gagal di Upload!');
                }
            }
        } else {

            $rules = [
                'nama' => 'required|max_length[50]',
                'telepon' => 'required|min_length[5]|max_length[15]',
                'email' => 'required|max_length[30]',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                $session = session();
                $session->setFlashdata('error', 'Data Gagal Disimpan');
                $validation = \Config\Services::validation();
                return redirect()->to('/admin/edit_pegawai')->withInput()->with('validation', $validation);
            } else {
                $id = $this->request->getVar('pegawai_id');
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
                    'kabupaten' => $this->request->getVar('kabupaten'),
                    'kecamatan' => $this->request->getVar('kecamatan'),
                    'kelurahan' => $this->request->getVar('kelurahan'),
                    'alamat' => $this->request->getVar('alamat'),
                    'jenis_pegawai_id' => $this->request->getVar('jenis_pegawai'),
                    'status_pegawai' => $this->request->getVar('status_pegawai'),
                    'tanggal_masuk' => $this->request->getVar('tanggal_masuk'),
                    'rekening' => $this->request->getVar('rekening'),
                ]);
                $session = session();
                $session->setFlashdata('success', 'Data Pegawai Berhasil Diupdate!');
                return redirect()->to('/admin/data_pegawai');
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

        return view('admin/absensi/kelola_izin', $data);
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

        return view('admin/pegawai/izin_view', $data);
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
        return view('admin/absensi/add_izin', $data);
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
        $file = $this->request->getFile('file');
        // dd($file);
        if (!empty($file)) {
            $rules = [
                'status' => 'required',
                'tanggal_awal' => 'required',
                'tanggal_akhir' => 'required',
                'file' => 'mime_in[file,image/jpg,image/jpeg,image/png,image/gif]|max_size[file,2048]',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                $session = session();
                $session->setFlashdata('error', 'Data Gagal Disimpan');
                $validation = \Config\Services::validation();
                return redirect()->to('/admin/add_izin')->withInput()->with('validation', $validation);
            } else {
                $randomName = $file->getRandomName();
                if ($file->move(ROOTPATH . 'public/file/izin/', $randomName)) {
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
                    return redirect()->to('/admin/kelola_izin');
                }
            }
        } else {
            $rules = [
                'status' => 'required',
                'tanggal_awal' => 'required',
                'tanggal_akhir' => 'required',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                $session = session();
                $session->setFlashdata('error', 'Data Gagal Disimpan');
                $validation = \Config\Services::validation();
                return redirect()->to('/admin/add_izin')->withInput()->with('validation', $validation);
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
                return redirect()->to('/admin/kelola_izin');
            }
        }
    }

    public function file_izin_download($id)
    {
        $file = $this->izinPegawaiModel->getData($id)->getRow();
        return $this->response->download('file/izin/' . $file->file, null);
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
        return view('admin/absensi/edit_izin', $data);
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

        return view('admin/absensi/konfirmasi_izin', $data);
    }

    public function konfirmasi_izin_approve()
    {
        $id = $this->request->getVar('izin_pegawai_id');
        $this->izinPegawaiModel->update($id, [
            'status' => 'Diterima',
        ]);
        $session = session();
        $session->setFlashdata('success', 'Izin Berhasil Diterima!');
        return redirect()->to('/admin/kelola_izin');
    }

    public function konfirmasi_izin_reject()
    {
        $id = $this->request->getVar('izin_pegawai_id');
        $this->izinPegawaiModel->update($id, [
            'status' => 'Ditolak',
        ]);
        $session = session();
        $session->setFlashdata('success', 'Izin Pegawai Ditolak!');
        return redirect()->to('/admin/kelola_izin');
    }
}
