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
    <div class="container">
        <h1>Chat | WolfKey</h1>
        <div class="messages">
            <?php
            require_once 'assets/api/loadMessages.php';
            ?>
        </div>
        <br>
        <?php
        if (!isset($_COOKIE["username"])) {
            echo "
            <form action=\"assets/api/setUsername.php\" method=\"post\">
            <input type=\"text\" name=\"username\" class=\"form-control\" placeholder=\"Введите имя пользователя\" required>
            <br>
            <button type=\"submit\" class=\"btn btn-primary\">Подтвердить</button>
            </form> 
            ";
        }
        ?>
        <br>
        <form action="assets/api/sendMsg.php" method="post">
            <textarea name="msg" cols="30" rows="10" class="form-control" placeholder="Введите сообщение" required></textarea>
            <br>
            <button type="submit" class="btn btn-primary">Подтвердить</button>
        </form>
    </div>
</body>

</html>