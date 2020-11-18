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

?>
<body>
    <form class="text-center border border-light p-5" id="form_edit" method="POST">
        <p class="h4 mb-4">Editar Producto</p>
        <!-- Name -->
        
        <input type="text" name="producto" class="form-control mb-4" placeholder="Producto" required value="<?php echo $data[1] ?>">
        <!-- Descripcion -->
        <textarea name="descrip" class="form-control mb-4" cols="30" rows="10" placeholder="Introduce una descripcion del producto..." required> <?php echo $data[2] ?></textarea>
        <!-- Precio -->
        <input type="number" name="precio" class="form-control mb-4" placeholder="Precio" required value="<?php echo $data[3] ?>">
        <!-- Precio -->
        <input type="number" name="stock" class="form-control mb-4" placeholder="Stock" required value="<?php echo $data[4] ?>">
        <!-- Imagen -->
        <input type="text" name="img" class="form-control mb-4" placeholder="Imagen" required value="<?php echo $data[5] ?>">
        <!-- Sign in button -->
        <input class="btn btn-info btn-block" type="submit" name="update" value="Editar">
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>

