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

$NIF = $_POST['NIF'];
$N_EntregaEntrega = $_POST['Entrega'];
$FechayhoraEntrega = $_POST['fecha_y_hora'];
$CantidadEntrega = $_POST['aceituna'];
$Tipo_aceitunaEntrega = $_POST['Tipo_Aceituna'];
$Parcela_SIGPAC = $_POST['Sigpac'];
$Recinto_SIGPAC = $_POST['r_Sigpac'];


$sentenciaSQL = "INSERT INTO ENTREGA(NIF, Fecha_y_hora, Cantidad, Tipo_aceituna, Parcela_SIGPAC,Recinto_SIGPAC) VALUES('". $NIF. "','" . $FechayhoraEntrega. "','" . $CantidadEntrega. "','" .$Tipo_aceitunaEntrega. "','" . $Parcela_SIGPAC. "','" . $Recinto_SIGPAC. "')"; 

echo $sentenciaSQL;
 
if (!$conn->query($sentenciaSQL)) {
  
    echo "Falló la inserción de datos en la tabla: (" . $conn->errno . ") " . $conn->error;
}

echo "Se ha ejecutado correctamente la inserción de datos";

    mysqli_close($conn);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
?>