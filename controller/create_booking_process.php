<?php
session_start();
include '../model/db.php';
$conn = connect();


    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $bookDate = !empty($_POST['book_date'])? test_user_input(($_POST['book_date'])): null;
      $start = !empty($_POST['start'])? test_user_input(($_POST['start'])): null;
      $finish = !empty($_POST['finish'])? test_user_input(($_POST['finish'])): null;
      $price = !empty($_POST['agreed_price'])? test_user_input(($_POST['agreed_price'])): null;
      $pet = !empty($_POST['pet'])? test_user_input(($_POST['pet'])): null;
      $priceType = !empty($_POST['priceType'])? test_user_input(($_POST['priceType'])): null;


    	try
    	{
        if($_REQUEST['action_type'] == 'add'){

          $userID = $_SESSION['userID'];

          $stmt = $conn->prepare("SELECT * FROM tblpet WHERE petName = '$pet' AND userID = '$userID';");
          $stmt->execute();
          $result = $stmt->fetchAll();

          $petID = $result[0]['petID'];

              $insert_booking =
                 "INSERT INTO tblbookings (dateBooked, startTimeBooked, finishTimeBooked, priceBooked, priceType, petBooked, petID, userID) VALUES ('$bookDate', '$start', '$finish', '$price', '$priceType', '$pet', '$petID', '$userID');";

              $stmt = $conn->prepare($insert_booking);
              $stmt->execute();


            //   if($stmt->rowCount() < 0) {
            //     echo 'failed to add';
            //   } else {
            //     echo 'booking added';
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
