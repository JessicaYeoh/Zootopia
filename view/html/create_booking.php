<?php
session_start();
if(!$_SESSION['login']){
  header("location:login_page.php");
  die;
}

include '../../model/db.php';
$conn = connect();

include 'header.php';
include 'nav.php';

$loginID = $_SESSION['loginID'];
$result = getOneUser($loginID);

if($result['isOwner'] == "YES") {

?>

    <div id="create_booking_page">

    <div class="loader"><img src="../img/loader.svg"/></div>

        <div id="booking_nav">
          <?php include 'loggedin_nav.php';?>
        </div>


        <h1 id="create_booking_h1">Create Booking</h1>

        <div id="create_booking_container">
          <form id="create_booking_form" method="post">

                <div class="form-row">
                  <div class="form-group col-md-6">
                      <label class="control-label" for="book_date">Booking Date</label>

                      <div class="input-group">
                          <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                          </div>

                          <input class="form-control stored" id="book_date" name="book_date" placeholder="DD/MM/YYYY" type="text"/>
                      </div>
                  </div>

                  <div class="form-group col-md-6">
                    <div class="form-group">
                      <label for="pet">Pet</label>

                      <?php
                        $userID = $_SESSION['userID'];
                        $result = userPets($userID);
                      ?>

                      <select id="pet" class="form-control" name="pet">
                          <?php
                          foreach($result as $row){
                          ?>
                              <option><?php echo $row['petName']; ?></option>
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

                        <input type="text" class="form-control stored" id="start" name="start" value="<?php ?>" placeholder="HH:MM">
                      </div>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="finish">Finish time</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-clock-o" aria-hidden="true"></i>
                        </div>

                        <input id="finish" type="text" class="form-control stored" name="finish" value="<?php ?>" placeholder="HH:MM">
                    </div>
                  </div>
                </div>


                <div class="form-row">
                  <div class="form-group col-md-6">
                      <label for="agreed_price">Price</label>
                      <input id="agreed_price" type="text" class="form-control stored" name="agreed_price" value="<?php ?>" placeholder="$0.00">
                  </div>

                  <div class="form-group col-md-6">
                      <label for="priceType">Price type</label>
                      <select name="priceType" id="price_type" class="form-control stored">
                        <option>Per hour</option>
                        <option>Per person</option>
                      </select>
                  </div>

                </div>


                <input type="hidden" name="action_type" value="add"/>


                <input type="submit" value="Submit" id="booking_button" class="btn btn-primary"/>


            </form>

          </div>

      </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-price-format/2.2.0/jquery.priceformat.min.js"></script>

    <script type="text/javascript">

    if(localStorage){
      $(document).ready(function(){
        $('.stored').phoenix();
        $('#booking_button').click(function(e){
            $('.stored').phoenix('remove');
            sessionStorage.removeItem('pet');
            sessionStorage.removeItem('price_type');
        });

        $('#pet').change(function() {
            sessionStorage.setItem(this.id, this.value);
        }).val(function() {
            return sessionStorage.getItem(this.id)
        });

        $('#price_type').change(function() {
            sessionStorage.setItem(this.id, this.value);
        }).val(function() {
            return sessionStorage.getItem(this.id)
        });
      });
    } else{
        alert("Sorry, your browser do not support local storage.");
    }
    </script>

<?php
}else{
?>

<div id="create_booking_page">
    <div id="booking_nav">
      <?php include 'loggedin_nav.php';?>
    </div>

    <h1 id="create_booking_h1">Create Booking</h1>

    <div id="create_booking_container">
      <form id="create_booking_form">
        <p style="text-align: center; margin: 0;">
            Must be a pet owner to create booking!
        </p>
      </form>
    </div>
</div>


<?php
}
?>

<?php include "footer.php";?>

</body>
