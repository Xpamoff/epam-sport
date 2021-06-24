<?php
    session_start();
    $link = mysqli_connect('localhost','root','','id-base');
    if(isset($_POST['submit'])){
        if((isset($_POST['login']))AND(isset($_POST['password']))){
            $login = $_POST['login'];
            $password = $_POST['password'];
            $data_temp = mysqli_query($link, 'SELECT * FROM `admin` WHERE 1');
            $data = mysqli_fetch_array($data_temp);
            if($data['password']==$password and $data['login']==$login){
                $_SESSION['password']=$password;
                header('Location: admin-panel.php');
            }
            else{
                echo 'Something went wrong';
            }
        }
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
<div class="title">Вход</div>
<form class="login" method="post">
    <input type="text" name="login" placeholder="Логин" class="input" required>
    <input type="password" name="password" placeholder="Пароль" class="input" required>
    <button type="submit" name="submit" class="box"><span>Войти</span></button>
</form>

<script src="https://requirejs.org/docs/release/2.3.6/minified/require.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="main.js"></script>
</body>
</html>