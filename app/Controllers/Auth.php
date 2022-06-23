<?php

namespace App\Controllers;

class Auth extends BaseController
{
  public function index()
  {
    $data = [
      'Title' => 'Login - Parkir'
    ];
    return view('viewAuth/login', $data);
  }
}
