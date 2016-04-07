<?php
require_once __DIR__ . '/../../prime.php';
require_once __DIR__ . '/../../session_redirect.php';
$switch = false;
$errors = [];
$data_saved = [];

if(Input::has('item_id')) {
    $id = Input::get('item_id');
    $current_ad = Ad::find_current_ad($id);

    $ad_title = $current_ad->title;
    $ad_date_posted = $current_ad->date_posted;
    $ad_available = $current_ad->available;
    $ad_category = $current_ad->category;
    $ad_description = $current_ad->description;
    $ad_image = $current_ad->image;
    $ad_user = $current_ad->user_id;
    $ad_views = $current_ad->views;
}else {
    header('Location: /ads/show');
    die();
}

if(Input::has('take_down')) {
    Ad::takeDown($id);
    $ad_available = 0;
}

if(Input::has('reshow')) {
    Ad::reshow($id);
    $ad_available = 1;
}

if (input::get('update_title') != '') {
    $ad_title = Input::get('update_title');
    $data_saved['update_title'] = 'Title has been saved.';
}

if (Input::get('update_category') != '') {
    $ad_category = Input::get('update_category');
    $data_saved['update_category'] = 'Category has been saved.';
}

if (Input::get('update_description') != '') {
  $ad_description = Input::get('update_description');
  $data_saved['update_description'] = 'Description has been saved.';
}

if (Input::get('update_title') == ''
  && Input::get('update_category') == ''
  && Input::get('update_description') == ''
  && Input::has('submit_form')) {
      $data_saved['not_saved'] = 'No changes where made';
}

if (! empty($_POST)) {

    $ad_update = new Ad();
    // Ask about the date format and the MySQL format timezone
    // hard coded user_id to get the insert to work
    $ad_update->id = $id;
    $ad_update->title = $ad_title;
    $ad_update->date_posted = $ad_date_posted;
    $ad_update->category = $ad_category;
    $ad_update->description = $ad_description;
    $ad_update->image = $ad_image;
    $ad_update->user_id = $ad_user;
    $ad_update->views = $ad_views;
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
                                <?php if ($ad_available == 0): ?>
                                    <form class="" method="post">
                                        <button class="btn btn-primary" name="reshow" type="submin ">Re-Upload </span></button>
                                    </form>
                                    <?php else: ?>
                                        <form class="" method="post">
                                            <button class="btn btn-primary" name="take_down" type="submin ">Take Down  </span></button>
                                        </form>
                                <?php endif; ?>
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
              				<label for="category">Category of Item</label>
              				<select name="update_category" id="category" class="form-control">
              					<option value="Skateboard">Skateboard</option>
              					<option value="Wheels">Wheels</option>
              					<option value="Accessories">Accessories</option>
              					<option value="other">Other: </option>
              				</select>
                            <?php if (isset($data_saved['update_category'])): ?>
                                    <span> <?= $data_saved['update_category'] ?></span>
                            <?php endif; ?>
                        </div>

                          <div class="form-group">
                              <label for="update_description">Discription:</label>
                              <input id="update_description" type="text" class="form-control" name="update_description">
                              <?php if (isset($data_saved['update_description'])): ?>
                                      <span> <?= $data_saved['update_description'] ?></span>
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
<?php require_once __DIR__ .'/../../views/partials/footer.php';  ?>
