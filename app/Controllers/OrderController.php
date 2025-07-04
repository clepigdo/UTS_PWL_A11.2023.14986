<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TopupModel; // Sesuaikan dengan nama model Anda

class OrderController extends BaseController
{
    public function index()
    {
        $topupModel = new TopupModel();

        // Di sini kita akan mengambil semua pesanan.
        // Untuk aplikasi nyata, Anda mungkin ingin memfilternya berdasarkan user yang login.
        // Kita urutkan berdasarkan yang paling baru.
        $data['orders'] = $topupModel->orderBy('created_at', 'DESC')->findAll();

        $data['title'] = 'Riwayat Pemesanan';

        return view('', $data);
    }
}