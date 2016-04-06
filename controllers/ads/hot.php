<?php
require_once __DIR__ . '/../../prime.php';
session_start();
if (isset($_SESSION['usersInfo'])) {
    var_dump($_SESSION['usersInfo']->email);

}else {
    # code...
}



?>
<?php require_once __DIR__ . '/../../views/partials/header.php'; ?>

<?php require_once __DIR__ . '/../../views/partials/footer.php'; ?>

        <script src="/js/jquery-1.12.0.js"></script>
        <script src="/js/main.js"></script>
    </body>
</html>
