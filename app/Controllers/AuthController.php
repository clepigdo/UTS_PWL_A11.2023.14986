<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    public function __construct()
    {
        helper('form');
    }

    // --- FUNGSI LOGIN BARU (MENGGUNAKAN DATABASE) ---
    public function login()
    {
        if (session()->get('isLoggedIn')) {
            $role = session()->get('role');
            return redirect()->to("/$role/dashboard");
        }

        if ($this->request->getPost()) {
            $userModel = new UserModel();
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');

            $user = $userModel->where('username', $username)->first();

            if ($user && password_verify($password, $user['password'])) {
                session()->set([
                    'id'         => $user['id'],
                    'username'   => $user['username'],
                    'nama'       => $user['nama'],
                    'role'       => $user['role'],
                    'isLoggedIn' => true
                ]);

                return redirect()->to("/{$user['role']}/dashboard");
            } else {
                session()->setFlashdata('failed', 'Username atau Password salah.');
                return redirect()->back()->withInput();
            }
        }

        return view('v_login');
    }

    // --- FUNGSI REGISTER BARU ---
    public function register()
    {
        if ($this->request->getPost()) {
            $validationRules = [
                'nama'         => 'required|min_length[3]',
                'username'     => 'required|min_length[3]|is_unique[users.username]',
                'password'     => 'required|min_length[6]',
                'pass_confirm' => 'required|matches[password]'
            ];

            if (!$this->validate($validationRules)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $userModel = new UserModel();
            $userModel->save([
                'nama'     => $this->request->getVar('nama'),
                'username' => $this->request->getVar('username'),
                'password' => $this->request->getVar('password'),
                'role'     => 'user' // Default role untuk registrasi baru
            ]);

            session()->setFlashdata('success', 'Registrasi berhasil! Silakan login.');
            return redirect()->to('/login');
        }

        return view('v_register');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
