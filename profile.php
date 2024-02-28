<!DOCTYPE html>
<html lang="en">
   
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <title>Preskool - Profile</title>
      <link rel="shortcut icon" href="assets/img/favicon.png">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">
      <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
      <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="assets/css/style.css">
   </head>
   <body>
      <div class="main-wrapper">
         <?php
            include 'header/header.php';
            include 'navigationbar/nav.php';
         ?>
         <div class="page-wrapper">
            <div class="content container-fluid">
               <div class="page-header">
                  <div class="row">
                     <div class="col">
                        <h3 class="page-title">Profile</h3>
                        <ul class="breadcrumb">
                           <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                           <li class="breadcrumb-item active">Profile</li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>

            <!-- update profile form  -->
            <div class="container">
    
  	<hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
          <h6>Upload a different photo...</h6>
          
          <input type="file" class="form-control">
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        
        <h3>Personal info</h3>
          <?php
            include 'connection.php';

            $sql="SELECT * FROM admin";
            $result = mysqli_query($conn,$sql);
            // if($result)
            // {
              foreach($result as $r)
              {
                  $fname=$r['afname'];
                  $lname=$r['alname'];
                  $mail=$r['aemail'];
                  $pass=$r['apass'];
              }
            // // }
            // else{
            //   echo "<script>alert ('no')</script>";
            // }
          ?>

        <form class="form-horizontal" role="form" action="#" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label class="col-lg-3 control-label">First name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="fname" value="<?php echo $fname ?>" require>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="<?php echo $lname?>" name="lname" require>
            </div>
          </div>
         
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="<?php echo $mail ?>" name="email" disabled require>
            </div>
          </div>
          
          <div class="form-group">
            <label class="col-md-8 control-label">Password: &nbsp<b style="color:red; font-size:10px;">change only you want to change password</b></label>
            <div class="col-md-8">
              <input class="form-control" type="password" value="<?php echo $pass ?>" onKeyUp="checkpass()" name="pass" id="pass" require>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Confirm password:</label>
            <div class="col-md-8">
              <input class="form-control" type="password" value="<?php echo $pass?>" name="cpass" onKeyUp="checkpass()" id="cpass" require>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary" value="Save Changes" id="btn" name="save">
              <span></span>
              
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>

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
  
      <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.6.0.min.js"></script>
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
      <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
      <script src="assets/js/script.js"></script>
   </body>
   
</html>

<?php
  if(isset($_POST['save']))
  {
      $fname=$_POST['fname'];
      $lname=$_POST['lname'];
      $email=$_POST['email'];
      $pass=$_POST['pass'];

      $sql="UPDATE admin SET `afname`='$fname', `alname`='$lname', `aemail`='$email', `apass`='$pass' WHERE aemail='$mail'";
      $result=mysqli_query($conn,$sql);
      if($result)
      {
        echo "<script>window.location.href='profile.php';</script>";
        exit;
      }
      else{
          echo "<script>alert('try again! check it');</script>";
      }
  }
?>