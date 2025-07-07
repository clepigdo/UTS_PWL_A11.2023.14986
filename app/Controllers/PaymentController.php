<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TopupModel; // Sesuaikan dengan nama model Anda

class PaymentController extends BaseController
{
    protected $topupModel;

    public function __construct()
    {
        // Inisialisasi Model
        $this->topupModel = new TopupModel();

        // Konfigurasi Midtrans
        // Ambil kunci dari file .env
        \Midtrans\Config::$serverKey = getenv('MIDTRANS_SERVER_KEY');
        \Midtrans\Config::$isProduction = (getenv('MIDTRANS_ENVIRONMENT') == 'production');
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
    }

    // app/Controllers/PaymentController.php

    public function buatTransaksi($orderId)
    {
        try {
            // Inisialisasi Model
            $topupModel = new \App\Models\TopupModel(); // Gunakan full namespace untuk keamanan

            // 1. Ambil detail pesanan yang SUDAH ADA dari database
            $pesanan = $topupModel->find($orderId);
            if (!$pesanan) {
                return redirect()->to('/')->with('error', 'Pesanan tidak ditemukan.');
            }

            // Konfigurasi Midtrans
            \Midtrans\Config::$serverKey = getenv('MIDTRANS_SERVER_KEY');
            \Midtrans\Config::$isProduction = (getenv('MIDTRANS_ENVIRONMENT') == 'production');
            \Midtrans\Config::$isSanitized = true;
            \Midtrans\Config::$is3ds = true;

            // 2. Hitung harga akhir dengan PPN
            $hargaDasar = (int) $pesanan['harga'];
            $nilaiPpn = floor($hargaDasar * 0.11);
            $hargaAkhirBulat = $hargaDasar + $nilaiPpn;

            // 3. Ambil metode pembayaran yang TERSIMPAN di database
            $metodePembayaranTersimpan = $pesanan['metode_pembayaran'];
            $kodeMidtrans = strtolower($metodePembayaranTersimpan);

            // Khusus untuk QRIS, biasanya Midtrans menggunakan channel GoPay untuk men-generate QR
            if ($kodeMidtrans == 'qris') {
                $kodeMidtrans = 'gopay';
            }

            // 4. Siapkan parameter untuk Midtrans, KUNCI metode pembayarannya
            $params = [
                'transaction_details' => [
                    'order_id' => 'CLEP-' . $pesanan['id'] . '-' . time(),
                    'gross_amount' => $hargaAkhirBulat,
                ],
                'enabled_payments' => [$kodeMidtrans], // Mengunci metode pembayaran
                'customer_details' => [
                    'first_name' => 'User-' . $pesanan['user_id'],
                    'email'      => 'user' . $pesanan['user_id'] . '@example.com',
                ],
                'finish_redirect_url' => base_url(session()->get('role') . '/riwayat_pemesanan'),
            ];

            // 5. Dapatkan Snap Token
            $snapToken = \Midtrans\Snap::getSnapToken($params);

            // 6. Tampilkan halaman pembayaran
            $data = [
                'title'       => 'Lanjutkan Pembayaran',
                'token'       => $snapToken,
                'harga_akhir' => $hargaAkhirBulat,
                'pesanan'     => $pesanan
            ];
            return view('pembayaran/pilih_metode', $data);
        } catch (\Exception $e) {
            log_message('error', '[Midtrans Error] ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal membuat sesi pembayaran. Silakan coba lagi nanti.');
        }
    }

    public function notification()
    {
        try {
            // 1. Cukup buat instance, library akan membaca input secara otomatis
            $notif = new \Midtrans\Notification();

            // 2. Ambil data penting
            $transactionStatus = $notif->transaction_status;
            $fraudStatus = $notif->fraud_status;
            $orderIdMidtrans = $notif->order_id;

            // 3. Pengecekan format order_id yang aman
            $parts = explode('-', $orderIdMidtrans);
            if (count($parts) < 2 || !is_numeric($parts[1])) {
                // Abaikan notifikasi tes atau yang formatnya salah
                return $this->response->setStatusCode(200)->setBody('OK. Test notification or invalid Order ID format.');
            }
            $internalOrderId = $parts[1];

            // 4. Inisialisasi Model
            $topupModel = new \App\Models\TopupModel();

            // 5. Logika update status yang lengkap
            if ($transactionStatus == 'settlement' || ($transactionStatus == 'capture' && $fraudStatus == 'accept')) {
                $topupModel->update($internalOrderId, ['status_pembayaran' => 'paid']);
            } else if (in_array($transactionStatus, ['cancel', 'deny', 'expire'])) {
                $topupModel->update($internalOrderId, ['status_pembayaran' => 'failed']);
            }

            // 6. Selalu kirim response 200 OK ke Midtrans
            return $this->response->setStatusCode(200)->setBody('OK. Notification processed.');
        } catch (\Exception $e) {
            log_message('error', '[Midtrans Notification Error] ' . $e->getMessage());
            return $this->response->setStatusCode(200)->setBody('Error processing notification.');
        }
    }
}
