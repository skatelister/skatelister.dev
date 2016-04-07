<?php
require_once __DIR__ . '/../../prime.php';
require_once __DIR__ . '/../../session_redirect.php';

$id = $_SESSION['user_info']->id;

if (!empty($_FILES)) {
	$fileName = '/img/user_images/' . $_FILES['image']['name'] ? ('/img/user_images/' . $_FILES['image']['name']) : null;
}

if (!empty($_FILES)
{
	$testAd = new Ad();
	$title = 
	$description = 
	$date_posted = 
	$user_id = $id;
	$category = Input::escape('category');
	$image = $fileName;


	$testAd->title = Input::escape('title');
	$testAd->description = Input::get('description');
	$testAd->date_posted = new DateTime('now'))->format("Y-m-d H:i:s");
	$testAd->category = $category;
	$testAd->image = $image;
	$testAd->user_id = $user_id;
	$testAd->views = 0;
	$testAd->save();

	if(isset($_POST['adCreate']) ) {
		header('Location: /user/show');
	}
}

?>
<?php require_once __DIR__ .'/../../views/partials/header.php';  ?>

	<div class="container-fluid adCreateForm">
		<form action="" method="post" enctype="multipart/form-data" class="">

			<div class="form-group">
				<label for="title">Title: </label>
				<input type="text" name="title" id="title" class="form-control">
			</div>

			<div class="form-group">
				<label for="category">Category of Item</label>
				<select name="category" id="category" class="form-control">
					<option value="skateboard">Skateboard</option>
					<option value="wheels">Wheels</option>
					<option value="accessories">Accessories</option>
					<option value="other">Other: </option>
				</select>
			</div>

			<div class="form-group">
				<label for="description">Description of Item: </label>
				<textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
			</div>

			<div class="form-group">
				<label for="image">Upload an Image</label>
				<input type="file" name="image" id="image" class="form-control">
			</div>

			<button name="adCreate" type="submit btn btn-primary">Submit Item</button>
		</form>
	</div>
