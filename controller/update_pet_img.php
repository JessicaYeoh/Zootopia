<?php
session_start();
// header('Content-Type: application/json');
include '../model/db.php';
$conn = connect();


    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {

    	try
    	{
        if($_REQUEST['action_type'] == 'add'){

          if (($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "")) {

          				$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
                  $fileName = basename($_FILES['file']['name']);
          				$folderPath = "../view/img/".$fileName; // Target path where file is to be stored
          				$targetPath = "../img/".$fileName; // Target path where file is to be stored

          				//Move uploaded File
          				move_uploaded_file($sourcePath,$folderPath) ; // Moving Uploaded file


                  $login_ID = $_GET['loginID'];
                  $pet_ID = $_GET['petID'];

                  $updateImg = "UPDATE tblimagespet
                  SET imageURL = '$targetPath'
                  WHERE petID = :pid;";
                  $stmt = $conn->prepare($updateImg);
                  $stmt->bindParam(':pid', test_user_input($pet_ID), PDO::PARAM_INT);
                  $stmt->execute();

                  // $_SESSION['message'] = "Incorrect file type!";
                  header('location: ../view/html/petProfile.php?petID='.$pet_ID.'&loginID='.$login_ID.'');

          }else{
              $_SESSION['message'] = "Incorrect file type!";
              header('location: ../view/html/pet_modal.php?petID='.$pet_ID.'');
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
