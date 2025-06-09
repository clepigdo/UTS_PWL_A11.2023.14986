<?php

namespace App\Models;

use CodeIgniter\Model;

class TopupModel extends Model
{
    protected $table = 'topups';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'server_id', 'nominal', 'metode_pembayaran'];
    protected $useTimestamps = true;
}
