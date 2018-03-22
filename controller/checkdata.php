<?php
session_start();
// header('Content-Type: application/json');

if(isset($_POST['user_name']))
{
    $username=$_POST['user_name'];

    $checkdata=" SELECT loginUsername FROM tbllogin WHERE loginUsername='$username' ";
    $conn = new PDO("mysql:host=localhost;dbname=zootopia", 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare($checkdata);
    $stmt->execute();
    $result = $stmt->fetch();

 if($result>0)
 {
  echo "Email Already Exists!";
  // echo json_encode(Array('userExists'=>false));
  // echo json_encode($result);
 }
 else
 {
  echo "";
  // echo json_encode(Array('userExists'=>true));
 }
 exit();
}
?>
