<?php 
@include 'config.php';

if(isset($_REQUEST['eid']))
{
$id = $_REQUEST['eid'];

$qry = "DELETE FROM exam WHERE eid = '$id'";

$del = mysqli_query($conn,$qry);
 
if($del)
{
    header('location:exam.php');
}
}
?>