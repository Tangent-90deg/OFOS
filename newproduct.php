<?php
include "connection.php";
session_start();
if(!$_SESSION['userid']){
    header("login1.php");
}
error_reporting(0);
$msg = $msg1 = "";

if (isset($_POST['addproduct'])) {
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    // $pimage = $_POST['pimage'];
    $category = $_POST['categoryname'];
    //image upload
    $errors = array();
    $file_name = $_FILES['pimage']['name'];
    $file_size = $_FILES['pimage']['size'];
    $file_tmp = $_FILES['pimage']['tmp_name'];
    $file_type = $_FILES['pimage']['type'];
    $file_ext = strtolower(end(explode('.', $_FILES['pimage']['name'])));

    $extensions = array("jpeg", "jpg", "png", "JPEG", "PNG", "JPG");

    if (in_array($file_ext, $extensions) === false) {
        $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
    }

    if ($file_size > 2097152) {
        $errors[] = 'File size must be upto 2 MB';
    }

    if (empty($errors) == true) {
        move_uploaded_file($file_tmp, "uploads/" . $file_name);
        $sql2 = mysqli_query($con, "insert into product(productname,categoryname,image,price) values('$pname','$category','$file_name','$pprice')");
        if ($sql2) {
            $msg1 = 1;
        }
    } else {
        print_r($errors);
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
      <a href="product.php">back</a>
        <form action="" method="post" enctype="multipart/form-data">
            <?php
                                if ($msg1 == 1) {
                                ?>
                                    <p style="color:royalblue;text-align:center;padding:8px;">Successfull added new Product</p>
                                <?php
                                }

                                ?>
          
        <div class="form-group">
          <label for="exampleInputEmail1">Product Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" name="pame" aria-describedby="emailHelp" value="">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Product Category</label>
          <select name="categoryname" id="" style="width: 90%;" class="form-control" id="exampleInputEmail1" name="pame">
                                            <?php
                                            $sql1 = mysqli_query($con, "select * from category");
                                            while ($row1 = mysqli_fetch_assoc($sql1)) {
                                            ?>
                                                <option value="<?php echo $row1['category']; ?>"><?php echo $row1['category']; ?></option>
                                            <?php
                                            }



                                            ?>

                                        </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Product Price</label>
          <input type="text" class="form-control" id="exampleInputEmail1" name="pprice" aria-describedby="emailHelp" value="">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Product Image</label>
          <input type="file" class="form-control" id="exampleInputEmail1" name="pimage" aria-describedby="emailHelp" value="">
        </div>
        <input type="submit" class="btn btn-primary" name="addproduct" value="New product"> </input>
      </form>

      
</div>
  </section>


</body>
</html>

