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
?>
<!DOCTYPE html>
<html lang="en">
   
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <title>Preskool - Subjects</title>
      <link rel="shortcut icon" href="assets/img/favicon.png">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">
      <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
      <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
      <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="main-wrapper">

<?php
            include 'header/header.php';
            include './navigationbar/nav.php';
?>
<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title">Holiday</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
<li class="breadcrumb-item active">Holiday</li>
</ul>
</div>
<div class="col-auto text-right float-right ml-auto">
<a href="#" class="btn btn-outline-primary mr-2"><i class="fas fa-download"></i> Download</a>
<a href="add-holiday.html" class="btn btn-primary"><i class="fas fa-plus"></i></a>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-12">
<div class="card card-table">
<div class="card-body">
<div class="table-responsive">
<table class="table table-hover table-center mb-0 datatable">
<thead>
<tr>
<th>ID</th>
<th>Holiday Name</th>
<th>Type</th>
<th>Start Date</th>
<th>End Date</th>
</tr>
</thead>
<tbody>
<?php 

                                       $qry = "SELECT * FROM holiday";
                                       $sel = mysqli_query($conn,$qry);

                                       if(mysqli_num_rows($sel) > 0)
                                       {
                                          while($row = mysqli_fetch_array($sel))
                                          {?>
                                             <tr>
                                                <td><?php echo $row['hid']; ?></td>
                                                <td>
                                                   <h2>
                                                      <a><?php echo $row['hname']; ?></a>
                                                   </h2>
                                                </td>
                                                <td><?php echo $row['htype']; ?></td>
                                                <td><?php echo $row['hstdate']; ?></td>
                                                <td><?php echo $row['hedate']; ?></td>
                                                <td class="text-right">
                                                   <div class="actions">
                                                      <a href="edit-holiday.php?hid=<?php echo$row['hid'];?>" class="btn btn-sm bg-success-light mr-2">
                                                         <i class="fas fa-pen"></i>
                                                      </a>
                                                      <a href="delete-holiday.php?hid=<?php echo$row['hid'];?>" class="btn btn-sm bg-danger-light">
                                                         <i class="fas fa-trash"></i>
                                                      </a>
                                                   </div>
                                                </td>
                                             </tr>
                                          <?php }
                                       }
                                       // else
                                       // {
                                       //    echo "<script>alert('NO!')</script>";
                                       // }
                                    ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>

<footer>
<p>Copyright © 2020 Dreamguys.</p>
</footer>

</div>

</div>


<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/popper.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/plugins/datatables/datatables.min.js"></script>

<script src="assets/js/script.js"></script>
</body>

<!-- Mirrored from preschool.dreamguystech.com/html-template/holiday.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 11:11:50 GMT -->
</html>