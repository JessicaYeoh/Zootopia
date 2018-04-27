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
?>

<div id="update_profile_page">

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
            <input id="address" type="text" class="form-control" name="address" value="<?php echo $address; ?>">
          </div>

          <div class="form-group">
            <label for="suburb">Suburb</label>
            <input id="suburb" type="text" class="form-control" name="suburb" value="<?php echo $suburb; ?>" required>
          </div>

          <div class="form-group">
            <label for="postcode">Postcode</label>
            <input id="postcode" type="text" class="form-control" name="postcode" required value="<?php echo $postcode; ?>">
          </div>

          <div class="form-group">
            <label for="state">State</label>
            <select id="state_select" name="state" required value="<?php echo $state; ?>">
              <option>ACT</option>
              <option>NSW</option>
              <option>NT</option>
              <option>QLD</option>
              <option>TAS</option>
              <option>VIC</option>
              <option>WA</option>
            </select>
          </div>

          <div class="form-group">
            <label for="profile_email">Email</label>
            <input type="text" class="form-control" id="profile_email" name="email" value="<?php echo $email; ?>" disabled>
          </div>

          <div class="form-group">
            <label for="phone">Phone</label>
            <input id="phone" type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
          </div>

          <!-- <div class="form-group">
            <label for="profile_dob">Birthday</label>
            <input type="text" class="form-control" id="profile_dob" name="dob">
          </div> -->

          <label> On Zootopia I want to:</label>
          <div class="form-check">
            <label class="form-check-label" for="customer">
              <input id="customer" class="form-check-input" type="checkbox" store="checkbox1" value="YES" name="customer">
              Visit pets (make bookings)
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label" for="owner">
              <input id="owner" class="form-check-input" type="checkbox" store="checkbox2" value="YES" name="owner">
              Earn money (post pet ads)
            </label>
          </div>

          <input type="button" value="Update" onclick="showMsg(<?php echo $login_ID;?>)"/>


          <div id="message"></div>
        <!-- </div> -->
      </form>


</div>


<script>
    (function() {
        var boxes = document.querySelectorAll("input[type='checkbox']");
        for (var i = 0; i < boxes.length; i++) {
            var box = boxes[i];
            if (box.hasAttribute("store")) {
                setupBox(box);
            }
        }

        function setupBox(box) {
            var storageId = box.getAttribute("store");
            var oldVal    = localStorage.getItem(storageId);
            console.log(oldVal);
            box.checked = oldVal === "true" ? true : false;

            box.addEventListener("change", function() {
                localStorage.setItem(storageId, this.checked);
            });
        }

// localstorage state selection
        $('#state_select').change(function() {
            localStorage.setItem('state', this.value);
        });
        if(localStorage.getItem('state')){
            $('#state_select').val(localStorage.getItem('state'));
        }
    })();

</script>

</body>
