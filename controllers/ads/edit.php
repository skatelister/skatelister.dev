<?php
session_start();
require_once __DIR__ . '/../../prime.php';
$switch = false;

if(Input::has('item_id')) {
    $id = Input::get('item_id');
    $current_ad = Ad::find_current_ad($id);

    $ad_title = $current_ad->title;
    $ad_available = $current_ad->available;
    $ad_date_posted = $current_ad->date_posted;
    $ad_category = $current_ad->category;
    $ad_description = $current_ad->description;
    $ad_image = $current_ad->image;
    $ad_user = $current_ad->user_id;

}else if(! isset($_SESSION['usersInfo'])){
    header('Location: /');
    die();
}else {
    header('Location: /ads/show');
    die();
}


$errors = [];
$data_saved = [];

if (input::get('update_title') != '') {
  $ad_title = Input::get('update_title');
  $data_saved['update_title'] = 'First name has been saved.';

}

if (Input::get('update_category') != '') {
    $ad_category = Input::get('update_category');
    $data_saved['update_category'] = 'Last name has been saved.';

}

if (Input::get('update_discription') != '') {
  $ad_discription = Input::get('update_discription');
  $data_saved['update_discription'] = 'Last name has been saved.';
}


if (Input::get('update_title') == ''
  && Input::get('update_category') == ''
  && Input::get('update_discription') == ''
  && Input::has('submit_form')) {
$data_saved['not_saved'] = 'No changes where made';
}


if (! empty($_POST)) {
$ad_update = new Ad();

// Ask about the date format and the MySQL format timezone
// hard coded user_id to get the insert to work



$ad_update->id = $id;
$ad_update->title = $ad_title;
$ad_update->available = $ad_available;
$ad_update->date_posted = $ad_date_posted;
$ad_update->category = $ad_category;
$ad_update->description = $ad_description;
$ad_update->image = $ad_image;
$ad_update->user_id = $ad_user;

$ad_update->save();
$switch = true;
}






?>

<?php require_once __DIR__ .'/../../views/partials/header.php';  ?>

            <main>

                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="row">
                            <div class="col-md-7">
                                <a href="#">
                                    <img class="img-responsive" src="<?= $current_ad->image;?>" alt="<?= $current_ad->image;?>">
                                </a>
                            </div>
                            <div class="col-md-5">
                                <?php if ($switch): ?>
                                    <h3> <?= $ad_title; ?> </h3>
                                    <h4><?= $ad_category; ?> </h4>
                                    <p> <?= $ad_description;?></p>
                                <?php else: ?>
                                    <h3> <?= $current_ad->title;?> </h3>
                                    <h4><?= $current_ad->category; ?> </h4>
                                    <p> <?= $current_ad->description;?></p>
                                <?php endif; ?>

                            </div>
                        </div>




                        <form method="post">
                          <div class="form-group">
                              <label for="update_title">Title:</label>
                              <input id="update_title" type="text" class="form-control" name="update_title">
                              <?php if (isset($data_saved['update_title'])): ?>
                                      <span> <?= $data_saved['update_title'] ?></span>
                              <?php endif; ?>
                          </div>
                          <div class="form-group">
                              <label for="update_category">Category:</label>
                              <input id="update_category" type="text" class="form-control" name="update_category">
                              <?php if (isset($data_saved['update_category'])): ?>
                                      <span> <?= $data_saved['update_category'] ?></span>
                              <?php endif; ?>
                          </div>
                          <div class="form-group">
                              <label for="update_discription">Discription:</label>
                              <input id="update_discription" type="text" class="form-control" name="update_discription">
                              <?php if (isset($data_saved['update_discription'])): ?>
                                      <span> <?= $data_saved['update_discription'] ?></span>
                              <?php endif; ?>
                              <?php if (isset($data_saved['not_saved'])): ?>
                                      <span> <?= $data_saved['not_saved'] ?></span>
                              <?php endif; ?>
                          </div>


                          <button type="submit" name="submit_form" class="btn btn-primary">Submit Changes</button>
                      </form>
                </div>
              </div>
            </main>
        <script src="/js/jquery-1.12.0.js"></script>
        <script src="/js/"></script>
    </body>
</html>
