<?php

namespace App\Models;

use CodeIgniter\Model;

class PetugasModel extends Model
{
    /**
     * table name
     */
    protected $table = "petugas";

    /**
     * allow field
     */
    protected $allowedFields = [
        'id_jabatan', 'nama_petugas','tgl_lahir', 'no_telp', 'email', 'alamat', 'status'
    ];
    protected $primaryKey       = 'id_petugas';
}
