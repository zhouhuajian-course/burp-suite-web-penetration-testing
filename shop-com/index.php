<?php
error_reporting(0);
require_once './util.php';
try {
    $conn = get_mysql_conn();
    $sql = "SELECT name, img FROM tb_product WHERE state = 1";
    if (!empty($_GET['cate'])) {
        $cate = $_GET['cate'];
        $sql = "SELECT name, img FROM tb_product WHERE cate = '" . $cate . "' AND state = 1";
        // $sql = "SELECT name, img FROM tb_product WHERE cate = \"" . $cate . "\" AND state = 1";
        // $sql = "SELECT name, img FROM tb_product WHERE cate = '" . mysqli_real_escape_string($conn, $cate) . "' AND state = 1";
    }
    // $sql = "SELECT name, img FROM tb_product WHERE state = " . mysqli_real_escape_string($conn, $_GET['state']);
    // $sql = "SELECT name, img FROM tb_product WHERE state = " . (int)$_GET['state'];
    $res = mysqli_query($conn, $sql);
} catch (Exception $e) {
    http_response_code(500);
    echo "Internal Server Error!";
    exit();
}
//
// try {
//     $conn = get_mysql_conn();
//     if (!empty($_GET['cate'])) {
//         $cate = $_GET['cate'];
//         $sql = "SELECT name, img FROM tb_product WHERE cate = ? AND state = 1";
//         $stmt = mysqli_prepare($conn, $sql);
//         mysqli_stmt_bind_param($stmt, "s", $cate);
//         mysqli_stmt_execute($stmt);
//         $res = mysqli_stmt_get_result($stmt);
//     } else {
//         $sql = "SELECT name, img FROM tb_product WHERE state = 1";
//         $res = mysqli_query($conn, $sql);
//     }
// } catch (Exception $e) {
//     http_response_code(500);
//     echo "Internal Server Error!";
//     exit();
// }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Shop - Home</title>
    <style>.cate { margin-top: 40px; } .prod { float: left; margin: 30px 20px 0 0; } .prod img { display: block; height: 150px; } .prod h5 { margin-top: 10px; text-align: center; font-weight: normal; }</style>
</head>
<body>
<h1>Welcome to this shop!</h1>
<a href="/">Shop</a>
<a href="/blog.php">Blog</a>
<a href="/photo_book.php">Photo Book</a>
<a href="/about.php">About</a>
<?php echo !is_login() ? '<a href="/login.php">Login</a>' : '<a href="/account.php">Account</a> <a href="/logout.php">Logout</a>'; ?>
<div class="cate">
    <a href="/">All</a>
    <a href="/?cate=phone">Phone</a>
    <a href="/?cate=tablet">Tablet</a>
    <a href="/?cate=computer">Computer</a>
</div>
<?php while ($product = mysqli_fetch_assoc($res)) {
    echo '<div class="prod"><img src="/image.php?file=' . $product['img'] . '"/><h5>' . $product['name'] . '</h5></div>';
} ?>
</body>
</html>