<?php

namespace App\Controllers;

class Gallery extends BaseController
{
    public function index(): string
    {
        $api = new \App\Controllers\Api();
        $result = $api -> getAllGallery();
            
        if($result['status'] == 'success') {
            $data['contents']['items'] = $result['items'];
        }

        $data['yield']       = 'gallery/index';
        return view('component/application', $data);
    }

    public function detail($num): string
    {
        $item['title'] = $_GET['title'];
        $item['content'] = $_GET['content'];
        $item['img_url'] = $_GET['img_url'];
        $item['id'] = $num;

        $data['yield']       = 'gallery/detail';
        $data['contents']['item'] = $item;

        return view('component/application', $data);
        
    }
}
