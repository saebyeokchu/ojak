<?php

namespace App\Controllers;

class Gallery extends BaseController
{
    public function index(): string
    {
        $pageIndex = $this->request->getGet('pageIndex');

        $api = new \App\Controllers\Api();
        $countResult = $api -> getAllGalleryCount();
        $result = $api -> getAllGallery($pageIndex);
            
        if($result['status'] == 'success') {
            $data['contents']['items'] = $result['items'];
            $data['contents']['totalCount'] = $countResult['count'];
            $data['contents']['pageIndex'] = $pageIndex;
        }

        $data['yield']       = 'gallery/index';
        return view('component/application', $data);
    }

    public function new(): string
    {
        $data['yield']       = 'gallery/new';
        return view('component/application', $data);
    }


    public function detail($num): string
    {
        $pageIndex = $this->request->getGet('pageIndex');

        $api = new \App\Controllers\Api();
        $result = $api -> getGalleryById($num);

        log_message('error', $num);

        if($result['status'] == "success"){
            $item = $result['item'];

            $data['yield']       = 'gallery/detail';
            $data['contents']['item'] = $item;
            $data['contents']['pageIndex'] = $pageIndex;
        }else{
            $data['yield']       = 'errors/html/error_404_custom';
        }
        
        return view('component/application', $data);
    }

    public function edit($num): string
    {
        if(!isset($_COOKIE['user_id'])){
            $data['yield']       = 'errors/html/error_auth';
        }else{
            $api = new \App\Controllers\Api();
            $result = $api -> getGalleryById($num);
    
            if($result['status'] == "success"){
                $item = $result['item'];
    
                $data['yield']       = 'gallery/new';
                $data['contents']['item'] = $item;
            }else{
                $data['yield']       = 'errors/html/error_404_custom';
            }
        }
        return view('component/application', $data);
    }

    public function insert()
    {
        $title = $this->request->getPost('title');
        $subTitle = $this->request->getPost('subTitle');
        $content = $this->request->getPost('content');
        $buyLink = $this->request->getPost('buyLink');

        $user_id = $this->request->getPost('user_id');
        $id = $this->request->getPost('id');
        $uploadedFromUser = $this->request->getPost('uploadedFromUser') ?? true;

        $file_name = null;
        $file_upload = true;

        log_message('error',"id:".$id);
        log_message('error',"user_id:".$user_id);
        log_message('error',"content:".$content);
        log_message('error',"title:".$title);

        if(isset($_FILES['image'])){
            $file = new \App\Controllers\File();
            $file_result = $file->upload($_FILES['image'],$uploadedFromUser);
            $file_name = $file_result['file_name'];

            $file_upload = $file_result['success'];
        }

        if($file_upload){
            $api = new \App\Controllers\Api();
            $result = $api -> insertGallery($title,$subTitle, $content, $buyLink, $file_name, $user_id, $id);

            if($result['status'] == 'success'){
                //check pw
                return $this->response->setJSON([
                    'status' => 'success',
                    'insertedId' => $result['insertedId']
                ]);
            }else{
                return $this->response->setJSON([
                    'status' => 'error'
                ]);
            }
        }
    } 

    public function uploadRepresentItems()
    { 
        $file = new \App\Controllers\File();
        $img_names = ['carousel1','carousel2','carousel3'];
        $upload_result = true;

        foreach($img_names as $in){
            if(isset($_FILES[$in])){
                $file_result = $file->uploadToSpecificFolder($_FILES[$in],$in);
                $file_name = $file_result['file_name'];
    
                if($file_result['success']){
                    $api = new \App\Controllers\Api();
                    $result = $api -> updateSettingByName($in,$file_name);
        
                    if($result['status'] != 'success'){
                        $upload_result = false;
                        break;
                    }
                }
            }
        }

        if($upload_result){
            return $this->response->setJSON([
                'status' => 'success',
            ]);
        }else{
            return $this->response->setJSON([
                'status' => 'fail',
            ]);
        }
        
    }

    public function updateByGalleryId(){
        $exhibit = $this->request->getPost('exhibit');

        $file = new \App\Controllers\File();

        if(isset($_FILES['image'])){
            $file_result = $file->upload($_FILES['image']);
            $file_name = $file_result['file_name'];

            if($file_result['success']){
                $api = new \App\Controllers\Api();
                $result = $api -> updateGalleryByExhibit($exhibit,$file_name);
            }
        }

        if($result['status'] === 'success'){
            return $this->response->setJSON([
                'status' => 'success',
            ]);
        }else{
            return $this->response->setJSON([
                'status' => 'fail',
            ]);
        }

        return $this->response->setJSON([
            'status' => 'fail',
        ]);
    }

    public function deleteByGalleryId(){
        $id = $this->request->getPost('id');

        $api = new \App\Controllers\Api();
        $result = $api -> deleteByGalleryId( $id);

        if($result){
            return $this->response->setJSON([
                'status' => 'success',
                'message' => '성공적으로 삭제되었습니다.',
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => '삭제에 실패하였습니다. 잠시 후 다시 시도하여 주세요.'
            ]);
        }
    }

}
