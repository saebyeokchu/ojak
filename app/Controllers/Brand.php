<?php

namespace App\Controllers;

class Brand extends BaseController
{
    public function index(): string
    {
        $data['yield']       = 'brand/index';
        return view('component/application', $data);
    }
}
