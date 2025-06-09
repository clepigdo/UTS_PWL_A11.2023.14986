<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TopupSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'user_id' => '123456',
                'server_id' => '7890',
                'nominal' => '86 Diamonds',
                'metode_pembayaran' => 'DANA',
            ],
            [
                'user_id' => '234567',
                'server_id' => '8901',
                'nominal' => '172 Diamonds',
                'metode_pembayaran' => 'GoPay',
            ],
            [
                'user_id' => '345678',
                'server_id' => '9012',
                'nominal' => '258 Diamonds',
                'metode_pembayaran' => 'ShopeePay',
            ],
        ];

        // Simple Queries
        foreach ($data as $item) {
            $this->db->table('topups')->insert($item);
        }
    }
}
