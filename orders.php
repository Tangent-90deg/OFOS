
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
            <i class='bx bx-category' ></i>
            <span class="links_name">Category</span>
          </a>
        </li>
        <li>
          <a href="product.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Products</span>
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
     <?php
        if (isset($_REQUEST['approveorder'])) {
            $approveorder = $_GET['approveorder'];
            $sql7 = mysqli_query($con, "update payment set status='Confirmed' where orderid='$approveorder'");
            if ($sql7) {
                header("location:orders.php");
            }
        } else if (isset($_REQUEST['reject'])) {
            $reject = $_GET['reject'];
            $sql7 = mysqli_query($con, "update payment set status='Rejected' where orderid='$reject'");
            if ($sql7) {
                header("location:orders.php");
            }
        } else {
        ?>
         <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Orders Page</span>
      </div>
    </nav>

    <div class="home-content">
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
                                                <a href="orders.php?approveorder=<?php echo $row6['orderid']; ?>" style="background-color:royalblue
                                                ;padding:10px;border:0px;border-radius:7px;color:white;text-decoration:none;">Approve</a>
                                                <a href="orders.php?reject=<?php echo $row6['orderid']; ?>" style="background-color:red
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
        }
            ?>
  </section>
 


</body>
</html>

