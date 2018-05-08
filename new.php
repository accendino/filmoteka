<?php
// СОЕДИНЯЕМСЯ С БД
require('config.php');
require('database.php');

$link = db_connect();
//ПОДКЛЮЧАЕМ МОДЕЛЬ ДЛЯ РАБОТЫ С ФИЛЬМАМИ
require('models/films.php');


if (array_key_exists('add-film', $_POST)) { //если присутствует указанный ключ в массиве $_POST(значит именно форма "добавить фильм" была отправлена), то выполняем следующее..
	//проверяем поля на заполненность, если пустые, формируем массив с ошибками и вывести его, если ошибок нет - будем сохранять данные в БД
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
		$result = film_new($link, $_POST['title'], $_POST['genre'], $_POST['year'], $_POST['description']);
	

		if ($result) { //выполняем запрос и проверяем, был ли запрос успешно выполнен (должно вернуть true)
			$resultSuccess = "<p>Фильм добавлен!</p>"; // $resultInfo
		} else {
			$resultError = "<p>Что-то пошло не так..</p>";
		}
	}
}

include('templates/head.tpl');
include('templates/notifications.tpl');
include('templates/new-film.tpl');
include('templates/foot.tpl');


?>

