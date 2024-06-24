<?php
$err = '';
$photo_dir = "./photo_book";
if (!empty($_FILES['photo'])) {
    $name = $_FILES['photo']['name'];
    $type = $_FILES['photo']['type'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    $allowed_types = array('image/jpeg', 'image/png');
    if (!in_array($type, $allowed_types)) {
        http_response_code(403);
        $err = "Invalid photo type!";
    } else {
        if (!file_exists($photo_dir)) {
            mkdir($photo_dir);
        }
        move_uploaded_file($tmp_name, $photo_dir . '/' . uniqid(mt_rand()) . '-' . $name);
    }
}

$files = scandir($photo_dir);
$sorted_files = array();
foreach ($files as $file) {
    if (in_array($file, array(".", ".."))) {
        continue;
    }
    $sorted_files[filectime($photo_dir . '/' . $file)] = $file;
}
krsort($sorted_files);
# var_dump($sorted_files);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Shop - Photo Book</title>
    <style>img { display: block; height: 150px; float: left; margin: 0 10px 10px 0; }</style>
</head>
<body>
<h1>Photo Book</h1>
<a href="/">Back</a> <br/><br/>
<form action="/photo_book.php" method="post" enctype="multipart/form-data">
    <input name="aaa" type="hidden" value="bbb"/>
    <input name="photo" type="file" accept="image/jpeg,image/png" required/>
    <button>Upload</button>
</form>
<?php echo !empty($err) ? '<p style="color: red;">' . $err . '</p>' : ''; ?>
<br/><br/>
<?php
foreach ($sorted_files as $file) {
    echo '<img src="/photo_book/' . $file . '"/>';
}
?>
</body>
