<?php 
ini_set("display_errors", "on");
session_start();
$_SERVER["DOCUMENT_ROOT"]=dirname(__DIR__);

include_once 'Persona.php';

//crear array con 3 objetos tipoDocumento
$aTipoDocumento = array();
$aTipoDocumento[] = new TipoDocumento(1,'DNI');
$aTipoDocumento[] = new TipoDocumento(2,'LC');
$aTipoDocumento[] = new TipoDocumento(3,'LE');
// foreach ($aTipoDocumento as $oTipoDocumento)
// {
// 	echo $oTipoDocumento->getIdTipoDocumento() . ' - ' . $oTipoDocumento->getDescripcion() . '<br>';
// 	echo '<br>';
// }

// Crear array con 2 objetos Sexo
$aSexo = array();
$aSexo[] = new Sexo('M','Masculino');
$aSexo[] = new Sexo('F','Femenino');

/* CREO EL OBJETO PERSONA */
$oPersona = new Persona();
/* Creo una session llamada oPersona y le asigno el objeto $oPersona serializado (codificado) */
$_SESSION['oPersona']=json_encode($oPersona);

if(isset($_SESSION['oPersona']) == false){
	$_SESSION['oPersona']['_usuario']['_nombre'] = '';
	$_SESSION['oPersona']['_usuario']['_contrasenia'] = '';
	$_SESSION['oPersona']['_apellido'] = '';
	$_SESSION['oPersona']['_nombre'] = '';
	$_SESSION['oPersona']['_tipoDocumento']['_idTipoDocumento'] = '';
	$_SESSION['oPersona']['_numeroDocumento'] = '';
	$_SESSION['oPersona']['_sexo']['_idSexo'] = '';
	$_SESSION['oPersona']['_nacionalidad'] = '';
}

$oPersonaInformacionPersonal = $_SESSION['oPersona'];

// /* asigno la session a una variable y decodifico para obtener acceso mediante array */
// $persona = json_decode($_SESSION['oPersona'] , true);

// $nombreUsuario = $persona['_usuario']['_nombre']='maycolsdada';
// $contraseniaUsuario = $persona['_usuario']['_contrasenia']='cosito123';
// echo $nombreUsuario;
// echo $contraseniaUsuario;





//Crear objeto Persona
// $oPersona = new Persona($_SESSION['informacion_personal']['nombre_usuario'],$_SESSION['informacion_personal']['contrasenia'],$_SESSION['informacion_personal']['apellido'],$_SESSION['informacion_personal']['nombre'],$_SESSION['informacion_personal']['tipo_documento'],$_SESSION['informacion_personal']['numero_documento'],$_SESSION['informacion_personal']['sexo'],$_SESSION['informacion_personal']['nacionalidad']);

// $oPersona->setUsuario($_SESSION[Usuario][]='maycol22',$_SESSION['informacion_personal']['contrasenia']='Espectriñ222o9');
// echo $oPersona->getUsuario() . '<br>';




?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<title>SGU | Formulario de Inscripc&oacute;n</title>
	<link type="text/css" rel="stylesheet" href="includes/css/estilos.css">
</head>
<body>

<div class="wraper">

	<?php require_once $_SERVER["DOCUMENT_ROOT"].'/tp3/includes/php/header.php'; ?>
	
	<form action="Paso2.php" method="post">
		<fieldset>
			<legend>Informacion Personal:</legend>
			
			<ul>
				<li><label>Nombre de Usuario:</label></li>
				<li><input type="text" name="nombre_usuario" value="<?php echo $oPersonaInformacionPersonal['nombre']; ?>"></li>
				
				<li><label>Contraseña:</label></li>
				<li><input type="password" name="contrasenia" value="<?php echo $informacionPersonal['contrasenia']; ?>"></li>
				
				<li><label>Apellido:</label></li>
				<li><input type="text" name="apellido" value="<?php echo $informacionPersonal['apellido']; ?>"></li>
				
				<li><label>Nombre:</label></li>
				<li><input type="text" name="nombre" value="<?php echo $informacionPersonal['nombre']; ?>"></li>
				
				<li><label>Tipo de Documento:</label></li>
				<li>
					<select name="tipo_documento">
						<option value="DNI" <?php echo ($aTipoDocumento[0]) ? 'selected="selected"' : '' ; ?>> DNI</option>
						<option value="LC" <?php echo ( $aTipoDocumento[1] ) ? 'selected="selected"' : '' ; ?>>LC</option>
						<option value="LE" <?php echo ( $aTipoDocumento[2] ) ? 'selected="selected"' : '' ; ?>>LE</option>
					</select>
				</li>
				
				<li><label>Numero de Documento:</label></li>
				<li><input type="text" name="numero_documento" value="<?php echo $informacionPersonal['numero_documento']; ?>"></li>
				
				<li><label>Sexo:</label></li>
				<li>
					<label class="radio"><input type="radio" name="sexo" value="M" <?php echo ( $aSexo[0] ) ? 'checked="checked"' : '' ; ?>> Masculino</label>

					<label class="radio"><input type="radio" name="sexo" value="F" <?php echo ( $aSexo[1]) ? 'checked="checked"' : '' ; ?>> Femenino</label>
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

	<?php require_once $_SERVER["DOCUMENT_ROOT"].'/tp3/includes/php/footer.php'; ?>
</body>
</html>

<!-- /* /opt/lampp/htdocs/PHPGugler */ -->