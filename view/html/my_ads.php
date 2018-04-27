<?php
session_start();
if(!$_SESSION['login']){
  header("location:../my-login-master/login_page.php");
  die;
}

include '../../model/db.php';
include 'header.php';
include 'nav.php';

$conn = connect();


$login_ID = $_GET['loginID'];


?>

<div id="pet_profile_page">

  <div id="ads_nav">
    <?php include 'loggedin_nav.php';?>
  </div>


    <h1 id="pet_profile_h1">My ads</h1>

    <div id="pet_profile_update_container">
      <form id="pet_profile_update_form">

            <div class="form-group">
                <label for="profile_avatar">Choose pet picture/s</label>
                <input type="file" class="form-control-file" id="profile_avatar" aria-describedby="fileHelp" name="avatar">
            </div>

            <div class="form-group">
              <label for="pet_name">Pet Name</label>
              <input type="text" class="form-control" id="pet_name" name="pet_name" value="<?php ?>" required>
            </div>

            <div class="form-group">
              <label for="animal_type">Animal type</label>
              <input type="text" class="form-control" id="animal_type" name="animal_type" value="<?php ?>" required>
            </div>

            <div class="form-group">
              <label for="breed_type">Breed type</label>
              <input id="breed_type" type="text" class="form-control" name="breed_type" value="<?php ?>">
            </div>

            <div class="form-group">
              <label for="pet_age">Pet age</label>
              <input id="pet_age" type="text" class="form-control" name="pet_age" value="<?php ?>" required>
            </div>

            <div class="form-group">
              <label for="pet_size">Pet size</label>
              <select class="" id="pet_size" name="pet_size" required value="<?php ?>">
                <option>Small</option>
                <option>Medium</option>
                <option>Large</option>
              </select>
            </div>


            <input type="button" value="Add" onclick="showMsg(<?php echo $login_ID;?>)"/>

            <input type="button" value="Update" onclick="showMsg(<?php echo $login_ID;?>)"/>


            <div id="message"></div>

        </form>
      </div>

  </div>


</body>
