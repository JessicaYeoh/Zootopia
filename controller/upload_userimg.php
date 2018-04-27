<?php
session_start();

if(!empty($_FILES['picture']['name'])){
    //Include database configuration file
    include_once '../model/db.php';
    $conn = connect();
    //File uplaod configuration
    $result = 0;
    $uploadDir = "../view/img/";
    $fileName = basename($_FILES['picture']['name']);
    $targetPath = $uploadDir.$fileName;
    
    $fileBase = "../img/";
    $imageURL = $fileBase.$fileName;


    //Upload file to server
    if(@move_uploaded_file($_FILES['picture']['tmp_name'], $targetPath)){
        //Get current user ID from session
        $userID = $_SESSION['userID'];

        //Update picture name in the database
        $update = $conn->prepare("UPDATE tblimagesuser SET imageURL = '".$imageURL."' WHERE userID = '$userID'");
        $update->execute();

        //Update status
        if($update){
            $result = 1;
        }
    }

    //Load JavaScript function to show the upload status
    echo '<script type="text/javascript">window.top.window.completeUpload(' . $result . ',\'' . $imageURL . '\');</script>  ';
}

?>
