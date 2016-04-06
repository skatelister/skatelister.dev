<?php
require_once __DIR__ . '/../../prime.php';
require_once __DIR__ . '/../../session_redirect.php';


if (isset($_SESSION['usersInfo'])) {
	$id = $_SESSION['usersInfo']->id;
	echo 'hello';
}

var_dump($id);

// var_dump($_SESSION);
// var_dump($_POST);
// var_dump($_FILES);
if (!empty($_FILES)) {
	$fileName = '/img/user_images/' . $_FILES['image']['name'] ? ('/img/user_images/' . $_FILES['image']['name']) : null;
	var_dump($_FILES);
}
	if (!empty($_FILES) && isset($_POST)) {
		// create a new Ad instance to prepare inserting data
		$testAd = new Ad();
		var_dump($testAd);
		$title = Input::get('title');
		$description = Input::get('description');
		$date_posted = (new DateTime('now'))->format("Y-m-d H:i:s");
		$user_id = $id;
		$category = Input::get('category');
		$image = $fileName;


		$testAd->title = $title;
		$testAd->description = $description;
		$testAd->date_posted = $date_posted;
		$testAd->category = $category;
		$testAd->image = $image;
		$testAd->user_id = $user_id;
		$testAd->views = 0;
		$testAd->save();

		if(isset($_POST['adCreate'])) {
			header('Location: /ads/show');
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

