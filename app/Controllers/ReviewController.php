<?php

namespace App\Controllers;

use App\Models\ReviewModel;
use CodeIgniter\Controller;

class ReviewController extends BaseController
{
    protected $reviewModel;

    public function __construct()
    {
        $this->reviewModel = new ReviewModel();
    }

    public function index()
{
    // Ambil semua ulasan dari database
    $data['reviews'] = $this->reviewModel->findAll();

    // Ambil data role dan nama dari sesi
    $role = session()->get('role');
    $username = session()->get('nama');

    $data['role'] = $role;
    $data['username'] = $username;

    // Langsung return view v_review
    return view('v_review', $data);
}

    public function submit()
{
    $rules = [
        'username' => 'required|min_length[3]',
        'rating' => 'required|numeric|greater_than_equal_to[1]|less_than_equal_to[5]',
        'comment' => 'required|min_length[10]',
    ];

    if (! $this->validate($rules)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $this->reviewModel->save([
        'user_id' => session()->get('id'),
        'username' => $this->request->getPost('username'),
        'rating' => $this->request->getPost('rating'),
        'comment' => $this->request->getPost('comment'),
    ]);

    // Redirect berdasarkan role
    $role = session()->get('role');
    $redirectUrl = ($role === 'admin') ? base_url('admin/ulasan') : base_url('user/ulasan');
    
    return redirect()->to($redirectUrl)->with('success', 'Ulasan Anda berhasil dikirim!');
}
}