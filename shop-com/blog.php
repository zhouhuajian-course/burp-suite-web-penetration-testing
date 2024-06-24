<?php

//switch ($_COOKIE["sessionid"]) {
//    case md5("huajian"):
//        $user = "huajian";
//        break;
//    case md5("peter"):
//        $user = "peter";
//        break;
//    default:
//        $user = "";
//}
$blogs = array(
    array("title" => "This is blog 1", "content" => "This is the content of blog 1."),
    array("title" => "This is blog 2", "content" => "This is the content of blog 2."),
);
$query = '';
if (!empty($_GET['q'])) {
    $query = $_GET['q'];
    $query = preg_replace("/<\/?script.*?>/", "", $query);
    $query = preg_replace("/<\/?a.*?>/", "", $query);
    $query = preg_replace("/<img.*?>/", "", $query);
    foreach ($blogs as $k => $blog) {
        if (strpos($blog['title'] . $blog['content'], $query) === false) {
            unset($blogs[$k]);
        }
    }
}
// header("X-Test: " . urldecode(getallheaders()["X-Test"]));
// <script src="http://test.com/js/test.js"></script>
?>
<!DOCTYPE html>
<html>
<head>
    <title>Shop - Blog</title>
</head>
<body>
<h1>Blog</h1>
<a href="/">Back</a> <br/><br/>
<form method="get" action="/blog.php">
    <input type="text" name="q" required/>
    <button type="submit">Search</button>
</form>
<?php echo isset($_GET['q']) ? "<br/>Results for '" . $query . "'" : ""; ?>
<ul>
    <?php foreach ($blogs as $blog) { ?>
        <li>
            <h3><?php echo $blog["title"]; ?></h3>
            <p><?php echo $blog["content"]; ?></p>
        </li>
    <?php } ?>
</ul>

</body>
