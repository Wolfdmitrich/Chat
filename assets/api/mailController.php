<?php

require_once 'config.php';

function sendmail($mailadress, $mailsubject, $mailmessage) {
    $to = $mailadress;
    $subject = $mailsubject;
    $message = $mailmessage;
    $headers = "From: noreply@key-projects.online\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";

    // Отправка письма
    $mailSent = mail($to, $subject, $message, $headers);

    if (!$mailSent) {
        die("Ошибка при отправке письма.");
    }
}

?>

