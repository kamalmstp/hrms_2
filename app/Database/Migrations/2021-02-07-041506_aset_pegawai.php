<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AsetPegawai extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'aset_pegawai_id'	=> [
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
			'pegawai_id'	=> [
				'type'		 => 'INT',
				'constraint' => 5,
				'null'		 =>	 true
			],
			'keterangan'	=> [
				'type'		 => 'longtext',
				'null'		 =>	 true
			],
		]);

		$this->forge->addKey('aset_pegawai_id', TRUE);
		$this->forge->createTable('aset_pegawai', TRUE);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable('aset_pegawai');
	}
}
