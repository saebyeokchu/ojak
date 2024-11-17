<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Api extends Controller
{
    //Auth
    public function getUserByIdPw($id,$pw){
        $model = new \App\Models\UserModel();

        $result = $model->where('user_id', $id)->where('user_pw', $pw)->findAll();

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

    public function insertGallery($title,$content,$img_url,$user_id,$id)
    {
        // Get the incoming data from the POST request
        $model = new \App\Models\GalleryModel();

        //['title', 'content', 'user_id', 'created_at'];
        $data = [
            'title' => $title,
            'content' => $content,
            'user_id' => $user_id
        ];

        if($img_url != null){
            $data['img_url'] = $img_url;
        }

        if($id){
            $result = $model->update($id, $data);
        }else{
            $result = $model->insert($data);
        }

        // Return the result as a JSON response
        if ($result) {
            return [
                'status' => 'success',
                'message' => 'Data inserted successfully!',
                'insertedId' => isset($id) ? $id : $model->insertID
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