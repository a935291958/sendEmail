<?php
/**
 * Created by PhpStorm.
 * User: Annie
 * Date: 2017/12/25
 * Time: 21:30
 */

/*

 * 邮件发送

 * 发送到哪个邮 箱$id，发件人的名称，邮件的主题$subject，邮件的内容$content

 */







function sendMail($to,$me ,$subject, $content) {

    vendor('PHPMailer.class#phpmailer');

    $mail = new PHPMailer();

    // 装配邮件服务器

    if (C('MAIL_SMTP')) {

        $mail->IsSMTP();

    }

    $mail->Host = C('MAIL_HOST');

    $mail->SMTPAuth = C('MAIL_SMTPAUTH');

    $mail->Username = C('MAIL_USERNAME');

    $mail->Password = C('MAIL_PASSWORD');

    $mail->SMTPSecure = C('MAIL_SECURE');

    $mail->CharSet = C('MAIL_CHARSET');

    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    // 装配邮件头信息

    $mail->From = C('MAIL_USERNAME');

    $mail->AddAddress($to);

    $mail->FromName = $me;

    $mail->IsHTML(C('MAIL_ISHTML'));

    // 装配邮件正文信息

    $mail->Subject = $subject;

    $mail->Body = $content;

    // 发送邮件

    if (!$mail->Send()) {

        return FALSE;

    } else {

        return TRUE;

    }

}


function h8(){
    header("Content-type:text/html;charset=utf-8");
}
function hjson(){
    header('Content-type: application/json');
}
function h404(){
    header('HTTP/1.1 404 Not Found');
    header("status: 404 Not Found");
    die;
}
function hxml(){
    header("Content-type:text/xml");
}
