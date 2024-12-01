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

}
