<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TambahKolomHargaStatusTopups extends Migration
{
    public function up()
    {
        // Menambahkan kolom 'harga' jika belum ada atau mengubah tipenya
        $fields = [
            'harga' => [
                'type'       => 'DECIMAL',
                'constraint' => '15,2',
                'default'    => 0.00,
                'after'      => 'nominal', // Posisikan setelah kolom 'nominal'
            ],
            'status_pembayaran' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'default'    => 'pending',
                'after'      => 'metode_pembayaran', // Posisikan setelah 'metode_pembayaran'
            ],
        ];
        $this->forge->addColumn('topups', $fields);
    }

    public function down()
    {
        // Menghapus kolom jika migrasi di-rollback
        $this->forge->dropColumn('topups', ['harga', 'status_pembayaran']);
    }
}