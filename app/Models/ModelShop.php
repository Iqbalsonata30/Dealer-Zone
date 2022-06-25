<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelShop extends Model
{
  protected $table = 'motorcycle';
  protected $useTimestamps = true;
  protected $allowedFields = ['slug', 'merk', 'produk', 'harga', 'gambar', 'deskripsi'];
}
