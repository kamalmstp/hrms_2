<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AsetYayasan extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'aset_yayasan_id'	=> [
				'type'			 => 'INT',
				'constraint'	 => 10,
				'auto_increment' => true
			],
			'nama'	=> [
				'type'		 => 'VARCHAR',	
				'constraint' => 30,
				'null'		 =>	 true
			],
			'jumlah'	=> [
				'type'		 => 'INT',
				'constraint' => 10,
				'null'		 =>	 true
			],
			'file'	=> [
				'type'		 => 'longtext',
				'null'		 =>	 true
			],
			'keterangan'	=> [
				'type'		 => 'longtext',
				'null'		 =>	 true
			],
		]);

		$this->forge->addKey('aset_yayasan_id', TRUE);
		$this->forge->createTable('aset_yayasan', TRUE);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable('aset_yayasan');
	}
}
