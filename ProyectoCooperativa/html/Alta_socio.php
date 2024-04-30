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

$NIFAlta = $_POST['nif'];
$nombreAlta = $_POST['name'];
$apellido1Alta = $_POST['surname1'];
$apellido2Alta = $_POST['surname2'];
$direcAlta = $_POST['dirección'];
$codigoAlta = $_POST['código'];
$localidadAlta = $_POST['localidad'];
$provinciaAlta = $_POST['provincia'];
$telefonoAlta = $_POST['tlf'];
$correoAlta = $_POST['mail'];

$sentenciaSQL = "INSERT INTO SOCIO (nif, nombre, apellido_1, apellido_2, direccion, c_postal,Municipio,provincia,Teléfono,Correo_electrónico) VALUES('" . $NIFAlta . "','" . $nombreAlta. "','" . $apellido1Alta. "','" . $apellido2Alta. "','" . $direcAlta. "','" . $codigoAlta. "','" . $localidadAlta. "','" . $provinciaAlta. "','" . $telefonoAlta. "','" . $correoAlta. "')"; 

echo $sentenciaSQL;
 
if (!$conn->query($sentenciaSQL)) {
  
    echo "Falló la inserción de datos en la tabla: (" . $conn->errno . ") " . $conn->error;
}

echo "Se ha ejecutado correctamente la inserción de datos";

    mysqli_close($conn);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    echo "Se ha ejecutado correctamente la inserción de datos";

    exit();
?>