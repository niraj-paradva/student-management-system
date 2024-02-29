<?php 
@include 'config.php';

if(isset($_REQUEST['hid']))
{
$id = $_REQUEST['hid'];

$qry = "DELETE FROM holiday WHERE hid = '$id'";

$del = mysqli_query($conn,$qry);
 
if($del)
{
    header('location:holiday.php');
}
}
?>