<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Motorcycle extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'merk' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'slug' => [
                'type'      => 'VARCHAR',
                'constraint' => '255',
            ],
            'produk' => [
                'type'      => 'VARCHAR',
                'constraint' => '255',
            ],
            'harga' => [
                'type'      => 'BIGINT',
                'constraint' => '20',
            ],
            'gambar' => [
                'type'      => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('motorcycle');
    }

    public function down()
    {
        $this->forge->dropTable('motorcycle');
    }
}
