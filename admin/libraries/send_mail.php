<?php


// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Instantiation and passing `true` enables exceptions
function send_mail($sent_to_email, $sent_to_fullname, $subject,$content , $option = array()) {
    global $config;
    $config_email =$config['email'];
    $mail = new PHPMailer(true);
        
    try {
        //Server settings
        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
        $mail->isSMTP();
        // SMTP mail google
        $mail->Host = $config_email['smtp_host'];  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;
        // Khai báo thông tin tài khoản của mình - Người gửi
        $mail->Username =  $config_email['smtp_user'];                     // SMTP username
        $mail->Password =  $config_email['smtp_pass'];                               // SMTP password
        $mail->SMTPSecure = $config_email['smtp_secure'];
        // Port smtp mail google
        $mail->Port =  $config_email['smtp_port'];
        $mail->CharSet = 'UTF-8'; // TCP port to connect to
        //Recipients
        // Người gửi
        $mail->setFrom($config_email['smtp_user'], $config_email['smtp_fullname']);
        // Người nhận
        $mail->addAddress($sent_to_email, $sent_to_fullname);     // Add a recipient
        // Thêm người nhận
//    $mail->addAddress('ellen@example.com');               // Name is optional
//    $mail->addAddress('ellen@example.com'); 
//    $mail->addAddress('ellen@example.com'); 
        // -----------------------------
        // Nếu phản hồi thì phản hồi qua mail nào
        $mail->addReplyTo($config_email['smtp_user'], $config_email['smtp_fullname']);

        // CC đến người nhận khác
//    $mail->addCC('cc@example.com');
//    $mail->addBCC('bcc@example.com');
        // Attachments
        // Đính kèm file
//        $mail->addAttachment('images/1.jpg');         // Add attachments
//        $mail->addAttachment('images/1.jpg', 'girl.jpg');    // Optional name
        // Content
        // Nội dung gửi thư
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = $content;
//    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        return 'Message has been sent';
    } catch (Exception $e) {
        return "Message could not be sent. Mailer Error: . {$mail->ErrorInfo}";
    }
}
