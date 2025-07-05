<?php

namespace App\Models;

use CodeIgniter\Model;

class ReviewModel extends Model
{
    protected $table = 'reviews'; // Nama tabel di database
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'username', 'rating', 'comment', 'created_at', 'updated_at'];
    protected $useTimestamps = true; // Mengaktifkan created_at dan updated_at
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}