<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sofea.Co | Checkout</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">
  
  <script src="checkout.js"></script>
  
  
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  
	<style>
	    container {
           max-width: 960px;}
		   
		.lh-condensed { line-height: 1.25; }
		
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
      <a class="nav-link" href="home.php">Home</a>
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
				
                <a class="btn btn-info btn-sm ml-3" href="cart.html">
                    <i class="fa fa-shopping-cart"></i> Cart
                    <span class="badge badge-#95E3DA"></span>
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

<br>
<h3 class="text-info"style="padding-left: 80px;">Checkout Page</h3>
<p style="padding-left: 80px;">Fill in your details to proceed with your order</p><br>

<section id="checkout">
    <div class="container">
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">

            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
                <span id="cart-item" class="badge badge-secondary badge-pill">3</span>
            </h4>

            <ul class="list-group mb-3">
            <?php
                session_start();
                include('config.php');
                $stmt = $con->prepare("SELECT * FROM cart");
                $stmt -> execute();
                $result = $stmt->get_result();
                $grand_total = 0;
                while($row = $result->fetch_assoc()):

                $grand_total +=$row['total_price'];
                ?>

                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0"><?=$row['cname'];?></h6>
                        <small class="text-muted"><?=$row['cdesc'];?></small>
                    </div>
                    <span class="text-muted"><?=$row['cprice'];?></span>
                </li>
                <?php endwhile;?>

                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (MYR)</span>
                    <strong><?= number_format($grand_total, 2);?></strong>
                </li>
            </ul>

        </div>
        
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Billing address</h4>
            <form action="checkout-done.html">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">First name</label>
                        <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                        <div class="invalid-feedback"> Valid first name is required. </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Last name</label>
                        <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                        <div class="invalid-feedback"> Valid last name is required. </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email">Email <span class="text-muted">(Optional)</span></label>
                    <input type="email" class="form-control" id="email" placeholder="you@example.com">
                    <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
                </div>
                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                    <div class="invalid-feedback"> Please enter your shipping address. </div>
                </div>
                <div class="mb-3">
                    <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                    <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                </div>
                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="country">Country</label>
                        <input type="text" class="form-control w-100" id="country" placeholder="Country" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="state">State</label>
                        <select class="custom-select d-block w-100" id="state" required>
                            <option value="">Choose...</option>
                            <option>California</option>
                        </select>
                        <div class="invalid-feedback"> Please provide a valid state. </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="zip">Zip</label>
                        <input type="text" class="form-control" id="zip" placeholder="" required>
                        <div class="invalid-feedback"> Zip code required. </div>
                    </div>
                </div>
 
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="same-address">
                    <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="save-info">
                    <label class="custom-control-label" for="save-info">Save this information for next time</label>
                </div>

                <br><br>
                <h4 class="mb-3">Payment</h4>
                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required>
                        <label class="custom-control-label" for="credit">Credit/ Debit card</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="bank" name="paymentMethod" type="radio" class="custom-control-input" required>
                        <label class="custom-control-label" for="debit">Online Banking</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                        <label class="custom-control-label" for="paypal">PayPal</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="cc-name">Name on card</label>
                        <input type="text" class="form-control" id="cc-name" placeholder="" required>
                        <small class="text-muted">Full name as displayed on card</small>
                        <div class="invalid-feedback"> Name on card is required </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cc-number">Credit card number</label>
                        <input type="text" class="form-control" id="cc-number" placeholder="" required>
                        <div class="invalid-feedback"> Credit card number is required </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="cc-expiration">Expiration</label>
                        <input type="text" class="form-control" id="cc-expiration" placeholder="DD-MM-YYYY" required>
                        <div class="invalid-feedback"> Expiration date required </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="cc-cvv">CVV</label>
                        <input type="password" class="form-control" id="cc-cvv" placeholder="" required>
                        <div class="invalid-feedback"> Security code required </div>
                    </div>
                </div>
                <br>
                <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
            </form>
        </div>
        </div>
    </div>
</div>
</section><br><br>

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

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

<script type="text/javascript">
    $(document).ready(function(){  
      
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