<?php

namespace App\Controllers;

class My extends BaseController
{
    public function index(): string
    {
        $data['yield']       = 'my/index';
        return view('component/application', $data);
    }
}
