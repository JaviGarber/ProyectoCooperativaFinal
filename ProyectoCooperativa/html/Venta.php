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

// Obtenemos el número de venta
$sentenciaSQL = "SELECT MAX(N_Ventas) AS ID FROM VENTAS;";
$statement = $conn->query($sentenciaSQL);
if ($statement->num_rows > 0) {
    $result = $statement->fetch_assoc();
    $id = $result['ID'];
} else {
    $id = 0;
}


// Vender producto en primera fila
$producto = $_POST['TipodeAceite'];
$cantidad = $_POST['Cantidad1'];

if ($producto != 5 || $cantidad > 0) {
    $sentenciaSQL = "INSERT INTO VENTAS_PRODUCTO(N_Ventas, Código_aceite, Cantidad) VALUES (" . $id . ",'" . $producto . "'," . $cantidad . ");";
    echo $sentenciaSQL;
    if (!$conn->query($sentenciaSQL)) {
        echo "Falló la inserción de datos en la tabla: (" . $conn->errno . ") " . $conn->error;
    }
}
$producto2 = $_POST['TipodeAceite2'];
$cantidad2 = $_POST['Cantidad2'];

if ($producto2 != 5 || $cantidad > 0) {
    $sentenciaSQL = "INSERT INTO VENTAS_PRODUCTO(N_Ventas, Código_aceite, Cantidad) VALUES (" . $id . ",'" . $producto2 . "'," . $cantidad2 . ");";
    echo $sentenciaSQL;
    if (!$conn->query($sentenciaSQL)) {
        echo "Falló la inserción de datos en la tabla: (" . $conn->errno . ") " . $conn->error;
    }
}
$producto3 = $_POST['TipodeAceite3'];
$cantidad3 = $_POST['Cantidad3'];

if ($producto3 != 5 || $cantidad > 0) {
    $sentenciaSQL = "INSERT INTO VENTAS_PRODUCTO(N_Ventas, Código_aceite, Cantidad) VALUES (" . $id . ",'" . $producto3 . "'," . $cantidad3 . ");";
    echo $sentenciaSQL;
    if (!$conn->query($sentenciaSQL)) {
        echo "Falló la inserción de datos en la tabla: (" . $conn->errno . ") " . $conn->error;
    }
}

echo "Se ha ejecutado correctamente la inserción de datos";

    mysqli_close($conn);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
?>