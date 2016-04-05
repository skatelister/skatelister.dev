
<!-- Landing Page navbar (not logged in) -->

<nav class="nav navbar-default" role="navigation">
  <span id="websiteName">SkateLister</span>
  <ul id="mainNavigation">
      <li class="navbar_lists" data-toggle="modal" data-target="#myModal"> Sign In</li>
    <li><a href="/">Home</a></li>
    <li><a href="/ads/hot">Hot</a></li>
  </ul>
  <a href="/signin" class="btn btn-primary">Sign In</a>
</nav>


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
