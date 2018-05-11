<?php 

require('config.php');
unset($_SESSION['user']); //обнуляем значение 'user'
session_destroy(); //убиваем сессию

header('Location: ' . HOST . 'index.php'); //редирект

?>