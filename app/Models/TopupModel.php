<?php

namespace App\Models;

use CodeIgniter\Model;

class TopupModel extends Model
{
    protected $table = 'topups';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'server_id', 'nominal', 'harga', 'metode_pembayaran', 'status_pembayaran'];
    protected $useTimestamps = true;
}
