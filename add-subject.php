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

if(isset($_POST['submit']))
{
    $subid = $_POST['subid'];
    $subid = filter_var($subid,FILTER_SANITIZE_STRING);
    $subname = $_POST['subname'];
    $subname = filter_var($subname,FILTER_SANITIZE_STRING);
    $subclass = $_POST['subclass'];
    $subclass = filter_var($subclass,FILTER_SANITIZE_STRING);
    $subcredit = $_POST['subcredit'];
    $subcredit = filter_var($subcredit,FILTER_SANITIZE_STRING);

    $qry = "INSERT INTO subject values ('$subid','$subname','$subclass','$subcredit')";

    $ins = mysqli_query($conn,$qry);

    if($ins)
    {
        echo "INSERTED";
    }
    else
    {
        echo "NOT INSERTED";
    }
}
else
{
    // echo "<script>alert('NO');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from preschool.dreamguystech.com/html-template/add-subject.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 11:11:50 GMT -->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>Preskool - Subject</title>

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
<h3 class="page-title">Add Subject</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="subjects.html">Subject</a></li>
<li class="breadcrumb-item active">Add Subject</li>
</ul>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-12">
<div class="card">
<div class="card-body">
<form action="" method="POST">
<div class="row">
<div class="col-12">
<h5 class="form-title"><span>Subject Information</span></h5>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Subject ID</label>
<input type="text" class="form-control" name="subid" required>
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Subject Name</label>
<input type="text" class="form-control" name="subname" required>
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
    <label>Class</label>
    <select class="form-control" name="subclass">
        <option disabled>Select Class</option>
        <option>FY SEM 1</option>
        <option>FY SEM 2</option>
        <option>SY SEM 3</option>
        <option>SY SEM 4</option>
        <option>TY SEM 5</option>
        <option>TY SEM 6</option>
    </select>
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Subject Credit</label>
<input type="text" class="form-control" name="subcredit" required>
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

<!-- Mirrored from preschool.dreamguystech.com/html-template/add-subject.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 11:11:50 GMT -->
</html>