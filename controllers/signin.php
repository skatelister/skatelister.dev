

  <!-- <main>
      <form method="post">

        <div class="">
          <label for="email">Email:</label>
          <input id="email" type="text" name="email" value=">
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
  </main> -->

  <div class="container col-lg-8">
      <div class="row">



      <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="email" class="sr-only">Email address</label>
        <input type="email" id="email" name='email' class="form-control" placeholder="Email address" required autofocus>
        <span id='errors_email'></span>

        <label for="password" class="sr-only">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
         <span id="errors_password"></span>

        <div class="checkbox">
                <span id="errors_wronginfo"></span>
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button id="login_button" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
      <div class="container col-lg-8">

          <form class="form-signin" method="post">

            <button class="btn btn-lg btn-primary btn-block" type="submit" name="sign_up">Sign up</button>
          </form>

            </div>
        </div>

    </div>
