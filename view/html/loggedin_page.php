<?php
session_start();
if(!$_SESSION['login']){
  header("location:../my-login-master/login_page.php");
  die;
}
?>

<?php
include '../../model/db.php';
include 'header.php';
include 'nav.php';
$conn = connect();

?>

<div id="loggedin_page">

    <p id="welcome">
      Welcome <?php echo $_SESSION['firstname']; ?>!
    </p>

    <a href="update_profile_page.php?loginID=<?php echo $_SESSION['userID'] ?>" id="update_button" type="button" class="btn btn-primary">
Account Details </a>

<a href="update_profile_page.php?loginID=<?php echo $_SESSION['userID'] ?>" id="update_button" type="button" class="btn btn-primary">
My ads</a>

<a href="update_profile_page.php?loginID=<?php echo $_SESSION['userID'] ?>" id="update_button" type="button" class="btn btn-primary">
Payments</a>

  </div>
</body>
