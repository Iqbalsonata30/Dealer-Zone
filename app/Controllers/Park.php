<?php 

namespace App\Controllers;

class Park extends BaseController{
  
  public function index(){
    $data = [
      'Title' => 'Parkir Area'
    ];
    return view('viewParkir/home',$data);
  }
}