<?php
session_start();
include "../model/db.php";

$conn = connect();
?>

<?php
// if(isset($_POST['submit_image']))
// {
// for($i=0;$i<count($_FILES["upload_file"]["name"]);$i++)
// {
// $imagename=$_FILES["upload_file"]["name"][$i];
//
// //Get the content of the image and then add slashes to it
// $imagetmp=addslashes (file_get_contents($_FILES['upload_file']['tmp_name'][$i]));
//
// move_uploaded_file($_FILES["upload_file"]["tmp_name"][$i], $imagename);




$imagename=$_FILES["upload_file"]["name"];
$imagetmp=addslashes (file_get_contents($_FILES['upload_file']['tmp_name']));
$userID = $_SESSION["userID"];


$insert_image =
   "INSERT INTO tblimagesuser (imageURL, imageName, userID) VALUES('$imagetmp','$imagename', '$userID')";

$stmt = $conn->prepare($insert_image);
$stmt->execute();


// }
// exit();
// }
?>
