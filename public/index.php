<?php
require_once '../prime.php';

session_start();
if (isset($_SESSION['usersInfo'])) {
    var_dump($_SESSION['usersInfo']);
}

$newestAds = Ad::showNewest();
var_dump($newestAds);

?>

<?php require_once '../views/partials/header.php'; ?>


<?php require_once '../views/partials/footer.php'; ?>
