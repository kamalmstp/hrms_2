<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Periode extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'periode_id'	=> [
				'type'			 => 'INT',
				'constraint'	 => 10,
				'auto_increment' => true
			],
			'kode'	=> [
				'type'		 => 'VARCHAR',	
				'constraint' => 5,
				'null'		 =>	 true
			],
			'date_start'	=> [
				'type'		 => 'date',
				'null'		 =>	 true
			],
			'date_end'	=> [
				'type'		 => 'date',
				'null'		 =>	 true
			],
			'total'	=> [
				'type'		 => 'INT',
				'constraint'	 => 5,
				'null'		 =>	 true
			],
		]);

		$this->forge->addKey('periode_id', TRUE);
		$this->forge->createTable('periode', TRUE);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable('periode');
	}
}
