<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Admin extends BaseController
{
	public function index()
	{
        $session = session();
        $data['title'] = 'Dashboard';
        $data['page'] = 'dashboard';
        $data['role'] = 'admin';

        echo view('index', $data);
    }

    public function data_pegawai()
    {
        $session = session();
        $data['title'] = 'Data Pegawai';
        $data['page'] = 'data_pegawai';
        $data['role'] = 'admin';

        echo view('index', $data);
    }


}