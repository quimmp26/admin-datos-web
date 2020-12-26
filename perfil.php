<?php

session_start();
//require_once("dbcontroller.php");
//$usuario = $_SESSION["nick_logueado"];
//$db_handle = new DBController();

require_once("conexionbd.php");
$user = $_GET['user'];
$qry = mysqli_query($con, "select * from usuarios where nickname='$user'");
$data = mysqli_fetch_array($qry);

if(isset($_POST['guardar'])) {

    $nick = $_POST['nick'];
    $pass = $_POST['pass'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $tlf = $_POST['tlf'];

    $edit = mysqli_query($con,"update usuarios set nickname='$nick', password='$pass', fname='$fname', lname='$lname', email='$email', age='$age', phone='$tlf' where nickname='$user'");
    echo $edit;
    if($edit) {
        mysqli_close($con);
        header("location: catalogo2.php");
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
    <title>Perfil</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="css/styles_perfil.css" type="text/css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>
  <div class="main-content">
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hola <?php echo $user ?></h1>
            <p class="text-white mt-0 mb-5">Esta es tu cuenta de perfil!. Aqui puedes consultar tu informació de usuario e incluso modificar tus datos. Adelante!</p>
            <a href="#perfil" class="btn btn-info">Ver perfil</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0" id="perfil">Mi Perfil</h3>
                </div>
              </div>
            </div>
            <div class="card-body" >
              <form method="POST">
                <h6 class="heading-small text-muted mb-4">Información Usuario</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Nickname</label>
                        <input type="text" name="nick" id="input-username" class="form-control form-control-alternative" placeholder="Nickname" value="<?php echo $data["nickname"] ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Contraseña</label>
                        <input type="password" name="pass" id="input-email" class="form-control form-control-alternative" placeholder="Contraseña" value="<?php echo $data["password"] ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-first-name">Nombre</label>
                        <input type="text" name="fname" id="input-first-name" class="form-control form-control-alternative" placeholder="Nombre" value="<?php echo $data["fname"] ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Apellido</label>
                        <input type="text" name="lname" id="input-last-name" class="form-control form-control-alternative" placeholder="Apellido" value="<?php echo $data["lname"] ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Email</label>
                        <input type="email" name="email" id="input-last-name" class="form-control form-control-alternative" placeholder="Email" value="<?php echo $data["email"] ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Edad</label>
                        <input type="number" name="age" id="input-last-name" class="form-control form-control-alternative" placeholder="Edad" value="<?php echo $data["age"] ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Teléfono</label>
                        <input type="number" name="tlf" id="input-last-name" class="form-control form-control-alternative" placeholder="Telefono" value="<?php echo $data["phone"] ?>">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <div class="pl-lg-4 text-center">
                <input class="btn btn-outline-danger" type="submit" name="guardar" value="Guardar">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer">
    <div class="row align-items-center justify-content-xl-between">
      <div class="col-xl-6 m-auto text-center">
        <div class="copyright">
          <p>Profile Page by Quim Martinez 2020</p>
        </div>
      </div>
    </div>
  </footer>
</body>
<script>
    $(document).ready(function() {
    $('a[href^="#"]').click(function() {
        var destino = $(this.hash); //this.hash lee el atributo href de este
        $('html, body').animate({ scrollTop: destino.offset().top }, 700); //Llega a su destino con el tiempo deseado
        return false;
    });
    });
</script>