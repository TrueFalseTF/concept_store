<?php 


require_once('phpmailer/PHPMailerAutoload.php');


$mail = new PHPMailer(true);
$string_position_basket;

$mail->CharSet = 'utf-8';

$mail->SMTPDebug = 2;                               // Enable verbose debug output
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'dimon_mcensk@mail.ru';                 // Наш логин
$mail->Password = '4815162342DA';                           // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
$mail->AuthType = 'LOGIN';
 
$mail->setFrom('dimon_mcensk@mail.ru', 'Дмитрий Чёпоров');   // От кого письмо 
$mail->addAddress('dimon_mcensk@mail.ru');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name


$mail->Subject = 'Заявка с сайта';
$mail->Body    = $string_position_basket; 
$mail->AltBody = $string_position_basket;


if(!$mail->send()) {
    echo 'Error';
} else {
    echo 'Sucsess';
}

?>