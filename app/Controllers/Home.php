<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return "hi";
        
        $data['yield']       = '/home/test';
        return view('/component/application', $data);
    }
}
