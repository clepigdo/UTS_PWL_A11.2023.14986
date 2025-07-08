<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

use App\Models\ReviewModel;
use App\Models\TopupModel;
use App\Models\UserModel;

class ApiController extends ResourceController
{
    protected $apikey;
    protected $review;
    protected $topup;
    protected $user;

    function __construct()
    {
        $this->apikey = env('API_KEY');
        $this->review = new ReviewModel;
        $this->topup = new TopupModel;
        $this->user = new UserModel;
    }
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $providedKey = $this->request->getHeaderLine('Key');

        if (empty($providedKey)) {
            return $this->failUnauthorized('API Key dibutuhkan.');
        }

        // Gunakan hash_equals untuk perbandingan yang lebih aman terhadap timing attacks
        if (!hash_equals($this->apikey, $providedKey)) {
            return $this->failForbidden('API Key tidak valid.');
        }

        try {
            // VERIFIKASI NAMA TABEL & KOLOM DI BAWAH INI:
            // - Pastikan tabel Anda bernama 'topups' dan 'users'.
            // - Pastikan ada kolom 'pembeli_id' di tabel 'topups'.
            // - Pastikan ada kolom 'id' dan 'username' di tabel 'users'.
            $dataTopup = $this->topup
                ->select('topups.*, users.username as pembeli_username')
                ->join('users', 'users.id = topups.pembeli_id', 'left') 
                ->orderBy('topups.created_at', 'DESC')
                ->findAll();

            if (empty($dataTopup)) {
                return $this->respond([
                    'status' => ['code' => 200, 'description' => 'OK'],
                    'message' => 'Tidak ada data top-up yang ditemukan.',
                    'results' => []
                ]);
            }
            
            return $this->respond([
                'status' => ['code' => 200, 'description' => 'OK'],
                'results' => $dataTopup
            ]);

        } catch (\Throwable $e) { // Menggunakan \Throwable untuk menangkap semua jenis error
            // Log ini akan sangat membantu Anda menemukan error SQL yang sebenarnya
            log_message('error', '[API_ERROR] ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine());
            return $this->failServerError('Terjadi kesalahan pada server. Silakan cek log untuk detail.');
        }
    }
    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        //
    }
}
