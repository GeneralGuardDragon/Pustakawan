<?php

namespace App\Controllers;

use App\Models\PeminjamanModel;
use App\Models\BukuModel;

class Pengunjung extends BaseController
{
    protected $bukuModel, $pinjamModel;

    public function __construct()
    {
        $this->bukuModel   = new BukuModel();
        $this->pinjamModel = new PeminjamanModel();
    }

    public function buku()
    {
        $data['buku'] = $this->bukuModel->findAll();
        return view('pengunjung/buku/index', $data);
    }

    public function booking($id)
    {
        // Cek stok dulu
        $buku = $this->bukuModel->find($id);
        if (!$buku || $buku['stok'] <= 0) {
            return redirect()->back()->with('error', 'Stok buku habis');
        }

        // Kurangi stok
        $this->bukuModel->update($id, ['stok' => $buku['stok'] - 1]);

        // Simpan peminjaman status booking
        $this->pinjamModel->save([
            'user_id'        => session()->get('user_id'),
            'buku_id'        => $id,
            'tanggal_pinjam' => date('Y-m-d'),
            'status'         => 'booking'
        ]);

        return redirect()->back()->with('success', 'Berhasil booking buku');
    }

    public function cancel($id)
    {
        $pinjam = $this->pinjamModel->find($id);
        if (!$pinjam || $pinjam['status'] !== 'booking') {
            return redirect()->back()->with('error', 'Tidak bisa membatalkan');
        }

        // Kembalikan stok
        $buku = $this->bukuModel->find($pinjam['buku_id']);
        $this->bukuModel->update($buku['id'], ['stok' => $buku['stok'] + 1]);

        // Update status ke dibatalkan & isi tanggal kembali
        $this->pinjamModel->update($id, [
            'status'           => 'dibatalkan',
            'tanggal_kembali'  => date('Y-m-d')
        ]);

        return redirect()->back()->with('success', 'Booking dibatalkan');
    }

    public function history()
    {
        $data['pinjam'] = $this->pinjamModel
            ->where('user_id', session()->get('user_id'))
            ->join('buku', 'buku.id = peminjaman.buku_id')
            ->select('peminjaman.*, buku.judul, buku.gambar, buku.deskripsi, buku.rating, buku.penulis, buku.tahun_terbit')
            ->orderBy('peminjaman.id', 'DESC')
            ->findAll();

        return view('pengunjung/peminjaman/index', $data);
    }
}
