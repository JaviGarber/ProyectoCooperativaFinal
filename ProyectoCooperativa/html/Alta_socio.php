<?php
   
   $nombreServidor = "localhost";
   $baseDatos = "Base_Cooperativa";
   $nombreUsuario = "usuario";
   $password = "Usuario1234";
   
   // Se crea la conexión
   
   $conn = new mysqli($nombreServidor, $nombreUsuario, $password, $baseDatos);
   
   // Se comprueba que la conexión es correcta
   
    if (!$conn) {
       die("Connection failed: " . mysqli_connect_error());
    }

$SocioAlta = $_POST['Socio'];
$NIFAlta = $_POST['nif'];
$nombreAlta = $_POST['name'];
$apellido1Alta = $_POST['surname1'];
$apellid2Alta = $_POST['surname2'];

$sentenciaSQL = "INSERT INTO Localidad VALUES(" . $SocioAlta. ",'" . $NIFAlta. " . $nombreAlta. "" . $apellido1Alta. "")";

echo $sentenciaSQL;
 
if (!$conn->query($sentenciaSQL)) {
  
    echo "Falló la inserción de datos en la tabla: (" . $conn->errno . ") " . $conn->error;
}

echo "Se ha ejecutado correctamente la inserción de datos";

    mysqli_close($conn);
?>