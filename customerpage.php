
<?php 
session_start();
include "connection.php";
if(isset($_POST['cart'])){
    $pname=$_POST['pname'];
    $price = $_POST['price'];
    $id = $_POST['id'];
    $userid=$_SESSION['userid'];
    $sql=mysqli_query($con,"insert into cart values('','$pname','$price','$id','$userid')");
    if($sql){
        header("location:customerpage.php");
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
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <style>
        :root {
            --gra: linear-gradient(45deg, cyan, royalblue);
        }

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        main {
            width: 100%;
            background: white;
            margin: -99px auto;
            font-family: sans-serif;
        }

        header {
            width: 100%;
            height: 100px;
            border-bottom: 2px solid #e5e5e5;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        header ul li {
            list-style: none;
            padding: 20px;
            margin: 10px;
            float: left;
            font-size: 20px;
            border-radius: 35px;
            /*background: red;*/

        }

        header ul li a {
            color: inherit;
            text-decoration: none;
        }

        header ul li.active {
            background: var(--gra);
        }

        header ul li.active a {
            color: white;
            font-weight: bold;
        }

        .filter-condition {
            padding: 20px;
            height: 100px;
            font-size: 20px;
            font-weight: bold;
        }

        .filter-condition select {
            width: 120px;
            padding: 0 0 0 10px;
            border: none;
            outline: none;
            font-weight: bold;
            color: purple;
            background: transparent;
            cursor: pointer;
        }

        .product-field {
            padding: 40px 20px;
        }

        .product-field ul {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
        }

        .product-field ul li {
            list-style: none;
            width: 23.4%;
            height: 300px;
            transition: 0.5s all;
            background: whitesmoke;
            /*overflow: hidden;*/
            border-radius: 20px;
            padding: 10px;
            margin: 200px 10px 0 10px;
            position: relative;
            margin-top: 150px;
            margin-left: 60px;
        }

        picture {
            background: #eee;
            padding: 5px;
            position: absolute;
            right: 0;
            bottom: 41%;
            width: 60%;
            height: 85%;
            border-radius: 50px 20px 0 20px;
            transform: skewY(40deg);
            overflow: hidden;
            box-shadow: 0px 1px 0px #00000020, -1px 0px 0px #ccc;
        }

        picture img {
            width: 95%;
            z-index: 1;
            transform: skewY(-40deg);
            padding: 25px 0 0 0;
        }

        .detail {
            width: 100%;
            height: 100%;
        }

        .detail .icon {
            width: 30%;
            height: 55%;
            padding: 20px 5px;
        }

        .icon span {
            background: #00000030;
            display: inline-block;
            width: 50px;
            height: 50px;
            line-height: 50px;
            text-align: center;
            padding: 0;
            border-radius: 50%;
            margin: 0 0 20px 5px;
            font-size: 20px;
            color: white;
        }

        .icon span:hover {
            background: var(--gra);
            cursor: pointer;
        }

        .detail>strong {
            display: inherit;
            margin: 20px;
            font-size: 30px;
            letter-spacing: 2px;
            color: #555;
        }

        .detail>span {
            display: inherit;
            padding: 0 20px;
            width: 80%;
        }

        .detail small {
            display: inline-block;
            padding: 8px 20px;
            margin: 15px;
            font-weight: bold;
            border-radius: 6px;
            border: 1px solid #999;
            cursor: pointer;
        }

        .detail small:hover {
            background: var(--gra);
            color: white;
            border-color: cyan;
        }

        li h4 {
            position: absolute;
            right: 10px;
            top: 50%;
            font-size: 30px;
            color: #555;
            text-shadow: 1px 1px 2px black;
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
          <a href="customerpage.php" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        
        <li>
          <a href="cart.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Cart</span>
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
    <div class="home-content">
      <main>
        <header>
            <ul class="indicator" style="padding: 5px;">
                <li data-filter="all" class="active"  style="padding: 4px;"><a href="#" style="font-size: 12px;padding: 6px;">All</a></li>
                <?php
                $sql1 = mysqli_query($con, "select * from category");
                while ($row1 = mysqli_fetch_assoc($sql1)) {
                ?>
                    <li data-filter="<?php echo $row1['category']; ?>" style="padding: 4px;"><a href="#" style="font-size: 12px;padding: 6px;"><?php echo $row1['category']; ?></a></li>

                <?php
                }
                ?>
            </ul>
        </header>
        <div class="product-field">
            <ul class="items">
                <?php
                $sql3 = "select * from product";
                $result2 = mysqli_query($con, $sql3);
                while ($row3 = mysqli_fetch_assoc($result2)) {

                ?>
                    <li data-category="<?php echo $row3['categoryname']; ?>" data-price="">

                        <picture>
                            <img src="uploads/<?php echo $row3['image']; ?>" alt="">
                        </picture>
                        <div class="detail">
                            <p class="icon">
                                
                            </p>
                            <strong style="font-size:14px;"><?php echo $row3['categoryname']; ?></strong>
                            <span style="font-size:12px;"><?php echo $row3['productname']; ?></span>
                            <form method="post">
                                <input type="text" value="<?php echo $row3['productname']; ?>" name="pname" hidden>
                                <input type="text" value="<?php echo $row3['price']; ?>" name="price" hidden>
                                <input type="text" value="<?php echo $row3['id']; ?>" name="id" hidden>
                                <small> <button type="submit" name="cart" style="background-color:transparent;border:0px;">Buy now</button></small>
                            </form>

                        </div>
                        <h4><?php echo $row3['price']; ?></h4>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </main>
      
      
          
         
  </section>

<script type="text/javascript" src="javascript/main.js"></script>
</body>
</html>

