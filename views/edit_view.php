<?php

    require_once("../conexionbd.php");

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
            header("location: ../admin.php");
            exit;
            
        }else {
            echo mysqli_error();
        }
    }

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<body>
    <form class="text-center border border-light p-5" id="form_edit" method="POST">
        <p class="h4 mb-4">Editar Producto</p>
        <!-- Name -->
        <input type="text" name="producto" class="form-control mb-4" placeholder="Producto" required value="<?php echo $data["name"] ?>">
        <!-- Codigo -->
        <input type="text" name="codigo" class="form-control mb-4" placeholder="Codigo" required value="<?php echo $data["code"] ?>">
        <!-- Precio -->
        <input type="number" name="precio" class="form-control mb-4" placeholder="Precio" required step=".01" value="<?php echo $data["price"] ?>">
        <!-- Imagen -->
        <input type="text" name="img" class="form-control mb-4" placeholder="Imagen" required value="<?php echo $data["image"] ?>">
        <!-- Categoria -->
        <input type="text" name="cat" class="form-control mb-4" placeholder="Categoria" required value="<?php echo $data["category"] ?>">
        <!-- Sign in button -->
        <input class="btn btn-info btn-block" type="submit" name="update" value="Editar">
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>