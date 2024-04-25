<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мозгов А.М</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css” />
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <form method="POST" action="registration.php">
            <div class="col-8">
                <h1>Регистрация</h1>
                <hr>
            </div>

            <input type="email" placeholder="Enter Email" name="email" id="email" required>
            <input type="text" placeholder="Enter Login" name="login" id="login" required>
            <input type="password" placeholder="Enter Password" name="password" id="password" required>
            <hr>
            <button type="submit" class="registerbtn" name="submit">Register</button>
        </form>
    </div>
</body>
</html>

<?php
require_once('db.php');
$link = new mysqli('127.0.0.1', 'root', 'sova', 'first');
echo "Connected successfully";
if (isset($_COOKIE['User'])) {
    header("Location: login.php");
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $username = $_POST['login'];
    $password = $_POST['password'];
    echo "Connected successfully";
    if (!$email || !$username || !$password) die ('Пожалуйста введите все значения!');
    $sql = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$password')";
    if(!mysqli_query($link, $sql)) {
        echo "Не удалось добавить пользователя";
    }
}
?>