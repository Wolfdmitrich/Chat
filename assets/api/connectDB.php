<?php

require_once 'rb.php'; // Including RedBeanPHP
require_once 'config.php'; // Including configuration

// Connecting to the database
try {
    R::setup("mysql:host=$host;dbname=$db", $user, $password);
} catch (RedBeanPHP\RedException $e) {
    die($e->getMessage());
}

?>
