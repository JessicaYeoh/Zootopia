<?php
session_start();

include('../model/db.php');
$conn = connect();

$petID = $_GET['petID'];

$query = "SELECT * FROM tbladimages WHERE adID = '$petID' ORDER BY adImageID DESC";
$statement = $conn->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$number_of_rows = $statement->rowCount();
$output = '';
$output .= '
 <div class="image_container">

';
if($number_of_rows > 0)
{
 $count = 0;
 foreach($result as $row)
 {
  $count ++;
  $output .= '
  <div class="image_delete">

      <div class="delete_button">
         <button type="button" class="btn btn-danger btn-xs delete" id="'.$row["adImageID"].'" data-image_name="'.$row["image_name"].'">X</button>
      </div>

      <div class="image_box">
         <img src="../img/'.$row["image_name"].'" class="img-thumbnail" />
      </div>

  </div>
  ';
 }
}
else
{
 $output .= '
  <div>
   <p align="center">No images selected</p>
  </div>
 ';
}
$output .= '</div>';
echo $output;
?>
