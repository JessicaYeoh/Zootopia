<?php
session_start();

include '../../model/db.php';
include 'header.php';
include 'nav.php';
$conn = connect();



$ad_ID = $_GET['adID'];

$adInfo = getOneAd($ad_ID);

$title = $adInfo['adTitle'];
$descr = $adInfo['adDescription'];
$loc = $adInfo['location'];
$price = $adInfo['petPrice'];
$ptype = $adInfo['priceType'];
$btype = $adInfo['bookingType'];


$firstName = $adInfo['firstName'];
$email = $adInfo['loginUsername'];
$phone = $adInfo['phone'];
$img = $adInfo['image_name'];
?>



<div id="single_ad">

        <div class="ad-group">
          <h3 id="ad_title"> <?php echo $title;?> </h3>
        </div>

        <div class="ad-group">
          <h5>Posted by:</h5>
          <p id="ad_name"> <?php echo $firstName;?> </p>
        </div>

        <div class="ad-group">
          <h5>Location:</h5>
          <p id="ad_loc"> <?php echo $loc;?> </p>
        </div>

        <div class="ad-group">
          <h5>Contact:</h5>
          <p id="ad_email"> <?php echo $email;?> </p>
          <p id="ad_ph"> <?php echo $phone;?> </p>
        </div>

        <div class="ad-group">
          <img id="previewing" src="../img/<?php
          echo $img;?>" width="130px" height="130px"/>
        </div>

        <div class="ad-group">
          <h5>Description</h5>
          <p id="ad_desrc"> <?php echo $descr;?> </p>
        </div>

        <div class="ad-group">
          <h5>Price</h5>
          <p id="ad_price"> <?php echo $price;?> </p>
        </div>

        <div class="ad-group">
          <h5>Price type</h5>
          <p id="ad_ptype"> <?php echo $ptype;?> </p>
        </div>

        <div class="ad-group">
          <h5>Booking type</h5>
          <p id="ad_btype"> <?php echo $btype;?> </p>
        </div>

<button class="btn btn-primary">Book Now</button>

</div>
