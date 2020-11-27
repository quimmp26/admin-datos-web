<?php

//Parametros de conexión
$servidor="localhost";
$usuario="root";
$contraseña="usbw";
$bd="tienda_bd";

$con = mysqli_connect($servidor, $usuario, $contraseña, $bd) or die(mysql_error());

if (!$con)
{
    die("No se ha podido realizar la corrección ERROR:" . mysqli_connect_error() . "<br>");
    require_once("index.html");
}

?>

