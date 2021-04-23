<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Students extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned'	=> true,
				'auto_increment' => true
			],
			'nis' => [
				'type' => 'VARCHAR',
				'constraint' => '8'
			],
			'nama' => [
				'type' => 'VARCHAR',
				'constraint' => '100'
			],
			'kelas' => [
				'type' => 'ENUM',
				'constraint' => ['X', 'XI', 'XII'],
				'default' => 'X'
			],
			'vacation_id' => [
				'type' => 'INT',
				'constraint' => 11
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => '100'
			],
			'phone' => [
				'type' => 'VARCHAR',
				'constraint' => '15'
			],
			'alamat' => [
				'type' => 'VARCHAR',
				'constraint' => '255'
			]
		]);
		$this->forge->addPrimaryKey('id', true);
		$this->forge->createTable('students', true);
	}

	public function down()
	{
		$this->forge->dropTable('students');
	}
}
