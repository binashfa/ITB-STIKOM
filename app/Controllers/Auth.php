<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function login()
    {
        $session = session();
        $model = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // cek user
        $user = $model->getUserByEmail($email);

        if ($user) {
            // verifikasi password (pakai hash)
            if (password_verify($password, $user['password'])) {

                $session = session();

                $session->set([
                    'user_id' => $user['id'],
                    'user_name' => $user['name'],
                    'logged_in' => true
                ]);

                return redirect()->to('/admin/news');
            } else {
                return redirect()->back()->with('error', 'Password salah');
            }
        } else {
            return redirect()->back()->with('error', 'Email tidak ditemukan');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

    public function createAdmin()
{
    $model = new \App\Models\UserModel();

    $model->save([
        'email' => 'admin@mail.com',
        'password' => password_hash('admin123', PASSWORD_DEFAULT),
        'name' => 'Admin'
    ]);

    echo "Admin created!";
}
}
