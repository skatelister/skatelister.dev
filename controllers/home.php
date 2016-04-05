<?php
require_once '../prime.php';

session_start();

$newAds = Ad::showNewest();
?>

<?php require_once '../views/partials/header.php'; ?>

	<div class="container">
		<div class="row">

			<?php foreach($newAds as $newAd): ?>
				<div class="col-md-6">
					<img class="img-thumbnail indexPicture col-md-3" src="<?=$newAd['image'];?>" alt="test">
					<p><?=$newAd['title'];?></p>
				</div>
			<?php endforeach; ?>

		</div>
	</div>


<?php require_once '../views/partials/footer.php'; ?>
