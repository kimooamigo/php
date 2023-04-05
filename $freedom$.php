//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~


echo '    - Start The Hunt pls Wait ......';

sleep(5);
system("clear");
echo "\n";
sleep(3);

try {
    $count = readline('Enter Number of Accounts » ');
} catch (Exception $e) {
    echo "\n";
    echo 'wrong entry';
    exit('');
}
echo "\n";
for ($lucifer = 0; $lucifer < $count; $lucifer++) {
$ln = 'abcdefghijklmnopqrstuvwxyz1234567890';
$url = 'https://www.your-freedom.net/api.php';
$headers = array(
    'Content-Length' => '247',
    'Content-Type' => 'application/x-www-form-urlencoded',
    'Host' => 'www.your-freedom.net',
    'Connection' => 'Keep-Alive'
);

for ($lucifer = 0; $lucifer < $count; $lucifer++) {
    $ussser = 'LUCIFER_' . $ln[array_rand($ln)] . $ln[array_rand($ln)] . $ln[array_rand($ln)] . $ln[array_rand($ln)] . $ln[array_rand($ln)] . $ln[array_rand($ln)] . $ln[array_rand($ln)];
    $passs = 'LUCIFER_' . $ln[array_rand($ln)] . $ln[array_rand($ln)] . $ln[array_rand($ln)] . $ln[array_rand($ln)] . $ln[array_rand($ln)] . $ln[array_rand($ln)] . $ln[array_rand($ln)];
    $naaame = ['lucifer','mohtrf','pro'][array_rand(['lucifer','mohtrf','pro'])];
    $passst = ['lucifer','mohtrf','pro'][array_rand(['lucifer','mohtrf','pro'])];
    $data = 'cmd=create_account&data={"username":"ussser","password":"passs","email":"ussser@gmail.com","first_name":"naaame","last_name":"passst","no_verification":true}';
    $data = str_replace('ussser', $ussser, $data);
    $data = str_replace('passs', $passs, $data);
    $data = str_replace('naaame', $naaame, $data);
    $data = str_replace('passst', $passst, $data);

    try {
        $inf = post($url, $headers, $data);
        if (strpos($inf, 'Account created') !== false) {
            $file1 = fopen('LUCIFER_Freedom.txt', 'a');
            fwrite($file1, 'username : ' . $ussser . "\n" . 'password : ' . $passs . "\n" . "\n");
            fclose($file1);
            echo 'Done Created Account';
            echo 'Done Saved Accounts \n';
        } else {
            echo 'Erorr';
        }
    } catch (Exception $e) {
        echo 'fail in your internet';
        exit('');
    }
}