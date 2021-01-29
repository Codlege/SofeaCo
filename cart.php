<?php
session_start();

include('config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sofea.Co | Cart</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">
  
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  
	<style>
		footer {
			background: #343a40;
			padding: 40px;
			}
		footer a {
			color: #f8f9fa
			}
	</style>

</head>

<body>

  <!-- Navigation -->
 <div class="search-bar">
  <div class="container">
<nav class="navbar navbar-expand-sm bg-white navbar-light">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="#">
    <img src="img/logo.png" alt="Sofea.Co" style="width:130px;">
  </a>
  
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="index.php">Home</a>
    </li>
	
    <li class="nav-item">
            <a class="nav-link" href="About Us.html">About Us</a>
          </li>
		  
          <li class="nav-item">
            <a class="nav-link" href="shop.php">Shop</a>
          </li>
			
          <li class="nav-item">
            <a class="nav-link" href="Help.html">Help</a>
          </li>
		  
		<li class="nav-item">
            <a class="nav-link" href="Contact Us.html">Contact</a>
        </li>
  </ul>

            <form class="form-inline my-2 my-lg-0 ml-auto" action="">
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Search">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-secondary btn-number">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
				
                <a class="btn btn-info btn-sm ml-3" href="cart.php">
                    <i class="fa fa-shopping-cart"></i> Cart
                    <span id="cart-item" class="badge badge-#95E3DA">0</span>
                </a>
            </form>
		</div>
  
</nav>
</div>

<!-- Sign In Page -->
  <nav class="navbar navbar-expand-lg fixed-top transparent" id="nav1">
        <ul class="navbar-nav ml-auto">
		<span class="navbar-text">
		  Free Shipping for items more than RM100
		</span>
		<hr>
          <li class="nav-item ">
            <button type="button" class="btn btn-sm btn-outline-primary justify-content-center">Sign In</button>
          </li>
		</ul>
  </nav>

<section id="cart">
<br><h3 style="text-align: center;">Shopping Cart</h3><br>
<div class="container">
	<table id="cart" class="table table-hover table-condensed">
    				<thead>
						<tr>
							<th style="width:54%">Product</th>
							<th style="width:10%">Price</th>
							<th style="width:8%">Quantity</th>
							<th style="width:18%" class="text-center">Subtotal</th>
							<th style="width:10%"></th>
						</tr>
                    </thead>
                    
					<tbody>

          <?php 

            $stmt = $con->prepare("SELECT * FROM cart");
            $stmt -> execute();
            $result = $stmt->get_result();
            $grand_total = 0;
            while($row = $result->fetch_assoc()):
            $grand_total +=$row['total_price'];
            ?>
                            
						<tr>
							<td data-th="Product">
								<div class="row">
                    <input type="hidden" class = "cid" value ="<?=$row['cid'];?>">
									<div class="col-sm-2 hidden-xs"><img src="img/<?=$row['cimg'];?>" width= "80" height="120" class="img-responsive"/></div>
									<div class="col-sm-10">
										<h4 style="padding-left: 12px;"><?=$row['cname'];?></h4>
										<p style="padding-left: 12px;"><?=$row['cdesc'];?></p>
                    </div>
                    </div>
								</div>
							</td>
                <td data-th="Price"><?=$row['cprice'];?></td>
                <input type="hidden" class = "cprice" value ="<?=$row['cprice'];?>">
							<td data-th="Quantity">
								<input type="number" class="form-control text-center itemQty" value="<?=$row['cqty'];?>">
							</td>
							<td data-th="Subtotal" class="text-center"><?=$row['total_price'];?></td>
							<td class="actions" data-th="">
								<button class="btn btn-dark btn-sm"><i class="fa fa-refresh"></i></button>
								<a href="action.php?remove=<?=$row['cid'];?>" class="btn btn-danger btn-sm del-cart" onclick="return confirm('Are you sure you want to delete this item?')"><i class="fa fa-trash-o"></i></button>								
							</td>
                </tr>
                    <?php endwhile;?>
					<tfoot>
						<tr>
							<td><a href="shop.php" class="btn btn-outline-dark"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
							<td colspan="2" class="hidden-xs"></td>
							<td class="hidden-xs"><strong>Grand Total RM <?= number_format($grand_total, 2);?></strong></td>
							<td><a href="#" class="btn btn-success <?=($grand_total>1)?"":"disabled";?>">Checkout<i class="fa fa-angle-right"></i></a></td>
						</tr>
					</tfoot>
				</table>
</div>

<!-- Footer -->
<footer class="text-light">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-lg-4 col-xl-3">
                <h3 style ="color: #fcd362">Sofea.Co</h3>
                <p>Established in 2021, Sofea.Co always want customers to look trendy, exclusive, and confident when they wear our apparels. 
				<br><br>Cover aurah modestly and trendily yet paying less to look GRACEFUL and STUNNING.</p>
            </div>

            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto">
                <br><h5>Shop links</h5>
                <ul class="list-unstyled">
                    <li><a href="Home.html">Home</a></li>
                    <li><a href="About Us.html">About Us</a></li>
                    <li><a href="">Shop</a></li>
                    <li><a href="Help.html">Help</a></li>
					<li><a href="Contact Us.html">Contact</a></li>
                </ul>
            </div>

            <div class="col-md-4 col-lg-3 col-xl-3">
                <br><h5>Follow us in social media</h5>
                <ul class="list-unstyled">
                    <li><i class="fa fa-twitter"></i> @SofeaCoOfficial</li>
                    <li><i class="fa fa-instagram"></i> Sofea.Co</li>
                    <li><i class="fa fa-envelope"></i> hello@sofeaco.com.my</li>
                    <li><i class="fa fa-whatsapp"></i> +6011-2141516 (Agent - Farouq)</li>
                </ul>
            </div>
        </div>
    </div>
	
<div class="py-1 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Codlege KMK3393 Web Programming</p>
    </div>
</div>	
</footer>

<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
</body>

</html>

<script type="text/javascript">
  $(document).ready(function(){  
    
    $(".itemQty").on('change', function(){
        var $el =$(this).closest('tr');

        var cid = $el.find(".cid").val();
        var cprice = $el.find(".cprice").val();
        var cqty = $el.find(".itemQty").val();

        $.ajax({
            url: 'cart-action.php',
            method: 'post',
            cache: false,
            data: {cqty:cqty,cid:cid,cprice:cprice},
            success: function(response){
                console.log(response);
            }
        });
    });

      load_cart_item_number();

      function load_cart_item_number(){
        $.ajax({
          url: 'cart-action.php',
          method:'get',
          data:{cartItem:"cart-item"},
          success:function(response){
            $("#cart-item").html(response);
          }
        });
      }
  });

  </script>