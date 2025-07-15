<?php
include "connection.php";
session_start();
if (!$_SESSION["userid"]) {
  header("login1.php");
}
if (isset($_POST['addnewadmin'])) {
  $fname = $_POST['fname'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $gender = $_POST['gender'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];
  $password1 = md5($password);
  $sql = "INSERT INTO user(fullname,email,gender,phone,address,password,accounttype) VALUES('$fname','$email','$gender','$phone','$address','$password1','Admin')";
  if (mysqli_query($con, $sql)) {
    header("location:team.php");
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
  <style type="text/css">




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
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Dashboard</span>
        </a>
      </li>
      <li>
        <a href="category.php">
          <i class='bx bx-user'></i>
          <span class="links_name">Category</span>
        </a>
      </li>
      <li>
        <a href="product.php">
          <i class='bx bx-list-ul'></i>
          <span class="links_name">Product</span>
        </a>
      </li>
      <li>
        <a href="orders.php">
          <i class='bx bx-book'></i>
          <span class="links_name">Orders</span>
        </a>
      </li>
      <li>
        <a href="team.php">
          <i class='bx bx-user'></i>
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
      <form style="width:80%;margin: auto;" method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">Full name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" name="fname" aria-describedby="emailHelp" placeholder="Enter full name">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email</label>
          <input type="text" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Phone</label>
          <input type="text" class="form-control" id="exampleInputEmail1" name="phone" aria-describedby="emailHelp" placeholder="Enter phone">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Gender</label>
          <select class="form-control" name="gender">
            <option>Male</option>
            <option>Female</option>
          </select>
          <div class="form-group">
            <label for="exampleInputPassword1">Address</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="address" placeholder="Enter your address">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="password" placeholder="Enter Password">
          </div>
        </div>
        <input type="submit" class="btn btn-primary" name="addnewadmin" value="New Admin"> </input>
      </form>


    </div>
  </section>


</body>

</html>