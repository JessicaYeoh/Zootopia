<h4 class="profile-grid-item prof1">Your Profile</h4>

<div class="profile-grid-item prof2">


<?php
//User profile picture
$userID = $_SESSION['userID'];
$row = userImg($userID);

$userPicture = !empty($row['imageURL'])?$row['imageURL']:'../img/no-image-available.png';
$userPictureURL = $userPicture;
?>

      <div class="user-box">
          <div class="img-relative">
              <!-- Loading image -->
              <div class="overlay uploadProcess" style="display: none;">
                <div class="overlay-content"><img src="../img/loader.svg"/></div>
              </div>
              <!-- Hidden upload form -->
              <form method="post" action="../../controller/upload_userimg.php" enctype="multipart/form-data" id="picUploadForm" target="uploadTarget">
                  <input type="file" name="picture" id="fileInput"  style="display:none"/>
              </form>

              <iframe id="uploadTarget" name="uploadTarget" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>

              <!-- Image update link -->
              <a class="editLink" href="javascript:void(0);"><img src="../img/edit-icon.png"/></a>

              <!-- Profile image -->
              <img src="<?php echo $userPictureURL; ?>" id="imagePreview">
          </div>

      </div>
</div>

<?php
$loginID = $_SESSION['loginID'];
$result = getOneUser($loginID);
?>

<p class="profile-grid-item prof3">
  Name: <?php echo $result['firstName'];?>
</p>

<div class="profile-grid-item prof4">
    <a href="update_profile_page.php?loginID=<?php echo $loginID; ?>">
        <button class="btn btn-primary">Edit Profile</button>
    </a>
</div>
