<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class File extends ResourceController
{
    public function upload($file,$uploadedFromUser)
    {
        // Define the upload path
        $uploadPath = $uploadedFromUser ? ROOTPATH . 'public/img/user/' : ROOTPATH . 'public/img/';
        log_message('error',"uploadPath:".$uploadPath);
        
        // Ensure the upload directory exists
        if (!is_dir($uploadPath)) {
            return;
        }

        // Validate the file
        if (!$file || $file['error'] !== UPLOAD_ERR_OK) {
            return [
                'success' => false,
                'message' => isset($file['error']) ? $file['error'] : 'No file uploaded',
            ];
        }

        // Generate a timestamp
        $timestamp = date('Y-m-d-H-i-s');

        // Get the file extension
        $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);

        // Sanitize file name (excluding the extension)
        $fileName = pathinfo($file['name'], PATHINFO_FILENAME);
        $fileNameClean = preg_replace('/[^a-zA-Z0-9\-\._]/', '_', $fileName);

        // Create a new file name with the timestamp
        $newFileName = $fileNameClean . '-' . $timestamp. '.' . $fileExtension;

        // Define the destination path
        $destination = $uploadPath . $newFileName;
        log_message('error',"newfilename:".$newFileName);


        // Move the file to the target directory
        if (move_uploaded_file($file['tmp_name'], $destination)) {
            return [
                'success' => true,
                'message' => 'File uploaded successfully',
                'file_url' => '/public/img/' . $newFileName,
                'file_name' => $newFileName
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Failed to move uploaded file',
            ];
        }
    }

    public function uploadToSpecificFolder($file,$fileNameInput)
    {
        // Define the upload path
        $uploadPath =ROOTPATH . 'public/img/resource/home/' ;
        log_message('error',"uploadPath:".$uploadPath);
        
        // Ensure the upload directory exists
        if (!is_dir($uploadPath)) {
            return;
        }

        // Validate the file
        if (!$file || $file['error'] !== UPLOAD_ERR_OK) {
            return [
                'success' => false,
                'message' => isset($file['error']) ? $file['error'] : 'No file uploaded',
            ];
        }

        // Generate a timestamp
        $timestamp = date('Y-m-d-H-i-s');

        // Get the file extension
        $fileExtension = pathinfo($fileNameInput, PATHINFO_EXTENSION);

        // Sanitize file name (excluding the extension)
        $fileName = pathinfo($fileNameInput, PATHINFO_FILENAME);

        // Define the destination path
        $destination = $uploadPath . $fileNameInput . '.jpg';

        // Move the file to the target directory
        if (move_uploaded_file($file['tmp_name'], $destination)) {
            return [
                'success' => true,
                'message' => 'File uploaded successfully',
                'file_name' => $fileName
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Failed to move uploaded file',
            ];
        }
    }
}