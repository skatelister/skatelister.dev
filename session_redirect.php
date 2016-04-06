<?php
session_start();
if (! isset($_SESSION['usersInfo'])) {
    header('Location: /');
}


?>
