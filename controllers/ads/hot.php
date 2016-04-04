<?php
require_once __DIR__ . '/../../prime.php';
session_start();
if (isset($_SESSION['usersInfo'])) {
    var_dump($_SESSION['usersInfo']->email);

}else {
    # code...
}



?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="/css/Bootstrap/bootstrap.css">
        <link rel="stylesheet" href="/css/main.css">
        <meta charset="utf-8">
        <title>Skatelister</title>
    </head>
    <body>
        <?php if (isset($_SESSION['usersInfo'])): ?>
            <?php require_once __DIR__ .'/../../views/partials/loggedin/navbar.php';  ?>
        <?php else: ?>
            <?php require_once __DIR__ .'/../../views/partials/navbar.php';  ?>
        <?php endif; ?>



        <?php require_once __DIR__ . '/../../views/partials/footer.php'; ?>

        <script src="/js/jquery-1.12.0.js"></script>
        <script src="/js/main.js"></script>
    </body>
</html>
