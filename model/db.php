<?php
function connect(){
$conn = new PDO("mysql:host=localhost;dbname=zootopia", 'root', '');
// $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
return $conn;
}

function getOneUser($userID){
  $conn = connect();
  $getOneUser = "SELECT * FROM tbllogin inner join tbluser on tbllogin.loginID = tbluser.loginID WHERE loginID = :lid;";
  $stmt = $conn->prepare($getOneUser);
  $stmt->bindParam(':lid', $userID, PDO::PARAM_INT);
  $stmt->execute();
  return $result = $stmt->fetch(PDO::FETCH_ASSOC);
};

function updateUser($postdata, $userID) {
  $conn = connect();
  $contentquery = "UPDATE tbllogin inner join tbluser on tbllogin.loginID = tbluser.loginID SET firstName = :fname, lastName = :surname, loginUsername = :email WHERE loginID = :lid;";
  $stmt = $conn->prepare($contentquery);
  $stmt->bindParam(':fname', test_user_input($postdata['profile_first_name']), PDO::PARAM_STR);
  $stmt->bindParam(':surname', test_user_input($postdata['profile_last_name']), PDO::PARAM_STR);
  $stmt->bindParam(':email', test_user_input($postdata['profile_email']), PDO::PARAM_STR);
  $stmt->bindParam(':lid', test_user_input($userID), PDO::PARAM_INT);
  $stmt->execute();
  if($stmt->rowCount() > 0) {
    return true;
  } else {
    return false;
  }
}

function test_user_input($data) {
	$conn = connect();
	$data = trim($data);
	$data= stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>
