<?php
require_once '../skateConfig.php';
require_once '../database/db_connect.php';
require_once '../models/Ad.php';
require_once '../utils/Input.php';
require_once 'uploadFile.php';


if(Input::has('item_id')) {
    $id = Input::get('item_id');
    $current_ad = Ad::find_current_ad($id);
    var_dump($current_ad);
}

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="/css/Bootstrap/bootstrap.css">
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <form class="" action="ads.show.php" method="post">

            <div class="row">
                <div class="col-md-7">
                    <a href="#">
                        <img class="img-responsive" src="<?= $current_ad->image;?>" alt="<?= $current_ad->image;?>">
                    </a>
                </div>
                <div class="col-md-5">
                    <h3> <?= $current_ad->title;?> </h3>
                    <h4><?= $current_ad->category; ?> </h4>
                    <p> <?= $current_ad->description;?></p>

                </div>
            </div>
            <button type="submit" name="button">Submit</button>
        </form>
        <script src="/js/jquery-1.12.0.js"></script>
        <script src="/js/"></script>
    </body>
</html>
