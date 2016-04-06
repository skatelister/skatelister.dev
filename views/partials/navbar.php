
<!-- Landing Page navbar (not logged in) -->
<nav class="nav navbar-default" role="navigation">
  <div class="logo">
    <span id="websiteName">SkateLister</span>
  </div> <!-- .logo -->


<?php if (empty($_SESSION['usersInfo'])): ?>
      <div class="headerNav">
        <ul id="mainNavigation">
          <li class="navbar_lists" data-toggle="modal" data-target="#myModal"> Sign In</li>
          <li><a href="/">Home</a></li>
          <li><a href="/ads/hot">Hot</a></li>
          <li><a href="/register" class="btn btn-primary">Sign In</a></li>
        </ul>

      </div> <!-- .headerNav -->
    </nav> <!-- .nav navbar-default -->

    <?php else: ?>
      <!-- Logged in NavBar -->
      <div class="headerNav">
        <ul id="mainNavigation">
          <li><a href="/">Home</a></li>
          <li><a href="/ads/hot">Hot</a></li>
          <li><a href="/ads/show">Profile</a></li>
          <li><a href="/signout" class="btn btn-danger">Signout</a></li>
        </ul>
      </div> <!-- .headerNav -->
    </nav> <!-- .nav navbar-default -->

<?php endif; ?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <?php require_once '../controllers/signin.php'; ?>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
