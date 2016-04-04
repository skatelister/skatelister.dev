<?php

// for testing only. will remove once we have layout setup correctly
require_once '../prime.php';

session_start();
if (isset($_SESSION['usersInfo'])) {

    $id     = $_SESSION['usersInfo']->id;
    $page   = 1;
    $limit  = 3;
    $offset = 0;

    if(Input::has('page')){
        $page = Input::get_number('page');
        $offset = $page * $limit - $limit;
    }

    $user_items = Ad::paginate($id, $limit, $offset);


    $allUserPosts = Ad::find_total_posts($id);
    var_dump($allUserPosts);

    $totalPages = $allUserPosts / $limit;


}else {
    header('Location: index.php');
}

 ?>
 <!DOCTYPE html>
 <html>
     <head>
         <link rel="stylesheet" href="/css/Bootstrap/bootstrap.css">
         <link rel="stylesheet" href="/css/ads.show.css">
         <meta charset="utf-8">
         <title></title>
     </head>
     <body>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Welcome
                    <small><?= $_SESSION['usersInfo']->first_name; ?></small>
                </h1>
            </div>
        </div>
        <!-- /.row -->


                 <?php foreach ($user_items as $item): ?>
                     <?php var_dump($item) ?>
                     <div class="row">
                         <div class="col-md-7">
                             <a href="#">
                                 <img class="img-responsive" src="<?= $item->image;?>" alt="<?= $item->image;?>">
                             </a>
                         </div>
                         <div class="col-md-5">
                             <h3> <?= $item->title;?> </h3>
                             <h4><?= $item->category; ?> </h4>
                             <p> <?= $item->description;?></p>
                             <a class="btn btn-primary" href="ads.edit.php?item_id=<?=$item->item_id ?>">Edit</a>
                             <a class="btn btn-primary" href="#">Take Down  </span></a>
                         </div>
                     </div>
                     <!-- /.row -->

                     <hr>


                 <?php endforeach; ?>




        <!-- Pagination -->
        <div class="row text-center">
            <div class="col-lg-12">
                <ul class="pagination">
                    <?php if ($page > 1) { ?>
                        <li>
                            <a href="ads.show.php?page=<?=$page - 1 ?>">&laquo;</a>
                        </li>
                   <?php } ?>

                    <?php for ($i=1; $i <= ceil($totalPages)  ; $i++) { ?>
                        <li>
                            <a href="ads.show.php?page=<?=$i ?> "> <?= $i ?> </a>
                        </li>
                    <?php }?>

                    <?php if ($page<= $totalPages) { ?>
                        <li>
                             <a href="ads.show.php?page=<?=$page + 1 ?>">&raquo;</a>
                        </li>
                    <?php } ?>

                </ul>
            </div>
        </div>




        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
<script src="/js/jquery-1.12.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
