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
    include 'navigationbar/nav.php';
?>

<div class="page-wrapper">
    <div class="content container-fluid">
               <div class="page-header">
                  <div class="row align-items-center">
                     <div class="col">
                        <h3 class="page-title">Subjects</h3>
                        <ul class="breadcrumb">
                           <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                           <li class="breadcrumb-item active">View Subjects</li>
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
                                    <h5 class="form-title"><span>Subject View</span></h5>
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
                                </div>
                                <input type="submit" class="btn btn-outline-primary mr-2" name="search">
                        </div>
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
                                       <th>Name</th>
                                       <th>Class</th>
                                       <th>Credit</th>
                                       <!-- <th class="text-right">Action</th> -->
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
                                        if(isset($_POST['search']))
                                        {
                                            
                                            $cls = $_POST['subclass'];
                                            $qry = "SELECT * FROM subject where subclass = '$cls'";
                                            $sel = mysqli_query($conn,$qry);

                                        if(mysqli_num_rows($sel) > 0)
                                       {
                                          while($row = mysqli_fetch_array($sel))
                                          {?>
                                             <tr>
                                                <td><?php echo $row['subid']; ?></td>
                                                <td>
                                                   <h2>
                                                      <a><?php echo $row['subname']; ?></a>
                                                   </h2>
                                                </td>
                                                <td><?php echo $row['subclass']; ?></td>
                                                <td><?php echo $row['subcredit']; ?></td>
                                                <!-- <td class="text-right">
                                                   <div class="actions">
                                                      <a href="edit-subject.php" class="btn btn-sm bg-success-light mr-2">
                                                         <i class="fas fa-pen"></i>
                                                      </a>
                                                      <a href="delete-subject.php" class="btn btn-sm bg-danger-light">
                                                         <i class="fas fa-trash"></i>
                                                      </a>
                                                   </div>
                                                </td> -->
                                             </tr>
                                          <?php }
                                       }
                                       // else
                                       // {
                                       //    echo "<script>alert('NO!')</script>";
                                       // }
                                    
                                    }
                                    else
                                    {
                                       //  echo "<script>alert('NO!')</script>";

                                    }
                                ?>
                                 </tbody>
                              </table>
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
   
</html>

                    