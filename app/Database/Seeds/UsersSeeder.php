<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $currentTime = Time::now();
        $data = 
            [
                'fullname'          => 'Iqbal Sonata',
                'username'          => 'iqbal',
                'password'          => '123',
                'password_confir'   => '123',
                'profile'           => 'default.jpg',
                'created_at'        => $currentTime,
                'updated_at'        => $currentTime
            ];
        $this->db->table('users')->insert($data);
    }
}
