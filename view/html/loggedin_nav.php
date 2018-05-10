<div id="loggedin_nav_container">

<nav id="loggedin_nav" class="navbar navbar-expand-lg navbar-light bg-light">


  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#loggedinNav" aria-controls="loggedinNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

    <div class="collapse navbar-collapse" id="loggedinNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="loggedin_page.php?loginID=<?php echo $_SESSION['loginID']; ?>">
            Dashboard
          </a>
        </li>

<li class="nav-item">
        <a class="nav-link" href="update_profile_page.php?loginID=<?php echo $_SESSION['loginID']; ?>">
          Account Details
        </a>
    </li>
<li class="nav-item">
        <a class="nav-link" href="pet_profile.php?loginID=<?php echo $_SESSION['loginID']; ?>">
          Your Pets
        </a>
    </li>
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
    <li class="nav-item">
        <a class="nav-link" href="create_booking.php?loginID=<?php echo $_SESSION['loginID']; ?>">
          Create Booking
        </a>
    </li>
    <?php
    }
    ?>
<li class="nav-item">
        <a class="nav-link" href="my_ads.php?loginID=<?php echo $_SESSION['loginID']; ?>">
          My ads
        </a>
</li>

<li class="nav-item">
        <a class="nav-link" href="payments.php?loginID=<?php echo $_SESSION['loginID']; ?>">
          Payments
        </a>
</li>
      </ul>
    </div>
</nav>

</div>
