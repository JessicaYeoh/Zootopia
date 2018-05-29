<?php
session_start();
header('Content-Type: application/json');
include '../model/db.php';
$conn = connect();


if(isset($_SESSION['loginID']) && empty($_POST)) {

    $result = getOneUser($_SESSION['loginID']);

    if(is_array($result)) {
      echo json_encode($result);
    } else {
      echo json_encode(Array('userdata'=>false));
    }
    exit();
}

if(isset($_SESSION['loginID']) && !empty($_POST)) {

  if(updateUser($_POST, $_SESSION['loginID'])) {
    echo json_encode(Array('userUpdate'=>true));
  } else {
    echo json_encode(Array('userUpdate'=>false));
  }
  exit();
}

?>
