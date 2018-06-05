<?php
session_start();
if(!$_SESSION['login']){
  header("location:login_page.php");
  die;
}

include '../../model/db.php';
include 'header.php';
include 'nav.php';

$conn = connect();
?>

  <div id="ads_container">

    <div id="my_ads_nav">
      <?php include 'loggedin_nav.php';?>
    </div>

      <h1 id="ads_h1">My ads</h1>

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
      $result = getUserAds();

      foreach($result as $row){
          $adTitle = $row['adTitle'];
          $loc = $row['location'];
          $price = $row['petPrice'];
          $priceType = $row['priceType'];
          $bookType = $row['bookingType'];
          $img = $row['image_name'];
          $adID = $row['adID'];

    ?>

    <?php
    if($row['inactiveAd'] == 0) {
    ?>

          <form id="show_ads_<?php echo $adID;?>">

            <div id="show_ads">
              <div id="image_preview">
                <img id="previewing" src="../img/<?php echo $img;?>" width="130px" height="130px"/>
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

              <div id="ad_buttons">
                  <a id="show_pet" href="individual_ad.php?adID=<?php echo $adID;?>">
                    <button type="button" class="btn btn-primary"> More info </button>
                  </a>

                  <input type="button" id="delete_ad_button" class="btn btn-primary" value="Delete" onclick="deleteAd(<?php echo $adID; ?>)"/>
              </div>
            </div>
          </form>
      <?php
        }
      }
      ?>

      </div>

<?php
if (count($result) == 0){
?>

<div>
  <p id="no_ads">
    You currently have no ads posted! Please <a href="post_ad.php?loginID=<?php
    echo $_SESSION['loginID']; ?>">click here</a> to post an ad.
  </p>
</div>

<?php
}
?>

    </div>

<?php include "footer.php";?>

  </body>

</html>
