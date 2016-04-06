<?php

require_once __DIR__ . '/../../prime.php';

$thisAd = Input::get('ad');
$singleAd = Ad::find_current_ad($thisAd);
$singleAd->views++;
$singleAd->save();
var_dump($singleAd);
?>


<?php if(Input::has('ad')): ?>
<?php require_once __DIR__ . '/../../views/partials/header.php'; ?>
	
	<div class="basicAdBlock">
		<img src="<?= $singleAd->image;?>" alt="this is an ad item">
		<p><?= $singleAd->title;?></p>
		<p><?= $singleAd->description; ?></p>
	</div>
	

<?php require_once __DIR__ . '/../../views/partials/footer.php'; ?>
<?php else: ?>

	<?php header('Location: /'); ?>
	<?php die(); ?>

<?php endif; ?>
