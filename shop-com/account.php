<?php
require_once './util.php';
$user = get_user_by_sessionid($_COOKIE['sessionid']);
$csrf_token = get_csrf_token($user);
if (!empty($_POST)) {
    // if (!str_contains($_SERVER['HTTP_REFERER'], 'shop.com')) {
    // if (!str_starts_with($_SERVER['HTTP_REFERER'], 'http://shop.com')) {
//    if (!str_starts_with($_SERVER['HTTP_REFERER'], 'http://shop.com/')) {
//         http_response_code(400);
//         echo "Invalid referrer";
//         exit();
//     }

     if (empty($_POST['token']) || $_POST['token'] != $csrf_token) {
         http_response_code(400);
         echo "Invalid CSRF token!";
         exit();
     }

    if (!empty($_POST['pwd'])) {
        update_user_pwd($user, $_POST['pwd']);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Shop - Account</title>
</head>
<body>
<h1>Account</h1>
<a href="/">Back</a> <br/><br/>
<p>Hi, <?php echo $user; ?> ...</p>
<br/>
<form action="/account.php" method="post">
    <?php if (!empty($csrf_token)) {
        echo '<input name="token" type="hidden" value="' . $csrf_token . '"/>';
    } ?>
    <label for="pwd">Change your password: </label>
    <input id="pwd" name="pwd" type="password" value=""/>
    <button type="submit">Submit</button>
</form>
</body>
</html>
