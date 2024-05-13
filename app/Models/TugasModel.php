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
        'id_petugas', 'ket_tugas'
    ];
    protected $primaryKey       = 'id_tugas';
}
