
<?php 
include "connection.php";
session_start();
if(!$_SESSION['userid']){
    header("login1.php");
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
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <style type="text/css">
       table {
      width: 100%;
      border-collapse: collapse;
  }



  th,
  td {
      border-bottom: 1px solid #dddddd;
      padding: 10px 20px;
      font-size: 14px;
  }


  tr:nth-child(even) {
      background-color: #dddddd;
  }

  tr:nth-child(odd) {
      background-color: #edeef1;
  }

  tr:hover td {
      color: #44b478;
      cursor: pointer;
      background-color: #ffffff;
  }

  td button {
      border: none;
      padding: 7px 20px;
      border-radius: 20px;
      background-color: black;
      color: #e6e7e8;
  }

     </style>
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
        <span class="dashboard">Admin Page</span>
      </div>
    </nav>

    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Product</div>
            <?php
            $sql = "select * from product ";   
            $result = mysqli_query($con, $sql);  
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result); 
            ?>


            <div class="number"><?php print($count); ?></div>
            <div class="indicator">
              <i class='bx bx-student'></i>
              <span class="text">All Products</span>
            </div>
          </div>
          <i class='bx bx-user'></i>
        </div>
        <div class="box">
          <div class="right-side">
             <?php
            $sql1 = "select * from user";   
            $result1 = mysqli_query($con, $sql1);  
            $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);  
            $count1 = mysqli_num_rows($result1); 
            ?>
            <div class="box-topic">All Users</div>
            <div class="number"><?php print($count1); ?></div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Users</span>
            </div>
          </div>
          <i class='bx bxs-user' ></i>
        </div>
        <div class="box">
          <div class="right-side">
             <?php
            $sql4 = "select * from payment ";   
            $result4 = mysqli_query($con, $sql4);  
            $row4 = mysqli_fetch_array($result4, MYSQLI_ASSOC);  
            $count4 = mysqli_num_rows($result4); 
            ?>
            <div class="box-topic">Orders</div>
            <div class="number"><?php print($count4); ?></div>
          </div>
          <i class='bx bx-book' ></i>
        </div>
      </div>

      
          
         
  </section>


</body>
</html>

