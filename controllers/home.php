<?php
require_once '../prime.php';

session_start();

$newAds = Ad::showNewest();
?>

<?php require_once '../views/partials/header.php'; ?>

	<div class="container-fluid">
		<div class="row">
				<section class="sidebar col-md-offset-2 col-md-3">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex earum nisi repellat dicta vitae aspernatur quod quis error corrupti, corporis blanditiis cum excepturi voluptate qui odit rerum inventore eveniet sapiente! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi pariatur veniam similique officiis aliquam, voluptate ducimus, officia error provident, quia fugiat et reprehenderit earum itaque. Deleniti necessitatibus inventore molestiae sapiente! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia quasi necessitatibus voluptatem, adipisci, fuga expedita atque dolore. Veniam dolore, omnis, sit expedita sint hic neque ea quae, quia ullam dolores. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi quas molestias id ipsam tempora, magnam vero nesciunt qui delectus dolorum incidunt dolor officiis dicta, ipsum harum! Quod dolorum, ipsum pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur iusto facere alias ut magni dicta aut quo, officia minus esse facilis unde? Eum quasi blanditiis reiciendis, aliquid quas, porro eius.</p>
				</section> <!-- .sidebar -->

		
			<section class="col-md-7 missionStatement">
				<p>SkateLister.  Stop rummaging through Craigslist to find your perfect Skate items.  We verify all of our ads and take out the security risk from UNKNOWN POSTERS! </p>
			</section>
		
		</div> <!-- .row -->
	</div> <!-- .col-md-3 -->
		



		<div class="row extra-cushion">
			<h2 id="brandNewTitle">Brand New Items for Discount!</h2>

			<?php foreach($newAds as $key => $newAd): ?>
				<div class="col-md-6">
					<img class="img-thumbnail indexPicture" src="<?=$newAd['image'];?>" alt="test">
					<p id="imageTitle"><?=$newAd['title'];?></p>
				</div>
				<?php if(($key + 1) % 2 == 0) : ?>
				</div>
				<div class="row extra-cushion">
				<?php endif; ?>
			<?php endforeach; ?>

		</div> <!-- .row extra-cushion -->



<?php require_once '../views/partials/footer.php'; ?>
