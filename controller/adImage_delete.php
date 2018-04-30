<?php
//delete.php
session_start();

include('../model/db.php');
$conn = connect();

if(isset($_POST["adImageID"]))
{
 $file_path = '../view/img/' . $_POST["image_name"];
 if(unlink($file_path))
 {
  $query = "DELETE FROM tbladimages WHERE adImageID = '".$_POST["adImageID"]."';";
  $statement = $conn->prepare($query);
  $statement->execute();
 }
}

?>
