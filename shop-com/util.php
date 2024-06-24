<?php

function is_login() {
    return isset($_COOKIE["sessionid"]);
}

function get_user_by_sessionid($sessionid)
{
    switch ($sessionid) {
        case md5("huajian"):
            $user = "huajian";
            break;
        case md5("peter"):
            $user = "peter";
            break;
    }
    return $user;
}

$conn = null;
function get_mysql_conn()
{
    global $conn;
    if (empty($conn)) {
        $conn = mysqli_connect("localhost", "root", "", "db_shop");
    }
    return $conn;
}

function update_user_pwd($user, $pwd)
{
    $conn = get_mysql_conn();
    mysqli_query($conn, "UPDATE tb_user SET pwd = '" . $pwd . "' WHERE name = '" . $user . "';");
}

function get_user_pwd($user)
{
    $conn = get_mysql_conn();
    $res = mysqli_query($conn, "SELECT pwd FROM tb_user WHERE name = '" . $user . "';");
    $row = mysqli_fetch_assoc($res);
    return $row['pwd'];
}

function get_csrf_token($user) {
    // just for test
    return md5('token:' . $user);
}