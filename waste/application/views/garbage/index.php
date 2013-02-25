<?php foreach ($garbage as $garbage_item): ?>

	<h2><?php echo $garbage_item['household_name'] ?></h2>
	<div id="main">
		<?php echo $garbage_item['text'] ?>
	</div>
	<p><a href="garbage/"<?php echo $garbage_item['slug'] ?> ">View Entry"</a></p>

<?php endforeach ?>