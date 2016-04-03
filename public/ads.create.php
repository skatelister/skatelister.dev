<?php 

// for testing only. will remove once we have layout setup correctly
require_once '../skateConfig.php';
require_once '../models/Ad.php';
require_once '../utils/Input.php';
require_once 'uploadFile.php';

var_dump($_FILES);
if (!empty($_FILES)) {
	$fileName = '/img/user_images/' . $_FILES['image']['name'] ? ('/img/user_images/' . $_FILES['image']['name']) : null;
}
$errors = [];

if (!empty($_FILES) && isset($_POST)) 
	{
		if (Input::get('title', '') != ''
			&& Input::get('available', '') != ''
			&& Input::get('description', '') != ''
			&& Input::get('date_posted', '') != ''
			&& Input::get('image', '') != ''
			&& Input::get('user_id', '') != ''
		   )
		
		try {
			$title = Input::get('title');
		} catch (PDOException $e) {
			$errors[] = $e->getMessage();
		}

		try {
			$available = Input::get('available');
		} catch (PDOException $e) {
			$errors[] = $e->getMessage();
		}
		
		try {
			$date_posted = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $date_posted)));
			$date_posted = Input::get('date_posted');
		} catch (PDOException $e) {
			$errors[] = $e->getMessage();
		}

		try {
			$category = Input::get('category');
		} catch (PDOException $e) {
			$errors[] = $e->getMessage();
		}

		try {
			$image = $fileName;
		} catch (PDOException $e) {
			$errors[] = $e->getMessage();
		}


	
	
	

	
	
	$user_id = 3;

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

	<input type="hidden" name="date_created" id="date_created" value="<?=date('Y-m-d h:i:s');?>">
	
	<input type="hidden" name="available" id="available" value="1">


	<button type="submit">Submit Item</button>

</form>