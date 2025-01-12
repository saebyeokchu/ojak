<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {   
        $api = new \App\Controllers\Api();

        //get show pieces
        // $result = $api -> getRepresentGallery();
        // if($result['status'] == 'success') {
        //     $data['contents']['showpieces'] = $result['data'];
        // }

        //get exhibit gallery
        $result = $api -> getExhibitGallery();
        if($result['status'] == 'success') {
            $data['contents']['gallery'] = $result['items'];
        }

        //get notice
        $result = $api -> getPostsByGubun(1);
        if($result['status'] == 'success') {
            $data['contents']['notices'] = $result['posts'];
        }
        
        $data['yield']       = '/home/index';
        return view('/component/application', $data);
    }
}
