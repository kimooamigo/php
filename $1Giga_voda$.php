<?php

$number = readline('  Enter Your Number    > ');
sleep(2);
echo "\n";
$pwd = readline('  Enter Your Password    > ');

$url = 'https://web.vodafone.com.eg/auth/realms/vf-realm/protocol/openid-connect/auth';
$data = array(
  'client_id' => 'website',
  'redirect_uri' => 'https://web.vodafone.com.eg/ar/KClogin',
  'state' => '286d1217-db14-4846-86c1-9539beea01ed',
  'response_mode' => 'query',
  'response_type' => 'code',
  'scope' => 'openid',
  'nonce' => generationLink(10),
  'kc_locale' => 'en',
);

$options = array(
  'http' => array(
    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
    'method'  => 'POST',
    'content' => http_build_query($data),
  ),
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

if ($result === FALSE) { /* Handle error */ }

$soup = new SimpleXMLElement($result);
$getUrlAction = $soup->find('form')->get('action');

$headerRequest = array(
  'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
  'Accept-Encoding' => 'gzip, deflate, br',
  'Accept-Language' => 'en-GB,en;q=0.9,ar;q=0.8,ar-EG;q=0.7,en-US;q=0.6',
  'Connection' => 'keep-alive',
  'Content-Type' => 'application/x-www-form-urlencoded',
  'Host' => 'web.vodafone.com.eg',
  'Origin' => 'https://web.vodafone.com.eg',
  'Referer' => $url,
  'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36',
);

$formData = array(
  'username' => $number,
  'password' => $pwd,
);

$sendUserData = file_get_contents($getUrlAction, false, $context);
$checkRegistry = $sendUserData->url;
$_checkRegistry = strpos($checkRegistry, 'KClogin');

// Replace `$checkRegistry` with actual value
if ($checkRegistry != -1) {
    $code = $checkRegistry;
    $code = substr($code, strpos($code, 'code=') + 5);

    $header = [        'Accept' => '*/*',        'Accept-Encoding' => 'gzip, deflate, br',        'Accept-Language' => 'en-GB,en;q=0.9,ar;q=0.8,ar-EG;q=0.7,en-US;q=0.6',        'Connection' => 'keep-alive',        'Content-type' => 'application/x-www-form-urlencoded',        'Host' => 'web.vodafone.com.eg',        'Origin' => 'https://web.vodafone.com.eg',        'Referer' => 'https://web.vodafone.com.eg/ar/KClogin',        'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36'    ];
    $formDataAccessToken = [        'code' => $code,        'grant_type' => 'authorization_code',        'client_id' => 'website',        'redirect_uri' => 'https://web.vodafone.com.eg/ar/KClogin'    ];
    $sendDataAccessToken = http_post_data('https://web.vodafone.com.eg/auth/realms/vf-realm/protocol/openid-connect/token', $formDataAccessToken, $header);
    $access_token = json_decode($sendDataAccessToken)->access_token;
}

$headers = [    'Host' => 'web.vodafone.com.eg',    'msisdn' => $number,    'Authorization' => 'Bearer ' . $access_token,    'Connection' => 'Keep-Alive',    'User-Agent' => 'Mozilla/5.0 (Linux; Android 8.1.0; DRA-LX2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.110 Mobile Safari/537.36',    'Content-Type' => 'application/json',    'Accept' => 'application/json'];
$url = "https://web.vodafone.com.eg/services/dxl/pom/productOrder";
$data = '{"channel":{"name":"MobileApp"},"orderItem":[{"action":"delete","product":{"characteristic":[{"name":"ExecutionType","value":"Sync"},{"name":"LangId","value":"en"}],"relatedParty":[{"id":"' . $number . '","name":"MSISDN","role":"Subscriber"}],"id":"120","@type":"MI"}}],"@type":"MIProfile"}';
$data2 = '{"channel":{"name":"MobileApp"},"orderItem":[{"action":"add","product":{"characteristic":[{"name":"ExecutionType","value":"Sync"},{"name":"LangId","value":"en"}],"relatedParty":[{"id":"' . $number . '","name":"MSISDN","role":"Subscriber"}],"id":"120","@type":"MI"}}],"@type":"MIProfile"}';

$response = http_post_data($url, $data, $headers);
$response2 = http_post_data($url, $data2, $headers);

if (strpos($response, "Completed") !== false) {
    echo "Done deleted\n";
    echo "Done Login\n";
    sleep(2);
    echo "\nDONE ADD 1G .....";
    
} elseif (strpos($response2, "Completed") !== false) {
    echo "Done Login\n";
    sleep(2);
    echo "\nDONE ADD 1G .....";
    
} else {
    echo "Done Login\n";
    sleep(2);
    echo "\nYOU GET 1G BEFORE .....";
}
?>