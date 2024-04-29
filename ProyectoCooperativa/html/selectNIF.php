<?php
    // Ejemplo de:
    // https://denisseestrada.com/hacer-un-select-en-mysql-desde-php/#:~:text=Para%20realizar%20esta%20consulta%20lo%20primero%20que%20debes,%24sql%20%3D%20%22SELECT%20%2A%20FROM%20nombre_de_tabla%20WHERE%20condicion%22%3B
    // , de:
    // https://stackoverflow.com/questions/65838862/populate-html-form-select-element-with-results-from-query-on-database-table
    // y de:
    // https://www.php.net/manual/es/class.mysqli-result.php

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

    // Consultamos los NIF
    $sql = "SELECT NIF FROM SOCIO;";
    $statement = $conn->query($sql);
    $result = $statement->fetch_all();

    //Devolvemos el resultado
    echo json_encode($result);
?>