<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingModel extends Model
{
    protected $table = 'setting';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'value', 'category'];
    //1 -> 사업자 정보

}