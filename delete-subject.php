<?php 
@include 'config.php';

if(isset($_REQUEST['subid']))
{
$id = $_REQUEST['subid'];

$qry = "DELETE FROM subject WHERE subid = '$id'";

$del = mysqli_query($conn,$qry);
 
if($del)
{
    header('location:subjects.php');
}
}
?>