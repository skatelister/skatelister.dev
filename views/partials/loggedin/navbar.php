<nav class="navbar navbar-fixed-top navbar-inverse">
 <div class="container">
   <div class="navbar-header">
     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
       <span class="sr-only">Toggle navigation</span>
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
     </button>
     <a class="navbar-brand" href="#">Skate Lister</a>
   </div>
   <div id="navbar" class="collapse navbar-collapse">
     <ul class="nav navbar-nav">
       <li class="active"><a href="#">Main</a></li>
       <li><a href="#about">Hot</a></li>
       <li><a href="#contact">New</a></li>


           <li><a href="#"> <?= $_SESSION['usersInfo']->first_name; ?> </a></li>

       <li><a href="/reloadPage.php">Sign out</a></li>
     </ul>
   </div><!-- /.nav-collapse -->
 </div><!-- /.container -->
</nav><!-- /.navbar -->
