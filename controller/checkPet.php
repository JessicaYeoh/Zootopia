<?php
session_start();
// header('Content-Type: application/json');
include "../model/db.php";

if(isset($_POST['pet_ad']))
{

    $petID = $_POST['pet_ad'];

    $currentAd = "SELECT * FROM tblad WHERE petID = '$petID';";
    $conn = connect();
    $stmt = $conn->prepare($currentAd);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

     if($result>0)
     {
      echo "Pet ad already exists!";
     }
     else
     {
      echo "";
     }
 exit();
}
?>
