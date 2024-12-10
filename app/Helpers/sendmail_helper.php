<?php
function sendMail($email, $otp)
{
    $emailService = \Config\Services::email();
    $emailService->setFrom('testing20041120@gmail.com', 'Tefa');
    $emailService->setTo($email);
    $emailService->setSubject('Activate your account');
    $emailService->setMessage("Kode OTP = $otp");
    if ($emailService->send()) {
        return true;
    }
    return false;
}
