<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Bidang extends Migration
{
	public function up()
	{
		
		$this->forge->addField([
			'bidang_id'	=> [
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

		$this->forge->addKey('bidang_id', TRUE);
		$this->forge->createTable('bidang', TRUE);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable('bidang');
	}
}
