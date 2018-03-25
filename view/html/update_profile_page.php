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

$updateProfile = getOneUser($login_ID);

$firstName = $updateProfile['firstName'];
$surname = $updateProfile['lastName'];
$address = $updateProfile['addressID'];
$email = $updateProfile['loginUsername'];
?>

<div id="loggedin_page">

    <p id="welcome">
      Welcome <?php echo $_SESSION['firstname']; ?>!
    </p>


    <h1 id="profile_h1">Account Details</h1>

    <div id="profile_update_container">
      <form id="profile_update_form">

          <!-- <div id="profile_form_section"> -->

            <!-- <div class="form-group">
                <label for="profile_avatar">Choose avatar</label>
                <input type="file" class="form-control-file" id="profile_avatar" aria-describedby="fileHelp" name="avatar">
            </div> -->

            <div class="form-group">
              <label for="profile_first_name">First Name</label>
              <input type="text" class="form-control" id="profile_first_name" name="fname" value="<?php echo $firstName; ?>">
            </div>

            <div class="form-group">
              <label for="profile_last_name">Last Name</label>
              <input type="text" class="form-control" id="profile_last_name" name="lname" value="<?php echo $surname; ?>">
            </div>

            <!-- <div class="form-group">
              <label for="address">Address</label>
              <input id="address" type="text" class="form-control" name="address">
            </div>

            <div class="form-group">
              <label for="profile_location">Location</label>
              <input type="text" class="form-control" id="profile_location" name="location">
            </div> -->

            <div class="form-group">
              <label for="profile_email">Email</label>
              <input type="text" class="form-control" id="profile_email" name="email" value="<?php echo $email; ?>">
            </div>

            <!-- <div class="form-group">
              <label for="profile_dob">Birthday</label>
              <input type="text" class="form-control" id="profile_dob" name="dob">
            </div> -->

            <!-- <label> On Zootopia I want to:</label>
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" value="" name="make_bookings">
                Visit pets (make bookings)
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" value="" name="post_ads">
                Earn money (post pet ads)
              </label>
            </div> -->

            <input type="button" value="Update" onclick="showMsg(<?php echo $login_ID; ?>)"/>

            <div id="message"></div>
          <!-- </div> -->
        </form>
      </div>

  </div>
</body>
