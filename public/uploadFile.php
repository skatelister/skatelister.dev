<?php

echo date('Y-m-d H:i:s');
echo 'uploadFile.php require_once works';
// $fileName = '/img/user_images/' . $_FILES['image']['name'];


$message = null;
if(!empty($_FILES))
{
$valid = true;
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
echo $message;