<?php

namespace App\Controllers;

use App\Models\ModelUsers;

class Profile extends BaseController
{
    protected $DBUser;
    public function __construct()
    {
        $this->DBUser = new ModelUsers();
    }
    public function index($username)
    {
        try {
            $user = $this->DBUser->where(array('username' => $username))->first();
            $Access = $this->DBUser->where(array('username' => session('username')))->first();
            if (!$Access) {
                session()->setFlashdata('Alert', '<div class="alert alert-info alert-dismissible fade show" role="alert">
            <b>Login terlebih dahulu !</b>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
                return redirect()->to('/auth');
            }
            $UsernameUser = $user['username'];
            $FullNameUser = ucwords(strtolower($user['fullname']));


            $data = [
                'Title'      => "$FullNameUser - $UsernameUser",
                'UserNavbar' => $Access,
                'profile'    => $user,
            ];
            return view('viewProfile/profile', $data);
        } catch (\Throwable) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Username ' . $username . ' tidak dapat ditemukan');
        }
    }

    public function change()
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
            'Title'      => 'Profile - Ganti Password',
            'UserNavbar' => $Access,
        ];
        return view('viewProfile/profilePassword', $data);
    }

    public function update($id)
    {
        $User = $this->DBUser->where(array('username' => session('username')))->first();
        $OldPassword = $this->request->getVar('password');
        $NewPassword = $this->request->getVar('passwordbaru');
        $ConfirmPassword = $this->request->getVar('konfirmasipasswordbaru');
        $RegisterPassword = $User['password'];

        if (password_verify($OldPassword, $RegisterPassword)) {
            if (password_verify($NewPassword, $RegisterPassword)) {
                session()->setFlashdata('Alert', '<div class="alert alert-danger" role="alert">
                <b>Password baru sama dengan password lama</b>.
                </div>');
                return redirect()->to('/profile/change');
            } else {
                if ($NewPassword != $ConfirmPassword) {
                    session()->setFlashdata('Alert', '<div class="alert alert-danger" role="alert">
                    <b>Password Baru tidak sama dengan Konfirmasi Password Baru</b>.
                    </div>');
                    return redirect()->to('/profile/change');
                }
            }
            $this->DBUser->update($id, [
                'id'              => $id,
                'fullname'        => $User['fullname'],
                'username'        => $User['username'],
                'password'        => password_hash($this->request->getVar('passwordbaru'), PASSWORD_DEFAULT),
                'password_confir' => password_hash($this->request->getVar('konfirmasipasswordbaru'), PASSWORD_DEFAULT),
                'profile'         => $User['profile']
            ]);
            session()->setFlashdata('Alert', '<div class="alert alert-success" role="alert">
            <b>Password berhasil diubah.</b>
            </div>');
            return redirect()->to('/profile/change');
        } else {
            session()->setFlashdata('Alert', '<div class="alert alert-danger" role="alert">
            <b>Password anda salah</b>.
            </div>');
            return redirect()->to('/profile/change');
        }
    }
}
