<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Costumers extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username'   => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'fullname'    => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'merk'    => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],  
            'harga'    => [
                'type'       => 'BIGINT',
                'constraint' => '20'
            ],  
            'created_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
                'null'       => true
            ],
        ]);
        $this->forge->addKey('id',true);
        $this->forge->createTable('costumers');
    }
    public function down()
    {
        $this->forge->dropTable('costumers');
    }
}
