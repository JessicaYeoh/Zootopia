<?php
session_start();
include "../model/db.php";

// $_GET['email'] --> gets email value from ajax URL
if(isset($_GET['email']))
{
    $username=$_GET['email'];

    $checkdata=" SELECT loginUsername FROM tbllogin WHERE loginUsername='$username' ";
    $conn = connect();
    $stmt = $conn->prepare($checkdata);
    $stmt->execute();
    $result = $stmt->fetch();

 if($result>0)
 {
  echo "Email Already Exists!";
 }
 else
 {
  echo "";
 }
 exit();
}

?>
