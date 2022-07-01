<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class CarsSeeder extends Seeder
{
    public function run()
    {
        $currentTime = Time::now();
        $data = [
            [
                'merk'          => 'Lamborghini',
                'slug'          => 'lamborghini',
                'produk'        => 'Prestige',
                'harga'         => '2000000000',
                'gambar'        => 'default.png',
                'deskripsi'     => 'Lamborghini adalah sebuah pembuat mobil di Italia. Perusahaan ini didirikan oleh Ferruccio Lamborghini pada tahun 1963, dengan tujuan untuk menghasilkan mobil grand wisata yang dapat bersaing dengan mobil yang telah ada dipasaran terlebih dahulu seperti Ferrari.',
                'created_at'    => $currentTime,
                'updated_at'    => $currentTime
            ],
            [
                'merk'          => 'Ferarri Red Bull ',
                'slug'          => 'ferrari-red-bull',
                'produk'        => 'Prestige',
                'harga'         => '3500000000',
                'gambar'        => 'default.png',
                'deskripsi'     => 'Ferrari adalah sebuah produsen mobil super dan mobil balap asal Italia berperforma tinggi yang berbasis di Maranello, Italia. Ferrari didirikan oleh Enzo Ferrari pada tahun 1929, sebagai "Scuderia Ferrari", perusahaan yang mensponsori para pembalap dan membuat mobil balap sebelum pindah ke produksi kendaraan komersial yang dikenali sebagai Ferrari pada tahun 1947.',
                'created_at'    => $currentTime,
                'updated_at'    => $currentTime
            ],
            [
                'merk'          => 'McLaren ',
                'slug'          => 'McLaren',
                'produk'        => 'Prestige',
                'harga'         => '1500000000',
                'gambar'        => 'default.png',
                'deskripsi'     => 'McLaren Automotive adalah produsen otomotif Inggris yang berbasis di McLaren Technology Centre di Woking, Surrey, Britania Raya. Produk utama perusahaan adalah supercar, yang diproduksi sendiri di fasilitas produksi yang ditunjuk.',
                'created_at'    => $currentTime,
                'updated_at'    => $currentTime
            ],
        ];
        $this->db->table('cars')->insertBatch($data);
    }
}
