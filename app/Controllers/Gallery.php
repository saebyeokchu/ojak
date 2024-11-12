<?php

namespace App\Controllers;

class Gallery extends BaseController
{
    public function index(): string
    {
        $data['yield']       = 'gallery/index';
        return view('component/application', $data);
    }

    public function detail($num): string
    {
        $data['yield']       = 'gallery/detail';
        return view('component/application', $data);
    }
}
