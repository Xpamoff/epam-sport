<?php
if(isset($_COOKIE['id'])){
    $link = mysqli_connect('localhost', 'root', '', 'id-base');
    mysqli_query($link, "INSERT INTO `users`(`id`) VALUES ('".$_COOKIE['id']."')");
}
header('Location: success.html');