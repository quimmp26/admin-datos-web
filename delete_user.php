<?php

require_once("conexionbd.php");

$id = $_GET['id']; // get id through query string

$del = mysqli_query($con,"delete from usuarios where idUsuario = '$id'"); // delete query

if($del)
{
    mysqli_close($con); // Close connection
    header("location:usuarios.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting user"; // display error message if not delete
}
?>