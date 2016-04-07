<?php
require_once __DIR__ . '/../../prime.php';
require_once __DIR__ . '/../../session_redirect.php';

$id = $_SESSION['usersInfo']->id;

if (!empty($_FILES)) {
	$fileName = '/img/user_images/' . $_FILES['image']['name'] ? ('/img/user_images/' . $_FILES['image']['name']) : null;
}

if (!empty($_FILES)
  && Input::get_string('title')
  && Input::get_string('description')
  && Input::get_string('category')) {
		// create a new Ad instance to prepare inserting data
	var_dump($_FILES);
	var_dump('test');
	$testAd = new Ad();
	$title = Input::escape('title');
	$description = Input::escape('description');
	$date_posted = (new DateTime('now'))->format("Y-m-d H:i:s");
	$user_id = $id;
	$category = Input::escape('category');
	$image = $fileName;


	$testAd->title = $title;
	$testAd->description = $description;
	$testAd->date_posted = $date_posted;
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
