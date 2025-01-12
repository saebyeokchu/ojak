<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Community extends BaseController
{

    private function getGubunHangeulName($gubunNum){
        switch($gubunNum) {
            case 1 :
                $hangeulName = '공지사항';
                break;
            case 2 :
                $hangeulName = '이벤트';
                break;
            case 3 :
                $hangeulName = 'Q&A';
                break;
        }

        return $hangeulName;
    }

    public function index($gubunNum): string
    {   
        $pageIndex = $this->request->getGet('pageIndex');

        if(!$pageIndex){
            $data['yield']       = 'errors/html/error_404_custom';
            return view('component/application', $data);
        }

        // 공통변수
        $data['contents']['pageIndex'] = $pageIndex;
        $data['contents']['gubunNum'] = $gubunNum;
        $data['contents']['hangeulName'] = $this->getGubunHangeulName($gubunNum);
        $data['yield']       = 'community/index';

        //데이터 설정
        $api = new \App\Controllers\Api();
        $result = $api -> getAll($pageIndex,$gubunNum);

        $rowCount = $result['rowCount'];
        $data['contents']['posts'] = $result['posts'];
        $data['contents']['rowCount'] = $rowCount;

        // if($rowCount > 5){
        //     $data['contents']['pageIndex'] = 1;
        // }
        
        return view('component/application', $data);
    }

    public function new(): string {
        //login check
        if(!isset($_COOKIE['user_id'])){
            $data['yield']       = 'errors/html/error_auth';
        }else{
            //get
            $sub = $this->request->getGet('sub');
        
            $data['yield']       = 'community/editor';
            $data['view_footer'] = false;
            $data['contents']['pageIndex'] = 1;
            $data['contents']['sub'] = $sub;
        }
        
        return view('component/application', $data);
    }

    public function detail(): string
    {
        $pageIndex = $this->request->getGet('pageIndex');
        $gubun = $this->request->getGet('gubun');
        $postId = $this->request->getGet('id');

        if(!$pageIndex || !$postId){
            $data['yield']       = 'errors/html/error_404_custom';
            return view('component/application', $data);
        }

        //get data
        $api = new \App\Controllers\Api();
        $posts = $api -> getPostsById($postId);

        if($gubun == 3){
            $comments = $api -> getComments($postId);
        }
        
        if($posts['status'] == 'success') {
            $posts = $posts['posts'];

            //increase view count(ok to fail)
            $api -> increaseViewCount($posts['id'],$posts['view_count'] );
            $posts['view_count'] = $posts['view_count'] + 1;

            if($gubun == 1){
                $data['yield']       = 'community/component/noticeDetail';
            }else if($gubun == 2){
                $data['yield']       = 'community/component/eventDetail';
            }else if($gubun == 3){
                $data['yield']       = 'community/component/qnaDetail';

                if($comments['status'] == 'success') {
                    $data['contents']["comments"] = $comments['comments'];
                }
            }
            $data['contents']["post"] = $posts;
            $data['contents']["pageIndex"] = $pageIndex;
            $data['contents']["gubun"] = $gubun;

            return view('component/application', $data);
        }else{
            $data['yield']       = 'errors/html/error_404_custom';
            return view('component/application', $data);
        }
        
    }

    public function edit(): string
    {
        $pageIndex = $this->request->getGet('pageIndex');
        $gubun = $this->request->getGet('gubun');
        $postId = $this->request->getGet('id');

        if(!$pageIndex || !$postId){
            $data['yield']       = 'errors/html/error_404_custom';
            return view('component/application', $data);
        }

        $api = new \App\Controllers\Api();
        $result = $api -> getPostsById($postId);

        $data['yield']       = 'community/editor';
        $data['contents']['post'] = $result['posts'];
        $data['contents']['pageIndex'] = $pageIndex;
        $data['contents']['sub'] = $gubun;
        // $data['view_footer'] = false; 

        return view('component/application', $data);
        
    }

}
