<?php

$username = "1710677";

$password = "8233232412";

$url  = "https://amizone.net/AdminAmizone/Webforms/login.aspx";

$ch = curl_init();

curl_setopt($ch,CURLOPT_URL, $url) or die("die");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $username);
curl_setopt($ch, CURLOPT_POSTFIELDS, $password);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

echo $response;

?>