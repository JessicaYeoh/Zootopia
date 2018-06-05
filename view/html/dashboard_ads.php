

<!-- <div id="dashboard_ad"> -->
<h4 class="show_dash_ad1">Your ads</h4>

<div class="show_dash_ad2">
  <a href="post_ad.php?loginID=<?php echo $_SESSION['loginID'];?>" class="btn btn-primary">Post a pet</a>
</div>

<?php
  $result = getThreeAds();

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
        <div class="show_dash_ad3">
            <div id="dashboard_ad_img">
              <img id="previewing" src="../img/<?php echo $img;?>" width="100px" height="100px"/>
            </div>

            <div id="dashboard_ad_info">
                <p><?php echo $adTitle; ?> </p>
            </div>

            <div id="dashboard_ad_buttons">
                <a id="show_pet" href="individual_ad.php?adID=<?php echo $adID;?>">
                  <button type="button" class="btn btn-primary"> More info </button>
                </a>
            </div>
          </div>
    <?php
      }
  }
  ?>

  <!-- </div> -->
