<?php

namespace App\Models;

use CodeIgniter\Model;

class JabatanModel extends Model
{
    /**
     * table name
     */
    protected $table = "jabatan";

    /**
     * allow field
     */
    protected $allowedFields = [
        'nama_jabatan'
    ];
    protected $primaryKey       = 'id_jabatan';
}
