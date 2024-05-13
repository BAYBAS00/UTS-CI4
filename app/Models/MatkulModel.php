<?php

namespace App\Models;

use CodeIgniter\Model;

class MatkulModel extends Model
{
    /**
     * table name
     */
    protected $table = "matkul";

    /**
     * allow field
     */
    protected $allowedFields = [
        'id_dosen', 'nama_matkul', 'sks'
    ];
    protected $primaryKey       = 'id_matkul';
}
