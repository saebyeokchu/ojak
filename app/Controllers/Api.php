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

    public function getSocialInfo(){
        $model = new \App\Models\SettingModel();

        $result = $model->where('category', 5)->orderBy('sort_order','asc')->findAll();

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

    public function getSocialInfoJson(){
        $model = new \App\Models\SettingModel();

        $result = $model->where('category', 5)->orderBy('sort_order','asc')->findAll();

        if($result) {
                return $this->response->setJSON([
                    'status' => 'success',
                    'data' => $result
                ]);
        } else {

                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'No data',
                ]);
            }
    }

    public function getBusniessInfo(){
        $returnType = 'php';
        $model = new \App\Models\SettingModel();

        $result = $model->where('category', 1)->orderBy('sort_order','asc')->findAll();

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
    

    public function insertBusniessInfo($data)
    {
        // Get the incoming data from the POST request
        $model = new \App\Models\SettingModel();
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

    public function updateBatchSetting($data){
        // $result = $model->update_batch('setting',$data, 'id');
        $db      = \Config\Database::connect();
        $builder = $db->table('setting');
        $result = $builder->updateBatch($data, 'id');

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

    public function insertDisplayGallery($value)
    {
        // Get the incoming data from the POST request
        $model = new \App\Models\SettingModel();

        $data = [
            'name' => 'display_gallery',
            'value' => $value,
            'category' => 4
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

    public function deleteSettingById($id){

        $model = new \App\Models\GalleryModel();
        $result = $model->delete($id);

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

    public function deleteBatchSetting($ids){

        $db      = \Config\Database::connect();
        $builder = $db->table('setting');
        $result = $builder->whereIn('id', $ids)->delete();

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

    //Auth
    public function getAdminEmail(){
        $model = new \App\Models\UserModel();

        $result = $model->find(1);

        if($result) {
            return $result["note"];
        } else {
            return null;
        }
    }


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

        $result = $model->find($id);

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

    public function getUserByUserInputId($id){
        $model = new \App\Models\UserModel();

        $result = $model->where('user_id',$id)->findAll();

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
            'user_name' => $name,
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
            'user_pw' => $user['user_pw'],
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
    public function getEntireGallery() { 

        $model = new \App\Models\GalleryModel();
        //등록순으로 보여주기
        $items = $model->orderBy('created_at','desc')->findAll(); 

        if ($items) {
            return [
                'status' => 'success',
                'items' => $items,
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'No data',
            ];
        }
    }

    public function getAllGallery($pageIndex) { 
        $numPerPage = 8;
        $pageIndex = $pageIndex - 1;

        $model = new \App\Models\GalleryModel();
        //등록순으로 보여주기
        $items = $model->orderBy('created_at','desc')->findAll(8, $pageIndex * 8); 

        if ($items) {
            return [
                'status' => 'success',
                'items' => $items,
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'No data',
            ];
        }
    }

    public function getAllGalleryCount() { 
        $model = new \App\Models\GalleryModel();
        //등록순으로 보여주기
        $count = $model->countAll(); 

        if ($count > 0) {
            return [
                'status' => 'success',
                'count' => $count,
            ];
        } else {
            return [
                'status' => 'error',
                'count' => 0,
            ];
        }
    }

    public function getGalleryByUserId($user_id) {
        $model = new \App\Models\GalleryModel();
        $items = $model->where('user_id',$user_id)->orderBy('id','desc')->findAll(); 

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

    public function getGalleryByIdAPI() {
        $id = $this->request->getPost('id');

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
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Data inserted successfully!',
                'item' => $query->getResult()
            ]);
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
        // $db      = \Config\Database::connect();
        // $builder = $db->table('setting');

        // $builder->select('*');
        // $builder->where('category',4);
        // $builder->join('gallery', 'setting.value = gallery.id');
        // // $builder->orderBy('setting.created_at', 'desc'); //최신순
        // $query = $builder->get();

        $model = new \App\Models\GalleryModel();
        $items = $model->orderBy('id','desc')->limit(4)->findAll(); 

        if ($items) { 
            return [
                'status' => 'success',
                'items' => $items,
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

    public function insertGallery($title, $subTitle, $content, $buyLink, $img_url, $img_url2, $img_url3, $img_url4, $user_id, $id)
    {
        // Get the incoming data from the POST request
        $model = new \App\Models\GalleryModel();

        //['title', 'content', 'user_id', 'created_at'];
        $data = [
            'title' => $title,
            'sub_title' => $subTitle,
            'content' => $content,
            'user_id' => $user_id,
            'buy_link' => $buyLink 
        ];

        if($img_url != null){
            $data['img_url'] = $img_url;
        }

        if($img_url2 != null){
            $data['img_url2'] = $img_url2;
        }else{
            $data['img_url2'] = null;
        }

        if($img_url3 != null){
            $data['img_url3'] = $img_url3;
        }else{
            $data['img_url3'] = null;
        }

        if($img_url4 != null){
            $data['img_url4'] = $img_url4;
        }else{
            $data['img_url4'] = null;
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


    public function getAll($pageIndex, $gubun) {
        $start_row = (int)($pageIndex)-1;
        $itemsPerPage = 10;

        //iems per page
        if($gubun == 2){
            $itemsPerPage = 8;
        }

        $db      = \Config\Database::connect();
        $builder = $db->table('community');
        //get posts
        $builder->select('community.*, auth.user_name');
        $builder->where('gubun',$gubun);
        $builder->join('auth', 'community.user_id = auth.id');
        $builder->orderBy('id', 'desc'); //최신순
        $builder -> limit($itemsPerPage,$start_row*$itemsPerPage);
        $query = $builder->get();
        $posts = $query->getResult();

        //get count
        $builder2 = $db->table('community');
        //get posts
        $builder2->select('community.*, auth.user_name');
        $builder2->where('gubun',$gubun);
        $builder2->join('auth', 'community.user_id = auth.id');
        $builder2->orderBy('id', 'desc'); //최신순
        $query2 = $builder2->get();
        $totalPosts = $query2->getResult();
        
        if ($posts) {
            return [
                'status' => 'success',
                'posts' => $posts,
                'rowCount' => count($totalPosts)
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'No data',
                'rowCount' => 0,
                'posts' => []
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

    public function increaseViewCount($postId, $viewCount){
        $model = new \App\Models\CommunityModel();
        $data = [
            'view_count' => $viewCount + 1
        ];
         $model->update($postId, $data);
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

    public function getPostsByGubun($gubun) {
        $model = new \App\Models\CommunityModel();

        $posts = $model->where('gubun',$gubun)->limit(3)->orderBy('id','desc')->findAll();

        log_message('error',serialize(($posts)));

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
        $gubun = $this->request->getPost('gubun');

        $model = new \App\Models\CommunityModel();

        //['title', 'content', 'user_id', 'created_at'];
        $data = [
            'title' => $title,
            'content' => $content,
            'user_id' => $user_id,
            'gubun' => $gubun
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

    
    public function upsertEvent()
    {
        $title = $this->request->getPost('title');
        $content = $this->request->getPost('content');

        $user_id = $this->request->getPost('user_id');
        $id = $this->request->getPost('id');
        $uploadedFromUser = $this->request->getPost('uploadedFromUser') ?? true;

        $file_name = null;
        $file_upload = true;

        log_message('error',"id:".$id);
        log_message('error',"user_id:".$user_id);
        log_message('error',"content:".$content);
        log_message('error',"title:".$title);

        if(isset($_FILES['image'])){
            $file = new \App\Controllers\File();
            $file_result = $file->upload($_FILES['image'],$uploadedFromUser);
            $file_name = $file_result['file_name'];

            $file_upload = $file_result['success'];
        }

        if($file_upload){
            // Get the incoming data from the POST request

            //['title', 'content', 'user_id', 'created_at'];
            $data = [
                'title' => $title,
                'content' => $content,
                'user_id' => $user_id,
                'gubun' => 2,
                'pinned' => false
            ];

            if($file_name != null){
                $data['img_url'] = $file_name;
            }

            $model = new \App\Models\CommunityModel();
            log_message('error','isset'.isset($id));

            if(isset($id)){
                log_message('error','updateEvent');
                $result = $model->update($id, $data);
            }else{
                log_message('error','insertEvent');
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

    public function getComments($postId){
       $model = new \App\Models\CommentModel();

        $comments = $model->where("post_id",$postId)->findAll();
        if ($comments) {
            return [
                'status' => 'success',
                'comments' => $comments
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'No data',
            ];
        }
    }

    public function deleteComment(){
        $id = $this->request->getPost('id');

        $model = new \App\Models\CommentModel();
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

    public function insertComment()
    {
        // Get the incoming data from the POST request
        $postId = $this->request->getPost('postId');
        $comment = $this->request->getPost('comment');
        $commentId = $this->request->getPost('commentId');

        $model = new \App\Models\CommentModel();

        //['title', 'content', 'user_id', 'created_at'];


        $data = [
            'post_id' => $postId,
            'comment' => $comment
        ];

        if($commentId){
            $result = $model->update($commentId, $data);
        }else{
            log_message('error',serialize($data));
            $result = $model->insert($data);
        }

        // Return the result as a JSON response
        if ($result) {
            $returnId = $commentId ? $commentId : $model->insertID();

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

}

?>