<!--Identico al de Index-->

<?php
    require ("conexion.php");

    // Solamente se requiere la localidad, ya que con ello se puede agarrar municipio y estado

    $query = "SELECT id_estado, estado FROM t_estado ORDER BY estado ASC";
    $resultado = $mysqli->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Combobox AJAX, PHP y MySQL</title>
    <script language="javascript" src="js/jquery-3.1.1.min.js"></script>
    <!--Script para leer entre tablas-->

    <script language="javascript">
        // para mostrar municipios en base a estados
        $(document).ready(function(){
				$("#cbx_estado").change(function () {

					// Esta es para la localidad, ya que lo deselecciona para que al momento de cambiar de estado pueda
                    // cambiar la localidad
                    $('#cbx_localidad').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					
					$("#cbx_estado option:selected").each(function () {
						id_estado = $(this).val();

                        // Esto es para traer el municipio desde el otro archivo php llamado getmunicipio.php
						$.post("includes/getMunicipio.php", { id_estado: id_estado }, function(data){
							$("#cbx_municipio").html(data);
						});            
					});
				})
			});
        
        // para mostrar localidades en base a municipios
			
			$(document).ready(function(){
				$("#cbx_municipio").change(function () {
					$("#cbx_municipio option:selected").each(function () {
						id_municipio = $(this).val();
						$.post("includes/getLocalidad.php", { id_municipio: id_municipio }, function(data){
							$("#cbx_localidad").html(data);
						});            
					});
				})
			});
    </script>

</head>
<body>
    <form id="combo" name="combo" action="guarda.php" method="POST">
        <div> Selecciona Estado: 
            <select id="cbx_estado" name="cbx_estado">
                <option value="0">Seleccionar Estado</option>
                <!--Trabajamos con php-->
                <?php while ($row = $resultado->fetch_assoc()) { ?>
                <option value="<?php echo $row['id_estado']; ?>"><?php echo $row['estado'];?></option>
                <?php } ?>
            </select>   
        </div>
        <div>Selecciona Municipio
            <select id="cbx_municipio" name="cbx_municipio"></select>
        </div>
        <div>Selecciona Localidad
            <select id="cbx_localidad" name="cbx_localidad"></select>
        </div>

        <br>
        <!--Para guardar los datos-->
        <input type="submit" id="enviar" name="enviar" value="Guardar">
    </form>
    
</body>
</html>