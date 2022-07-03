<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUsers extends Model
{
    protected $table            = 'users';
    protected $allowedFields    = ['fullname','username','password','password_confir','profile'];
    protected $useTimestamps    = true;

    public function getTotalUsers(){
        $query = $this->query('select * from users');
        return $query->getNumRows();
    }
}
