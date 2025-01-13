<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{
    protected $table = 'comment';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'post_id','comment','password ','created_at '];

}