<?php
session_start();
header('Content-Type: application/json');
include '../model/db.php';
$conn = connect();

$login_ID = $_GET['loginID'];

if(isset($login_ID)) {
  // if($_GET['loginID'] == $_SESSION['userID']) {
    $result = getOneUser($login_ID);
    if(is_array($result)) {
      echo json_encode($result);
    } else {
      echo json_encode(Array('userdata'=>false));
    }
  // }
}

if(isset($_POST)) {

  if(updateUser($_POST, $login_ID)) {
   //  echo json_encode(Array('userUpdate'=>true));
      return true;
  } else {
   //  echo json_encode(Array('userUpdate'=>false));
      return false;
  }
  exit();
}



?>
