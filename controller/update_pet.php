<?php
session_start();
header('Content-Type: application/json');
include '../model/db.php';
$conn = connect();


if(isset($_GET['petID']) && empty($_POST)) {

    $result = getOnePet($_GET['petID']);

    if(is_array($result)) {
      echo json_encode($result);
    } else {
      echo json_encode(Array('petdata'=>false));
    }
    exit();
}

if(isset($_GET['petID']) && !empty($_POST)) {

    if(update_pet($_POST, $_GET['petID'])) {
      echo json_encode(Array('petUpdate'=>true));
    } else {
      echo json_encode(Array('petUpdate'=>false));
    }
    exit();
}

?>
