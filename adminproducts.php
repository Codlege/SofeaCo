<?php
session_start();
include('config.php');
$sql = "SELECT * FROM products ORDER BY id ASC";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">  

    <!-- Font Awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
  
    <title>Sofea.Co | Admin Product Details List</title>

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="#">Sofea.Co Business Partner Page</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="admindashboard.html">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="adminproducts.php">Product List</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admincust.php">Customer List</a>
      </li>    
    </ul>
  </div>  
</nav>

<br><br>
<div class = "container">
<h3 style = "text-align: center;">Product Information List</h3><br>

<!-- Add Item Modal -->
<div class="modal fade" id="AddItem" tabindex="-1" role="dialog" aria-labelledby="AddItemLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddItemLabel">Add Product Item(s)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="addproduct.php" method="POST">
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" name="name" placeholder="eg. Naylaa Hijab 2020">
        </div>

        <div class="form-group">
            <label for="desc">Product Description</label>
            <input type="text" class="form-control" name="desc" placeholder="eg. Forest Green, Chiffon">
        </div>

        <div class="form-group">
            <label for="category">Categories (input by number)</label>
            <input type="number" class="form-control" name="category" placeholder="1 - Hijab, 2 - Inner, 3 - Purdah">
        </div>

        <div class="form-group">
        <div class="row">
            <div class="col">
            <label for="price">Price (RM)</label>
            <input type="number" step="0.01" class="form-control" name="price" placeholder="eg. 15.00">
            </div>

            <div class="col">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" name="quantity" placeholder="eg. 4">
            </div>
        </div>
        </div>

        <div class="form-group">
            <label for="img">Insert your product image file name here</label>
            <input type="text" class="form-control" name="img" placeholder="eg. naylaa2.jpg">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="insertproducts" class="btn btn-primary">Add</button></form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Item Modal -->
<div class="modal fade" id="EditItem" tabindex="-1" role="dialog" aria-labelledby="EditItemLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="EditItemLabel">Update Product Item(s)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="editproduct.php" method="POST">
      <input type="hidden" name="update_id" id="update_id">
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="eg. Naylaa Hijab 2020">
        </div>

        <div class="form-group">
            <label for="desc">Product Description</label>
            <input type="text" class="form-control" name="desc" id="desc" placeholder="eg. Forest Green, Chiffon">
        </div>

        <div class="form-group">
            <label for="category">Categories (input by number)</label>
            <input type="number" class="form-control" name="category" id="category" placeholder="1 - Hijab, 2 - Inner, 3 - Purdah">
        </div>

        <div class="form-group">
        <div class="row">
            <div class="col">
            <label for="price">Price (RM)</label>
            <input type="number" step="0.01" class="form-control" name="price" id="price" placeholder="eg. 15.00">
            </div>

            <div class="col">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" name="quantity" id="quantity" placeholder="eg. 4">
            </div>
        </div>
        </div>

        <div class="form-group">
            <label for="img">Insert your product image file name here</label>
            <input type="text" class="form-control" name="img" id="img" placeholder="eg. naylaa2.jpg">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="editproducts" class="btn btn-success">Save Changes</button></form>
      </div>
    </div>
  </div>
</div>

<!-- Delete Item Modal -->
<div class="modal fade" id="DeleteItem" tabindex="-1" role="dialog" aria-labelledby="DeleteItemLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="DeleteItemLabel">Delete Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="deleteproduct.php" method="POST">
      <input type="hidden" name="delete_id" id="delete_id">
        <p>Are you sure you want to delete this item?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" name="deleteproducts" class="btn btn-dark">Yes, Proceed</button></form>
      </div>
    </div>
  </div>
</div>

<!-- Add Item Button -->
<div class = "card">
    <div class ="card-body ml-auto">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddItem">
        Add Item
        </button>
    </div>
</div><br>

<!-- Data Table -->
<div class="table-responsive">
    <table id = "product_list" class ="table table-striped table-bordered">
        <thead>
            <tr>
                <td>#ID</td>
                <td>Name</td>
                <td>Description</td>
                <td>Category</td>
                <td>Price</td>
                <td>Quantity</td>
                <td>Image File</td>
                <td>Date Added</td>
                <td></td>
            </tr>
        </thead>

        <tbody>
        <?php  
        if ($result)  
        {  foreach($result as $row){ ?> 
                <tr>
                    <td><?= $row["id"];?></td>  
                    <td><?= $row["name"];?></td>  
                    <td><?= $row["desc"];?></td> 
                    <td><?= $row["category"];?></td>  
                    <td><?= $row["price"];?></td>  
                    <td><?= $row["quantity"];?></td>
                    <td><?= $row["img"];?></td>
                    <td><?= $row["date_added"];?></td>
                    <td>
                    <button type="button" class = "btn btn-outline-secondary editbtn"><i class="fa fa-edit"></i></button>
                    <button type="button" class = "btn btn-danger deletebtn"><i class="fa fa-trash-o"></i></button>
                    </td>
                </tr>

        <?php    }
        } else{
            echo 'No Record Found';
        } 
        ?>  
        </tbody>

    </table>
</div>

</h3>
</div><br><br>

<!-- Footer -->
<footer>
    <div class="container-fluid">
        <div class="row justify-content-center">
		
			<div class="col-12 col-sm bg-light">
			<br><b style="padding-left: 35px; padding-top: 10px;">©2021 Sofea.Co by Codlege KMK3393 Web Programming</b><br><br>
			</div>
			
        </div>
    </div>
</footer>


<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>

<!-- DataTables CSS -->
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>

<!-- DataTables JS Function -->
<script>
$(document).ready(function() {
    $('#product_list').DataTable();
} );
</script>

</body>
</html>

<!-- Edit Button JS Functions-->
<script>  
 $(document).ready(function(){  
      $(".editbtn").on('click', function(){

        $("#EditItem").modal("show");

        $tr =$(this).closest('tr');
        
        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

        console.log(data);

        $('#update_id').val(data[0]);
        $('#name').val(data[1]);
        $('#desc').val(data[2]);
        $('#category').val(data[3]);
        $('#price').val(data[4]);
        $('#quantity').val(data[5]);
        $('#img').val(data[6]);
      }); 
 });  
 </script>

<!-- Delete Button JS Functions-->
<script>  
 $(document).ready(function(){  
      $(".deletebtn").on('click', function(){

        $("#DeleteItem").modal("show");

        $tr =$(this).closest('tr');
        
        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

        console.log(data);

        $('#delete_id').val(data[0]);

      }); 
 });  
 </script>

