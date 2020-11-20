<?php

    require_once("conexionbd.php");


    $id = $_GET['id'];
    $qry = mysqli_query($con, "select * from productos where idProducto='$id'");
    $data = mysqli_fetch_array($qry);

    if(isset($_POST['update'])) {

        $producto = $_POST['producto'];
        $descrip = $_POST['descrip'];
        $stock = $_POST['stock'];
        $precio = $_POST['precio'];
        $img = $_POST['img'];

        $edit = mysqli_query($con,"update productos set producto='$producto', descripcion='$descrip', precio='$precio', stock='$stock', imagen='$img' where idProducto='$id'");
        echo $edit;
        if($edit) {
            mysqli_close($con);
            header("location: admin.php");
            exit;
            
        }else {
            echo mysqli_error();
        }
    }

    require_once("views/edit_view.php");
?>


