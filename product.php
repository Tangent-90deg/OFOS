
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

       <table width="50%">
        <a href="newproduct.php">Add New Product</a>
            <thead>
                <tr style="text-align: center;">
                   <th>product id</th>
                    <th>product Name</th>
                    <th>product category</th>
                    <th>image</th>
                    <th>price</th>
                </tr>
            </thead>
             <?php

            $result1 = "SELECT  * from product ";
             $query1=mysqli_query($con,$result1);



            ?>
            <tbody>
              <?php
              while ($row = mysqli_fetch_array($query1)) {

            ?>
            <tr>
              <td><p style="font-size: 13px;text-align: center;"><?php print($row['id']); ?></p></td>
            <td><p style="font-size: 13px;text-align: center;"><?php print($row['productname']); ?></p></td>
            <td><p style="font-size: 13px;text-align: center;"><?php print($row['categoryname']); ?></p></td>
          
            <td><img src="uploads/<?php print($row['image']); ?>" style="width: 30px;height:40px;text-align: center;"></td>
              <td><p style="font-size: 13px;text-align: center;"><?php print($row['price']); ?></p></td>
            </tr>
            <?php
            }
            ?>
</tbody>

        </table>
      

      
</div>
  </section>
</body>
</html>

