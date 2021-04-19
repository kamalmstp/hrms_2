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
use App\Models\InventarisModel;

class Pegawai extends BaseController
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
    protected $inventarisModel;


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
        $this->inventarisModel = new InventarisModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
        ];
        return view('pegawai/dashboard', $data);
    }

    //Izin
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

    //Pendidikan
    public function pendidikan()
    {
        $session = session();
        $this->db = \Config\Database::connect();
        $sql = $this->db->table('pendidikan_pegawai pp')
            ->select('*')
            ->join('jenis_pendidikan jenis', 'jenis.jenis_pend_id = pp.jenis_pend_id')
            ->join('jenjang_pendidikan jenj', 'jenj.jenj_pend_id = pp.jenj_pend_id')
            ->where('pp.pegawai_id', $session->get('pegawai_id'))->get();
        $pendidikan_pegawai = $sql->getResultArray();

        $pegawai = $this->pegawaiModel->getData($session->get('pegawai_id'))->getRow();
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
        return view('pegawai/pendidikan', $data);
    }

    public function pendidikan_save()
    {
        $session = session();
        $id = $session->get('pegawai_id');

        $rules = [
            'nama_pendidikan' => 'required|max_length[50]',
            'penyelenggara' => 'required|max_length[50]',
            'nomor_ijazah' => 'required|max_length[50]',
        ];

        if (!$this->validate($rules)) {
            $data = $this->validator->listErrors();
            $session->setFlashdata('info', $this->validator->getErrors());
            // dd($data);
            return redirect()->to('/pegawai/pendidikan');
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
                    return redirect()->to('/pegawai/pendidikan');
                } else {
                    $session = session();
                    $session->setFlashdata('warning', 'Tipe gambar yang dipilih tidak sesuai');
                    return redirect()->to('/pegawai/pendidikan');
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
                return redirect()->to('/pegawai/pendidikan');
            }
        }
    }

    public function pendidikan_update()
    {
        $session = session();
        $id_pegawai = $session->get('pegawai_id');
        $id = $this->request->getVar('id');

        $rules = [
            'nama_pendidikan' => 'required|max_length[50]',
            'penyelenggara' => 'required|max_length[50]',
            'nomor_ijazah' => 'required|max_length[50]',
        ];

        if (!$this->validate($rules)) {
            $data = $this->validator->listErrors();
            $session->setFlashdata('info', $this->validator->getErrors());
            // dd($data);
            return redirect()->to('/pegawai/pendidikan');
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
                    return redirect()->to('/pegawai/pendidikan');
                } else {
                    $session = session();
                    $session->setFlashdata('warning', 'Tipe gambar yang dipilih tidak sesuai');
                    return redirect()->to('/pegawai/pendidikan');
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
                return redirect()->to('/pegawai/pendidikan');
            }
        }
    }

    public function pendidikan_del()
    {
        $session = session();
        $id = $this->request->getVar('id');
        $pegawai_id = $session->get('pegawai_id');
        $this->pendidikanPegawai->where('pend_peg_id', $id)->delete($id);
        $session->setFlashdata('success', 'Data Berhasil Dihapus!');
        return redirect()->to('/pegawai/pendidikan');
    }

    //Keluarga
    public function keluarga()
    {
        $session = session();
        $id = $session->get('pegawai_id');
        $keluarga_pegawai = $this->keluargaPegawai->getData();
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
        return view('pegawai/keluarga', $data);
    }

    public function keluarga_save()
    {
        $session = session();
        $id = $session->get('pegawai_id');

        $rules = [
            'nama' => 'required|max_length[50]',
            'nomor_telepon' => 'required|max_length[15]|min_length[5]',
        ];

        if (!$this->validate($rules)) {
            $session->setFlashdata('info', $this->validator->getErrors());
            return redirect()->to('/pegawai/keluarga');
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
            return redirect()->to('/pegawai/keluarga');
        }
    }

    public function keluarga_update()
    {
        $session = session();
        $id_pegawai = $session->get('pegawai_id');
        $id = $this->request->getVar('id');

        $rules = [
            'nama' => 'required|max_length[50]',
            'nomor_telepon' => 'required|max_length[50]',
        ];

        if (!$this->validate($rules)) {
            $session->setFlashdata('info', $this->validator->getErrors());
            // dd($data);
            return redirect()->to('/pegawai/keluarga');
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
            return redirect()->to('/pegawai/keluarga');
        }
    }

    public function keluarga_del()
    {
        $id = $this->request->getVar('id');
        $this->keluargaPegawai->where('kel_peg_id', $id)->delete($id);
        $session = session();
        $session->setFlashdata('success', 'Data Berhasil Dihapus!');
        return redirect()->to('/pegawai/keluarga');
    }

    //Inventaris
    public function data_inventaris()
    {
        $inventaris = $this->inventarisModel->getData();
        $data = [
            'title' => 'Data Inventaris',
            'page' => 'Inventaris',
            'inventaris' => $inventaris,
        ];

        return view('pegawai/inventaris/inventaris', $data);
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

        return view('pegawai/inventaris/peminjaman', $data);
    }

    public function add_peminjaman()
    {
        $session = session();
        $inventaris = $this->inventarisModel->getData();
        $pegawai = $this->pegawaiModel->getData($session->get('pegawai_id'))->getRow();
        $data = [
            'title' => 'Data Inventaris',
            'page' => 'Inventaris',
            'inventaris' => $inventaris,
            'pegawai' => $pegawai,
            'validation' => \Config\Services::validation(),
        ];

        return view('pegawai/inventaris/add_peminjaman', $data);
    }

    public function edit_peminjaman($id)
    {
        $session = session();
        $peminjaman = $this->peminjamanModel->getData($id)->getRow();
        $inventaris = $this->inventarisModel->getData();
        $pegawai = $this->pegawaiModel->getData($session->get('pegawai_id'))->getRow();
        $data = [
            'title' => 'Data Inventaris',
            'page' => 'Inventaris',
            'inventaris' => $inventaris,
            'pegawai' => $pegawai,
            'peminjaman' => $peminjaman,
            'validation' => \Config\Services::validation(),
        ];

        return view('pegawai/inventaris/edit_peminjaman', $data);
    }

    public function peminjaman_save()
    {
        $rules = [
            'inventaris' => 'required',
            'tanggal_pinjam' => 'required',
            'keperluan' => 'required',
        ];

        if (!$this->validate($rules)) {
            $data = $this->validator->listErrors();
            $session = session();
            $session->setFlashdata('info', $this->validator->getErrors());
            // dd($data);
            return redirect()->to('/pegawai/add_peminjaman/');
        } else {
            $file = $this->request->getFile('file');
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
                        'status' => 'Menunggu',
                        'foto' => $randomName,
                        'created_at' => $date->format('Y-m-d H:i:s'),
                    ]);
                    $session = session();
                    $session->setFlashdata('success', 'Data Inventaris Berhasil Diajukan!');
                    return redirect()->to('/pegawai/riwayat_peminjaman');
                } else {
                    $session = session();
                    $session->setFlashdata('info', 'Tipe Gambar Tidak Sesuai');
                    return redirect()->to('/pegawai/add_peminjaman/');
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
                    'status' => 'Menunggu',
                    'created_at' => $date->format('Y-m-d H:i:s'),
                ]);
                $session = session();
                $session->setFlashdata('success', 'Data Inventaris Berhasil Disimpan!');
                return redirect()->to('/pegawai/riwayat_peminjaman/');
            }
        }
    }

    public function peminjaman_update()
    {
        $rules = [
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
            return redirect()->to('/pegawai/edit_peminjaman/' . $id);
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
                        'tanggal_pinjam' => $this->request->getVar('tanggal_pinjam'),
                        'lokasi_pinjam' => $this->request->getVar('lokasi_pinjam'),
                        'keperluan' => $this->request->getVar('keperluan'),
                        'jumlah' => $this->request->getVar('jumlah'),
                        'foto' => $randomName,
                        'created_at' => $date->format('Y-m-d H:i:s'),
                    ]);
                    $session = session();
                    $session->setFlashdata('success', 'Data Inventaris Berhasil Disimpan!');
                    return redirect()->to('/pegawai/riwayat_peminjaman/');
                } else {
                    $session = session();
                    $session->setFlashdata('info', 'Tipe Gambar Tidak Sesuai');
                    return redirect()->to('/pegawai/edit_peminjaman/');
                }
            } else {
                $date = new DateTime();
                $this->peminjamanModel->update($id, [
                    'inventaris_id' => $this->request->getVar('inventaris'),
                    'tanggal_pinjam' => $this->request->getVar('tanggal_pinjam'),
                    'lokasi_pinjam' => $this->request->getVar('lokasi_pinjam'),
                    'keperluan' => $this->request->getVar('keperluan'),
                    'jumlah' => $this->request->getVar('jumlah'),
                    'created_at' => $date->format('Y-m-d H:i:s'),
                ]);
                $session = session();
                $session->setFlashdata('success', 'Data Inventaris Berhasil Disimpan!');
                return redirect()->to('/pegawai/riwayat_peminjaman/');
            }
        }
    }

    public function peminjaman_del()
    {
        $id = $this->request->getVar('peminjaman_id');
        $this->peminjamanModel->where('peminjaman_id', $id)->delete($id);
        $session = session();
        $session->setFlashdata('success', 'Data Berhasil Dihapus!');
        return redirect()->to('/pegawai/riwayat_peminjaman');
    }
}
