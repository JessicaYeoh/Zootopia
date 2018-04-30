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


<div id="ads_container">


    <h1 id="ads_h1">Current ads</h1>

    <div id="ad_added_msg">
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

  <div id="individual_ad">
    <?php
    // $login_ID = $_SESSION['loginID'];
    // $userID = $_SESSION['userID'];

    // $allPets = getAllPets($userID);

    $getAds = "SELECT * FROM tblad
    INNER JOIN tbladimages ON tblad.adID = tbladimages.adID
    INNER JOIN tblpet ON tblpet.petID = tblad.petID
    INNER JOIN tbluser ON tbluser.userID = tblpet.userID
    INNER JOIN tbllogin ON tbllogin.loginID = tbluser.loginID
    ";
    $stmt = $conn->prepare($getAds);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $total_ads = $stmt->rowCount();

    for($i=0;$i<$total_ads;$i++){
        $adTitle = $result[$i]['adTitle'];
        // $descr = $result[$i]['adDescription'];
        $loc = $result[$i]['location'];
        $price = $result[$i]['petPrice'];
        $priceType = $result[$i]['priceType'];
        $bookType = $result[$i]['bookingType'];
        $img = $result[$i]['image_name'];
        $adID = $result[$i]['adID'];
    ?>


        <div id="show_ads">


            <div id="image_preview">
              <img id="previewing" src="../img/<?php
              echo $img;?>" width="130px" height="130px"/>
            </div>

            <hr id="line">

            <div id="ad_info">

                  <p class="ad_info_label">Ad Title: </p>
                  <p class="ad_info_value"> <?php echo $adTitle; ?> </p>

                  <!-- <p class="ad_info_label"> Description: </p>
                  <p class="ad_info_value"> <?php
                  // echo $descr; ?> </p> -->

                  <p class="ad_info_label"> Location: </p>
                  <p class="ad_info_value"> <?php echo $loc; ?> </p>

                  <p class="ad_info_label"> Price: </p>
                  <p class="ad_info_value"> <?php echo $price; ?> </p>

                  <p class="ad_info_label"> Price type: </p>
                  <p class="ad_info_value"> <?php echo $priceType; ?> </p>

                  <p class="ad_info_label"> Booking type: </p>
                  <p class="ad_info_value"> <?php echo $bookType; ?> </p>

            </div>

<button class="btn btn-primary">Book Now</button>


<a id="show_pet" href="individual_ad.php?adID=<?php echo $adID;?>">
  <button type="button" class="btn btn-primary"> More info </button>
</a>
          </div>
      <?php
      }
      ?>
    </div>

  </div>

  </body>

</html>
