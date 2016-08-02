<?php
$to      = 'jyoti.tambare27@gmail.com';
$subject = 'the subject...';
$message = 'hello';
$headers = 'MIME-Version: 1.0\r\n'.'Content-type: text/html; charset=utf-8\r\n'.
			'From: jyoti.tambare@power2sme.com' . "\r\n" .
    'Reply-To: jyoti.tambare@power2sme.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$num=mail($to, $subject, $message, $headers);
echo "<pre>"; var_dump($num);
print_r(error_get_last());die;


if($num)
{
echo "send";

}
else 
echo "not send"; 


?>
