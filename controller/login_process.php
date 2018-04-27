<?php
session_start();
include '../model/db.php';
$conn = connect();

login();

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//   	$username = !empty($_POST['email'])? test_user_input(($_POST['email'])): null;
//   	$password = !empty($_POST['password'])? test_user_input(($_POST['password'])): null;
//     try{
//       $stmt = $conn->prepare("SELECT * FROM tbllogin WHERE loginUsername=:user;");
//       $stmt->bindParam(':user', $username);
//       $stmt->execute();
//       $result = $stmt->fetch();
//
//         if (password_verify($password, $result['loginPassword'])){
//           $_SESSION['login'] = true;
//           $_SESSION['firstname'] = $result['firstName'];
//           $_SESSION['loginID'] = $result['loginID'];
//           $_SESSION['username'] = $username;
//           $_SESSION['userID'] = $result['userID'];
//           header('Location: http://localhost/zootopia/view/html/loggedin_page.php');
//         } else {
//           $_SESSION['error'] = "Login invalid please try again";
//           header('Location: http://localhost/zootopia/view/my-login-master/login_page.php');
//         }
//     }
//     catch(PDOException $e) {
//       echo "Account creation problems".$e -> getMessage();
//       die();
//     }
//   }
?>
