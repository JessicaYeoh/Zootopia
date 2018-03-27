<?php
session_start();
include '../model/db.php';
$conn = connect();


    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $firstname = !empty($_POST['first_name'])? test_user_input(($_POST['first_name'])): null;
      $lastname = !empty($_POST['last_name'])? test_user_input(($_POST['last_name'])): null;

      $username = !empty($_POST['username'])? test_user_input(($_POST['username'])): null;
    	$password2 = !empty($_POST['password'])? test_user_input(($_POST['password'])): null;

    	$password= password_hash($password2, PASSWORD_DEFAULT);

    	try
    	{
        if($_REQUEST['action_type'] == 'add'){

          $stmt = $conn->prepare("SELECT * FROM tbllogin WHERE firstName=:fname;");
          $stmt->bindParam(':fname', $firstname);
          $stmt->execute();
          $result = $stmt->fetch();


            if($stmt->rowCount() > 0) {
               $_SESSION['error'] = 'User already exists!';
               header('Location: http://localhost/zootopia/view/my-login-master/register.php');

            } else {


              $insert_registration =
                 "INSERT INTO tbllogin (loginUsername, loginPassword, firstName, lastName) VALUES ('$username', '$password', '$firstname', '$lastname');";

              $stmt = $conn->prepare($insert_registration);
              $stmt->execute();

              $_SESSION['login'] = true;
              $_SESSION['firstname'] = $firstname;
              $_SESSION['userID'] = $_POST['loginID'];
              $_SESSION['username'] = $username;

              header('Location: http://localhost/zootopia/view/html/loggedin_page.php');
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
