<?php

namespace App\Controllers;

use App\Models\ModelShop;
use App\Models\ModelUsers;

class Shop extends BaseController
{
  protected $DBShop;
  protected $DBUser;

  public function __construct()
  {
    $this->DBUser = new ModelUsers();
    $this->DBShop = new ModelShop();
  }
  public function motorcycle()
  {
    $search = $this->request->getVar('keyword');
    $Access = $this->DBUser->where(array('username' => session('username')))->first();
    if (!$Access) {
      session()->setFlashdata('Alert', '<div class="alert alert-info alert-dismissible fade show" role="alert">
      <b>Login terlebih dahulu !</b>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
      return redirect()->to('/auth');
    }
    ($search) ? $SearchMotorcycle = $this->DBShop->searchData($search) : $SearchMotorcycle = $this->DBShop;
    helper(['my_helper']);
    $data = [
      'Title' => 'Shopping Area - Motorcycle',
      'DataMotorcycle' => $SearchMotorcycle->paginate(3, 'motorcycle'),
      'Pager' => $this->DBShop->pager,
      'UserNavbar'    => $Access,
    ];
    return view('viewParkir/detailMotorcycle', $data);
  }
  public function add()
  {
    $Access = $this->DBUser->where(array('username' => session('username')))->first();
    if (!$Access) {
      session()->setFlashdata('Alert', '<div class="alert alert-info alert-dismissible fade show" role="alert">
      <b>Login terlebih dahulu !</b>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
      return redirect()->to('/auth');
    }
    $data = [
      'Title' => 'Add Data Motorcycle',
      'validation' => \Config\Services::validation(),
      'UserNavbar'    => $Access,
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
    $Access = $this->DBUser->where(array('username' => session('username')))->first();
    if (!$Access) {
      session()->setFlashdata('Alert', '<div class="alert alert-info alert-dismissible fade show" role="alert">
      <b>Login terlebih dahulu !</b>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
      return redirect()->to('/auth');
    }
    $data = [
      'Title' => 'Detail Lengkap Motor',
      'dataMotorcycle' => $this->DBShop->getMoreDetailMotorcycle($slug),
      'UserNavbar'    => $Access,
    ];
    if (is_null($data['dataMotorcycle'])) {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Motor $slug tidak dapat ditemukan!");
    }
    return view('/viewParkir/moreDetail', $data);
  }
  public function delete($id)
  {
    $Motorcycle = $this->DBShop->find($id);
    unlink('img/motorcycle/' . $Motorcycle['gambar']);
    $this->DBShop->delete($id);
    session()->setFlashdata('Alert', '<div id="alertDelete"></div>');
    return redirect()->to('/shop/motorcycle');
  }
  public function edit($slug)
  {
    $Access = $this->DBUser->where(array('username' => session('username')))->first();
    if (!$Access) {
      session()->setFlashdata('Alert', '<div class="alert alert-info alert-dismissible fade show" role="alert">
      <b>Login terlebih dahulu !</b>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
      return redirect()->to('/auth');
    }
    $data =
      [
        'Title' => 'Edit Data Motor',
        'dataMotorcycle' => $this->DBShop->getMoreDetailMotorcycle($slug),
        'validation' => \Config\Services::validation(),
        'UserNavbar'    => $Access,
      ];
    return view('viewParkir/form/editMotorcycle', $data);
  }
  public function update($id)
  {
    $merk = $this->DBShop->find($id);
    $FileGambar = $this->request->getFile('gambar');
    if ($FileGambar == $merk['gambar']) {
      $ruleGambar = 'uploaded[gambar]|max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/png,image/jpeg,image/jpeg]';
    } else {
      $ruleGambar = 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/png,image/jpeg,image/jpeg]';
    }

    if ($this->request->getVar('merk') == $merk['merk']) {
      $ruleMerk = 'required';
    } else {
      $ruleMerk = 'required|is_unique[motorcycle.merk]';
    }
    $slug = url_title($this->request->getVar('merk'), '-', 'true');
    if (!$this->validate([
      'merk' => $ruleMerk,
      'produk' => 'required',
      'harga' => 'required|integer',
      'gambar' => [
        'rules' => $ruleGambar,
        'errors' => [
          'max_size' => 'File yang anda upload terlalu besar.',
          'uploaded' => 'Upload gambar terlebih dahulu.',
          'is_image' => 'File yang anda upload bukan gambar.',
          'mime_in' => 'File yang anda upload bukan gambar.'
        ]
      ],
      'deskripsi' => 'required'
    ])) {
      return redirect()->to("/shop/edit/" . $merk['slug'])->withInput();
    }
    $namaGambarLama = $this->request->getVar('gambarLama');
    if ($FileGambar->getError() ==  4) {
      $namaGambar = $namaGambarLama;
    } else {
      $namaGambar = $FileGambar->getRandomName();
      $FileGambar->move('img/motorcycle', $namaGambar);
      unlink('img/motorcycle/' . $namaGambarLama);
    }
    $this->DBShop->update($id, [
      'id' => $this->request->getVar('id'),
      'slug' => $slug,
      'merk' => $this->request->getVar('merk'),
      'produk' => $this->request->getVar('produk'),
      'harga' => $this->request->getVar('harga'),
      'gambar' => $namaGambar,
      'deskripsi' => $this->request->getVar('deskripsi')
    ]);
    session()->setFlashData('Alert', '<div id="edit"></div>');
    return redirect()->to('/shop/motorcycle');
  }
}
