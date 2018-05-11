<?php 

// СОЕДИНЯЕМСЯ С БД
require('config.php');
require('database.php');

$link = db_connect();
//ПОДКЛЮЧАЕМ МОДЕЛЬ ДЛЯ РАБОТЫ С ФИЛЬМАМИ
require('models/films.php');
require('functions/login-functions.php');


//уДАЛЕНИЕ ФИЛЬМА

if ( @$_GET['action'] == 'delete') {
	//echo "Удаляем фильм";
	$result = film_delete($link, $_GET['id']);

	if ($result) {
		$resultInfo = "<p>Фильм удален!</p>";
	} else {
		$resultError = "<p>Что-то пошло не так!</p>"; 
	}
	}


$films = films_all($link);

include('templates/head.tpl');
include('templates/notifications.tpl');
include('templates/index.tpl');
include('templates/foot.tpl');

?>