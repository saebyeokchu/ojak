<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Api extends Controller
{
    //Setting
    public function getNotice(){
        $model = new \App\Models\SettingModel();

        $result = $model->where('category', 3)->findAll();

        if($result){
            return  [
                'status' => 'success',
                'data' => $result
            ];
        }else{
            return [
                'status' => 'fail'
            ];
        }
}

    public function getBusniessInfo(){
        $returnType = 'php';
        $model = new \App\Models\SettingModel();

        $result = $model->where('category', 1)->findAll();

        if(isset($_GET['return_type'])){
            $returnType = 'json';
        }

        if($result) {
            if($returnType=="json"){
                return $this->response->setJSON(
                    [
                        'status' => 'success',
                        'data' => $result
                    ]
                );
            }else{
                return [
                    'status' => 'success',
                    'data' => $result
                ];
            }
        } else {
            if($returnType=="json"){
                return $this->response->setJSON(
                    [
                        'status' => 'error',
                        'message' => 'No data',
                    ]
                );
            }else{
                return [
                    'status' => 'error',
                    'message' => 'No data',
                ];
            }
        }
    }

    public function updateBusniessInfo($id, $data){
        $model = new \App\Models\SettingModel();

        $result = $model->update($id, [ 'value' => $data ] );

        if($result) {
            return [
                'status' => 'success',
                'data' => $result
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'No data',
            ];
        }
    }

    public function updateSettingByName($name, $value){
        $model = new \App\Models\SettingModel();

        log_message("error",$name.":".$value);
        
        $result = $model ->where('name', $name) 
            ->set('value', $value) // Set the column and its new value
            ->update();

        if($result) {
            return [
                'status' => 'success',
                'data' => $result
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'No data',
            ];
        }
    }

    //Auth
    public function getAllUser(){
        $model = new \App\Models\UserModel();

        $result = $model->findAll();

        if($result) {
            return [
                'status' => 'success',
                'users' => $result
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'No data',
            ];
        }
    }

    public function getUserByUserId($id){
        $model = new \App\Models\UserModel();

        $result = $model->where('id', $id)->findAll();

        if($result) {
            return [
                'status' => 'success',
                'user' => $result
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'No data',
            ];
        }
    }

    public function getUserByIdPw($id,$pw){
        $model = new \App\Models\UserModel();

        $result = $model->where('user_id', $id)->where('user_pw', $pw)->where('approved',1)->findAll();

        if($result) {
            return [
                'status' => 'success',
                'user' => $result
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'No data',
            ];
        }
    }

    public function insertUser($id,$pw,$name)
    {
        // Get the incoming data from the POST request
        $model = new \App\Models\UserModel();

        //['title', 'content', 'user_id', 'created_at'];
        $data = [
            'name' => $name,
            'user_id' => $id,
            'user_pw' => sha1($pw)
        ];

        $result = $model->insert($data);

        // Return the result as a JSON response
        if ($result) {
            return [
                'status' => 'success',
                'message' => 'Data inserted successfully!',
                'insertedId' => $model->insertID
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'Failed to insert data.'
            ];
        }
    }

    public function updateUser($user)
    {
        // Get the incoming data from the POST request
        $model = new \App\Models\UserModel();

        //['title', 'content', 'user_id', 'created_at'];
        $data = [
            'user_name' => $user['user_name'],
            'user_id' => $user['user_id'],
            'approved' => $user['approved'],
            'auth_code' => $user['auth_code'],
        ];

        $result = $model->update($user['id'],$data);
        log_message('error',serialize($data));

        // Return the result as a JSON response
        if ($result) {
            return [
                'status' => 'success',
                'message' => 'Data updated successfully!'
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'Failed to update data.'
            ];
        }
    }

    public function deleteUser($id){
        $model = new \App\Models\UserModel();
        $result = $model->delete($id);

        // Return the result as a JSON response
        if ($result) {
            return [
                'status' => 'success',
                'message' => 'Data deleted successfully!'
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'Failed to delete data.'
            ];
        }
    }

    //Gallery
    public function getAllGallery() {
        $model = new \App\Models\GalleryModel();
        $items = $model->findAll(); 

        if ($items) {
            return [
                'status' => 'success',
                'items' => $items
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'No data',
            ];
        }
    }

    public function getGalleryByUserId($user_id) {
        $model = new \App\Models\GalleryModel();
        $items = $model->where('user_id',$user_id)->findAll(); 

        if ($items) {
            return [
                'status' => 'success',
                'items' => $items
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'No data',
            ];
        }
    }

    public function getGalleryById($id) {
        $db      = \Config\Database::connect();
        $builder = $db->table('gallery'); 

        $builder->select('gallery.*,auth.user_name');
        $builder->join('auth', 'gallery.user_id = auth.id');
        $builder->where('gallery.id',$id);
        $builder->orderBy('gallery.created_at', 'DESC');
        $query = $builder->get();

        // $model = new \App\Models\GalleryModel();
        // $item = $model->find($id);

        if ($query) {
            return [
                'status' => 'success',
                'item' => $query->getResult()
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'No data',
            ];
        }
    }

    public function getLatestGallery() {
        // $model = new \App\Models\GalleryModel();
        // $items = $model-> orderBy('created_at', 'desc')->findAll(6,0); 

        $db      = \Config\Database::connect();
        $builder = $db->table('gallery');

        $builder->select('gallery.*,auth.user_name');
        $builder->join('auth', 'gallery.user_id = auth.id');
        $builder->orderBy('gallery.created_at', 'DESC');
        $builder->limit(6);
        $query = $builder->get();

        if ($query) { 
            return [
                'status' => 'success',
                'items' => $query->getResult()
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'No data',
            ];
        }
    }

    public function getExhibitGallery() {
        // $model = new \App\Models\GalleryModel();
        // $items = $model-> orderBy('created_at', 'desc')->findAll(6,0); 

        $db      = \Config\Database::connect();
        $builder = $db->table('gallery');

        $builder->select('*');
        $builder->where('exhibit IS NOT NULL');
        $builder->orderBy('exhibit', 'ASC');
        $query = $builder->get();


        if ($query) { 
            
            $gallery1 = [null, null, null, null ,null, null];
            $gallery2 = [null, null, null, null ,null, null];

            foreach($query->getResult() as $row){
                $exhibit = $row->exhibit;
                $exhibit = explode('-',$exhibit);

                //gallery space check
                if($exhibit[0] == 1){
                    $gallery1[$exhibit[1]] = $row;
                }else{
                    $gallery2[$exhibit[1]] = $row;
                }
            }

            return [
                'status' => 'success',
                'items' => $query->getResult(),
                'itemByExhibit' => [$gallery1,$gallery2]
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'No data',
            ];
        }
    }

    public function getRepresentGallery() { //system에 있는 작품 불러오기
        $model = new \App\Models\SettingModel();
        $items = $model->where('category',2)->findAll(); 

        if ($items) { 
            return [
                'status' => 'success',
                'data' => $items,
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'No data',
            ];
        }
    }

    public function insertGallery($title,$content,$img_url,$user_id,$id, $exhibit)
    {
        // Get the incoming data from the POST request
        $model = new \App\Models\GalleryModel();

        //['title', 'content', 'user_id', 'created_at'];
        $data = [
            'title' => $title,
            'content' => $content,
            'user_id' => $user_id,
            'exhibit' => $exhibit
        ];

        if($img_url != null){
            $data['img_url'] = $img_url;
        }

        if($id){
            $result = $model->update($id, $data);
        }else{
            $result = $model->insert($data);
            $id = $model->insertID;
        }

        log_message('error','id-after'.$id);

        // Return the result as a JSON response
        if ($result) {
            return [
                'status' => 'success',
                'message' => 'Data inserted successfully!',
                'insertedId' => $id
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'Failed to insert data.'
            ];
        }
    }

    public function deleteGallery(){
        $id = $this->request->getPost('id');

        $model = new \App\Models\GalleryModel();

        $result = $model->delete($id);

        if($result){
            return $this->response->setJSON([
                'status' => 'success',
                'message' => '성공적으로 삭제되었습니다.',
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => '삭제에 실패하였습니다. 잠시 후 다시 시도하여 주세요.'
            ]);
        }
    }

    public function deleteByGalleryId($id){

        $model = new \App\Models\GalleryModel();
        $result = $model->where('exhibit', $id)->delete();

        if($result){
            return [
                'status' => 'success',
            ];
        } else {
            return [
                'status' => 'error',
            ];
        }
    }

    public function updateGalleryByExhibit($exhibit,$fileName){

        $model = new \App\Models\GalleryModel();
        $result = $model ->where('exhibit', $exhibit) 
            ->set('img_url', $fileName) // Set the column and its new value
            ->update();

        if($result){
            return [
                'status' => 'success',
            ];
        } else {
            return [
                'status' => 'error',
            ];
        }
    }

    // Post
    public function getRowCount() {
        $model = new \App\Models\CommunityModel();

        return $model->countAll();
    }


    public function getAll($pageIndex) {
        $model = new \App\Models\CommunityModel();
        $start_row = (int)($pageIndex)-1;
        $posts = $model->orderBy('id', 'desc')->findAll(5,$start_row*5); 
        $rowCount = $model->countAll();

        if ($posts) {
            return [
                'status' => 'success',
                'posts' => $posts,
                'rowCount' => $rowCount
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'No data',
            ];
        }
    }

    public function getPostsById($id) {
        $model = new \App\Models\CommunityModel();

        $posts = $model->find($id);

        if ($posts) {
            return [
                'status' => 'success',
                'posts' => $posts
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'No data',
            ];
        }
    }

    public function getPostsByUserId($user_id) {
        $model = new \App\Models\CommunityModel();

        $posts = $model->where('user_id',$user_id)->findAll();

        if ($posts) {
            return [
                'status' => 'success',
                'posts' => $posts
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'No data',
            ];
        }
    }

    public function insertPost()
    {
        // Get the incoming data from the POST request
        $content = $this->request->getPost('content');
        $title = $this->request->getPost('title');
        $id = $this->request->getPost('id');
        $user_id = $this->request->getPost('user_id');

        $model = new \App\Models\CommunityModel();

        //['title', 'content', 'user_id', 'created_at'];
        $data = [
            'title' => $title,
            'content' => $content,
            'user_id' => $user_id
        ];

        if($id){
            $result = $model->update($id, $data);
        }else{
            $result = $model->insert($data);
        }

        // Return the result as a JSON response
        if ($result) {
            $returnId = $id ? $id : $model->insertID();

            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Data inserted successfully!',
                'insertedId' => $returnId
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to insert data.'
            ]);
        }
    }

    public function deletePost(){
        $id = $this->request->getPost('id');

        $model = new \App\Models\CommunityModel();

        $result = $model->delete($id);

        if($result){
            return $this->response->setJSON([
                'status' => 'success',
                'message' => '성공적으로 삭제되었습니다.',
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => '삭제에 실패하였습니다. 잠시 후 다시 시도하여 주세요.'
            ]);
        }
    }
}

?>