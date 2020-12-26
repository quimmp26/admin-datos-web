<?php

require_once("conexionbd.php");

$id = $_GET['id']; // get id through query string

$del = mysqli_query($con,"delete from tblproduct where id = '$id'"); // delete query

if($del)
{
    mysqli_close($con); // Close connection
    header("location:admin.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting product"; // display error message if not delete
}
?>