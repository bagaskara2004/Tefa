<?php
function generateKode()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $otp = '';

    for ($i = 0; $i < 6; $i++) {
        $otp .= $characters[rand(0, $charactersLength - 1)];
    }
    return $otp;
}
