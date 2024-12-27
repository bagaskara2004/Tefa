<?php
function sendMail($email, $link, $otp, $from,$msg)
{
    $emailService = \Config\Services::email();
    $emailService->setFrom($from, 'Tefa Support');
    $emailService->setTo($email);
    $emailService->setSubject($msg);
    $emailService->setMailType('html'); // Menentukan tipe email sebagai HTML

    // Template HTML email
    $message = "
    <html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                line-height: 1.6;
                color: #333;
                background-color: #f9f9f9;
                padding: 0;
                margin: 0;
            }
            .container {
                max-width: 600px;
                margin: 20px auto;
                background: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }
            .header {
                text-align: center;
                padding: 10px 0;
                background-color: #007BFF;
                color: #fff;
                border-radius: 8px 8px 0 0;
            }
            .header h1 {
                margin: 0;
                font-size: 24px;
            }
            .content {
                padding: 20px;
                font-size: 16px;
            }
            .content a {
                color: #007BFF;
                text-decoration: none;
                font-weight: bold;
            }
            .footer {
                text-align: center;
                padding: 10px;
                font-size: 12px;
                color: #777;
                margin-top: 20px;
                border-top: 1px solid #ddd;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h1>$msg</h1>
            </div>
            <div class='content'>
                <p>Hi,</p>
                <p>Please click the button below to $msg:</p>
                <p><a href='$link' style='display: inline-block; padding: 10px 20px; background: #007BFF; color: #fff; border-radius: 5px;'>Go</a></p>
                <p>If the button above does not work, you can also use the following link:</p>
                <p><a href='$link'>$link</a></p>
                <p>Your OTP code is: <strong>$otp</strong></p>
                <p>If you did not request this email, please ignore it.</p>
            </div>
            <div class='footer'>
                <p>&copy; " . date('Y') . " Tefa Support. All rights reserved.</p>
            </div>
        </div>
    </body>
    </html>
    ";

    $emailService->setMessage($message);

    // Kirim email
    if ($emailService->send()) {
        return true;
    }
    
    // Debugging jika terjadi kesalahan
    // echo $emailService->printDebugger(['headers']);
    return false;
}

