<?php
DEFINE('HOST', 'localhost');
DEFINE('USER', 'spathak01_ecommerce');
DEFINE('PASS', 'shekhar123');
DEFINE('DB', 'spathak01_ecommerce');

$link = @mysqli_connect(HOST, USER, PASS, DB) or die('The following error occurred: '.mysqli_connect_error());
mysqli_set_charset($link, 'utf8');
?>