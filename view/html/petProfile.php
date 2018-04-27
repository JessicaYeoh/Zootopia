<?php
session_start();
if(!$_SESSION['login']){
  header("location:../my-login-master/login_page.php");
  die;
}
?>

<?php
include '../../model/db.php';
include 'header.php';
include 'nav.php';
$conn = connect();


$login_ID = $_GET['loginID'];
$pet_ID = $_GET['petID'];

$petProf = getOnePet($pet_ID);

$petName = $petProf['petName'];
$aniType = $petProf['petAnimal'];
$breed = $petProf['petBreed'];
$age = $petProf['petAge'];
$size = $petProf['petSize'];
$img = $petProf['imageURL'];
?>



<div id="pet_profile_page2">

  <div id="booking_nav">
    <?php include 'loggedin_nav.php';?>
  </div>

  <div id="pet_profile_update">

<form enctype="multipart/form-data" method="POST" action="../../controller/update_pet_img.php?petID=<?php echo $pet_ID;?>&#38;loginID=<?php echo $login_ID; ?>">

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

  <div class="form-group">
    <label for="file">Select pet profile picture</label>
    <input class="file-upload" type="file" name="file" id="file"/>
    <input type="hidden" name="image_id" id="image_id" value="2" class="submit" />
  </div>

  <input type="hidden" name="action_type" value="add"/>

  <button type="submit"> Save</button>

</form>

      <form id="pet_profile_update_form" method="POST">

        <div class="form-group">
          <label for="pet_name">Pet Name</label>
          <input type="text" class="form-control" id="pet_name" name="pet_name" value="<?php echo $petName;?>" required>
        </div>

        <div class="form-group">
          <label for="animal_type">Animal type</label>
          <input type="text" class="form-control" id="animal_type" name="animal_type" value="<?php echo $aniType;?>" required>
        </div>

        <div class="form-group">
          <label for="breed_type">Breed type</label>
          <input id="breed_type" type="text" class="form-control" name="breed_type" value="<?php echo $breed;?>" required>
        </div>

        <div class="form-group">
          <label for="pet_age">Pet age</label>
          <input id="pet_age" type="text" class="form-control" name="pet_age" value="<?php echo $age;?>" required>
        </div>

        <div class="form-group">
          <label for="pet_size">Pet size</label>
          <select class="" id="pet_size" name="pet_size" value="<?php echo $size;?>" required>
            <option>Small</option>
            <option>Medium</option>
            <option>Large</option>
          </select>
        </div>

        <input type="hidden" name="action_type" value="add"/>

        <div class="modal-footer">
            <input type="button" class="btn btn-primary" value="Update" onclick="updatePet(<?php echo $pet_ID;?>)"/>
        </div>

      </form>
  </div>
</div>
