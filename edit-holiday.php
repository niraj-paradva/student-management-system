<?php

@include 'config.php';
session_start();

$aemail = $_SESSION['user'];

if(isset($aemail))
{
   $qry = "SELECT * FROM admin where aemail='$aemail'";
   $sel = mysqli_query($conn,$qry);

   $arr = mysqli_fetch_array($sel);
}
else
{
   header('Location:login.php');
}

if(isset($_REQUEST['submit']))
{
    $hid = $_REQUEST['hid'];
    $hid = filter_var($hid,FILTER_SANITIZE_STRING);
    $hname = $_REQUEST['hname'];
    $hname = filter_var($hname,FILTER_SANITIZE_STRING);
    $htype = $_REQUEST['htype'];
    $htype = filter_var($htype,FILTER_SANITIZE_STRING);
    $hstdate = $_REQUEST['hstdate'];
    $hstdate = filter_var($hstdate,FILTER_SANITIZE_STRING);
    $hedate = $_REQUEST['hedate'];
    $hedate = filter_var($hedate,FILTER_SANITIZE_STRING);

    $qry = "UPDATE holiday SET hname = '$hname',htype = '$htype',hstdate = '$hstdate',hedate='$hedate' where hid = '$hid'";
    $updt = mysqli_query($conn,$qry);

    if($updt)
    {
        echo "UPDT";
        header("Location:holiday.php");
    }
    else
    {
        echo "NOT UPDT";
    }
}
else
{
    echo "<script>alert('NO');</script>";
}

?>

<!DOCTYPE html>
<html lang="en">


<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>Preskool - Holiday</title>

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
<div class="row align-items-center">
<div class="col">
<h3 class="page-title">Add Holiday</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="holiday.php">Holiday</a></li>
<li class="breadcrumb-item active">Edit Holiday</li>
</ul>
</div>
</div>
</div>
<?php 
            $id = $_REQUEST['hid'];
            $qry = "SELECT * FROM holiday where hid='$id'";
            $sel = mysqli_query($conn,$qry);
          
            $arr = mysqli_fetch_array($sel);
?>
<div class="row">
<div class="col-sm-12">
<div class="card">
<div class="card-body">
<form action="" method="POST">
<div class="row">
<div class="col-12">
<h5 class="form-title"><span>Holiday Information</span></h5>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Holiday Id</label>
<input type="text" class="form-control" name="hid" disabled value=<?php echo $arr['hid'] ?>>
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Holiday Name</label>
<input type="text" class="form-control" name="hname" value=<?php echo $arr['hname']?>>
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Type of Holiday</label>
<select class="form-control" id="exampleFormControlSelect1" name="htype" value=<?php echo $arr['htype']?>>
<option>Select Holiday</option>
<option>Public Holiday</option>
<option>College Holiday</option>
<option>Exam Holiday</option>
<option>Others</option>
</select>
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Start Date</label>
<input type="date" class="form-control" name="hstdate" value=<?php echo $arr['hstdate']?>>
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>End Date</label>
<input type="date" class="form-control" name="hedate" value=<?php echo $arr['hedate']?>>
</div>
</div>
<div class="col-12">
<button type="submit" class="btn btn-primary" name="submit">Submit</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>

</div>


<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/popper.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/js/script.js"></script>
</body>
</html>