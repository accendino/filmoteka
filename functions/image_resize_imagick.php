<?php 

function createThumbnail($imagePath, $cropWidth = 100, $cropHeight = 100){ //ф-я кот-я созд-т миниатюру

	/* Чтение изображения */
	$imagick = new Imagick($imagePath); //в переменную создаем новый объект класса Imagick(библиотека в php, чтобы работать с картинками)

	//записываем ширину и высоту, которую получили
	$width = $imagick->getImageWidth();
	$height = $imagick->getImageHeight();

	// Изменение размера
	// if ( $width > $height ) {
	// 	$imagick->thumbnailImage(0, $cropHeight); //то обрезаем по ширине
	// } else {
	// 	$imagick->thumbnailImage($cropWidth, 0);
	// }
	//изменяем размер по четко заданной ширине и высоте (вместо условий выше)
	$imagick->thumbnailImage($cropWidth, $cropHeight);


	// Определяем размеры полученной миниатюры
	$width = $imagick->getImageWidth();
	$height = $imagick->getImageHeight();

	// Определяем центр изображения
	$centreX = round($width / 2); // 300
	$centreY = round($height / 2); // 150

	// Определяем точку для обрезки по центру 
	$cropWidthHalf  = round($cropWidth / 2);
	$cropHeightHalf = round($cropHeight / 2);
	
	// Координаты для старта отбрезки
	$startX = max(0, $centreX - $cropWidthHalf);
	$startY = max(0, $centreY - $cropHeightHalf);

	$imagick->cropImage($cropWidth, $cropHeight, $startX, $startY);

	// Возвращаем готовое изображение
	return $imagick;
}

/* 

Usage Example

// Define full path to the image
$imagePath = 'D:\OpenServer\domains\php-school-all\php-imagick\flat.jpg';

// or with ROOT constant
define('ROOT', dirname(__FILE__).'/');
$imagePath = ROOT . 'flat.jpg';

$img = createThumbnail($imagePath);
header('Content-type: image/jpeg');
echo $img;

*/

?>