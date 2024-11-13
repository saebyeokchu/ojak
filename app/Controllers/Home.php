<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data['yield']       = '/home/index';
        return view('/component/application', $data);
    }
}
