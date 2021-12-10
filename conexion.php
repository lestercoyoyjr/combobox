<?php
    // servidor, usuario, contrasenya, nombre
    $mysqli = new mysqli("localhost", "root", "", "mexico");

    if(mysqli_connect_errno()){
        echo "Conexion fallida: ", mysqli_connect_error();
        exit();
    } else {
        echo "Conexion exitosa ".$mysqli->server_info;
    }
?>