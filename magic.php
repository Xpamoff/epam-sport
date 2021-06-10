<?php
session_start();
$link = mysqli_connect('localhost','root','','id-base');
mysqli_query($link, "SET @TS = 'da';");
mysqli_query($link, "SET @FOLDER = 'c:/tmp/';");
mysqli_query($link, "SET @PREFIX = 'admin';");
mysqli_query($link, "SET @EXT    = '.csv';");
//mysqli_query($link, "SET @CMD = CONCAT(`SELECT * FROM admin INTO OUTFILE '`,@FOLDER,@PREFIX,@TS,@EXT, `' FIELDS ENCLOSED BY '\`' TERMINATED BY ';' ESCAPED BY '\`'`,`  LINES TERMINATED BY '\r\n';`);");