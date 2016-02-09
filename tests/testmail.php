<?php
echo "Asd";
exit;
$to = 'mayur.openxcell@gmail.com';
$_POST['req-email'] = 'bhumikakorat@openxcell.com'
$subject = 'Website Change Request';

$headers = "From: " . strip_tags($_POST['req-email']) . "\r\n";
$headers .= "Reply-To: ". strip_tags($_POST['req-email']) . "\r\n";
$headers .= "CC: susan@example.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$message = '<html><body>';
$message .= '<h1>Hello, World!</h1>';
$message .= '</body></html>';

mail($to, $subject, $message, $headers);