<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPembeliIdToTopupMl extends Migration
{
    public function up()
    {

        $fields = [
            'pembeli_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true, 
                'after'      => 'server_id', 
            ],
        ];

        
        $this->forge->addColumn('topups', $fields);
    }

    public function down()
    {
        
        $this->forge->dropColumn('topups', 'pembeli_id');
    }
}
