<nav id="loggedin_nav">
    <a href="loggedin_page.php?loginID=<?php echo $_SESSION['loginID']; ?>">
      <button class="btn btn-primary">Dashboard</button>
    </a>

    <a href="update_profile_page.php?loginID=<?php echo $_SESSION['loginID']; ?>">
      <button class="btn btn-primary">Account Details</button>
    </a>

    <a href="pet_profile.php?loginID=<?php echo $_SESSION['loginID']; ?>">
      <button class="btn btn-primary">Your Pets</button>
    </a>

<?php

$getOneUser = "SELECT * FROM tbllogin
INNER JOIN tbluser ON tbllogin.loginID = tbluser.loginID
WHERE tbllogin.loginID = :lid;";
$stmt = $conn->prepare($getOneUser);
$stmt->bindParam(':lid', $_SESSION['loginID'], PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if($result['isOwner'] == "YES") {
?>
    <a href="create_booking.php?loginID=<?php echo $_SESSION['loginID']; ?>">
      <button class="btn btn-primary">Create Booking</button>
    </a>
<?php
}
?>

    <a href="my_ads.php?loginID=<?php echo $_SESSION['loginID']; ?>">
      <button class="btn btn-primary">My ads</button>
    </a>

    <a href="payments.php?loginID=<?php echo $_SESSION['loginID']; ?>">
      <button class="btn btn-primary">Payments</button>
    </a>
</nav>
