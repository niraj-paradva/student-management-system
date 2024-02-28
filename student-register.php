
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Oak manage - Register</title>

    <link rel="shortcut icon" href="assets/img/favicon.png">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">

    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-left">
                        <img class="img-fluid" src="assets/img/logo.png" alt="Logo">
                    </div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Register</h1>
                            <p class="account-subtitle">Access to your dashboard</p>

                            <form action="#" method="POST">
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="GR NO" name="grno" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="email" placeholder="Email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" placeholder="Password" name="password" id="pass" onKeyUp="return checkpass();" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" placeholder="Confirm Password" name="cpassword" id="cpass" onKeyUp="return checkpass();" required>
                                </div>
                                <div class="alert alert-warning alert-dismissible fade show" id="alert" role="alert" style="display:none">
                                    <strong>opps !</strong> Your gr number not fount contact admin
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="form-group mb-0">
                                    <input type="submit" class="btn btn-primary btn-block" type="submit" name="submit" id="btn" />
                                </div>
                            </form>


                            <div class="text-center dont-have">Already have an account? <a href="login.php">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    //for password validation
    function checkpass() 
    {
        var pass= document.getElementById("pass").value;
        var cpass= document.getElementById("cpass").value;
        if(pass != cpass)
        {
            document.getElementById("btn").disabled = true;
            return false;
        }
        else
        {
            document.getElementById("btn").disabled = false;
            return true;
        }
    }
</script>

    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- <script src="assets/js/script.js"></script> -->

</body>

</html>


<?php
    require("connection.php");

    if(isset($_POST["submit"]))
    {
        $grno=$_POST['grno'];
        $email=$_POST['email'];
        $upass=$_POST['password'];
        $pass=password_hash($upass,PASSWORD_DEFAULT);
        $cpass=$_POST['cpassword'];


        $sql="SELECT grno FROM grno_list where grno='$grno'";
        $data=mysqli_query($conn,$sql);

        if(mysqli_num_rows($data) == 1)
        {
            $sql="INSERT into `temp-student` (`grno`,`email`,`password`) VALUES ('$grno','$email','$pass')";
            $result=mysqli_query($conn,$sql);
            if($result){
                echo "<script type='text/javascript'> document.location ='login.php'; </script>";
            }
            else
            { 
                // $message = "gr number is not matched!";
                // echo "<script type='text/javascript'>alert('$message');</script>";
                // echo "<script type='text/javascript'> document.location ='student-register.php'; </script>";   
                // new warning by nicxx
                echo "<script> document.getElementById('alert').style.display = 'block' </script>";
            }

        }
        else
        {
                //new warning by nicxx
            //     $message = "gr number is not matched!";
            //     echo "<script type='text/javascript'>alert('$message');</script>";
            //     echo "<script type='text/javascript'> document.location ='student-register.php'; </script>";
            echo "<script> document.getElementById('alert').style.display = 'block' </script>";
    
        }
    }

?>