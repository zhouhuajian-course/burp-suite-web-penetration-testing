<?php
require_once './util.php';

if (isset($_POST['user']) && isset($_POST['pwd'])) {
    $user = $_POST['user'];
    $pwd = $_POST['pwd'];
    if (!in_array($user, array("huajian", "peter"))) {
        http_response_code(401);
        $err = "Invalid username!";
    } else {
        if ($pwd != get_user_pwd($user)) {
            http_response_code(401);
            $err = "Invalid password!";
        } else {
            // just for test
            setcookie("sessionid", md5($user), time() + 6 * 3600, '/');
            header("Location: /");
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Shop - Login</title>
</head>
<body>
<h1>Login</h1>
<a href="/">Back</a> <br/><br/>
<form action="/login.php" method="post">
    <label for="user">Username:</label>
    <input id="user" name="user" type="text" required/>
    <label for="pwd">Password:</label>
    <input id="pwd" name="pwd" type="password" required/>
    <button type="submit">Login</button>
</form>
<p style="color: red;"><?php echo !empty($err) ? $err : ''; ?></p>

</body>
</html>