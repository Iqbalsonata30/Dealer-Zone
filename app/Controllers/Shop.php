<?php

namespace App\Controllers;

use App\Models\ModelShop;

class Shop extends BaseController
{
  protected $DBShop;
  public function __construct()
  {
    $this->DBShop = new ModelShop();
  }
  public function index()
  {
    $data = [
      'Title' => 'Dashboard Dealer',
      'DataMotorcycle' => $this->DBShop->findAll()
    ];
    return view('viewParkir/home', $data);
  }
  public function motorcycle()
  {
    helper(['my_helper']);
    $data = [
      'Title' => 'Shopping Area - Motorcycle',
      'DataMotorcycle' => $this->DBShop->getMoreDetailMotorcycle()
    ];
    return view('viewParkir/detailMotorcycle', $data);
  }
  public function add()
  {
    $data = [
      'Title' => 'Add Data Motorcycle',
      'validation' => \Config\Services::validation()
    ];
    return view('viewParkir/form/addMotorcycle', $data);
  }
  public function save()
  {
    if (!$this->validate([
      'merk' => 'required|is_unique[motorcycle.merk]',
      'produk' => 'required',
      'harga' => 'required|integer',
      'gambar' => [
        'rules' => 'uploaded[gambar]|max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/png,image/jpeg,image/jpeg]',
        'errors' => [
          'max_size' => 'File yang anda upload terlalu besar.',
          'uploaded' => 'Upload gambar terlebih dahulu.',
          'is_image' => 'File yang anda upload bukan gambar.',
          'mime_in' => 'File yang anda upload bukan gambar.'
        ]
      ],
      'deskripsi' => 'required'
    ])) {
      return redirect()->to('/shop/add')->withInput();
    }

    $fileGambar = $this->request->getFile('gambar');
    $namaGambar = $fileGambar->getRandomName();
    $fileGambar->move('img/motorcycle', $namaGambar);
    $slug = url_title($this->request->getVar('merk'), '-', 'true');
    $this->DBShop->save([
      'slug' => $slug,
      'merk' => $this->request->getVar('merk'),
      'produk' => $this->request->getVar('produk'),
      'harga' => $this->request->getVar('harga'),
      'gambar' => $namaGambar,
      'deskripsi' => $this->request->getVar('deskripsi')
    ]);
    session()->setFlashdata('Alert', '<div id="alert"></div>');
    return redirect()->to('/shop/motorcycle');
  }
  public function detail($slug)
  {
    $data = [
      'Title' => 'Detail Lengkap Motor',
      'dataMotorcycle' => $this->DBShop->getMoreDetailMotorcycle($slug)
    ];
    return view('/viewParkir/moreDetail', $data);
  }
  public function delete($id)
  {
    $Motorcycle = $this->DBShop->find($id);
    unlink('img/motorcycle/'.$Motorcycle['gambar']);
    $this->DBShop->delete($id);
    session()->setFlashdata('Alert', '<div id="alertDelete"></div>');
    return redirect()->to('/shop/motorcycle');
  }
  public function edit($slug)
  {
    $data =
      [
        'Title' => 'Edit Data Motor',
        'dataMotorcycle' => $this->DBShop->getMoreDetailMotorcycle($slug),
        'validation' => \Config\Services::validation()
      ];
    return view('viewParkir/form/editMotorcycle', $data);
  }
}
