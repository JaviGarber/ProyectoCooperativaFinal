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

$N_EntregaEntrega = $_POST['Entrega'];
$FechayhoraEntrega = $_POST['name'];
$CantidadEntrega = $_POST['surname1'];
$Tipo_aceitunaEntrega = $_POST['surname2'];
$Parcela_SIGPAC = $_POST['dirección'];
$Recinto_SIGPAC = $_POST['código'];
$localidadAlta = $_POST['localidad'];

$sentenciaSQL = "INSERT INTO ENTREGA (N_Entrega, Fecha_y_hora, Cantidad, Tipo_aceituna, Parcela_SIGPAC, c_postal,Municipio,provincia,Teléfono,Correo_electrónico) VALUES('" . $NIFAlta . "','" . $nombreAlta. "','" . $apellido1Alta. "','" . $apellido2Alta. "','" . $direcAlta. "','" . $codigoAlta. "','" . $localidadAlta. "','" . $provinciaAlta. "','" . $telefonoAlta. "','" . $correoAlta. "')"; 

echo $sentenciaSQL;
 
if (!$conn->query($sentenciaSQL)) {
  
    echo "Falló la inserción de datos en la tabla: (" . $conn->errno . ") " . $conn->error;
}

echo "Se ha ejecutado correctamente la inserción de datos";

    mysqli_close($conn);
?>