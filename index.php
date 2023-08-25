<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat | WolfKey</title>
    <!-- CSS Connections -->
    <link rel="stylesheet" href="assets/css/index.css">
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
    <?php
    function isRegistered() {
        if (isset($_COOKIE['username'])) {
            return "block";
        } else {
            return "none";
        }
    }

    ?>
    <div class="container">
        <div class="exit" style="display: <?php echo isRegistered(); ?>">
            <a href="assets/api/logout.php" style='text-decoration: none'>Выйти</a>
        </div>
        <?php

        if (isset($_COOKIE['username'])) {
            echo "<h1>Привет, " . $_COOKIE['username'] . "</h1> <br>";
        } else {
            echo "<h1>Привет, гость!</h1>";
            echo "<br>";
        }

        ?>


        <?php
        if (!isset($_COOKIE["username"])) {
            echo "
            <h1>Регистрация</h1>
            <form action=\"assets/api/registerHandler.php\" method=\"post\">
            <input type=\"text\" name=\"username\" class=\"form-control\" placeholder=\"Введите имя пользователя\" required>
            <br>
            <input type=\"password\" name=\"password\" class=\"form-control\" placeholder=\"Введите пароль\" required>
            <br>
            <button type=\"submit\" class=\"btn btn-primary\">Подтвердить</button>
            </form>
            <br>
            <a href='assets/api/login.html' style='text-decoration: none; font-size: large;'>Есть аккаунт, войди в него!</a>
            <br>
            <br>
            <br>
            <br>
            ";
        }
        ?>
        <div class="messages">
            <h1 id="messages_header">Сообщения:</h1>
            <br>
            <?php
            require_once 'assets/api/loadMessages.php';
            ?>
        </div>
        <br>
        <?php

        if (isset($_COOKIE["username"])) {
            echo "
                <form action=\"assets/api/sendMsg.php\" method=\"post\">
                    <textarea name=\"msg\" cols=\"30\" rows=\"10\" class=\"form-control\" placeholder=\"Введите сообщение\" required></textarea>
                    <br>
                    <button type=\"submit\" class=\"btn btn-primary\">Подтвердить</button>
                </form>
                <br>
                <br>
            ";
        }

        ?>
    </div>
</body>

</html>