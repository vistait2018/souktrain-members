<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

function souktrainsms($phone_no,$message)

{
    $phone_no = urlencode($phone_no);
    $message = urlencode($message);
    $username = urlencode('PERSPECTIVE');
  $add =  'http://api.smartsmssolutions.com/smsapi.php?username='.$username.'&password=kaizen&sender=Souktrain&recipient='.$phone_no.'&message='.$message;

file_get_contents($add);
}
?>