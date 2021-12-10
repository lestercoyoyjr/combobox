<?php
	
	// se pone distinto ya que es un subnivel debajo de la carpeta principal
	require ('../conexion.php');
	
	// aqui recibimos el id de la funcion en index
	$id_estado = $_POST['id_estado'];
	
	$queryM = "SELECT id_municipio, municipio FROM t_municipio WHERE id_estado = '$id_estado' ORDER BY municipio";
	$resultadoM = $mysqli->query($queryM);
	
	// Desde aca llenamos el combobox a nivel html y solamente lo dejamos indicado en el otro lado sin option
	$html= "<option value='0'>Seleccionar Municipio</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['id_municipio']."'>".$rowM['municipio']."</option>";
	}
	
	echo $html;
?>		