<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TopupModel; // Pastikan ini di-import

class DashboardController extends BaseController
{
    public function admin()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }

        $data = [
            'title'    => 'Dashboard Admin',
            'username' => session()->get('nama'), // Menggunakan 'nama' dari sesi
            'role'     => 'admin',
        ];
        // Merender view v_dashboard
        return view('v_dashboard', $data);
    }

    public function user()
    {
        if (session()->get('role') !== 'user') {
            return redirect()->to('/login');
        }

        $data = [
            'title'    => 'Dashboard User',
            'username' => session()->get('nama'), // Menggunakan 'nama' dari sesi
            'role'     => 'user',
        ];
        // Merender view v_dashboard
        return view('v_dashboard', $data);
    }

    public function dashboard()
    {
        $role = session()->get('role');
        $uri  = service('uri')->getSegment(1);

        if ($role === 'admin' && $uri !== 'admin') {
            return redirect()->to('/admin/dashboard');
        }

        if ($role === 'user' && $uri !== 'user') {
            return redirect()->to('/user/dashboard');
        }

        // Data berdasarkan role
        $data = [
            'title'    => 'Dashboard',
            'username' => session()->get('nama'), // Menggunakan 'nama' dari sesi
            'role'     => $role,
            'info'     => $role === 'admin'
                ? 'Statistik total transaksi, pengguna aktif, laporan harian'
                : 'Riwayat transaksi Anda, status pemesanan, saldo topup',
        ];

        // Merender view v_dashboard
        return view('v_dashboard', $data);
    }



    public function v_topup()
    {
        $role = session()->get('role');
        $uri  = service('uri')->getSegment(1);

        if ($role === 'admin' && $uri !== 'admin') {
            return redirect()->to('/admin/v_topup');
        }

        if ($role === 'user' && $uri !== 'user') {
            return redirect()->to('/user/v_topup');
        }

        $data = [
            'title'    => 'Halaman Topup',
            'username' => session()->get('nama'), // Menggunakan 'nama' dari sesi
            'role'     => $role,
        ];
        return view('v_topup', $data);
    }


    public function riwayat_pemesanan()
    {
        $role = session()->get('role');
        $uri  = service('uri')->getSegment(1); // Ambil 'admin' atau 'user' dari URL

        // Cegah akses silang role
        if ($role === 'admin' && $uri !== 'admin') {
            return redirect()->to('/admin/riwayat_pemesanan');
        }

        if ($role === 'user' && $uri !== 'user') {
            return redirect()->to('/user/riwayat_pemesanan');
        }

        // 1. Inisialisasi Model
        $topupModel = new TopupModel();

        // 2. Siapkan data dasar
        $data = [
            'title'    => 'Riwayat Pemesanan',
            'username' => session()->get('nama'), // Menggunakan 'nama' dari sesi
            'role'     => $role,
        ];

        // 3. Ambil data pesanan berdasarkan role
        if ($role === 'admin') {
            // Jika admin, tampilkan semua pesanan
            $data['orders'] = $topupModel->orderBy('created_at', 'DESC')->findAll();
        } else {
            // Jika user, tampilkan hanya pesanannya sendiri
            // ASUMSI: Anda punya 'user_id' di session yang cocok dengan kolom di tabel pesanan
            $userId = session()->get('id_user'); // Sesuaikan nama session ID Anda
            $data['orders'] = $topupModel->where('user_id_pembeli', $userId) // Sesuaikan nama kolom
                ->orderBy('created_at', 'DESC')
                ->findAll();
        }
    

        // Kirim semua data (termasuk data pesanan) ke view
        return view('v_riwayat', $data);
    }

    public function cek_pemesanan()
    {
        // Hanya admin yang bisa mengakses halaman ini
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }

        $topupModel = new TopupModel();
        $order = null; // Inisialisasi variabel order
        $orderId = $this->request->getVar('order_id'); // Ambil order_id dari GET/POST request

        // Jika order_id ada, coba cari data pesanan
        if ($orderId) {
            $order = $topupModel->find($orderId); // Mencari pesanan berdasarkan primary key (id)
            if (!$order) {
                session()->setFlashdata('error', 'Pesanan dengan ID ' . esc($orderId) . ' tidak ditemukan.');
            }
        }

        $data = [
            'title'    => 'Cek Pemesanan',
            'username' => session()->get('nama'), // Menggunakan 'nama' dari sesi
            'role'     => session()->get('role'),
            'order'    => $order, // Teruskan data pesanan ke view
            'input_order_id' => $orderId // Teruskan ID yang dimasukkan pengguna
        ];
        return view('v_cek_pemesanan', $data);
    }
}