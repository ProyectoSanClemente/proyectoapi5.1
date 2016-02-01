<?php 
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"http://sanclemente.crecic.cl/login.php");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "TxtUser=mylogin");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec ($ch);

echo $server_output;

if ($errno = curl_errno($ch)) {
    echo $errno;
}

curl_close ($ch);
?>