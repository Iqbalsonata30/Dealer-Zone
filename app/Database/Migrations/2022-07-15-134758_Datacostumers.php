<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Datacostumers extends Migration
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
            'kota'    => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'kecamatan'    => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],  
            'alamat'    => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
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
        $this->forge->createTable('datacostumers');
    }
    public function down()
    {
        $this->forge->dropTable('datacostumers');
    }
}
