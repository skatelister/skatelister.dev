

  <main>
      <form method="post">

        <div class="">
          <label for="email">Email:</label>
          <input id="email" type="text" name="email" value="<?=  Input::get('email'); ?>">
            <span id='errors_email'></span>
        </div>
        <div class="">
          <label for="password">Password:</label>
          <input id="password" type="text" name="password" value="">
          <span id="errors_password"></span>

        </div>


        <span id="errors_wronginfo"></span>
        <button id="login_button"type="submit" name="button">submit</button>
      </form>
      <form class="" method="post">
        <div class="">
          <button type="submit" name="sign_up"> Sign up</button>
        </div>
      </form>
  </main>
