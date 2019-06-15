<?php  
/* * * * * * * * * * * * * * SEND EMAIL FUNCTIONS * * * * * * * * * * * * * */   
 
//This will send an email using auth smtp and output a log array  
//logArray - connection,   
 
function authSendEmail($from, $namefrom, $to, $nameto, $subject, $message) { //SMTP + SERVER DETAILS
/* * * * CONFIGURATION START * * * */
$smtpServer = "smtp.mail.ru";
$port = "465";
$timeout = "30";
$username = "dimon_mcensk@mail.ru"; $password = "4815162342DA"; $localhost = "smtp.mail.ru"; $newLine = "
";
/* * * * CONFIGURATION END * * * * */ 

$smtpConnect = fsockopen($smtpServer, $port, $errno, $errstr, $timeout); $smtpResponse = fgets($smtpConnect, 515);  
if(empty($smtpConnect))   
{
$output = "Failed to connect: $smtpResponse"; return $output; } else { $logArray['connection'] = "Connected: $smtpResponse"; }  
 
//Request Auth Login
fputs($smtpConnect,"AUTH LOGIN" . $newLine); $smtpResponse = fgets($smtpConnect, 515); $logArray['authrequest'] = "$smtpResponse";  
 
//Send username
fputs($smtpConnect, base64_encode($username) . $newLine); $smtpResponse = fgets($smtpConnect, 515); $logArray['authusername'] = "$smtpResponse";  
 
//Send password
fputs($smtpConnect, base64_encode($password) . $newLine); $smtpResponse = fgets($smtpConnect, 515); $logArray['authpassword'] = "$smtpResponse";  
 
//Say Hello to SMTP
fputs($smtpConnect, "HELO $localhost" . $newLine); $smtpResponse = fgets($smtpConnect, 515); $logArray['heloresponse'] = "$smtpResponse";  
 
//Email From
fputs($smtpConnect, "MAIL FROM: $from" . $newLine); $smtpResponse = fgets($smtpConnect, 515); $logArray['mailfromresponse'] = "$smtpResponse";  
 
//Email To
fputs($smtpConnect, "RCPT TO: $to" . $newLine); $smtpResponse = fgets($smtpConnect, 515); $logArray['mailtoresponse'] = "$smtpResponse";  
 
//The Email
fputs($smtpConnect, "DATA" . $newLine); $smtpResponse = fgets($smtpConnect, 515); $logArray['data1response'] = "$smtpResponse";  
 
//Construct Headers
$headers = "MIME-Version: 1.0" . $newLine; $headers .= "Content-type: text/html; charset=iso-8859-1" . $newLine; $headers .= "To: $nameto <$to>" . $newLine; $headers .= "From: $namefrom <$from>" . $newLine;  
 
fputs($smtpConnect, "To: $to
From: $from
Subject: $subject
$headers

$message
.
");
$smtpResponse = fgets($smtpConnect, 515); $logArray['data2response'] = "$smtpResponse";  
 
// Say Bye to SMTP  
fputs($smtpConnect,"QUIT" . $newLine);   
$smtpResponse = fgets($smtpConnect, 515);  
$logArray['quitresponse'] = "$smtpResponse";   
}



// set the default timezone to use. Available since PHP 5.1  date_default_timezone_set('Europe/London');
$Date = date("d M Y");
$Time = date("h:i A");
$to = "ryan.fitton@googlemail.com";
$nameto = $to;
$from = "ryan.fitton@googlemail.com";
$namefrom = $from;
$subject = "Email From Website";
$message = "
<html>
<body>
<p style='color:#000000;font-family:Helvetica,Arial,sans-serif;'>
You have received an automated email.
<br/><br/>
This message was sent on the $Date at $Time <br/><br/>
--------------------------------------
<br/>
Message text goes here....
</p>
</body>
</html>
";
?>