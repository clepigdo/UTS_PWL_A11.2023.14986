<?php

namespace App\Controllers;

use App\Models\TopupModel;

class TopupMl extends BaseController
{
    protected $topupModel;
    protected $client;
    protected $merchant;
    protected $signature;
    // protected $topupModel;

    public function __construct()
    {
        $this->topupModel = new TopupModel();
        $this->client = new \GuzzleHttp\Client();
        $this->merchant = env('APIGAMES_MERCHANT_ID');
        $this->signature = env('APIGAMES_SIGNATURE');
    }

    public function index()
    {
        $data['topups'] = $this->topupModel->findAll();
        return view('topup_ml/index', $data);
    }

    public function create()
    {
        $data = [
            'daftar_nominal' => [
                '86' => 22000,
                '172' => 44000,
                '257' => 66000,
                '344' => 88000,
                '429' => 110000
            ],

            'daftar_pembayaran' => [
                'GOPAY' => ['nama' => 'GoPay', 'logo' => 'gopay.png'],
                'DANA'  => ['nama' => 'DANA', 'logo' => 'dana.png'],
                'OVO'   => ['nama' => 'OVO', 'logo' => 'ovo.png'],
                'QRIS'  => ['nama' => 'QRIS', 'logo' => 'qris.png', 'label' => 'Termurah'],
            ]
        ];
        return view('topup_ml/create', $data);
    }

    public function store()
    {
        
        $daftarHarga = [
            '86' => 22000,
            '172' => 44000,
            '257' => 66000,
            '344' => 88000,
            '429' => 110000
        ];
        $nominalDipilih = $this->request->getPost('nominal');
        $hargaValid = $daftarHarga[$nominalDipilih] ?? 0;
        $metodePembayaranDipilih = $this->request->getPost('metode_pembayaran');

        $dataToSave = [
            'user_id'           => $this->request->getPost('user_id'),
            'server_id'         => $this->request->getPost('server_id'),
            'pembeli_id'        => session()->get('id'), // Menyimpan ID user yang login
            'nominal'           => $nominalDipilih,
            'harga'             => $hargaValid,
            'metode_pembayaran' => $metodePembayaranDipilih,
            'status_pembayaran' => 'pending'
        ];

        if ($this->topupModel->save($dataToSave)) {
            $newOrderId = $this->topupModel->getInsertID();

            // ===================================================================
            // BAGIAN 2: BUAT SESI PEMBAYARAN MIDTRANS
            // ===================================================================
            try {
                // Konfigurasi Midtrans
                \Midtrans\Config::$serverKey = getenv('MIDTRANS_SERVER_KEY');
                \Midtrans\Config::$isProduction = (getenv('MIDTRANS_ENVIRONMENT') == 'production');
                \Midtrans\Config::$isSanitized = true;
                \Midtrans\Config::$is3ds = true;

                $hargaDasar = (int) $hargaValid;
                $nilaiPpn = floor($hargaDasar * 0.11);
                $hargaAkhirBulat = $hargaDasar + $nilaiPpn;

                $kodeMidtrans = strtolower($metodePembayaranDipilih);
                if ($kodeMidtrans == 'qris') {
                    $kodeMidtrans = 'gopay';
                }

                $params = [
                    'transaction_details' => [
                        'order_id' => 'CLEP-' . $newOrderId . '-' . time(),
                        'gross_amount' => $hargaAkhirBulat,
                    ],
                    'enabled_payments' => [$kodeMidtrans], // Mengunci metode pembayaran
                    'customer_details' => [
                        'first_name' => 'User-' . $this->request->getPost('user_id'),
                        'email'      => 'user' . $this->request->getPost('user_id') . '@example.com',
                    ],
                    'finish_redirect_url' => base_url(session()->get('role') . '/riwayat_pemesanan'),
                ];

                $snapToken = \Midtrans\Snap::getSnapToken($params);

                $data = [
                    'title'       => 'Lakukan Pembayaran',
                    'token'       => $snapToken,
                    'harga_akhir' => $hargaAkhirBulat,
                    'pesanan'     => $this->topupModel->find($newOrderId)
                ];

                // Langsung tampilkan halaman pembayaran, tidak ada lagi redirect
                return view('pembayaran/pilih_metode', $data);
            } catch (\Exception $e) {
                log_message('error', 'Midtrans API Error: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Gagal membuat sesi pembayaran. Silakan coba lagi.');
            }
        } else {
            return redirect()->back()->with('error', 'Gagal membuat pesanan.');
        }
    }

    public function edit($id)
    {
        // 1. Ambil data spesifik yang akan diedit 
        $topup = $this->topupModel->find($id);
        if (!$topup) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Top-up dengan ID $id tidak ditemukan.");
        }

        // 2. Siapkan SEMUA pilihan nominal yang ada 
        // View membutuhkan ini untuk membuat semua kartu diamond
        $daftar_nominal = [
            '86'  => ['text' => '86 Diamonds', 'bonus' => '78 + 8 Bonus', 'harga' => 22000],
            '172' => ['text' => '172 Diamonds', 'bonus' => '156 + 16 Bonus', 'harga' => 44000],
            '257' => ['text' => '257 Diamonds', 'bonus' => '234 + 23 Bonus', 'harga' => 66000],
            '344' => ['text' => '344 Diamonds', 'bonus' => '312 + 32 Bonus', 'harga' => 88000],
            '429' => ['text' => '429 Diamonds', 'bonus' => '395 + 34 Bonus', 'harga' => 110000],
        ];

        // 3. Gabungkan kedua data untuk dikirim ke view
        $data = [
            'topup'          => $topup,
            'daftar_nominal' => $daftar_nominal, // Kirim daftar nominal

            'daftar_pembayaran' => [
                'GOPAY' => ['nama' => 'GoPay', 'logo' => 'gopay.png'],
                'DANA'  => ['nama' => 'DANA', 'logo' => 'dana.png'],
                'OVO'   => ['nama' => 'OVO', 'logo' => 'ovo.png'],
                'QRIS'  => ['nama' => 'QRIS', 'logo' => 'qris.png', 'label' => 'Termurah'],
            ]
        ];


        return view('topup_ml/edit', $data);
    }

    public function update($id)
    {
        // 1. Siapkan daftar harga yang sah di server 
        $daftarHarga = [
            '86' => 22000,
            '172' => 44000,
            '257' => 66000,
            '344' => 88000,
            '429' => 110000
        ];

        // 2. Ambil nominal yang dipilih dari form
        $nominalDipilih = $this->request->getPost('nominal');

        // 3. Tentukan harga yang valid berdasarkan nominal
        $hargaValid = $daftarHarga[$nominalDipilih] ?? 0;

        // 4. Siapkan data untuk diupdate, TERMASUK HARGA
        $dataToUpdate = [
            'user_id' => $this->request->getPost('user_id'),
            'server_id' => $this->request->getPost('server_id'),
            'nominal' => $nominalDipilih,
            'harga' => $hargaValid,
            'metode_pembayaran' => $this->request->getPost('metode_pembayaran'),
        ];

        // 5. Lakukan update ke database
        $this->topupModel->update($id, $dataToUpdate);

        // 6. Redirect dengan pesan sukses
        return redirect()->to('topup_ml/index')->with('success', 'Data berhasil diperbarui!');
    }

    public function delete($id)
    {
        // Hapus data berdasarkan id
        $this->topupModel->delete($id);

        // Redirect ke halaman list topup (sesuaikan URL-nya)
        return redirect()->to('topup_ml/index')->with('success', 'Data top-up berhasil dihapus.');
    }
}
