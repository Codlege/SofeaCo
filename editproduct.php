<?php
include('config.php');

if (isset($_POST['editproducts'])) {
    $id        = $_POST['update_id'];
    $name      = $_POST['name'];
    $desc      = $_POST['desc'];
    $price     = $_POST['price'];
    $quantity  = $_POST['quantity'];
    $img       = $_POST['img'];
    $category  = $_POST['category'];


    if(!empty($name) && !empty($desc) && !empty($price) && !empty($quantity) && !empty($img) && !empty($category)){
        $sql = "UPDATE products SET `name` = '$name', `desc` = '$desc', `price` = '$price', `quantity` = '$quantity', `img` = '$img', `category` = '$category' WHERE `id` = $id";
        
        if (mysqli_query($con, $sql)){
            echo '<script> alert("Data Updated");</script>';
            header("Location: adminproducts.php");
        }

        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
      }
     
      mysqli_close($con);

    }

    else {
		echo '<script> alert("Something went wrong. Please try again.");</script>';
    }
}
?>