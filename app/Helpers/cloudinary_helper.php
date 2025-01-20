<?php 

use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;
Configuration::instance('cloudinary://186434922398559:3A3gAy-Ll4uVmRF5ZAiL9eUzVx8@dnppmhczy?secure=true');

function cloudinaryUpload($file) {
    try
    {
        $upload = new UploadApi();
        $result = $upload->upload($file);
        return $result['public_id'];
    }
    catch (\Exception $e)
    {
        return null;
    }
}
?>