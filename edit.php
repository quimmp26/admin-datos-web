<?php

    require_once("conexionbd.php");


    $id = $_GET['id'];
    $qry = mysqli_query($con, "select * from tblproduct where id='$id'");
    $data = mysqli_fetch_array($qry);

    if(isset($_POST['update'])) {

        $producto = $_POST['producto'];
        $codigo = $_POST['codigo'];
        $precio = $_POST['precio'];
        $img = $_POST['img'];
        $categoria = $_POST['cat'];

        $edit = mysqli_query($con,"update tblproduct set id='$id', name='$producto', code='$codigo', image='$img', price='$precio', category='$categoria' where id=$id");
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


