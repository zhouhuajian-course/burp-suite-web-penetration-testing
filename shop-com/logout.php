<?php
setcookie("sessionid", "", time() - 3600, '/');
header("Location: /");
