<?php
session_start();
include '../model/db.php';
$conn = connect();

$insert_registration =
   "INSERT INTO tbllogin (loginUsername, loginPassword) VALUES ('" . $_POST['username'] . "','" . $_POST['password'] . "');";

$stmt = $conn->prepare($insert_registration);
$stmt->execute();

// TO BE FIXED
// need to check if email already exists in database while user is typing in their email in the input

    if($conn->lastInsertId() > 0) {
        $_SESSION['message'] = 'User No: ' . $conn->lastInsertId() . ' Created';
        header('Location: ../view/html/loggedin_page.php');
    } else {
        $_SESSION['error'] = 'User already exists!';
        header('Location: ../view/my-login-master/register.php');
    }


?>
