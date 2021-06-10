<?php
if(isset($_COOKIE['id'])and isset($_COOKIE['ride_total'])and isset($_COOKIE['run_total'])and isset($_COOKIE['swim_total'])and isset($_COOKIE['name'])){
    $link = mysqli_connect('localhost', 'root', '', 'id-base');
    $check_temp = mysqli_query($link, "SELECT * FROM `user-data` WHERE id=".$_COOKIE['id']);
    $check = mysqli_fetch_array($check_temp);
    if(!empty($check)){
        mysqli_query($link, "UPDATE `user-data` SET `id`='".$_COOKIE['id']."',`name`='".$_COOKIE['name']."',`rides-total`='".$_COOKIE['ride_total']."',`swim-total`='".$_COOKIE['swim_total']."',`run-total`='".$_COOKIE['run_total']."' WHERE id=".$_COOKIE['id']);
    }
    else{
    mysqli_query($link, "INSERT INTO `user-data`(`id`, `name`, `rides-total`, `swim-total`, `run-total`) VALUES ('".$_COOKIE['id']."','".$_COOKIE['name']."','".$_COOKIE['ride_total']."','".$_COOKIE['swim_total']."','".$_COOKIE['run_total']."')");
}}
header('Location: success.html');