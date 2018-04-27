<?php
function connect(){
  try {
      $conn = new PDO("mysql:host=localhost;dbname=zootopia", 'root', '');
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      }
  catch(PDOException $e) //error mode
    {
    $error_message = $e->getMessage();
?>

<h1>Database Connection Error</h1>
<p>There was an error connecting to the database.</p>
<!-- display the error message -->
<p>Error message:
  <?php
    echo $error_message;
  ?>
</p>

<?php
  die();
  }

return $conn;
}
?>

<?php
// function getAllPets($userID){
//   $conn = connect();
//   $getPets = "SELECT * FROM tblpet WHERE userID = :uid LIMIT 2;";
//   $stmt = $conn->prepare($getPets);
//   $stmt->bindParam(':uid', $userID, PDO::PARAM_INT);
//   $stmt->execute();
//   return $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//
// };

function getOneUser($loginID){
  $conn = connect();
  $getOneUser = "SELECT * FROM tbllogin
  INNER JOIN tbluser ON tbllogin.loginID = tbluser.loginID
  INNER JOIN tbladdress ON tbluser.userID = tbladdress.userID
  WHERE tbllogin.loginID = :lid;";
  $stmt = $conn->prepare($getOneUser);
  $stmt->bindParam(':lid', $loginID, PDO::PARAM_INT);
  $stmt->execute();
  return $result = $stmt->fetch(PDO::FETCH_ASSOC);
};

function updateUser($postdata, $loginID) {
    if($postdata['fname'] == "" ||$postdata['lname']== "" || $loginID == ""){
      return false;
  }

        $conn = connect();
        $contentquery = "UPDATE tbllogin

        INNER JOIN tbluser ON tbllogin.loginID = tbluser.loginID
        INNER JOIN tbladdress ON tbluser.userID = tbladdress.userID

        SET tbllogin.firstName = :fname, tbllogin.lastName = :surname, tbllogin.updateDT = SYSDATE(),

        tbluser.phone = :ph, tbluser.isOwner = :owner, tbluser.isCustomer = :cust, tbluser.updateDT = SYSDATE(),

        tbladdress.address = :addr, tbladdress.suburb = :sub, tbladdress.postcode = :post, tbladdress.state = :state, tbladdress.updateDT = SYSDATE()

        WHERE tbllogin.loginID = :lid;";
        $stmt = $conn->prepare($contentquery);
        $stmt->bindParam(':fname', test_user_input($postdata['fname']), PDO::PARAM_STR);
        $stmt->bindParam(':surname', test_user_input($postdata['lname']), PDO::PARAM_STR);
        $stmt->bindParam(':ph', test_user_input($postdata['phone']), PDO::PARAM_STR);
        $stmt->bindParam(':owner', test_user_input($postdata['owner']), PDO::PARAM_STR);
        $stmt->bindParam(':cust', test_user_input($postdata['customer']), PDO::PARAM_STR);
        $stmt->bindParam(':addr', test_user_input($postdata['address']), PDO::PARAM_STR);
        $stmt->bindParam(':sub', test_user_input($postdata['suburb']), PDO::PARAM_STR);
        $stmt->bindParam(':post', test_user_input($postdata['postcode']), PDO::PARAM_STR);
        $stmt->bindParam(':state', test_user_input($postdata['state']), PDO::PARAM_STR);
        $stmt->bindParam(':lid', test_user_input($loginID), PDO::PARAM_INT);
        $stmt->execute();

      return true;
}

function getOnePet($pet_ID){
  $conn = connect();
  $showPet = "SELECT * FROM tblpet INNER JOIN tblimagespet ON tblpet.petID = tblimagespet.petID WHERE tblpet.petID = :pid;";
  $stmt = $conn->prepare($showPet);
  $stmt->bindParam(':pid', $pet_ID, PDO::PARAM_INT);
  $stmt->execute();
  return $result = $stmt->fetch(PDO::FETCH_ASSOC);
};

