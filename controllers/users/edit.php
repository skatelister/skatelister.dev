<?php
require_once __DIR__ . '/../../prime.php';
require_once __DIR__ . '/../../session_redirect.php';
var_dump($_SESSION['user_info']);

$user = User::find($_SESSION['user_info']->email);

if (Input::has('submit_form')) {
    $data_saved = UserValidation::updateUser();
    $errors = UserValidation::checkForChanges();
    if (isset($data_saved['first_name'])) {
        $user->first_name = Input::get('first_name');

    }
    if (isset($data_saved['last_name'])) {
        $user->last_name = Input::get('last_name');

    }
    if (isset($data_saved['password'])) {
        $user->password = Validation::hashPassword(Input::get('password'));

    }
    $user->save();
    $user = User::find($_SESSION['user_info']->email);
    
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
