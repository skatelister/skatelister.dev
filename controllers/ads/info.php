<?php

require_once __DIR__ . '/../../prime.php';

$this_ad = Input::get('ad');
$single_ad = Ad::find_current_ad($this_ad);
$id = $single_ad->id;
$views = $single_ad->views + 1;
Ad::update_views($id, $views);

?>


<?php if(Input::has('ad')): ?>
<?php require_once __DIR__ . '/../../views/partials/header.php'; ?>

	<div class="basicAdBlock">
		<img src="<?= $single_ad->image;?>" alt="this is an ad item">
		<p><?= $single_ad->title;?></p>
		<p><?= $single_ad->description; ?></p>
	</div>


<?php require_once __DIR__ . '/../../views/partials/footer.php'; ?>
<?php else: ?>

	<?php header('Location: /'); ?>
	<?php die(); ?>

<?php endif; ?>
