<?php
	// se pone distinto ya que es un subnivel debajo de la carpeta principal
	require ('../conexion.php');
	
	// aqui recibimos el id de la funcion en index
	$id_municipio = $_POST['id_municipio'];
	
	$queryL = "SELECT id_localidad, localidad FROM t_localidad WHERE id_municipio = '$id_municipio' ORDER BY localidad";
	$resultadoL=$mysqli->query($queryL);
	
	while($row = $resultadoL->fetch_assoc())
	{
		$html.= "<option value='".$row['id_localidad']."'>".$row['localidad']."</option>";
	}
	echo $html;
?>