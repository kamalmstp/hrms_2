<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Jabatan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'jabatan_id'	=> [
				'type'			 => 'INT',
				'constraint'	 => 5,
				'auto_increment' => true
			],
			'nama'	=> [
				'type'		 => 'VARCHAR',	
				'constraint' => 50,
				'null'		 =>	 true
			],
			'ket'	=> [
				'type'		 => 'VARCHAR',
				'constraint' => 100,
				'null'		 =>	 true
			],
		]);

		$this->forge->addKey('jabatan_id', TRUE);
		$this->forge->createTable('jabatan', TRUE);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable('jabatan');
	}
}
