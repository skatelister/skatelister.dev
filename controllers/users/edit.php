<?php
require_once __DIR__ . '/../../prime.php';
require_once __DIR__ . '/../../session_redirect.php';

$id =  $_SESSION['user_info']->id;
$first_name = $_SESSION['user_info']->first_name;
$last_name = $_SESSION['user_info']->last_name;
$email = $_SESSION['user_info']->email;
$password = $_SESSION['user_info']->password;
$switch = false;

if (Input::has('submit_form')) {
    $data_saved = UserValidation::updateUser();
    $errors = UserValidation::checkForChanges();
    if (isset($data_saved['first_name'])) {
        $first_name = Input::get('first_name');
        $switch = true;
    }
    if (isset($data_saved['last_name'])) {
        $last_name = Input::get('last_name');
        $switch = true;
    }
    if (isset($data_saved['password'])) {
        $password = Validation::hashPassword(Input::get('password'));
        var_dump('test');
        $switch = true;
    }

}

if ($switch) {
    $new_user_info = new User();
    $new_user_info->id         = $id;
    $new_user_info->first_name = $first_name;
    $new_user_info->last_name  = $last_name;
    $new_user_info->email      = $email;
    $new_user_info->password   = $password;
    $new_user_info->save();
    $_SESSION['user_info']   = $new_user_info;
    $switch = false;
}

?>

<?php require_once __DIR__ .'/../../views/partials/header.php';  ?>

  <main>

      <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6">




              <form role="form" method="post">
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input id="first_name" type="text" class="form-control" name="first_name">
                    <?php if (isset($data_saved['first_name'])): ?>
                            <span> <?= $data_saved['first_name'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input id="last_name" type="text" class="form-control" name="last_name">
                    <?php if (isset($data_saved['last_name'])): ?>
                            <span> <?= $data_saved['last_name'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input id="password" type="text" class="form-control" name="password">
                <div class="form-group">
                    <label for="verPassword">Verify Password:</label>
                    <input id="verPassword" type="text" class="form-control" name="ver_password">

                    <?php if (isset($data_saved['password'])): ?>
                            <span> <?= $data_saved['password'] ?></span>
                    <?php endif; ?>

                    <?php if (isset($errors['wrongpass'])): ?>
                            <span> <?= $errors['wrongpass'] ?></span>
                    <?php endif; ?>

                    <?php if (isset($errors['not_saved'])): ?>
                            <p> <?= $errors['not_saved'] ?></p>
                    <?php endif; ?>
                </div>

                <button type="submit" name="submit_form" class="btn btn-default">Submit Form</button>
            </form>
      </div>
    </div>
  </main>
<?php require_once __DIR__ .'/../../views/partials/footer.php';  ?>
