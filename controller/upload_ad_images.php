<?php
//upload.php
session_start();
include('../model/db.php');
$conn = connect();

if(count($_FILES["file"]["name"]) > 0)
{
 //$output = '';
 sleep(3);
 for($count=0; $count<count($_FILES["file"]["name"]); $count++)
 {
  $file_name = $_FILES["file"]["name"][$count];
  $tmp_name = $_FILES["file"]['tmp_name'][$count];
  $file_array = explode(".", $file_name);
  $file_extension = end($file_array);
  if(file_already_uploaded($file_name, $conn))
  {
   $file_name = $file_array[0] . '.' . $file_extension;
    // echo "file already exists!";
  }
  $location = '../view/img/' . $file_name;
  if(move_uploaded_file($tmp_name, $location))
  {

// $userID = $_SESSION['userID'];
$petID = $_GET['petID'];

//     $query = "SELECT * FROM tblpet WHERE petID = '$petID';";
//     $statement = $conn->prepare($query);
//     $statement->execute();
//     $result = $statement->fetch(PDO::FETCH_ASSOC);
//
// $pet_ID = $result['petID'];

   $query = "
   INSERT INTO tbladimages (image_name, adID)
   VALUES ('".$file_name."', '$petID');
   ";
   $statement = $conn->prepare($query);
   $statement->execute();
  }
 }
}

function file_already_uploaded($file_name, $conn)
{

 $query = "SELECT * FROM tbladimages WHERE image_name = '".$file_name."'";
 $statement = $conn->prepare($query);
 $statement->execute();
 $number_of_rows = $statement->rowCount();
 if($number_of_rows > 0)
 {
  return true;
 }
 else
 {
  return false;
 }
}

?>
