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

$login_ID = $_GET['loginID'];
?>


<div id="loggedin_page">

    <div class="grid-item item1">
      <?php include "loggedin_nav.php"; ?>
    </div>

    <div class="grid-item item2">
      <?php include "profile_pic.php"; ?>
    </div>

    <div class="grid-item item3">3</div>

    <div class="grid-item item4">
      <?php include "pet_modal.php"; ?>
    </div>

  </div>

<?php include "footer.php";?>

</body>
