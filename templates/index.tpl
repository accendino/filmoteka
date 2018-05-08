<h1 class="title-1"> Фильмотека</h1>

<!-- цикл, который обходит $films и по очереди выводит все данные -->
<?php
foreach ($films as $key => $film) {
	?>

	<!-- в карточке с фильмом выводим инфо офильме ИЗ массива -->
	<div class="card mb-20">
		<!-- рядд -->
		<div class="row">
			
			<!-- первая колонка -->
			<div class="col-auto">
				<img height="120" src="<?=HOST?>data/films/min/<?=$film['photo']?>" alt="<?=$film['title']?>">
			</div>
			<!-- //первая колонка -->
			
			
			<!-- вторая колонка -->
			<div class="col">
				<div class="card__header">
					<h4 class="title-4"><?=$film['title']?></h4> <!-- < ? @$films[0]['title']?> сокращенная запись(!) --> <!-- @ гасит ошибки -->
					<div>
						<a href="edit.php?id=<?=$film['id']?>" class="button button--edit">Редактировать</a> <!-- !!! ссылка будет отправлять get-запрос, можно сослаться на какую-то страницу, а можно начать указывать параметр href с ? тогда вернет на ту же страницу -->

						<a href="?action=delete&id=<?=$film['id']?>" class="button button--delete">Удалить</a> <!-- !!! ссылка будет отправлять get-запрос, можно сослаться на какую-то страницу, а можно начать указывать параметр href с ? тогда вернет на ту же страницу -->
					</div>
				</div>

				<div class="badge"><?=$film['genre']?></div>
				<div class="badge"><?=$film['year']?></div>

				<div class="mt-20">
					<a href="single.php?id=<?=$film['id']?>" class="button button--info">Подробнее</a>	
				</div>

			</div>
			<!-- //вторая колонка -->
		</div>
		<!-- //рядд -->
	</div>
	
	<?php } ?>