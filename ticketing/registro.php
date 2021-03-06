<html>
<head>
  <title>Admin</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="css/reset.css">


</head>
<body>



        <a href="cerrar_session.php">Cerrar sesion</a>
        <a href="historic.php">Histiorial</a>
        <a href="dashboard.php">Dashboard</a>
        <a href="Tickets/registro.php">Tickets</a>
<br>

  <?php

    session_start();

    error_reporting(0);

    $varsesion = $_SESSION['rol'];

    if($varsesion!= "Admin"){

        echo "Usuario desautorizado";

        die();

    }

?>

<div class="row">
  <div class="col-md-4"></div>

  <div class="col-md-4">

    <center><h1>Panel de usuarios:</h1></center><br>

    <form method="POST" action="registro.php" >

    <div class="form-group">
        <label for="nombre">Nombre de usuario: </label>
        <input type="text" name="usuario" class="form-control" id="nombre" >
    </div>

    <div class="form-group">
        <label for="pass">Contraseña: </label>
        <input type="text" name="clave" class="form-control" id="pass">
    </div>

      <div class="form-group">
      <label for="rol">Rol: </label>
       <select name="rol" class="form-control" id="rol">
			<option value ="Admin">Admin</option>
			<option value ="Cliente">Cliente</option>
		</select>
    </div>

    <center>
      <input type="submit" value="Registrar" class="btn btn-success" name="btn_registrar">
      <input type="submit" value="Consultar" class="btn btn-primary" name="btn_consultar">
      <input type="submit" value="Actualizar" class="btn btn-info" name="btn_actualizar">
      <input type="submit" value="Eliminar" class="btn btn-danger" name="btn_eliminar">
    </center>

  </form>

  <?php
    include("abrir_conexion.php");

      $rol   ="";
      $nombre ="";
      $pass    ="";


    if(isset($_POST['btn_registrar']))
      {
         $id    =$_POST['id'];
         $nombre    =$_POST['usuario'];
         $pass    =$_POST['clave'];
         $rol   =$_POST['rol'];



		 if($nombre=="")
		 {
			 echo "Campo necesario";
		 }else
		 {
		    mysqli_query($conexion, "INSERT INTO usuaris (usuari, contrasenya, rol)
		    values ('$nombre', '$pass', '$rol')");
		    echo "Añadido correctamente";

      }

	}

      if(isset($_POST['btn_consultar']))
      {
		 $nombre   =$_POST['usuario'];
		 $x=0;
		 if($nombre=="")
		 {
			 echo "Campo necesario";
		 }else
		 {
		  $resultados = mysqli_query($conexion,"SELECT * FROM usuaris WHERE usuari='$nombre'");
		  while($consulta = mysqli_fetch_array($resultados))
		  {
			echo $variable=$consulta['id']."<br>";
			echo $consulta['usuari']."<br>";
			echo $consulta['contrasenya']."<br>";
			echo $consulta['rol']."<br>";
			$x++;
		  }
		  if($x==0){echo "Desconocido";}
	  }
	}
  if(isset($_POST['btn_actualizar']))
      {
        $rol    =$_POST['rol'];
         $nombre    =$_POST['usuario'];
         $pass    =$_POST['clave'];

		 if($nombre=="")
		 {
			 echo "Campo necesario";
		 }else
		 {
			$X=0;
		  $resultados = mysqli_query($conexion,"SELECT * FROM usuaris WHERE usuari ='$nombre'");
		  while($consulta = mysqli_fetch_array($resultados))
		  {
			$x++;
		  }
		  if($x==0)
		  {
			echo "Desconocido";
		}else
		{
			$_UPDATE_SQL="UPDATE usuaris Set usuari='$nombre',contrasenya='$pass',rol='$rol' WHERE usuari='$nombre'";
			mysqli_query($conexion,$_UPDATE_SQL);
			echo "Actualizado";
		}

      }
      }

      if(isset($_POST['btn_eliminar']))
      {
       $nombre    =$_POST['usuario'];
		 $x=0;
		 if($nombre=="")
		 {
			 echo "Campo necesario";
		 }else
		 {
		  $resultados = mysqli_query($conexion,"SELECT * FROM usuaris WHERE usuari ='$nombre'");
		  while($consulta = mysqli_fetch_array($resultados))
		  {


			$x++;
		  }
		  if($x==0){echo "Desconocido";}
		  else
		  {
			   $_DELETE_SQL =  "DELETE FROM usuaris WHERE usuari = '$nombre'";
				mysqli_query($conexion,$_DELETE_SQL);
				echo "Eliminado";
		  }
	  }
      }

    include("cerrar_conexion.php");
  ?>

  <div class="col-md-4"></div>
</div>

</body>
</html>
