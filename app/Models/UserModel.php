<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'nama', 'email', 'password',
        'tanggal_lahir', 'role', 'created_at'
    ];
    protected $useTimestamps    = false;          // kita pakai created_at manual

    protected $useSoftDeletes = true;
    protected $createdField   = 'created_at';
    protected $deletedField   = 'deleted_at';


    /** Cari user lewat email */
    public function findByEmail(string $email)
    {
        return $this->where('email', $email)->first();
    }
}
