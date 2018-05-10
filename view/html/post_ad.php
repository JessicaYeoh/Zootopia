<?php
session_start();

if(!$_SESSION['login']){
  header("location:../my-login-master/login_page.php");
}

include '../../model/db.php';
include 'header.php';

$conn = connect();

$login_ID = $_GET['loginID'];


$getOneUser = "SELECT * FROM tbllogin
INNER JOIN tbluser ON tbllogin.loginID = tbluser.loginID
WHERE tbllogin.loginID = :lid;";
$stmt = $conn->prepare($getOneUser);
$stmt->bindParam(':lid', $login_ID, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if($result['isCustomer'] == "YES" && ($result['isOwner'] == "" || $result['isOwner'] == NULL) && $_SESSION['login'] == true){
  // $_SESSION['message'] = '<script language="javascript"> alert("You must be a pet owner to post ads!") </script>';
  include 'nav.php';

  echo '<div id="post_ad_container">
  <h1 id="ad_h1">Post your ad</h1>
    <form id="ad_form">
      <p>
        Must be a pet owner to post an ad!
      </p>

      <span>If you have a pet to post please update your profile </span>
      <a href="update_profile_page.php?loginID=';echo $_SESSION['loginID'];
    echo '">here</a>
    </form>
  </div>';
}else{

include 'nav.php';
?>



    <div id="post_ad_container">
        <h1 id="ad_h1">Post your ad</h1>

        <?php
        if (!isset($_SESSION['message'])){
            $_SESSION['message'] = "";
        }
        echo $_SESSION['message'];
        unset ($_SESSION['message']);
        ?>

      <form id="ad_form">


          <div id="ad_form_section1">

                  <div class="form-group">
                    <label for="ad_title">Ad Title</label>
                    <input type="text" class="form-control stored" id="ad_title" placeholder="e.g. German Sheperd puppy - 4 months old" name="ad_title" required onkeyup="saveValue(this);">
                  </div>

                  <div class="form-group">
                    <label for="description">Describe what you're offering</label>
                    <textarea class="form-control stored" id="description" rows="6" placeholder="e.g. Owner supervised visits, minimum 1hr bookings, play with my german sheperd puppy in my backyard" name="description" required></textarea>
                  </div>

                  <button type="button" id="ad_section2" class="btn btn-primary"> Next </button>

          </div>

          <div id="ad_form_section2">

                <div class="form-group">
                    <label for="pet_ad">Pet</label>

                    <?php

                    $userID = $_SESSION['userID'];

                    $showPet = "SELECT * FROM tblpet WHERE userID = :uid;";
                    $stmt = $conn->prepare($showPet);
                    $stmt->bindParam(':uid', $userID, PDO::PARAM_INT);
                    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    $no_of_pets = $stmt->rowCount();
                    ?>

                    <select id="pet_ad" class="form-control select stored" name="pet_ad" required onchange="checkPet();">
                        <?php
                        for($i=0;$i<$no_of_pets;$i++){
                        ?>
                      <option value="<?php echo $result[$i]['petID']; ?>"><?php echo $result[$i]['petName']; ?></option>
                        <?php
                        }
                        ?>
                    </select>

                    <div id="pet_status">

                    </div>
                </div>



                <div class="form-group">
                  <label for="location"> Location</label>
                  <input type="text" id="location_ad" class="form-control stored" placeholder="location" name="location" required/>
                </div>

                <div class="form-group">
                  <label for="booking_type">What type of booking is allowed for your pet?</label>
                  <select name="booking_type" id="booking_type_ad" class="form-control select stored" required>
                    <option>Owner Supervised</option>
                    <option>Private</option>
                    <option>Owner Supervised OR Private</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="price">Price</label>
                  <input type="text" id="price" class="form-control stored" name="price" placeholder="$0.00" required/>
                </div>

                <div class="form-group">
                  <div class="form-check">
                    <label class="form-check-label" for="optionsRadios">
                      <input type="radio" class="form-check-input stored" name="optionsRadios" id="optionsRadios1" value="Hourly" checked required>
                      Hourly
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label" for="optionsRadios">
                      <input type="radio" class="form-check-input stored" name="optionsRadios" id="optionsRadios2" value="Per Person" required>
                      Per Person
                    </label>
                  </div>
                </div>

                  <button type="button" id="back_section1" class="btn btn-primary"> Back </button>

                  <button type="button" id="ad_section3" class="btn btn-primary"> Next </button>
            </div>

            <div id="ad_form_section3">

               <div>
                 <label> Select pet pictures</label>
                <input type="file" name="multiple_files" id="multiple_files" multiple />

                <span id="error_multiple_files"></span>
               </div>
               <br />
               <div id="image_table">

               </div>


                  <button type="button" id="back_section2" class="btn btn-primary"> Back </button>

                  <input type="hidden" name="action_type" value="add"/>

<input type="button" id="ad_button" class="btn btn-primary" value="Post ad" onclick="addAd(<?php echo $login_ID;?>)"/>


<!-- <button type="submit">Post ad</button> -->

            </div>

    </form>

  </div>

<?php
}
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-price-format/2.2.0/jquery.priceformat.min.js"></script>

<script type="text/javascript">


if(localStorage){
  $(document).ready(function(){
    $('.stored').phoenix({
      webStorage: 'sessionStorage'
    })
    $('#ad_button').click(function(e){
      $('.stored').phoenix('remove')
      sessionStorage.removeItem('pet_ad');
      sessionStorage.removeItem('booking_type_ad');
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
