<?php
session_start();
include '../model/db.php';
$conn = connect();


    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $adTitle = !empty($_POST['ad_title'])? test_user_input(($_POST['ad_title'])): null;
      $descript = !empty($_POST['description'])? test_user_input(($_POST['description'])): null;
      $location = !empty($_POST['location'])? test_user_input(($_POST['location'])): null;
      $booking = !empty($_POST['booking_type'])? test_user_input(($_POST['booking_type'])): null;
      $price = !empty($_POST['price'])? test_user_input(($_POST['price'])): null;
      $radios = !empty($_POST['optionsRadios'])? test_user_input(($_POST['optionsRadios'])): null;

    	try
    	{
        if($_REQUEST['action_type'] == 'add'){

              $petSessionID = $_SESSION['userID'];

              $stmt = $conn->prepare("SELECT * FROM tblpet WHERE userID = '$petSessionID';");
              $stmt->execute();
              $result = $stmt->fetch();

              $petID = $result['petID'];



              $insert_ad =
                 "INSERT INTO tblad (adTitle, adDescription, location, petPrice, priceType, bookingType, updateAdDT, petID) VALUES ('$adTitle', '$descript', '$location', '$price', '$radios', '$booking', SYSDATE(), '$petID');";

              $stmt = $conn->prepare($insert_ad);
              $stmt->execute();

        }
    	}
    		catch(PDOException $e)
    		{
    			echo "Error: ".$e -> getMessage();
    			die();
    		}
    }

?>
