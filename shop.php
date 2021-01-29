<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Sofea.Co | Shop</title>

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
		  
          <li class="nav-item active">
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
  
<!-- Product Card Details -->
  <div class="container">

	<div class="col-lg-12">
	<div class="row">
		<div class="container">
			<div class="card border-light">
				<br>
				<h2 class="card-title" style="padding-left:17px;" >Shop with Sofea.Co</h2>
				<div class="card-body">
					<p>Add your desired products to the cart ❤</p>
				</div>
			</div>
	
    </div>
        </div><br>
    
    <!--Sort by-->
    <?php 
    include('config.php');
    include('category.php');
    function fill_category($con)  
    {  
          $output = '';  
          $sql = "SELECT * FROM category";  
          $result = mysqli_query($con, $sql);  
          while($row = mysqli_fetch_array($result))  
          {  
              $output .= '<option value="'.$row["category_id"].'">'.$row["category_name"].'</option>';  
          }  
          return $output;  
    } 
    ?>

  <div id="message"></div>
    <form>
      <div class="form-row">
        <div class="col-2 mb-3 ml-auto">
          <select class="custom-select mr-sm-2" name="category" id="category">
              <option value="">Sort by..</option>
              <?php echo fill_category($con); ?>
            </select>
          </div>
      </div>
    </form>

    <!--All Products-->
  <div class="row">
	<div class="container">
        <?php
          function show_product($con){?>
            <div class="card-group">
          <?php
          $output = '';
          // define how many results you want per page
          $results_per_page = 4;

          // find out the number of results stored in database
          $sql='SELECT * FROM products';
          $result = mysqli_query($con, $sql);
          $number_of_results = mysqli_num_rows($result);

          // determine number of total pages available
          $number_of_pages = ceil($number_of_results/$results_per_page);

          // determine which page number visitor is currently on
          if (!isset($_GET['page'])) {
            $page = 1;
          } else {
            $page = $_GET['page'];
          }

          // determine the sql LIMIT starting number for the results on the displaying page
          $this_page_first_result = ($page-1)*$results_per_page;

          // call prev and next button
          $prev = $page - 1;
          $next = $page + 1;
        
          // retrieve selected results from database and display them on page
          $sql='SELECT * FROM products LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
          $result = mysqli_query($con, $sql);

          while($row = mysqli_fetch_array($result)) {
              $shop[] = $row;
          }
          foreach ($shop as $key=> $products){
            ?>

          <div class="col-lg-3 col-md-6 mb-3">
            <div class="card h-40">
              <a href="#"><img class="card-img-top" src="img/<?=$products['img'];?>" alt="" width="200" height="300"></a>
              <div class="card-body">
                <h5 class="card-title"><?=$products['name'];?></h5>
                <p class="card-text"><?=$products['desc'];?></p>
                <h5>RM <?=$products['price'];?></h5>
              </div>
              <div class="card-footer">

                <!-- Add to cart function needs some id to data into new file -->
                <form action="" class="form-submit">
                <input type="hidden" class="id" value='<?=$products['id'];?>'>
                <input type="hidden" class="img" value='<?=$products['img'];?>'>
                <input type="hidden" class="name" value='<?=$products['name'];?>'>
                <input type="hidden" class="desc" value='<?=$products['desc'];?>'>
                <input type="hidden" class="price" value='<?=$products['price'];?>'>
      
                <button type="button" class="btn btn-success btn-block addcart">Add To Cart</button>
                </form>
              </div>
            </div>
          </div>

          <?php }?> <!-- /.close card deck php -->

        </div><!-- /.row -->
        </div>
	</div>
      <!-- /.col-lg-12 -->
	
	</div>
	</div>
	
  </div>
  <!-- /.container -->

  <br>
  <ul class="pagination justify-content-center">
            <li class="page-item"><a class="page-link" href="shop.php?page=<?=$prev;?>">Previous</a></li>

            <?php // display the links to the pages
            for ($page=1;$page<=$number_of_pages;$page++) { ?>
            <li class="page-item"><a class="page-link" href="shop.php?page=<?=$page;?>"><?=$page;?></a></li>
            <?php } ?><!-- /.close pagination php -->

            <li class="page-item"><a class="page-link" href="shop.php?page=<?=$next;?>">Next</a></li>
          </ul>
  <br>
  <?php }?>

      <div id="product_list">
        <?php echo show_product($con);?>
      </div><!-- /.show product id -->

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
                    <li><a href="index.php">Home</a></li>
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
      $(".addcart").on('click', function(e){
        e.preventDefault();
        var $form = $(this).closest(".form-submit");
        var id = $form.find(".id").val();
        var img = $form.find(".img").val();
        var name = $form.find(".name").val();
        var desc = $form.find(".desc").val();
        var price = $form.find(".price").val();

        $.ajax({
          url:'cart-action.php',
          method: 'post',
          data: {id:id,img:img,name:name,desc:desc,price:price},
          success:function(response){
            $("#message").html(response);
            window.scrollTo(0,0);
            load_cart_item_number();
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
      
      $('#category').change(function(){  
           var category_id = $(this).val();  
           $.ajax({  
                url:"category.php",  
                method:"POST",  
                data:{category_id:category_id},  
                success:function(data){  
                     $('#show_product').html(data);  
                }  
           });  
      });
      
  });

  </script>