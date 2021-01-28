<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Login extends BaseController
{
	public function index()
	{
		helper(['form']);
		$data['title'] = "Login | HRMS Almazaya Islamic School";
		echo view('login', $data);
	}

	public function login()
	{
		$session = session();
		$model = new UserModel();
		$email = $this->request->getVar('email');
		$password = $this->request->getVar('password');
		$data = $model->where('email', $email)->first();
		if ($data) {
			$pass = $data['password'];
			$verify_pass = password_verify($password, $pass);
			if ($verify_pass) {
				$ses_data = [
					'user_id'	=> $data['user_id'],
					'name'		=> $data['name'],
					'email'		=> $data['email'],
					'role'		=> $data['role'],
					'logged_in'	=> TRUE
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
				$session->setFlashdata('msg', 'Password Salah!');
				return redirect()->to('/login');
			}
		} else {
			$session->setFlashdata('msg', 'Email Salah/Tidak Tersedia!');
			return redirect()->to('/login');
		}
		

	}

	public function logout(){
		$session = session();
		$session->destroy();
		return redirect()->to('login');
	}

	public function forgot()
	{
		$data['title'] = "Forgot Password";
		return view('reset_password', $data);
	}

}
