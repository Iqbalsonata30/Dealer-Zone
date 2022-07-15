<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelCostumer extends Model
{
    protected $table            = 'costumers';
    protected $allowedFields    = ['username', 'fullname', 'merk', 'harga'];
    protected $useTimestamps    = true;

}
