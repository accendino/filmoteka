<?php 

function db_connect(){
	//$link = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB) or die("Error: " . mysqli_error($link)) ; //либо..

	// СОЕДИНЯЕМСЯ С БД
	$link = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);
	//делаем проверку на ошибки и прекращаем работу программы если true 
	if (mysqli_connect_error()) {
		die("Ошибка подключения к базе данных.");
	}

	if (!mysqli_set_charset($link, "utf8")){
		printf( "Error: " . mysqli_error($link) );
	}

	return $link;	

}



?>