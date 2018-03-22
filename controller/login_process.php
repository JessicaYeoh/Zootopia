<?php
  session_start();
?>

<?php
include '../model/db.php';
// include 'session.php';
$conn = connect();
?>

<?php

$find_userindb =
    "SELECT * FROM tbllogin inner join tbluser on tbllogin.loginID = tbluser.loginID WHERE loginUsername = '" . $_POST['email'] . "' AND loginPassword = '" . $_POST['password'] . "';";


$stmt = $conn->prepare($find_userindb);
$stmt->execute();
$result = $stmt->fetch();


if($stmt->rowcount() == 0){
  $_SESSION['error'] = "Login invalid please try again";
  header('Location: ../view/my-login-master/login_page.php');
} else {
  $_SESSION['login'] = true;
  $_SESSION['firstname'] = $result['firstName'];
  $_SESSION['userID'] = $result['loginID'];
  header('Location: ../view/html/loggedin_page.php');
}
