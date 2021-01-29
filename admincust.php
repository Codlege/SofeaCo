<?php
session_start();
include('config.php');
$sql = "SELECT * FROM users ORDER BY user_id ASC";
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
  
    <title>Sofea.Co | Admin Customer Details List</title>

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
<h3 style = "text-align: center;">Customer Information List</h3><br>

<!-- Delete Customer Info Modal -->
<div class="modal fade" id="DeleteCust" tabindex="-1" role="dialog" aria-labelledby="DeleteCustLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="DeleteCustLabel">Delete Customer Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="deletecust.php" method="POST">
      <input type="hidden" name="delete_id" id="delete_id">
        <p>Are you sure you want to delete this customer's information?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" name="delete-data" class="btn btn-dark">Yes, Proceed</button></form>
      </div>
    </div>
  </div>
</div>

<!-- Data Table -->
<div class="table-responsive">
    <table id = "cust_list" class ="table table-striped table-bordered">
        <thead>
            <tr>
                <td>#ID</td>
                <td>Name</td>
                <td>Address</td>
                <td>Email</td>
                <td>Username</td>
                <td>Password</td>
                <td></td>
            </tr>
        </thead>

        <tbody>
        <?php  
        if ($result)  
        {  foreach($result as $row){ ?> 
                <tr>
                    <td><?= $row["user_id"];?></td>  
                    <td><?= $row["fname"];?> <?=$row["lname"];?></td>  
                    <td><?= $row["address1"];?><br><?= $row["address2"]; ?><br><?=$row["zip"];?> <?= $row["city"]; ?><br><?=$row["state"];?></td> 
                    <td><?= $row["email"];?></td>  
                    <td><?= $row["user_name"];?></td>  
                    <td><?= $row["password"];?></td>
                    <td>
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
    $('#cust_list').DataTable();
} );
</script>

</body>
</html>

<!-- Delete Button JS Functions-->
<script>  
 $(document).ready(function(){  
      $(".deletebtn").on('click', function(){

        $("#DeleteCust").modal("show");

        $tr =$(this).closest('tr');
        
        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

        console.log(data);

        $('#delete_id').val(data[0]);

      }); 
 });  
 </script>

