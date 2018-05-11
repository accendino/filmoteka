<h1 class="title-1">Информация о фильме</h1>

<!-- в карточке с фильмом выводим инфо офильме ИЗ массива -->
<div class="card mb-20">
	<!-- рядддд -->
	<div class="row">
		<!-- первая колонка -->
		<div class="col">
			<img height="400" src="<?=HOST?>data/films/full/<?=$film['photo']?>" alt="<?=$film['title']?>">
		</div>
		<!-- //первая колонка -->

		<!-- вторая колонка -->
		<div class="col">
			<div class="card__header">
				<h4 class="title-4"><?=$film['title']?></h4> <!-- < ? @$films[0]['title']?> сокращенная запись(!) --> <!-- @ гасит ошибки -->
				<div>

					<?php 
						if (isset($_SESSION['user'])) {
							if ($_SESSION['user'] == 'admin') {
					?>
								<a href="edit.php?id=<?=$film['id']?>" class="button button--edit">Редактировать</a> <!-- !!! ссылка будет отправлять get-запрос, можно сослаться на какую-то страницу, а можно начать указывать параметр href с ? тогда вернет на ту же страницу -->

								<a href="index.php?action=delete&id=<?=$film['id']?>" class="button button--delete">Удалить</a> <!-- !!! ссылка будет отправлять get-запрос, можно сослаться на какую-то страницу, а можно начать указывать параметр href с ? тогда вернет на ту же страницу -->

					<?php 
							} 
						} 
					?>

				</div>				
			</div>

			<div class="badge"><?=$film['genre']?></div>
			<div class="badge"><?=$film['year']?></div>

			<div class="user-content">
				<p>
					<?=$film['description']?>
				</p>
			</div>
		</div>
		<!-- //вторая колонка -->
	</div>

</div>