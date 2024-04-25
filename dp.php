<?php
$servername = "127.0.0.1";
$username = "root";
$password = "sova";
$dbName = "first";

$link = new mysqli($servername, $username, $password);
if (!$link) {
  die("Ошибка подключения: " . mysqli_connection_error());
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbName";

if (!$link->query($sql)) {
  echo "Не удалось создать БД";
}

$link = new mysqli($servername, $username, $password, $dbName);

$sql = "CREATE TABLE IF NOT EXISTS users(
  id  INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(15) NOT NULL,
  email VARCHAR(50) NOT NULL,
  password VARCHAR(20) NOT NULL
)";

if(!$link->query($sql)) {
  echo "Не удалось создать таблицу Users";
}

$sql = "CREATE TABLE IF NOT EXISTS posts(
  id  INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(20) NOT NULL,
  main_text VARCHAR(400) NOT NULL
)";

if(!$link->query($sql)) {
  echo "Не удалось создать таблицу Posts";
}

mysqli_close($link);
?>