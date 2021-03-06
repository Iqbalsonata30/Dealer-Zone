<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelCars extends Model
{
    protected $table            = 'cars';
    protected $allowedFields    = ['merk', 'slug', 'produk', 'harga', 'gambar', 'deskripsi'];
    protected $useTimestamps    = true;

    public function getCars($slug = false)
    {
        if (!$slug == false) {
            return $this->where(array('slug' => $slug))->first($slug);
        }
        return $this->findAll();
    }

    public function searchCar($search)
    {
        return $this->like('merk', $search)->orLike('produk', $search)->orLike('harga',$search);
    }

    public function getTotalCars(){
        $query = $this->query('select * from cars');
        return $query->getNumRows();
    }
}
