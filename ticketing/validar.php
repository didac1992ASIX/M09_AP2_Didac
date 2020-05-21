<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Validar</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
  </head>
  <body>
  <a href="index.php">Reintentar</a>

  <?php
    session_start();
    $usuario=$_POST['usuario'];
    $clave=$_POST['clave'];

    $conexion=mysqli_connect("localhost", "root", "Barcelona1.", "Ticketing");
    $consulta="SELECT * FROM usuaris WHERE usuari='$usuario' and contrasenya='$clave'";
    $resultado=mysqli_query($conexion, $consulta);
    while($row = mysqli_fetch_array($resultado)) {

      $rol=$row['rol'];
    }

    $_SESSION['rol'] = $rol;

    $filas=mysqli_num_rows($resultado);

    if ($filas>0) {
    header("location:dashboard.php");

    } else {
    echo "Error en la autentificacion";
    }

    mysqli_free_result($resultado);

    mysqli_close($conexion);
    ?>

  </body>
</html>
