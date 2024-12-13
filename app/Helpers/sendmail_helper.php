<?php
function sendMail($email, $otp , $from)
{
    $emailService = \Config\Services::email();
    $emailService->setFrom($from, 'Tefa');
    $emailService->setTo($email);
    $emailService->setSubject('Activate your account');
    $emailService->setMessage("Kode OTP = $otp");
    if ($emailService->send()) {
        return true;
    }
    return false;
}
