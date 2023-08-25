<?php

require_once 'connectDB.php';

$messages = R::getAll('SELECT * FROM messages');

if (count($messages) > 0) {
    foreach ($messages as $message) {
        $author = $message['author'];
        $value = $message['value'];

        if ($author === 'System' || $author === 'Admin') {
            echo "<h2><span style='border-radius: 5px; padding: 5px; margin-bottom: 2px; background-color: #FF0000;'>$author</span>: $value</h2>";
        } else {
            echo "<h2><span style='border-radius: 5px; padding: 5px; margin-bottom: 2px; background-color: #5f9ea060;'>$author</span>: $value</h2>";
        }
        
        echo "<br>";
    }
} else {
    echo "<h1 style='color: red;'>Сообщений нет...</h1>";
}

?>
