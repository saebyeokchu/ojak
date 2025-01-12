<?php

if (!function_exists('load_js')) {
    function load_js($filename) {
        $fileUrl = base_url('app/Libraries/' . $filename);
        return '<script src="' . $fileUrl . '"></script>';
    }
}