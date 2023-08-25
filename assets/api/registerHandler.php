<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="refresh" content="4;url=/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация пользавателя | WolfKey</title>
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

        require_once 'connectDB.php';

        function registerUser($username, $password) {
            $user = R::findOne('users', 'username = ?', [$username]);

            if ($user) {
                return "
                    <div class='alert alert-danger' role='alert'>
                        Данное имя пользавателя уже занято
                    </div>
                    <meta http-equiv=\"refresh\" content=\"3;url=/\">
                ";
            } else {
                $hashedPassword = hash('sha256', $password);

                $user = R::dispense('users');
                $user->username = $username;
                $user->password = $hashedPassword;

                try {
                    $id = R::store($user); // Сохраняем и получаем ID записи
                    setcookie('username', $username, time() + 3600, "/"); // Устанавливаем куку
                    header("Location: /");
                } catch (RedBeanPHP\RedException $e) {
                    return "
                        <div class='alert alert-danger' role='alert'>
                            Произошла ошибка: " . $e->getMessage() . "
                        </div>
                        <meta http-equiv=\"refresh\" content=\"3;url=/\">
                    ";
                }
            }
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $result = registerUser($username, $password);
            echo $result;
        }

        ?>
    </div>
</body>
</html>
