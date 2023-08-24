<?php

require_once 'connectDB.php'; // Включите настройку RedBeanPHP

$messages = R::getAll('SELECT * FROM messages'); // Получение всех строк из таблицы 'messages'

foreach ($messages as $message) {
    $author = $message['author'];
    $value = $message['value'];

    echo "<h1>$author: $value</h1>";
}

?>