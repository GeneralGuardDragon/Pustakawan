<?php
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class User extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        helper(['form','url']);
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data['users'] = $this->userModel->findAll();
        return view('admin/user/index', $data);
    }

    public function create()
    {
        return view('admin/user/create');
    }

    public function store()
    {
        $rules = [
            'nama'  => 'required|min_length[3]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'tanggal_lahir' => 'required|valid_date',
            'role'  => 'required|in_list[admin,petugas,pengunjung]'
        ];
        if(!$this->validate($rules)){
            return redirect()->back()->withInput()->with('errors',$this->validator->getErrors());
        }

        $this->userModel->insert([
            'nama' => $this->request->getPost('nama'),
            'email'=> $this->request->getPost('email'),
            'password'=> password_hash($this->request->getPost('password'),PASSWORD_DEFAULT),
            'tanggal_lahir'=> $this->request->getPost('tanggal_lahir'),
            'role'=> $this->request->getPost('role'),
            'created_at'=> date('Y-m-d H:i:s')
        ]);
        return redirect()->to('/user')->with('success','Akun berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data['user'] = $this->userModel->find($id);
        return view('admin/user/edit',$data);
    }

    public function update($id)
    {
        $rules = [
            'nama'  => 'required|min_length[3]',
            'email' => "required|valid_email|is_unique[users.email,id,$id]",
            'tanggal_lahir' => 'required|valid_date',
            'role'  => 'required|in_list[admin,petugas,pengunjung]'
        ];
        if(!$this->validate($rules)){
            return redirect()->back()->withInput()->with('errors',$this->validator->getErrors());
        }

        $data = [
            'nama' => $this->request->getPost('nama'),
            'email'=> $this->request->getPost('email'),
            'tanggal_lahir'=> $this->request->getPost('tanggal_lahir'),
            'role'=> $this->request->getPost('role')
        ];
        // reset password jika diisi
        if($this->request->getPost('password')){
            $data['password'] = password_hash($this->request->getPost('password'),PASSWORD_DEFAULT);
        }
        $this->userModel->update($id,$data);
        return redirect()->to('/user')->with('success','Akun diperbarui');
    }

    public function delete($id)
    {
        $this->userModel->delete($id);   // soft‑delete jika di‑enable
        return redirect()->to('/user')->with('success','Akun dihapus');
    }
}
