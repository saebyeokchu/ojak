<?php

namespace App\Controllers;
use PhpParser\Node\Expr\BinaryOp\BooleanOr;

class Auth extends BaseController
{

    public function isAdmin() : bool {
        $logginedId = $_COOKIE['user_id'];

        if(isset($logginedId) && $logginedId > -1){
            if($logginedId == 1){
                return true;
            }
        }

        return false;
    }
    
    public function index(): string
    {
        $data['yield']       = 'auth/index';
        $data['contents']['return_url'] = $_GET['return_url'];
        return view('component/application', $data);
    }

    public function signup(): string
    {
        $data['yield']       = 'auth/signup';
        // $data['contents']['return_url'] = $_GET['return_url'];
        return view('component/application', $data);
    }


    public function login(): string
    {
        $data['yield']       = 'auth/login';
        $data['contents']['return_url'] = $_GET['return_url'];
        return view('component/application', $data);
    }

    public function registerRequestComplete() : string {
        $data['yield']       = 'auth/register-request-complete';
        $data['view_footer'] = false;

        $returnUrl = $_GET['return_url'] ? $_GET['return_url'] : "/";
        $data['contents']['return_url'] = $returnUrl;
        return view('component/application', $data);
    }

    public function mailAuth() {
        return 'mailAuth';
    }


    //logic
    public function verify()
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
        $note = $this->request->getPost('adminEmail');

        log_message('error','password : '.$pw);

        $api = new \App\Controllers\Api();

        $getUser = $api -> getUserByUserId($id);

        if(isset($getUser['user'])){
            $user = $getUser['user'];

            if(isset($name)){
                $user['user_name'] = $name;
            }
    
            if(isset($pw)){
                $user['user_pw'] = sha1($pw);
            }

            if(isset($authCode)){
                $user['auth_code'] = $authCode;
            }

            if(isset($note)){
                $user['note'] = $note;
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
        $result = $api -> getUserByUserInputId($id);

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
        $user = $result['user'];
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
                '오작 가입이 승인되었습니다.', 
                '<div style="max-width: 600px; margin: 20px auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <div style="background-color: black; color: #ffffff; padding: 20px; text-align: center; font-size: 24px;"><strong>오작 가입 승인 메일</strong></div>
                <div style="padding: 20px; color: #333333;">
                <p style="margin: 10px 0;">'.$user['user_name'].'님,</p>
                <p style="margin: 10px 0;">오작 조합원 승인이 완료되었습니다.<br />가입하신 이메일로 로그인하실 수 있습니다.</p>
                <a style=" background-color: #555555; border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;" href="https://ojak.co.kr">오작으로 이동하기</a>
                </div>
                <div style="padding: 10px 20px; text-align: center; background-color: #f4f4f4; font-size: 12px; color: #666666;">&copy; 2025 Ojak. All rights reserved.</div>
                </div>'
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
        $user = $result['user'];
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
                '오작 조합원 상태가 비승인 되었습니다.', 
                '<div style="max-width: 600px; margin: 20px auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <div style="background-color: black; color: #ffffff; padding: 20px; text-align: center; font-size: 24px;"><strong>오작 가입 비승인 메일</strong></div>
                <div style="padding: 20px; color: #333333;">
                <p style="margin: 10px 0;">'.$user['user_name'].'님,</p>
                <p style="margin: 10px 0;">오작 조합원에서 제외처리 되셨습니다.</p>
                </div>
                <div style="padding: 10px 20px; text-align: center; background-color: #f4f4f4; font-size: 12px; color: #666666;">&copy; 2025 Ojak. All rights reserved.</div>
                </div>'
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

            //after verify user, send email
            $user = $getUser['user'];
            log_message('error',serialize($user));

            if($userId == 'admin'){
                $targetEmail = $api -> getAdminEmail();
            }else{
                $targetEmail = $userId;
            }
            
            log_message('error','userId : '.serialize($userId));

            //send email
            $eapi = new \App\Controllers\Mail();
            $mailReault = $eapi -> send(
                $targetEmail, 
                $name, 
                '[오작] 오작에서 전송한 인증번호입니다.', 
                '<div style="max-width: 600px; margin: 20px auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <div style="background-color: black; color: #ffffff; padding: 20px; text-align: center; font-size: 24px;"><strong>인증번호</strong></div>
                <div style="padding: 20px; color: #333333;">
                <p style="margin: 10px 0;">'.$user['user_name'].'님,</p>
                <p style="margin: 10px 0;">인증번호를 보내드립니다.</p>
                <div style="display: inline-block; background-color: #f4f4f4; color: #black; font-size: 24px; font-weight: bold; padding: 10px 20px; border: 1px dashed black; border-radius: 5px; margin: 20px 0; text-align: center;">'.$authCode.'</div>
                <p style="margin: 10px 0;">이 코드는 전송시점 이후 <strong>10 분</strong>까지 유효합니다. 만약 이 인증번호를 요청하시지 않았다면 이 메일을 삭제하여 주시기 바랍니다.</p>
                </div>
                <div style="padding: 10px 20px; text-align: center; background-color: #f4f4f4; font-size: 12px; color: #666666;">&copy; 2025 Ojak. All rights reserved.</div>
                </div>'
            );

            if($mailReault){
                //check pw
                $user['auth_code'] = $authCode;
    
                $result = $api -> updateUser($user);
                if($result['status'] == 'success'){
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
            $user = $getUser['user'];
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
