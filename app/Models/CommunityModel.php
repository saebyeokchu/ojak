<?php

namespace App\Models;

use CodeIgniter\Model;

class CommunityModel extends Model
{
    protected $table = 'community';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'content', 'user_id','gubun','created_at','view_count','pinned','img_url'];

}