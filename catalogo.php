<?php

    require_once("conexionbd.php");
    $filtrar = false;

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Shop Homepage</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/styles_catalogo.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Tech It</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">TECH IT</h1>
        <form method="POST">
          <div class="list-group">
            <button type="submit" class="list-group-item" name="all">Todas las categorias</button>
            <button type="submit" class="list-group-item" name="smartphones">Smartphones</button>
            <button type="submit" class="list-group-item" name="portatiles">Portátiles</button>
            <button type="submit" class="list-group-item" name="monitores">Monitores</button>
            <button type="submit" class="list-group-item" name="perifericos">Periféricos</button>
          </div>
        </form>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="img/b1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="img/b2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="img/b3.jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <form method="post">
          <div class="dropdown ">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Order By
            </button>
            
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                
                  <input type="submit" name="precio+" value="Precio: Mas caros primero" class="dropdown-item"/>
                  <input type="submit" name="precio-" value="Precio: Mas baratos primero" class="dropdown-item"/>
                
              </div>
          </div>
        </form>
        <br>
        
        <div class="row">

            <?php

              if(isset($_POST['all'])){
                $filtrar = false;
              }

              if(isset($_POST['smartphones'])){
                $filtrar = true;
                $cat = "Smartphones";
                $sql_select = "SELECT idProducto, producto, CONCAT(SUBSTR(descripcion, 1, 65), '...') as descripcion, precio, stock, imagen, categoria FROM productos WHERE categoria = '".$cat."'";
                $result=mysqli_query($con,$sql_select);
              }

              if(isset($_POST['portatiles'])){
                $filtrar = true;
                $cat = "Portatiles";
                $sql_select = "SELECT idProducto, producto, CONCAT(SUBSTR(descripcion, 1, 65), '...') as descripcion, precio, stock, imagen, categoria FROM productos WHERE categoria = '".$cat."'";
                $result=mysqli_query($con,$sql_select);
              }

              if(isset($_POST['monitores'])){
                $filtrar = true;
                $cat = "Monitores";
                $sql_select = "SELECT idProducto, producto, CONCAT(SUBSTR(descripcion, 1, 65), '...') as descripcion, precio, stock, imagen, categoria FROM productos WHERE categoria = '".$cat."'";
                $result=mysqli_query($con,$sql_select);
              }

              if(isset($_POST['perifericos'])){
                $filtrar = true;
                $cat = "Perifericos";
                $sql_select = "SELECT idProducto, producto, CONCAT(SUBSTR(descripcion, 1, 65), '...') as descripcion, precio, stock, imagen, categoria FROM productos WHERE categoria = '".$cat."'";
                $result=mysqli_query($con,$sql_select);
              }

              if(isset($_POST['precio-'])) { 
                $filtrar = true;
                $sql_select = "SELECT idProducto, producto, CONCAT(SUBSTR(descripcion, 1, 65), '...') as descripcion, precio, stock, imagen, categoria FROM productos ORDER BY precio";
                $result=mysqli_query($con,$sql_select);
              }
              if(isset($_POST['precio+'])) { 
                $filtrar = true;
                $sql_select = "SELECT idProducto, producto, CONCAT(SUBSTR(descripcion, 1, 65), '...') as descripcion, precio, stock, imagen, categoria FROM productos ORDER BY precio DESC";
                $result=mysqli_query($con,$sql_select);
              }
  
              if($filtrar === false) {
                $sql_select = "SELECT idProducto, producto, CONCAT(SUBSTR(descripcion, 1, 65), '...') as descripcion, precio, stock, imagen, categoria FROM productos";
                $result=mysqli_query($con,$sql_select);
              }
               
                while ($valores = mysqli_fetch_array($result)) {  
              
            ?>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="<?php echo $valores["imagen"] ?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#"><?php echo $valores["producto"] ?></a>
                </h4>
                <h5><?php echo $valores["precio"]?>€</h5>
                <p class="card-text"><?php echo $valores["descripcion"] ?></p>
              </div>
              <div class="card-footer">
                <button type="button" class="btn btn-success btn-lg btn-block">AÑADIR AL CARRITO</button>
              </div>
            </div>
          </div>

            <?php
                }
            ?>

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Quim Martínez Shop 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
