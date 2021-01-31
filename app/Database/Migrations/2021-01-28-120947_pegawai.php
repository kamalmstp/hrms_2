<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pegawai extends Migration
{
	public function up()
	{
		
		$this->forge->addField([
			'pegawai_id'	=> [
				'type'			 => 'INT',
				'constraint'	 => 5,
				'auto_increment' => true
			],
			'nama'	=> [
				'type'		 => 'VARCHAR',	
				'constraint' => 50,
				'null'		 =>	 true
			],
			'nik'	=> [
				'type'		 => 'INT',
				'constraint' => 20,
				'null'		 =>	 true
			],
			'tempat_lahir' => [
				'type'		=> 'VARCHAR',
				'constraint' => 30,
				'null'		=> true
			],
			'tanggal_lahir' => [
				'type'		=> 'DATE',
				'null'		=> true
			],
			'jenis_kelamin' => [
				'type'		=> 'VARCHAR',
				'constraint' => 2,
				'null'		=> true
			],
			'status_perkawinan' => [
				'type'		=> 'VARCHAR',
				'constraint' => 20,
				'null'		=> true
			],
			'status_pegawai'    => [
				'type'		=> 'VARCHAR',
				'constraint' => 20,
				'null'		=> true
			],
			'alamat'    => [
				'type'		=> 'LONGTEXT',
				'null'		=> true
			],
			'pendidikan_terakhir'   => [
				'type'		=> 'VARCHAR',
				'constraint' => 10,
				'null'		=> true
			],
			'jabatan_id'    => [
				'type'		=> 'INT',
				'constraint' => 5,
				'null'		=> true
			],
			'tanggal_pengangkatan'  => [
				'type'		=> 'DATE',
				'null'		=> true
			],
			'bidang_id' => [
				'type'		=> 'INT',
				'constraint' => 5,
				'null'		=> true
			],
			'no_hp' => [
				'type'		=> 'INT',
				'constraint' => 20,
				'null'		=> true
			],
			'email' => [
				'type'		=> 'VARCHAR',
				'constraint' => 50,
				'null'		=> true
			],
			'foto' => [
				'type'		=> 'LONGTEXT',
				'null'		=> true
			],
		]);

		$this->forge->addKey('pegawai_id', TRUE);
		$this->forge->createTable('pegawai', TRUE);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable('pegawai');
	}
}
