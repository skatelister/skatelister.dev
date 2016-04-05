<?php
require_once '../prime.php';
Auth::logout();
header('Location: /');
die();
?>
