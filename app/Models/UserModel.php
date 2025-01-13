<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'auth';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'user_pw', 'user_name', 'approved', 'auth_code', 'note'];

}