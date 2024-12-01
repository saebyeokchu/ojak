<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {   
        $api = new \App\Controllers\Api();

        //get show pieces
        $result = $api -> getRepresentGallery();
        if($result['status'] == 'success') {
            $data['contents']['showpieces'] = $result['data'];
        }

        //get exhibit gallery
        $result = $api -> getExhibitGallery();

        $gallery1 = [null, null, null, null ,null, null];
        $gallery2 = [null, null, null, null ,null, null];

        foreach($result['items'] as $row){
            $exhibit = $row->exhibit;
            $exhibit = explode('-',$exhibit);

            //gallery space check
            if($exhibit[0] == 1){
                $gallery1[$exhibit[1]] = $row;
            }else{
                $gallery2[$exhibit[1]] = $row;
            }
        }
            
        if($result['status'] == 'success') {
            $data['contents']['items'] = $result['items'];
            $data['contents']['gallery1'] = $gallery1;
            $data['contents']['gallery2'] = $gallery2;

        }
        
        $data['yield']       = '/home/index';
        return view('/component/application', $data);
    }
}
