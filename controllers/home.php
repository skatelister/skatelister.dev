<?php
require_once '../prime.php';

session_start();

$newAds = Ad::showNewest();
?>

<?php require_once '../views/partials/header.php'; ?>

	<div class="container-fluid">
		<div class="row">

			<div class="col-md-3">
				<section class="sidebar col-md-10 col-md-offset-1">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex earum nisi repellat dicta vitae aspernatur quod quis error corrupti, corporis blanditiis cum excepturi voluptate qui odit rerum inventore eveniet sapiente! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi pariatur veniam similique officiis aliquam, voluptate ducimus, officia error provident, quia fugiat et reprehenderit earum itaque. Deleniti necessitatibus inventore molestiae sapiente! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia quasi necessitatibus voluptatem, adipisci, fuga expedita atque dolore. Veniam dolore, omnis, sit expedita sint hic neque ea quae, quia ullam dolores. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi quas molestias id ipsam tempora, magnam vero nesciunt qui delectus dolorum incidunt dolor officiis dicta, ipsum harum! Quod dolorum, ipsum pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur iusto facere alias ut magni dicta aut quo, officia minus esse facilis unde? Eum quasi blanditiis reiciendis, aliquid quas, porro eius.</p>
				</section> <!-- .sidebar -->
			</div>

			<section class="col-md-8 missionStatement">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex earum nisi repellat dicta vitae aspernatur quod quis error corrupti, corporis blanditiis cum excepturi voluptate qui odit rerum inventore eveniet sapiente! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi pariatur veniam similique officiis aliquam, voluptate ducimus, officia error provident, quia fugiat et reprehenderit earum itaque. Deleniti necessitatibus inventore molestiae sapiente! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia quasi necessitatibus voluptatem, adipisci, fuga expedita atque dolore. Veniam dolore, omnis, sit expedita sint hic neque ea quae, quia ullam dolores. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi quas molestias id ipsam tempora, magnam vero nesciunt qui delectus dolorum incidunt dolor officiis dicta, ipsum harum! Quod dolorum, ipsum pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur iusto facere alias ut magni dicta aut quo, officia minus esse facilis unde? Eum quasi blanditiis reiciendis, aliquid quas, porro eius.</p>
			</section>

		</div> <!-- .row -->
	</div> <!-- .col-md-3 -->


		<div class="row extra-cushion">
				<h2 id="brandNewTitle">Brand New Items for Discount!</h2>
		</div> <!-- .row extra-cushion -->

		<!-- <div class="row"> -->
			<!-- <div class="col-md-8 col-md-2 offset"> - -->
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-8">
					<?php foreach($newAds as $key => $newAd): ?>
						<div class="individualPictureHome col-md-6">
							<a href="/ads/info?ad=<?=$newAd['id'];?>"><img class="img-thumbnail indexPicture" src="<?=$newAd['image'];?>" alt="test"></a>
							<p id="imageTitle"><?=$newAd['title'];?></p>
						</div>
					<?php endforeach; ?>
				</div> <!-- .col-md-8 -->
			</div>





<?php require_once '../views/partials/footer.php'; ?>
