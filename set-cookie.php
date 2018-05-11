<?php 

// СОЕДИНЯЕМСЯ С БД
require('config.php');
require('functions/login-functions.php');

//проверяем установлен массив $_POST и в нем есть элемент user-submit, то создадим переменные куда запишем данные пользователя
if (isset($_POST['user-submit'])) {
	$userName = $_POST['user-name'];
	$userCity = $_POST['user-city'];
	//далее записываем инфо в cookie
	$expire = time() + 60*60*24*30;
	setcookie('user-name', $userName, $expire);
	setcookie('user-city', $userCity, $expire);
}

header('Location: ' . HOST . 'request.php');


?>