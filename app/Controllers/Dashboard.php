<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $role = session()->get('role');

        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        // redirect sesuai role
        switch ($role) {
            case 'admin':
                return view('admin/index'); // kamu bisa ganti ini
            case 'petugas':
                return view('petugas/index');
            case 'pengunjung':
                return view('pengunjung/index');
            default:
                return view('unauthorized');
        }
    }
}
