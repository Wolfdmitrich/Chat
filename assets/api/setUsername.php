<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="refresh" content="4;url=/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Установка имени пользователя | WolfKey</title>
    <!-- CSS Connections -->
    <link rel="stylesheet" href="/assets/css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- JS Connections -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa"
        crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <?php

        $username = $_POST['username'];

        if (trim($username) == "") {
         echo "
            <div class='alert alert-danger' role='alert' style='margin-top: 1vw !important;'>
                Вы не ввели имя пользователя!
            </div>
         ";
        } else {
            setcookie('username', $username, time() + (86400 * 30), "/");
            echo '<meta http-equiv="refresh" content="0;url=/">';
        }

        ?>
    </div>
</body>
</html>