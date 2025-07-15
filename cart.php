
<?php 
session_start();
include "connection.php";
if(isset($_POST['cart'])){
    $pname=$_POST['pname'];
    $price = $_POST['price'];
    $id = $_POST['id'];
    $sql=mysqli_query($con,"insert into cart values('','$pname','$price','$id')");
    if($sql){
        header("location:customerpage.php");
    }
}
if (isset($_POST['removecart'])) {
    $pname = $_POST['pname'];
    $cid = $_POST['cid'];
    $id = $_POST['id'];
    $sql = mysqli_query($con, "delete from cart where cid='$cid'");
    if ($sql) {
        header("location:cart.php");
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
 

        .cart {
            width: 400px;
            height: min-content;
            padding: 34px;
            border-radius: 4px;
            background: var(--background-color);
        }

        .cart .cart-header {
            display: flex;
            margin: 0 0 40px 0;
        }

        .cart .cart-header button {
            cursor: pointer;
            width: 40px;
            height: 40px;
            line-height: 50%;
            font-size: 2rem;
            color: var(--primary-color);
            background: #ddddde50;
            border: 2px solid #ddddde;
            border-radius: 8px;
            transition: .4s;
        }

        .cart .cart-header button:hover {
            color: #fff;
            background: var(--primary-color);
            border-color: var(--primary-color);
        }

        .cart .cart-header h3 {
            margin: auto;
            font: 600 20px 'Poppins';
            color: var(--primary-color);
        }

        .cart .cart-item {
            position: relative;
            display: flex;
            width: 100%;
            margin: 30px 0;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 18px #2a2f430b;
        }

        .cart .cart-item .image {
            width: 30%;
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }

        .cart .cart-item img {
            width: 90%;
        }

        .cart .cart-item .info {
            width: 70%;
            padding: 14px;
        }

        .cart .cart-item h4 {
            color: var(--primary-color);
            font: 700 20px 'Poppins';
        }

        .cart .cart-item .details {
            display: flex;
        }

        .cart .cart-item .details i {
            color: #2a2f43d2;
            font-size: 17px;
            transform: translateY(3px);
        }

        .cart .cart-item .details span {
            color: #2a2f4399;
            font: 600 12px 'Poppins';
            margin-left: -2px;
        }

        .cart .cart-item .status {
            margin-left: 8px;
        }

        .cart .cart-item .price {
            color: var(--secondary-color);
            font: 700 18px 'Poppins';
            margin-top: 8px;
        }

        .cart .cart-item .counter {
            position: absolute;
            right: 14px;
            bottom: 0;
        }

        .cart .cart-item .counter i {
            cursor: pointer;
            width: 24px;
            height: 38px;
            line-height: 30px;
            text-align: center;
            font-size: 12px;
            font-weight: 700;
            color: #fff;
            background: var(--primary-color);
            border-radius: 8px 8px 0 0;
        }

        .cart .cart-item .counter span {
            margin: 0 6px;
            font: 700 16px 'Poppins';
            color: var(--secondary-color);
        }

        .cart .pay {
            cursor: pointer;
            width: 100%;
            padding: 16px 0;
            margin: 10px 0 0 0;
            border-radius: 8px;
            font: 500 18px 'Poppins';
            color: #fff;
            background: var(--primary-color);
            transition: .3s;
        }

        .cart .pay:hover {
            background: #2a2f43f1;
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
            <span class="links_name">cart</span>
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
        <div class="cart">
        <div class="cart-header">
            <h3>My Cart</h3>
        </div>
        <?php
        $userid=$_SESSION['userid'];
        $sql3 = "select * from cart,product where cart.productid=product.id and userid='$userid'";
        $result2 = mysqli_query($con, $sql3);
        while ($row3 = mysqli_fetch_assoc($result2)) {

        ?>
            <div class="cart-item">
                <div class="image">
                    <img src="uploads/<?php echo $row3['image']; ?>" alt="
                    ">
                </div>
                <div class="info">
                    <h4><?php echo $row3['productname']; ?></h4>
                    <div class="details">

                        <div class="status">
                            <i class="bx bxs-package"></i>
                            <span><?php echo $row3['categoryname']; ?></span>
                        </div>
                    </div>
                    <div class="price">
                        <p>&#8377;<?php echo $row3['price']; ?> </p>
                    </div>
                    <form method="post">
                        <input type="text" value="<?php echo $row3['productname']; ?>" name="pname" hidden>
                        <input type="text" value="<?php echo $row3['cid']; ?>" name="cid" hidden>
                        <input type="text" value="<?php echo $row3['id']; ?>" name="id" hidden>


                        <button type="submit" class="pay" style="width:100px;padding:10px;background: royalblue;" name="removecart" >
                            Remove
                        </button>
                    </form>
                </div>
            </div>
        <?php
        }
        ?>
        
        <p>All Total: <b><?php
                            $sql4 = mysqli_query($con, "select sum(price) as total from cart where userid='$userid'");
                            $row4 = mysqli_fetch_assoc($sql4);
                            echo $row4['total'];



                            ?></b></p><br><?php
                            if($row4['total']==0){
                                echo "add something in your cart";

                            }
                            else{
                                ?>
                                <a href="payment.php" class=" pay" style="width:100px;margin-right:10px;padding:8px;color:white;text-decoration:none;background: royalblue;">
            Pay
        </a>

                                <?php
                            }
                            ?>
                            

    </div>
    </div>
    </div>
    </div>

    </div>


    </div>

     
      
          
         
  </section>

<script type="text/javascript" src="javascript/main.js"></script>
</body>
</html>

