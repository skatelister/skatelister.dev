<?php
require_once '../skateConfig.php';
require_once 'db_connect.php';
require_once '../models/Ad.php';



$statement = $dbc->prepare('INSERT INTO users(first_name, last_name, email, password)
VALUES (:first_name,:last_name,:email,:password)');


$users = [

	['Tomas', 'Leffew', 'tleffew1994@gmail.com', 'password'],

	['CJ', 'Sampson', 'cjsampson@gmail.com', 'password'],

	['Don', 'Moore', 'donmoore@gmail.com', 'password'],

	['Richard', 'Delosantos', 'richardd@gmail.com', 'password'],

	['Steven', 'Henderson', 'stevenhenderson@gmail.com', 'password']

];

foreach ($users as $user) {
    $password = password_hash($user[3],PASSWORD_DEFAULT);
    $statement->bindValue(':first_name', $user[0], PDO::PARAM_STR);
    $statement->bindValue(':last_name', $user[1], PDO::PARAM_STR);
    $statement->bindValue(':email', $user[2], PDO::PARAM_STR);
    $statement->bindValue(':password',$password, PDO::PARAM_STR);

    $statement->execute();
}





$statement = $dbc->prepare("INSERT INTO items(title, available, date_posted, category, description, image, user_id)
							VALUES( :title, :available, :date_posted, :category, :description, :image, :user_id)");

$items = [
	["Selling my favorite skateboard $100", 1, "2016-04-03 12:00:53", "skateboard", "I don't want to sale her but I have to get some quick cash.  Will go fast!", "/img/user_images/skateboard1.jpg", 1],

	["Selling my favorite skateboard $100", 1, "2016-04-03 12:00:53", "skateboard", "I don't want to sale her but I have to get some quick cash.  Will go fast!", "/img/user_images/skateboard1.jpg", 1],

	["Selling my favorite skateboard $100", 1, "2016-04-03 12:00:53", "skateboard", "I don't want to sale her but I have to get some quick cash.  Will go fast!", "/img/user_images/skateboard1.jpg", 1],

	["Selling my favorite skateboard $100", 1, "2016-04-03 12:00:53", "skateboard", "I don't want to sale her but I have to get some quick cash.  Will go fast!", "/img/user_images/skateboard1.jpg", 1],

	["Selling my favorite skateboard $100", 1, "2016-04-03 12:00:53", "skateboard", "I don't want to sale her but I have to get some quick cash.  Will go fast!", "/img/user_images/skateboard1.jpg", 1],

	["Selling my favorite skateboard $100", 1, "2016-04-03 12:00:53", "skateboard", "I don't want to sale her but I have to get some quick cash.  Will go fast!", "/img/user_images/skateboard1.jpg", 1],

	["Selling my favorite skateboard $100", 1, "2016-04-03 12:00:53", "skateboard", "I don't want to sale her but I have to get some quick cash.  Will go fast!", "/img/user_images/skateboard1.jpg", 1],

	['I have some wheels that I am trying to get rid of $50', 1, '2016-04-06 07:55:23', 'wheels', "I don't want to sale her but I have to get some quick cash.  Will go fast!", '/img/user_images/wheels1.jpg', 2],

	['Selling my favorite skateboard $100', 1, '2016-04-04 09:11:34', 'skateboard', "I got this skateboard from one of my friends and I don't use it!", '/img/user_images/skateboard2.jpg', 2],

	["Trucks and wheels. Like NEW. $80", 1, "2016-04-07 23:11:34", "accessories", "I have an awesome skateboard accessories pack that has never been used. Text or call if you're interested 850-936-5503!", '/img/user_images/accessories1.jpg', 4],

	['Sweet skateboard wheels for sale! $30', 1, '2016-04-03 02:11:34', 'wheels', "I don't want to sale her but I have to get some quick cash.  Will go fast!", '/img/user_images/wheels2.jpg', 4],

	['Used wheels for sale.  Only $19.00', 1, '2016-04-05 03:30:30', 'wheels', "Awesome wheels for cheap! Text me at 210-992-8823", '/img/user_images/wheel3.jpg', 3],

	['GLOW IN THE DARK WHEELS', 1, '2016-04-06 04:11:30', 'wheels', "Glow in the dark wheels that are easy install!  Only $45.99", '/img/user_images/wheels4.jpg', 5],

	['Helmet and pads for $35.00', 1, '2016-04-04 02:41:34', 'accessories', "I have a used set of pads and a perfectly good helmet for cheap!", '/img/user_images/accessories2.jpg', 3],

	['Skull Door Hanger',1 , '2016-03-15 22:11:34', 'accessories', "I make these little door hangars.  Cool little skull on them!  Only $10.99. Call me, 850-440-2343", '/img/user_images/accessories3.jpg', 2],

	['Saling my purple trucks. $55', 1, '2016-03-30 10:11:55', 'accessories', "I have some easy to install trucks that I'm trying to sale!  Text me at 894-444-4235", '/img/user_images/accessories4.jpg', 1],

	['Americana skateboard deck.', 1, '2016-03-05 07:11:34', 'skateboard', "I have this awesome American deck skateboard that I would like to sale.  Kind of hard for me to sale but I don't use anymore.  Email me at theBettieWhite@didyouseethis.com!", '/img/user_images/skateboard3.jpg', 4],

	['Custom skateboard!', 1, '2016-04-07 11:23:44', 'skateboard', "I have this custom skateboard that I'm trying to get rid of.  Call me up at 678-413-2222 if you're interested", '/img/user_images/skateboard4.jpg', 1],

	['Like new Black and Teal Trucks FOR SALE!', 1, '2016-03-29 11:23:44', 'accessories', "I am trying to get rid of these trucks that I never use. I'm willing to part ways with them for around $80/OBO!  Please contact me at 850-938-5443", '/img/user_images/accessories5.jpg', 2],

	['Weird art design skateboard trucks for sale.', 1, '2016-04-06 12:30:44', 'accessories', "I have some really cool trucks that I would like to sale to anyone that appreciates good artwork.  I found these at a flea market one day and I never use them.  Willing to part ways with them for $55", '/img/user_images/accessories6.jpg', 2],

	['Very FAST Multi-colored skateboard FOR SALE!', 1, '2016-04-06 11:11:11', 'skateboard',"I have a sweet skateboard that is like new.  I never use it so I would like someone else to get more use out of it that myself.  $75 | OBO.", '/img/user_images/skateboard5.jpg', 4],

	['Custom skateboard!', 1, '2016-04-06 11:23:44', 'skateboard', "I have this custom skateboard that I'm trying to get rid of.  Call me up at 678-413-2222 if you're interested", '/img/user_images/accessories7.jpg', 4],

	['Custom skateboard!', 1, '2016-04-06 11:23:44', 'skateboard', "I have this custom skateboard that I'm trying to get rid of.  Call me up at 678-413-2222 if you're interested", '/img/user_images/accessories8.jpg', 4],

	['Custom skateboard!', 1, '2016-04-06 11:23:44', 'skateboard', "I have this custom skateboard that I'm trying to get rid of.  Call me up at 678-413-2222 if you're interested", '/img/user_images/skateboard6.jpg', 1],

	['Custom skateboard!', 1, '2016-04-06 11:23:44', 'skateboard', "I have this custom skateboard that I'm trying to get rid of.  Call me up at 678-413-2222 if you're interested", '/img/user_images/skateboard7.jpg', 1],

	['Custom skateboard!', 1, '2016-04-06 11:23:44', 'skateboard', "I have this custom skateboard that I'm trying to get rid of.  Call me up at 678-413-2222 if you're interested", '/img/user_images/wheels5.jpg', 2],

	['Custom skateboard!', 1, '2016-04-06 11:23:44', 'skateboard', "I have this custom skateboard that I'm trying to get rid of.  Call me up at 678-413-2222 if you're interested", '/img/user_images/wheels6.jpg', 2],

	['Custom skateboard!', 1, '2016-04-06 11:23:44', 'skateboard', "I have this custom skateboard that I'm trying to get rid of.  Call me up at 678-413-2222 if you're interested", '/img/user_images/skateboard4.jpg', 3],

	['Custom skateboard!', 1, '2016-04-06 11:23:44', 'skateboard', "I have this custom skateboard that I'm trying to get rid of.  Call me up at 678-413-2222 if you're interested", '/img/user_images/skateboard4.jpg', 5],
];

foreach($items as $item) {


	$statement->bindValue(':title', $item[0], PDO::PARAM_STR);
    $statement->bindValue(':available', $item[1], PDO::PARAM_INT);
    $statement->bindValue(':date_posted', $item[2], PDO::PARAM_STR);
    $statement->bindValue(':category', $item[3], PDO::PARAM_STR);
    $statement->bindValue(':description', $item[4], PDO::PARAM_STR);
    $statement->bindValue(':image', $item[5], PDO::PARAM_STR);
    $statement->bindValue(':user_id',$item[6], PDO::PARAM_INT);
	
    $statement->execute();

	// // $date = date("Y-m-d H:i:s",strtotime(str_replace('/','-',$item[2])));
	// $date_posted = strtotime('now');
	// $date_posted = gmdate("Y-m-d H:i:s",$date_posted);

	// 	$testAd = new Ad();
	// 	$testAd->title = $item[0];
	// 	$testAd->available = $item[1];
	// 	$testAd->date_posted = $date_posted;
	// 	$testAd->category = $item[3];
	// 	$testAd->description = $item[4];
	// 	$testAd->image = $item[5];
	// 	$testAd->user_id = $item[6];

	// 	$testAd->save();



}

?>
