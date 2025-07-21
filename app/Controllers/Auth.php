<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    protected $userModel;
    public function __construct()
    {
        helper(['form', 'url']);
        $this->userModel = new UserModel();
    }

    /* ---------- FORM ---------- */
    public function login()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    /* ---------- ACTION ---------- */
    public function process()
    {
        $rules = [
            'email'    => 'required|valid_email',
            'password' => 'required'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $user = $this->userModel->findByEmail($this->request->getPost('email'));
        if (! $user || ! password_verify($this->request->getPost('password'), $user['password'])) {
            return redirect()->back()->with('error', 'Email atau password salah');
        }

        // set session
        session()->set([
            'user_id'   => $user['id'],
            'nama'      => $user['nama'],
            'role'      => $user['role'],
            'logged_in' => true,
        ]);
        return redirect()->to('/dashboard');
    }

    public function store()
    {
        $rules = [
            'nama'          => 'required|min_length[3]',
            'email'         => 'required|valid_email|is_unique[users.email]',
            'tanggal_lahir' => 'required|valid_date',
            'password'      => 'required|min_length[6]',
            'role'          => 'required|in_list[pengunjung]' // default daftar sebagai pengunjung
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->userModel->insert([
            'nama'          => $this->request->getPost('nama'),
            'email'         => $this->request->getPost('email'),
            'password'      => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'role'          => $this->request->getPost('role'),
            'created_at'    => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
