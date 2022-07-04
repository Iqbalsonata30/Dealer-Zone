<?php

namespace App\Controllers;

use App\MOdels\ModelUsers;

class Auth extends BaseController
{
  protected $DBUser;
  public function __construct()
  {
    $this->DBUser = new ModelUsers();
  }
  public function index()
  {
    $UserAccess = $this->DBUser->where(array('username' => session('username')))->first();
    if ($UserAccess)  return redirect()->to('/home');
    $data = [
      'Title' => 'Login - Dealer'
    ];
    return view('viewAuth/login', $data);
  }
  public function register()
  {
    $UserAccess = $this->DBUser->where(array('username' => session('username')))->first();
    if ($UserAccess)  return redirect()->to('/home');
    $data = [
      'Title'       => 'Register - Dealer',
      'validation'  => \Config\Services::validation(),
    ];
    return view('viewAuth/register', $data);
  }

  public function create()
  {

    if (!$this->validate([
      'fullname'        => [
        'rules'         => 'required|alpha_space',
        'errors'        => [
          'required'    => 'Nama lengkap harus diisi.',
          'alpha_space'       => 'Nama lengkap hanya harus berisi huruf.'
        ]
      ],
      'username'        => 'required|is_unique[users.username]|min_length[3]|alpha_dash',
      'password'        => [
        'rules'         => 'required|min_length[3]|matches[password_confir]',
        'errors'        => [
          'required'    => 'Password harus diisi.',
          'min_length'  => 'Password minimal berisi 3 karakter.',
          'matches'     => 'Password tidak sesuai dengan konfirmasi password.'
        ]
      ],
      'profile'         => [
        'rules'         => 'uploaded[profile]|max_size[profile,1024]|is_image[profile]|mime_in[profile,image/png,image/jpg,image/jpeg]',
        'errors'        => [
          'uploaded'    => 'Upload profile picture.',
          'max_size'    => 'Profile picture harus lebih kecil dari 1MB',
          'is_image'    => 'File yang anda upload bukan gambar',

        ]
      ],
      'password_confir' => [
        'rules'         => 'required|matches[password]|',
        'errors'        => [
          'required'    => 'Konfirmasi password harus diisi.',
          'matches'     => 'Konfirmasi password tidak sesuai dengan password.'
        ]
      ]
    ])) {
      return redirect()->to('/auth/register')->withInput();
    }
    $GambarProfile = $this->request->getFile('profile');
    $ProfileName = $GambarProfile->getRandomName();
    $GambarProfile->move('img/profile/', $ProfileName);
    $this->DBUser->save([
      'fullname'        => $this->request->getVar('fullname'),
      'username'        => $this->request->getVar('username'),
      'password'        => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
      'password_confir' => password_hash($this->request->getVar('password_confir'), PASSWORD_DEFAULT),
      'profile'         => $ProfileName,
      'role_id'         => 2,
    ]);
    session()->setFlashdata('Alert', '<div id="createAccount"></div>');
    return redirect()->to('/auth');
  }

  public function verifyUser()
  {
    $username   = $this->request->getVar('username');
    $password   = $this->request->getVar('password');
    $user       = $this->DBUser->where(array('username' => $username))->first();
    if ($user) {
      if (password_verify($password, $user['password'])) {
        $userdata = [
          'username' => $user['username'],
          'role_id'  => $user['role_id']
        ];
        session()->set($userdata);
        return redirect()->to('/home');
      } else {
        session()->setFlashdata('Alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      Password anda <strong>salah.</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>');
        return redirect()->to('/auth');
      }
    } else {
      session()->setFlashdata('Alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      Akun anda belum <strong>terdaftar.</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>');
      return redirect()->to('/auth');
    }
  }

  public function logout()
  {
    session()->remove('username');
    session()->setFlashdata('Alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Anda berhasil  <strong>logout.</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>');
    return redirect()->to('/auth');
  }
}
