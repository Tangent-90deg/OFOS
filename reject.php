<?php
include "connection.php";
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
<html>

<head>
    <title>Admin page</title>
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/orderpage.css">
</head>

<body>
    <div class="container">
        <div class="left">
            <div class="top">
                <p style="color:white;font-weight:bold;padding:8px;margin-left:20px;font-size:20px;">Admin Panel</p>
            </div>
            <div class="body">
                <div class="navbar">
                    <p style="margin-left:33px;padding:5px;font-weight:bold;">Main Navbar</p>
                </div>
                <br>
                <ul id="navlink">
                    <li><a href="adminpage.php">Dashboard</a></li>
                    <li><a href="adminpage.php?category">Category</a></li>
                    <li><a href="adminpage.php?product">product</a></li>
                    <li><a href="adminpage.php?orders">Orders</a></li>
                    <li><a href="#">Logout</a></li>

                </ul>
            </div>
        </div>
        <div class="header"></div>

        <?php
        if (isset($_REQUEST['category'])) {
        ?>
            <div class="content">
                <div id="categoryform">
                    <div id="categoryhead">
                        <p>Category Information</p>
                    </div>
                    <div id="categorybody">
                        <table width="80%">
                            <form action="" method="post">
                                <?php
                                if ($msg == 1) {
                                ?>
                                    <p style="color:royalblue;text-align:center;padding:8px;">New Category Added Successfuly</p>
                                <?php
                                }

                                ?>
                                <tr>
                                    <td>Category name</td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="categoryname" require></td>
                                </tr>

                                <tr>
                                    <td>Details</td>
                                </tr>
                                <tr>
                                    <td><textarea name="details" id="" cols="8" rows="5" require></textarea></td>
                                </tr>
                                <tr>
                                    <td><input name="addcategory" type="submit" value="Add new Category" style="margin-bottom: 20px;background-color:#19376D;color:white;padding:8px;border-radius:5px;border:0px;"></td>
                                </tr>

                            </form>
                        </table>
                    </div>
                </div>
            </div>
        <?php

        } else if (isset($_REQUEST['product'])) {
        ?>
            <div class="content">
                <div id="categoryform" style="width:60%;">
                    <div id="categoryhead">
                        <p>Product Information</p>
                    </div>
                    <div id="categorybody">
                        <table width="70%">
                            <form action="" method="post" enctype="multipart/form-data">
                                <?php
                                if ($msg1 == 1) {
                                ?>
                                    <p style="color:royalblue;text-align:center;padding:8px;">Successfull added new Product</p>
                                <?php
                                }

                                ?>
                                <tr>
                                    <td>product name</td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="pname" require></td>
                                </tr>
                                <tr>
                                    <td>Category name</td>
                                </tr>
                                <tr>
                                    <td><select name="categoryname" id="" style="width: 90%;">
                                            <?php
                                            $sql1 = mysqli_query($con, "select * from category");
                                            while ($row1 = mysqli_fetch_assoc($sql1)) {
                                            ?>
                                                <option value="<?php echo $row1['category']; ?>"><?php echo $row1['category']; ?></option>
                                            <?php
                                            }



                                            ?>

                                        </select></td>
                                </tr>
                                <tr>
                                    <td>product price</td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="pprice" require style="background-color:none;"></td>
                                </tr>
                                <tr>
                                    <td>product Image</td>
                                </tr>
                                <tr>
                                    <td><input type="file" name="pimage" require></td>
                                </tr>
                                <tr>
                                    <td><input name="addproduct" type="submit" value="Add new Product" style="margin-bottom: 20px;background-color:#19376D;color:white;padding:8px;border-radius:5px;border:0px;"></td>
                                </tr>

                            </form>
                        </table>
                    </div>
                </div>


            <?php

        } else if (isset($_REQUEST['orders'])) {
            ?>
                <div class="content">
                    <main class="table">
                        <section class="table__header">
                            <h1> Orders</h1>

                        </section>
                        <section class="table__body">
                            <table>
                                <thead>
                                    <tr>
                                        <th> Id <span class="icon-arrow">&UpArrow;</span></th>
                                        <th> Customer <span class="icon-arrow">&UpArrow;</span></th>
                                        <th> Location <span class="icon-arrow">&UpArrow;</span></th>
                                        <th> Order Date <span class="icon-arrow">&UpArrow;</span></th>
                                        <th> Status <span class="icon-arrow">&UpArrow;</span></th>
                                        <th> Amount <span class="icon-arrow">&UpArrow;</span></th>
                                        <th> Action <span class="icon-arrow">&UpArrow;</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql6 = mysqli_query($con, "select * from payment,product where payment.productid=product.id");
                                    while ($row6 = mysqli_fetch_assoc($sql6)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row6['id']; ?></td>
                                            <td><?php echo $row6['fname']; ?></td>
                                            <td> <?php echo $row6['homeaddress']; ?> </td>
                                            <td> <?php echo $row6['orderdate']; ?> </td>
                                            <td>
                                                <?php
                                                if ($row6['status'] == 'Pending') {
                                                ?>
                                                    <p class="status pending">Pending</p>
                                                <?php
                                                } else if ($row6['status'] == 'Rejected') {
                                                ?>
                                                    <p class="status " style="background-color: red;">Rejected</p>

                                                <?php
                                                } else {
                                                ?>
                                                    <p class="status delivered">Accepted</p>
                                                <?php
                                                }
                                                ?>


                                            </td>
                                            <td> <strong> <?php echo $row6['price']; ?></strong></td>
                                            <td>
                                                <a href="adminpage.php?approveorder=<?php echo $row6['orderid']; ?>" style="background-color:royalblue
                                                ;padding:10px;border:0px;border-radius:7px;color:white;text-decoration:none;">Approve</a>
                                                <a href="adminpage.php?reject=<?php echo $row6['orderid']; ?>" style="background-color:red
                                                ;padding:10px;border:0px;border-radius:7px;color:white;text-decoration:none;">Reject</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </section>
                    </main>
                </div>


            <?php
        } else if (isset($_REQUEST['approveorder'])) {
            $approveorder = $_GET['approveorder'];
            $sql7 = mysqli_query($con, "update payment set status='Confirmed' where orderid='$approveorder'");
            if ($sql7) {
                header("location:adminpage.php?orders");
            }
        } else if (isset($_REQUEST['reject'])) {
            $reject = $_GET['reject'];
            $sql7 = mysqli_query($con, "update payment set status='Rejected' where orderid='$reject'");
            if ($sql7) {
                header("location:adminpage.php?orders");
            }
        } else {
            ?>
                <div class="content">gomepage</div>
            <?php

        }
            ?>
            </div>
    </div>


</body>

</html>