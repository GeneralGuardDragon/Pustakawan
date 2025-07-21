<?php

namespace App\Controllers;

use App\Models\BukuModel;
use CodeIgniter\Controller;

class Buku extends BaseController
{
    protected $bukuModel;

    public function __construct()
    {
        $this->bukuModel = new BukuModel();
    }

    public function index()
    {
        $data['buku'] = $this->bukuModel->findAll();
        return role_view('buku/index', $data);
    }

    public function create()
    {
        return view(session()->get('role').'/buku/create');
    }

    public function store()
    {
        $rules = [
            'judul'        => 'required|min_length[3]',
            'penulis'      => 'required|min_length[3]',
            'tahun_terbit' => 'required|numeric|greater_than_equal_to[1000]|less_than_equal_to[' . date('Y') . ']',
            'stok'         => 'required|integer|greater_than_equal_to[0]',
            'deskripsi'    => 'permit_empty|string|min_length[5]',
            'rating'       => 'permit_empty|decimal|greater_than_equal_to[0]|less_than_equal_to[5]',
            'gambar'       => 'permit_empty|is_image[gambar]|max_size[gambar,2048]'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $fileGambar = $this->request->getFile('gambar');
        $namaGambar = null;

        if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('uploads/', $namaGambar);
        }

        // Simpan data
        $this->bukuModel->save([
            'judul'        => $this->request->getPost('judul'),
            'penulis'      => $this->request->getPost('penulis'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit'),
            'stok'         => $this->request->getPost('stok'),
            'tersedia'     => 1,
            'deskripsi'    => $this->request->getPost('deskripsi'),
            'rating'       => $this->request->getPost('rating'),
            'gambar'       => $namaGambar
        ]);

        return redirect()->to('/buku')->with('success', 'Buku berhasil ditambahkan');
    }



    public function edit($id)
    {
        $data['buku'] = $this->bukuModel->find($id);
        return view(session()->get('role').'/buku/edit', $data);
    }

    public function update($id)
    {
        
        $rules = [
            'judul'        => 'required|min_length[3]',
            'penulis'      => 'required|min_length[3]',
            'tahun_terbit' => 'required|numeric|greater_than_equal_to[1000]|less_than_equal_to[' . date('Y') . ']',
            'stok'         => 'required|integer|greater_than_equal_to[0]'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->bukuModel->update($id, [
            'judul'        => $this->request->getPost('judul'),
            'penulis'      => $this->request->getPost('penulis'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit'),
            'stok'         => $this->request->getPost('stok'),
        ]);
        return redirect()->to('/buku')->with('success', 'Data buku diperbarui');
    }

    public function delete($id)
    {
        $this->bukuModel->delete($id);
        return redirect()->to('/buku')->with('success', 'Data buku dihapus');
    }
}
