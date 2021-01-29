<div class="card-group">
<?php
include('config.php');
//define output
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
if(isset($_POST["category_id"]))  
    {  
          if($_POST["category_id"] != '')  
          {  
              $sql = "SELECT * FROM products WHERE category = '".$_POST["category_id"]."'";  
          }  
          else  
          {  
            $sql='SELECT * FROM products LIMIT ' . $this_page_first_result . ',' .  $results_per_page;  
          }  
          $result = mysqli_query($con, $sql) or die( mysqli_error($con));  
          while($row = mysqli_fetch_array($result)){
            $output .='<div class="col-lg-3 col-md-6 mb-3">
            <div class="card h-40">
              <a href="#"><img class="card-img-top" src="img/'.$row['img'].'" alt="" width="200" height="300"></a>
              <div class="card-body">
                <h5 class="card-title">'.$row['name'].'</h5>
                <p class="card-text">'.$row['desc'].'</p>
                <h5>RM '.$row['price'].'0</h5>
              </div>
              <div class="card-footer">
                <button type="button" class="btn btn-success btn-block" >Add To Cart</button>
              </div>
            </div>
          </div>';
        }  
        echo $output;  
    }  

?>
</div>