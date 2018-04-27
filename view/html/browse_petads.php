<?php
session_start();
include '../../model/db.php';
include 'header.php';
include 'nav.php';

$conn = connect();
?>

<div id="browse_ads">

    <h1>My First Google Map</h1>

    <div>
      <div id="map"></div>
    </div>

</div>


<div id="pet_profiles_container">


    <h1 id="pet_profile_h1">Current ads</h1>

    <div id="pet_added_msg">
      <p>
        <?php
        if(!isset($_SESSION['message'])){
          $_SESSION['message'] = "";
        }else{
        echo $_SESSION['message'];
        unset ($_SESSION['message']);
        }
        ?>
      </p>
    </div>

  <div id="pet_profiles">
    <?php
    // $login_ID = $_SESSION['loginID'];
    // $userID = $_SESSION['userID'];

    // $allPets = getAllPets($userID);

    $getAds = "SELECT * FROM tblad";
    $stmt = $conn->prepare($getAds);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $total_ads = $stmt->rowCount();

    for($i=0;$i<$total_ads;$i++){
        $adTitle = $result[$i]['adTitle'];
        $descr = $result[$i]['adDescription'];
        $loc = $result[$i]['location'];
        $price = $result[$i]['petPrice'];
        $priceType = $result[$i]['priceType'];
        $bookType = $result[$i]['bookingType'];
        // $img = $result[$i]['imageURL'];
    ?>


        <div id="pet_profiles_update_form">

            <!-- <div id="update_pet">
              <a href="petProfile.php?petID=<?php
              // echo $petID;?>&#38;loginID=<?php
              // echo $login_ID; ?>">
                <button type="button" class="btn btn-primary"> Edit </button>
              </a>
            </div> -->

<!-- Insert default image if no pet image selected -->
<?php
if(isset($img) && ($img == "../img/")) {
?>
            <!-- <div id="image_preview">
              <img id="previewing" src="<?php
              // echo $img;?>no_photo.jpg" width="130px" height="130px"/>
            </div> -->
<?php
}else {
?>
            <!-- <div id="image_preview">
              <img id="previewing" src="<?php
              // echo $img;?>" width="130px" height="130px"/>
            </div> -->
<?php
}
?>
            <hr id="line">

            <div id="pet_info">

                  <p class="pet_info_label">Ad Title: </p>
                  <p class="pet_info_value"> <?php echo $adTitle; ?> </p>

                  <p class="pet_info_label"> Description: </p>
                  <p class="pet_info_value"> <?php echo $descr; ?> </p>

                  <p class="pet_info_label"> Location: </p>
                  <p class="pet_info_value"> <?php echo $loc; ?> </p>

                  <p class="pet_info_label"> Price: </p>
                  <p class="pet_info_value"> <?php echo $price; ?> </p>

                  <p class="pet_info_label"> Price type: </p>
                  <p class="pet_info_value"> <?php echo $priceType; ?> </p>

                  <p class="pet_info_label"> Booking type: </p>
                  <p class="pet_info_value"> <?php echo $bookType; ?> </p>

            </div>

          </div>
      <?php
      }
      ?>
    </div>

  </div>

  </body>

</html>
