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
            }else if($sub == 'notice'){
                $result = $api -> getNotice();
                if($result['status'] == 'success') {
                    $target_data = $result['data'];
                }//
            }else if($sub == 'represent-gallery'){
                $result = $api -> getRepresentGallery();
                if($result['status'] == 'success') {
                    $target_data = $result['data'];
                }//
            }else if($sub == 'display-gallery'){
                $result = $api -> getExhibitGallery();
                if($result['status'] == 'success') {
                    $target_data = $result['itemByExhibit'];
                }//
            }else if($sub == 'user-management'){
                $result = $api -> getAllUser();
                if($result['status'] == 'success') {
                    $target_data = $result['users'];
                }//
            }
    
            $data['contents']['target_data']       = $target_data;
        }
        return view('component/application', $data);
    }

    public function editBusiness()
    {
        $name1 = $this->request->getPost('1');
        $name2 = $this->request->getPost('2');
        $name3 = $this->request->getPost('3');
        $name4 = $this->request->getPost('4');
        $name5 = $this->request->getPost('5');

        $api = new \App\Controllers\Api();
        $api -> updateBusniessInfo(1,$name1);
        $api -> updateBusniessInfo(2,$name2);
        $api -> updateBusniessInfo(3,$name3);
        $api -> updateBusniessInfo(4,$name4);
        $api -> updateBusniessInfo(5,$name5);

        return $this -> index('busniess');
    }

}
