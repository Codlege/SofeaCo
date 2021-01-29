<?php
include('config.php');

if (isset($_POST['insertproducts'])) {
    $name      = $_POST['name'];
    $desc      = $_POST['desc'];
    $price     = $_POST['price'];
    $quantity  = $_POST['quantity'];
    $img       = $_POST['img'];
    $category  = $_POST['category'];


    if(!empty($name) && !empty($desc) && !empty($price) && !empty($quantity) && !empty($img) && !empty($category)){
        $sql = "INSERT INTO `products`(`name`, `desc`, `price`, `quantity`, `img`, `date_added`, `category`) VALUES ('$name', '$desc', '$price', '$quantity', '$img', CURDATE(), '$category')";
        
        if (mysqli_query($con, $sql)){
            echo '<script> alert(Data Saved);</script>';
            header("Location: adminproducts.php");
        }

        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
      }
     
      mysqli_close($con);

    }

    else {
		echo '<script> alert(Something went wrong. Please try again.);</script>';
    }
}
?>