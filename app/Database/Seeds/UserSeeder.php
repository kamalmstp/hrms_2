<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
	public function run()
	{
		//
		$data = [
				'name' => 'Administrator',
				'email'    => 'admin@gmail.com',
				'password' => '$2y$12$.ctiNZqhRmLhbYjIw1FW5.1qosZUjcVaIJefI6s5BpZu8HFABCjyC',
				'role'	=> 'Admin',
				'pegawai_id' => 0
		];

    // Simple Queries
    $this->db->table('users')->insert($data);
	}
}
