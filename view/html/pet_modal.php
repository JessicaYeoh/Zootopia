<h4 class="show_pet1">Your Pets</h4>


<!-- Select pets from DB to display pet profile cards on logged in page -->
    <?php
    $userID = $_SESSION['userID'];
    $result = show_2pets($userID);

    foreach($result as $row){
        $petID = $row['petID'];
        $img = $row['imageURL'];
    ?>

    <div id="pet_display" class="pet-grid-item show_pet3">

        <?php
        if($row['inactive'] == 0) {
        ?>
          <div id="pet_<?php echo $petID;?>">
              <div>
              <?php if(isset($img) && ($img == "../img/")){ ?>
                  <img src="<?php echo $img;?>no_photo.jpg" width="130px" height="130px"/>
              <?php }else{?>
                  <img src="<?php echo $img;?>" width="130px" height="130px"/>
              <?php }?>
              </div>

              <h4><?php echo $row['petName'];?></h4>

              <h5><?php echo $row['petAge'];?> years old</h5>

               <a id="show_pet" href="petProfile.php?petID=<?php echo $petID;?>&#38;loginID=<?php echo $login_ID; ?>">
                 <button type="button" class="btn btn-primary"> Pet profile </button>
               </a>
          </div>

        <?php
        }
        ?>
    </div>

<?php
}
?>

<!-- Add pet modal -->

<div id="pet_button" class="pet-grid-item show_pet2" data-toggle="modal" data-target="#add_pet_modal">
    <button type="button" id="add_pet" class="btn btn-primary" data-toggle="modal" data-target="#add_pet_modal">Add Pet</button>
</div>

<?php
$loginID = $_SESSION['loginID'];
$result = getOneUser($loginID);

if($result['isOwner'] == "YES") {
?>
    <div class="modal fade" id="add_pet_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Pet</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="pet_profile_update_form" enctype="multipart/form-data" method="POST" action="../../controller/add_pet_profile.php?loginID=<?php echo $login_ID;?>">

              <div id="image_preview"><img id="previewing" src="../img/no_photo.jpg" width="150px" height="150px"/></div>
                      <hr id="line">

              <div class="form-group">
                <label for="file">Select pet profile picture</label>
                <input class="file-upload" type="file" name="file" id="file"/>
                <input type="hidden" name="image_id" id="image_id" value="2" class="submit" />
              </div>

              <div class="form-group">
                <label for="pet_name">Pet Name</label>
                <input type="text" class="form-control stored" id="pet_name" name="pet_name" required>
              </div>

              <div class="form-group">
                <label for="animal_type">Animal type</label>
                <input type="text" class="form-control stored" id="animal_type" name="animal_type" required>
              </div>

              <div class="form-group">
                <label for="breed_type">Breed type</label>
                <input id="breed_type" type="text" class="form-control stored" name="breed_type">
              </div>

              <div class="form-group">
                <label for="pet_age">Pet age</label>
                <input id="pet_age" type="text" class="form-control stored" name="pet_age" required>
              </div>

              <div class="form-group">
                <label for="pet_size">Pet size</label>
                <select class="select" id="pet_size" name="pet_size" required>
                  <option>Small</option>
                  <option>Medium</option>
                  <option>Large</option>
                </select>
              </div>

              <input type="hidden" name="action_type" value="add"/>

              <!-- <div class="modal-footer">
                  <input type="button" class="btn btn-primary" value="Add" onclick="addPet(<?php
                  // echo $login_ID;?>)"/>
              </div> -->

              <div class="modal-footer">
                  <input type="submit" id="add_pet_button" class="btn btn-primary" value="Add" />
              </div>

            </form>

          </div>
        </div>
      </div>
    </div>
    <!-- END add pet modal -->
<?php
}else{
?>

    <div class="modal fade" id="add_pet_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Pet</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>
              Must be a pet owner to add a pet!
            </p>

          </div>

        </div>
      </div>
    </div>

<?php
}
?>
