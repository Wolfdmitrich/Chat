<?php

require_once 'rb.php'; // Подключение RedBeanPHP
require_once 'config.php'; // Подключение конфига

// Подключение к базе данных
try {
    R::setup("mysql:host=$host;dbname=$db', '$user', '$password'");
} catch (RedBeanPHP\RedException $e) {
    die($e->getMessage());
}

?>