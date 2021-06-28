<?php
session_start();
$link = mysqli_connect('localhost','mysql','mysql','id-base');
$data_temp = mysqli_query($link, 'SELECT * FROM `admin` WHERE 1');
$data = mysqli_fetch_array($data_temp);
if($_SESSION['password']==$data['password']){

}
else{
    header('Location: index.php');
}
if(isset($_POST['submit'])){
    $_SESSION['password']='-1';
    header('Location: index.php');
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="registration.css">
    <link rel="stylesheet" href="main.css">
</head>
<body>
<div class="title">Панель администратора</div>
    <a class="box" href="magic.php"><span>Вывести данные участников в таблицу</span></a>
    <form method="post">
        <button type="submit" name="submit" class="box"><span>Выйти</span></button>
    </form>
    <script src="https://requirejs.org/docs/release/2.3.6/minified/require.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>