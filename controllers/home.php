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
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex earum nisi repellat dicta vitae aspernatur quod quis error corrupti, corporis blanditiis cum excepturi voluptate qui odit rerum inventore eveniet sapiente! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi pariatur veniam similique officiis aliquam, voluptate ducimus, officia error provident, quia fugiat et reprehenderit earum itaque. Deleniti necessitatibus inventore molestiae sapiente!</p>
				</section> <!-- .sidebar -->
			</div>

			<section class="col-md-8 missionStatement">
				<p>Are you sick of browsing craiglist for endless hours, or going to the mall just to walk out empty handed as they did not have the deck that you wanted???? Well now all that will change, we have endless amounts of skate gear for trade/sale that people around you are trying to get rid of. Come browse our site and find something you might like.</p>
			</section>

		</div> <!-- .row -->
	</div> <!-- .col-md-3 -->


		<div class="row extra-cushion">
				<h2 id="brandNewTitle">Two Guys Selling Skateboard STUFF!</h2>
		</div> <!-- .row extra-cushion -->

		<!-- <div class="row"> -->
			<!-- <div class="col-md-8 col-md-2 offset"> - -->



		<div class="row text-center">

				   <?php foreach($newAds as $key => $newAd): ?>
					   <div class="col-md-6 col-sm-12 hero-feature">
						   <div class="thumbnail">
 						  		<img class="img-thumbnail indexPicture" src="<?=$newAd['image'];?>" alt="test">
 						  		<div class="caption">
 						  			<p id="imageTitle"><?=$newAd['title'];?></p>
									<p class="btn btn-primary"><a href="/ads/info?ad=<?=$newAd['id'];?>">See More</a>
 					  			</div>
				  			</div>
			  			</div>
			  			<?php if(($key + 1) % 2 == 0): ?>
			  				<hr>
			  			<?php endif; ?>
 				  <?php endforeach; ?>
		   </div>


<?php require_once '../views/partials/footer.php'; ?>
