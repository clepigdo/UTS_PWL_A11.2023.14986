<?php

namespace App\Models;

use CodeIgniter\Model;

class TopupModel extends Model
{
    protected $table = 'topups';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'server_id', 'pembeli_id', 'nominal', 'harga', 'harga_akhir', 'metode_pembayaran', 'status_pembayaran'];
    protected $useTimestamps = true;

    public function getSummaryData()
    {
        // Tentukan status mana yang dianggap sebagai transaksi sukses
        $successStatuses = ['paid', 'settlement'];

        // Hitung Total Volume (jumlah dari kolom 'harga') untuk transaksi sukses
        $totalVolume = $this->whereIn('status_pembayaran', $successStatuses)
            ->selectSum('harga_akhir', 'total_volume')
            ->first()['total_volume'] ?? 0;

        // Hitung Jumlah Transaksi sukses
        $totalTransaksi = $this->whereIn('status_pembayaran', $successStatuses)
            ->countAllResults();

        // Kembalikan data dalam bentuk array
        return [
            'total_volume'    => $totalVolume,
            'total_transaksi' => $totalTransaksi,
        ];
    }
}
