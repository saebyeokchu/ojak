<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Community extends BaseController
{
    public function index($gubun, $pageIndex): string
    {
        $gubunNum = 0;

        switch($gubun) {
            case "notice" :
                $gubunNum = 1;
                break;
            case "event" :
                $gubunNum = 2;
                break;
            case "qna" :
                $gubunNum = 3;
                break;
        }

        // 공통변수
        $data['contents']['subIndex'] = "공지사항";
        $data['contents']['pageIndex'] = $pageIndex;
        $data['yield']       = 'community/index';

        //데이터 설정
        $api = new \App\Controllers\Api();
        $result = $api -> getAll($pageIndex,$gubunNum);

        $rowCount = $result['rowCount'];
        $data['contents']['posts'] = $result['posts'];
        $data['contents']['rowCount'] = $rowCount;

        if($rowCount > 5){
            $data['contents']['pageIndex'] = 1;
        }
        
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
