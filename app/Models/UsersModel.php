<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    /**
     * table name
     */
    protected $table = "users";

    /**
     * allow field
     */
    protected $allowedFields = [
        'username', 'password', 'nama_user'
    ];
    protected $primaryKey       = 'id_user';
}
