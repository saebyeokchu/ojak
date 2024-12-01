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

    public function mailAuth() {
        return 'mailAuth';
    }


    //logic
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

    public function update()
    {
        $id = $this->request->getPost('id');
        $name = $this->request->getPost('name');
        $pw = $this->request->getPost('pw');
        $authCode = $this->request->getPost('authCode');

        $api = new \App\Controllers\Api();

        $getUser = $api -> getUserByUserId($id);

        if(isset($getUser['user'])){
            $user = $getUser['user'][0];

            if(isset($name)){
                $user['user_name'] = $name;
            }
    
            if(isset($pw)){
                $user['user_pw'] = sha1($pw);
            }

            if(isset($authCode)){
                $user['auth_code'] = $authCode;
            }
            
    
            $result = $api -> updateUser($user);
    
            if($result['status'] == 'success'){
                return $this->response->setJSON([
                    'status' => 'success'
                ]);
            }
        }
        
        return $this->response->setJSON([
            'status' => 'error'
        ]);
    }

    public function unsubscribe()
    {
        $id = $this->request->getPost('id');

        $api = new \App\Controllers\Api();
        $result = $api -> deleteUser($id);

        if($result['status'] == 'success'){
            return $this->response->setJSON([
                'status' => 'success'
            ]);
        }else{
            return $this->response->setJSON([
                'status' => 'error'
            ]);
        }
    }

    public function check()
    {
        $id = $this->request->getPost('id');

        $api = new \App\Controllers\Api();
        $result = $api -> getUserByUserId($id);

        if($result['status'] == 'success'){
            //check pw
            return $this->response->setJSON([
                'status' => 'success',
                'same_id_count' => count($result['user'])
            ]);
        }else{
            return $this->response->setJSON([
                'status' => 'success',
                'same_id_count' => 0
            ]);
        }
    }

    public function approve(){

        $id = $this->request->getPost('id');

        $api = new \App\Controllers\Api();

        //1. get user info
        $result = $api -> getUserByUserId($id);
        $user = $result['user'][0];
        log_message('error',serialize($user));
        $user['approved'] = 1;

        //2. update user info
        $result = $api -> updateUser($user);

        if($result['status'] == 'success'){
            //send email
            $eapi = new \App\Controllers\Mail();
            $mailReault = $eapi -> send(
                $user['user_id'], 
                $user['user_name'], 
                '오작 커뮤니티 일원이 되신것을 환영합니다!', 
                '이제부터 가입하신 이메일로 로그인하여 오작을 탐헙하실 수 있습니다<a href="https://ojak.co.kr">오작으로 이동하기</a>'
            );

            if($mailReault){
                //check pw
                return $this->response->setJSON([
                    'status' => 'success',
                    'data' => $user
                ]);
            }
        }
        
        return $this->response->setJSON([
            'status' => 'false'
        ]);
    }

    public function disapprove(){

        $id = $this->request->getPost('id');

        $api = new \App\Controllers\Api();

        //1. get user info
        $result = $api -> getUserByUserId($id);
        $user = $result['user'][0];
        log_message('error',serialize($user));
        $user['approved'] = 0;

        //2. update user info
        $result = $api -> updateUser($user);

        if($result['status'] == 'success'){
            //send email
            $eapi = new \App\Controllers\Mail();
            $mailReault = $eapi -> send(
                $user['user_id'], 
                $user['user_name'], 
                '오작 커뮤니티 회원에서 제외되셨습니다.', 
                '이제부터 해당하는 아이디로 로그인하실 수 없습니다'
            );

            if($mailReault){
                //check pw
                return $this->response->setJSON([
                    'status' => 'success',
                    'data' => $user
                ]);
            }
        }
        
        return $this->response->setJSON([
            'status' => 'false'
        ]);
    }

    public function sendAuthEmail() {
        $id = $this->request->getPost('id');
        $userId = $this->request->getPost('userId');
        $name = $this->request->getPost('name');
        $authCode = $this->request->getPost('authCode');

        $api = new \App\Controllers\Api();
        $getUser = $api -> getUserByUserId($id);

        if(isset($getUser['user'])){
            $user = $getUser['user'][0];
            $user['auth_code'] = $authCode;
    
            $result = $api -> updateUser($user);
    
            if($result['status'] == 'success'){
                if($userId == 'admin'){
                    $userId = "cuu2252@gmail.com";
                }

                //send email
                $eapi = new \App\Controllers\Mail();
                $mailReault = $eapi -> send(
                    $userId, 
                    $name, 
                    '오작 인증번호', 
                    '인증번호를 입력해 주세요 <br />'.$authCode
                );


                if($mailReault){
                    //check pw
                    return $this->response->setJSON([
                        'status' => 'success'
                    ]);
                }
            }
        }
    
        return $this->response->setJSON([
            'status' => 'false'
        ]);

    }

    public function checkAuthEmail() {
        $id = $this->request->getPost('id');
        $authCode = $this->request->getPost('authCode');

        $api = new \App\Controllers\Api();
        $getUser = $api -> getUserByUserId($id);

        if(isset($getUser['user'])){
            $user = $getUser['user'][0];
            $dbAuthCode = $user['auth_code'];

            log_message('error',$authCode.":".$user['auth_code']);

            //reset auth code
            $user['auth_code'] = null;
            $api -> updateUser($user);

            if($dbAuthCode == $authCode) {
                return $this->response->setJSON([
                    'status' => 'success'
                ]);
            }
        }

        return $this->response->setJSON([
            'status' => 'false'
        ]);

    }


}
