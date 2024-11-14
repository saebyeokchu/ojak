<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Api extends Controller
{
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

        $model = new \App\Models\CommunityModel();

        //['title', 'content', 'user_id', 'created_at'];
        $data = [
            'title' => $title,
            'content' => $content,
            'user_id' => 1
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
                'message' => '성공적으로 삭제되었습니다.'.$id,
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