<?php
session_start();
if(!$_SESSION['login']){
  header("location:login_page.php");
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

  <script type="text/javascript">
  // localstorage for add pet modal
      if(localStorage){
        $(document).ready(function(){
          $('.stored').phoenix()
          $('#pet_profile_update_form').submit(function(e){
              $('.stored').phoenix('remove');
              sessionStorage.removeItem('pet_size');
          });

          $('.select').change(function() {
              sessionStorage.setItem(this.id, this.value);
          }).val(function() {
              return sessionStorage.getItem(this.id)
          });
        });
      } else{
          alert("Sorry, your browser do not support local storage.");
      }
  </script>
</body>
