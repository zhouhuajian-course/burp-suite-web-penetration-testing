<?php
$file = $_GET['file'];
// $file = str_replace("../", "", $file);
$path = realpath("./image/" . $file);
// !str_starts_with($path, "/web/shop-com/image") ||
if (!file_exists($path)) {
    http_response_code(400);
    echo "No such image!";
} else {
    header('Content-Type: ' . mime_content_type($path));
    echo file_get_contents($path);
}
