<?php if ($model['images']->count()):  ?>
		<form method="GET">
		<?php foreach($images as $image): ?>
			<div class="photo">
			<input type="checkbox" name="images[]" value="<?=$image['_id']?>" <?php if(isset($_SESSION['images'])&&in_array($image['_id'], $_SESSION['images'])):?> checked <?php endif ?> />
			<a href="image_view?id=<?=$image['_id']?>">
				<p><img src="<?=$image['miniature'] ?>" alt="ups"/></p>
				<br>
				<p>Tytuł: <?=$image['title']?></p>
				<br>
				<p>Autor: <?=$image['author']?></p>
				<?php if($image['access']=='private'): ?>
					<p>Zdjęcie prywatne</p>
				<?php endif ?>
				</div>
			</a>
		<?php endforeach?>
		<input type="submit" value="Zapamiętaj wybrane"/>
		</form>
	<?php endif?>