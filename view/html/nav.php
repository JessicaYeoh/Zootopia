<!-- Navigation -->

<?php
$PHP_SELF=$_SERVER['PHP_SELF'];

$RootDir='http://'.$_SERVER['HTTP_HOST'].'/zootopia'.substr($PHP_SELF,0,strrpos($PHP_SELF,''));


echo '<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <div class="container">';
        echo '<a class="navbar-brand" href="  ';
        echo $RootDir;
        echo '/index.php">Zootopia</a> ';

        echo '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>';

   echo '<div class="collapse navbar-collapse" id="navbarResponsive"> ';

    echo '<ul class="navbar-nav ml-auto"> ';
      echo '<li class="nav-item">
              <a href=" ';
              echo $RootDir;
              echo '/view/html/post_ad.php" class="btn btn-primary nav-link">Post a pet</a>
            </li> ';

      echo '<li class="nav-item">
              <a class="nav-link" href=" ';
              echo $RootDir;
              echo '/view/html/browse_petads.php">Browse pets</a> ';
      echo '</li>

            <li class="nav-item">
              <a class="nav-link" href="#">About us</a>
            </li>
          </ul>';

    echo '<ul class="navbar-nav ml-auto">';

if(isset($_SESSION['login']) && $_SESSION['login'] == true):

      echo '<li class="nav-item">
              <a class="nav-link" href="';
              echo $RootDir;
              echo '/view/html/loggedin_page.php?loginID=';
              echo $_SESSION['userID'];
              echo '">My account</a>
            </li>';

      echo '<li class="nav-item"> ';
        echo '<form action=" ';
        echo $RootDir;
        echo '/controller/logout_process.php" method="post">';
        echo '<button class="btn btn-primary nav-link" type="submit"> Logout      </button>
              </form>
            </li>';

else:

      echo '<li class="nav-item">
              <a class="nav-link" href="';
              echo $RootDir;
              echo '/view/my-login-master/register.php">Sign Up</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href=" ';
              echo $RootDir;
              echo '/view/my-login-master/login_page.php">Log In</a>
            </li> ';

endif;

      echo '<li class="nav-item">';
        echo '<a class="nav-link" href="#">Help</a>
            </li>
      </ul>
    </div>
  </div>
</nav>';
?>
