<?php 



// for testing only. will remove once we have layout setup correctly
require_once  '../skateConfig.php';
require_once '../models/Ad.php';

$ad = new Ad();

var_dump($ad->find(2));

// var_dump($_FILES);
// var_dump($_POST); 
// $test = new Ad();
// $fileName = '/img/user_images/' . $_FILES['image']['name'];
// $test->image = $fileName;
// echo $fileName . PHP_EOL;



$message = null;
$valid = true;
if(!empty($_FILES))
{
	if($_FILES['image']['name']) 
	{
		if(!$_FILES['image']['error'])
		{	
			$tempFile = $_FILES['image']['tmp_name'];
			$extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

			// Validate Size and Extension
			if( $_FILES['image']['size'] > (1024000000))
			{
				$valid = false;
				$message = 'Image size too large. Please resize or choose new image';
			}
			if( $extension != 'jpg' && $extension != 'jpeg' && $extension != 'png' && $extension != 'gif')
			{
				$valid  = false;
				$message = 'Invalid extension type';
			}
			// If Image file makes it to this point, send file to this directory
			if($valid)
			{
				move_uploaded_file($tempFile, __DIR__ .'/img/user_images/' . $_FILES['image']['name']);
				$message = 'Your image was successfully uploaded!';
			} else {
				$message = 'Error on image upload.';
			}
		}
	}
}
// echo $message;

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