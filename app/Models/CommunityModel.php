<?php

namespace App\Models;

use CodeIgniter\Model;

class CommunityModel extends Model
{
    protected $table = 'community';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'content', 'user_id'];

}