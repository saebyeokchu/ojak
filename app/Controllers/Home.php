<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $api = new \App\Controllers\Api();
        $result = $api -> getLatestGallery();
            
        if($result['status'] == 'success') {
            $data['contents']['items'] = $result['items'];
        }
        
        $data['yield']       = '/home/index';
        return view('/component/application', $data);
    }
}
