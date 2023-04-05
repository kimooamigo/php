<?php

$num = readline('Enter Your Number    > ');
$vf = '+2';
echo "\n";

$url = "http://m.angha.me/gateway.php";
$headers = array(
    'Host' => 'm.angha.me',
    'Connection' => 'keep-alive',
    'Content-Length' => '105',
    'Accept' => 'application/json, text/plain, */*',
    'User-Agent' => 'Mozilla/5.0 (Linux; Android 9) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Mobile Safari/537.36',
    'Content-Type' => 'application/x-www-form-urlencoded;charset=UTF-8',
    'Sec-GPC' => '1',
    'Origin' => 'http://m.angha.me',
    'Referer' => 'http://m.angha.me/plus/operators/vodafoneeg?pid=717&source=significant%C2%A7sms',
    'Accept-Encoding' => 'gzip, deflate',
    'Accept-Language' => 'en-US,en;q=0.9',
    'Cookie' => 'country=null; userlanguageprod=en; language=en; appversion=0.0.2316; fingerprint=eyJmcCI6IjhhZTAxNDNkLWM3ZWUtNGZhNS1iZmE0LTRiYjBkOTY4NTMxOSIsImgiOiJiNWRlODFhNCJ9'
);
$data = array(
    'msidn' => $vf . $num,
    'source' => 'significant§sms',
    'resend' => '0',
    'planid' => '717',
    'output' => 'jsonhp',
    'type' => 'SUBSCRIBEvodafoneeg'
);

$r = http_post_data($url, $data, $headers);
echo "\n"; 

if (strpos($r, "ok") !== false) {
  echo "Done Code Sent";
} else {
  echo "ERROR";
  exit();
}
echo "\n";
sleep(5);
$code = readline("Put The Code   >");
echo "\n";
$uri = "http://m.angha.me/gatewy.php";

$hd = array(
  'Host' => 'm.angha.me',
  'Connection' => 'keep-alive',
  'Content-Length' => '105',
  'Accept' => 'application/json, text/plain, */*',
  'User-Agent' => 'Mozilla/5.0 (Linux; Android 9) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Mobile Safari/537.36',
  'Content-Type' => 'application/x-www-form-urlencoded;charset=UTF-8',
  'Sec-GPC' => '1',
  'Origin' => 'http://m.angha.me',
  'Referer' => 'http://m.angha.me/plus/operators/vodafoneeg?pid=717&source=significant%C2%A7sms',
  'Accept-Encoding' => 'gzip, deflate',
  'Accept-Language' => 'en-US,en;q=0.9',
  'Cookie' => 'country=null; userlanguageprod=en; language=en; appversion=0.0.2316; fingerprint=eyJmcCI6IjhhZTAxNDNkLWM3ZWUtNGZhNS1iZmE0LTRiYjBkOTY4NTMxOSIsImgiOiJiNWRlODFhNCJ9'
);

$dat = array(
  'code' => $code,
  'msidn' => $num,
  'planid' => '717',
  'source' => 'significant§sms',
  'output' => 'jsonhp',
  'type' => 'SUBSCRIBEvodafoneeg'
);

$r2 = http_post_data($url, $hd, $dat);
if (strpos($r2, "Your request is currently being processed, you will shortly receive a confirmation SMS") !== false) {
  echo "SUCCESS";
} elseif (strpos($r2, "You already have an active subscription of this type") !== false) {
  echo "Subscription Already Activated";
} else {
  echo "ERROR";
}

?>