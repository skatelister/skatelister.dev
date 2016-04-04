<?php
require_once '../prime.php';
session_start();
var_dump($_SESSION['usersInfo']);

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="/css/Bootstrap/bootstrap.css">
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
<?php require_once __DIR__ .'/../views/partials/loggedin/navbar.php';  ?>
        <script src="/js/jquery-1.12.0.js"></script>
        <script src="/js/"></script>
    </body>
</html>
