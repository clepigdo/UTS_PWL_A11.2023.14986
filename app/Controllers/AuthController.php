<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AuthController extends BaseController
{
    public function __construct()
    {
        helper('form');
    }

    public function login()
    {
        // Jika sudah login, langsung ke halaman dashboard yang sesuai
        if (session()->get('isLoggedIn')) {
            if (session()->get('role') === 'admin') {
                return redirect()->to('/admin/dashboard');
            } elseif (session()->get('role') === 'user') {
                return redirect()->to('/user/dashboard');
            }
        }

        if ($this->request->getPost()) {
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');

            // Hardcode user list (username, password hash, role)
            $users = [
                [
                    'id'       => 1,
                    'username' => 'admin',
                    'password' => '$2a$12$XcPy.6GolsRC4.NqX1t0pO0RuV81VyvKp9zths7Y67nKzkLc3tkzG', // adminku123
                    'role'     => 'admin'
                ],
                [
                    'id'       => 2,
                    'username' => 'user',
                    'password' => '$2a$12$vNgun2Qh73J5DkyDN2SPhO12UD7EuoD74nLuhbVqGScOwQVK3GPqi', // akuuser123
                    'role'     => 'user'
                ],
            ];

            // Cari user berdasarkan username
            $foundUser = null;
            foreach ($users as $user) {
                if ($user['username'] === $username) {
                    $foundUser = $user;
                    break;
                }
            }

            // Jika user ditemukan
            if ($foundUser) {
                // Verifikasi password
                if (password_verify($password, $foundUser['password'])) {
                    session()->set([
                        'id'         => $foundUser['id'],
                        'username'   => $foundUser['username'],
                        'nama'       => ucfirst($foundUser['username']),
                        'role'       => $foundUser['role'],
                        'isLoggedIn' => true
                    ]);
                    session()->setFlashdata('login_success', true);

                    if ($foundUser['role'] === 'admin') {
                        return redirect()->to('/admin/dashboard');
                    }
                    return redirect()->to('/user/dashboard');
                } else {
                    session()->setFlashdata('failed', 'Password salah.');
                    return redirect()->back()->withInput();
                }
            } else {
                session()->setFlashdata('failed', 'Username tidak ditemukan.');
                return redirect()->back()->withInput();
            }
        }

        // Tampilkan form login
        return view('v_login');
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
