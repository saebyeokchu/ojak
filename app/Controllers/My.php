<?php

namespace App\Controllers;

class My extends BaseController
{
    public function index($sub): string
    {
        //test
        $data['yield']       = 'my/index';
        $data['contents']['sub']       = $sub;
        $data['view_header'] = false;
        $data['view_footer'] = false;

        //login check
        if(!isset($_COOKIE['user_id'])){
            $data['yield']       = 'errors/html/error_auth';
        }else{
            $api = new \App\Controllers\Api();
            $auth = new \App\Controllers\Auth();

            $data['yield']       = 'my/index';
            $data['contents']['sub']       = $sub;
            $data['contents']['isAdmin']       = $auth->isAdmin();
    
            $target_data = null;
            if($sub == 'community'){
                $result = $api -> getPostsByUserId($_COOKIE['user_id']);
                if($result['status'] == 'success') {
                    $target_data = $result['posts'];
                }

                //communit 종류 setting
                $gubun = $this->request->getGet('gubun');
                $data['contents']['gubun']       = $gubun;
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
            }else if($sub == 'social'){
                $result = $api -> getSocialInfo();
                if($result['status'] == 'success') {
                    $target_data = $result['data'];
                }//
            }else if($sub == 'notice'){
                $result = $api -> getPostsByGubun(1);
                if($result['status'] == 'success') {
                    $target_data = $result['posts'];
                }//
            }else if($sub == 'represent-gallery'){
                $resultAllGalleries = $api -> getEntireGallery();
                if($resultAllGalleries['status'] == 'success') {
                    $target_data["eg"] = $resultAllGalleries['items'];
                }

                $result = $api -> getRepresentGallery();
                if($result['status'] == 'success') {
                    $target_data['rg'] = $result['data'];
                }//
            }else if($sub == 'user-management'){
                $result = $api -> getAllUser();
                if($result['status'] == 'success') {
                    $target_data = $result['users'];
                }//
            }

            // else if($sub == 'display-gallery'){
            //     $target_data = [
            //         "exhibits" => null,
            //         "allGallery" => null
            //     ]; 

            //     $resultExhibits = $api -> getExhibitGallery();
            //     if($resultExhibits['status'] == 'success') {
            //         $target_data["exhibits"] = $resultExhibits['items'];
            //     }

            //     //saebyeok 여기 자기것만 가져오도록 수정
            //     $resultAllGalleries = $api -> getAllGallery(1);
            //     if($resultAllGalleries['status'] == 'success') {
            //         $target_data["allGallery"] = $resultAllGalleries['items'];
            //     }
            // }
    
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
