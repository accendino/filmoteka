<?php 

require('config.php');
require('functions/login-functions.php');

//проверяем, если переданны данные для входа на сайт
if (isset($_POST['enter'])) {
	$userName = 'admin';
	$userPassword = '123456';
	//проверяем совпадают ли данные
	if ($_POST['login'] == $userName) {
		if ($_POST['password'] == $userPassword) { //вход завершен, записываем значение в сессию
			$_SESSION['user'] = 'admin'; //записываем в нее 1й параметр
			header('Location: ' . HOST . 'index.php'); //перенаправляем пользователя
		}
	}
}

include('templates/head.tpl');
include('templates/login.tpl');
include('templates/foot.tpl');






?>