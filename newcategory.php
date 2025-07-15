<?php
include "connection.php";
session_start();
if(!$_SESSION['userid']){
    header("login1.php");
}
error_reporting(0);
$msg = $msg1 = "";
if (isset($_POST['addcategory'])) {
    $canme = $_POST['categoryname'];
    $cdetails = $_POST['details'];
    $date1 = date("Y-m-d");
    $sql = "insert into category(category,details,date) values('$canme','$cdetails','$date1')";
    if (mysqli_query($con, $sql)) {
        $msg = 1;
        // header("location:adminpage.php?category");
    }
}

?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
     <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="css1/admin.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <span class="logo_name">Shopping</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="admin.php" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="category.php">
            <i class='bx bx-user' ></i>
            <span class="links_name">Category</span>
          </a>
        </li>
        <li>
          <a href="product.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Product</span>
          </a>
        </li>
        <li>
          <a href="orders.php">
            <i class='bx bx-book' ></i>
            <span class="links_name">Orders</span>
          </a>
        </li>
        <li>
          <a href="team.php">
            <i class='bx bx-user' ></i>
            <span class="links_name">New Admin</span>
          </a>
        </li>
        <li class="log_out">
          <a href="logout">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  
   <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">New Category</span>
      </div>
    </nav>

    <div class="home-content">
      <a href="category.php">back</a>
        <form style="width:80%;margin: auto;" method="post">
            <?php
                                if ($msg == 1) {
                                ?>
                                    <p style="color:royalblue;text-align:center;padding:8px;">New Category Added Successfuly</p>
                                <?php
                                }

                                ?>
          
        <div class="form-group">
          <label for="exampleInputEmail1">Category Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" name="categoryname" aria-describedby="emailHelp" value="">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Details</label>
          <textarea  class="form-control" id="exampleInputEmail1" name="details" aria-describedby="emailHelp" value=""></textarea>
        </div>
        <input type="submit" class="btn btn-primary" name="addcategory" value="New Category"> </input>
      </form>

      
</div>
  </section>


</body>
</html>

