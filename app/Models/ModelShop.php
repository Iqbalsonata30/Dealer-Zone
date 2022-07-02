<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelShop extends Model
{
  protected $table = 'motorcycle';
  protected $useTimestamps = true;
  protected $allowedFields = ['slug', 'merk', 'produk', 'harga', 'gambar', 'deskripsi'];

  public function getMoreDetailMotorcycle($slug = false)
  {
    if ($slug === false) {
      return $this->findAll();
    }
    return $this->where(['slug' => $slug])->first();
  }
  public function searchData($search)
  {
    return $this->like('merk', $search)->orLike('produk',$search);
  }
}
