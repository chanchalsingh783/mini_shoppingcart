<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

 function send_email($to,$subject,$body)
 {
    
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: Chanchal   Support<singhchanchal5778@gmail.com>' . "\r\n";
    $headers.=  'X-Priority: 3\r\n';
    $headers.=  'X-Mailer: PHP'.phpversion() ."\r\n";
    
    $success = mail($to,$subject,$body,$headers);
    if($success)
    {
        echo "Mail send successfully";
    }
    else
    {
        echo "Mail not send successfully";
    }
 }

?>