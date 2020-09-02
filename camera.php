<?php
$username='admin';
$password='password';
$URL='http://0.0.0.0:8000/ISAPI/Streaming/channels/301/picture';	// 301 - camera 3, stream 1

$ch = curl_init();
//curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
//curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($ch, CURLOPT_URL,$URL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
$result=curl_exec ($ch);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);   //get status code
curl_close ($ch);

if ($status_code == 200)
{
	header('Content-Type: image/jpeg');

	$img = imagecreatefromstring($result);
	imagejpeg($img);
	imagedestroy($img);
}
?>