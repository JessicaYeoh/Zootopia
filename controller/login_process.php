<?php
session_start();
include '../model/db.php';
$conn = connect();
?>

<?php

// $find_userindb =
//     "SELECT * FROM tbllogin inner join tbluser on tbllogin.loginID = tbluser.loginID WHERE loginUsername = '" . $_POST['email'] . "' AND loginPassword = '" . $_POST['password'] . "';";
//
//
// $stmt = $conn->prepare($find_userindb);
// $stmt->execute();
// $result = $stmt->fetch();
//
//
// if($stmt->rowcount() == 0){
//   $_SESSION['error'] = "Login invalid please try again";
//   header('Location: ../view/my-login-master/login_page.php');
// } else {
//   $_SESSION['login'] = true;
//   $_SESSION['firstname'] = $result['firstName'];
//   $_SESSION['userID'] = $result['loginID'];
//   header('Location: ../view/html/loggedin_page.php');
// }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  	$username = !empty($_POST['email'])? test_user_input(($_POST['email'])): null;
  	$password = !empty($_POST['password'])? test_user_input(($_POST['password'])): null;
    try{
      $stmt = $conn->prepare("SELECT * FROM tbllogin inner join tbluser on tbllogin.loginID = tbluser.loginID WHERE tbllogin.loginUsername=:user;");
      $stmt->bindParam(':user', $username);
      // $stmt->bindParam(':pw', $password);
      $stmt->execute();
      $result = $stmt->fetch();
        if (password_verify($password, $result['loginPassword'])){
          // $_SESSION["adminUser"] = $username;
          $_SESSION['login'] = true;
          $_SESSION['firstname'] = $result['firstName'];
          $_SESSION['userID'] = $result['loginID'];
          header('Location: http://localhost/zootopia/view/html/loggedin_page.php');
        } else {
          $_SESSION['error'] = "Login invalid please try again";
          header('Location: http://localhost/zootopia/view/my-login-master/login_page.php');
        }
    }
    catch(PDOException $e) {
      echo "Account creation problems".$e -> getMessage();
      die();
    }
  }
