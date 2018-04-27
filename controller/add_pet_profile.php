<?php
session_start();
// header('Content-Type: application/json');
include '../model/db.php';
$conn = connect();


    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      // $petPic = !empty($_POST['file'])? test_user_input(($_POST['file'])): null;
      $petname = !empty($_POST['pet_name'])? test_user_input(($_POST['pet_name'])): null;
      $anitype = !empty($_POST['animal_type'])? test_user_input(($_POST['animal_type'])): null;
      $breed = !empty($_POST['breed_type'])? test_user_input(($_POST['breed_type'])): null;
      $petage = !empty($_POST['pet_age'])? test_user_input(($_POST['pet_age'])): null;
      $petsize = !empty($_POST['pet_size'])? test_user_input(($_POST['pet_size'])): null;

    	try
    	{
        if($_REQUEST['action_type'] == 'add'){

          if (($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "") && ($_FILES["file"]["size"] < 100000)) {

          				$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
                  $fileName = basename($_FILES['file']['name']);
          				$folderPath = "../view/img/".$fileName; // Target path where file is to be stored
          				$targetPath = "../img/".$fileName; // Target path where file is to be stored


          				//Move uploaded File
          				move_uploaded_file($sourcePath,$folderPath) ; // Moving Uploaded file


              $userID = $_SESSION['userID'];

              $insert_pet =
                 "INSERT INTO tblpet (petName, petAnimal, petBreed, petAge, petSize, updatePetDT, userID) VALUES ('$petname', '$anitype', '$breed', '$petage', '$petsize', SYSDATE(), '$userID');";

              $stmt = $conn->prepare($insert_pet);
              $stmt->execute();


              $petID = $conn->lastinsertid();

              $insert_img =
                 "INSERT INTO tblimagespet (imageURL, petID) VALUES ('$targetPath', '$petID');";

              $stmt = $conn->prepare($insert_img);
              $stmt->execute();

// fix rule to add more than one pet
              if($stmt->rowCount() < 0) {
                echo 'failed to add';
              } else {
                $_SESSION['message'] = "New pet added!";
                header('location: ../view/html/pet_profile.php?loginID='.$_GET['loginID'].'');
              }

          }else{
              $_SESSION['message'] = "Incorrect file type or size!";
              header('location: ../view/html/pet_modal.php');
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
