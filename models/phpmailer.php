<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function codeForgotPassword($mailTo, $code)
{
    $email = new PHPMailer(true);

    try {
        $email->isSMTP();
        $email->Host       = 'smtp.gmail.com';
        $email->SMTPAuth   = true;
        $email->Username   = 'cta8425@gmail.com';
        $email->Password   = 'g m m o w e m t d e p f t m f r';
        $email->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $email->Port       = 587;
        $email->setFrom('cta8425@gmail.com', 'cake shop');
        $email->addAddress($mailTo);

        $email->isHTML(true);
        $email->Subject = 'Cake shop code forgot password ';
        $email->Body = $code;
        $email->send();
    } catch (Exception $th) {
        echo $th;
    }
}

function contactToEmail($content)
{
    $email = new PHPMailer(true);

    try {
        $email->isSMTP();
        $email->Host       = 'smtp.gmail.com';
        $email->SMTPAuth   = true;
        $email->Username   = 'cta8425@gmail.com';
        $email->Password   = 'g m m o w e m t d e p f t m f r';
        $email->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $email->Port       = 587;
        $email->setFrom('cta8425@gmail.com', 'Cake shop');
        $email->addAddress('hiendep2003@gmail.com');

        $email->isHTML(true);
        $email->Subject = 'Cake shop contact';
        $email->Body = $content;
        $email->send();
    } catch (Exception $th) {
        echo $th;
    }
}

function thankBuyStore($mailTo)
{
    $email = new PHPMailer(true);

    try {
        $email->isSMTP();
        $email->Host       = 'smtp.gmail.com';
        $email->SMTPAuth   = true;
        $email->Username   = 'cta8425@gmail.com';
        $email->Password   = 'g m m o w e m t d e p f t m f r';
        $email->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $email->Port       = 587;
        $email->setFrom('cta8425@gmail.com', 'Cake shop');
        $email->addAddress($mailTo);

        $email->isHTML(true);
        $email->Subject = 'Thank You';
        $email->Body = "Cake Shop xin chân thành cảm ơn quý khách đã tin tưởng và đặt hàng tại shop. Đơn hàng của bạn sẽ được giao trong
        khoảng 1 giờ tới, xin chú ý điện thoại. Quý khách cần hỗ trợ có thể liên hệ zalo: 03664093** hoặc phần chat tại https://Cakeshop.com. Hi vọng quý khách hài lòng với dịch vụ của chúng tôi <3 \n
        ";
        $email->send();
    } catch (Exception $th) {
        echo $th;
    }
}
