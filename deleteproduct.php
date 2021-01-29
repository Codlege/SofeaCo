<?php
include('config.php');

if (isset($_POST['deleteproducts'])) {
    
    $id = $_POST['delete_id'];
    $sql = "DELETE FROM `products` WHERE id ='$id'";

    if (mysqli_query($con, $sql)){
        echo '<script> alert("Data Updated");</script>';
        header("Location: adminproducts.php");
    }

    else {
        echo '<script> alert("Something went wrong. Please try again.");</script>';
  }
}

?>