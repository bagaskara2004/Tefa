<?php 

use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;
Configuration::instance('cloudinary://186434922398559:3A3gAy-Ll4uVmRF5ZAiL9eUzVx8@dnppmhczy?secure=true');

function cloudinaryUpload() {
    $upload = new UploadApi();
    $upload->upload('logo_pe.png');
}
?>