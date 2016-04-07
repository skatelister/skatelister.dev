<?php

// for testing only. will remove once we have layout setup correctly
require_once __DIR__ . '/../../prime.php';
require_once __DIR__ . '/../../session_redirect.php';

if(Input::has('page')){
    $page   = Input::get_number('page');
    $offset = $page * $limit - $limit;
}

$id     = $_SESSION['user_info']->id;
$page   = 1;
$limit  = 3;
$offset = 0;


$user_items   = Ad::paginate($id, $limit, $offset);
$allUserPosts = Ad::find_total_posts($id);
$totalPages   = $allUserPosts / $limit;



 ?>
 <?php require_once __DIR__ .'/../../views/partials/header.php';  ?>
 <link rel="stylesheet" href="/css/ads.css">
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Welcome
                    <?= $_SESSION['user_info']->first_name; ?>
                    <a href="/user/edit" class="btn btn-primary align-right">Edit Profile</a>
                    <a href="/ads/create" class="btn btn-primary align-right">Create Ad</a>
                </h1>
            </div>
        </div>
        <!-- /.row -->


                 <?php foreach ($user_items as $item): ?>

                     <div class="row">
                         <div class="col-md-7">
                             <a href="#">
                                <img class="img-responsive" src="<?= $item->image;?>" alt="<?= $item->image;?>">
                             </a>
                         </div>
                         <div class="col-md-5">
                             <?php if ($item->available == 0): ?>
                                 <h2>Taken down</h2>
                             <?php endif; ?>
                            <h3> <?= $item->title;?> </h3>
                            <h4><?= $item->category; ?> </h4>
                            <p> <?= $item->description;?></p>
                            <a class="btn btn-primary" href="/ads/edit?item_id=<?=$item->item_id ?>">Edit</a>
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
                            <a href="/ads/show?page=<?=$page - 1 ?>">&laquo;</a>
                        </li>
                   <?php } ?>

                    <?php for ($i=1; $i <= ceil($totalPages)  ; $i++) { ?>
                        <li>
                            <a href="/ads/show?page=<?=$i ?> "> <?= $i ?> </a>
                        </li>
                    <?php }?>

                    <?php if ($page<= $totalPages) { ?>
                        <li>
                             <a href="/ads/show?page=<?=$page + 1 ?>">&raquo;</a>
                        </li>
                    <?php } ?>

                </ul>
            </div>
        </div>
    </div>


<?php require_once __DIR__ .'/../../views/partials/footer.php';  ?>
