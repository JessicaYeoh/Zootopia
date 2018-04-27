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

    	try
    	{
        if($_REQUEST['action_type'] == 'add'){

          $petSessionID = $_SESSION['userID'];

          $stmt = $conn->prepare("SELECT * FROM tblpet WHERE userID = '$petSessionID';");
          $stmt->execute();
          $result = $stmt->fetch();

          $petID = $result['petID'];

              $insert_booking =
                 "INSERT INTO tblbookings (dateBooked, startTimeBooked, finishTimeBooked, priceBooked, petBooked, petID, userID) VALUES ('$bookDate', '$start', '$finish', '$price', '$pet', '$petID', '$petSessionID');";

              $stmt = $conn->prepare($insert_booking);
              $stmt->execute();

// fix rule to add more than one pet
              if($stmt->rowCount() < 0) {
                echo 'failed to add';
              } else {
                echo 'booking added';
            }
        }
    	}
    		catch(PDOException $e)
    		{
    			echo "Error: ".$e -> getMessage();
    			die();
    		}
    }

?>
