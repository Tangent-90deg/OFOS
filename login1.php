
<?php 
    include "connection.php";
    session_start();
    error_reporting(0);
    $msg = "";
    if (isset($_POST['loginbtn'])) {
        $usename = $_POST['email'];
        $pswrd = $_POST['pswd'];
        $pswrd = md5($pswrd);

        $sql = "select * from user where email='$usename' and password='$pswrd'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            $_SESSION["userid"]=$row['id'];
            if($row['accounttype']=='Admin'){
                if ($_SESSION["userid"]) {
                    header("location:Admin.php");
                
                }
                
            }
            else{
                header("location:Customerpage.php");

            }
        } else {
            $msg = "incorrect username and password";
        }
    }
    if (isset($_POST['registration'])) {
    $uname = $_POST['uname'];
    $pswrd = $_POST['pwd'];
    $email = $_POST['email'];
    $sex=$_POST['gender'];
    $sex = 'f';
    $phone = $_POST['mobile'];
    $address = $_POST['address'];
    $msgu = $msgp = $msgn = $msge = $msgs = $msgp = $msga = $msgpp = "";
    $msgu1 = $msgp1 = $msgn1 = $msge1 = $msge1 = $msgs1 = $msgp1 = $msga1 = $msgpp1 = "";
    if (empty($uname)) {
      $msgu = "Fullname is Required";
    } else {
      $msgu1 = 1;
    }

    if (empty($pswrd)) {
      $msgp = "password is Required";
    } else {
      $msgp1 = 1;
    }
    if (empty($email)) {
      $msge = "email is Required";
    } else {
      $msge1 = 1;
    }
 
    if (empty($sex)) {
      $msgs = "gender is Required";
    } else {
      $msgs1 = 1;
    }
    if (empty($phone)) {
      $msgpp = "phone is Required";
    } else {
      $msgpp1 = 1;
    }
    if (empty($address)) {
      $msga = "email is Required";
    } else {
      $msga1 = 1;
    }
    if ($msga1 == 1 && $msgu1 == 1 && $msgp1 == 1 && $msge1 == 1 && $msgs1 == 1 && $msgpp1 == 1) {
      $pswrd = md5($pswrd);
      $sql = "insert into user(email,password,fullname,gender,phone,address,accounttype) values('$email','$pswrd','$uname','$sex','$phone','$address','Customer')";
      if (mysqli_query($con, $sql)) {
        header("location:login1.php");
      } else {
        echo "not inserted";
      }
    }
  }


    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="css1/style.css">
         
    <!--<title>Login & Registration Form</title>-->
</head>
<body>
    
    <div class="container">
        <div class="forms">
            <div class="form login" >
                <span class="title">Login</span>

                <form action="#" method='POST'>
                    <div class="input-field">
                        <input type="text" placeholder="Enter your email" name="email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Enter your password" name="pswd" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                    <p style="font-size: 12px;color: red;"><?php
                                                        if ($msg != '') {
                                                            echo $msg;
                                                        }
                                                        ?></p>
                    <div class="input-field button">
                        <input type="submit" value="Login" name="loginbtn">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Not a member?
                        <a href="#" class="text signup-link">Signup Now</a>
                    </span>
                </div>
            </div>

            <!-- Registration Form -->
            <div class="form signup">
                <span class="title">Registration</span>

                <form action="#" method="post">
                    <div class="input-field">
                        <input type="text" placeholder="Enter your name" name="uname" required>
                        <i class="uil uil-user"></i>

                    </div>
                     <?php echo $msgu; ?>
                    <div class="input-field">
                        <input type="text" placeholder="Enter your email" name="email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <?php echo $msge; ?>
                    <div >
                        <br>
                       Male <input type="radio" value="Male" class="" name="gender"  required>
                          Female<input type="radio" class="" name="gender" value="Female" required>
                        <br>
                    </div>
                    <?php echo $msgs; ?>
                    <div class="input-field">
                        <input type="text" class="password" name="mobile" placeholder="Enter Phone" required>
                        <i class="uil uil-phone icon"></i>
                    </div>
                     <?php echo $msgp; ?>

                    <div class="input-field">
                        <input type="text" class="password" name="address" placeholder="Enter Address" required>
                        <i class="uil uil-home icon"></i>
                    </div>
                     <div class="input-field">
                        <input type="text" class="password" name="pwd" placeholder="Enter Password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                    <?php echo $msgp; ?>
                    <div class="input-field button">
                        <input type="submit" value="Signup" name="registration">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Already a member?
                        <a href="#" class="text login-link">Login Now</a>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <script src="javascript/validation.js"></script>

</body>
</html>
