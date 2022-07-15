<?php

namespace App\Controllers;

use App\Models\ModelCars;
use App\Models\ModelCostumer;
use App\Models\ModelDataCostumers;
use App\Models\ModelUsers;
use App\Models\ModelShop;
use CodeIgniter\CodeIgniter;
use CodeIgniter\Config\Config;

class Customers extends BaseController
{
  protected $DBUser;
  protected $DBCostumers;
  protected $DBMotorcycle;
  protected $DBData;
  protected $DBCars;
  public function __construct()
  {
    $this->DBUser       = new ModelUsers();
    $this->DBCostumers  = new ModelCostumer();
    $this->DBMotorcycle = new ModelShop();
    $this->DBData       = new ModelDataCostumers();
    $this->DBCars       = new ModelCars();
  }

  public function index($slug)
  {
    $Access = $this->DBUser->where(array('username' => session('username')))->first();
    if (!$Access) {
      return redirect()->to('/auth');
    }
    $data = [
      'Title'         => 'Checkout - Dealer-Zone',
      'Motorcycle'    => $this->DBMotorcycle->getMoreDetailMotorcycle($slug),
      'UserNavbar'    => $this->DBUser->where(array('username' => session('username')))->first(),
      'Costumer'      => $this->DBData->where(array('username' => session('username')))->first(),
      'url'           => $this->request->getPath(),
    ];
    if (!$data['Motorcycle']) {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
    return view('viewCostumer/buyItems', $data);
  }
  public function checkout($slug)
  {
    $Access = $this->DBUser->where(array('username' => session('username')))->first();
    if (!$Access) {
      return redirect()->to('/auth');
    }
    $data = [
      'Title'         => 'Checkout - Dealer-Zone',
      'Car'           => $this->DBCars->getCars($slug),
      'UserNavbar'    => $this->DBUser->where(array('username' => session('username')))->first(),
      'Costumer'      => $this->DBData->where(array('username' => session('username')))->first(),
      'url'           => $this->request->getPath(),
    ];
    if (!$data['Car']) {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
    return view('viewCostumer/buyCar', $data);
  }

  public function address()
  {
    $data = [
      'Title'         => 'Alamat - Dealer-Zone',
      'UserNavbar'    => $this->DBUser->where(array('username' => session('username')))->first(),
      'validation'    => \Config\Services::validation(),
      'url'           => $this->request->getPath(),
    ];
    return view('viewCostumer/form/addressCostumer', $data);
  }

  public function save()
  {
    if (!$this->validate([
      'kota'      => 'required',
      'kecamatan' => 'required',
      'alamat'    => 'required'
    ])) {
      return redirect()->to('/customers/address')->withInput();
    }

    $this->DBData->save([
      'username' => $this->request->getVar('username'),
      'kota' => $this->request->getVar('kota'),
      'kecamatan' => $this->request->getVar('kecamatan'),
      'alamat' => $this->request->getVar('alamat'),
    ]);
    session()->setFlashdata('Alert', '<div id="alert"></div>');
    return redirect()->to('/shop/motorcycle');
  }

  public function buy()
  {
    $this->DBCostumers->save([
      'username' => $this->request->getVar('username'),
      'fullname' => $this->request->getVar('fullname'),
      'merk' => $this->request->getVar('merk'),
      'harga' => $this->request->getVar('harga'),
    ]);
    session()->setFlashdata('Alert', '<div id="beli"></div>');
    return redirect()->to('/customers/history');
  }

  public function history()
  {
    $Access = $this->DBUser->where(array('username' => session('username')))->first();
    if (!$Access) {
      return redirect()->to('/auth');
    }
    $url = $this->request->getPath();
    $url = explode('/', $url);
    $data = [
      'Title'         => 'Riwayat Belanja',
      'UserNavbar'    => $this->DBUser->where(array('username' => session('username')))->first(),
      'History'       => $this->DBCostumers->where(array('username' => session('username')))->findAll(),
      'url'           => $url[0],
    ];
    return view('viewCostumer/history', $data);
  }
}
