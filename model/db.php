<?php
function connect(){
  try {
      $conn = new PDO("mysql:host=localhost;dbname=zootopia", 'root', '');

      // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
function getOneUser($userID){
  $conn = connect();
  $getOneUser = "SELECT * FROM tbllogin inner join tbluser on tbllogin.loginID = tbluser.loginID WHERE tbllogin.loginID = :lid;";
  $stmt = $conn->prepare($getOneUser);
  $stmt->bindParam(':lid', $userID, PDO::PARAM_INT);
  $stmt->execute();
  return $result = $stmt->fetch(PDO::FETCH_ASSOC);
};

function updateUser($postdata, $userID) {
  $conn = connect();
  $contentquery = "UPDATE tbllogin inner join tbluser on tbllogin.loginID = tbluser.loginID SET tbluser.firstName = :fname, tbluser.lastName = :surname, tbllogin.loginUsername = :email WHERE tbllogin.loginID = :lid;";
  $stmt = $conn->prepare($contentquery);
  $stmt->bindParam(':fname', test_user_input($postdata['fname']), PDO::PARAM_STR);
  $stmt->bindParam(':surname', test_user_input($postdata['lname']), PDO::PARAM_STR);
  $stmt->bindParam(':email', test_user_input($postdata['email']), PDO::PARAM_STR);
  $stmt->bindParam(':lid', test_user_input($userID), PDO::PARAM_INT);
  $stmt->execute();
  //create logic here
  /* if($stmt->rowCount() > 0) {
    return true;
  } else {
    return false;
  } */
  if($postdata['fname'] ==null ||$postdata['lname']==null || $postdata['email']==null || $userID ==null){
      return false;
  }
  return true;
}

function test_user_input($data) {
	$conn = connect();
	$data = trim($data);
	$data= stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>
