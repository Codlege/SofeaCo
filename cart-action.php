<?php
session_start();
include('config.php');

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $img = $_POST['img'];
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $qty = 1;

    $stmt = $con->prepare("SELECT `cname` FROM cart WHERE cname=?");
    $stmt -> bind_param("s",$name);
    $stmt->execute();
    $result = $stmt->get_result();
    $r = $result->fetch_assoc();
    $cart_name = isset($r['cname']);

    if(!$cart_name){
        $query = $con->prepare("INSERT INTO `cart`(`cimg`, `cname`, `cdesc`, `cprice`, `cqty`, `total_price`) VALUES (?,?,?,?,?,?)");
        $query->bind_param("ssssis", $img, $name, $desc, $price, $qty, $price);
        $query->execute();

        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Item added to your cart
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
    }
    else{
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Item already in your cart!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
    }
}

if(isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart-item'){
    $stmt = $con->prepare("SELECT *FROM cart");
    $stmt->execute();
    $stmt->store_result();
    $rows = $stmt->num_rows;

    echo $rows;
}

if(isset($_POST['cqty'])){
    $cqty = $_POST['cqty'];
    $cid = $_POST['cid'];
    $cprice = $_POST['cprice'];

    $tprice = $cqty*$cprice;

    $stmt = $con->prepare("UPDATE cart SET cqty=?, total_price=? WHERE cid=?");
    $stmt->bind_param("isi", $cqty, $tprice, $cid);
    $stmt->execute();
}

if(isset($_GET['remove'])){
    $cid = $_GET['remove'];

    $stmt = $con->prepare("DELETE FROM cart WHERE cid=?");
    $stmt->bind_param('i',$cid);
    $stmt->execute();

    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] ='Item is removed from the cart!';
    header("Location: cart.php");
}
?>