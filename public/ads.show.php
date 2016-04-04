<?php

// for testing only. will remove once we have layout setup correctly
require_once '../skateConfig.php';
require_once '../models/Ad.php';
require_once '../utils/Input.php';
require_once 'uploadFile.php';

session_start();
if (isset($_SESSION['usersInfo'])) {

    $id = $_SESSION['usersInfo']->id;



    $all_user_ads = new Ad();
    $user_items = $all_user_ads->find($id);

    var_dump($user_items);


}
 ?>
 <!DOCTYPE html>
 <html>
     <head>
         <link rel="stylesheet" href="/css/">
         <meta charset="utf-8">
         <title></title>
     </head>
     <body>

         <!-- <img src="img/user_images/twittersocial.png" alt="" /> -->


         <?php foreach ($user_items as $item): ?>
             <div class="">
                 <img src="<?= $item['image'];?>" alt="" />
                 <p>
                     <?= $item['title'];?>
                 </p>
                 <p>
                     <?= $item['description'];?>
                 </p>
                 <p>
                     <?= $item['category'];?>
                 </p>

             </div>

         <?php endforeach; ?>
         <p>
             test
         </p>

         <script src="/js/jquery-1.12.0.js"></script>
         <script src="/js/"></script>
     </body>
 </html>
