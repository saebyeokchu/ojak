<?php

namespace App\Controllers;

class My extends BaseController
{
    public function index($sub): string
    {
        $data['yield']       = 'my/index';
        $data['contents']['sub']       = $sub;

        $api = new \App\Controllers\Api();
        $target_data = null;
        if($sub == 'community'){
            $result = $api -> getPostsByUserId($_COOKIE['user_id']);
            if($result['status'] == 'success') {
                $target_data = $result['posts'];
            }
        }else if($sub == 'gallery'){
            $result = $api -> getGalleryByUserId($_COOKIE['user_id']);
            if($result['status'] == 'success') {
                $target_data = $result['items'];
            }
        }else{
            $result = $api -> getUserByUserId($_COOKIE['user_id']);
            if($result['status'] == 'success') {
                $target_data = $result['user'];
            }
        }

        $data['contents']['target_data']       = $target_data;
        return view('component/application', $data);
    }

}
