<?php

namespace App\Models;

use CodeIgniter\Model;

class GalleryModel extends Model
{
    protected $table = 'gallery';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'content', 'img_url','user_id','show','created_at','sub_title','buy_link'];

}