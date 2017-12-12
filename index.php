<?php
//include_once('db/conecta.php'); // Conectamos a la base de datos
$enlace = mysqli_connect("127.0.0.1", "admin", "admin", "carreras");

if (!$enlace) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
/*echo "Éxito: Se realizó una conexión apropiada a MySQL!" ;
echo "<br>";
echo "Información del host: " . mysqli_get_host_info($enlace);
echo "<br>";*/
$sql = 'SELECT * FROM superior';
$acentos = $enlace->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente
$resultado = mysqli_query($enlace, $sql);
// Lo siguiente muestra la consulta real enviada a MySQL, y el error ocurrido. Útil para depuración.
if (!$resultado) {
    $mensaje  = 'Consulta no válida: ' . mysql_error() . "\n";
    $mensaje .= 'Consulta completa: ' . $sql;
	echo "<br>";
    die($mensaje);
}
echo "Éxito: Se realizó una consulta a MySQL!" ;
//$consulta = laConsulta();  // Ejecutamos la función que llama la consulta
?>


    
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Curso |  Listar Tabla</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  
  <body>
    <div class="main">
      <header>
        <div class="row">
          <div class="col-xs-12">
            <h1><img src="./img/logo.png"/></h1>
          </div>
        </div>
      </header>

     
      <div class="row">
        <div class="col-xs-12">
          <h1>Listar una Tabla de Base de Datos en PHP</h1>
		  <select name="oferta" id="oferta" onchange="myFunction()">
			  <option value="superior">Superior</option>
			  <option value="superior_no_escolarizada">Superior No Escolarizada</option>
			  <option value="carreras_mediosuperior">Medio Superior</option>
			  <option value="ms_no_escolarizada">Medio Superior No Escolarizada</option>
			</select>
              <!-- Tabla donde se listará la consulta --> 
              <table class="table table-striped"> 
                <thead>
                  <tr>
                    <th width="300">Carrera</th>
                    <th width="250">Nivel 1</th>
                    <th width="200">Nivel 2</th>
                    <th width="200">Nivel 3</th>
                  </tr>
                </thead>
                <tbody>
                <!-- Generamos el listado vaciando las variables de la consulta en la tabla -->
                  <?php 
                  while($tabla = $resultado->fetch_assoc()) //Creamos un array asociativo con fetch_assoc 
                  {
                  ?>
                    <tr>
                      <td><?php echo $tabla['Carrera']; ?></td>
                      <td><?php echo $tabla['Nivel 1']; ?></td>
                      <td><?php echo $tabla['Nivel 2']; ?></td>
                      <td><?php echo $tabla['Nivel 3']; ?></td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
        </div>
    </div>
    

    <footer class="row">
      <div class="col-xs-12">
        <div>
          Derechos Reservados 2107
        </div>
      </div>
    </footer>
    <div>
  </body>
    
</html>