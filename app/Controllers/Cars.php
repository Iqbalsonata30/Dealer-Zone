<?php

namespace App\Controllers;

use App\Models\ModelCars;

class Cars extends BaseController
{
    protected $DBCars;
    public function __construct()
    {
        $this->DBCars = new ModelCars();
    }
    public function index()
    {
        helper('my_helper');
        $data = [
            'Title' => 'Shopping Area - Cars',
            'slider' => $this->DBCars->getCars(),
            'CarsData' => $this->DBCars->paginate(2, 'cars'),
            'Pager' => $this->DBCars->pager
        ];
        return view('viewCars/detailCars', $data);
    }

    public function add()
    {
        $data = [
            'Title'      => 'Tambah Data Mobil',
            'validation' => \Config\Services::validation(),
        ];
        return view('viewCars/forms/addCars', $data);
    }
    public function save()
    {
        if (!$this->validate([
            'merk'      => 'required|is_unique[cars.merk]',
            'produk'    => 'required',
            'harga'     => 'required|integer',
            'gambar'    => [
                'rules' => 'uploaded[gambar]|max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded' => 'Upload gambar terlebih dahulu.',
                    'max_size' => 'Ukuran file terlalu besar.',
                    'is_image' => 'File yang anda upload bukan gambar.',
                    'mime_in'  => 'File yang anda upload bukan gambar'
                ]
            ],
            'deskripsi' => 'required'
        ])) {
            return redirect()->to('/cars/add')->withInput();
        }
        $fileGambar = $this->request->getFile('gambar');
        $namaGambar = $fileGambar->getRandomName();
        $fileGambar->move('img/cars', $namaGambar);
        $slug = url_title($this->request->getVar('merk'), '-', 'true');
        $this->DBCars->save([
            'merk'      => $this->request->getVar('merk'),
            'slug'      => $slug,
            'produk'    => $this->request->getVar('produk'),
            'harga'     => $this->request->getVar('harga'),
            'gambar'    => $namaGambar,
            'deskripsi' => $this->request->getVar('deskripsi'),
        ]);
        session()->setFlashdata('Alert', '<div id="alert"></div>');
        return redirect()->to('/cars');
    }
    public function detailCar($slug)
    {
        $dataCar = $this->DBCars->getCars($slug);
        $TitleBar = $dataCar['merk'];
        $data = [
            'Title' => "Data Mobil $TitleBar",
            'FullDetail' => $dataCar,
        ];
        return view('viewCars/fullDetailCar', $data);
    }
    public function delete($id)
    {
        $namaGambar = $this->DBCars->find($id);
        unlink('img/cars/' . $namaGambar['gambar']);
        $this->DBCars->delete($id);
        session()->setFlashData('Alert', '<div id="alertDelete"></div>');
        return redirect()->to('/cars');
    }
}
