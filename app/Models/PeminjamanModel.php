<?php
namespace App\Models;

use CodeIgniter\Model;

class PeminjamanModel extends Model
{
    protected $table      = 'peminjaman';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user_id','buku_id',
        'tanggal_pinjam','tanggal_kembali','status'
    ];

    // relasi sederhana helper
    public function getByUser($userId)
    {
    return $this->select('peminjaman.*, 
                          buku.judul, buku.gambar, buku.deskripsi, buku.rating, 
                          buku.penulis, buku.tahun_terbit')
                ->join('buku', 'buku.id = peminjaman.buku_id')
                ->where('peminjaman.user_id', session()->get('user_id'))
                ->orderBy('peminjaman.id', 'DESC')
                ->findAll();
                
    }
    public function getAllWithRelasi()
    {
        return $this->select('peminjaman.*, 
                            users.nama as nama_user, 
                            buku.judul, buku.gambar, buku.deskripsi, buku.rating, 
                            buku.penulis, buku.tahun_terbit')
                    ->join('users', 'users.id = peminjaman.user_id')
                    ->join('buku', 'buku.id = peminjaman.buku_id')
                    ->orderBy('peminjaman.id', 'DESC')
                    ->findAll();
    }
 
}
