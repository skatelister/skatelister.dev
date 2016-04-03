<?php 

// for testing only. will remove once we have layout setup correctly
require_once '../skateConfig.php';
require_once '../models/Ad.php';
require_once '../utils/Input.php';
require_once 'uploadFile.php';

session_start();

var_dump($_SESSION);
$id = $_SESSION['usersInfo']->id;
$test = new Ad();
var_dump($test-find(3));

// var_dump($_POST);
// // Declare an empty errors array to push message into.
// $errors = [];

// if (!empty($_FILES) && isset($_POST)) 
// {
	// if (Input::get('title', '') != ''
	//  && Input::get('available', '') != ''
	//  && Input::get('description', '') != ''
	//  && Input::get('date_posted', '') != ''
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
		$date_posted = Input::get('date_posted');
		$date_posted = strtotime('now');
		$date_posted = gmdate("Y-m-d H:i:s", $date_posted);

		// hard coded user_id to get the insert to work

		$category = Input::get('category');
		// this is the filename from the uploadFile.php
		$image = $fileName;

		// this is the current user's id
		$user_id = $_SESSION['usersInfo']->id;
		$testAd->title = $title;
		$testAd->available = $available;
		$testAd->description = $description;
		$testAd->date_posted = $date_posted;
		$testAd->category = $category;		
		$testAd->image = isset($image) ? $image : null;
		$testAd->user_id = $user_id;
		var_dump($testAd->attributes);
		$testAd->save();
}
// if(isset($_POST)) {
// 	$dateAsOfPost = $_POST['date_created'];
// }
?>

<form action="" method="post" enctype="multipart/form-data">

	<label for="title">Title: </label>
	<input type="text" name="title" id="title">

	<label for="category">Category of Item</label>
	<select name="category" id="category">
		<option value="skateboard">Skateboard</option>
		<option value="wheels">Wheels</option>
		<option value="accessories">Accessories</option>
		<option value="other">Other: </option>
	</select>	

	<label for="description">Description of Item: </label>
	<textarea name="description" id="description" cols="30" rows="10"></textarea>

	<label for="image">Upload an Image</label>
	<input type="file" name="image" id="image">

	<input type="hidden" name="date_created" id="date_created" value="<?= date('Y-m-d H:i:s');?>">
	
	<input type="hidden" name="available" id="available" value="1">


	<button type="submit">Submit Item</button>

</form>