<?php
session_start();
include '../model/db.php';
$conn = connect();

// $insert_registration =
//    "INSERT INTO tbllogin (loginUsername, loginPassword) VALUES ('" . $_POST['username'] . "','" . $_POST['password'] . "');";
//
// $stmt = $conn->prepare($insert_registration);
// $stmt->execute();
//
// // TO BE FIXED
// // need to check if email already exists in database while user is typing in their email in the input
//
//     if($conn->lastInsertId() > 0) {
//         $_SESSION['message'] = 'User No: ' . $conn->lastInsertId() . ' Created';
//         $_SESSION['login'] = true;
//         header('Location: ../view/html/loggedin_page.php');
//     } else {
//         $_SESSION['error'] = 'User already exists!';
//         header('Location: ../view/my-login-master/register.php');
//     }


    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {

    	$username = !empty($_POST['username'])? test_user_input(($_POST['username'])): null;
    	$password2 = !empty($_POST['password'])? test_user_input(($_POST['password'])): null;

    	$password= password_hash($password2, PASSWORD_DEFAULT);

    	try
    	{
        if($_REQUEST['action_type'] == 'add'){

            $insert_registration =
               "INSERT INTO tbllogin (loginUsername, loginPassword) VALUES ('$username', '$password');";

            $stmt = $conn->prepare($insert_registration);
            $stmt->execute();

            if($conn->lastInsertId() > 0) {
                $_SESSION['message'] = 'User No: ' . $conn->lastInsertId() . ' Created';
                $_SESSION['login'] = true;
                $_SESSION['firstname'] = $result['firstName'];
                $_SESSION['userID'] = $result['loginID'];
                header('Location: ../view/html/loggedin_page.php');
            } else {
                $_SESSION['error'] = 'User already exists!';
                header('Location: register.php');
            }
        }
    	}
    		catch(PDOException $e)
    		{
    			echo "Error: ".$e -> getMessage();
    			die();
    		}
    }

?>
