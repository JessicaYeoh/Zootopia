<?php
session_start();
include '../model/db.php';
$conn = connect();


    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $pet = !empty($_POST['pet_ad'])? test_user_input(($_POST['pet_ad'])): null;


      $adTitle = !empty($_POST['ad_title'])? test_user_input(($_POST['ad_title'])): null;
      $descript = !empty($_POST['description'])? test_user_input(($_POST['description'])): null;
      $location = !empty($_POST['location'])? test_user_input(($_POST['location'])): null;
      $booking = !empty($_POST['booking_type'])? test_user_input(($_POST['booking_type'])): null;
      $price = !empty($_POST['price'])? test_user_input(($_POST['price'])): null;
      $radios = !empty($_POST['optionsRadios'])? test_user_input(($_POST['optionsRadios'])): null;

    	try
    	{
        if($_REQUEST['action_type'] == 'add'){

              $petID = $_GET['petID'];

              // $currentAd = "SELECT * FROM tblad WHERE petID = '$petID';";
              // $stmt = $conn->prepare($currentAd);
              // $stmt->execute();
              // $result = $stmt->fetch(PDO::FETCH_ASSOC);
              //
              // $ad_count = $stmt->rowCount();
              //
              // if($ad_count > 0) {
              //   $_SESSION['message'] = "Pet ad already exists!";
              // } else {

              $insert_ad =
                 "INSERT INTO tblad (adTitle, adDescription, location, petPrice, priceType, bookingType, updateAdDT, petID) VALUES ('$adTitle', '$descript', '$location', '$price', '$radios', '$booking', SYSDATE(), '$petID');";

              $stmt = $conn->prepare($insert_ad);
              $stmt->execute();

              $adID = $conn->lastinsertid();

              // UPDATE AD IMAGES adID
              $updateAdImgs = "UPDATE tbladimages
              SET adID = '$adID'
              WHERE adID = :aid;";
              $stmt = $conn->prepare($updateAdImgs);

              $stmt->bindParam(':aid', test_user_input($petID), PDO::PARAM_INT);
              $stmt->execute();
          // }
        }
    	}
    		catch(PDOException $e)
    		{
    			echo "Error: ".$e -> getMessage();
    			die();
    		}
    }

?>
