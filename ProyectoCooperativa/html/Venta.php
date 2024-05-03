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
$FechayhoraVentas = $_POST['fecha_y_hora'];

$sentenciaSQL = "INSERT INTO VENTAS (NIF, Fecha_y_hora) VALUES('" . $NIF . "','" . $FechayhoraVentas. "' )"; 

// echo $sentenciaSQL;
 
if (!$conn->query($sentenciaSQL)) {
  
    echo "Falló la inserción de datos en la tabla: (" . $conn->errno . ") " . $conn->error;
}

// echo "Se ha ejecutado correctamente la inserción de datos";

    mysqli_close($conn);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
?>