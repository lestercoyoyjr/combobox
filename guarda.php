<?php
    require('conexion.php');

    // tomamos el id de la localidad ya que con ello podemos traer el id del municipio y por consiguiente del estado
    $id_localidad = $_POST['cbx_localidad'];
    $sql = "INSERT INTO datos (id_localidad) VALUES ('$id_localidad')";
    $resultado = $mysqli->query($sql);

    if($resultado){
        echo "Registro Guardado";
    } else{
        echo "Error al registrar";
    }
?>