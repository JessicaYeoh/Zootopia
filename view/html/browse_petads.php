<?php
session_start();
include '../../model/db.php';
include 'header.php';
include 'nav.php';

$conn = connect();
?>

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
    $result = getAllAds();

    foreach($result as $row){
        $adTitle = $row['adTitle'];
        $loc = $row['location'];
        $price = $row['petPrice'];
        $priceType = $row['priceType'];
        $bookType = $row['bookingType'];
        $img = $row['image_name'];
        $adID = $row['adID'];
    ?>


        <div id="show_ads">


            <div id="image_preview">
              <?php
              if(isset($img)){
              ?>
              <img id="previewing" src="../img/<?php
              echo $img;?>" width="130px" height="130px"/>
              <?php
              }else{
              ?>
              <img id="previewing" src="../img/no_photo.jpg" width="130px" height="130px"/>
              <?php
              }
              ?>
            </div>

            <hr id="line">

            <div id="ad_info">

                  <p class="ad_info_label">Ad Title: </p>
                  <p class="ad_info_value"> <?php echo $adTitle; ?> </p>

                  <p class="ad_info_label"> Location: </p>
                  <p class="ad_info_value"> <?php echo $loc; ?> </p>

                  <p class="ad_info_label"> Price: </p>
                  <p class="ad_info_value"> <?php echo $price; ?> </p>

                  <p class="ad_info_label"> Price type: </p>
                  <p class="ad_info_value"> <?php echo $priceType; ?> </p>

                  <p class="ad_info_label"> Booking type: </p>
                  <p class="ad_info_value"> <?php echo $bookType; ?> </p>

            </div>

            <div id="book_minfo">
              <button class="btn btn-primary">Book Now</button>


              <a id="show_pet" href="individual_ad.php?adID=<?php echo $adID;?>">
                <button type="button" class="btn btn-primary"> More info </button>
              </a>
            </div>

          </div>
      <?php
      }
      ?>
    </div>

  </div>

  <div id="browse_ads">

      <h1>My First Google Map</h1>

      <div>
        <div id="map"></div>
      </div>

  </div>

  </body>

</html>
