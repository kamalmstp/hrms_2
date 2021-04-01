<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'user_id'	=> [
				'type'			 => 'INT',
				'constraint'	 => 5,
				'auto_increment' => true
			],
			'name'	=> [
				'type'		 => 'VARCHAR',	
				'constraint' => 50,
				'null'		 =>	 true
			],
			'email'	=> [
				'type'		 => 'VARCHAR',
				'constraint' => 50,	
			],
			'password'	=> [
				'type'		 => 'LONGTEXT',
				'null'		 =>	 true
			],
			'role'	=> [
				'type'		 => 'VARCHAR',	
				'constraint' => 10,
				'null'		 =>	 true
			],
			'pegawai_id'	=> [
				'type'		 => 'INT',	
				'constraint' => 5,
				'null'		 =>	 true
			],
		]);

		$this->forge->addKey('user_id', TRUE);
		$this->forge->createTable('users', TRUE);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable('users');
	}
}
