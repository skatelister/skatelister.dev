<?php

require_once '../skateConfig.php';
require_once '../database/db_connect.php';
require_once '../models/Ad.php';
require_once '../utils/Input.php';
require_once 'uploadFile.php';
require_once '../models/Users.php';
require_once '../models/Ad.php';

session_start();
if (isset($_SESSION['usersInfo'])) { 
    var_dump($_SESSION['usersInfo']); 
}


?>

<?php require_once '../views/partials/header.php'; ?>

<?php
    
$newestAds = Ad::showNewest();

var_dump($newestAds);
?>



<?php require_once '../views/partials/footer.php'; ?>

        
