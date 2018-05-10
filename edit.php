<?php 

// СОЕДИНЯЕМСЯ С БД
require('config.php');
require('database.php');

$link = db_connect();
//ПОДКЛЮЧАЕМ МОДЕЛЬ ДЛЯ РАБОТЫ С ФИЛЬМАМИ
require('models/films.php');

if (array_key_exists('update-film', $_POST)) { //если присутствует указанный ключ в массиве $_POST(значит именно форма "обновить фильм" была отправлена), то выполняем следующее..

	//обработка ошибок, если поля не заполнены - записываем в массив с ошибками
	if ($_POST['title'] == '') {
		$errors[] = "<p>Введите название фильма.</p>";
	}
	if ($_POST['genre'] == '') {
		$errors[] = "<p>Введите жанр фильма.</p>";
	}
	if ($_POST['year'] == '') {
		$errors[] = "<p>Введите год фильма.</p>";
	}
	// Если ошщибок нет - сохраняем фильм 
	if ( empty($errors) ) {
		$result = film_update($link, $_POST['title'], $_POST['genre'], $_POST['year'], $_GET['id'], $_POST['description']);

		if ($result) { //выполняем запрос и проверяем, был ли запрос успешно выполнен (должно вернуть true)
			$resultSuccess = "<p>Фильм обновлен!</p>"; // $resultInfo
		} else {
			$resultError = "<p>Что-то пошло не так..</p>";
		}

	}
	}

$film = get_film($link, $_GET['id']);


include('templates/head.tpl');
include('templates/notifications.tpl');
include('templates/edit-film.tpl');
include('templates/foot.tpl');
?>
