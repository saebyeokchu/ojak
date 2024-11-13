<?php

namespace App\Controllers;

class Community extends BaseController
{
    public function index(): string
    {
        $data['yield']       = 'community/index';
        return view('component/application', $data);
    }
}
