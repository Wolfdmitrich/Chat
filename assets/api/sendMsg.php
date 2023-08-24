

<?php

require_once 'connectDB.php';

$username = $_COOKIE['username'];
$msg = $_POST['msg'];

try {
    R::exec("INSERT INTO messages (author, value) VALUES ('$username', '$msg')");
    echo '<meta http-equiv="refresh" content="0;url=/">';
} catch (RedBeanPHP\RedException $err) {
    die("Произошла ошибка: $err");
    echo '<meta http-equiv="refresh" content="3;url=/">';
}


?>