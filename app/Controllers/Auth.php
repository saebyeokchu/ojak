<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index(): string
    {
        $data['yield']       = 'auth/index';
        $data['contents']['return_url'] = $_GET['return_url'];
        return view('component/application', $data);
    }

    public function login()
    {
        $id = $this->request->getPost('id');
        $pw = $this->request->getPost('pw');

        $api = new \App\Controllers\Api();
        $result = $api -> getUserByIdPw($id,sha1($pw));

        if($result['status'] == 'success'){
            //check pw
            return $this->response->setJSON([
                'status' => 'success',
                'user' => $result['user']
            ]);
        }else{
            return $this->response->setJSON([
                'status' => 'error'
            ]);
        }
    }

    public function register()
    {
        $id = $this->request->getPost('id');
        $pw = $this->request->getPost('pw');
        $name = $this->request->getPost('name');

        $api = new \App\Controllers\Api();
        $result = $api -> insertUser($id,$pw,$name);

        if($result['status'] == 'success'){
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
