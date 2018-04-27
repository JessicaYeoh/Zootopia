<?php
session_start();
if(!$_SESSION['login']){
  header("location:../my-login-master/login_page.php");
  die;
}

include '../../model/db.php';
include 'header.php';
include 'nav.php';

$conn = connect();

?>

<div id="pet_profiles_container">

  <div id="pet_profile_nav">
    <?php include 'loggedin_nav.php';?>
  </div>

    <h1 id="pet_profile_h1">Pet profile/s</h1>

    <div id="pet_added_msg">
      <p>
        <?php
        if(!isset($_SESSION['message'])){
          $_SESSION['message'] = "";
        }else{
        echo $_SESSION['message'];
        unset ($_SESSION['message']);
        }
        ?>
      </p>
    </div>

  <div id="pet_profiles">
    <?php
    $login_ID = $_GET['loginID'];
    $userID = $_SESSION['userID'];

    // $allPets = getAllPets($userID);

    $getPets = "SELECT * FROM tblpet INNER JOIN tblimagespet ON tblpet.petID = tblimagespet.petID WHERE userID = :uid;";
    $stmt = $conn->prepare($getPets);
    $stmt->bindParam(':uid', $userID, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $total_no_pets = $stmt->rowCount();

    for($i=0;$i<$total_no_pets;$i++){
        $petID = $result[$i]['petID'];

        $petName = $result[$i]['petName'];
        $aniType = $result[$i]['petAnimal'];
        $breed = $result[$i]['petBreed'];
        $age = $result[$i]['petAge'];
        $size = $result[$i]['petSize'];
        $img = $result[$i]['imageURL'];
    ?>


        <div id="pet_profiles_update_form">

            <div id="update_pet">
              <a href="petProfile.php?petID=<?php echo $petID;?>&#38;loginID=<?php echo $login_ID; ?>">
                <button type="button" class="btn btn-primary"> Edit </button>
              </a>
            </div>
<!-- Insert default image if no pet image selected -->
<?php
if(isset($img) && ($img == "../img/")) {
?>
            <div id="image_preview">
              <img id="previewing" src="<?php echo $img;?>no_photo.jpg" width="130px" height="130px"/>
            </div>
<?php
}else {
?>
            <div id="image_preview">
              <img id="previewing" src="<?php echo $img;?>" width="130px" height="130px"/>
            </div>
<?php
}
?>
            <hr id="line">

            <div id="pet_info">

                  <p class="pet_info_label">Pet Name: </p>
                  <p class="pet_info_value"> <?php echo $petName; ?> </p>

                  <p class="pet_info_label"> Animal type: </p>
                  <p class="pet_info_value"> <?php echo $aniType; ?> </p>

                  <p class="pet_info_label"> Breed type: </p>
                  <p class="pet_info_value"> <?php echo $breed; ?> </p>

                  <p class="pet_info_label"> Pet age: </p>
                  <p class="pet_info_value"> <?php echo $age; ?> </p>

                  <p class="pet_info_label"> Pet size: </p>
                  <p class="pet_info_value"> <?php echo $size; ?> </p>

            </div>

          </div>
      <?php
      }
      ?>
    </div>

  </div>

</body>
