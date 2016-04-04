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

<<<<<<< HEAD
=======
<?php

$newestAds = Ad::showNewest();

var_dump($newestAds);
?>
>>>>>>> e53bd24801e659afd8d89a4fcaefe65082a6d321



<?php require_once '../views/partials/footer.php'; ?>
