<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Historico</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
  </head>
  <body>

          <a href="cerrar_session.php">Cerrar sesion</a>
          <a href="dashboard.php">Dashboard</a>
          <a href="registro.php">Administrar</a>
          <a href="Tickets/registro.php">Tickets</a>
    <h1>
      Historial de incidencias concluidas
    </h1>
          <br><?php

            $fp=fopen('historico.txt','w');

            include("abrir_conexion.php");

            $resultados = mysqli_query($conexion,"SELECT * from incidencies WHERE estat = 'Cerrada';");

                    while($consulta = mysqli_fetch_array($resultados))
                    {

                      fwrite($fp,$consulta['id']."  ".$consulta['data']."  ".$consulta['usuari']."  ".$consulta['descripcio']."  ".$consulta['estat']."  ");

                    }

                    fclose($fp);

                    $file = fopen('historico.txt','r');
                    while ($line = fgets($file)){
                      echo "<br>".$line;
                    }

                  include("cerrar_conexion.php");

                    ?>
  </body>
</html>
