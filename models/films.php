<?php

function films_all($link){
	// ПОЛУЧАЕМ ФИЛЬМЫ ИЗ БД
	//подготовили запрос
	$query = "SELECT * FROM films";
	//создаем пустой массив куда будем записывать полученные данные, наша таблица
	$films = array();
	//выполняем этот запрос с помощью функции mysql_query() и записываем результат в переменную $result
	$result = mysqli_query($link, $query); //если результат положительный, то формируем массив с фильмами
	//выполняем ф-ю mysqli_fetch_array(result) - при каждом её вызове получает новую строчку из запроса к базе данных и возвращает её. если функция mysqli_query($link, $query) выполняется успешно и результат записывается в звпрос, то 
	if ($result = mysqli_query($link, $query)) {  
		while ($row = mysqli_fetch_array($result)) {   //то разбираем результат и каждый следующий новый ряд из таблицы записываем в переменную $row
			$films[] = $row; //формируем наш массив films, 'наполняем' полученными данными добавляем каждый новый полученный ряд в массив films
		}
	}
	return $films;
}

function film_new($link, $title, $genre, $year, $description){

	//запись в БД 
	// формируем запрос, к-й отправляет полученные данные в БД
	//$query = "INSERT INTO films ('title', 'genre', 'year')" VALUES ($_POST['title']); эта запись ненадежна по причине mysqli-инъекций, поэтому обрабатываем функцией mysqli_real_escape_string, которая экранирует все опасные символы:
	$query = "INSERT INTO films (title, genre, year, description) VALUES (
	'". mysqli_real_escape_string($link, $title) ."', 
	'". mysqli_real_escape_string($link, $genre) ."',
	'". mysqli_real_escape_string($link, $year) ."',
	'". mysqli_real_escape_string($link, $description) ."'
	)"; 
		//$result = mysqli_query($link, $query);

		// if (mysqli_query($link, $query)) { //выполняем запрос и проверяем, был ли запрос успешно выполнен (должно вернуть true)
		// 	$resultSuccess = "<p>Фильм добавлен!</p>";
		// } else {
		// 	$resultError = "<p>Что-то пошло не так.</p>";
		// }
	if (mysqli_query($link, $query)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

function get_film($link, $id) {
	// ПОЛУЧАЕМ ФИЛЬМ ИЗ БД
	//подготовили запрос
	$query = "SELECT * FROM films WHERE id = ' ". mysqli_real_escape_string($link, $id) . "' LIMIT 1 "; 


	//создаем пустой массив куда будем записывать полученные данные, наша таблица
	//$film = array();


	//выполняем этот запрос с помощью функции mysql_query() и записываем результат в переменную $result
	$result = mysqli_query($link, $query); //если результат положительный, то формируем массив с фильмами

	//выполняем ф-ю mysqli_fetch_array(result) - при каждом её вызове получает новую строчку из запроса к базе данных и возвращает её. если функция mysqli_query($link, $query) выполняется успешно и результат записывается в звпрос, то 
	if ($result = mysqli_query($link, $query)) {  
		//while ($row = mysqli_fetch_array($result)) {   //то разбираем результат и каждый следующий новый ряд из таблицы записываем в переменную $row
		//	$film[] = $row; //формируем наш массив films, 'наполняем' полученными данными добавляем каждый новый полученный ряд в массив films
		//}
		$film = mysqli_fetch_array($result);
	}

	return $film;
}

function film_update($link, $title, $genre, $year, $id, $description){ //при отправке файлов через форму они попадают во врем.директ-ю на сервере, инфо об отправленных файлах содержится в глобальном массиве $_FILES, получаем его данные:
	echo "<pre>";
	print_r($_FILES);
	echo "</pre>";
	

	//проверяем, если у картинки есть времм.адрес (т.е. была загружена и размещена), то обрабатываем картинку (уменьшаем и размещаем)..; записываем данные мссива в переменные:
	if (isset($_FILES['photo']['name']) && $_FILES['photo']['tmp_name'] !="") {
		//создаем переменную, куда запишем имя картинки
		$fileName = $_FILES['photo']['name'];
		//создаем переменную, куда запишем временное хранилище, путь к файлу
		$fileTmpLoc = $_FILES['photo']['tmp_name'];
		//создаем переменную, куда запишем тип файла
		$fileType = $_FILES['photo']['type'];
		//создаем переменную, куда запишем размер файла
		$fileSize = $_FILES['photo']['size'];
		//создаем переменную, куда запишем ошибки
		$fileErrorMsg = $_FILES['photo']['error'];
		//получим расширение файла
		$kaboom = explode(".", $fileName);
		$fileExt = end($kaboom);
		//проверяем, что действительно изображение (проверим ширину и высоту) и обладает размерами
		list($width, $height) = getimagesize($fileTmpLoc);
		if ($width < 10 || $height < 10) {
			$errors[] = "Ошибка, попробуйте загрузить другое изображение.";
		}

		//создаем рандомные имена файлов, чтобы не было возможности повторений при зарузке
		$db_file_name = rand(10000000, 99999999) . "." . $fileExt;

		//проверяем на соответствие размерному лимиту и неободимому расширению, а также на наличие ошибок при загрузке
		if($fileSize > 10485760) {
			$errors[] = 'Your image file was larger than 10mb';
		} else if (!preg_match("/\.(gif|jpg|png|jpeg)$/i", $fileName) ) {
			$errors[] = 'Your image file was not jpg, jpeg, gif or png type';
		} else if ($fileErrorMsg == 1) {
			$errors[] = 'An unknown error occurred';
		}

		//кроме имен также будем прописывать путь к файлу, создаемпеременную (массив)
		//$photoFolderLoc = ROOT . 'data/films/';
		$photoFolderLocation = ROOT . 'data/films/full/';
		$photoFolderLocationMin = ROOT . 'data/films/min/';

		//далее перемещаем файл в нужную нам директорию

		$uploadfile = $photoFolderLocation . $db_file_name; //создаем переменную с полым путем к изображению

		$moveResult = move_uploaded_file($fileTmpLoc, $uploadfile); //перемещаем

		if ($moveResult != true) {
			$errors[] = "Ошибка перемещения!";
		}
		//код, который будет сжимать нашу картинку и делать из нее миниатюру
		require_once( ROOT . "/functions/image_resize_imagick.php"); //путь к функции

		$target_file =  $photoFolderLocation . $db_file_name; //путь для сохранения обрезанной картинки

		$resized_file = $photoFolderLocationMin . $db_file_name; //имя измененной картинки

		//параметры обрезки
		$wmax = 137;
		$hmax = 200;

		//сохраняем
		$img = createThumbnail($target_file, $wmax, $hmax);
		$img->writeImage($resized_file);  //создается готовый измененный файл

	}

	$query = "UPDATE films SET 
	title = '". mysqli_real_escape_string($link, $title) ."', 
	genre = '". mysqli_real_escape_string($link, $genre) ."', 
	year = '". mysqli_real_escape_string($link, $year) ."',
	description = '". mysqli_real_escape_string($link, $description) ."',
	photo = '". mysqli_real_escape_string($link, $db_file_name) ."'
	WHERE id = ". mysqli_real_escape_string($link, $id)." LIMIT 1";

	if (mysqli_query($link, $query)) { //выполняем запрос и проверяем, был ли запрос успешно выполнен (должно вернуть true)
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

function film_delete($link, $id){
	$query = "DELETE FROM films WHERE id = ' " . mysqli_real_escape_string($link, $id) . "' LIMIT 1";

	mysqli_query($link, $query);

	if (mysqli_affected_rows($link) > 0) {
		$result = true;
	} else {
		$result = false;
	}

	return $result;
}



?>