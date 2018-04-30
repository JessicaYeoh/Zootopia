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

<div id="create_booking_page">

    <div id="booking_nav">
      <?php include 'loggedin_nav.php';?>
    </div>


    <h1 id="create_booking_h1">Create Booking</h1>

    <div id="create_booking_container">
      <form id="create_booking_form">

            <div class="form-row">
              <div class="form-group col-md-6">
                  <label class="control-label" for="book_date">Booking Date</label>

                  <div class="input-group">
                      <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                      </div>

                      <input class="form-control" id="book_date" name="book_date" placeholder="DD/MM/YYYY" type="text" value="<?php ?>" required/>
                  </div>
              </div>

              <div class="form-group col-md-6">
                <div class="form-group">
                  <label for="pet">Pet</label>

                  <?php

                  $userID = $_SESSION['userID'];

                        $showPet = "SELECT * FROM tblpet WHERE userID = :uid;";
                        $stmt = $conn->prepare($showPet);
                        $stmt->bindParam(':uid', $userID, PDO::PARAM_INT);
                        $stmt->execute();
                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        $no_of_pets = $stmt->rowCount();
                  ?>

                  <select id="pet" class="form-control" name="pet" required>
                      <?php
                      for($i=0;$i<$no_of_pets;$i++){
                      ?>
                    <option><?php echo $result[$i]['petName']; ?></option>
                      <?php
                      }
                      ?>
                  </select>

                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="start">Start time</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-clock-o" aria-hidden="true"></i>
                    </div>

                    <input type="text" class="form-control" id="start" name="start" value="<?php ?>" placeholder="HH:MM" required>
                  </div>
              </div>

              <div class="form-group col-md-6">
                <label for="finish">Finish time</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-clock-o" aria-hidden="true"></i>
                    </div>

                    <input id="finish" type="text" class="form-control" name="finish" value="<?php ?>" placeholder="HH:MM" required>
                </div>
              </div>
            </div>


            <div class="form-row">
              <div class="form-group col-md-6">
                  <label for="agreed_price">Price</label>
                  <input id="agreed_price" type="text" class="form-control" name="agreed_price" value="<?php ?>" required placeholder="$0.00">
              </div>

              <div class="form-group col-md-6" id="price_radios">
                  <div class="form-check create-booking">
                    <label class="form-check-label" for="priceType">
                      <input type="radio" class="form-check-input" name="priceType" id="optionsRadios1" value="Hourly" checked>
                      Hourly
                    </label>
                  </div>
                  <div class="form-check create-booking">
                    <label class="form-check-label" for="priceType">
                      <input type="radio" class="form-check-input" name="priceType" id="optionsRadios2" value="Per Person">
                      Per Person
                    </label>
                  </div>
              </div>
            </div>




            <input type="hidden" name="action_type" value="add"/>


            <input type="button" class="btn btn-primary" value="Create Booking" onclick="addBooking(<?php echo $login_ID;?>)"/>


            <div id="message"></div>

        </form>
      </div>

  </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-price-format/2.2.0/jquery.priceformat.min.js"></script>

</body>
