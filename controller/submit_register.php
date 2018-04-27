<?php
session_start();
include '../model/db.php';
$conn = connect();

register();

//     if ($_SERVER["REQUEST_METHOD"] == "POST")
//     {
//       $firstname = !empty($_POST['first_name'])? test_user_input(($_POST['first_name'])): null;
//       $lastname = !empty($_POST['last_name'])? test_user_input(($_POST['last_name'])): null;
//
//       $username = !empty($_POST['username'])? test_user_input(($_POST['username'])): null;
//     	$password2 = !empty($_POST['password'])? test_user_input(($_POST['password'])): null;
//
//     	$password= password_hash($password2, PASSWORD_DEFAULT);
//
//     	try
//     	{
//         if($_REQUEST['action_type'] == 'add'){
//
//           $stmt = $conn->prepare("SELECT * FROM tbllogin WHERE loginUsername=:uname;");
//           $stmt->bindParam(':uname', $username);
//           $stmt->execute();
//           $result = $stmt->fetch();
//
//
//             if($stmt->rowCount() > 0) {
//                $_SESSION['error'] = 'User already exists!';
//                header('Location: http://localhost/zootopia/view/my-login-master/register.php');
//
//             } else {
//
//
//               $insert_registration =
//                  "INSERT INTO tbllogin (loginUsername, loginPassword, firstName, lastName, updateDT) VALUES ('$username', '$password', '$firstname', '$lastname', SYSDATE());";
//
//               $stmt = $conn->prepare($insert_registration);
//               $stmt->execute();
//
//
// $loginID = $conn->lastInsertId();
//
//               $insert_user =
//                  "INSERT INTO tbluser (phone, isOwner, isCustomer, updateDT, loginID) VALUES ('', '', '', SYSDATE(), $loginID);";
//
//               $stmt = $conn->prepare($insert_user);
//               $stmt->execute();
//
//
// $userID = $conn->lastInsertId();
//
//               $insert_address =
//                  "INSERT INTO tbladdress (suburb, postcode, state, updateDT, userID) VALUES ('', '', '', SYSDATE(), $userID);";
//
//               $stmt = $conn->prepare($insert_address);
//               $stmt->execute();
//
//               $insert_user_image =
//                  "INSERT INTO tblimagesuser (imageURL, userID) VALUES ('', $userID);";
//
//               $stmt = $conn->prepare($insert_user_image);
//               $stmt->execute();
//
//
//               $stmt = $conn->prepare("SELECT * FROM tbllogin INNER JOIN tbluser ON tbllogin.loginID = tbluser.loginID WHERE tbllogin.loginUsername = :uname;");
//               $stmt->bindParam(':uname', $username);
//               $stmt->execute();
//               $result = $stmt->fetch();
//
//               $_SESSION['login'] = true;
//               $_SESSION['firstname'] = $firstname;
//               $_SESSION['loginID'] = $result['loginID'];
//               $_SESSION['username'] = $username;
//               $_SESSION['userID'] = $result['userID'];
//
//
//               header('Location: http://localhost/zootopia/view/html/loggedin_page.php');
//             }
//         }
//     	}
//     		catch(PDOException $e)
//     		{
//     			echo "Error: ".$e -> getMessage();
//     			die();
//     		}
//     }

?>
