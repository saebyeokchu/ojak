<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Community extends BaseController
{
    public function index($num): string
    {
        $api = new \App\Controllers\Api();
        $rowCount = $api -> getRowCount();
        $data['contents']['rowCount'] = $rowCount;
        $data['contents']['pageIndex'] = $num;

        if($rowCount > 0){
            $result = $api -> getAll($num);
            
            if($result['status'] == 'success') {
                $data['contents']['posts'] = $result['posts'];
    
                if($rowCount > 5){
                    $data['contents']['pageIndex'] = 1;
                }
            }
        }
        
        $data['yield']       = 'community/index';
        
        return view('component/application', $data);
    }

    public function new(): string {
        //login check
        if(!isset($_COOKIE['user_id'])){
            $data['yield']       = 'errors/html/error_auth';
        }else{
            $data['yield']       = 'community/editor';
            $data['view_footer'] = false;
            $data['contents']['pageIndex'] = 1;
        }
        
        return view('component/application', $data);
    }

    public function detail($num, $pageIndex): string
    {
        $api = new \App\Controllers\Api();
        $posts = $api -> getPostsById($num);
        
        if($posts['status'] == 'success') {
            $data['yield']       = 'community/detail';
            $data['contents']["post"] = $posts['posts'];
            $data['contents']["pageIndex"] = $pageIndex;

            return view('component/application', $data);
        }else{
            $data['yield']       = 'errors/html/error_404_custom';
            return view('component/application', $data);
        }
        
    }

    public function edit($pageIndex): string
    {
        $post['title'] = $_GET['title'];
        $post['content'] = $_GET['content'];
        $post['id'] = $_GET['id'];

        $data['yield']       = 'community/editor';
        $data['contents']['post'] = $post;
        $data['contents']['pageIndex'] = $pageIndex;
        $data['view_footer'] = false;

        return view('component/application', $data);
        
    }
}
