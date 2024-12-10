<?php
function verifyCaptcha($remoteIp, $response)
{
    $secretKey = '6LcfKZIqAAAAACf0AkdSa1gqcYjNrNdDZfvDUFUj';
    $recaptchaUrl = 'https://www.google.com/recaptcha/api/siteverify';

    $recaptchaResponse = file_get_contents("$recaptchaUrl?secret=$secretKey&response=$response&remoteip=$remoteIp");
    $recaptcha = json_decode($recaptchaResponse);
    if ($recaptcha->success) {
        return true;
    }
    return false;
}
