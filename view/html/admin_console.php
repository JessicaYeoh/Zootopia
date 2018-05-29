<?php
session_start();
if(!$_SESSION['login']){
  header("location:login_page.php");
  die;
}
?>

<?php
include '../../model/db.php';
$conn = connect();

include 'header.php';
include 'nav.php';
?>

<div id="admin_nav">
<?php
include 'loggedin_nav.php';
?>
</div>

<?php
if($_SESSION['admin'] == "YES") {

    $result = getAllusers();
?>

    <div id="admin_page">

      <h1>Administration Page</h1>

      <h4>Current Users</h4>

      <div id="admin_page_div1">
        <p>First Name</p>
        <p>Surname</p>
        <p>Customer</p>
        <p>Owner</p>

        <?php
        foreach($result as $row){
        ?>
          <p>
            <?php echo $row['firstName'];?>
          </p>
          <p>
            <?php echo $row['lastName'];?>
          </p>
          <p>
            <?php echo $row['isCustomer'];?>
          </p>
          <p>
            <?php echo $row['isOwner'];?>
          </p>

<!--
deactivate account button
view each user profile info with current ads, bookings, pets etc.

-->

      <?php
        }
      ?>
    </div>


    <h4>Statistics</h4>

    <div id="admin_page_div2">
      <p>Total no. of pets</p>
      <p>Total no. of users</p>
      <p>Total no. of customers</p>
      <p>Total no. of pet owners</p>
      <p>Total no. of ads</p>

      <p>
        <?php
            $number_of_rows = getAllPets();
            echo $number_of_rows;
        ?>
      </p>

      <p>
        <?php
            $result = getAllusers();
            $number_of_users = count($result);
            echo $number_of_users;
        ?>
      </p>

      <p>
        <?php
            $result = countCustomers();
            echo $result;
        ?>
      </p>

      <p>
        <?php
            $result = countOwners();
            echo $result;
        ?>
      </p>

      <p>
        <?php
            $result = countAds();
            echo $result;
        ?>
      </p>

    </div>

<?php
}
?>


</div>


<?php
include 'footer.php';
?>
