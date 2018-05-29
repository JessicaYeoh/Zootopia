<?php
$loginID = $_SESSION['loginID'];
?>

<div id="loggedin_nav_container">

<nav id="loggedin_nav" class="navbar navbar-expand-lg navbar-light bg-light">


  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#loggedinNav" aria-controls="loggedinNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

    <div class="collapse navbar-collapse" id="loggedinNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="loggedin_page.php?loginID=<?php echo $loginID; ?>">
            Dashboard
          </a>
        </li>

<li class="nav-item">
        <a class="nav-link" href="update_profile_page.php?loginID=<?php echo $loginID; ?>">
          Account Details
        </a>
    </li>
<li class="nav-item">
        <a class="nav-link" href="pet_profile.php?loginID=<?php echo $loginID; ?>">
          Your Pets
        </a>
    </li>
    <?php
    $result = getOneUser($loginID);

    if($result['isOwner'] == "YES") {
    ?>
        <li class="nav-item">
            <a class="nav-link" href="create_booking.php?loginID=<?php echo $loginID; ?>">
              Create Booking
            </a>
        </li>
    <?php
    }
    ?>

    <li class="nav-item">
            <a class="nav-link" href="my_ads.php?loginID=<?php echo $loginID; ?>">
              My ads
            </a>
    </li>

    <li class="nav-item">
            <a class="nav-link" href="payments.php?loginID=<?php echo $loginID; ?>">
              Payments
            </a>
    </li>

    <?php
    if($result['isAdmin'] == "YES") {
    ?>
        <li class="nav-item">
                <a class="nav-link" href="admin_console.php?loginID=<?php echo $loginID; ?>">
                  Admin Page
                </a>
        </li>
    <?php
    }
    ?>
      </ul>
    </div>
</nav>

</div>
