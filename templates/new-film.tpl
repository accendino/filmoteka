<!-- <h1 class="title-1">Добавить новый фильм</h1> -->

<div class="panel-holder mt-30 mb-100">
	<div class="title-4 mt-0">Добавить фильм</div>
	<form action="new.php" method="POST">

		<!-- делаем проверку - если массив с ошибками НЕ пустой(!) то будем выводить каждую ошибку через .errors -->
		<?php 

		if ( !empty($errors)) {
			foreach ($errors as $key => $value) {
				echo "<div class='error'>$value</div>";
			}
		}
		?>
		
		<!-- <div class="error">Название фильма не может быть пустым.</div> -->
		<label class="label-title">Название фильма</label>
		<input class="input" type="text" placeholder="название.." name="title"/>
		<div class="row">
			<div class="col">
				<label class="label-title">Жанр</label>
				<input class="input" type="text" placeholder="жанр.." name="genre"/>
			</div>
			<div class="col">
				<label class="label-title">Год</label>
				<input class="input" type="text" placeholder="год.." name="year"/>
			</div>
		</div>

		<textarea class="textarea mb-20" name="description" placeholder="Оставьте описание.."></textarea>

		<div class="mb-20">
			<input type="file" name="photo"/>
		</div>

		<input type="submit" class="button" value="Добавить" name="add-film">
	</form>
</div>
</div>
