<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
  <div class="container">
    <a class="navbar-brand" href="../../index.php">Zootopia</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarResponsive">

      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a href="view/html/post_ad.php" class="btn btn-primary nav-link">Post a pet</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="view/html/browse_petads.php">Browse pets</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About us</a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto">
<?php
if(isset($_SESSION['login']) && $_SESSION['login'] == true):
?>
        <li class="nav-item">
          <a class="nav-link" href="../html/loggedin_page.php?loginID=<?php echo $_SESSION['userID'];?>">Account Details</a>
        </li>
        
        <li class="nav-item">
          <form action="../../controller/logout_process.php" method="post">
            <button class="btn btn-primary nav-link" type="submit"> Logout </button>
          </form>
        </li>
<?php
else:
?>

        <li class="nav-item">
          <a class="nav-link" href="view/my-login-master/register.php">Sign Up</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="view/my-login-master/login_page.php">Log In</a>
        </li>
<?php
endif;
?>
        <li class="nav-item">
          <a class="nav-link" href="#">Help</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
