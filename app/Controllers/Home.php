<?php

namespace App\Controllers;

use App\Models\ModelShop;
use App\Models\ModelCars;
use App\Models\ModelUsers;

class Home extends BaseController
{
    protected $DBShop;
    protected $DBCars;
    protected $DBUser;
    public function __construct()
    {
        $this->DBCars = new ModelCars();
        $this->DBShop = new ModelShop();
        $this->DBUser = new ModelUsers();
    }
    public function index()
    {
        $Access = $this->DBUser->where(array('username' => session()->get('username')))->first();
        if (!$Access) {
            session()->setFlashdata('Alert', '<div class="alert alert-info alert-dismissible fade show" role="alert">
            <b>Login terlebih dahulu !</b>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            return redirect()->to('/auth');
        }
        $data = [
            'Title'             => 'Dashboard Dealer',
            'totalMotorcycles'  => $this->DBShop->getTotalMotorcycles(),
            'totalCars'         => $this->DBCars->getTotalCars(),
            'totalUsers'        => $this->DBUser->getTotalUsers(),
            'DataMotorcycle'    => $this->DBShop->findAll(),
            'UserNavbar'        => $Access,
            'url'               => $this->request->getPath(),
        ];
        return view('viewDashboard/home', $data);
    }
}
