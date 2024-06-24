<?php
//header("Access-Control-Allow-Origin: http://shop.com");
//echo "just a test";
//phpinfo();
//$mysqli = mysqli_connect("localhost", "root", "", "shop");
//
//function get_user_info_by_username($username)
//{
//    global $mysqli;
//    $sql = "SELECT * FROM users WHERE username = '" . $username . "';";
//    $result = mysqli_query($mysqli, $sql);
//    $user_info = mysqli_fetch_assoc($result);
//    return $user_info;
//}
//
//get_user_info_by_username("admin");

function test_curl()
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://shop.com/account.php');
    curl_setopt($ch, CURLOPT_REFERER, 'http://shop.com/');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, array("pwd" => "123456"));
    $output = curl_exec($ch);
    curl_close($ch);
}

test_curl();