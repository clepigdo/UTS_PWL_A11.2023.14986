<?php

namespace App\Controllers;

use App\Models\TopupModel;

class TopupMl extends BaseController
{
    protected $topupModel;

    public function __construct()
    {
        $this->topupModel = new TopupModel();
    }

    public function index()
    {
        $data['topups'] = $this->topupModel->findAll();
        return view('topup_ml/index', $data);
    }

    public function create()
    {
        return view('topup_ml/create');
    }

    public function store()
    {
        $this->topupModel->save([
            'user_id' => $this->request->getPost('user_id'),
            'server_id' => $this->request->getPost('server_id'),
            'nominal' => $this->request->getPost('nominal'),
            'metode_pembayaran' => $this->request->getPost('metode_pembayaran'),
        ]);

        return redirect()->to('topup_ml/index');
    }

    public function edit($id)
    {
        $topup = $this->topupModel->find($id);
        if (!$topup) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Top-up dengan ID $id tidak ditemukan.");
        }

        $data['topup'] = $topup;
        return view('topup_ml/edit', $data);
    }

    public function update($id)
    {
        $this->topupModel->update($id, [
            'user_id' => $this->request->getPost('user_id'),
            'server_id' => $this->request->getPost('server_id'),
            'nominal' => $this->request->getPost('nominal'),
            'metode_pembayaran' => $this->request->getPost('metode_pembayaran'),
        ]);

        return redirect()->to('topup_ml/index');
    }

    public function delete($id)
    {
        // Hapus data berdasarkan id
        $this->topupModel->delete($id);

        // Redirect ke halaman list topup (sesuaikan URL-nya)
        return redirect()->to('topup_ml/index')->with('success', 'Data top-up berhasil dihapus.');
    }
}
