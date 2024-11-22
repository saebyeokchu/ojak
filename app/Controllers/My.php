<?php

namespace App\Controllers;

class My extends BaseController
{
    public function index($sub): string
    {
        //login check
        if(!isset($_COOKIE['user_id'])){
            $data['yield']       = 'errors/html/error_auth';
        }else{
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
            }else if($sub == 'info'){
                $result = $api -> getUserByUserId($_COOKIE['user_id']);
                if($result['status'] == 'success') {
                    $target_data = $result['user'];
                }
            }else if($sub == 'busniess'){
                $result = $api -> getBusniessInfo();
                if($result['status'] == 'success') {
                    $target_data = $result['data'];
                }//
            }
    
            $data['contents']['target_data']       = $target_data;
        }
        return view('component/application', $data);
    }

}
