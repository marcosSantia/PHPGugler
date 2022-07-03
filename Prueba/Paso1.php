<?php 
ini_set("display_errors", "on");
session_start();

$informacionPersonal = null;

if ( isset($_SESSION['informacion_personal']) == false )
{
	$_SESSION['informacion_personal']['nombre_usuario'] = '';
	$_SESSION['informacion_personal']['contrasenia'] = '';
	$_SESSION['informacion_personal']['apellido'] = '';
	$_SESSION['informacion_personal']['nombre'] = '';
	$_SESSION['informacion_personal']['tipo_documento'] = '';
	$_SESSION['informacion_personal']['numero_documento'] = '';
	$_SESSION['informacion_personal']['sexo'] = '';
	$_SESSION['informacion_personal']['nacionalidad'] = '';
}

$informacionPersonal = $_SESSION['informacion_personal'];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<title>SGU | Formulario de Inscripc&oacute;n</title>
	<link type="text/css" rel="stylesheet" href="/tp3/includes/css/estilos.css">
</head>
<body>

<div class="wraper">


	
	<form action="Paso2.php" method="post">
		<fieldset>
			<legend>Informaci&oacute;n Personal:</legend>
			
			<ul>
				<li><label>Nombre de Usuario:</label></li>
				<li><input type="text" name="nombre_usuario" value="<?php echo $informacionPersonal['nombre_usuario']; ?>"></li>
				
				<li><label>Contrase&ntilde;a:</label></li>
				<li><input type="password" name="contrasenia" value="<?php echo $informacionPersonal['contrasenia']; ?>"></li>
				
				<li><label>Apellido:</label></li>
				<li><input type="text" name="apellido" value="<?php echo $informacionPersonal['apellido']; ?>"></li>
				
				<li><label>Nombre:</label></li>
				<li><input type="text" name="nombre" value="<?php echo $informacionPersonal['nombre']; ?>"></li>
				
				<li><label>Tipo de Documento:</label></li>
				<li>
					<select name="tipo_documento">
						<option value="DNI" <?php echo ( $informacionPersonal['tipo_documento'] == 'DNI' ) ? 'selected="selected"' : '' ; ?>>DNI</option>
						<option value="LC" <?php echo ( $informacionPersonal['tipo_documento'] == 'LC' ) ? 'selected="selected"' : '' ; ?>>LC</option>
						<option value="LE" <?php echo ( $informacionPersonal['tipo_documento'] == 'LE' ) ? 'selected="selected"' : '' ; ?>>LE</option>
					</select>
				</li>
				
				<li><label>N&uacute;mero de Documento:</label></li>
				<li><input type="text" name="numero_documento" value="<?php echo $informacionPersonal['numero_documento']; ?>"></li>
				
				<li><label>Sexo:</label></li>
				<li>
					<label class="radio"><input type="radio" name="sexo" value="M" <?php echo ( $informacionPersonal['sexo'] == 'Masculino' ) ? 'checked="checked"' : '' ; ?>> Masculino</label>
					<label class="radio"><input type="radio" name="sexo" value="F" <?php echo ( $informacionPersonal['sexo'] == 'Femenino' ) ? 'checked="checked"' : '' ; ?>> Femenino</label>
				</li>
				
				<li><label>Nacionalidad:</label></li>
				<li><input type="text" name="nacionalidad" value="<?php echo $informacionPersonal['nacionalidad']; ?>"></li>
			</ul>
			
			<div class="buttons">
				<input type="submit" name="bt_paso1" value="Siguiente">
			</div>
		</fieldset>
	</form>
	
	<div class="push"></div>
	
</div>


</body>
</html>