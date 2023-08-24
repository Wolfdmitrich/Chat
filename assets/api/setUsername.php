<?php

$username = $_POST['username'];
setcookie('username', $username, time() + (86400 * 30));

header('Location: /');

?>