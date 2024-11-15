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

    public function new(): string
    {
        $data['yield']       = 'gallery/new';
        return view('component/application', $data);
    }


    public function detail($num): string
    {
        $api = new \App\Controllers\Api();

        $result = $api -> getGalleryById($num);

        log_message('error', $num);

        if($result['status'] == "success"){
            $item = $result['item'];

            $data['yield']       = 'gallery/detail';
            $data['contents']['item'] = $item;
        }else{
            $data['yield']       = 'errors/html/error_404_custom';
        }
        
        return view('component/application', $data);
    }

    public function insert()
    {
        $title = $this->request->getPost('title');
        $content = $this->request->getPost('content');
        $user_id = $this->request->getPost('user_id');

        $file = new \App\Controllers\File();

        $file_result = $file->upload($_FILES['image']);

        if($file_result['success']){
            $api = new \App\Controllers\Api();
            $result = $api -> insertGallery($title,$content,$file_result['file_name'],$user_id);

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

}
