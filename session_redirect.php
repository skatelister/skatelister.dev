<?php
session_start();
if (! isset($_SESSION['users_info'])) {
    header('Location: /');
}


?>
