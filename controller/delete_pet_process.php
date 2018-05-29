<?php
session_start();
include '../model/db.php';
$conn = connect();


    if(isset($_GET['PetID']))
    {
        $petID = $_GET['PetID'];

        $updateInactive = "UPDATE tblpet
        SET inactive = :true
        WHERE petID = :pid;";
        $stmt = $conn->prepare($updateInactive);

        $true = 1;
        $stmt->bindParam(':true', $true, PDO::PARAM_INT);
        $stmt->bindParam(':pid', test_user_input($petID), PDO::PARAM_INT);
        $stmt->execute();
    }

?>
