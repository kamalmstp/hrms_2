<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
	public function index()
	{
		$session = session();
		if ($session->get('role') == 'Admin') {
			return redirect()->to('/admin');
		} elseif ($session->get('role') == 'Kepala') {
			return redirect()->to('/kepala');
		} elseif ($session->get('role') == 'Pegawai') {
			return redirect()->to('/pegawai');
		} else {
			$data = [
				'title' => 'Login | HRMS'
			];
			return view('login', $data);
		}
	}

	public function login()
	{
		$session = session();
		$model = new UserModel();
		$username = $this->request->getVar('username');
		$password = $this->request->getVar('password');
		$data = $model->where('username', $username)->first();
		if ($data) {
			$pass = $data['password'];
			$verify_pass = password_verify($password, $pass);
			if ($verify_pass) {
				$ses_data = [
					'user_id'    => $data['user_id'],
					'username'        => $data['username'],
					'pegawai_id'        => $data['pegawai_id'],
					'role'        => $data['role'],
					'logged_in'    => TRUE
				];
				$session->set($ses_data);
				if ($data['role'] == 'Admin') {
					return redirect()->to('/admin');
				} else if ($data['role'] == 'Kepala') {
					return redirect()->to('/kepala');
				} else {
					return redirect()->to('/pegawai');
				}
			} else {
				$session->setFlashdata('msg', 'Password Salah, Harap Periksa Ulang!');
				return redirect()->to('/login');
			}
		} else {
			$session->setFlashdata('msg', 'Email/Password Salah/Tidak Tersedia!');
			return redirect()->to('/login');
		}
	}

	public function logout()
	{
		$session = session();
		$session->destroy();
		return redirect()->to('login');
	}
}
