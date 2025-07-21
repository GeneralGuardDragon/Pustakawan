<?php
namespace App\Controllers;

use App\Models\PeminjamanModel;
use App\Models\BukuModel;
use App\Models\UserModel;

class Peminjaman extends BaseController
{
    protected $pinjamModel, $bukuModel, $userModel;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->pinjamModel = new PeminjamanModel();
        $this->bukuModel   = new BukuModel();
        $this->userModel   = new UserModel();
    }

    public function index()
    {
        $data['pinjam'] = $this->pinjamModel->getAllWithRelasi();
        return role_view('peminjaman/index', $data);
    }

    public function create()
    {
        $data['users'] = $this->userModel->findAll();
        $data['buku']  = $this->bukuModel->where('stok >', 0)->findAll();
        return role_view('peminjaman/create', $data);
    }

    public function store()
    {
        $rules = [
            'user_id' => 'required|is_not_unique[users.id]',
            'buku_id' => 'required|is_not_unique[buku.id]',
            'status'  => 'required|in_list[booking,dipinjam]'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $bukuId = $this->request->getPost('buku_id');
        $status = $this->request->getPost('status');

        // Kurangi stok jika langsung dipinjam
        if ($status === 'dipinjam') {
            $buku = $this->bukuModel->find($bukuId);
            if ($buku && $buku['stok'] > 0) {
                $this->bukuModel->update($bukuId, ['stok' => $buku['stok'] - 1]);
            }
        }

        $this->pinjamModel->insert([
            'user_id'        => $this->request->getPost('user_id'),
            'buku_id'        => $bukuId,
            'tanggal_pinjam' => date('Y-m-d'),
            'status'         => $status
        ]);

        return redirect()->to('/peminjaman')->with('success', 'Transaksi disimpan');
    }

    public function edit($id)
    {
        $data['p'] = $this->pinjamModel
            ->select('peminjaman.*, users.nama as nama, buku.judul, buku.gambar, buku.deskripsi, buku.rating')
            ->join('users', 'users.id = peminjaman.user_id')
            ->join('buku', 'buku.id = peminjaman.buku_id')
            ->where('peminjaman.id', $id)
            ->first();

        if (!$data['p']) {
            return redirect()->to('/peminjaman')->with('error', 'Data tidak ditemukan');
        }

        return role_view('peminjaman/edit', $data);
    }


    public function update($id)
    {
        $trans      = $this->pinjamModel->find($id);
        $oldStatus  = $trans['status'];
        $newStatus  = $this->request->getPost('status');
        $tglManual  = $this->request->getPost('tanggal_kembali');
        $bukuId     = $trans['buku_id'];

        // Perubahan stok
        if ($oldStatus !== 'dipinjam' && $newStatus === 'dipinjam') {
            $buku = $this->bukuModel->find($bukuId);
            if ($buku && $buku['stok'] > 0) {
                $this->bukuModel->update($bukuId, ['stok' => $buku['stok'] - 1]);
            }
        }

        if ($oldStatus === 'dipinjam' && in_array($newStatus, ['dikembalikan', 'dibatalkan'])) {
            $buku = $this->bukuModel->find($bukuId);
            $this->bukuModel->update($bukuId, ['stok' => $buku['stok'] + 1]);
        }

        // Tanggal kembali
        if (in_array($newStatus, ['dikembalikan', 'dibatalkan'])) {
            $trans['tanggal_kembali'] = $tglManual ?: date('Y-m-d');
        } else {
            $trans['tanggal_kembali'] = null;
        }

        $trans['status'] = $newStatus;
        $this->pinjamModel->update($id, $trans);

        return redirect()->to('/peminjaman')->with('success', 'Transaksi diperbarui');
    }

    public function delete($id)
    {
        $trans = $this->pinjamModel->find($id);

        if ($trans && $trans['status'] === 'dipinjam') {
            $buku = $this->bukuModel->find($trans['buku_id']);
            $this->bukuModel->update($trans['buku_id'], ['stok' => $buku['stok'] + 1]);
        }

        $this->pinjamModel->delete($id);
        return redirect()->to('/peminjaman')->with('success', 'Transaksi dihapus');
    }
}
