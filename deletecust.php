<?php
include('config.php');

if (isset($_POST['delete_data'])) {
    
    $id = $_POST['delete_id'];
    $sql = "DELETE FROM `users` WHERE id ='$id'";

    if (mysqli_query($con, $sql)){
        echo '<script> alert("Data Updated");</script>';
        header("Location: admincust.php");
    }

    else {
        echo '<script> alert("Something went wrong. Please try again.");</script>';
  }
}

?>