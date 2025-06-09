<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTopups extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'server_id' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'nominal' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'metode_pembayaran' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
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
        $this->forge->createTable('topups');
    }

    public function down()
    {
        $this->forge->dropTable('topups');
    }
}
