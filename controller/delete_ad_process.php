<?php
session_start();
include '../model/db.php';
$conn = connect();


    if(isset($_GET['AdID']))
    {
        $adID = $_GET['AdID'];

        $updateInactive = "UPDATE tblad
        SET inactiveAd = :true
        WHERE adID = :aid;";
        $stmt = $conn->prepare($updateInactive);

        $true = 1;
        $stmt->bindParam(':true', $true, PDO::PARAM_INT);
        $stmt->bindParam(':aid', test_user_input($adID), PDO::PARAM_INT);
        $stmt->execute();

        $updateInactive = "UPDATE tbladimages
        SET inactiveAdImg = :true
        WHERE adID = :aid;";
        $stmt = $conn->prepare($updateInactive);

        $true = 1;
        $stmt->bindParam(':true', $true, PDO::PARAM_INT);
        $stmt->bindParam(':aid', test_user_input($adID), PDO::PARAM_INT);
        $stmt->execute();
    }

?>
