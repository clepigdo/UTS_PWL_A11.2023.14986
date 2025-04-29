<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function admin()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }

        $data = [
            'title'    => 'Dashboard Admin',
            'username' => session()->get('username'),
            'role'     => 'admin',
        ];
        return view('layout', $data);
    }

    public function user()
    {
        if (session()->get('role') !== 'user') {
            return redirect()->to('/login');
        }

        $data = [
            'title'    => 'Dashboard User',
            'username' => session()->get('username'),
            'role'     => 'user',
        ];
        return view('layout', $data);
    }

    public function dashboard()
    {
        $role = session()->get('role');
        $uri  = service('uri')->getSegment(1); // Ambil 'admin' atau 'user'

        if ($role === 'admin' && $uri !== 'admin') {
            return redirect()->to('/admin/dashboard');
        }

        if ($role === 'user' && $uri !== 'user') {
            return redirect()->to('/user/dashboard');
        }

        // Data berdasarkan role
        $data = [
            'title'    => 'Dashboard',
            'username' => session()->get('username'),
            'role'     => $role,
            'info'     => $role === 'admin'
                ? 'Statistik total transaksi, pengguna aktif, laporan harian'
                : 'Riwayat transaksi Anda, status pemesanan, saldo topup',
        ];

        return view('layout', $data);
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
            'username' => session()->get('username'),
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

        $data = [
            'title'    => 'Riwayat Pemesanan',
            'username' => session()->get('username'),
            'role'     => $role,
        ];
        return view('v_riwayat', $data);
    }

    public function cek_pemesanan()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }

        $data = [
            'title'    => 'Cek Pemesanan',
            'username' => session()->get('username'),
            'role'     => session()->get('role'),
        ];
        return view('v_cek_pemesanan', $data);
    }
}
