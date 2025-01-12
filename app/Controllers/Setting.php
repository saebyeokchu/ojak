<?php

namespace App\Controllers;

class Setting extends BaseController
{
    public function uploadNotice()
    {
        $file = new \App\Controllers\File();
        $api = new \App\Controllers\Api();


        $img_names = ['notice1','notice2','notice3'];
        $upload_result = true;

        foreach($img_names as $in){
            if(isset($_FILES[$in])){
                $file_result = $file->upload($_FILES[$in]);
                $file_name = $file_result['file_name'];
    
                if($file_result['success']){
                    $result = $api -> updateSettingByName($in,$file_name);
        
                    if($result['status'] != 'success'){
                        $upload_result = false;
                        break;
                    }
                }
            }else{
                $result = $api -> updateSettingByName($in,"home-notice-comming.png");
        
                if($result['status'] != 'success'){
                    $upload_result = false;
                    break;
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

    //category4
    public function uploadDisplayGallery()
    {   
        $galleryId = $this->request->getPost('galleryId');

        //new or existedImage
        $api = new \App\Controllers\Api();
        $result = $api -> insertDisplayGallery($galleryId);

        if($result['status'] === 'success'){
            return $this->response->setJSON([
                'status' => 'success',
                'message' => '등록이 완료되었습니다'
            ]);
        }else{
            return $this->response->setJSON([
                'status' => 'fail',
                'message' => '등록에 실패하였습니다'
            ]);
        }
        
    }

    public function deleteDisplayGallery()
    {   
        $id = $this->request->getPost('id');

        $api = new \App\Controllers\Api();
        $result = $api -> deleteSettingById($id);

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
