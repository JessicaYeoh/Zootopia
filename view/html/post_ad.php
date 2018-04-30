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

if($result['isCustomer'] == "YES" && ($result['isOwner'] == "" || $result['isOwner'] == NULL)){
  // $_SESSION['message'] = '<script language="javascript"> alert("You must be a pet owner to post ads!") </script>';
  header('location: loggedin_page.php?loginID='.$login_ID.'');
}

include 'nav.php';
?>



    <div id="post_ad_container">
        <h1 id="ad_h1">Post your ad</h1>

      <form id="ad_form">

          <div id="ad_form_section1">

                  <div class="form-group">
                    <label for="ad_title">Ad Title</label>
                    <input type="text" class="form-control" id="ad_title" placeholder="e.g. German Sheperd puppy - 4 months old" name="ad_title" required>
                  </div>

                  <div class="form-group">
                    <label for="description">Describe what you're offering</label>
                    <textarea class="form-control" id="description" rows="6" placeholder="e.g. Owner supervised visits, minimum 1hr bookings, play with my german sheperd puppy in my backyard" name="description" required></textarea>
                  </div>

                  <button class="btn btn-primary" onclick="showSection2();return false;"> Next </button>

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

                    <select id="pet_ad" class="form-control" name="pet_ad" required>
                        <?php
                        for($i=0;$i<$no_of_pets;$i++){
                        ?>
                      <option value="<?php echo $result[$i]['petID']; ?>"><?php echo $result[$i]['petName']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <?php
                if (!isset($_SESSION['message'])){
                    $_SESSION['message'] = "";
                }
                echo $_SESSION['message'];
                unset ($_SESSION['message']);
                ?>

                <div class="form-group">
                  <label for="location"> Location</label>
                  <input type="text" class="form-control" placeholder="location" name="location" required/>
                </div>

                <div class="form-group">
                  <label for="booking_type">What type of booking is allowed for your pet?</label>
                  <select name="booking_type" class="form-control" required>
                    <option>Owner Supervised</option>
                    <option>Private</option>
                    <option>Owner Supervised OR Private</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="price">Price</label>
                  <input type="text" id="price" class="form-control" name="price" placeholder="$0.00" required/>
                </div>

                <div class="form-group">
                  <div class="form-check">
                    <label class="form-check-label" for="optionsRadios">
                      <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="Hourly" checked required>
                      Hourly
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label" for="optionsRadios">
                      <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="Per Person" required>
                      Per Person
                    </label>
                  </div>
                </div>

                  <button class="btn btn-primary" onclick="showSection1();return false;"> Back </button>

                  <button class="btn btn-primary" onclick="showSection3();return false;"> Next </button>
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



                  <button class="btn btn-primary" onclick="showSection2();return false;"> Back </button>

                  <input type="hidden" name="action_type" value="add"/>

                  <input type="button" class="btn btn-primary" value="Post ad" onclick="addAd(<?php echo $login_ID;?>)"/>


            </div>

    </form>










  </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-price-format/2.2.0/jquery.priceformat.min.js"></script>

</body>
