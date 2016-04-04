<?php
switch($_SERVER['REQUEST_URI']) {

	case '/' :
		require '../controllers/home.php';
	break;

	case '/signin' :
		require '../controllers/signin.php';
	break;

	case '/user/create' :
		require '../controllers/users/create.php';
	break;

	case '/user/edit' :
		require '/controllers/users/edit.php';
	break;

	case '/user/profile' :
		require '/controllers/users/edit.php';
	break;

	default :
		require '../controllers/home.php';

}
