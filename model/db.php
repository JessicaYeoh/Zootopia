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
  $getOneUser = "SELECT * FROM tbllogin WHERE loginID = :lid;";
  $stmt = $conn->prepare($getOneUser);
  $stmt->bindParam(':lid', $userID, PDO::PARAM_INT);
  $stmt->execute();
  return $result = $stmt->fetch(PDO::FETCH_ASSOC);
};

function updateUser($postdata, $userID) {
    if($postdata['fname'] == "" ||$postdata['lname']== "" || $postdata['email']== "" || $userID == ""){
      return false;
  }

        $conn = connect();
        $contentquery = "UPDATE tbllogin SET firstName = :fname, lastName = :surname, loginUsername = :email WHERE loginID = :lid;";
        $stmt = $conn->prepare($contentquery);
        $stmt->bindParam(':fname', test_user_input($postdata['fname']), PDO::PARAM_STR);
        $stmt->bindParam(':surname', test_user_input($postdata['lname']), PDO::PARAM_STR);
        $stmt->bindParam(':email', test_user_input($postdata['email']), PDO::PARAM_STR);
        $stmt->bindParam(':lid', test_user_input($userID), PDO::PARAM_INT);
        $stmt->execute();

      return true;
}

// function insertInfo($postdata, $addressID) {
//
//         $conn = connect();
//         $contentquery = "INSERT INTO tbladdress INNER JOIN tbluser on tbladdress.addressID = tbluser.addressID INNER JOIN tbllogin on tbluser.loginID = tbllogin.loginID (phone, address, suburb, postcode, state) VALUES ($postdata['phone'], $postdata['address'], $postdata['suburb'], $postdata['postcode'], $postdata['state']) WHERE addressID = $addressID";
//         $stmt = $conn->prepare($contentquery);
//         $stmt->execute();
// }

function test_user_input($data) {
	$conn = connect();
	$data = trim($data);
	$data= stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>
