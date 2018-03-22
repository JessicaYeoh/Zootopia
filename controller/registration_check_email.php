<?php
    header('Content-Type: application/json');

    include '../model/db.php';
    $conn = connect();
    
    $select_rego = "SELECT loginUsername FROM tbllogin WHERE loginUsername = '" . $_GET['username'] . "';";

    $stmt = $conn->prepare($select_rego);
    $stmt->execute();

    $result = $stmt->fetchAll();

    if(count($result) > 0) {
        echo json_encode(Array('emailexists'=>true));
    } else {
        echo json_encode(Array('emailexists'=>false));
    }
?>
