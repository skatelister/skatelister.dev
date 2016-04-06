<?php
switch(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) {

	case '/' :
		require '../controllers/home.php';
	break;

	case '/signin' :
		require '../controllers/register.php';
	break;

	case '/register' :
		require '../controllers/register.php';
	break;

	case '/signout' :
		require '../controllers/signout.php';
	break;

	case '/user/create' :
		require '../controllers/users/create.php';
	break;

	case '/user/edit' :
		require '../controllers/users/edit.php';
	break;

	case '/user/profile' :
		require '../controllers/users/profile.php';
	break;

	case '/user/show' :
		require '../controllers/users/show.php';
	break;

	case '/ads/info' :
		require '../controllers/ads/info.php';
	break;

	case '/ads/create' :
		require '../controllers/ads/create.php';
	break;

	case '/ads/edit' :
		require '../controllers/ads/edit.php';
	break;

	case '/ads/hot' :
		require '../controllers/ads/hot.php';
	break;

	case '/ads/index' :
		require '../controllers/ads/index.php';
	break;

	case '/ads/newest' :
		require '../controllers/ads/newest.php';
	break;

	case '/ads/show' :
		require '../controllers/ads/show.php';
	break;

	case '/check/login':
		require '../controllers/logincheck.php';
		break;

	// default :
	// 	header('Location: /');
	// 	die();
}
