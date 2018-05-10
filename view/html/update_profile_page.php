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

$updateProfile = getOneUser($login_ID);

$firstName = $updateProfile['firstName'];
$surname = $updateProfile['lastName'];
$address = $updateProfile['address'];
$suburb = $updateProfile['suburb'];
$postcode = $updateProfile['postcode'];
$state = $updateProfile['state'];
$email = $updateProfile['loginUsername'];
$phone = $updateProfile['phone'];
$owner = $updateProfile['isOwner'];
$cust = $updateProfile['isCustomer'];
?>



<div id="update_profile_page">

<div class="loader"><img src="../img/loader.svg"/></div>

  <div id="profile_nav">
    <?php include 'loggedin_nav.php';?>
  </div>


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
            <input type="text" class="form-control" id="profile_first_name" name="fname" value="<?php echo $firstName; ?>" required>
          </div>

          <div class="form-group">
            <label for="profile_last_name">Last Name</label>
            <input type="text" class="form-control" id="profile_last_name" name="lname" value="<?php echo $surname; ?>" required>
          </div>

          <div class="form-group">
            <label for="address">Address (optional)</label>
            <input id="address" type="text" class="form-control stored" name="address" value="<?php echo $address; ?>">
          </div>

          <div class="form-group">
            <label for="suburb">Suburb</label>
            <input id="suburb" type="text" class="form-control stored" name="suburb" value="<?php echo $suburb; ?>" required>
          </div>

          <div class="form-group">
            <label for="postcode">Postcode</label>
            <input id="postcode" type="text" class="form-control stored" name="postcode" required value="<?php echo $postcode; ?>">
          </div>

          <div class="form-group">
            <label for="state">State</label>
            <select id="state_select" class="select2 stored" name="state" required>
              <option value="ACT" <?php if($state=="ACT") echo "selected"; ?>>ACT</option>
              <option value="NSW" <?php if($state=="NSW") echo "selected"; ?>>NSW</option>
              <option value="NT" <?php if($state=="NT") echo "selected"; ?>>NT</option>
              <option value="QLD" <?php if($state=="QLD") echo "selected"; ?>>QLD</option>
              <option value="TAS" <?php if($state=="TAS") echo "selected"; ?>>TAS</option>
              <option value="VIC" <?php if($state=="VIC") echo "selected"; ?>>VIC</option>
              <option value="WA" <?php if($state=="WA") echo "selected"; ?>>WA</option>
            </select>
          </div>

          <div class="form-group">
            <label for="profile_email">Email</label>
            <input type="text" class="form-control" id="profile_email" name="email" value="<?php echo $email; ?>" disabled>
          </div>

          <div class="form-group">
            <label for="phone">Phone</label>
            <input id="phone" type="text" class="form-control stored" name="phone" value="<?php echo $phone; ?>">
          </div>

          <!-- <div class="form-group">
            <label for="profile_dob">Birthday</label>
            <input type="text" class="form-control" id="profile_dob" name="dob">
          </div> -->

          <label> On Zootopia I want to:</label>
          <div class="form-check">
            <label class="form-check-label" for="customer">
              <input id="customer" class="form-check-input stored" type="checkbox" value="YES" name="customer" <?php if($cust=="YES") echo "checked"; ?>>
              Visit pets (make bookings)
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label" for="owner">
              <input id="owner" class="form-check-input stored" type="checkbox" value="YES" name="owner" <?php if($owner=="YES") echo "checked"; ?>>
              Earn money (post pet ads)
            </label>
          </div>

          <input type="button" id="profile_button" value="Update" onclick="showMsg(<?php echo $login_ID;?>)"/>


          <div id="message"></div>
        <!-- </div> -->
      </form>


</div>


<script>

    if(localStorage){
      $(document).ready(function(){

        $('.stored').phoenix({
          webStorage: 'sessionStorage'
        })
        $('#profile_button').click(function(e){
          $('.stored').phoenix('remove')
        });

      });
    } else{
        alert("Sorry, your browser do not support local storage.");
    }
</script>

</body>
