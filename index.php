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
      <title>OAK - Dashboard</title>
      <link rel="shortcut icon" href="assets/img/favicon.png">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">
      <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
      <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="assets/css/style.css">
      
   </head>
   <body>
      <div class="main-wrapper">
         <!-- header include  -->

         <?php
            include 'header/header.php';
            include 'navigationbar/nav.php';
         ?>
         
         <div class="page-wrapper">
            <div class="content container-fluid">
               <div class="page-header">
                  <div class="row">
                     <div class="col-sm-12">
                        <h3 class="page-title">Welcome back <span><?php echo $arr['afname']; ?></span>!</h3>
                        <ul class="breadcrumb">
                           <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-xl-3 col-sm-6 col-12 d-flex">
                     <div class="card bg-one w-100">
                        <div class="card-body">
                           <div class="db-widgets d-flex justify-content-between align-items-center">
                              <div class="db-icon">
                                 <i class="fas fa-user-graduate"></i>
                              </div>
                              <div class="db-info">
                                 <h3>50055</h3>
                                 <h6>Students</h6>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 col-12 d-flex">
                     <div class="card bg-two w-100">
                        <div class="card-body">
                           <div class="db-widgets d-flex justify-content-between align-items-center">
                              <div class="db-icon">
                                 <i class="fas fa-crown"></i>
                              </div>
                              <div class="db-info">
                                 <h3>50+</h3>
                                 <h6>Awards</h6>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 col-12 d-flex">
                     <div class="card bg-three w-100">
                        <div class="card-body">
                           <div class="db-widgets d-flex justify-content-between align-items-center">
                              <div class="db-icon">
                                 <i class="fas fa-building"></i>
                              </div>
                              <div class="db-info">
                                 <?php
                                    require "connection.php";
                                    $sql="select subname from subject";
                                    $result=mysqli_query($conn,$sql);
                                    $count_return=mysqli_num_rows($result);
                                 ?>
                                 <h3><?php
                                    echo $count_return;
                                 ?></h3>
                                 <h6>subject</h6>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 col-12 d-flex">
                     <div class="card bg-four w-100">
                        <div class="card-body">
                           <div class="db-widgets d-flex justify-content-between align-items-center">
                              <div class="db-icon">
                                 <i class="fas fa-file-invoice-dollar"></i>
                              </div>
                              <div class="db-info">
                                 <h3>$505</h3>
                                 <h6>Revenue</h6>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12 col-lg-6">
                     <div class="card card-chart">
                        <div class="card-header">
                           <div class="row align-items-center">
                              <div class="col-6">
                                 <h5 class="card-title">Revenue</h5>
                              </div>
                              <div class="col-6">
                                 <ul class="list-inline-group text-right mb-0 pl-0">
                                    <li class="list-inline-item">
                                       <div class="form-group mb-0 amount-spent-select">
                                          <select class="form-control form-control-sm">
                                             <option>Today</option>
                                             <option>Last Week</option>
                                             <option>Last Month</option>
                                          </select>
                                       </div>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <!-- <div class="card-body">
                           <div id="apexcharts-area"></div>
                        </div> -->
                        <div id="donutchart" style="width: 700px; height: 400px;"></div>
                     </div>
                  </div>
                  <div class="col-md-12 col-lg-6">
                     <div class="card card-chart">
                        <div class="card-header">
                           <div class="row align-items-center">
                              <div class="col-6">
                                 <h5 class="card-title">Number of Students</h5>
                              </div>
                              <div class="col-6">
                                 <ul class="list-inline-group text-right mb-0 pl-0">
                                    <li class="list-inline-item">
                                       <div class="form-group mb-0 amount-spent-select">
                                          <select class="form-control form-control-sm">
                                             <option>Today</option>
                                             <option>Last Week</option>
                                             <option>Last Month</option>
                                          </select>
                                       </div>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="card-body">
                           <div id="bar"></div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6 d-flex">
                     <div class="card flex-fill">
                        <div class="card-header">
                           <h5 class="card-title">Star Students</h5>
                        </div>
                        <div class="card-body">
                           <div class="table-responsive">
                              <table class="table table-hover table-center">
                                 <thead class="thead-light">
                                    <tr>
                                       <th>ID</th>
                                       <th>Name</th>
                                       <th class="text-center">Marks</th>
                                       <th class="text-center">Percentage</th>
                                       <th class="text-right">Year</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <td class="text-nowrap">
                                          <div>PRE2209</div>
                                       </td>
                                       <td class="text-nowrap">John Smith</td>
                                       <td class="text-center">1185</td>
                                       <td class="text-center">98%</td>
                                       <td class="text-right">
                                          <div>2019</div>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td class="text-nowrap">
                                          <div>PRE1245</div>
                                       </td>
                                       <td class="text-nowrap">Jolie Hoskins</td>
                                       <td class="text-center">1195</td>
                                       <td class="text-center">99.5%</td>
                                       <td class="text-right">
                                          <div>2018</div>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td class="text-nowrap">
                                          <div>PRE1625</div>
                                       </td>
                                       <td class="text-nowrap">Pennington Joy</td>
                                       <td class="text-center">1196</td>
                                       <td class="text-center">99.6%</td>
                                       <td class="text-right">
                                          <div>2017</div>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td class="text-nowrap">
                                          <div>PRE2516</div>
                                       </td>
                                       <td class="text-nowrap">Millie Marsden</td>
                                       <td class="text-center">1187</td>
                                       <td class="text-center">98.2%</td>
                                       <td class="text-right">
                                          <div>2016</div>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td class="text-nowrap">
                                          <div>PRE2209</div>
                                       </td>
                                       <td class="text-nowrap">John Smith</td>
                                       <td class="text-center">1185</td>
                                       <td class="text-center">98%</td>
                                       <td class="text-right">
                                          <div>2015</div>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 d-flex">
                     <div class="card flex-fill">
                        <div class="card-header">
                           <h5 class="card-title">Student Activity</h5>
                        </div>
                        <div class="card-body">
                           <ul class="activity-feed">
                              <li class="feed-item">
                                 <div class="feed-date">Apr 13</div>
                                 <span class="feed-text"><a>John Doe</a> won 1st place in <a>"Chess"</a></span>
                              </li>
                              <li class="feed-item">
                                 <div class="feed-date">Mar 21</div>
                                 <span class="feed-text"><a>Justin Lee</a> participated in <a href="invoice.html">"Carrom"</a></span>
                              </li>
                              <li class="feed-item">
                                 <div class="feed-date">Feb 2</div>
                                 <span class="feed-text"><a>Justin Lee</a>attended internation conference in <a href="profile.html">"St.John School"</a></span>
                              </li>
                              <li class="feed-item">
                                 <div class="feed-date">Apr 13</div>
                                 <span class="feed-text"><a>John Doe</a> won 1st place in <a>"Chess"</a></span>
                              </li>
                              <li class="feed-item">
                                 <div class="feed-date">Mar 21</div>
                                 <span class="feed-text"><a>Justin Lee</a> participated in <a href="invoice.html">"Carrom"</a></span>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-xl-3 col-sm-6 col-12">
                     <div class="card flex-fill fb sm-box">
                        <i class="fab fa-facebook"></i>
                        <h6>50,095</h6>
                        <p>Likes</p>
                     </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 col-12">
                     <div class="card flex-fill twitter sm-box">
                        <i class="fab fa-twitter"></i>
                        <h6>48,596</h6>
                        <p>Follows</p>
                     </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 col-12">
                     <div class="card flex-fill insta sm-box">
                        <i class="fab fa-instagram"></i>
                        <h6>52,085</h6>
                        <p>Follows</p>
                     </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 col-12">
                     <div class="card flex-fill linkedin sm-box">
                        <i class="fab fa-linkedin-in"></i>
                        <h6>69,050</h6>
                        <p>Follows</p>
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
      <script src="assets/plugins/apexchart/apexcharts.min.js"></script>
      <script src="assets/plugins/apexchart/chart-data.js"></script>
      <script src="assets/js/script.js"></script>
   </body>
   
</html>