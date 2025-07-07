<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddHargaAkhirToTopupMl extends Migration
{
    public function up()
    {
        $fields = [
            'harga_akhir' => [
                'type'       => 'DECIMAL',
                'constraint' => '15,2',
                'null'       => true,
                'after'      => 'harga', // Posisi setelah kolom harga dasar
            ],
        ];
        $this->forge->addColumn('topups', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('topups', 'harga_akhir');
    }
}

