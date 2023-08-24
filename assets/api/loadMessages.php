<?php

require_once 'connectDB.php'; // Include your RedBeanPHP setup

$messages = R::findAll('messages'); // Get all rows from the 'messages' table

foreach ($messages as $message) {
    $author = $message->author;
    $value = $message->value;

    echo "<h1>$author: $value</h1>";
}

?>
