<?php
require_once __DIR__ . '/../../prime.php';
require_once __DIR__ . '/../../session_redirect.php';


if (isset($_SESSION['usersInfo'])) {
	$id = $_SESSION['usersInfo']->id;
}
// for testing only. will remove once we have layout setup correctly

// var_dump($_POST);
// // Declare an empty errors array to push message into.
// $errors = [];

// if (!empty($_FILES) && isset($_POST))
// {
	// if (Input::get('title', '') != ''
	//  && Input::get('available', '') != ''
	//  && Input::get('description', '') != ''
	//  && Input::get('image', '') != ''
	//  && Input::get('user_id', '') != '' ) // ending of if
	// {

var_dump($_POST);
var_dump($_FILES);
if (!empty($_FILES)) {
	$fileName = '/img/user_images/' . $_FILES['image']['name'] ? ('/img/user_images/' . $_FILES['image']['name']) : null;
}
	if (!empty($_FILES) && isset($_POST)) {
		// create a new Ad instance to prepare inserting data
		$testAd = new Ad();

		$title = Input::get('title');
		$available = Input::get('available');
		$description = Input::get('description');

		// Ask about the date format and the MySQL format timezone
		$date_posted = (new DateTime('now'))->format("Y-m-d H:i:s");
		var_dump($date_posted);

		// hard coded user_id to get the insert to work
		$user_id = $id;
		$category = Input::get('category');

		$image = $fileName;

		$testAd->title = $title;
		$testAd->available = $available;
		$testAd->description = $description;
		$testAd->date_posted = $date_posted;
		$testAd->category = $category;
		$testAd->image = isset($image) ? $image : null;
		$testAd->user_id = $user_id;

		$testAd->save();
}
// if(isset($_POST)) {
// 	$dateAsOfPost = $_POST['date_created'];
// }
?>
<?php require_once __DIR__ .'/../../views/partials/header.php';  ?>

	<form action="" method="post" enctype="multipart/form-data">
		<div class="">
			<label for="title">Title: </label>
			<input type="text" name="title" id="title">
		</div>
		<div class="">
			<label for="category">Category of Item</label>
			<select name="category" id="category">
				<option value="skateboard">Skateboard</option>
				<option value="wheels">Wheels</option>
				<option value="accessories">Accessories</option>
				<option value="other">Other: </option>
			</select>
		</div>
	<div class="">
		<label for="description">Description of Item: </label>
		<textarea name="description" id="description" cols="30" rows="10"></textarea>
	</div>

		<label for="image">Upload an Image</label>
		<input type="file" name="image" id="image">

		<button type="submit">Submit Item</button>
	</form>

