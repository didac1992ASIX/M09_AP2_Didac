<!DOCTYPE html>

<html>
	<head>

		<meta charset="utf-8">
		<title>Dashboard</title>
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	</head>
	<body>


	<a href="cerrar_session.php">Cerrar sesion</a>
	<a href="historic.php">Historico</a>
	<a href="Tickets/registro.php">Tickets</a>
	<a href="registro.php">Admin</a>

	      <div class="tile-stats">
	        <div class="icon"><i class="fa fa-ticket"></i></div>

								<?php
								$conexion=mysqli_connect("localhost", "root", "Barcelona1.", "Ticketing");

								$query = "SELECT count(*) as total from incidencies";

								$res=mysqli_query($conexion, $query);
								$data=mysqli_fetch_assoc($res);

								echo "<h3>Total tickets: </h3> ".$data['total']

								?><br>
								<?php
								$conexion=mysqli_connect("localhost", "root", "Barcelona1.", "Ticketing");

								$query = "SELECT count(*)/(SELECT count(*) from incidencies)* 100 as porcentaje from incidencies where estat='Abierta'";

								$res=mysqli_query($conexion, $query);
								$data=mysqli_fetch_assoc($res);

								echo "<h3>Porcentaje pendientes: </h3>".$data['porcentaje']."%"

								?>

								<br>

<h3>Porcentaje por usuario:</h3>
							<?php

							$conn = mysqli_connect("localhost", "root", "Barcelona1.", "Ticketing");

							if ($conn->connect_error) {
								die("Connection failed: " . $conn->connect_error);
							}
							$sql = "SELECT usuari,count(*)/(SELECT count(*) from incidencies)* 100 as porcentaje from incidencies group by usuari";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
									echo "<br>". $row["usuari"]. " ---> " . $row["porcentaje"] . "%<br>";
								}
							} else { echo "0 results"; }
							$conn->close();
							?>
							<br>
<h3>Tipos de incidencias: </h3>
							<?php
							$conn = mysqli_connect("localhost", "root", "Barcelona1.", "Ticketing");
							if ($conn->connect_error) {
								die("Connection failed: " . $conn->connect_error);
							}
							$sql = "SELECT tipus as Tipus from incidencies group by tipus";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
									echo "<br>" . $row["Tipus"]."<br>";
								}
							} else { echo "0 results"; }
							$conn->close();

							?>

			</div>
	</body>
</html>
