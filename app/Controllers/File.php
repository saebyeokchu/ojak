<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class File extends ResourceController
{
    public function upload($file)
    {
        // Define the upload path
        $uploadPath = ROOTPATH . '/public/img/';
        
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

        // Move the file to the target directory
        if (move_uploaded_file($file['tmp_name'], $destination)) {
            return [
                'success' => true,
                'message' => 'File uploaded successfully',
                'file_url' => 'img/' . $newFileName,
                'file_name' => $newFileName
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Failed to move uploaded file',
            ];
        }
    }
}