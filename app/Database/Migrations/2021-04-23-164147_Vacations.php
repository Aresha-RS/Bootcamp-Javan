<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Vacations extends Migration
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
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => '5'
			],
			'description' => [
				'type' => 'VARCHAR',
				'constraint' => '255'
			]
		]);
		$this->forge->addPrimaryKey('id', true);
		$this->forge->createTable('vacations', true);
	}

	public function down()
	{
		$this->forge->dropTable('vacations');
	}
}
