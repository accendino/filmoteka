<?php 

// СОЕДИНЯЕМСЯ С БД
require('config.php');

//проверяем установлен массив $_POST и в нем есть элемент unset-cookie, то создадим переменные куда запишем данные пользователя
if (isset($_POST['unset-cookie'])) {
	$userName = '';
	$userCity = '';
	//далее записываем инфо в cookie
	$expire = time() - 60*60*24*30;
	setcookie('user-name', $userName, $expire);
	setcookie('user-city', $userCity, $expire);
}

header('Location: ' . HOST . 'request.php');


?>