function update_pet($postdata, $pet_ID) {

    if($postdata['pet_name'] == "" || $postdata['animal_type'] == "" || $postdata['breed_type'] == "" || $postdata['pet_age'] == "" || $postdata['pet_size'] == "" || $pet_ID == ""){
      return false;
    }

    $conn = connect();
    $updatePet = "UPDATE tblpet
    SET petName = :pname, petAnimal = :ani, petBreed = :breed, petAge = :age, petSize = :size, updatePetDT = SYSDATE()
    WHERE petID = :pid;";
    $stmt = $conn->prepare($updatePet);
    $stmt->bindParam(':pname', test_user_input($postdata['pet_name']), PDO::PARAM_STR);
    $stmt->bindParam(':ani', test_user_input($postdata['animal_type']), PDO::PARAM_STR);
    $stmt->bindParam(':breed', test_user_input($postdata['breed_type']), PDO::PARAM_STR);
    $stmt->bindParam(':age', test_user_input($postdata['pet_age']), PDO::PARAM_STR);
    $stmt->bindParam(':size', test_user_input($postdata['pet_size']), PDO::PARAM_STR);
    $stmt->bindParam(':pid', test_user_input($pet_ID), PDO::PARAM_INT);
    $stmt->execute();
    return true;
}

function test_user_input($data) {
	$conn = connect();
	$data = trim($data);
	$data= stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function register(){
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

            $stmt = $conn->prepare("SELECT * FROM tbllogin WHERE loginUsername=:uname;");
            $stmt->bindParam(':uname', $username);
            $stmt->execute();
            $result = $stmt->fetch();


              if($stmt->rowCount() > 0) {
                 $_SESSION['error'] = 'User already exists!';
                 header('Location: http://localhost/zootopia/view/my-login-master/register.php');

              } else {


                $insert_registration =
                   "INSERT INTO tbllogin (loginUsername, loginPassword, firstName, lastName, updateDT) VALUES ('$username', '$password', '$firstname', '$lastname', SYSDATE());";

                $stmt = $conn->prepare($insert_registration);
                $stmt->execute();


      $loginID = $conn->lastInsertId();

                $insert_user =
                   "INSERT INTO tbluser (phone, isOwner, isCustomer, updateDT, loginID) VALUES ('', '', '', SYSDATE(), $loginID);";

                $stmt = $conn->prepare($insert_user);
                $stmt->execute();


      $userID = $conn->lastInsertId();

                $insert_address =
                   "INSERT INTO tbladdress (suburb, postcode, state, updateDT, userID) VALUES ('', '', '', SYSDATE(), $userID);";

                $stmt = $conn->prepare($insert_address);
                $stmt->execute();

                $insert_user_image =
                   "INSERT INTO tblimagesuser (imageURL, userID) VALUES ('', $userID);";

                $stmt = $conn->prepare($insert_user_image);
                $stmt->execute();


                $stmt = $conn->prepare("SELECT * FROM tbllogin INNER JOIN tbluser ON tbllogin.loginID = tbluser.loginID WHERE tbllogin.loginUsername = :uname;");
                $stmt->bindParam(':uname', $username);
                $stmt->execute();
                $result = $stmt->fetch();

                $_SESSION['login'] = true;
                $_SESSION['firstname'] = $firstname;
                $_SESSION['loginID'] = $result['loginID'];
                $_SESSION['username'] = $username;
                $_SESSION['userID'] = $result['userID'];


                header('Location: http://localhost/zootopia/view/html/loggedin_page.php?loginID='.$_SESSION['loginID'].'');
              }
          }
        }
          catch(PDOException $e)
          {
            echo "Error: ".$e -> getMessage();
            die();
          }
      }
  }

function login(){
  $conn = connect();

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    	$username = !empty($_POST['email'])? test_user_input(($_POST['email'])): null;
    	$password = !empty($_POST['password'])? test_user_input(($_POST['password'])): null;
      try{
          $stmt = $conn->prepare("SELECT * FROM tbllogin INNER JOIN tbluser ON tbllogin.loginID = tbluser.loginID WHERE tbllogin.loginUsername = :user;");
          $stmt->bindParam(':user', $username);
          $stmt->execute();
          $result = $stmt->fetch();

          if (password_verify($password, $result['loginPassword'])){
            $_SESSION['login'] = true;
            $_SESSION['firstname'] = $result['firstName'];
            $_SESSION['loginID'] = $result['loginID'];
            $_SESSION['username'] = $username;
            $_SESSION['userID'] = $result['userID'];
            header('Location: http://localhost/zootopia/view/html/loggedin_page.php?loginID='.$_SESSION['loginID'].'');
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
}


?>
