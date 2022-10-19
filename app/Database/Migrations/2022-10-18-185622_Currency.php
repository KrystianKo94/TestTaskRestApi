<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Currency extends Migration
{
public function up()
	{
		$this->forge->addField([
			'id' => [
			'type' => 'VARCHAR',
                        'constraint'=>36,
                'unique' => TRUE,
                'default' => 'uuid()',
		'comment' => 'ID '
			],
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => 40,
				'null' => false,
				'comment' => 'nazwa waluty'
			],
			'currency_code' => [
				'type' => 'VARCHAR',
				'constraint' => 40,
				'null' => false,
				'comment' => 'skrót'
			],
			'exchange_rate' => [
				'type' => 'decimal(10,4)',
				'null' => false,
				'comment' => 'wartosc'
			]
			
                
            
			]);
			$this->forge->addKey('id', true);
			
			$this->forge->createTable('Currency');
	}

	public function down()
	{
		$this->forge->dropTable('Currency');
	}
}
