<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDataCostumers extends Model
{
    protected $table            = 'datacostumers';
    protected $allowedFields    = ['username','kota','kecamatan','alamat'];
    protected $useTimestamps    = true;
}